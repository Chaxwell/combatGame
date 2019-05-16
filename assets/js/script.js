const radios = document.querySelectorAll('.form-check');
const images = document.querySelectorAll('.classe-personnage');
const strength = document.querySelector('#characterStrength');
const hp = document.querySelector('#characterHP');

radios.forEach(radio => {
    radio.addEventListener('click', () => {
        images.forEach(image => {
            image.classList.remove('classe-personnage-selected');
        });

        // Champs de stats
        if (radio.childNodes[1].value == 'warrior') {
            strength.value = '20';
            hp.value = '100';
        } else if (radio.childNodes[1].value == 'wizard') {
            strength.value = '10';
            hp.value = '150';
        } else {
            strength.value = '15';
            hp.value = '125';
        }

        // Image selected
        radio.childNodes[3].childNodes[1].classList.add('classe-personnage-selected');
    });
});