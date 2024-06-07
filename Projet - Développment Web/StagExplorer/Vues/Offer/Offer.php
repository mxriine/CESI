<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once('../../Controleurs/session.php');
require_once('../../Controleurs/offer.php');
require_once('../../Controleurs/Bouton/display.php');
require_once('../../Controleurs/List/wishlist.php');
?>

<!-- INFO OFFER | Valider au validateur -->
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
            <input type="hidden" id="ID_Offer" value=" <?php echo $ID_Offer ?> ">
            <input type="hidden" id="ID_User" value=" <?php echo $ID_User ?> ">
            <input type="radio" id="favoris" name="favoris">
            <label for="favoris" id="star" class="star" onclick="toggleWishlist()">☆</label>
        </div>
    </section>

    <footer>
        <div class="footer">
            <p>© 2021 StagExplorer - Tous droits réservés</p>
        </div>
    </footer>

    <script>
        function updateWishlist(action) {
            var ID_Offer = document.getElementById("ID_Offer").value.trim();
            var ID_User = document.getElementById("ID_User").value.trim();

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../../Controleurs/Liste/wishlist.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("ID_Offer=" + ID_Offer + "&ID_User=" + ID_User + "&action=" + action);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (action === 'check') {
                        var star = document.getElementById("star");
                        if (xhr.responseText === "true") {
                            star.classList.add("orange");
                        } else {
                            star.classList.remove("orange");
                        }
                    } else {
                        alert(xhr.responseText);
                    }
                }
            }
        }

        function toggleWishlist() {
            var star = document.getElementById("star");
            if (star.classList.contains("orange")) {
                updateWishlist('delete');
            } else {
                updateWishlist('add');
            }
            setTimeout(function() {
                updateWishlist('check');
            }, 500); // Ajout d'un délai pour garantir la mise à jour correcte
        }

        document.addEventListener("DOMContentLoaded", function () {
            updateWishlist('check'); // Vérifier l'état de la wishlist lors du chargement de la page
        });
    </script>

</body>

</html>