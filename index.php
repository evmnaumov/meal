<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['login']))
{
  header("Location: http://".$_SERVER['HTTP_HOST']."/meal/login.php");
}
else
   {
    header("Location: http://".$_SERVER['HTTP_HOST']."/meal/lc.php");
    }
?>
