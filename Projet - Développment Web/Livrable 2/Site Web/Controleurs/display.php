<!-- RECUPERATION DES DONNEES (EN PHP) -->
<?php

$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'inconnu';
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';

// Afficher un bouton différent en fonction du rôle de l'utilisateur
switch ($role) {
    case 'admin':
        // Affichage de la navigation par défaut pour les administrateurs
        echo '<section>
                <nav class="barreR">
                    <label class="search">Rechercher:</label>
                        <div>
                            <input type="radio" id="entreprise" name="navigation" value="entreprise">
                            <label for="entreprise">Entreprises</label>
                        </div>
                        <div>
                            <input type="radio" id="offre" name="navigation" value="offre" checked>
                            <label for="offres">Offres</label>
                        </div>
                        <div>
                            <input type="radio" id="etudiant" name="navigation" value="etudiant">
                            <label for="etudiants">Etudiants</label>
                        </div>
                        <div>
                            <input type="radio" id="pilote" name="navigation" value="pilote">
                            <label for="pilotes">Pilotes</label>
                        </div>
                    </nav>
                </section>';
        break;
    case 'pilote':
        // Affichage de la navigation par défaut pour les pilotes et étudiants
        echo '<section>
                <nav class="barreR">
                    <label class="search">Rechercher:</label>
                        <div>
                            <input type="radio" id="entreprise" name="navigation" value="entreprise">
                            <label for="entreprise">Entreprises</label>
                        </div>
                        <div>
                            <input type="radio" id="offre" name="navigation" value="offre" checked>
                            <label for="offres">Offres</label>
                        </div>
                        <div>
                            <input type="radio" id="etudiant" name="navigation" value="etudiant">
                            <label for="etudiants">Etudiants</label>
                        </div>
                    </nav>
                </section>';
        break;
    case 'etudiant':
        // Affichage de la navigation par défaut pour les pilotes et étudiants
        echo '<section>
                <nav class="barreR">
                    <label class="search">Rechercher:</label>
                        <div>
                            <input type="radio" id="entreprise" name="navigation" value="entreprise">
                            <label for="entreprise">Entreprises</label>
                        </div>
                        <div>
                            <input type="radio" id="offre" name="navigation" value="offre" checked>
                            <label for="offres">Offres</label>
                        </div>
                    </nav>
                </section>';
        break;
    default:
        // Redirection vers la page de connexion si le rôle n'est pas défini
        header('Location: ../Vues/connection.php');
        exit(); // Assurez-vous de terminer le script après la redirection
}

