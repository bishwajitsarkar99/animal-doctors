<?php
    $progressBarCards = [
        [
            'label' => 'Total Current Login Users',
            'labelClass' => 'login-user-title ps-4',
            'progressClass' => 'progress mt-2',
            'progressBarHeight' => 'height:0.8rem;',
            'progressBarId' => 'current_login_activites_percentage_records',
            'progressBarBg' => 'bg-login',
            'roundedBadgeClass' => 'badge rounded-pill bg-login',
            'roundedBadgeStyle' => 'font-size: 11px;',
            'recordLabelClass' => 'total_users',
            'recordLabelStyle' => 'font-weight: 600;color:white;',
            'recordId' => 'current_login_activites_records',
        ],
        [
            'label' => 'Total Current Logout Activity',
            'labelClass' => 'login-user-title ps-4',
            'progressClass' => 'progress mt-2',
            'progressBarHeight' => 'height:0.8rem;',
            'progressBarId' => 'current_logout_activites_percentage_records',
            'progressBarBg' => 'bg-light-alert',
            'roundedBadgeClass' => 'badge rounded-pill bg-light-alert',
            'roundedBadgeStyle' => 'font-size: 11px;',
            'recordLabelClass' => 'total_users',
            'recordLabelStyle' => 'font-weight: 600;color:white;',
            'recordId' => 'current_logout_activites_records',
        ],
        [
            'label' => 'Total Current Activity Users',
            'labelClass' => 'login-user-title ps-4',
            'progressClass' => 'progress mt-2',
            'progressBarHeight' => 'height:0.8rem;',
            'progressBarId' => 'current_total_activites_percentage_records',
            'progressBarBg' => 'bg-activity',
            'roundedBadgeClass' => 'badge rounded-pill bg-login',
            'roundedBadgeStyle' => 'font-size: 11px;',
            'recordLabelClass' => 'total_users',
            'recordLabelStyle' => 'font-weight: 600;color:white;',
            'recordId' => 'total_current_activites_records',
        ],
    ];
