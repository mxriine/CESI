// INSCRIPTION ET MODIFICATION DES PILOTES

// --- Inscription Pilote Part 1 --- //
function ValidationInscription1Pilote() {
    document.addEventListener('DOMContentLoaded', function () {
        var boutonValider3 = document.getElementById('boutonValidationInscriptionPilote');

        boutonValider3.addEventListener('click', function () {
            var id = document.getElementById('identifiant').value;
            var mdp = document.getElementById('motdp').value;
            var confmdp = document.getElementById('confmdp').value;

            if ((id == '' || mdp == '' || confmdp == '') || a == false || !validerID(id)) {
                messageErreur.style.display = 'block';
            } else {
                messageErreur.style.display = 'none';
                BLOC_INSCRIPTION2.style.display = 'block';
                BLOC_INSCRIPTION1.style.display = 'none';
            }
        });
    });
}

// --- Inscription Pilote Part 2 --- //

// Déclaration des variables
const messageErreur3 = document.getElementById('messageErreurChamps3');

function ValidationInscription2Pilote() {
    document.addEventListener('DOMContentLoaded', function () {

        var boutonValider4 = document.getElementById('boutonValidationInscriptionPilote2');

        boutonValider4.addEventListener('click', function () {
            var Nom = document.getElementById('nom').value;
            var prenom = document.getElementById('Prenom').value;
            var checkboxe = document.querySelector('#promo').checked;
            var liste = document.getElementById('centre').value;
            if (Nom == '' || prenom == '' || checkboxe == null || liste == '' || !validerNom(Nom) || !validerPrenom(prenom)) {
                messageErreur3.style.display = 'block';
            } else {
                messageErreur3.style.display = 'none';
            }
        });
    });
}

ValidationInscription2Pilote();
ValidationInscription1Pilote();


// --- Validation de la modification du pilote ---//
function validerNomPilote(NomP) {
    const NomPRegex = /^[^\d!@#$%^&*]+$/;
    return NomPRegex.test(NomP);
}

function validerPrenomPilote(PrenomP) {
    const PrenomPRegex = /^[^\d!@#$%^&*]+$/;
    return PrenomPRegex.test(PrenomP);
}

// Déclaration des variables
const messageErreurP = document.getElementById('messageErreurPiloteModif');

function ValidationModifPilote() {
    document.addEventListener('DOMContentLoaded', function () {

        var boutonValiderP = document.getElementById('but1');

        boutonValiderP.addEventListener('click', function () {
            var NomP = document.getElementById('nomP').value;
            var PrenomP = document.getElementById('prenomP').value;
            var checkboxeP = document.querySelector('#promosP').checked;
            var listeP = document.getElementById('centreP').value;
            if (NomP == '' || PrenomP == '' || checkboxeP == null || listeP == '' || !validerNomPilote(NomP) || !validerPrenomPilote(PrenomP)) {
                messageErreurP.style.display = 'block';
            } else {
                messageErreurP.style.display = 'none';
            }
        });
    });
}

ValidationModifPilote();