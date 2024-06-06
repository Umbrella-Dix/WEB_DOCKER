<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
 
    $username=$_POST["userID"];
    $comment_text=$_POST["content"];
    //$users_id=2;
    // $comment_text="dfdsfsdf";
  
        try {
            //подключение созданных моделей, типо подключение частей кода из данных файлов
    
            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';

            //для того чтобы обработать все ошибки, мы создаем массив по типу ключ=значение и пихаем в него все наши проверялки на ошибки
            $errors =[];
           
            if(empty($username)){
                $errors["id_null"]= "Вы забыли указать ID или Имя пользователя, данные которого хотите обновить!";
            }
        
            if(empty($comment_text)){
                $errors["no_content"]= "Вы не добавили текст комментария!";
                
            }

            $res = get_user_full_info($pdo, $username);
            var_dump($res);
            echo "hello wordl";
           
            if (is_username_or_id_wrong($res)) {
                $errors["not_find"]= "Такого пользователя не существует!";
            }

            if(iconv_strlen($comment_text)>700){
                $errors["text_over"]= "Вас просили написать всего лишь отзыв, а не целую рецензию!";
            }

            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_write"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }

           

            $_SESSION["username_write"]= htmlspecialchars($res["username"]);
            $username=$res["username"];
            $users_id=$res["id"];
            
            write_comment( $pdo, $users_id, $username, $comment_text);
         
            //и возвращаемся на свою основную страницу входа/регистрации передавая на неё гет запрос signup=success
            header("Location: ../admin_page.php?writecomments=success");
    
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