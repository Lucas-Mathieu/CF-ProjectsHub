<?php

class AuthController
{
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    // Show login form
    public function showLoginForm()
    {
        require '../app/views/auth/login.php';
    }

    // Show register form
    public function showRegisterForm()
    {
        require '../app/views/auth/register.php';
    }

    // Handle login logic
    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Please fill all fields.";
            header('Location: /login');
            exit;
        }

        $user = $this->userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'is_verified' => $user['is_verified'],
                'is_admin' => $user['is_admin']
            ];
            header('Location: /account');
            exit;
        } else {
            $_SESSION['error'] = "Invalid credentials.";
            header('Location: /login');
            exit;
        }
    }

    // Handle registration logic
    public function register()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            $_SESSION['error'] = "Please fill all fields.";
            header('Location: /register');
            exit;
        }

        if ($this->userModel->getUserByEmail($email)) {
            $_SESSION['error'] = "Email already registered.";
            header('Location: /register');
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $this->userModel->createUser($name, $email, $hashedPassword);

        $user = $this->userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'is_verified' => $user['is_verified'],
                'is_admin' => $user['is_admin']
            ];
            $_SESSION['success'] = "Account created.";
            header('Location: /account');
            exit;
        } else {
            $_SESSION['error'] = "An error occured.";
            header('Location: /register');
            exit;
        }

    }

    // Logout the user
    public function logout()
    {
        session_destroy();
        header('Location: /');
        exit;
    }
}
?>