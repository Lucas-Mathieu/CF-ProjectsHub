    <?php require_once '../app/views/partials/header.php'; ?>

    <main class="account-container">
        <h1 class="account-title">My Account</h1>

        <form action="/account" method="POST" class="account-form">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required class="form-input">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required class="form-input">

            <input type="submit" value="Mettre a jour" class="btn btn-primary">
        </form>

        <div class="pfp">
            <img src="<?= htmlspecialchars($_SESSION['user']['pfp_path'])?>" alt="Image de profil" class="profile-image">
        </div>

        <form action="/upload-pfp" method="POST" enctype="multipart/form-data" class="upload-pfp-form">
            <input type="file" name="avatar" accept="image/*" required class="form-input">
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <div class="account-actions">
            <a href="/logout" class="btn btn-red">Déconnexion</a>
            <a href="/delete-account" class="btn btn-red">Supprimer compte</a>
        </div>
    </main>

    <?php require_once '../app/views/partials/footer.php'; ?>