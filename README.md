<h1>API для управления учасниками мероприятия</h1>
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Для запуска приложения понадобится

1. Сохраните репозиторий (можно использовать команду git clone https://github.com/OYovbak/test-task.git)
2. Скопируйте содержимое файла .env.example в файл .env (cp .env.example .env)
3. Убедитесь что настройки файла .env совпадают с вашими настройка
4. Запустите миграцию таблиц (php artisan migrate)
5. При надобности запустите автозаполение таблицы 'Events' (php artisan db:seed)
6. Запустите локальный сервер (php artisan serve)
## Инструкция по работе с API

метод:POST (.../api/register) - регистрация принимает в себя реквест в виде пар ключ значение (name - string; email - mail; password - string; c_password - string),
метод:GET (.../api/participant) - возвращает список всех участников которые когда то были созданы,
метод:POST (.../api/participant) - создает нового участника (name, surname, email),
метод:PUT (.../api/participant) - запрос на изминение участника по id,
метод:DELETE (.../api/participant) - запрос на удаление учасника по id,
метод:GET (.../api/events) - возвращает список всех мероприятий,
метод:GET (.../api/events/{id}) - возвращает мероприятие по id и всех зарегистрированных на него учасников,
метод:POST (.../api/events/{id}) - добавляет связь между учасником и мероприятием (требуется отправка id участника через реквест participant_id),
метод:DELETE (.../api/events/{id}) - удаляет связь между учасником и мероприятием (требуется отправка id участника через реквест participant_id),
