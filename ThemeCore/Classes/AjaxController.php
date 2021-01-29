<?php

namespace ThemeCore\Classes;

class AjaxController{
	public function __construct(){
		add_action('admin_init', function(){
			add_action('wp_ajax_custom_search', [$this, 'custom_search'], 1);
			add_action('wp_ajax_nopriv_custom_search', [$this, 'custom_search'], 1);

			add_action('wp_ajax_call_back', [$this, 'call_back'], 1);
			add_action('wp_ajax_nopriv_call_back', [$this, 'call_back'], 1);

			add_action('wp_ajax_vote', [$this, 'vote'], 1);
			add_action('wp_ajax_nopriv_vote', [$this, 'vote'], 1);

			add_action('wp_ajax_contactblock', [$this, 'contactblock'], 1);
			add_action('wp_ajax_nopriv_contactblock', [$this, 'contactblock'], 1);
		});
	}

	public function custom_search(){
		$search_str = trim(strip_tags($_POST['search']));
		$query = new \WP_Query("s={$search_str}&post_type=post&numberposts=4");
		$posts['posts'] = array_merge($posts['posts'], $query -> posts);

		echo json_encode($posts);
		die();
	}

}