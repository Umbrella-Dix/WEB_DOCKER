<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
 
    $userSearch=$_POST["userSearch"];
  
  
        try {
            //подключение созданных моделей, типо подключение частей кода из данных файлов
    
            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';

            //для того чтобы обработать все ошибки, мы создаем массив по типу ключ=значение и пихаем в него все наши проверялки на ошибки
            $errors =[];

           

            if(empty($userSearch)){
                $errors["id_null"]= "Вы забыли указать ID или Имя пользователя, комментарии которого хотите просмотреть";
            }
        

            $res = get_user_full_info($pdo, $userSearch);
            // var_dump($res);
            // echo "hello wordl";
           
            if (is_username_or_id_wrong($res)) {
                $errors["not_find"]= "Такого пользователя не существует!";
            }

            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["userSearch_taken"]
                $_SESSION["errors_search"]=$errors;
                header("Location: ../admin_page.php");
                die();
            }

            $_SESSION["username_search"]= htmlspecialchars($res["username"]);
            $username=$res["username"];
            $users_id=$res["id"];

            $comments_rersult = search_comment_post( $pdo, $username );
            ?>

            </p>
            <style>
                        td{
                            /* width: 60px;  */
                            height:60px; 
                            border: solid 1px silver; 
                            text-align:center;
                        }
                    </style>

            <a href="../admin_page.php">Вернуться на главную страницу</a>
            <h2>Результат поиска</h2>
           
            <table>
                    <th>ID</th>
                    <th>Имя пользователя</th>
                    <th>Текст комментария</th>
                    <th>Дата написания</th>                    
            <?php 

            //var_dump($result);//выводит всю инфу в виде массива
            if (empty($comments_rersult)|| $comments_rersult==false) {
                
                echo "<tr>";
                    echo "<td>NOT RESULT</td>";
                    echo "<td>NOT RESULT</td>";
                    echo "<td>NOT RESULT</td>";
                    echo "<td>NOT RESULT</td>";
                echo "</tr>";
            }
            else {
                echo "<h3>Все ОПУБЛИКОВАННЫЕ комментарии пользователя ".strtoupper($_SESSION["username_search"])." </h3>";
                //ВЫВОД ДАННЫХ В ВИДЕ ТАБЛИЦЫ
                foreach ($comments_rersult as $row) {
                    echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["comment_text"]). "</td>";
                        echo "<td>" . htmlspecialchars($row["create_at"]) . "</td>"; 
                    echo "</tr>";
                }
                echo "</table><br>";
            }   



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
?>
