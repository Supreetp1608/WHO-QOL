<?php
include "database.php";

if (isset($_POST["submit"])) {
    $emp_id = $_POST["emp_id"];
    $password_hint = $_POST["password_hint"];

    $sql = "SELECT * FROM users WHERE emp_id = ? AND password_hint = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $emp_id, $password_hint);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
           
            header("Location: forgetpwd2.php?emp_id=$emp_id");
            exit();
        } else {
            echo '<p>Invalid Employee ID or Password Hint.</p>';
        }
    } else {
        echo "Error preparing SQL statement.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <style>
        .form{
            height:470px;
            top:50%;
            left:50%;
            width:470px;


        }
        .form label {
    width: 100%;
    font-size: 18.75px;
    display: block;
    margin-bottom: 0;
}
.form input {
    width: 100%;
    height: 43.75px;
    background: transparent;
    border-bottom: 1px solid #ff7200;
    border-top: none;
    border-right: none;
    border-left: none;
    color: #fff;
    font-size: 18.75px;
    letter-spacing: 1px;
    margin-top: 10px; 
    font-family: sans-serif;
}
    </style>
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="form">
                <form action="forgetpwd.php" method="post">
                   <center> <h2>Forgot Password</h2><br></center>
                    <div class="form-group">
                    <label for="emp_id" style="color: white; font-weight: bold;">Employee ID:</label>

                        <input type="text" class="form-control" name="emp_id" placeholder="Employee ID" required>
                    </div><br>
                    <div class="form-group">
                    <label for="password_hint" style="color: white; font-weight: bold;">DOB:</label>

                    <input type="date" class="form-control" name="password_hint" placeholder="Date of Birth">
                    </div><br>
                    <div class="form-btn">
                        <input type="submit" class="btn btn-primary" value="Submit" name="submit" style="background-color: orange;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
