const messageErreurP = document.getElementById('messageErreurPiloteModif');

function validerNomPilote(NomP){
    const NomPRegex = /^[^\d!@#$%^&*]+$/ ;
    return NomPRegex.test(NomP);
}

function validerPrenomPilote(PrenomP){
    const PrenomPRegex = /^[^\d!@#$%^&*]+$/ ;
    return PrenomPRegex.test(PrenomP);
}

function ValidationModifPilote(){
    document.addEventListener('DOMContentLoaded', function(){

        var boutonValiderP = document.getElementById('but1');

        boutonValiderP.addEventListener('click', function(){
            var NomP = document.getElementById('nomP').value;
            var PrenomP = document.getElementById('prenomP').value;
            var checkboxeP = document.querySelector('#promosP').checked;
            var listeP = document.getElementById('centreP').value;
            if(NomP == '' || PrenomP == '' || checkboxeP==null ||listeP=='' || !validerNomPilote(NomP) || !validerPrenomPilote(PrenomP)){
                messageErreurP.style.display = 'block';
            } else {
                messageErreurP.style.display = 'none';
            }
        });
    });
}

ValidationModifPilote();

function afficherMessagesErreur() {
    const MotDePasseInput = document.getElementById('motdp');
    const ConfMotDePasseInput = document.getElementById('confmdp');
    const NomInput=document.getElementById('nom');
    const PrenomInput=document.getElementById('Prenom');
    const IDInput=document.getElementById('identifiant');

    NomInput.addEventListener('input', function () {
        const MotDePasse = this.value;
        if (!validerMDP(MotDePasse)) {
            messageErreurMDP.textContent = 'Le mot de passe doit contenir 8 caractères minimum avec au minimum une majuscule, un chiffre et un caractère spécial !';
            
        } else {
            messageErreurMDP.textContent = '';
        }
    });
}

