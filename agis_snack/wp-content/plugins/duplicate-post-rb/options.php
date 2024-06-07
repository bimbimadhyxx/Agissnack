<?php
/*
 * RB Duplicate Post
 * Version:           1.0.9 - 38451
 * Author:            RBS
 * Date:              03 02 2020 12:11:29 GMT
 */

if (!defined('WPINC') || !defined("ABSPATH")) {
    die();
}

$types = get_post_types(array('public' => true), 'objects');

if (isset($_POST['submit']) ) {
    check_admin_referer('duplicate-post-rb-options');
    $this->options['enable'] = (isset($_POST['rb_duplicate_post']) && $_POST['rb_duplicate_post'] == 'enable') ? true : false;
    $this->save_options();
}
?>
<style> .indent {padding-left: 2em} </style>
<div class="wrap">
    <h1><?php _e('Duplicate Post RB', 'duplicate-post-rb');?></h1>
    <p>
        <?php _e('Here you can configure your duplicate post tools. Section with all configuration settings of this tool.', 'duplicate-post-rb');?>
    </p>
    <form action="" method="post" id="disable-comments">
        <ul>
            <li>
                <label for="rb_duplicate_post_on">
                    <input type="radio" id="rb_duplicate_post_on" name="rb_duplicate_post" value="disable" <?php checked(isset($this->options['enable']) && !$this->options['enable'] );?> />
                    <strong>
                        <?php _e('Disable', 'duplicate-post-rb');?>
                    </strong>
                </label>
            </li>
            <li>
                <label for="rb_duplicate_post_off">
                    <input type="radio" id="rb_duplicate_post_off" name="rb_duplicate_post" value="enable" <?php checked(isset($this->options['enable']) && $this->options['enable']);?> />
                    <strong>
                        <?php _e('Enable', 'duplicate-post-rb');?>
                    </strong>
                </label>
            </li>
        </ul>
        <?php wp_nonce_field('duplicate-post-rb-options');?>
        <p class="submit">
            <input class="button-primary" type="submit" name="submit" value="<?php echo esc_attr(__('Save Changes', 'duplicate-post-rb')); ?>">
        </p>
    </form>
</div>
