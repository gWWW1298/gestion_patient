<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM consultations WHERE id = ?");
    $stmt->execute([$id]);
    $consultation = $stmt->fetch();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date_consultation = $_POST['date_consultation'];
        $description = $_POST['description'];

        $stmt = $pdo->prepare("UPDATE consultations SET date_consultation = ?, description = ? WHERE id = ?");
        $stmt->execute([$date_consultation, $description, $id]);

        header('Location: consultations.php?patient_id=' . $consultation['patient_id']);
    }
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une Consultation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Modifier une Consultation</h1>
        <form method="post" onsubmit="return validateConsultationForm()">
            <label>Date de consultation:</label>
            <input type="date" name="date_consultation" value="<?php echo $consultation['date_consultation']; ?>" required><br>
            <label>Description:</label>
            <textarea name="description" required><?php echo $consultation['description']; ?></textarea><br>
            <button type="submit" class="button">Modifier</button>
        </form>
        <a href="consultations.php?patient_id=<?php echo $consultation['patient_id']; ?>" class="button">Retour</a>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
