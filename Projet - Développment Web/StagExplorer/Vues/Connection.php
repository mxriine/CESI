<!-- FORMULAIRE DE CONNEXION (EN PHP) -->
<?php
require_once ('../Controleurs/connect.php');
?>

<!-- PAGE CONNECTION | Valider au validateur ✓ -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <!-- LOGO -->
    <link rel="icon" type="image/png" href="../_assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../_assets/_css/styles.css">
    <link rel="stylesheet" href="../_assets/_css/connection.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<body>
    <h1 id="identifier">S'identifier</h1>
    <img src="../_assets/img/imgco.png" id="img" alt="Image de connexion">

    <form method="POST">
        <div class="container">
            <div class="parent">
                <label for="mail">EMAIL</label>
                <input type="email" id="mail" name="mail" placeholder="Adresse Email">
                <p id="messageErreurMail" class="error"></p>
            </div>

            <div class="parent">
                <label for="mdp">MOT DE PASSE</label>
                <input type="password" id="mdp" name="mdp" placeholder="Mot de passe">
                <p id="messageErreurMdp" class="error"></p>
            </div>

            <button type="submit" id="submit">VALIDER</button>
        </div>

        <p class="error"> <?php echo $error_message; ?> </p>
    </form>
</body>

</html>