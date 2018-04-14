<?php
include ("session.php");
include ("bd.php");
?>
<html>
<head>
<title>Личный кабинет</title>
</head>
<body>
<h2>Личный кабинет</h2>
<p>Добрый день, <?php echo $user_name." ".$user_last_name; ?></p>
<p>Вы вошли с логином: <?php echo $login; ?></p>
<p>Ваше расположение: 
<?php 
$location = mysqli_query($link, 'SELECT location FROM `location` WHERE loc_id = "'.$user_location.'"');
$user_loc = mysqli_fetch_row($location);
echo $user_loc[0]; ?></p>
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
<form action='save_responses.php' method='post' id="answers">
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
$a = 0;
//строим таблицу с вариантами и отображаем выбор пользователя
for($j=1;$j<=5;){
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
                echo "<option value=\"".$dish_id."\"".$sel.">".$dish_name."</option>";
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