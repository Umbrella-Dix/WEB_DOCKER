<?php
//нужно подключить файлики, функции из которых мы используем
// в данном случае файлик подключения сессии, и файлики на вывод ошибок через переменные сессии
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
require_once "includes/admin_actions_view.inc.php";


//проверка на тип пользователя, не идельна (юзеры бы смогли заходить на страницы друг друга), 
//но разделяет админов, модеров и юзеров по возможностям
//в случае перехода на чужую страницу прерывает сессию

if($_SESSION["user_type"]!="moderator"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ

  header("Location: includes/logout.inc.php");
  die();
}  


$name= $_SESSION["user_username"];
$email= $_SESSION["user_email"];
?>



<!DOCTYPE html>

<html>

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
  <meta name="keywords" content="новый сезон, оверлорд, повелитель 5, анонс нового сезона overlord, 2024 год" />


  <title>Профиль</title>
	<link rel="icon" href="/img/иконка3.png" type="image/png">

  <link rel="stylesheet" href="/vendors/bootstrap/bootstrap.min.css">

  <link rel="stylesheet" href="/css/css_profile/style.css">
  <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="/css/css_login/style2.css">
  <!-- <link rel="stylesheet" href="/css/css_site/style.css"> -->

</head>


<header class="header_area">
  <div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container box_1620">
       
        <a class="navbar-brand logo_h" href="index.php"><img src="/img/logo3.gif" alt="" width="100" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
       
        <div class="collapse navbar-collapse offset header_tab" id="navbarSupportedContent">
          <ul class="nav navbar-nav menu_nav  justify-content-center">
            <li class="nav-item"><a class="nav-link" href="index.php">Главная</a></li>
            <li class="nav-item"><a class="nav-link" href="archive.php">Архив</a></li>

            <li class="nav-item submenu dropdown ">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Страницы</a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a class="nav-link" href="blog-details.php">топ 3 аниме</a></li>
                <li class="nav-item"><a class="nav-link" href="overlord.php">Оверлорд</a></li>
                <li class="nav-item"><a class="nav-link" href="Звёздное Дитя.php">Звездное дитя</a></li>
                <li class="nav-item"><a class="nav-link" href="гяру.php">Досанко-гяру</a></li>
                <li class="nav-item"><a class="nav-link" href="безымянный.php">Память</a></li>
                <li class="nav-item"><a class="nav-link" href="сэйю.php">Сэйю</a></li>
                <li class="nav-item"><a class="nav-link" href="blond.php">Ангел и демон</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="forum.php">Форум</a></li>
            <li class="nav-item active"><?php if ($_SESSION["user_type"]=="admin") {
                                               echo '<a class="nav-link" href="/php/admin_page.php">Профиль</a></li>'; 
                                            }
                                            else if ($_SESSION["user_type"]=="moderator") {
                                              echo '<a class="nav-link" href="/php/moder_page.php">Профиль</a></li>'; 
                                            }
                                            else if ($_SESSION["user_type"]=="user") {
                                              echo '<a class="nav-link" href="/php/user_page.php">Профиль</a></li>'; 
                                            }
                
                ?>
            </li>
            <li class="nav-item header_tab"><a class="nav-link header_tab" href="/php/includes/logout.inc.php" target="_blank"><img class="image-button" src="/img/logout/logout1.png" alt="" ></img></a>
            </li>

          </ul>
           
        </div>
      </div>
    </nav>
  </div>
</header>




<!--================Header Menu Area =================-->
<main class="site-main">
    <!--================Hero Banner start =================-->  



    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
        <div class="col-lg-8">
          <h1>Основные настройки</h1>
          <!-- <h3 class="center1">Основные настройки</h3> -->
          
        <table class="table table-hover ">


<!-- ПРОСМОТР ДАННЫХ-->

<th>Просмотреть информацию об уже существующих пользователях:</th><th></th>
<form action="moders_actions/info_users.php" method="post">
<tr>
<td></td>
<td><button class="btn btn-warning btn-block btn-sm">Все пользователи</button></td>
</tr>
<tr>
</tr>

</form>

<!-- ПРОСМОТР КОММЕНТОВ-->
<th>Просмотреть все комментарии:</th><th></th>
<form action="moders_actions/info_comments_all.php" method="post">     
<tr>
<td></td>
<td><button class="btn btn-warning btn-block btn-sm">Все комментарии</button></td>
</tr>
<tr>
</tr>
<tr>
<th><?php
check_email_send_from_errors();
?></th><th></th>
</tr>
</form>




