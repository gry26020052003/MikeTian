<?php
require_once(APPLICATION_PATH."/models/Tweets.php");
class EventController extends Zend_Controller_Action
{

    public function init(){
    }
    public function indexAction(){
		$twitter = new Tweets();
		$rows = $twitter->get_tweets();
		$this->view->rows = $rows;
	}
}