?>
@if($user_activity_graph_authorize ==1)
<!-- ==== User-Activities Analysis Graph ======= -->
@if($user_log_data_table_permission == 1)
<div class="row">
    <div class="container">
        <x-chart-cards.chart-card cardBg="chart-card pt-3 pb-3" borderStyle="border-style">
            <div class="row mb-2">
                <div class="col-xl-12">
                    <!-- Current Day Data -->
                    <x-chart-cards.progress-bar-cards.body.card-body cardBodyClass="card card-body border-style card-background">
                        @foreach($progressBarCards as $data)
                            <x-chart-cards.progress-bar-cards.body.card-content
                                cardLabel="{{ $data['label'] }}"
                                cardLabelClass="{{ $data['labelClass'] }}"
                                cardProgressClass="{{ $data['progressClass'] }}"
                                cardProgressStyle="{{ $data['progressBarHeight'] }}"
                                cardResultId="{{ $data['progressBarId'] }}"
                                cardProgressBg="{{ $data['progressBarBg'] }}"
                                cardBadgeRounded="{{ $data['roundedBadgeClass'] }}"
                                cardBadgeRoundedStyle="{{ $data['roundedBadgeStyle'] }}"
                                cardRecordClass="{{ $data['recordLabelClass'] }}"
                                cardRecordStyle="{{ $data['recordLabelStyle'] }}"
                                cardRecordId="{{ $data['recordId'] }}"
                            />
                        @endforeach
                    </x-chart-cards.progress-bar-cards.body.card-body>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <!-- Weekly Data Chart -->
                    <x-chart-cards.chart-card cardBg="" borderStyle="border-style">
                        <x-chart-cards.chart-activity-card-header 
                            cardHeadSkeletone="head-skeletone"
                            loaderSkeletone="loader_skeleton"
                            iconColor="#2e42cb7d"
                            title="Current Users Log Activities Line Chart ( Per Week )"
                            loaderId="loader_orderChart"
                            textAlign="center"
                        />
                        <x-chart-cards.chart-card-body
                            cardBodySkeletone="chart-body-skeletone"
                            cardBodyBg=""
                            borderStyle="border-style"
                            cardBodyAnimation="user-activities--week-chart"
                            svgId="svgIcon"
                            svgClass="chart-svg"
                            svgWidth="100%"
                            svgHeight="100px"
                            svgColor="#969696"
                            canvasHeight="106"
                            canvasId="userDayLogChart"
                        />
                    </x-chart-cards.chart-card>
                </div>
                <div class="col-xl-6">
                    <!-- Monthly Data Chart -->
                    <x-chart-cards.chart-card cardBg="" borderStyle="border-style">
                        <x-chart-cards.chart-card-header 
                            cardTopBorder=""
                            cardHeadSkeletone="head-skeletone"
                            loaderSkeletone="loader_skeleton"
                            iconColor="#2e42cb7d"
                            title="Current Users Log Activities Bar Chart ( Per Month )"
                            loaderId="loader_acivityChart"
                            textAlign="center"
                        />
                        <x-chart-cards.chart-card-body
                            cardBodySkeletone="body-skeletone"
                            cardBodyBg=""
                            borderStyle="border-style"
                            cardBodyAnimation="user-activities--month-chart"
                            svgId="svgIcon2"
                            svgClass="chart-svg-two"
                            svgWidth="100%"
                            svgHeight="95px"
                            svgColor="#969696"
                            canvasHeight="106"
                            canvasId="userMonthLogChart"
                        />
                    </x-chart-cards.chart-card>
                </div>
            </div>
        </x-chart-card>
        <x-chart-cards.multi-chart-cards.multi-chart chartClass="chart-card mb-4">
            <div class="row mt-4 mb-3">
                <div class="col-xl-12">
                    <x-chart-cards.multi-chart-cards.multi-chart-header
                        parentClass="card-header max-card-header"
                        childClass="card-head-title head-skeletone"
                        iconColor='rgba(46, 66, 203, 0.49)'
                        chartLabel="Users Log Activities Line Chart"
                        groupClass="group_box"
                        inputGroupClass="input-group"
                        inputLabelOne="Form :"
                        inputLabelTwo="To :"
                        inputClass="form-control form-control-sm input-date"
                        inputType="text"
                        inputFirstName="start_date" 
                        inputSecondName="end_date" 
                        inputPlaceHolder="DD-MM-YYYY" 
                        inputFirstId="chartStartDate" 
                        inputSecondId="chartEndDate" 
                        iconClass="icon-box"
                        iconStyle="line-height: 1.2;"
                        svgWidth="18"
                        svgHeight="18"
                        svgStroke="white"
                        svgStrokeWidth="2"
                        svgFillColor="rgb(170, 170, 170)"
                        filterBoxId="filteringBox"
                        filterLabel="Data Filter"
                        filterContentBoxClass="--filex-box-medium-content"
                        filterBoxArrow="filex-box-arrow"
                    />
                    <x-chart-cards.multi-chart-cards.multi-chart-body cardBodyClass="border-style">
                        <x-chart-cards.multi-chart-cards.multi-chart-box cardBoxClass="user-activities--month-chart mb-5">
                            <!-- Total all data chart -->
                            <x-chart-cards.multi-chart-cards.multi-chart-canvas
                                canvasClass="user-activities--month-chart mb-1"
                                monthlyLogChartId="userAllLogChart"
                                monthlyLogChartHeight="80"
                                dateLogChartId="allUserDateLogChart" 
                                dateLogChartHeight="36"
                            />
                            <x-date-range-filter-cards.date-range-card
                                dateRangeCardClass="dual-range-container mt-2"
                                dateRangeId="dateRange"
                                firstWrapperClass="slider-wrapper-first"
                                leftInputRangeSliderId="rangeLeftSlider"
                                leftTooltipId="leftTooltip"
                                rightTooltipId="rightTooltip"
                                tooltipClass="range-tooltip"
                                inputRangeClass="dual-range"
                                inputRangeMin="0"
                                inputRangeMax="365"
                                leftinputRangeValue="0"
                                rightinputRangeValue="365"
                                inputRangeSliderType="range"
                                secondWrapperClass="slider-wrapper-second"
                                rightInputRangeSliderId="rangeRightSlider"
                                dateRangeTrackingClass="range-track"
                                dateRangeSvgChartId="cruveChart"
                                dateRangeSvgChartViewBox="0 0 800 50"
                                dateRangeSvgChartFill="rgba(0,123,255,0.2)"
                                dateRangeSvgChartStyle="border: none;background: #f9f9f9;overflow: hidden;path {fill: none;stroke-width: 2.5;display: block;margin: none;}"
                                dateRangeSvgChartWidth="800"
                                dateRangeSvgChartHeight="50"
                                dateRangeSvgChartRectFill="white"
                            />
                        </x-chart-cards.multi-chart-cards.multi-chart-box>
                        <div class="branch-details-info mt-5">
                            <div class="head-init" style="border-top:1px dotted lightgray;">
                                <span class="head-skeletone">
                                    <i class="fa-solid fa-layer-group" style="color:#2e42cb;"></i> 
                                    Branch User Log Data Information
                                </span>
                            </div>
                            <div class="branch-card-skeletone">
                                <div class="row font-gray-700 data-head">
                                    <div class="col-xl-3"><span>Branch</span></div>
                                    <div class="col-xl-3"><span class="me-5">Role</span></div>
                                    <div class="col-xl-6" style="text-align:center;"><span>Bar Chart</span></div>
                                </div>
                                <div class="row font-gray-700">
                                    <div class="col-xl-3">
                                        <ul class="pt-1 mt-3" id="branchLabel">
                                            <li>ID : </li>
                                            <li>Category : </li>
                                            <li>Name : </li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-3">
                                        <ul class="pt-1 mt-3" id="roleLabel">
                                            <li class="ps-2" style="display:flex;justify-content:space-between;">
                                                <span class="user-amount badge rounded-pill bg-light-blueviolet mb-1" style="color:#000;font-size:11px;font-weight:800;background-color: #6ba7ff;">
                                                    .00
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-6">
                                        <ul class="pt-1 mt-1" id="branchChart">
                                            <li>
                                                <div  style="width: 100% !important; height: 150px;">
                                                    <canvas id="branchInfoChart_" height="80"></canvas>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row font-gray-700 data-head">
                                    <div class="col-xl-12" style="text-align:center;"><span><i class="fa-solid fa-layer-group" style="color:#2e42cb;"></i>  Branch Log Data (Bar Chart)</span></div>
                                </div>
                                <div class="row font-gray-700">
                                    <div class="user-branch-log-data-summary">
                                        <div class="row">
                                            <div class="data-table-response">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="table-light">
                                                            <th scope="col" class="text-position tex-size">ID</th>
                                                            <th scope="col" class="tex-size">Email</th>
                                                            <th scope="col" class="tex-size">Role</th>
                                                            <th scope="col" class="tex-size">Current-Login</th>
                                                            <th scope="col" class="tex-size">Total-Login</th>
                                                            <th scope="col" class="tex-size">Total-Logout</th>
                                                            <th scope="col" class="tex-size">Total-Activity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-light bg-transparent" id="dataLogTable">
                                                        <tr class="table-light">
                                                            <td class="td-cell text-position">1</td>
                                                            <td class="td-cell">superadmingstmedicinecenter4215@gmail.com</td>
                                                            <td class="td-cell">Super Admin</td>
                                                            <td class="td-cell ps-1">1.00</td>
                                                            <td class="td-cell ps-1">84.00</td>
                                                            <td class="td-cell ps-1">83.00</td>
                                                            <td class="td-cell ps-1">84.00</td>
                                                        </tr>
                                                        <tr class="table-light">
                                                            <td class="td-cell text-position">2</td>
                                                            <td class="td-cell">admingstmedicinecenter4215@gmail.com</td>
                                                            <td class="td-cell">Admin</td>
                                                            <td class="td-cell ps-1">0.00</td>
                                                            <td class="td-cell ps-1">6.00</td>
                                                            <td class="td-cell ps-1">6.00</td>
                                                            <td class="td-cell ps-1">6.00</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="table-light">
                                                            <th scope="col" class="tex-size"></th>
                                                            <th colspan="2" scope="col" class="tex-size">Total Count</th>
                                                            <th scope="col" class="tex-size ps-1">1.00</th>
                                                            <th scope="col" class="tex-size ps-1">90.00</th>
                                                            <th scope="col" class="tex-size ps-1">89.00</th>
                                                            <th scope="col" class="tex-size ps-1">90.00</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-chart-cards.multi-chart-cards.multi-chart-body>
                </div>
            </div>
        </x-chart-cards.multi-chart-cards.multi-chart>
        </div>
    </div>
