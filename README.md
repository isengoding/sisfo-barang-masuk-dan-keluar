## Laravel Inventori

Sistem informasi pencatatan barang masuk dan keluar menggunakan framework laravel. 

## Installasi
- Download repository dan ekstrak atau clone repository
	```sh
	git clone https://github.com/isengoding/sisfo-barang-masuk-dan-keluar.git
	```
- Masuk ke direktori aplikasi dan jalankan composer
	```sh
	cd sisfo-barang-masuk-dan-keluar
	composer install
	```
 - Copy file .env.example menjadi .env
	```sh
	cp .env.example .env
	```
- Generate key application
	```sh
	php artisan key:generate
	```
 - Storage link
	```sh
	php artisan storage:link
	```
- Buat Database
- Edit database name, database username dan database password di file .env
    ```sh
	DB_DATABASE=your_db.
    DB_USERNAME=your_mysql_username.
    DB_PASSWORD=your_mysql_password.
	```
- Migrate table
	```sh
	php artisan migrate
	```
- Jalankan lokal development server
    ```sh
	php artisan serve
	```
- Buka di browser http://localhost:8000

- Testing
    ```sh
	php artisan test
	```
## Screenshot
- Halaman Login
![Alt text](/screenshot/login.png "login page")

- Halaman Data Barang
![Alt text](/screenshot/data-barang.png "login page")

- Transaksi Barang Masuk
![Alt text](/screenshot/transaksi-barang-masuk.png "login page")

 ## Author
Dharma – isengoding@gmail.com

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
