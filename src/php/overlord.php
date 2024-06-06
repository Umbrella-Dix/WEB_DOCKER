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
              <a href="#"><h4>Повелитель / Оверлорд 5 сезон: <br /> дата выхода новых серий</h4></a>
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
              <img class="img-fluid" src="/img/blog/OVERLORD/1.png" alt="">
              <!-- <p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower</p>
              <p>MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>
               -->
               
              <p class="otstup"  id="root">Вышедшее на телевизионные экраны в 2015 году аниме Повелитель быстро завоевало немалую популярность и полюбилось широкому кругу зрителей. Харизматичный главный герой, 
                интригующий сюжет, качественная графика, несколько годных шуток и великолепнейшая музыка не могли оставить поклонников аниме равнодушными, 
                так что высокий рейтинг и популярность шоу были обеспечены. Поэтому вполне закономерно, что должен выйти 5 сезон Оверлорда, который, будем верить, удержит планку предыдущих.

              </p>

              <p class="otstup"  id="root">В статье расскажем о событиях минувших эпизодов, а также о том, какие приключения вполне вероятно выпадут на долю Момонги в новом сезоне Повелителя и когда же ожидать долгожданные серии.

              </p>


         <h2>КОГДА ВЫЙДЕТ ПОВЕЛИТЕЛЬ 5 СЕЗОН</h2>
         <img class="img-fluid" src="/img/blog/OVERLORD/2.png" alt="">
         <p class="otstup"  id="root">На данный момент нельзя однозначно сказать, будет ли 5 сезон Повелителя в ближайшем будущем или же фанатам придется набраться терпения. Студия Madhouse, 
          ответственная за предыдущие 4 сезона пока не делала анонса 5, однако уже анонсирован полнометражный фильм. 
          Вполне вероятно, что вслед за премьерой полнометражки мы сможем узнать и точную дату выхода 5 сезона Повелителя..</p>


          <blockquote class="blockquote" id="root2">
            <p class="mb-0">
              Скорее всего, продолжение Оверлорда стоит ожидать в 2024 году, а официального анонса пока не было из-за грядущего релиза полнометражного фильма «Рыцарь Святого королевства».
             </p>
          </blockquote>


          <div>
            <table>
              <tr>
                <th>Эпизод 5 сезона</th>
                <th>Дата выхода (возможная)</th>
                
              </tr>

               <tr>
                <td>1 серия</td>
                <td>11 января 2024</td> 
               </tr>
               <tr>
                <td>2 серия</td>
                <td>18 января 2024</td> 
               </tr>
               <tr>
                <td>3 серия</td>
                <td>25 января 2024</td> 
               </tr>
               <tr>
                <td>4 серия</td>
                <td>1 февраля 2024</td> 
               </tr>
               <tr>
                <td>5 серия</td>
                <td>	8 февраля 2024</td> 
               </tr>
               <tr>
                <td>6 серия</td>
                <td>	15 февраля 2024</td> 
               </tr>
               <tr>
                <td>7 серия</td>
                <td>22 февраля 2024</td> 
               </tr>
               <tr>
                <td>8 серия</td>
                <td>	2 марта 2024</td> 
               </tr>
               <tr>
                <td>9 серия</td>
                <td>9 марта 2024</td> 
               </tr>
               <tr>
                <td>10 серия</td>
                <td>16 марта 2024</td> 
               </tr>
               <tr>
                <td>11 серия</td>
                <td>23 марта 2024</td> 
               </tr>
               <tr>
                <td>12 серия</td>
                <td>30 марта 2024</td> 
               </tr>
               <tr>
                <td>13 серия</td>
                <td>6 апреля 2024</td> 
               </tr>
              
              </table>

          </div>

          <p class="otstup"  id="root">Обратите внимание, что в будущем возможны изменения в графике выхода новых серий Повелителя. Точная дата выхода всех эпизодов появится после официального анонса. Сейчас
          </p>
  
  


          <h2>КРАТКО О ПРЕДЫДУЩИХ СЕЗОНАХ</h2>
         <img class="img-fluid" src="/img/blog/OVERLORD/3.png" alt="">
         <p class="otstup"  id="root">История началась с закрытия легендарной онлайн-игры «Иггдрасиль». Игрок, который управлял персонажем Момонга,
           решает остаться в игре до отключения серверов и побыть в некогда любимом мире до последнего. Собрав всех прислужников в зале гильдии, он ожидает конца.
        </p>

        <p class="otstup"  id="root">Вот только сервера не отключаются, Момонга не может выйти из игры и превращается в скелета-волшебника. НПС начинают проявлять эмоции, как настоящие люди, мир игры становится реальным. 
          Не имея в своей реальности ничего ценного, Момонга остается в игровом мире и намерен его завоевать.
       </p>
       <img class="img-fluid" src="/img/blog/OVERLORD/4.png" alt="">
       <p class="otstup"  id="root">Момонга тщательно отбирает себе союзников, подвергая их суровым испытаниям. Постепенно вокруг него складывается мощная и преданная команда, готовая помочь в завоевании игровой вселенной.
         Одновременно Момонга борется со своими слабостями и пытается найти подтверждение своей догадки. Ведь вполне возможно, что не один он застрял в этой игре из реального мира, так что тайные поиски других игроков не на последнем месте.


     </p>

        <p class="otstup"  id="root">Благодаря знаниям из реального мира Момонга быстро продвигается вперед, завоевывает репутацию Темного властелина и проходит через множество сражений, движимый целью захватить такой многообещающий виртуальный мир.
        </p>
        <p class="otstup"  id="root">Ожидается, что в 5 сезоне будут адаптированы 15 и 16 тома оригинала. Вполне вероятно, что студия дождется выхода 17 тома, чтобы по традиции создать новый сезон на основе трех томов.
      </p>



          <h2>ИНТЕРЕСНЫЕ ФАКТЫ</h2>
         <img class="img-fluid" src="/img/blog/OVERLORD/5.png" alt="">

         <ul class="li_ul">
         <li>В 2017 году оригинальная манга попала на первую строчку в рейтинге лучших графических романов и занимала эту позицию целый год. В 2018 году роман, к сожалению, потерял позицию и опустился на 4 строчку, однако не растерял народной любви.</li>
         <li>К весне 2018 года тираж проданных экземпляров свыше 7 миллионов единиц.</li>
         <li>Аниме-сериал – адаптация одноименного графического романа авторства Куганэ Маруямы.</li>
         <li>За производство аниме адаптации ответственна студия «Madhouse», за плечами которой такие известные работы, как «Тетрадь смерти», «Ванпанчмен» и «ОхотникХОхотник 2011».</li>
         <li>За новые главы «Оверлорда» отвечает та же команда. Сценарист – Юкие Сугавара, а в режиссерском кресле – Наоюки Ито.</li>
         <li>Фильмы «Повелитель: Бессмертный король» и «Повелитель: Темный воитель» — рекапы первого сезона с несколькими дополнительными сценами.</li>
         <li>Происхождение Момонги выделило его среди других главных героев подобных тайтлов. Момонга – нежить, что оценили многие поклонники аниме-сериала и окрестили «разрывом шаблона».</li>
        </ul>

        

         
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
                    <!-- <a href="blond.php"><img class="card-img rounded-0 big-image-button" src="img/blog/868_o.jpg" alt=""></a>
                     -->
                     <a href="blog-details.php"><div  class="img_wrap2"><img class="img-fluid card-img rounded-0 big-image-button" src="/img/blog/scale_2500.jfif" alt=""></div></a> 
                    
                   
                  </div>
                  <div class="details mt-20">
                    <a href="blog-details.php">
                      <h6>Топ 3 аниме 2024 года
                      </h6>
                    </a>
                  </div>
                </div>

                <div class="single-post-list">
                  <div class="thumb">
                    <a href="палатка.php"><div  class="img_wrap2"><img class="img-fluid card-img rounded-0 big-image-button" src="/img/blog/lager.jpg" alt=""></div></a> 
                    
                    
                  </div>
                  <div class="details mt-20">
                    <a href="палатка.php">
                      <h6>Лагерь на свежем воздухе</h6>
                    </a>
                  </div>
                </div>

                <div class="single-post-list">
                  <div class="thumb">
                     <!-- <a href="сэйю.php"><img class="card-img rounded-0 big-image-button" src="img/seuy/2.jpeg" alt=""></a>
                      -->
                      <a href="безымянный.php"><div  class="img_wrap2"><img class="img-fluid card-img rounded-0 big-image-button" src="/img/blog/top.jpg" alt=""></div></a> 
                    
                  </div>
                  <div class="details mt-20">
                    <a href="безымянный.php">
                      <h6>"Безымянная память" стартует в 2024 году</h6>
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
</body>
</html>