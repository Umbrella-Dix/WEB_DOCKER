<!-- <?php
//нужно подключить файлики, функции из которых мы используем
// в данном случае файлик подключения сессии, и файлики на вывод ошибок через переменные сессии
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
require_once "includes/admin_actions_view.inc.php";

//проверка на тип пользователя, не идельна (юзеры бы смогли заходить на страницы друг друга), 
//но разделяет админов, модеров и юзеров по возможностям
//в случае перехода на чужую страницу прерывает сессию

//ПРОВЕРКА АВТОРИЗАЦИИ НА САЙТЕ
if($_SESSION["user_type"]=="admin" || $_SESSION["user_type"]=="user" || $_SESSION["user_type"]=="moderator"){//ОЧЕНЬ ВАЖНЫЙ МОМЕНТ - POST НУЖНО ПИСАТЬ КАПСОМ А НЕ МАЛЕНЬКИМИ БУКВАМИ  
} 
else{header("Location: /php/includes/logout.inc.php");
  die();} 
?>
 -->





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
 <meta name="keywords" content="новое аниме, анонс анимэ, адаптация манги, Unnamed Memory"/>
  


  <title>Трейлер и постер аниме-адаптации ранобэ «Unnamed Memory»</title>
	<link rel="icon" href="/img/иконка3.png" type="image/png">

  <link rel="stylesheet" href="/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="/vendors/linericon/style.css">
  <link rel="stylesheet" href="/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="/css/css_site/style.css">
