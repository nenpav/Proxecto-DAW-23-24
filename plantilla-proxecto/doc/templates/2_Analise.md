# Requerimientos do sistema

- [Requerimientos del sistema](#requerimientos-del-sistema)
  - [1- Descripción General](#1--descripción-general)
  - [2- Funcionalidades](#2--funcionalidades)
  - [3- Tipos de usuarios](#3--tipos-de-usuarios)
  - [4- Contorno operacional](#4--contorno-operacional)
  - [5- Normativa](#5--normativa)
  - [6- Mejoras futuras](#6--mejoras-futuras)

> *EXPLICACION*: Este documento describe os requirimentos para "nome do proxecto" especificando que funcionalidade ofrecerá e de que xeito.

## 1- Descripción General

El proyecto Roled consiste en una aplicación web que permite la subida y la creación de imágenes que, tras ser tratadas y convertidas a un formato correcto, son enviadas a un periférico que proyecta esas imágenes de forma holográfica. Este periférico consiste en una pantalla POV ("Persistence of vision") formado por una matriz de Leds que al girar a una velocidad determinada permiten que el ojo humano no sea capaz de distinguir cada uno de los leds por separado y los perciba como una imagen unificada que puede ser estática o una imagen en movimiento.
Esta aplicación web también funciona como un software de diseño con herramientas básicas de dibujo que permite al usuario crear sus propios diseños para ser posteriormente proyectados, así como la creación de animaciones sencillas basadas en fotogramas. 

Este tipo de productos son bastante populares en algunos países asiáticos como China, Japón o Corea, pero sus prototipos son de grandes dimensiones, convirtiéndolos en un producto muy costoso y poco práctico. Desde Roled, se pretende marcar la diferencia mediante un prototipo de "bolsillo", de pequeñas dimensiones y de un precio asequible que cualquiera pueda tener en su mesita de noche. Además, este va asociado a una aplicación web donde todos los usuarios pueden subir, crear y compartir sus diseños, pudiendo servir de plataforma para muchos artistas digitales que quieran dar a conocer su trabajo, a la vez que consigue que la experiencia del usuario sea más completa y creativa. 

El objetivo que se espera conseguir con el desarrollo de Roled es aumentar la oferta de aplicaciones que fomentan la creatividad, creando una aplicación que no solo aporte al usuario entretenimiento saludable y estimulante, sino que le permita formar parte de una comunidad de usuarios amigable y tolerante, aspectos muy difíciles de encontrar en Internet en la actualidad. Además, servirá de plataforma para que muchos artistas tengan visibilidad, pudiendo compartir sus proyectos de una forma muy atractiva y visual. 

El desarrollo del proyecto Roled, se puede separar en diferentes partes con unos requerimientos diferentes para cada una de ellas:

**Infraetructura del proyecto**

Para la base de datos, se usará una base de datos relacional, cuya gestión se realizará a través del SGBD MySQL de Oracle. Esta almacena los datos de los usuarios y las referencias de las imágenes subidas al servidor. 
Para el despliegue de la aplicación web se usará un servidor web de la empresa Contabo, con un sistema operativo Debian de cuatro núcleos, 8GB de memoria RAM y un disco SSD de 200GB con datos ilimitados. 

**Base de datos**

Para el amacenamiento de los datos de los usuarios. así como de los diseños de la comunidad, se usará una base de datos relacional, con el SGBS MySQL.
También se estima almacenar la matriz de píxeles de cada imagen que será enviada al periférico POV, con el fin de que no se tenga ue volver a calcular cada vez que se quiere reproducir la imagen. Esto dependerá de si se prioriza una base de datos más liviana o una mayor rapidez de procesamiento, lo cual se decidirá en la fase de codificación y pruebas. 

**API**

Para una comunicación más fluida entre el frontend y el backend se usará una API JSON que almacenará la referencia de las imágenes de la aplicación en la memoria. 

**Periférico POV**

- Para el diseño de las piezas que conforman el periférico se usa la aplicación "fusion360" de Autodesk, con su versión gratuita. 
- Para la elaboración de las piezas de plástico se utiliza una impresora 3D Tronxy XY2 PRO. 
- Para la elaboración del periférico, se usa una tira LED RGB direccionable WS2812B. 
- Un motor brushless trifásico reciclado de un disco HDD. 
- Como microcontrolador se usa un ESP32. Como lenguaje de programación para este microcontrolador C++.
- Un driver ESC de 10A para el motor anteriormente mencionado. 
- Un final de carrera óptico que permitirá contar las vueltas por minuto para la sincronización del motor con los Leds.
- Una fuente de alimentación por inducción de 2A (bobinas de transferencia de energía por inducción).

**Frontend**

Para el frontend de la aplicación web se usarán los lenguajes de etiquetas de HTML5 y CSS3. Como lenguaje de programación del frontend se usará JavaScript. 
Para la comunicación con la API del sistema, se usará JS o bien el framework JQuery. Se baraja la posibilidad de incluir alguna plantilla mediante Bootstrap, o el uso del framework Thymeleaf.
Debido a la utilización de las últimas versiones de HTML5 y CSS3, será necesario un navegador que soporte estas tecnologías para una correcta visualización de la aplicación web. 

**Backend**

Para el backend se usará el lenguaje de programación php o bien Java. No se ha decido el lenguaje a usar ya que depende de si se encuentra una librería que permita la integración de una IA en la aplicación web para php. No obtante, se usará el paradigma de POO para la realización del proyecto pudiendo adaptarlo fácilmente a uno de los dos lenguajes. En caso de usar Java, se usará Hibernate como ORM para llevar a cabo la persistencia de los datos mientras que, en caso de usar php, se usará la librería mysqli por objetos. Por lo tanto, aunque no está decido cual se usará finalmente, se ha pensado los requisitos y requerimientos de cada una de las opciones.  

## 2- Funcionalidades

La siguiente tabla muestra todas las funcionalidades de las que dispone la aplicación web de Roled, con una breve descripción y qué usuarios tienen permiso para realizarlas.

| Acción                          |  Descripción                                           |   Usuario permitidos           |
|---------------------------------|--------------------------------------------------------|--------------------------------|
| Registro en la app              | Hacer el formulario de registro                        | Todos menos los bloqueados     |
| Inicio de sesión                | Autenticarnos en la aplicación e iniciar sesión        | Todos menos los bloqueados     |
| Cerrar la sesión                | Cerrar la sesión en la aplicación                      | Todos menos los bloqueados     |
| Crear un nuevo diseño           | Crear diseños con las herramientas de dibujo           | Todos menos los bloqueados     |
| Borrar un diseño                | Eliminar un diseño                                     | Propietario y administrador    |
| Editar un diseño                | Eliminar un diseño                                     | Propietario y administrador    |
| Publicar un nuevo diseño        | Hacer que el diseño sea visible para la comunidad      | Todos menos los bloqueados     |
| Enviar un diseño al periférico  | Enviar un diseño para ser proyectado por el periférico | Todos menos los bloqueados     |
| Ver los diseños propios         | Listar los diseños del propio usuario                  | Todos menos los bloqueados     |
| Ver diseños de otro usuarios    | Listar los diseños de otro usuario                     | Todos menos los bloqueados     |
| Visitar la Comunidad            | Lista de todos los diseños de todos los usuarios       | Todos menos los bloqueados     |
| Valorar un diseño               | Valorar el diseño de otro usuario                      | Todos menos los bloqueados     |
| Eliminar un usuario             | Eliminar aun usuario de la BBDD                        | Administrador                  |
| Bloquear un usuario             | Bloquear el acceso a un usuario                        | Administrador                  |
| Arreglo de incidencias          | Arreglo de las incidencias de los usuarios             | Administrador                  |
| Añadir funcionalidad            | Añadir funcionalidades nuevas a la app                 | Administrador                  |
| Comprar el periférico POV       | Comprar el periférico desde la aplicación              | Todos menos los bloqueados     |
| Ver contenido extra             | Ver el contenido adicional de pago                     | VIP y creadores                |


## 3- Tipos de usuarios

En la aplicación web se implementará un sistema de autenticación con el fin de definir los roles de cada uno de los usuarios y determinar qué permisos presentan estos dentro de la aplicación. Se pueden dividir en los siguientes roles:

**Usuario genérico**

Los usuarios genéricos conforman la mayor parte de los usuarios de la aplicación web. Estos no presentan permisos especiales ni pueden realizar tareas de administración ni mantenimiento. Pueden tener acceso a diferentes funcionalidades como realizar diseños, subirlos y proyectarlos en el periférico POV, utilizar los diseños de otros usuarios e interactuar con otros usuarios de la aplicación. 

**Usuario administrador**

Los usuarios administradores, como su nombre indican, son usuarios con permisos especiales que pueden realizar tareas de mantenimiento en la aplicación como el arreglo de incidencias, subir contenido o funcionalidades nuevas, etc.
Debido a que el proyecto se encuentra en su fase inicial, los usuarios técnicos se engloban dentro del rol de usuarios administradores, por lo que también podrán cambiar el código de la aplicación web para arreglar posibles bugs o añadir mejoras. 

**Usuario suscriptores con contenido exclusivo**

Como se explicó en el apartado de financiación del Anteproyecto, una de las fuentes de ingreso del proyecto Roled es el contenido exclusivo de pago que no está disponible para los usuarios genéricos. Por este motivo, se crea el rol de usuario con contenido exclusivo que representa a todos aquellos usuarios que realicen el pago de contenido extra. Esta es la única diferencia que presentan con respecto a los usuarios genéricos y tienen acceso a todas las funcionalidades que presentan los usuarios genéricos.

**Usuarios bloqueados**

Todos los usuarios deben aceptar los términos y condiciones de uso de la aplicación de Roled, los cuales incluyen las situaciones bajo las que un usuario será bloqueado y pierde el derecho al acceso en la aplicación, incluidos los usuarios que hayan efectuado el pago por el contenido exclusivo. Debido a que existe un tiempo de alegaciones, las cuentas no son eliminadas en el momento del baneo, por lo que es necesario crear el rol de usuarios bloqueados para incluir todas esas cuentas que han perdido los derechos de uso en la aplicación. 

**Creadores**

Existe un último rol especial que representa a aquellos usuarios que superen un número determinado de diseños, los cuales deben ser compartidos al resto de usuarios, y, además, este usuario tenga una valoración alta por parte de la comunidad. Este tipo de usuarios tendrán acceso al contenido de pago de los usuarios suscriptores sin la necesidad de pagar ese contenido extra. De esta forma, se pretende premiar a aquellos usuarios que dedican tiempo y esfuerzo a mejorar la aplicación y subir contenido a esta. 

## 4- Contorno operacional

Para poder usar la aplicación web de Roled será imprescindible un navegador web que soporte HTML5, para poder mostrar y utilizar todas las funcionalidades que esta ofrece. En caso de tener instalados navegadores más antiguos, el usuario puede ver afectada su experiencia en la aplicación. 
También será necesario tener una conexión a internet, bien sea por Wifi o cableada. 
Será totalmente necesario poseer el periférico POV de Roled para poder visualizar los diseños creados en la web de forma holográfica, por lo que el usuario debe comprar el periférico para una experiencia completa. No obstante, el uso de la aplicación web es gratuito y podrá realizar los diseños, aunque estos no puedan ser proyectados holográficamente. 

## 5- Normativa

> *EXPLICACION* Investigarase que normativa vixente afecta ao desenvolvemento do proxecto e de que maneira. O proxecto debe adaptarse ás esixencias legais dos territorios onde vai operar.
> 
> Pola natureza dos sistema de información, unha lei que se vai a ter que mencionar de forma obrigatoria é la [Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales (LOPDPGDD)](https://www.boe.es/buscar/act.php?id=BOE-A-2018-16673). O ámbito da LOPDPGDD é nacional. Se a aplicación está pensada para operar a nivel europeo, tamén se debe facer referencia á [General Data Protection Regulation (GDPR)](https://eur-lex.europa.eu/eli/reg/2016/679/oj). Na documentación debe afirmarse que o proxecto cumpre coa normativa vixente.
>
> Para cumplir a LOPDPGDD e/ou GDPR debe ter un apartado na web onde se indique quen é a persoa responsable do tratamento dos datos e para que fins se van utilizar. Habitualmente esta información estructúrase nos seguintes apartados:
>
> - Aviso legal.
> - Política de privacidade.
> - Política de cookies.
>
> É acosenllable ver [exemplos de webs](https://www.spotify.com/es/legal/privacy-policy/) que conteñan textos legais referenciando a LOPDPGDD ou GDPR.



## 6- Mejoras futuras

El proyecto Roled abre un abanico de posibilidades y de mejoras a medio y largo plazo que podrían mejorar notablemente el producto:

- Añadir una IA que cree diseños que estén específicamente optimizados para ser visualizados holográficamente, mediante una breve descripción de lo que el usuario necesita. 
- Ofrecer una experiencia totalmente personalizada, de forma que cada dispositivo perifético POV tenga un tamaño y unas características totalmente personalizadas y adaptadas a las necesidades de cada usuario. Esto encarecería el producto pero añadiría un gran valor al proyecto pudiendo expandirse notablemente en el ámbito empresarial.
- Mejora de las herramientas de dibujo que presenta el primer prototipo de la aplicación así como mejora de las herramientas de creación de animaciones. 
- Mejorar la comunicación de los usuarios permitiendo el envío de mensajes privados, añadir comentario en los diseños de otros usuarios, con el fin de mejorar la comunidad de usuarios de Roled. 
- Proyección de vídeos en stream de forma holográfica.

