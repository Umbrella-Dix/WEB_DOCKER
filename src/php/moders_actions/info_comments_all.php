<?php

require __DIR__.'/../includes/dbh.inc.php'; 
require __DIR__.'/../includes/admin_actions.inc.php'; 
require __DIR__.'/../includes/config_session.inc.php';


            $result = Get_comments_info($pdo);


?>
</p>
 <style>
             td{
                 
                 height:60px; 
                 border: solid 1px silver; 
                 text-align:center;
             }
             th{
                width: 20%;
             }
         </style>

<a href="../moder_page.php">Вернуться на главную страницу</a>   
 <h2>Результат поиска</h2>
<table>
        
         <th>ID</th>
         <th>Имя пользователя</th>
         <th>Текст комментария</th>
         <th>Дата создания</th>
 <?php 

//var_dump($resultult);//выводит всю инфу в виде массива
if (empty($result)) {
   echo "NOT result";
}
else {
    //ВЫВОД ДАННЫХ В ВИДЕ ТАБЛИЦЫ
    foreach ($result as $row) {
        
       
        echo "<tr>";
           
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
         
            if($row["comment_activated"]==1)
            {
                echo "<td>" . htmlspecialchars($row["comment_text"]) . "</td>";
            }else {
                echo "<td>" . "Комментарий ещё не прошел модерацию или удален" . "</td>";
            }
           
           
            echo "<td>" . htmlspecialchars($row["create_at"]). "</td>";
        echo "</tr>";
    }
}   
