var hexCode = ["#4cc4c4", "#d1cde1", "#0d9ff9", "#fb9c46", "#fbdb94", "#fccb55", "#fb6484", "#f99ba5", "#c49e99", "#dd5674", "#38b8d5"];
hexCode = hexCode.concat(hexCode);

$.ajax({
    type: "get",
    url: 'http://localhost:8000/api/v1/survey-result',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}).done(function (response) {
    drawGraph(response);
    // var jsonObj = JSON.parse(response);
    // console.log(jsonObj.length);
});


function drawGraph(response) {
    var jsonObj = JSON.parse(response);

    var academic_year = [];
    var academic_year_data = [];

    var major = [];
    var major_data = [];

    var academic_level = [];
    var academic_level_data = [];

    var isRightJob = [];
    var isRightJob_data = [];

    var workingPlace = [];
    var workingPlace_data = [];

    var salary = [];
    var salary_data = [];

    for(var key in jsonObj[0]){
        academic_year.push(key);
        academic_year_data.push(jsonObj[0][key]);
    }

    for(var key in jsonObj[1]){
        major.push(key);
        major_data.push(jsonObj[1][key]);
    }

    for(var key in jsonObj[2]){
        academic_level.push(key);
        academic_level_data.push(jsonObj[2][key]);
    }

    for(var key in jsonObj[3]){
        isRightJob.push(key);
        isRightJob_data.push(jsonObj[3][key]);
    }

    for(var key in jsonObj[4]){
        workingPlace.push(key);
        workingPlace_data.push(jsonObj[4][key]);
    }

    for(var key in jsonObj[5]){
        salary.push(key);
        salary_data.push(jsonObj[5][key]);
    }

    barChart(academic_year, academic_year_data, 'Sinh viên các khóa', "academic_year", 'bar');
    barChart(major, major_data, 'Chuyên ngành theo học', "major", 'horizontalBar');
    barChart(academic_level, academic_level_data, 'Trình độ học vấn', "academic_level", 'bar');
    pieChart(isRightJob, isRightJob_data, 'Tỷ lệ sinh viên làm đúng ngành', "isRightJob");
    barChart(workingPlace, workingPlace_data, 'Nơi làm việc', "workingPlace", 'bar');
    barChart(salary, salary_data, 'Mức lương sau khi ra trường', "salary", 'horizontalBar');
}


function barChart (labelsInput, dataInput, labelInput, name, typeBar) {
    var ctx = document.getElementById(name);
    var myChart = new Chart(ctx, {
        type: typeBar,
        data: {
            labels: labelsInput,
            datasets: [{
                data: dataInput,
                backgroundColor: hexCode,
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            title: {
                display: true,
                text: labelInput,
                fontColor: '#f9530b',
                fontSize: 30,
                padding: 60
            },
            layout: {
                padding: {
                    left: 400,
                    right: 400,
                    top: 0,
                    bottom: 0
                }
            },
            legend: {
                display: false
            }

        }
    });
}
function pieChart (labelsInput, dataInput, labelInput, name) {
    var ctx = document.getElementById(name);
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labelsInput,
            datasets: [{
                label: labelInput,
                data: dataInput,
                backgroundColor: hexCode,
                borderWidth: 5
            }]
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                        var total = meta.total;
                        var currentValue = dataset.data[tooltipItem.index];
                        var percentage = parseFloat((currentValue/total*100).toFixed(1));
                        return currentValue + ' (' + percentage + '%)';
                    },
                    title: function(tooltipItem, data) {
                        return data.labels[tooltipItem[0].index];
                    }
                }
            },
            legend: {
                position: 'right',
                labels: {
                    fontSize: 15,
                    padding: 30
                }
            },
            title: {
                display: true,
                text: labelInput,
                fontColor: '#f9530b',
                fontSize: 30,
                padding: 60
            },
            layout: {
                padding: {
                    left: 300,
                    right: 300,
                    top: 0,
                    bottom: 0
                }
            }
        }
    });
}