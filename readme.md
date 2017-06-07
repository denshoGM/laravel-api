# Simple App for GRC Soluciones / Aplicación Sencilla para GRC Soluciones 

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Web Backend - API RESTFull, un proyecto que utiliza el potencial de Laravel 5.4.

## Pre-requisitos

a) Si se está bajo un entorno Windows:

- Descargar e instalar [Laragon 3.0](https://sourceforge.net/projects/laragon/files/releases/3.0/laragon-wamp.exe)
 
b) Si se está bajo un entorno Linux:

- Tener configurado un ambiente LAMP (Apache + Mysql + PHP).

## Instalación
- Clonar el repositorio hacia la ruta raiz del servidor de aplicaciones.
 
- En Windows, al iniciar los servicios de Laragon se generará automáticamente la configuración para el Virtual Host. 
En Linux se debe hacer lo siguiente:

        cd /etc/apache2/sites-available/
        sudo cp 000-default.conf laravel-api.dev.conf
        sudo nano laravel-api.dev.conf
        
        Editar el archivo de la siguiente manera:
        <VirtualHost *:80> 
            DocumentRoot "/var/www/html/laravel-api/public/" (o ruta del servidor)
            ServerName laravel-api.dev
            ServerAlias *.laravel-api.dev
            <Directory "/var/www/html/laravel-api/public/"> (o ruta del servidor)
                AllowOverride All
                Require all granted
            </Directory>
        </VirtualHost>
        
        sudo a2ensite laravel-api.dev.conf
        sudo nano /etc/hosts
        
        Agregar la línea: 127.0.0.1        laravel-api.dev
        
        
        Asegurarse que esté activo el módulo rewrite: sudo a2enmod rewrite
        
        Reiniciar el servidor: sudo service apache2 restart
        
- Se deben instalar desde la terminal todas las librerias necesarias para la correcta ejecución del proyecto. Desde la 
consola se escribe el siguiente comando: 

        composer install
                
- Se debe renombrar el archivo **.env.example** a **.env**, los datos para la conexión a la DB son los por default:

        DB_DATABASE=homestead
        DB_USERNAME=root
        DB_PASSWORD=

- En el caso de Linux, se debe dar permisología de lectura/escritura a la carpeta "Storage" y crear los directorios 
correspondientes:

        sudo chown 777 -R storage
        mkdir storage/framework
        mkdir storage/framework/sessions
        mkdir storage/framework/views
        mkdir storage/framework/cache

- Se deben generar las keys para el correcto funcionamiento de la encriptacion en el proyecto. *Se pueden ejecutar los 
comandos adicionales en caso de requerirlo:

        php artisan key:generate
        
        *Opcionales:
        php artisan cache:clear
        php artisan config:clear
        php artisan view:clear
        php artisan optimize

- Generar esquema de base de datos: **homestead**

- Ejecutar las migraciones para las tablas con el siguiente comando:
        
        php artisan migrate:install
        php artisan migrate

## Ejecución

a) Windows (más rápida):
- Reiniciar todos los servicios en Laragon, apuntar el navegador a la ruta [laravel-api.dev](laravel-api.dev)

b) Linux:

- Realizar todas las configuraciones anteriores, apuntar el navegador a la ruta [laravel-api.dev](laravel-api.dev)

c) Vía comando (alternativa)

- Posicionarse desde la terminal en la carpeta del proyecto, ejecutar el comando: **php artisan serve** apuntar a la ruta generada (usualmente) [http://127.0.0.1:8000/](http://127.0.0.1:8000/)

## Tecnologías Utilizadas

- [Laragon 3.0](https://sourceforge.net/projects/laragon/files/releases/3.0/laragon-wamp.exe): Ambiente para desarrollo rápido de aplicaciones.
- [RANDOM USER GENERATOR](https://randomuser.me): API open source para generar información aleatoria de usuarios.
- [JSONPlaceholder](https://jsonplaceholder.typicode.com): API open source para generar información aleatoria de tareas.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).