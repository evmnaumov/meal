<?php
include("bd.php");
$qday = "mon";
$answer_query = 'SELECT `'.$qday.'`, `tue` FROM `answers` WHERE user_id="4"';
$answer = mysqli_query($link,$answer_query);
while ($ans_row = mysqli_fetch_assoc($answer)){
$ans_row = $ans_row[''.$qday.''];
$ameal = explode(",",$ans_row);
echo $ameal[0]."<br>";
echo $ameal[1]."<br>";
echo $ameal[2]."<br>";
echo $ameal[3]."<br>";
echo $ameal[4];
}
?>