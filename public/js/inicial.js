window.addEventListener("scroll", function () {
    let header = document.querySelector('#header')
    header.classList.toggle('rolagem', window.scrollY > 150)
})

const menuDiv = document.querySelector('#menuMobile')
const btnMenu = document.querySelector('#btnMenuToggle')
const divMeuIP = document.querySelector('.meuIP')

menuDiv.addEventListener('click', animarMenu)

function animarMenu() {
    menuDiv.classList.toggle('abrir')
    btnMenu.classList.toggle('mdi-menu')
    btnMenu.classList.toggle('mdi-close')
    divMeuIP.classList.toggle('hidden')

}

const meuIP = document.getElementById("meuIP");

function getIp(callback) {
    function response(s) {
        callback(window.userip);

        s.onload = s.onerror = null;
        document.body.removeChild(s);
    }

    function trigger() {
        window.userip = false;

        var s = document.createElement("script");
        s.async = true;
        s.onload = function () {
            response(s);
        };
        s.onerror = function () {
            response(s);
        };

        s.src = "https://l2.io/ip.js?var=userip";
        document.body.appendChild(s);
    }

    if (/^(interactive|complete)$/i.test(document.readyState)) {
        trigger();
    } else {
        document.addEventListener('DOMContentLoaded', trigger);
    }
}

getIp(function (ip) {
    meuIP.innerHTML = ip;
    if (ip != '177.200.204.49') {
        botaoMenu = document.querySelector('.menu-login')
        menuMobile = document.querySelector('.menu-mobile')
        btnMenuToggle = document.querySelector('#btnMenuToggle')
        botaoMenu.parentElement.removeChild(botaoMenu)
        menuMobile.parentElement.removeChild(menuMobile)
        btnMenuToggle.parentElement.removeChild(btnMenuToggle)

    }
});