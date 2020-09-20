<?php
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

    $getfield = '?screen_name=kanyewest&count=2000&exclude_replies=true&tweet_mode=extended';
    $twitter = new TwitterAPIExchange($settings);
    $response_kanye = json_decode($twitter -> setGetField($getfield)
                        -> buildOauth($url, $requestMethod)
                        -> performRequest(), $assoc=TRUE);

    
    $filtered_kanye = array();
    foreach($response_kanye as $key){
        if(!$key['is_quote_status'] && !$key['retweeted'] && empty($key['entities']['user_mentions']) && !isset($key['entities']['media']) && empty ($key['entities']['media']) && empty($key['entitites']['urls'])){
            array_push($filtered_kanye, $key['full_text']);
            // echo '<p>'. $key['full_text'] . '</p><br>';
        }
    }
    
?>