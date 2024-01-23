<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
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
            left: 2;
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
        

    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
    session_start();
    include "database.php";
        // Calculate average scores from the complete table
        $averageScoresQuery = "SELECT AVG(overall) as avg_overall, AVG(ph_score) as avg_ph, AVG(mh_score) as avg_mh, AVG(sh_score) as avg_sh, AVG(eh_score) as avg_eh FROM score";
        $resultAverage = mysqli_query($conn, $averageScoresQuery);
        $averageScores = mysqli_fetch_assoc($resultAverage);
        echo "<script>let averageScores = " . json_encode($averageScores) . ";</script>";
    ?>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Health Score', 'Average score'],
                ['Overall', <?php echo $averageScores['avg_overall']; ?>],
                ['Physical Health', <?php echo $averageScores['avg_ph']; ?>],
                ['Mental Health', <?php echo $averageScores['avg_mh']; ?>],
                ['Social Health', <?php echo $averageScores['avg_sh']; ?>],
                ['Environmental Health', <?php echo $averageScores['avg_eh']; ?>]
            ]);

            var options = {
    chart: {
        title: 'Health Score',
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
            <div class="nav1">
                <ul>
                    <li><a href="main.php">HOME</a></li>
                    <!-- <li><a href="per.php">PE</a></li> -->
                    <li><a href="stats.php">STATISTICS</a></li>
                    <li><a href="login.php" >LOGIN</a></li>
                </ul>
            </div>
        </div><br><br>

        <div class="chart-container">
            <div id="barChartLoc"></div>
        </div>
        <footer>
            <p>&copy; 2023 WHOQOL. All rights reserved.</p>
        </footer>  
    </body>
</html>