</div>
@push('scripts')
<!-- Weekly and Monthly Line and Bar Chart -->
<script type="module">
    // hover plugins
    import { hoverGridPlugin, dottedGridPlugin, axisTooltipDayFormatePlugin, axisTooltipMonthFormatePlugin, axisCursorPlugin} from "/plugins/plugins-min.js";
    // Line Cahrt Initialize
    let userDayLogChart;
    // Line Bar Initialize
    let userMonthLogChart;
    // Define the current login,logout and activity data percentage (%)
    function fetch_current_users_activities_data() {
        $.ajax({
            type: "GET",
            url: "{{ route('user.activity')}}",
            dataType: 'json',
            success: function(response){
                
                const {
                    current_users, 
                    current_login_users, 
                    current_logout_users, 
                    total_current_users_activities_percentage,
                    login_current_users_activities_percentage,
                    logout_current_users_activities_percentage,
                    current_user_count_per_day,
                    labels,
                    data,
                    monthly_user_count_per_day,
                    message,
                } = response;

                if(message){
                    // Current total login, logout and activity data
                    $("#total_current_activites_records").text('');
                    $("#current_login_activites_records").text('');
                    $("#current_logout_activites_records").text('');
                }else{
                    // Current total login, logout and activity data
                    $("#total_current_activites_records").text(current_users);
                    $("#current_login_activites_records").text(current_login_users);
                    $("#current_logout_activites_records").text(current_logout_users);
                    // Current activity data percentage
                    $("#current_total_activites_percentage_records")
                        .attr("aria-valuenow", total_current_users_activities_percentage.toFixed(2))
                        .text(total_current_users_activities_percentage.toFixed(2) + "%");
                    // Current login data percentage
                    $("#current_login_activites_percentage_records")
                        .attr("aria-valuenow", login_current_users_activities_percentage.toFixed(2))
                        .text(login_current_users_activities_percentage.toFixed(2) + "%");
                    // Current logout data percentage
                    $("#current_logout_activites_percentage_records")
                        .attr("aria-valuenow", logout_current_users_activities_percentage.toFixed(2))
                        .text(logout_current_users_activities_percentage.toFixed(2) + "%");
    
                    // Update Week Log Chart
                    if (typeof userDayLogChart !== 'undefined' && userDayLogChart.data) {
                        userDayLogChart.data.labels = labels || [];
                        userDayLogChart.data.datasets[0].data = current_user_count_per_day.login_counts || [];
                        userDayLogChart.data.datasets[1].data = current_user_count_per_day.logout_counts || [];
                        userDayLogChart.data.datasets[2].data = current_user_count_per_day.current_user_counts || [];
                        userDayLogChart.update();
                    }
    
                    // Update Month Log Chart
                    if (typeof userMonthLogChart !== 'undefined' && userMonthLogChart.data) {
                        userMonthLogChart.data.datasets[0].data = monthly_user_count_per_day.login_counts || [];
                        userMonthLogChart.data.datasets[1].data = monthly_user_count_per_day.logout_counts || [];
                        userMonthLogChart.data.datasets[2].data = monthly_user_count_per_day.current_user_counts || [];
                        userMonthLogChart.update();
                    }
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();

                }
            }
        });
    }
    // Current User Weekly Line Chart
    $(document).ready(function() {
        // Initialize the chart
        var ctx = document.getElementById("userDayLogChart").getContext('2d');

        // Create gradient for each dataset line
        var gradientLogin = ctx.createLinearGradient(0, 0, 0, 400);
        gradientLogin.addColorStop(0, 'rgba(34, 139, 34, 0.5)');  // darkgreen at top
        gradientLogin.addColorStop(1, 'rgba(34, 139, 34, 0)');    // transparent at bottom

        var gradientLogout = ctx.createLinearGradient(0, 0, 0, 400);
        gradientLogout.addColorStop(0, '#e74a3b');  // orange at top
        gradientLogout.addColorStop(1, 'rgba(255, 165, 0, 0)');    // transparent at bottom

        var gradientUsers = ctx.createLinearGradient(0, 0, 0, 400);
        gradientUsers.addColorStop(0, 'rgba(0, 0, 255, 0.5)');  // blue at top
        gradientUsers.addColorStop(1, 'rgba(0, 0, 255, 0)');    // transparent at bottom

        // Pointer Design rectangle candle
        function createCandlePointStyle(color = 'black') {
            const canvas = document.createElement('canvas');
            canvas.width = 20;  // wider
            canvas.height = 40; // taller
            const ctx = canvas.getContext('2d');

            // Draw wick (centered)
            ctx.beginPath();
            ctx.moveTo(canvas.width / 2, 0);
            ctx.lineTo(canvas.width / 2, canvas.height);
            ctx.strokeStyle = color;
            ctx.lineWidth = 2;
            ctx.stroke();

            // Draw body (rectangle candle)
            const bodyWidth = 8;
            const bodyHeight = 20;
            const bodyX = (canvas.width - bodyWidth) / 2;
            const bodyY = (canvas.height - bodyHeight) / 2;

            ctx.fillStyle = color;
            ctx.fillRect(bodyX, bodyY, bodyWidth, bodyHeight);

            return canvas;
        }
        
        userDayLogChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [{
                    label: "Login",
                    data: [], // Placeholder for Current login data (weekly)
                    borderColor: "darkgreen",
                    backgroundColor: gradientLogin,
                    borderWidth: 1,
                    fill: false,
                    tension: 0.4,
                    pointStyle: createCandlePointStyle('darkgreen'),
                    pointBackgroundColor: "darkgreen",
                }, {
                    label: "Logout",
                    data: [], // Placeholder for Current Logout Activity data (weekly)
                    borderColor: '#e74a3b',
                    backgroundColor: gradientLogout,
                    borderWidth: 1,
                    fill: false, 
                    tension: 0.4,
                    pointStyle: createCandlePointStyle('#e74a3b'),
                    pointBackgroundColor: "#e74a3b",
                }, {
                    label: "Users Activity",
                    data: [], // Placeholder for Current Activity Users data (weekly)
                    borderColor: "blue",
                    backgroundColor: gradientUsers,
                    borderWidth: 1,
                    fill: false,
                    tension: 0.4,
                    pointStyle: createCandlePointStyle('blue'),
                    pointBackgroundColor: "blue",
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#000',
                            font: {
                                size: 11,
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        },
                        // onHover: function(event, legendItem, legend) {
                        //     legend.chart.canvas.style.cursor = 'pointer';
                        // },
                        // onLeave: function(event, legendItem, legend) {
                        //     legend.chart.canvas.style.cursor = 'default';
                        // }
                    },
                    tooltip: {
                        enabled: true,
                        // backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        // titleColor: '#fff',
                        // bodyColor: '#fff',
                        backgroundColor: 'rgb(255, 255, 255)',
                        titleColor: '#000000',
                        bodyColor: '#000000',
                        borderWidth: 1,
                        borderColor:'rgba(2, 149, 168, 0.6)',
                        titleFont: { size: 11 },
                        bodyFont: { size: 11 },
                        fontWeight: 'bold'
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            color: 'rgba(0, 0, 0, 0.1)',
                        },
                        ticks: {
                            color: '#111',
                            font: {
                                size: 11, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        },
                    },
                    y: {
                        grid: {
                            display: false,
                            color: 'silver',
                        },
                        ticks: {
                            beginAtZero: true,
                            color: '#111',
                            font: {
                                size: 11, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutBounce'
                }
            },
            // import plugins
            plugins: [
                hoverGridPlugin(), 
                dottedGridPlugin(), 
                axisTooltipDayFormatePlugin(), 
                axisCursorPlugin(), 
            ]
        });
        fetch_current_users_activities_data();
    });
    // Current User Monthly Bar Chart
    $(document).ready(function() {
        // Initialize the chart
        var monthUserCtx = document.getElementById("userMonthLogChart").getContext('2d');

        // Create gradient for each dataset line
        var gradientLogin = monthUserCtx.createLinearGradient(0, 0, 0, 400);
        gradientLogin.addColorStop(0, 'rgba(34, 139, 34, 0.5)');  // darkgreen at top
        gradientLogin.addColorStop(1, 'rgba(34, 139, 34, 0)');    // transparent at bottom

        var gradientLogout = monthUserCtx.createLinearGradient(0, 0, 0, 400);
        gradientLogout.addColorStop(0, '#e74a3b');  // orange at top
        gradientLogout.addColorStop(1, 'rgba(255, 165, 0, 0)');    // transparent at bottom

        var gradientUsers = monthUserCtx.createLinearGradient(0, 0, 0, 400);
        gradientUsers.addColorStop(0, 'rgba(0, 0, 255, 0.5)');  // blue at top
        gradientUsers.addColorStop(1, 'rgba(0, 0, 255, 0)');    // transparent at bottom

        userMonthLogChart = new Chart(monthUserCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: "Login",
                    data: [], // Placeholder for Current login data
                    borderColor: "darkgreen",
                    backgroundColor: gradientLogin,
                    //borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointStyle: 'rectRounded',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "darkgreen",
                }, {
                    label: "Logout",
                    data: [], // Placeholder for Current Logout Activity data
                    borderColor: '#e74a3b',
                    backgroundColor: gradientLogout,
                    //borderWidth: 2,
                    fill: true, 
                    tension: 0.4,
                    pointStyle: 'triangle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "#e74a3b",
                }, {
                    label: "Users Activity",
                    data: [], // Placeholder for current user data
                    borderColor: "blue",
                    backgroundColor: gradientUsers,
                    //borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "blue",
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#000',
                            font: {
                                size: 11,
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        },
                        // onHover: function(event, legendItem, legend) {
                        //     legend.chart.canvas.style.cursor = 'pointer';
                        // },
                        // onLeave: function(event, legendItem, legend) {
                        //     legend.chart.canvas.style.cursor = 'default';
                        // }
                    },
                    tooltip: {
                        enabled: true,
                        // backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        // titleColor: '#fff',
                        // bodyColor: '#fff',
                        backgroundColor: 'rgb(255, 255, 255)',
                        titleColor: '#000000',
                        bodyColor: '#000000',
                        borderWidth: 1,
                        borderColor:'rgba(2, 149, 168, 0.6)',
                        titleFont: { size: 11 },
                        bodyFont: { size: 11 },
                        fontWeight: 'bold'
                    }
                },
                // tooltip interaction
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            color: 'rgba(0, 0, 0, 0.1)',
                        },
                        ticks: {
                            color: '#111',
                            font: {
                                size: 11, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: false,
                            color: 'silver',
                        },
                        ticks: {
                            beginAtZero: true,
                            color: '#111',
                            font: {
                                size: 11, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutBounce',
                },
            },
            // import plugins
            plugins: [
                hoverGridPlugin(), 
                dottedGridPlugin(), 
                axisTooltipMonthFormatePlugin(), 
                axisCursorPlugin(), 
            ]
        });
        fetch_current_users_activities_data();
    });
