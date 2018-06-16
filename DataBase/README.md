Установка:
1. Перейдите в директорию, используя cd (change dir), в которую будет установлен проект.
2. (Консоль) git clone https://github.com/belram/diplom.git.
3. (Консоль) composer install
4. (Консоль) cp .env.example .env
5. Скопировать настройки подключения к базе данных из .env.example в файл .env:
	DB_DATABASE=faq
	DB_USERNAME=root
	DB_PASSWORD=
6. (Консоль) php artisan key:generate
7. (Консоль) php artisan migrate
8. (Консоль) php artisan db:seed
9. Наберите в адресной строке браузера: http://localhost
