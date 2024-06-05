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

4- Problema con el formato al crear el JSON resultante de la consulta a través de PHP. Se solucionó controlando si se obtenía un registro o varios para convertirlo en un Array y posteriormente poder ser manejado con un map.

5- Se añade el control de si el usuario ya tiene una imagen de avatar, al subir una nueva, se borre la anterior y se modifiquen los datos del avatar en la base de datos.


## 2- Prototipos

El prototipo se realiza mediante la Aplicación de Figma.

## 3- Innovación

++++++++++++++++++++++++++++++++++++++++++++
Pendiente de ver qué pasa con el POV.

## 4- Probas

Deben describirse as probas realizadas e conclusión obtidas. Describir os problemas atopados e como foron solucionados.

1- Pruebas en validaciones
  Bug al validar la contraseña en el formulario de registro, dando siempre que es un valor incorrecto. 

2- Cambiar el color del error de la modal de guardar el diseño. No se lee bien.

3- Al guardar un diseño en svg se guarda como un Object SVG por lo que no se puede visualizar correctamente. Se solucionó transformado el SVG a string para posteriormente ser mandado en un input hidden y guardar el fichero en el directorio del servidor.

4- Bug en la pantalla de dibujo. Si se desactiva el modo animación y el range no está en la posición 0, se bloquea en la posición en la que esté y el lienzo no se ve