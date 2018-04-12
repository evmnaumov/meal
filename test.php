<?php
include("bd.php");
$qday = "mon";
$answer_query = 'SELECT `'.$qday.'`, `tue` FROM `answers` WHERE user_id="4"';
$answer = mysqli_query($link,$answer_query);
while ($ans_row = mysqli_fetch_assoc($answer)){
$ans_row = $ans_row[''.$qday.''];
$ameal = explode(",".$ans_row);
echo $ameal[0];
echo $ameal[1];
echo $ameal[2];
echo $ameal[3];
echo $ameal[4];
}
?>