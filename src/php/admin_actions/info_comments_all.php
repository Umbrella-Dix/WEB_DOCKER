<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta content="ParadiseAnime" property="og:site_name">
  <meta content="Новости аниме" name="og:title">
  <meta content="http://paradise.web-ru.ru/" property="og:url">
  <meta name="description" content="Окунитесь в мир новостей аниме на сайте paradise.web-ru.ru, где мы собрали самую 
  большую базу актуальных аниме новостей, в которой вы без труда найдёте самые последние новости аниме индустрии, будь то:
   информация о лучших сэйю, актерах озвучания, топах аниме последних лет, анонсах аниме и датах выхода новых 
  сезонов и адаптаций аниме, все эти новости вы можете почитать на нашем сайте уже сейчас, а также информацию о топ 
  3 аниме 2024 года, новом сезоне оверлорда о жизни сэйю и многом другом">
 <meta name="keywords" content="новый сезон, оверлорд, повелитель 5, анонс нового сезона overlord, 2024 год"/>
  

  <title>Новый сезон Оверлода</title>
	<link rel="icon" href="/img/иконка3.png" type="image/png">

  <link rel="stylesheet" href="/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="/vendors/linericon/style.css">
  <link rel="stylesheet" href="/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="/css/css_site/style.css">
</head>


<?php

require __DIR__.'/../includes/dbh.inc.php'; 
require __DIR__.'/../includes/admin_actions.inc.php'; 
require __DIR__.'/../includes/config_session.inc.php';


            $result = Get_comments_info($pdo);


?>
</p>
 <style>
             td{
                 /* width: 60px;  */
                 height:60px; 
                 border: solid 1px silver; 
                 text-align:center;
             }
             th{
                /* width: 33%; */
             }
         </style>

<a href="../admin_page.php">Вернуться на главную страницу</a>
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
         
            echo "<td>" . htmlspecialchars($row["comment_text"]) . "</td>";
           
            echo "<td>" . htmlspecialchars($row["create_at"]). "</td>";
        echo "</tr>";
    }
}   
