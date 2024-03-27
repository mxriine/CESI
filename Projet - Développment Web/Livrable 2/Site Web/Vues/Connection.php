<?php
    require_once('../Controleurs/connect.php');
?>

<!-- FORMULAIRE DE CONNEXION (EN HTML) -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="icon" type="image/png" href="../_assets/img/logoWeb.png">
    <link rel="stylesheet" href="../_assets/_css/styles.css">
    <script src="../_assets/_java/connection.js"></script>
</head>

<body>
    <h1 id="identifier">S'identifier</h1>
    <img src="../_assets/img/imgco.png" id="imgcon" alt="imgDebut">

    <form method="POST">
        <div class="container">

            <div class="parent">
                <label for="mail">EMAIL</label>
                <input type="email" id="mail" name="mail" placeholder="jean.bertrand@gmail.com">
                <p id="messageErreurMail" class="error"><?php echo $error_message; ?></p>
            </div>

            <div class="parent">
                <label for="mdp">MOT DE PASSE</label>
                <input type="mdp" id="mdp" name="mdp">
                <p id="messageErreurMdp" class="error"><?php echo $error_message; ?></p>
            </div>

            <button type="submit" id="valider_co">VALIDER</button>
        </div>
    </form>
</body>

</html>