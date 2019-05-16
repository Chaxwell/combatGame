const radios = document.querySelectorAll('.form-check');
const images = document.querySelectorAll('.classe-personnage');


radios.forEach(radio => {
    radio.addEventListener('click', () => {
        images.forEach(image => {
            image.classList.remove('classe-personnage-selected');
        });

        // Image selected
        radio.childNodes[3].childNodes[1].classList.add('classe-personnage-selected');
    });
});