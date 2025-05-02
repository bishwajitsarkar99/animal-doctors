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
                                <div id="current_login_activites_percentage_records" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <label class="badge rounded-pill bg-success" for="total_medic_records " id="iteam_label4" style="font-size: 11px;">
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
                                <div id="current_logout_activites_percentage_records" class="progress-bar progress-bar-striped bg-alert progress-bar-animated" role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <label class="badge rounded-pill bg-logout" for="total_medic_records " id="iteam_label4" style="font-size: 11px;">
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
                                <div id="current_total_activites_percentage_records" class="progress-bar progress-bar-striped bg-login progress-bar-animated" role="progressbar" style="width: 20%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    0%
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <label class="badge rounded-pill bg-primary" for="total_medic_records " id="iteam_label4" style="font-size: 11px;">
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
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
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
                    data: [], // Placeholder for Current login data
                    borderColor: "darkgreen",
                    backgroundColor: gradientLogin,
                    borderWidth: 3,
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
                    borderWidth: 3,
                    fill: true, 
                    tension: 0.4,
                    pointStyle: 'triangle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "#e74a3b",
                }, {
                    label: "Users Activity",
                    data: [], // Placeholder for Current Activity Users data
                    borderColor: "blue",
                    backgroundColor: gradientUsers,
                    borderWidth: 3,
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
                            color: '#3b71ca',
                            font: {
                                size: 12, 
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                weight: 'bold',
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutBounce'
                }
            }
        });
    });
</script>
<script>
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
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: "Login",
                    data: [], // Placeholder for Current login data
                    borderColor: "darkgreen",
                    backgroundColor: gradientLogin,
                    borderWidth: 3,
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
                    borderWidth: 3,
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
                    borderWidth: 3,
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
                scales: {
                    x: {
                        grid: {
                            display: false,
                            color: 'rgba(0, 0, 0, 0.1)',
                        },
                        ticks: {
                            color: '#333',
                            font: {
                                size: 12, 
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                weight: 'bold',
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: false,
                            color: 'rgba(0, 0, 0, 0.1)',
                        },
                        ticks: {
                            beginAtZero: true,
                            color: '#3b71ca',
                            font: {
                                size: 12, 
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                weight: 'bold',
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutBounce',
                }
            }
        });

    });
</script>
<!-- <script>
    const userCanvas  = document.getElementById('userAllLogChart').getContext('2d');

    const userCtx = new Chart(userCanvas , {
        type: 'bar', // base type, we'll mix types
        data: {
            labels: [
                "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ],
            datasets: [
                {
                    type: 'line',
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
                    type: 'line',
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
<script>
    $(document).ready(function(){
        let chart; // Declare outside to update globally

        function analyticalChartFetch() {
            let start = $("#chartStartDate").val();
            let end = $("#chartEndDate").val();

            $.ajax({
                type: 'GET',
                url: "{{ route('user.analytical_chart') }}",
                dataType: 'json',
                data: {
                    start_date: start,
                    end_date: end
                },
                success: function(response) {
                    const labels = response.labels;
                    const data = response.monthly_user_count_per_day;

                    if (chart) {
                        chart.destroy(); // Destroy existing chart before redrawing
                    }

                    const userCanvas = document.getElementById('userAllLogChart').getContext('2d');
                    // Create gradient for each dataset line
                    var gradientLogin = userCanvas.createLinearGradient(0, 0, 0, 400);
                    gradientLogin.addColorStop(0, 'rgba(28,200,138,0.5)');  // darkgreen at top
                    gradientLogin.addColorStop(1, 'rgba(34, 139, 34, 0)');    // transparent at bottom

                    var gradientLogout = userCanvas.createLinearGradient(0, 0, 0, 400);
                    gradientLogout.addColorStop(0, '#e74a3b');  // orange at top
                    gradientLogout.addColorStop(1, 'rgba(255, 165, 0, 0)');    // transparent at bottom

                    var gradientUsers = userCanvas.createLinearGradient(0, 0, 0, 400);
                    gradientUsers.addColorStop(0, '#4e73df');  // blue at top
                    gradientUsers.addColorStop(1, 'rgba(0, 0, 255, 0)');    // transparent at bottom
                    chart = new Chart(userCanvas, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    type: 'line',
                                    label: 'Login Count',
                                    data: data.login_counts,
                                    backgroundColor: gradientLogin,
                                    borderColor: 'rgba(28,200,138,1)',
                                    fill: true,
                                    tension: 0.4,
                                    pointRadius: 5,
                                    pointHoverRadius: 8,
                                    pointBackgroundColor: "darkgreen",
                                },
                                {
                                    type: 'line',
                                    label: 'Logout Count',
                                    data: data.logout_counts,
                                    fill: true,
                                    borderColor: '#e74a3b',
                                    backgroundColor: gradientLogout,
                                    borderWidth: 2,
                                    tension: 0.4,
                                    pointRadius: 5,
                                    pointHoverRadius: 8,
                                    pointBackgroundColor: "#e74a3b",
                                },
                                {
                                    type: 'bar',
                                    label: 'Active Users',
                                    data: data.current_user_counts,
                                    backgroundColor: gradientUsers,
                                    tension: 0.4,
                                    fill: false
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                color: '#000000',
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
                                    }
                                },
                                font: {
                                    size: 12,
                                    family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                    weight: 'bold',
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: true,
                                        color: 'silver',
                                    },
                                    ticks: {
                                        color: 'rgba(0, 0, 0, 0.99)',
                                        font: {
                                            size: 11, 
                                            family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                            weight: 'bold',
                                        }
                                    }
                                },
                                y: {
                                    grid: {
                                        display: false,
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        color: 'royalblue',
                                        font: {
                                            size: 12, 
                                            family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                            weight: 'bold',
                                        }
                                    }
                                }
                            },
                            animation: {
                                duration: 1500,
                                easing: 'easeInOutBounce',
                            }
                        }
                    });
                }
            });
        }

        analyticalChartFetch();

        // Optional: Re-fetch on date change or button click
        $("#chartStartDate, #chartEndDate").on('change', function(){
            analyticalChartFetch();
        });
    });
</script>
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