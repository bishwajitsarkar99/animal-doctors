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
                        <span class="total-number">{{ $total_users }}</span>
                    </div>
                </div>
            </div>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $total_users_percentage }}" style="width:20%;" aria-valuemin="0" aria-valuemax="100" style="width: {{ $total_users_percentage }}%;">
                    {{ round($total_users_percentage, 2) }}%
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
                        <span class="total-number">{{ $authentic_users }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{{ $authentic_users_percentage }}" style="width:20%;" aria-valuemin="0" aria-valuemax="100" style="width: {{ $authentic_users_percentage }}%;">
                    {{ round($authentic_users_percentage, 2) }}%
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
                        <span class="total-number">{{ $inactive_users }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="{{ $inactive_users_percentage }}" style="width:20%;" aria-valuemin="0" aria-valuemax="100" style="width: {{ $inactive_users_percentage }}%;">
                    {{ round($inactive_users_percentage, 2) }}%
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
                        <span class="total-number">{{ $activity_users }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.7rem;">
                <div class="progress-bar progress-bar-striped bg-blueviolet progress-bar-animated" role="progressbar" aria-valuenow="{{ $activity_users_percentage }}" style="width:20%;" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($activity_users_percentage, 2) }}%;">
                    {{ round($activity_users_percentage, 2) }}%
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-xl-6">
        <div class="card card-body five-card">
            <span class="card-head-title pb-2" style="border-bottom: 1px solid rgba(0, 0, 0, 0.175);">
                <span class="head-skeletone">
                    <i class="fa-solid fa-layer-group" style="color:#2e42cb;"></i>
                    Users Summary
                </span>
            </span>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Super-Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#333333;font-weight:800;" aria-valuenow="{{ round($percentageRoles['super_admin'], 2) }}" style="width:20%" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['super_admin'], 2) }}%;">
                            {{ round($percentageRoles['super_admin'], 2) }}%
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
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#333333;font-weight:800;" aria-valuenow="{{ round($percentageRoles['admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['admin'], 2) }}%;">
                            {{ round($percentageRoles['admin'], 2) }}%
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
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#333333;font-weight:800;" aria-valuenow="{{ round($percentageRoles['sub_admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['sub_admin'], 2) }}%;">
                            {{ round($percentageRoles['sub_admin'], 2) }}%
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
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#333333;font-weight:800;" aria-valuenow="{{ round($percentageRoles['accounts'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['accounts'], 2) }}%;">
                            {{ round($percentageRoles['accounts'], 2) }}%
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
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#333333;font-weight:800;" aria-valuenow="{{ round($percentageRoles['marketing'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['marketing'], 2) }}%;">
                            {{ round($percentageRoles['marketing'], 2) }}%
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
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#333333;font-weight:800;" aria-valuenow="{{ round($percentageRoles['delivery_team'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['delivery_team'], 2) }}%;">
                            {{ round($percentageRoles['delivery_team'], 2) }}%
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
                        <div class="progress-bar progress-bar-striped bg-light-blueviolet progress-bar-animated" role="progressbar" style="width:20%;color:#333333;font-weight:800;" aria-valuenow="{{ round($percentageRoles['users'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['users'], 2) }}%;">
                            {{ round($percentageRoles['users'], 2) }}%
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
                        <div class="progress-bar progress-bar-striped bg-light progress-bar-animated" role="progressbar" style="width:20%;color:#000;font-weight:500;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-light-blueviolet total-number-skeletone pt-1" style="color:#000;font-weight:800;background-color:lightgray;">{{ $total_users }}.00</span>
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
            <div class="card card-body third-card body-skeletone user-activities--month-bar-chart">
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
                    <span class="text-position">Branch Log Data Information</span>
                </div>
                @foreach($branch_log_session_data as $branchId => $rolesGroup)
                    @php
                        $firstSession = $rolesGroup->first();
                    @endphp

                    <div>
                        <div class="row font-gray-700 data-head">
                            <div class="col-xl-4"><span>Branch</span></div>
                            <div class="col-xl-4"><span class="ms-3 ps-1">Role</span></div>
                            <div class="col-xl-4" style="text-align:center;"><span>Barchart</span></div>
                        </div>
                    </div>
                    <div class="row font-gray-700">
                        <div class="col-xl-4">
                            <ul id="branchLabel">
                                <li>Branch-ID : {{ $branchId }}</li>
                                <li>Branch-Category : {{ $firstSession->users->branch_type ?? 'N/A' }}</li>
                                <li>Branch-Name : {{ $firstSession->users->branch_name ?? 'N/A' }}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <ul id="roleLabel">
                                @foreach($rolesGroup->unique('role') as $roleItem)
                                    <li class="ps-2">Role-Name : {{ $roleItem->roles->name ?? $roleItem->role }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <ul id="brancChart">
                                <li>
                                    <canvas id="branchChart" height="20"></canvas>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@push('scripts')
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
                    titleFont: { size: 12 },
                    bodyFont: { size: 12 },
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
                        color: '#333',
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
                        color: '#333',
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
                    titleFont: { size: 12 },
                    bodyFont: { size: 12 },
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
                        color: '#333',
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
                        color: '#333',
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
@endPush
@elseif($user_log_data_table_permission == 0)
@include('super-admin.user-details.error.data-table-permission')
@endif