<?php
session_start();

include "database.php";

// Check if the user is logged in
if (!isset($_SESSION["emp_id"])) {
    header("Location: login.php");
    exit();
}

$emp_id = $_SESSION["emp_id"];

// Fetch the user's current profile information
$sql = "SELECT * FROM users WHERE emp_id = ?";
$stmt = mysqli_stmt_init($conn);
$prepareStmt = mysqli_stmt_prepare($stmt, $sql);

if ($prepareStmt) {
    mysqli_stmt_bind_param($stmt, "s", $emp_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $fullName = $row["full_name"];
        $email = $row["email"];
        $age = $row["age"];
        $gender = $row["gender"];
        $password_hint = $row["password_hint"];

        $maritalStatus = $row["marital_status"];
        $qualification = $row["qualification"];
        $experience = $row["experience"];
        $universityRole = $row["university_role"];
        $designation = $row["designation"];
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "Error preparing SQL statement.";
    exit();
}

// Handle form submission for updating the profile
if (isset($_POST["update"])) {
    $newFullName = $_POST["fullname"];
    $newEmail = $_POST["email"];

    $newAge = $_POST["age"];
    $password_hint = $_POST["password_hint"];

    $newGender = $_POST["gender"];
    $newMaritalStatus = $_POST["marital_status"];
    $newQualification = $_POST["qualification"];
    $newExperience = $_POST["experience"];
    $newUniversityRole = $_POST["university_role"];
    $newDesignation = $_POST["designation"];

    $updateSql = "UPDATE users SET full_name=?, email=?, age=?, password_hint=?,gender=?, marital_status=?, qualification=?, experience=?, university_role=?, designation=? WHERE emp_id=?";
    $updateStmt = mysqli_stmt_init($conn);
    $updatePrepareStmt = mysqli_stmt_prepare($updateStmt, $updateSql);

    if ($updatePrepareStmt) {
        mysqli_stmt_bind_param($updateStmt, "sssssssssss", $newFullName, $newEmail, $newAge,$password_hint, $newGender, $newMaritalStatus, $newQualification, $newExperience, $newUniversityRole, $newDesignation, $emp_id);
        mysqli_stmt_execute($updateStmt);
        echo '<div class="alert alert-success" role="alert">Details updated successfully.</div>';

        // Redirect to the profile page after updating
        header("Location: main2.php");
        exit();
    } else {
        echo "Error preparing update SQL statement.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <style>
        /* .form label {
    width: 100%;
    font-size: 18.75px;
    display: block;
    margin-bottom: 0;
} */
.main {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form {
            width: 80%;
            max-width: 550px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: inline-block;
            margin-bottom: 0<br>px;
        }

        .form-group input,
        .form-group select {
            display: inline-block;
            width: 100%;
        }

        .form-btn {
            margin-top: 15px;
            text-align: center;
        }

        </style>

</head>
<body>
    <div class="main">
        <div class="container">
            <div class="form">
                <form action="edit.php" method="post">
                   <center> <h2>Edit Profile</h2></center><br>
                    <div class="form-group">
                    <label for="fullname" style="font-size: 18.75px;" >Full Name:</label>
                     <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo $fullName; ?>">
                    </div><br>
                    <div class="form-group">
                    <label for="email" style="font-size: 18.75px;">Email (optional):</label>

                        <input type="email" class="form-control" name="email" placeholder="Email (optional)" value="<?php echo $email; ?>">
                    </div><br>
                    <div class="form-group">
                    <label for="age" style="font-size: 18.75px;">Age:</label>

                        <input type="number" class="form-control" name="age" placeholder="Age" value="<?php echo $age; ?>">
                    </div><br>
                    <div class="form-group">
            <label for="password_hint" style="font-size: 18.75px;  ">DOB:</label>
                 <input type="date" class="form-control" name="password_hint" placeholder="Date of Birth" value="<?php echo $password_hint; ?>">

             </div><br>
                    <div class="form-group">
                        <label for="gender" style="font-size: 18.75px;">Gender:</label>
                        <select class="form-control" name="gender">
                            <option value="male" <?php echo ($gender == 'male') ? 'selected' : ''; ?>>Male</option>
                            <option value="female" <?php echo ($gender == 'female') ? 'selected' : ''; ?>>Female</option>
                            <option value="other" <?php echo ($gender == 'other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="marital_status" style="font-size: 18.75px;">Marital Status:</label>
                        <select class="form-control" name="marital_status">
                            <option value="single" <?php echo ($maritalStatus == 'single') ? 'selected' : ''; ?>>Single</option>
                            <option value="married" <?php echo ($maritalStatus == 'married') ? 'selected' : ''; ?>>Married</option>
                            <option value="divorced" <?php echo ($maritalStatus == 'divorced') ? 'selected' : ''; ?>>Divorced</option>
                            <option value="widowed" <?php echo ($maritalStatus == 'widowed') ? 'selected' : ''; ?>>Widowed</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="qualification" style="font-size: 18.75px;">Qualification:</label>

                        <input type="text" class="form-control" name="qualification" placeholder="Qualification" value="<?php echo $qualification; ?>">
                    </div>
                    <div class="form-group">
                    <label for="experience" style="font-size: 18.75px;">Experience:</label>

                        <input type="text" class="form-control" name="experience" placeholder="Experience" value="<?php echo $experience; ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="university_role" style="font-size: 18.75px; ">University Role:</label>
                        <select class="form-control" name="university_role" id="university_role" onchange="populateDesignationOptions()">
                            <option value="teaching" <?php echo ($universityRole == 'teaching') ? 'selected' : ''; ?>>Teaching Staff</option>
                            <option value="non-teaching" <?php echo ($universityRole == 'non-teaching') ? 'selected' : ''; ?>>Non-Teaching Staff</option>
                            <option value="office-staff" <?php echo ($universityRole == 'office-staff') ? 'selected' : ''; ?>>Office Staff</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="designation" style="font-size: 18.75px; ">Designation:</label>
                        <select class="form-control" name="designation" id="designation">
                            <!-- Options will be dynamically populated based on the selected university role -->
                            <option value="<?php echo $designation; ?>" selected><?php echo $designation; ?></option>
                        </select>
                    </div>
                    <center>
                        <div class="form-btn">
                            <input type="submit" class="btn btn-primary" value="Update" name="update" style="background-color: orange;">
                        </div>
                    </center>
                </form>
                <!-- <center>
                    <div>
                        <p><a href="profile.php">Back to Profile</a></p>
                    </div>
                </center> -->
            </div>
        </div>
    </div>
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
</body>
</html>
