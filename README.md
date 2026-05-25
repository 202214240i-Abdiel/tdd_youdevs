# tdd_youdevs — Laravel 10 + TDD CRUD de eventos

Proyecto replicado a partir del video: creación de proyecto Laravel, pruebas con PHPUnit, desarrollo incremental y CRUD de eventos.

> Este paquete contiene los archivos que debes copiar/reemplazar dentro de un proyecto Laravel 10 creado con Composer.

## 1. Crear el proyecto

```bash
composer create-project laravel/laravel tdd_youdevs "10.*"
cd tdd_youdevs
```

## 2. Configurar base de datos de prueba

Opción rápida recomendada para pruebas: SQLite en memoria.

En `phpunit.xml`, dentro de `<php>`, deja estas variables:

```xml
<env name="DB_CONNECTION" value="sqlite"/>
<env name="DB_DATABASE" value=":memory:"/>
```

Si quieres replicar el video con Laragon/MySQL, crea una base de datos llamada `tdd_events_test` y usa `.env.testing` con:

```dotenv
APP_ENV=testing
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tdd_events_test
DB_USERNAME=root
DB_PASSWORD=
```

## 3. Comandos usados durante el desarrollo

```bash
php artisan make:model Event -m
php artisan make:controller EventController
php artisan make:request StoreEventRequest
php artisan make:test CreateEventTest
php artisan make:test ReadEventTest
php artisan make:test UpdateEventTest
php artisan make:test DeleteEventTest
```

Después de copiar los archivos de este paquete en el proyecto Laravel:

```bash
php artisan migrate:fresh --env=testing
php artisan test
```

Para ejecutar pruebas individuales:

```bash
php artisan test --filter CreateEventTest
php artisan test --filter ReadEventTest
php artisan test --filter UpdateEventTest
php artisan test --filter DeleteEventTest
```

## 4. Commits sugeridos

```bash
git init
git add .
git commit -m "Crear proyecto Laravel 10"

git add .
git commit -m "Configurar base de datos de pruebas"

git add app/Models/Event.php database/migrations tests/Feature/CreateEventTest.php
git commit -m "Agregar prueba para crear eventos"

git add routes/web.php app/Http/Controllers/EventController.php app/Http/Requests/StoreEventRequest.php
git commit -m "Implementar creación de eventos"

git add tests/Feature/ReadEventTest.php resources/views/events/index.blade.php
git commit -m "Agregar listado de eventos con prueba"

git add tests/Feature/UpdateEventTest.php app/Http/Controllers/EventController.php routes/web.php
git commit -m "Implementar actualización de eventos"

git add tests/Feature/DeleteEventTest.php app/Http/Controllers/EventController.php routes/web.php
git commit -m "Implementar eliminación de eventos"
```

## 5. Subir a GitHub

Crea un repositorio vacío en GitHub y luego ejecuta:

```bash
git remote add origin https://github.com/TU_USUARIO/tdd_youdevs.git
git branch -M main
git push -u origin main
```

## 6. Capturas para entregar

Toma capturas de:

1. `php artisan test` con todas las pruebas en verde.
2. `php artisan test --filter CreateEventTest`.
3. `php artisan test --filter ReadEventTest`.
4. `php artisan test --filter UpdateEventTest`.
5. `php artisan test --filter DeleteEventTest`.

