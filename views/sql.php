<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Query</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #ddd;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            margin: 4px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

    <?php
    // Include database connection
    require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

    // Handle SQL query submission
    $sqlError = '';
    if (isset($_POST['execute_sql'])) {
        $sqlQuery = $_POST['sql_query'];

        try {
            $db->exec($sqlQuery); // Execute the SQL query
            echo "<p>SQL Query executed successfully.</p>";
        } catch (PDOException $e) {
            $sqlError = "SQL Error: " . $e->getMessage();
        }
    }

    // Fetch all entries
    $sql = "SELECT id, educationId, level, subject, description, deliverables FROM levels";
    $stmt = $db->query($sql);
    $levels = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- SQL Query Input Form -->
    <form method="post">
        <h2>Run SQL Query</h2>
        <textarea name="sql_query" rows="4" placeholder="Enter your SQL query here" required></textarea>
        <input type="submit" name="execute_sql" value="Execute SQL">
        <?php if ($sqlError): ?>
            <p class="error"><?php echo $sqlError; ?></p>
        <?php endif; ?>
    </form>
</body>
</html>