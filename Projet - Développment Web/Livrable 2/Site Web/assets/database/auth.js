/** Import des modules **/
const express = require('express');
const cors = require('cors');

/** Import de la connexion à la DB **/
let DB = require('./db.config');

/** Initialisation de l'API **/
const app = express();

app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

/** Mise en place du routage **/
app.get('/', (req, res) => res.send('Hello World! :)'));

app.get('*', (req, res) => res.status(404).send('Page not found'));

/** Lancement du serveur avec test DB **/
DB.authenticate()
    .then(() => {
        console.log('Database connection OK');
    })
    .then(() => {
        app.listen(process.env.SERVER_PORT, () => {
            console.log('Server is running on port ' + process.env.SERVER_PORT + '...')
        });
    })
    .catch(error => {
        console.log('Unable to connect to the database:', error);
    });
