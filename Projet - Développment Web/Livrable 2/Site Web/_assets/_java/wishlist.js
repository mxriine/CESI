$(document).ready(function(){
    $('input[name="favoris"]').change(function(){
        if($(this).is(':checked')) {
            // Récupérer la valeur de l'attribut value
            var value = $(this).val();

            // Séparer les ID de l'offre et de la personne
            var ids = value.split('-');
            var id_offre = ids[0];
            var id_personne = ids[1];

            // Utiliser les ID récupérés pour effectuer des actions
            // Par exemple, ajouter l'offre à la liste de souhaits
            ajouterALaListeDeSouhaits(id_offre, id_personne);
        }
    });
});

function ajouterALaListeDeSouhaits(id_offre, id_personne) {
    // Code pour ajouter l'offre à la liste de souhaits
    console.log('Offre ajoutée à la liste de souhaits - ID Offre : ' + id_offre + ', ID Personne : ' + id_personne);
}

