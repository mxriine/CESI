/** Import des modules **/
const { DataTypes } = require('sequelize');
const DB = require('../db.config');

/** Création du modèle User **/
const User = DB.define('User', {
    id: {
        type: DataTypes.INTEGER(10),
        autoIncrement: true,
        primaryKey: true
    },
    nom: {
        type: DataTypes.STRING(100),
        allowNull: false
    },
    prenom: {
        type: DataTypes.STRING(100),
        allowNull: false
    },
    mdp: {
        type: DataTypes.STRING(64),
        is: /^[0-9a-f]{64}$/i,    // Vérifie que le mot de passe est bien au bon format
        allowNull: false
    },
    email: {
        type: DataTypes.STRING,
        validate: {
            isEmail: true    // Vérifie que l'adresse email est bien au bon format
        },
        allowNull: false
    }
}, { paranoid: true });

module.exports = User;