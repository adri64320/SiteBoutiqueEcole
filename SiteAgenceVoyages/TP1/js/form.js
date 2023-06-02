var nomInput = document.getElementById("nom");
var prenomInput = document.getElementById("prenom");

var regex = /^[a-zA-ZàâäéèêëîïôöùûüçÀÂÄÉÈÊËÎÏÔÖÙÛÜÇ\-\ ]+$/;


function validateInput(input) {
    if (input.name === "nom") {
        elementErreurNom = document.getElementById("erreurNom");
        elementErreurNom.innerHTML = "";
        if (!regex.test(nomInput.value)) {
            elementErreurNom.innerHTML = "Le champ ne peut contenir que des lettres.";
            elementErreurNom.style.color = "red";
        }
    } else if (input.name === "prenom") {
        elementErreurPrenom = document.getElementById("erreurPrenom");
        elementErreurPrenom.innerHTML = "";
        if (!regex.test(prenomInput.value)) {
            elementErreurPrenom.innerHTML = "Le champ ne peut contenir que des lettres";
            elementErreurPrenom.style.color = "red";
        }
    }
}


nomInput.addEventListener("input", function () {
    validateInput(nomInput);
});

prenomInput.addEventListener("input", function () {
    validateInput(prenomInput);
});



document.getElementById("form").addEventListener("submit", function (event) {

    var dateContact = document.forms["form"]["dateContact"].value;
    var dateNaissance = document.forms["form"]["dateNaissance"].value;

    var dateJour = new Date();

    var dateContactObj = new Date(dateContact);
    var dateNaissanceObj = new Date(dateNaissance);

    if (dateContactObj > dateJour) {
        var messageErreurDateContact = "La date n'est pas encore passée ! Veuillez choisir une date qui existe.";
        var elementErreurDateContact = document.getElementById("erreurDateContact");
        elementErreurDateContact.innerHTML = messageErreurDateContact;
        elementErreurDateContact.style.color = "red";

        event.preventDefault();
    }

    if (dateNaissanceObj > dateJour) {
        var messageErreurDateContact = "La date n'est pas bonne. Veuillez saisir votre vraie date de naissance";
        var elementErreurDateContact = document.getElementById("erreurDateNaissance");
        elementErreurDateContact.innerHTML = messageErreurDateContact;
        elementErreurDateContact.style.color = "red";

        event.preventDefault();
    }

    if (!regex.test(nomInput.value) || !regex.test(prenomInput.value)) {
        event.preventDefault();
    }

});



