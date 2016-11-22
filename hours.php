<?php
	require_once('TwitterAPIExchange.php');
	$settings = array(
    'oauth_access_token' => "874741267-16upSWEzW4yffVvZGqiUtHzThfYHAM3yD8FKKBHK",
    'oauth_access_token_secret' => "g7NvpdGDmFARjJNUIMs3MuCgBdEyzITCIZMkNYEQQtjNg",
    'consumer_key' => "AXPAvKMDGrgc0SooteLJf7H0P",
    'consumer_secret' => "BHzkQp92ThvMXQe46LFxUWc0KneyhR03E3lFkLxfmhYaiEMmU5"
	);
	$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
	$requestMethod = "GET";
	if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "1992TCB_hours";}
	if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 1;}
	$getfield = "?screen_name=$user&count=$count";
	$twitter = new TwitterAPIExchange($settings);
	$string = json_decode($twitter->setGetfield($getfield)
	->buildOauth($url, $requestMethod)
	->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
foreach($string as $items)
    {
        echo  $items['text']."<br />";
        }
?>