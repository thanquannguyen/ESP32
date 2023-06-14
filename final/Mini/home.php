<!DOCTYPE HTML>
<html>

<head>
    <title>ESP32</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="icon" href="data:,">
    <style>
        html {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: inline-block;
            text-align: center;
        }

        body {
            margin: 0;
        }

        .topnav {
            overflow: hidden;
            background-color: #4e4b5c;
            color: white;
            font-size: 1.2rem;
        }

        .content {
            padding: 5px;
        }

        .card {
            background-color: white;
            box-shadow: 0px 0px 15px 1px rgba(140, 140, 140, 0.8);
            border: 1px solid #4e4b5c;
            border-radius: 15px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0px 0px 25px 1px rgba(140, 140, 140, 0.8);
        }

        .card.header {
            background-color: #4e4b5c;
            color: white;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-top-right-radius: 12px;
            border-top-left-radius: 12px;
        }

        .cards {
            max-width: 1600px;
            min-width: 400px;
            margin: 0 auto;
            display: grid;
            grid-gap: 2rem;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .reading {
            font-size: 1.3rem;
        }

        .packet {
            color: #a5a5a5;
        }

        .temperatureColor {
            color: #f44336;
        }

        .humidityColor {
            color: #2196f3;
        }

        .moistureColor {
            color: #7a4538;
        }

        .statusreadColor {
            color: #9c27b0;
            font-size: 12px;
        }

        .LEDColor {
            color: #4e4b5c;
        }

        /* Toggle Switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            display: none;
        }

        .sliderTS {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #d3d3d3;
            transition: 0.4s;
            border-radius: 34px;
        }

        .sliderTS:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: #f7f7f7;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked+.sliderTS {
            background-color: #00878f;
        }

        input:focus+.sliderTS {
            box-shadow: 0 0 1px #2196f3;
        }

        input:checked+.sliderTS:before {
            transform: translateX(26px);
        }

        .sliderTS:after {
            content: "OFF";
            color: white;
            display: block;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 70%;
            font-size: 10px;
            font-family: Verdana, sans-serif;
            transition: 0.3s;
        }

        input:checked+.sliderTS:after {
            left: 25%;
            content: "ON";
        }

        input:disabled+.sliderTS {
            opacity: 0.3;
            cursor: not-allowed;
            pointer-events: none;
        }

        .sliderTS:hover:before {
            background-color: #f5f5f5;
        }

        .sliderTS:hover:after {
            color: #4e4b5c;
        }

        .button {
            display: inline-block;
            background-color: #4e4b5c;
            color: #fff;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .button:hover {
            background-color: #3b3a4d;
        }

        .button:active {
            background-color: #5f5c6e;
            transform: translateY(1px);
        }

        .button:disabled,
        .button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        .button:focus {
            outline: none;
        }

        .button:disabled:focus,
        .button.disabled:focus {
            box-shadow: none;
        }

        .button.secondary {
            background-color: #fff;
            color: #4e4b5c;
            border: 2px solid #4e4b5c;
        }

        .button.secondary:hover {
            background-color: #f5f5f5;
            color: #3b3a4d;
            border-color: #3b3a4d;
        }

        .button.secondary:active {
            background-color: #e0e0e0;
            color: #5f5c6e;
            border-color: #5f5c6e;
            transform: translateY(1px);
        }

        .button.secondary:disabled,
        .button.secondary.disabled {
            background-color: #f5f5f5;
            color: #a0a0a0;
            border-color: #a0a0a0;
            cursor: not-allowed;
            pointer-events: none;
        }

        .button.secondary:focus {
            outline: none;
        }

        .button.secondary:disabled:focus,
        .button.secondary.disabled:focus {
            box-shadow: none;
        }

        .button.rounded {
            border-radius: 50px;
        }

        .button.large {
            font-size: 16px;
            padding: 12px 24px;
        }

        .button.small {
            font-size: 12px;
            padding: 8px 16px;
        }

        .button-group {
            display: inline-block;
            margin: 10px;
        }

        .button-group .button:not(:last-child) {
            border-right: none;
        }

        .button-group .button:first-child {
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
        }

        .button-group .button:last-child {
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .button-group .button:hover {
            background-color: #3b3a4d;
        }

        .button-group .button:active {
            background-color: #5f5c6e;
            transform: translateY(1px);
        }

        .button-group .button:disabled,
        .button-group .button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        .hidden {
            display: none;
        }

        .visible {
            display: block;
        }

        .slide {
            transition: height 0.5s ease-out;
            overflow: hidden;
        }

        /* TABLE STYLE */
        .styled-table {
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            border-radius: 0.5em;
            overflow: hidden;
            width: 90%;
        }

        .styled-table thead tr {
            background-color: #4e4b5c;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th {
            padding: 12px 15px;
            text-align: left;
        }

        .styled-table td {
            padding: 12px 15px;
            text-align: left;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .bdr {
            border-right: 1px solid #e3e3e3;
            border-left: 1px solid #e3e3e3;
        }

        td:hover {
            background-color: #1d1f33;
            transition: background-color 0.3s ease-in-out;
        }

        tr:hover {
            background-color: #1d1f33;
            transition: background-color 0.3s ease-in-out;
            color: #ffffff;
        }

        .styled-table tbody tr:nth-of-type(even):hover {
            background-color: #1d1f33;
            transition: background-color 0.3s ease-in-out;
        }

        /* BUTTON STYLE */
        .btn-group .button {
            background-color: #4e4b5c;
            border: 1px solid #e3e3e3;
            color: white;
            padding: 10px 20px;
            margin: 4px 2px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            float: center;
            transition: all 0.3s ease-in-out;
            border-radius: 5px;
            margin: 5px;
        }

        .btn-group .button:not(:last-child) {
            border-right: none;
        }

        .btn-group .button:hover {
            background-color: #3a3750;
            color: #ffffff;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .btn-group .button:active {
            background-color: #4e4b5c;
            color: #ffffff;
            transform: translateY(1px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .btn-group .button:disabled,
        .button.disabled {
            color: #fff;
            background-color: #a0a0a0;
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // Show monitoring section by default
            $('#monitoringSection').addClass('visible');

            // Add click event to monitoring button
            $('#monitoringBtn').click(function () {
                $('#monitoringSection').addClass('visible').removeClass('hidden');
                $('#chartSection').addClass('hidden').removeClass('visible');
            });

            // Add click event to chart button
            $('#chartBtn').click(function () {
                $('#chartSection').addClass('visible').removeClass('hidden');
                $('#monitoringSection').addClass('hidden').removeClass('visible');
            });
            // var firstOptionValue = $("#date option:first").val();
            // loadChart(firstOptionValue);
            // updateTable(firstOptionValue);
            $("#date").change(function () {
                loadChart(this.value);
                updateTable(this.value);
            });

            setInterval(function () {
                updateData();
                latestData();
                getDates();
            }, 5000);

        });

        function getDates() {
            $.ajax({
                url: "get_dates.php",
                type: "GET",
                dataType: "json",
                success: function (response) {
                    var currentValue = $('#date').val();

                    // Clear existing options
                    $('#date').empty();
                    // Add new options
                    $.each(response, function (index, value) {
                        var selected = '';
                        if (value.date == currentValue) {
                            selected = 'selected';
                        }
                        $('#date').append('<option value="' + value.date + '" ' + selected + '>' + value.date + '</option>');
                    });
                    // Trigger change event to load chart and table for first date
                    $('#date').change();
                },
                error: function (xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        }

        function updateData() {
            $.ajax({
                type: 'GET',
                url: 'getdata.php',
                dataType: 'json',
                success: function (data) {
                    $('#ESP32_Temp').html(data.temperature);
                    $('#ESP32_Humd').html(data.humidity);
                    $('#ESP32_LTRD').html("Time : " + data.ls_time + " | Date : " + data.ls_date);
                },
                error: function (xhr, status, error) {
                    console.log("Error: " + error);
                }

            });
        }

        function updateTable(selectedDate) {
            // var xhr = new XMLHttpRequest();
            // xhr.onreadystatechange = function () {
            //     if (this.readyState == 4 && this.status == 200) {
            //         document.getElementById("table-body").innerHTML = this.responseText;
            //     }
            // };
            // xhr.open("GET", "update_table.php?date=" + selectedDate, true);
            // xhr.send();
            $.ajax({
                url: "update_table.php",
                type: "GET",
                data: {
                    date: selectedDate
                },
                success: function (response) {
                    $('#table-body').html(response);
                },
                error: function (xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        }

        function latestData() {
            // var xhr = new XMLHttpRequest();
            // xhr.onreadystatechange = function () {
            //     if (this.readyState == 4 && this.status == 200) {
            //         document.getElementById("latest-table").innerHTML = this.responseText;
            //     }
            // };
            // xhr.open("GET", "latest_data.php", true);
            // xhr.send();
            $.ajax({
                url: "latest_data.php",
                type: "GET",
                success: function (response) {
                    $('#latest-table').html(response);
                },
                error: function (xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        }

        function loadChart(selectedDate) {
            var temperatureData = [];
            var humidityData = [];
            var timeData = [];
            $.ajax({
                url: "load_chart.php",
                type: "GET",
                data: {
                    date: selectedDate
                },
                dataType: "json",
                success: function (response) {
                    $.each(response, function (index, value) {
                        temperatureData.push(value.temperature);
                        humidityData.push(value.humidity);
                        timeData.push(value.time);
                    });
                    renderChart(timeData, humidityData, temperatureData);
                },
                error: function (xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        }

        function renderChart(timeData, humidityData, temperatureData) {
            // Retrieve time values from PHP and convert them to JavaScript array

            // Get the canvas element and create the chart
            var ctx = document.getElementById('chart').getContext('2d');
            var oldChart = Chart.getChart(ctx);
            if (oldChart) {
                oldChart.destroy();
            }
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: timeData,
                    datasets: [{
                        label: 'Humidity',
                        data: humidityData,
                        fill: false,
                        borderColor: 'blue',
                        tension: 0.1
                    }, {
                        label: 'Temperature',
                        data: temperatureData,
                        fill: false,
                        borderColor: 'green',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Time'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Value'
                            }
                        }
                    }
                }
            });
        }

    </script>
</head>

<body>
    <div class="topnav">
        <h3>ESP32</h3>
    </div>

    <br>

    <div class="btn-group">
        <button class="button" id="monitoringBtn">
            Monitor
        </button>
        <button class="button" id="chartBtn">
            Data
        </button>
    </div>

    <div class="slide" id="monitoringSection">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="card header">
                        <h3 style="font-size: 1rem;">MONITOR</h3>
                    </div>

                    <h4 class="temperatureColor"><i class="fas fa-thermometer-half"></i> TEMPERATURE</h4>
                    <p class="temperatureColor"><span class="reading"><span id="ESP32_Temp"></span> &deg;C</span></p>
                    <h4 class="humidityColor"><i class="fas fa-tint"></i> HUMIDITY</h4>
                    <p class="humidityColor"><span class="reading"><span id="ESP32_Humd"></span> &percnt;</span></p>

                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="slide hidden" id="chartSection">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="card header">
                        <h3 style="font-size: 1rem;">CHART</h3>
                    </div>

                    <div class="container">
                        <div class="chart-container"
                            style="position: relative; height:40vh; width:50vw; margin-left:15px;">
                            <canvas id="chart"></canvas>

                        </div>
                    </div>

                    </p>
                </div>
                <div class="card">
                    <div class="card header">
                        <h3 style="font-size: 1rem;">DATA</h3>
                    </div>

                    <div class="data-container">
                        <form method="post">
                            <label for="date">Select Date:</label>
                            <select name="date" id="date">
                                <option>Loading dates...</option>
                            </select>
                        </form>
                        <div id="latest-data">
                            <h2>Latest Data</h2>
                            <table class="styled-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>TIME</th>
                                        <th>HUMIDITY (%)</th>
                                        <th>TEMPERATURE (°C)</th>
                                    </tr>
                                </thead>
                                <tbody id="latest-table">

                                </tbody>
                            </table>

                        </div>
                        <div class="table-container" style="height: 400px; overflow-x: auto;">
                            <h2>Data</h2>
                            <table class="styled-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>TIME</th>
                                        <th>HUMIDITY (%)</th>
                                        <th>TEMPERATURE (°C)</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <div class="slide">
        <div class="content">
            <div class="cards">
                <div class="card header" style="border-radius: 15px;">
                    <h3 style="font-size: 0.7rem;">LAST TIME RECEIVED DATA FROM ESP32 [ <span id="ESP32_LTRD"></span>
                        ]</h3>
                    <h3 style="font-size: 0.7rem;"></h3>
                </div>
            </div>
            <div class="btn-group">
                Export to:
                <button class="button">
                    TXT
                </button>
                <button class="button">
                    CSV
                </button>
            </div>
        </div>
    </div>
    <!-- ___________________________________________________________________________________________________________________________________ -->

</body>

</html>