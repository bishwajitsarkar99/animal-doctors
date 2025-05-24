@if($user_log_data_table_permission == 1)
<!-- ==== User-Details-Graph ======= -->
<div class="row">
    @php
        $titles = [
            'total_users' => ['label' => 'Total-Users', 'bg' => 'card-light-bg', 'icolor' => '#0A5EDB', 'loader' => 'total-user-loader', 'progressbg' => '#0A5EDB'],
            'authentic_users' => ['label' => 'Authentic Users', 'bg' => 'card-light-bg', 'icolor' => '#198754', 'loader' => 'authentic-loader', 'progressbg' => 'bg-success'],
            'inactive_users' => ['label' => 'Inactive Users', 'bg' => 'card-light-bg', 'icolor' => '#dc3545', 'loader' => 'inactive-loader', 'progressbg' => 'bg-danger'],
            'activity_users' => ['label' => 'Log Activity Of Users', 'bg' => 'card-light-bg', 'icolor' => '#6f42c1', 'loader' => 'activity-loader', 'progressbg' => 'bg-blueviolet'],
        ];
    @endphp
    @foreach($titles as $key => $data)
        <div class="col-xl-3">
            <x-user-cards.user-mini-card 
                title="{{ $data['label'] }}" 
                count="{{ $miniCardData[$key] }}"
                percentage="{{ $miniCardData[$key . '_percentage'] }}"
                cardClass="{{ $data['bg'] }}"
                loaderClass="{{ $data['loader'] }}"
                iconColor="{{ $data['icolor'] }}"
                progressColor="{{ $data['progressbg'] }}"
            />
        </div>
    @endforeach
