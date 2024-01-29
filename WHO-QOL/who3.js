// script.js
document.addEventListener("DOMContentLoaded", function () {
  const quizArray = [
    {
      id: "0",
      question: "Do you get the kind of support from others that you need?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
      marks: 0,
    },
    {
      id: "1",
      question: "How much do you need any medical treatment to function in your daily life?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "2",
      question: "How satisfied are you with your health?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "3",
      question: "To what extent do you feel that physical pain prevents you from doing what you need to do?",
      options: [
        {text:"Very poor",score:5},
        {text: "Poor",score: 4},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:2},
        {text:"Very Good",score:1}],
        marks: 0,
    },
    {
      id: "4",
      question: "How much do you need any medical treatment to function in your daily life?",
      options: [
        {text:"Very poor",score:5},
        {text: "Poor",score: 4},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:2},
        {text:"Very Good",score:1}],
        marks: 0,
    },
    {
      id: "5",
      question: "How much do you enjoy life?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "6",
      question: "To what extent do you feel your life to be meaningful?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "7",
      question: "How well are you able to concentrate?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "8",
      question: "How safe do you feel in your daily life?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "9",
      question: "How healthy is your physical environment?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
      },
    {
      id: "10",
      question: "Do you have enough energy for everyday life?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "11",
      question: "Are you able to accept your bodily appearance?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "12",
      question: "Have you enough money to meet your needs?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "13",
      question: "How available to you is the information that you need in your day-to-day life?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "14",
      question: "To what extent do you have the opportunity for leisure activities?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "15",
      question: "How well are you able to get around?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "16",
      question: "How satisfied are you with your sleep?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "17",
      question: "How satisfied are you with your ability to perform your daily living activities?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "18",
      question: "How satisfied are you with your capacity for work?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "19",
      question: "How satisfied are you with yourself?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "20",
      question: "How satisfied are you with your personal relationships?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "21",
      question: "How satisfied are you with the support you get from your friends?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "22",
      question: "How satisfied are you with the conditions of your living place?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "23",
      question: "How satisfied are you with your access to health services?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "24",
      question: "How satisfied are you with your mode of transportation?",
      options: [
        {text:"Very poor",score:1},
        {text: "Poor",score: 2},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:4},
        {text:"Very Good",score:5}],
        marks: 0,
    },
    {
      id: "25",
      question: "How often do you have negative feelings, such as blue mood, despair, anxiety, depression?",
      options: [
        {text:"Very poor",score:5},
        {text: "Poor",score: 4},
        {text: "Neither poor nor good",score:3},
        {text: "Good",score:2},
        {text:"Very Good",score:1}],
        marks: 0,
    },
  ];
  let prevBtn = document.getElementById("prev-button");

  let container = document.getElementById("container");
  let nextBtn = document.getElementById("next-button");
  let numberOfQuestion = document.getElementById("number-of-question");
  let displayContainer = document.getElementById("display-container");
  let scoreContainer = document.getElementById("score-container");
  let restartButton = document.getElementById("restart-button");
  const physicalHealthScore = document.getElementById("physical-health-score");
  const psychologicalHealthScore = document.getElementById("psychological-health-score");
  const socialHealthScore = document.getElementById("social-health-score");
  const environmentalHealthScore = document.getElementById("environmental-health-score");
  let totalScore = 0;
  let eh = 0;
  let ph = 0;
  let sh = 0;
  let mh = 0;
  let eh1 = 0;
  let ph1 = 0;
  let sh1 = 0;
  let mh1 = 0;
  let currentQuestion = 0;
  
  let selectedOption = null;

  function showQuestion() {
    if (currentQuestion < quizArray.length) {
        const currentQuestionData = quizArray[currentQuestion];

        numberOfQuestion.textContent = `${currentQuestion + 1} of ${quizArray.length} questions`;

        const questionElement = document.createElement("div");
        questionElement.className = "question";
        questionElement.innerHTML = currentQuestionData.question;

        const optionsElement = document.createElement("div");
        optionsElement.className = "options";

        currentQuestionData.options.forEach((option, index) => {
            const optionLabel = document.createElement("div");
            optionLabel.className = "option";
            optionLabel.textContent = option.text;

            optionLabel.onclick = function (event) {
                selectedOption = option;
                if (currentQuestion >= 2 && currentQuestion <= 8) {
                    ph1 += selectedOption.score;
                } else if (currentQuestion >= 9 && currentQuestion <= 14) {
                    mh1 += selectedOption.score;
                } else if (currentQuestion >= 15 && currentQuestion <= 17) {
                    sh1 += selectedOption.score;
                } else if (currentQuestion >= 18 && currentQuestion <= 25) {
                    eh1 += selectedOption.score;
                }
                document.querySelectorAll(".option").forEach((option) => {
                    option.classList.remove("selected");
                });
                event.target.classList.add("selected");
            };

            optionsElement.appendChild(optionLabel);
        });

        container.innerHTML = "";
        container.appendChild(questionElement);
        container.appendChild(optionsElement);
    } else {
        showResult();
    }
}

  
  function calculateHealthScores() {
    for (let i = 2; i <= 8; i++) {
      ph += quizArray[i].options.find((option) => option.text === document.querySelector('.option.selected').textContent).score;
    }
  
    for (let i = 9; i <= 14; i++) {
      mh += quizArray[i].options.find((option) => option.text === document.querySelector('.option.selected').textContent).score;
    }
  
    for (let i = 15; i <= 17; i++) {
      sh += quizArray[i].options.find((option) => option.text === document.querySelector('.option.selected').textContent).score;
    }
  
    for (let i = 18; i <= 25; i++) {
      eh += quizArray[i].options.find((option) => option.text === document.querySelector('.option.selected').textContent).score;
    }
  }
  
  
  function selectOptionAndMoveToNext() {
    if (selectedOption !== null) {
        totalScore += selectedOption.score;
        console.log(selectedOption.score);
        quizArray[currentQuestion].marks=selectedOption.score;
        console.log("After putting into marks.");
        console.log(totalScore);
        currentQuestion++;
        selectedOption = null;
        showQuestion();
    } else {
        alert("Please select an option before moving to the next question.");
    }
}
function showPrevQuestion() {
  if (currentQuestion > 0) {
      console.log("Prev button");
      if (selectedOption !== null) {
          totalScore -= selectedOption.score;
          console.log("Inside if prev");
      }
      console.log("Subtracted");
      console.log(totalScore);
      currentQuestion--;
        totalScore -= quizArray[currentQuestion].marks;
      selectedOption = null;
      showQuestion();
  } else {
      alert("You are already on the first question.");
  }
}


  
  function showResult() {
    calculateHealthScores();
  
    displayContainer.classList.add("hide");
    scoreContainer.classList.remove("hide");
    eh=eh1;
    ph=ph1;
    sh=sh1;
    mh=mh1;
    total=totalScore;
    eh1=((eh1-8)/40)*100;
    sh1=((sh1-3)/15)*100;
    mh1=((mh1-6)/30)*100;
    ph1=((ph1-7)/35)*100;
    totalScore=((totalScore-26)/130)*100;
    document.getElementById("user-score").textContent = `Your total score is: ${totalScore.toFixed(2)}%`;
    // physicalHealthScore.textContent = Physical Health Score: ${ph1};
// Physical Health Score
if (ph <= 14) {
  physicalHealthScore.textContent = `Physical Health Score: ${ph1.toFixed(2)}% - Low`;
} else if (ph <= 25 && ph > 14) {
  physicalHealthScore.textContent = `Physical Health Score: ${ph1.toFixed(2)}% - Moderate`;
} else {
  physicalHealthScore.textContent = `Physical Health Score: ${ph1.toFixed(2)}% - High`;
}

// Psychological Health Score
if (mh <= 12) {
  psychologicalHealthScore.textContent = `Psychological Health Score: ${mh1.toFixed(2)}% - Low`;
} else if (mh <= 18 && mh > 12) {
  psychologicalHealthScore.textContent = `Psychological Health Score: ${mh1.toFixed(2)}% - Moderate`;
} else {
  psychologicalHealthScore.textContent = `Psychological Health Score: ${mh1.toFixed(2)}% - High`;
}

// Social Health Score
if (sh <= 6) {
  socialHealthScore.textContent = `Social Health Score: ${sh1.toFixed(2)}% - Low`;
} else if (sh <= 12 && sh > 6) {
  socialHealthScore.textContent = `Social Health Score: ${sh1.toFixed(2)}% - Moderate`;
} else {
  socialHealthScore.textContent = `Social Health Score: ${sh1.toFixed(2)}% - High`;
}

// Environmental Health Score
if (eh <= 16) {
  environmentalHealthScore.textContent = `Environmental Health Score: ${eh1.toFixed(2)}% - Low`;
} else if (eh <= 24 && eh > 16) {
  environmentalHealthScore.textContent = `Environmental Health Score: ${eh1.toFixed(2)}% - Moderate`;
} else {
  environmentalHealthScore.textContent = `Environmental Health Score: ${eh1.toFixed(2)}% - High`;
}

    document.getElementById("user-score").textContent = `Your total score is: ${totalScore}`;
    if(total<=24)
    {
      document.getElementById("review").textContent ="Your quality of life is very poor";
    }
    else if(total>24 && total<=48)
    {
      document.getElementById("review").textContent ="Your quality of life is  poor";
    }
    else if(total>48 && total<=79)
    {
      document.getElementById("review").textContent ="Your quality of life is  neither good nor poor";
    }
    else if(total>79 && total<=96)
    {
      document.getElementById("review").textContent ="Your quality of life is good";
    }
    else if(total>=96)
    {
      document.getElementById("review").textContent ="Your quality of life is very good";
    }


    const phealthSuggestions = document.getElementById("phealth-suggestions");
    const shealthSuggestions = document.getElementById("shealth-suggestions");
    const ehealthSuggestions = document.getElementById("ehealth-suggestions");
    const mhealthSuggestions = document.getElementById("mhealth-suggestions");

   // Physical Health Suggestions
   if (ph <= 14) {
    phealthSuggestions.innerHTML += "<p><p>Physical health is low. Focus on building a consistent exercise routine, a balanced diet, and sufficient sleep.</p>";
  } else if (ph <= 25 && ph>14) {
    phealthSuggestions.innerHTML += "<p><p>Moderate physical health. Maintain regular physical activity and pay attention to hydration and nutrition.</p>";
  } else {
    phealthSuggestions.innerHTML += "<p><p>High physical health. Continue with regular exercise, emphasize a nutrient-dense diet, and prioritize recovery and rest.</p>";
  }
  
  
  // Psychological Health Suggestions
  if (mh <= 6) {
    mhealthSuggestions.innerHTML += "<p><p>Mental health is low. Consider practicing mindfulness, stress management techniques, and seek support from friends or professionals.</p>";
  } else if (mh <= 12 && mh>6) {
    mhealthSuggestions.innerHTML += "<p><p>Moderate mental health. Continue activities that bring joy, connect with loved ones, and prioritize mental well-being.</p>";
  } else {
    mhealthSuggestions.innerHTML += "<p><p>High mental health. Keep engaging in activities that promote mental wellness, foster positive relationships, and manage stress effectively.</p>";
  }
  
  // Social Health Suggestions
  if (sh <= 6) {
    shealthSuggestions.innerHTML += "<p><p>Social health is low. Focus on building and maintaining social connections, join clubs or groups, and actively participate in social activities.</p>";
  } else if (sh <= 12 && sh>6) {
    shealthSuggestions.innerHTML += "<p><p>Moderate social health. Continue to nurture existing relationships, participate in social events, and be open to meeting new people.</p>";
  } else {
    shealthSuggestions.innerHTML += "<p><p>High social health. Keep fostering positive relationships, contributing to your community, and staying connected with a supportive social network.</p>";
  }
  
  
  
  // Environmental Health Suggestions
  if (eh <= 16) {
    ehealthSuggestions.innerHTML += "<p><p>Environmental health is low. Consider adopting sustainable practices, reducing your carbon footprint, and being mindful of your surroundings.</p>";
  } else if (eh <= 24 && eh >16) {
    ehealthSuggestions.innerHTML += "<p><p>Moderate environmental health. Continue eco-friendly habits, support local initiatives, and be conscious of your impact on the environment.</p>";
  } else {
    ehealthSuggestions.innerHTML += "<p><p>High environmental health. Sustain eco-friendly behaviors, advocate for environmental causes, and inspire others to adopt sustainable practices.</p>";
  }
    
  drawSemicircleCharts();
        drawBarGraph();
    sendScoresToServer(); 
    // Add logic to calculate and display health scores based on the total score
  }
  function sendScoresToServer() {
    // Prepare data to be sent
    const data = {
        totalScore: totalScore,
        physicalHealthScore: ph1,
        psychologicalHealthScore: mh1,
        socialHealthScore: sh1,
        environmentalHealthScore: eh1
    };

    // Use fetch API to send data to the PHP script
    fetch('catch.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.error('Error:', error));
}
function restartQuiz() {
  currentQuestion = 0;
  totalScore = 0;
  displayContainer.classList.remove("hide");
  scoreContainer.classList.add("hide");
  showQuestion();
}
  function drawBarGraph() {
    var xValues = ["Physical Health", "Psychological Health", "Social Health", "Environmental Health", "Total Health"];
    var yValues = [ph1, mh1, sh1, eh1, totalScore];
    var barColors = ["red", "green", "blue", "orange", "brown"];
  
    var ctx = document.getElementById("myChart").getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: "Scores"
        }
      }
    });
  
    return false;
  }
  function drawSemicircleChart(ctx, label, value, color) {
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [label],
            datasets: [{
                data: [value, 100 - value],
                backgroundColor: [color, 'transparent'],
                borderWidth: 0,
            }]
        },
        options: {
            cutout: '80%', // Adjust the cutout to create a semicircle
            rotation: 1 * Math.PI, // Rotate the chart to start from the top
            circumference: 1 * Math.PI, // Limit the circumference to create a semicircle
            legend: { display: false },
            title: {
                display: true,
                text: label,
                fontSize: 16,
            },
            tooltips: { enabled: false },
        }
    });
}

function drawSemicircleCharts() {
    var labels = ["Physical Health", "Psychological Health", "Social Health", "Environmental Health", "Total Health"];
    var values = [ph1, mh1, sh1, eh1, totalScore];
    var colors = ["red", "green", "blue", "orange", "brown"];

    var graphContainer = document.getElementById("myChart");
    graphContainer.innerHTML = ""; // Clear the existing canvas content

    for (var i = 0; i < labels.length; i++) {
        var canvas = document.createElement("canvas");
        canvas.width = 100;
        canvas.height = 100;
        graphContainer.appendChild(canvas);

        var ctx = canvas.getContext("2d");
        drawSemicircleChart(ctx, labels[i], values[i], colors[i]);
    }
}

// Call this function to draw the semicircle charts

  

  document.getElementById("start-button").onclick = function () {
    document.getElementById("start-screen").classList.add("hide");
    displayContainer.classList.remove("hide");
    showQuestion();
  };
  
  nextBtn.onclick = selectOptionAndMoveToNext;
    restartButton.onclick = restartQuiz;
    prevBtn.onclick = showPrevQuestion;
    
});
  