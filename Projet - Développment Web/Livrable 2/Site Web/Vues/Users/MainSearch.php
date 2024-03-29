<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php
require_once('../../Controleurs/session.php');
require_once('../../Controleurs/display.php');
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
    <div id="BLOC_OFFRES">
        <div class="scroll-section">

            <div class="scroll-content">
                <label class="TitreOffreEntreprise">Stage 1</label>
                <div class="publier">
                    <label>Publié le 05/03/2022</label>
                </div>
                <div class="description">
                    <label for="TitreDescription/Comp">Description</label><br><br>
                    <label>Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus.</label>
                </div>
                <div class="compDemandes">
                    <label for="TitreDescription/Comp">Compétences requises:</label>
                    <label>maths</label>
                </div>

                <a href="../PagesVisionSeuleVersionPA/page_OffreSeule - VersionPA.html">
                    <button class="boutonVision" type="button">Visionner</button></a>
                <a href="../Modification/modifier_Offre.html">
                    <button class="boutonModif" type="button">Modifier</button></a>
            </div>

            <div class="scroll-content">
                <label class="TitreOffreEntreprise">Stage 2</label>
                <div class="publier">
                    <label>Publié le 05/03/2022</label>
                </div>
                <div class="description">
                    <label for="TitreDescription/Comp">Description</label><br><br>
                    <label>Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus.</label>
                </div>
                <div class="compDemandes">
                    <label for="TitreDescription/Comp">Compétences requises:</label>
                    <label>maths</label>
                </div>

                <a href="../Modification/modifier_Offre.html">
                    <button class="boutonVision" type="button">Visionner</button>
                    <a href="../Modification/modifier_Offre.html">
                        <button class="boutonModif" type="button">Modifier</button></a>
            </div>

            <div class="scroll-content">
                <label class="TitreOffreEntreprise">Stage 3</label>
                <div class="publier">
                    <label>Publié le 05/03/2022</label>
                </div>
                <div class="description">
                    <label for="TitreDescription/Comp">Description</label><br><br>
                    <label>Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus.</label>
                </div>
                <div class="compDemandes">
                    <label for="TitreDescription/Comp">Compétences requises:</label>
                    <label>maths</label>
                </div>

                <a href="../Modification/modifier_Offre.html">
                    <button class="boutonVision" type="button">Visionner</button>
                    <a href="../Modification/modifier_Offre.html">
                        <button class="boutonModif" type="button">Modifier</button></a>
            </div>

            <div class="scroll-content">
                <label class="TitreOffreEntreprise">Stage 4</label>
                <div class="publier">
                    <label>Publié le 05/03/2022</label>
                </div>
                <div class="description">
                    <label for="TitreDescription/Comp">Description</label><br><br>
                    <label>Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus.</label>
                </div>
                <div class="compDemandes">
                    <label for="TitreDescription/Comp">Compétences requises:</label>
                    <label>maths</label>
                </div>
                <button class="boutonVision" type="button">Visionner</button>
                <a href="../Modification/modifier_Offre.html"><button class="boutonModif" type="button">Modifier</button></a>
            </div>
        </div>

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
                <label class="trait">Localités</label>
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
    <div id="BLOC_ENTREPRISES" style="display: none;">
        <div class="scroll-section">
            <div class="scroll-content">
                <label class="TitreOffreEntreprise">Entreprise 1</label>
                <div class="publier">
                    <label>Publié le 05/03/2022</label>
                </div>
                <div class="description">
                    <label for="TitreDescription/Comp">Description</label><br><br>
                    <label>Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus.</label>
                </div>
                <div class="compDemandes">
                    <label for="TitreDescription/Comp">Nombre de stagiaires ayant postulés à une offre :</label>
                    <label>95</label>
                </div>
                <a href="../PagesVisionSeuleVersionPA/page_EntreSeule - VersionPA.html"><button class="boutonVision" type="button">Visionner</button></a>
                <a href="../Modification/modifier_Entre.html"><button class="boutonModif" type="button">Modifier</button></a>
            </div>
            <div class="scroll-content">
                <label class="TitreOffreEntreprise">Entreprise 2</label>
                <div class="publier">
                    <label>Publié le 05/03/2022</label>
                </div>
                <div class="description">
                    <label for="TitreDescription/Comp">Description</label><br><br>
                    <label>Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus.</label>
                </div>
                <div class="compDemandes">
                    <label for="TitreDescription/Comp">Nombre de stagiaires ayant postulés à une offre :</label>
                    <label>65</label>
                </div>
                <button class="boutonVision" type="button">Visionner</button>
                <button class="boutonModif" type="button">Modifier</button>
            </div>
            <div class="scroll-content">
                <label class="TitreOffreEntreprise">Entreprise 3</label>
                <div class="publier">
                    <label>Publié le 05/03/2022</label>
                </div>
                <div class="description">
                    <label for="TitreDescription/Comp">Description</label><br><br>
                    <label>Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus.</label>
                </div>
                <div class="compDemandes">
                    <label for="TitreDescription/Comp">Nombre de stagiaires ayant postulés à une offre :</label>
                    <label>47</label>
                </div>
                <button class="boutonVision" type="button">Visionner</button>
                <button class="boutonModif" type="button">Modifier</button>
            </div>
            <div class="scroll-content">
                <label class="TitreOffreEntreprise">Entreprise 4</label>
                <div class="publier">
                    <label>Publié le 05/03/2022</label>
                </div>
                <div class="description">
                    <label for="TitreDescription/Comp">Description</label><br><br>
                    <label>Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus.</label>
                </div>
                <div class="compDemandes">
                    <label for="TitreDescription/Comp">Nombre de stagiaires ayant postulés à une offre :</label>
                    <label>24</label>
                </div>
                <button class="boutonVision" type="button">Visionner</button>
                <button class="boutonModif" type="button">Modifier</button>
            </div>
        </div>

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
                <label class="trait">Localités</label>
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
    <div id="BLOC_PILOTES" style="display: none;">
        <div class="scroll-sectionPiloteEtudiant">
            <div class="scroll-contentPiloteEtudiant">
                <div class="Bloc1">
                    <label class="label1">Pilote 1</label>
                    <label class="label2">Promotions assignées : 1ère année Informatique</label>
                </div>
                <div class="Bloc2">
                    <a href="../Modification/modifier_Pilote.html"><button type="button" class="bouton-modifier">Modifier</button></a>
                    <a href="../PagesVisionSeuleVersionPA/page_PiloteSeule.html"><button type="button" class="bouton-modifier">Visionner</button></a>
                </div>

            </div>
            <div class="scroll-contentPiloteEtudiant">
                <div class="Bloc1">
                    <label class="label1">Pilote 2</label>
                    <label class="label2">Promotions assignées : 3ème année BTP</label>
                </div>
                <div class="Bloc2">
                    <a href="../Modification/modifier_Pilote.html"><button type="button" class="bouton-modifier">Modifier</button></a>
                    <a href="../PagesVisionSeuleVersionPA/page_PiloteSeule.html"><button type="button" class="bouton-modifier">Visionner</button></a>
                </div>
            </div>
            <div class="scroll-contentPiloteEtudiant">
                <div class="Bloc1">
                    <label class="label1">Pilote 3</label>
                    <label class="label2">Promotions assignées : 4ème année Informatique / 3ème année BTP</label>
                </div>
                <div class="Bloc2">
                    <a href="../Modification/modifier_Pilote.html"><button type="button" class="bouton-modifier">Modifier</button></a>
                    <a href="../PagesVisionSeuleVersionPA/page_PiloteSeule.html"><button type="button" class="bouton-modifier">Visionner</button></a>
                </div>
            </div>
            <div class="scroll-contentPiloteEtudiant">
                <div class="Bloc1">
                    <label class="label1">Pilote 4</label>
                    <label class="label2">Promotions assignées : 3ème année BTP</label>
                </div>
                <div class="Bloc2">
                    <a href="../Modification/modifier_Pilote.html"><button type="button" class="bouton-modifier">Modifier</button></a>
                    <a href="../PagesVisionSeuleVersionPA/page_PiloteSeule.html"><button type="button" class="bouton-modifier">Visionner</button></a>
                </div>
            </div>
        </div>

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
                <label class="trait">Localités</label>
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
    <div id="BLOC_ETUDIANTS" style="display: none;">
        <div class="scroll-sectionPiloteEtudiant">
            <div class="scroll-contentPiloteEtudiant">
                <div class="Bloc1">
                    <label class="label1">Etudiant 1</label>
                    <label class="label2">Promotion: 1ère année Informatique</label>
                </div>
                <div class="Bloc2">
                    <a href="../Modification/modifier_Etudiant.html"><button type="button" class="bouton-modifier">Modifier</button></a>
                    <a href="../PagesVisionSeuleVersionPA/page_EtudiantSeule.html"><button type="button" class="bouton-modifier">Visionner</button></a>
                </div>

            </div>
            <div class="scroll-contentPiloteEtudiant">
                <div class="Bloc1">
                    <label class="label1">Etudiant 2</label>
                    <label class="label2">Promotion: 3ème année BTP</label>
                </div>
                <div class="Bloc2">
                    <a href="../Modification/modifier_Etudiant.html"><button type="button" class="bouton-modifier">Modifier</button></a>
                    <a href="../PagesVisionSeuleVersionPA/page_EtudiantSeule.html"><button type="button" class="bouton-modifier">Visionner</button></a>
                </div>
            </div>
            <div class="scroll-contentPiloteEtudiant">
                <div class="Bloc1">
                    <label class="label1">Etudiant 3</label>
                    <label class="label2">Promotion: 4ème année Informatique / 3ème année BTP</label>
                </div>
                <div class="Bloc2">
                    <a href="../Modification/modifier_Etudiant.html"><button type="button" class="bouton-modifier">Modifier</button></a>
                    <a href="../PagesVisionSeuleVersionPA/page_EtudiantSeule.html"><button type="button" class="bouton-modifier">Visionner</button></a>
                </div>
            </div>
            <div class="scroll-contentPiloteEtudiant">
                <div class="Bloc1">
                    <label class="label1">Etudiant 4</label>
                    <label class="label2">Promotion: 3ème année BTP</label>
                </div>
                <div class="Bloc2">
                    <a href="../Modification/modifier_Etudiant.html"><button type="button" class="bouton-modifier">Modifier</button></a>
                    <a href="../PagesVisionSeuleVersionPA/page_EtudiantSeule.html"><button type="button" class="bouton-modifier">Visionner</button></a>
                </div>
            </div>
        </div>

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
                <label class="trait">Localités</label>
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