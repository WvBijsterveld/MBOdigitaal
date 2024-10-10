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
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-6xl w-full p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Self Assessment Overview</h1>

        <!-- Levels Table -->
        <div class="overflow-x-auto w-full">
            <h2 class="text-xl font-semibold text-gray-700 mb-6">Levels Overview</h2>
            <table class="min-w-full table-auto border-collapse bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Level</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Subject</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Description</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Teacher Assessment</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($levels)): ?>
                        <?php foreach ($levels as $level): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4 text-sm text-gray-700"><?php echo htmlspecialchars($level['level']); ?></td>
                            <td class="px-4 py-4 text-sm text-gray-700"><?php echo htmlspecialchars($level['subject']); ?></td>
                            <td class="px-4 py-4 text-sm text-gray-700 max-w-xs break-words"><?php echo htmlspecialchars($level['description']); ?></td>
                            <td class="px-4 py-4">
                                <?php if ($level['is_done']): ?>
                                    <span class="inline-block px-3 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Completed</span>
                                <?php else: ?>
                                    <span class="inline-block px-3 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full">Not Completed</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-4">
                                <form method="POST" class="flex items-center space-x-2">
                                    <input type="hidden" name="level_id" value="<?php echo $level['level_id']; ?>">
                                    <input type="text" name="assessment" value="<?php echo htmlspecialchars($level['teacher_assessment'] ?? ''); ?>" placeholder="Assessment" class="border border-gray-300 p-2 rounded-md text-sm w-36 sm:w-full focus:ring focus:ring-blue-200">
                                    <button type="submit" name="submit_assessment" class="bg-blue-500 text-white text-sm px-4 py-2 rounded-md hover:bg-blue-600 whitespace-nowrap">Submit</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No levels found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

