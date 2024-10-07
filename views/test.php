<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Levels</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Manage Levels</h1>

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

// Check if the form was submitted for updating
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $level = $_POST['level'];
    $subject = $_POST['subject'];
    $description = $_POST['description'];

    // Update the database
    $sql = "UPDATE levels SET level = :level, subject = :subject, description = :description WHERE id = :id";
    $stmt = $db->prepare($sql);
    
    // Execute the update query with the form data
    $stmt->execute([
        ':level' => $level,
        ':subject' => $subject,
        ':description' => $description,
        ':id' => $id
    ]);

    // Provide feedback
    if ($stmt->rowCount() > 0) {
        echo "<p style='color: green;'>Record updated successfully.</p>";
    } else {
        echo "<p style='color: red;'>No changes were made or the record could not be updated.</p>";
    }
}

// Fetch all entries
$sql = "SELECT id, level, subject, description FROM levels";
$stmt = $db->query($sql);
$levels = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Editable Table -->
<table>
    <tr>
        <th>ID</th>
        <th>Level</th>
        <th>Subject</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

    <?php foreach ($levels as $level): ?>
    <tr>
        <form method="post">
            <td><?php echo htmlspecialchars($level['id']); ?></td>
            <td>
                <select name="level">
                    <option value="1" <?php echo $level['level'] == 1 ? 'selected' : ''; ?>>Level 1</option>
                    <option value="2" <?php echo $level['level'] == 2 ? 'selected' : ''; ?>>Level 2</option>
                    <option value="3" <?php echo $level['level'] == 3 ? 'selected' : ''; ?>>Level 3</option>
                    <option value="4" <?php echo $level['level'] == 4 ? 'selected' : ''; ?>>Level 4</option>
                    <option value="5" <?php echo $level['level'] == 5 ? 'selected' : ''; ?>>Level 5</option>
                    <option value="6" <?php echo $level['level'] == 6 ? 'selected' : ''; ?>>Level 6</option>
                    <option value="7" <?php echo $level['level'] == 7 ? 'selected' : ''; ?>>Level 7</option>
                </select>
            </td>
            <td>
                <select name="subject">
                    <?php foreach ($subjects as $subjectOption): ?>
                        <option value="<?php echo htmlspecialchars($subjectOption); ?>" <?php echo $level['subject'] == $subjectOption ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($subjectOption); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><textarea name="description"><?php echo htmlspecialchars($level['description']); ?></textarea></td>
            <td>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($level['id']); ?>">
                <input type="submit" name="update" value="Update">
            </td>
        </form>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>