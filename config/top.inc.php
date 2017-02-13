<?php
require_once 'config.php';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $datebase);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Polaczenie nieudane. Blad: " . $conn->connect_error);
}

// include_once (__DIR__. '../../classes/user.class.php');
//
// $user = new User();
//
// include_once (__DIR__. '../../classes/tweet.class.php');
//
// $tweet = new Tweet();
