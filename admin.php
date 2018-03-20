<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Messenger</title>
</head>
<body>
<div id="content">
<form action='do.php' method='post'>
<table border="1">
<td>
<tr></tr>
<tr>Салат</tr>
<tr>Первое</tr>
<tr>Основное</tr>
<tr>Гарнир</tr>
<tr>Десерт</tr>
</td>
<?php
//$xml = simplexml_load_file("db.xml");

// Соединяемся, выбираем базу данных
$link = mysqli_connect('localhost', 'meal', 'dbywtckfd');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$meal = mysqli_select_db($link,'meal');
mysqli_query($link,"SET NAMES 'utf8'");

for($i=1;$i<=5;){
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
echo "<td><tr><h1>".$day."</h1></tr>";
for($j=1;$j<=5;){
$query='SELECT name FROM `dish` WHERE day="'.$i.'" AND meal="'.$j.'"';
$dish= mysqli_query($link,$query);
$data=array();
while ($row = $dish->fetch_array())
    $data[] = $row[0];
$names = implode("\n",$data);
switch($j){
    case 1: $meal = "Салат";
    break;
    case 2: $meal = "Первое";
    break;
    case 3: $meal = "Основное";
    break;
    case 4: $meal = "Гарнир";
    break;
    case 5: $meal = "Десерт";
    break;
}
echo "<h3>".$meal."</h3>";
?>
<tr><textarea name='menu[<?php echo $i;?>][<?php echo $j;?>]'><?php echo $names;?></textarea></tr>
<?php
$j=$j+1;
}
echo "</td>";
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