# OmnéBlog

Le site a été démarré sous serveur Apache, avec l'outil XAMPP, sur Google Chrome avec PHP 8.1
<br>
L'aspect Apache est important car sur un serveur Nginx le routage n'est pas géré de la même manière

## Arborescence

index.php => Routeur <br>
helper.php => Aide pour la génération de liens et les chemins relatifs<br>
|-- style => Les fichier css<br>
|-- views => Les vues PHP<br>
|-- models => Fichiers PHP pour accès aux bases de données<br>
|-- js => Scripts JavaScripts pour la traduction, le mode nuit et les onglets du profil<br>
|-- img => Pour mes belles icônes représentant le thème clair/sombre<br>
|-- controllers => Gestion de la logique des pages<br>

## Base de données
Testée sur MariaDB, le sql de configuration est [ici](blog.sql)<br>
Pour changer les détails de connexion à la base de données c'est [ici](models/db_connect.php)

## Compte de test

User : EmpereurWaza<br>
Mot de Passe : LeRoiSoleil