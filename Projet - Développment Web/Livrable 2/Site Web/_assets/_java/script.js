const messageErreurMDP = document.getElementById('messageErreurMDP');
const messageErreurConfirmation = document.getElementById('messageErreurConfirmation');
const messageErreur = document.getElementById('messageErreurChamps');
const messageErreur2 = document.getElementById('messageErreurChamps2');
const messageErreur3 = document.getElementById('messageErreurChamps3');
const messageErreurPrenom = document.getElementById('messageErreurPrenom');
const messageErreurID = document.getElementById('messageErreurId');
const messageErreurP = document.getElementById('messageErreurPiloteModif');
let a=false;

// Inscription Etudiant

function ValidationInscription1(){
    document.addEventListener('DOMContentLoaded', function(){
        var boutonValider = document.getElementById('boutonValidationInscription1');
        
        boutonValider.addEventListener('click', function(){
            var id = document.getElementById('identifiant').value;
            var mdp = document.getElementById('motdp').value;
            var confmdp = document.getElementById('confmdp').value;
    
            if((id == '' || mdp == '' || confmdp == '') || a==false || !validerID(id)){
                messageErreur.style.display = 'block';
            } else {
                messageErreur.style.display = 'none';
                BLOC_INSCRIPTION2.style.display='block';
                BLOC_INSCRIPTION1.style.display='none';
            }
        });
    });
}


function ValidationInscription2(){
    document.addEventListener('DOMContentLoaded', function(){
        var boutonValider2 = document.getElementById('boutonValidationInscription2');
    
        boutonValider2.addEventListener('click', function(){
            var Nom = document.getElementById('nom').value;
            var prenom = document.getElementById('Prenom').value;
            var boutonSelectionne = document.querySelector('input[name="promo"]:checked');
            var liste = document.getElementById('centre').value;

            if(Nom == '' || prenom == '' || boutonSelectionne==null ||liste=='' || !validerNom(Nom) || !validerPrenom(prenom)){
                messageErreur2.style.display = 'block';
            } else {
                messageErreur2.style.display = 'none';
            }
        });
    });
}

// Inscription Pilote

function ValidationInscription1Pilote(){
    document.addEventListener('DOMContentLoaded', function(){
        var boutonValider3 = document.getElementById('boutonValidationInscriptionPilote');
        
        boutonValider3.addEventListener('click', function(){
            var id = document.getElementById('identifiant').value;
            var mdp = document.getElementById('motdp').value;
            var confmdp = document.getElementById('confmdp').value;
    
            if((id == '' || mdp == '' || confmdp == '') || a==false || !validerID(id)){
                messageErreur.style.display = 'block';
            } else {
                messageErreur.style.display = 'none';
                BLOC_INSCRIPTION2.style.display='block';
                BLOC_INSCRIPTION1.style.display='none';
            }
        });
    });
}




function ValidationInscription2Pilote(){
    document.addEventListener('DOMContentLoaded', function(){

        var boutonValider4 = document.getElementById('boutonValidationInscriptionPilote2');

        boutonValider4.addEventListener('click', function(){
            var Nom = document.getElementById('nom').value;
            var prenom = document.getElementById('Prenom').value;
            var checkboxe = document.querySelector('#promo').checked;
            var liste = document.getElementById('centre').value;
            if(Nom == '' || prenom == '' || checkboxe==null ||liste=='' || !validerNom(Nom) || !validerPrenom(prenom)){
                messageErreur3.style.display = 'block';
            } else {
                messageErreur3.style.display = 'none';
            }
        });
    });
}


ValidationInscription1();
ValidationInscription2();
ValidationInscription2Pilote();
ValidationInscription1Pilote();



function validerMDP(MotDePasse) {
    const MotDePasseRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return MotDePasseRegex.test(MotDePasse);
}

function validerID(ID){
    const IDRegex=/^.{3,}$/;
    return IDRegex.test(ID);
}

function validerNom(Nom){
    const NomRegex = /^[^\d!@#$%^&*]+$/ ;
    return NomRegex.test(Nom);
}

function validerPrenom(Prenom){
    const PrenomRegex = /^[^\d!@#$%^&*]+$/ ;
    return PrenomRegex.test(Prenom);
}


function afficherMessagesErreur() {
    const MotDePasseInput = document.getElementById('motdp');
    const ConfMotDePasseInput = document.getElementById('confmdp');
    const NomInput=document.getElementById('nom');
    const PrenomInput=document.getElementById('Prenom');
    const IDInput=document.getElementById('identifiant');

    MotDePasseInput.addEventListener('input', function () {
        const MotDePasse = this.value;
        if (!validerMDP(MotDePasse)) {
            messageErreurMDP.textContent = 'Le mot de passe doit contenir 8 caractères minimum avec au minimum une majuscule, un chiffre et un caractère spécial !';
            
        } else {
            messageErreurMDP.textContent = '';
        }
    }); 

    IDInput.addEventListener('input', function () {
        const ID = this.value;
        if (!validerID(ID)) {
            messageErreurID.textContent = "L'identifiant doit contenir 3 caractères minimum !";
            
        } else {
            messageErreurID.textContent = '';
        }
    }); 

    NomInput.addEventListener('input', function () {
        const messageErreurNom=document.getElementById('messageErreurNom');
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

    ConfMotDePasseInput.addEventListener('input', function () {
        const ConfirmationMotDePasse = this.value;
        const MotDePasse = MotDePasseInput.value;
        if (ConfirmationMotDePasse !== MotDePasse) {
            messageErreurConfirmation.textContent = 'La confirmation du mot de passe ne correspond pas !';
            a=false;
        } else {
            messageErreurConfirmation.textContent = '';
            a=true;
        }
    });
}

afficherMessagesErreur();


//MODIFIER PILOTE

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