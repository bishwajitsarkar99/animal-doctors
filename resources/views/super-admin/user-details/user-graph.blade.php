<!-- ==== User-Details-Graph ======= -->
<div class="row">
    <div class="col-xl-3">
        <div class="card card-body first-card">
            <div class="card card-head-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Total-Users
                </span>
                <div class="ring-div">
                    <div class="total-user-loader cricale-number-skeleton">
                        <span class="total-number">{{ $total_users }}</span>
                    </div>
                </div>
            </div>
            <div class="progress percentage-skeletone" style="height:0.8rem;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $total_users_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $total_users_percentage }}%;">
                    {{ round($total_users_percentage, 2) }}%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-body second-card">
            <span class="card card-head-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Authentic Users
                </span>
                <div class="ring-div">
                    <div class="authentic-loader cricale-number-skeleton">
                        <span class="total-number">{{ $authentic_users }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.8rem;">
                <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="{{ $authentic_users_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $authentic_users_percentage }}%;">
                    {{ round($authentic_users_percentage, 2) }}%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-body third-card">
            <span class="card card-head-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Inactive Users
                </span>
                <div class="ring-div">
                    <div class="inactive-loader cricale-number-skeleton">
                        <span class="total-number">{{ $inactive_users }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.8rem;">
                <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="{{ $inactive_users_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $inactive_users_percentage }}%;">
                    {{ round($inactive_users_percentage, 2) }}%
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-body four-card">
            <span class="card card-head-title align-items-center justify-content-center">
                <span class="align-items-left justify-content-left head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Log Activity Of Users
                </span>
                <div class="ring-div">
                    <div class="activity-loader cricale-number-skeleton">
                        <span class="total-number">{{ $activity_users }}</span>
                    </div>
                </div>
            </span>
            <div class="progress percentage-skeletone" style="height:0.8rem;">
                <div class="progress-bar progress-bar-striped bg-blueviolet progress-bar-animated" role="progressbar" aria-valuenow="{{ $activity_users_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($activity_users_percentage, 2) }}%;">
                    {{ round($activity_users_percentage, 2) }}%
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-xl-6">
        <div class="card card-body five-card">
            <span class="card-head-title" style="border-bottom: 1px solid rgba(0, 0, 0, 0.175);">
                <span class="head-skeletone">
                    <i class="fa-solid fa-layer-group"></i>
                    Users Summary
                </span>
            </span>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Super-Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" aria-valuenow="{{ round($percentageRoles['super_admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['super_admin'], 2) }}%;">
                            {{ round($percentageRoles['super_admin'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['super_admin']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" aria-valuenow="{{ round($percentageRoles['admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['admin'], 2) }}%;">
                            {{ round($percentageRoles['admin'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['admin']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Sub-Admin Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" aria-valuenow="{{ round($percentageRoles['sub_admin'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['sub_admin'], 2) }}%;">
                            {{ round($percentageRoles['sub_admin'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['sub_admin']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Accounts Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['accounts'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['accounts'], 2) }}%;">
                            {{ round($percentageRoles['accounts'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['accounts']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Marketing Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['marketing'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['marketing'], 2) }}%;">
                            {{ round($percentageRoles['marketing'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['marketing']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">Delivery Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" style="width:20%" aria-valuenow="{{ round($percentageRoles['delivery_team'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['delivery_team'], 2) }}%;">
                            {{ round($percentageRoles['delivery_team'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['delivery_team']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone">General Users</span>
                </div>
                <div class="col-xl-6">
                    <div class="progress percentage-skeletone mt-2" style="height:0.8rem;">
                        <div class="progress-bar progress-bar-striped bg-royalblue progress-bar-animated" role="progressbar" aria-valuenow="{{ round($percentageRoles['users'], 2) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round($percentageRoles['users'], 2) }}%;">
                            {{ round($percentageRoles['users'], 2) }}%
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <span class="user-amount badge rounded-pill bg-primary result-skeletone pt-1">{{ $usersCount['users']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <span class="login-user-title percentage-skeletone" style="color: royalblue;">Total Users</span>
                </div>
                <div class="col-xl-6"></div>
                <div class="col-xl-2">
                    <span class="login-user-title sub_total_user total-number-skeletone pt-1">{{ $total_users }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card order_line_chart" id="orderChart">
            <div class="card-header staticrept ps-2" style="text-align:center;">
                <span class="card-head-title head-skeletone">
                    <i class="fa-solid fa-layer-group"></i> 
                    Total Users Bar Chart
                </span>
                <div class="loader_skeleton" id="loader_orderChart"></div>
            </div>
            <div class="card card-body third-card body-skeletone">
                <canvas id="userChart" width="100%" height="35"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
const xValues = ["Super admin", "Admin", "Sub admin", "Accounts", "Marketing", "Delivery", "General user"];
const barColors = ["royalblue","royalblue","royalblue","royalblue","royalblue","royalblue","royalblue"];

// Pass the PHP array to JavaScript
const userCounts = @json(array_values($usersCount));

new Chart("userChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
    data: userCounts,
      borderColor: "red",
      backgroundColor: barColors,
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>
@endPush