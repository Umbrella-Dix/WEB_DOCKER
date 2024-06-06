<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
declare(strict_types=1);

//БОЛЬШИНСТВО КОДА ИЗ ЭТОГО ФАЙЛА ПОХОЖЕ НА signup_contr.inc.php

//ДАННЫЙ ФАЙЛ СОДЕРЖИТ ЛОГИЧЕСКИЕ ФУНКЦИИ КОТОРЫЕ ВОЗВРАЩАЮ ЛОЖЬ/ИСТИНА ПРИ ПРОВЕРКЕ ВХОДНЫХ ДАННЫХ 
//С ПОМОЩЬЮ СТАНДАРТНЫХ ФУНКЦИЙ PHP ИЛИ ФУНКЦИЙ ПРОПИСАННЫХ В ФАЙЛИКЕ login_model.inc.php












//аналогичная функция есть в файлике про регистрацию, тут проверка на пустые поля
function is_input_empty_login(string $username, string $pwd){
    if(empty($username) ||empty($pwd)){
        return true;
    }
    else{
        return false;
    }
}

//мы можем принимать сразу несколько типов данных на однупеременную
//потому что здесь мы проверяем результат функции get_user а она возвращает массив если есть пользователь, 
//и ложь если его не существует

//функция проверки существует ли пользователь
function is_username_wrong(bool|array $result)//мы можем принимать сразу несколько типов данных на однупеременную
{
    if(!$result){
        return true;
    }
    else{
        return false;
    }

}



//функция проверки существует ли пользователь
function is_password_wrong(string $pwd, string $hashedPwd)//мы можем принимать сразу несколько типов данных на однупеременную
{
    //типо расшифровка пароля и его сравнение с паролем из бд
    if(!password_verify($pwd, $hashedPwd)){//безопасный вариант

        return true;
    }
    else{
        return false;
    }


     // if(!($pwd==$hashedPwd)){//небезопасный вариант, когда просто сравниваем ввод и содержимое бд

    //     return true;
    // }
    // else{
    //     return false;
    // }

}

function is_not_activated(int $activated)//мы можем принимать сразу несколько типов данных на однупеременную
{
    if(!$activated){
        return true;
    }
    else{
        return false;
    }

}