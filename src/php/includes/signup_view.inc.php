<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
declare(strict_types=1);


//В ДАННОМ ФАЙЛИКЕ СОЗДЫ ФУНКЦИИ, КОТОРЫЕ ПРИМЕНЯЮТСЯ НА ОСНОВНОЙ СТРАНИЦЕ index.php
//НАПРИМЕР ВЫВОД МАССИВА ОШИБОК, КОТОРЫЕ СОХРАНЕНЫ В ПЕРЕМЕННОЙ СЕССИИ




//функция которая будет выводить массив накопленных ошибок при регистрации
function check_signup_errors()
{
    if (isset($_SESSION["errors_signup"])) {


        $errors = $_SESSION["errors_signup"];
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
        unset($_SESSION["errors_signup"]);
    }else if (isset($_GET['signup']) &&$_GET['signup']=="success") {
       echo '<p class="good_style">'."Учетная запись создана, но пока не активна! Дождитесь её активации администратором!".'</p>';
    }
    else if (isset($_GET['update']) &&$_GET['update']=="success") {
        echo '<p class="good_style">'."Данные пользователя успешно обновлены".'</p>';
     }
    // else{
    //     echo "Что-то пошло не так, попробуйте ещё раз...";
    // }
    
}

