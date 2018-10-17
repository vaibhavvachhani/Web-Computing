function hamburgerOpen() {
    var x = document.getElementById("navigation");
    if (x.className === "menu_items") {
        x.className += " responsive";
    } else {
        x.className = "menu_items";
    }

    var x = document.getElementById("navigationControl");
    if (x.className === "box") {
        x.className += " responsive";
    } else {
        x.className = "menu_items";
    }
}
