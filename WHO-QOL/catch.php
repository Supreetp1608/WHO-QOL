<?php
session_start();
include "database.php";

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $life = json_decode($data, true);

    // Additional check for user login status
    if (isset($_SESSION["emp_id"])) {
        $emp_id = $_SESSION["emp_id"];


        $totalScore = $life["totalScore"];
        $physicalHealthScore = $life["physicalHealthScore"];
        $psychologicalHealthScore = $life["psychologicalHealthScore"];
        $socialHealthScore = $life["socialHealthScore"];
        $environmentalHealthScore = $life["environmentalHealthScore"];

        // Insert data into the 'score' table
        $sql = "INSERT INTO score (emp_id, eh_score, ph_score, mh_score, sh_score, overall, time) VALUES (?, ?, ?, ?, ?, ?, NOW())";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "ssssss",$emp_id, $environmentalHealthScore, $physicalHealthScore, $psychologicalHealthScore, $socialHealthScore, $totalScore);
            mysqli_stmt_execute($stmt);
            echo "Data stored successfully in the 'score' table.";
        } else {
            echo "Error preparing SQL statement.";
        }
    } else {
        echo "User not logged in.";
    }
}
?>
