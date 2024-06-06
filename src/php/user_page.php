<?php
//нужно подключить файлики, функции из которых мы используем
// в данном случае файлик подключения сессии, и файлики на вывод ошибок через переменные сессии
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
require_once "includes/admin_actions_view.inc.php";

///ФАЙЛ ФОРМ!!!
if($_SESSION["user_type"]!="user"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    header("Location: includes/logout.inc.php");
    die();
}  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/css/css_login/style2.css">
    <!-- <link rel="stylesheet" href="/css/css_login/style.css"> -->
    <title>Document</title>
</head>
<body>

<style>
            h3{
                color: aliceblue;
                text-align: center;
            }
            body{
                background-color: #D6B9FD;
            }
</style>

<h3>
    <?php 
   
        outout_username();
        $name= $_SESSION["user_username"];
        $email= $_SESSION["user_email"];
       
   
   
    ?>
</h3>

<h2>Написать комментарий:</h2>
<!-- перенаправляет на файл, в котором заносим пользователя в бд -->
<form action="users_actions/write_comment_user.php" method="post">
        
        <input type="hidden" name="userID" placeholder="Идентификатор | Имя" value="<?=$name?>" />
        <p>Введите текст комментария: 
        <textarea rows="10" cols="70" id="content" name="content"></textarea></p>
        <!-- аналог кнопки -->
        <input type="submit" value="Опубликовать">
        <button type="reset">Очистить форму</button>  
</form>
<?php
check_comment_write_errors();
?>
<h2>Просмотреть все комментарии:</h2>
<form action="users_actions/info_comments_all.php" method="post">

    <button>Посмотреть</button>

</form>
<hr>

<h2>Написать ПИСЬМО другому пользователю:</h2>
<!-- перенаправляет на файл, в котором заносим пользователя в бд -->
<form action="users_actions/send_email.php" method="post">
        <input type="hidden" name="email_from" placeholder="Адрес почты" value="<?=$email?>"/>

        <p>Введите текст письма: 
        <textarea rows="10" cols="70" id="content" name="email_text"></textarea></p>      

        <p>Кому: <input type="text" name="email_to" placeholder="Адрес почты" /></p>  
        <input type="submit" value="Отправить письмо">
        <button type="reset">Очистить форму</button>  
</form>
<?php
check_email_send_errors()
?>


<h2>Просмотреть отправленные письма</h2>
<form action="users_actions/search_email_send.php" method="post">        
            
            <input type="hidden" name="userSearch" placeholder="Идентификатор | Имя" value="<?=$name?>"/>
            <input type="submit" value="Просмотреть"></p>
</form>
<?php
check_email_send_from_errors();
?>
<hr>

<h2>Просмотреть полученные письма</h2>
<form action="users_actions/search_email_received.php" method="post">        
            
            <input type="hidden" name="userSearch" placeholder="Идентификатор | Имя" value="<?=$name?>"/>
            <input type="submit" value="Просмотреть"></p>
</form>
<?php
check_email_send_from_errors();
?>
<hr>

<h2>Выйти из аккаунта:</h2>
<form action="includes/logout.inc.php" method="post">

    <button>Выйти из системы</button>

</form>


</body>
</html>