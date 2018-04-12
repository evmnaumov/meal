<?php
include("bd.php");
for($i=1;$i<=5; $i++){
$dish_query='SELECT dish_id, name FROM `dish` WHERE day="'.$i.'" AND meal="1"';
$dish= mysqli_query($link,$dish_query);
while ($dish_arr = mysqli_fetch_assoc($dish)){
echo $dish_arr['dish_id'];
echo $dish_arr['name'];
echo "<br>";
}
}
session_start();
$login = $_SESSION['login'];
$user_id = $_SESSION['user_id'];
$admin = $_SESSION['admin'];

echo $login;
echo $user_id;
echo $admin;
?>