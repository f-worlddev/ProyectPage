


window.addEventListener('load',()=>{
    

    let contenedoresServicios = document.querySelectorAll('.Servicio-Contenedor');
    let funcionesCambioAestilosOriginales = []

    for(let i=0;i<contenedoresServicios.length;i++){
        
        contenedoresServicios[i].addEventListener('click',()=>{

            let texto = document.querySelector(`.Servicio-Contenedor:nth-child(${i+1}) .Texto-Servicio`)
            texto.style.display = "block"; 

            funcionesCambioAestilosOriginales[i] = function(){
                texto.style.display = "block";                       
            }

            contenedoresServicios[i].addEventListener('mouseover',funcionesCambioAestilosOriginales[i],true);

            contenedoresServicios[i].addEventListener('mouseleave',()=>{
                contenedoresServicios[i].style.minHeight = "50vh";
                texto.style.display = "none"; 
                contenedoresServicios[i].removeEventListener('mouseover',funcionesCambioAestilosOriginales[i],true);
            })

        },true)
        

    }


})


