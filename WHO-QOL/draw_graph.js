document.addEventListener("DOMContentLoaded", function () {
    let healthScores = []; 
    let healthScores1 = [];// Structure to hold all health scores
    // Process scores data (store scores in the healthScores structure)
    function processScores(scores) {
        healthScores = scores.map(score => ({
            time: new Date(score.time), // Convert time to Date format
            ph: score.ph_score,
            mh: score.mh_score,
            sh: score.sh_score,
            eh: score.eh_score,
            total: score.overall,
        }));
        healthScores1 = scores.map(score => ({
            time: new Date(score.time), // Convert time to Date format
           
            total: score.overall,
        }));
    }

    function drawStackedBarGraph(healthScores, timeArray) {
        var xValues = timeArray;
        var yValues = [
            healthScores.map(score => score.ph),
            healthScores.map(score => score.mh),
            healthScores.map(score => score.sh),
            healthScores.map(score => score.eh),
        ];

        var barColors = ["#308fac", "#37bd79", "#a7e237", "#f4e604"];

        var canvas = document.getElementById("barChartLoc");

        if (canvas.chart) {
            canvas.chart.destroy();
        }

        var ctx = canvas.getContext("2d");
        canvas.chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [
                    {
                        label: "Physical Health",
                        backgroundColor: barColors[0],
                        data: yValues[0],
                    },
                    {
                        label: "Mental Health",
                        backgroundColor: barColors[1],
                        data: yValues[1],
                    },
                    {
                        label: "Social Health",
                        backgroundColor: barColors[2],
                        data: yValues[2],
                    },
                    {
                        label: "Environmental Health",
                        backgroundColor: barColors[3],
                        data: yValues[3],
                    },
                ],
            },
            options: {
                scales: {
                    x: {
                        stacked: true,
                        ticks: {
                            color: 'white',
                        },
                        title: {
                            display: true,
                            text: 'Time',
                            color: 'white',
                        },
                    },
                    y: {
                        stacked: true,
                        ticks: {
                            color: 'white',
                            beginAtZero: true,
                        },
                        title: {
                            display: true,
                            text: 'Scores',
                            color: 'white',
                        },
                    },
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'white',
                    },
                },
                title: {
                    display: true,
                    text: 'Stacked Bar Chart - Health Scores Over Time',
                    fontColor: 'white',
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.dataset.label || '';

                                if (label) {
                                    label += ': ';
                                }

                                label += Math.round(context.parsed.y);

                                // Add total score on top of each bar
                                if (context.datasetIndex === 3) {
                                    label += ' (Total: ' + healthScores[context.dataIndex].total + ')';
                                }

                                return label;
                            }
                        }
                    }
                }
            }
        });
    }

    function drawLineGraph(healthScores1, timeArray) {
        var xValues = timeArray; // Take the last 5 elements
    
        // Separate datasets for each health score and overall score
        var datasets = [
            {
                label: "Overall Score",
                borderColor: "#ff7200",
                fill: false,
                data: healthScores1.map(score => score.total),
            },
        ];
    
        var canvas = document.getElementById("lineChartLoc");
    
        if (canvas.chart) {
            canvas.chart.destroy();
        }
    
        var ctx = canvas.getContext("2d");
        canvas.chart = new Chart(ctx, {
            type: "line",
            data: {
                labels: xValues,
                datasets: datasets,
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            color: 'white',
                        },
                        title: {
                            display: true,
                            text: 'Time',
                            color: 'white',
                        },
                    },
                    y: {
                        ticks: {
                            color: 'white',
                            beginAtZero: true,
                        },
                        title: {
                            display: true,
                            text: 'Score',
                            color: 'white',
                        },
                    },
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'white',
                    },
                },
                title: {
                    display: true,
                    text: 'Line Chart - Health Scores Over Time',
                    fontColor: 'white',
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += Math.round(context.parsed.y);
                                return label;
                            }
                        }
                    }
                }
            }
        });
    }
    
    

    // Fetch scores from the scoresData variable set by PHP
    processScores(scoresData);
    drawStackedBarGraph(healthScores, timeArray);
    drawLineGraph(healthScores1, timeArray);
});
