<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
declare(strict_types=1);



//В ДАННОМ ФАЙЛИКЕ СОЗДАЮТСЯ ОСНОВНЫЕ ФУНКЦИИ, КОТОРЫЕ ЧТО ТО ДЕЛАЮТ, 
//И ВОЗВРАЩАЮТ РЕЗУЛЬТАТ (НАПРИМЕР МАССИВ ДАННЫХ)
//ФУНКЦИИ ИЗ ЭТОГО ФАЙЛИКА ИСПОЛЬЗУЮТСЯ ДРУГИМИ 
//В ОСНОВНОМ signup_contr.inc.php




//ВОЗВРАЩАЕТ ВСЕ ДАННЫЕ ОБО ВСЕХ ПОЛЬЗОВАТЕЛЯХ ИЗ ТАБЛИЦЫ
function get_users_info(object $pdo)
{
    $query = "SELECT * FROM `users2`;";
        
    $stmt = $pdo->prepare($query);
   
    
    $stmt->execute();
    $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
    
    return $result;
    
    
}

//ВОЗВРАЩАЕТ ВСЕ ДАННЫЕ ОБО ВСЕХ ПОЛЬЗОВАТЕЛЯХ ИЗ ТАБЛИЦЫ
function Get_comments_info(object $pdo)
{
    $query = "SELECT * FROM `comments2` ORDER BY create_at DESC;";
        
    $stmt = $pdo->prepare($query);
   
    
    $stmt->execute();
    $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
    
    return $result;
    
    
}



//ПОЛУЧЕНИЕ ИНФЫ О ПОЛЬЗОВАТЕЛЕ ПО ИМЕНИ ИЛИ ID
function get_user_full_info(object $pdo, string|int $user_id)
{
    $result=[];
    if(intval($user_id))
    {
        $user_id=intval($user_id);
        $query="SELECT * from users2 where id=:user_id;";//отличия от функции get_username в том,
        // что мы извлекаем не только имя, но все данные пользователя
    
        $stmt = $pdo->prepare($query);//обработка запроса к mysql
    
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();//и выполнение
            
        //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
        $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
        
    }
    else if (is_string($user_id)) {
        $query="SELECT * from users2 where username=:username;";//отличия от функции get_username в том,
        // что мы извлекаем не только имя, но все данные пользователя
    
        $stmt = $pdo->prepare($query);//обработка запроса к mysql
    
        $stmt->bindParam(":username", $user_id);
        $stmt->execute();//и выполнение
            
        //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
        $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
        
    }
 
    return $result;//массив данных
}

//ПОЛУЧЕНИЕ ИНФЫ О ПОЛЬЗОВАТЕЛЕ ПО АДРЕСУ ПОЧТЫ
function get_user_full_info_email(object $pdo, string $email)
{
   
        $query="SELECT * from users2 where email=:email;";//отличия от функции get_username в том,
        // что мы извлекаем не только имя, но все данные пользователя
    
        $stmt = $pdo->prepare($query);//обработка запроса к mysql
    
        $stmt->bindParam(":email", $email);
        $stmt->execute();//и выполнение
            
        //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
        $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
        
   
 
    return $result;//массив данных
}




//ПОЛУЧЕНИЕ ИНФЫ ОБ ОДНОМ КОНКРЕТНОМ КОМЕНТЕ ПО ИМЕНИ ИЛИ ID
function get_comment_full_info(object $pdo, string|int $comment_id)
{

        $result=[];
        if(intval($comment_id))
        {
            $comment_id=intval($comment_id);
            $query="SELECT * from comments2 where id=:comment_id;";//отличия от функции get_username в том,

            $stmt = $pdo->prepare($query);//обработка запроса к mysql
            $stmt->bindParam(":comment_id", $comment_id);
            $stmt->execute();//и выполнение
                
            $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)

        }
        else if (is_string($comment_id)) {
            $query="SELECT * from comments2 where username=:username;";//отличия от функции get_username в том,
            // что мы извлекаем не только имя, но все данные пользователя
        
            $stmt = $pdo->prepare($query);//обработка запроса к mysql
            $stmt->bindParam(":username", $comment_id);
            $stmt->execute();//и выполнение
                
            //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
            $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
            
        }

    return $result;//массив данных
}
//ПОЛУЧЕНИЕ ИНФЫ ОБО ВСЕХ КОММЕНТАХ ПО ИМЕНИ ИЛИ ID
function get_all_comments_info(object $pdo, string|int $comment_id)
{

        $result=[];
        if(intval($comment_id))
        {
            $comment_id=intval($comment_id);
            $query="SELECT * from comments2 where id=:comment_id;";//отличия от функции get_username в том,

            $stmt = $pdo->prepare($query);//обработка запроса к mysql
            $stmt->bindParam(":comment_id", $comment_id);
            $stmt->execute();//и выполнение
                
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)

        }
        else if (is_string($comment_id)) {
            $query="SELECT * from comments2 where username=:username;";//отличия от функции get_username в том,
            // что мы извлекаем не только имя, но все данные пользователя
        
            $stmt = $pdo->prepare($query);//обработка запроса к mysql
            $stmt->bindParam(":username", $comment_id);
            $stmt->execute();//и выполнение
                
            //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
            
        }

    return $result;//массив данных
}








