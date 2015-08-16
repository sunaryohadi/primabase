<?php 
// Using jQuery from CDN
function replace_default_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		// wp_register_script('jquery', '//cdn.jsdelivr.net/jquery/2.1.4/jquery.min.js', false, null);
		wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', false, null);
		// wp_enqueue_script('jquery');
	}
}
add_action('init', 'replace_default_jquery');
