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
        $mon = implode(",", $value);
        echo $mon;
        break;
       case 2:
        $tue = implode(",", $value);
        echo $tue;
        break;
       case 3:
        $wen = implode(",", $value);
        echo $wen;
        break; 
        case 4:
        $thu = implode(",", $value);
        echo $thu;
        break;
        case 5:
        $fri = implode(",", $value);
        echo $fri;
        break;
   }
$i=$i+1;
}
echo $login;
print_r($_POST);
mysqli_close($link);

//echo "Данные сохранены!";
?>