<center><img src="public/img/logo-jobsapp.png"></img></center> 

``v1.0.0``




## **Información General**

Jobs**APP** es una aplicación web desarrollada en [_**Laravel 9**_](https://laravel.com/docs/9.x) con el fin de mostrar algunas de las capacidades de este _Framework_, utilizando **MVC** (Modelo Vista Controlador), realizando _**CRUD**_ en una base de datos _SQL_, utilizando autenticación por medio de Breeze, componentes con [_**livewire**_](https://laravel-livewire.com/docs/2.x/installation), alertas personalizadas con [_**SweetAlert2**_](https://sweetalert2.github.io/), manteneniendo una sesión, enviando Emails de verificación y de confirmación, notificaciones etc. Los estilos de la aplicación fueron realizados por medio de [**Tailwind CSS**](https://tailwindcss.com/docs/installation), uno de los frameworks de CSS mas populares. Esta aplicación web cuenta con algunas funcionalidades presentes en algunas páginas de ofertas de empleo tales como:

<br>

* **Registro de Usuario:** Almacena la información en una base de datos _SQL_, encriptando la contraseña con un _hash_ de una sola vía, en el registro se escoge entre 2 tipos de roles (Empleado o Reclutador).

* **Inicio de Sesión:** Valida que las credenciales ingresadas coincidan con algun registro de la base de datos y manteniene la sesión.

* **Publicar Vacantes:** Los usuarios con rol Reclutador podrán realizar la publicación de vacantes para que puedan postular los usuarios con rol Empleado. Ademas podrán editar o eliminar sus vacantes.

* **Notificaciones:** Cuando un Empleado postule a una oferta, el Reclutador recibirá una notificación via Email y en el panel de notificaciones de la aplicación.

* **Buscar una Vacante:** Los usuarios con rol Empleado podrán postular a las vacantes que se encuentran listadas en la pagina principal y hacer sus propias busquedas con filtros.

* **Postular a una vacante:** Los usuarios con rol empleado podrán postular a las vacantes adjuntando su hoja de vida (CV).

---
<br>

## **Ambientación**
<br>

1. Clonar repositorio.

2. Abrir repositorio en _CMD, Powershell_ o _Consola de comandos_ e installar las dependecias de 
[**_Composer_**](https://getcomposer.org/doc/).
```
    composer install
```
3. Instalar las dependecias de [**_Node.JS_**](https://nodejs.org/es/docs/).
```
    npm install
```

4. Clonar el archivo ``.env.example`` y renombar por ``.env``.

5. Configurar las variables de entorno en el archivo ``.env``.

6. Instalar e iniciar los servicios de base de datos y el servidor apache incluidos en [**XAMP(v8.1.12)**](https://www.apachefriends.org/download.html).

7. Ejecutar las migraciones para crear tablas (_En desarrollo_).
```
    php artisan migrate
```

7. Ejecutar los seeders para llenar las tablas de salarios y categorias (_En desarrollo_).
```
    php artisan db:seed
```

8. Levantar servidor local.
```
    php artisan serve
```