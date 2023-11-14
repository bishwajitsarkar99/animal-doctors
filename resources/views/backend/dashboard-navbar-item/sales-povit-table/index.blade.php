@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<section class="sales-tab">
    <div class="sales-bg-color">
        <button class="tablinksales " onclick="opensalesLink(event,'sales_summary')" id="sales_active">{{__('translate.Sales Summary')}}</button>
        <button class="tablinksales " onclick="opensalesLink(event,'sales_details')" id="sales_inactive">{{__('translate.Sales Position')}}</button>
    </div>

    <div id="sales_summary" class="sal">

        <!-- =============== Sales Summary View ================= -->
        <div class="row">
            <h5 class="ord_summ skeleton mt-1 ms-2">{{__('translate.Monthly Product Sales View')}}</h5>

            @include('backend.dashboard-navbar-item.sales-povit-table.pivot-table._sales-view-summary')
            @include('backend.dashboard-navbar-item.sales-povit-table.sales-chart._sales-line-chart')

            <div class="col-xl-10">
                <!-- <span class="tol_ord">
                    <label class="select_label" for="expenses">Choose Month :</label>
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
                <span class="tol_ord">
                    <label class="select_label skeleton" for="expenses">{{__('translate.Start Date')}} :</label>
                    <input id="start_sales_date" type="text" class="select_date" placeholder="DD-MM-YYYY">
                </span>
                <span class="tol_ord ps-2">
                    <label class="select_label skeleton" for="expenses">{{__('translate.End Date')}} :</label>
                    <input id="end_sales_date" type="text" class="select_date" placeholder="DD-MM-YYYY">
                </span>
                <button type="submit" class="btn btn-sm btn-success ord_btn ms-3" style="line-height: 0.1;">
                    <i class="search-sales-icon fa fa-spinner fa-spin search-sales-hidden"></i>
                    <span class="btn-sales-text">Search</span>
                </button>
            </div>
        </div>
        <div class="row mt-1">
            <!-- =============== Category Base Sales Position ================= -->
            @include('backend.dashboard-navbar-item.sales-povit-table.pivot-table._category-base-sales-summary')
            @include('backend.dashboard-navbar-item.sales-povit-table.sales-chart._category-base-sales-pie-chart')

        </div>
    </div>

    <div id="sales_details" class="sal" style="display: none;">
        <!-- =============== Sales Position Details Pivot Table ================= -->
        <div class="row">
            @include('backend.dashboard-navbar-item.sales-povit-table.pivot-table._sales-position-pivot-summary')
            @include('backend.dashboard-navbar-item.sales-povit-table.sales-chart._sales-position-bar-chart')
            <div class="col-xl-8">
                <!-- <span class="tol_ord mt-1">
                    <label for="expenses" class="select_labelTwo">Choose Month :</label>
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
                <span class="tol_ord">
                    <label id="date_label" class="select_label" for="expenses">{{__('translate.Start Date')}} :</label>
                    <input id="start_details_date" type="text" class="select_date" placeholder="DD-MM-YYYY">
                </span>
                <span class="tol_ord ps-2">
                    <label id="date_label2" class="select_label" for="expenses">{{__('translate.End Date')}} :</label>
                    <input id="end_details_date" type="text" class="select_date" placeholder="DD-MM-YYYY">
                </span>
                <button type="submit" class="btn btn-sm btn-success ord_btn ms-3" style="line-height: 0.1;">
                    <i class="search-sales2-icon fa fa-spinner fa-spin search-sales2-hidden"></i>
                    <span class="btn2-sales-text">Search</span>
                </button>
            </div>
        </div>
        <div class="row mt-1">
            @include('backend.dashboard-navbar-item.sales-povit-table.pivot-table._sales-position-pivot-details')
        </div>

    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="{{'backend_asset'}}/main_asset/custom-css/dashboard-css/pivot-table-css/sales-pivot.css">
<link rel="stylesheet" href="{{'backend_asset'}}/main_asset/custom-css/dashboard-css/pivot-table-css/sales-page-focus-css/white.css" id="dashboardSalesPivotUrl">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
@endsection

