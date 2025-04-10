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
        $postController->showPostsList();
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

    // Ajouter un commentaire
    case $uri === '/ajax/add-comment' && $method === 'POST':
        header('Content-Type: application/json');
        if (!isset($_SESSION['user']) || !$_SESSION['user']['is_verified']) {
            echo json_encode(['success' => false, 'error' => 'Non autorisé']);
            exit;
        }
        $commentModel->addComment($_SESSION['user']['id'], $_POST['post_id'], $_POST['text']);
        // Recharge juste le dernier commentaire pour l'ajouter dynamiquement
        $comments = $commentModel->getCommentsByPostId($_POST['post_id']);
        $lastComment = end($comments);
        ob_start();
        include '../app/views/partials/comment.php';
        $html = ob_get_clean();
        echo json_encode(['success' => true, 'html' => $html]);
        exit;

    // Ajouter une réponse
    case $uri === '/ajax/add-reply' && $method === 'POST':
        header('Content-Type: application/json');
        if (!isset($_SESSION['user']) || !$_SESSION['user']['is_verified']) {
            echo json_encode(['success' => false, 'error' => 'Non autorisé']);
            exit;
        }
        $commentModel->addReply($_SESSION['user']['id'], $_POST['post_id'], $_POST['comment_id'], $_POST['text']);
        // Recharge la dernière réponse
        $comments = $commentModel->getCommentsByPostId($_POST['post_id'] ?? 0);
        $target = null;
        foreach ($comments as $comment) {
            if ($comment['id'] == $_POST['comment_id']) {
                $target = $comment;
                break;
            }
        }
        $lastReply = end($target['replies']);
        ob_start();
        include '../app/views/partials/reply.php';
        $html = ob_get_clean();
        echo json_encode(['success' => true, 'html' => $html]);
        exit;


    // Fallback 404
    default:
        http_response_code(404);
        echo '404 - Page not found';
        break;
}
?>