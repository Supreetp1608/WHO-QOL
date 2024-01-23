document.addEventListener("DOMContentLoaded", function () {
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

        var canvas = document.getElementById("barChart");

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

    drawGroupedBarGraphUniversity(teaching,nonteaching,office);
});