</script>
<!-- Total User Activity Multi-Chart -->
<script type="module">
    // hover plugins
    import { hoverGridPlugin, dottedGridPlugin, axisTooltipDateFormatePlugin, axisCursorPlugin } from "/plugins/plugins-min.js";
    // scroll plugins
    import { ChartScrollPlugin } from "/plugins/chartScrollPlugin.js";
    // debounce for ajax request too data loading maintain            
    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }
    // Extend Date prototype to get the day of the year (1–365/366)
    Date.prototype.getDayOfYear = function () {
        const start = new Date(this.getFullYear(), 0, 0);
        const diff = this - start;
        const oneDay = 1000 * 60 * 60 * 24;
        return Math.floor(diff / oneDay);
    };

    let chart; // Declare outside to update globally
    let chartDate;

    $(document).ready(function () {
        function analyticalChartFetch() {
            const start = $("#chartStartDate").val();
            const end = $("#chartEndDate").val();

            $.ajax({
                type: 'GET',
                url: "{{ route('user.analytical_chart') }}",
                dataType: 'json',
                data: {
                    start_date: start,
                    end_date: end
                },
                success: function (response) {
                    const messages = response.message;
                    if(messages){
                        $("show_messg").text(messages);
                    }else{

                        const labels = response.labels;
                        const data = response.monthly_user_count_per_day;
    
                        const date_labels = response.date_labels;
                        const date_data = response.monthly_user_count_per_date;
                        
    
                        if (chart) chart.destroy(); // Clean existing chart
                        if (chartDate) chartDate.destroy();
    
                        const ctx = document.getElementById('userAllLogChart').getContext('2d');
                        const ctxDateChart = document.getElementById('allUserDateLogChart').getContext('2d');
    
                        // Create gradients
                        const gradientLogin = ctx.createLinearGradient(0, 0, 0, 400);
                        gradientLogin.addColorStop(0, 'rgba(28,200,138,0.5)');
                        gradientLogin.addColorStop(1, 'rgba(34,139,34,0)');
    
                        const gradientLogout = ctx.createLinearGradient(0, 0, 0, 400);
                        gradientLogout.addColorStop(0, '#e74a3b');
                        gradientLogout.addColorStop(1, 'rgba(255,165,0,0)');
    
                        const gradientUsers = ctx.createLinearGradient(0, 0, 0, 400);
                        gradientUsers.addColorStop(0, 'rgba(0, 123, 255, 0.2)');
                        gradientUsers.addColorStop(1, 'rgba(0,0,255,0)');
    
                        // Pointer Design rectangle candle
                        function createCandlePointStyle(color = 'black') {
                            const canvas = document.createElement('canvas');
                            canvas.width = 20;  // wider
                            canvas.height = 40; // taller
                            const ctx = canvas.getContext('2d');
    
                            // Draw wick (centered)
                            ctx.beginPath();
                            ctx.moveTo(canvas.width / 2, 0);
                            ctx.lineTo(canvas.width / 2, canvas.height);
                            ctx.strokeStyle = color;
                            ctx.lineWidth = 2;
                            ctx.stroke();
    
                            // Draw body (rectangle candle)
                            const bodyWidth = 8;
                            const bodyHeight = 20;
                            const bodyX = (canvas.width - bodyWidth) / 2;
                            const bodyY = (canvas.height - bodyHeight) / 2;
    
                            ctx.fillStyle = color;
                            ctx.fillRect(bodyX, bodyY, bodyWidth, bodyHeight);
    
                            return canvas;
                        }
                        
                        // Montly Basis Data Line Chart
                        chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels,
                                datasets: [
                                    {
                                        type: 'line',
                                        label: 'Login Count',
                                        data: data.login_counts,
                                        backgroundColor: gradientLogin,
                                        borderColor: 'rgb(0, 160, 101)',
                                        fill: true,
                                        tension: 0.4,
                                        borderWidth: 1,
                                        pointStyle: createCandlePointStyle('darkgreen'),
                                        pointHoverBackgroundColor: "darkgreen"
                                    },
                                    {
                                        type: 'line',
                                        label: 'Logout Count',
                                        data: data.logout_counts,
                                        backgroundColor: gradientLogout,
                                        borderColor: '#e74a3b',
                                        fill: true,
                                        tension: 0.4,
                                        borderWidth: 1,
                                        pointStyle: createCandlePointStyle('#e74a3b'),
                                        pointHoverBackgroundColor: "#e74a3b"
                                    },
                                    {
                                        type: 'line',
                                        label: 'Active Users',
                                        data: data.current_user_counts,
                                        backgroundColor: gradientUsers,
                                        borderColor: '#2259ff',
                                        fill: true,
                                        tension: 0.4,
                                        borderWidth: 1,
                                        pointStyle: createCandlePointStyle('#4e73df'),
                                        pointHoverBackgroundColor: "#4e73df"
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                // maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: true,
                                        position: 'top',
                                        labels: {
                                            color: '#000',
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            }
                                        },
                                        // onHover(event, item, legend) {
                                        //     legend.chart.canvas.style.cursor = 'pointer'; // ew-resize
                                        // },
                                        // onLeave(event, item, legend) {
                                        //     legend.chart.canvas.style.cursor = 'default';
                                        // }
                                    },
                                    tooltip: {
                                        enabled: true,
                                        backgroundColor: 'rgb(255, 255, 255)',
                                        titleColor: '#000000',
                                        bodyColor: '#000000',
                                        borderWidth: 1,
                                        borderColor:'rgba(2, 149, 168, 0.6)',
                                        titleFont: { size: 11 },
                                        bodyFont: { size: 11 },
                                        fontWeight: 'bold'
                                    },
                                    zoom: {
                                        pan: {
                                            enabled: true,
                                            mode: 'x',
                                            threshold: 10
                                        },
                                        zoom: {
                                            wheel: {
                                                enabled: true
                                            },
                                            pinch: {
                                                enabled: true
                                            },
                                            mode: 'x'
                                        }
                                    }
                                },
                                interaction: {
                                    mode: 'index',
                                    intersect: false
                                },
                                scales: {
                                    x: {
                                        grid: { display: false, color: 'silver' },
                                        ticks: {
                                            source: 'data',
                                            autoSkip: true,
                                            color: '#111',
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            },
                                            // x-label rotation change 
                                            // autoSkip: false,
                                            // maxRotation: 45,
                                            // minRotation: 0
                                            type: 'time',
                                            time: {
                                                unit: 'day',
                                                tooltipFormat: 'dd MMM yyyy',
                                                displayFormats: {
                                                    day: 'dd MMM yyyy'
                                                }
                                            },
                                        }   
                                    },
                                    y: {
                                        beginAtZero: true,
                                        grid: { display: true, color: 'silver' },
                                        ticks: {
                                            source: 'data',
                                            autoSkip: true,
                                            color: '#111',
                                            //stepSize: 1,
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            }
                                        }
                                    }
                                }
                            },
                            plugins: [
                                hoverGridPlugin(),
                                dottedGridPlugin(),
                                axisTooltipDateFormatePlugin(),
                                ChartScrollPlugin(),
                                ChartZoom,
                                axisCursorPlugin()
                            ]
                        });
    
                        // Date Basis Data Bar Chart
                        chartDate = new Chart(ctxDateChart, {
                            type: 'bar',
                            data: {
                                labels: date_labels,
                                datasets: [
                                    {
                                        type: 'bar',
                                        label: 'Login Count',
                                        data: date_data.date_login_counts,
                                        backgroundColor: 'rgba(28,200,138,0.5)',
                                        fill: true,
                                        tension: 0.4,
                                        order: 3
                                    },
                                    {
                                        type: 'bar',
                                        label: 'Logout Count',
                                        data: date_data.date_logout_counts,
                                        backgroundColor: '#e74a3b',
                                        fill: true,
                                        tension: 0.4,
                                        order: 2
                                    },
                                    {
                                        type: 'bar',
                                        label: 'Active Users',
                                        data: date_data.date_current_user_counts,
                                        backgroundColor: '#4e73df',
                                        fill: true,
                                        tension: 0.4,
                                        order: 1
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                // maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false,
                                        position: 'top',
                                        labels: {
                                            color: '#000',
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        enabled: true,
                                        backgroundColor: 'rgb(255, 255, 255)',
                                        titleColor: '#000000',
                                        bodyColor: '#000000',
                                        borderWidth: 1,
                                        borderColor:'rgba(2, 149, 168, 0.6)',
                                        titleFont: { size: 11 },
                                        bodyFont: { size: 11 },
                                        fontWeight: 'bold'
                                    },
                                    zoom: {
                                        pan: {
                                            enabled: true,
                                            mode: 'x',
                                            threshold: 10
                                        },
                                        zoom: {
                                            wheel: {
                                                enabled: true
                                            },
                                            pinch: {
                                                enabled: true
                                            },
                                            mode: 'x'
                                        }
                                    }
                                },
                                interaction: {
                                    mode: 'index',
                                    intersect: false
                                },
                                scales: {
                                    x: {
                                        grid: { display: false, color: 'silver' },
                                        ticks: {
                                            source: 'data',
                                            autoSkip: true,
                                            color: '#111',
                                            //stepSize: 1,
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            },
                                            // x-label rotation change 
                                            // autoSkip: false,
                                            // maxRotation: 45,
                                            // minRotation: 0
                                            type: 'time',
                                            time: {
                                                unit: 'day',
                                                tooltipFormat: 'dd MMM yyyy',
                                                displayFormats: {
                                                    day: 'dd MMM yyyy'
                                                }
                                            },
                                        }   
                                    },
                                    y: {
                                        beginAtZero: true,
                                        grid: { display: true, color: 'silver' },
                                        ticks: {
                                            source: 'data',
                                            autoSkip: true,
                                            color: '#111',
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            }
                                        }
                                    }
                                }
                            },
                            plugins: [
                                hoverGridPlugin(),
                                dottedGridPlugin(),
                                axisTooltipDateFormatePlugin(),
                                ChartScrollPlugin(),
                                ChartZoom,
                                axisCursorPlugin()
                            ]
                        });
                    }
                }
            });
        }
        analyticalChartFetch();
        // input range id initialize
        const sliderLeft = document.getElementById('rangeLeftSlider');
        const sliderRight = document.getElementById('rangeRightSlider');
        const startInput = document.getElementById('chartStartDate');
        const endInput = document.getElementById('chartEndDate');

        const today = new Date();
        const currentYear = today.getFullYear();
        const baseStartDate = new Date(currentYear, 0, 1); // Jan 1 current year
        const diffInMs = today - baseStartDate;
        const offsetInDays = Math.floor(diffInMs / (1000 * 60 * 60 * 24));

        sliderRight.value = offsetInDays;

        // Helper to format DD-MM-YYYY
        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const month = monthNames[date.getMonth()];
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
        }
        // bckground change according to range
        function updateDateInputs() {
            const fromOffset = parseInt(sliderLeft.value);
            const toOffset = parseInt(sliderRight.value);

            // Start Date
            const fromDate = new Date(baseStartDate);
            fromDate.setDate(baseStartDate.getDate() + fromOffset);
            // fromDate.setDate(baseStartDate.getDate() + fromOffset - 1);

            // Current End Date
            const toDate = new Date(baseStartDate);
            // toDate.setDate(baseStartDate.getDate() + toOffset);
            toDate.setDate(baseStartDate.getDate() + toOffset - 1);

            startInput.value = formatDate(fromDate);
            endInput.value = formatDate(toDate);

            // Gradient split logic
            const min = parseInt(sliderLeft.min);
            const max = parseInt(sliderRight.max);
            const range = max - min;

            const leftPercent = ((fromOffset - min) / range) * 100;
            const rightPercent = ((toOffset - min) / range) * 100;

            // Left slider shows gradient to the right of the thumb
            sliderLeft.style.background = `linear-gradient(to right, 
                transparent ${leftPercent}%, 
                rgba(0, 123, 255, 0.1) ${leftPercent}%)`;

            // Right slider shows gradient to the left of the thumb
            sliderRight.style.background = `linear-gradient(to right, 
                rgba(0, 123, 255, 0.1) ${rightPercent}%, 
                transparent ${rightPercent}%)`;

            const leftTooltip = document.getElementById('leftTooltip');
            const rightTooltip = document.getElementById('rightTooltip');

            // Show percentage in tooltip
            // leftTooltip.textContent = `${leftPercent.toFixed(0)}%`;
            // rightTooltip.textContent = `${rightPercent.toFixed(0)}%`;

            // Show Date in tooltip
            leftTooltip.textContent = startInput.value;
            rightTooltip.textContent = endInput.value;

            positionTooltip(sliderLeft, leftTooltip);
            positionTooltip(sliderRight, rightTooltip);
        }
        // show tooltip input range
        function positionTooltip(slider, tooltip) {
            const sliderRect = slider.getBoundingClientRect();
            const tooltipWidth = tooltip.offsetWidth;
            const sliderWidth = slider.offsetWidth;
            const value = parseInt(slider.value);
            const min = parseInt(slider.min);
            const max = parseInt(slider.max);
            const percent = (value - min) / (max - min);

            const offset = percent * sliderWidth;
            const thumbOffset = offset - (tooltipWidth / 2);

            tooltip.style.left = `${thumbOffset}px`;
        }
        // debounce
        const debouncedFetch = debounce(() => {
            if (typeof analyticalChartFetch === 'function') analyticalChartFetch();
        }, 300);
        // input range left side
        sliderLeft.addEventListener('input', function () {
            if (parseInt(sliderLeft.value) >= parseInt(sliderRight.value)) {
                sliderLeft.value = parseInt(sliderRight.value) - 1;
            }
            updateDateInputs();
            debouncedFetch();
        });
        // input range right side
        sliderRight.addEventListener('input', function () {
            if (parseInt(sliderRight.value) <= parseInt(sliderLeft.value)) {
                sliderRight.value = parseInt(sliderLeft.value) + 1;
            }
            updateDateInputs();
            debouncedFetch();
        });
        // update data according date range
        $("#chartStartDate, #chartEndDate").on('change', function () {
            analyticalChartFetch();
        });
        // Initialize sliders on page load
        sliderLeft.value = 0;
        sliderRight.value = new Date().getDayOfYear();
        updateDateInputs();
    });
