<?php
//нужно подключить файлики, функции из которых мы используем
// в данном случае файлик подключения сессии, и файлики на вывод ошибок через переменные сессии
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
require_once "includes/admin_actions_view.inc.php";


//проверка на тип пользователя, не идельна (юзеры бы смогли заходить на страницы друг друга), 
//но разделяет админов, модеров и юзеров по возможностям
//в случае перехода на чужую страницу прерывает сессию

if($_SESSION["user_type"]!="admin"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    header("Location: includes/logout.inc.php");
    die();
}  
echo $_SESSION["user_type"];
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
                background-color: #BAF4A4;
            }
</style>

<h3>
    <?php 
   
        outout_username();
   
   
    ?>
</h3>
<hr>

<h2>Создать новую учетную запись:</h2>
<!-- перенаправляет на файл, в котором заносим пользователя в бд -->
<form action="admin_actions/create_user.php" method="post">
        <p>Введите имя: <input type="text" name="username" placeholder="Логин" /></p>
        <p>Введите пароль: <input type="password" name="pwd" placeholder="Пароль" /></p>
        <p>Введите почту: <input type="text" name="email" placeholder="Почта" ></p>
        <p>Выберете уровень привелегий: <select name="user_type">
            <option value="user">Пользователь</option> 
            <option value="moderator">Модератор</option>
            <option value="admin">Администратор</option>
        </select></p>
        <!-- аналог кнопки -->
        <input type="submit" value="Создать">
        <button type="reset">Очистить форму</button>  
</form>
<?php
//функция вывода ошибок которые возникли при регистрации
//для этой функции мы должны подключить нужный файлик php
//вывод ошибок при регистрации
check_create_errors();

 ?>




<hr>

<h2>Обновить данные уже зарегестрированного пользователя:</h2>
<!-- перенаправляет на файл, в котором заносим пользователя в бд -->
<form action="admin_actions/update_user.php" method="post">
        <p>Введите ID пользователя, данные которого хотите обновить: <input type="number" name="user_id" placeholder="Идентификатор" /></p>
        <p>Теперь введите новые данные, поля которые НЕ нужно изменять МОЖНО ОСТАВЛЯТЬ ПУСТЫМИ!</p>
        <p>Введите НОВОЕ имя: <input type="text" name="username" placeholder="Логин" /></p>
        <p>Введите НОВЫЙ пароль: <input type="password" name="pwd" placeholder="Пароль" /></p>
        <p>Введите НОВУЮ почту: <input type="text" name="email" placeholder="Почта" ></p>
        <p>Выберете НОВЫЙ уровень привелегий: <select name="user_type">
            <option value="">Выберите роль</option> 
            <option value="user">Пользователь</option> 
            <option value="moderator">Модератор</option>
            <option value="admin">Администратор</option>
        </select></p>
        <!-- аналог кнопки -->
        <input type="submit" value="Обновить">
        <button type="reset">Очистить форму</button>  
<!-- <button>Signup</button> -->
</form>

<?php
check_update_errors();
?>


<h2>Просмотреть информацию об уже существующих пользователях:</h2>
<form action="admin_actions/info_users.php" method="post">

    <button>Посмотреть</button>

</form>
<hr>
<h2>Просмотреть все комментарии:</h2>
<form action="admin_actions/info_comments_all.php" method="post">

    <button>Посмотреть</button>

</form>
<hr>



<h2>Удаление учетность запись</h2>
<form action="admin_actions/delete_user.php" method="post">
    <label for="search">Введите ID пользователя: </label>
    <input id="search" type="text" name="user_search_delete" placeholder="Идентификатор">
    <button>Удалить</button>

</form>

<?php
check_delete_errors();
?>
<hr>


<h2>Активировать учетную запись</h2>
<form action="admin_actions/activation_user.php" method="post">
    <label for="search">Введите ID или Имя пользователя:</label>
    <input id="search" type="text" name="user_activation" placeholder="Идентификатор | Имя">
    <button>Активировать</button>

</form>

<?php
check_activated_errors();
?>
<hr>


<h2>Отключить учетную запись</h2>
<form action="admin_actions/deactivation_user.php" method="post">
    <label for="search">Введите ID или Имя пользователя:</label>
    <input id="search" type="text" name="user_deactivation" placeholder="Идентификатор | Имя">
    <button>Отключить</button>
</form>

<?php
check_deactivated_errors();
?>
<hr>


