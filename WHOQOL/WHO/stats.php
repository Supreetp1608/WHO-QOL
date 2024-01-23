<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare</title>
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
            width: 1100px;
            border: 5px solid black; /* Border for the container */
            align-self: center;
            color: white;
        }
        /* Add this to your main2.css or create a new CSS file */
.score-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.score-table th, .score-table td {
    padding: 10px;
    text-align: left;
    border: 1px solid white;
}

.score-table th {
    background-color: #333; /* Header background color */
    color: white;
}

.score-table td {
    background-color: #444; /* Cell background color */
    color: white;
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

.score-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    width: 800px; /* Set the desired width for each column */
    background-color: rgb(106, 106, 106); /* Header background color */
}

.score-table th, .score-table td {
    padding: 10px;
    text-align: left;
    border: 5px solid black;
   
}

.score-table th {
    background-color: transparent; /* Header background color */
    color: white;
}

.score-table td {
    background-color: transparent; /* Cell background color */
    color: white;
    
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
// Start the session and include the database connection
session_start();
include "database.php";

// Check if the user is logged in
if (isset($_SESSION["emp_id"])) {
    $emp_id = $_SESSION["emp_id"];

    // Retrieve the user's full name from the database
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

    // Retrieve recent scores for the logged-in user
    $recentScoresQuery = "SELECT * FROM score WHERE emp_id = ? ORDER BY time DESC LIMIT 1";
    $stmtRecent = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmtRecent, $recentScoresQuery)) {
        mysqli_stmt_bind_param($stmtRecent, "s", $emp_id);
        mysqli_stmt_execute($stmtRecent);
        $resultRecent = mysqli_stmt_get_result($stmtRecent);

        // Fetch recent scores from the result set
        $recentScores = mysqli_fetch_assoc($resultRecent);

        // Calculate average scores from the complete table
        $averageScoresQuery = "SELECT AVG(overall) as avg_overall, AVG(ph_score) as avg_ph, AVG(mh_score) as avg_mh, AVG(sh_score) as avg_sh, AVG(eh_score) as avg_eh FROM score";
        $resultAverage = mysqli_query($conn, $averageScoresQuery);
        $averageScores = mysqli_fetch_assoc($resultAverage);

        // Output the JavaScript variables
        echo "<script>let recentScores = " . json_encode($recentScores) . ";</script>";
        echo "<script>let averageScores = " . json_encode($averageScores) . ";</script>";
        echo "<script>let fullName = '" . $fullName . "';</script>";
    } else {
        echo "Error preparing recent scores SQL statement.";
    }
} else {
    echo "User not logged in.";
}
?>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Health Score', 'Average score', "<?php echo $fullName; ?>'s score"],
                ['Overall', <?php echo $averageScores['avg_overall']; ?>, <?php echo $recentScores['overall']; ?>],
                ['Physical Health', <?php echo $averageScores['avg_ph']; ?>, <?php echo $recentScores['ph_score']; ?>],
                ['Mental Health', <?php echo $averageScores['avg_mh']; ?>, <?php echo $recentScores['mh_score']; ?>],
                ['Social Health', <?php echo $averageScores['avg_sh']; ?>, <?php echo $recentScores['sh_score']; ?>],
                ['Environmental Health', <?php echo $averageScores['avg_eh']; ?>, <?php echo $recentScores['eh_score']; ?>]
            ]);

            var options = {
    chart: {
        title: 'Health Score',
        subtitle: 'Comparison of user health score with average health scores',
    },
    width: 1000,
    height: 400,
    backgroundColor: {
        fill: '#2d2d2d', // Set dark background color
    },
    chartArea: {
        left: 100, // Adjust left padding
        top: 50,   // Adjust top padding
        width: '70%', // Adjust chart area width
        height: '70%' // Adjust chart area height
    },
    legend: {
        textStyle: {
            color: 'white' // Set legend font color to white
        }
    },
    hAxis: {
        textStyle: {
            color: 'white' // Set horizontal axis font color to white
        }
    },
    vAxis: {
        textStyle: {
            color: 'white' // Set vertical axis font color to white
        }
    }
};


var chart = new google.charts.Bar(document.getElementById('barChartLoc'));
chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
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

        <div class="chart-container">
            <div id="barChartLoc"></div>
        </div>
        <center>
        <table class="score-table">
            <tr>
                <th>Health Score Type</th>
                <th>Average Score</th>
                <th><?php echo $fullName; ?>'s score</th>
            </tr>
            <tr>
                <td>Overall</td>
                <td><?php echo $averageScores['avg_overall']; ?></td>
                <td><?php echo $recentScores['overall']; ?></td>
            </tr>
            <tr>
                <td>Physical Health</td>
                <td><?php echo $averageScores['avg_ph']; ?></td>
                <td><?php echo $recentScores['ph_score']; ?></td>
            </tr>
            <tr>
                <td>Mental Health</td>
                <td><?php echo $averageScores['avg_mh']; ?></td>
                <td><?php echo $recentScores['mh_score']; ?></td>
            </tr>
            <tr>
                <td>Social Health</td>
                <td><?php echo $averageScores['avg_sh']; ?></td>
                <td><?php echo $recentScores['sh_score']; ?></td>
            </tr>
            <tr>
                <td>Environmental Health</td>
                <td><?php echo $averageScores['avg_eh']; ?></td>
                <td><?php echo $recentScores['eh_score']; ?></td>
            </tr>
        </table>
    </center>
        <footer>
            <p>&copy; 2023 WHOQOL. All rights reserved.</p>
        </footer>  
    </body>
</html>