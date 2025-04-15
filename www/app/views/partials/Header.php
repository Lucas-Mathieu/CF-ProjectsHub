<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Hub</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="/">ProjectHub</a>
        </div>

        <nav class="navigation">
            <ul>
                <?php if (isset($_SESSION['user'])): ?>
					<li><a href="/posts">Posts</a></li>
                    <li><a href="/account">Compte</a></li>
                <?php else: ?>
					<li><a href="/posts">Posts</a></li>
                    <li><a href="/login">Connexion</a></li>
                    <li><a href="/register">Creer un compte</a></li>
                <?php endif; ?>
            </ul>

            <a href="#" class="toggle-menu">☰</a>

            <mobile class="mobile-menu">
                <ul>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li><a href="/posts">Posts</a></li>
                        <li><a href="/account">Compte</a></li>
                    <?php else: ?>
                        <li><a href="/posts">Posts</a></li>
                        <li><a href="/login">Connexion</a></li>
                        <li><a href="/register">Creer un compte</a></li>
                    <?php endif; ?>
                </ul>
            </mobile>
        </nav>
    </header>

<script src="/assets/js/burger.js"></script>