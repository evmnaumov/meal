<?php
    // Соединяемся, выбираем базу данных

$link = mysqli_connect('localhost', 'meal', 'dbywtckfd');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_select_db($link,'meal');
mysqli_query($link, 'DELETE FROM `dish`');
mysqli_query($link, 'ALTER TABLE `dish` AUTO_INCREMENT=1');
mysqli_query($link,"SET NAMES 'utf8'");

$day=$_POST['menu'];
$i=1;
foreach($day as $value){
    $j=1;
    foreach($value as $dish){
        $data = explode("\n",$dish);
        foreach($data as $text){
            $query = 'INSERT INTO dish (name, day, meal) VALUES ("'.$text.'","'.$i.'","'.$j.'")';
            mysqli_query($link, $query);
        }
        $j=$j+1;
        }
    $i=$i+1;
    }
mysqli_close($link);

echo "Данные сохранены!";
?>