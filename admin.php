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
$link = mysqli_connect('localhost', 'tabs', 'rebOOt365');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$tabs_db = mysqli_select_db($link,'tabs');

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
$i=1;
foreach ($result as $item) {
    global $i;
    $a="";
    if($i<1){
        $a="showing";
    };
        ?><input type='text' name='txt[<?php echo $i;?>][image]' value='<?php echo $item["image"];?>'>
          <input type='text' name='txt[<?php echo $i;?>][title]' value='<?php echo $item["title"];?>'>
          <input type='text' name='txt[<?php echo $i;?>][price]' value='<?php echo $item["price"];?>'>
          <input type='text' name='txt[<?php echo $i;?>][description]' value='<?php echo $item["description"];?>'>
		  <br>
    <?php
    $i=$i+1;
};
mysqli_close($link);
?>
        <input type='text' name='txt[0][image]' value=''>
        <input type='text' name='txt[0][title]' value=''>
        <input type='text' name='txt[0][price]' value=''>
        <input type='text' name='txt[0][description]' value=''>
		</br>
        <input type='submit' value='Сохранить'>
</form>
</div>
</body>
</html>