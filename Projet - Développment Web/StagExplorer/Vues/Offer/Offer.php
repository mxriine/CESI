<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once('../../Controleurs/session.php');
require_once('../../Controleurs/offer.php');
require_once('../../Controleurs/Bouton/display.php');
require_once('../../Controleurs/Liste/wishlist.php');
?>

<!-- INFO OFFRE | Valider au validateur -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Search</title>
    <!-- LOGO -->
    <link rel="icon" type="image/png" href="../../_assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../../_assets/_css/styles.css">
    <link rel="stylesheet" href="../../_assets/_css/offre.css">
    <!-- CSS police -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../../_assets/img/logo.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
    </header>

    <section class="container">
        <article>
            <button class="bouton-retour" onclick="history.back()">
                <img class="fleche-retour" src="../../_assets/img/flecheRetour.png">
            </button>
            <div class="nom">
                <p> <?php echo $Name_Offer; ?> </p>
            </div>
            <div class="description">
                <h1>Description : </h1>
                <p> <?php echo $Description_Offer; ?> </p>
            </div>
            <div class="competences">
                <h1>Compétences requises :</h1>
                <p> <?php echo $Skills_Offer; ?> </p>
            </div>
            <div class="localisation">
                <h1>Localité : </h1>
                <p>Paris, 8 Rue des Champs-Elysées</p>
            </div>
            <div class="entreprise">
                <h1>Entreprise : </h1>
                <p> <?php echo $Name_Company; ?> </p>
            </div>
            <div class="postulation">
                <h1>Nombre d'élèves ayant postulés : </h1>
                <p> x </p>
            </div>
        </article>

        <article class="date">
            <div class="duree">
                <h1>Durée du stage : </h1>
                <p> <?php echo $Duration_Offer; ?> </p>
            </div>
            <div class="debut">
                <h1>Date début : </h1>
                <p> <?php echo $Date_Offer; ?> </p>
            </div>
            <div class="niveau">
                <h1>Niveau requis : </h1>
                <p> <?php echo $Level_Offer; ?> </p>
            </div>
            <div class="remuneration">
                <h1>Rémunération : </h1>
                <p> <?php echo $Pay_Offer; ?> € /mois</p>
            </div>
            <div class="place">
                <h1>Nombre de places : </h1>
                <p> <?php echo $Place_Offer; ?> </p>
            </div>
        </article>

        <div class="favoris">
            <input type="hidden" id="ID_Offer" value="123"> <!-- Exemple de valeur pour ID_Offer -->
            <input type="hidden" id="ID_User" value="456"> <!-- Exemple de valeur pour ID_User -->
            <input type="radio" id="favoris" name="favoris">
            <label for="favoris">☆</label>
            <button onclick="ajouterALaListeDeSouhaits()">Ajouter aux Favoris</button>
        </div>
    </section>

    <footer>
        <div class="footer">
            <p>© 2021 StagExplorer - Tous droits réservés</p>
        </div>
    </footer>

    <script>
        function ajouterALaListeDeSouhaits() {
            // Vérifie si l'étoile est cochée
            const favorisChecked = document.getElementById('favoris').checked;
            if (!favorisChecked) {
                console.log('L\'étoile n\'est pas cochée');
                return; // Ne rien faire si l'étoile n'est pas cochée
            }

            // Récupère la valeur de l'ID de l'offre à partir de l'élément HTML avec l'ID 'ID_Offer'
            const ID_Offer = document.getElementById('ID_Offer').value;

            // Récupère la valeur de l'ID de l'utilisateur à partir de l'élément HTML avec l'ID 'ID_User'
            const ID_User = document.getElementById('ID_User').value;

            // Vérifie que les IDs ne sont pas vides
            if (!ID_Offer || !ID_User) {
                console.error('ID_Offer ou ID_User est manquant');
                return;
            }

            // Journaliser les IDs pour le débogage
            console.log('ID_Offer:', ID_Offer, 'ID_User:', ID_User);

            // Crée un objet contenant les données à envoyer au serveur
            const data = {
                ID_Offer: ID_Offer,
                ID_User: ID_User
            };

            // Journaliser les données envoyées pour le débogage
            console.log('Données envoyées :', JSON.stringify(data));

            // Utilise l'API Fetch pour envoyer une requête POST au fichier PHP 'save_to_json.php'
            fetch('save_to_json.php', {
                    method: 'POST', // Spécifie que la méthode de la requête est POST
                    headers: {
                        'Content-Type': 'application/json' // Spécifie le type de contenu comme JSON
                    },
                    body: JSON.stringify(data) // Convertit l'objet data en une chaîne JSON pour l'envoyer dans le corps de la requête
                })
                .then(response => response.json()) // Convertit la réponse en JSON
                .then(result => {
                    // Affiche un message de succès et les résultats de la requête dans la console
                    console.log('Success:', result);
                })
                .catch(error => {
                    // Affiche un message d'erreur dans la console en cas de problème
                    console.error('Error:', error);
                });
        }
    </script>

</body>

</html>