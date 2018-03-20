<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Messenger</title>
</head>
<body>
<div id="content">
<form action='do.php' method='post'>
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
            $attr_day = "mon_";
    break;
    case 2: $day = "Вторник";
            $attr_day = "tue_";
    break;
    case 3: $day = "Среда";
            $attr_day = "wen_";
    break;
    case 4: $day = "Четверг";
            $attr_day = "thu_";
    break;
    case 5: $day = "Пятница";
            $attr_day = "fri_";
    break;
}
echo "<h1>".$day."</h1>";
for($j=1;$j<=5;){
$dish= mysqli_query($link,'SELECT name FROM `dish` WHERE day=".$i." AND meal=".$j."');
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
<textarea name='<?php echo $attr_day;?>[<?php echo $j;?>]'></textarea><br>
<?php
echo $dish;
$j=$j+1;
}
$i=$i+1;
}
?>

<!--        <h1>Понедельник</h1> 
        <h3>Салат</h3> 
        <textarea name='mon[1]'></textarea>
		   
        <h3>Первое</h3> 
        <textarea name='mon[2]'></textarea>
		   
        <h3>Основное</h3> 
        <textarea name='mon[3]'></textarea>
		   
        <h3>Гарнир</h3> 
        <textarea name='mon[4]'></textarea>
		   
        <h3>Десерт</h3> 
        <textarea name='mon[5]'></textarea>
		 <hr>

        <h1>Вторник</h1> 
        <h3>Салат</h3> 
        <textarea name='tue[1]'></textarea>
		   
        <h3>Первое</h3> 
        <textarea name='tue[2]'></textarea>
		   
        <h3>Основное</h3> 
        <textarea name='tue [3]'></textarea>
		   
        <h3>Гарнир</h3> 
        <textarea name='tue [4]'></textarea>
		   
        <h3>Десерт</h3> 
        <textarea name='tue [5]'></textarea>
		 <hr>

        <h1>Среда</h1> 
        <h3>Салат</h3> 
        <textarea name='wen [1]'></textarea>
		   
        <h3>Первое</h3> 
        <textarea name='wen [2]'></textarea>
		   
        <h3>Основное</h3> 
        <textarea name='wen [3]'></textarea>
		   
        <h3>Гарнир</h3> 
        <textarea name='wen [4]'></textarea>
		   
        <h3>Десерт</h3> 
        <textarea name='wen [5]'></textarea>
		 <hr>

        <h1>Четверг</h1> 
        <h3>Салат</h3> 
        <textarea name='thu [1]'></textarea>
		   
        <h3>Первое</h3> 
        <textarea name='thu [2]'></textarea>
		   
        <h3>Основное</h3> 
        <textarea name='thu [3]'></textarea>
		   
        <h3>Гарнир</h3> 
        <textarea name='thu [4]'></textarea>
		   
        <h3>Десерт</h3> 
        <textarea name='thu [5]'></textarea>
		 <hr>

        <h1>Пятница</h1> 
        <h3>Салат</h3> 
        <textarea name='fri [1]'></textarea>
		   
        <h3>Первое</h3> 
        <textarea name='fri [2]'></textarea>
		   
        <h3>Основное</h3> 
        <textarea name='fri [3]'></textarea>
		   
        <h3>Гарнир</h3> 
        <textarea name='fri [4]'></textarea>
		   
        <h3>Десерт</h3> 
        <textarea name='fri [5]'></textarea>
		 <hr>-->
    <?php
mysqli_close($link);
?>
        <br><hr>
        <input type='submit' value='Сохранить'>
</form>
</div>
</body>
</html>