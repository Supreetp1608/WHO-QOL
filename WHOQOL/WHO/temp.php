<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="t.css">
    <style>
         body {
            margin: 0;
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),
                              url("flower.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; 
            width: 100%;
            background-position: center;
            height: 100%;
            font-family: 'Roboto', sans-serif;
        }
        /* Style the dropdown button */
/* .dropdown {
    display: inline-block;
} */

.dropbtn {
    font-size: 14px;
    display: inline-block;
    font-weight: bold;
    color: #fff;
    text-decoration: none;
    padding: 15px 20px;
    display: block;
}

/* Style the dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #333;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Style the links inside the dropdown */
.dropdown-content a {
    color: #fff;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color on hover */
.dropdown-content a:hover {
    background-color: #555;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

    </style>
</head>
<body>
<div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">WHOQOL</h2>
            </div>
            <nav>
            <div class="menu">
            <ul>
    <li><a href="main.php">HOME</a></li>
    <!-- <li><a href="#">ABOUT</a></li> -->
    <li><a href="per.php">PERSONAL</a></li>
    <li class="dropdown">
        <a href="#" class="dropbtn">STATISTICS</a>
        <div class="dropdown-content">
            <a href="statistics2.php">Overall</a>
            <a href="#">University Role</a>
            <a href="#">Gender</a>
            <a href="#">Age</a>
        </div>
    </li>
    <li><a href="login.php">LOGIN</a></li>
</ul>

            </div>
          </nav>
        </div> 
    <div class="content">
        <?
        php include 'registration.php';
        ?>
        <h1>The World Health Organization<br><span>Quality of Life </span> <br>(WHOQOL)</h1>
        <p class="par">WHOQOL stands for the World Health Organization Quality of Life.<br> The WHOQOL is a set of generic instruments developed by the World Health Organization (WHO) <br>to assess an individual's quality of life. The aim is to measure subjective well-being and health-related <br>quality of life in a variety of cultural settings and health conditions.<br>
         <br>The WHOQOL instruments are designed to be applicable across various cultures and nationalities,<br> taking into account diverse perspectives on what constitutes a good quality of life.<br> The assessment covers physical health, psychological health, social relationships, and the environment.</p>
        <br>
        
        <button class="cn"><a href="registration.php">EXPLORE</a></button>
        <div class="form">
                <h2>Take Test</h2>
                <p class="guidelines">
                   
                    <h3>Discover your quality of life:</h3> <br>  
                    <li>Take a personal test to reflect on your well-being.</li><br>
                    <li>Your journey to a better life begins with self-awareness.</li>
                </p>
                <button class="btnn"><a href="registration.php">Start</a></button>
            </div>
        </div>
     </div>
     <footer>
        <p>&copy; 2023 WHOQOL. All rights reserved.</p>
    </footer>
    </div>
    </div>
</body>
</html>