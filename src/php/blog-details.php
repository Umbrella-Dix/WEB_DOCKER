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
 <meta name="keywords" content="топ аниме, лучшие аниме 2024, самые лучшие анимэ , топчик анимэ"/>
  

  <title>3 лучших новинки аниме
    зимнего сезона 2024</title>
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
          <!-- УБРАЛ ТЕКСТ НА КАРТИНКЕ С ССЫЛКАМИ -->
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm Banner end =================-->    


  

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin mt-4">
    <div class="container">

     

        <!-- Основная часть -->
      <div class="row">

        <div class="col-lg-8">
          
          <div class="main_blog_details">
              <!-- <img class="img-fluid" src="img/blog/blog4.png" alt=""> -->
              <a href="#"><h4>3 лучших новинки аниме <br /> зимнего сезона 2024</h4></a>
              <div class="user_details">
                
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
              <img class="img-fluid" src="/img/blog/scale_1200.jfif" alt="">
            
              <p class="otstup"  id="root">Зимний сезон аниме 2024 оказался богатым на новинки: их было аж 33 штуки! Во время предобзора я заценил их все, и даже принял решение посмотреть большую часть – 25 тайтлов – целиком. И посмотрел уже все, кроме тех, которые столкнулись с производственными трудностями и, по сути, уже вылетели за рамки зимнего сезона: «Ниер: Автомата — Версия 1.1а», «Кубо не прощает меня — моба» и «Треугольник Аякаси». К ним я обязательно вернусь, а пока что сфокусируюсь на вышедших полностью.

                Если вы читаете мои обзоры, то, скорее всего, уже знаете, как будет выглядеть эта тройка лучших аниме зимы. А если ещё не читаете – то начинайте, потому что сразу следом за этим постом стартует предобзор новинок весеннего сезона!
                
                Вообще, эта зима выдалась довольно богатой на хорошие тайтлы: почти половина тех, что я посмотрел целиком, получила оценку в 7 баллов из 10 и выше. Но ощутимо выделились среди них только три сериала, о которых я сейчас и расскажу.
              
              </p>
              


         <h2>3-е место: «Триган: Ураган» (Trigun Stampede)</h2>
         <img class="img-fluid" src="/img/blog/scale_2400.jfif" alt="">
         <p class="otstup"  id="root">Новое прочтение оригинальной манги, получившей ставшую культовой экранизацию в конце 90-х. В этот раз авторы адаптации избрали другой подход: аниме с самого начала наполнено более серьёзной и мрачной атмосферой, и фокусируется на глобальных и вечных вопросах человечности, подавая их посредством динамичной, но весьма трагичной истории.

          Открывается произведение крушением флота космических кораблей на пустынную планету. Благодаря уцелевшим технологиям производства воды и пищи часть пассажиров этой экспедиции умудряется выжить в суровых условиях и выстроить некоторое подобие цивилизации. Правда, по характеру эта жизнь несколько напоминает американский Дикий Запад.
          
          Молодая журналистка Мерил Страйф, в сопровождении своего матёрого коллеги Роберто Де Ниро, колесит по пескам в поисках сенсации: легендарного преступника Вэша, по кличке "Ураган". Но, когда они при странных обстоятельствах случайно натыкаются на этого парня, то ещё не представляют себе, в какой водоворот событий их затянет это знакомство.
          
          Очень достойная экранизация, которая превзошла мои изначальные ожидания.</p>



          <h2>2-е место: «Томо — девушка!» (Tomo-chan wa Onnanoko!)</h2>
         <img class="img-fluid" src="/img/blog/scale_2500.jfif" alt="">
         <p class="otstup"  id="root">Ностальгически-классическая романтическая комедия, которая тоже оказалась сильно лучше, чем я думал поначалу.

          Аидзава Томо и Кубота Дзюнъитиро с малых лет были не разлей вода. Правда, до начала средней школы Дзюн даже не догадывался, что его братан на самом деле девочка! И хоть это открытие стало для парня шоком, сейчас, в старших классах, их дружба крепка как никогда. Вот только сердце Томо переполняют ещё более серьёзные чувства, которые она даже пытается донести до дубоголового юноши. Удастся ли ей добиться понимания – и, главное, взаимности? Их общие друзья пытаются посильно помочь процессу, но задача очень непростая!
          
          Когда я начинал смотреть это аниме, то думал, что оно просто пройдётся по привычным штампам – и это будет миленько, но не более того. А по факту было существенно интереснее, современнее и красивее. Очень приятная и душевная история.</p>


          <h2>1-е место: «Ангел по соседству» (Otonari no Tenshi-sama ni Itsunomanika Dame Ningen ni Sareteita Ken)</h2>
         <img class="img-fluid" src="/img/blog/scale_2600.jfif" alt="">
         <p class="otstup"  id="root">В случае этого аниме у меня уже во время предобзора было довольно высокие ожидания. Но оно умудрилось превзойти даже их. Одно из лучших романтических произведений за последнее время в моих глазах.

          Фудзимия Аманэ был обычным, если не сказать нелюдимым старшеклассником, который неожиданно оказался в удивительных жизненных обстоятельствах. Всё началось с того, что он всучил сидевшей под дождём Сине Махиру – очень популярной в школе девушке, которую за глаза называют "ангелом" – свой зонт. А когда он ожидаемо простудился после своего геройства, Махиру, живущая в соседней с ним квартире, позаботилась о парне в ответ. После чего, по какой-то причине, решила приглядеть за одиноким волком: делилась с ним едой и даже ворвалась сделать уборку в его свинарнике. Так начались их неординарные приятельские отношения.
          
          Меня совершенно очаровала искренность героев в этом произведении, а также трогательно-осторожная романтика. Среди тайтлов зимнего сезона этот для меня совершенно вне конкуренции.</p>


        <blockquote class="blockquote" id="root2">
           <p class="mb-0"><span class="zvezd">***</span><br>
            Вот такая троица победителей собралась в моих глазах среди всех новинок аниме зимнего сезона 2024. У парочки ещё не завершившихся произведений тоже есть потенциал попасть в список лучших, но их, увы, придётся ещё подождать. Возможно, потом сделаю новую версию этого поста.
            <br><br>
            А какие тайтлы зимы впечатлили вас больше всего?</p>
         </blockquote>

       
         <div class="news_d_footer flex-column flex-sm-row">
               <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>4 человека оценили эту статью</a>
               <!-- <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>06 Comments</a> -->
               <div class="news_socail ml-sm-auto mt-sm-0 mt-2">

            
             <a href="https://vk.com/id269803180" target="_blank"><img class="image-button" src="/img/contact/vk.png" alt=""></img></a>
             <a href="https://web.telegram.org/" target="_blank"><img class="image-button" src="/img/contact/tg.png" alt=""></img></a>
             <a href="https://360.yandex.ru/mail/" target="_blank"><img class="image-button" src="/img/contact/ya.png" alt=""></img></a>
             <a href="https://mail.ru/" target="_blank"><img class="image-button" src="/img/contact/mail.png" alt=""></img></a>
           </div>
          </div>
        </div>
      </div>


      <!-- Боковая панель -->
        <!-- Start Blog Post Siddebar -->
        <div class="col-lg-4 sidebar-widgets">
          <div class="widget-wrap">

            <div class="single-sidebar-widget popular-post-widget" id="navbarSupportedContent">
              <h4 class="single-sidebar-widget__title">Самые популярные</h4>
              <div class="popular-post-list">

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

           
              
            <a href="https://vk.com/id269803180" target="_blank"><img class="image-button st2" src="/img/contact/vk.png" alt=""></img></a>
            <a href="https://web.telegram.org/" target="_blank"><img class="image-button st2" src="/img/contact/tg.png" alt=""></img></a>
            <a href="https://360.yandex.ru/mail/" target="_blank"><img class="image-button st2" src="/img/contact/ya.png" alt=""></img></a>
            <a href="https://mail.ru/" target="_blank"><img class="image-button st2" src="/img/contact/mail.png" alt=""></img></a>
            
            <p class="st3">А также не забывайте, что помимо аниме <br>существует и манга</p>
            <a href="https://readmanga.live"><img alt="Читай мангу Readmanga.ru" src="http://i.imgur.com/Y1pxH.gif"></a>
           
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



<!-- ТЕПЕРЬ КОПИРОВАНИЕ ИДЕТ С ПРИПИСКОЙ ИСТОЧНИКА -->
<script type="text/javascript">

  function slyLink() {
  
                 var istS = "Первоисточник: "; // Слово заключать в кавычки
  
                 var copyR = " © paradise.web-ru.ru"; // Название ресурса 
  
                 var body_element = document.getElementsByTagName("body")[0];
  
                 var choose;
  
                 choose = window.getSelection();
  
                 var myLink = document.location.href;
  
                 var authorLink = ""
  
                  + istS + " " + "http://paradise.web-ru.ru" +""
  
                  + copyR;
  
                 var copytext = choose + authorLink;
  
                 var addDiv = document.createElement("div");
  
                 addDiv.style.position = "absolute";
  
                 addDiv.style.left = "-99999px";
  
                 body_element.appendChild(addDiv);
  
                 addDiv.innerHTML = copytext;
  
                 choose.selectAllChildren(addDiv);
  
                 window.setTimeout(function() {
  
                                body_element.removeChild(addDiv);
  
                 },0);
  
  }
  
  document.oncopy = slyLink;
  
  </script>
</body>
</html>