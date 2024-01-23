<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css">  -->
    <style>
        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        #home{
    background: #ff7200;
    min-height: 450px;
  }
  .card{
    transition: all 0.5s ease;
  }
  .card:hover{
    cursor: pointer;
    box-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
  }
  /*Form */
  .form{
    background: orange;
  }
  #dashboard{
    color: white;
  }
  button {
    width: 180px;
    color: white;
    font-size: 12px;
    padding: 12px 0;
    background: fe7f9c;
    border: 0;
    border-radius: 20px;
    outline: none;
    margin-left: 8px;
    transition: transform 0.5s;
}

button:hover {
    transform: translateY(-10px);
}
.custom-btn {
    color:  #ff7200;
    border-color:  #ff7200;
  }

  .custom-btn:hover {
    background-color:  #ff7200;
    color: white;
  }


</style>
</head>
<body>

<div class="container shadow my-5">
    <div class="row">
        <div id="home" class="col-md-5 d-flex flex-column align-items-center text-white justify-content-center form">
            <h1 class="display-4 fw-bolder mb-5">Welcome Back!</h1>
            <p class="lead text-center">Enter Your Credentials to Login</p>
            <h5 class="mb-4">OR</h5>
            <a href="registration.php" class="btn btn-outline-light rounded-pill pb-2 w-50">
                Register
            </a>
        </div>
        <div class="col-md-6 p-5" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 50%, rgba(0, 0, 0, 0.8) 50%);">
            <h1 class="display-6 fw-bolder mb-5" style="color: white; font-weight: bold;">LOGIN</h1>
            <?php
            if (isset($_POST["login"])) {
                $emp_id = isset($_POST["emp_id"]) ? $_POST["emp_id"] : null; // Check if set
                $password = $_POST["password"];
                require_once "database.php";
                $sql = "SELECT * FROM users WHERE emp_id = '$emp_id'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    $_SESSION["emp_id"] = $emp_id;
                    header("Location: main2.php");
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Employee id does not match</div>";
            }
        }
        ?>

            <form id="loginForm" action="login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label" style="color: white; font-weight: bold;">Employee Id</label>
                    <input type="emp_id" class="form-control" id="emp_id" name="emp_id" value="" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="color: white; font-weight: bold;">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="" required>
                </div>
                <center>
  <button type="submit" class="btn btn-outline-primary w-100 mt-4 rounded-pill custom-btn" name="login">Login</button>
</center>             
            </form>
            <br><br>
<form>
<center>
  <div style="color: white; border-color: orange;">
    <a href="forgetpwd.php" style="color: white;">Forgot Password?</a>
  </div>
</center>
    </form>
        </div>
    </div>
</div>

</body>
</html>