</script>
<!-- Date Range Scroll chart module-min-js -->
<script type="module">
    import { initializeCurveLineChart } from "/module/module-min-js/design-helper-function-min.js";
    const dateRangeId = "cruveChart";
    initializeCurveLineChart(dateRangeId);
</script>
<script type="module">
    import { initDragAndDrop } from "/module/module-min-js/design-helper-function-min.js";
    // initializeDrag

    // drag and drop default card
    const row = '.drag-row';
    const column = '.drag-column';
    const cardKey = '.group-card';

    // drag and drop custom card
    const dragColumn = '.drag-column';
    const cardBg = 'filex-column-card';
    const cardId = '.group-card';

    // DOM ready
    document.addEventListener('DOMContentLoaded', () => {
        initDragAndDrop(column, cardKey, row);
        //initializeDrag(dragColumn, cardBg, cardId);
    });
</script>
<!-- Demo bar chart -->
<!-- <script>
    const userCanvas  = document.getElementById('userLogDateChart').getContext('2d');

    const userCtx = new Chart(userCanvas , {
        type: 'bar', // base type, we'll mix types
        data: {
            labels: [
                "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ],
            datasets: [
                {
                    type: 'bar',
                    label: 'Users Logout',
                    borderColor: '#e74a3b',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "#e74a3b",
                    data: [40000, 42000, 45000, 45000, 47000, 43000, 42000, 43000, 41000, 45000, 42000, 50000],
                    order: 2
                },
                {
                    type: 'bar',
                    label: 'Users Login',
                    backgroundColor: 'rgba(28,200,138,0.5)',
                    borderColor: 'rgba(28,200,138,1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "darkgreen",
                    data: [5000, 7000, 6000, 30000, 20000, 15000, 13000, 20000, 15000, 10000, 19000, 22000],
                    order: 3
                },
                {
                    type: 'bar',
                    label: 'Users Activity',
                    backgroundColor: '#4e73df',
                    data: [20000, 30000, 25000, 70000, 50000, 35000, 30000, 43000, 35000, 30000, 40000, 50000],
                    order: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Sales Data'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(context) {
                            let value = context.parsed.y;
                            return context.dataset.label + ': $' + formatWithSuffix(value);
                        }
                    }
                },
                legend: {
                    display:true,
                    onClick: (e, legendItem, legend) => {
                        const index = legendItem.datasetIndex;
                        const chart = legend.chart;
                        const meta = chart.getDatasetMeta(index);
                        meta.hidden = meta.hidden === null ? !chart.data.datasets[index].hidden : null;
                        chart.update();
                    }
                }
            },
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + formatWithSuffix(value);
                        }
                    }
                }
            }
        }
    });

    // Helper function to add suffixes like K/M
    function formatWithSuffix(value) {
        const suffixes = ['', 'K', 'M', 'B'];
        let order = Math.floor(Math.log10(Math.abs(value)) / 3);
        order = Math.max(0, Math.min(order, suffixes.length - 1));
        return (value / Math.pow(1000, order)).toFixed(1) + suffixes[order];
    }
</script> -->
<!-- <script>
    window.onload = function () {
        const ctx = document.getElementById('chartContainer').getContext('2d');

        const dataValues = [67, 28, 10, 7, 15, 6];
        const dataLabels = ['Inbox', 'Archives', 'Labels', 'Drafts', 'Trash', 'Spam'];
        const total = dataValues.reduce((a, b) => a + b, 0);

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: dataLabels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: [
                        '#4e73df', '#e74a3b', '#a4de02', '#2ed9c3', '#8e44ad', '#36b9cc'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                cutout: '60%',
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Email Categories',
                        align: 'start',
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    },
                    datalabels: {
                        color: '#000',
                        anchor: 'end',
                        align: 'start',
                        offset: 10,
                        clamp: true,
                        formatter: function (value, context) {
                            const percent = ((value / total) * 100).toFixed(2);
                            return `${context.chart.data.labels[context.dataIndex]} - ${percent}%`;
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    };
</script> -->
@endPush
@elseif($user_log_data_table_permission == 0)
@include('super-admin.user-details.error.data-table-permission')
@endif
@elseif($user_activity_graph_authorize ==0)
@include('super-admin.user-details.error.unauthorize')
@endif