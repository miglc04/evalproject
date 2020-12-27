
# EVAL PROJECT

## Instrucciones (para windows)

- Instalar Laragon
  [Lite](https://sourceforge.net/projects/laragon/files/releases/4.0/laragon-wamp.exe)
  o [Full](https://sourceforge.net/projects/laragon/files/releases/4.0/laragon-full.exe)
  - Permitir la creación de hosts virtuales
- Descargar [PHP 7.4](https://windows.php.net/downloads/releases/php-7.4.13-Win32-vc15-x64.zip)
- Agregar **PHP 7.4** en la carpeta de **laragon/bin/php**
- Copiar o renombrar el archivo **php.ini-development** a **php.ini**
- Agregar la ruta de **PHP 7.4** a las variables de entorno
- Ejecutar Laragon
  - Selecionar la versión **PHP 7.4**
- Instalar [Composer](https://getcomposer.org/)
- Clonar el proyecto **evalproject** en el directorio de laragon **/www/evalproject**
- Copiar el archivo **.env.example** y renombrarlo a **.env**
  - Cambiar el valor de la variable **DB_DATABASE** por **evalproject**
- En el directorio raiz del proyecto abrir una terminal y ejecutar **composer install**
- Una vez se hayan instalado todas las dependencias, ejecutar **php artisan key:generate**
- Iniciar los servicios en Laragon (*Botón Iniciar Todo*)
- Crear una base de datos llamada **evalproject**
- En la terminal, ejecutar **php artisan migrate --seed** para crear las tablas
- En el navegador, ingresar la ruta **evalproject.test**
