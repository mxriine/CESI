
const messageErreurMDP = document.getElementById('messageErreurMDP');
const messageErreurConfirmation = document.getElementById('messageErreurConfirmation');
const messageErreurID = document.getElementById('messageErreurID');

function validerID(ID){
    const IDRegex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
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
            messageErreurID.textContent='Format incorrect !';
            
        } else {
            messageErreurID.textContent ='';
        }
    }); 

    //affiche les erreurs en temps réel
    MdpInput.addEventListener('input', function () {
        const mdp = this.value;
        if (!validerMDP(mdp)) {
            messageErreurMDP.textContent='Format incorrect !';
            
        } else {
            messageErreurMDP.textContent ='';
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
    if (!validerMDP(motdepasse)){
        return false;
    }
    if(motdepasse!==confmotdepasse){
        return false;
    }

    return true;
    
}


