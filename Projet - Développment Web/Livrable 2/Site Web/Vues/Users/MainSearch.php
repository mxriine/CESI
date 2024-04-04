<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
require_once('../../Controleurs/session.php');
require_once('../../Controleurs/display.php');
require_once('../../Controleurs/main.php');
?>

<!-- DASHBOARD ADMIN (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Main</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../../_assets/_css/index.css">
    <script src="../../_assets/_js/main.js"></script>
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../../_assets/img/logoWeb.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
    </header>

    <!-- BLOC DES OFFRES -->

    <!-- Filtre -->
    <aside>
        <label id="filtres">Filtrer</label>
        <img class="imgfiltrer" src="../../_assets/img/filtrer.jpg" alt="Logo Filtrer">

        <section class="competences">
            <label class="trait">Compétences</label>
            <div>
                <input type="checkbox" name="Informatique" value="Informatique">
                <label for="Informatique">Informatique</label>
            </div>
            <div>
                <input type="checkbox" name="maths" value="maths">
                <label for="maths">Mathématiques</label>
            </div>
            <div>
                <input type="checkbox" name="btp" value="btp">
                <label for="btp">BTP</label>
            </div>
            <div>
                <input type="checkbox" name="robotique" value="robotique">
                <label for="robotique">Robotique</label>
            </div>
            <div>
                <input type="checkbox" name="devW" value="devW">
                <label for="devW">Développement web</label>
            </div>
        </section>

        <section class="localite">
            <label class="trait">Localisation</label>
            <div>
                <input type="checkbox" name="pau" value="pau">
                <label for="pau">Pau</label>
            </div>
            <div>
                <input type="checkbox" name="tarbes" value="tarbes">
                <label for="tarbes">Tarbes</label>
            </div>
            <div>
                <input type="checkbox" name="lourdes" value="lourdes">
                <label for="lourdes">Lourdes</label>
            </div>
            <div>
                <input type="checkbox" name="paris" value="paris">
                <label for="parsi">Paris</label>
            </div>
            <div>
                <input type="checkbox" name="marseille" value="marseille">
                <label for="marseille">Marseille</label>
            </div>
            <div>
                <input type="checkbox" name="lyon" value="lyon">
                <label for="lyon">Lyon</label>
            </div>
        </section>

        <section class="duree">
            <label class="trait">Durée du stage</label>
            <section class="date">
                <div>
                    <label for="debut">Début</label>
                    <input type="date" id="debut" name="debut">
                </div>
                <div>
                    <label for="fin">Fin</label>
                    <input type="date" id="fin" name="fin">
                </div>
            </section>
        </section>

        <section class="promotions">
            <label class="trait" for="promotion">Promotions</label>
            <div>
                <select name="promotion" id="promotion">
                    <option>Sélectionner</option>
                    <option value="1A">1ère année</option>
                    <option value="2A">2ème année</option>
                    <option value="3A">3ème année</option>
                    <option value="4A">4ème année</option>
                    <option value="5A">5ème année</option>
                </select>
            </div>
        </section>

        <section class="datePubli">
            <label class="trait" for="datePubli">Date de publication</label>
            <div>
                <select name="datePubli" id="datePubli">
                    <option>Sélectionner</option>
                    <option value="24h">24h</option>
                    <option value="semaineD">Semaine dernière</option>
                    <option value="moisD">Mois dernier</option>
                </select>
            </div>
        </section>
    </aside>
    </div>

    <!-- BLOC DES ENTREPRISES -->

    <!-- Filtre -->
    <aside>
        <label id="filtres">Filtrer</label>
        <img class="imgfiltrer" src="../../_assets/img/filtrer.jpg" alt="Logo Filtrer">

        <section class="competences">
            <label class="trait">Compétences</label>
            <div>
                <input type="checkbox" name="Informatique" value="Informatique">
                <label for="Informatique">Informatique</label>
            </div>
            <div>
                <input type="checkbox" name="maths" value="maths">
                <label for="maths">Mathématiques</label>
            </div>
            <div>
                <input type="checkbox" name="btp" value="btp">
                <label for="btp">BTP</label>
            </div>
            <div>
                <input type="checkbox" name="robotique" value="robotique">
                <label for="robotique">Robotique</label>
            </div>
            <div>
                <input type="checkbox" name="devW" value="devW">
                <label for="devW">Développement web</label>
            </div>
        </section>

        <section class="localite">
            <label class="trait">Localisation</label>
            <div>
                <input type="checkbox" name="pau" value="pau">
                <label for="pau">Pau</label>
            </div>
            <div>
                <input type="checkbox" name="tarbes" value="tarbes">
                <label for="tarbes">Tarbes</label>
            </div>
            <div>
                <input type="checkbox" name="lourdes" value="lourdes">
                <label for="lourdes">Lourdes</label>
            </div>
            <div>
                <input type="checkbox" name="paris" value="paris">
                <label for="parsi">Paris</label>
            </div>
            <div>
                <input type="checkbox" name="marseille" value="marseille">
                <label for="marseille">Marseille</label>
            </div>
            <div>
                <input type="checkbox" name="lyon" value="lyon">
                <label for="lyon">Lyon</label>
            </div>
        </section>

        <label class="trait" id="MoyenEval">Moyenne évaluations</label>
        <section class="moyenneEval">
            <div>
                <input type="checkbox" name="uneEtoile" value="uneEtoile">
                <label for="uneEtoile">1</label>
            </div>
            <div>
                <input type="checkbox" name="deuxEtoile" value="deuxEtoile">
                <label for="deuxEtoile">2</label>
            </div>
            <div>
                <input type="checkbox" name="troisEtoile" value="troisEtoile">
                <label for="troisEtoile">3</label>
            </div>
            <div>
                <input type="checkbox" name="quatreEtoile" value="quatreEtoile">
                <label for="quatreEtoile">4</label>
            </div>
            <div>
                <input type="checkbox" name="cinqEtoile" value="cinqEtoile">
                <label for="cinqEtoile">5</label>
            </div>
        </section>

        <label class="trait" id="nb">Nombre de stagiaires ayant postulés</label>
        <section class="NbStagiairesFiltre">
            <div>
                <input type="radio" id="Moins30" name="NbStagiairesFiltre" value="Moins30" checked>
                <label for="Moins30">Moins de 30</label>
            </div>
            <div>
                <input type="radio" id="30e50" name="NbStagiairesFiltre" value="30et50">
                <label for="30et50">Entre 30 et 50</label>
            </div>
            <div>
                <input type="radio" id="50et100" name="NbStagiairesFiltre" value="50et100">
                <label for="50et100">Entre 50 et 100</label>
            </div>
            <div>
                <input type="radio" id="Plus100" name="NbStagiairesFiltre" value="Plus100">
                <label for="Plus100">Plus de 100</label>
            </div>
        </section>
    </aside>
    </div>

    <!-- BLOC DES PILOTES -->

    <!-- Filtre -->
    <aside>
        <label id="filtres">Filtrer</label>
        <img class="imgfiltrer" src="../../_assets/img/filtrer.jpg" alt="Logo Filtrer">

        <section class="competences">
            <label class="trait">Compétences</label>
            <div>
                <input type="checkbox" name="Informatique" value="Informatique">
                <label for="Informatique">Informatique</label>
            </div>
            <div>
                <input type="checkbox" name="maths" value="maths">
                <label for="maths">Mathématiques</label>
            </div>
            <div>
                <input type="checkbox" name="btp" value="btp">
                <label for="btp">BTP</label>
            </div>
            <div>
                <input type="checkbox" name="robotique" value="robotique">
                <label for="robotique">Robotique</label>
            </div>
            <div>
                <input type="checkbox" name="devW" value="devW">
                <label for="devW">Développement web</label>
            </div>
        </section>

        <section class="localitePiloteEtudiant">
            <label class="trait">Localisation</label>
            <div>
                <input type="checkbox" name="pau" value="pau">
                <label for="pau">Pau</label>
            </div>
            <div>
                <input type="checkbox" name="tarbes" value="tarbes">
                <label for="tarbes">Tarbes</label>
            </div>
            <div>
                <input type="checkbox" name="lourdes" value="lourdes">
                <label for="lourdes">Lourdes</label>
            </div>
            <div>
                <input type="checkbox" name="paris" value="paris">
                <label for="parsi">Paris</label>
            </div>
            <div>
                <input type="checkbox" name="marseille" value="marseille">
                <label for="marseille">Marseille</label>
            </div>
            <div>
                <input type="checkbox" name="lyon" value="lyon">
                <label for="lyon">Lyon</label>
            </div>
        </section>

        <section class="promotionsPilote">
            <label class="trait" for="promotion">Promotions</label>
            <div>
                <select name="promotion" id="promotion">
                    <option>Sélectionner</option>
                    <option value="1A">1ère année</option>
                    <option value="2A">2ème année</option>
                    <option value="3A">3ème année</option>
                    <option value="4A">4ème année</option>
                    <option value="5A">5ème année</option>
                </select>
            </div>
            <div>
                <button class="bouton-ajout" type="button"> + Ajouter une promotion</button>
            </div>
        </section>
    </aside>
    </div>

    <!-- BLOC DES ETUDIANTS -->

    <!-- Filtre -->
    <aside>
        <label id="filtres">Filtrer</label>
        <img class="imgfiltrer" src="../../_assets/img/filtrer.jpg" alt="Logo Filtrer">

        <section class="competences">
            <label class="trait">Compétences</label>
            <div>
                <input type="checkbox" name="Informatique" value="Informatique">
                <label for="Informatique">Informatique</label>
            </div>
            <div>
                <input type="checkbox" name="maths" value="maths">
                <label for="maths">Mathématiques</label>
            </div>
            <div>
                <input type="checkbox" name="btp" value="btp">
                <label for="btp">BTP</label>
            </div>
            <div>
                <input type="checkbox" name="robotique" value="robotique">
                <label for="robotique">Robotique</label>
            </div>
            <div>
                <input type="checkbox" name="devW" value="devW">
                <label for="devW">Développement web</label>
            </div>
        </section>

        <section class="localitePiloteEtudiant">
            <label class="trait">Localisation</label>
            <div>
                <input type="checkbox" name="pau" value="pau">
                <label for="pau">Pau</label>
            </div>
            <div>
                <input type="checkbox" name="tarbes" value="tarbes">
                <label for="tarbes">Tarbes</label>
            </div>
            <div>
                <input type="checkbox" name="lourdes" value="lourdes">
                <label for="lourdes">Lourdes</label>
            </div>
            <div>
                <input type="checkbox" name="paris" value="paris">
                <label for="parsi">Paris</label>
            </div>
            <div>
                <input type="checkbox" name="marseille" value="marseille">
                <label for="marseille">Marseille</label>
            </div>
            <div>
                <input type="checkbox" name="lyon" value="lyon">
                <label for="lyon">Lyon</label>
            </div>
        </section>

        <section class="promotions">
            <label class="trait" for="promotion">Promotions</label>
            <div>
                <select name="promotion" id="promotion">
                    <option>Sélectionner</option>
                    <option value="1A">1ère année</option>
                    <option value="2A">2ème année</option>
                    <option value="3A">3ème année</option>
                    <option value="4A">4ème année</option>
                    <option value="5A">5ème année</option>
                </select>
            </div>
        </section>
    </aside>
    </div>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = document.getElementsByName('navigation');
        var boutonCache = document.getElementById('cacher')
        for (var i = 0; i < options.length; i++) {
            options[i].addEventListener('change', function() {
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

    // Récupération du rôle de l'utilisateur depuis PHP (peut être stocké dans une variable JavaScript)
    var role = "<?php echo $role; ?>";

    // Sélection de tous les boutons "Modifier" avec la classe boutonModif
    var boutonsModifier = document.querySelectorAll('.boutonModif');

    // Vérification si des boutons ont été trouvés
    if (boutonsModifier.length > 0) {
        boutonsModifier.forEach(function(bouton) {
            // Si l'utilisateur est un admin ou un pilote, afficher les boutons "Modifier"
            if (role === 'admin' || role === 'pilote') {
                bouton.style.display = 'inline-block'; // Afficher le bouton
            } else {
                bouton.style.display = 'none'; // Cacher le bouton
            }
        });
    }
</script>