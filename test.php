<?php
include ("bd.php");

//проверяем, существует ли запись ответов пользователя, если нет - создаем
$user_ans = msqli_query($link, 'SELECT * FROM asnwers WHERE user_id = "'.$user_id.'"');
while($user_exist = mysqli_fetch_row($user_ans)){
print_r($user_exist);
}
mysqli_free_result($user_ansasdf);
?>