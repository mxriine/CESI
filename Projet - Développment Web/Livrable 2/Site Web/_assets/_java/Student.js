// INSCRIPTION ET MODIFICATION DES ETUDIANTS


// --- Inscription Etudiant Part 1 --- //

// Déclaration des variables
const messageErreur = document.getElementById('messageErreurChamps');
const messageErreur2 = document.getElementById('messageErreurChamps2');

function ValidationInscription1() {
    document.addEventListener('DOMContentLoaded', function () {
        var boutonValider = document.getElementById('boutonValidationInscription1');

        boutonValider.addEventListener('click', function () {
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

// --- Inscription Etudiant Part 2 --- //
function ValidationInscription2() {
    document.addEventListener('DOMContentLoaded', function () {
        var boutonValider2 = document.getElementById('boutonValidationInscription2');

        boutonValider2.addEventListener('click', function () {
            var Nom = document.getElementById('nom').value;
            var prenom = document.getElementById('Prenom').value;
            var boutonSelectionne = document.querySelector('input[name="promo"]:checked');
            var liste = document.getElementById('centre').value;

            if (Nom == '' || prenom == '' || boutonSelectionne == null || liste == '' || !validerNom(Nom) || !validerPrenom(prenom)) {
                messageErreur2.style.display = 'block';
            } else {
                messageErreur2.style.display = 'none';
            }
        });
    });
}

ValidationInscription1();
ValidationInscription2();

// --- Validation de la modification de l'étudiant --- //
function validerID(ID) {
    const IDRegex = /^.{3,}$/;
    return IDRegex.test(ID);
}
function validerNom(Nom) {
    const NomRegex = /^[^\d!@#$%^&*]+$/;
    return NomRegex.test(Nom);
}

function validerPrenom(Prenom) {
    const PrenomRegex = /^[^\d!@#$%^&*]+$/;
    return PrenomRegex.test(Prenom);
}
function validerMDP(MotDePasse) {
    const MotDePasseRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return MotDePasseRegex.test(MotDePasse);
}

// --- Affichage des message d'erreur --- //

// Déclaration des variables
const messageErreurID = document.getElementById('messageErreurId');
const messageErreurPrenom = document.getElementById('messageErreurPrenom');

const messageErreurMDP = document.getElementById('messageErreurMDP');
const messageErreurConfirmation = document.getElementById('messageErreurConfirmation');


let a = false;

function afficherMessagesErreur() {
    const IDInput = document.getElementById('identifiant');
    const NomInput = document.getElementById('nom');
    const PrenomInput = document.getElementById('Prenom');
    const MotDePasseInput = document.getElementById('motdp');
    const ConfMotDePasseInput = document.getElementById('confmdp');

    IDInput.addEventListener('input', function () {
        const ID = this.value;
        if (!validerID(ID)) {
            messageErreurID.textContent = "L'identifiant doit contenir 3 caractères minimum !";

        } else {
            messageErreurID.textContent = '';
        }
    });

    NomInput.addEventListener('input', function () {
        const messageErreurNom = document.getElementById('messageErreurNom');
        const Nom = this.value;
        if (!validerNom(Nom)) {
            messageErreurNom.textContent = 'Format incorrect !';

        } else {
            messageErreurNom.textContent = '';
        }
    });

    PrenomInput.addEventListener('input', function () {
        const Prenom = this.value;
        if (!validerPrenom(Prenom)) {
            messageErreurPrenom.textContent = 'Format incorrect !';

        } else {
            messageErreurPrenom.textContent = '';
        }
    });

    MotDePasseInput.addEventListener('input', function () {
        const MotDePasse = this.value;
        if (!validerMDP(MotDePasse)) {
            messageErreurMDP.textContent = 'Le mot de passe doit contenir 8 caractères minimum avec au minimum une majuscule, un chiffre et un caractère spécial !';

        } else {
            messageErreurMDP.textContent = '';
        }
    });

    ConfMotDePasseInput.addEventListener('input', function () {
        const ConfirmationMotDePasse = this.value;
        const MotDePasse = MotDePasseInput.value;
        if (ConfirmationMotDePasse !== MotDePasse) {
            messageErreurConfirmation.textContent = 'La confirmation du mot de passe ne correspond pas !';
            a = false;
        } else {
            messageErreurConfirmation.textContent = '';
            a = true;
        }
    });
}

afficherMessagesErreur();