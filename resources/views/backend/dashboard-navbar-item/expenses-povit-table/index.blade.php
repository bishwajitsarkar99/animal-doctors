@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<section class="expenses-dashboard">
    <div class="expenses-bar expenses-bg-color">
        <button class="tablinkexpenses" onclick="openExpensesLink(event,'exp_summary')" id="expenses_active">{{__('translate.Expenses Summary')}}</button>
        <button class="tablinkexpenses" onclick="openExpensesLink(event,'exp_details')" id="expenses_inactive">{{__('translate.Expenses Table')}}</button>
    </div>

    <div id="exp_summary" class="exp">
        <div class="row">
            <!-- ============= Type Of Expenses Summary ================ -->
            <h5 class="ex_summ skeleton mt-1 ms-2">{{__('translate.Monthly Expenses Field')}}</h5>
            @include('backend.dashboard-navbar-item.expenses-povit-table.pivot-table._expenses-view-summary')
            @include('backend.dashboard-navbar-item.expenses-povit-table.expenses-chart._expenses-pie-chart')
        </div>
    </div>

    <div id="exp_details" class="exp" style="display:none">
        <!-- ============= Expenses Summary View ================ -->
        <h5 class="ex_summ mt-1 ms-2">{{__('translate.Monthly Expenses Pivot Table')}}</h5>
        <div class="row">
            @include('backend.dashboard-navbar-item.expenses-povit-table.pivot-table._expenses-summary')
            @include('backend.dashboard-navbar-item.expenses-povit-table.expenses-chart._expenses-bar-chart')
            <div class="col-xl-10">
                <!-- <span class="tol_ord_ mt-1 ps-1">
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
                <span class="tol_ord">
                    <label id="date_label" class="select_label" for="expenses">{{__('translate.Start Date')}} :</label>
                    <input id="start_details_date" type="text" class="select_date" placeholder="DD-MM-YYYY">
                </span>
                <span class="tol_ord ps-3 ms-4">
                    <label id="date_label2" class="select_label" for="expenses">{{__('translate.End Date')}} :</label>
                    <input id="end_details_date" type="text" class="select_date" placeholder="DD-MM-YYYY">
                </span>
                <button type="submit" class="btn btn-sm btn-success expn_btn ms-3" style="line-height: 0.1;">
                    <i class="search-expenses-icon fa fa-spinner fa-spin search-expenses-hidden"></i>
                    <span class="btn-exp-text">Search</span>
                </button>
            </div>
        </div>
        <!-- ============= Expenses Details Summary ================ -->
        <div class="row mt-1">
            @include('backend.dashboard-navbar-item.expenses-povit-table.pivot-table._expenses-summary-details')
        </div>
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/pivot-table-css/expenses-pivot.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/pivot-table-css/expenses-page-focus-css/silver.css" id="dashboardExpensesPivotURL">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
@endsection
@section('script')
    <script src="{{asset('backend_asset')}}/main_asset/demo/expenses-bar-chart.js"></script>
    <script src="{{asset('backend_asset')}}/main_asset/demo/expenses-pie-chart.js"></script>

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
            $(".expn_btn").on('click', () => {
                $('.search-expenses-icon').removeClass('search-expenses-hidden');
                $(this).attr('disabled', true);
                $('.btn-exp-text').text('Search...');
                setTimeout(() => {
                    $('.search-expenses-icon').addClass('search-expenses-hidden');
                    $(this).attr('disabled', false);
                    $('.btn-exp-text').text('Search');
                }, 3000);
            });
        });
        // skeleton-children
        $(document).ready(function() {
            $("#expenses_inactive").on('click', function() {
                // details
                $("#ex_bar_chart").addClass('skeleton');
                $("#ex_bar_chart_caption").addClass('skeleton');
                $("#exp_summ_tab").addClass('skeleton');
                $("#exp_summ_tab_tr").addClass('skeleton');
                $("#exp_summ_tab_tr2").addClass('skeleton');
                $("#exp_summ_tab_tr3").addClass('skeleton');
                $("#exp_summ_tab_tr4").addClass('skeleton');
                $("#exp_summ_tab_tr5").addClass('skeleton');
                $("#exp_summ_tab_tr6").addClass('skeleton');
                $("#exp_summ_tab_td").addClass('skeleton');
                $("#exp_summ_tab_td2").addClass('skeleton');
                $("#exp_summ_tab_td3").addClass('skeleton');
                $("#exp_summ_tab_td4").addClass('skeleton');
                $("#exp_summ_tab_td5").addClass('skeleton');
                $("#exp_summ_tab_td6").addClass('skeleton');
                $("#exp_summ_tab_td7").addClass('skeleton');
                $("#exp_summ_tab_td8").addClass('skeleton');
                $("#exp_summ_tab_td9").addClass('skeleton');
                $("#exp_summ_tab_td10").addClass('skeleton');
                $("#exp_summ_tab_td11").addClass('skeleton');
                $("#exp_summ_tab_td12").addClass('skeleton');
                $("#exp_summ_tab_td13").addClass('skeleton');
                $("#exp_summ_tab_td14").addClass('skeleton');
                $("#exp_summ_tab_td15").addClass('skeleton');
                $("#exp_summ_tab_td16").addClass('skeleton');
                $("#exp_summ_tab_td17").addClass('skeleton');
                $("#exp_summ_tab_td18").addClass('skeleton');


                $("#ex_details_month").addClass('skeleton');
                $("#date_label").addClass('skeleton');
                $("#date_label2").addClass('skeleton');
                $("#ex_details_month_tr").addClass('skeleton');
                $("#ex_details_month_tr2").addClass('skeleton');
                $("#ex_details_month_tr3").addClass('skeleton');
                $("#ex_details_month_tr4").addClass('skeleton');
                $("#ex_details_month_tr5").addClass('skeleton');
                $("#ex_details_month_tr6").addClass('skeleton');
                $("#ex_details_month_tr7").addClass('skeleton');
                $("#ex_details_month_tr8").addClass('skeleton');
                $("#ex_details_month_tr9").addClass('skeleton');
                $("#ex_details_month_tr10").addClass('skeleton');
                $("#ex_details_month_tr11").addClass('skeleton');
                $("#ex_details_month_tr12").addClass('skeleton');
                $("#ex_details_month_td").addClass('skeleton');
                $("#ex_details_month_td2").addClass('skeleton');
                $("#ex_details_month_td3").addClass('skeleton');
                $("#ex_details_month_td4").addClass('skeleton');
                $("#ex_details_month_td5").addClass('skeleton');
                $("#ex_details_month_td6").addClass('skeleton');
                $("#ex_details_month_td7").addClass('skeleton');
                $("#ex_details_month_td8").addClass('skeleton');
                $("#ex_details_month_td9").addClass('skeleton');
                $("#ex_details_month_td10").addClass('skeleton');
                $("#ex_details_month_td11").addClass('skeleton');
                $("#ex_details_month_td12").addClass('skeleton');
                $("#ex_details_month_td13").addClass('skeleton');
                $("#ex_details_month_td14").addClass('skeleton');
                $("#ex_details_month_td15").addClass('skeleton');
                $("#ex_details_month_td16").addClass('skeleton');
                $("#ex_details_month_td17").addClass('skeleton');
                $("#ex_details_month_td18").addClass('skeleton');
                $("#ex_details_month_td19").addClass('skeleton');
                $("#ex_details_month_td20").addClass('skeleton');
                $("#ex_details_month_td21").addClass('skeleton');
                $("#ex_details_month_td22").addClass('skeleton');
                $("#ex_details_month_td22").addClass('skeleton');
                $("#ex_details_month_td23").addClass('skeleton');
                $("#ex_details_month_td24").addClass('skeleton');
                $("#ex_details_month_td25").addClass('skeleton');
                $("#ex_details_month_td26").addClass('skeleton');
                $("#ex_details_month_td27").addClass('skeleton');
                $("#ex_details_month_td28").addClass('skeleton');
                $("#ex_details_month_td29").addClass('skeleton');
                $("#ex_details_month_td30").addClass('skeleton');
                $("#ex_details_month_td31").addClass('skeleton');
                $("#ex_details_month_td32").addClass('skeleton');
                $("#ex_details_month_td33").addClass('skeleton');
                $("#ex_details_month_td34").addClass('skeleton');
                $("#ex_details_month_td35").addClass('skeleton');
                $("#ex_details_month_td36").addClass('skeleton');
                $("#ex_details_month_td37").addClass('skeleton');
                $("#ex_details_month_td38").addClass('skeleton');
                $("#ex_details_month_td39").addClass('skeleton');
                $("#ex_details_month_td40").addClass('skeleton');
                $("#ex_details_month_td41").addClass('skeleton');
                $("#ex_details_month_td42").addClass('skeleton');
                $("#ex_details_month_td43").addClass('skeleton');
                $("#ex_details_month_td44").addClass('skeleton');
                $("#ex_details_month_td45").addClass('skeleton');
                $("#ex_details_month_td46").addClass('skeleton');
                $("#ex_details_month_td47").addClass('skeleton');
                $("#ex_details_month_td48").addClass('skeleton');
                $("#ex_details_month_td49").addClass('skeleton');
                $("#ex_details_month_td50").addClass('skeleton');
                $("#ex_details_month_td51").addClass('skeleton');
                $("#ex_details_month_td52").addClass('skeleton');
                $("#ex_details_month_td53").addClass('skeleton');
                $("#ex_details_month_td54").addClass('skeleton');
                $("#ex_details_month_td55").addClass('skeleton');
                $("#ex_details_month_td56").addClass('skeleton');
                $("#ex_details_month_td57").addClass('skeleton');
                $("#ex_details_month_td58").addClass('skeleton');
                $("#ex_details_month_td59").addClass('skeleton');
                $("#ex_details_month_td60").addClass('skeleton');
                $("#ex_details_month_td61").addClass('skeleton');
                $("#ex_details_month_td62").addClass('skeleton');
                $("#ex_details_month_td63").addClass('skeleton');
                $("#ex_details_month_td64").addClass('skeleton');
                $("#ex_details_month_td65").addClass('skeleton');
                $("#ex_details_month_td66").addClass('skeleton');
                $("#ex_details_month_td67").addClass('skeleton');
                $("#ex_details_month_td68").addClass('skeleton');
                $("#ex_details_month_td69").addClass('skeleton');
                $("#ex_details_month_td70").addClass('skeleton');
                $("#ex_details_month_td71").addClass('skeleton');
                $("#ex_details_month_td72").addClass('skeleton');
                $("#ex_details_month_td73").addClass('skeleton');
                $("#ex_details_month_td74").addClass('skeleton');
                $("#ex_details_month_td75").addClass('skeleton');
                $("#ex_details_month_td76").addClass('skeleton');
                $("#ex_details_month_td77").addClass('skeleton');
                $("#ex_details_month_td78").addClass('skeleton');
                $("#ex_details_month_td79").addClass('skeleton');
                $("#ex_details_month_td80").addClass('skeleton');
                $("#ex_details_month_td81").addClass('skeleton');

                var time = null;
                time = setTimeout(() => {
                    // details
                    $("#ex_bar_chart").removeClass('skeleton');
                    $("#ex_bar_chart_caption").removeClass('skeleton');
                    $("#exp_summ_tab").removeClass('skeleton');
                    $("#exp_summ_tab_tr").removeClass('skeleton');
                    $("#exp_summ_tab_tr2").removeClass('skeleton');
                    $("#exp_summ_tab_tr3").removeClass('skeleton');
                    $("#exp_summ_tab_tr4").removeClass('skeleton');
                    $("#exp_summ_tab_tr5").removeClass('skeleton');
                    $("#exp_summ_tab_tr6").removeClass('skeleton');
                    $("#exp_summ_tab_td").removeClass('skeleton');
                    $("#exp_summ_tab_td2").removeClass('skeleton');
                    $("#exp_summ_tab_td3").removeClass('skeleton');
                    $("#exp_summ_tab_td4").removeClass('skeleton');
                    $("#exp_summ_tab_td5").removeClass('skeleton');
                    $("#exp_summ_tab_td6").removeClass('skeleton');
                    $("#exp_summ_tab_td7").removeClass('skeleton');
                    $("#exp_summ_tab_td8").removeClass('skeleton');
                    $("#exp_summ_tab_td9").removeClass('skeleton');
                    $("#exp_summ_tab_td10").removeClass('skeleton');
                    $("#exp_summ_tab_td11").removeClass('skeleton');
                    $("#exp_summ_tab_td12").removeClass('skeleton');
                    $("#exp_summ_tab_td13").removeClass('skeleton');
                    $("#exp_summ_tab_td14").removeClass('skeleton');
                    $("#exp_summ_tab_td15").removeClass('skeleton');
                    $("#exp_summ_tab_td16").removeClass('skeleton');
                    $("#exp_summ_tab_td17").removeClass('skeleton');

                    $("#ex_details_month").removeClass('skeleton');
                    $("#date_label").removeClass('skeleton');
                    $("#date_label2").removeClass('skeleton');
                    $("#ex_details_month_tr").removeClass('skeleton');
                    $("#ex_details_month_tr2").removeClass('skeleton');
                    $("#ex_details_month_tr3").removeClass('skeleton');
                    $("#ex_details_month_tr4").removeClass('skeleton');
                    $("#ex_details_month_tr5").removeClass('skeleton');
                    $("#ex_details_month_tr6").removeClass('skeleton');
                    $("#ex_details_month_tr7").removeClass('skeleton');
                    $("#ex_details_month_tr8").removeClass('skeleton');
                    $("#ex_details_month_tr9").removeClass('skeleton');
                    $("#ex_details_month_tr10").removeClass('skeleton');
                    $("#ex_details_month_tr11").removeClass('skeleton');
                    $("#ex_details_month_tr12").removeClass('skeleton');
                    $("#ex_details_month_td").removeClass('skeleton');
                    $("#ex_details_month_td2").removeClass('skeleton');
                    $("#ex_details_month_td3").removeClass('skeleton');
                    $("#ex_details_month_td4").removeClass('skeleton');
                    $("#ex_details_month_td5").removeClass('skeleton');
                    $("#ex_details_month_td6").removeClass('skeleton');
                    $("#ex_details_month_td7").removeClass('skeleton');
                    $("#ex_details_month_td8").removeClass('skeleton');
                    $("#ex_details_month_td9").removeClass('skeleton');
                    $("#ex_details_month_td10").removeClass('skeleton');
                    $("#ex_details_month_td11").removeClass('skeleton');
                    $("#ex_details_month_td12").removeClass('skeleton');
                    $("#ex_details_month_td13").removeClass('skeleton');
                    $("#ex_details_month_td14").removeClass('skeleton');
                    $("#ex_details_month_td15").removeClass('skeleton');
                    $("#ex_details_month_td16").removeClass('skeleton');
                    $("#ex_details_month_td17").removeClass('skeleton');
                    $("#ex_details_month_td18").removeClass('skeleton');
                    $("#ex_details_month_td19").removeClass('skeleton');
                    $("#ex_details_month_td20").removeClass('skeleton');
                    $("#ex_details_month_td21").removeClass('skeleton');
                    $("#ex_details_month_td22").removeClass('skeleton');
                    $("#ex_details_month_td22").removeClass('skeleton');
                    $("#ex_details_month_td23").removeClass('skeleton');
                    $("#ex_details_month_td24").removeClass('skeleton');
                    $("#ex_details_month_td25").removeClass('skeleton');
                    $("#ex_details_month_td26").removeClass('skeleton');
                    $("#ex_details_month_td27").removeClass('skeleton');
                    $("#ex_details_month_td28").removeClass('skeleton');
                    $("#ex_details_month_td29").removeClass('skeleton');
                    $("#ex_details_month_td30").removeClass('skeleton');
                    $("#ex_details_month_td31").removeClass('skeleton');
                    $("#ex_details_month_td32").removeClass('skeleton');
                    $("#ex_details_month_td33").removeClass('skeleton');
                    $("#ex_details_month_td34").removeClass('skeleton');
                    $("#ex_details_month_td35").removeClass('skeleton');
                    $("#ex_details_month_td36").removeClass('skeleton');
                    $("#ex_details_month_td37").removeClass('skeleton');
                    $("#ex_details_month_td38").removeClass('skeleton');
                    $("#ex_details_month_td39").removeClass('skeleton');
                    $("#ex_details_month_td40").removeClass('skeleton');
                    $("#ex_details_month_td41").removeClass('skeleton');
                    $("#ex_details_month_td42").removeClass('skeleton');
                    $("#ex_details_month_td43").removeClass('skeleton');
                    $("#ex_details_month_td44").removeClass('skeleton');
                    $("#ex_details_month_td45").removeClass('skeleton');
                    $("#ex_details_month_td46").removeClass('skeleton');
                    $("#ex_details_month_td47").removeClass('skeleton');
                    $("#ex_details_month_td48").removeClass('skeleton');
                    $("#ex_details_month_td49").removeClass('skeleton');
                    $("#ex_details_month_td50").removeClass('skeleton');
                    $("#ex_details_month_td51").removeClass('skeleton');
                    $("#ex_details_month_td52").removeClass('skeleton');
                    $("#ex_details_month_td53").removeClass('skeleton');
                    $("#ex_details_month_td54").removeClass('skeleton');
                    $("#ex_details_month_td55").removeClass('skeleton');
                    $("#ex_details_month_td56").removeClass('skeleton');
                    $("#ex_details_month_td57").removeClass('skeleton');
                    $("#ex_details_month_td58").removeClass('skeleton');
                    $("#ex_details_month_td59").removeClass('skeleton');
                    $("#ex_details_month_td60").removeClass('skeleton');
                    $("#ex_details_month_td61").removeClass('skeleton');
                    $("#ex_details_month_td62").removeClass('skeleton');
                    $("#ex_details_month_td63").removeClass('skeleton');
                    $("#ex_details_month_td64").removeClass('skeleton');
                    $("#ex_details_month_td65").removeClass('skeleton');
                    $("#ex_details_month_td66").removeClass('skeleton');
                    $("#ex_details_month_td67").removeClass('skeleton');
                    $("#ex_details_month_td68").removeClass('skeleton');
                    $("#ex_details_month_td69").removeClass('skeleton');
                    $("#ex_details_month_td70").removeClass('skeleton');
                    $("#ex_details_month_td71").removeClass('skeleton');
                    $("#ex_details_month_td72").removeClass('skeleton');
                    $("#ex_details_month_td73").removeClass('skeleton');
                    $("#ex_details_month_td74").removeClass('skeleton');
                    $("#ex_details_month_td75").removeClass('skeleton');
                    $("#ex_details_month_td76").removeClass('skeleton');
                    $("#ex_details_month_td77").removeClass('skeleton');
                    $("#ex_details_month_td78").removeClass('skeleton');
                    $("#ex_details_month_td79").removeClass('skeleton');
                    $("#ex_details_month_td80").removeClass('skeleton');
                    $("#ex_details_month_td81").removeClass('skeleton');


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
                dateFormat: "dd-M-yy",
                changeMonth: true,
                changeYear: true,
            });
            $('#end_sales_date').datepicker({
                dateFormat: "dd-M-yy",
                changeMonth: true,
                changeYear: true,
            });
            // Sales details record
            $('#start_details_date').datepicker({
                dateFormat: "dd-M-yy",
                changeMonth: true,
                changeYear: true,
            });
            $('#end_details_date').datepicker({
                dateFormat: "dd-M-yy",
                changeMonth: true,
                changeYear: true,
            });
        });
    </script>
@endsection

