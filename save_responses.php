<?php
include ("session.php");
if(isset($_POST['answer'])){
include ("bd.php");

//проверяем, существует ли запись ответов пользователя, если нет - создаем
$user_ans = mysqli_query($link, 'SELECT user_id FROM `answers` WHERE user_id = "'.$user_id.'"');
$user_exist = mysqli_fetch_row($user_ans);
if(empty($user_exist)){
    mysqli_query($link,'INSERT INTO answers (user_id) VALUES ("'.$user_id.'")');
}
mysqli_free_result($user_ans);

//записываем ответы
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
$ans_query = 'UPDATE answers SET '.$str.' WHERE user_id="'.$user_id.'"'; 
mysqli_query($link, $ans_query);
$i=$i+1;
}
mysqli_close($link);

header("Location: http://".$_SERVER['HTTP_HOST']."/lc.php");
}else{
    exit("Данные не переданы<br><a href=\"lc.php\">Личный кабинет</a>");
}
?>