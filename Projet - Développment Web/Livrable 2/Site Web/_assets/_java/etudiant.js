// INSCRIPTION ET MODIFICATION DES ETUDIANTS

// --- Inscription Etudiant Part 1 --- //

// Déclaration des variables
const messageErreurMDP = document.getElementById('messageErreurMDP');
const messageErreurConfirmation = document.getElementById('messageErreurConfirmation');
const messageErreurID = document.getElementById('messageErreurId');

function validerNom(Nom){
    const NomRegex = /^[^\d!@#$%^&*]+$/ ;
    return NomRegex.test(Nom);
}

function validerPrenom(Prenom){
    const PrenomRegex = /^[^\d!@#$%^&*]+$/ ;
    return PrenomRegex.test(Prenom);
}

function validerPromo(){
    var boutonSelectionne = document.querySelector('input[name="promo"]:checked');
    return boutonSelectionne!==null;
}

function validerCentre(selectCentre){
    return selectCentre.value !== '';
}

function validerFormulaire2() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('Prenom').value;
    var promotion = document.getElementById('promo').value;
    // var centre = document.getElementById('centre').value;
    // Validation côté client
    if (!validerNom(nom)) {
        return false; // Arrête la soumission du formulaire
    }
    if (!validerPrenom(prenom)){
        return false;
    }
    if(!validerCentre(centre)){

        return false;
    }
    if(!validerPromo()){

        return false;
    }

    return true;
    
}