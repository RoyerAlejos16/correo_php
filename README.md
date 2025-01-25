# Proyecto de Envío de Correos PHP

Este proyecto consiste en un sistema sencillo de envío de correos electrónicos usando PHP. Permite a los usuarios enviar correos electrónicos con texto y archivos adjuntos de una manera sencilla. El proyecto se ha desarrollado en tres versiones para facilitar la implementación y uso.

## Características del Proyecto

- Envío de correos electrónicos con contenido HTML.
- Envío de correos electrónicos con archivos adjuntos.
- Interfaz de usuario sencilla para enviar correos.
- Usabilidad en diversas versiones: sin CSS, con Tailwind CSS y con capacidad para múltiples archivos adjuntos.

## Estructura del Proyecto

Este proyecto tiene varias versiones que han sido desarrolladas para adaptarse a diferentes necesidades. A continuación se describen las tres versiones de los archivos.

### 1. **Versión Básica (Sin CSS)**

La primera versión es un formulario básico en HTML que permite a los usuarios ingresar su nombre, correo electrónico, asunto, mensaje y archivos adjuntos.

- **Archivos:**
  - `index.php`: Contiene el formulario básico sin estilos CSS.
  - `enviar_correo.php`: Procesa el envío del correo electrónico.

### 2. **Versión con Tailwind CSS**

En la segunda versión se ha añadido **Tailwind CSS** para mejorar el diseño y la estética de la página. Esta versión incluye estilos para hacer que el formulario sea más atractivo y fácil de usar.

- **Archivos:**
  - `index.php`: Contiene el formulario estilizado con Tailwind CSS.
  - `enviar_correo.php`: Procesa el envío del correo electrónico, al igual que la versión básica.
  
### 3. **Versión con Envío de Archivos Múltiples**

La tercera versión permite el envío de múltiples archivos adjuntos mediante un campo de entrada para archivos que permite seleccionar varios archivos a la vez.

- **Archivos:**
  - `index.php`: Contiene el formulario de envío con capacidad para seleccionar múltiples archivos adjuntos.
  - `enviar_correo.php`: Procesa el envío del correo electrónico y adjunta los archivos seleccionados.

## Requisitos

Para que el sistema funcione correctamente, es necesario tener un servidor con PHP y un servicio de correo SMTP configurado. Asegúrate de tener configurado un servidor de correo (como Gmail, SendGrid, Mailgun, etc.) para enviar los correos electrónicos.

## Instalación

1. Clona el repositorio en tu servidor local:

   ```bash
   git clone https://github.com/RoyerAlejos16/correo_php.git
