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
        // Check if the user is logged in
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Vous devez être connecté pour voir cette page.";
            header('Location: /login');
            exit();
        }

        // Get the user ID from the session
        $userId = $_SESSION['user']['id'];
        
        // Get the user details from the database
        $user = $this->userModel->getUserById($userId);

        // Get the user profile picture path
        $pfpPath = "uploads/pfps/{$userId}/avatar.jpg";
        if (!file_exists($pfpPath)) {
            $pfpPath = "uploads/pfps/0/avatar.jpg"; // Default avatar path
        }

        // Show the account page with user details
        require_once '../app/views/auth/account.php';
    }

    public function uploadProfilePicture()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Vous devez être connecté.";
            header('Location: /login');
            exit();
        }

        $userId = $_SESSION['user']['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
            $uploadDir = __DIR__ . "/../../www/uploads/pfps/{$userId}";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $targetPath = $uploadDir . "/avatar.jpg";
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['avatar']['type'], $allowedTypes)) {
            move_uploaded_file($_FILES['avatar']['tmp_name'], $targetPath);
            $_SESSION['user']['pfp_path'] = "/uploads/pfps/{$userId}/avatar.jpg";
            $_SESSION['success'] = "Photo de profil mise à jour.";
        } else {
            $_SESSION['error'] = "Format de fichier invalide.";
        }

        header('Location: /account');
        exit();
    }

    // Handle the update of the user profile
    public function updateProfile()
    {
        // Checker if the user is logged in
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Vous devez être connecté pour mettre a jour votre profile.";
            header('Location: /login');
            exit();
        }

        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            // Check if the fields are empty
            if (empty($name) || empty($email)) {
                $_SESSION['error'] = "Tous les champs doivent être remplis.";
                header('Location: /account');
                exit();
            }

            // Get the user ID from the session
            $userId = $_SESSION['user']['id'];

            // Update the user profile in the database
            $this->userModel->updateUserProfile($userId, $name, $email);

            // Update the session with the new user data
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;

            // Redirect to the account page with a success message
            $_SESSION['success'] = "Profile updated successfully.";
            header('Location: /account');
            exit();
        }
    }
}
?>
