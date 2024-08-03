<?php
include 'config.php';

//session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE (username = ? OR email = ?) AND password = ?");
    $stmt->execute([$username_or_email, $username_or_email, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: index.php');
    } else {
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Patients</h1>
        <h2>Connexion</h2>
        <?php if (isset($error_message)) { echo '<p class="error">' . $error_message . '</p>'; } ?>
        <form method="post">
            <label>Nom d'utilisateur ou Email:</label>
            <input type="text" name="username_or_email" required><br>
            <label>Mot de passe:</label>
            <input type="password" name="password" required><br>
            <button type="submit" class="button">Se connecter</button>
        </form>
        <a href="register.php" class="button">Créer un compte</a>
    </div>
</body>
</html>
