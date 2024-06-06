<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/css_forum/general.css" />
    <link rel="stylesheet" href="/css/css_forum/header.css">
    <link rel="stylesheet" href="/css/css_forum/index.css" />
    <link rel="stylesheet" href="/css/css_forum/footer.css" />


    <title>Последние новости аниме индустрии</title>
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
    <header class="header" id="header">
      <div class="row">
        <div class="container">
          <div class="header-content">
            <div class="logo">
              <a href="index.html"><img src="/img/logo3.gif" alt="logo"/></a>
            </div>
            <div class="nav-search">
              <div class="form-group">
                <input type="text" placeholder="Search Community" />
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
            </div>
            <div class="nav-group">
              <ul>
                <li>
                  <a href="#"><i class="fa-solid fa-comment"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa-solid fa-list-ul"></i></a>
                </li>
                <li class="join">
                  <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <span>login / join</span>
                  </a>
                </li>
                <li>
                  <a href="#"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="container">
        <div class="row">

        <?php
            require __DIR__.'/includes/dbh.inc.php'; 
            require __DIR__.'/includes/admin_actions.inc.php'; 
            require __DIR__.'/includes/config_session.inc.php';

            $result = Get_comments_info($pdo);
        ?>



          <section class="left">
            <h2>Recommended for you</h2>
            <div class="inner-left">

              <div class="box">
                <div class="img">
                  <img src="/img/img_forum/02688.jpg" alt="" />
                </div>
                <div class="details">
                  <p>technical discussion</p>
                  <h3>93 shadow vt1100c</h3>
                  <div class="sub-details">
                    
                    <span>5 h ago</span>
                    <div class="comment">
                      <i class="fa-solid fa-comment"></i>
                      <span>6</span>
                    </div>
                  </div>
                </div>
              </div>


              <div class="box">
                <div class="img">
                  <img src="/img/img_forum/302688.jpg" alt="" />
                </div>
                <div class="details">
                  <p>technical discussion</p>
                  <h3>93 shadow vt1100c</h3>
                  <div class="sub-details">
                    <span>jason.aalbers95.</span>
                    <span>9 h ago.</span>
                    <span>jason.aalbers95</span>
                    <span>replied</span>
                    <span>5 h ago</span>
                    <div class="comment">
                      <i class="fa-solid fa-comment"></i>
                      <span>6</span>
                    </div>
                  </div>
                </div>
              </div>



              <?php

//var_dump($resultult);//выводит всю инфу в виде массива
if (empty($result)) {
  //echo "NOT result";
}
else {
    //ВЫВОД ДАННЫХ В ВИДЕ ТАБЛИЦЫ
    $i =0;
    foreach ($result as $row) {
        $i++;
        // if($i==15){break;}
     
      // echo '<div class="box">
      //           <div class="img">';
      //           if ($i%2==0) {
      //             echo '<img src="/img/img_forum/one.png" alt="" />';
      //           }
      //           else{echo '<img src="/img/img_forum/hel.png" alt="" />';}
                  
      //           echo '</div>
      //           <div class="details">
                  
      //             <h3>'. htmlspecialchars($row["username"]) .'</h3>
      //             <p>'. htmlspecialchars($row["comment_text"]) .'</p>
      //             <div class="sub-details">
                    
      //               <span>Дата написания</span>
      //               <span>'. htmlspecialchars($row["create_at"]).'</span>
      //               <div class="comment">
      //                 <i class="fa-solid fa-comment"></i>
      //                 <span>6</span>
      //               </div>
      //             </div>
      //           </div>
      //         </div>';
    }
}   

?>
              <div class="box">
                <div class="img1">
                  <img src="/img/img_forum/302688.jpg" alt="" />
                  <h3>93 shadow vt1100c</h3>
                </div>
                <div class="details">
                  
                  
                  <p>technical discussion</p>
                  <div class="sub-details">
                    <span>jason.aalbers95.</span>
                    <span>9 h ago.</span>
                    <span>jason.aalbers95</span>
                    <span>replied</span>
                    <span>5 h ago</span>
                    <div class="comment">
                      <i class="fa-solid fa-comment"></i>
                      <span>6</span>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </section>


