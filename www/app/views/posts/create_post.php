    <?php require_once '../app/views/partials/header.php'; ?>

    <h2>Créer un nouveau post</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red"><?= $_SESSION['error'] ?></p>
    <?php unset($_SESSION['error']); endif; ?>

    <form action="/create-post" method="POST" enctype="multipart/form-data">
        <label for="title">Titre :</label><br>
        <input type="text" name="title" id="title" maxlength="30" required><br><br>

        <label for="content">Contenu :</label><br>
        <textarea name="content" id="content" rows="5" cols="50" required></textarea><br><br>

        <label for="image">Image (optionnelle) :</label><br>
        <input type="file" name="image" id="image" accept="image/*"><br><br>

        <button type="submit">Publier</button>
    </form>

    <?php require_once '../app/views/partials/footer.php'; ?>