<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

// Placeholder student ID (since you don't have login yet)
$student_id = 1; // This will later come from your login system

// Initialize query variables for filtering
$filters = [];
$params = [];

// Check if filtering is being applied
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

// Fetch existing self-assessments for the current student
$selfAssessmentSql = "SELECT level_id, is_done FROM self_assessments WHERE student_id = :student_id";
$selfAssessmentStmt = $db->prepare($selfAssessmentSql);
$selfAssessmentStmt->execute([':student_id' => $student_id]);
$selfAssessments = $selfAssessmentStmt->fetchAll(PDO::FETCH_ASSOC);

// Create an associative array for easy lookup
$assessmentStatus = [];
foreach ($selfAssessments as $assessment) {
    $assessmentStatus[$assessment['level_id']] = $assessment['is_done'];
}

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
    <title>Level Overview</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Levels Overview</h1>

        <!-- Filtering Form -->
        <div class="bg-white p-4 shadow-md rounded-md mb-6">
            <h2 class="text-xl font-semibold mb-4">Filter Levels</h2>
            <form method="get">
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                        <select name="subject" id="subject" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none">
                            <option value="">All Subjects</option>
                            <?php foreach ($subjects as $subjectOption): ?>
                                <option value="<?php echo htmlspecialchars($subjectOption); ?>" 
                                    <?php echo (isset($_GET['subject']) && $_GET['subject'] == $subjectOption) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($subjectOption); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="w-1/2">
                        <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                        <select name="level" id="level" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none">
                            <option value="">All Levels</option>
                            <?php foreach ($levelsList as $levelOption): ?>
                                <option value="<?php echo $levelOption; ?>" 
                                    <?php echo (isset($_GET['level']) && $_GET['level'] == $levelOption) ? 'selected' : ''; ?>>
                                    Level <?php echo $levelOption; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-600">Apply Filters</button>
                </div>
            </form>
        </div>

       <!-- Levels Table -->
       <form action="submit_self_assessment.php" method="post" class="bg-white p-4 shadow-md rounded-md">
           <h2 class="text-xl font-semibold mb-4">Levels Overview</h2>
           <table class="min-w-full table-auto">
               <thead class="bg-gray-50">
                   <tr>
                       <th class="px-4 py-2 text-left">Level</th>
                       <th class="px-4 py-2 text-left">Subject</th>
                       <th class="px-4 py-2 text-left">Description</th>
                       <th class="px-4 py-2 text-left">Self-Assessment</th>
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
                             <!-- Self-assessment radio buttons -->
<input type="hidden" name="levels[]" value="<?php echo htmlspecialchars($level['id']); ?>">
<div class="flex flex-col">
    <label class="inline-flex items-center mt-1">
        <input type="radio" name="assessment[<?php echo $level['id']; ?>]" value="1" class="form-radio" <?php echo (isset($assessmentStatus[$level['id']]) && $assessmentStatus[$level['id']] == 1) ? 'checked' : ''; ?>>
        <span class="ml-2">Done</span>
    </label>
    <label class="inline-flex items-center mt-1">
        <input type="radio" name="assessment[<?php echo $level['id']; ?>]" value="0" class="form-radio" <?php echo (isset($assessmentStatus[$level['id']]) && $assessmentStatus[$level['id']] == 0) ? 'checked' : ''; ?>>
        <span class="ml-2">Not Done</span>
    </label>
</div>
                           </td>
                           <td class="px-4 py-2">
                               <?php if (!empty($level['teacher_assessment'])): ?>
                                   <?php echo htmlspecialchars($level['teacher_assessment']); ?>
                               <?php else: ?>
                                   <span class="text-gray-500">Pending</span>
                               <?php endif; ?>
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

           <!-- Submit Button -->
           <div class="mt-4 flex justify-center">
               <button type="submit" class="px-6 py-3 bg-green-500 text-white rounded-md text-lg shadow hover:bg-green-600">Submit All Assessments</button>
           </div>
       </form>
    </div>
</body>
</html>