//ФУНКЦИЯ НАПИСАНИЯ КОММЕНТАРИЯ, НУЖНО ПЕРЕДАТЬ ВСЕ ДАННЫЕ ДЛЯ СОСТАВЛЕНИЯ СТРОКИ ТАБЛИЦЫ
function write_comment(object $pdo, int $users_id, string $username, string $comment_text)
{
    $query="INSERT INTO comments2 (username, comment_text, users_id) 
    values (:username, :comment_text, :users_id);";//ищим пользователя с уазанным именем в бд

    $stmt = $pdo->prepare($query);//обработка запроса к mysql

    //присваиваем наши значения
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":comment_text", $comment_text);//пароль записываем зашифрованный
    $stmt->bindParam(":users_id", $users_id);
   
    $stmt->execute();//и выполнение
    //передаем наш запрос в бд и создаем пользователя
}



//ФУНКЦИЯ ОТПРАВКИ ПИСЬМА, НУЖНО ПЕРЕДАТЬ ВСЕ ДАННЫЕ ДЛЯ СОСТАВЛЕНИЯ СТРОКИ ТАБЛИЦЫ
function send_email(object $pdo, string $email_from, string $email_text, string $email_to, int $users_id)
{
    $query="INSERT INTO emails (email_from, email_text, email_to, users_id) 
    values (:email_from, :email_text, :email_to, :users_id);";//ищим пользователя с уазанным именем в бд

    $stmt = $pdo->prepare($query);//обработка запроса к mysql

    //присваиваем наши значения
    $stmt->bindParam(":email_from", $email_from);
    $stmt->bindParam(":email_text", $email_text);//пароль записываем зашифрованный
    $stmt->bindParam(":email_to", $email_to);
    $stmt->bindParam(":users_id", $users_id);
   
    $stmt->execute();//и выполнение
    //передаем наш запрос в бд и создаем пользователя
}

//ПРОВЕРЯЕМ СУЩЕСТВУЕТ ЛИ СТРОКА В ТАБЛИЦЕ users2 С ДАННЫМ ID
function get_user_id(object $pdo, int $user_id)
{
    //по факту PDO $pdo
    $query="SELECT id from users2 where id=:user_id;";//ищим пользователя с уазанным именем в бд

    $stmt = $pdo->prepare($query);//обработка запроса к mysql
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();//и выполнение

    //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
    $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
    
    
    return $result;
}



//ПЕРЕДАЕМ ИМЯ - ПОЛУЧАЕМ ФУЛ СТРОКУ С ИНФОЙ О ЮЗЕРЕ
function get_username(object $pdo, string $username)
{
    //по факту PDO $pdo
    $query="SELECT username from users2 where username=:username;";//ищим пользователя с уазанным именем в бд

    $stmt = $pdo->prepare($query);//обработка запроса к mysql
    $stmt->bindParam(":username", $username);
    $stmt->execute();//и выполнение

    //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
    $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
    
    
    return $result;
}


//ПЕРЕДАЕМ ИМЯ - ПОЛУЧАЕМ МАССИВ ДАННЫХ С АКТИВИРОВАННЫМИ КОММЕНТАРИЯМИ
function search_comment_post(object $pdo, string $username)
{
    $query = "SELECT * from comments2 where username =:username and comment_activated=1 ";
        
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    
    $stmt->execute();
    $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
    
    return $result;
    
    
}


