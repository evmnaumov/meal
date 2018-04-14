<?php
session_start();
if (empty($_SESSION['login']) or empty($_SESSION['user_id']))
{
  header("Location: http://".$_SERVER['HTTP_HOST']."/meal/login.php");
}else{
$login = $_SESSION['login'];
$user_id = $_SESSION['user_id'];
$admin = $_SESSION['admin'];
$user_name = $_SESSION['name'];
$user_last_name = $_SESSION['last_name'];
$user_location = $_SESSION['location'];
}
?>