<!-- ==== User-Activities Analysis Graph ======= -->
<div class="container">
    <div class="log-card">
        <div class="row mb-4">
            <div class="col-xl-12">
                <div class="card card-body chart-card card-background">
                    <div class="row">
                        <div class="col-xl-4">
                            <span class="login-user-title ps-4">Total Current Login Users</span>
                        </div>
                        <div class="col-xl-6">
                            <div class="progress mt-2" style="height:0.8rem;">
                                <div id="current_login_activites_percentage_records" class="progress-bar progress-bar-striped bg-login progress-bar-animated" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <label class="badge rounded-pill bg-login" for="total_medic_records " id="iteam_label4" style="font-size: 11px;">
                                <span class="total_users " style="font-weight: 600;color:white;" id="current_login_activites_records"></span>
                                <span id="iteam_label5" style="font-weight: 600;color:white;">.00</span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <span class="login-user-title ps-4">Total Current Logout Activity</span>
                        </div>
                        <div class="col-xl-6">
                            <div class="progress mt-2" style="height:0.8rem;">
                                <div id="current_logout_activites_percentage_records" class="progress-bar progress-bar-striped bg-light-alert progress-bar-animated" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <label class="badge rounded-pill bg-light-alert" for="total_medic_records " id="iteam_label4" style="font-size: 11px;">
                                <span class="total_users " style="font-weight: 600;color:white;" id="current_logout_activites_records"></span>
                                <span id="iteam_label5" style="font-weight: 600;color:white;">.00</span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4">
                            <span class="tot_summ" id="num_plate">
                                <label class="login-user-title ps-4" for="tot_cagt"> Total Current Activity Users</label>
                            </span>
                        </div>
                        <div class="col-xl-6">
                            <div class="progress mt-2" style="height:0.8rem;">
                                <div id="current_total_activites_percentage_records" class="progress-bar progress-bar-striped bg-activity progress-bar-animated" role="progressbar" style="width: 20%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <label class="badge rounded-pill bg-activity" for="total_medic_records " id="iteam_label4" style="font-size: 11px;">
                                <span class="total_users " style="font-weight: 600;color:white;" id="total_current_activites_records"></span>
                                <span id="iteam_label5" style="font-weight: 600;color:white;">.00</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-4">
                <canvas id="chartContainer" width="100%" height="36"></canvas>
            </div> -->
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card card-body chart-card">
                    <div class="card-header mini-bar-header ps-2" style="text-align:center;">
                        <span class="card-head-title head-skeletone">
                            <i class="fa-solid fa-layer-group" style="color:rgba(0, 0, 255, 0.5);"></i> 
                            Current Users Log Activities ( Per Week )
                        </span>
                        <div class="loader_chart loader_skeleton" id="loader_userChart"></div>
                    </div>
                    <div class="user-activities--week-chart">
                        <canvas id="userDayLogChart" height="106"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card card-body chart-card">
                    <div class="card-header mini-bar-header ps-2" style="text-align:center;">
                        <span class="card-head-title head-skeletone">
                            <i class="fa-solid fa-layer-group" style="color:rgba(0, 0, 255, 0.5);"></i> 
                            Current Users Log Activities ( Per Month )
                        </span>
                        <div class="loader_chart loader_skeleton" id="loader_userLogChart"></div>
                    </div>
                    <div class="user-activities--month-chart">
                        <canvas id="userMonthLogChart" height="106"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mb-5 mt-2">
        <div class="col-xl-12">
            <div class="card card-body chart-card">
                <div class="card-header mini-bar-header ps-2" style="text-align:center;">
                    <div class="row">
                        <div class="col-xl-8">
                            <span class="card-head-title head-skeletone">
                                <i class="fa-solid fa-layer-group" style="color:rgba(0, 0, 255, 0.5);"></i> 
                                Total All Users Log Activities
                            </span>
                            <div class="loader_chart loader_skeleton" id="loader_userAllLogChart"></div>
                        </div>
                        <div class="col-xl-4 group_box">
                            <span class="input-group">
                                <label class="date-label" for="from">Form : </label>
                                <input class="form-control form-control-sm input-date" type="text" name="start_date" Placeholder="DD-MM-YYYY" id="chartStartDate" autocomplete="off">
                            </span>
                            <span class="input-group">
                                <label class="date-label" for="from">To : </label>
                                <input class="form-control form-control-sm input-date" type="text" name="end_date" Placeholder="DD-MM-YYYY" id="chartEndDate" autocomplete="off">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="user-activities--month-chart">
                    <canvas id="userAllLogChart" height="80"></canvas>
                    <canvas id="userLogDateChart" height="36"></canvas>
                    <div class="range-box ">
                        <img class="full-width-img" src="/image/LineChart.PNG" alt="Chart" />
                        <input type="range" class="custom-range-slider" min="0" max="30" value="0" id="rangeSlider">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="module">
    // hover plugins
    import { hoverGridPlugin, dottedGridPlugin, axisTooltipDayFormatePlugin, axisTooltipMonthFormatePlugin, axisCursorPlugin} from "/plugins/chartHoverPlugins.js";
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
                } = response;
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
                    pointStyle: 'rectRounded',
                    pointRadius: 3,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "darkgreen",
                }, {
                    label: "Logout",
                    data: [], // Placeholder for Current Logout Activity data (weekly)
                    borderColor: '#e74a3b',
                    backgroundColor: gradientLogout,
                    borderWidth: 1,
                    fill: false, 
                    tension: 0.4,
                    pointStyle: 'triangle',
                    pointRadius: 3,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "#e74a3b",
                }, {
                    label: "Users Activity",
                    data: [], // Placeholder for Current Activity Users data (weekly)
                    borderColor: "blue",
                    backgroundColor: gradientUsers,
                    borderWidth: 1,
                    fill: false,
                    tension: 0.4,
                    pointStyle: 'circle',
                    pointRadius: 3,
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
                            color: '#000000',
                            font: {
                                size: 12,
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                weight: 'bold',
                            }
                        },
                        onHover: function(event, legendItem, legend) {
                            legend.chart.canvas.style.cursor = 'pointer';
                        },
                        onLeave: function(event, legendItem, legend) {
                            legend.chart.canvas.style.cursor = 'default';
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: { size: 12 },
                        bodyFont: { size: 12 },
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
                            color: 'rgba(0, 0, 0, 0.99)',
                            font: {
                                size: 11, 
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                //weight: 'bold',
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
                            color: 'rgba(0, 0, 0, 0.99)',
                            font: {
                                size: 11, 
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                //weight: 'bold',
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
                //axisCursorPlugin(), 
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
                            color: '#000000',
                            font: {
                                size: 12,
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                weight: 'bold',
                            }
                        },
                        onHover: function(event, legendItem, legend) {
                            legend.chart.canvas.style.cursor = 'pointer';
                        },
                        onLeave: function(event, legendItem, legend) {
                            legend.chart.canvas.style.cursor = 'default';
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: { size: 12 },
                        bodyFont: { size: 12 },
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
                            color: 'rgba(0, 0, 0, 0.99)',
                            font: {
                                size: 11, 
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                //weight: 'bold',
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
                            color: 'rgba(0, 0, 0, 0.99)',
                            font: {
                                size: 11, 
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                //weight: 'bold',
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
                //axisCursorPlugin(), 
            ]
        });
        fetch_current_users_activities_data();
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
<script type="module">
    // hover plugins
    import { hoverGridPlugin, dottedGridPlugin, axisTooltipYearFormatePlugin, axisCursorPlugin } from "/plugins/chartHoverPlugins.js";
    // debounce for ajax request too data loading maintain            
    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }
    let chart; // Declare outside to update globally

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
                    const labels = response.labels;
                    const data = response.monthly_user_count_per_day;

                    if (chart) chart.destroy(); // Clean existing chart

                    const ctx = document.getElementById('userAllLogChart').getContext('2d');

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
                                    pointRadius: 5,
                                    pointHoverRadius: 8,
                                    pointBackgroundColor: "darkgreen"
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
                                    pointRadius: 5,
                                    pointHoverRadius: 8,
                                    pointBackgroundColor: "#e74a3b"
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
                                    pointRadius: 5,
                                    pointHoverRadius: 8,
                                    pointBackgroundColor: "#4e73df"
                                }
                            ]
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
                                            size: 12,
                                            family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif",
                                            weight: 'bold'
                                        }
                                    },
                                    onHover(event, item, legend) {
                                        legend.chart.canvas.style.cursor = 'pointer'; // ew-resize
                                    },
                                    onLeave(event, item, legend) {
                                        legend.chart.canvas.style.cursor = 'default';
                                    }
                                },
                                tooltip: {
                                    enabled: true,
                                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                    titleColor: '#fff',
                                    bodyColor: '#fff',
                                    titleFont: { size: 12 },
                                    bodyFont: { size: 12 }
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
                                        color: '#000',
                                        font: {
                                            size: 11,
                                            family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif"
                                        }
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    grid: { display: true, color: 'silver' },
                                    ticks: {
                                        color: '#000',
                                        font: {
                                            size: 11,
                                            family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif"
                                        }
                                    }
                                }
                            },
                            // animation: {
                            //     duration: 1500,
                            //     easing: 'easeInOutBounce'
                            // }
                        },
                        plugins: [
                            hoverGridPlugin(),
                            dottedGridPlugin(),
                            axisTooltipYearFormatePlugin(),
                            // axisCursorPlugin()
                        ]
                    });
                }
            });
        }
        analyticalChartFetch();
        // update data according date range
        $("#chartStartDate, #chartEndDate").on('change', function () {
            analyticalChartFetch();
        });
        // input range trigger action for data get
        const slider = document.getElementById('rangeSlider');
        const startInput = document.getElementById('chartStartDate');
        const endInput = document.getElementById('chartEndDate');
        // Base starting date (e.g., Jan 1, 2025)
        const baseStartDate = new Date(2023, 12, 31);
        // 48 weeks = 336 days
        const rangeDays = 336;
        // Optionally set a larger sliding window (e.g., 0 to 365)
        slider.min = 0;
        slider.max = 365;
        // Format DD-MM-YYYY
        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
        }
        const debouncedFetch = debounce(() => {
            if (typeof analyticalChartFetch === 'function') {
                analyticalChartFetch();
            }
        }, 500); // 500ms delay
        slider.addEventListener('input', function () {
            const offset = parseInt(this.value);
            const fromDate = new Date(baseStartDate);
            fromDate.setDate(baseStartDate.getDate() + offset);

            const toDate = new Date(fromDate);
            toDate.setDate(fromDate.getDate() + rangeDays);

            startInput.value = formatDate(fromDate);
            endInput.value = formatDate(toDate);

            const value = (offset / (slider.max - slider.min)) * 100;
            this.style.background = `linear-gradient(to right, rgba(0, 123, 255, 0.3) ${value}%, rgba(143, 197, 255, 0) ${value}%)`;

            debouncedFetch(); // ✅ Debounced call
        });

        // Initialize on load
        slider.dispatchEvent(new Event('input'));
    });
