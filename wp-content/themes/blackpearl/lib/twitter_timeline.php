<?php

/*
 * Class Name: Twitter Timeline
 * Class URI: http://www.sacredpixel.com
 * Description: Class that shows and caches recent tweets (up to 20)
 * Version: 1.0.1
 * Author: Mohsen Heydari
 * Author URI: http://www.sacredpixel.com
 */

include_once("cacheable.php");

class Twitter_Timeline
{
	protected $cacheable;
	public    $cache_dir   = '/twitter_cache/';
	
	function __construct() {
		$this->cacheable = new Cacheable();
		$this->cacheable->cache_dir  = dirname(__FILE__) . $this->cache_dir;
    }
	
	public function SetCacheTime($time)
	{
		//Sets tweet cache time (in seconds)
		$this->cacheable->cache_time = $time;
	}
	
	public function SetWorkingDir($dir)
	{
		$this->cacheable->cache_dir =  $dir . $this->cache_dir;
	}
	
	//Clear the cache directory
	public function Clear()
	{
		$this->cacheable->Clear();
	}
	
	public function TheTimeline($username, $number)
	{
		//Use output caching if possible
		if($this->cacheable->InitCache($username)) return;
	
		// create a new cURL resource
		$curl = curl_init();
		// set URL and other appropriate options
		$options = array(CURLOPT_URL => 'http://api.twitter.com/1/statuses/user_timeline/'. $username .'.json?count=' . $number,
			CURLOPT_RETURNTRANSFER => true
		);
		
		// set URL and other appropriate options
		curl_setopt_array($curl, $options);
		// grab URL and pass it to the parser
		$json = curl_exec($curl);
		
		if(curl_errno($curl) || $json == '')
		{
			$this->cacheable->Abort();
			
			if(curl_errno($curl))
				echo 'Error: ' . curl_error($curl) . ' Error No: ' . curl_errno($curl);
			else
				echo 'Error: got empty response from twitter';
			
			// close cURL resource, and free up system resources
			curl_close($curl);
			return;
		}
		curl_close($curl);
		
		//Convert the response string to PHP object
		$obj = json_decode($json);
		
		if($obj == NULL)
		{
			echo 'Error: Could not decode the twitter response.\r\njson: ' . $json;
			$this->cacheable->EndCache();
			return;
		}
		
		//Check for errors
		if(is_object($obj) &&
		  (property_exists($obj, 'error') || 
		   property_exists($obj, 'errors')))
		{
			if(property_exists($obj, 'error'))
				echo 'Twitter Error: ' . $obj->error;
			else
			{
				echo 'Twitter Error: ';
				print_r($obj->errors);
			}
			
			$this->cacheable->EndCache();
			return;
		}
		
		foreach($obj as $i => $value)
		{
			$this->Print_Timeline($value, $i);
		}
		
		$this->cacheable->EndCache();
	}
	
	//Can be overridden to provide custom formatting
	protected function Print_Timeline($value, $i)
	{
		$status = $this->ConvertReplies( $this->ConvertUrls($value->text) );
		
		echo '<li><span>' . $status . '</span><br/><a class="link" href="http://twitter.com/' . $value->user->screen_name . '/statuses/' . $value->id_str . '">' . $this->RelativeTime($value->created_at) . '</a></li>';
	}
	
	protected function ConvertUrls($status)
	{
		return preg_replace('/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;\'">\:\s\<\>\)\]\!])/', '<a href="$1">$1</a>', $status);
	}

	protected function ConvertReplies($status)
	{
		return preg_replace_callback('/\B@([_a-z0-9]+)/i', array( &$this, 'ReplyRegex_Callback' ), $status);
	}

	protected function ReplyRegex_Callback($matches)
	{
		return $matches[0]{0} . '<a href="http://twitter.com/'. $matches[1] .'">'. $matches[1] .'</a>';
	}

	protected function RelativeTime($a) 
	{
		//get current timestampt
		$b = strtotime("now"); 
		//get timestamp when tweet created
		$c = strtotime($a);
		//get difference
		$d = $b - $c;
		//calculate different time values
		$minute = 60;
		$hour = $minute * 60;
		$day = $hour * 24;
		$week = $day * 7;
		
		if(is_numeric($d) && $d > 0) {
			//if less then 3 seconds
			if($d < 3) return _("right now");
			//if less then minute
			if($d < $minute) return floor($d) . _(" seconds ago");
			//if less then 2 minutes
			if($d < $minute * 2) return _("about 1 minute ago");
			//if less then hour
			if($d < $hour) return floor($d / $minute) . _(" minutes ago");
			//if less then 2 hours
			if($d < $hour * 2) return _("about 1 hour ago");
			//if less then day
			if($d < $day) return floor($d / $hour) . _(" hours ago");
			//if more then day, but less then 2 days
			if($d > $day && $d < $day * 2) return _("yesterday");
			//if less then year
			if($d < $day * 365) return floor($d / $day) . _(" days ago");
			//else return more than a year
			return _("over a year ago");
		}
	}
	
}

?>