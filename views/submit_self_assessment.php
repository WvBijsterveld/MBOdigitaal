<?php
// Include database connection
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

// Placeholder student ID (since you don't have login yet)
$student_id = 1; // This will later come from your login system

// Check if form is submitted and required fields are set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['levels']) && isset($_POST['assessment'])) {
    
    // Retrieve the levels and assessment data
    $levels = $_POST['levels']; // Array of level IDs
    $assessments = $_POST['assessment']; // Array of assessments

    // Prepare the SQL insert/update query
    $sql = "INSERT INTO self_assessments (student_id, level_id, is_done) 
            VALUES (:student_id, :level_id, :is_done)
            ON DUPLICATE KEY UPDATE is_done = :is_done";

    $stmt = $db->prepare($sql);
    
    try {
        // Loop through each level and its corresponding assessment
        foreach ($levels as $level_id) {
            // Set the is_done value based on the assessment type
            $is_done = (isset($assessments[$level_id]) && $assessments[$level_id] === '1') ? 1 : 0; // Assuming '1' means done and '0' means not done
            
            // Execute the statement with the collected values
            $stmt->execute([
                ':student_id' => $student_id,
                ':level_id' => $level_id,
                ':is_done' => $is_done
            ]);
        }
        
        // Redirect or display success message
        echo "Self-assessment submitted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit; // Stop execution on error
    }
} else {
    // If any of the required fields are missing, show an error message
    echo "Please submit all required fields.";
}