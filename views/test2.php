<?php
// Include database connection
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

// Initialize query variables
$filters = [];
$params = [];

// Check if filtering is being used
if (isset($_GET['subject']) && $_GET['subject'] != '') {
    $filters[] = "subject = :subject";
    $params[':subject'] = $_GET['subject'];
}

if (isset($_GET['level']) && $_GET['level'] != '') {
    $filters[] = "level = :level";
    $params[':level'] = $_GET['level'];
}

// Build the SQL query with filters and default sorting
$sql = "SELECT * FROM levels";
if (!empty($filters)) {
    $sql .= " WHERE " . implode(" AND ", $filters);
}
$sql .= " ORDER BY subject ASC, level ASC";  // Sort by subject first, then by level

$stmt = $db->prepare($sql);
$stmt->execute($params);
$levels = $stmt->fetchAll(PDO::FETCH_ASSOC);

// List of subjects and levels for the filter dropdowns
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
$levelsList = [1, 2, 3, 4, 5, 6, 7];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levels Table with Sorting</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Levels Table</h2>

<!-- Filtering Form -->
<form method="get">
    <label for="subject">Filter by Subject:</label>
    <select name="subject" id="subject">
        <option value="">All Subjects</option>
        <?php foreach ($subjects as $subjectOption): ?>
            <option value="<?php echo htmlspecialchars($subjectOption); ?>" 
                <?php echo (isset($_GET['subject']) && $_GET['subject'] == $subjectOption) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($subjectOption); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="level">Filter by Level:</label>
    <select name="level" id="level">
        <option value="">All Levels</option>
        <?php foreach ($levelsList as $levelOption): ?>
            <option value="<?php echo $levelOption; ?>" 
                <?php echo (isset($_GET['level']) && $_GET['level'] == $levelOption) ? 'selected' : ''; ?>>
                Level <?php echo $levelOption; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Filter">
</form>

<!-- Table to Display Filtered and Sorted Results -->
<table>
    <tr>
        <th>ID</th>
        <th>Education ID</th>
        <th>Level</th>
        <th>Subject</th>
        <th>Description</th>
        <th>Deliverables</th>
    </tr>

    <?php if (!empty($levels)): ?>
        <?php foreach ($levels as $level): ?>
        <tr>
            <td><?php echo htmlspecialchars($level['id']); ?></td>
            <td><?php echo htmlspecialchars($level['educationId']); ?></td>
            <td><?php echo htmlspecialchars($level['level']); ?></td>
            <td><?php echo htmlspecialchars($level['subject']); ?></td>
            <td><?php echo htmlspecialchars($level['description']); ?></td>
            <td><?php echo htmlspecialchars($level['deliverables']); ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No data found.</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>