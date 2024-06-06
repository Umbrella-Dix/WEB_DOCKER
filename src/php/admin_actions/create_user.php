<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $email=$_POST["email"];
    $user_type=$_POST["user_type"];
    
  
        try {
            //подключение созданных моделей, типо подключение частей кода из данных файлов
    
            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';

            //ОБРАБОТЧИК ОШИБОК, БЕЗОПАСНОСТЬ СО СТРОНЫ СЕРВЕРА, ЧЕРЕЗ РАЗДЕЛЕННЫЕ ФАЙЛИКИ, КОТОРЫЕ МЫ ПОДКЛЮЧИЛИ РАНЕЕ
    
            //для того чтобы обработать все ошибки, мы создаем массив по типу ключ=значение и пихаем в него все наши проверялки на ошибки
            $errors =[];
    
    
    
            //проверка на пустые поля (ибо проверка через html ненадежна)
            if (is_input_empty($username, $pwd, $email)) {
                $errors["empty_input"]="Одно или несколько полей не заполнены!";
            }
            
            //проверка корректности почты
            if (is_email_invalid($email)) {
                $errors["invalid_email"]="Почты с таким адресом не существует!";
            }
            //проверка существует ли имя в бд
            if (is_username_taken($pdo, $username)) {
                $errors["username_taken"]="Пользователь с таким именем уже существует!";
            }
            //аналогичная проверка почты
            if ( is_email_registred($pdo, $email)) {
                $errors["email_used"]="Адрес этой почты уже исользуется другим пользователем!";
            }
          
            //ну и типо если массив не пустой (есть ошибки) то создается переменная сессии, которую потом мы можем вывести где то на другой странице (в виде перебора массива через цикл)
            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_create"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }
            
            //вызываем функцию создания пользователя в бд
            create_user($pdo, $username,  $pwd, $email, $user_type);
            //и возвращаемся на свою основную страницу входа/регистрации передавая на неё гет запрос signup=success
            header("Location: ../admin_page.php?create=success");
    
            //обнуляем значения переменных работающих с бд, для безопасности
            $pdo=null;
            $stmt=null;
            //     die() закрывает соединение;
    // exit() не закрывает соединение.
            die();
    
        }catch (PDOException $e) {
            die("Ошибка при считывании данных из формы: ".$e->getMessage());
        }
        
    }
else{
    //перенаправление на другую станицу (любой адрес)
    //header("Location: https://findanime.net/");
    header("Location: ../admin_page.php");

//     die() закрывает соединение;
// exit() не закрывает соединение.
    die();
}