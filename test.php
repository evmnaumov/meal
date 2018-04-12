<?php
include("bd.php");
for($i=1;$i<=5; $i++){
$dish_query='SELECT dish_id, name FROM `dish` WHERE day="'.$i.'" AND meal="1"';
$dish= mysqli_query($link,$dish_query);
while ($dish_arr = mysqli_fetch_assoc($dish)){
echo $dish_arr['dish_id'];
echo $dish_arr['name'];
echo "<br>";
}
}
session_start();
print_r($_SESSION);
?>