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

## Instructions pour héberger le site<br /><br />
Pour héberger le site Coding Factory - ProjectHub, suivez les étapes suivantes :<br /><br />

Configurer la base de données :<br />
Créez une base de données MySQL sur votre serveur.<br />
Importez la structure de la base de données à partir du fichier /doc/bdd_dump.sql.<br />
(Optionnel) Pour ajouter des données de test, importez le fichier /doc/insert_sample_data.sql.<br />
Mettez à jour le fichier www/core/Database.php avec les informations de connexion à votre base de données. Remplacez les valeurs de host, dbname, username et password dans le code suivant :<br /><br />

```
class Database
{
    private static $instance = null;

    public static function getConnection()
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host=localhost;dbname=projecthub;charset=utf8mb4',
                    'root',
                    ''
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
```
<br />
Configurer l’envoi d’emails :<br />
Mettez à jour le fichier www/core/EmailUtil.php avec votre nom de domaine pour l’envoi des emails. Remplacez votre-nom-de-domaine par votre domaine réel dans les lignes $headers = "From: no-reply@votre-nom-de-domaine\r\n"; pour les méthodes sendVerificationEmail et sendPasswordResetEmail. Voici le code à modifier :<br /><br />

```
class EmailUtil
{
    public static function sendVerificationEmail($to, $name, $code)
    {
        $subject = "Vérifiez votre compte";
        $message = "Bonjour $name,\n\nVoici votre code de vérification : $code\n\nMerci de vérifier votre compte.\n\nCordialement,\nCF Project Hub";
        $headers = "From: no-reply@votre-nom-de-domaine\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Encode subject for UTF-8
        $encodedSubject = mb_encode_mimeheader($subject, "UTF-8", "B", "\r\n");

        return mail($to, $encodedSubject, $message, $headers);
    }

    public static function sendPasswordResetEmail($to, $name, $code)
    {
        $subject = "Réinitialisez votre mot de passe";
        $message = "Bonjour $name,\n\nVoici votre code de réinitialisation : $code\n\nMerci de réinitialiser votre mot de passe.\n\nCordialement,\nCF Project Hub";
        $headers = "From: no-reply@votre-nom-de-domaine\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Encode subject for UTF-8
        $encodedSubject = mb_encode_mimeheader($subject, "UTF-8", "B", "\r\n");

        return mail($to, $encodedSubject, $message, $headers);
    }
}
```
<br />
Déployer le code :<br />
Transférez le contenu du dossier /www vers le répertoire racine de votre serveur web (par exemple, /var/www/html ou le dossier public de votre hébergeur).<br />
Assurez-vous que le répertoire uploads/ dispose des permissions d’écriture (par exemple, chmod 755 uploads).<br />
Configurez votre serveur web (Apache, Nginx, etc.) pour pointer vers le fichier index.php comme point d’entrée.<br /><br />
Vérifier la configuration :<br />
Accédez à votre site via un navigateur pour vérifier que la connexion à la base de données fonctionne.<br />
Testez les fonctionnalités d’envoi d’emails (vérification de compte et réinitialisation de mot de passe) pour vous assurer que les emails sont envoyés correctement.<br /><br />
