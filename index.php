<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Тестовое задание Webest</title>
</head>
<body>
    <h1>Вход и регистрация</h1>
    <div class="forms">
        <div class="form">
            <h2>Авторизация пользователя</h2>
            <form action="auth.php" method="POST">
                <span>E-mail</span><input type="email" name="email" required><br>
                <span>Пароль</span><input type="password" name="password" required><br>
                <input type="submit" value="Войти" name="submit_auth" id="button">
            </form>
        </div>
        <div class="form">
            <h2> Регистрация пользователя</h2>
            <form action="register.php" method="POST">
                <span>E-mail</span><input type="email" name="email" required><br>
                <span>Пароль</span><input type="password" name="password" required><br>
                <span>Повторите пароль</span><input type="password" name="checkpassword" required><br>
                <span>Имя</span><input type="text" name="name" required><br>
                <input type="submit" value="Зарегистрироваться" name="submit_register" id="button">
            </form>
        </div>
       
    </div>
    
</body>
</html>