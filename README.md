# 🚀 Laravel Blog API – AmiCode

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

---

## 📖 Descripción

**Laravel Blog API – AmiCode** es una API RESTful construida con **Laravel** para la gestión completa de un blog.  
Incluye autenticación segura con **Laravel Sanctum**, manejo de usuarios, publicaciones con carga de imágenes, categorías y comentarios.

---

## 🛠️ Requisitos

- PHP **8.2+**
- Composer
- MySQL / MariaDB
- Laragon, XAMPP o entorno similar

---

## 📦 Instalación

### 1️⃣ Clonar el repositorio
```bash
git clone https://github.com/tu-usuario/nombre-del-repo.git
cd nombre-del-repo
```

### 2️⃣ Instalar dependencias
```bash
composer install
```

### 3️⃣ Configurar el entorno
```bash
cp .env.example .env
php artisan key:generate
```

Configura tus credenciales de base de datos en el archivo `.env`.

---

### 4️⃣ Migraciones y almacenamiento
```bash
php artisan migrate
php artisan storage:link
```

---

### 5️⃣ Iniciar el servidor
```bash
php artisan serve
```

La API estará disponible en:
```
http://127.0.0.1:8000
```

---

## 🔐 Autenticación

La API utiliza **Laravel Sanctum** para la autenticación mediante tokens.

> ⚠️ Para crear o actualizar posts con imágenes, utiliza **form-data** en lugar de JSON.

---

## 📑 Endpoints de la API

### 👤 Usuarios y Autenticación

| Método | Endpoint        | Descripción                      | Acceso     |
|------|-----------------|----------------------------------|------------|
| POST | /api/login      | Obtener token de acceso          | Público    |
| POST | /api/users      | Registrar nuevo usuario          | Público    |
| GET  | /api/users      | Listar todos los usuarios        | Protegido  |
| POST | /api/logout     | Revocar token actual             | Protegido  |

---

### 📝 Posts

| Método | Endpoint              | Descripción                         | Acceso     |
|------|-----------------------|-------------------------------------|------------|
| GET  | /api/posts            | Listar todos los posts              | Público    |
| POST | /api/posts            | Crear un post (con imagen)          | Protegido  |
| GET  | /api/posts/{id}       | Ver detalle de un post              | Público    |
| PUT  | /api/posts/{id}       | Actualizar un post                  | Protegido  |
| DELETE | /api/posts/{id}     | Eliminar un post                    | Protegido  |

---

### 💬 Comentarios y 📂 Categorías

| Método | Endpoint                         | Descripción                    | Acceso     |
|------|----------------------------------|--------------------------------|------------|
| GET  | /api/posts/{id}/comments         | Ver comentarios de un post     | Público    |
| POST | /api/categories                  | Crear una categoría            | Protegido  |

---

## 📜 Licencia

Este proyecto está bajo la licencia **MIT**.

---

### ✨ Autor
**Ing. Aminadad Feliciano**  
Desarrollado con ❤️ usando Laravel
