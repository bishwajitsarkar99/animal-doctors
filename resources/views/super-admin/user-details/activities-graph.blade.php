<!-- ==== User-Activities Analysis Graph ======= -->
<div class="container">
    <div class="log-card">
        <div class="row">
            <div class="col-xl-6">
                <div class="card-header staticrept ps-2" style="text-align:center;">
                    <span class="card-head-title head-skeletone">
                        <i class="fa-solid fa-layer-group"></i> 
                        Total Current Users Activities ( Per Week )
                    </span>
                    <div class="loader_skeleton" id="loader_orderChart"></div>
                </div>
                <canvas id="userDayLogChart" width="100%" height="35"></canvas>
            </div>
            <div class="col-xl-6">
                <div class="card-header staticrept ps-2" style="text-align:center;">
                    <span class="card-head-title head-skeletone">
                        <i class="fa-solid fa-layer-group"></i> 
                        Total Current Users Activities ( Per Month )
                    </span>
                    <div class="loader_skeleton" id="loader_orderChart"></div>
                </div>
                <canvas id="userMonthLogChart" width="100%" height="35"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
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
        <div class="row">
            <div class="col-xl-12">
                <p>
                    <div class="users-activities">
                        <span id="current_user_activites_records"></span>
                    </div>
                </p>
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
        gradientLogout.addColorStop(0, 'rgba(255, 165, 0, 0.5)');  // orange at top
        gradientLogout.addColorStop(1, 'rgba(255, 165, 0, 0)');    // transparent at bottom

        var gradientUsers = ctx.createLinearGradient(0, 0, 0, 400);
        gradientUsers.addColorStop(0, 'rgba(0, 0, 255, 0.5)');  // blue at top
        gradientUsers.addColorStop(1, 'rgba(0, 0, 255, 0)');    // transparent at bottom

        userDayLogChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [{
                    label: "Current Login",
                    data: [], // Placeholder for Current login data
                    borderColor: "darkgreen",
                    backgroundColor: gradientLogin,  // Apply gradient
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointStyle: 'rectRounded',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "darkgreen",
                }, {
                    label: "Current Logout Activity",
                    data: [], // Placeholder for Current Logout Activity data
                    borderColor: "orange",
                    backgroundColor: gradientLogout,  // Apply gradient
                    borderWidth: 3,
                    fill: true, 
                    tension: 0.4,
                    pointStyle: 'triangle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "orange",
                }, {
                    label: "Current Activity Users",
                    data: [], // Placeholder for Current Activity Users data
                    borderColor: "blue",
                    backgroundColor: gradientUsers,  // Apply gradient
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
                            color: '#333',
                            font: {
                                size: 14,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: { size: 16 },
                        bodyFont: { size: 14 },
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: true,
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
                            display: true,
                            color: 'rgba(0, 0, 0, 0.1)',
                        },
                        ticks: {
                            beginAtZero: true,
                            color: '#333',
                            font: {
                                size: 12, 
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                weight: 'bold',
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500, // Animation duration
                    easing: 'easeInOutBounce' // Type of animation easing
                }
            }
        });

        // Set initial state for each dataset
        let datasetGrowthStates = userDayLogChart.data.datasets.map(() => ({
            growing: Math.random() > 0.5,
            borderWidth: 2
        }));

        let step = 0.1;
        let minWidth = 1;
        let maxWidth = 4;

        function animateBorder() {
            userDayLogChart.data.datasets.forEach((dataset, index) => {
                let growthState = datasetGrowthStates[index];

                if (growthState.growing) {
                    growthState.borderWidth += step;
                    if (growthState.borderWidth >= maxWidth) {
                        growthState.growing = false;
                    }
                } else {
                    growthState.borderWidth -= step;
                    if (growthState.borderWidth <= minWidth) {
                        growthState.growing = true;
                    }
                }

                dataset.borderWidth = growthState.borderWidth;
            });

            userDayLogChart.update('none');

            requestAnimationFrame(animateBorder);
        }
        // Start the border animation loop
        animateBorder();
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize the chart
        var ctx = document.getElementById("userMonthLogChart").getContext('2d');

        // Create gradient for each dataset line
        var gradientLogin = ctx.createLinearGradient(0, 0, 0, 400);
        gradientLogin.addColorStop(0, 'rgba(34, 139, 34, 0.5)');  // darkgreen at top
        gradientLogin.addColorStop(1, 'rgba(34, 139, 34, 0)');    // transparent at bottom

        var gradientLogout = ctx.createLinearGradient(0, 0, 0, 400);
        gradientLogout.addColorStop(0, 'rgba(255, 165, 0, 0.5)');  // orange at top
        gradientLogout.addColorStop(1, 'rgba(255, 165, 0, 0)');    // transparent at bottom

        var gradientUsers = ctx.createLinearGradient(0, 0, 0, 400);
        gradientUsers.addColorStop(0, 'rgba(0, 0, 255, 0.5)');  // blue at top
        gradientUsers.addColorStop(1, 'rgba(0, 0, 255, 0)');    // transparent at bottom

        userMonthLogChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: "Current Login",
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
                    label: "Current Logout Activity",
                    data: [], // Placeholder for Current Logout Activity data
                    borderColor: "orange",
                    backgroundColor: gradientLogout,
                    borderWidth: 3,
                    fill: true, 
                    tension: 0.4,
                    pointStyle: 'triangle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "orange",
                }, {
                    label: "Current Activity Users",
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
                            color: '#333',
                            font: {
                                size: 14,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: { size: 16 },
                        bodyFont: { size: 14 },
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.1)', // Grid color
                        },
                        ticks: {
                            color: '#333',  // X-axis label color
                            font: {
                                size: 12, 
                                family: "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",
                                weight: 'bold',
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.1)', // Grid color
                        },
                        ticks: {
                            beginAtZero: true,
                            color: '#333',  // Y-axis label color
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
@endPush