<?php

/* constants */
$app_url = 'https://laravel-for-the-road-joe-barber.c9users.io';
$refresh_speed = 10;

/* facebook constants */
//Set your App ID and App Secret.
$appID = '613451335484817';
$appSecret = 'c8803XoKu8wiMbjGNy06cD3j5hk';
//Create an access token using the APP ID and APP Secret.
$accessToken = $appID . '|' . $appSecret;
//The ID of the Facebook event page in question.
$event_id = '1032231500224836';

function getEventFeed($event_id, $access_token) {
    $url = "https://graph.facebook.com/$event_id/feed?access_token=$access_token";
 
    //Make the API call
    $result = file_get_contents($url);
 
    //Decode the JSON result.
    $full_event_feed = json_decode($result, true);
    
    //return just the 5 most recent
    $most_recent_messages = array_slice($full_event_feed, 0, 5);
    
    //return
    return $most_recent_messages;
}

function getPostDetails($post_id) {
    $url = "https://graph.facebook.com/".$post_id."/";
    
    //Make the API call
    //$result = file_get_contents($url);
    
    $curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
$result = curl_exec($curl_handle);
curl_close($curl_handle);
 
    //Decode the JSON result.
    $decoded = json_decode($result, true);
    
    //return
    return $decoded;
}

function getUserPictureDetails($user_id) {
    $url = "https://graph.facebook.com/".$user_id."/picture/?redirect=false";
    
    //Make the API call
    //$result = file_get_contents($url);
 
    $curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
$result = curl_exec($curl_handle);
curl_close($curl_handle);
 
    //Decode the JSON result.
    $decoded = json_decode($result, true);
    
    //return
    return $decoded['data']['url'];
}

function getPostPhotoDetails($photo_id) {
    $url = "https://graph.facebook.com/".$photo_id."/";
    
    //Make the API call
    //$result = file_get_contents($url);
    
    $curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
$result = curl_exec($curl_handle);
curl_close($curl_handle);
 
    //Decode the JSON result.
    $decoded = json_decode($result, true);
    
    //return
    return $decoded;
}