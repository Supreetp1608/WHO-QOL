<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            /* background-image: url('flower_final2.jpeg'); */
            background-image: url('background.jpg');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        #home {
            background: #ff7200;
            min-height: 450px;
        }
        .card {
            transition: all 0.5s ease;
        }
        .card:hover {
            cursor: pointer;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,0.15);
        }
        .form {
            background: #ff7200;
        }
        #dashboard {
            color: black;
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
            margin-left: 30px;
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
    <div class="row justify-content-end">
        <div class="col-md-5 d-flex flex-column align-items-center text-white justify-content-center form order-2">
            <h1 class="display-4 fw-bolder mb-5" >Hey There!</h1>
            <p class="lead text-center">Enter Your Details To Register</p>
            <h5 class="mb-4">OR</h5>
            <a href="login.php" class="btn btn-outline-light rounded-pill pb-2 w-50">
                Login
            </a>
        </div>
        <div class="col-md-6 p-5" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 50%, rgba(0, 0, 0, 0.8) 50%);">
            <h1 class="display-6 fw-bolder mb-5" style="color: white; font-weight: bold;">Register</h1>
            <?php
            if (isset($_POST["submit"])) {
                $emp_id=$_POST["emp_id"];
                $fullName = $_POST["fullname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $passwordRepeat = $_POST["repeat_password"];
                $password_hint = $_POST["password_hint"];
                $age = $_POST["age"];
                $gender = $_POST["gender"];
                $maritalStatus = $_POST["marital_status"];
                $qualification=$_POST["qualification"];
            $experience=$_POST["experience"];
            $universityRole = $_POST["university_role"];
            $designation=$_POST["designation"];
                // if (isset($_POST["working"])) {
                //     $working = $_POST["working"];
                // } else {
                //     $working = "no"; // Set a default value if the checkbox is not checked
                // }

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $errors = array();

                if (empty($fullName) || empty($emp_id)||  empty($password) || empty($passwordRepeat) || empty($age) || empty($gender) || empty($maritalStatus) || empty($qualification)||empty($designation)||empty($experience)) {
                    array_push($errors, "All fields are required");
                }
                // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //     array_push($errors, "Email is not valid");
                // }
                if (strlen($password) < 8) {
                    array_push($errors, "Password must be at least 8 characters long");
                }
                if ($password !== $passwordRepeat) {
                    array_push($errors, "Password does not match");
                }
                require_once "database.php";
                $sql = "SELECT * FROM users WHERE emp_id = '$emp_id'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    array_push($errors, "Employee Id already exists!");
                }
                if (count($errors) > 0) {
                    echo '<div class="alert alert-danger" role="alert">';
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                    echo '</div>';
                } else {
                    $sql = "INSERT INTO users (emp_id, full_name, email, password, age, gender, marital_status, qualification, designation, experience, university_role, password_hint) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    // $sql = "INSERT INTO users (full_name, email, password, age, gender, marital_status, working) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "ssssssssssss", $emp_id, $fullName, $email, $passwordHash, $age, $gender, $maritalStatus, $qualification, $designation, $experience, $universityRole, $password_hint);
                        mysqli_stmt_execute($stmt);
                        echo '<div class="alert alert-success" role="alert">You are registered successfully.</div>';
                    } else {
                        die("Something went wrong");
                    }
                }
            }
            ?>

            <form action="registration.php" method="post">
                <!-- Existing form fields -->
                <div class="form-group">
            <input type="text" class="form-control" name="emp_id" placeholder="Employee ID">
            </div>
        
                <div class="form-group">
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email (optional)">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
            <div class="form-group">
            <label for="password_hint" style="color: white; font-weight: bold;">DOB:</label>

                 <input type="date" class="form-control" name="password_hint" placeholder="Date of Birth">
             </div>
            <div class="form-group">

                <input type="number" class="form-control" name="age" placeholder="Age">
            </div>
            <div class="form-group">
                <label for="gender" style="color: white; font-weight: bold;">Gender:</label>
                <select class="form-control" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="qualification" placeholder="Qualification">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="experience" placeholder="Experience">
            </div>
            <div class="form-group">
                <label for="marital_status" style="color: white; font-weight: bold;">Marital Status:</label>
                <select class="form-control" name="marital_status">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                    <option value="widowed">Widowed</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="university_role" style="color: white; font-weight: bold;">University Role:</label>
                    <select class="form-control" name="university_role" id="university_role" onchange="populateDesignationOptions()">
                        <option value="teaching">Teaching Staff</option>
                        <option value="non-teaching">Non-Teaching Staff</option>
                        <option value="office-staff">Office Staff</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="designation" style="font-size: 18.75px; color: white; font-weight: bold;">Designation:</label>
                    <select class="form-control" name="designation" id="designation">
                        <!-- Options will be dynamically populated based on the selected university role -->
                    </select>
                </div>
      
                <div class="form-btn">
                    <input type="submit" class="btn btn-outline-primary w-100 mt-4 rounded-pill custom-btn"  value="Register" name="submit">
                </div>
            </form>

            <script>
                function populateDesignationOptions() {
                    var universityRole = document.getElementById("university_role").value;
                    var designationSelect = document.getElementById("designation");
                    designationSelect.innerHTML = ""; // Clear existing options

                    // Populate options based on the selected university role
                    switch (universityRole) {
                        case "teaching":
                            addOption(designationSelect, "Associate Professor", "Associate Professor");
                            addOption(designationSelect, "Assistant Professor", "Assistant Professor");
                            addOption(designationSelect, "Professor", "Professor");
                            addOption(designationSelect, "Professor & Head", "Professor & Head");
                            addOption(designationSelect, "Teaching Assistant(T.A.)", "Teaching Assistant(T.A.)");
                            break;
                        case "non-teaching":
                            addOption(designationSelect, "Foreman", "Foreman");
                            addOption(designationSelect, "Instructor", "Instructor");
                            addOption(designationSelect, "Assistant Instructor", "Assistant Instructor");
                            break;
                        case "office-staff":
                            addOption(designationSelect, "Attenders", "Attenders");
                            break;
                    }
                }

                function addOption(selectElement, value, text) {
                    var option = document.createElement("option");
                    option.value = value;
                    option.text = text;
                    selectElement.add(option);
                }
            </script>

        </div>
    </div>
</div>

</body>
</html>
