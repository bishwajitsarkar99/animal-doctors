@if($user_log_data_table_permission == 1)
<!-- ==== User-Details-Graph ======= -->
<div class="row">
    @php
        $titles = [
            'total_users' => ['label' => 'Total-Users', 'bg' => 'card-light-bg', 'icolor' => '#0A5EDB', 'loader' => 'total-user-loader', 'progressbg' => '#0A5EDB', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
            'authentic_users' => ['label' => 'Authentic Users', 'bg' => 'card-light-bg', 'icolor' => '#198754', 'loader' => 'authentic-loader', 'progressbg' => 'bg-success', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
            'inactive_users' => ['label' => 'Inactive Users', 'bg' => 'card-light-bg', 'icolor' => '#dc3545', 'loader' => 'inactive-loader', 'progressbg' => 'bg-danger', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
            'activity_users' => ['label' => 'Log Activity Count', 'bg' => 'card-light-bg', 'icolor' => '#6f42c1', 'loader' => 'activity-loader', 'progressbg' => 'bg-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
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
                numberCountAnimationKey="{{ $data['number-animation-key'] }}"
                numberCountAnimation="{{ $data['number-animation'] }}"
                progrssBarAnimationQuerySelector="{{ $data['progress-bar-animation-query-selector'] }}"
            />
        </div>
    @endforeach
</div>
<div class="row mt-4">
    <div class="col-xl-6">
        <x-user-cards.user-storage-card>
            <x-user-cards.user-storage-card-header cardHeadTitile="Users Storage" iconColor="#2e42cb" />
            @php
                $roles = [
                    'super_admin' => ['label' => 'Super-Admin Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
                    'admin' => ['label' => 'Admin Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
                    'sub_admin' => ['label' => 'Sub-Admin Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
                    'accounts' => ['label' => 'Accounts Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
                    'marketing' => ['label' => 'Marketing Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
                    'delivery_team' => ['label' => 'Delivery Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
                    'users' => ['label' => 'General Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar'],
                ];
            @endphp
            @foreach($roles as $key => $data)
                <x-user-cards.user-storage-card-body
                    title="{{ $data['label'] }}"
                    count="{{ $usersCount[$key] ?? 0 }}"
                    progressbarbg="{{ $data['bg'] }}"
                    textPercentageProgress="text-progress-percentage"
                    percentage="{{ round($summaryCardData[$key] ?? 0, 2) }}"
                    numberAmountClass="user-amount" 
                    badgeClass="badge"
                    badgeRoundedClass="rounded-pill"
                    textNumberClass="text-number-count"
                    numberCountAnimationKey="{{ $data['number-animation-key'] }}"
                    numberCountAnimation="{{ $data['number-animation'] }}"
                    progrssBarAnimationQuerySelector="{{ $data['progress-bar-animation-query-selector'] }}"
                />
            @endforeach
            <x-user-cards.user-storage-card-footer 
                title="Total Users"
                count="{{ $miniCardData['total_users'] }}"
                progressbarbg="bg-light-blueviolet"
                textPercentageProgress="text-progress-percentage"
                percentage="{{ round($totalPercentage) }}"
                numberAmountClass="user-amount" 
                badgeClass="badge"
                badgeRoundedClass="rounded-pill"
                textNumberClass="text-number-count"
                storageCapacity="{{$storage}}"
                progrssQuerySelector="progress-bar"
                numberKey="number-rolling"
                numberCount="total-user-rolling"
                
            />
        </x-user-cards.user-storage-card>
    </div>
    <div class="col-xl-6">
        <x-chart-cards.chart-card id="orderChart">
            <x-chart-cards.chart-activity-card-header 
                cardHeadSkeletone="head-skeletone"
                loaderSkeletone="loader_skeleton"
                iconColor="#2e42cb7d"
                title="User Activity Count Line Chart ( Current Time )"
                loaderId="loader_orderChart"
                textAlign="center"
            />
            <x-chart-cards.chart-card-body
                cardBodySkeletone="chart-body-skeletone"
                cardBodyAnimation="user-activities--month-bar-chart"
                svgId="svgIcon"
                svgClass="chart-svg"
                svgWidth="100%"
                svgHeight="100px"
                svgColor="#969696"
                canvasHeight="110"
                canvasId="userActivityChart"
            />
        </x-card>
    </div>
</div>
<div class="row mt-4">
    <div class="col-xl-12">
        <x-chart-cards.chart-card id="orderChart">
            <x-chart-cards.chart-card-header 
                cardHeadSkeletone="head-skeletone"
                loaderSkeletone="loader_skeleton"
                iconColor="#2e42cb7d"
                title="Total User Acivities Bar Chart ( Current Month )"
                loaderId="loader_acivityChart"
                textAlign="center"
            />
            <x-chart-cards.chart-card-body
                cardBodySkeletone="body-skeletone"
                cardBodyAnimation="user-activities--week-chart"
                svgId="svgIcon2"
                svgClass="chart-svg"
                svgWidth="100%"
                svgHeight="180px"
                svgColor="#969696"
                canvasHeight="80"
                canvasId="userChart"
            />
        </x-card>
    </div>
</div>
<div class="row mt-4 mb-4">
    <div class="col-xl-12">
        <x-branch-cards.branch-card id="branchCard">
            <div class="row">
                <div class="col-xl-12 head-init">
                    <span class="head-skeletone">
                        <span class="svg_icon_branch"><svg id="Layer_1" data-name="Layer 1" width="25" height="15" viewBox="0 0 122.88 104.01"><path fill="#2e42cb7d" d="M0,13.86a6,6,0,1,1,12.06,0V91.94H116.85a6,6,0,0,1,0,12.07H0V13.86ZM101.9,7.15l-3-3.88a2,2,0,0,1-.43-1.89C99-.19,100.8,0,102.09.05c3.65.26,11.72.84,13.6.91a2,2,0,0,1,2,2.49c-.38,1.9-1.59,10.55-2.22,14-.22,1.2-.58,2.77-2.11,2.88a2,2,0,0,1-1.72-.87l-3-3.88-1.23-1.56L92.39,25.41v.26a9.06,9.06,0,0,1-18.12,0c0-.2,0-.4,0-.6L63.78,17.48A9.05,9.05,0,0,1,52.85,17l-10.2,7.26A9.2,9.2,0,0,1,43,26.6a9,9,0,1,1-5.39-8.29l12-8.54A9.06,9.06,0,0,1,67.67,10c0,.2,0,.4,0,.59l10.51,7.6a9.06,9.06,0,0,1,10.55.15L102.48,7.89l-.58-.74Zm-.09,23.38H114.3a1.31,1.31,0,0,1,1.31,1.3V80.37a1.32,1.32,0,0,1-1.31,1.31H101.81a1.31,1.31,0,0,1-1.31-1.31V31.83a1.31,1.31,0,0,1,1.31-1.3ZM77.09,47.16H89.58a1.31,1.31,0,0,1,1.31,1.31v31.9a1.32,1.32,0,0,1-1.31,1.31H77.09a1.31,1.31,0,0,1-1.31-1.31V48.47a1.31,1.31,0,0,1,1.31-1.31ZM52.36,30.53h12.5a1.3,1.3,0,0,1,1.3,1.3V80.37a1.32,1.32,0,0,1-1.3,1.31H52.36a1.32,1.32,0,0,1-1.31-1.31V31.83a1.31,1.31,0,0,1,1.31-1.3ZM27.64,49.84H40.13a1.31,1.31,0,0,1,1.31,1.31V80.37a1.32,1.32,0,0,1-1.31,1.31H27.64a1.31,1.31,0,0,1-1.31-1.31V51.15a1.31,1.31,0,0,1,1.31-1.31Z"/></svg></span>
                        Branch Information
                    </span>
                </div>
                @foreach($branch_log_session_data as $branchId => $rolesGroup)
                    @php
                        $firstSession = $rolesGroup->first();
                    @endphp
    
                    <div class="branch-card-skeletone" id="branchInfo">
                        <span class="chart-svg-three chart-svg-display svg_chart_body">
                            <svg version="1.1" id="Layer_1" width="100%" height="95px" fill="#969696" x="0px" y="0px" viewBox="0 0 122.88 101.91" style="enable-background:new 0 0 122.88 101.91" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M3.34,0h116.2c1.84,0,3.34,1.5,3.34,3.34v76.98c0,1.84-1.5,3.34-3.34,3.34H3.34C1.5,83.66,0,82.16,0,80.32 V3.34C0,1.5,1.5,0,3.34,0L3.34,0L3.34,0z M91.58,27.97L102.08,28c-0.01,2.8-1.14,5.48-3.13,7.45c-0.47,0.46-0.99,0.88-1.54,1.25 L91.58,27.97L91.58,27.97L91.58,27.97z M31.13,19.72h3.2c0.17,0,0.31,0.14,0.31,0.31v11.4c0,0.17-0.14,0.31-0.31,0.31h-3.2 c-0.17,0-0.31-0.14-0.31-0.31v-11.4C30.82,19.86,30.96,19.72,31.13,19.72L31.13,19.72z M16.65,15.87h3.2 c0.17,0,0.31,0.14,0.31,0.31v15.26c0,0.17-0.14,0.31-0.31,0.31h-3.2c-0.17,0-0.31-0.14-0.31-0.31V16.18 C16.34,16.01,16.48,15.87,16.65,15.87L16.65,15.87z M23.89,13.7h3.2c0.17,0,0.31,0.14,0.31,0.31v17.43c0,0.17-0.14,0.31-0.31,0.31 h-3.2c-0.17,0-0.31-0.14-0.31-0.31V14.01C23.58,13.84,23.72,13.7,23.89,13.7L23.89,13.7z M16.84,61.37c-0.7,0-1.26-0.57-1.26-1.28 c0-0.7,0.57-1.28,1.26-1.28h89.41c0.7,0,1.26,0.57,1.26,1.28c0,0.7-0.57,1.28-1.26,1.28H16.84L16.84,61.37z M16.63,52.07 c-0.7,0-1.26-0.57-1.26-1.28c0-0.7,0.57-1.28,1.26-1.28h35.85c0.7,0,1.26,0.57,1.26,1.28c0,0.7-0.57,1.28-1.26,1.28H16.63 L16.63,52.07z M57.4,52.07c-0.7,0-1.26-0.57-1.26-1.28c0-0.7,0.57-1.28,1.26-1.28h48.85c0.7,0,1.26,0.57,1.26,1.28 c0,0.7-0.57,1.28-1.26,1.28H57.4L57.4,52.07z M16.63,43.76c-0.7,0-1.26-0.57-1.26-1.28c0-0.7,0.57-1.28,1.26-1.28h54.16 c0.7,0,1.26,0.57,1.26,1.28c0,0.7-0.57,1.28-1.26,1.28H16.63L16.63,43.76z M90.5,25.88l-0.56-11.23c-0.01-0.22,0.16-0.41,0.38-0.42 c0.06,0,0.14-0.01,0.23-0.01c0.07,0,0.15,0,0.23,0c3.08-0.03,5.92,1.13,8.03,3.08c2.12,1.95,3.51,4.67,3.73,7.75 c0.02,0.22-0.15,0.41-0.37,0.43l-11.23,0.8c-0.22,0.02-0.41-0.15-0.43-0.37C90.5,25.9,90.5,25.89,90.5,25.88L90.5,25.88L90.5,25.88 z M90.76,15.02l0.52,10.43l10.42-0.74c-0.29-2.7-1.56-5.09-3.44-6.81c-1.97-1.81-4.61-2.9-7.48-2.87L90.76,15.02L90.76,15.02 L90.76,15.02z M89.24,27.48l5.63,9.75c-1.71,0.99-3.65,1.51-5.63,1.51c-6.22,0-11.26-5.04-11.26-11.26c0-5.59,4.1-10.33,9.63-11.14 L89.24,27.48L89.24,27.48z M46.29,88.27h30.3c0.08,5.24,2.24,9.94,8.09,13.63H38.2C42.88,98.51,46.31,94.39,46.29,88.27 L46.29,88.27L46.29,88.27z M61.44,72.41c2.37,0,4.29,1.92,4.29,4.29c0,2.37-1.92,4.29-4.29,4.29c-2.37,0-4.29-1.92-4.29-4.29 C57.15,74.33,59.07,72.41,61.44,72.41L61.44,72.41z M10.05,6.29h102.79c1.63,0,2.95,1.33,2.95,2.95v57.52 c0,1.62-1.33,2.95-2.95,2.95H10.05c-1.62,0-2.95-1.33-2.95-2.95V9.24C7.09,7.62,8.42,6.29,10.05,6.29L10.05,6.29L10.05,6.29z"/></g></svg>
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
                                <ul class="branch-card-body pt-1 mt-3" id="roleLabel-{{ $branchId }}">
                                    @foreach($rolesGroup->unique('role') as $roleItem)
                                        <li class="ps-2" style="display:flex;justify-content:space-between;">
                                            {{ $roleItem->roles->name ?? $roleItem->role }}
                                            <span class="user-amount badge rounded-pill bg-light-blueviolet number-rolling total-user-rolling mb-1" style="color:#000;font-size:11px;font-weight:800;border:1px ridge #87cefabd;" data-target="{{ $roleItem->unique_email_count }}">
                                                {{ $roleItem->unique_email_count }}
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
        </x-branch-cards.branch-card>
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
                label: "Count",
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
    document.addEventListener('DOMContentLoaded', () => {
        const animatedElements = new WeakMap();

        function animateNumber(el, target, duration = 2000) {
            const start = performance.now();

            function step(currentTime) {
                const elapsed = currentTime - start;
                const progress = Math.min(elapsed / duration, 1);
                const current = Math.floor(progress * target);
                el.textContent = current.toLocaleString();

                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            }

            requestAnimationFrame(step);
        }

        function animateProgressBar(el, targetPercent, duration = 2000) {
            el.style.transition = `width ${duration}ms ease`;
            requestAnimationFrame(() => {
                el.style.width = targetPercent + '%';
            });
        }

        function isInViewport(el) {
            const rect = el.getBoundingClientRect();
            return rect.top < window.innerHeight && rect.bottom > 0;
        }

        function triggerIfInView() {
            const allNumberElements = document.querySelectorAll('.number-rolling');

            allNumberElements.forEach(numEl => {
                const container = numEl.closest('.card-body, .storage-row, .storage-card-body, .branch-card-body');
                if (!container) return;

                const isVisible = isInViewport(container);
                const isAnimated = animatedElements.has(container);

                if (isVisible && !isAnimated) {
                    const target = parseFloat(numEl.dataset.target || '0');
                    animateNumber(numEl, target);

                    const progressBar = container.querySelector('.progress-bar');
                    if (progressBar) {
                        const targetPercent = parseFloat(progressBar.getAttribute('aria-valuenow') || '0');
                        progressBar.style.width = '0%'; // reset before animating
                        animateProgressBar(progressBar, targetPercent);
                    }

                    animatedElements.set(container, true);
                } else if (!isVisible && isAnimated) {
                    const progressBar = container.querySelector('.progress-bar');
                    if (progressBar) {
                        progressBar.style.transition = 'none';
                        progressBar.style.width = '0%';
                    }

                    animatedElements.delete(container);
                }
            });
        }

        // Initial trigger and scroll/resize event
        window.addEventListener('scroll', triggerIfInView);
        window.addEventListener('resize', triggerIfInView);
        setTimeout(triggerIfInView, 100); // minor delay to ensure full DOM rendering
    });
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

    function animateProgressBar(el, targetPercent, duration = 3000) {
        el.style.transition = `width ${duration}ms ease-in-out`;
        el.offsetWidth; // trigger reflow
        el.style.width = targetPercent + '%';
    }

    function isInViewport(el) {
        const rect = el.getBoundingClientRect();
        return rect.top < window.innerHeight && rect.bottom > 0;
    }

    const animatedElements = new WeakMap();

    function triggerIfInView() {
        const allNumberElements = document.querySelectorAll('.number-rolling');

        allNumberElements.forEach(numEl => {
            let container = numEl.closest('.card-body') || numEl.closest('.storage-row') || numEl.closest('.storage-card-body') || numEl.closest('.branch-card-body');
            if (!container) return;

            const isVisible = isInViewport(container);
            const isAnimated = animatedElements.has(container);

            if (isVisible && !isAnimated) {
                // Animate number
                const target = parseFloat(numEl.getAttribute('data-target'));
                animateNumber(numEl, target);

                // Animate progress bar
                const progressBar = container.querySelector('.progress-bar');
                if (progressBar) {
                    const targetPercent = parseFloat(progressBar.getAttribute('aria-valuenow'));
                    animateProgressBar(progressBar, targetPercent);
                }

                animatedElements.set(container, true);
            } else if (!isVisible && isAnimated) {
                // Reset progress bar width when scrolled out
                const progressBar = container.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.transition = 'none';
                    progressBar.style.width = '0%';
                }

                animatedElements.delete(container);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', triggerIfInView);
    window.addEventListener('scroll', triggerIfInView);
</script> -->
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