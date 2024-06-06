<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
declare(strict_types=1);



//В ДАННОМ ФАЙЛИКЕ СОЗДАЮТСЯ ОСНОВНЫЕ ФУНКЦИИ, КОТОРЫЕ ЧТО ТО ДЕЛАЮТ, 
//И ВОЗВРАЩАЮТ РЕЗУЛЬТАТ (НАПРИМЕР МАССИВ ДАННЫХ)
//ФУНКЦИИ ИЗ ЭТОГО ФАЙЛИКА ИСПОЛЬЗУЮТСЯ ДРУГИМИ 
//В ОСНОВНОМ signup_contr.inc.php








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



function get_users_info(object $pdo)
{
    $query = "SELECT * FROM `users2`;";
        
    $stmt = $pdo->prepare($query);
   
    
    $stmt->execute();
    $result = $stmt->fetchAll(pdo::FETCH_ASSOC);
    
    return $result;
    
    
}


//аналогичная функция для возврата почты
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

function signup_user(object $pdo, string $username, string $pwd, string $email, string $user_type)
{
    //по факту PDO $pdo
    $query="INSERT INTO users2 (username, pwd, email, user_type, activated) values (:username, :pwd, :email, :user_type, 0);";//ищим пользователя с уазанным именем в бд

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


