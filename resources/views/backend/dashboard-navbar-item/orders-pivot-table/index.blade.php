@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<section class="order-tab">
    <div class="expenses-bar expenses-bg-color">
        <button class="tablinkorder " onclick="openorderLink(event,'order_summary')" id="order_active">{{__('translate.Order Summary')}}</button>
        <button class="tablinkorder " onclick="openorderLink(event,'order_details')" id="order_inactive">{{__('translate.Order Position')}}</button>
    </div>

    <div id="order_summary" class="ord">
        <div class="row">
            <!-- ================= Order Summary View ================== -->
            <h5 class="ord_summ skeleton mt-1 ms-2">{{__('translate.Monthly Product Order View')}}</h5>
            @include('backend.dashboard-navbar-item.orders-pivot-table.pivot-table._order-summary-view')
            @include('backend.dashboard-navbar-item.orders-pivot-table.order-chart._order-summary-line-chart')
        </div>
        <div class="row">
            <div class="col-xl-8 mb-1">
                <!-- <span class="tol_ord mt-1 ps-1">
                    <label for="expenses">Choose Month :</label>
                    <select name="expenses" id="#" class="select_month">
                        <option value="#">January</option>
                        <option value="#">February</option>
                        <option value="#">March</option>
                        <option value="#">April</option>
                        <option value="#">May</option>
                        <option value="#">June</option>
                        <option value="#">July</option>
                        <option value="#">August</option>
                        <option value="#">Septembar</option>
                        <option value="#">Octobar</option>
                        <option value="#">November</option>
                        <option value="#">December</option>
                    </select>
                </span> -->
                <span class="tol_ord mt-1">
                    <label for="expenses" class="text-success skeleton">{{__('translate.Start Date')}} :</label>
                    <input id="start_ord_date" type="text" class="select_dateOne" placeholder="DD-MM-YYYY" />
                </span>
                <span class="tol_ord mt-1">
                    <label for="expenses" class="text-success skeleton">{{__('translate.End Date')}} :</label>
                    <input id="end_ord_date" type="text" class="select_dateOne" placeholder="DD-MM-YYYY" />
                </span>
                <button type="submit" class="btn btn-sm btn-success ord_btn ms-3" style="line-height: 0.1;">
                    <i class="search-order-icon fa fa-spinner fa-spin search-order-hidden"></i>
                    <span class="btn-text">Search</span>
                </button>
            </div>
            <!-- ================= Order Category Pie Chart ================== -->
            @include('backend.dashboard-navbar-item.orders-pivot-table.pivot-table._order-category-summary-view')
            @include('backend.dashboard-navbar-item.orders-pivot-table.order-chart._order-category-pie-chart')
        </div>
    </div>
    <div id="order_details" class="ord" style="display: none;">
        <div class="row">
            <!-- ================= Order Position ================== -->
            @include('backend.dashboard-navbar-item.orders-pivot-table.pivot-table._order-position-table')
            @include('backend.dashboard-navbar-item.orders-pivot-table.order-chart._order-monthly-bar-chart')
            <div class="col-xl-8">
                <!-- <span class="tol_ord mt-1 ps-1">
                    <label for="expenses">Choose Month :</label>
                    <select name="expenses" id="#" class="select_month">
                        <option value="#">January</option>
                        <option value="#">February</option>
                        <option value="#">March</option>
                        <option value="#">April</option>
                        <option value="#">May</option>
                        <option value="#">June</option>
                        <option value="#">July</option>
                        <option value="#">August</option>
                        <option value="#">Septembar</option>
                        <option value="#">Octobar</option>
                        <option value="#">November</option>
                        <option value="#">December</option>
                    </select>
                </span> -->
                <span class="tol_ord mt-1">
                    <label for="expenses" class="text-success" id="ord_two_date">{{__('translate.Start Date')}} :</label>
                    <input type="text" class="select_dateOne" placeholder="DD-MM-YYYY" id="start_sales_date">
                </span>
                <span class="tol_ord mt-1">
                    <label for="expenses" class="text-success" id="ord_three_date">{{__('translate.End Date')}} :</label>
                    <input type="text" class="select_dateOne" placeholder="DD-MM-YYYY" id="end_sales_date">
                </span>
                <button type="submit" class="btn btn-sm btn-success ord_ser_btn ms-3" style="line-height: 0.1;">
                    <i class="search-order2-icon fa fa-spinner fa-spin search-order2-hidden"></i>
                    <span class="btn2-text">Search</span>
                </button>
            </div>
        </div>
        <div class="row mt-1">
            <!-- ================= Order Position Details ================== -->
            @include('backend.dashboard-navbar-item.orders-pivot-table.pivot-table._order-position-details')
        </div>

    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/pivot-table-css/order-pivot.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/pivot-table-css/order-page-focus-css/silver.css" id="dashboardOrderURL">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
