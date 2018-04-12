<?php
include("bd.php");
$day = "mon";
$answer_query = "SELECT `'.$qday.'` FROM `answers` WHERE user_id=`4`";
$answer = mysqli_query($link,$answer_query);
while ($ans_row = mysqli_fetch_assoc($answer)){
print_r($ans_row);
}
?>