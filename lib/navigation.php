<?php 

function _themename_register_menu() {
    register_nav_menus( array(
        'main-menu' => esc_html__('Main Menu', '_themename'),
        'footer-menu' => esc_html__('Footer Menu', '_themename')
    ) );
}

// Ovu je Ali stavljao
// add_action('init', '_themename_register_menu');
// Dokumentacija kaze da je ovo pravilnije i ako obe rade
add_action('after_setup_theme', '_themename_register_menu');

function _themename_dropdown_icon($title, $item, $args, $depth) {
    if($args->theme_location == 'main-menu') {
        if(in_array('menu-item-has-children', $item->classes)) {
            if($depth == 0) {
                $title .= '<i class="fa fa-angle-down" aria-hidden="true"></i>';
            } else {
                $title .= '<i class="fa fa-angle-right" aria-hidden="true"></i>';
            }
        }
    }
    return $title;
}

add_filter('nav_menu_item_title', '_themename_dropdown_icon', 10, 4)

?>