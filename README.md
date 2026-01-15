<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>




# 🚀 Laravel Blog API - AmiCode

Esta es una API RESTful construida con **Laravel** para la gestión de un Blog. Incluye autenticación segura mediante **Laravel Sanctum**, gestión de usuarios, publicaciones (posts) con carga de imágenes, categorías y comentarios.

## 🛠️ Requisitos
* PHP 8.2+
* Composer
* MySQL / MariaDB
* Laragon o XAMPP

## 📦 Instalación

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/tu-usuario/nombre-del-repo.git](https://github.com/tu-usuario/nombre-del-repo.git)
   cd nombre-del-repo

   composer install

   ##Configurar el entorno:

Copia el archivo .env.example a .env.

Configura tu base de datos en el archivo .env.



php artisan key:generate

##Migraciones y Link de Almacenamiento:


php artisan migrate
php artisan storage:link

##Iniciar el servidor:


php artisan serve

##📑 Endpoints de la API👤 
##Usuarios y Auth
Método,Endpoint,Descripción,Acceso
POST,/api/login,Obtener token de acceso,Público
POST,/api/users,Registrar un nuevo usuario,Público
GET,/api/users,Listar todos los usuarios,Protegido
POST,/api/logout,Revocar el token actual,Protegido

##Nota: Para crear/actualizar posts con imágenes, usa form-data en lugar de JSON.
Método,Endpoint,Descripción,Acceso
GET,/api/posts,Listar todos los posts,Público
POST,/api/posts,Crear un nuevo post (con imagen),Protegido
GET,/api/posts/{id},Ver detalle de un post,Público
PUT,/api/posts/{id},Actualizar un post,Protegido
DELETE,/api/posts/{id},Eliminar un post,Protegido

##Comentarios y Categorías

Método,Endpoint,Descripción,Acceso
GET,/api/posts/{id}/comments,Ver comentarios de un post,Público
POST,/api/categories,Crear una categoría,Protegido