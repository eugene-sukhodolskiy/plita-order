<?php

namespace ThemeCore\Classes;

class TemplateController{
	protected $wp_query;

	public function __construct(){
		global $wp_query;
		$this -> wp_query = $wp_query;
	}

	public function run(){
		if(is_home() or is_front_page()){
			return $this -> front_page();
		}
		elseif(is_page()){
			return $this -> simple_single_page();
		}
		elseif(is_category()){
			$cat_name = single_cat_title('', 0);
			return $this -> article_list($cat_name);
		}
		elseif(is_post_type_archive('publ')){
			return $this -> article_list('Статьи');
		}
		elseif(is_single() and strpos($_SERVER['REQUEST_URI'], 'publ/') !== false){
			return $this -> article_single_2();
		}
		elseif(is_single() and count($this -> wp_query -> posts) and $this -> wp_query -> posts[0] -> post_type == 'post'){
			return $this -> article_single();
		}
		
	}

	public function front_page(){
		$posts = $this -> wp_query -> posts;
		return get_template_ins() -> make('pages/home', ['posts' => $posts]);
	}

	public function article_list($page_heading){
		return get_template_ins() -> make('pages/article-list', [
			'posts' => $this -> wp_query -> posts,
			'page_heading' => $page_heading
		]);
	}

	public function article_single(){
		return get_template_ins() -> make('pages/article-single', ['post' => $this -> wp_query -> posts[0]]);
	}

	public function article_single_2(){
		return get_template_ins() -> make('pages/article-single-2', ['post' => $this -> wp_query -> posts[0]]);
	}

	public function simple_single_page(){
		$post = $this -> wp_query -> posts[0];
		return get_template_ins() -> make('pages/simple-page', ['post' => $post]);
	}
}