//ПЕРЕДАЕМ ИМЯ - ПОЛУЧАЕМ МАССИВ ДАННЫХ С ЗАБАНЕННЫМИ /ЕЩЁ НЕАКТИВИРОВАННЫМИ КОММЕНТАРИЯМИ
function search_comment_ban(object $pdo, string $username)
{
    $query = "SELECT * from comments2 where username =:username and comment_activated=0 ";
        
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    
    $stmt->execute();
    $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
    
    return $result;
    
    
}

//ИЩИМ ВСЕ ПИСЬМА, КОТОРЫЕ ПОЛЬЗОВАТЕЛЬ ОТПРАВИЛ СО СВОЕЙ ПОЧТЫ
function search_email_from(object $pdo, string $email_from)
{
    $query = "SELECT * from emails where email_from =:email_from;";
        
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email_from", $email_from);
    
    $stmt->execute();
    $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
    
    return $result;
 
}

//ИЩИМ ВСЕ ПИСЬМА, КОТОРЫЕ ПОЛЬЗОВАТЕЛЬ ПОЛУЧИЛ НА СВОЮ ПОЧТУ
function search_email_received(object $pdo, string $email_to)
{
    $query = "SELECT * from emails where email_to =:email_to;";
        
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email_to", $email_to);
    
    $stmt->execute();
    $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
    
    return $result;
 
}




//ВОЗВРАЩАЕМ ИМЯ ПОЛЬЗОВАТЕЛЯ ПО ПОЧТЕ
function get_email(object $pdo, string $email)
{
    //по факту PDO $pdo
    $query="SELECT username from users2 where email=:email;";//ищим пользователя с уазанным именем в бд

    $stmt = $pdo->prepare($query);//обработка запроса к mysql
    $stmt->bindParam(":email", $email);
    $stmt->execute();//и выполнение

    //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
    $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
    return $result;
}



//СОЗДАНИЕ ПОЛЬЗОВАТЕЛЯ ОТ ИМЕНИ АДМИНА, УЧЕТКА СРАЗУ АКТИВНА
function create_user(object $pdo, string $username, string $pwd, string $email, string $user_type)
{
    //по факту PDO $pdo
    $query="INSERT INTO users2 (username, pwd, email, user_type, activated) values (:username, :pwd, :email, :user_type, 1);";//ищим пользователя с уазанным именем в бд

    $stmt = $pdo->prepare($query);//обработка запроса к mysql

    //помимо этого мы захешируем пароль, чтобы внутри бд он был зашифрован

    
    $options=['const'=>12];// вот этот псевдо массив отвечает за типо время обработки запроса 
    //если пароль неверный,
    // против хакеров которые пытаются подобрать пароль

    $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT, $options);//а это сама функция зашифровки методом PASSWORD_BCRYPT


    //присваиваем наши значения
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashed_pwd);//пароль записываем зашифрованный
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":user_type", $user_type);
    $stmt->execute();//и выполнение
    //передаем наш запрос в бд и создаем пользователя
    
}



//ОБНОВЛЕНИЕ ДАННЫХ ПОЛЬЗОВАТЕЛЯ (ПРОСТО МНОГО УСЛОВИЙ, КОТОРЫЕ ВЫПОЛНЯЮТСЯ В СВЯЗКЕ С ЗАПОЛНЕННЫМИ ПОЛЯМИ)
function update_users(object $pdo, int $user_id, string $username=null, string $pwd=null, string $email=null, string $user_type=null){
   
    if($user_type!=null){
        $query="UPDATE users2 SET user_type=:user_type 
        WHERE id=$user_id;";
        //$user_type="lol";
        $stmt = $pdo->prepare($query);
       
        $stmt->bindParam(":user_type", $user_type);

        $stmt->execute();//и выполнение
    }

   if ($username!=null) {
    $query="UPDATE users2 SET username= :username
    WHERE id=$user_id;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);

    $stmt->execute();//и выполнение
   }
   if ($pwd!=null) {
    $query="UPDATE users2 SET pwd =:pwd
    WHERE id=$user_id;";

     $stmt = $pdo->prepare($query);

     $options=['const'=>12];
     $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT, $options);//а это сама функция зашифровки методом PASSWORD_BCRYPT
 
     $stmt->bindParam(":pwd", $hashed_pwd);//пароль записываем зашифрованный

     $stmt->execute();//и выполнение
   }
   if ($email!=null) {
    $query="UPDATE users2 SET email=:email
    WHERE id=$user_id;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":email", $email);

    $stmt->execute();//и выполнение
   }

}



