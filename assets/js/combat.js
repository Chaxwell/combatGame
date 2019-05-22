var idSelectorAttacker = "pet-select";
var idSelectorAttacked = "listAttacked";

var selectorAttacker = document.getElementById(idSelectorAttacker);
var selectorAttacked = document.querySelectorAll("#listAttacked input[type='radio']");

selectorAttacker.addEventListener('change', function(){
    populateAttackerCard();
});

selectorAttacked.forEach((radio) => {
  radio.addEventListener('change', () => {
    populateAttackedCard();
  });
});

function populateAttackerCard() {
    var idSelector = "pet-select";
    let selector = document.getElementById(idSelector);
    let value = selector[selector.selectedIndex].value;

    let attackerCard = document.getElementById("attacker");

    fetch('/processing/populate_attacker_card.php?id=' + value)
	.then(function(response) {

	    return response.text();
	})
	.then(function(mytext) {
	    console.log(mytext);
	    attackerCard.innerHTML = mytext;
	});
}

function populateAttackedCard() {
    var checkedRad = document.querySelector("#listAttacked input[type='radio']:checked");
    let id = checkedRad.getAttribute("id");
    let attackedCard = document.getElementById("attacked");

    fetch('/processing/populate_attacker_card.php?id=' + id)
	.then(function(response) {
	    return response.text();
	})
	.then(function(mytext) {
	    console.log(mytext);
	    attackedCard.innerHTML = mytext;
	});
}
