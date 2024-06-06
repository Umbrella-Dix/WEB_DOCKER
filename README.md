## Разработка веб приложения с использованием докер контейнеров 

### Что реализовано в данном проекте?
1) Новостной сайт про аниме (просто красивые страницы с новостями, на которых почти нет логики php), в основном на них используюся следующие языки.
- html
- css
- немного javascript

2) Форум для общения, где можно просмотреть все сообщения пользователей. Упор сделан на работу с бд, а НЕ на визуал.
- mysql
- php

3) Авторизация и регистрация пользователей с выбором уровня привелегий.
- Пользователь
- Администратор
- Модератор

4) Профили пользователей, которые отличаются в зависимости от выбранного уровня привелегий. Упор сделан на работу с БД, а НЕ на визуал.
- Возможности пользователя уменьшаются в зависмости от уровня привелегий
- Самый высокий уровень полномочий у админа, остальные лишь дублируют части его функций

5) Реализовано разделение на 4 микросервиса, которые работают в одной сети по умолчанию
- nginx
- php
- mysql
- phpmyadmin



### Краткое описание (более подробное в конце)
1) В папке /src/ лежит основа сайта и весь его php функционал
2) В папке /docker/ лежат настройка nginx и и Dockerfile для php
3) В корне лежит файл docker-compose, который создает все настройки и запускает 4 контейнера для их совместной работы. В нем указаны останые настройки.
4) Тестирование проводилось в браузере Google Chrome
5) Разработка велась в помощью инструмента XAMPP
6) Описание важных моментов, багов и проблем в конце

### Запуск приложения
Шаг 1: Установить приложение Docker Desktop и Git, а также создать новую директория (папку на компе в любом месте)

Шаг 2: Открыть эту папку и скачать проект (команды выполнять через терминал, внутри папки)

    git init
    git pull https://github.com/Umbrella-Dix/WEB_DOCKER.git 

Далее для работы нам понадобится всего 3 команды, ведь все останое прописано в файлах docker-compose Dockerfile

Шаг 3: Для начала собрать проект:

    docker-compose build   

Шаг 4: После долгого скачивания образов нужно запустить контейнер, с тегом -d чтобы не заблокировался терминал:
    
    docker-compose up -d  


Шаг 4:  Если нужно остановить контейнер выполните эту команду

    docker-compose down

или можно просто выполнять сразу три команды каждый раз при запуске / пересобирании

    docker-compose down
    docker-compose build
    docker-compose up -d


Шаг 5: Вы можете получить доступ к phpmyadmin по ссылке 
    логин: root
    пароль: root
    http://localhost:1500/


Шаг 6: Доступ к странице автоизации на сайте доступен по ссылке. Изначально учетные записи при регистрации создаются неактивированными, но можно войти в учетку которая уже есть в бд с помощью логина admin пароля admin
    http://localhost:80/

Шаг 7: Изначально учетные записи при регистрации создаются деактивированными, но есть уже готовые учетки из бд где пароль равен логину. Например учетка:
    логин: admin
    пароль: admin



### Возможные проблемы

1) Если не работает докер в РФ, нужно вставить следующий код во вкладке Docker Engine перейдя в Настройки приложения Docker Desktop:

    {
    "registry-mirrors":[
    "https://dockerhub.timeweb.cloud",
    "https://mirror.gcr.io",
    "https://public.ecr.aws"
    ]
    }
    


2) Если не работает бд, нужно создать в phpmyadmin новую бд с название "my_one_database" и импортировать в неё файл sql лежащий в проекте

3) На старых версиях Docker Desktop приложение может не собираться, причина неизвестна
4) В браузере firefox слегка иначе отображается меню 


#### Дополнительная информация о проекте

1) Работа с бд начинается с файла /php/includes/dbh.inc.php, где подключение к БД идет через подключаемый модуль PDO
2) Запуск сессий начинается с /php/includes/config_session.inc.inc.php
3) В той же папке /php/includes/ лежат основные скрипты для регистрации и авторизации (с комментариями)
4) В той же папке /php/includes/ лежат основные скрипты для регистрации и авторизации (с комментариями)
5) Далее в папке /php/ лежат основные папки со скриптами, в которых описаны основные полномочия Пользователей, Модераторов и Админов. Папки с созвучными названиями. Самое интересное лежит у админа, другие папки лишь наследуют малые части его полномочий
6) У каждого файла я постарался сделать более-менее понятное название, которое передавало бы его функции
7) Файлы php, которые лежат в корне директории /php/ представляют собой страницы
8) ВАЖНО: учетные записи, созданные админом, активируются сразу. При ОБЫЧНОЙ регистрации они деактивированы. Комментарии, которые пишут пользователи изначально тоже не публикуются. Однако их могут опубликовать модератор и администратор.
9) Присутствует защита от перехода по ссылке (прерывает сессию если юзер попытается войти на страницу админа)

P.S. 
1) Вся разработка велась на хорошей программе создающей полноценный локальный сервер. В чем то он лучше настоящий хостингов и докеров. Поэтому при переносе сайта в контейнеры возникало очень много проблем, на решение которых тратилось много времени.
2) Большинство из них решины с помощью файлов конфигурации по типу php.ini или же default.conf (буквально не так что-то пропишешь или не поставишь 1 вместо 0 в нужном месте и все ломается). Основные проблемы возникали на запуске страницы с nfginx и работы с сессиями ini php 
3) Как вывод - разработка и отладка на докер контейнерах в разы хуже специализированного софта.






