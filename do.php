<?php
    // Соединяемся, выбираем базу данных

$link = mysqli_connect('localhost', 'tabs', 'rebOOt365');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$tabs_db = mysqli_select_db($link,'tabs');

$arr=$_POST['txt'];
    foreach($arr as $value){
        $image = $value["image"];
        $title = $value["title"];
        $price = $value["price"];
        $desc = $value["description"];
        echo "$image, $title, $price, $desc<br>";
        $query = 'INSERT INTO test (image, title, price, description) VALUES ("'.$image.'","'.$title.'","'.$price.'","'.$desc.'")';
        echo "$query <br>";
        mysqli_query($link, $query);
    }



mysqli_close($link);
?>