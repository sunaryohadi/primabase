<?php

include 'minify.php'; // Minify  HTML
include 'no-feed.php'; // No RSS Feed
include 'disable_emoji.php'; // Disable New Emoji
include 'jquery-replacement.php'; // jQuery Replacement 2.1.4
include 'remove-header-info.php'; // Remove Superfluous info In The Head

/*
function keep_me_logged_in_for_1_year( $expirein ) {
   return 31556926; // 1 year in seconds
}
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );
*/

// Remove Class from Menu
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

// Enable Shortcode In Widget
add_filter( 'widget_text', array( $wp_embed, 'run_shortcode' ), 8 );
add_filter( 'widget_text', array( $wp_embed, 'autoembed'), 8 );

// Default Attachment Settings
add_action( 'after_setup_theme', 'default_attachment_display_settings' );
function default_attachment_display_settings() {
    update_option( 'image_default_align', 'left' );
    update_option( 'image_default_link_type', 'none' );
    update_option( 'image_default_size', 'large' );
}

// Menu Description
// add_filter('walker_nav_menu_start_el', 'add_description_to_menu', 10, 4);
function add_description_to_menu($item_output, $item, $depth, $args) {
    if (strlen($item->description) > 0 ) {
        // append description after link
        $item_output .= sprintf('<span class="description">%s</span>', esc_html($item->description));
 
        // insert description as last item *in* link ($input_output ends with "</a>{$args->after}")
        //$item_output = substr($item_output, 0, -strlen("</a>{$args->after}")) . sprintf('<span class="description">%s</span >', esc_html($item->description)) . "</a>{$args->after}";
    }
 
    return $item_output;
}
