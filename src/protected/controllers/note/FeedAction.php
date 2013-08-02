<?php

class FeedAction extends PageAction{
	
	public function runPage(){
		$this->requireLogin();
		$id = $_GET['id'];
	}
}