<?php
include 'config.php';

// Supprimer une consultation
if (isset($_GET['delete_consultation'])) {
    $id = $_GET['delete_consultation'];
    $stmt = $pdo->prepare("DELETE FROM consultations WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: consultations.php?patient_id=' . $_GET['patient_id']);
    exit();
}

if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];
    $stmt = $pdo->prepare("SELECT * FROM consultations WHERE patient_id = ?");
    $stmt->execute([$patient_id]);
    $consultations = $stmt->fetchAll();
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Consultations du Patient</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Consultations du Patient</h1>
        <a href="ajouter_consultation.php?patient_id=<?php echo $patient_id; ?>" class="button">Ajouter une consultation</a>
        <table>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($consultations as $consultation): ?>
                <tr>
                    <td><?php echo $consultation['date_consultation']; ?></td>
                    <td><?php echo $consultation['description']; ?></td>
                    <td>
                        <button class="actionModifier"><a href="modifier_consultation.php?id=<?php echo $consultation['id']; ?>">Modifier</a></button>
                        <button class="actionSupp"><a href="consultations.php?delete_consultation=<?php echo $consultation['id']; ?>&patient_id=<?php echo $patient_id; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette consultation ?')">Supprimer</a></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php" class="button">Retour</a>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
