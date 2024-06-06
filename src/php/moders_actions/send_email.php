<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
 
    $email_from=$_POST["email_from"];
    $email_to=$_POST["email_to"];
    $email_text=$_POST["email_text"];
    //$users_id=2;
    // $comment_text="dfdsfsdf";
  
        try {
            //подключение созданных моделей, типо подключение частей кода из данных файлов
    
            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';

            //для того чтобы обработать все ошибки, мы создаем массив по типу ключ=значение и пихаем в него все наши проверялки на ошибки
            $errors =[];

            if (is_email_invalid($email_from) ||is_email_invalid($email_to)) {
                $errors["invalid_email"]="Некорректный почтовый адрес!";
            }
            if(empty($email_from)){
                $errors["email_from_null"]= "Вы забыли указать почту, С КОТОРОЙ хотите отправить сообщение!";
            }
            if(empty($email_to)){
                $errors["email_to_null"]= "Вы забыли указать почту, НА КОТОРУЮ хотите отправить сообщение!";
            }     
            if(empty($email_text)){
                $errors["no_content"]= "Вы не добавили текст сообщения!";
                
            }

            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_email_send"]=$errors;
                header("Location: ../moder_page.php");
                die();
            }

            $res1 = get_user_full_info_email($pdo, $email_from);
            $res2 = get_user_full_info_email($pdo, $email_to);

            if (is_username_or_id_wrong($res1)) {
                $errors["not_find_from"]= "Почты ".strtoupper($email_from)." не существует!";
            }
            if (is_username_or_id_wrong($res2)) {
                $errors["not_find_to"]= "Почты ".strtoupper($email_to)." не существует!";
            }

            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_email_send"]=$errors;
                header("Location: ../moder_page.php");
                die();
            }

           

            $_SESSION["email_from_name"]= htmlspecialchars($res1["email"]);
            $_SESSION["email_from_to"]= htmlspecialchars($res2["email"]);
            $username=$res1["username"];
            $users_id=$res1["id"];
            
            send_email($pdo, $email_from, $email_text,  $email_to, $users_id);
         
            //и возвращаемся на свою основную страницу входа/регистрации передавая на неё гет запрос signup=success
            header("Location: ../moder_page.php?email_send=success");
    
            //обнуляем значения переменных работающих с бд, для безопасности
            $pdo=null;
            $stmt=null;
            die();
    
        }catch (PDOException $e) {
            die("Ошибка при считывании данных из формы: ".$e->getMessage());
        }
        
    }
else{
    //перенаправление на другую станицу (любой адрес)
    //header("Location: https://findanime.net/");
    header("Location: ../moder_page.php");

//     die() закрывает соединение;
// exit() не закрывает соединение.
    die();
}