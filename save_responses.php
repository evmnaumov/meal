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
*/
$day=$_POST['answer'];
$i=1;
foreach($day as $value){
   switch($i){
       case 1:
        $data = implode(",", $value);
        $str = "mon=\"".$data."\"";
        break;
       case 2:
        $data = implode(",", $value);
        $str = "tue=\"".$data."\"";
        break;
       case 3:
        $data = implode(",", $value);
        $str = "wen=\"".$data."\"";
        break; 
        case 4:
        $data = implode(",", $value);
        $str = "thu=\"".$data."\"";
        break;
        case 5:
        $data = implode(",", $value);
        $str = "fri=\"".$data."\"";
        break;
   }
$ans_query = `UPDATE answers SET $str WHERE user_id="$user_id"`; 
mysqli_query($link, $ans_query);  
$i=$i+1;
}
mysqli_close($link);

//echo "Данные сохранены!";
?>