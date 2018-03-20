<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Messenger</title>
<style>
#text{
    width: 220px;
    height: 125px;
}
</style>
</head>
<body>
<div id="content">
<form action='do.php' method='post'>
<table border="1">
<tr>
<td></td>
<td class="col_1"><h4>Салат</h4></td>
<td class="col_2"><h4>Первое</h4></td>
<td class="col_3"><h4>Основное</h4></td>
<td class="col_4"><h4>Гарнир</h4></td>
<td class="col_5"><h4>Десерт</h4></td>
</tr>
<?php
// Соединяемся, выбираем базу данных
$link = mysqli_connect('localhost', 'meal', 'dbywtckfd');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$meal = mysqli_select_db($link,'meal');
include ("bd.php");
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
echo "<td><h4>".$day."</h4></td>";
for($j=1;$j<=5;){
$query='SELECT name FROM `dish` WHERE day="'.$i.'" AND meal="'.$j.'"';
$dish= mysqli_query($link,$query);
$data=array();
while ($row = $dish->fetch_array())
    $data[] = $row[0];
$names = implode("\n",$data);
?>
<td class="col_<?php echo $j;?>"><textarea id="text" name='menu[<?php echo $i;?>][<?php echo $j;?>]'><?php echo $names;?></textarea></td>
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