<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
declare(strict_types=1);


//БОЛЬШИНСТВО КОДА ИЗ ЭТОГО ФАЙЛА ПОХОЖЕ НА signup_view.inc.php








//ОПОВЕЩЕНИЕ КТО ВОШЕЛ В СИСТЕМУ ИЛИ ВЫШЕЛ 
?>
<div class="div_center"><?php
function outout_username()
{
    // $top = "Среди подростков австралийского городка набирает популярность необычное развлечение. Нужно зажечь свечу, пожать жутковатую керамическую руку, произнести «Поговори со мной» — и тогда можно увидеть призрака и даже ненадолго впустить его в себя. Несмотря на то что прежний владелец артефакта покончил с собой, ребята на вечеринках радостно балуются необычными способностями руки, пока одним из вызванных призраков не оказывается мама 17-летней Мии, умершая два года назад.";
    // echo iconv_strlen($top);

    if (isset($_SESSION["user_id"])) {
        echo '<p class="good_style">'."Добрый день, уважаемый ".strtoupper($_SESSION["user_type"]).'</p>';
        echo '<p class="good_style">'."Вы вошли в систему под именем ".strtoupper($_SESSION["user_username"]).'</p>';
        echo '<p class="good_style">'."Ваш текущий id сессии ".session_id().'</p>';
        
    }else {
        echo '<p class="error_style">'."Вы НЕ вошли в систему".'</p>';
        header("Location: /index.php");
    }
}?>

</div>

<?php



//АНАЛОГИЧНАЯ ФУНКЦИЯ ЕСТЬ ПРИ ВЫВОДЕ ОШИБОК ВОВРЕМЯ РЕГИСТРАЦИИ, ТУТ ДЛЯ ВХОДА
function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {


        $errors = $_SESSION["errors_login"];
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
        unset($_SESSION["errors_login"]);
    }else if (isset($_GET['login']) &&$_GET['login']=="success") {
       echo '<p class="good_style">'."Вы успешно ВОШЛИ В СИСТЕМУ ПОД СВОИМ ЛОГИНОМ".'</p>';
    }
    // else{
    //     echo "Что-то пошло не так, попробуйте ещё раз...";
    // }
    
}