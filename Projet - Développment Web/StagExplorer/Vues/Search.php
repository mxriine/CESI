<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once('../Controleurs/session.php');
require_once('../Controleurs/search.php');
?>

<!-- PAGE MAIN | Valider au validateur ✓ -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Search</title>
    <!-- LOGO -->
    <link rel="icon" type="image/png" href="../_assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../_assets/_css/styles.css">
    <link rel="stylesheet" href="../_assets/_css/search.css">
    <!-- CSS police -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <!-- CSS icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JS -->
    <script src="../_assets/_js/script.js" defer></script>
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../_assets/img/logo.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
    </header>

    <!-- Masquer les liens affichés à droite sur les petits écrans et les remplacer par une icône de menu -->
    <a href="javascript:void(0)" class="bar-item button right hide-large hide-medium" onclick="openSidebar()">
        <i class="fa fa-bars"></i>
    </a>

    <!-- BLOC -->

    <!-- Filtre -->
    <aside>
        <label id="filtres">Filtrer</label>
        <img class="imgfiltrer" src="../_assets/img/filtrer.png" alt="Logo Filtrer">

        <section>
            <div class="competences" id="competences">
                <h4 class="trait">Compétences</h4>
                <div class="competences-value">
                    <div>
                        <input type="checkbox" name="Informatique" value="Informatique">
                        <label id="informatique">Informatique</label>
                    </div>
                    <div>
                        <input type="checkbox" name="maths" value="maths">
                        <label id="maths">Mathématiques</label>
                    </div>
                    <div>
                        <input type="checkbox" name="btp" value="btp">
                        <label id="btp">BTP</label>
                    </div>
                    <div>
                        <input type="checkbox" name="robotique" value="robotique">
                        <label id="robotique">Robotique</label>
                    </div>
                    <div>
                        <input type="checkbox" name="devW" value="devW">
                        <label id="developpement">Développement web</label>
                    </div>
                </div>
            </div>

            <div class="localite">
                <h4 class="trait">Localisation</h4>
                <div class="localite-value">
                    <div>
                        <input type="checkbox" name="pau" value="pau">
                        <label id="pau">Pau</label>
                    </div>
                    <div>
                        <input type="checkbox" name="tarbes" value="tarbes">
                        <label id="tarbes">Tarbes</label>
                    </div>
                    <div>
                        <input type="checkbox" name="lourdes" value="lourdes">
                        <label id="lourdes">Lourdes</label>
                    </div>
                    <div>
                        <input type="checkbox" name="paris" value="paris">
                        <label id="pars">Paris</label>
                    </div>
                    <div>
                        <input type="checkbox" name="marseille" value="marseille">
                        <label id="marseille">Marseille</label>
                    </div>
                    <div>
                        <input type="checkbox" name="lyon" value="lyon">
                        <label id="lyon">Lyon</label>
                    </div>
                </div>
            </div>

            <div class="evalutation" id="evalutation" style="display: none;">
                <h4 class="trait">Moyenne des évaluations</h4>
                <div>
                    <input type="checkbox" name="one" value="one">
                    <label>1</label>
                </div>
                <div>
                    <input type="checkbox" name="two" value="two">
                    <label>2</label>
                </div>
                <div>
                    <input type="checkbox" name="three" value="three">
                    <label>3</label>
                </div>
                <div>
                    <input type="checkbox" name="four" value="four">
                    <label>4</label>
                </div>
                <div>
                    <input type="checkbox" name="five" value="five">
                    <label>5</label>
                </div>
            </div>

            <div class="stagiaires" id="stagiaires" style="display: none;">
                <h4 class="trait">Nombre de stagiaires</h4>
                <div>
                    <input type="radio" id="-30" name="stagiaires" value="-30" checked>
                    <label>Moins de 30</label>
                </div>
                <div>
                    <input type="radio" id="30/50" name="stagiaires" value="30/50">
                    <label>Entre 30 et 50</label>
                </div>
                <div>
                    <input type="radio" id="50/100" name="stagiaires" value="50/100">
                    <label>Entre 50 et 100</label>
                </div>
                <div>
                    <input type="radio" id=">100" name="stagiaires" value=">100">
                    <label>Plus de 100</label>
                </div>
            </div>

            <div class="duree">
                <h4 class="trait">Durée du stage</h4>
                <div class="date">
                    <div>
                        <label id="debut">Début</label>
                        <input type="date" id="debut-date" name="debut">
                    </div>
                    <div>
                        <label id="fin">Fin</label>
                        <input type="date" id="fin-date" name="fin">
                    </div>
                </div>
            </div>

            <div class="promotions" style="display: none;">
                <h4 class="trait">Promotions</h4>
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
            </div>

            <div class="publication" style="display: none;">
                <h4 class="trait">Date de publication</h4>
                <div>
                    <select name="publication" id="publication">
                        <option>Sélectionner</option>
                        <option value="24h">24h</option>
                        <option value="semaineD">Semaine dernière</option>
                        <option value="moisD">Mois dernier</option>
                    </select>
                </div>
            </div>
        </section>

    </aside>
    <footer>
        <div class="footer" style="padding:24px 48p">
            <p>© 2024 StagExplorer - Tous droits réservés</p>
        </div>
    </footer>
</body>

</html>