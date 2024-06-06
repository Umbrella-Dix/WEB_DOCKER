<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
declare(strict_types=1);

//БОЛЬШИНСТВО КОДА ИЗ ЭТОГО ФАЙЛА ПОХОЖЕ НА login_model.inc.php



//В ДАННОМ ФАЙЛИКЕ СОЗДАЮТСЯ ОСНОВНЫЕ ФУНКЦИИ, КОТОРЫЕ ЧТО ТО ДЕЛАЮТ, 
//И ВОЗВРАЩАЮТ РЕЗУЛЬТАТ (НАПРИМЕР МАССИВ ДАННЫХ)
//ФУНКЦИИ ИЗ ЭТОГО ФАЙЛИКА ИСПОЛЬЗУЮТСЯ ДРУГИМИ 
//В ОСНОВНОМ login_contr.inc.php








//функция проверки существует ли пользователь в бд, возвращает массив или ложь
function get_user(object $pdo, string $username)
{
    //по факту PDO $pdo
    $query="SELECT * from users2 where username=:username;";//отличия от функции get_username в том,
    // что мы извлекаем не только имя, но все данные пользователя

    $stmt = $pdo->prepare($query);//обработка запроса к mysql
    $stmt->bindParam(":username", $username);
    $stmt->execute();//и выполнение

    //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
    $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
    
    
    return $result;//массив данных
}

function update_user(object $pdo, string $username)
{
    //по факту PDO $pdo
    $query="UPDATE users SET username= ':username', pwd =':pwd', email=':email' WHERE username=$username;";//отличия от функции get_username в том,
    // что мы извлекаем не только имя, но все данные пользователя

    $stmt = $pdo->prepare($query);//обработка запроса к mysql
    $stmt->bindParam(":username", $username);
    $stmt->execute();//и выполнение

    //если бы было $stmt->fetchall тогда считали бы все данные, а не одну строку (важно при считывании всей бд на вывод)
    $result=$stmt->fetch(PDO::FETCH_ASSOC);//считываем одну строку и возвращаем данные в виде массива (строка=массив из таблицы)
    
    
    return $result;//массив данных
}



//АДМИНСКИЕ ПРАВА И ДЕЙСТВИЯ, МОЖНО ВЫНЕСТИ В ОТДЕЛЬНЫЙ ДОКУМЕНТ