//УДАЛЯЕМ ПОЛЬЗОВАТЕЛЯ ЕСЛИ УКАЗАНО ИМЯ И ID
function delete_user(object $pdo, int $user_id, string $username)
{
  

    //У НАС УЖЕ ЕСТЬ ПРОВЕРКА НА АДМИНА ИЛИ МОДЕРА, НО ТУТ ДОП ПРОВЕРКА НА ГЛАВНОГО АДМИНА / ПЕРВОГО ПОЛЬЗОВАТЕЛЯ
    //чтобы его нельзя было удалить
    if ($username=="admin" ||$user_id==1) {
       
       $pdo=null;
       $stmt=null;
       die("ГЛАВНОГО АДМИНИСТРАТОРА НЕЛЬЗЯ УДАЛИТЬ! <a href='../admin_page.php'>Вернуться на главную страницу</a>");
       
    }
    else{
        $query="DELETE FROM users2 where id=:user_id;";//отличия от функции get_username в том,
        // что мы извлекаем не только имя, но все данные пользователя
       
           $stmt = $pdo->prepare($query);//обработка запроса к mysql
           $stmt->bindParam(":user_id", $user_id);
           $stmt->execute();//и выполнение
    }
      

}

//АКТИВАЦИЯ УЧЕТНОЙ ЗАПИСИ ЧЕРЕЗ ОБНОВЛЕНИЕ ДАННЫХ В ТАБЛИЦЕ
function activation_user(object $pdo, int $user_id)
 {
     //по факту PDO $pdo
     $query="UPDATE users2 SET  activated=1
     WHERE id=$user_id;";//отличия от функции get_username в том,
     // что мы извлекаем не только имя, но все данные пользователя
 
     $stmt = $pdo->prepare($query);//обработка запроса к mysql

     $stmt->execute();//и выполнение
 
     
 }
//ОТКЛЮЧЕНИЕ УЧЕТНОЙ ЗАПИСИ ЧЕРЕЗ ОБНОВЛЕНИЕ ДАННЫХ В ТАБЛИЦЕ
 function deactivation_user(object $pdo, int $user_id)
 {
     //по факту PDO $pdo
     $query="UPDATE users2 SET  activated=0
     WHERE id=$user_id;";//отличия от функции get_username в том,
     // что мы извлекаем не только имя, но все данные пользователя
 
     $stmt = $pdo->prepare($query);//обработка запроса к mysql

     $stmt->execute();//и выполнение
 
     
 }

//ПУБЛИКАЦИЯ КОММЕНТАРИЯ ЧЕРЕЗ ОБНОВЛЕНИЕ ДАННЫХ В ТАБЛИЦЕ
 function activation_comment(object $pdo, int $user_id)
 {
     //по факту PDO $pdo
     $query="UPDATE comments2 SET  comment_activated=1
     WHERE id=$user_id;";//отличия от функции get_username в том,
     // что мы извлекаем не только имя, но все данные пользователя
 
     $stmt = $pdo->prepare($query);//обработка запроса к mysql

     $stmt->execute();//и выполнение
 
     
 }
//СКРЫВАЕМ (типо удаляем но на самом деле нет) КОММЕНТАРИЙ ЧЕРЕЗ ОБНОВЛЕНИЕ ДАННЫХ В ТАБЛИЦЕ
 function deactivation_comment(object $pdo, int $user_id)
 {
     //по факту PDO $pdo
     $query="UPDATE comments2 SET  comment_activated=0
     WHERE id=$user_id;";//отличия от функции get_username в том,
     // что мы извлекаем не только имя, но все данные пользователя
 
     $stmt = $pdo->prepare($query);//обработка запроса к mysql

     $stmt->execute();//и выполнение
 
     
 }

