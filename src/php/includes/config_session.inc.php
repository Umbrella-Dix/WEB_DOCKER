<?php
// файл настройки сеанса подключения
//использование файлов куки, безопасность



//ГРУБО ГОВОРЯ ЭТОТ ФАЙЛИК ОТВЕЧАЕТ ЗА СОЗДАНИЕ И ОБНОВЛЕНИЕ СЕССИИ С СОЗДАНИЕМ УНИВЕРСАЛЬНЫХ ID





ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);


//указание сколько и где будет работать сессия
session_set_cookie_params(
    [
        'lifetime'=>1800,
        'domain'=>'localhost',
        'path'=>'/',
        'secure'=>true,
        'httponly'=>true
    ]

);

session_start();//начало сессии


//смотеть login.inc.php строка 55, там начало
//ПО ФАКТУ ВОТ ЭТОТ КОД НЕОБЯЗАТЕЛЬНОЕ ДОПОЛНЕНИЕ,
// КОТОРОЕ ПРОСТО ОБНОВЛЯЕТ ID СЕССИИ И КАЖДЫЙ РАЗ ДОПИСЫВАЕТ В КОНЕ КАСТОМНОЕ id ПОЛЬЗОВАТЕЛЯ
//ТИПО $sessionID =$newSession ."_". $result["id"]; 

if(isset($_SESSION["user_id"])){//ВТОРОСТЕПЕННЫЙ КОД-ДОПОЛНЕНИЕ
   //проверка существует ли сессия, если пользователь входит в систему

    if(!isset($_SESSION["last_regeneration"])){
        //создание сессии
    regenerate_session_id_loggeding();
    }
    else {
        $interval=60*30;//время нашей сессии (можно изменять)
        //проверка если сессия длится больше 30 мин, тогда мы перезапускаем сессию
        if (time()-$_SESSION["last_regeneration"]>=$interval) {
            regenerate_session_id();
        }
    }
}
else {//ГЛАВНЫЙ КОД
  //проверка существует ли сессия, если пользователь регаентся или зарегался только что

    if(!isset($_SESSION["last_regeneration"])){
        //создание сессии
    regenerate_session_id();
    }
    else {
        $interval=60*30;//время нашей сессии (можно изменять)
        //проверка если сессия длится больше 30 мин, тогда мы перезапускаем сессию
        if (time()-$_SESSION["last_regeneration"]>=$interval) {
            regenerate_session_id();
        }
    }
}

//ГЛАВНЫЙ КОД
//функция создания сессии, для регистрации
function regenerate_session_id(){
    session_regenerate_id();//идентификатор сеанса
    $_SESSION["last_regeneration"]=time();
} 


//ВТОРОСТЕПЕННЫЙ КОД-ДОПОЛНЕНИЕ
//функция создания кастомной сессии, если пользователь вошел в систему и уже давно был зарегистрирован
//на основе его id
function regenerate_session_id_loggeding(){
    session_regenerate_id(true);//идентификатор сеанса

    $userID =$_SESSION["user_id"];
    //для безопасности создаем новый id сессии для пользователя который вошел в систему
    $newSession = session_create_id();//берем стандартный автоматически созданный id
    //создаем новый идентификатор для пользователя, состоящий из текущей сессии + его id из бд
    $sessionID =$newSession ."_". $userID;
    //и присваиваем его нашей сессии
    session_id($sessionID);

    $_SESSION["last_regeneration"]=time();
}

