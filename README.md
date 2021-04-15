## Index
1. Infos générales
2. Fonctionnalités
3. Utilisation
4. Prérequis

## 1) Infos générales
Nom du projet : my_meetic
Statut du projet : Fini.
    Version : 1.1  (bonus messagerie)
Auteur: Christopher Debray
Objectif (résumé du sujet) :
    Le but du projet est de créer un site de rencontres à la manière d’un Meetic.
    Utilisation de l'architecture MVC, programmation orienté objet.
    
## 2) Fonctionnalités
##### Si non connecté :
- Formulaire d'inscription
    - Nom
    - Prénom
    - Date de naissance (interdit au moins de 18 ans, vérification en JQuery et PHP)
    - Genre
    - Ville
    - E-mail
    - Mot de passe
    - Hobbies (au minimum 1)
        - Gestion de doublons (impossible d'utiliser plusieurs fois la même adresse email)
- Formulaire de connexion
- Affichage d'erreur en JQuery et en PHP.
        
##### Si connecté : 
- Page de compte du membre (avec possible modification du compte)
- Recherche de membres via filtres multiples (avec affichage type carousel fait en JQuery)
- Service de messagerie (chatroom)

## 3) Utilisation

###### Créer une base de données du nom de my_meetic et y importer le fichier "my_meetic.sql" 

##### Modifier le fichier "model/MainManager.php" dans la connexion à la PDO ($db) :
- Remplacer 'Utilisateur' par son nom d'utilisateur phpmyadmin , exemple 'Christopher'
- Remplacer 'MotDePasse' par son mot de passe phpmyadmin
    - ( Quelques données sont déjà présentes dans la base de données pour tester les différentes recherches )

## 4) Prérequis
JQuery.
PHP, MySQL
