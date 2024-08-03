<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Supprimer un patient
if (isset($_GET['delete_patient'])) {
    $id = $_GET['delete_patient'];
    $stmt = $pdo->prepare("DELETE FROM patients WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Patients</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Patients</h1>
        <a href="ajouter_patient.php" class="button">Ajouter un patient</a>
        <a href="logout.php" class="button">Déconnexion</a>
        <h2>Liste des patients</h2>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php
            $stmt = $pdo->query('SELECT * FROM patients');
            while ($row = $stmt->fetch()) {
                echo '<tr>';
                echo '<td>' . $row['nom'] . '</td>';
                echo '<td>' . $row['prenom'] . '</td>';
                echo '<td>' . $row['date_naissance'] . '</td>';
                echo '<td>' . $row['adresse'] . '</td>';
                echo '<td>' . $row['telephone'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>
                        <button class="actionConsultation"><a href="consultations.php?patient_id=' . $row['id'] . '">Consultations</a> </button> 
                        <button class="actionModifier"><a href="modifier_patient.php?id=' . $row['id'] . '">Modifier</a> </button> 
                        <button class="actionSupp"><a href="index.php?delete_patient=' . $row['id'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce patient ?\')">Supprimer</a><button>
                      </td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
