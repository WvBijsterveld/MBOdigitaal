<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Levels</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --accent-color: rgb(78, 128, 238);
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Manage Levels</h1>

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
                echo "<p class='text-green-600 font-semibold mb-4'>Record updated successfully.</p>";
            } else {
                echo "<p class='text-red-600 font-semibold mb-4'>No changes were made or the record could not be updated.</p>";
            }
        }

        // Fetch all entries and sort by level first, then by subject both in ascending order
        $sql = "SELECT id, level, subject, description FROM levels ORDER BY level ASC, subject ASC";
        $stmt = $db->query($sql);
        $levels = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!-- Editable Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">ID</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Level</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Subject</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Description</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($levels as $level) : ?>
                        <tr>
                            <form method="post">
                                <td class="px-4 py-3"><?php echo htmlspecialchars($level['id']); ?></td>
                                <td class="px-4 py-3">
                                    <select name="level" class="border border-gray-300 rounded p-2 focus:ring focus:ring-opacity-50 focus:ring-[var(--accent-color)]">
                                        <option value="1" <?php echo $level['level'] == 1 ? 'selected' : ''; ?>>Level 1</option>
                                        <option value="2" <?php echo $level['level'] == 2 ? 'selected' : ''; ?>>Level 2</option>
                                        <option value="3" <?php echo $level['level'] == 3 ? 'selected' : ''; ?>>Level 3</option>
                                        <option value="4" <?php echo $level['level'] == 4 ? 'selected' : ''; ?>>Level 4</option>
                                        <option value="5" <?php echo $level['level'] == 5 ? 'selected' : ''; ?>>Level 5</option>
                                        <option value="6" <?php echo $level['level'] == 6 ? 'selected' : ''; ?>>Level 6</option>
                                        <option value="7" <?php echo $level['level'] == 7 ? 'selected' : ''; ?>>Level 7</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3">
                                    <select name="subject" class="border border-gray-300 rounded p-2 focus:ring focus:ring-opacity-50 focus:ring-[var(--accent-color)]">
                                        <?php foreach ($subjects as $subjectOption) : ?>
                                            <option value="<?php echo htmlspecialchars($subjectOption); ?>" <?php echo $level['subject'] == $subjectOption ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($subjectOption); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td class="px-4 py-3">
                                    <textarea name="description" class="border border-gray-300 rounded p-2 w-full focus:ring focus:ring-opacity-50 focus:ring-[var(--accent-color)]"><?php echo htmlspecialchars($level['description']); ?></textarea>
                                </td>
                                <td class="px-4 py-3">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($level['id']); ?>">
                                    <input type="submit" name="update" value="Update" class="bg-[var(--accent-color)] text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                                </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>