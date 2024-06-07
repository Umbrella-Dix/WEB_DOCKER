<?php

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