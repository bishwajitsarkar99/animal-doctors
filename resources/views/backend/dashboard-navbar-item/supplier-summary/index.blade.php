@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<section class="supplier">
    <div class="supplier-bg-color">
        <button class="tablinksupplier ps-2 pe-2" onclick="opensupplierLink(event,'supplier_summary')" id="supplier_active">{{__('translate.Supplier Summary')}}</button>
        <button class="tablinksupplier ps-2 pe-2" onclick="opensupplierLink(event,'supplier_details')" id="supplier_inactive">{{__('translate.Supplier Details')}}</button>
    </div>
    <div id="supplier_summary" class="supp">

        <!-- =============== Supplier Summary View ================= -->
        <div class="row">
            <h5 class="supp_summ mt-1 ms-2">{{__('translate.Supplier Summary View')}}</h5>
            @include('backend.dashboard-navbar-item.supplier-summary.summary._supplier-view-summary')
            @include('backend.dashboard-navbar-item.supplier-summary.summary._supplier-pie-chart')
        </div>
        <div class="row mt-3">
            @include('backend.dashboard-navbar-item.supplier-summary.summary._vendor-view-summary')
            @include('backend.dashboard-navbar-item.supplier-summary.summary._vendor-pie-chart')
        </div>
    </div>

    <div id="supplier_details" class="supp" style="display: none;">
        <!-- =============== Supplier Payment Position Details ================= -->
        <div class="row">
            <h5 class="supp_summ mt-1 ms-2">{{__('translate.Supplier Payment Summary')}}</h5>
            @include('backend.dashboard-navbar-item.supplier-summary.details._supplier-record')
            @include('backend.dashboard-navbar-item.supplier-summary.details._supplier-bar-chart')
            <div class="col-xl-10 mt-1">
                <!-- <span class="tol_ord mt-1">
                    <label for="supplier" class="select_labelTwo">Choose Month :</label>
                    <select name="supplier" id="#" class="select_month">
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
                    <label for="supplier" class="select_labelOne" id="date">{{__('translate.Start Date')}} :</label>
                    <input id="start_supp_date" type="text" class="select_dateOne cap1 ps-2" placeholder="DD-MM-YYYY" />
                </span>
                <span class="tol_ord mt-1">
                    <label for="supplier" class="select_labelOne" id="date_">{{__('translate.End Date')}} :</label>
                    <input id="end_supp_date" type="text" class="select_dateOne cap2 ps-2" placeholder="DD-MM-YYYY" />
                </span>
                <button type="submit" class="btn btn-sm btn-success ser_btn ms-3" style="line-height: 0.1;">
                    <i class="search-icon fa fa-spinner fa-spin search-hidden"></i>
                    <span class="btn-text">Search</span>
                </button>
            </div>
        </div>
        <div class="row mt-1">
            @include('backend.dashboard-navbar-item.supplier-summary.details._supplier-details')
        </div>

    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/supplier-summary/scss/dist/supplier-summary.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/dashboard-css/supplier-summary/scss/dist/supplier-summary-page-css/silver.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
@endsection

