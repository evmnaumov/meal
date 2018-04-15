<html>
<head>
<title>Регистрация</title>
</head>
<body>
<h2>Регистрация</h2>
<form action="save_user.php" method="post">
<!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
<p>
    <label>Ваш имя::<br></label>
    <input name="name" type="text" required size="35" maxlength="35">
  </p> 
  <p>
    <label>Ваша фамилия::<br></label>
    <input name="last_name" type="text" required size="35" maxlength="35">
  </p>
  <p>
    <select name="location">
    <?php
    include ("bd.php");
    $query = 'SELECT * FROM location';
    $options = mysqli_query($link, $query);
    foreach($options as $value){
     echo "<option value=".$value['loc_id'].">".$value['location']."</option>";
    }
    ?>
    </select>
  </p> 
  <p>
    <label>Ваш логин::<br></label>
    <input name="login" type="email" size="25" maxlength="25" required>
  </p> 
  <p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="25" maxlength="25" required>
  </p> 
<p>
<input type="submit" name="submit" value="Зарегистрироваться">
</p></form>
</body>
</html>
