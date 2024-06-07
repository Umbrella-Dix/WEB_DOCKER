<?php
//нужно подключить файлики, функции из которых мы используем
// в данном случае файлик подключения сессии, и файлики на вывод ошибок через переменные сессии
require_once "php/includes/config_session.inc.php";
require_once "php/includes/signup_view.inc.php";
require_once "php/includes/login_view.inc.php";

///ФАЙЛ ФОРМ!!!
///ФАЙЛ ФОРМ!!!
if (isset($_SESSION["user_type"]) && isset($_SESSION["user_id"])) {
    if ($_SESSION["user_type"]=="admin") {
        header("Location: /php/admin_page.php");
    }
    else if ($_SESSION["user_type"]=="moderator") {
        header("Location: /php/index.php");
    }
    else if ($_SESSION["user_type"]=="user") {
        header("Location: /php/index.php");
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
    <link rel="icon" href="/img/иконка3.png" type="image/png">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/css_login/style2.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/css_login/style.css">
</head>
<body>

    <div class="main">



        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/images_login/login.png" alt="sing up image"></figure>
                        <a href="php/register_form.php" class="signup-image-link">Создай аккаунт, если его ещё нет!</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Авторизация</h2>
                        <form class="register-form" id="login-form" action="php/includes/login.inc.php" method="post">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" placeholder="Логин" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pwd" placeholder="Пароль" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Запомнить меня</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Вход"/>
                                <input type="reset" name="signup" id="signup" class="form-submit" value="Очистить"/>
                            </div>
                        </form>
                        <div class="form-group">
                        <?php 
    //вывод ошибок при входе в систему
    check_login_errors();
    //echo $_SESSION["pwd1"];
    ?>
                            </div>
                    </div>
                </div>
            </div>
        </section>
       

    </div>

    <!-- JS -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="js/main2.js"></script>
</body>
</html>