<!-- Поиск опубликованных комментариев -->
<th>Поиск опубликованных комментариев</th><th></th>
<form action="moders_actions/search_comments_post.php" method="post"> 
<tr>
<td><label for="search">Введите Имя или ID пользователя, комментарии которого хотите просмотреть:</label></td>
<td> <input type="text" name="userSearch" placeholder="Идентификатор | Имя" /></td>
</tr>
<tr>
<td></td>
<td> <input class="btn btn-warning btn-block btn-sm" type="submit" value="Искать"></p></td>
</tr>
<tr>
<th><?php
check_search_comments_errors();
?></th><th></th>
</tr>
</form>


<!-- Поиск НЕопубликованных комментариев -->
<th>Поиск НЕопубликованных комментариев</th><th></th>
<form action="moders_actions/search_comments_ban.php" method="post">   
<tr>
<td><label for="search">Введите Имя или ID пользователя, комментарии которого хотите просмотреть:</label></td>
<td> <input type="text" name="userSearch" placeholder="Идентификатор | Имя" /></td>
</tr>
<tr>
<td></td>
<td> <input class="btn btn-warning btn-block btn-sm" type="submit" value="Искать"></p></td>
</tr>
<tr>
<th><?php
check_search_comments_errors();
?></th><th></th>
</tr>
</form>

<!-- Опубликовать комментарий:-->
<th>Опубликовать комментарий:</th><th></th>
<form action="moders_actions/comment_post.php" method="post">
<tr>
<td><label for="search1">Введите ID комментария, который хотите опубликовать:</label></td>
<td> <input id="search1" type="text" name="comment_id" placeholder="Идентификатор"></td>
</tr>
<tr>
<td></td>
<td><button class="btn btn-warning btn-block btn-sm">Опубликовать комментарий</button></td>
</tr>
<tr>
<th><?php
check_comment_post_errors();
?></th><th></th>
</tr>
</form>


<!-- Скрыть комментарий из общего доступа::-->
<th>Скрыть комментарий из общего доступа:</th><th></th>
<form action="moders_actions/comment_ban.php" method="post">
<tr>
<td><label for="search1">Введите ID комментария, который хотите скрыть:</label></td>
<td> <input id="search1" type="text" name="comment_id" placeholder="Идентификатор"></td>
</tr>
<tr>
<td></td>
<td><button class="btn btn-warning btn-block btn-sm">Скрыть комментарий</button></td>
</tr>
<tr>
<th><?php
check_comment_ban_errors()
?></th><th></th>
</tr>
</form>

<!-- ДЕЙСТВИЯ ОБЫЧНОГО ЮЗЕРА -->


<!-- НАПИСАНИЕ КОМЕНТА -->
<form action="moders_actions/write_comment_user.php" method="post">
  <th>Написать комментарий:</th><th></th>
  <input type="hidden" name="userID" placeholder="Идентификатор | Имя" value="<?=$name?>" />
  <tr>
  <td>Введите текст комментария: </td><td><textarea class="form-control" rows="8" cols="60"  id="content" name="content"></textarea></td> 
  </tr>
  <tr>
  <tr>
  <td><input type="submit"value="Опубликовать" class="btn btn-warning btn-block btn-sm"></td><td><button type="reset" class="btn btn-warning btn-block btn-sm">Очистить форму</button></td> 
  </tr>
  <tr>
  <th>
  <?php
 check_comment_write_errors();
  ?>
  </th><th></th>
  </tr>

</form>





<!--Написать ПИСЬМО от имени одного пользователя другому пользователю:-->
<form action="moders_actions/send_email.php" method="post">
  <th>Написать ПИСЬМО другому пользователю:</th><th></th>
  <input type="hidden" name="email_from" placeholder="Адрес почты" value="<?=$email?>"/>
  <tr>
  <td>Введите текст письма:</td><td><textarea class="form-control" rows="8" cols="60" id="content" name="email_text"></textarea></td> 
  </tr>
  <tr>
  <td>Кому: </td><td><input type="text" name="email_to" placeholder="Адрес почты" /></td> 
  </tr>

  <tr>
  <td><input type="submit" value="Отправить письмо" class="btn btn-warning btn-block btn-sm"></td><td><button type="reset" class="btn btn-warning btn-block btn-sm">Очистить форму</button></td> 
  </tr>
  <tr>
  <th>
  <?php
 check_email_send_errors()
  ?>
  </th><th></th>
  </tr>

