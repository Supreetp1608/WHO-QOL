<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="stylesheet" href="main2.css">
    <style>
        body {
            margin: 0;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url("background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            width: 100%;
            background-position: center;
            height: 100%;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px; /* Adjust the height of the container */
            width: 400px;
            border: 5px solid black; /* Border for the container */
            align-self: center;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">WHOQOL</h2>
            </div>
        <div class="nav">
            <ul>
                <li><a href="main2.php">HOME</a></li>
                <li><a href="per.php">PERSONAL</a></li>
                <li><a href="stats.php">STATISTICS</a></li>
                <li><a href="logout.php" >SIGN OUT</a></li>
            </ul>
    </div>
    </div><br><br>

    <?php
include "database.php";

// Check if the user is logged in
if (isset($_SESSION["emp_id"]) || !isset($_SESSION["emp_id"])) {
    $teachingData = fetchAndCalculateAverageUniversity($conn, 'teaching');
    $nonteachingData = fetchAndCalculateAverageUniversity($conn, 'non-teaching');
    $officeData = fetchAndCalculateAverageUniversity($conn, 'office-staff');
    echo "<script>let teachingData = " . json_encode($teachingData) . ";</script>";
    echo "<script>let nonteachingData = " . json_encode($nonteachingData) . ";</script>";
    echo "<script>let officeData = " . json_encode($officeData) . ";</script>";
}

function fetchAndCalculateAverageUniversity($conn, $university) {
$sql = "SELECT u.*, s.*
    FROM users u
    LEFT JOIN score s ON u.emp_id = s.emp_id
    WHERE u.university_role = ?
    UNION
    SELECT u.*, s.*
    FROM users u
    RIGHT JOIN score s ON u.emp_id = s.emp_id
    WHERE u.university_role = ?";


    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "ss", $university, $university);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $combinedData = [
            'ph' => [],
            'mh' => [],
            'sh' => [],
            'eh' => [],
            'overall' => [],
        ];

        // Fetch data from the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $combinedData['ph'][] = (float)$row['ph_score'];
            $combinedData['mh'][] = (float)$row['mh_score'];
            $combinedData['sh'][] = (float)$row['sh_score'];
            $combinedData['eh'][] = (float)$row['eh_score'];
            $combinedData['overall'][] = (float)$row['overall'];
        }
        foreach ($combinedData as &$scores) {
            if (!empty($scores)) {
                $scores = array_sum($scores) / count($scores);
            } else {
                $scores = 0;
            }
        }
        return $combinedData;
    } else {
        echo "Error preparing SQL statement.";
    }
}
?>

    <div class="chart-container">
        <canvas id="barChartLoc" height=100 width=100></canvas>
    </div>
    <footer>
        <p>&copy; 2023 WHOQOL. All rights reserved.</p>
    </footer>  
    <script src="universityrole.js"></script>
</body>
</html>