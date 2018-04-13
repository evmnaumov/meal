<?php
session_start();
$login = $_SESSION['login'];
$user_id = $_SESSION['user_id'];
$admin = $_SESSION['admin'];
include ("bd.php");
/*if($_POST['answer']){
    mysqli_query($link, 'DELETE FROM `answers` WHERE user_id="'.$user_id.'"');
}
mysqli_query($link,"SET NAMES 'utf8'");

$day=$_POST['answer'];
$i=1;
foreach($day as $value){
    $j=1;
    foreach($value as $dish){
        $data = explode("\n",$dish);
        foreach($data as $text){
            $query = 'INSERT INTO dish (name, day, meal) VALUES ("'.$text.'","'.$i.'","'.$j.'")';
            mysqli_query($link, $query);
        }
        $j=$j+1;
        }
    $i=$i+1;
    }*/
print_r($_POST);
mysqli_close($link);

//echo "Данные сохранены!";
?>