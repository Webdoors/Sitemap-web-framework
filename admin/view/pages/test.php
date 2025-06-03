<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// echo file_get_contents("http://176.221.209.79:8089/api/info/GetApiInfo");


$url = 'https://srv.webdoors.ge:2222/';
$username = 'admin';
$password = '4rB9@3nAYowqJtF7hs';
    $fields = array(
        'username'=>urlencode($username),
        'password'=>urlencode($password)
        );
    $fields_string='';
    foreach($fields as $key=>$value) { 
        $fields_string .= $key.'='.$value.'&'; 
    }
    rtrim($fields_string,'&');
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
    $result = curl_exec($ch);
    if($result===false) {
        echo 'CURL ERROR: '.curl_error($ch);
    }
    curl_close($ch);

    var_dump($result);