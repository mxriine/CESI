### Mettre votre site sur un virtual host

# Première Etape | Configuration du serveur Apache

Ouvrez le fichier httpd-vhosts.conf dans un éditeur. Avec XAMPP vous le trouverez à l’adresse suivante :

`C:\xampp\apache\conf\extra\httpd-vhosts.conf`

Ajoutez le code ci-après à la fin du fichier

```
NameVirtualHost *:80

<VirtualHost *:80>
    ServerAdmin mazou.marine@gmail.com
    DocumentRoot "C:/www/StagExplorer/Vues"
    ServerName StagExplorer

    <Directory "C:/www/StagExplorer/Vues">
        Allow all
        Require all granted
    </Directory>

</VirtualHost>
```
