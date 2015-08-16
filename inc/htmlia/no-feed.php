<?php

//Disable RSS Feeds functions
add_action('do_feed', array( $this, 'disabler_kill_rss' ), 1);
add_action('do_feed_rdf', array( $this, 'disabler_kill_rss' ), 1);
add_action('do_feed_rss', array( $this, 'disabler_kill_rss' ), 1);
add_action('do_feed_rss2', array( $this, 'disabler_kill_rss' ), 1);
add_action('do_feed_atom', array( $this, 'disabler_kill_rss' ), 1);
if(function_exists('disabler_kill_rss')) {
	function disabler_kill_rss(){
		wp_die( _e("No feeds available.", 'ippy_dis') );
	}
}

//Remove feed link from header
remove_action( 'wp_head', 'feed_links_extra', 3 ); //Extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // General feeds: Post and Comment Feed