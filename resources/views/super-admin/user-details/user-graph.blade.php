<!-- ==== User-Details-Graph ======= -->
<div class="row">
    <div class="col-xl-3">
        <div class="card card-body first-card">
            <div class="card card-head-title mini-card-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Total-Users
                </span>
                <div class="ring-div">
                    <div class="total-user-loader cricale-number-skeleton">
                        <span class="total-number">{{ $total_users }}</span>
                    </div>
                </div>
            </div>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $total_users_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $total_users_percentage }}%;">
                    {{ round($total_users_percentage, 2) }}%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-body second-card">
            <span class="card card-head-title mini-card-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Authentic Users
                </span>
                <div class="ring-div">
                    <div class="authentic-loader cricale-number-skeleton">
                        <span class="total-number">{{ $authentic_users }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{{ $authentic_users_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $authentic_users_percentage }}%;">
                    {{ round($authentic_users_percentage, 2) }}%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-body third-card">
            <span class="card card-head-title mini-card-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Inactive Users
                </span>
                <div class="ring-div">
                    <div class="inactive-loader cricale-number-skeleton">
                        <span class="total-number">{{ $inactive_users }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="{{ $inactive_users_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $inactive_users_percentage }}%;">
                    {{ round($inactive_users_percentage, 2) }}%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-body four-card">
            <span class="card card-head-title mini-card-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Log Activity Of Users
                </span>
                <div class="ring-div">
                    <div class="activity-loader cricale-number-skeleton">
                        <span class="total-number">{{ $activity_users }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped bg-blueviolet progress-bar-animated" role="progressbar" aria-valuenow="{{ $activity_users_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($activity_users_percentage, 2) }}%;">
                    {{ round($activity_users_percentage, 2) }}%
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-xl-6">
        <div class="card card-body five-card">
            <span class="card-head-title" style="border-bottom: 1px solid rgba(0, 0, 0, 0.175);">
                <span class="head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Users Summary
                </span>
            </span>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Super-Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['super_admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['super_admin'], 2) }}%;">
                            {{ round($percentageRoles['super_admin'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['super_admin']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['admin'], 2) }}%;">
                            {{ round($percentageRoles['admin'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['admin']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Sub-Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['sub_admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['sub_admin'], 2) }}%;">
                            {{ round($percentageRoles['sub_admin'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['sub_admin']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Accounts Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['accounts'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['accounts'], 2) }}%;">
                            {{ round($percentageRoles['accounts'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['accounts']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Marketing Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['marketing'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['marketing'], 2) }}%;">
                            {{ round($percentageRoles['marketing'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['marketing']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Delivery Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['delivery_team'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['delivery_team'], 2) }}%;">
                            {{ round($percentageRoles['delivery_team'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['delivery_team']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">General Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['users'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['users'], 2) }}%;">
                            {{ round($percentageRoles['users'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['users']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Total Users</span>
                </div>
                <div class="col-xl-6"></div>
                <div class="col-xl-2">
                    <span class="login-user-title sub_total_user total-number-skeletone pt-1">{{ $total_users }}.00</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card order_line_chart" id="orderChart">
            <div class="card-header bar-header ps-2" style="text-align:center;">
                <span class="card-head-title head-skeletone">
                    <i class="fa-solid fa-layer-group"></i> 
                    Total Users Bar Chart
                </span>
                <div class="loader_skeleton" id="loader_orderChart"></div>
            </div>
            <div class="card card-body third-card body-skeletone user-activities--month-bar-chart">
                <canvas id="userChart" width="100%" height="36"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-xl-12">
        <div class="container">
            <div id="chartContainer" style="height: 300px; width: 100%;margin: 0 auto;"></div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    const xValues = [
        "Super admin", "Admin", "Sub admin", "Accounts", "Marketing", "Delivery", "General",
        "Inactive Users","Authentic Users","Total Users","Log Activity"
    ];
    const barColors = ["royalblue", "royalblue", "royalblue", "royalblue", "royalblue", "royalblue", "royalblue","rgba(220, 53, 69)","#198754","#0d6efd","blueviolet"];

    // Pass the PHP array to JavaScript
    const userCounts = @json(array_values($usersCount));

    const userChart = new Chart("userChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            data: userCounts,
            backgroundColor: barColors,
            borderColor: "rgba(0, 0, 0, 0.1)",
            borderWidth: 1,
            hoverBackgroundColor: "#b2dfb2",
            hoverBorderColor: "blue",
            hoverBorderWidth: 3,
            }]
        },
        options: {
            responsive: true,
            legend: { display: false },
            scales: {
            y: {
                beginAtZero: true,
                grid: {
                color: 'rgba(0, 0, 0, 0.1)',
                },
                ticks: {
                color: '#4285F4',
                    font: {
                        size: 12,
                        weight: 'bold'
                    }
                }
            },
            x: {
                grid: {
                display: false
                },
                ticks: {
                color: '#f44242',
                font: {
                    size: 12,
                    weight: 'bold'
                }
                }
            }
            },
            animation: {
            duration: 2000,
            easing: 'easeInOutBounce',
            }
        }
    });
</script>
<script>
    // pie chart
    // window.onload = function () {

    //     var chart = new CanvasJS.Chart("pieChartContainer", {
    //         exportEnabled: true,
    //         animationEnabled: true,
    //         title:{
    //             text: "Total User Pie Chart",
    //             fontSize: 14, // Title font size
    //             fontFamily: "Segoe UI"
    //         },
    //         legend:{
    //             cursor: "pointer",
    //             itemclick: explodePie
    //         },
    //         legend: {
    //             cursor: "pointer",
    //             itemclick: explodePie,
    //             fontSize: 12 // Legend font size
    //         },
    //         data: [{
    //             type: "pie",
    //             showInLegend: true,
    //             toolTipContent: "{name}: <strong>{y}%</strong>",
    //             indexLabel: "{name} - {y}%",
    //             indexLabelFontSize: 12, 
    //             dataPoints: [
    //                 { y: 26, name: "Total User", exploded: true },
    //                 { y: 20, name: "Authentic Users" },
    //                 { y: 5, name: "Inactive Users" },
    //                 { y: 3, name: " Log Activity Of Users" }
    //             ]
    //         }]
    //     });
    //     chart.render();
    // }

    // function explodePie (e) {
    //     if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
    //         e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    //     } else {
    //         e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    //     }
    //     e.chart.render();

    // }

    // stock chart
    // window.onload = function () {
    //     var dataPoints1 = [], dataPoints2 = [];
    //     var stockChart = new CanvasJS.StockChart("chartContainer",{
    //         theme: "light2",
    //         animationEnabled: true,
    //         title:{
    //         text:"Multi-Series StockChart with Navigator"
    //         },
    //         subtitles: [{
    //         text: "No of Trades: BTC/USD vs BTC/EUR"
    //         }],
    //         charts: [{
    //         axisY: {
    //             title: "No of Trades"
    //         },
    //         toolTip: {
    //             shared: true
    //         },
    //         legend: {
    //                 cursor: "pointer",
    //                 itemclick: function (e) {
    //                 if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible)
    //                     e.dataSeries.visible = false;
    //                 else
    //                     e.dataSeries.visible = true;
    //                 e.chart.render();
    //                 }
    //             },
    //         data: [{
    //             showInLegend: true,
    //             name: "No of Trades in $",
    //             yValueFormatString: "#,##0",
    //             xValueType: "dateTime",
    //             dataPoints : dataPoints1
    //         },{
    //             showInLegend: true,
    //             name: "No of Trades in €",
    //             yValueFormatString: "#,##0",
    //             dataPoints : dataPoints2
    //         }]
    //         }],
    //         rangeSelector: {
    //         enabled: false
    //         },
    //         navigator: {
    //         data: [{
    //             dataPoints: dataPoints1
    //         }],
    //         slider: {
    //             minimum: new Date(2018, 00, 15),
    //             maximum: new Date(2018, 02, 01)
    //         }
    //         }
    //     });
    //     $.getJSON("https://canvasjs.com/data/docs/btcvolume2018.json", function(data) {
    //         for(var i = 0; i < data.length; i++){
    //         dataPoints1.push({x: new Date(data[i].date), y: Number(data[i].volume_btc_usd)});
    //         dataPoints2.push({x: new Date(data[i].date), y: Number(data[i].volume_btc_eur)});
    //         }
    //         stockChart.render();
    //     });
    // }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const chartContainer = document.getElementById("chartContainer"); // Make sure it's defined

        chart = new CanvasJS.Chart(chartContainer, {
            animationEnabled: true,
            title: {
                text: "TOTAL LOG Activity USER ( ANALYSIS )",
                fontFamily: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                fontSize: 15,
                fontWeight: "bold",
                fontColor: "#014D65"
            },
            axisX: {
                interval: 1,
                labelFontFamily: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                labelFontSize: 12,
                fontWeight: "bold",
                labelFontColor: "#000000"
            },
            axisY2: {
                interlacedColor: "rgba(1,77,101,.2)",
                gridColor: "rgba(1,77,101,.1)",
                title: "<--Users-->",
                titleFontFamily: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                titleFontSize: 15,
                titleFontColor: "#000000",
                labelFontFamily: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                labelFontSize: 12,
                fontWeight: "bold",
                labelFontColor: "#000000"
            },
            data: [{
                type: "bar",
                name: "companies",
                color: "#014D65",
                axisYType: "secondary",
                indexLabelFontFamily: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                indexLabelFontSize: 12,
                fontWeight: "bold",
                dataPoints: [
                    { y: 3, label: "Inactive Users" },
                    { y: 7, label: "Authentic Users" },
                    { y: 5, label: "Activity Of Users" },
                    { y: 134, label: "Total-Users" }
                ]
            }]
        });

        chart.render();
        chart.resize(); // Force first resize

        // Resize chart on window resize
        window.addEventListener("resize", function () {
            chart.resize();
        });

        // Resize on container resize (optional fallback)
        const observer = new ResizeObserver(() => {
            chart.resize();
        });
        observer.observe(chartContainer);
    });
</script>
@endPush