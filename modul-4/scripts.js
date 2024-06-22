let userMenuToggle = document.getElementById("userMenuToggle");
let subMenu = document.getElementById("subMenu");

userMenuToggle.addEventListener("click", toggleMenu);

function toggleMenu() {
    subMenu.classList.toggle("open-menu");}