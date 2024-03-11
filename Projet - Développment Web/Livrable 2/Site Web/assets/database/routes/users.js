/** Import des modules **/
const express = require('express');

const User = require('../models/user');

/** Initialisation du router **/
let router = express.Router();

/** Définition des routes **/
router.get('', (req, res) => {
    User.findAll()
        .then(users => {
            res.json({data: users});
        })
        .catch(error => {
            res.status(500).send('Database Error: ' + error);
        });
})

router.get('/:id', (req, res) => {
    let userId = parseInt(req.params.id);

    // Vérification de la validité de l'ID
    if (!userId || isNaN(userId)) {
        return res.status(400).json({ message: 'Missing Parameter' });
    }

    // Récupération de l'utilisateur
    User.findOne({ where: { id: userId }, raw: true })
        .then(user => {
            if (!user || user === null) {
                return res.status(404).json({ message: 'User not found' });
            }

            // Utilisateur trouvé
            return res.json({ data: user });
        })
        .catch(error => {
            res.status(500).json({ message: 'Database Error: ' + error });
        });
})

router.put('', (req, res) => {
    const {nom, prenom, password, email} = req.body;

    //Validation des données
    if(!nom || !prenom || !password || !email){
        return res.status(400).json({message: 'Missing data'});
    }

    User.findOne({where: {email: email}, raw: true})
        .then(user => {
            // Vérification de l'existence de l'utilisateur
            if(user !== null){
                return res.status(409).json({message: `The user ${nom} already exists`});
            }

            // Création de l'utilisateur
            User.create(req.body)
                .then(user => {
                    res.json({message: 'User Created', data: user});
                })
                .catch(error => {
                    res.status(500).json({message: 'Database Error: ' + error});
                });
        })
})

router.patch('/:id')

router.delete('/:id')


