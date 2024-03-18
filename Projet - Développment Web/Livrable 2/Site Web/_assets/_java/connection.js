// --- Affichage des message d'erreur --- //

// Déclaration des variables
const messageErreurMail = document.getElementById('messageErreurMail');

const messageErreurMdp = document.getElementById('messageErreurMdp');

function afficherMessagesErreur() {
    const MailInput = document.getElementById('mail');
    const MotDePasseInput = document.getElementById('mdp');

    MailInput.addEventListener('input', function () {
        const Mail = this.value;
        if (!validerMail(Mail)) {
            messageErreurMail.textContent = 'L\'adresse mail est incorrecte !';

        } else {
            messageErreurMail.textContent = '';
        }
    });

    MotDePasseInput.addEventListener('input', function () {
        const MotDePasse = this.value;
        if (!validerMDP(MotDePasse)) {
            messageErreurMDP.textContent = 'Le mot de passe est incorrect !';

        } else {
            messageErreurMDP.textContent = '';
        }
    });
}

afficherMessagesErreur();