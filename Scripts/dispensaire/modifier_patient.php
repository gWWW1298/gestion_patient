<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM patients WHERE id = ?");
    $stmt->execute([$id]);
    $patient = $stmt->fetch();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_naissance = $_POST['date_naissance'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];

        $stmt = $pdo->prepare("UPDATE patients SET nom = ?, prenom = ?, date_naissance = ?, adresse = ?, telephone = ?, email = ? WHERE id = ?");
        $stmt->execute([$nom, $prenom, $date_naissance, $adresse, $telephone, $email, $id]);

        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Patient</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier un Patient</h1>
        <form method="post" onsubmit="return validatePatientForm()">
            <label>Nom:</label>
            <input type="text" name="nom" value="<?php echo $patient['nom']; ?>" required><br>
            <label>Prénom:</label>
            <input type="text" name="prenom" value="<?php echo $patient['prenom']; ?>" required><br>
            <label>Date de naissance:</label>
            <input type="date" name="date_naissance" value="<?php echo $patient['date_naissance']; ?>"><br>
            <label>Adresse:</label>
            <input type="text" name="adresse" value="<?php echo $patient['adresse']; ?>"><br>
            <label>Téléphone:</label>
            <input type="text" name="telephone" value="<?php echo $patient['telephone']; ?>"><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $patient['email']; ?>"><br>
            <button type="submit" class="button">Modifier</button>
        </form>
        <a href="index.php" class="button">Retour</a>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
