<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Messenger</title>
</head>
<body>
<div id="content">
<form action='admin.php' method='post'>
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
        <h1>Понедельник</h1><br>
        <h3>Салат</h3><br>
        <textarea name='mon_1' value=''>
		  <br>
        <h3>Первое</h3><br>
        <textarea name='mon_2' value=''>
		  <br>
        <h3>Основное</h3><br>
        <textarea name='mon_3' value=''>
		  <br>
        <h3>Гарнир</h3><br>
        <textarea name='mon_4' value=''>
		  <br>
        <h3>Десерт</h3><br>
        <textarea name='mon_5' value=''>
		<br><hr>

        <h1>Вторник</h1><br>
        <h3>Салат</h3><br>
        <textarea name='tue_1' value=''>
		  <br>
        <h3>Первое</h3><br>
        <textarea name='tue_2' value=''>
		  <br>
        <h3>Основное</h3><br>
        <textarea name='tue_3' value=''>
		  <br>
        <h3>Гарнир</h3><br>
        <textarea name='tue_4' value=''>
		  <br>
        <h3>Десерт</h3><br>
        <textarea name='tue_5' value=''>
		<br><hr>

        <h1>Среда</h1><br>
        <h3>Салат</h3><br>
        <textarea name='wen_1' value=''>
		  <br>
        <h3>Первое</h3><br>
        <textarea name='wen_2' value=''>
		  <br>
        <h3>Основное</h3><br>
        <textarea name='wen_3' value=''>
		  <br>
        <h3>Гарнир</h3><br>
        <textarea name='wen_4' value=''>
		  <br>
        <h3>Десерт</h3><br>
        <textarea name='wen_5' value=''>
		<br><hr>

        <h1>Четверг</h1><br>
        <h3>Салат</h3><br>
        <textarea name='thu_1' value=''>
		  <br>
        <h3>Первое</h3><br>
        <textarea name='thu_2' value=''>
		  <br>
        <h3>Основное</h3><br>
        <textarea name='thu_3' value=''>
		  <br>
        <h3>Гарнир</h3><br>
        <textarea name='thu_4' value=''>
		  <br>
        <h3>Десерт</h3><br>
        <textarea name='thu_5' value=''>
		<br><hr>

        <h1>Пятница</h1><br>
        <h3>Салат</h3><br>
        <textarea name='fri_1' value=''>
		  <br>
        <h3>Первое</h3><br>
        <textarea name='fri_2' value=''>
		  <br>
        <h3>Основное</h3><br>
        <textarea name='fri_3' value=''>
		  <br>
        <h3>Гарнир</h3><br>
        <textarea name='fri_4' value=''>
		  <br>
        <h3>Десерт</h3><br>
        <textarea name='fri_5' value=''>
		<br><hr>
    <?php
mysqli_close($link);
?>
        <input type='submit' value='Сохранить'>
</form>
</div>
</body>
</html>