<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="main.css">
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
        }
        /* Style the dropdown button and content */
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
    </style>
</head>
<body>
<div class="main">
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
        </div> 
    <div class="content">
        <?
        php include 'registration.php';
        ?>
        <h1>The World Health Organization<br><span>Quality of Life </span> <br>(WHOQOL)</h1>
        <p class="par">WHOQOL stands for the World Health Organization Quality of Life.<br> The WHOQOL is a set of generic instruments developed by the World Health Organization (WHO) <br>to assess an individual's quality of life. The aim is to measure subjective well-being and health-related <br>quality of life in a variety of cultural settings and health conditions.<br>
         <br>The WHOQOL instruments are designed to be applicable across various cultures and nationalities,<br> taking into account diverse perspectives on what constitutes a good quality of life.<br> The assessment covers physical health, psychological health, social relationships, and the environment.</p>
        <br>
        
        <button class="cn"><a href="index.php">EXPLORE</a></button>
       
        <div class="form">
                <h2>Take Test</h2>
                <p class="guidelines">
                   
                    <h3>Discover your quality of life:</h3> <br>  
                    <li>Take a personal test to reflect on your well-being.</li><br>
                    <li>Your journey to a better life begins with self-awareness.</li>
                </p>
                <button class="btnn"><a href="questions.php">Start</a></button>
            </div>
        </div>
     </div>
     <footer>
        <p>&copy; 2023 WHOQOL. All rights reserved.</p>
    </footer>
    </div>
</body>
</html>