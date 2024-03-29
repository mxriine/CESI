// --- Affichage de bloc --- //

document.addEventListener('DOMContentLoaded', function () {
    var options = document.getElementsByName('navigation');
    var boutonCache = document.getElementById('cacher')
    for (var i = 0; i < options.length; i++) {
        options[i].addEventListener('change', function () {
            if (this.checked && this.value == 'entreprise') {
                BLOC_ENTREPRISES.style.display = 'block';
                BLOC_OFFRES.style.display = 'none';
                BLOC_PILOTES.style.display = 'none';
                BLOC_ETUDIANTS.style.display = 'none';
            }
            if (this.checked && this.value == 'offres') {
                BLOC_ENTREPRISES.style.display = 'none';
                BLOC_OFFRES.style.display = 'block';
                BLOC_PILOTES.style.display = 'none';
                BLOC_ETUDIANTS.style.display = 'none';
            }
            if (this.checked && this.value == 'pilote') {
                BLOC_ENTREPRISES.style.display = 'none';
                BLOC_OFFRES.style.display = 'none';
                BLOC_PILOTES.style.display = 'block';
                BLOC_ETUDIANTS.style.display = 'none';
            }
            if (this.checked && this.value == 'etudiant') {
                BLOC_ENTREPRISES.style.display = 'none';
                BLOC_OFFRES.style.display = 'none';
                BLOC_PILOTES.style.display = 'none';
                BLOC_ETUDIANTS.style.display = 'block';
            }
        });
    }
});
