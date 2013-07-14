<?php

function twitter_info($username)
{

    require_once("twitteroauth.php"); //Path to twitteroauth library
     
    $twitteruser = $username;
    $notweets = 10;
    $consumerkey = "CONSUMER_KEY";
    $consumersecret = "CONSUMER_SECRET";
    $accesstoken = "ACCESS_TOKEN";
    $accesstokensecret = "ACCESS_SECRET";
     
    function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
      $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
      return $connection;
    }
     
    $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
     
    $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
     
    return $tweets;

}

$twitter_username = "USERNAME";
$arr = twitter_info($twitter_username);
echo '<ul>';
foreach($arr as $r)
{
	echo '<li>'.$r->text.'</li>';
}
echo '</ul>';
?>