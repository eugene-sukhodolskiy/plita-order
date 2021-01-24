<?php

include "libs/simplehtmldom_1_9_1/simple_html_dom.php";

class ParseWorks{
	public $total_pages;
	public $url_pattern;

	public function __construct($domen, $total_pages, $url_pattern){
		$this -> total_pages = $total_pages;
		$this -> url_pattern = $url_pattern;
		$this -> start_from = 1;
		$this -> domen = $domen;
		$this -> path_to_save = 'data/articles/';

		$this -> parse_works();
	}

	public function parse_works(){
		for($i=$this -> start_from; $i<=$this -> total_pages; $i++){
			$page_url = $this -> get_page_url_from_pattern($i);
			$entries = $this -> parse_list($page_url);
			foreach($entries as $entry){
				$this -> save_post(uniqid(), $this -> parse_post($entry['url'], $entry['data']));
			}
		}
	}

	public function parse_list($page_url){
		echo "{$page_url}\n";
		$html = file_get_html($page_url);
		$entries = $html -> find('.viewn');
		$results = [];
		foreach($entries as $entry){
			$result = [];
			$a = $entry -> find('.viewn-name a', 0);
			$result['url'] = $this -> domen . $a -> href;
			$result['data'] = [];
			$result['data']['excerpt'] = $entry -> find('.viewn-mess', 0) -> innertext;
			$results[] = $result;
		}

		return $results;
	}

	public function parse_post($post_url, $started_data = []){
		$post = file_get_html($post_url);
		$data = $started_data;
		$data['url'] = $post_url;
		$data['title'] = $post -> find('title', 0) -> plaintext;
		$data['display_name'] = $post -> find('.viewn-name', 0) -> plaintext;
		$data['date'] = $post -> find('.viewn-date', 0) -> plaintext;
		$data['content'] = $post -> find('.viewn-mess', 0) -> innertext;

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

$pn = new ParseWorks('http://plita.kh.ua', 10, 'http://plita.kh.ua/publ/?page{page_num}');