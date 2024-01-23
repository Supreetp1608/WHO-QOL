<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="draw_graph.js"></script>
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
            width: 1200px;
            border: 5px solid black; /* Border for the container */
            align-self: center;
            color: white;
        }
        .dropbtn {
    padding: 10px;
    text-decoration: none;
    color: WHITE;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color:linear-gradient(to top, rgba(0, 0, 0, 0.8) 50%, rgba(0, 0, 0, 0.8) 50%);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}
.dropbtn {
    padding: 10px;
    text-decoration: none;
    color: WHITE;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: linear-gradient(to top, rgba(0, 0, 0, 0.7) 50%, rgba(0, 0, 0, 0.7) 50%);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Show the dropdown content when hovering over the dropdown button */
.dropdown:hover .dropdown-content {
    display: block;
}
        /* Style for the profile picture */
        .profile-picture {
            float: right;
            /* padding: 10px; */
        }

        .profile-picture img {
            width: 40px; /* Adjust the width as needed */
            height: 40px; /* Adjust the height as needed */
            border-radius: 50%; /* Make it a circular image */
            
        }
/* Show the dropdown content when hovering over the dropdown button */
.dropdown:hover .dropdown-content {
    display: block;
}
    </style>
</head>
<body>
    <div class="container">
    <div class="navbar">
            <div class="icon">
                <h2 class="logo">WHOQOL</h2>
            </div>

            <div class="menu">
            <ul>
        <li><a href="main2.php">HOME</a></li>
        <li class="dropdown">
            <a href="#" class="dropbtn">PERSONAL</a><br>
            <div class="dropdown-content"><br>
                <a href="per.php">YOUR SCORES</a><br><br>
                <a href="stats.php">SCORE VS AVG SCORE</a><br><br>

            </div>
        </li>
        <li class="dropdown">
            <a href="#" class="dropbtn">ANALYSIS</a><br>
            <div class="dropdown-content"><br>
            <a href="overall.php">OVERALL</a><br><br>

                <a href="teaching.php">TEACHING</a><br><br>
                <a href="nonteaching.php">NON-TEACHING</a><br><br>
                <a href="officeStaff.php">OFFICE STAFF</a>
            </div>
        </li>
        <div class="profile-picture">
        <li class="dropdown">
                <img src="user.png" alt="Profile Picture">

                <!-- <a href="#" class="dropbtn">PROFILE</a><br> -->
                <div class="dropdown-content"><br>
                    <a href="edit.php">EDIT PROFILE</a><br><br>
                    <a href="per1.php">RECENT SCORES</a><br><br>

                    <a href="logout.php">LOGOUT</a><br><br>
                </div>
            </li>
    </div>
    </ul>
        <li><a href="logout.php"></a></li>
    </ul>
            </div>
        </div>   <br><br>

        <?php
include "database.php";

// Check if the user is logged in
if (isset($_SESSION["emp_id"])) {
    $emp_id = $_SESSION["emp_id"];
    // Retrieve scores for the logged-in user
    $sql = "SELECT * FROM score WHERE emp_id = ?";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);

    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "s", $emp_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Fetch scores from the result set
        $scores = [];
        $totalScoresArray = []; // Initialize the array for total scores
        $timeArray=[];
        while ($row = mysqli_fetch_assoc($result)) {
            $scores[] = [
                'overall' => $row['overall'],
                'ph_score' => $row['ph_score'],
                'mh_score' => $row['mh_score'],
                'sh_score' => $row['sh_score'],
                'eh_score' => $row['eh_score'],
                //'time' => $row['time'],
            ];
            $timeArray[]=$row['time'];
            
            // Add 'overall' value to totalScoresArray
            $totalScoresArray[] = $row['overall'];
        }
    } else {
        echo "Error preparing SQL statement.";
    }
    $floatScores = array_map('floatval', $scores);
    $stmtFullName = mysqli_stmt_init($conn);
    $fullNameQuery = "SELECT full_name FROM users WHERE emp_id = ?";
    
    if (mysqli_stmt_prepare($stmtFullName, $fullNameQuery)) {
        mysqli_stmt_bind_param($stmtFullName, "s", $emp_id);
        mysqli_stmt_execute($stmtFullName);
        $resultFullName = mysqli_stmt_get_result($stmtFullName);

        // Fetch the full name from the result set
        $fullNameRow = mysqli_fetch_assoc($resultFullName);

        // Ensure that a result is obtained
        if ($fullNameRow) {
            $fullName = $fullNameRow['full_name'];
        } else {
            // Handle the case where no user is found or no full name is available
            $fullName = "Unknown User";
        }
    } else {
        echo "Error preparing full name SQL statement.";
    }
    echo "<script>let scoresData = " . json_encode($scores) . ";</script>";
    echo "<script>let totalScoresArray = " . json_encode($totalScoresArray) . ";</script>";
    echo "<script>let floatScores = " . json_encode($floatScores) . ";</script>";
    echo "<script>let timeArray = " . json_encode($timeArray) . ";</script>";
    echo "<script>let fullName = '" . $fullName . "';</script>";
    
} else {
    echo "User not logged in.";
}
?>
<h1 style='color: white; text-align: center; font-size: 1.5em;'>Health Scores Of <?php echo $fullName; ?> </h1>


    <div class="chart-container">
        <canvas id="barChartLoc" height="100" width="300"></canvas>  
        
    </div><br><br>
    <div class="chart-container">
    <canvas id="lineChartLoc" height="400" width="1200"></canvas>
</div>

    <footer>
        <p>&copy; 2023 WHOQOL. All rights reserved.</p>
    </footer>  
    <script src="draw_graph.js"></script>
</body>
</html>