<!DOCTYPE html>
<html lang="en">
<head>
    <title>Explore</title>
    <link rel="stylesheet" href="temp.css">
    <style>
        body {
            margin: 0;
            background-image: url("background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            width: 100%;
            background-position: center;
            height: 100%;
            font-family: 'Roboto', sans-serif;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 30px;
        }

        .grid_item {
    background-color: linear-gradient(rgba(0.7, 0.7, 0.7, 0.7), rgba(0.7, 0.7, 0.7, 0.7));
    color: white;
    border-radius: 0.4rem;
    overflow: hidden;
    box-shadow: 0 3rem 6rem rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: 0.2s;
    margin-bottom: 10px; /* Adjust the margin between grid items */
    width: calc(25% - 20px); /* Adjust the width of each grid item to fit four items in a row */
}
        .grid_item:hover {
            transform: translateY(-2%);
            box-shadow: 0 4rem 8rem rgba(0, 0, 0, 0.2);
        }

        .card__img {
            display: block;
            width: 100%;
            height: 15rem; /* Adjust the height of the images */
            object-fit: cover;
            padding: 0rem;
        }

        .card__content {
            padding: 1rem 1rem; /* Adjust the padding of the card content */
        }

        .card__header {
            font-size: 2rem; /* Adjust the font size of the header */
            font-weight: 500;
            color: white;
            margin-bottom: 0rem; /* Adjust the margin of the header */
        }

        .card__text {
            font-size: 1rem; /* Adjust the font size of the text */
            letter-spacing: 0.1rem;
            line-height: 1.5;
            color: white;
            margin-bottom: 1.5rem; /* Adjust the margin of the text */
        }

        .cn1 {
            width: 240px;
            height: 40px;
            background: #ff7200;
            border: none;
            margin-top: 30px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
            padding: 10px 20px;
            font-size: 14px;
        }

        .cn1:hover {
            background: #fff;
            color: #ff7200;
        }

        .cn1 a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            color: #fff;
        }

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
    <div class="container">
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
        </div>><br><br>
        <div class="grid">
            <!-- All grid items in a single row -->
            <div class="grid_item">
                <div class="card">
                    <img class="card__img" src="physical.jpg" alt="Physical Health">
                    <div class="card__content">
                        <h5 class="card__header">Physical Health</h5>
                        <p class="card__text">Physical health is vital for overall well-being. Exercise, a balanced diet, hydration, quality sleep, regular check-ups, and stress management promote optimal health for an active and fulfilling life.</p>
                    </div>
                </div>
            </div>
            <div class="grid_item">
                <div class="card">
                    <img class="card__img" src="envi.jpg" alt="Environmental Health">
                    <div class="card__content">
                        <h5 class="card__header">Environmental Health</h5>
                        <p class="card__text">Environmental health examines how surroundings impact well-being, including air and water quality, food safety, waste management, and more. It prevents health hazards through monitoring and interventions, involving scientific research, policy development, and community engagement for healthier, resilient societies.</p>
                    </div>
                </div>
            </div>
            <div class="grid_item">
                <div class="card">
                    <img class="card__img" src="psycho.jpg" alt="Psychological Health">
                    <div class="card__content">
                        <h5 class="card__header">Psychological Health</h5>
                        <p class="card__text">Psychological health is vital for well-being, encompassing resilience, positive relationships, and self-esteem. Balancing work, adopting healthy habits, and seeking support contribute to it. Destigmatizing mental health is crucial for supportive environments, emphasizing the link between mental and physical well-being.</p>
                    </div>
                </div>
            </div>
            <div class="grid_item">
                <div class="card">
                    <img class="card__img" src="soc.jpg" alt="Social Health">
                    <div class="card__content">
                        <h5 class="card__header">Social Health</h5>
                        <p class="card__text">Social health is about quality connections. It involves effective communication, empathy, and meaningful relationships, contributing to emotional well-being. It's a crucial aspect of overall health, emphasizing the importance of positive interpersonal connections for a fulfilling life.</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="cn"><a href="questions.php" style="text-decoration: none; color: black;">CHECK YOUR QUALITY OF LIFE</a></button>
        <br><br><footer>
            <p>&copy; 2023 WHOQOL. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
