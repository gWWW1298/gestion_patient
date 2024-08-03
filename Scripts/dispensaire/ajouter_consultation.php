<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $date_consultation = $_POST['date_consultation'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO consultations (patient_id, date_consultation, description) VALUES (?, ?, ?)");
    $stmt->execute([$patient_id, $date_consultation, $description]);

    header('Location: consultations.php?patient_id=' . $patient_id);
}

if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Consultation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter une Consultation</h1>
        <form method="post" onsubmit="return validateConsultationForm()">
            <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
            <label>Date de consultation:</label>
            <input type="date" name="date_consultation" required><br>
            <label>Description:</label>
            <textarea name="description" required></textarea><br>
            <button type="submit" class="button">Ajouter</button>
        </form>
        <a href="consultations.php?patient_id=<?php echo $patient_id; ?>" class="button">Retour</a>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
