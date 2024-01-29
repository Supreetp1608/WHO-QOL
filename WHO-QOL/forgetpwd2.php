<?php
include "database.php";

if (isset($_GET["emp_id"])) {
    $emp_id = $_GET["emp_id"];

    if (isset($_POST["reset_password"])) {
        $new_password = $_POST["new_password"];
        $confirm_password = $_POST["confirm_password"];

        // Validate and update the new password
        if (!empty($new_password) && $new_password === $confirm_password) {
            $passwordHash = password_hash($new_password, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET password = ? WHERE emp_id = ?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $passwordHash, $emp_id);
                mysqli_stmt_execute($stmt);
                echo '<div class="alert alert-success" role="alert">Password updated successfully.</div>';
            } else {
                echo "Error preparing SQL statement.";
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Invalid or mismatched passwords.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <style>
       .form{
            height:480px;
            top:50%;


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
    margin-top: 10px; /* Adjust the margin-top value as needed */
    font-family: sans-serif;
}
    </style>
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="form">
                <form action="forgetpwd2.php?emp_id=<?php echo $emp_id; ?>" method="post">
                    <h2>Reset Password</h2><br>
                    <div class="form-group">
                        <input type="password" name="new_password" placeholder="New Password" required>
                    </div><br>
                    <div class="form-group">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    </div><br>
                    <div class="form-btn">
                        <input type="submit" class="btn btn-primary" name="reset_password" value="Reset Password" style="background-color: orange;">
                    </div><br>
                    <center><div style="color: white;     font-size: 18.75px;" ><a href="login.php">Login Here</a></p></div></center>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
