<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - ProjectHub</title>
</head>

<body>
    <h1>Login</h1>
	
    <?php if (!empty($_SESSION['error'])): ?>
        <p style="color:red;"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form action="/login" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
	
    <p>Don't have an account? <a href="/register">Register here</a></p>
</body>

</html>
