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
if(isset($_POST['locations'])){
    $post_locals = $_POST['locations'];
}
if(isset($post_locals)){
    $post_locations=explode("\n", $post_locals);
    foreach($post_locations as $value){
        $locs_query = mysqli_query($link, 'SELECT location FROM `location` WHERE location="'.$value.'"');
        $locs_result=mysqli_fetch_row($locs_query);
        if($locs_result[0]!==$value){
            mysqli_query($link, 'INPUT INTO location (location) VALUE ("'.$value.'")');
        }
    }
    mysqli_free_result($locs_query);
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
<textarea name="locations">
<?php
$locs=mysqli_query($link, 'SELECT * FROM `location`');
while($locs_row=mysqli_fetch_row($locs)){
    $locals[] = $locs_row[1];
}
$locations = implode("\n", $locals);
echo $locations;
?>
</textarea>
<input type="submit" name="submit" value="Сохранить">
</form>
<form action="logout.php" method="post">
<input type="submit" name="submit" value="Выйти">
</form>
<iframe src="<?php echo $page; ?>.php" frameborder="0" width="100%" height="100%"></iframe>
</body>
</html>