//ПУБЛИКУЕМ ВСЕ КОММЕНТАРИИ ПОЛЬЗОВАТЕЛЯ ПО ЕГО ИМЕНИ / ИДЕНТИФИКАТОРУ
 function activation_all_comments(object $pdo, int|string $user_id)
 {

     if(intval($user_id))
     {
         $user_id=intval($user_id);

         $query="UPDATE comments2 SET comment_activated=1
         WHERE users_id=:user_id;";

         $stmt = $pdo->prepare($query);//обработка запроса к mysql
         $stmt->bindParam(":user_id", $user_id);

         $stmt->execute();//и выполнение
       
     }
     else if (is_string($user_id)) {
        
         $query="UPDATE comments2 SET comment_activated=1
         WHERE username=:username;";

         $stmt = $pdo->prepare($query);//обработка запроса к mysql
         $stmt->bindParam(":username", $user_id);

         $stmt->execute();//и выполнение
     }
 
 }

//СКРЫВАЕМ ВСЕ КОММЕНТАРИИ ПОЛЬЗОВАТЕЛЯ ПО ЕГО ИМЕНИ / ИДЕНТИФИКАТОРУ
 function deactivation_all_comments(object $pdo, int|string $user_id)
 {

     if(intval($user_id))
     {
         $user_id=intval($user_id);

         $query="UPDATE comments2 SET comment_activated=0
         WHERE users_id=:user_id;";

         $stmt = $pdo->prepare($query);//обработка запроса к mysql
         $stmt->bindParam(":user_id", $user_id);

         $stmt->execute();//и выполнение
       
     }
     else if (is_string($user_id)) {
        
         $query="UPDATE comments2 SET comment_activated=0
         WHERE username=:username;";

         $stmt = $pdo->prepare($query);//обработка запроса к mysql
         $stmt->bindParam(":username", $user_id);

         $stmt->execute();//и выполнение
     }
 
 }





//ВТОРАЯ ЧАСТЬ
//ВТОРАЯ ЧАСТЬ
//ВТОРАЯ ЧАСТЬ


//проверка ввел ли пользователь данные или оставил поля пустые
function is_input_empty(string $username, string $pwd, string $email){
    if(empty($username) ||empty($pwd) ||empty($email)){
        return true;
    }
    else{
        return false;
    }
}

//ПРОВЕРЯЕМ КОРРЕКТНОСТЬ ВВЕДЕННОЙ ПОЧТЫ
function is_email_invalid($email){
    //встроенная функция проверки переменной или строки (так же можно проверять правильность url или int)
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}


 //проверка существует ли имя в бд
function is_username_taken(object $pdo, string $username){

    //тут мы проверяем через нашу кастомную функцию, которая лежит в другом файле
    if(get_username($pdo, $username)){
        return true;
    }
    else{
        return false;
    }
}

//ПРОВЕРЯЕМ СУЩЕСТВУЕТ ЛИ ТАКОЙ ID В ТАБЛИЦЕ
function is_ID_taken(object $pdo, int $user_id){

    //тут мы проверяем через нашу кастомную функцию, которая лежит в другом файле
    if(get_user_id($pdo, $user_id)){
        return true;
    }
    else{
        return false;
    }
}
//ПРОВЕРКА ЕСТЬ ЛИ В БАЗЕ УЖЕ ТАКАЯ ПОЧТА
function is_email_registred(object $pdo, string $email){
    
    //тут мы проверяем через нашу кастомную функцию, которая лежит в другом файле
    if(get_email($pdo, $email)){
        return true;
    }
    else{
        return false;
    }
}


//ЕСЛИ ИМЯ ИЛИ id НЕВЕРНЫ, ТО ВОЗВРАЩАЕТ ОШИБКУ 
//ПРИНИМАЕТ МАССИВ ИЛИ ЛОЖЬ, КОТОРАЯ ИДЕТ ОТ ФУНКЦИИ ЗАКАНЧИВАЮЩИХСЯ НА  
    // $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
    // return $result;
//(ПО ФАКТУ ПОДОБНАЯ ФУНКЦИЯ НА ИМЯ И id ПО ОТДЕЛЬНОСТИ УЖЕ ЕСТЬ, А ЭТО КАК БЫ СВЯЗКА)
function is_username_or_id_wrong(bool|array $result)//мы можем принимать сразу несколько типов данных на однупеременную
{
    if(!$result){
        return true;
    }
    else{
        return false;
    }

}
//АНАЛОГИЧНО ДЛЯ ТАБЛИЦЫ КОМЕНТОВ
function is_comment_id_wrong(bool|array $result)//мы можем принимать сразу несколько типов данных на однупеременную
{
    if(!$result){
        return true;
    }
    else{
        return false;
    }

}