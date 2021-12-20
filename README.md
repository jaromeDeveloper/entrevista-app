# entrevista-app
# Jorge A. Rodriguez Méndez
# jarome.developer@gmail.com
# 19 de diciembre del 2021
App Demo 
# Para poder ejecutar la aplicación, se requiere de los siguientes pasos:
# 1.- Descargar el proyecto o clonarlo
# 2.- Desde una terminal, ejecutar composer install
# 3.- Ejecutar las migraciones para tener una base de datos:
# 4.- php artisan db:seed --class=lessonSeeder
# 5.- php artisan db:seed --class=studentsSeeder
# 6.- Ejecutar el script stores.sql que se encuentra dentro de la carpeta
# 7.- Ejecutar el comando php artisan serve



# Notas: Se realizo una modificación a la variable $namespace para evitar un conflicto en el llamado de los namespace

# Desde un entorno linux o MacOSX, revisar que tiene permisos para poder ejecutar los comandos.

# Route Service Provider
# protected $namespace = 'App\Http\Controllers';
