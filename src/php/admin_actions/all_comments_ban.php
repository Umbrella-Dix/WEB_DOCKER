<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    $username=$_POST["username"];

        try {
         
            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';
            

          
            $errors=[];
            if(empty($username)){
                $errors["username_null"]= "Вы забыли указать ID или имя пользователя!";
            }
            $res = get_comment_full_info($pdo, $username);

            if (is_username_or_id_wrong($res)) {
                $errors["not_find"]= "Комментарии данного пользователя не найдены";
            }
            if ($errors) {
                $_SESSION["errors_all_comments_ban_find"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }

            $_SESSION["comment_username"]= htmlspecialchars($res["username"]);

            if ($errors) {
                
                $_SESSION["errors_all_comments_ban_find"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }
            deactivation_all_comments($pdo, $username);
            header("Location: ../admin_page.php?all_comments_ban=success");
    
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