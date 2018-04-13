<?php
include("bd.php");
$answer_query = 'SELECT `mon` FROM `answers` WHERE user_id="4"';
$answer = mysqli_query($link,$answer_query);
while ($ans_row = mysqli_fetch_assoc($answer)){
        $ans = $ans_row[''.$qday.''];
        $ameal = explode(",",$ans);
        print_r($ameal);
}
mysqli_free_result($answer);
?>