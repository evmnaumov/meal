<html>
<head>
<title>Регистрация</title>
</head>
<body>
<h2>Регистрация</h2>
<form action="save_user.php" method="post">
<!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
  <p>
    <label>Ваш логин::<br></label>
    <input name="login" type="email">
  </p> 
  <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
  </p> 
<p>
<input type="submit" name="submit" value="Зарегистрироваться">
</p></form>
</body>
</html>
