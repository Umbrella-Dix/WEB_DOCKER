<?php
//нужно подключить файлики, функции из которых мы используем
// в данном случае файлик подключения сессии, и файлики на вывод ошибок через переменные сессии

require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";

///ФАЙЛ ФОРМ!!!

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/css/css_login/style2.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/css/css_login/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Регистрация</h2>
                        <form class="register-form" id="register-form" action="includes/signup.inc.php" method="post">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" placeholder="Логин" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pwd" placeholder="Пароль" />
                            </div>
                            <div class="form-group">
                            <span class="label-agree-term">Выберете уровень привелегий: <select name="user_type">
                                <option value="user">Пользователь</option> 
                                <option value="moderator">Модератор</option>
                                <option value="admin">Администратор</option>
                            </select></span>
                            </div>
                            <!-- <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div> -->
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Регистрация"/>
                                <input type="reset" name="signup" id="signup" class="form-submit" value="Очистить"/>
                            </div>
                            <div class="form-group">
                            <?php
//функция вывода ошибок которые возникли при регистрации
//для этой функции мы должны подключить нужный файлик php
//вывод ошибок при регистрации
check_signup_errors();

 ?>
                            </div>
                           
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/img/images_login/signup.png" alt="sing up image"></figure>
                        <a href="/index.php" class="signup-image-link">Уже зарегестрирован?</a>
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