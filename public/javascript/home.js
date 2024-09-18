function expandir() {
    let header = document.getElementById('header');
    let aside = document.getElementById('menu');
    let main = document.getElementById('main');
    aside.style.width="15vw";
    main.style.left = "15.5vw";
    main.style.width = "83.2vw";
    header.style.width = "85vw";
}

function encolher() {
    let header = document.getElementById('header');
    let aside = document.getElementById('menu');
    let main = document.getElementById('main');
    aside.style.width="8vw";
    main.style.left = "8.7vw";
    main.style.width = "90vw";
    header.style.width = "92vw";
}