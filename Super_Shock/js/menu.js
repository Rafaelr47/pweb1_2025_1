function mostrarMenu(){
    const menulateral = document.getElementById('menu-lateral');
    menulateral.classList.toggle('ativa');

    const iconMenu = document.getElementById('img-menu');

    if(iconMenu.src.endsWith('img/icon-hamburger-menu.png')){
        iconMenu.src = "img/icon-close-menu.png";
    }else{
        iconMenu.src = "img/icon-hamburger-menu.png"
    }
}