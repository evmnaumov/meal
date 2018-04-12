<?php
include("bd.php");
$dish_query='SELECT dish_id, name FROM `dish` WHERE day="1" AND meal="1"';
$dish= mysqli_query($link,$query);
while ($dish_arr = mysqli_fetch_assoc($dish)){
echo $dish_arr['dish_id'];
echo $dish_arr['name'];
echo "<br>";
}
?>