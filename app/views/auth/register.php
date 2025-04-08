<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - ProjectHub</title>
</head>

<body>
    <h1>Register</h1>
	
    <?php if (!empty($_SESSION['error'])): ?>
        <p style="color:red;"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form action="/register" method="POST">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
	
    <p>Already have an account? <a href="/login">Login here</a></p>
</body>

</html>
