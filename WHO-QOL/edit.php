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
    <div class="row justify-content-center">
        <div class="col-md-6 p-5" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 50%, rgba(0, 0, 0, 0.8) 50%);">
           <center> <h1 class="display-6 fw-bolder mb-5" style="color: #ff7200; font-weight: bold;">Edit Profile</h1></center>

            <form action="edit.php" method="post">
                <!-- Existing form fields -->
                <!-- <div class="form-group">
            <input type="text" class="form-control" name="emp_id" placeholder="Employee ID">
            </div> -->
        
                <div class="form-group">
                <label for="fullname" style="color: white; font-weight: bold;">Full Name:</label>

                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo $fullName; ?>">
                </div>
                <div class="form-group">
                <label for="email" style="color: white; font-weight: bold;">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Email (optional)"  value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
            <label for="password_hint" style="color: white; font-weight: bold;">DOB:</label>
                 <input type="date" class="form-control" name="password_hint" placeholder="Date of Birth" value="<?php echo $password_hint; ?>">

             </div>
            <div class="form-group">
            <label for="age" style="color: white; font-weight: bold;">Age:</label>
                <input type="number" class="form-control" name="age" placeholder="Age" value="<?php echo $age; ?>">
            </div>
            <div class="form-group">
                <label for="gender" style="color: white; font-weight: bold;">Gender:</label>
                <select class="form-control" name="gender">
                <option value="male" <?php echo ($gender == 'male') ? 'selected' : ''; ?>>Male</option>
                            <option value="female" <?php echo ($gender == 'female') ? 'selected' : ''; ?>>Female</option>
                            <option value="other" <?php echo ($gender == 'other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
            <label for="qualification" style="color: white; font-weight: bold;">Qulaification:</label>
                <input type="text" class="form-control" name="qualification" placeholder="Qualification" value="<?php echo $qualification; ?>">
            </div>
            <div class="form-group">
            <label for="experience" style="color: white; font-weight: bold;">Experience:</label>
                <input type="text" class="form-control" name="experience" placeholder="Experience" value="<?php echo $experience; ?>">
            </div>
            <div class="form-group">
    
                <label for="marital_status" style="color: white; font-weight: bold;">Marital Status:</label>
                <select class="form-control" name="marital_status">
                <option value="single" <?php echo ($maritalStatus == 'single') ? 'selected' : ''; ?>>Single</option>
                            <option value="married" <?php echo ($maritalStatus == 'married') ? 'selected' : ''; ?>>Married</option>
                            <option value="divorced" <?php echo ($maritalStatus == 'divorced') ? 'selected' : ''; ?>>Divorced</option>
                            <option value="widowed" <?php echo ($maritalStatus == 'widowed') ? 'selected' : ''; ?>>Widowed</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="university_role" style="color: white; font-weight: bold;">University Role:</label>
                    <select class="form-control" name="university_role" id="university_role" onchange="populateDesignationOptions()">
                    <option value="teaching" <?php echo ($universityRole == 'teaching') ? 'selected' : ''; ?>>Teaching Staff</option>
                            <option value="non-teaching" <?php echo ($universityRole == 'non-teaching') ? 'selected' : ''; ?>>Non-Teaching Staff</option>
                            <option value="office-staff" <?php echo ($universityRole == 'office-staff') ? 'selected' : ''; ?>>Office Staff</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="designation" style="font-size: 18.75px; color: white; font-weight: bold;" >Designation:</label>
                    <select class="form-control" name="designation" id="designation">
                    <option value="<?php echo $designation; ?>" selected><?php echo $designation; ?></option>

                        <!-- Options will be dynamically populated based on the selected university role -->
                    </select>
                </div>
      
                <div class="form-btn">
                    <input type="submit" class="btn btn-outline-primary w-100 mt-4 rounded-pill custom-btn"  value="Update" name="update">
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