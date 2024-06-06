<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
declare(strict_types=1);


//В ДАННОМ ФАЙЛИКЕ СОЗДЫ ФУНКЦИИ, КОТОРЫЕ ПРИМЕНЯЮТСЯ НА ОСНОВНОЙ СТРАНИЦЕ index.php
//НАПРИМЕР ВЫВОД МАССИВА ОШИБОК, КОТОРЫЕ СОХРАНЕНЫ В ПЕРЕМЕННОЙ СЕССИИ



//ДАННЫЕ ФУНКЦИИ ВЫВОДЯТ ИНФУ ОБ УСПЕШНОМ РЕЗУЛЬТАТЕ ИЛИ ОШИБКАХ, ИЗ ЗА КОТОРЫХ НИЧЕГО НЕ ПОЛУЧИЛОСЬ
//В ФАЙЛИКАХ С ПОДОБНЫМ НАЗВАНИЕМ view АНАЛОГИЧНЫЕ ФУНКЦИИ, 
//они выводятся на главной страницу пользователя (html формы)



//ОШИБКИ ПРИ СОЗДАНИИ ПОЛЬЗОВАТЕЛЯ
function check_create_errors()
{
    if (isset($_SESSION["errors_create"])) {


        $errors = $_SESSION["errors_create"];
        echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_create"]);
    }else if (isset($_GET['create']) &&$_GET['create']=="success") {
       echo '<p class="good_style">'."Активированная учетная запись успешно создана!".'</p>';
    }

    
}


//ОШИБКИ ПРИ ОБНОВЛЕНИИ ДАННЫХ
function check_update_errors()
{
    if (isset($_SESSION["errors_update"])) {


        $errors = $_SESSION["errors_update"];
        echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_update"]);
    }
    else if (isset($_GET['update']) &&$_GET['update']=="success") {
        echo '<p class="good_style">'."Данные пользователя успешно обновлены".'</p>';
     }
    // else{
    //     echo "Что-то пошло не так, попробуйте ещё раз...";
    // }
    
}


//ОШИБКИ ПРИ УДАЛЕНИИ УЧЕТКИ
function check_delete_errors()
{
   
    if (isset($_SESSION["errors_delete"])) {


        $errors = $_SESSION["errors_delete"];
        echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_delete"]);
        unset($_SESSION["username_delete"]);
    }else if (isset($_GET['delete']) &&$_GET['delete']=="success" && isset($_SESSION["username_delete"])) {
        echo '<p class="good_style">'."Пользователь с именем ".strtoupper($_SESSION["username_delete"])." успешно удален".'</p>';
        unset($_SESSION["username_delete"]);
     }
   
    
}

//ОШИБКИ ПРИ АКТИВАЦИИ УЧЕТКИ

function check_activated_errors()
{
   
    if (isset($_SESSION["errors_activ"])) {


        $errors = $_SESSION["errors_activ"];
        //echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_activ"]);
        unset($_SESSION["username_activ"]);
    }else if (isset($_GET['activation']) &&$_GET['activation']=="success" && isset($_SESSION["username_activ"])) {
        echo '<p class="good_style">'."Учетная запись пользователя ".strtoupper($_SESSION["username_activ"])." успешно АКТИВИРОВАНА".'</p>';
        unset($_SESSION["username_activ"]);
     }
   
    
}


//ОШИБКИ ПРИ ОТКЛЮЧЕНИИ УЧЕТКИ
function check_deactivated_errors()
{
    if (isset($_SESSION["errors_deactiv"])) {


        $errors = $_SESSION["errors_deactiv"];
       // echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_deactiv"]);
        unset($_SESSION["username_deactiv"]);
    }else if (isset($_GET['deactivation']) &&$_GET['deactivation']=="success"&& isset($_SESSION["username_deactiv"])) {
        echo '<p class="good_style">'."Учетная запись пользователя ".strtoupper($_SESSION["username_deactiv"])." успешно ОТКЛЮЧЕНА".'</p>';
        unset($_SESSION["username_deactiv"]);
     }
   
    
}

//ОШИБКИ ПРИ НАПИСАНИИ КОММЕНТАРИЯ ОТ ИМЕНИ ПОЛЬЗОВАТЕЛЯ
function check_comment_write_errors()
{
    if (isset($_SESSION["errors_write"])) {


        $errors = $_SESSION["errors_write"];
       // echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_write"]);
        unset($_SESSION["username_write"]);
    }else if (isset($_GET['writecomments']) &&$_GET['writecomments']=="success" && isset($_SESSION["username_write"])) {
        echo '<p class="good_style">'."Вы успешно добавили комментарий от имени пользователя ".strtoupper($_SESSION["username_write"]).'</p>';
        unset($_SESSION["username_write"]);
     }
   
    
}


// ОШИБКИ ПРИ ПОИСКЕ КОММЕНТОВ ВСЕХ КОММЕНТОВ (ОПУБЛИКОВАННЫЕ И НЕОПУБЛИКОВАННЫЕ)
function check_search_comments_errors()
{
    if (isset($_SESSION["errors_search"])) {


        $errors = $_SESSION["errors_search"];
       // echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_search"]);
        unset($_SESSION["username_search"]);
    }else if (isset($_GET['searchcomments']) && $_GET['searchcomments']=="success"){
        echo '<p class="good_style">'."Вы успешно добавили комментарий от имени пользователя ".strtoupper($_SESSION["username_search"]).'</p>';
        unset($_SESSION["username_search"]);
     }
   
    
}



