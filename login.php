<?php
session_start();
if(isset($login) or isset($user_id)){
  header("Location: http://".$_SERVER['HTTP_HOST']."/lc.php");
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
    <input name="login" type="text" size="25" maxlength="25" placeholder="Ваш логин">
  </p>
 <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
  <p>
    <input name="password" type="password" size="25" maxlength="25" placeholder="Ваш пароль">
  </p>
<p>
<input type="submit" name="submit" value="Войти">
<br>
<!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
<a href="reg.php">Зарегистрироваться</a> 
</p></form>
</body>
</html>