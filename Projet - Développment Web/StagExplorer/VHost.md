## Configuration d'un virtual host

La création d’un virtual host se fait en deux étapes :
- Définition des virtual hosts sur le serveur Apache
- Ajout d’un nouveau domaine dans le fichier hosts de l’ordinateur

### Première Etape | Configuration du serveur Apache

Ouvrez le fichier httpd-vhosts.conf dans un éditeur. Avec XAMPP vous le trouverez à l’adresse suivante :

`C:\xampp\apache\conf\extra\httpd-vhosts.conf`

Ajoutez le code ci-après à la fin du fichier

```
NameVirtualHost *:80

<VirtualHost *:80>
    ServerAdmin mazou.marine@gmail.com
    DocumentRoot "C:/www/StagExplorer/Vues"
    ServerName StagExplorer.com

    <Directory "C:/www/StagExplorer/Vues">
        Allow all
        Require all granted
    </Directory>

</VirtualHost>
```

Ce code définit les virtual hosts du serveur. Pour définir un virtual host on a besoin de deux informations essentielles :
- Le nom du domaine : ServerName
- Le dossier racine du site : DocumentRoot

### Deuxième Etape | Ajout d’un domaine à l’ordinateur

Ouvrez le fichier hosts dans un éditeur. Généralement, sous windows, le fichier hosts se trouve dans le dossier caché ci-dessous :

`C:\windows\system32\drivers\etc\hosts`

Copiez la ligne ci-après à la fin du fichier hosts et sauvegardez le fichier.

```
# Projet Web /
127.0.0.1      StagExplorer.com
```

Ce code indique que le domaine StagExplorer correspond à l’adresse IP 127.0.0.1. Petit rappel l’adresse 127.0.0.1 représente l’ordinateur lui-même.

Vous pouvez maintenant accèder à votre serveur web depuis deux addresse :

```
http://localhost/
http://StagExplorer.com
```

*!* Sauvegardez les modification de httpd-vhosts.conf et redémarrez le serveur Apache. *!*

Et voilà !
