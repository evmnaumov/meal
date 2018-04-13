<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
$login = $_SESSION['login'];
$user_id = $_SESSION['user_id'];
$admin = $_SESSION['admin'];
?>
<html>
<head>
<title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
<p>Вы вошли на сайт, как "<?php echo $login; ?>"</p>
<br>
<?php
if ($admin == 1){
    echo "<a href=\"admin.php\">Админ-панель</a><br>";
}
?>
<form action="logout.php" method="post">
<input type="submit" name="submit" value="Выйти">
</form>
<div id="content">
<form action='do.php' method='post' id="answers">
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
echo "<tr>
        <td><h4>".$day."</h4></td>";
//запрашиваем выбор пользователя

$answer_query = 'SELECT `'.$qday.'` FROM `answers` WHERE user_id="'.$user_id.'"';
$answer = mysqli_query($link,$answer_query);
while ($ans_row = mysqli_fetch_row($answer)){
        $ans = $ans_row[0];
        $ameal = explode(",",$ans);
}
mysqli_free_result($answer);
//строим таблицу с вариантами и отображаем выбор пользователя
for($j=1;$j<=5;){
        $a = 0;
        echo "<td class=\"col_$j\">
                <select id=\"list\" name=\"answer[$i][$j]\" form=\"answers\">
                <option value=\"non\">-----</option>";
        $dish_query=mysqli_query($link,'SELECT `dish_id`, `name` FROM `dish` WHERE day="'.$i.'" AND meal="'.$j.'"');
        while ($dish_arr = mysqli_fetch_row($dish_query)){
                $dish_id = $dish_arr[0];
                $dish_name = $dish_arr[1];
                $sel_meal = $ameal[''.$a.''];
                $sel = "";
                if($sel_meal==$dish_id){
                        $sel = "selected=\"selcted\"";
                }
                echo "<option value=\"".$dish_id."\"".$sel.">".$dish_name, $sel_meal."</option>";
        }
        mysqli_free_result($dish_query);
        echo "</select>
                        </td>";
$j=$j+1;
$a=$a+1;
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