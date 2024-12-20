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

// INSCRIPTION ET MODIFICATION DES PILOTES

// --- Inscription Pilote Part 1 --- //

const messageErreurMDP1 = document.getElementById('messageErreurMDP');
const messageErreurConfirmation1 = document.getElementById('messageErreurConfirmation');
const messageErreurID1 = document.getElementById('messageErreurID');

function validerID(ID) {
    const IDRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return IDRegex.test(ID);


}

function validerMDP(MotDePasse) {
    const MotDePasseRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return MotDePasseRegex.test(MotDePasse);
}



function afficherMessagesErreur() {
    const MailInput = document.getElementById('identifiant');
    const MdpInput = document.getElementById('motdp');
    const ConfMailInput = document.getElementById('confmdp');

    //affiche les erreurs en temps réel 
    MailInput.addEventListener('input', function () {
        const mail = this.value;
        if (!validerID(mail)) {
            messageErreurID.textContent = 'Format incorrect !';

        } else {
            messageErreurID.textContent = '';
        }
    });

    //affiche les erreurs en temps réel
    MdpInput.addEventListener('input', function () {
        const mdp = this.value;
        if (!validerMDP(mdp)) {
            messageErreurMDP.textContent = 'Format incorrect !';

        } else {
            messageErreurMDP.textContent = '';
        }
    });

    ConfMailInput.addEventListener('input', function () {
        const ConfirmationMotDePasse = this.value;
        const MotDePasse = MdpInput.value;
        if (ConfirmationMotDePasse !== MotDePasse) {
            messageErreurConfirmation.textContent = 'La confirmation du mot de passe ne correspond pas !';
        } else {
            messageErreurConfirmation.textContent = '';
        }
    });

}

afficherMessagesErreur();


function validerFormulaire() {
    var identifiant = document.getElementById('identifiant').value;
    var motdepasse = document.getElementById('motdp').value;
    var confmotdepasse = document.getElementById('confmdp').value;
    // Validation côté client
    if (!validerID(identifiant)) {
        return false; // Arrête la soumission du formulaire
    }
    if (!validerMDP(motdepasse)) {
        return false;
    }
    if (motdepasse !== confmotdepasse) {
        return false;
    }
    return true;
}


// --- Inscription Pilote Part 2 --- //

// Déclaration des variables
const messageErreurMDP2 = document.getElementById('messageErreurMDP');
const messageErreurConfirmation2 = document.getElementById('messageErreurConfirmation');
const messageErreurID2 = document.getElementById('messageErreurId');

function validerNom(Nom) {
    const NomRegex = /^[^\d!@#$%^&*]+$/;
    return NomRegex.test(Nom);
}

function validerPrenom(Prenom) {
    const PrenomRegex = /^[^\d!@#$%^&*]+$/;
    return PrenomRegex.test(Prenom);
}

function validerPromo(Promo) {
    return Array.from(Promo).some(function (checkbox) {
        return checkbox.checked;
    });

}

function validerCentre(selectCentre) {
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
    if (!validerPrenom(prenom)) {
        return false;
    }
    if (!validerCentre(centre)) {
        console.log("no");
        return false;
    }
    if (!validerPromo(promotion)) {
        console.log("non");
        return false;
    }

    return true;

}