<?php 

// Registrujem menu
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


function _themename_aria_hasdropdown($atts, $item, $args) {
    if($args->theme_location == 'main-menu') {
        if(in_array('menu-item-has-children', $item->classes)) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', '_themename_aria_hasdropdown', 10, 3 );


// Dodajem strelice na menu
function _themename_submenu_button($dir = 'down', $title) {
    $button = '<button class="menu-button">';
    $button .= '<span class="u-screen-reader-text menu-button-show">' . sprintf(esc_html__('Show %s submenu', '_themename'), $title) . '</span>';
    $button .= '<span aria-hidden="true" class="u-screen-reader-text menu-button-hide">' . sprintf(esc_html__('Hide %s submenu', '_themename'), $title) . '</span>';
    $button .= '<i class="fa fa-angle-' . $dir . '" aria-hidden="true"></i>';
    $button .= '</button>';
    return $button;
}

function _themename_dropdown_icon($title, $item, $args, $depth) {
    if($args->theme_location == 'main-menu') {
        if(in_array('menu-item-has-children', $item->classes)) {
            if($depth == 0) {
                $title .= _themename_submenu_button('down', $title);
            } else {
                $title .= _themename_submenu_button('right', $title);
            }
        }
    }
    return $title;
}
add_filter('nav_menu_item_title', '_themename_dropdown_icon', 10, 4);


// Funkcija da dodam moju custom klasu na menu-item
// function _themename_add_custom_item_class( $classes, $item, $args, $depth ) {
//     if( 'main-menu' === $args->theme_location ) {
//         if($depth == 0) {
//             $classes[] = "moja-klasa";
//         }
//     }
//     return $classes;
// }
// add_filter( 'nav_menu_css_class' , '_themename_add_custom_item_class' , 10, 4 );

?>