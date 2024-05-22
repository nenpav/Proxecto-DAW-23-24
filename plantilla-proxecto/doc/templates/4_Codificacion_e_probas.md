# FASE DE CODIFICACIÓN E PROBAS

- [FASE DE CODIFICACIÓN E PROBAS](#fase-de-codificación-e-probas)
  - [1- Codificación](#1--codificación)
  - [2- Prototipos](#2--prototipos)
  - [3- Innovación](#3--innovación)
  - [4- Probas](#4--probas)

> Este documento explica como se debe realizar a fase de codificación e probas.

## 1- Codificación

> Crea unha carpeta no teu repositorio e sube o código frecuentemente.
>
> Mentres se vai codificando a aplicación, iranse atopando problemas e haberá que ir modificando aspectos do deseño. Estes cambios tamén se deben recoller na documentación.

1- En un inicio se optó por usar una etiqueta canvas para el lienzo de dibujo de la aplicación pero presentaba problemas de accesibilidad. Para solucionar esto, se optó
por el uso de una etiqueta svg que permite realizar las mismas operaciones pero con una mayor accesibilidad para el usuario.

2- Problema al generar los elementos "rect" de forma dinámica. Se creaban correctamente pero no se visualizaban en el lienzo. Tras depurar las funciones se comprobó que
al copiar un elemento directamente en el html, este se visualizaba correctamente. El bug se resolvió cambiando la función de JS para crear el elemento, cambiando la función
createElement() por la de createElementNS().

3- Se intentó usar la librería de php imagine-svg para convertir el svg en una imagen, utilizando el gestor de dependencias Composer. Sin embargo, tras problemas con uno de
los módulos que no funcionaban y al no encontrar solución al problema, se optó por desechar esta forma y guardar directamente el fichero en su formato. 
## 2- Prototipos



## 3- Innovación



## 4- Probas

Deben describirse as probas realizadas e conclusión obtidas. Describir os problemas atopados e como foron solucionados.

Js: 
1- Pruebas en validaciones
  Bug al validar la contraseña en el formulario de registro, dando siempre que es un valor incorrecto. 

2- Cambiar el color del error de la modal de guardar el diseño. No se lee bien.