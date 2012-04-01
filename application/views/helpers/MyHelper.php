<?php

class App_View_Helper_MyHelper extends Zend_View_Helper_Abstract
{
    public function myHelper($myParam1)
    {
		$now = time();
		echo "<form>";
		echo "<div id='container'>";
		foreach($myParam1 as $value)
		{
			$result = $this->duration($now, $value["created_at"]);
		?>

        <div id="<?php echo 'twitter_id_'.$value['idd']; ?>"/>      
        	<input type="checkbox" style="float:left; margin-top:20px;" id="<?php echo $value["idd"];?>"/> 
        	<img src="<?php echo $value["profile_image_url"];?>" width="50" height="50" />
            <div id="each">
            	<span id="from_user"> <?php echo $value["from_user"].":  ";?> </span> <span id="to_user"><?php echo $value["to_user"] ?></span>  <span id="text"><?php echo $value["text"] ?></span>
                <br /> <span id="duration"> <?php echo $result. " ago";?> </span> <span><a href="<?php echo $value["source"];?>">View Tweet</a></span>
            </div>
        </div>
        <?php
		}
		echo "</form>";
		echo "</div>";
    }
	
	private function time_difference($now, $twitter_time)
	{
		$difference = $now - $twitter_time;
		return  $difference;
	}
	
	
	private function duration($end,$start) 
	{   
		 $seconds = $end - $start;  
  		 $days = floor($seconds/60/60/24);  
         $hours = $seconds/60/60%24;  
         $mins = $seconds/60%60;  
         $secs = $seconds%60; 
		  
         $duration='';  
         if($days>0) $duration .= "$days days ";   
         if($hours>0) $duration .= "$hours hours ";  
         if($mins>0) $duration .= "$mins minutes ";  
         if($secs>0) $duration .= "$secs seconds ";  
   
 		$duration = trim($duration);  

 		if($duration==null) $duration = '0 seconds';   
 			return $duration;  
		} 
}