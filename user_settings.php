<?php
include ("session.php");
include ("bd.php");
$location = mysqli_query($link, 'SELECT * FROM `location`');
$user_pass = mysqli_query($link, 'SELECT pass FROM `users` WHERE user_id="'.$user_id.'"');
?>
<html>
<head>
<title>Админ-панель</title>
</head>
<body>
<p><?php echo $user_name." ".$user_last_name; ?></p>
<p>Вы вошли с логином: <?php echo $login; ?></p>
<form action="user_settings.php">
<p>Если вы хотите изменить своё расположение, выберите его из списка:</p>
<select name="user_location">
<?php
    while($locs=mysqli_fetch_row($location)){
        $userl = "";
        if ($user_location==$locs[0]){
            $userl="selected";
        }
        echo "<option value=\"".$locs[0]."\" selected=\"".$userl."\">".$locs[1]."</option>";
    }
?>
</select>
<p>Форма изменения пароля:</p>
<input name="password" type="password" size="25" maxlength="25" required><br>
<input name="new_password1" type="password" size="25" maxlength="25" required><br>
<input name="new_password2" type="password" size="25" maxlength="25" required>
<input type="submit" name="submit" value="Сохранить">
</form>
</body>
</html>