# Gestión de Productos en Symfony

Este es un proyecto de gestión de productos desarrollado con Symfony. El objetivo es permitir a los usuarios gestionar productos, incluyendo la creación, edición y eliminación de productos, con validaciones en el frontend y backend.

## Funcionalidades

- **CRUD de Productos**: Crear, leer, actualizar y eliminar productos.
- **Validaciones**: Validaciones de campos en el formulario, como longitud de texto, precio mayor a cero, y stock no negativo.
- **Mensajes Flash**: Mensajes de éxito y error para informar al usuario sobre el estado de las acciones realizadas.
- **Testing**: Mensajes de éxito y error para informar al usuario sobre el estado de las acciones realizadas.

## Requisitos

Este proyecto está basado en Symfony y requiere las siguientes herramientas para funcionar correctamente:

- **PHP** (>= 8.1)
- **Symfony** (>= 6.x)
- **Doctrine ORM** (para la gestión de base de datos)
- **MySQL** (o cualquier base de datos compatible con Doctrine)
- **Composer** (para la gestión de dependencias)
  
## Instalación

### Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/gestion-productos.git
cd gestion-productos

Instalación de dependencias
Este proyecto utiliza Composer para gestionar las dependencias de PHP. Para instalar las dependencias del proyecto, ejecuta el siguiente comando:

composer install
Configuración de la base de datos
Configura tu base de datos. Asegúrate de tener una base de datos MySQL (o compatible) configurada y actualiza el archivo .env o .env.local con los datos correctos de tu base de datos.

DATABASE_URL="mysql://usuario:contraseña@127.0.0.1:3306/gestion_productos"
Crea la base de datos si aún no existe:

php bin/console doctrine:database:create
Ejecuta las migraciones para crear las tablas en la base de datos:


php bin/console doctrine:migrations:migrate
Ejecutar el servidor de desarrollo
Para ejecutar el servidor de desarrollo de Symfony, usa el siguiente comando:


php bin/console server:run
Esto iniciará un servidor local en http://127.0.0.1:8000.

Estructura del Proyecto
A continuación se describe brevemente la estructura de directorios de este proyecto:

csharp
Copiar código
.
├── assets/                # Archivos estáticos (CSS, JS, imágenes)
├── config/                # Archivos de configuración de Symfony
├── public/                # Carpeta pública (punto de entrada del servidor)
├── src/                   # Código fuente del proyecto (controladores, entidades, etc.)
├── templates/             # Plantillas Twig (vistas del proyecto)
├── tests/                 # Archivos de pruebas (tests)
├── translations/          # Archivos de traducciones
├── var/                   # Archivos temporales (logs, caché)
├── vendor/                # Dependencias de Composer
├── .env                   # Variables de entorno
├── composer.json          # Archivo de configuración de Composer
├── symfony.lock           # Bloqueo de las dependencias de Symfony
└── README.md              # Este archivo

Cómo Contribuir
Si deseas contribuir a este proyecto, por favor sigue estos pasos:
Haz un fork de este repositorio.
Crea una nueva rama para tu característica o corrección.
Realiza tus cambios y asegúrate de que el código pase todas las pruebas.
Envía un pull request con una descripción detallada de tus cambios.

Pruebas
Este proyecto utiliza PHPUnit y Cypress para las pruebas. Para ejecutar las pruebas, utiliza el siguiente comando:
Para Phpunit: php vendor/bin/phpunit
Para Cypress: npx cypress open



Licencia
Este proyecto está licenciado bajo la MIT License. Consulta el archivo LICENSE para más detalles.


---

### Explicación de los apartados:

1. **Descripción del proyecto**: Proporciona una visión general sobre qué hace el proyecto y cuáles son sus funcionalidades principales.
2. **Requisitos**: Describe las herramientas necesarias para ejecutar el proyecto, como la versión de PHP, Symfony, Composer, y la base de datos.
3. **Instalación**: Instrucciones paso a paso sobre cómo clonar el repositorio, instalar las dependencias, configurar la base de datos y ejecutar el servidor local.
4. **Estructura del proyecto**: Muestra la estructura básica de los archivos y carpetas del proyecto.
5. **Cómo contribuir**: Guía para cualquier persona interesada en contribuir al proyecto, incluyendo cómo hacer un fork, crear una rama, y enviar un pull request.
6. **Pruebas**: Cómo ejecutar las pruebas para asegurarte de que todo funcione correctamente.
7. **Licencia**: Información sobre la licencia del proyecto.

