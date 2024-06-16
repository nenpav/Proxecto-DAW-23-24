# FASE DE CODIFICACIÓN E PROBAS

- [FASE DE CODIFICACIÓN E PROBAS](#fase-de-codificación-e-probas)
  - [1- Codificación](#1--codificación)
  - [2- Prototipos](#2--prototipos)
  - [3- Innovación](#3--innovación)
  - [4- Probas](#4--probas)

> Este documento explica como se debe realizar a fase de codificación e probas.

## 1- Codificación

1. En un inicio se optó por usar una etiqueta canvas para el lienzo de dibujo de la aplicación pero presentaba problemas de accesibilidad. Para solucionar esto, se optó
por el uso de una etiqueta svg que permite realizar las mismas operaciones pero con una mayor accesibilidad para el usuario.

2. Problema al generar los elementos "rect" de forma dinámica. Se creaban correctamente pero no se visualizaban en el lienzo. Tras depurar las funciones se comprobó que
al copiar un elemento directamente en el html, este se visualizaba correctamente. El bug se resolvió cambiando la función de JS para crear el elemento, cambiando la función
createElement() por la de createElementNS().

3. Se intentó usar la librería de php imagine-svg para convertir el svg en una imagen, utilizando el gestor de dependencias Composer. Sin embargo, tras problemas con uno de
los módulos que no funcionaban y al no encontrar solución al problema, se optó por desechar esta forma y guardar directamente el fichero en su formato. 

4. Problema con el formato al crear el JSON resultante de la consulta a través de PHP. Se solucionó controlando si se obtenía un registro o varios para convertirlo en un Array y posteriormente poder ser manejado con un map.

5. Se añade el control de si el usuario ya tiene una imagen de avatar, al subir una nueva, se borre la anterior y se modifiquen los datos del avatar en la base de datos.


## 2- Prototipos

El prototipo se realiza mediante la Aplicación de Figma.

## 3- Innovación

Para la programación del POV se utilizó el lenguaje C++ que no formaba parte del temario del Ciclo. Para aprender lo básico y necesario para poder usarlo se procedió a la descarga de un manual con la sintaxis y la semántica del lenguaje. 
Por otra parte, el propio montaje del dispositivo también implicó investigación y aprendizaje de nocios de electrónica y microcontroladores a un nivel básico que permitiese entender su funcionamiento, su capacidad y sus limitaciones que permitiesen usarlos para el dispositivo. 
Esta fase fue la que implicó un mayor número de cambios y de pruebas, sobre todo en el prototipo del dispositivo. 

## 4- Probas

Se realizaron tanto pruebas unitarias como integrales para comprobar que la aplicación funcionaba correctamente y tratar de encontrar y solucionar los bugs que pudiesen aparecer.
Algunos de los resultados obtenidos implicaron el cambio de la lógica de la función o bien añadir nuevos controles. 

1- Pruebas en validaciones
   - Bug al validar la contraseña en el formulario de registro, dando siempre que es un valor incorrecto. Se arregló cambiando la regex que no era correcta.
   - Faltaba el control del input date en el formulario de registro.

2- Cambiar el color del error de la modal de guardar el diseño. 
  - El color rojo de las letras con el fondo violeta provocaban un error de contraste en cuanto a accesibilidad por lo que se cambió el color del texto por el blanco.

3- Al guardar un diseño en svg se guarda como un Object SVG por lo que no se puede visualizar correctamente. Se solucionó transformado el SVG a string para posteriormente ser mandado en un input hidden y guardar el fichero en el directorio del servidor.

4- Bug en la pantalla de dibujo. Si se desactiva el modo animación y el range no está en la posición 0. Se solució cambiando el value del input range al desactivar el modo animación.

5-El svg se guarda aunque no se ponga un nombre por un fallo en la lógica del control. Se solucionó con un nuevo diseño del control.

En la parte de front se realizaron diferentes cambios en el css para mejorar el diseño final de la aplicación.
