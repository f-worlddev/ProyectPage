
function insertarReglasCSSAdicionales(reglasCSS,id){
    let elementoStyle = document.createElement('style');
    elementoStyle.id = id;
    elementoStyle.innerHTML = reglasCSS;
    document.head.appendChild(elementoStyle);
    return id;
}

function removerReglasCSS(id){
    document.head.removeChild(document.getElementById(id))
}
