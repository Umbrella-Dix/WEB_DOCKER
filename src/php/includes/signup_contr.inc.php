<?php
//чтобы были строгие типы для файла и возникали ошибки если функция требует int а ей дают string
declare(strict_types=1);


//ДАННЫЙ ФАЙЛ СОДЕРЖИТ ЛОГИЧЕСКИЕ ФУНКЦИИ КОТОРЫЕ ВОЗВРАЩАЮ ЛОЖЬ/ИСТИНА ПРИ ПРОВЕРКЕ ВХОДНЫХ ДАННЫХ 
//С ПОМОЩЬЮ СТАНДАРТНЫХ ФУНКЦИЙ PHP ИЛИ ФУНКЦИЙ ПРОПИСАННЫХ В ФАЙЛИКЕ signup_model.inc.php





// function create_input(string $username, string $pwd, string $email){
//     if(empty($username) ||empty($pwd) ||empty($email)){
//         return true;
//     }
//     else{
//         return false;
//     }
// }


//проверка ввел ли пользователь данные или оставил поля пустые
function is_input_empty(string $username, string $pwd, string $email){
    if(empty($username) ||empty($pwd) ||empty($email)){
        return true;
    }
    else{
        return false;
    }
}

//проверка правильности емейла
//если все норм она вернет строку с почтой, а если нет ничего не вернет
//ПОЧЕМУ ПРОВЕРЯЕМ НА !ТРУ? => иногда это удобнее
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

function is_ID_taken(object $pdo, int $user_id){

    //тут мы проверяем через нашу кастомную функцию, которая лежит в другом файле
    if(get_user_id($pdo, $user_id)){
        return true;
    }
    else{
        return false;
    }
}
//аналогичная функция для проверки почты
function is_email_registred(object $pdo, string $email){
    
    //тут мы проверяем через нашу кастомную функцию, которая лежит в другом файле
    if(get_email($pdo, $email)){
        return true;
    }
    else{
        return false;
    }
}



function is_username_or_id_wrong(bool|array $result)//мы можем принимать сразу несколько типов данных на однупеременную
{
    if(!$result){
        return true;
    }
    else{
        return false;
    }

}

function is_comment_id_wrong(bool|array $result)//мы можем принимать сразу несколько типов данных на однупеременную
{
    if(!$result){
        return true;
    }
    else{
        return false;
    }

}