@REM @echo off

@REM rem Instalar dependencias de Composer
@REM call composer install

@REM rem Instalar dependencias de npm
@REM call npm install

@REM rem Copiar el archivo .env.example
@REM call copy .env.example .env

@REM rem Generar la clave de aplicación
@REM call php artisan key:generate

@REM rem Ejecutar las migraciones de la base de datos
@REM call php artisan migrate

rem Abrir una nueva consola y ejecutar el servidor de desarrollo
start cmd /k "npm run dev"

rem Compilar assets
call php artisan serve


