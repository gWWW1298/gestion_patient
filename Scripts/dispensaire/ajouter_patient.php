<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO patients (nom, prenom, date_naissance, adresse, telephone, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $date_naissance, $adresse, $telephone, $email]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Patient</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter un Patient</h1>
        <form method="post" onsubmit="return validatePatientForm()">
            <label>Nom:</label>
            <input type="text" name="nom" required><br>
            <label>Prénom:</label>
            <input type="text" name="prenom" required><br>
            <label>Date de naissance:</label>
            <input type="date" name="date_naissance"><br>
            <label>Adresse:</label>
            <input type="text" name="adresse"><br>
            <label>Téléphone:</label>
            <input type="text" name="telephone"><br>
            <label>Email:</label>
            <input type="email" name="email"><br>
            <button type="submit" class="button">Ajouter</button>
        </form>
        <a href="index.php" class="button">Retour</a>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
