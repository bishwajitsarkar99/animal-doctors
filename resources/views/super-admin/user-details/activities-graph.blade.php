<!-- ==== User-Activities Analysis Graph ======= -->
<div class="container">
    <div class="log-card">
        <div class="row">
            <div class="col-xl-6">
                <div class="card-header staticrept ps-2" style="text-align:center;">
                    <span class="card-head-title head-skeletone">
                        <i class="fa-solid fa-layer-group"></i> 
                        Total Current Users Activities ( Per Day )
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
                        <span class="login-user-title">Current Login Users</span>
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
                        <span class="login-user-title">Current Logout Users</span>
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
                            <label class="login-user-title" for="tot_cagt"> Total Activity Users</label>
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
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        // Define x-axis values (labels) for the chart
        const xValues = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];

        // Initialize the chart
        var ctx = document.getElementById("userDayLogChart").getContext('2d');
        var userDayLogChart = new Chart(ctx, {
            type: 'line',  // Line chart
            data: {
                labels: xValues,
                datasets: [{
                    label: "Login",
                    data: [], // Initially empty, will be updated with data from server
                    borderColor: "darkgreen",
                    borderWidth: 2,
                    fill: false
                }, {
                    label: "Logout",
                    data: [],
                    borderColor: "orange",
                    borderWidth: 2,
                    fill: false
                }, {
                    label: "Current User",
                    data: [],
                    borderColor: "blue",
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true, // Make the chart responsive
                plugins: {
                    legend: {
                        display: true, // Show legend
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: true // Show gridlines on the x-axis
                        }
                    },
                    y: {
                        grid: {
                            display: true // Show gridlines on the y-axis
                        },
                        beginAtZero: true // Start y-axis at 0
                    }
                }
            }
        });
    });

    // $(document).ready(function() {
    //     // Define x-axis values (labels) for the chart
    //     const xValues = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];

    //     // Initialize the chart
    //     var ctx = document.getElementById("userDayLogChart").getContext('2d');
    //     new Chart(ctx, {
    //         type: 'line',  // Line chart
    //         data: {
    //             labels: xValues,
    //             datasets: [{
    //                 label: "Login",
    //                 data: [500, 8000, 2000, 3000, 8000, 4000, 12000],
    //                 borderColor: "darkgreen",
    //                 borderWidth: 2,  // Adjust border width for visibility
    //                 fill: false      // Disable fill to only show lines
    //             }, {
    //                 label: "Logout",
    //                 data: [300, 700, 2000, 5000, 6000, 4000, 2000],
    //                 borderColor: "orange",
    //                 borderWidth: 2,
    //                 fill: false
    //             }, {
    //                 label: "Current User",
    //                 data: [1600, 1700, 1700, 1900, 2000, 2700, 4000],
    //                 borderColor: "blue",
    //                 borderWidth: 2,
    //                 fill: false
    //             }]
    //         },
    //         options: {
    //             responsive: true, // Make the chart responsive
    //             plugins: {
    //                 legend: {
    //                     display: true, // Show legend
    //                     position: 'top'
    //                 }
    //             },
    //             scales: {
    //                 x: {
    //                     grid: {
    //                         display: true // Show gridlines on the x-axis
    //                     }
    //                 },
    //                 y: {
    //                     grid: {
    //                         display: true // Show gridlines on the y-axis
    //                     },
    //                     beginAtZero: true // Start y-axis at 0
    //                 }
    //             }
    //         }
    //     });
    // });
</script>
<script>
    $(document).ready(function() {
        // Define x-axis values (labels) for the chart
        const xValues = ['Jan', 'Fub', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Initialize the chart
        var ctx = document.getElementById("userMonthLogChart").getContext('2d');
        new Chart(ctx, {
            type: 'line',  // Line chart
            data: {
                labels: xValues,
                datasets: [{
                    label: "Login",
                    data: [500, 8000, 2000, 3000, 8000, 4000, 12000, 500, 8000, 2000, 3000, 8000],
                    borderColor: "darkgreen",
                    borderWidth: 2,  // Adjust border width for visibility
                    fill: false      // Disable fill to only show lines
                }, {
                    label: "Logout",
                    data: [300, 700, 2000, 5000, 6000, 4000, 2000, 500, 8000, 2000, 3000, 8000],
                    borderColor: "orange",
                    borderWidth: 2,
                    fill: false
                }, {
                    label: "Current User",
                    data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 500, 8000, 2000, 3000, 8000],
                    borderColor: "blue",
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true, // Make the chart responsive
                plugins: {
                    legend: {
                        display: true, // Show legend
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: true // Show gridlines on the x-axis
                        }
                    },
                    y: {
                        grid: {
                            display: true // Show gridlines on the y-axis
                        },
                        beginAtZero: true // Start y-axis at 0
                    }
                }
            }
        });
    });
</script>
@endPush