@section('script')
<script src="{{'backend_asset'}}/main_asset/demo/sales-pivot-chart-line.js"></script>
<script src="{{'backend_asset'}}/main_asset/demo/sales-pivot-chart-pie.js"></script>
<script src="{{'backend_asset'}}/main_asset/demo/sales-pivot-chart-bar.js"></script>

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
            $('.search-sales-icon').removeClass('search-sales-hidden');
            $(this).attr('disabled', true);
            $('.btn-sales-text').text('Search...');
            setTimeout(() => {
                $('.search-sales-icon').addClass('search-sales-hidden');
                $(this).attr('disabled', false);
                $('.btn-sales-text').text('Search');
            }, 3000);
        });
    });
    // Search Button2 Loader
    $(document).ready(function(){
        $(".ord_ser_btn").on('click', () => {
            $('.search-sales2-icon').removeClass('search-sales2-hidden');
            $(this).attr('disabled', true);
            $('.btn2-sales-text').text('Search...');
            setTimeout(() => {
                $('.search-sales2-icon').addClass('search-sales2-hidden');
                $(this).attr('disabled', false);
                $('.btn2-sales-text').text('Search');
            }, 3000);
        });
    });

    // skeleton-children
    $(document).ready(function() {
        $("#sales_inactive").on('click', function() {
            //position
            $("#sales_head").addClass('skeleton');
            $("#date_label").addClass('skeleton');
            $("#date_label2").addClass('skeleton');
            $("#sal_position").addClass('skeleton');
            $("#sal_position_tr").addClass('skeleton');
            $("#sal_position_tr2").addClass('skeleton');
            $("#sal_position_tr3").addClass('skeleton');
            $("#sal_position_tr4").addClass('skeleton');
            $("#sal_position_tr5").addClass('skeleton');
            $("#sal_position_tr6").addClass('skeleton');
            $("#sal_position_td").addClass('skeleton');
            $("#sal_position_td2").addClass('skeleton');
            $("#sal_position_td3").addClass('skeleton');
            $("#sal_position_td4").addClass('skeleton');
            $("#sal_position_td5").addClass('skeleton');
            $("#sal_position_td6").addClass('skeleton');
            $("#sal_position_td7").addClass('skeleton');
            $("#sal_position_td8").addClass('skeleton');
            $("#sal_position_td9").addClass('skeleton');
            $("#sal_position_td10").addClass('skeleton');
            $("#sal_position_td11").addClass('skeleton');
            $("#sal_position_td12").addClass('skeleton');
            $("#sal_position_td13").addClass('skeleton');
            $("#sal_position_td14").addClass('skeleton');
            $("#sal_position_td15").addClass('skeleton');
            $("#sal_position_td16").addClass('skeleton');
            $("#sal_bar_chart").addClass('skeleton');
            $("#chart_title").addClass('skeleton');

            // details
            $("#sal_details_tab").addClass('skeleton');
            $("#sal_details_tab_tr").addClass('skeleton');
            $("#sal_details_tab_tr2").addClass('skeleton');
            $("#sal_details_tab_tr3").addClass('skeleton');
            $("#sal_details_tab_tr4").addClass('skeleton');
            $("#sal_details_tab_tr5").addClass('skeleton');
            $("#sal_details_tab_tr6").addClass('skeleton');
            $("#sal_details_tab_td").addClass('skeleton');
            $("#sal_details_tab_td2").addClass('skeleton');
            $("#sal_details_tab_td3").addClass('skeleton');
            $("#sal_details_tab_td4").addClass('skeleton');
            $("#sal_details_tab_td5").addClass('skeleton');
            $("#sal_details_tab_td6").addClass('skeleton');
            $("#sal_details_tab_td7").addClass('skeleton');
            $("#sal_details_tab_td8").addClass('skeleton');
            $("#sal_details_tab_td9").addClass('skeleton');
            $("#sal_details_tab_td10").addClass('skeleton');
            $("#sal_details_tab_td11").addClass('skeleton');
            $("#sal_details_tab_td12").addClass('skeleton');
            $("#sal_details_tab_td13").addClass('skeleton');
            $("#sal_details_tab_td14").addClass('skeleton');
            $("#sal_details_tab_td15").addClass('skeleton');
            $("#sal_details_tab_td16").addClass('skeleton');
            $("#sal_details_tab_td17").addClass('skeleton');
            $("#sal_details_tab_td18").addClass('skeleton');
            $("#sal_details_tab_td19").addClass('skeleton');
            $("#sal_details_tab_td20").addClass('skeleton');
            $("#sal_details_tab_td21").addClass('skeleton');
            $("#sal_details_tab_td22").addClass('skeleton');
            $("#sal_details_tab_td23").addClass('skeleton');
            $("#sal_details_tab_td24").addClass('skeleton');
            $("#sal_details_tab_td25").addClass('skeleton');
            $("#sal_details_tab_td26").addClass('skeleton');
            $("#sal_details_tab_td27").addClass('skeleton');
            $("#sal_details_tab_td28").addClass('skeleton');
            $("#sal_details_tab_td29").addClass('skeleton');
            $("#sal_details_tab_td30").addClass('skeleton');
            $("#sal_details_tab_td31").addClass('skeleton');
            $("#sal_details_tab_td32").addClass('skeleton');
            $("#sal_details_tab_td33").addClass('skeleton');
            $("#sal_details_tab_td34").addClass('skeleton');
            $("#sal_details_tab_td35").addClass('skeleton');
            $("#sal_details_tab_td36").addClass('skeleton');
            $("#sal_details_tab_td37").addClass('skeleton');
            $("#sal_details_tab_td38").addClass('skeleton');
            $("#sal_details_tab_td39").addClass('skeleton');
            $("#sal_details_tab_td40").addClass('skeleton');
            $("#sal_details_tab_td41").addClass('skeleton');
            $("#sal_details_tab_td42").addClass('skeleton');
            $("#sal_details_tab_td43").addClass('skeleton');
            $("#sal_details_tab_td44").addClass('skeleton');
            $("#sal_details_tab_td45").addClass('skeleton');
            $("#sal_details_tab_td46").addClass('skeleton');
            $("#sal_details_tab_td47").addClass('skeleton');
            $("#sal_details_tab_td48").addClass('skeleton');
            $("#sal_details_tab_td49").addClass('skeleton');
            $("#sal_details_tab_td50").addClass('skeleton');
            $("#sal_details_tab_td51").addClass('skeleton');
            $("#sal_details_tab_td52").addClass('skeleton');
            $("#sal_details_tab_td53").addClass('skeleton');
            $("#sal_details_tab_td54").addClass('skeleton');
            $("#sal_details_tab_td55").addClass('skeleton');
            $("#sal_details_tab_td56").addClass('skeleton');
            $("#sal_details_tab_td57").addClass('skeleton');
            $("#sal_details_tab_td58").addClass('skeleton');
            $("#sal_details_tab_td59").addClass('skeleton');
            $("#sal_details_tab_td60").addClass('skeleton');
            $("#sal_details_tab_td61").addClass('skeleton');
            $("#sal_details_tab_td62").addClass('skeleton');
            $("#sal_details_tab_td62").addClass('skeleton');
            $("#sal_details_tab_td64").addClass('skeleton');
            $("#sal_details_tab_td65").addClass('skeleton');
            $("#sal_details_tab_td66").addClass('skeleton');
            $("#sal_details_tab_td67").addClass('skeleton');
            $("#sal_details_tab_td68").addClass('skeleton');
            $("#sal_details_tab_td69").addClass('skeleton');


            var time = null;
            time = setTimeout(() => {
                // Position
                $("#sales_head").removeClass('skeleton');
                $("#date_label").removeClass('skeleton');
                $("#date_label2").removeClass('skeleton');
                $("#sal_position").removeClass('skeleton');
                $("#sal_position_tr").removeClass('skeleton');
                $("#sal_position_tr2").removeClass('skeleton');
                $("#sal_position_tr3").removeClass('skeleton');
                $("#sal_position_tr4").removeClass('skeleton');
                $("#sal_position_tr5").removeClass('skeleton');
                $("#sal_position_tr6").removeClass('skeleton');
                $("#sal_position_td").removeClass('skeleton');
                $("#sal_position_td2").removeClass('skeleton');
                $("#sal_position_td3").removeClass('skeleton');
                $("#sal_position_td4").removeClass('skeleton');
                $("#sal_position_td5").removeClass('skeleton');
                $("#sal_position_td6").removeClass('skeleton');
                $("#sal_position_td7").removeClass('skeleton');
                $("#sal_position_td8").removeClass('skeleton');
                $("#sal_position_td9").removeClass('skeleton');
                $("#sal_position_td10").removeClass('skeleton');
                $("#sal_position_td11").removeClass('skeleton');
                $("#sal_position_td12").removeClass('skeleton');
                $("#sal_position_td13").removeClass('skeleton');
                $("#sal_position_td14").removeClass('skeleton');
                $("#sal_position_td15").removeClass('skeleton');
                $("#sal_position_td16").removeClass('skeleton');
                $("#sal_bar_chart").removeClass('skeleton');
                $("#chart_title").removeClass('skeleton');
                

                // details
                $("#sal_details_tab").removeClass('skeleton');
                $("#sal_details_tab_tr").removeClass('skeleton');
                $("#sal_details_tab_tr2").removeClass('skeleton');
                $("#sal_details_tab_tr3").removeClass('skeleton');
                $("#sal_details_tab_tr4").removeClass('skeleton');
                $("#sal_details_tab_tr5").removeClass('skeleton');
                $("#sal_details_tab_tr6").removeClass('skeleton');
                $("#sal_details_tab_td").removeClass('skeleton');
                $("#sal_details_tab_td2").removeClass('skeleton');
                $("#sal_details_tab_td3").removeClass('skeleton');
                $("#sal_details_tab_td4").removeClass('skeleton');
                $("#sal_details_tab_td5").removeClass('skeleton');
                $("#sal_details_tab_td6").removeClass('skeleton');
                $("#sal_details_tab_td7").removeClass('skeleton');
                $("#sal_details_tab_td8").removeClass('skeleton');
                $("#sal_details_tab_td9").removeClass('skeleton');
                $("#sal_details_tab_td10").removeClass('skeleton');
                $("#sal_details_tab_td11").removeClass('skeleton');
                $("#sal_details_tab_td12").removeClass('skeleton');
                $("#sal_details_tab_td13").removeClass('skeleton');
                $("#sal_details_tab_td14").removeClass('skeleton');
                $("#sal_details_tab_td15").removeClass('skeleton');
                $("#sal_details_tab_td16").removeClass('skeleton');
                $("#sal_details_tab_td17").removeClass('skeleton');
                $("#sal_details_tab_td18").removeClass('skeleton');
                $("#sal_details_tab_td19").removeClass('skeleton');
                $("#sal_details_tab_td20").removeClass('skeleton');
                $("#sal_details_tab_td21").removeClass('skeleton');
                $("#sal_details_tab_td22").removeClass('skeleton');
                $("#sal_details_tab_td23").removeClass('skeleton');
                $("#sal_details_tab_td24").removeClass('skeleton');
                $("#sal_details_tab_td25").removeClass('skeleton');
                $("#sal_details_tab_td26").removeClass('skeleton');
                $("#sal_details_tab_td27").removeClass('skeleton');
                $("#sal_details_tab_td28").removeClass('skeleton');
                $("#sal_details_tab_td29").removeClass('skeleton');
                $("#sal_details_tab_td30").removeClass('skeleton');
                $("#sal_details_tab_td31").removeClass('skeleton');
                $("#sal_details_tab_td32").removeClass('skeleton');
                $("#sal_details_tab_td33").removeClass('skeleton');
                $("#sal_details_tab_td34").removeClass('skeleton');
                $("#sal_details_tab_td35").removeClass('skeleton');
                $("#sal_details_tab_td36").removeClass('skeleton');
                $("#sal_details_tab_td37").removeClass('skeleton');
                $("#sal_details_tab_td38").removeClass('skeleton');
                $("#sal_details_tab_td39").removeClass('skeleton');
                $("#sal_details_tab_td40").removeClass('skeleton');
                $("#sal_details_tab_td41").removeClass('skeleton');
                $("#sal_details_tab_td42").removeClass('skeleton');
                $("#sal_details_tab_td43").removeClass('skeleton');
                $("#sal_details_tab_td44").removeClass('skeleton');
                $("#sal_details_tab_td45").removeClass('skeleton');
                $("#sal_details_tab_td46").removeClass('skeleton');
                $("#sal_details_tab_td47").removeClass('skeleton');
                $("#sal_details_tab_td48").removeClass('skeleton');
                $("#sal_details_tab_td49").removeClass('skeleton');
                $("#sal_details_tab_td50").removeClass('skeleton');
                $("#sal_details_tab_td51").removeClass('skeleton');
                $("#sal_details_tab_td52").removeClass('skeleton');
                $("#sal_details_tab_td53").removeClass('skeleton');
                $("#sal_details_tab_td54").removeClass('skeleton');
                $("#sal_details_tab_td55").removeClass('skeleton');
                $("#sal_details_tab_td56").removeClass('skeleton');
                $("#sal_details_tab_td57").removeClass('skeleton');
                $("#sal_details_tab_td58").removeClass('skeleton');
                $("#sal_details_tab_td59").removeClass('skeleton');
                $("#sal_details_tab_td60").removeClass('skeleton');
                $("#sal_details_tab_td61").removeClass('skeleton');
                $("#sal_details_tab_td62").removeClass('skeleton');
                $("#sal_details_tab_td62").removeClass('skeleton');
                $("#sal_details_tab_td64").removeClass('skeleton');
                $("#sal_details_tab_td65").removeClass('skeleton');
                $("#sal_details_tab_td66").removeClass('skeleton');
                $("#sal_details_tab_td67").removeClass('skeleton');
                $("#sal_details_tab_td68").removeClass('skeleton');
                $("#sal_details_tab_td69").removeClass('skeleton');

            }, 1000);

            return () => {
                clearTimeout(time);
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        // Sales summary record
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
        // Sales details record
        $('#start_details_date').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_details_date').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
        });
    });
</script>
@endsection