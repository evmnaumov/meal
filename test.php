<?php
include("bd.php");
$answer_query = 'SELECT `'.$qday.'` FROM `answers` WHERE user_id="'.$user_id.'"';
$answer = mysqli_query($link,$answer_query);
while ($ans_row = mysqli_fetch_assoc($answer)){
        $ans = $ans_row[''.$qday.''];
        $ameal = explode(",",$ans);
        print_r($ameal);
}
mysqli_free_result($answer);
?>