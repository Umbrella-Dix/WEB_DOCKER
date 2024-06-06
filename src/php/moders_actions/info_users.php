<?php

require __DIR__.'/../includes/dbh.inc.php'; 
require __DIR__.'/../includes/admin_actions.inc.php'; 
require __DIR__.'/../includes/config_session.inc.php';


            $res = (get_users_info($pdo));


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
        
         <th>Идентификатор</th>
         <th>Имя пользователя</th>
         <th>Пароль</th>
         <th>Почта</th>
         <th>Уровень привелегий</th>
         <th>Активирована ли учетная запись</th>
         <th>Дата создания</th>
 <?php 

//var_dump($result);//выводит всю инфу в виде массива
if (empty($res)) {
   echo "NOT RESULT";
}
else {
    //ВЫВОД ДАННЫХ В ВИДЕ ТАБЛИЦЫ
    foreach ($res as $row) {
        
       
        echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["pwd"]). "</td>";
            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["user_type"]) . "</td>";
            if (htmlspecialchars($row["activated"])==1) {
                echo "<td>" ."Активирована". "</td>";
            }else {
                echo "<td>" ."Отключена". "</td>";
            } 
            echo "<td>" . htmlspecialchars($row["create_at"]). "</td>";
        echo "</tr>";
    }
}   