//ОШИБКИ ПРИ ПОИСКЕ ОПУБЛИКОВАННЫХ КОММЕНТОВ
function check_comment_post_errors()
{
   
    if (isset($_SESSION["errors_commentpost_find"])) {


        $errors = $_SESSION["errors_commentpost_find"];
        //echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_commentpost_find"]);
        unset($_SESSION["comment_username"]);
        unset($_SESSION["comment_time"]);
    }else if (isset($_GET['commentpost']) &&$_GET['commentpost']=="success" && isset($_SESSION["comment_username"]) &&isset($_SESSION["comment_time"])) {
        echo '<p class="good_style">'."Комментарий пользователя ".strtoupper($_SESSION["comment_username"])." от ".$_SESSION["comment_time"]." успешно ОПУБЛИКОВАН".'</p>';
        unset($_SESSION["comment_username"]);
        unset($_SESSION["comment_time"]);
     }
   
    
}
//ОШИБКИ ПРИ ПОИСКЕ ЕЩЁ НЕ ОПУБЛИКОВАННЫХ КОММЕНТОВ
function check_comment_ban_errors()
{
   
    if (isset($_SESSION["errors_commentban_find"])) {


        $errors = $_SESSION["errors_commentban_find"];
        //echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_commentban_find"]);
        unset($_SESSION["comment_username"]);
        unset($_SESSION["comment_time"]);
    }else if (isset($_GET['commentban']) &&$_GET['commentban']=="success" && isset($_SESSION["comment_username"]) &&isset($_SESSION["comment_time"])) {
        echo '<p class="good_style">'."Комментарий пользователя ".strtoupper($_SESSION["comment_username"])." от ".$_SESSION["comment_time"]." успешно УДАЛЕН ИЗ ОБЩЕГО ДОСТУПА".'</p>';
        unset($_SESSION["comment_username"]);
        unset($_SESSION["comment_time"]);
     }
   
    
}
//ОШИБКИ ПРИ АКТИВАЦИИ ВСЕХ КОММЕНТОВ ПОЛЬЗОВАТЕЛЯ КОММЕНТОВ
function check_all_comments_post_errors()
{
   
    if (isset($_SESSION["errors_all_comments_post_find"])) {


        $errors = $_SESSION["errors_all_comments_post_find"];
        //echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_all_comments_post_find"]);
        unset($_SESSION["comment_username"]);
        
    }else if (isset($_GET['all_comments_post']) &&$_GET['all_comments_post']=="success" && isset($_SESSION["comment_username"])) {
        echo '<p class="good_style">'."Все комментарии пользователя ".strtoupper($_SESSION["comment_username"])." успешно ОПУБЛИКОВАНЫ".'</p>';
        unset($_SESSION["comment_username"]);
        
     }
   
    
}
//ОШИБКИ ПРИ СОКРЫТИИ ИЗ ОТКРЫТОГО ДОСТУПА ВСЕХ КОММЕНТОВ ПОЛЬЗОВАТЕЛЯ КОММЕНТОВ
function check_all_comments_ban_errors()
{
   
    if (isset($_SESSION["errors_all_comments_ban_find"])) {


        $errors = $_SESSION["errors_all_comments_ban_find"];
        //echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_all_comments_ban_find"]);
        unset($_SESSION["comment_username"]);
        
    }else if (isset($_GET['all_comments_ban']) &&$_GET['all_comments_ban']=="success" && isset($_SESSION["comment_username"])) {
        echo '<p class="good_style">'."Все комментарии пользователя ".strtoupper($_SESSION["comment_username"])." успешно СКРЫТЫ <br>и теперь недоступны в открытом доступе".'</p>';
        unset($_SESSION["comment_username"]);
        
     }
   
    
}
//ОШИБКИ ПРИ ОТПРАВКИ ПИСЬМА
function check_email_send_errors()
{
   
    if (isset($_SESSION["errors_email_send"])) {


        $errors = $_SESSION["errors_email_send"];
        //echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["errors_email_send"]);
        unset($_SESSION["email_from_name"]);
        
    }else if (isset($_GET['email_send']) &&$_GET['email_send']=="success" && isset($_SESSION["email_from_name"])) {
        echo '<p class="good_style">'."Письмо с почты ".strtoupper($_SESSION["email_from_name"])
        ." благополучно отправлено на почту ".strtoupper($_SESSION["email_from_to"]).'</p>';
        unset($_SESSION["email_from_name"]);
        
     }
   
    
}
//ОШИБКИ ПРИ ПРОСМОТРЕ ОТПРАВЛЕННЫХ С УЧЕТКИ ПИСЕМ
function check_email_send_from_errors()
{
   
    if (isset($_SESSION["email_send_from_errors"])) {


        $errors = $_SESSION["email_send_from_errors"];
        //echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["email_send_from_errors"]);
        unset($_SESSION["username_email_search"]);
        
    }
   
    
}
//ОШИБКИ ПРИ ПРОСМОТРЕ ПОЛУЧЕННЫХ НА ПОЧТУ ПИСЕМ
function check_email_received_from_errors()
{
   
    if (isset($_SESSION["email_received_from_errors"])) {


        $errors = $_SESSION["email_received_from_errors"];
        //echo "<br>";

        foreach ($errors as $err) {
            //мы можем выводить ошибки используя стили с html, даже подключая класс, которого тут нет, но он будет на страницу где мы используем эту функцию
            //echo "<p class='errors'>". $err. "</p>";
            echo '<p class="error_style">';
            echo $err;
            echo "<br>";
            echo '</p>';
        }
        //отключаем переменную сессии с ошибками, она больше ненужна и в случае чего создастся снова
        unset($_SESSION["email_received_from_errors"]);
        unset($_SESSION["username_email_search"]);
        
    }
   
    
}