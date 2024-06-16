# FASE DE IMPLANTACIÓN

- [FASE DE IMPLANTACIÓN](#fase-de-implantación)
  - [1- Manual técnico](#1--manual-técnico)
    - [1.1- Instalación](#11--instalación)
    - [1.2- Administración do sistema](#12--administración-do-sistema)
  - [2- Manual de usuario](#2--manual-de-usuario)
  - [3- Melloras futuras](#3--melloras-futuras)

## 1- Manual técnico

### 1.1- Instalación

Para acceder a la aplicación se debe poner en el navegador la siguiente url: [url de Roled](https://144.91.105.157). Una vez se ha ingresado en la aplicación, hay que registrarse o iniciar sesión para poder usar la aplicación. También se puede usar el usuario de pruebas:
  - usernme: user123
  - contraseña: aA1.aaaa

Para poder poner en marcha la aplicación en un entorno local se necesita:

1. Instalar XAMPP
2. Ejecutar el script Roled/src/scriptsBBDD/creacion.sql
3. Acceder desde el navegador mediante localhost/Roled/ Para un correcto funcionamiento, verificar que la carpeta raíz del proyecto es Roled de forma que en el navegador al abrir el localhost, la url que aparezca sea esta: http://localhost/Roled/.

### 1.2- Administración do sistema

Para un correcto mantenimiento de la aplicación será necesario realizar un mantenimiento básico en el sistema:
  - Copias de seguridad de la base de datos para poder retornarla a un estado estable en caso de incidencias. Se hará mediante copias incrementales para reducir la necesidad de almacenamieto.
  - Gestión de los usuarios por si ocurre alguna incidencia o para restringir su uso en caso de inclumplir las condiciones de uso por parte de los usuarios con el rol de administrador.
  - Gestión de la seguridad para mantener a salvo los datos de los usuarios y prevenir el ataque malicioso a la aplicación. Para esta parte, se contará con el asesoramiento de expertos en materia de ciberseguridad para analizar cuáles son las mejores medidas para mantener la web segura.
  - Finalmente, será necesaria la gestión de incidencias, tanto en base de datos y en la aplicación como en el dispositivo POV, el cual tiene un servicio de mantenimiento gratuito para usuarios pero de pago para las empresas.

## 2- Manual de usuario

El uso de la aplicación web es muy sencillo e intuitivo. Lo que puede suponer un mayor problema es la configuración y el uso del dispositivo POV pero, como aún se está prototipando y no se conoce cuál será su resultado ni la forma final de comunicarse con la web, este manual todavía no puede ser confeccionado. 

## 3- Melloras futuras

El proyecto Roled abre un abanico de posibilidades y de mejoras a medio y largo plazo que podrían mejorar notablemente el producto:
- Implementación de las funcionalidades que, por tiempo, solo serán incluidas en el prototipo de Figma.
- Añadir una IA que cree diseños que estén específicamente optimizados para ser visualizados holográficamente, mediante una breve descripción de lo que el usuario necesita. 
- Ofrecer una experiencia totalmente personalizada, de forma que cada dispositivo perifético POV tenga un tamaño y unas características totalmente personalizadas y adaptadas a las necesidades de cada usuario. Esto encarecería el producto pero añadiría un gran valor al proyecto pudiendo expandirse notablemente en el ámbito empresarial.
- Mejora de las herramientas de dibujo que presenta el primer prototipo de la aplicación así como mejora de las herramientas de creación de animaciones. 
- Mejorar la comunicación de los usuarios permitiendo el envío de mensajes privados, añadir comentario en los diseños de otros usuarios, con el fin de mejorar la comunidad de usuarios de Roled. 
- Proyección de vídeos en stream de forma holográfica.