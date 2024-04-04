
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

function validerPromo(Promo){
    return Array.from(Promo).some(function(checkbox) {
        return checkbox.checked;
    });

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
        console.log("no");
        return false;
    }
    if(!validerPromo(promotion)){
        console.log("non");
        return false;
    }

    return true;
    
}