@section('script')
<script src="{{asset('backend_asset')}}/main_asset/demo/supplier-payment-bar-chart.js"></script>
@include('backend.dashboard-navbar-item.supplier-summary.ajax.supplier-ajax')
<script>
    // skeleton
    function fetchData(){
        const  allSkeleton = document.querySelectorAll('.skeleton')
    
        allSkeleton.forEach(item=>{
            item.classList.remove('skeleton')
        });
    }

    setTimeout(() => {
        fetchData();
    }, 1000);


    // skeleton-children
    $(document).ready(function(){
        $("#supplier_inactive").on('click', function(){
            $("#supp_record").addClass('skeleton');
            $("#date").addClass('skeleton');
            $("#date_").addClass('skeleton');
            $(".cap").addClass('skeleton');
            $(".cap2").addClass('skeleton');
            $("#supp_tr").addClass('skeleton');
            $("#supp_tr2").addClass('skeleton');
            $("#supp_tr3").addClass('skeleton');
            $("#supp_td1").addClass('skeleton');
            $("#supp_td2").addClass('skeleton');
            $("#supp_td3").addClass('skeleton');
            $("#supp_td4").addClass('skeleton');
            $("#supp_td5").addClass('skeleton');
            $("#supp_td6").addClass('skeleton');
            $("#supp_td7").addClass('skeleton');
            $("#supp_td8").addClass('skeleton');
            $("#supp_td9").addClass('skeleton');
            $("#supp_chart").addClass('skeleton');
            $("#chart_title").addClass('skeleton');
            $("#supp_details").addClass('skeleton');
            $("#tr_supp").addClass('skeleton');
            $("#tr_supp2").addClass('skeleton');
            $("#tr_supp3").addClass('skeleton');
            $("#tr_supp4").addClass('skeleton');
            $("#tr_supp5").addClass('skeleton');
            $("#tr_supp6").addClass('skeleton');
            $("#tr_supp7").addClass('skeleton');
            $("#td_supp1").addClass('skeleton');
            $("#td_supp2").addClass('skeleton');
            $("#td_supp3").addClass('skeleton');
            $("#td_supp4").addClass('skeleton');
            $("#td_supp5").addClass('skeleton');
            $("#td_supp6").addClass('skeleton');
            $("#td_supp7").addClass('skeleton');
            $("#td_supp8").addClass('skeleton');
            $("#td_supp9").addClass('skeleton');
            $("#td_supp10").addClass('skeleton');
            $("#td_supp11").addClass('skeleton');
            $("#td_supp12").addClass('skeleton');
            $("#td_supp13").addClass('skeleton');
            $("#td_supp14").addClass('skeleton');
            $("#td_supp15").addClass('skeleton');
            $("#td_supp16").addClass('skeleton');
            $("#td_supp17").addClass('skeleton');
            $("#td_supp18").addClass('skeleton');
            $("#td_supp19").addClass('skeleton');
            $("#td_supp20").addClass('skeleton');
            $("#td_supp21").addClass('skeleton');
            $("#td_supp22").addClass('skeleton');
            $("#td_supp23").addClass('skeleton');
            $("#td_supp24").addClass('skeleton');
            $("#td_supp25").addClass('skeleton');
            $("#td_supp26").addClass('skeleton');
            $("#td_supp27").addClass('skeleton');
            $("#td_supp28").addClass('skeleton');
            $("#td_supp29").addClass('skeleton');
            $("#td_supp30").addClass('skeleton');
            $("#td_supp31").addClass('skeleton');
            $("#td_supp32").addClass('skeleton');
            $("#td_supp33").addClass('skeleton');
            $("#td_supp34").addClass('skeleton');
            $("#td_supp35").addClass('skeleton');
            $("#td_supp36").addClass('skeleton');
            $("#td_supp37").addClass('skeleton');
            $("#td_supp38").addClass('skeleton');
            $("#td_supp39").addClass('skeleton');
            $("#td_supp40").addClass('skeleton');
            $("#td_supp41").addClass('skeleton');
            $("#td_supp42").addClass('skeleton');
            $("#td_supp43").addClass('skeleton');
            $("#td_supp44").addClass('skeleton');
            $("#td_supp45").addClass('skeleton');
            $("#td_supp46").addClass('skeleton');
            $("#td_supp47").addClass('skeleton');
            $("#td_supp48").addClass('skeleton');
            $("#td_supp49").addClass('skeleton');
            $("#td_supp50").addClass('skeleton');

            var time = null;            
            time = setTimeout(() => {
                $("#supp_record").removeClass('skeleton');
                $("#date").removeClass('skeleton');
                $("#date_").removeClass('skeleton');
                $(".cap").removeClass('skeleton');
                $(".cap2").removeClass('skeleton');
                $("#supp_tr").removeClass('skeleton');
                $("#supp_tr2").removeClass('skeleton');
                $("#supp_tr3").removeClass('skeleton');
                $("#supp_td1").removeClass('skeleton');
                $("#supp_td2").removeClass('skeleton');
                $("#supp_td3").removeClass('skeleton');
                $("#supp_td4").removeClass('skeleton');
                $("#supp_td5").removeClass('skeleton');
                $("#supp_td6").removeClass('skeleton');
                $("#supp_td7").removeClass('skeleton');
                $("#supp_td8").removeClass('skeleton');
                $("#supp_td9").removeClass('skeleton');
                $("#supp_chart").removeClass('skeleton');
                $("#chart_title").removeClass('skeleton');
                $("#supp_details").removeClass('skeleton');
                $("#tr_supp").removeClass('skeleton');
                $("#tr_supp2").removeClass('skeleton');
                $("#tr_supp3").removeClass('skeleton');
                $("#tr_supp4").removeClass('skeleton');
                $("#tr_supp5").removeClass('skeleton');
                $("#tr_supp6").removeClass('skeleton');
                $("#tr_supp7").removeClass('skeleton');
                $("#td_supp1").removeClass('skeleton');
                $("#td_supp2").removeClass('skeleton');
                $("#td_supp3").removeClass('skeleton');
                $("#td_supp4").removeClass('skeleton');
                $("#td_supp5").removeClass('skeleton');
                $("#td_supp6").removeClass('skeleton');
                $("#td_supp7").removeClass('skeleton');
                $("#td_supp8").removeClass('skeleton');
                $("#td_supp9").removeClass('skeleton');
                $("#td_supp10").removeClass('skeleton');
                $("#td_supp11").removeClass('skeleton');
                $("#td_supp12").removeClass('skeleton');
                $("#td_supp13").removeClass('skeleton');
                $("#td_supp14").removeClass('skeleton');
                $("#td_supp15").removeClass('skeleton');
                $("#td_supp16").removeClass('skeleton');
                $("#td_supp17").removeClass('skeleton');
                $("#td_supp18").removeClass('skeleton');
                $("#td_supp19").removeClass('skeleton');
                $("#td_supp20").removeClass('skeleton');
                $("#td_supp21").removeClass('skeleton');
                $("#td_supp22").removeClass('skeleton');
                $("#td_supp23").removeClass('skeleton');
                $("#td_supp24").removeClass('skeleton');
                $("#td_supp25").removeClass('skeleton');
                $("#td_supp26").removeClass('skeleton');
                $("#td_supp27").removeClass('skeleton');
                $("#td_supp28").removeClass('skeleton');
                $("#td_supp29").removeClass('skeleton');
                $("#td_supp30").removeClass('skeleton');
                $("#td_supp31").removeClass('skeleton');
                $("#td_supp32").removeClass('skeleton');
                $("#td_supp33").removeClass('skeleton');
                $("#td_supp34").removeClass('skeleton');
                $("#td_supp35").removeClass('skeleton');
                $("#td_supp36").removeClass('skeleton');
                $("#td_supp37").removeClass('skeleton');
                $("#td_supp38").removeClass('skeleton');
                $("#td_supp39").removeClass('skeleton');
                $("#td_supp40").removeClass('skeleton');
                $("#td_supp41").removeClass('skeleton');
                $("#td_supp42").removeClass('skeleton');
                $("#td_supp43").removeClass('skeleton');
                $("#td_supp44").removeClass('skeleton');
                $("#td_supp45").removeClass('skeleton');
                $("#td_supp46").removeClass('skeleton');
                $("#td_supp47").removeClass('skeleton');
                $("#td_supp48").removeClass('skeleton');
                $("#td_supp49").removeClass('skeleton');
                $("#td_supp50").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });
    });
</script>
<script>
    $(document).ready(function() {
        // Supplier details record
        $('#start_supp_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_supp_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });
    });
</script>
@endsection