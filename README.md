# Coding Factory - ProjectHub

Bienvenue sur le dépôt du projet **Coding Factory - ProjectHub**, développé dans le cadre de l’EC Projet Web à la Coding Factory (avril 2025).  
Ce site permet aux étudiants de partager, consulter et commenter des projets.

[Accéder au Site web](http://cf-projecthub.alwaysdata.net/posts)

## Suivi de projet

Le backlog complet du projet est disponible sur Trello :  
[Accéder au Trello du projet](https://trello.com/b/cnsd4DM9/projects-hub)

## Structure du dépôt

<br />
/www               → Code source du site (HTML, CSS, JS, PHP)<br />
  ├── app/         → Logique métier organisée selon le modèle MVC<br />
  │   ├── controllers/  → Contrôleurs (gestion des requêtes utilisateur)<br />
  │   ├── models/       → Modèles (interaction avec la base de données)<br />
  │   └── views/        → Vues (fichiers d’affichage HTML + PHP)<br />
  │        ├── auth/        → Pages liées à l’authentification<br />
  │        ├── partials/    → Éléments réutilisables (header, footer, etc.)<br />
  │        └── posts/       → Pages relatives aux projets<br />
  ├── core/         → Fichiers de configuration et de routage<br />
  ├── assets/       → Fichiers statiques (CSS, JS, images)<br />
  ├── uploads/      → Répertoire des fichiers uploadés par les utilisateurs<br />
  ├── .htaccess     → Réécriture d’URL (routing)<br />
  └── index.php     → Point d’entrée du site (front controller)<br />
<br />
/doc → Documentation technique <br />
  ├── backlog.txt → Lien vers le backlog trello <br />
  ├── bdd_dump.sql → Structure actuelle de la base de données <br />
  └── insert_sample_data.sql → Données de test <br />
