<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Level Entry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Create New Level Entry</h1>

<?php
// Include database connection
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

// List of subjects
$subjects = [
    "Realiseert Software",
    "Werken in een ontwikkelteam",
    "Rekenen",
    "Burgerschap",
    "Nederlands",
    "Engels",
    "Loopbaan",
    "Gedrag/Professionaliteit/Persoonlijke Ontwikkeling"
];

// Check if the form was submitted for adding new entry
if (isset($_POST['add'])) {
    $level = $_POST['level'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];

    // Insert new entry into the database
    $sql = "INSERT INTO levels (level, subject, description) VALUES (:level, :subject, :description)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':level' => $level,
        ':subject' => $subject,
        ':description' => $description
    ]);

    // Provide feedback
    if ($stmt->rowCount() > 0) {
        echo "<p style='color: green;'>New entry added successfully.</p>";
    } else {
        echo "<p style='color: red;'>There was an issue adding the entry.</p>";
    }
}
?>

<!-- Form for Adding New Entry -->
<form method="post">
    <label for="level">Level</label>
    <select name="level" required>
        <option value="1">Level 1</option>
        <option value="2">Level 2</option>
        <option value="3">Level 3</option>
        <option value="4">Level 4</option>
        <option value="5">Level 5</option>
        <option value="6">Level 6</option>
        <option value="7">Level 7</option>
    </select>

    <label for="subject">Subject</label>
    <select name="subject" required>
        <?php foreach ($subjects as $subjectOption): ?>
            <option value="<?php echo htmlspecialchars($subjectOption); ?>">
                <?php echo htmlspecialchars($subjectOption); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="description">Description</label>
    <textarea name="description" required></textarea>

    <input type="submit" name="add" value="Add Entry">
</form>

</body>
</html>