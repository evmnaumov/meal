<?php
include ("session.php");
//если пользователь не админ - нехуй шастать=)
if($admin==0){
    header("Location: http://".$_SERVER['HTTP_HOST']."/lc.php");
}
if (empty($_GET['page'])){
    $page = "menu";
}else{
    $page = $_GET['page'];
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
<iframe src="<?php echo $page; ?>.php" frameborder="0" width="100%" height="100%"></iframe>
</body>
</html>