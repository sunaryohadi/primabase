<?php

// Minify HTML codes when page is output.
add_action('get_header','htmlia_minify_html' );

function htmlia_minify_html(){
	/** 
	 * use html_compress($html) function to minify html codes.
	 */
	ob_start( 'htmlia_js_css_compress' );
}

function htmlia_js_css_compress($html){
	/** 
	 * some minify codes here ...
	 */
	require_once('min/lib/Minify/Loader.php'); // Reuired to minify CSS
	require_once('min/lib/Minify/HTML.php');
	require_once('min/lib/Minify/CSS.php');
	require_once('min/lib/JSMin.php');
	// return Minify_HTML::minify( $html );

	Minify_Loader::register(); // Requeired by CSS

	return Minify_HTML::minify( $html, array( 
		'jsMinifier' => array('JSMin', 'minify'), 
		'cssMinifier' => array('Minify_CSS', 'minify'),
	) );
}