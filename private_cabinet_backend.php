<?php
$mysql = new mysqli("localhost", "root", "", "big_spbu_project" );
$mysql->query("SET NAMES 'utf8' ");

$email_info = $_COOKIE['email_info'];
$email = $mysql->query("SELECT email FROM users WHERE email = '$email_info'")->fetch_assoc()['email'];

$name_info = $_COOKIE['name_info'];
$name = $mysql->query("SELECT name FROM users WHERE email = '$email_info'")->fetch_assoc()['name'];

$surname_info = $_COOKIE['surname_info'];
$surname = $mysql->query("SELECT surname FROM users WHERE email = '$email_info'")->fetch_assoc()['surname'];

$mysql->close();
?>
