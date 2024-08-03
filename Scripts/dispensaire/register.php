<?php
include 'config.php';

//session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, telephone) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username, $email, $password, $telephone]);

    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Patients</h1>
        <h2>Inscription</h2>
        <form method="post" onsubmit="return validateRegisterForm()">
            <label>Nom d'utilisateur:</label>
            <input type="text" name="username" required><br>
            <label>Email:</label>
            <input type="email" name="email" required><br>
            <label>Mot de passe:</label>
            <input type="password" name="password" required><br>
            <label>Numéro de téléphone:</label>
            <input type="text" name="telephone" required><br>
            <button type="submit" class="button">S'inscrire</button>
        </form>
        <a href="login.php" class="button">Connexion</a>
    </div>
</body>
</html>
