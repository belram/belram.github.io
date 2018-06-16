Установка:

(Консоль) git clone https://github.com/belram/diplom.git
(Консоль) composer install
(Консоль) copy .env.example .env
Скопировать настройки подключения к базе данных из .env.example в файл .env: DB_DATABASE=faq DB_USERNAME=root DB_PASSWORD=
(Консоль) php artisan key:generate
(Консоль) php artisan migrate
(Консоль) php artisan db:seed
(Консоль) php artisan serve
Наберите в фдресной строке браузера: http://localhost
