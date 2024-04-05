var menuButton = document.getElementById("menu_button");
var menu_lista = document.getElementById("menu_lista");
var menuIcon = document.getElementById("icone_lista");

menuButton.addEventListener("click", () => {
    if (menu_lista.style.display === "block") {
        menu_lista.style.display = "none";
        menuIcon.removeAttribute("class", "fa-solid fa-x")
        menuIcon.setAttribute("class", "fa-solid fa-bars")
    } else {
        menu_lista.style.display = "block";
        menuIcon.setAttribute("class", "fa-solid fa-x")
    }
});