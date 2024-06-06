<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
   
    $username=$_POST["user_activation"];
    
    
  
        try {
            //подключение созданных моделей, типо подключение частей кода из данных файлов


            //подключение файлов из другого каталога
            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';

            $errors=[];
            if(empty($username)){
                $errors["id_null"]= "Вы забыли указать ID учетной записи, которую хотите активировать!";
            }
            $res = get_user_full_info($pdo, $username);
            var_dump($res);
            echo "hello wordl";
           
            if (is_username_or_id_wrong($res)) {
                $errors["not_find"]= "Такого пользователя не существует!";
            }

            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_activ"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }
            
            $user_id=$res["id"];
            $_SESSION["username_activ"]= htmlspecialchars($res["username"]);

            
            if (!is_ID_taken($pdo, $user_id)) {
                $errors["ID_taken"]="Учетной записи с таким ID не существует!";
            }
            if ($res["activated"]==1) {
                $errors["active_true"]="Учетная запись пользователя ".strtoupper($res["username"])." уже активирована!";
            }
          
            
            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_activ"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }
            activation_user($pdo, $user_id);
            header("Location: ../admin_page.php?activation=success");
    
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