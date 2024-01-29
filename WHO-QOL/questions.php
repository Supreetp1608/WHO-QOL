<?php
session_start();
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quality of Life Quiz</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>


    <link rel="stylesheet" href="questions.css" />
    <style>
      .graph-container {
        background-color: #fff;
        border: 1px solid #000;
        padding: 10px; /* Adjust the padding as needed */
        margin-top: 20px; /* You can adjust this margin or use a different spacing */
        transition: none; /* Disable transitions for the graph container */
        width: 650px;
        height: 300px;
      }


      .options {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }

      .option {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .option:hover {
        background-color: #ff7200;
      }

      .option.selected {
        background-color: #ff7200;
        color: #fff;
      }
    </style> 
  </head>
  <body>
 


    <div class="start-screen" id="start-screen">
      <div class="labels">
        <h3>Guidelines:</h3><br>
 
        <li>All questions are compulsory to attend.<br /></li>
        <li>Click on any one of the option to select.</li>
        <li>No multiple-choice questions.</li>
        
        <br><br>
        <button id="start-button">Start Quiz</button>
      </div>
    </div>

    <div class="display-container hide" id="display-container">
    <div class="header">
      <div class="number-of-question" id="number-of-question"></div>
      </div>
      <div id="container"></div><br><br>
      <button id="prev-button" class="start-button">Previous</button>
      <button id="next-button" class="start-button">Next</button>
    </div>
    <div class="score-container hide" id="score-container">
      <div id="user-score"></div>
      <div id="physical-health-score"></div>
      <div id="psychological-health-score"></div>
      <div id="social-health-score"></div>
      <div id="environmental-health-score"></div>
      <div id="review"></div>
      <div class="graph-container">
        <canvas id="myChart" width="400" height="200"></canvas>
      </div><br><br>
      <!-- <div class="graph-container">
      <canvas id="semicircleChart" width="400" height="200"></canvas>
    </div> -->

      <h2>SUGGESTIONS</h2>
      <br>
      <div id="phealth-suggestions"></div><br>
      <div id="mhealth-suggestions"></div><br>

      <div id="shealth-suggestions"></div><br>

      <div id="ehealth-suggestions"></div><br>



      <button id="restart-button" class="cn1"><a href="questions.php" style="text-decoration: none; color: black;">Restart</a></button>
      <button id="exit" class="cn1"><a href="index.php" style="text-decoration: none; color: black;">Exit</a></button>
      <br><br>
      <div id="phealth-suggestions" style="font-style: italic;">Click below button to compare your quality of life with others!!!</div>
      <button id="statistics" class="start-button" align-self="center"><a href="stats.php" style="text-decoration: none; color: black;">Statistics</a></button>

    </div>
  
    <script src="who3.js"></script>
  </body>
</html>