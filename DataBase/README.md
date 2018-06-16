Установка:
1. (Консоль) git clone https://github.com/belram/diplom.git
2. (Консоль) composer install
3. (Консоль) copy .env.example .env
4. Скопировать настройки подключения к базе данных из .env.example в файл .env:
	DB_DATABASE=faq
	DB_USERNAME=root
	DB_PASSWORD=
5. (Консоль) php artisan key:generate
6. (Консоль) php artisan migrate
7. (Консоль) php artisan db:seed
8. (Консоль) php artisan serve
9. Наберите в фдресной строке браузера: http://localhost
