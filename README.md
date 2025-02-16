# Blog con Laravel y Livewire

Este es un proyecto desarrollado con Laravel y Livewire que permite la creación y administración de publicaciones de blog, manejo de usuarios y consumo de una API externa.

## 📌 Características
- Registro de usuarios con estado inactivo por defecto.
- Activación y desactivación de usuarios por un administrador.
- Creación de publicaciones solo por usuarios activos (sin opción de editar/eliminar).
- Sistema de suscripciones para actualizar publicaciones en tiempo real.
- Pruebas unitarias para validar el funcionamiento de las funcionalidades clave.
- Manejo de errores con logs y visualización para el usuario.
- Módulo específico que consume una API externa (*JSONPlaceholder*).
- Uso de Laravel Livewire para la gestión de componentes dinámicos.

## 🚀 Tecnologías Utilizadas
- **Laravel v11.42.1**
- **Livewire v3.5.19**
- **PHP 8.2+**
- **MySQL / SQLite** (según configuración)
- **Vite v6.1.0**
- **Tailwind CSS**
- **phpMyAdmin v5.2.2**

## 📂 Instalación y Configuración

### 1️⃣ Clonar el repositorio
```sh
    git clone https://github.com/HakaiNoKami97/blog-prueba
    cd blog-prueba
```

### 2️⃣ Instalar dependencias
```sh
    composer install
    npm install
```

### 3️⃣ Configurar el entorno
Renombrar el archivo `.env.example` a `.env` y modificar las credenciales de base de datos:
```sh
    cp .env.example .env
```
Actualizar la clave de la aplicación:
```sh
    php artisan key:generate
```

### 4️⃣ Configurar la base de datos
Ejecutar migraciones y sembrar datos de prueba:
```sh
    php artisan migrate --seed
```

### 5️⃣ Levantar el servidor
```sh
    php artisan serve
```

Para compilar los assets de Vite, en otra terminal ejecutar:
```sh
    npm run dev
```

## 📌 Uso de la API Externa

### 📌 Endpoints disponibles
El proyecto consume datos de la API [JSONPlaceholder](https://jsonplaceholder.typicode.com/).

#### 🔹 Obtener todas las publicaciones desde la API
```sh
GET http://localhost/api/posts
```

#### 🔹 Visualizar publicaciones desde el componente Livewire
```sh
GET http://localhost/api-posts
```

## 🛠️ Pruebas en Consola
El proyecto cuenta con pruebas automatizadas. Para ejecutarlas, usar:
```sh
    php artisan test
```

Se incluyen pruebas de:
- Registro de usuarios y estado inactivo por defecto.
- Restricción de creación de publicaciones para usuarios inactivos.
- Acceso de administradores al módulo de gestión de usuarios.

## 📜 Licencia
Este proyecto está bajo la licencia MIT. Puedes utilizarlo y modificarlo libremente.