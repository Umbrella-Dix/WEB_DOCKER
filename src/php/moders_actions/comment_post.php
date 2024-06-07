<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
   
    //$username=$_POST["username"];
    $comment_id=$_POST["comment_id"];
    
    
  
        try {
         
            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';

          
            $errors=[];
            // if(empty($username)){
            //     $errors["username_null"]= "Вы забыли указать ID или имя пользователя!";
            // }
            if(empty($comment_id)){
                $errors["comment_id_null"]= "Вы забыли указать ID комментария, который хотите опубликовать!";
            }
            $res = get_comment_full_info($pdo, $comment_id);
            // var_dump($res);
            // echo "hello wordl";
            if(!intval($comment_id)){
                $errors["integer_id"]= "Идентификатор - это целое число";
            }
            if (is_username_or_id_wrong($res)) {
                $errors["not_find"]= "Комментарий с таким ID не найден!";
            }

            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_commentpost_find"]=$errors;
                header("Location: ../moder_page.php");
                die();
            }
            
            $comment_id=$res["id"];
            $_SESSION["comment_time"] = htmlspecialchars($res["create_at"]);
            $_SESSION["comment_username"]= htmlspecialchars($res["username"]);

            if ($res["comment_activated"]==1) {
                $errors["active_true"]="Комментарий пользователя ".strtoupper($res["username"])." уже опубликован!";
            }
          
            
            if ($errors) {
                
                $_SESSION["errors_commentpost_find"]=$errors;
                header("Location: ../moder_page.php");
                die();
            }
            activation_comment($pdo, $comment_id);
            header("Location: ../moder_page.php?commentpost=success");
    
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