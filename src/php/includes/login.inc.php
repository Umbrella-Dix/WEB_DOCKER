<?php

///ГЛАВНЫЙ ФАЙЛ ВХОДА!!!






//БОЛЬШИНСТВО КОДА ПОХОЖЕ НА signup.inc.php
//поэтому часть описания в комментариях может относится к функциям из того файла

//ПРОСТО ГЛАВНЫЙ ФАЙЛИК ПРО ВХОД В СИСТЕМУ, КОТОРЫЙ ПОДКЛЮЧАЕТ И ИСПОЛЬЗУЕТ ДРУГИЕ С ПОХОЖИМ НАЗВАНИЕМ




//проверяем перешел ли пользователь через форму, и если просто по url, то возвращаем его обратно на форму

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];


try {

 //подключение созданных моделей, типо подключение частей кода из данных файлов
 require_once 'dbh.inc.php';
 require_once 'login_model.inc.php';
 require_once 'login_contr.inc.php';
 require_once "config_session.inc.php";
 //ОБРАБОТЧИК ОШИБОК, БЕЗОПАСНОСТЬ СО СТРОНЫ СЕРВЕРА, ЧЕРЕЗ РАЗДЕЛЕННЫЕ ФАЙЛИКИ, КОТОРЫЕ МЫ ПОДКЛЮЧИЛИ РАНЕЕ
//для того чтобы обработать все ошибки, мы создаем массив по типу ключ=значение и пихаем в него все наши проверялки на ошибки
$errors =[];

//В БЛОКАХ if МЫ СОБИРАЕМ ДАННЫЕ ОБ ОШИБКАХ И ДОБАВЛЯЕМ ИХ В МАССИВ




//проверка на пустые поля (ибо проверка через html ненадежна)



if (is_input_empty_login($username, $pwd)) {
    $errors["empty_input_login"]="Одно или несколько полей не заполнены!";
}

//функция которая возвращает массив данных пользователя или ложь, записываем в созданную переменную
$result = get_user($pdo, $username);

//проверка имени пользователя истина/ложь
// if (is_username_wrong($result)) {
//     $errors["login_incorrect"]="Пользователя с таким именем не существует!";
// }
//подобная проверка логина + пароля через разхэширование
//где $result["pwd"]) возвращает захэшированныйц пароль из бд
if (is_username_wrong($result) || is_password_wrong($pwd, $result["pwd"])) {
    $errors["password_incorrect"]="Ошибка логина или пароля!";
}
if ($errors) {
    //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
    //$_SESSION["errors_signup"]["username_taken"]
    $_SESSION["errors_login"]=$errors;
    header("Location: /index.php");   
    die();
}


if (is_not_activated($result["activated"])) {
    $errors["not_activated"]="Учетная запись ещё не активирована или деактивирована администратором!";
}




//можно было бы не юзать этот файлик про сессию и просто написать session_start();, но так безопаснее (просто пставляем код запуска сессии из файла)


//ну и типо если массив не пустой (есть ошибки) то создается переменная сессии, которую потом мы можем вывести где то на другой странице (в виде перебора массива через цикл)
if ($errors) {
    //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
    //$_SESSION["errors_signup"]["username_taken"]
    $_SESSION["errors_login"]=$errors;
    header("Location: /index.php");   
    die();
}

$_SESSION["user_id"]=$result["id"];


//$_SESSION["session_id"]=session_id();
//и также создаем переменную с именем пользователя, например чтоб вывести на других страницах
//для защиты от скриптов превращаем их в текст html
$_SESSION["user_username"]= htmlspecialchars($result["username"]);
$_SESSION["user_email"]= htmlspecialchars($result["email"]);
$_SESSION["user_type"]= htmlspecialchars($result["user_type"]);
//таким образом можно распечатывать имена или другие данные пользователя без обращения к бд каждый раз
$_SESSION["last_regeneration"]=time();


// if ($_SESSION["user_type"]=="admin") {
//     header("Location: /php/admin_page.php");
// }
//для безопасности создаем новый id сессии для пользователя который вошел в систему
$newSession = session_create_id();//берем стандартный автоматически созданный id
//создаем новый идентификатор для пользователя, состоящий из текущей сессии + его id из бд
$sessionID =$newSession ."_". $result["id"];
//и присваиваем его нашей сессии
// session_id($sessionID);
//создаем переменную сессии, с новый id




//переходим на нашу главную страницу и сообщаем об успешном входе в систему через гет запрос
//header("Location: ../index.php?login=success");

if ($_SESSION["user_type"]=="admin") {
    header("Location: ../admin_page.php");
}
else if ($_SESSION["user_type"]=="moderator") {
    header("Location: ../moder_page.php");
}
else if ($_SESSION["user_type"]=="user") {
    header("Location: ../user_page.php");
}


    

//обнуляем значения переменных работающих с бд, для безопасности
$pdo=null;
$stmt=null;
//     die() закрывает соединение;
// exit() не закрывает соединение.
die();

} catch (PDOException $e) {
    die("Ошибка при считывании данных из формы: ".$e->getMessage());
}



}else{
    //перенаправление на другую станицу (любой адрес)
    //header("Location: https://findanime.net/");
    header("Location: /index.php");

//     die() закрывает соединение;
// exit() не закрывает соединение.
    die();
}