</script>
<script>
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
                    backgroundColor: '#e74a3b',
                    tension: 0.4,
                    data: [40000, 42000, 45000, 45000, 47000, 43000, 42000, 43000, 41000, 45000, 42000, 50000],
                    order: 2
                },
                {
                    type: 'bar',
                    label: 'Users Login',
                    backgroundColor: 'rgba(28,200,138,0.5)',
                    tension: 0.4,
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
                    display: false,
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
                    display:false,
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
                    display:true,
                    grid: { display: true, color: 'silver' },
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + formatWithSuffix(value);
                        }
                    }
                },
                x: {
                    display:true,
                    grid: { display: false, color: 'silver' },
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
</script>
<!-- <script>
    const slider = document.getElementById('rangeSlider');
    const startInput = document.getElementById('chartStartDate');
    const endInput = document.getElementById('chartEndDate');

    // Base starting date (e.g., Jan 1, 2025)
    const baseStartDate = new Date(2023, 12, 31);

    // 48 weeks = 336 days
    const rangeDays = 336;

    // Optionally set a larger sliding window (e.g., 0 to 365)
    slider.min = 0;
    slider.max = 365;

    // Format DD-MM-YYYY
    function formatDate(date) {
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        return `${day}-${month}-${year}`;
    }

    slider.addEventListener('input', function () {
        const offset = parseInt(this.value);

        const fromDate = new Date(baseStartDate);
        fromDate.setDate(baseStartDate.getDate() + offset);

        const toDate = new Date(fromDate);
        toDate.setDate(fromDate.getDate() + rangeDays); // Always 48 weeks ahead

        startInput.value = formatDate(fromDate);
        endInput.value = formatDate(toDate);

        // Dynamic background
        const value = (offset / (slider.max - slider.min)) * 100;
        this.style.background = `linear-gradient(to right, rgba(0, 123, 255, 0.3) ${value}%, #e9ecef ${value}%)`;
        // Trigger data fetch
        if (typeof analyticalChartFetch === 'function') {
            analyticalChartFetch();
        }
    });

    // Initialize on load
    slider.dispatchEvent(new Event('input'));
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