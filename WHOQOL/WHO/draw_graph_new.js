document.addEventListener("DOMContentLoaded", function () {
    let femaleTeaching = {
        ph: femaleTeachingData.ph,
        mh: femaleTeachingData.mh,
        sh: femaleTeachingData.sh,
        eh: femaleTeachingData.eh,
        total: femaleTeachingData.total,
    };

    let maleTeaching = {
        ph: maleTeachingData.ph,
        mh: maleTeachingData.mh,
        sh: maleTeachingData.sh,
        eh: maleTeachingData.eh,
        total: maleTeachingData.total,
    };

    let assocProfTeaching = {
        ph: assocProfTeachingData.ph,
        mh: assocProfTeachingData.mh,
        sh: assocProfTeachingData.sh,
        eh: assocProfTeachingData.eh,
        total: assocProfTeachingData.total,
    };

    let asstProfTeaching = {
        ph: asstProfTeachingData.ph,
        mh: asstProfTeachingData.mh,
        sh: asstProfTeachingData.sh,
        eh: asstProfTeachingData.eh,
        total: asstProfTeachingData.total,
    };

    let profTeaching = {
        ph: profTeachingData.ph,
        mh: profTeachingData.mh,
        sh: profTeachingData.sh,
        eh: profTeachingData.eh,
        total: profTeachingData.total,
    };

    let profHeadTeaching = {
        ph: profHeadTeachingData.ph,
        mh: profHeadTeachingData.mh,
        sh: profHeadTeachingData.sh,
        eh: profHeadTeachingData.eh,
        total: profHeadTeachingData.total,
    };

    let ageGroupsTeaching = {
        ph: ageGroupsTeachingData.ph,
        mh: ageGroupsTeachingData.mh,
        sh: ageGroupsTeachingData.sh,
        eh: ageGroupsTeachingData.eh,
        total: ageGroupsTeachingData.total,
    };

    function drawStackedBarGraph(datasets) {
        console.log(datasets);
        var xValues = ["Female", "Male", "Assoc Prof", "Asst Prof", "Prof", "Prof&Head", "19-30", "31-40", "41-50", "51-60", "Above 60"];
        var yValues = [
            [datasets.female.ph, datasets.male.ph, datasets.assocProf.ph, datasets.asstProf.ph, datasets.prof.ph, datasets.profHead.ph, datasets.ageGroups.ph],
            [datasets.female.mh, datasets.male.mh, datasets.assocProf.mh, datasets.asstProf.mh, datasets.prof.mh, datasets.profHead.mh, datasets.ageGroups.mh],
            [datasets.female.sh, datasets.male.sh, datasets.assocProf.sh, datasets.asstProf.sh, datasets.prof.sh, datasets.profHead.sh, datasets.ageGroups.sh],
            [datasets.female.eh, datasets.male.eh, datasets.assocProf.eh, datasets.asstProf.eh, datasets.prof.eh, datasets.profHead.eh, datasets.ageGroups.eh]
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
                        backgroundColor: [barColors[0]],
                        data: [yValues[0][0], yValues[0][1], yValues[0][2], yValues[0][3], yValues[0][4], yValues[0][5], yValues[0][6], yValues[0][7], yValues[0][8], yValues[0][9], yValues[0][10]],
                    },
                    {
                        label: "Mental Health",
                        backgroundColor: [barColors[1]],
                        data: [yValues[1][0], yValues[1][1], yValues[1][2], yValues[1][3], yValues[1][4], yValues[1][5], yValues[1][6], yValues[1][7], yValues[1][8], yValues[1][9], yValues[1][10]],
                    },
                    {
                        label: "Social Health",
                        backgroundColor: [barColors[2]],
                        data: [yValues[2][0], yValues[2][1], yValues[2][2], yValues[2][3], yValues[2][4], yValues[2][5], yValues[2][6], yValues[2][7], yValues[2][8], yValues[2][9], yValues[2][10]],
                    },
                    {
                        label: "Environmental Health",
                        backgroundColor: [barColors[3]],
                        data: [yValues[3][0], yValues[3][1], yValues[3][2], yValues[3][3], yValues[3][4], yValues[3][5], yValues[3][6], yValues[3][7], yValues[3][8], yValues[3][9], yValues[3][10]],
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
                            text: 'Gender, Designation, and Age Groups',
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
                    text: 'Stacked Bar Chart - Health Scores',
                    fontColor: 'white',
                }
            }
        });
    }

    // Combine all datasets for the stacked bar chart
    let allDatasets = {
        female: femaleTeaching,
        male: maleTeaching,
        assocProf: assocProfTeaching,
        asstProf: asstProfTeaching,
        prof: profTeaching,
        profHead: profHeadTeaching,
        ageGroups: ageGroupsTeaching,
    };

    drawStackedBarGraph(allDatasets);
});