</div>
<div class="row mt-4">
    <div class="col-xl-6">
        <x-card>
            <x-user-cards.user-summary-card-header cardHeadTitile="Users Summary" iconColor="#2e42cb" />
            @php
                $roles = [
                    'super_admin' => ['label' => 'Super-Admin Users', 'bg' => 'bg-light-blueviolet'],
                    'admin' => ['label' => 'Admin Users', 'bg' => 'bg-light-blueviolet'],
                    'sub_admin' => ['label' => 'Sub-Admin Users', 'bg' => 'bg-light-blueviolet'],
                    'accounts' => ['label' => 'Accounts Users', 'bg' => 'bg-light-blueviolet'],
                    'marketing' => ['label' => 'Marketing Users', 'bg' => 'bg-light-blueviolet'],
                    'delivery_team' => ['label' => 'Delivery Users', 'bg' => 'bg-light-blueviolet'],
                    'users' => ['label' => 'General Users', 'bg' => 'bg-light-blueviolet'],
                ];
            @endphp
            @foreach($roles as $key => $data)
                <x-user-cards.user-summary-card-body
                    title="{{ $data['label'] }}"
                    count="{{ $usersCount[$key] ?? 0 }}"
                    progressbarbg="{{ $data['bg'] }}"
                    textPercentageProgress="text-progress-percentage"
                    percentage="{{ round($summaryCardData[$key] ?? 0, 2) }}"
                    numberAmountClass="user-amount" 
                    badgeClass="badge"
                    badgeRoundedClass="rounded-pill"
                    textNumberClass="text-number-count"
                />
            @endforeach
            <x-user-cards.user-summary-card-footer 
                title="Total Users"
                count="{{ $miniCardData['total_users'] }}"
                progressbarbg="bg-light-blueviolet"
                textPercentageProgress="text-progress-percentage"
                percentage="{{ round($miniCardData['total_users_percentage']) }}"
                numberAmountClass="user-amount" 
                badgeClass="badge"
                badgeRoundedClass="rounded-pill"
                textNumberClass="text-number-count"
            />
        </x-card>
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
                <span class="chart-svg" id="svgIcon" hidden>
                    <svg version="1.1" id="Layer_1" width="100%" height="100px" fill="#969696" x="0px" y="0px" viewBox="0 0 122.9 85.6" style="enable-background:new 0 0 122.9 85.6" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M7.5,0h107.9c4.1,0,7.5,3.4,7.5,7.5v70.6c0,4.1-3.4,7.5-7.5,7.5H7.5c-4.1,0-7.5-3.4-7.5-7.5V7.5 C0,3.4,3.4,0,7.5,0L7.5,0z M69.9,63.3h28.5v4H69.9V63.3L69.9,63.3z M69.9,53.1H109v4H69.9V53.1L69.9,53.1z M92.1,35h5.6 c0.3,0,0.5,0.2,0.5,0.5v11c0,0.3-0.2,0.5-0.5,0.5h-5.6c-0.3,0-0.5-0.2-0.5-0.5v-11C91.6,35.3,91.8,35,92.1,35L92.1,35L92.1,35z M70.5,28.3h5.6c0.3,0,0.5,0.2,0.5,0.5v17.8c0,0.3-0.2,0.5-0.5,0.5h-5.6c-0.3,0-0.5-0.2-0.5-0.5V28.8 C69.9,28.5,70.2,28.3,70.5,28.3L70.5,28.3L70.5,28.3L70.5,28.3z M81.3,24.5h5.6c0.3,0,0.5,0.2,0.5,0.5v21.6c0,0.3-0.2,0.5-0.5,0.5 h-5.6c-0.3,0-0.5-0.2-0.5-0.5V25C80.8,24.7,81,24.5,81.3,24.5L81.3,24.5L81.3,24.5z M39.3,48.2l17,0.3c0,6.1-3,11.7-8,15.1 L39.3,48.2L39.3,48.2L39.3,48.2z M37.6,45.3l-0.2-19.8l0-1.3l1.3,0.1h0h0c1.6,0.1,3.2,0.4,4.7,0.8c1.5,0.4,2.9,1,4.3,1.7 c6.9,3.6,11.7,10.8,12.1,19l0.1,1.3l-1.3,0l-19.7-0.6l-1.1,0L37.6,45.3L37.6,45.3L37.6,45.3z M39.8,26.7L40,44.1l17.3,0.5 c-0.7-6.8-4.9-12.7-10.7-15.8c-1.2-0.6-2.5-1.1-3.8-1.5C41.7,27.1,40.8,26.9,39.8,26.7L39.8,26.7L39.8,26.7z M35.9,47.2L45.6,64 c-3,1.7-6.3,2.6-9.7,2.6c-10.7,0-19.4-8.7-19.4-19.4c0-10.4,8.2-19,18.6-19.4L35.9,47.2L35.9,47.2L35.9,47.2z M115.6,14.1H7.2v64.4 h108.4V14.1L115.6,14.1L115.6,14.1z"/></g></svg>
                </span>
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
                <span class="chart-svg-two" id="svgIcon" hidden>
                    <svg version="1.1" id="Layer_1" width="100%" height="160px" fill="#969696" x="0px" y="0px" viewBox="0 0 122.9 85.6" style="enable-background:new 0 0 122.9 85.6" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M7.5,0h107.9c4.1,0,7.5,3.4,7.5,7.5v70.6c0,4.1-3.4,7.5-7.5,7.5H7.5c-4.1,0-7.5-3.4-7.5-7.5V7.5 C0,3.4,3.4,0,7.5,0L7.5,0z M69.9,63.3h28.5v4H69.9V63.3L69.9,63.3z M69.9,53.1H109v4H69.9V53.1L69.9,53.1z M92.1,35h5.6 c0.3,0,0.5,0.2,0.5,0.5v11c0,0.3-0.2,0.5-0.5,0.5h-5.6c-0.3,0-0.5-0.2-0.5-0.5v-11C91.6,35.3,91.8,35,92.1,35L92.1,35L92.1,35z M70.5,28.3h5.6c0.3,0,0.5,0.2,0.5,0.5v17.8c0,0.3-0.2,0.5-0.5,0.5h-5.6c-0.3,0-0.5-0.2-0.5-0.5V28.8 C69.9,28.5,70.2,28.3,70.5,28.3L70.5,28.3L70.5,28.3L70.5,28.3z M81.3,24.5h5.6c0.3,0,0.5,0.2,0.5,0.5v21.6c0,0.3-0.2,0.5-0.5,0.5 h-5.6c-0.3,0-0.5-0.2-0.5-0.5V25C80.8,24.7,81,24.5,81.3,24.5L81.3,24.5L81.3,24.5z M39.3,48.2l17,0.3c0,6.1-3,11.7-8,15.1 L39.3,48.2L39.3,48.2L39.3,48.2z M37.6,45.3l-0.2-19.8l0-1.3l1.3,0.1h0h0c1.6,0.1,3.2,0.4,4.7,0.8c1.5,0.4,2.9,1,4.3,1.7 c6.9,3.6,11.7,10.8,12.1,19l0.1,1.3l-1.3,0l-19.7-0.6l-1.1,0L37.6,45.3L37.6,45.3L37.6,45.3z M39.8,26.7L40,44.1l17.3,0.5 c-0.7-6.8-4.9-12.7-10.7-15.8c-1.2-0.6-2.5-1.1-3.8-1.5C41.7,27.1,40.8,26.9,39.8,26.7L39.8,26.7L39.8,26.7z M35.9,47.2L45.6,64 c-3,1.7-6.3,2.6-9.7,2.6c-10.7,0-19.4-8.7-19.4-19.4c0-10.4,8.2-19,18.6-19.4L35.9,47.2L35.9,47.2L35.9,47.2z M115.6,14.1H7.2v64.4 h108.4V14.1L115.6,14.1L115.6,14.1z"/></g></svg>
                </span>
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
                        <span class="chart-svg-three" id="svgIcon" hidden>
                            <svg version="1.1" id="Layer_1" width="100%" height="95px" fill="#969696" x="0px" y="0px" viewBox="0 0 122.9 85.6" style="enable-background:new 0 0 122.9 85.6" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M7.5,0h107.9c4.1,0,7.5,3.4,7.5,7.5v70.6c0,4.1-3.4,7.5-7.5,7.5H7.5c-4.1,0-7.5-3.4-7.5-7.5V7.5 C0,3.4,3.4,0,7.5,0L7.5,0z M69.9,63.3h28.5v4H69.9V63.3L69.9,63.3z M69.9,53.1H109v4H69.9V53.1L69.9,53.1z M92.1,35h5.6 c0.3,0,0.5,0.2,0.5,0.5v11c0,0.3-0.2,0.5-0.5,0.5h-5.6c-0.3,0-0.5-0.2-0.5-0.5v-11C91.6,35.3,91.8,35,92.1,35L92.1,35L92.1,35z M70.5,28.3h5.6c0.3,0,0.5,0.2,0.5,0.5v17.8c0,0.3-0.2,0.5-0.5,0.5h-5.6c-0.3,0-0.5-0.2-0.5-0.5V28.8 C69.9,28.5,70.2,28.3,70.5,28.3L70.5,28.3L70.5,28.3L70.5,28.3z M81.3,24.5h5.6c0.3,0,0.5,0.2,0.5,0.5v21.6c0,0.3-0.2,0.5-0.5,0.5 h-5.6c-0.3,0-0.5-0.2-0.5-0.5V25C80.8,24.7,81,24.5,81.3,24.5L81.3,24.5L81.3,24.5z M39.3,48.2l17,0.3c0,6.1-3,11.7-8,15.1 L39.3,48.2L39.3,48.2L39.3,48.2z M37.6,45.3l-0.2-19.8l0-1.3l1.3,0.1h0h0c1.6,0.1,3.2,0.4,4.7,0.8c1.5,0.4,2.9,1,4.3,1.7 c6.9,3.6,11.7,10.8,12.1,19l0.1,1.3l-1.3,0l-19.7-0.6l-1.1,0L37.6,45.3L37.6,45.3L37.6,45.3z M39.8,26.7L40,44.1l17.3,0.5 c-0.7-6.8-4.9-12.7-10.7-15.8c-1.2-0.6-2.5-1.1-3.8-1.5C41.7,27.1,40.8,26.9,39.8,26.7L39.8,26.7L39.8,26.7z M35.9,47.2L45.6,64 c-3,1.7-6.3,2.6-9.7,2.6c-10.7,0-19.4-8.7-19.4-19.4c0-10.4,8.2-19,18.6-19.4L35.9,47.2L35.9,47.2L35.9,47.2z M115.6,14.1H7.2v64.4 h108.4V14.1L115.6,14.1L115.6,14.1z"/></g></svg>
                        </span>
                        <div class="row font-gray-700 data-head">
                            <div class="col-xl-3"><span>{{ $firstSession->users->branch_name ?? 'N/A' }}</span></div>
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
                                            <span class="user-amount badge rounded-pill bg-light-blueviolet number-rolling total-user-rolling mb-1" style="color:#000;font-size:11px;font-weight:800;border:1px ridge #87cefabd;" data-target="{{ $roleItem->unique_email_count }}">
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
<script>
    function animateNumber(el, target, duration = 3000) {
        const startTime = performance.now();

        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const current = Math.floor(progress * target);
            el.textContent = current.toLocaleString();

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        }

        requestAnimationFrame(update);
    }

    function animateProgressBar(el, targetPercent, duration = 3000) {
        el.style.transition = `width ${duration}ms ease-in-out`;
        // Trigger reflow for transition restart
        el.offsetWidth;
        el.style.width = targetPercent + '%';
    }

    function isInViewport(el) {
        const rect = el.getBoundingClientRect();
        return rect.top < window.innerHeight && rect.bottom > 0;
    }

    const animatedElements = new WeakMap();

    function triggerIfInView() {
        const numberElements = document.querySelectorAll('.total-number');

        numberElements.forEach(numEl => {
            const card = numEl.closest('.card-body');
            if (!card) return;

            const isVisible = isInViewport(card);
            const isAnimated = animatedElements.has(card);

            if (isVisible && !isAnimated) {
                // Animate number
                const target = parseFloat(numEl.getAttribute('data-target'));
                animateNumber(numEl, target);

                // Animate progress bar
                const progressBar = card.querySelector('.progress-bar');
                if (progressBar) {
                    const targetPercent = parseFloat(progressBar.getAttribute('aria-valuenow'));
                    animateProgressBar(progressBar, targetPercent);
                }

                animatedElements.set(card, true);
            } else if (!isVisible && isAnimated) {
                // Reset progress bar width when scrolled out
                const progressBar = card.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.transition = 'none';
                    progressBar.style.width = '0%';
                }

                animatedElements.delete(card);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', triggerIfInView);
    window.addEventListener('scroll', triggerIfInView);
</script>
<!-- <script>
    function animateNumber(el, target, duration = 3000) {
    const startTime = performance.now();

    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const current = Math.floor(progress * target);
        el.textContent = current.toLocaleString();

        if (progress < 1) {
        requestAnimationFrame(update);
        }
    }

    requestAnimationFrame(update);
    }

    function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    return rect.top < window.innerHeight && rect.bottom > 0;
    }

    const animatedElements = new WeakMap(); // Track animation state and timeout

    function triggerIfInView() {
    const elements = document.querySelectorAll('.number-rolling');

    elements.forEach(el => {
        const target = parseInt(el.getAttribute('data-target'), 10);

        if (isInViewport(el)) {
        if (!animatedElements.has(el)) {
            animateNumber(el, target, 3000);
            animatedElements.set(el, true); // mark as animated

            // Reset after animation completes (3.2s)
            setTimeout(() => {
            animatedElements.delete(el);
            }, 3200);
        }
        }
    });
    }

    document.addEventListener('DOMContentLoaded', triggerIfInView);
    window.addEventListener('scroll', triggerIfInView);
</script> -->
@endPush
@elseif($user_log_data_table_permission == 0)
@include('super-admin.user-details.error.data-table-permission')
@endif