<?php
include ("session.php");
include ("bd.php");
$location = mysqli_query($link, 'SELECT * FROM `location`');
//проверяем, переданны ли данные, если да - создаём переменные, если нет - удаляем их
if (isset($_POST['user_location'])){
    $user_location = $_POST['user_location'];
    if ($user_location == '') {
        unset($user_location);
    } 
}
if (isset($_POST['password'])){
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    } 
}
if (isset($_POST['new_password1'])){
    $new_password1 = $_POST['new_password1'];
    if ($new_password1 == '') {
        unset($new_password1);
    } 
}
if (isset($_POST['new_password2'])){
    $new_password2 = $_POST['new_password2'];
    if ($new_password2 == '') {
        unset($new_password2);
    } 
}
//-------------------------------------------------
if (isset($user_location) or isset($password) or isset($new_password1) or isset($new_password2)){
    $user_location = stripslashes($user_location);
    $user_location = htmlspecialchars($user_location);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $new_password1 = stripslashes($new_password1);
    $new_password1 = htmlspecialchars($new_password1);
    $new_password2 = stripslashes($new_password2);
    $new_password2 = htmlspecialchars($new_password2);
$user_query = mysqli_query($link, 'SELECT pass, location FROM `users` WHERE user_id="'.$user_id.'"');
$user_pass_loc = mysqli_fetch_row($user_query);
echo $user_pass_loc[0];
echo "<br>";
echo $user_pass_loc[1];
//Если задано, сохраняем новое расположение
if(!empty($user_location)){
    $user_loc = $user_pass_loc[0];
    if($user_location!==$user_loc){
        mysqli_query($link, 'UPDATE users SET location="'.$user_location.'" WHERE user_id="'.$user_id.'"');
        $location_message = "Ваше расположение сохранено";
    }
}
//---
//Если задано, изменяем пароль на новый
if(!empty($password) and !empty($new_password1) and !empty($new_password2)){
    $pass_hash = hash('sha256', $password);
    $old_pass = $user_pass_loc[1];
    if($pass_hash==$old_pass){
        if($new_password1==$new_password2){
            $new_pass_hash = hash('sha256', $new_password1);
            mysqli_query($link,'UPDATE users SET pass="'.$new_pass_hash.'" WHERE user_id="'.$user_id.'"');
            $pass_message="Пароль изменён";
        }else{
            $pass_message = "Пароли не совпадают";
        }
    }else{
        $pass_message="Вы ввели неверный старый пароль";
    }
}
//---
}
mysqli_free_result($user_query);
?>
<html>
<head>
<title>Настройки пользователя</title>
</head>
<body>
<p><?php echo $user_name." ".$user_last_name; ?></p>
<p>Вы вошли с логином: <?php echo $login; ?></p>
<a href="lc.php">Личный кабинет</a><br>
<?php
if(isset($location_message)){
    echo $location_message;
    echo "<br>";
}
if(isset($pass_message)){
    echo $pass_message;
    echo "<br>";
}
?>
<form action="user_settings.php">
<p>Если вы хотите изменить своё расположение, выберите его из списка:</p>
<select name="user_location">
<?php
    while($locs=mysqli_fetch_row($location)){
        $userl = "";
        if ($user_location==$locs[0]){
            $userl="selected=\"selected\"";
        }
        echo "<option value=\"".$locs[0]."\"".$userl."\">".$locs[1]."</option>";
    }
    mysqli_free_result($location);
?>
</select>
<p>Форма изменения пароля:</p>
<input name="password" type="password" size="25" maxlength="25" placeholder="Ваш текущий пароль"><br>
<input name="new_password1" type="password" size="25" maxlength="25" placeholder="Новый пароль"><br>
<input name="new_password2" type="password" size="25" maxlength="25" placeholder="и ещё раз">
<input type="submit" name="submit" value="Сохранить">
</form>
</body>
</html>