</head>
<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.php"><img src="/img/logo3.gif" alt="" width="100" height="50"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset " id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
              <li class="nav-item "><a class="nav-link" href="index.php">Главная</a></li> 
              <li class="nav-item"><a class="nav-link" href="archive.php">Архив</a></li> 
              
              <li class="nav-item submenu dropdown active">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Страницы</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog-details.php">топ 3 аниме</a></li>
                  <li class="nav-item"><a class="nav-link" href="overlord.php">Оверлорд</a></li>
                  <li class="nav-item"><a class="nav-link" href="Звёздное Дитя.php">Звездное дитя</a></li>
                  <li class="nav-item"><a class="nav-link" href="гяру.php">Досанко-гяру</a></li>
                  <li class="nav-item"><a class="nav-link" href="безымянный.php">Память</a></li>
                  <li class="nav-item"><a class="nav-link" href="сэйю.php">Сэйю</a></li>
                  <li class="nav-item"><a class="nav-link" href="blond.php">Ангел и демон</a></li>
                  <li class="nav-item"><a class="nav-link" href="index2.php">Главная №2</a></li>


                </ul>
                <li class="nav-item"><a class="nav-link" href="forum.php">Форум</a></li>
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
            
             

           <div class="tab">
            <ul class="nav navbar-nav navbar-right navbar-social st header_tab">
            <li><a href="https://vk.com/id269803180" target="_blank"><img class="image-button" src="/img/contact/vk.png" alt=""></img></a></li>
            <li> <a href="https://web.telegram.org/" target="_blank"><img class="image-button" src="/img/contact/tg.png" alt=""></img></a></li>
            <li><a href="https://360.yandex.ru/mail/" target="_blank"><img class="image-button" src="/img/contact/ya.png" alt=""></img></a>
            </li>
            <li><a href="https://mail.ru/" target="_blank"><img class="image-button" src="/img/contact/mail.png" alt="" ></img></a>
            </li>
            <li></li>
            <li></li>
            <li><a href="/php/includes/logout.inc.php" target="_blank"><img class="image-button" src="/img/logout/logout1.png" alt="" ></img></a>
            </li>
          </ul>

           </div>
            

          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->
  
  <!--================ Hero sm Banner start =================-->      
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <!-- УБРАЛ ТУТ БЫЛ КАКОЙ ТО ТЕКСТ НА КАРТИНКЕ С ССЫЛКАМИ -->
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm Banner end =================-->    


  

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin mt-4">
    <div class="container">
      <div class="row">

        <div class="col-lg-8">
          
          <div class="main_blog_details">
              <!-- <img class="img-fluid" src="img/blog/blog4.png" alt=""> -->
              <a href="#"><h4>Трейлер и постер аниме-адаптации ранобэ «Unnamed Memory»</h4></a>
              <div class="user_details">
                <!-- <div class="float-left">
                  <a href="#">Lifestyle</a>
                  <a href="#">Gadget</a>
                </div> -->
                <div class="float-right mt-sm-0 mt-3">
                  <div class="media">
                    <div class="media-body">
                      <h5>Заяшников Андрей</h5>
                      <p>31 мая, 2024 15:38</p>
                    </div>
                    <div class="d-flex">
                      <img width="42" height="42" src="/img/blog/avatarka.jpg" alt="">
                    </div>
                  </div>
                </div>
              </div>
              
            
              <p class="otstup"  id="root">Премьера - от студии ENGI состоится в 2024 году.
              </p>
              

              
              <figure class="wp-block-embed">
                <iframe width="730"  height="411" src="https://www.youtube.com/embed/YU0ew48YlHg?si=F3218IkL1TFz0Wn0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

              </figure>
              

              <img class="img-fluid" src="/img/blog/top.jpg" alt="">
              


       
       
         <div class="news_d_footer flex-column flex-sm-row">
               <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>4 человека оценили эту статью</a>
               <!-- <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>06 Comments</a> -->
               <div class="news_socail ml-sm-auto mt-sm-0 mt-2">

             <!-- <a href="#"><i class="fab fa-facebook-f"></i></a>
             <a href="#"><i class="ti-tumblr-alt"></i></a>
             <a href="#"><i class="fab fa-dribbble"></i></a>
             <a href="#"><i class="fab fa-behance"></i></a> -->
             <a href="https://vk.com/id269803180" target="_blank"><img class="image-button" src="/img/contact/vk.png" alt=""></img></a>
             <a href="https://web.telegram.org/" target="_blank"><img class="image-button" src="/img/contact/tg.png" alt=""></img></a>
             <a href="https://360.yandex.ru/mail/" target="_blank"><img class="image-button" src="/img/contact/ya.png" alt=""></img></a>
             <a href="https://mail.ru/" target="_blank"><img class="image-button" src="/img/contact/mail.png" alt=""></img></a>
           </div>
          </div>
        </div>
      </div>

        <!-- Start Blog Post Siddebar -->
        <div class="col-lg-4 sidebar-widgets">
          <div class="widget-wrap">

            <div class="single-sidebar-widget popular-post-widget" id="navbarSupportedContent">
              <h4 class="single-sidebar-widget__title">Самые популярные</h4>
              <div class="popular-post-list">

              

                <div class="single-post-list">
                  <div class="thumb">
                    <a href="overlord.php"><div  class="img_wrap2"><img class="img-fluid card-img rounded-0 big-image-button" src="/img/blog/OVERLORD/2.png" alt=""></div></a> 
                    
                    
                  </div>
                  <div class="details mt-20">
                    <a href="overlord.php">
                      <h6>Выход нового сезона Оверлорд</h6>
                    </a>
                  </div>
                </div>

                <div class="single-post-list">
                  <div class="thumb">
                     <!-- <a href="сэйю.php"><img class="card-img rounded-0 big-image-button" src="img/seuy/2.jpeg" alt=""></a>
                      -->
                      <a href="сэйю.php"><div  class="img_wrap2"><img class="img-fluid card-img rounded-0 big-image-button" src="/img/blog/seuy/2.jpeg" alt=""></div></a> 
                    
                  </div>
                  <div class="details mt-20">
                    <a href="сэйю.php">
                      <h6>Новости о японских Сэйю</h6>
                    </a>
                  </div>
                </div>

                <div class="single-post-list">
                  <div class="thumb">
                    <!-- <a href="blond.php"><img class="card-img rounded-0 big-image-button" src="img/blog/868_o.jpg" alt=""></a>
                     -->
                     <a href="blond.php"><div  class="img_wrap2"><img class="img-fluid card-img rounded-0 big-image-button" src="/img/blog/868_o.jpg" alt=""></div></a> 
                    
                   
                  </div>
                  <div class="details mt-20">
                    <a href="blond.php">
                      <h6>Третий сезон аниме-адаптации манги «Yuru Camp△»
                      </h6>
                    </a>
                  </div>
                </div>

              </div>
            </div>

            </div>
          </div>
          </div>
        <!-- End Blog Post Siddebar -->
      </div>
  </section>
  <!--================ End Blog Post Area =================-->

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

       
       
        <!-- УБРАЛ col-lg-2 -->
        <div class=" col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Наши соцсети и контакты</h6>
            <p>Давайте будем общительными</p>

            <!-- <ul class="nav navbar-nav navbar-right navbar-social st">
              <li><a href="https://vk.com/id269803180" target="_blank"><img class="image-button" src="img/contact/vk.png" alt=""></img></a></li>
              <li> <a href="https://web.telegram.org/" target="_blank"><img class="image-button" src="img/contact/tg.png" alt=""></img></a></li>
              <li><a href="https://360.yandex.ru/mail/" target="_blank"><img class="image-button" src="img/contact/ya.png" alt=""></img></a>
              </li>
              <li><a href="https://mail.ru/" target="_blank"><img class="image-button" src="img/contact/mail.png" alt="" ></img></a>
              </li>
            </ul> -->
              
            <a href="https://vk.com/id269803180" target="_blank"><img class="image-button st2" src="/img/contact/vk.png" alt=""></img></a>
            <a href="https://web.telegram.org/" target="_blank"><img class="image-button st2" src="/img/contact/tg.png" alt=""></img></a>
            <a href="https://360.yandex.ru/mail/" target="_blank"><img class="image-button st2" src="/img/contact/ya.png" alt=""></img></a>
            <a href="https://mail.ru/" target="_blank"><img class="image-button st2" src="/img/contact/mail.png" alt=""></img></a>
            
            <p class="st3">А также не забывайте, что помимо аниме <br>существует и манга</p>
            <a href="https://readmanga.live"><img alt="Читай мангу Readmanga.ru" src="http://i.imgur.com/Y1pxH.gif"></a>
            <!-- <div class="footer-social d-flex align-items-center">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-dribbble"></i>
              </a>
              <a href="#">
                <i class="fab fa-behance"></i>
              </a>
            </div> -->
          </div>
        </div>
      </div>


      <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
        <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Paradise.web-ru.ru. Все права защищены
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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

  <!-- ЗАПРЕТ НА КОПИРОВАНИЕ -->

  <script type="text/javascript">

    document.ondragstart = noselect;

    document.onselectstart = noselect;

    document.oncontextmenu = noselect;

    function noselect() {return false;}

</script>
</body>
</html>