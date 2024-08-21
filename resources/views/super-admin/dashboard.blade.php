@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<div class="row">
    @include('backend.layouts.dashboard-area-parts._dashboard-main-result')
</div>
<!-- =========== SUMMARY HEAD ============= -->
<section>
    <ol class="breadcrumb ps-2 business_summary">
        <li class="smy tp text-shadow">{{__('translate.Statistical Summary Of Business')}} </li>
    </ol>
</section>
<div class="row">

    <div class="col-xl-12">
        @include('backend.layouts.dashboard-area-parts._order-area-part')
    </div>
    
    <div class="col-xl-12">
        @include('backend.layouts.dashboard-area-parts._sales-area-part')
    </div>
    <div class="col-xl-12">
        @include('backend.layouts.dashboard-area-parts._expenses-area-part')
    </div>
    <div class="col-xl-12">
        @include('backend.layouts.dashboard-area-parts._product-summary')
    </div>

</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
@endsection

@section('script')
@include('backend.layouts.dashboard-area-parts.order-area-body-parts.handler-ajax._order-handler')
@include('backend.layouts.dashboard-area-parts.sales-area-body-parts.handler-ajax._sales-handler')
@include('backend.layouts.dashboard-area-parts.expenses-area-body-parts.handler-ajax._expenses-handler')
<script type="text/javascript">
    // Plugin Result PieChart in Ajax ================== -->
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Count'],
            ['Products', {{ $product_counts }}],
            ['Categories', {{ $category_counts }}],
            ['Sub-Categories', {{ $subCategory_counts }}],
            ['Brands', {{ $brand_counts }}]
        ]);

        var options = {
            title: 'Product Position is given below - ',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    // init skeleton
    function initSkeleton(){
        const  allSkeleton = document.querySelectorAll('.init-skeleton')
    
        allSkeleton.forEach(item=>{
            item.classList.remove('init-skeleton')
        });
    }
    // cricale skeleton
    function cricaleSkeleton(){
        const  allSkeleton = document.querySelectorAll('.cricale-skeleton')
    
        allSkeleton.forEach(item=>{
            item.classList.remove('cricale-skeleton')
        });
    }
    // amount skeleton
    function amountSkeleton(){
        const  allSkeleton = document.querySelectorAll('.amount-skeleton')
    
        allSkeleton.forEach(item=>{
            item.classList.remove('amount-skeleton')
        });
    }
    // progress bar skeleton
    function progressBarSkeleton(){
        const  allSkeleton = document.querySelectorAll('.progress-bar-skeleton')
    
        allSkeleton.forEach(item=>{
            item.classList.remove('progress-bar-skeleton')
        });
    }
    // skeleton 
    function fetchData(){
        const  allSkeleton = document.querySelectorAll('.skeleton')
    
        allSkeleton.forEach(item=>{
            item.classList.remove('skeleton')
        });
    }

    setTimeout(() => {
        fetchData();
        initSkeleton();
        cricaleSkeleton();
        amountSkeleton();
        progressBarSkeleton();
    }, 1000);
</script>
<script> 
    $(document).ready(function() {
        //Monthly Order
        $('#date_id').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#date_exid').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        //Pending Order
        $('#start_date').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_date').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        // Monthly Sales 
        $('#start_sales_date').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_sales_date').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        //Pending Sales
        $('#start_pending_sales').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_pending_sales').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        //Monthly Expenses
        $('#start_monthly_expenses').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_monthly_expenses').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        //Pending Expenses
        $('#start_pending_expenses').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_pending_expenses').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
    });
</script>
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
@endsection