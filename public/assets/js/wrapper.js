function firstClick () {
    var links = document.getElementById("text");
    var first_click = true;
    links.onclick = function() {
        if (first_click) {
            const changeText = document.querySelector("#text");
            text.textContent = "Demain matin, l'exposition de Monsieur Daley ouvre ses portes, mais nous  avons un petit souci : le Collier de Perles de Marie Antoinette,  l'objet vedette, a mystérieusement disparu ! Le directeur, le visage  rouge de colère, m'a hurlé de le retrouver avant demain matin, sinon c'est la  porte ! Ah, les joies du métier de conservateur ! Votre mission est  cruciale : aidez-moi à retrouver ce précieux collier et à sauver  l'exposition. Vous aurez besoin de toute votre ingéniosité et de votre  sens de l'observation. Bonne chance, et merci pour votre aide précieuse !";
            first_click = false;
        } else { 
            window.location = "http://localhost:8000/room?rid=1&cid=1";
        }
    }
}

if ( url === '/intro') {
    firstClick();
} else if ( url === '/outro') {
    body.classList.add('outro');
    var links = document.getElementById("text");
    links.onclick = function() {
        window.location = "http://localhost:8000/credits";
    }
}
