<?php
session_start();
$login = $_SESSION['login'];
$user_id = $_SESSION['user_id'];
if(!empty($login) or !empty($user_id)){
  header("Location: http://".$_SERVER['HTTP_HOST']."/meal/lc.php");
}
?>
<html>
<head>
<title>Страница входа</title>
</head>
<body>
<h2>Страница входа</h2>
<form action="testreg.php" method="post">
<!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
  <p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="25" maxlength="25">
  </p>
 <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
  <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="25" maxlength="25">
  </p>
<p>
<input type="submit" name="submit" value="Войти">
<br>
<!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
<a href="reg.php">Зарегистрироваться</a> 
</p></form>
</body>
</html>