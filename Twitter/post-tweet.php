<?php

function post_tweet($tweet_text) {


  require_once("twitteroauth.php"); //Path to twitteroauth library
     
  $twitteruser = 'USERNAME';
  $consumerkey = "CONSUMER_KEY";
  $consumersecret = "CONSUMER_SECRET";
  $accesstoken = "ACCESS_TOKEN";
  $accesstokensecret = "ACCESS_SECRET";
   
  function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
    $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return $connection;
  }
   
  $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
   
  $status = $connection->post('https://api.twitter.com/1.1/statuses/update.json', array('status' => $tweet_text));
   
  return $status;


}

?>