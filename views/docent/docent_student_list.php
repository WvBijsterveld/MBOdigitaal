<?php
// Include database connection
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

// Fetch all students in the class
$class_id = 1; // This should be fetched based on the logged-in teacher's class
$studentsSql = "SELECT * FROM students WHERE class_id = :class_id";
$stmt = $db->prepare($studentsSql);
$stmt->execute([':class_id' => $class_id]);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studenten Overzicht</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Studenten in de Klas</h1>
        <table class="min-w-full table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2">Naam</th>
                    <th class="px-4 py-2">DUO Nummer</th>
                    <th class="px-4 py-2">Acties</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($students as $student): ?>
                <tr>
                    <td class="px-4 py-2"><?php echo htmlspecialchars($student['name']); ?></td>
                    <td class="px-4 py-2"><?php echo htmlspecialchars($student['duo_number']); ?></td>
                    <td class="px-4 py-2">
                        <a href="docent_student_detail.php?id=<?php echo $student['id']; ?>" class="text-blue-500 hover:underline">Bekijk Voortgang</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>