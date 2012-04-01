<?php
class Tweets extends Zend_Db_Table_Abstract
{
	protected $_name = 'tweets';
    protected $_primary = 'idd';
	private $time_stamp;
	public function get_tweets(){	
		$twitterSearch  = new Zend_Service_Twitter_Search('json');
		$searchResults  = $twitterSearch->search('Bills.com', array('lang' => 'en'));
		$result = $searchResults["results"];		
		foreach($result as $key => $values){
				if($values["created_at"]) {
					$date_pieces = explode(",", $values["created_at"]);
					$date_pieces = explode("+", $date_pieces[1]);
					$date_pieces[0] = str_replace(":", " ", $date_pieces[0]);
					$date_pieces = explode(" ", $date_pieces[0]);			
					$day =  $date_pieces[1];
					$month = $this->get_day($date_pieces[2]);
					$year = $date_pieces[3];					
					$hour = $date_pieces[4];
					$minute = $date_pieces[5];
					$second = $date_pieces[6];					
					$values["created_at"] = mktime($hour, $minute, $second, $month, $day, $year);		
				}
			unset($values["metadata"]);
			//$this->insert($values);
		}
		$select = $this->select()->order("created_at DESC");
		$rows = $this->fetchAll($select)->toArray();
		return $rows;		
	}
	

	
	private function get_day($date)
	{
		
		switch($date)
		{
			case "Jan":
			return 1;
			break;
			
			case "Feb":
			return 2;
			break;
			
			case "Mar":
			return 3;
			break;
			
			case "Apr":
			return 4;
			break;
			
			case "May":
			return 5;
			break;
			
			case "Jun":
			return 6;
			break;
			
			case "Jul":
			return 7;
			break;
			
			case "Aug":
			return 8;
			break;
			
			case "Sep":
			return 9;
			break;
			
			case "Oct":
			return 10;
			break;
			
			case "Nov":
			return 11;
			break;
			
			case "Dec":
			return 12;
			break;
			
		}
	}
		

}
