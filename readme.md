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
 
- (Windows) Al iniciar los servicios en Laragon, se generará automáticamente la configuración para el Virtual Host. En Linux hacer lo siguiente:

- Se deben instalar desde la terminal todas las librerias necesarias para la correcta ejecución del proyecto desde la consola se escribe el siguiente comando: 

        composer install
                
- Se debe renombrar el archivo **.env.example** a **.env**, los datos para la conexión a la DB son los por default:

        DB_DATABASE=homestead
        DB_USERNAME=root
        DB_PASSWORD=

- En el caso de Linux, se debe dar permisología de lectura/escritura a la carpeta "Storage" y crear los directorios correspondientes:

        sudo chown 777 -R storage
        mkdir storage/framework
        mkdir storage/framework/sessions
        mkdir storage/framework/views
        mkdir storage/framework/cache


- Se deben generar las keys para el correcto funcionamiento de la encriptacion en el proyecto:

        php artisan key:generate
        php artisan cache:clear
        php artisan config:clear
        php artisan view:clear
        php artisan optimize

- Generar esquema de base de datos: homestead

- Ejecutar las migraciones para las tablas con el siguiente comando:
        
        php artisan migrate:install

## Ejecución

a) Windows (más rápida):
- Iniciar servicios en Laragon, apuntar el navegador a la ruta [laravel-api.dev](laravel-api.dev)

b) Linux:

c) Vía comando php artisan serve (alternativa)

## Tecnologías Utilizadas

- [Laragon 3.0](https://sourceforge.net/projects/laragon/files/releases/3.0/laragon-wamp.exe): Ambiente para desarrollo rápido de aplicaciones.
- [RANDOM USER GENERATOR](https://randomuser.me): API open source para generar información aleatoria de usuarios.
- [JSONPlaceholder](https://jsonplaceholder.typicode.com): API open source para generar información aleatoria de tareas.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).