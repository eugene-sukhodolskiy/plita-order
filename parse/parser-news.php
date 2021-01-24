<?php

include "libs/simplehtmldom_1_9_1/simple_html_dom.php";

class ParseNews{
	public $total_pages;
	public $url_pattern;

	public function __construct($domen, $total_pages, $url_pattern){
		$this -> total_pages = $total_pages;
		$this -> url_pattern = $url_pattern;
		$this -> domen = $domen;
		$this -> path_to_save = 'data/news/';

		$this -> parse_news();
	}

	public function parse_news(){
		for($i=1; $i<=$this -> total_pages; $i++){
			$page_url = $this -> get_page_url_from_pattern($i);
			$articles_urls = $this -> parse_list($page_url);
			foreach($articles_urls as $post_url){
				$this -> save_post(uniqid(), $this -> parse_post($post_url));
			}
		}
	}

	public function parse_list($page_url){
		echo "{$page_url}\n";
		$html = file_get_html($page_url);
		$articles_urls_tags = $html -> find('.viewn-link');
		$articles_urls = [];
		foreach($articles_urls_tags as $a){
			$articles_urls[] = $this -> domen . $a -> href;
		}

		return $articles_urls;
	}

	public function parse_post($post_url){
		$post = file_get_html($post_url);
		$data = [];
		$data['url'] = $post_url;
		$data['title'] = $post -> find('title', 0) -> plaintext;
		$data['display_name'] = $post -> find('.viewn-name', 0) -> plaintext;
		$data['date'] = $post -> find('.viewn-date', 0) -> plaintext;
		$data['thumbnail'] = $post -> find('.viewn-screen', 0) -> find('img', 0) -> src;
		$post -> find('.viewn-in', 0) -> find('.viewn-title', 0) -> outertext = '';
		$data['content'] = $post -> find('.viewn-in', 0) -> outertext;

		return $data;
	}

	public function save_post($filename, $post_data){
		$filename = $this -> path_to_save . $filename . '.json';
		file_put_contents($filename, json_encode($post_data, JSON_PRETTY_PRINT));
	}

	protected function get_page_url_from_pattern($page_num){
		return str_replace('{page_num}', $page_num, $this -> url_pattern);
	}

}

$pn = new ParseNews('http://plita.kh.ua', 17, 'http://plita.kh.ua/?page{page_num}');