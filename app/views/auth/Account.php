    <?php require_once '../app/views/partials/header.php'; ?>

    <main class="account-container">
        <h1 class="account-title">My Account</h1>

        <form action="/account" method="POST" class="account-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required class="form-input">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required class="form-input">

            <input type="submit" value="Update Profile" class="btn btn-primary">
        </form>

        <div class="account-actions">
            <a href="/logout" class="btn btn-red">Logout</a>
            <a href="/delete-account" class="btn btn-red">Delete Account</a>
        </div>
    </main>

    <?php require_once '../app/views/partials/footer.php'; ?>