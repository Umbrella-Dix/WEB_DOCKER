<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
   
    $username=$_POST["user_deactivation"];
    
    
  
        try {
            //подключение созданных моделей, типо подключение частей кода из данных файлов


            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';


            $errors=[];
            if(empty($username)){
                $errors["id_null"]= "Вы забыли указать ID учетной записи, которую хотите ОТКЛЮЧИТЬ!";
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
                $_SESSION["errors_deactiv"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }

            $user_id=$res["id"];
            $_SESSION["username_deactiv"]= htmlspecialchars($res["username"]);



            if (!is_ID_taken($pdo, $user_id)) {
                $errors["ID_taken"]="Учетной записи с таким ID не существует!";
            }
            if ($res["activated"]==0) {
                $errors["deactive_true"]="Учетная запись пользователя ".strtoupper($res["username"])." уже ОТКЛЮЧЕНА или ещё НЕ СОЗДАНА!";
            }
            // if ($res["user_type"]=="admin") {
            //    $errors["del_admin"]="Учетную запись АДМИНИСТРАТОРА с именем ".strtoupper($_SESSION["username_delete"])."  нельзя удалить!";
            // }
            // if ($res["user_type"]=="moderator") {
            //     $errors["del_moder"]="Учетную запись МОДЕРАТОРА с именем ".strtoupper($_SESSION["username_delete"])." нельзя удалить!";
            //  }

            //echo $_SESSION["username_delete"];
            //вызываем функцию создания пользователя в бд
            
            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_deactiv"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }
            deactivation_user($pdo, $user_id);
            header("Location: ../admin_page.php?deactivation=success");
    
            //обнуляем значения переменных работающих с бд, для безопасности
            $pdo=null;
            $stmt=null;
       
            die();
    
        }catch (PDOException $e) {
            die("Ошибка при считывании данных из формы: ".$e->getMessage());
        }
        
    }
else{
   
    header("Location: ../admin_page.php");
    die();
}