<div class="col-xl-6">
    <div class="card ord_card">
        <div class="card-body order_pie_chart_bg supplier-chart-focus skeleton">
            <canvas id="mySupplierPie_chart"></canvas>
        </div>
    </div>
    <span class="tol_ord skeleton capsule-skeleton mt-1 ps-1">{{__('translate.Fig : Supplier Pie Chart')}}</span>
</div>

@push('scripts')
<script>
    var totalSupplierCounts = {{ $total_supplier_counts }};
    var activeSupplierCounts = {{ $active_supplier_counts }};
    var inactiveSupplierCounts = {{ $inactive_supplier_counts }};

    function updateChartData(total, active, inactive) {
        myPieChart.data.datasets[0].data = [total, active, inactive];
        myPieChart.update();
    }

    // Initial chart setup
    var ctx = document.getElementById("mySupplierPie_chart").getContext("2d");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Total Supplier", "Total Active Supplier", "Total Inactive Supplier"],
            datasets: [{
            data: [totalSupplierCounts, activeSupplierCounts, inactiveSupplierCounts],
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