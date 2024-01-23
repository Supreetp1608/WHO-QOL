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
            height: 600px;
            width: 1200px;
            border: 5px solid black;
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
                    <li><a href="logout.php">SIGN OUT</a></li>
                </ul>
            </div>
        </div><br><br>

        <?php
        include "database.php";

        // Check if the user is logged in
        if (isset($_SESSION["emp_id"]) || !isset($_SESSION["emp_id"])) {
            // Fetch and calculate average scores for gender = female and university role = teaching
            $femaleTeachingData = fetchAndCalculateAverageByGenderAndUniversityRole($conn, 'female', 'teaching');

            // Fetch and calculate average scores for gender = male and university role = teaching
            $maleTeachingData = fetchAndCalculateAverageByGenderAndUniversityRole($conn, 'male', 'teaching');

            // Fetch and calculate average scores for designation = associate professor and university role = teaching
            $assocProfTeachingData = fetchAndCalculateAverageByDesignationAndUniversityRole($conn, 'Associate Professor', 'teaching');

            // Fetch and calculate average scores for designation = assistant professor and university role = teaching
            $asstProfTeachingData = fetchAndCalculateAverageByDesignationAndUniversityRole($conn, 'Assistant Professor', 'teaching');

            // Fetch and calculate average scores for designation = professor and university role = teaching
            $profTeachingData = fetchAndCalculateAverageByDesignationAndUniversityRole($conn, 'Professor', 'teaching');

            // Fetch and calculate average scores for designation = professor&head and university role = teaching
            $profHeadTeachingData = fetchAndCalculateAverageByDesignationAndUniversityRole($conn, 'Professor & Head', 'teaching');

            // Define age groups
            $ageGroups = [
                ['min' => 19, 'max' => 30],
                ['min' => 31, 'max' => 40],
                ['min' => 41, 'max' => 50],
                ['min' => 51, 'max' => 60],
                ['min' => 61, 'max' => PHP_INT_MAX], // Use PHP_INT_MAX for age above 60
            ];

            // Fetch and calculate average scores for each age group and university role = teaching
            $ageGroupsTeachingData = fetchAndCalculateAverageByAgeGroupsAndUniversityRole($conn, $ageGroups, 'teaching');

            // Pass the combined data to JavaScript
            echo "<script>let femaleTeachingData = " . json_encode($femaleTeachingData) . ";</script>";
            echo "<script>let maleTeachingData = " . json_encode($maleTeachingData) . ";</script>";
            echo "<script>let assocProfTeachingData = " . json_encode($assocProfTeachingData) . ";</script>";
            echo "<script>let asstProfTeachingData = " . json_encode($asstProfTeachingData) . ";</script>";
            echo "<script>let profTeachingData = " . json_encode($profTeachingData) . ";</script>";
            echo "<script>let profHeadTeachingData = " . json_encode($profHeadTeachingData) . ";</script>";
            echo "<script>let ageGroupsTeachingData = " . json_encode($ageGroupsTeachingData) . ";</script>";
        }

        function fetchAndCalculateAverageByGenderAndUniversityRole($conn, $gender, $universityRole) {
            $sql = "SELECT u.*, s.*
                    FROM users u
                    LEFT JOIN score s ON u.emp_id = s.emp_id
                    WHERE u.gender = ? AND u.university_role = ?
                    UNION
                    SELECT u.*, s.*
                    FROM users u
                    RIGHT JOIN score s ON u.emp_id = s.emp_id
                    WHERE u.gender = ? AND u.university_role = ?";

            return fetchAndCalculateAverage($conn, $sql, [$gender, $universityRole, $gender, $universityRole]);
        }

        function fetchAndCalculateAverageByDesignationAndUniversityRole($conn, $designation, $universityRole) {
            $sql = "SELECT u.*, s.*
                    FROM users u
                    LEFT JOIN score s ON u.emp_id = s.emp_id
                    WHERE u.designation = ? AND u.university_role = ?
                    UNION
                    SELECT u.*, s.*
                    FROM users u
                    RIGHT JOIN score s ON u.emp_id = s.emp_id
                    WHERE u.designation = ? AND u.university_role = ?";

            return fetchAndCalculateAverage($conn, $sql, [$designation, $universityRole, $designation, $universityRole]);
        }

        function fetchAndCalculateAverageByAgeGroupsAndUniversityRole($conn, $ageGroups, $universityRole) {
            $unionQueries = [];

            foreach ($ageGroups as $ageGroup) {
                $minAge = $ageGroup['min'];
                $maxAge = $ageGroup['max'];

                $unionQueries[] = "(SELECT u.*, s.*
                                    FROM users u
                                    LEFT JOIN score s ON u.emp_id = s.emp_id
                                    WHERE (u.age >= ? AND u.age <= ?) AND u.university_role = ?)
                                    UNION
                                    (SELECT u.*, s.*
                                    FROM users u
                                    RIGHT JOIN score s ON u.emp_id = s.emp_id
                                    WHERE (u.age >= ? AND u.age <= ?) AND u.university_role = ?)";
            }

            $sql = implode(' UNION ALL ', $unionQueries);

            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

            if ($prepareStmt) {
                $params = [];

                foreach ($ageGroups as $ageGroup) {
                    $params[] = $ageGroup['min'];
                    $params[] = $ageGroup['max'];
                    $params[] = $universityRole;
                    $params[] = $ageGroup['min'];
                    $params[] = $ageGroup['max'];
                    $params[] = $universityRole;
                }

                $paramTypes = str_repeat('ississ', count($ageGroups));

                mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                $combinedData = [
                    'ph' => [],
                    'mh' => [],
                    'sh' => [],
                    'eh' => [],
                    'overall' => [],
                ];

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
                echo "Error preparing SQL statement: " . mysqli_error($conn);
            }
        }

        function fetchAndCalculateAverage($conn, $sql, $params) {
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

            if ($prepareStmt) {
                $paramTypes = str_repeat('s', count($params));
                mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                $combinedData = [
                    'ph' => [],
                    'mh' => [],
                    'sh' => [],
                    'eh' => [],
                    'overall' => [],
                ];

                while ($row = mysqli_fetch_assoc($result)) {
                    $combinedData['ph'][] = (float)$row['ph_score'];
                    $combinedData['mh'][] = (float)$row['mh_score'];
                    $combinedData['sh'][] = (float)$row['sh_score'];
                    $combinedData['eh'][] = (float)$row['eh_score'];
                    $combinedData['overall'][] = (float)$row['overall'];
                }

                foreach ($combinedData as &$scores) {
                    if (is_array($scores) && !empty($scores)) {
                        $scores = array_sum($scores) / count($scores);
                    } else {
                        $scores = 0;
                    }
                }

                return $combinedData;
            } else {
                echo "Error preparing SQL statement: " . mysqli_error($conn);
            }
        }
        ?>

        <div class="chart-container">
            <canvas id="barChartLoc" height=100 width=300></canvas>
        </div>
        <footer>
            <p>&copy; 2023 WHOQOL. All rights reserved.</p>
        </footer>
        <script src="draw_graph_new.js"></script>
</body>

</html>
