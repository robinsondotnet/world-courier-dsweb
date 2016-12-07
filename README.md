# Proyecto Final de Desarrollo de Soluciones Web

En nuestro proyecto hemos escodigo como tema un sistema web para una empresa Courier que llamaremos __World Courier__

## Integrantes

* Robinson Kent Villegas Rojas
* Pablo Madrid
* Roberto Reyna Rios

### World Courier

Es un servicio de entrega puerta a puerta segura, rápida, confiable con un cubrimiento de más de doce (12) distritos de la ciudad de Lima Metropolitana y en el extranjero. Garantizando un tiempo record en cada entrega.

### Definición Mision del Sitio

Se pretende hacer un sistema online donde cada usuario pueda programar recojo y envío de su paquete, además de consultar el estado de su envío en tránsito. Por otro lado la consulta de precios y tarifas también podrán solicitarla de forma online

### TRANSACCIONES :

1) Administrador

* Tiene acceso a los mantenimientos de las tablas

2) Empleado

* Ingresar envios

* Actualizar informacion

* Generar reportes

3) Cliente

* Registrarse

* Solicitar precios

* Coordinar recojo

### FORMULARIOS DEL SISTEMA

a) Registro de cliente

b) Login

c) Consulta de tarifa

d) Solicitud de recojo

e) Reportes

f) Generacion de pedidos

### Arquitectura

* public/ *(Esta es la carpeta de la ruta que servira nuestro sitio web.)*
	* assets/ *(Aca pondremos los archivos estaticos como js, css e imagenes)*
	* index.php *(Este archivo controlara las peticiones http y nos los enlazara con nuestro archivo src/routes.php)*
* src/
	* dependencies.php
	* middleware.php
	* routes.php *__(En este archivo maneja las peticiones que hacemos en nuestro sitio web. Aqui escribiremos la logica de nuestra aplicacion.)__*
	* settings.php
* templates/	
	* login.phtml *(Plantilla de nuestra pagina de Inicio de Sesión)*
	* index.phtml *(Plantilla de nuestra pagina principal del Sistema)*
	

#### Requerimientos

[PHP](http://windows.php.net/) >= 5.4

[MariaDB](https://mariadb.org/download/) *(Alternativa a Mysql)*

*Se puede bajar el stack [WAMP](http://www.wampserver.com/en/#download-wrapper) que contiene PHP,Mysql y PhpMyAdmin*

[Composer](https://getcomposer.org/download/) *(Lo necesitamos tener instalado en la variable %PATH% del sistema. Se configura por defecto con el instalador de Windows)*

#### Slim Framework PHP
En nuestro proyecto usaremos [este micro framework](http://www.slimframework.com/) que nos da muchas utilidades para escribir aplicaciones web de una forma simple y muy escalable.

#### EloquentORM
Utilizaremos [EloquentORM](https://laravel.com/docs/5.3/eloquent) que es un ORM *(Object Relational Mapper)* de Base de datos.
Esto nos ayudara a abstraer la base de datos y manejar los datos como si fueran objetos.

#### PlatesPHP
Utilizaremos tambien este [motor de plantillas](http://platesphp.com/) que nos permitira separar la vista (HTML) de la lógica.
La extensión que utiliza es .phtml pero este archivo se escribe como si fuera un archivo php puro sin necesidad de aprenderse otra sintaxis.

### Correr la aplicación con los siguientes comandos:
Para instalar las dependencias ejecutamos:

	composer install

Para levantar la aplicacion ejecutamos(Este comando se encuentra definido en el archivo [composer.json](https://github.com/robinsondotnet/world-courier-dsweb/blob/master/composer.json#L29)):

	composer start
		
