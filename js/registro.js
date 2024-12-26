const contraseña = document.getElementById("password");
const registrarse = document.getElementById("registrar")
const confirmarcontraeña = document.getElementById("passwordrepeat")

function checkform() {
    if (contraseña.value === confirmarcontraeña.value && contraseña.value !== '') {
        registrarse.disabled = false
    } else {
        registrarse.disabled = true
    }
    
}

contraseña.addEventListener('input', checkform)
confirmarcontraeña.addEventListener('input', checkform)