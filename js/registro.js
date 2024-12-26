var confirmarcontraeña = document.getElementById("passwordrepeat").onchange = function checkform(confirmarcontraeña){
    var contraseña = document.getElementById("password");
    var registrarse = document.getElementById("registrar")
    if(contraseña.innerText == confirmarcontraeña.innerText)
    {
        registrarse.disabled = false
    }else{
        registrarse.disabled = true
    }
    return true;
}