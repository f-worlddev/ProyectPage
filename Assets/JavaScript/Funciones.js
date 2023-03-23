
function insertarReglasCSSAdicionales(reglasCSS){
    let elementoStyle = document.createElement('style');
    elementoStyle.innerHTML = reglasCSS;
    document.head.appendChild(elementoStyle);
}

