# 🚀 Guías de Prácticas Laravel - TaskBoard: Pasarela de Pagos

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)
![GitHub](https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white)

---

<p align="center">
  <img src="https://res.cloudinary.com/bcwlyire/image/upload/v1785118882/NUEVO-LOGO-UPED-A-COLOR-scaled_szoqws.jpg" alt="Logo UPED" width="300"/>
</p>

## 🏛️ Información Académica

- **Institución:** Universidad Pedagógica de El Salvador *Luis Alonso Aparicio*
- **Facultad:** Ingeniería
- **Asignatura:** Integración de Sistemas
- **Ciclo:** 02-2026
- **Docente:** Ing. Oscar Contreras
- **Proyecto Integrador:** TaskBoard - Pasarela de Pagos

---

## 📌 Descripción del Proyecto

Este repositorio contiene el trabajo de la **Semana 9** del proyecto **TaskBoard**, una plataforma de **Pasarela de Pagos** desarrollada en el framework **Laravel 11**.

Hasta la Semana 8 la aplicación solo **mostraba** información. En esta semana el sistema empieza a **recibir datos del usuario** mediante formularios, a través de dos guías de laboratorio:

1. **Guía N.° 5 (jueves) — Fundamentos de formularios:** elementos HTML de un formulario en un entorno de práctica, la diferencia real entre **GET** y **POST**, un **buscador por GET** en `/comercios` que conserva el filtro en la URL, y el error **419 de CSRF** provocado y resuelto a propósito con `@csrf`.
2. **Guía N.° 6 (viernes) — Formulario "Nueva Transacción":** vista del formulario, rutas con nombre, controlador con `create()` y `store()`, guardado con Eloquent, patrón **PRG** (Post → Redirect → Get) con mensaje flash para que recargar no duplique registros, y la defensa contra **mass assignment** usando `only()` en lugar de `all()`.

Al terminar, un comercio puede registrar una transacción real desde el navegador y verla aparecer en su panel.

---

## 📁 Estructura del Proyecto

A continuación se detalla la estructura principal del repositorio y del proyecto Laravel `taskboard`:

```text
taskboard/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ComercioController.php                # index() ahora filtra por buscar y rubro
│   │       └── TransaccionController.php             # create() y store() del nuevo formulario
│   └── Models/
│       ├── Comercio.php                              # hasMany(Transaccion)
│       ├── Transaccion.php                           # belongsTo(Comercio)
│       └── EventoTransaccion.php                     # belongsTo(Transaccion)
├── config/                                           # Archivos de configuración general del sistema
├── database/
│   ├── migrations/                                   # Tablas de comercios, transacciones y eventos
│   └── seeders/
│       └── ComercioSeeder.php                        # Datos de ejemplo usados en todas las guías
├── public/                                           # Punto de entrada de la aplicación (index.php) y assets
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php                         # Layout maestro + mensaje flash de éxito
│       ├── components/                               # badge-estado, badge-actividad, resumen-actividad
│       ├── comercios/
│       │   ├── index.blade.php                       # Listado con buscador GET y filtro por rubro
│       │   └── show.blade.php                        # Detalle + enlace "Nueva transacción"
│       ├── transacciones/
│       │   └── create.blade.php                      # Formulario de nueva transacción con @csrf
│       └── practica/
│           └── formulario_demo.blade.php             # Sandbox de formularios (no toca la base)
├── routes/
│   └── web.php                                       # Rutas de comercios, transacciones y práctica
├── storage/                                          # Registros (logs), archivos cargados y caché de la app
├── vendor/                                           # Dependencias de PHP administradas por Composer
├── .env.example                                      # Variables de entorno de ejemplo
├── composer.json                                     # Configuración de Composer y paquetes
└── README.md                                         # Documentación principal del repositorio
```
