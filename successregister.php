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
                <input type="submit" value="Войти" name="submit_auth">
            </form>
        </div>
        <div class="form">
            <h2> Регистрация пользователя</h2>
            <span>Вы успешно зарегистрированы и можете войти в систему</span>
        </div>
       
    </div>
    
</body>
</html>