<html>
<head>
<title>Регистрация</title>
</head>
<body>
<h2>Регистрация</h2>
<form action="save_user.php" method="post">
<!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
<p>
    <input name="name" type="text" required size="35" maxlength="35"  placeholder="Ваше имя">
  </p> 
  <p>
    <input name="last_name" type="text" required size="35" maxlength="35" placeholder="Ваша фамилия">
  </p>
  <p>
    <select name="location">
    <?php
    include ("bd.php");
    $query = 'SELECT * FROM locations';
    $options = mysqli_query($link, $query);
    foreach($options as $value){
     echo "<option value=".$value['loc_id'].">".$value['location']."</option>";
    }
    ?>
    </select>
  </p> 
  <p>
    <input name="login" type="email" size="25" maxlength="25" required placeholder="Ваш e-mail">
  </p> 
  <p>
    <input name="password" type="password" size="25" maxlength="25" required placeholder="Ваш пароль">
  </p> 
<p>
<input type="submit" name="submit" value="Зарегистрироваться">
</p></form>
</body>
</html>
