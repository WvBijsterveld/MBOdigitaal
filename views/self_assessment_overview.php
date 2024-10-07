<?php
// Include database connection
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

// Placeholder student ID (change this to an existing student ID)
$student_id = 1; // Change this to the actual user ID of the student

// Prepare the SQL query to get levels and self-assessment status
$sql = "
    SELECT l.id AS level_id, l.level, l.subject, l.description, 
           COALESCE(sa.is_done, 0) AS is_done, 
           sa.assessment AS teacher_assessment 
    FROM levels l 
    LEFT JOIN self_assessments sa ON l.id = sa.level_id AND sa.student_id = :student_id 
    ORDER BY l.subject ASC, l.level ASC";

$stmt = $db->prepare($sql);
$stmt->execute([':student_id' => $student_id]);
$levels = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_assessment'])) {
    $level_id = $_POST['level_id'];
    $teacher_assessment = $_POST['assessment'];

    // Prepare the SQL query to insert/update the teacher's assessment
    $assessmentSql = "
        INSERT INTO self_assessments (student_id, level_id, assessment)
        VALUES (:student_id, :level_id, :assessment)
        ON DUPLICATE KEY UPDATE assessment = :assessment";

    $stmt = $db->prepare($assessmentSql);
    $stmt->execute([
        ':student_id' => $student_id,
        ':level_id' => $level_id,
        ':assessment' => $teacher_assessment,
    ]);

    // Optionally, you can redirect or show a success message here
    header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $student_id); // Refresh the page to show updated data
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Assessment Overview</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Self Assessment Overview</h1>

        <!-- Levels Table -->
        <div class="bg-white p-4 shadow-md rounded-md">
            <h2 class="text-xl font-semibold mb-4">Levels Overview</h2>
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left">Level</th>
                        <th class="px-4 py-2 text-left">Subject</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Self-Assessment Status</th>
                        <th class="px-4 py-2 text-left">Teacher Assessment</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($levels)): ?>
                        <?php foreach ($levels as $level): ?>
                        <tr>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($level['level']); ?></td>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($level['subject']); ?></td>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($level['description']); ?></td>
                            <td class="px-4 py-2">
                                <?php if ($level['is_done']): ?>
                                    <span class="text-green-600">Completed</span>
                                <?php else: ?>
                                    <span class="text-red-600">Not Completed</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-2">
                             <form method="POST" class="inline">
                                 <input type="hidden" name="level_id" value="<?php echo $level['level_id']; ?>">
                                 <input type="text" name="assessment" value="<?php echo htmlspecialchars($level['teacher_assessment'] ?? ''); ?>" placeholder="Assessment" class="border p-1 rounded">
                                 <button type="submit" name="submit_assessment" class="ml-2 bg-blue-500 text-white rounded px-2">Submit</button>
                             </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-gray-500">No levels found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>