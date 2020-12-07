# Proyecto Final: Recetario Virtual

Alaniz, Miguel  
Franco, Ramón  
Universidad de Guadalajara  
Programación para Internet

## Descripción

El proyecto tiene como objetivo desarrollar una aplicación completa (frontend y backend) para almacenar recetas creadas por los usuarios que se registran en el sistema.

## Instalación

1. Clonar proyecto `git clone https://github.com/linmik/RecetarioVirtual.git`
2. Instalar dependiencias mediante composer: `composer install`
3. Instalar dependiencias mediante npm: `npm install`
4. Crear archivo de variables de entorno: `cp .env.example .env`
5. Crear llave: `php artisan key:generate`
6. Configurar nombre de base de datos en _.env_ y ejecutar migraciones: `php artisan migrate`
7. [Fotos de perfil] Cambiar la linea "APP_URL = (url de la aplicacion)" en el archivo .env
8. [Fotos de perfil] Ejecutar el comando `php artisan storage:link`
9. [Seders de categorias] Ejecutar el comando `php artisan db:seed --class=DatabaseSeeder`
10. [Seders Prueba / Generacion de usuario, recetas, categorias] Ejecutar el comando `php artisan db:seed --class=PruebasSeeder`
11. [Correos] Cambiar informacion de verificacion de correos en el archivo .env 
12. Iniciar aplicación con `php artisan serve`

Una vez ejecutado el comando anterior, el proyecto se puede visualizar en [http://localhost:8000](http://localhost:8000)

## Uso

Demo del proyecto accesible en [Heroku](http://proyecto-recetario-virtual.herokuapp.com/login).

## Licencia

[MIT](https://github.com/linmik/RecetarioVirtual/blob/main/LICENSE)
