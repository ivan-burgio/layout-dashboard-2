## COMO DEJAR FUNCIONANDO LARAVEL

# Hay que tirar estos comandos en la terminal

php artisan key:generate

php artisan config:cache

php artisan session:table

php artisan migrate


# Tambien hay que verificar que no este comentada la sigueinte linea en el php.ini

;extension=pdo_mysql

# Y tener los datos correctos de la coneccion a la db en el .env


## CREDENCIALES DB

host: 127.0.0.1

puerto: 3306

user: u732685382_buyar

database: u732685382_buyar_dev

Password: Buyar12345678