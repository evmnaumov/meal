<?php
$link = mysqli_connect('localhost', 'meal', 'dbywtckfd');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$meal = mysqli_select_db($link,'meal');

function mysql_fetch_array($result){
    if($result){
    $row =  $result->fetch_assoc();
    return $row;
   }
}
?>