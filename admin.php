<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
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
$tabs_db = mysqli_select_db($link,'dish');
/*
if($_POST['txt']){

    mysqli_query($link, 'DELETE FROM `test`');
    $arr=$_POST['txt'];
    foreach($arr as $value){
        $image = $value["image"];
        $title = $value["title"];
        $price = $value["price"];
        $desc = $value["description"];
        $query = 'INSERT INTO test (image, title, price, description) VALUES ("'.$image.'","'.$title.'","'.$price.'","'.$desc.'")';
        mysqli_query($link, $query);
    }
}

$result = mysqli_query($link,'SELECT * FROM `test`');
foreach ($result as $item) {*/
        ?>
        <h1>Понедельник</h1> 
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
<!--
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
        <input type='submit' value='Сохранить'>
</form>
</div>
</body>
</html>