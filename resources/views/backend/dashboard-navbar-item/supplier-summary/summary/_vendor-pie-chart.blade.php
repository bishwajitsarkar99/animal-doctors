<div class="col-xl-6">
    <div class="card ord_card">
        <div class="card-body order_pie_chart_bg supplier-chart-focus skeleton">
            <canvas id="myVendorPie_chart"></canvas>
        </div>
    </div>
    <span class="tol_ord skeleton capsule-skeleton mt-1 ps-1">{{__('translate.Fig : Vendor Pie Chart')}}</span>
</div>

@push('scripts')
<script>
    var totalVendorCounts = {{ $total_vendor_counts }};
    var activeVendorCounts = {{ $active_vendor_counts }};
    var inactiveVendorCounts = {{ $inactive_vendor_counts }};

    function updateVendorChartData(total, active, inactive) {
        myVendorPieChart.data.datasets[0].data = [total, active, inactive];
        myVendorPieChart.update();
    }

    // Initial chart setup
    var vendorCtx = document.getElementById("myVendorPie_chart").getContext("2d");
    var myVendorPieChart = new Chart(vendorCtx, {
        type: 'doughnut',
        data: {
            labels: ["Total Vendor", "Total Active Vendor", "Total Inactive Vendor"],
            datasets: [{
            data: [totalVendorCounts, activeVendorCounts, inactiveVendorCounts],
            backgroundColor: ['#4e73df', '#1cc88a', 'orangered'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', 'orangered'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: false
            },
            cutoutPercentage: 80,
        },
    });

</script>
@endPush