<?php
// Start session if not already started
session_start();

// Load dependencies
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/PostController.php';
require_once '../app/controllers/UserController.php';

require_once '../app/models/PostModel.php';
require_once '../app/models/UserModel.php';
require_once '../app/models/CommentModel.php';

// Instantiate models and controllers
$postModel = new PostModel();
$userModel = new UserModel();
$commentModel = new CommentModel();

$authController = new AuthController($userModel);
$postController = new PostController($postModel, $commentModel);
$userController = new UserController($userModel);

// Get the URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Routing logic
switch (true) {

    // Home page
    case $uri === '/':
        $postController->showHomePage();
        break;

    // Login page (GET) and login handling (POST)
    case $uri === '/login':
        $method === 'POST' 
            ? $authController->login() 
            : $authController->showLoginForm();
        break;

    // Register page (GET) and registration handling (POST)
    case $uri === '/register':
        $method === 'POST' 
            ? $authController->register() 
            : $authController->showRegisterForm();
        break;

    // Show account page (GET) and handle profile update (POST)
    case $uri === '/account':
        $method === 'POST' 
            ? $userController->updateProfile()
            : $userController->showAccountPage();
        break;

    // Admin dashboard (GET only)
    case $uri === '/admin':
        $userController->showAdminDashboard();
        break;

    // List all posts
    case $uri === '/posts' && $method === 'GET':
        $postController->showPostsList();
        break;

    // Show a specific post and its comments
    case preg_match('#^/post/(\d+)$#', $uri, $matches):
        $postId = $matches[1];
        $postController->showPostDetail($postId);
        break;

    // Upload profile picture
    case $uri === '/upload-pfp' && $method === 'POST':
        $userController->uploadProfilePicture();
        break;

    // Logout
    case $uri === '/logout':
        $authController->logout();
        break;

    // Delete account
    case $uri === '/delete-account':
        $authController->deleteAccount();
        break;

    // Fallback 404
    default:
        http_response_code(404);
        echo '404 - Page not found';
        break;
}
?>