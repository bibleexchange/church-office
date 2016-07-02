<?php namespace App;

class Card {
	public function __construct($title, $data, $dataPost, $url, $icon, $links, $color){
		
		$this->bgColors = ['','bg-aqua','bg-green','bg-yellow','bg-red'];
		
		$this->title = $title;
		$this->data = $data;
		$this->dataPost = $dataPost;
		$this->url = $url;
		$this->icon = $icon;
		$this->color = $this->bgColors[$color];
		$this->links = $links;		
	}
}