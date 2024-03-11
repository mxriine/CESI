/** Import des modules **/
const { DataTypes } = require('sequelize');
const DB = require('../db.config');

/** Création du modèle User **/
const Entreprise = DB.define('Entreprise', {
    id: {
        type: DataTypes.INTEGER(10),
        autoIncrement: true,
        primaryKey: true
    },
    nom: {
        type: DataTypes.STRING(100),
        allowNull: false
    },
    description:{
        type: DataTypes.STRING(100),
        defaultValue: "",
        allowNull: false
    },
    nbstagiaire: {
        type: DataTypes.INTEGER(100),
        allowNull: false
    },
    moyenne: {
        type: DataTypes.FLOAT(100),
        allowNull: false
    },
    secteur: {
        type: DataTypes.STRING(100),
        allowNull: false
    }
}, { paranoid: true });

module.exports = Entreprise;