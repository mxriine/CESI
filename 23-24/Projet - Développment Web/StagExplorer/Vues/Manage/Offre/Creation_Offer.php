<!-- FORMULAIRE DE SESSION (EN PHP) -->
<?php
require_once('../../../Controleurs/session.php');
require_once('../../../Controleurs/Manage/creation.php');
?>

<!-- PAGE DELETE OFFRE | Valider au validateur  -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Créer une offre</title>
    <!-- LOGO -->
    <link rel="icon" type="image/png" href="../_assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../../../_assets/_css/styles.css">
    <link rel="stylesheet" href="../../../_assets/_css/manage/creation.css">
    <!-- CSS police -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<body>
    <header>
        <div class="header">
            <img class="logo" src="../../../_assets/img/logo.png" alt="Logo StagExplorer">
        </div>
        <div class="titre">
            <h1>StagExplorer</h1>
        </div>
    </header>

    <form method="POST" action="../../../Controleurs/Manage/creation.php">
        <section class="BlocCreerO">
            <div class="titre3">
                <h1>CREER UNE OFFRE</h1>
            </div>
            <article class="Bloc2CreerO">
                <div class="Bloc3CreerO">
                    <label>Titre</label>
                    <input class="input1" type="text" id="TitreCO" name="Titre" placeholder="Entrez un titre" required>
                </div>
                <div class="Bloc3CreerO">
                    <label>Description</label>
                    <textarea id="DescriptionCO" rows=3 name="Description" placeholder="Décrivez votre annonce"></textarea>
                </div>
                <div class="Bloc3CreerO">
                    <label>Compétences</label>
                    <textarea id="CompétencesCO" rows=3 name="Compétences" placeholder="Entrez les compétences requises"></textarea>
                </div>
                <div class="Bloc3CreerO">
                    <label>Entreprise</label>
                    <input class="input1" type="text" id="EntrepriseCO" name="Entreprise" placeholder="Entrez le nom d'une entreprise" required>
                </div>
                <div class="Bloc3CreerO">
                    <label>Localité</label>
                    <select name="Localité" id="LocaliteSelect" required>
                        <option name="">Sélectionnez</option>
                    </select>
                </div>
            </article>

            <article class="Bloc4CreerO">
                <div class="Bloc5CreerO">
                    <label>Durée de stage</label>
                    <input class="input1" type="datetime" name="DuréeStage" required>
                </div>
                <div class="Bloc5CreerO">
                    <label>Date début</label>
                    <input class="input1" type="date" name="Datedébut" required>
                </div>
                <div class="Bloc5CreerO">
                    <label>Rémunération</label>
                    <input class="input1" type="number" name="Rémunération" required>
                </div>
                <div class="Bloc5CreerO">
                    <label>Nombre de place</label>
                    <input class="input1" type="number" name="Nombredeplace" required>
                </div>


            </article>


            <article class="Bloc6CreerO">
                <div class="Bloc7CreerO">
                    <label>Niveau requis</label>
                    <select class="input1" name="Niveaurequis" required>
                        <option value="Bac">Bac</option>
                        <option value="Bac +1">Bac +1</option>
                        <option value="Bac +2">Bac +2</option>
                        <option value="Bac +3">Bac +3</option>
                        <option value="Bac +4">Bac +4</option>
                        <option value="Bac +5">Bac +5</option>
                    </select>
                </div>

                <div class="Bloc7CreerO">
                    <label>Domaine</label>
                    <select class="input1" name="Domaine" required>
                        <option value="Informatique">Informatique</option>
                        <option value="Mathématique">Mathématique</option>
                        <option value="Communication">Communication</option>
                        <option value="BTP">BTP</option>
                    </select>
                </div>

            </article>
            <article class="boutons-D">
                <input type="hidden" name="form_submitted" value="1">
                <button type="submit" id="but1">Sauvegarder</button>
                <button type="button" id="but2" onclick="history.back()">Retour</button>
            </article>

        </section>

    </form>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const entrepriseInput = document.getElementById('EntrepriseCO');
        const localiteSelect = document.getElementById('LocaliteSelect');

        entrepriseInput.addEventListener('input', function() {
            const nomEntreprise = entrepriseInput.value;
            const villes = entreprisesVilles.filter(ev => ev.Nom_Ent === nomEntreprise).map(ev => ev.Nom_Ville);

            localiteSelect.innerHTML = '<option value="">Sélectionnez</option>';

            villes.forEach(function(ville) {
                const option = document.createElement('option');
                option.value = ville;
                option.textContent = ville;
                localiteSelect.appendChild(option);
            });
        });
    });
</script>