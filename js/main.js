var imgusuario = document.getElementById('imguser')
var menu = document.getElementById('menumovil')

imgusuario.onclick = dropdownmenu
menu.onclick = menumovil

function dropdownmenu() {
    var dropdownmenu = document.getElementById('menu')
    if (dropdownmenu.style.display == 'block') {
        dropdownmenu.style.display = 'none'
    } else {
        dropdownmenu.style.display = 'block'
    }
}

function menumovil() {
    var menuoculto = document.getElementById('menuoculto')
    if (menuoculto.style.display == 'block') {
        menuoculto.style.display = 'none'
    } else {
        menuoculto.style.display = 'block'
        menuoculto.style.zIndex = 1000;


    }
}