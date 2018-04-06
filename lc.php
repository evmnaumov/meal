<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
?>
<html>
<head>
<title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
<p>"Вы вошли на сайт, как "<?php echo $_SESSION['login']; ?>"<br>
<a  href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только  зарегистрированным пользователям</a>";
</p>
<br>
<form action="logout.php" method="post">
<input type="submit" name="submit" value="Выйти">
</form>
</body>
</html>