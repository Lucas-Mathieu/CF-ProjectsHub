<?php

class UserController
{
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    // Show account page with user details
    public function showAccountPage()
    {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Vous devez être connecté pour voir cette page.";
            header('Location: /login');
            exit();
        }

        // Récupérer l'ID de l'utilisateur à partir de la session
        $userId = $_SESSION['user']['id'];
        
        // Obtenir les informations de l'utilisateur à partir du modèle
        $user = $this->userModel->getUserById($userId);

        // Afficher la page de compte avec les informations de l'utilisateur
        require_once '../app/views/auth/account.php';
    }

    // Handle the update of the user profile
    public function updateProfile()
    {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Vous devez être connecté pour mettre a jour votre profile.";
            header('Location: /login');
            exit();
        }

        // Vérifier si le formulaire est soumis via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtenir les données mises à jour de l'utilisateur depuis le formulaire
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            // Vérifier si les champs sont remplis
            if (empty($name) || empty($email)) {
                $_SESSION['error'] = "Tous les champs doivent être remplis.";
                header('Location: /account');
                exit();
            }

            // Récupérer l'ID de l'utilisateur depuis la session
            $userId = $_SESSION['user']['id'];

            // Mettre à jour le profil de l'utilisateur dans la base de données
            $this->userModel->updateUserProfile($userId, $name, $email);

            // Mettre à jour les données de l'utilisateur dans la session
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;

            // Rediriger vers la page de compte après la mise à jour
            $_SESSION['success'] = "Profile updated successfully.";
            header('Location: /account');
            exit();
        }
    }
}
?>
