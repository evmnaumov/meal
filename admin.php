<?php
include ("session.php");
include ("bd.php");
//если пользователь не админ - нехуй шастать=)
if($admin==0){
    header("Location: http://".$_SERVER['HTTP_HOST']."/lc.php");
}
if (empty($_GET['page'])){
    $page = "menu";
}else{
    $page = $_GET['page'];
}
if(isset($_POST['del_location'])){
    $del_locs = $_POST['del_location'];
}
if(isset($del_locs)){
    foreach($del_locs as $value){
        mysqli_query($link, 'DELETE FROM location WHERE loc_id="'.$value.'"');
    }
}
if(isset($_POST['new_location'])){
    $new_locs = $_POST['new_location'];
}
if(isset($new_locs)){
    $new_locs = stripslashes($new_locs);
    $new_locs = htmlspecialchars($new_locs);
    mysqli_query($link, 'INSERT INTO location (location) VALUE ("'.$new_locs.'")');
}
?>
<html>
<head>
<title>Админ-панель</title>
</head>
<body>
<p><?php echo $user_name." ".$user_last_name; ?></p>
<p>Вы вошли с логином: <?php echo $login; ?></p>
<p>Вернуться в <a href="lc.php">личный кабинет</a><p>
<p><a href="admin.php?page=menu">Редактировать меню</a></p>
<p><a href="admin.php?page=responses">Сделать выгрузку</a></p>
<form action="admin.php" method="post">
<label>Расположения пользователей:<label>
<?php
$locs=mysqli_query($link, 'SELECT * FROM `location`');
while($locs_row=mysqli_fetch_row($locs)){
    echo "<input type=\"checkbox\" name=\"del_location[]\" value=\"".$locs_row[0]."\">".$locs_row[1];
    echo "<br>";
}
?>
<input type="text" name="new_location" placeholder="Введите имя нового размещения">
<input type="submit" name="submit" value="Сохранить">
</form>
<form action="logout.php" method="post">
<input type="submit" name="submit" value="Выйти">
</form>
<iframe src="<?php echo $page; ?>.php" frameborder="0" width="100%" height="100%"></iframe>
</body>
</html>