<?php
/*
 * RB Duplicate Post
 * Version:           1.0.0 - 38451
 * Author:            RBS
 * Date:              03 02 2020 12:11:29 GMT
 */

class RbsDuplicatePost
{

    private static $instance = null;

    private $options;
    private $options_name = 'rb_duplicate_post';
    private $modified_types = array();

    private $post_type = 'post';

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->options = get_option($this->options_name, array());
        $this->hooks();
    }

    public function hooks()
    {
        if ( !empty($this->options['enable']) && $this->options['enable']=1 ) {
            add_filter('post_row_actions', array($this, 'makeCopyLinkRow'), 10, 2);
            add_filter('page_row_actions', array($this, 'makeCopyLinkRow'), 10, 2);
        }

        add_action('plugins_loaded', array($this, 'registerTextDomain'));

        add_action('admin_action_rbDuplicatePost_saveNewPost', array($this, 'saveNewPost'));
        add_action('admin_action_rbDuplicatePost_saveNewPostDraft', array($this, 'saveNewPostDraft'));

        add_action('rb_duplicate_clone_gallery', array($this, 'copyMetaData'), 10, 2);

        if (is_admin()) {
            add_action('admin_menu', array($this, 'settingsMenu'));
            add_filter('plugin_action_links', array($this, 'pluginActionsLinks'), 10, 2);
        }
        if (!$this->getOptionCurrentState()) {
            add_action('all_admin_notices', array($this, 'setupNotice'));
        }
    }

    public function makeCopyLinkRow($actions, $post)
    {
        if ($this->isAllowedCopy() && $this->isSupportPostType($post->post_type)) {
            $actions['clone'] = '
            <a href="' . $this->getCopyLink($post->ID, 'display', false) . '"
                title="' . esc_attr(__("Clone this item", 'duplicate-post-rb')) . '"
                >' . __('Clone', 'duplicate-post-rb') . '
            </a>';
            $actions['edit_as_new_draft'] = '
            <a href="' . $this->getCopyLink($post->ID) . '"
                title="' . esc_attr(__('Copy to a new draft', 'duplicate-post-rb')) . '"
                >' . __('New Draft', 'duplicate-post-rb') . '
            </a>';
        }
        return $actions;
    }

    private function isAllowedCopy()
    {
        return current_user_can('edit_posts');
    }

    private function isSupportPostType($post_type)
    {
        return $this->post_type == $post_type;
    }

    private function getCopyLink($id = 0, $context = 'display', $draft = true)
    {
        if (!$this->isAllowedCopy()) {
            return;
        }

        if (!$post = get_post($id)) {
            return;
        }

        if (!$this->isSupportPostType($post->post_type)) {
            return;
        }

        $action_name = "rbDuplicatePost_saveNewPost" . ($draft ? "Draft" : '');

        if ('display' == $context) {
            $action = '?action=' . $action_name . '&amp;post=' . $post->ID;
        } else {
            $action = '?action=' . $action_name . '&post=' . $post->ID;
        }

        $post_type_object = get_post_type_object($post->post_type);

        if (!$post_type_object) {
            return;
        }
        return apply_filters('rbDuplicatePost_getCopyLink', admin_url("admin.php" . $action), $post->ID, $context);
    }

    public function saveNewPost($status = '')
    {
        if (!(
            isset($_GET['post']) ||
            isset($_POST['post']) ||
            (isset($_REQUEST['action']) && 'rbDuplicatePost_saveNewPost' == $_REQUEST['action'])
        )) {
            wp_die(__('No gallery to copy has been supplied!', 'duplicate-post-rb'));
        }

        $robo_gallery = new WP_Query();

        $all_wp_pages = $robo_gallery->query(array('post_type' => $this->post_type, 'post_status' => array('any', 'trash')));


        $id = (int) (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
        if(!$id){
            wp_die(__('No gallery to copy has been supplied!', 'duplicate-post-rb'));
        }

        $post = get_post($id);

        if (isset($post) && $post != null) {
            $new_id = $this->createCopy($post, $status);

            if ($status == '') {
                $sendback = remove_query_arg(array('trashed', 'untrashed', 'deleted', 'cloned', 'ids'), wp_get_referer());
                // Redirect to the post list screen
                wp_redirect(add_query_arg(array('cloned' => 1, 'ids' => $post->ID), $sendback));
            } else {
                // Redirect to the edit screen for the new draft post
                wp_redirect(add_query_arg(array('cloned' => 1, 'ids' => $post->ID), admin_url('post.php?action=edit&post=' . $new_id)));
            }
            exit;
        } else {
            wp_die(__('Copy creation failed, could not find original:', 'duplicate-post-rb') . ' ' . htmlspecialchars($id));
        }
    }

    public function saveNewPostDraft()
    {
        $this->saveNewPost('draft');
    }

    private function copyMetaData($new_id, $post)
    {
        $post_meta_keys = get_post_custom_keys($post->ID);

        if (empty($post_meta_keys)) {
            return;
        }

        $meta_blacklist = array();
        $meta_blacklist = array_map('trim', $meta_blacklist);
        $meta_blacklist[] = '_wpas_done_all'; //Jetpack Publicize
        $meta_blacklist[] = '_wpas_done_'; //Jetpack Publicize
        $meta_blacklist[] = '_wpas_mess'; //Jetpack Publicize
        $meta_blacklist[] = '_edit_lock'; // edit lock
        $meta_blacklist[] = '_edit_last'; // edit lock
        $meta_keys = array_diff($post_meta_keys, $meta_blacklist);

        foreach ($meta_keys as $meta_key) {
            $meta_values = get_post_custom_values($meta_key, $post->ID);
            foreach ($meta_values as $meta_value) {
                $meta_value = maybe_unserialize($meta_value);
                add_post_meta($new_id, $meta_key, $meta_value);
            }
        }
    }

    private function createCopy($post, $status = '', $parent_id = '')
    {

        if (!$this->isSupportPostType($post->post_type)) {
            wp_die(__('Copy features for this gallery are not enabled', 'duplicate-post-rb'));
        }

        $post_id = $post->ID;

        $prefix = 'copy';

        $title = $post->post_title;
        if ($title == '') {
            $title = __('Untitled');
        }

        if (!empty($prefix)) {
            $prefix .= ' ';
        }

        $title = trim($prefix . $title);

        $new_post_author = wp_get_current_user();

        $new_post = array(
            'menu_order' => $post->menu_order,
            'comment_status' => $post->comment_status,
            'ping_status' => $post->ping_status,
            'post_author' => $new_post_author->ID,
            'post_content' => addslashes($post->post_content),
            'post_content_filtered' => addslashes($post->post_content_filtered),
            'post_excerpt' => addslashes($post->post_excerpt),
            'post_mime_type' => $post->post_mime_type,
            'post_parent' => $new_post_parent = empty($parent_id) ? $post->post_parent : $parent_id,
            'post_password' => $post->post_password,
            'post_status' => $new_post_status = (empty($status)) ? $post->post_status : $status,
            'post_title' => addslashes($title),
            'post_type' => $post->post_type,
        );

        /*if( get_option( ROBO_GALLERY_NAMESPACE.'copyDate' ) == 1 ){
        $new_post['post_date'] = $new_post_date =  $post->post_date ;
        $new_post['post_date_gmt'] = get_gmt_from_date($new_post_date);
        }*/

        $new_post_id = wp_insert_post($new_post);

        //update slug
        if ($new_post_status == 'publish' || $new_post_status == 'future') {
            $post_name = $post->post_name;

            //if(get_option(ROBO_GALLERY_NAMESPACE.'emptySlug') == 1) $post_name = '';

            $post_name = wp_unique_post_slug($post_name, $new_post_id, $new_post_status, $post->post_type, $new_post_parent);

            $new_post = array();
            $new_post['ID'] = $new_post_id;
            $new_post['post_name'] = $post_name;

            wp_update_post($new_post);
        }

        do_action('robo_gallery_clone_gallery', $new_post_id, $post);

        delete_post_meta($new_post_id, '_robogallery_original');
        add_post_meta($new_post_id, '_robogallery_original', $post->ID);

        return $new_post_id;
    }

    private function save_options()
    {
        update_option($this->options_name, $this->options);
        echo '<div class="updated fade"><p>' . __('Settings saved.', 'duplicate-post-rb') . '</p></div>';
    }

    private function getOptionCurrentState()
    {
        return isset($this->options['enable']);
    }

    public function registerTextDomain()
    {
        load_plugin_textdomain('duplicate-post-rb', false, RB_DUPLICATE_POST_PATH . 'languages');
    }

    private function settingsPageUrl()
    {
        //return add_query_arg('page', 'rb_duplicate_post_settings', admin_url('options-general.php'));
        return add_query_arg('page', 'rb_duplicate_post_settings', admin_url('admin.php'));
    }

    public function setupNotice()
    {

        if (strpos(get_current_screen()->id, 'settings_page_rb_duplicate_post_settings') === 0) {
            return;
        }        

        if (strpos(get_current_screen()->id, 'rb-plugins_page_rb_disable_right_click_settings') === 0) {
            return;
        }

        if (strpos(get_current_screen()->id, 'rb-plugins_page_rb_duplicate_post_settings') === 0) {
            return;
        }

        $hascaps = current_user_can('manage_options');
        if (!$hascaps)  return ;

        echo '<div class="updated fade">
                <p>
                    ' . sprintf(__('The <em>Duplicate Post</em> plugin is active, but isn\'t configured to do anything yet. Visit the <a href="%s">configuration page</a> to choose which post types to enable  duplicate tools.', 'duplicate-post-rb'), esc_attr($this->settingsPageUrl())) . '
                </p>
            </div>';
        
    }

    public function pluginActionsLinks($links, $file)
    {
        static $plugin;

        if ($file == 'duplicate-post-rb/duplicate-post-rb.php' && current_user_can('manage_options')) {
            array_unshift(
                $links,
                sprintf('<a href="%s">%s</a>', esc_attr($this->settingsPageUrl()), __('Settings'))
            );
        }

        return $links;
    }

    public function settingsMenu()
    {

        $menu_exits = menu_page_url( 'rb_plugins_settings', false );
        if(!$menu_exits){
            $title_plugins = __('RB Plugins', 'disable-comments-rb');
            add_menu_page( $title_plugins,  $title_plugins, null, 'rb_plugins_settings',  array($this, 'pluginsListPage'), 'dashicons-rest-api', 20);

             add_action('admin_head', array($this, 'addAdminCss'));
        }
    

        $title = __('Duplicate Post', 'disable-comments-rb');
        add_submenu_page('rb_plugins_settings', $title, $title, 'manage_options', 'rb_duplicate_post_settings', array($this, 'options'));
    }

    public function addAdminCss()
    {
        echo '<style>
        #adminmenu .toplevel_page_rb_plugins_settings > .wp-menu-image.dashicons-rest-api:before{
            color: #99d000;
        }
      </style>';
    }

    public function options()
    {
        include RB_DUPLICATE_POST_PATH . 'information.php';
        include RB_DUPLICATE_POST_PATH . 'options.php';
    }
}
