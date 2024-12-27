var checkBox = document.getElementById("chkcontacto");
checkBox.onclick = myFunction;

function myFunction() {
    var boton = document.getElementById("enviar");
    boton.disabled = !checkBox.checked;
}  