<!-- ###################################### -->


          <!-- <section class="right">
            
            <div class="box first">
              <h3>honda shadow forums</h3>
              <span>since 2007</span>
              <p>
                Welcome to Honda Shadow Forum. Come in and discuss any Honda
                Shadow models: VT1100, VT250, VT750 and the VT500.
              </p>
              <div class="stats">
                <div>
                  <h4>1.6M</h4>
                  <span>posts</span>
                </div>
                <div>
                  <h4>79.4k</h4>
                  <span>members</span>
                </div>
              </div>
              <div class="buttons">
                <a href="#" class="btn btn-red"
                  ><i class="fa-solid fa-user-large"></i> join community</a
                >
                <a href="#" class="btn btn-white"
                  ><i class="fa-solid fa-store"></i> grow your business</a
                >
              </div>
            </div>
            <div class="box top-forums">
              <h3>our top forums</h3>
              <a href="#">View All <i class="fa-solid fa-arrow-right"></i></a>
              <div class="inner-box">
                <h4><a href="#">general bike discussion</a></h4>
                <div class="stats">
                  <div class="stat comments">
                    <i class="fa-solid fa-comment"></i><span> 709.4k</span>
                  </div>
                  <div class="stat views">
                    <i class="fa-regular fa-eye"></i><span>104.4M</span>
                  </div>
                </div>
              </div>
              <div class="inner-box">
                <h4><a href="#">technical discussion</a></h4>
                <div class="stats">
                  <div class="stat comments">
                    <i class="fa-solid fa-comment"></i><span> 395.7k</span>
                  </div>
                  <div class="stat views">
                    <i class="fa-regular fa-eye"></i><span>124.2M</span>
                  </div>
                </div>
              </div>
              <div class="inner-box">
                <h4><a href="#">member introductions</a></h4>
                <div class="stats">
                  <div class="stat comments">
                    <i class="fa-solid fa-comment"></i><span> 178.9k</span>
                  </div>
                  <div class="stat views">
                    <i class="fa-regular fa-eye"></i><span>22.1M</span>
                  </div>
                </div>
              </div>
              <div class="inner-box">
                <h4><a href="#">rides and events</a></h4>
                <div class="stats">
                  <div class="stat comments">
                    <i class="fa-solid fa-comment"></i><span> 5.3k</span>
                  </div>
                  <div class="stat views">
                    <i class="fa-regular fa-eye"></i><span>1.6M</span>
                  </div>
                </div>
              </div>
              <div class="inner-box">
                <h4><a href="#">canadian riders</a></h4>
                <div class="stats">
                  <div class="stat comments">
                    <i class="fa-solid fa-comment"></i><span> 4.2k</span>
                  </div>
                  <div class="stat views">
                    <i class="fa-regular fa-eye"></i><span>1.1M</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="box top-contributors">
              <h3>top contributors this month</h3>
              <a href="#">View All <i class="fa-solid fa-arrow-right"></i></a>
              <div class="inner-box">
                <div class="img">
                  <img src="/img/img_forum/302688.jpg" alt="" />
                </div>
                <div class="details">
                  <a href="#">Captain D</a>
                  <span>202 replies</span>
                </div>
              </div>
              <div class="inner-box">
                <div class="img">
                  <img src="/img/img_forum/302688.jpg" alt="" />
                </div>
                <div class="details">
                  <a href="#">oldguy</a>
                  <span>196 replies</span>
                </div>
              </div>
              <div class="inner-box">
                <div class="img">
                  <img src="/img/img_forum/302688.jpg" alt="" />
                </div>
                <div class="details">
                  <a href="#">Inferno</a>
                  <span>174 replies</span>
                </div>
              </div>
            </div>
            <div class="box recommended-communities">
              <h3>recommended communities</h3>
              <div class="inner-box">
                <div class="img">
                  <img src="/img/img_forum/302688.jpg" alt="" />
                </div>
                <div class="details">
                  <a href="#">Jeep Forum</a>
                  <span>718k+ members</span>
                </div>
              </div>
              <div class="inner-box">
                <div class="img">
                  <img src="/img/img_forum/302688.jpg" alt="" />
                </div>
                <div class="details">
                  <a href="#">VWVortex Volkswagen Forum</a>
                  <span>2M+ members</span>
                </div>
              </div>
              <div class="inner-box">
                <div class="img">
                  <img src="img/302688.jpg" alt="" />
                </div>
                <div class="details">
                  <a href="#">Climbing</a>
                  <span>50+ members</span>
                </div>
              </div>
            </div>
          </section> -->
        </div>
      </div>
    </main>
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
  
                 <P>Добро пожаловать на <a href="index.html" class="spn1">Paradise.web-ru.ru!</a> Полнота нашей коллекции целиком и полностью зависит от Вас! Мы благодарны Вам за добавление ссылок, информации о создателях и сэйю, а так же цитат и интересных фактах с описаниями.</P>
                 
             
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
    <div class="overlay">
      <div class="login" id="login">
        <div class="top">
          <h2>Log in</h2>
          <i class="fa-solid fa-xmark close"></i>
        </div>
        <div class="row">
          <div class="content">
            <div class="login-left">
              <form action="#">
                <input type="text" placeholder="Username" />
                <div class="form-group">
                  <input type="password" placeholder="Password" />
                  <div><i class="fa-regular fa-eye"></i> <span>Show</span></div>
                </div>
                <a href="#">Forget your password?</a>
                <div class="remember">
                  <input type="checkbox" name="remember" value="1" checked />
                  <label for="remember">Stay logged in</label>
                </div>
                <button type="submit" class="btn btn-red">Log in</button>
              </form>
            </div>
            <div class="line"></div>
            <div class="login-right">
              <a href="#" class="btn"
                ><i class="fa-brands fa-square-facebook"></i>
                <span>Login with Facebook</span></a
              >
              <a href="#" class="btn"
                ><img src="img/download.png" /><span>
                  Login with Google</span
                ></a
              >
            </div>
          </div>
          <div class="bottom">
            <h4>New to Honda Shadow Forums?</h4>
            <a href="subscribe.html">join now</a>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://kit.fontawesome.com/9e5ba2e3f5.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/forum/index.js"></script>
  </body>
</html>
