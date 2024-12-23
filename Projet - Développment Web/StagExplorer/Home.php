<!-- PAGE MAIN | Valider au validateur ✓ -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StagExplorer</title>
    <!-- LOGO -->
    <link rel="icon" type="image/png" href="_assets/img/logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="_assets/_css/other/styles.css">
    <!-- CSS police -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <!-- CSS icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JS -->
    <script src="_assets/_js/script.js"></script>
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", sans-serif
        }

        body,
        html {
            height: 100%;
            line-height: 1.8;
        }

        /* Full height image header */
        .bgimg-1 {
            background-position: center;
            background-size: cover;
            background-color: rgba(37, 37, 37, 1);
            min-height: 100%;
        }

        .bar .button {
            padding: 16px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="top">
        <div class="bar white card" id="myNavbar">
            <a href="#home" class="bar-item button wide">StagExplorer</a>


            <!-- A droite -->
            <div class="right hide-small">
                <a href="#about" class="bar-item button">ABOUT</a>
                <a href="#team" class="bar-item button"><i class="fa fa-user"></i> TEAM</a>
                <a href="#work" class="bar-item button"><i class="fa fa-th"></i> WORK</a>
                <a href="#contact" class="bar-item button"><i class="fa fa-envelope"></i> CONTACT</a>
            </div>

            <!-- Masquer les liens affichés à droite sur les petits écrans et les remplacer par une icône de menu -->
            <a href="javascript:void(0)" class="bar-item button right hide-large hide-medium" onclick="openSidebar()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>

    <!-- Barre latérale sur les petits écrans lorsque l'on clique sur l'icône du menu -->
    <nav class="sidebar bar-block black card animate-left hide-medium hide-large" style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="closeSidebar()" class="bar-item button large padding-16">Close
            ×</a>
        <a href="#about" onclick="closeSidebar()" class="bar-item button">ABOUT</a>
        <a href="#team" onclick="closeSidebar()" class="bar-item button">TEAM</a>
        <a href="#work" onclick="closeSidebar()" class="bar-item button">WORK</a>
        <a href="#contact" onclick="closeSidebar()" class="bar-item button">CONTACT</a>
    </nav>

    <!-- En-tête avec image pleine hauteur -->
    <header class="bgimg-1 display-container grayscale-min" id="home">
        <div class="display-left text-white" style="padding:48px">
            <span class="jumbo hide-small">StagExplorer</span><br>
            <span class="xxlarge hide-large hide-medium">StagExplorer</span><br>
            <span class="large">Ne perdez plus de temps précieux avec des stages qui ne vous conviennent pas.</span>
            <p><a href="/Vues/Search.php"
                    class="button white padding-large large margin-top opacity hover-opacity-off">En
                    savoir plus et chercher dès aujourd'hui</a></p>
        </div>
        <div class="display-bottomleft text-grey large" style="padding:24px 48px">
            <i class="fa fa-facebook-official hover-opacity"></i>
            <i class="fa fa-instagram hover-opacity"></i>
            <i class="fa fa-snapchat hover-opacity"></i>
            <i class="fa fa-pinterest-p hover-opacity"></i>
            <i class="fa fa-twitter hover-opacity"></i>
            <i class="fa fa-linkedin hover-opacity"></i>
        </div>
    </header>

</body>

</html>