@endsection

@section('script')
<script src="{{asset('backend_asset')}}/main_asset/demo/order-pivot-pie_chart.js"></script>
<script src="{{asset('backend_asset')}}/main_asset/demo/order-pivot-bar-chart.js"></script>
<script src="{{asset('backend_asset')}}/main_asset/demo/order-chart-line.js"></script>
<script>
    // skeleton
    function fetchData() {
        const allSkeleton = document.querySelectorAll('.skeleton')

        allSkeleton.forEach(item => {
            item.classList.remove('skeleton')
        });
    }

    setTimeout(() => {
        fetchData();
    }, 1000);

    // Search Button Loader
    $(document).ready(function(){
        $(".ord_btn").on('click', () => {
            $('.search-order-icon').removeClass('search-order-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Search...');
            setTimeout(() => {
                $('.search-order-icon').addClass('search-order-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Search');
            }, 3000);
        });
    });
    // Search Button2 Loader
    $(document).ready(function(){
        $(".ord_ser_btn").on('click', () => {
            $('.search-order2-icon').removeClass('search-order2-hidden');
            $(this).attr('disabled', true);
            $('.btn2-text').text('Search...');
            setTimeout(() => {
                $('.search-order2-icon').addClass('search-order2-hidden');
                $(this).attr('disabled', false);
                $('.btn2-text').text('Search');
            }, 3000);
        });
    });

    // skeleton-children
    $(document).ready(function() {
        $("#order_inactive").on('click', function() {
            //position
            $("#sales_record").addClass('skeleton');
            $("#sales_tr").addClass('skeleton');
            $("#sales_td").addClass('skeleton');
            $("#sales_td2").addClass('skeleton');
            $("#sales_td3").addClass('skeleton');
            $("#sales_td4").addClass('skeleton');
            $("#sales_td5").addClass('skeleton');
            $("#sales_td6").addClass('skeleton');
            $("#sales_td7").addClass('skeleton');
            $("#sales_td8").addClass('skeleton');
            $("#sales_td9").addClass('skeleton');
            $("#sales_td10").addClass('skeleton');
            $("#sales_td11").addClass('skeleton');
            $("#sales_td12").addClass('skeleton');
            $("#sales_td13").addClass('skeleton');
            $("#sales_td14").addClass('skeleton');
            $("#sales_td15").addClass('skeleton');
            $("#sales_td16").addClass('skeleton');
            $("#sales_td17").addClass('skeleton');
            $("#sales_td18").addClass('skeleton');
            $("#sales_td19").addClass('skeleton');
            $("#sales_td20").addClass('skeleton');
            $("#sales_td21").addClass('skeleton');
            $("#sales_td22").addClass('skeleton');

            // details
            $("#orderdetails").addClass('skeleton');
            $("#bar_chart").addClass('skeleton');
            $("#ord_two_date").addClass('skeleton');
            $("#ord_three_date").addClass('skeleton');
            $("#bar_chart_caption").addClass('skeleton');
            $("#orderdetailsTable").addClass('skeleton');
            $("#orderdetails_tr").addClass('skeleton');
            $("#orderdetails_tr2").addClass('skeleton');
            $("#orderdetails_tr3").addClass('skeleton');
            $("#orderdetails_tr4").addClass('skeleton');
            $("#orderdetails_tr5").addClass('skeleton');
            $("#orderdetails_tr6").addClass('skeleton');
            $("#orderdetails_td").addClass('skeleton');
            $("#orderdetails_td2").addClass('skeleton');
            $("#orderdetails_td3").addClass('skeleton');
            $("#orderdetails_td4").addClass('skeleton');
            $("#orderdetails_td5").addClass('skeleton');
            $("#orderdetails_td6").addClass('skeleton');
            $("#orderdetails_td7").addClass('skeleton');
            $("#orderdetails_td8").addClass('skeleton');
            $("#orderdetails_td9").addClass('skeleton');
            $("#orderdetails_td10").addClass('skeleton');
            $("#orderdetails_td11").addClass('skeleton');
            $("#orderdetails_td12").addClass('skeleton');
            $("#orderdetails_td13").addClass('skeleton');
            $("#orderdetails_td14").addClass('skeleton');
            $("#orderdetails_td15").addClass('skeleton');
            $("#orderdetails_td16").addClass('skeleton');
            $("#orderdetails_td17").addClass('skeleton');
            $("#orderdetails_td18").addClass('skeleton');
            $("#orderdetails_td19").addClass('skeleton');
            $("#orderdetails_td20").addClass('skeleton');
            $("#orderdetails_td21").addClass('skeleton');
            $("#orderdetails_td22").addClass('skeleton');
            $("#orderdetails_td23").addClass('skeleton');
            $("#orderdetails_td24").addClass('skeleton');
            $("#orderdetails_td25").addClass('skeleton');
            $("#orderdetails_td26").addClass('skeleton');
            $("#orderdetails_td27").addClass('skeleton');
            $("#orderdetails_td28").addClass('skeleton');
            $("#orderdetails_td29").addClass('skeleton');
            $("#orderdetails_td30").addClass('skeleton');
            $("#orderdetails_td31").addClass('skeleton');
            $("#orderdetails_td32").addClass('skeleton');
            $("#orderdetails_td33").addClass('skeleton');
            $("#orderdetails_td34").addClass('skeleton');
            $("#orderdetails_td35").addClass('skeleton');
            $("#orderdetails_td36").addClass('skeleton');
            $("#orderdetails_td37").addClass('skeleton');
            $("#orderdetails_td38").addClass('skeleton');
            $("#orderdetails_td39").addClass('skeleton');
            $("#orderdetails_td40").addClass('skeleton');
            $("#orderdetails_td41").addClass('skeleton');
            $("#orderdetails_td42").addClass('skeleton');
            $("#orderdetails_td43").addClass('skeleton');
            $("#orderdetails_td44").addClass('skeleton');
            $("#orderdetails_td45").addClass('skeleton');
            $("#orderdetails_td46").addClass('skeleton');
            $("#orderdetails_td47").addClass('skeleton');
            $("#orderdetails_td48").addClass('skeleton');
            $("#orderdetails_td49").addClass('skeleton');
            $("#orderdetails_td50").addClass('skeleton');
            $("#orderdetails_td51").addClass('skeleton');
            $("#orderdetails_td52").addClass('skeleton');
            $("#orderdetails_td53").addClass('skeleton');
            $("#orderdetails_td54").addClass('skeleton');
            $("#orderdetails_td55").addClass('skeleton');
            $("#orderdetails_td56").addClass('skeleton');
            $("#orderdetails_td57").addClass('skeleton');
            $("#orderdetails_td58").addClass('skeleton');
            $("#orderdetails_td59").addClass('skeleton');
            $("#orderdetails_td60").addClass('skeleton');
            $("#orderdetails_td61").addClass('skeleton');
            $("#orderdetails_td62").addClass('skeleton');
            $("#orderdetails_td63").addClass('skeleton');
            $("#orderdetails_td64").addClass('skeleton');
            $("#orderdetails_td65").addClass('skeleton');
            $("#orderdetails_td66").addClass('skeleton');
            $("#orderdetails_td67").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $("#sales_record").removeClass('skeleton');
                $("#bar_chart").removeClass('skeleton');
                $("#ord_two_date").removeClass('skeleton');
                $("#ord_three_date").removeClass('skeleton');
                $("#bar_chart_caption").removeClass('skeleton');
                $("#sales_tr").removeClass('skeleton');
                $("#sales_td").removeClass('skeleton');
                $("#sales_td2").removeClass('skeleton');
                $("#sales_td3").removeClass('skeleton');
                $("#sales_td4").removeClass('skeleton');
                $("#sales_td5").removeClass('skeleton');
                $("#sales_td6").removeClass('skeleton');
                $("#sales_td7").removeClass('skeleton');
                $("#sales_td8").removeClass('skeleton');
                $("#sales_td9").removeClass('skeleton');
                $("#sales_td10").removeClass('skeleton');
                $("#sales_td11").removeClass('skeleton');
                $("#sales_td12").removeClass('skeleton');
                $("#sales_td13").removeClass('skeleton');
                $("#sales_td14").removeClass('skeleton');
                $("#sales_td15").removeClass('skeleton');
                $("#sales_td16").removeClass('skeleton');
                $("#sales_td17").removeClass('skeleton');
                $("#sales_td18").removeClass('skeleton');
                $("#sales_td19").removeClass('skeleton');
                $("#sales_td20").removeClass('skeleton');
                $("#sales_td21").removeClass('skeleton');
                $("#sales_td22").removeClass('skeleton');

                // details
                $("#orderdetails").removeClass('skeleton');
                $("#orderdetailsTable").removeClass('skeleton');
                $("#orderdetails_tr").removeClass('skeleton');
                $("#orderdetails_tr2").removeClass('skeleton');
                $("#orderdetails_tr3").removeClass('skeleton');
                $("#orderdetails_tr4").removeClass('skeleton');
                $("#orderdetails_tr5").removeClass('skeleton');
                $("#orderdetails_tr6").removeClass('skeleton');
                $("#orderdetails_td").removeClass('skeleton');
                $("#orderdetails_td2").removeClass('skeleton');
                $("#orderdetails_td3").removeClass('skeleton');
                $("#orderdetails_td4").removeClass('skeleton');
                $("#orderdetails_td5").removeClass('skeleton');
                $("#orderdetails_td6").removeClass('skeleton');
                $("#orderdetails_td7").removeClass('skeleton');
                $("#orderdetails_td8").removeClass('skeleton');
                $("#orderdetails_td9").removeClass('skeleton');
                $("#orderdetails_td10").removeClass('skeleton');
                $("#orderdetails_td11").removeClass('skeleton');
                $("#orderdetails_td12").removeClass('skeleton');
                $("#orderdetails_td13").removeClass('skeleton');
                $("#orderdetails_td14").removeClass('skeleton');
                $("#orderdetails_td15").removeClass('skeleton');
                $("#orderdetails_td16").removeClass('skeleton');
                $("#orderdetails_td17").removeClass('skeleton');
                $("#orderdetails_td18").removeClass('skeleton');
                $("#orderdetails_td19").removeClass('skeleton');
                $("#orderdetails_td20").removeClass('skeleton');
                $("#orderdetails_td21").removeClass('skeleton');
                $("#orderdetails_td22").removeClass('skeleton');
                $("#orderdetails_td23").removeClass('skeleton');
                $("#orderdetails_td24").removeClass('skeleton');
                $("#orderdetails_td25").removeClass('skeleton');
                $("#orderdetails_td26").removeClass('skeleton');
                $("#orderdetails_td27").removeClass('skeleton');
                $("#orderdetails_td28").removeClass('skeleton');
                $("#orderdetails_td29").removeClass('skeleton');
                $("#orderdetails_td30").removeClass('skeleton');
                $("#orderdetails_td31").removeClass('skeleton');
                $("#orderdetails_td32").removeClass('skeleton');
                $("#orderdetails_td33").removeClass('skeleton');
                $("#orderdetails_td34").removeClass('skeleton');
                $("#orderdetails_td35").removeClass('skeleton');
                $("#orderdetails_td36").removeClass('skeleton');
                $("#orderdetails_td37").removeClass('skeleton');
                $("#orderdetails_td38").removeClass('skeleton');
                $("#orderdetails_td39").removeClass('skeleton');
                $("#orderdetails_td40").removeClass('skeleton');
                $("#orderdetails_td41").removeClass('skeleton');
                $("#orderdetails_td42").removeClass('skeleton');
                $("#orderdetails_td43").removeClass('skeleton');
                $("#orderdetails_td44").removeClass('skeleton');
                $("#orderdetails_td45").removeClass('skeleton');
                $("#orderdetails_td46").removeClass('skeleton');
                $("#orderdetails_td47").removeClass('skeleton');
                $("#orderdetails_td48").removeClass('skeleton');
                $("#orderdetails_td49").removeClass('skeleton');
                $("#orderdetails_td50").removeClass('skeleton');
                $("#orderdetails_td51").removeClass('skeleton');
                $("#orderdetails_td52").removeClass('skeleton');
                $("#orderdetails_td53").removeClass('skeleton');
                $("#orderdetails_td54").removeClass('skeleton');
                $("#orderdetails_td55").removeClass('skeleton');
                $("#orderdetails_td56").removeClass('skeleton');
                $("#orderdetails_td57").removeClass('skeleton');
                $("#orderdetails_td58").removeClass('skeleton');
                $("#orderdetails_td59").removeClass('skeleton');
                $("#orderdetails_td60").removeClass('skeleton');
                $("#orderdetails_td61").removeClass('skeleton');
                $("#orderdetails_td62").removeClass('skeleton');
                $("#orderdetails_td63").removeClass('skeleton');
                $("#orderdetails_td64").removeClass('skeleton');
                $("#orderdetails_td65").removeClass('skeleton');
                $("#orderdetails_td66").removeClass('skeleton');
                $("#orderdetails_td67").removeClass('skeleton');

            }, 1000);

            return () => {
                clearTimeout(time);
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        // Sales details record
        $('#start_ord_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_ord_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });
        // Sales details record
        $('#start_sales_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_sales_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });
    });
</script>
@endsection