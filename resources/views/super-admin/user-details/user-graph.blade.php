@if($user_log_data_table_permission == 1)
<!-- ==== User-Details-Graph ======= -->
<div class="row">
    <div class="col-xl-3">
        <div class="card card-body first-card">
            <div class="card card-head-title mini-card-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group" style="color:#0A5EDB;"></i>
                    Total-Users
                </span>
                <div class="ring-div">
                    <div class="total-user-loader cricale-number-skeleton">
                        <span class="total-number">{{ $miniCardData['total_users'] }}</span>
                    </div>
                </div>
            </div>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $miniCardData['total_users_percentage'] }}" style="width:20%;" aria-valuemin="0" aria-valuemax="100" style="width: {{ $miniCardData['total_users_percentage'] }}%;">
                    {{ round($miniCardData['total_users_percentage'], 2) }}%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-body second-card">
            <span class="card card-head-title mini-card-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group" style="color:#198754;"></i>
                    Authentic Users
                </span>
                <div class="ring-div">
                    <div class="authentic-loader cricale-number-skeleton">
                        <span class="total-number">{{ $miniCardData['authentic_users'] }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{{ $miniCardData['authentic_users_percentage'] }}" style="width:20%;" aria-valuemin="0" aria-valuemax="100" style="width: {{ $miniCardData['authentic_users_percentage'] }}%;">
                    {{ round($miniCardData['authentic_users_percentage'], 2) }}%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-body third-card">
            <span class="card card-head-title mini-card-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group" style="color:#dc3545;"></i>
                    Inactive Users
                </span>
                <div class="ring-div">
                    <div class="inactive-loader cricale-number-skeleton">
                        <span class="total-number">{{ $miniCardData['inactive_users'] }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="{{ $miniCardData['inactive_users_percentage'] }}" style="width:20%;" aria-valuemin="0" aria-valuemax="100" style="width: {{ $miniCardData['inactive_users_percentage'] }}%;">
                    {{ round($miniCardData['inactive_users_percentage'], 2) }}%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-body four-card">
            <span class="card card-head-title mini-card-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group" style="color:6f42c1;"></i>
                    Log Activity Of Users
                </span>
                <div class="ring-div">
                    <div class="activity-loader cricale-number-skeleton">
                        <span class="total-number">{{ $miniCardData['activity_users'] }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped bg-blueviolet progress-bar-animated" role="progressbar" aria-valuenow="{{ $miniCardData['activity_users_percentage'] }}" style="width:20%;" aria-valuemin="0" aria-valuemax="100" style="width: {{ $miniCardData['activity_users_percentage'] }}%;">
                    {{ round($miniCardData['activity_users_percentage'], 2) }}%
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-xl-6">
        <div class="card card-body five-card">
            <div class="card-head-title pb-1">
                <span class="head-skeletone">
                    <i class="fa-solid fa-layer-group" style="color:#2e42cb;"></i>
                    Users Summary
                </span>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Super-Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#111;font-weight:900;" aria-valuenow="{{ round($summaryCardData['super_admin'], 2) }}" style="width:20%" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($summaryCardData['super_admin'], 2) }}%;">
                            {{ round($summaryCardData['super_admin'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-light-blueviolet result-skeletone pt-1" style="color:#000;font-weight:800;background-color: #6ba7ff;">{{ $usersCount['super_admin']}}.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#111;font-weight:900;" aria-valuenow="{{ round($summaryCardData['admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($summaryCardData['admin'], 2) }}%;">
                            {{ round($summaryCardData['admin'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-light-blueviolet result-skeletone pt-1" style="color:#000;font-weight:800;background-color: #6ba7ff;">{{ $usersCount['admin']}}.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Sub-Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#111;font-weight:900;" aria-valuenow="{{ round($summaryCardData['sub_admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($summaryCardData['sub_admin'], 2) }}%;">
                            {{ round($summaryCardData['sub_admin'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-light-blueviolet result-skeletone pt-1" style="color:#000;font-weight:800;background-color: #6ba7ff;">{{ $usersCount['sub_admin']}}.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Accounts Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#111;font-weight:900;" aria-valuenow="{{ round($summaryCardData['accounts'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($summaryCardData['accounts'], 2) }}%;">
                            {{ round($summaryCardData['accounts'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-light-blueviolet result-skeletone pt-1" style="color:#000;font-weight:800;background-color: #6ba7ff;">{{ $usersCount['accounts']}}.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Marketing Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#111;font-weight:900;" aria-valuenow="{{ round($summaryCardData['marketing'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($summaryCardData['marketing'], 2) }}%;">
                            {{ round($summaryCardData['marketing'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-light-blueviolet result-skeletone pt-1" style="color:#000;font-weight:800;background-color: #6ba7ff;">{{ $usersCount['marketing']}}.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Delivery Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#111;font-weight:900;" aria-valuenow="{{ round($summaryCardData['delivery_team'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($summaryCardData['delivery_team'], 2) }}%;">
                            {{ round($summaryCardData['delivery_team'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-light-blueviolet result-skeletone pt-1" style="color:#000;font-weight:800;background-color: #6ba7ff;">{{ $usersCount['delivery_team']}}.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">General Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#111;font-weight:900;" aria-valuenow="{{ round($summaryCardData['users'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($summaryCardData['users'], 2) }}%;">
                            {{ round($summaryCardData['users'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-light-blueviolet result-skeletone pt-1" style="color:#000;font-weight:800;background-color: #6ba7ff;">{{ $usersCount['users']}}.00</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Total Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-light progress-bar-animated" role="progressbar" style="width:20%;color:#111;font-weight:900;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-light-blueviolet total-number-skeletone pt-1" style="color:#000;font-weight:800;background-color:lightgray;">{{ $miniCardData['total_users'] }}.00</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card user_line_chart" id="orderChart">
            <div class="card-header bar-header ps-2" style="text-align:center;">
                <span class="card-head-title head-skeletone">
                    <i class="fa-solid fa-layer-group" style="color:#2e42cb;"></i> 
                    User Acivities Line Chart ( Current Time )
                </span>
                <div class="loader_skeleton" id="loader_orderChart"></div>
            </div>
            <div class="card card-body third-card chart-body-skeletone user-activities--month-bar-chart">
                <canvas id="userActivityChart" height="110"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-xl-12">
        <div class="card user_line_chart" id="orderChart">
            <div class="card-header bar-header ps-2" style="text-align:center;">
                <span class="card-head-title head-skeletone">
                    <i class="fa-solid fa-layer-group" style="color:#2e42cb;"></i> 
                    Total User Acivities Bar Chart ( Current Month )
                </span>
                <div class="loader_skeleton" id="loader_acivityChart"></div>
            </div>
            <div class="card card-body third-card body-skeletone user-activities--week-chart">
                <canvas id="userChart" height="80"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4 mb-4">
    <div class="col-xl-12">
        <div class="card card-body branch-info-card" id="branchCard">
            <div class="row">
                <div class="col-xl-12 head-init">
                    <span class="head-skeletone">
                        <i class="fa-solid fa-layer-group" style="color:#2e42cb;"></i> 
                        Branch Information
                    </span>
                </div>
                @foreach($branch_log_session_data as $branchId => $rolesGroup)
                    @php
                        $firstSession = $rolesGroup->first();
                    @endphp

                    <div class="branch-card-skeletone">
                        <div class="row font-gray-700 data-head">
                            <div class="col-xl-3"><span>Branch</span></div>
                            <div class="col-xl-3"><span class="me-5">Role</span></div>
                            <div class="col-xl-6" style="text-align:center;"><span>Bar Chart</span></div>
                        </div>
                        <div class="row font-gray-700">
                            <div class="col-xl-3">
                                <ul class="pt-1 mt-3" id="branchLabel">
                                    <li>ID : {{ $branchId }}</li>
                                    <li>Category : {{ $firstSession->users->branch_type ?? 'N/A' }}</li>
                                    <li>Name : {{ $firstSession->users->branch_name ?? 'N/A' }}</li>
                                </ul>
                            </div>
                            <div class="col-xl-3">
                                <ul class="pt-1 mt-3" id="roleLabel">
                                    @foreach($rolesGroup->unique('role') as $roleItem)
                                        <li class="ps-2" style="display:flex;justify-content:space-between;">
                                            {{ $roleItem->roles->name ?? $roleItem->role }}
                                            <span class="user-amount badge rounded-pill bg-light-blueviolet mb-1" style="color:#000;font-size:11px;font-weight:800;background-color: #6ba7ff;">
                                                {{ $roleItem->unique_email_count }}.00
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xl-6">
                                <ul class="pt-1 mt-1" id="branchChart">
                                    <li>
                                        <div  style="width: 100% !important; height: 150px;">
                                            <canvas id="branchInfoChart_{{ $branchId }}" height="80"></canvas>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="row font-gray-700">
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
                        </div> -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@push('scripts')
<!-- first Chart Graphp -->
<script type="module">
    // hover plugins
    import { hoverGridPlugin, dottedGridPlugin, axisCursorPlugin, axisTooltipTextPlugin} from "/plugins/chartHoverPlugins.js";
    const ctxUserActivityChart = document.getElementById("userActivityChart").getContext("2d");
    var gradientColor = ctxUserActivityChart.createLinearGradient(0, 0, 0, 400);
    gradientColor.addColorStop(0, 'rgb(157, 235, 255)');  // orange at top rgb(142, 229, 255) 
    gradientColor.addColorStop(1, 'rgb(138, 65, 255)'); // transparent at bottom rgba(255, 166, 0, 0)
    const userActivityLineChart = new Chart(ctxUserActivityChart, {
        type: "line",
        data: {
            labels: ["Inactive Users", "Authentic Users", "Log Activity", "Total Users"],
            datasets: [{
                type: "line",
                label: "User Activity",
                data: @json(array_values($usersActivityCount)),
                backgroundColor: gradientColor,
                borderColor: '#0A5EDB',
                borderWidth: 1,
                fill: true,
                tension: 0.4,
                pointStyle: ['triangle','triangle','triangle','triangle'],
                pointRadius: 5,
                pointHoverRadius: 10,
                pointBackgroundColor: ["#cf2e2e", "darkgreen", "#6f42c1", "#0A5EDB"],
                pointBorderColor: ["#cf2e2e", "darkgreen", "#6f42c1", "#0A5EDB"],
                pointHoverBackgroundColor: ["#cf2e2e", "darkgreen", "#6f42c1", "#0A5EDB"],
                pointHoverBorderColor: ["#cf2e2e", "darkgreen", "#6f42c1", "#0A5EDB"]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { 
                    display: false 
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
                y: {
                    grid: { display: false },
                    ticks: {
                        beginAtZero: true,
                        color: '#111',
                        font: {
                            family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                            size: 12,
                            weight: 'bold'
                        }
                    }
                },
                x: {
                    grid: { display: false },
                    ticks: {
                        color: '#111',
                        font: {
                            family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                            size: 12,
                            weight: 'bold'
                        }
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeInOutBounce'
            }
        },
        // import plugins
        plugins:[
            hoverGridPlugin(),
            dottedGridPlugin(),
            axisTooltipTextPlugin(),
            axisCursorPlugin()
        ]
    });
</script>
<!-- second Chart Graphp -->
<script type="module">
    // hover plugins
    import { hoverGridPlugin, dottedGridPlugin, axisCursorPlugin, axisTooltipTextPlugin} from "/plugins/chartHoverPlugins.js";
    // Get the canvas context
    const ctx2 = document.getElementById("userChart").getContext("2d");

    const xValues = [
        "Super admin", "Admin", "Sub admin", "Accounts", "Marketing", "Delivery", "General",
        "Inactive","Authentic","Activity","Total Users"
    ];
    const barColors = ["rgb(194, 143, 96)", "rgb(194, 143, 96)", "rgb(194, 143, 96)", "rgb(194, 143, 96)", "rgb(194, 143, 96)", "rgb(194, 143, 96)", "rgb(194, 143, 96)","#cf2e2e","#198754","#6f42c1","#0A5EDB"];
    // bg-color:royalblue
    // Pass the PHP array to JavaScript 
    const userCounts = @json(array_values($usersCount));
    const userCtx2 = new Chart(ctx2, {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                label: "Total Qty",
                data: userCounts,
                backgroundColor: barColors,
                tension: 0.4,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                    position: 'top',
                    labels: {
                        color: '#000000',
                        font: {
                            size: 12,
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
                y: {
                    beginAtZero: true,
                    grid: { display: false },
                    ticks: {
                        color: '#111',
                        font: {
                            family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                            size: 12,
                            weight: 'bold'
                        }
                    },
                },
                x: {
                    grid: { display: false },
                    ticks: {
                        color: '#111',
                        font: {
                            family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
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
        },
        // import plugins
        plugins:[
            hoverGridPlugin(),
            dottedGridPlugin(),
            axisTooltipTextPlugin(),
            axisCursorPlugin()
        ]
    });
</script>
<!-- third Chart Graphp -->
<script type="module">
    import { hoverGridPlugin, dottedGridPlugin, axisCursorPlugin, axisTooltipTextPlugin } from "/plugins/chartHoverPlugins.js";

    const branchData = @json($branchRoleStats);

    Object.entries(branchData).forEach(([branchId, stats]) => {
        const userCanvas = document.getElementById(`branchInfoChart_${branchId}`).getContext('2d');

        // Create gradients
        const gradientActivity = userCanvas.createLinearGradient(0, 0, 0, 400);
        gradientActivity.addColorStop(0, 'rgba(28,200,138,0.5)');
        gradientActivity.addColorStop(1, 'rgba(34,139,34,0)');
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

        new Chart(userCanvas, {
            type: 'bar',
            data: {
                labels: stats.roles,
                datasets: [
                    {
                        type: 'bar',
                        label: 'Login',
                        data: stats.login_counts,
                        backgroundColor: '#4e73df',
                        tension: 0.4,
                        order: 2
                    },
                    {
                        type: 'bar',
                        label: 'Logout',
                        data: stats.logout_counts,
                        backgroundColor: '#cf2e2e',
                        tension: 0.4,
                        order: 3
                    },
                    {
                        type: 'line',
                        label: 'Activity',
                        fill: true,
                        data: stats.activity_counts,
                        backgroundColor: gradientActivity,
                        borderColor: 'rgba(28,200,138,1)',
                        borderWidth: 1,
                        tension: 0.4,
                        pointStyle: createCandlePointStyle('rgb(194, 143, 96)'),
                        pointHoverBackgroundColor: "rgb(194, 143, 96)",
                        order: 4
                    },
                    {
                        type: 'bar',
                        label: 'Current Login',
                        data: stats.current_login_counts,
                        backgroundColor: 'purple',
                        tension: 0.4,
                        order: 1
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
                            color: '#000000',
                            font: {
                                size: 11,
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        }, 
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
                        grid: { display: false },
                        ticks: { 
                            color: '#111', 
                            font: { 
                                size: 10, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold' 
                            } 
                        }
                    },
                    y: {
                        grid: { display: false },
                        beginAtZero: true,
                        ticks: { 
                            color: '#111', 
                            font: { 
                                size: 10, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold' 
                            } 
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutBounce',
                }
            },
            plugins: [
                hoverGridPlugin(),
                dottedGridPlugin(),
                axisTooltipTextPlugin(),
                axisCursorPlugin(),
                ChartZoom,
            ]
        });
    });
</script>
@endPush
@elseif($user_log_data_table_permission == 0)
@include('super-admin.user-details.error.data-table-permission')
@endif