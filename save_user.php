<?php
if (isset($_POST['name'])) 
{ $name = $_POST['name']; 
    if ($name == '') {
        unset($name);
    } 
}
if (isset($_POST['last_name'])) 
{ $last_name = $_POST['last_name']; 
    if ($last_name == '') {
        unset($last_name);
    } 
}
if (isset($_POST['location'])) 
{ $location = $_POST['location']; 
    if ($location == '') {
        unset($location);
    } 
}
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['login'])) 
{ $login = $_POST['login']; 
    if ($login == '') {
        unset($login);
    } 
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) {
     $password=$_POST['password'];
     if ($password =='') { 
        unset($password);
    } 
}
if (empty($login) or empty($password) or empty($name) or empty($last_name)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$name = stripslashes($name);
$name = htmlspecialchars($name);

$last_name = stripslashes($last_name);
$last_name = htmlspecialchars($last_name);

$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);



// подключаемся к базе
include ("bd.php");

// проверка на существование пользователя с таким же логином
$result = mysqli_query($link, "SELECT id FROM users WHERE login='$login'");
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

// если такого нет, то сохраняем данные
$pass_hash = hash('sha256', $password);
$query = 'INSERT INTO users (login, pass, name, last_name, location) VALUES("'.$login.'","'.$pass_hash.'","'.$name.'","'.$last_name.'","'.$location.'")';
$result2 = mysqli_query($link, $query);
// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
}
else {
echo "Ошибка! Вы не зарегистрированы.";
echo $query;
     }
?>