<h2>Написать комментарий от имени пользователя:</h2>
<!-- перенаправляет на файл, в котором заносим пользователя в бд -->
<form action="admin_actions/write_comment.php" method="post">
        <p>Введите Имя пользователя или ID: <input type="text" name="userID" placeholder="Идентификатор | Имя" /></p>
        
        <p>Введите текст комментария: 
        <textarea rows="10" cols="70" id="content" name="content"></textarea></p>
        <!-- аналог кнопки -->
        <input type="submit" value="Опубликовать">
        <button type="reset">Очистить форму</button>  
</form>
<?php
check_comment_write_errors();
?>

<h2>Поиск опубликованных комментариев</h2>
<form action="admin_actions/search_comments_post.php" method="post">        
            <p>Введите Имя или ID пользователя, комментарии которого хотите просмотреть:
            <input type="text" name="userSearch" placeholder="Идентификатор | Имя" />
            <input type="submit" value="Искать"></p>
</form>
<?php
check_search_comments_errors();
?>
<hr>

<h2>Поиск пока НЕопубликованных комментариев </h2>
<form action="admin_actions/search_comments_ban.php" method="post">        
            <p>Введите Имя или ID пользователя, комментарии которого хотите просмотреть:
            <input type="text" name="userSearch" placeholder="Идентификатор | Имя" />
            <input type="submit" value="Искать"></p>
</form>
<?php
check_search_comments_errors();
?>
<hr>


<h2>Опубликовать комментарий:</h2>
<form action="admin_actions/comment_post.php" method="post">
    
    <label for="search1">Введите ID комментария, который хотите опубликовать:</label>
    <input id="search1" type="text" name="comment_id" placeholder="Идентификатор">
    <button>Опубликовать комментарий</button>
</form>

<?php
check_comment_post_errors();
?>
<hr>

<h2>Скрыть комментарий из общего доступа:</h2>
<form action="admin_actions/comment_ban.php" method="post">
    
    <label for="search1">Введите ID комментария, который хотите скрыть:</label>
    <input id="search1" type="text" name="comment_id" placeholder="Идентификатор">
    <button>Скрыть комментарий</button>
</form>

<?php
check_comment_ban_errors()
?>
<hr>






<h2>Опубликовать ВСЕ комментарии пользователя:</h2>
<form action="admin_actions/all_comments_post.php" method="post">   
    <label for="search2">Введите Имя или Идентификатор пользователя:</label>
    <input id="search2" type="text" name="username" placeholder="Идентификатор | Имя">
    <button>Опубликовать</button>
</form>
<?php
check_all_comments_post_errors()
?>
<hr>

<h2>Скрыть ВСЕ комментарии пользователя:</h2>
<form action="admin_actions/all_comments_ban.php" method="post">   
    <label for="search2">Введите Имя или Идентификатор пользователя:</label>
    <input id="search2" type="text" name="username" placeholder="Идентификатор | Имя">
    <button>Скрыть все</button>
</form>
<?php
check_all_comments_ban_errors()
?>
<hr>


<h2>Написать ПИСЬМО от имени пользователя другому пользователю:</h2>
<!-- перенаправляет на файл, в котором заносим пользователя в бд -->
<form action="admin_actions/send_email.php" method="post">
        <p>От кого: <input type="text" name="email_from" placeholder="Адрес почты" /></p>   

        <p>Введите текст письма: 
        <textarea rows="10" cols="70" id="content" name="email_text"></textarea></p>      

        <p>Кому: <input type="text" name="email_to" placeholder="Адрес почты" /></p>  
        <input type="submit" value="Отправить письмо">
        <button type="reset">Очистить форму</button>  
</form>
<?php
check_email_send_errors()
?>


<h2>Поиск ОТПРАВЛЕННЫХ пользователем писем</h2>
<form action="admin_actions/search_email_send.php" method="post">        
            <p>Введите Имя или ID пользователя, письма которого хотите просмотреть:
            <input type="text" name="userSearch" placeholder="Идентификатор | Имя" />
            <input type="submit" value="Искать"></p>
</form>
<?php
check_email_send_from_errors();
?>
<hr>

<h2>Поиск ПОЛУЧЕННЫХ пользователем писем</h2>
<form action="admin_actions/search_email_received.php" method="post">        
            <p>Введите Имя или ID пользователя, письма которого хотите просмотреть:
            <input type="text" name="userSearch" placeholder="Идентификатор | Имя" />
            <input type="submit" value="Искать"></p>
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