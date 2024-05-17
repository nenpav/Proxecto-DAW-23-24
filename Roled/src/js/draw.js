const $d2=document,
      $lienzo = $d2.querySelector("#svgLienzo"),
      $pintar = $d2.querySelector("#pintar"),
      $borrar = $d2.querySelector("#borrar")

const lienzo = 600,
    r = 250,
    pixel = 20, 
    longitud = lienzo / pixel
  
function mascaraCirculo(cordX, cordY, radio, size){
    const centro = size/2,
            dx = (cordX+pixel/2) - centro,
            dy = (cordY+pixel/2) - centro

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
        const pix = $d2.createElement("rect")
        pix.setAttribute("width", pixel)
        pix.setAttribute("height",pixel)
        pix.setAttribute("x",x)
        pix.setAttribute("y",y)
       /*  pix.setAttribute("fill","white") */
        pix.setAttribute("stroke","#808080")
        pix.setAttribute("tabindex", "0") //Para moverse con el tabulador y que sea + accesible
        pix.setAttribute("data-pixel",i)
        console.log(pix)
        $lienzo.appendChild(pix) 
    })
}

//Funciones de las herramientas de dibujo

$d2.addEventListener("DOMContentLoaded",e=>{
    crearCuadricula(generarMatriz())
})


$lienzo.addEventListener("click",e=>{
    $color = $d2.querySelector("#color")
    e.preventDefault()
    if(e.target.dataset.pixel){


        e.target.setAttribute("fill", $color.value)
    } 
})

$lienzo.addEventListener("mousemove",e=>{
    $color = $d2.querySelector("#color")
    e.preventDefault()
    if(e.target.dataset.pixel){
        e.target.setAttribute("fill", $color.value)
    }
})

