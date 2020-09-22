<?php

    //using the OAuth, twitteroauth, and TwitterAPIExchange files from Abraham
    require_once('./include/OAuth.php');
    require_once('./include/TwitterAPIExchange.php');
    require_once('./include/twitteroauth.php');

    require_once('./include/config.php');

    $requestMethod = 'GET';

    $settings = array(
        'consumer_key' => '0wwKDnOzujytSgw8J7iWb98IC',
        'consumer_secret' => 'MfrNFCLCD2SRgkeiOL5SIgo7mFwUOju9zBEi5y3jxfBJkhmC1X',
        'oauth_access_token' => '1166031996977438720-ojZ43kKrJaHP9vhHNEpkfEdH2IgBJm',
        'oauth_access_token_secret' => 'miZEclN4jhsRgH0jAtRUGfieRjwJ1fiNKvL4lIrhBX08E',
    );

    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $twitter = new TwitterAPIExchange($settings);

?>