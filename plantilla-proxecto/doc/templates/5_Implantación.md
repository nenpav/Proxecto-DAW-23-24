# FASE DE IMPLANTACIÓN

- [FASE DE IMPLANTACIÓN](#fase-de-implantación)
  - [1- Manual técnico](#1--manual-técnico)
    - [1.1- Instalación](#11--instalación)
    - [1.2- Administración do sistema](#12--administración-do-sistema)
  - [2- Manual de usuario](#2--manual-de-usuario)
  - [3- Melloras futuras](#3--melloras-futuras)

## 1- Manual técnico

### 1.1- Instalación

Todo el código fuente y directorios que son necesarios para el funcionamiento de la aplicación están en el directorio Roled.

Para poder poner en marcha la aplicación en un entorno local se necesita:

1. Instalar XAMPP
2. Ejecutar el script Roled/src/scriptsBBDD/creacion.sql en el phpMyAdmin
3. Ejecutar el script Roled/src/scriptsBBDD/insercion.sql en el phpMyAdmin
4. Acceder desde el navegador mediante localhost/Roled/
5. Iniciar sesión con el usuario de pruebas: user123 y contraseña: aA1.aaaa o bien crear un nuevo usuario.

Para un correcto funcionamiento, verificar que la carpeta raíz del proyecto es el directorio Roled de forma que en el navegador al abrir el localhost, la url que aparezca sea esta: http://localhost/Roled/. En caso de no hacer esto correctamente, habrá errores a la hora de listar los diseños mediante ajax. 

Para acceder a la aplicación en el servidor web, ingresar en el navegador esta url: https://144.91.105.157.
Aceptar el riesgo de seguridad ya que, aunque tiene acceso ssl, como no ha sido el certificado firmado por una entidad certificadora oficial, indica que el certificado no es válido. En este caso no es necesario realizar ningún paso más ya que el servidor web contiene todo lo necesario para usar la aplicación.

### 1.2- Administración do sistema

Para un correcto mantenimiento de la aplicación será necesario realizar un mantenimiento básico en el sistema:
  - Copias de seguridad de la base de datos para poder retornarla a un estado estable en caso de incidencias. Se hará mediante copias incrementales para reducir la necesidad de almacenamieto.
  - Gestión de los usuarios por si ocurre alguna incidencia o para restringir su uso en caso de inclumplir las condiciones de uso por parte de los usuarios con el rol de administrador.
  - Gestión de la seguridad para mantener a salvo los datos de los usuarios y prevenir el ataque malicioso a la aplicación. Para esta parte, se contará con el asesoramiento de expertos en materia de ciberseguridad para analizar cuáles son las mejores medidas para mantener la web segura.
  - Finalmente, será necesaria la gestión de incidencias, tanto en base de datos y en la aplicación como en el dispositivo POV, el cual tiene un servicio de mantenimiento gratuito para usuarios pero de pago para las empresas.

## 2- Manual de usuario

El uso de la aplicación web es muy sencillo e intuitivo. Lo que puede suponer un mayor problema es la configuración y el uso del dispositivo POV pero, como aún se está prototipando y no se conoce cuál será su resultado ni la forma final de comunicarse con la web, este manual todavía no puede ser confeccionado. 
Sin embargo, es necesario puntualizar ciertos aspectos:
- Está deshabilitado el botón de comprar del index, así como todos los botones de proyectar. También está deshabilitada la opción de guardar animaciones ya que se incluirá como mejora futura (pero puede verse el proceso de creación de estas).
- Seguir las indicaciones del title de los inputs de los formularios para ver los requisitos de cada uno de ellos.
- Solamente se aceptan los formatos jpeg y png para los avatares de usuario.
- No es necesario indicar la extensión al guardar los diseños ya que esta siempre será svg.
- Si el registro de usuario se realizó correctamente, se redigirá automáticamente a la modal del login. En caso de error, lo indicará.

## 3- Melloras futuras

El proyecto Roled abre un abanico de posibilidades y de mejoras a medio y largo plazo que podrían mejorar notablemente el producto:
- Implementación de las funcionalidades que, por tiempo, solo serán incluidas en el prototipo de Figma.
- Añadir una IA que cree diseños que estén específicamente optimizados para ser visualizados holográficamente, mediante una breve descripción de lo que el usuario necesita. 
- Ofrecer una experiencia totalmente personalizada, de forma que cada dispositivo perifético POV tenga un tamaño y unas características totalmente personalizadas y adaptadas a las necesidades de cada usuario. Esto encarecería el producto pero añadiría un gran valor al proyecto pudiendo expandirse notablemente en el ámbito empresarial.
- Mejora de las herramientas de dibujo que presenta el primer prototipo de la aplicación así como mejora de las herramientas de creación de animaciones. 
- Mejorar la comunicación de los usuarios permitiendo el envío de mensajes privados, añadir comentario en los diseños de otros usuarios, con el fin de mejorar la comunidad de usuarios de Roled. 
- Proyección de vídeos en stream de forma holográfica.