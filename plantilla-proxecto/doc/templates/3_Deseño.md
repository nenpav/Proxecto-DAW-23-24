# FASE DE DESEÑO

- [FASE DE DESEÑO](#fase-de-deseño)
  - [1- Diagrama de arquitectura](#1--diagrama-de-arquitectura)
  - [2- Casos de uso](#2--casos-de-uso)
  - [3- Diagrama de Base de Datos](#3--diagrama-de-base-de-datos)
  - [4- Diseño de interfaz de usuarios](#4--diseño-de-interfaz-de-usuarios)


## 1- Diagrama de arquitectura

La siguiente imagen muestra los diagramas de despliegue y componentes que permiten ver como se conectan cada una de las partes que forman parte de la aplicación.

![Diagrama de componentes y despliegue](../img/despliegue.PNG)

Como se puede ver consta de tres nodos:
- El dispositivo con el cliente que visualiza la aplicación. 
- El servidor web de Xampp que contiene un servidor Apache, el lenguaje PHP que se usa para el backend, la base de datos MySQL con el phpMyAdmin y la propia aplicación alojada.
- El periférico POV.

## 2- Casos de uso

Para una mejor comprensión de las funcionalidades de la aplicación se dividieron en tres partes, gestión de usuarios, compras y gestión administrativa con un diagrama de casos de uso para cada una de esas partes.

![Gestión de usuarios](../img/casosDeUso1.PNG)

![Compras](../img/casosUso2.PNG)

![Administracion](../img/casosDeUso3.PNG)

## 3- Diagrama de Base de Datos

Para representar el diseño de la base de datos se realizaró el diagrama entidad-relación.

![Entidad-relacion](../img/entidad-relacion.PNG)

Del diagrama anterior se realizó su correspondiente modelo relacional:

![Relacional de Usuarios](../img/relacional_usu.PNG)

![Relacional de diseños](../img/relacional_design.PNG)

![Relacional de dispositivos](../img/relacional_disp.PNG)


## 4- Diseño de interfaz de usuarios

Dado que el diseño de la interfaz de usuario ya estaba más avanzado, se realizó un prototipo en vez de mockups. 