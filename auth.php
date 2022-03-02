<?php
// Авторизация пользователя


function generateCode ($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .=$chars[mt_rand(0,$clen)];
    }
    return $code;
}

$link = mysqli_connect("localhost", "root", "", "webestdb");


if(isset($_POST['submit_auth']))
{
    $query = mysqli_query($link, "SELECT user_id, user_password FROM users WHERE user_email='".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        $hash = md5(generateCode(10));

        if(!empty($_POST['not_attach_ip']))
        {
            $insip=", user_ip=INET_ATON('".$_SERVER['REMOTE-ADDR']."')";
        }

        mysqli_query($link, "UPDATE users SET user_hash='".$hash."'
        ".$insip."WHERE user_id='".$data['user_id']."'");

        setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
        setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true);

        $user = mysqli_query($link, "SELECT * FROM users");
        $userdata = mysqli_fetch_assoc($user);

        print "".$userdata['user_name'].", добро пожаловать!";
        exit();
    }
    else {
        print "Вы ввели неправильный email/пароль";
    }
}
?>