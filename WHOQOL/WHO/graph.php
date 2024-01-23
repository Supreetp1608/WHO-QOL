<?php
 session_start();
 include "database.php";

// Check if the user is logged in
if (isset($_SESSION["emp_id"])) {
    $email = $_SESSION["emp_id"];

    // Retrieve scores for the logged-in user
    $sql = "SELECT * FROM score WHERE emp_id = ?";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "s", $emp_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $overall = array();
        $count=0;
        while($row = mysqli_fetch_assoc($result))
        {
              $overall[$count]["overall"]=$row["overall"];
              $overall[$count]["time"]=$row["time"];
              $count=$count+1;
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "dark1",
        title: {
            text: "Simple Column Chart with Index Labels"
        },
        axisY: {
            includeZero: true
        },
        data: [{
            type: "column",
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "outside",
            dataPoints: <?php echo json_encode($overall, JSON_NUMERIC_CHECK); ?>
        }]
    });

    // Add console.log statements to debug
    console.log("Overall Data from PHP:", <?php echo json_encode($overall, JSON_NUMERIC_CHECK); ?>);

    chart.render();
}

</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>          