const contraseña = document.getElementById("password");
const registrarse = document.getElementById("registrar")
const confirmarcontraeña = document.getElementById("passwordrepeat")

function checkform() {
    var aviso = document.getElementById("aviso")
    if (contraseña.value === confirmarcontraeña.value && contraseña.value !== '') {
        registrarse.disabled = false
        aviso.style.display="none"
    } else {
        registrarse.disabled = true
        aviso.style.display="block"
    }
    
}

contraseña.addEventListener('input', checkform)
confirmarcontraeña.addEventListener('input', checkform)