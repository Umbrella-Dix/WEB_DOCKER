<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
//declare(strict_types=1);

if($_SERVER['REQUEST_METHOD']==="POST"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

    //перехватываем данные с формы и присваиваем их переменным
 
    $username=$_POST["userSearch"];
  
  
        try {
            //подключение созданных моделей, типо подключение частей кода из данных файлов
    
            require __DIR__.'/../includes/dbh.inc.php'; 
            require __DIR__.'/../includes/admin_actions.inc.php'; 
            require __DIR__.'/../includes/config_session.inc.php';

            //для того чтобы обработать все ошибки, мы создаем массив по типу ключ=значение и пихаем в него все наши проверялки на ошибки
            $errors =[];

            if(empty($username)){
                $errors["id_null"]= "Вы забыли указать ID или Имя пользователя, письма которого хотите просмотреть!";
            }


            $res = get_user_full_info($pdo, $username);
            
           
            if (is_username_or_id_wrong($res)) {
                $errors["not_find"]= "Такого пользователя не существует!";
            }

            if ($errors) {
                //и теперь мы можем использовать $_SESSION["errors_signup"] как глобальный двойной массив 
                //$_SESSION["errors_signup"]["userSearch_taken"]
                $_SESSION["email_send_from_errors"]=$errors;
                header("Location: ../moder_page.php");
                die();
            }

            $_SESSION["username_email_search"]= htmlspecialchars($res["username"]);
            $username=$res["username"];
            $email =$res["email"];
            //echo $email;
            $users_id=$res["id"];

            $emails_rersult = search_email_from($pdo, $email);
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

            <a href="../moder_page.php">Вернуться на главную страницу</a>
            <h2>Результат поиска</h2>
           
            <table>
                    <th>Откуда</th>
                    <th>Текст письма</th>
                    <th>Куда</th>                    
                    <th>Статус</th>                    
                    <th>Дата отправки</th>                    
            <?php 

            //var_dump($result);//выводит всю инфу в виде массива
            if (empty($emails_rersult)|| $emails_rersult==false) {
                
                echo "<tr>";
                    echo "<td>NOT RESULT</td>";
                    echo "<td>NOT RESULT</td>";
                    echo "<td>NOT RESULT</td>";
                    echo "<td>NOT RESULT</td>";
                echo "</tr>";
            }
            else {
                echo "<h3>Все ОТПРАВЛЕННЫЕ письма пользователя ".strtoupper($_SESSION["username_email_search"])." </h3>";
                //ВЫВОД ДАННЫХ В ВИДЕ ТАБЛИЦЫ
                foreach ($emails_rersult as $row) {
                    echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["email_from"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["email_text"]). "</td>";
                        echo "<td>" . htmlspecialchars($row["email_to"]). "</td>";
                        echo "<td>" . "Отправлено" . "</td>"; 
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

    header("Location: ../moder_page.php");
    die();
}
?>
