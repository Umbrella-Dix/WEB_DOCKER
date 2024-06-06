<?php


//ГРУБО ГОВОРЯ ДАННЫЙ ФАЙЛИК СОЗДАЕТ ПОДКЛЮЧЕНИЕ К БД И ВАЖНЫЙ ОБЪЕКТ PDO, КОТОРЫЙ ИСПОЛЬЗУЕТСЯ ДАЛЕЕ





//файл подключения к базе данных (универсальный и самый важный для начала работы)
//и создания часто использемого объекта pdo

$host='mysql';//адрес базы данных (даннном случае локальная машина)
$dbname='my_one_database';//имя конкретной базы данных по адресу (их можно создать несколько)
$dbusername='root';//типо логин для входа и подтверждения прав
$dbpassword='root';//типа пароль


try {
    $pdo=new PDO("mysql:host=$host;dbname=$dbname",$dbusername,$dbpassword);//сама строка подключения

    $pdo->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);//строка перехватывания исключений и ошибок на будущее
} catch (PDOException $e) {
    die("Connect failed: ".$e->getMessage());
}