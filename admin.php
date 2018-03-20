<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Messenger</title>
<style>
#text{
    width: 220px;
    height: 120px;
}
</style>
</head>
<body>
<div id="content">
<form action='do.php' method='post'>
<table border="1">
<tr>
<td></td>
<td>Салат</td>
<td>Первое</td>
<td>Основное</td>
<td>Гарнир</td>
<td>Десерт</td>
</tr>
<?php
// Соединяемся, выбираем базу данных
$link = mysqli_connect('localhost', 'meal', 'dbywtckfd');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$meal = mysqli_select_db($link,'meal');
mysqli_query($link,"SET NAMES 'utf8'");

for($i=1;$i<=5;){
    echo "<tr>";
switch($i){
    case 1: $day = "Понедельник";
    break;
    case 2: $day = "Вторник";
    break;
    case 3: $day = "Среда";
    break;
    case 4: $day = "Четверг";
    break;
    case 5: $day = "Пятница";
    break;
}
echo "<td><h3>".$day."</h3></td>";
for($j=1;$j<=5;){
$query='SELECT name FROM `dish` WHERE day="'.$i.'" AND meal="'.$j.'"';
$dish= mysqli_query($link,$query);
$data=array();
while ($row = $dish->fetch_array())
    $data[] = $row[0];
$names = implode("\n",$data);
?>
<td><textarea id="text" name='menu[<?php echo $i;?>][<?php echo $j;?>]'><?php echo $names;?></textarea></td>
<?php
$j=$j+1;
}
echo "</tr>";
$i=$i+1;
}
mysqli_close($link);
?>
</table><br>
<input type='submit' value='Сохранить'>
</form>
</div>
</body>
</html>