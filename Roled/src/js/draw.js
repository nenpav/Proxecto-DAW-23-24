 const $d2=document,
      $lienzo = $d2.querySelector("#svgLienzo"),
      $pintar = $d2.querySelector("#pintar"),
      $borrar = $d2.querySelector("#borrar"),
      $nombre = $d2.querySelector("#nombre"),
      $guardar = $d2.querySelector("#guardarConf"),
      $error = $d2.querySelector("#error"),
      $form = $d2.querySelector("#guardarSvg")


    //console.log($error)
    

const lienzo = 600,
    r = 250,
    pixel = 20, 
    longitud = lienzo / pixel

let pintar = true,
    borrar = false,
    pulsado = false

function mascaraCirculo(x, y, radio, size){
    const centro = size/2,
            dx = (x+pixel/2) - centro,
            dy = (y+pixel/2) - centro
            

    //console.log((dx*dx + dy*dy) <= (radio*radio))
    return (dx*dx + dy*dy) <= (radio*radio)
} 

function generarMatriz(){
    return matrizPixeles = Array.from({length: longitud}, (el,x)=>
        Array.from({length: longitud},(el,y)=>({
            x: x*pixel - r+lienzo/2,
            y: y*pixel - r+lienzo/2
        }))
    ).flat()
     .filter(({x,y})=>mascaraCirculo(x,y,r,lienzo)) 
}

function crearCuadricula(matriz){
    matriz.forEach(({x,y}, i)=>{
        const pix = $d2.createElementNS("http://www.w3.org/2000/svg","rect")
        pix.setAttribute("width", pixel)
        pix.setAttribute("height",pixel)
        pix.setAttribute("x",x)
        pix.setAttribute("y",y)
        pix.setAttribute("fill","white")
        pix.setAttribute("stroke","black") 
        pix.setAttribute("tabindex", "0") //Para moverse con el tabulador y que sea + accesible
        pix.setAttribute("data-pixel",i)
        $lienzo.appendChild(pix) 
    })
}
    
//Funciones de las herramientas de dibujo

$pintar.addEventListener("click", e=>{
    e.preventDefault()
    pintar= true,
    borrar = false
})

$borrar.addEventListener("click",e=>{
    borrar = true,
    pintar = false
})



$d2.addEventListener("DOMContentLoaded", e=>{
    crearCuadricula(generarMatriz())
    
})

$lienzo.addEventListener("click",e=>{
    $color = $d2.querySelector("#color")
    e.preventDefault()
    if(e.target.dataset.pixel){
        if(pintar){
            e.target.setAttribute("fill", $color.value)
        }
        if(borrar){
            e.target.setAttribute("fill", "white")
        }
    } 
})

$lienzo.addEventListener("mousedown",e=>{
    pulsado = true
})
$lienzo.addEventListener("mouseup",e=>{
    pulsado = false
})

$lienzo.addEventListener("mouseover",e=>{
    $color = $d2.querySelector("#color")
    e.preventDefault()
    if(pulsado && e.target.dataset.pixel){
        if(pintar){
            e.target.setAttribute("fill", $color.value)
        }
        if(borrar){
            e.target.setAttribute("fill", "white")
        }
    }
})

/* Función de validación del nombre */
$nombre.addEventListener("blur",e=>{
    e.preventDefault()
    $error.innerHTML=""
    if($nombre.value==""){
        $error.innerHTML="El nombre no puede estar vacío"
        $guardar.disabled=true
    }else{
        $guardar.disabled=false
    }
})

/* Transformar el svg en una cadena */

$guardar.addEventListener("click",e=>{
    e.preventDefault()
    const svgLienzo = new XMLSerializer().serializeToString($lienzo)
    if(svgLienzo!=""){
        $d2.querySelector("#datosSvg").value = svgLienzo
        console.log($d2.querySelector("#datosSvg"));
        $form.submit()
    }else{
        $error.innerHTML="Error al guardar la imagen"
    }
}) 



 