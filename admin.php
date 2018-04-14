<?php
include ("session.php");
//если пользователь не админ - нехуй шастать=)
if($admin==0){
    header("Location: http://".$_SERVER['HTTP_HOST']."/meal/lc.php");
}
if (empty($_GET['page'])){
    $page = "menu.php";
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
<iframe src="<?php echo $page; ?>" frameborder="0"></iframe>
</body>
</html>