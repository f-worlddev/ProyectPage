let yaSePasoElMouseUnaVez = false;

document.getElementById('icono-Gmail').onmousemove = function(){
    if(!yaSePasoElMouseUnaVez){
        setTimeout(()=>{
            yaSePasoElMouseUnaVez = true;
            document.getElementById('CorreoElectronico').style.transition = "all 1s";
            document.getElementById('CorreoElectronico').style.display = "block";
            setTimeout(()=>{
                document.getElementById('CorreoElectronico').onmouseout = function(){
                    yaSePasoElMouseUnaVez = false;
                    document.getElementById('CorreoElectronico').style.display = "none";
                }
            },50)
        
        },220)
    }
}

