    <?php require_once '../app/views/partials/header.php'; ?>

    <main class="auth-container">
        <h1 class="auth-title">Login</h1>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class="error-msg"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="/login" method="POST" class="auth-form">
            <input type="email" name="email" placeholder="Email" required class="form-input">
            <input type="password" name="password" placeholder="Password" required class="form-input">
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>

        <p class="auth-alt-link">
            Voux n'avez pas de compte ? <a href="/register">Créez en un</a>
        </p>
    </main>

    <?php require_once '../app/views/partials/footer.php'; ?>