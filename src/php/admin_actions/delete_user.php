<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
   
    $user_id=$_POST["user_search_delete"];
    
    
  
        try {
            //подключение созданных моделей, типо подключение частей кода из данных файлов

            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';

            $errors=[];
            if($user_id==null){
                $errors["id_null"]= "Вы забыли указать ID пользователя, данные которого хотите удалить";
            }
            if(!intval($user_id)){
                $errors["integer_id"]= "Идентификатор - это целое число";
            }
            // if (!is_ID_taken($pdo, $user_id)) {
            //     $errors["ID_taken"]="Пользователя с таким ID не существует!";
            // }
            $res = get_user_full_info($pdo, $user_id);
            if (is_username_or_id_wrong($res)) {
                $errors["not_find"]= "Пользователя с таким ID не существует, или ID указан неверно!";
            }
            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_delete"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }
            //var_dump($res);
            $_SESSION["username_delete"]= htmlspecialchars($res["username"]);


            if ($res["user_type"]=="admin") {
               $errors["del_admin"]="Учетную запись АДМИНИСТРАТОРА с именем ".strtoupper($_SESSION["username_delete"])."  нельзя удалить!";
            }
            if ($res["user_type"]=="moderator") {
                $errors["del_moder"]="Учетную запись МОДЕРАТОРА с именем ".strtoupper($_SESSION["username_delete"])." нельзя удалить!";
             }

            //echo $_SESSION["username_delete"];
            //вызываем функцию создания пользователя в бд
            
            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["username_taken"]
                $_SESSION["errors_delete"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }
            delete_user($pdo, $user_id, $res["username"]);
            header("Location: ../admin_page.php?delete=success");
    
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