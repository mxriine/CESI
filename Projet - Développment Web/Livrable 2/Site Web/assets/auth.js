const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

// Configuration de la connexion à la base de données
const connexion = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'Marinette.0803',
    database: 'projet_web'
});

// Connexion à la base de données
connexion.connect((erreur) => {
    if (erreur) {
        console.error('Échec de la connexion à la base de données : ' + erreur.stack);
        return;
    }

    console.log('Connexion à la base de données réussie');
});

const app = express();

const port = process.env.PORT || 3000;
app.listen(port, () => {
    console.log(`Serveur démarré sur le port ${port}`);
});