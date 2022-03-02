<?php
// Регистрация пользователя

$link = mysqli_connect("localhost", "root", "", "webestdb");

if(isset($_POST['submit_register']))
{
    $err = [];

    // Проверка email
    if(!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST['email']))
    {
        $err[] = "Неверно введен email";
    }

    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_email='".mysqli_real_escape_string($link, $_POST['email'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким email уже существует в базе данных!";
    }
    
    // Проверка пароля
    if(strlen($_POST['password']) < 6)
    {
        $err[] = "Пароль должен быть не менее 6 символов!";
    }

    if($_POST['checkpassword'] != $_POST['password'])
    {
        $err[] = "Повторный пароль введен не верно!";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = md5(md5(trim($_POST['password'])));

        mysqli_query($link, "INSERT INTO users SET user_name='".$user_name."', user_email='".$user_email."', user_password='".$user_password."'");
        header("Location: successregister.php");
        exit();
    }
    else {
        print "<b> При регистрации произошли следующие ошибки: </b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }    
}
?>

