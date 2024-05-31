# Requerimientos do sistema

- [Requerimientos del sistema](#requerimientos-del-sistema)
  - [1- Descripción General](#1--descripción-general)
  - [2- Funcionalidades](#2--funcionalidades)
  - [3- Tipos de usuarios](#3--tipos-de-usuarios)
  - [4- Contorno operacional](#4--contorno-operacional)
  - [5- Normativa](#5--normativa)
  - [6- Mejoras futuras](#6--mejoras-futuras)

## 1- Descripción General

La aplicación web desarrollada para la parte técnica del proyecto permite la subida y la creación de dibujos que, tras ser tratadas y convertidas a un formato correcto, son enviadas a un periférico que proyecta esas imágenes de forma holográfica. Esta aplicación web funciona como un software de diseño con herramientas básicas de dibujo que permite al usuario crear sus propios diseños para ser posteriormente proyectados, así como la creación de animaciones sencillas basadas en fotogramas. 
Los usuarios podrán crear y editar sus diseños, ver y usar los diseños de la comunidad y proyectarlos en la pantalla POV que también podrán adquirir en la aplicación.

## 2- Funcionalidades

La siguiente tabla muestra todas las funcionalidades de las que dispone la aplicación web de Roled, con una breve descripción y qué usuarios tienen permiso para realizarlas. Algunas de las funcionalidades no serán implementadas en este proyeto, pero su funcionamiento será prototipado.

| Acción                          |  Descripción                                           |   Usuario permitidos           |
|---------------------------------|--------------------------------------------------------|--------------------------------|
| Registro en la app              | Hacer el formulario de registro                        | Todos                          |
| Inicio de sesión                | Autenticarnos en la aplicación e iniciar sesión        | Todos                          |
| Cerrar la sesión                | Cerrar la sesión en la aplicación                      | Todos                          |
| Crear un nuevo diseño           | Crear diseños con las herramientas de dibujo           | Todos                          |
| Borrar un diseño                | Eliminar un diseño                                     | Propietario y administrador    |
| Editar un diseño                | Editar   un diseño                                     | Propietario y administrador    |
| Publicar un nuevo diseño        | Hacer que el diseño sea visible para la comunidad      | Todos                          |
| Enviar un diseño al periférico  | Enviar un diseño para ser proyectado por el periférico | Todos                          |
| Ver los diseños propios         | Listar los diseños del propio usuario                  | Todos                          |
| Ver diseños de otro usuarios    | Listar los diseños de otro usuario                     | Todos                          |
| Visitar la Comunidad            | Lista de todos los diseños de todos los usuarios       | Todos                          |
| Valorar un diseño               | Valorar el diseño de otro usuario                      | Todos                          |
| Eliminar un usuario             | Eliminar aun usuario de la BBDD                        | Administrador                  |
| Bloquear un usuario             | Bloquear el acceso a un usuario                        | Administrador                  |
| Arreglo de incidencias          | Arreglo de las incidencias de los usuarios             | Administrador                  |
| Añadir funcionalidad            | Añadir funcionalidades nuevas a la app                 | Administrador                  |
| Comprar el periférico POV       | Comprar el periférico desde la aplicación              | Todos                          |
| Ver contenido extra             | Ver el contenido adicional de pago                     | Suscriptores y creadores       |

## 3- Tipos de usuarios

En la aplicación web se implementará un sistema de autenticación con el fin de definir los roles de cada uno de los usuarios y determinar qué permisos presentan estos dentro de la aplicación. Se pueden dividir en los siguientes roles:

**Usuario genérico**

Los usuarios genéricos conforman la mayor parte de los usuarios de la aplicación web. Estos no presentan permisos especiales ni pueden realizar tareas de administración ni mantenimiento. Pueden tener acceso a diferentes funcionalidades como realizar diseños, subirlos y proyectarlos en el periférico POV, utilizar los diseños de otros usuarios e interactuar con otros usuarios de la aplicación. 

**Usuario administrador**

Los usuarios administradores, como su nombre indican, son usuarios con permisos especiales que pueden realizar tareas de mantenimiento en la aplicación como el arreglo de incidencias, subir contenido o funcionalidades nuevas, etc.

**Usuario suscriptores con contenido exclusivo**

Una de las fuentes de ingreso del proyecto Roled es el contenido exclusivo de pago que no está disponible para los usuarios genéricos. Por este motivo, se crea el rol de usuario con contenido exclusivo que representa a todos aquellos usuarios que realicen el pago de contenido extra. Tienen acceso a todas las funcionalidades que presentan los usuarios genéricos.

**Creadores**

Aquellos usuarios que superen un número determinado de diseños cobn una valoración alta por parte de la comunidad. Tendrán acceso al contenido de pago de los usuarios suscriptores sin la necesidad de pagar ese contenido extra. De esta forma, se pretende premiar a aquellos usuarios que dedican tiempo y esfuerzo a mejorar la aplicación y subir contenido a esta. 

## 4- Contorno operacional

Para poder usar la aplicación web de Roled será imprescindible un navegador web que soporte HTML5, para poder mostrar y utilizar todas las funcionalidades que esta ofrece. En caso de tener instalados navegadores más antiguos, el usuario puede ver afectada su experiencia en la aplicación. 
También será necesario tener una conexión a internet, bien sea por Wifi o cableada. 
Será totalmente necesario poseer el periférico POV de Roled para poder visualizar los diseños creados en la web de forma holográfica, por lo que el usuario debe comprar el periférico para una experiencia completa. No obstante, el uso de la aplicación web es gratuito y podrá realizar los diseños, aunque estos no puedan ser proyectados holográficamente. 

## 5- Normativa

Para poder cumplir con la normativa estatal y europea, es obligatorio cumplir con la siguientes normas:
- LOPDPGDD, legislación en materia de protección de datos a nivel estatal.
- GDP, legistlación en materia de protección de datos a nivel europeo.
- Certificado CE, referente a la calidad y seguridad.

Las dos primeras normas serán incluidas en el pie de la aplicación de forma que el usuario puede ver que Roled cumple la normativa en materia de protección de datos, cómo se almacena esta información, así como poder desestimar su consentimiento. Aparecerán como los siguientes enlaces:
- Aviso legal 
- Política de privacidad y de cookies
- Términos y condiciones de uso

La certificación CE será incluida en el dispositvo POV, como indica la certificación. 

## 6- Mejoras futuras

El proyecto Roled abre un abanico de posibilidades y de mejoras a medio y largo plazo que podrían mejorar notablemente el producto:
- Implementación de las funcionalidades que, por tiempo, solo serán incluidas en el prototipo de Figma.
- Añadir una IA que cree diseños que estén específicamente optimizados para ser visualizados holográficamente, mediante una breve descripción de lo que el usuario necesita. 
- Ofrecer una experiencia totalmente personalizada, de forma que cada dispositivo perifético POV tenga un tamaño y unas características totalmente personalizadas y adaptadas a las necesidades de cada usuario. Esto encarecería el producto pero añadiría un gran valor al proyecto pudiendo expandirse notablemente en el ámbito empresarial.
- Mejora de las herramientas de dibujo que presenta el primer prototipo de la aplicación así como mejora de las herramientas de creación de animaciones. 
- Mejorar la comunicación de los usuarios permitiendo el envío de mensajes privados, añadir comentario en los diseños de otros usuarios, con el fin de mejorar la comunidad de usuarios de Roled. 
- Proyección de vídeos en stream de forma holográfica.