</form>

<!--Поиск ОТПРАВЛЕННЫХ пользователем писем-->
<th>Просмотреть отправленные письма</th><th></th>
<form action="moders_actions/search_email_send.php" method="post">      
<tr>
<td><input type="hidden" name="userSearch" placeholder="Идентификатор | Имя" value="<?=$name?>"/></td>
<td><input class="btn btn-warning btn-block btn-sm" type="submit" value="Просмотреть"></td>
</tr>
<tr>
</tr>
<tr>
<th><?php
check_email_send_from_errors();
?></th><th></th>
</tr>
</form>


<!--Поиск ОТПРАВЛЕННЫХ пользователем писем-->
<th>Просмотреть полученные письма</th><th></th>
<form action="moders_actions/search_email_received.php" method="post">        
<tr>
<td><input type="hidden" name="userSearch" placeholder="Идентификатор | Имя" value="<?=$name?>"/></td>
<td><input class="btn btn-warning btn-block btn-sm" type="submit" value="Просмотреть"></td>
</tr>
<tr>
</tr>
<tr>
<th><?php
check_email_send_from_errors();
?></th><th></th>
</tr>
</form>



</table>

        </div>

          <!-- Start Blog Post Siddebar -->
          <div class="col-lg-4 sidebar-widgets">
            <div class="widget-wrap">

            <div class="rightContent">


              <div class="card">
                <div class="card-header card-title"></div>
                <div class="card-body">

                  <div class="pictureUpload">


                    <div id="pictureList">

                      <img src="/img/img_profile/moderator.png" height="314" class='img-fluid'  />
                      <br />
                    </div>

                  </div>
                </div>

<!-- инфа о том кто вошел в систему -->
            <div class="card-header card-title"><?php 
   
   outout_username();


?></div>
                
              </div>

           

              
                <!-- КНОПКА ВЫХОДА НЕ РАБОТАЕТ -->


                <!-- <div class="card-header card-title">Действие</div>
                <div class="card card-danger">
                  <div class="card-body">
                  <form action="/php/includes/logout.inc.php" method="post">
                  <button class="btn btn-warning btn-block btn-sm">Выйти со всех устройств</button>
                  </form>
                  </div>
                </div>
              </div> -->


            </div>

              </div>
            </div>
          </div>
          <!-- End Blog Post Siddebar -->
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
  </main>











<!--================ Start Footer Area =================-->
<footer class="footer-area section-padding">
  
  <div class="container">
    <div class="row">
      <!-- УБРАЛ col-lg-3 -->
      <div class=" col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>О сайте</h6>
          <p>
            Аниме уже давно не является андеграунд развлечением нескольких отаку, о нем услышал весь мир! Теперь это полноценная культура и как всякая культура должна быть достоянием всего мира, поэтому бесплатное аниме - это необходимость, а не блажь.
            На нашем сайте, у вас появится возможность узнавать о новейших новостях в мира аниме. </p>

          <P>Добро пожаловать на <a href="index.php" class="spn1">Paradise.web-ru.ru!</a> Полнота нашей коллекции целиком и полностью зависит от Вас! Мы благодарны Вам за добавление ссылок, информации о создателях и сэйю, а так же цитат и интересных фактах с описаниями.</P>


        </div>
      </div>



    
    </div>

    <div class=" col-md-6 col-sm-6">
          <div class="single-footer-widget">

            
            <a href="https://readmanga.live"><img alt="Читай мангу Readmanga.ru" src="http://i.imgur.com/Y1pxH.gif"></a>
           
          </div>
        </div>
      </div>

    <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
      <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>
          document.write(new Date().getFullYear());
        </script> | Paradise.web-ru.ru. Все права защищены
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>
  </div>
</footer>
<!--================ End Footer Area =================-->

<script src="/vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="/vendors/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="/js/jquery.ajaxchimp.min.js"></script>
<script src="/js/mail-script.js"></script>
<script src="/js/main.js"></script>


</body>

</html>