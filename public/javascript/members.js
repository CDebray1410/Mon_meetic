function showSlides(number) {
    let i; // i est utilisé pour les points et les flèches
    let slides = $(".slide");
    let members_data_container = $("#members_data_container");
    
    let slidesTotal = slides.length;
    if (number > slidesTotal) { // remet le "compteur" à 0 si plus grand que nombre total d'img 
        imageNumber = 1;
    } else if (number < 1) {
        imageNumber = slidesTotal;
    }

    for (i = 0; i < slidesTotal; i++) {
        let current_item = slides[i];
        members_data_container.find(current_item).hide();
    }
    
    let current_item_data = slides[imageNumber - 1];
    let page_count =  imageNumber + " / " + i;
    $('#slide_count').text(page_count);
    members_data_container.find(current_item_data).show();
}

let imageNumber = 1; // Selectionne par défaut la première image
showSlides(imageNumber); // Sinon le premier slide n'est pas affiché au départ ET le premier bouton n'est pas rempli

function changeMember(number) {
    showSlides(imageNumber += number);
}
function currentImage(number) {
    imageNumber = number;
    showSlides(imageNumber);
}

$(document).ready(
    imageNumber = 1, // Selectionne par défaut la première image
    showSlides(imageNumber) // Sinon le premier slide n'est pas affiché au départ ET le premier bouton n'est pas rempli
)