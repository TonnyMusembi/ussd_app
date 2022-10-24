<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Charts</title>
</head>
<body>
    <h1>JaTon Ltd.io</h1>
     <div id="google-line-chart" style="height: 500px"></div>

</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Month Name', 'Register Users Count'],

            @php
                foreach($users as $key => $value) {
                    echo "['".$key."', ".$value."],";
                }
            @endphp
    ]);

    var options = {
      title: 'Register Users Month Wise',
      curveType: 'function',
      legend: { position: 'bottom' }
    };

      var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));

      chart.draw(data, options);
    }
</script>
</html>
