@if($user_log_data_table_permission == 1)
<!-- ==== User-Details-Graph ======= -->
<div class="row drag-row">
    <?php
        $titles = [
            'total_users' => ['label' => 'Total-Users', 'bg' => 'group-card card-light-bg', 'icolor' => '#0A5EDB', 'loader' => 'total-user-cricle-bar', 'progressbg' => '#0A5EDB', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar', 'dragId' => 'card-1', 'dragged' => 'true', 'columnId' => 'column-1'],
            'authentic_users' => ['label' => 'Authentic Users', 'bg' => 'group-card card-light-bg', 'icolor' => '#198754', 'loader' => 'authentic-cricle-bar', 'progressbg' => 'bg-success', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar', 'dragId' => 'card-2', 'dragged' => 'true', 'columnId' => 'column-2'],
            'inactive_users' => ['label' => 'Inactive Users', 'bg' => 'group-card card-light-bg', 'icolor' => '#dc3545', 'loader' => 'inactive-cricle-bar', 'progressbg' => 'bg-danger', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar', 'dragId' => 'card-3', 'dragged' => 'true', 'columnId' => 'column-3'],
            'activity_users' => ['label' => 'Log Activity Count', 'bg' => 'group-card card-light-bg', 'icolor' => '#6f42c1', 'loader' => 'activity-cricle-bar', 'progressbg' => 'bg-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar', 'dragId' => 'card-4', 'dragged' => 'true', 'columnId' => 'column-4'],
        ]; 
    ?>
    @foreach($titles as $key => $data)
        <div class="col-xl-3 drag-column" id="{{ $data['columnId'] }}">
            <x-Cards.MiniCard drag="{{ $data['dragged'] }}" cardId="{{ $data['dragId'] }}"
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
<x-BigCard>
    <div class="row mt-4">
        <div class="col-xl-6">
            <x-Cards.StorageCard cardBg="" borderStyle="border-style">
                <x-Cards.StorageCardHeader cardHeadTitile="Users Storage" iconColor="#2e42cb" />
                <?php
                    $roles = [
                        'super_admin' => ['label' => 'Super-Admin Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar scrolling'],
                        'admin' => ['label' => 'Admin Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar scrolling'],
                        'sub_admin' => ['label' => 'Sub-Admin Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar scrolling'],
                        'accounts' => ['label' => 'Accounts Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar scrolling'],
                        'marketing' => ['label' => 'Marketing Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar scrolling'],
                        'delivery_team' => ['label' => 'Delivery Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar scrolling'],
                        'users' => ['label' => 'General Users', 'bg' => 'bg-light-blueviolet', 'number-animation-key' => 'number-rolling', 'number-animation' => 'total-user-rolling', 'progress-bar-animation-query-selector' => 'progress-bar scrolling'],
                    ]; 
                ?>
                @foreach($roles as $key => $data)
                    <x-Cards.StorageCardBody
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
                <x-Cards.StorageCardFooter 
                    title="Total Users"
                    count="{{ $miniCardData['total_users'] }}"
                    progressbarbg="bg-light-blueviolet"
                    textPercentageProgress="text-progress-percentage"
                    percentage="{{ round($totalPercentageVlaue) }}"
                    numberAmountClass="user-amount" 
                    badgeClass="badge"
                    badgeRoundedClass="rounded-pill"
                    textNumberClass="text-number-count"
                    storageCapacity="{{$storage}}"
                    progrssQuerySelector="progress-bar"
                    numberKey="number-rolling"
                    numberCount="total-user-rolling"
                    
                />
            </x-Cards.StorageCard>
        </div>
        <div class="col-xl-6">
            <x-ChartCards.ChartCard cardBg="" borderStyle="border-style" id="orderChart">
                <x-ChartCards.ChartActivityCardHeader 
                    cardHeadSkeletone="head-skeletone"
                    loaderSkeletone="loader_skeleton"
                    iconColor="#2e42cb7d"
                    title="User Activity Count Line Chart ( Current Time )"
                    loaderId="loader_orderChart"
                    textAlign="center"
                />
                <x-ChartCards.ChartCardBody
                    cardBodySkeletone="chart-body-skeletone"
                    cardBodyBg=""
                    borderStyle="border-style"
                    cardBodyAnimation="user-activities--month-bar-chart"
                    svgId="svgIcon"
                    svgClass="chart-svg"
                    svgWidth="100%"
                    svgHeight="100px"
                    svgColor="#969696"
                    canvasHeight="110"
                    canvasId="userActivityChart"
                />
            </x-ChartCards.ChartCard>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <x-ChartCards.ChartCard cardBg="" borderStyle="border-style" id="orderChart">
                <x-ChartCards.ChartCardHeader 
                    cardTopBorder="dotted"
                    cardHeadSkeletone="head-skeletone"
                    loaderSkeletone="loader_skeleton"
                    iconColor="#2e42cb7d"
                    title="Total User Acivities Bar Chart ( Current Month )"
                    loaderId="loader_acivityChart"
                    textAlign="center"
                />
                <x-ChartCards.ChartCardBody
                    cardBodySkeletone="body-skeletone"
                    cardBodyBg=""
                    borderStyle="border-style"
                    cardBodyAnimation="user-activities--week-chart"
                    svgId="svgIcon2"
                    svgClass="chart-svg-two"
                    svgWidth="100%"
                    svgHeight="95px"
                    svgColor="#969696"
                    canvasHeight="80"
                    canvasId="userChart"
                />
            </x-ChartCards.ChartCard>
        </div>
    </div>
</x-BigCard>
<div class="row mt-4 mb-4">
    <div class="col-xl-12">
        <x-BranchCards.BranchCard id="branchCard">
            <div class="row">
                <div class="col-xl-12 head-init">
                    <span class="head-skeletone">
                        <span class="svg_icon_branch"><svg id="Layer_1" data-name="Layer 1" width="25" height="15" viewBox="0 0 122.88 104.01"><path fill="#2e42cb7d" d="M0,13.86a6,6,0,1,1,12.06,0V91.94H116.85a6,6,0,0,1,0,12.07H0V13.86ZM101.9,7.15l-3-3.88a2,2,0,0,1-.43-1.89C99-.19,100.8,0,102.09.05c3.65.26,11.72.84,13.6.91a2,2,0,0,1,2,2.49c-.38,1.9-1.59,10.55-2.22,14-.22,1.2-.58,2.77-2.11,2.88a2,2,0,0,1-1.72-.87l-3-3.88-1.23-1.56L92.39,25.41v.26a9.06,9.06,0,0,1-18.12,0c0-.2,0-.4,0-.6L63.78,17.48A9.05,9.05,0,0,1,52.85,17l-10.2,7.26A9.2,9.2,0,0,1,43,26.6a9,9,0,1,1-5.39-8.29l12-8.54A9.06,9.06,0,0,1,67.67,10c0,.2,0,.4,0,.59l10.51,7.6a9.06,9.06,0,0,1,10.55.15L102.48,7.89l-.58-.74Zm-.09,23.38H114.3a1.31,1.31,0,0,1,1.31,1.3V80.37a1.32,1.32,0,0,1-1.31,1.31H101.81a1.31,1.31,0,0,1-1.31-1.31V31.83a1.31,1.31,0,0,1,1.31-1.3ZM77.09,47.16H89.58a1.31,1.31,0,0,1,1.31,1.31v31.9a1.32,1.32,0,0,1-1.31,1.31H77.09a1.31,1.31,0,0,1-1.31-1.31V48.47a1.31,1.31,0,0,1,1.31-1.31ZM52.36,30.53h12.5a1.3,1.3,0,0,1,1.3,1.3V80.37a1.32,1.32,0,0,1-1.3,1.31H52.36a1.32,1.32,0,0,1-1.31-1.31V31.83a1.31,1.31,0,0,1,1.31-1.3ZM27.64,49.84H40.13a1.31,1.31,0,0,1,1.31,1.31V80.37a1.32,1.32,0,0,1-1.31,1.31H27.64a1.31,1.31,0,0,1-1.31-1.31V51.15a1.31,1.31,0,0,1,1.31-1.31Z"/></svg></span>
                        Branch Information
                    </span>
                </div>
                @foreach($branch_log_session_data as $branchId => $rolesGroup)
                    <?php 
                        $firstSession = $rolesGroup->first();
                    ?>
    
                    <div class="branch-card-skeletone" id="branchInfo">
                        <span class="chart-svg-three chart-svg-display svg_chart_body">
                            <svg version="1.1" id="Layer_1" width="100%" height="95px" fill="#969696" x="0px" y="0px" viewBox="0 0 122.88 101.91" style="enable-background:new 0 0 122.88 101.91" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M3.34,0h116.2c1.84,0,3.34,1.5,3.34,3.34v76.98c0,1.84-1.5,3.34-3.34,3.34H3.34C1.5,83.66,0,82.16,0,80.32 V3.34C0,1.5,1.5,0,3.34,0L3.34,0L3.34,0z M91.58,27.97L102.08,28c-0.01,2.8-1.14,5.48-3.13,7.45c-0.47,0.46-0.99,0.88-1.54,1.25 L91.58,27.97L91.58,27.97L91.58,27.97z M31.13,19.72h3.2c0.17,0,0.31,0.14,0.31,0.31v11.4c0,0.17-0.14,0.31-0.31,0.31h-3.2 c-0.17,0-0.31-0.14-0.31-0.31v-11.4C30.82,19.86,30.96,19.72,31.13,19.72L31.13,19.72z M16.65,15.87h3.2 c0.17,0,0.31,0.14,0.31,0.31v15.26c0,0.17-0.14,0.31-0.31,0.31h-3.2c-0.17,0-0.31-0.14-0.31-0.31V16.18 C16.34,16.01,16.48,15.87,16.65,15.87L16.65,15.87z M23.89,13.7h3.2c0.17,0,0.31,0.14,0.31,0.31v17.43c0,0.17-0.14,0.31-0.31,0.31 h-3.2c-0.17,0-0.31-0.14-0.31-0.31V14.01C23.58,13.84,23.72,13.7,23.89,13.7L23.89,13.7z M16.84,61.37c-0.7,0-1.26-0.57-1.26-1.28 c0-0.7,0.57-1.28,1.26-1.28h89.41c0.7,0,1.26,0.57,1.26,1.28c0,0.7-0.57,1.28-1.26,1.28H16.84L16.84,61.37z M16.63,52.07 c-0.7,0-1.26-0.57-1.26-1.28c0-0.7,0.57-1.28,1.26-1.28h35.85c0.7,0,1.26,0.57,1.26,1.28c0,0.7-0.57,1.28-1.26,1.28H16.63 L16.63,52.07z M57.4,52.07c-0.7,0-1.26-0.57-1.26-1.28c0-0.7,0.57-1.28,1.26-1.28h48.85c0.7,0,1.26,0.57,1.26,1.28 c0,0.7-0.57,1.28-1.26,1.28H57.4L57.4,52.07z M16.63,43.76c-0.7,0-1.26-0.57-1.26-1.28c0-0.7,0.57-1.28,1.26-1.28h54.16 c0.7,0,1.26,0.57,1.26,1.28c0,0.7-0.57,1.28-1.26,1.28H16.63L16.63,43.76z M90.5,25.88l-0.56-11.23c-0.01-0.22,0.16-0.41,0.38-0.42 c0.06,0,0.14-0.01,0.23-0.01c0.07,0,0.15,0,0.23,0c3.08-0.03,5.92,1.13,8.03,3.08c2.12,1.95,3.51,4.67,3.73,7.75 c0.02,0.22-0.15,0.41-0.37,0.43l-11.23,0.8c-0.22,0.02-0.41-0.15-0.43-0.37C90.5,25.9,90.5,25.89,90.5,25.88L90.5,25.88L90.5,25.88 z M90.76,15.02l0.52,10.43l10.42-0.74c-0.29-2.7-1.56-5.09-3.44-6.81c-1.97-1.81-4.61-2.9-7.48-2.87L90.76,15.02L90.76,15.02 L90.76,15.02z M89.24,27.48l5.63,9.75c-1.71,0.99-3.65,1.51-5.63,1.51c-6.22,0-11.26-5.04-11.26-11.26c0-5.59,4.1-10.33,9.63-11.14 L89.24,27.48L89.24,27.48z M46.29,88.27h30.3c0.08,5.24,2.24,9.94,8.09,13.63H38.2C42.88,98.51,46.31,94.39,46.29,88.27 L46.29,88.27L46.29,88.27z M61.44,72.41c2.37,0,4.29,1.92,4.29,4.29c0,2.37-1.92,4.29-4.29,4.29c-2.37,0-4.29-1.92-4.29-4.29 C57.15,74.33,59.07,72.41,61.44,72.41L61.44,72.41z M10.05,6.29h102.79c1.63,0,2.95,1.33,2.95,2.95v57.52 c0,1.62-1.33,2.95-2.95,2.95H10.05c-1.62,0-2.95-1.33-2.95-2.95V9.24C7.09,7.62,8.42,6.29,10.05,6.29L10.05,6.29L10.05,6.29z"/></g></svg>
                        </span>
                        <div class="row font-gray-700 data-head">
                            <div class="col-xl-3"><span>{{ $firstSession->users->branch_name ?? 'N/A' }}</span></div>
                            <div class="col-xl-3"><span class="ms-4">Role</span></div>
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
                                            <span class="user-amount badge rounded-pill bg-light-blueviolet mb-1" style="color:#000;font-size:11px;font-weight:800;border:1px ridge #87cefabd;" data-target="{{ $roleItem->unique_email_count }}">
                                                {{ $roleItem->unique_email_count }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xl-6">
                                <ul class="pt-1 mt-1" id="branchChart">
                                    <li>
                                        <div class="card card-body border-style"  style="width: 100% !important; height: 150px;">
                                            <canvas id="branchInfoChart_{{ $branchId }}" height="80"></canvas>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card card-body border-style">
                                    @php
                                        $stats = $formattedBranchStats[$branchId] ?? null;
                                    @endphp

                                    @if ($stats)
                                        <div class="marque-area">
                                            <span class="--parent-class-scrol-plate">
                                                <span class="--child-class-scrol-plate">Total Activity: {{ $stats['total_activity'] }}.00</span>
                                                <span class="--child-class-scrol-plate">&#x237D;Total Login: {{ $stats['total_login'] }}.00</span>
                                                <span class="--child-class-scrol-plate">&#x237D;Total Logout: {{ $stats['total_logout'] }}.00</span>
                                                <span class="--child-class-scrol-plate">&#x237D;Total Current-Login: {{ $stats['total_current_login'] }}.00</span>
                                            </span>
                                        </div>
                                    @endif
                                    <div class="bar-chart">
                                        <div class="--chartanimation" style="width: 100% !important; height: 90px;">
                                            <svg id="chart_{{ $branchId }}" width="100%" height="120" fill="none" viewBox="0 0 1000 120"style="border: none;overflow: hidden;path {fill: none;stroke-width: 2;}">
                                            <path class="line-0" />
                                            <path class="line-1" />
                                            <path class="line-2" />
                                            <path class="line-3" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-BranchCards.BranchCard>
    </div>
</div>
<!-- <svg id="chart" width="500" height="200" viewBox="0 0 600 300" style="border:1px solid #ccc;path {
    fill: none;
    stroke: #007bff;
    stroke-width: 1;
    stroke-linecap: round;
  }">
  <path id="animatedPath" />
</svg> -->
<!-- <svg id="chart" width="100%" height="110" fill="none" viewBox="0 0 1000 110"style="border: 1px solid #ccc;
    background: #f9f9f9;
    overflow: hidden;path {
    fill: none;
    stroke-width: 2;
}">
  <path class="line-0" />
  <path class="line-1" />
  <path class="line-2" />
  <path class="line-3" />
</svg> -->
<!-- <svg id="cruveChart" viewBox="0 0 800 50" fill="rgba(0,123,255,0.2)" style="border: 1px solid #ccc;
    background: #f9f9f9;
    overflow: hidden;path {
    fill: none;
    stroke-width: 2.5;display: block;margin: none;">
  <rect x="0" y="0" width="800" height="50" fill="white" />
</svg> -->
@push('scripts')
<!-- first Chart Graphp -->
<script type="module">
    // hover plugins
    import { hoverGridPlugin, dottedGridPlugin, axisCursorPlugin, axisTooltipTextPlugin} from "/plugins/plugins-min.js";
    const ctxUserActivityChart = document.getElementById("userActivityChart").getContext("2d");
    var gradientColor = ctxUserActivityChart.createLinearGradient(0, 0, 0, 400);
    gradientColor.addColorStop(0, '#6ec6ff');  // orange at top rgb(142, 229, 255) 
    gradientColor.addColorStop(1, 'rgb(138, 65, 255)'); // transparent at bottom rgba(185, 185, 185, 0)
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
    import { hoverGridPlugin, dottedGridPlugin, axisCursorPlugin, axisTooltipTextPlugin} from "/plugins/plugins-min.js";
    // Get the canvas context
    const ctx2 = document.getElementById("userChart").getContext("2d");

    const xValues = [
        "Super admin", "Admin", "Sub admin", "Accounts", "Marketing", "Delivery", "General",
        "Inactive","Authentic","Activity","Total Users"
    ];
    const barColors = ["#6ec6ff", "#6ec6ff", "#6ec6ff", "#6ec6ff", "#6ec6ff", "#6ec6ff", "#6ec6ff","#dc3545","#198754","#00b7ae","#384e8b8c"];
    // bg-color:royalblue rgba(23, 100, 109, 0.9)
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
    import { hoverGridPlugin, dottedGridPlugin, axisCursorPlugin, axisTooltipTextPlugin } from "/plugins/plugins-min.js";

    const branchData = @json($branchRoleStats);

    Object.entries(branchData).forEach(([branchId, stats]) => {
        const userCanvas = document.getElementById(`branchInfoChart_${branchId}`).getContext('2d');

        // Create gradients
        const gradientActivity = userCanvas.createLinearGradient(0, 0, 0, 400);
        gradientActivity.addColorStop(0, 'rgba(28, 200, 137, 0.66)');
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
                        backgroundColor: '#6ec6ff',
                        tension: 0.4,
                        order: 2
                    },
                    {
                        type: 'bar',
                        label: 'Logout',
                        data: stats.logout_counts,
                        backgroundColor: '#dc3545',
                        tension: 0.4,
                        order: 3
                    },
                    {
                        type: 'line',
                        label: 'Activity',
                        fill: true,
                        data: stats.activity_counts,
                        backgroundColor: gradientActivity,
                        borderColor: 'rgb(0, 160, 101)',
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
                        backgroundColor: '#4e73df',
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
<!-- number cricle bar and number rolling animation with scrol animation and drag and drop -->
<script type="module">
    import { cricleNumberPlate, numberRolling , triggerIfInView, initializeBarCharts, initScrollProgressBar} from "/module/module-min-js/design-helper-function-min.js";

    // number cricle bar
    const numberClass = '.total-number';
    const cricleBar = '.total-user-cricle-bar, .authentic-cricle-bar, .inactive-cricle-bar, .activity-cricle-bar';
    const percentage = '--percentage';

    // number rolling animation and with scrol animation
    const numberSelector = '.number-rolling';
    const containerSelector = '.card-body, .storage-row, .storage-card-body, .branch-card-body';

    // drag and drop default card
    const row = '.drag-row';
    const column = '.drag-column';
    const cardKey = '.group-card';

    // DOM ready
    document.addEventListener('DOMContentLoaded', () => {
        cricleNumberPlate(numberClass, cricleBar, percentage);
        numberRolling(numberSelector, containerSelector);
        //initDragAndDrop(column, cardKey, row);
    });
    // Scroll animation
    document.addEventListener('scroll', ()=>{
        cricleNumberPlate(numberClass, cricleBar, percentage);
        triggerIfInView(numberSelector, containerSelector);
    });
    // Always re-trigger on fullscreen change
    document.addEventListener('fullscreenchange', () => {
        cricleNumberPlate(numberClass, cricleBar, percentage);
        triggerIfInView(numberSelector, containerSelector);
    });

    // Use jQuery's correct ready syntax
    $(document).ready(function () {
        // scroll progress bar
        const scrollKey = '.scrolling'; //Add dot for class selector
        const ProgressClas = 'progressbar-active';
        initScrollProgressBar(scrollKey, ProgressClas);
    });
    
    initializeBarCharts();
</script>
<!-- demo line chart -->
<!-- <script>
    const dataSets = [
    [10, 60, 30, 90, 50, 100],
    [40, 80, 20, 70, 30, 110],
    [20, 70, 50, 80, 40, 90]
    ];

    let currentIndex = 0;
    const svg = document.getElementById("chart");
    const path = document.getElementById("animatedPath");

    function getSmoothPath(points, width, height, padding = 40) {
    const stepX = (width - 2 * padding) / (points.length - 1);
    const maxY = Math.max(...points);
    const scaledPoints = points.map((y, i) => {
        const x = padding + i * stepX;
        const scaledY = height - padding - (y / maxY) * (height - 2 * padding);
        return [x, scaledY];
    });

    let d = `M ${scaledPoints[0][0]},${scaledPoints[0][1]}`;
    for (let i = 1; i < scaledPoints.length; i++) {
        const [x1, y1] = scaledPoints[i - 1];
        const [x2, y2] = scaledPoints[i];
        const cx = (x1 + x2) / 2;
        d += ` Q ${x1},${y1} ${cx},${(y1 + y2) / 2}`;
    }
    const last = scaledPoints[scaledPoints.length - 1];
    d += ` T ${last[0]},${last[1]}`;
    return d;
    }

    function animateToNextCurve() {
    const currentData = dataSets[currentIndex];
    const nextData = dataSets[(currentIndex + 1) % dataSets.length];

    const d1 = getSmoothPath(currentData, 600, 300);
    const d2 = getSmoothPath(nextData, 600, 300);

    // Animate using SMIL-compatible fallback
    const animate = document.createElementNS("http://www.w3.org/2000/svg", "animate");
    animate.setAttribute("attributeName", "d");
    animate.setAttribute("from", d1);
    animate.setAttribute("to", d2);
    animate.setAttribute("dur", "2s");
    animate.setAttribute("repeatCount", "1");
    path.setAttribute("d", d1);
    path.appendChild(animate);
    animate.beginElement();

    currentIndex = (currentIndex + 1) % dataSets.length;

    // Call again after animation
    setTimeout(animateToNextCurve, 2000);
    }

    // Start animation
    animateToNextCurve();
</script> -->
<!-- correct cruve line chart -->
<!-- <script>
    const svg = document.getElementById("cruveChart");
    const width = svg.viewBox.baseVal.width || svg.clientWidth;
    const height = svg.viewBox.baseVal.height || svg.clientHeight;
    const padding = 40;
    const maxPoints = 60;
    const maxY = 110;
    const lineCount = 4;
    const stepX = (width - padding * 2) / (maxPoints - 1);

    // Create axes
    function drawAxes() {
    // Y-axis
    const yAxis = document.createElementNS("http://www.w3.org/2000/svg", "line");
    yAxis.setAttribute("x1", padding);
    yAxis.setAttribute("y1", padding);
    yAxis.setAttribute("x2", padding);
    yAxis.setAttribute("y2", height - padding);
    yAxis.setAttribute("class", "axis");
    svg.appendChild(yAxis);

    // X-axis
    const xAxis = document.createElementNS("http://www.w3.org/2000/svg", "line");
    xAxis.setAttribute("x1", padding);
    xAxis.setAttribute("y1", height - padding);
    xAxis.setAttribute("x2", width - padding);
    xAxis.setAttribute("y2", height - padding);
    xAxis.setAttribute("class", "axis");
    svg.appendChild(xAxis);

    // Y-axis labels
    for (let i = 0; i <= 5; i++) {
        const yVal = i * (maxY / 5);
        const y = height - padding - (yVal / maxY) * (height - 2 * padding);

        const label = document.createElementNS("http://www.w3.org/2000/svg", "text");
        label.setAttribute("x", padding - 10);
        label.setAttribute("y", y + 4);
        label.setAttribute("text-anchor", "end");
        label.setAttribute("class", "label");
        label.textContent = yVal.toFixed(0);
        svg.appendChild(label);
    }

    // X-axis labels
    for (let i = 0; i < maxPoints; i += 10) {
        const x = padding + i * stepX;
        const label = document.createElementNS("http://www.w3.org/2000/svg", "text");
        label.setAttribute("x", x);
        label.setAttribute("y", height - padding + 15);
        label.setAttribute("text-anchor", "middle");
        label.setAttribute("class", "label");
        label.textContent = `${i}`;
        svg.appendChild(label);
    }
    }

    // Generate starting data
    const lines = Array.from({ length: lineCount }, () =>
        Array.from({ length: maxPoints }, () => Math.random() * 100 + 25)
    );

    // Create path elements
    const paths = [];
    for (let i = 0; i < lineCount; i++) {
        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        path.setAttribute("class", `line-${i}`);
        svg.appendChild(path);
        paths.push(path);
    }

    // Compute smooth line
    function getSmoothPath(data) {
    const scaled = data.map((y, i) => {
        const x = padding + i * stepX;
        const scaledY = height - padding - (y / maxY) * (height - 2 * padding);
        return [x, scaledY];
    });

    let d = `M ${scaled[0][0]},${scaled[0][1]}`;
    for (let i = 1; i < scaled.length - 1; i++) {
        const [x1, y1] = scaled[i];
        const [x2, y2] = scaled[i + 1];
        const midX = (x1 + x2) / 2;
        const midY = (y1 + y2) / 2;
        d += ` Q ${x1},${y1} ${midX},${midY}`;
    }
    return d;
    }

    // Update data & redraw paths
    function updateChart() {
    for (let i = 0; i < lines.length; i++) {
        lines[i].push(Math.random() * 100 + 25); // push new point
        if (lines[i].length > maxPoints) lines[i].shift(); // remove first to scroll left
        const d = getSmoothPath(lines[i]);
        paths[i].setAttribute("d", d);
    }
    }

    // Animate left to right
    function animate() {
    updateChart();
        setTimeout(() => requestAnimationFrame(animate), 600); // adjust speed
    }

    // Run
    drawAxes();
    animate();
</script> -->
<!-- <script>
    const svg = document.getElementById("cruveChart");
    const width = svg.viewBox.baseVal.width || svg.clientWidth;
    const height = svg.viewBox.baseVal.height || svg.clientHeight;
    const padding = 40;
    const maxPoints = 120;
    const stepX = (width - padding * 2) / (maxPoints - 1);
    const baseY = height / 2; // baseline of the ECG

    // ECG pattern data: flat → small up → sharp spike → drop → recover → flat
    const pattern = [
        0, 0, 10, 0, 20, 80, 30, -40, 10, 0, 0, 0
    ]; // Modify this to adjust sharpness

    let data = Array.from({ length: maxPoints }, () => 0);

    // Create ECG path
    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    path.setAttribute("stroke", "#e91e63");
    path.setAttribute("stroke-width", "2");
    path.setAttribute("fill", "none");
    svg.appendChild(path);

    // Draw axes
    function drawAxes() {
        const createLine = (x1, y1, x2, y2) => {
            const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
            line.setAttribute("x1", x1);
            line.setAttribute("y1", y1);
            line.setAttribute("x2", x2);
            line.setAttribute("y2", y2);
            line.setAttribute("stroke", "#ccc");
            line.setAttribute("stroke-width", "1");
            return line;
        };
        svg.appendChild(createLine(padding, padding, padding, height - padding)); // Y-axis
        svg.appendChild(createLine(padding, height - padding, width - padding, height - padding)); // X-axis
    }

    // Update path
    function updatePath() {
        const scaled = data.map((y, i) => {
            const x = padding + i * stepX;
            const yPos = baseY - y;
            return [x, yPos];
        });

        let d = `M ${scaled[0][0]},${scaled[0][1]}`;
        for (let i = 1; i < scaled.length; i++) {
            d += ` L ${scaled[i][0]},${scaled[i][1]}`;
        }

        path.setAttribute("d", d);
    }

    // Animate ECG
    function animate() {
        const next = pattern.shift();  // Take next point from pattern
        pattern.push(next);            // Push it to the end (looping)

        data.push(next);
        if (data.length > maxPoints) data.shift();

        updatePath();
        setTimeout(() => requestAnimationFrame(animate), 150); // speed of animation
    }

    drawAxes();
    animate();
</script> -->
<!-- demo line chart -->
<!-- <script type="module">
  const svg = document.getElementById("chart");
  const width = 800;
  const height = 400;
  const padding = 50;

  const datasets = [
    [20, 40, 30, 60, 50, 90],
    [10, 60, 20, 70, 40, 80],
    [15, 45, 25, 65, 35, 75],
    [5, 35, 20, 50, 30, 60]
  ];

  const colors = ["line-1", "line-2", "line-3", "line-4"];

  const maxY = Math.max(...datasets.flat());
  const scaleX = (width - padding * 2) / (datasets[0].length - 1);
  const scaleY = (height - padding * 2) / maxY;

  datasets.forEach((data, lineIndex) => {
    const scaled = data.map((val, i) => [
      padding + i * scaleX,
      height - padding - val * scaleY
    ]);

    // Create smooth path (cubic Bezier)
    let d = `M ${scaled[0][0]},${scaled[0][1]}`;
    for (let i = 1; i < scaled.length; i++) {
      const [x1, y1] = scaled[i - 1];
      const [x2, y2] = scaled[i];
      const cx = (x1 + x2) / 2;
      d += ` Q ${cx},${y1} ${x2},${y2}`;
    }

    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    path.setAttribute("d", d);
    path.setAttribute("class", colors[lineIndex]);

    // Animate left to right
    const totalLength = path.getTotalLength();
    path.style.strokeDasharray = totalLength;
    path.style.strokeDashoffset = totalLength;
    path.style.animation = "draw-line 3s ease forwards";
    path.style.animationDelay = `${lineIndex * 0.5}s`; // staggered lines

    svg.appendChild(path);

    // Add circles and labels
    scaled.forEach(([x, y], i) => {
      const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
      circle.setAttribute("cx", x);
      circle.setAttribute("cy", y);
      circle.setAttribute("r", 3);
      circle.setAttribute("fill", getComputedStyle(path).stroke);
      svg.appendChild(circle);

      const label = document.createElementNS("http://www.w3.org/2000/svg", "text");
      label.setAttribute("x", x);
      label.setAttribute("y", y - 10);
      label.setAttribute("text-anchor", "middle");
      label.textContent = data[i];
      svg.appendChild(label);
    });
  });
</script> -->
@endPush
@elseif($user_log_data_table_permission == 0)
@include('super-admin.user-details.error.data-table-permission')
@endif