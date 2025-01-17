<?php
namespace Aepro\Modules\AcfDynamic;

use Aepro\Aepro;
use Elementor\Core\DynamicTags\Base_Tag;

class AcfDynamicHelper{
    public static $_instance = null;

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function ae_get_acf_group($sup_field){
        $groups = [];
        $acf_groups = acf_get_field_groups();
        foreach ($acf_groups as $acf_group) {
            $is_on_option_page = false;
            foreach ($acf_group['location'] as $locations) {
                foreach ($locations as $location) {
                    if ($location['param'] === 'options_page') {
                        $is_on_option_page = true;
                    }
                }
            }
            $only_on_option_page = '';
            if ($is_on_option_page == true && (is_array($acf_group['location']) && 1 === count($acf_group['location']))) {
                $only_on_option_page = true;
            }
            $fields  = acf_get_fields($acf_group);
            $options = [];
            foreach ($fields as $field) {
                //echo '<pre>'; print_r($field); echo '</pre>';
                if (in_array($field['type'], $sup_field)) {
                    if ($only_on_option_page) {
                        $options['options' . ':' . $field['name']] = 'Option:' . $field['label'];
                    } else {
                        if ($is_on_option_page == true) {
                            $options['options' . ':' . $field['name']] = 'Option:' . $field['label'];
                        }

                        $options[$field['key'] . ':' . $field['name']] = $field['label'];
                    }
                }
            }
            if ( empty( $options ) ) {
                continue;
            }

            if ( 1 === count( $options ) ) {
                $options = [ -1 => ' -- ' ] + $options;
            }
            //echo '<pre>'; print_r($options); echo '</pre>';
            if (!empty($options)) {
                $groups[] = [
                    'label' => $acf_group['title'],
                    'options' => $options,
                ];
            }
        }
        return $groups;
    }

//    public function ae_get_acf_field_data($settings){
//        $is_option_field = '';
//        if(!empty($settings['acf_field'])){
//            $field_detail =  explode(':', $settings['acf_field']);
//        }
//        if($field_detail[0] === 'option'){
//            $is_option_field = true;
//        }
//
//        if(!empty($field_detail[1]) &&  !empty($field_detail[2])){
//            $field_id = $field_detail[1];
//            $field_name = $field_detail[2];
//        }
//
//        if($is_option_field){
//            $value = get_field($field_name , 'option');
//        }else{
//            $post_data      = Aepro::$_helper->get_demo_post_data();
//            $post_id        = $post_data->ID;
//            $value          = get_field($field_name, $post_id);
//        }
//        return $value;
//    }

    // For use by ACF tags
    public static function get_acf_field_value( Base_Tag $tag ) {

        $key = $tag->get_settings( 'key' );
        if(empty($key)){
            return;
        }
        if ( ! empty( $key ) ) {
            list( $field_key, $meta_key ) = explode( ':', $key );

            if ( 'options' === $field_key ) {
                $field = get_field_object( $meta_key, $field_key );
                $value = get_field($field['name'], 'option');
            } else {
                $field = get_field_object( $field_key, get_queried_object() );
                $post_data      = Aepro::$_helper->get_demo_post_data();
                $post_id        = $post_data->ID;
                switch ($field['type']){
                    case 'oembed':
                    case 'google_map' :
                        $value = get_post_meta($post_id , $field['name'], true);
                        break;
                    case 'radio':
                    case 'checkbox':
                    case 'select':
                        if($field['type'] == 'radio'){
                            $selected = [];
                            $selected[] = get_field($field['name'], $post_id);
                        }else{
                            $selected =  get_field($field['name'], $post_id);
                        }

//                        echo '<pre>'; print_r($selected); echo '</pre>';
//                        echo '<pre>'; print_r($field); echo '</pre>';
                        $value = [];
                        switch ($field['return_format']){
                            case 'value':
                                foreach($field['choices'] as $key => $label){
                                    if(in_array($key,$selected,true)){
                                        $value[$key] = $label;
                                    }
                                }
                                break;
                            case 'label' :
                                foreach($field['choices'] as $key => $label){
                                    if(in_array($label,$selected,true)){
                                        $value[$key] = $label;
                                    }
                                }
                                break;
                            case 'array':
                                $selected_value = [];
                                //echo '<pre>'; print_r($selected); echo '</pre>';
                                foreach ($selected as $select){
                                    $value[$select['value']] = $select['label'];
                                }
                                break;
                        }
                        break;
                    default :
                        $value = get_field($field['name'], $post_id);
                }
                //echo '<pre>'; print_r($value); echo '</pre>';

            }
            return [ $field, $meta_key , $value];
        }

        return [];
    }

}