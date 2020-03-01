
function getResult() {
    $(".loader").show();
    $.ajax({
        url: "https://jpkfruits.herokuapp.com/getFeatures/imgForProcessing.jpg",
        type: 'GET',
        datatype: "json",
        Timeout: 3000,
        success: function(res) {
            var obj = JSON.parse(res)
            var easyObject = obj.Results.output1.value.Values;
            var result = easyObject[0][14];
            var scoredValues = [easyObject[0][13], easyObject[0][12], easyObject[0][11], easyObject[0][10], easyObject[0][9]];
            document.getElementById("graph-block").style.display = "block";
            generateGraph(result, scoredValues);
            $(".loader").hide()
        },
        error: function(xhr, status, error) {
            window.alert(xhr.responseText);
        }
    });


}

function generateGraph(result, values) {
    Chart.defaults.global.defaultFontSize = 14
    Chart.defaults.global.defaultFontColor = 'white'
    new Chart(document.getElementById("myChart"), {
        type: 'doughnut',
        data: {
            labels: ["Zelena jabuka", "Lubenica", "Limun", "Crvena jabuka", "Banana"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: [parseFloat(values[0]).toFixed(15), parseFloat(values[1]).toFixed(15), parseFloat(values[2]).toFixed(15), parseFloat(values[3]).toFixed(15), parseFloat(values[4]).toFixed(15)]
            }]
        },
        options: {
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 25,
                    bottom: 50
                }
            },
            responsive:true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Result of classification: ' + result.charAt(0).toUpperCase() + result.substring(1),
                fontColor: 'white',
                fontSize: 30
            }
        }
    });
}