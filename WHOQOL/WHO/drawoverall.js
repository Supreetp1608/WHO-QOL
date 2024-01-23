document.addEventListener("DOMContentLoaded", function () {
    let female = {
        ph: femaleData.ph,
        mh: femaleData.mh,
        sh: femaleData.sh,
        eh: femaleData.eh,
        total: femaleData.overall,
    };

    let male = {
        ph: maleData.ph,
        mh: maleData.mh,
        sh: maleData.sh,
        eh: maleData.eh,
        total: maleData.overall,
    };
    let teaching = {
        ph: teachingData.ph,
        mh: teachingData.mh,
        sh: teachingData.sh,
        eh: teachingData.eh,
        total: teachingData.overall,
    };

    let nonteaching = {
        ph: nonteachingData.ph,
        mh: nonteachingData.mh,
        sh: nonteachingData.sh,
        eh: nonteachingData.eh,
        total: nonteachingData.overall,
    };
    let office = {
        ph: officeData.ph,
        mh: officeData.mh,
        sh: officeData.sh,
        eh: officeData.eh,
        total: officeData.overall,
    };
    let overallData={
        ph: averageScores['avg_ph'],
        mh: averageScores['avg_mh'],
        sh: averageScores['avg_sh'],
        eh: averageScores['avg_eh'],
        total: averageScores['avg_overall'],
    }
    function drawOverallGraph(overallData) {
        var labels = ["Overall Score", "Physical Health", "Mental Health", "Social Health", "Environmental Health"];
        var data = [overallData.total, overallData.ph, overallData.mh, overallData.sh, overallData.eh];
        var backgroundColors = ["#308fac", "#3cba9f", "#ffcc00", "#ff5733", "#9c27b0"];
    
        var canvas = document.getElementById("barChartOverall");
    
        if (canvas.chart) {
            canvas.chart.destroy();
        }
    
        var ctx = canvas.getContext("2d");
        canvas.chart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: backgroundColors,
                }],
            },
            options: {
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: 'white',
                    },
                },
                title: {
                    display: true,
                    text: 'Pie Chart - Health Scores Overall',
                    fontColor: 'white',
                }
            }
        });
    }
    
    function drawGroupedBarGraph(female, male) {
        var xValues = ["Overall Score","Physical Health", "Mental Health", "Social Health", "Environmental Health"];
        var yValues = [
            [female.total, male.total],
            [female.ph, male.ph],
            [female.mh, male.mh],
            [female.sh, male.sh],
            [female.eh, male.eh],
        ];

        var barColors = ["#308fac", "#37bd79"];

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
                        label: "Female",
                        backgroundColor: barColors[0],
                        data: [yValues[0][0], yValues[1][0], yValues[2][0], yValues[3][0],yValues[4][0]],
                    },
                    {
                        label: "Male",
                        backgroundColor: barColors[1],
                        data: [yValues[0][1], yValues[1][1], yValues[2][1], yValues[3][1],yValues[4][1]],
                    },
                ],
            },
            options: {
                scales: {
                    x: {
                        stacked: false,
                        ticks: {
                            color: 'white',
                        },
                        title: {
                            display: true,
                            text: 'Health Categories',
                            color: 'white',
                        },
                    },
                    y: {
                        stacked: false,
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
                    text: 'Grouped Bar Chart - Health Scores by Gender',
                    fontColor: 'white',
                }
            }
        });
    }
    function drawGroupedBarGraphUniversity(teaching, nonteaching,office) {
        var xValues = ["Overall Score","Physical Health", "Mental Health", "Social Health", "Environmental Health"];
        var yValues = [
            [teaching.total,nonteaching.total,office.total],
            [teaching.ph, nonteaching.ph,office.ph],
            [teaching.mh, nonteaching.mh,office.mh],
            [teaching.sh, nonteaching.sh,office.sh],
            [teaching.eh, nonteaching.eh,office.eh],
        ];

        var barColors = ["#308fac", "#37bd79",'#a7e237'];

        var canvas = document.getElementById("barChartUniversity");

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
                        label: "Teaching Staff",
                        backgroundColor: barColors[0],
                        data: [yValues[0][0], yValues[1][0], yValues[2][0], yValues[3][0],yValues[4][0]],
                    },
                    {
                        label: "Non Teaching Staff",
                        backgroundColor: barColors[1],
                        data: [yValues[0][1], yValues[1][1], yValues[2][1], yValues[3][1],yValues[4][1]],
                    },
                    {
                        label: "Office Staff",
                        backgroundColor: barColors[2],
                        data: [yValues[0][2], yValues[1][2], yValues[2][2], yValues[3][2],yValues[4][2]],
                    },
                ],
            },
            options: {
                scales: {
                    x: {
                        stacked: false,
                        ticks: {
                            color: 'white',
                        },
                        title: {
                            display: true,
                            text: 'Health Categories',
                            color: 'white',
                        },
                    },
                    y: {
                        stacked: false,
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
                    text: 'Grouped Bar Chart - Health Scores by Gender',
                    fontColor: 'white',
                }
            }
        });
    }
    //drawGroupedBarGraphPer(recent, overallData);
    drawOverallGraph(overallData);
    drawGroupedBarGraph(female, male);
    drawGroupedBarGraphUniversity(teaching,nonteaching,office);
});
