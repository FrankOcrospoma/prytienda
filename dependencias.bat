@echo off

rem Instalar dependencias de Composer
call composer install

rem Instalar dependencias de npm
call npm install

rem Copiar el archivo .env.example
call copy .env.example .env

rem Generar la clave de aplicación
call php artisan key:generate

rem Ejecutar las migraciones de la base de datos
call php artisan migrate

rem Abrir una nueva consola y ejecutar el servidor de desarrollo
start cmd /k "npm run dev"

rem Compilar assets
call php artisan serve


