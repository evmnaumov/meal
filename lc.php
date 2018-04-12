<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
?>
<html>
<head>
<title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
<p>Вы вошли на сайт, как "<?php echo $_SESSION['login']; ?></p>
<br>
<?php
if ($_SESSION['user_id'] = 1){
    echo "<a href=\"admin.php\">Админ-панель</a><br>";
}
?>
<form action="logout.php" method="post">
<input type="submit" name="submit" value="Выйти">
</form>
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
include ("bd.php");
mysqli_query($link,"SET NAMES 'utf8'");

for($i=1;$i<=5;){
    echo "<tr>";
switch($i){
    case 1: $day = "Понедельник";
            $qday= "mon";
    break;
    case 2: $day = "Вторник";
            $qday = "tue";
    break;
    case 3: $day = "Среда";
            $qday = "wen";
    break;
    case 4: $day = "Четверг";
            $qday = "thu";
    break;
    case 5: $day = "Пятница";
            $qday = "fri";
    break;
}
echo "<td><h4>".$day."</h4></td>";
//запрашиваем выбор пользователя
$answer_query = 'SELECT `'.$qday.'` FROM `answers` WHERE user_id="'.$_SESSION['user_id'].'"';
$answer = mysqli_query($link,$answer_query);
while ($ans_row = fetch_assoc($answer)){
//строим таблицу с вариантами и отображаем выбор пользователя
for($j=1;$j<=5;){
$dish_query='SELECT name FROM `dish` WHERE day="'.$i.'" AND meal="'.$j.'"';
$dish= mysqli_query($link,$query);
$data=array();
while ($row = $dish->fetch_array())
    $data[] = $row[0];
$names = implode("\n",$data);
?>
<td class="col_<?php echo $j;?>">
<select id="list" name='answer[<?php echo $i;?>][<?php echo $j;?>]'><?php echo $names;?></select></td>
<?php
$j=$j+1;
}
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