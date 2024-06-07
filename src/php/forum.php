
<?php
        require_once "includes/dbh.inc.php";
        require_once "includes/admin_actions.inc.php";
        require_once "includes/config_session.inc.php";
        require_once "includes/signup_view.inc.php";
        require_once "includes/login_view.inc.php";
        require_once "includes/admin_actions_view.inc.php";

if($_SESSION["user_type"]=="admin" || $_SESSION["user_type"]=="user" || $_SESSION["user_type"]=="moderator"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ  
} 
else{header("Location: /php/includes/logout.inc.php");
  die();} 
           
            $result = Get_comments_info($pdo);


            // ЧТОБЫ ФОТО БЫЛИ ДЛЯ ЮЗЕРА МОДЕРА И АДМИНА СОБСТВЕННЫЕ
            // $result2 = get_users_info($pdo);
            // foreach ($result2 as $row) {
            //       echo $row["user_type"]. '<br>';
            // }

        ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   


    <title>Последние новости аниме индустрии</title>
    <link rel="icon" href="/img/иконка3.png" type="image/png">
  
    <link rel="stylesheet" href="/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/css_profile/style.css">
    <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/css/css_login/style2.css">
    <link rel="stylesheet" href="/css/css_forum/general.css" />
    <link rel="stylesheet" href="/css/css_forum/index.css" />


  </head>
  <body>



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
            <li class="nav-item active"><a class="nav-link" href="forum.php">Форум</a></li>
            <li class="nav-item "><?php if ($_SESSION["user_type"]=="admin") {
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
    <main>
      <div class="container">
        <div class="row">





          <section class="left">
            <h2>Форум для общения</h2>
            <div class="inner-left">

             



              <?php

//var_dump($resultult);//выводит всю инфу в виде массива
if (empty($result)) {
  //echo "NOT result";
}
else {
    //ВЫВОД ДАННЫХ В ВИДЕ ТАБЛИЦЫ
    $i =0;
   

    }
    foreach ($result as $row) {
        $i++;

        // if($i==15){break;}
       
        echo '<div class="box">
        <div class="img">';
        if ($i%2==0) {
          echo '<img src="/img/img_forum/one.png" alt="" />';
        }
        else{echo '<img src="/img/img_forum/hel.png" alt="" />';}
     
     
                  
                echo '</div>
                <div class="details">
                  
                  <h2>'. htmlspecialchars($row["username"]) .'</h2>
                  <p>'. htmlspecialchars($row["comment_text"]) .'</p>
                  
                  <span>Дата написания</span>
                  <span>'. htmlspecialchars($row["create_at"]).'</span>
                  <div class="comment">
                    <i class="fa-solid fa-comment"></i>
                    
                  </div>
                </div>
              </div>';
    }
  
// <div class="comment">';<div ><img class="image-button" src="/img/img_forum/dislike.png" alt="" ></img></div>


?>

            </div>
          </section>


<!-- ###################################### -->

        </div>
      </div>
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
