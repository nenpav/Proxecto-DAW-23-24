 const $d2=document,
      $contenedorLienzos = $d2.querySelector("#lienzo"),
      $pintar = $d2.querySelector("#pintar"),
      $borrar = $d2.querySelector("#borrar"),
      $nombre = $d2.querySelector("#nombre"),
      $guardar = $d2.querySelector("#guardarConf"),
      $error = $d2.querySelector("#errorSave"),
      $form = $d2.querySelector("#guardarSvg"),
      $rang = $d2.querySelector("#range"),
      $botonMas = $d2.querySelector("#mas"),
      $botonMenos=$d2.querySelector("#menos"),
      $animar = $d2.querySelector("#animar"),
      $contendorSlider = $d2.querySelector("#slider"), 
      $numFrames = $d2.querySelector("#numFrames"),
      $frameActual = $d2.querySelector("#actual"),
      $save = $d2.querySelector("#guardar")

 
      console.log($nombre.value)
    //console.log($error)
    
const lienzo = 600,
    r = 250,
    pixel = 20, 
    longitud = lienzo / pixel

let pintar = true,
    borrar = false,
    pulsado = false,
    contadorFrames = 0

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
    const svg = $d2.createElementNS("http://www.w3.org/2000/svg", "svg")
    svg.setAttribute("id", `${contadorFrames}`)
    svg.setAttribute("width", "600")
    svg.setAttribute("height", "600")
    svg.setAttribute("role", "img")
    svg.setAttribute("aria-label", "lienzo de dibujo")
    svg.setAttribute("class","lienzo")

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
        svg.appendChild(pix) 
    })

    $contenedorLienzos.appendChild(svg)
    contadorFrames++
}



 function crearFrames(){
    let num = $rang.max 
    for(let i=1;i<=num; i++){
        crearCuadricula(generarMatriz())
    }  
} 

function eliminarFrame(){
    if ($contenedorLienzos.lastElementChild) {
        $contenedorLienzos.lastElementChild.remove();
        contadorFrames--;
        
    }
}

function max(operacion){
    let max = parseInt($rang.max);
    if (max > 1) {
        if (operacion == "sumar") {
            $rang.max = max + 1;
        } else {
            $rang.max = max - 1;
        }
    }
}


//Eventos


$pintar.addEventListener("click", e=>{
    e.preventDefault()
    pintar= true,
    borrar = false
    $pintar.classList.add("activo")
    $borrar.classList.remove("activo")
})

$borrar.addEventListener("click",e=>{
    borrar = true,
    pintar = false
    $borrar.classList.add("activo")
    $pintar.classList.remove("activo")
})

$contenedorLienzos.addEventListener("click",e=>{
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

$contenedorLienzos.addEventListener("mousedown",e=>{
    pulsado = true
})
$contenedorLienzos.addEventListener("mouseup",e=>{
    pulsado = false
})

$contenedorLienzos.addEventListener("mouseover",e=>{
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


/* Transformar el svg en una cadena */

$guardar.addEventListener("click",e=>{
    e.preventDefault()
    if($nombre.value=="" || $nombre == 'undefined'){
        $error.innerHTML="El nombre no puede estar vacío"
    }else{
        if($nombre.value.includes('ñ')){
            $error.innerHTML="El nombre no puede contener la letra 'ñ'"
        }else{
            const svgLienzo = new XMLSerializer().serializeToString($contenedorLienzos.firstChild.nextSibling)
            if(svgLienzo!=""){
                //console.log($contenedorLienzos.firstChild.nextSibling)
                $d2.querySelector("#datosSvg").value = svgLienzo
                console.log($d2.querySelector("#datosSvg"));
                $form.submit()
            }else{
                $error.innerHTML="Error al guardar la imagen"
            }
        }
    }
}) 

/* $guardar.addEventListener("click",e=>{
    e.preventDefault()
    const $lienzos = $contenedorLienzos.querySelectorAll("svg")
    let svgContent = "<div>"
    $lienzos.forEach(el=>{
        const svgLienzo = new XMLSerializer().serializeToString(el)
        if (svgLienzo != "") {
            svgContent += svgLienzo;
        } else {
            $error.innerHTML = "Error al guardar la imagen";
        }
    })
    svgContent += "</div>"
    if (svgContent != "<div></div>") { 
        $d2.querySelector("#datosSvg").value = svgContent;
        console.log($d2.querySelector("#datosSvg").value);
        $form.submit();
    } else {
        $error.innerHTML = "Error al guardar la imagen";
    }

    $form.submit()
})  */


$animar.addEventListener("change",e=>{
    $rang.disabled = !e.target.checked
    $botonMas.disabled = !e.target.checked
    $botonMenos.disabled = !e.target.checked
    if($animar.checked){
        if(contadorFrames == 1) {
            crearFrames()
             contadorFrames++ 
            //console.log(contadorFrames)
        }
        const lienzos = $contenedorLienzos.querySelectorAll("svg")
        lienzos.forEach(el=>{
            if(el.id == $rang.value.toString()){
                el.style.display = "block"
            }else{
                el.style.display = "none"
            }
        })
        $numFrames.innerHTML=""
        $numFrames.innerHTML=`Número de frames: ${parseInt($rang.max)+1}`
        $save.disabled = true
        $save.classList.add("deshabilitar")
    }else{
        while($contenedorLienzos.childElementCount>1){
            $contenedorLienzos.removeChild($contenedorLienzos.lastChild)
        }
        $numFrames.innerHTML=""
        $numFrames.innerHTML="Número de frames: 1"
        $rang.value = 0
        contadorFrames=1
        //console.log(contadorFrames)
        const lienzo = $d2.querySelector("svg")
        lienzo.style.display = "block"
        $save.disabled=false
        $save.classList.remove("deshabilitar")
    }
})

 $botonMas.addEventListener("click",e=>{
     e.preventDefault()
     if(contadorFrames<20){
        
         crearCuadricula(generarMatriz())
         const lienzos = $contenedorLienzos.querySelectorAll("svg")
         lienzos.forEach(el=>{
             if(el.id == $rang.value.toString()){
                 el.style.display = "block"
             }else{
                 el.style.display = "none"
             }
         })
         max("sumar")

        }
        if(contadorFrames==20){
            alert("Límite de frames excedido")
        }
        $numFrames.innerHTML=""
        $numFrames.innerHTML=`Número de frames: ${contadorFrames}`
 })

 $botonMenos.addEventListener("click",e=>{
    e.preventDefault()
    if(contadorFrames>1){
        eliminarFrame()
        max("restar")
        //console.log(contadorFrames)
    }
    if(contadorFrames==1){
        alert("No se puede eliminar el frame")
    }
    $numFrames.innerHTML=""
    $numFrames.innerHTML=`Número de frames: ${contadorFrames}`
 })

 $rang.addEventListener("input",e=>{
    e.preventDefault()
    const lienzos = $contenedorLienzos.querySelectorAll("svg")
    lienzos.forEach(el=>{
        if(el.id == $rang.value.toString()){
            el.style.display = "block"
        }else{
            el.style.display = "none"
        }
    })
    $frameActual.innerHTML=""
    $frameActual.innerHTML=`Frame actual: ${(parseInt($rang.value) + 1).toString()}`
 })


 $d2.addEventListener("DOMContentLoaded", e=>{
    crearCuadricula(generarMatriz())
    $botonMas.disabled = true
    $botonMenos.disabled= true
})
