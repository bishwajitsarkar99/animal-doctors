<!-- =============== Sales-Area-Part ====================== -->
<div class="card form-control form-control-sm mb-1 mt-1" id="totalsales">
    <span class="sb-sidenav-collapse-arrow" id="orders_part" data-bs-toggle="tooltip"  data-bs-placement="top" title="{{__('translate.Sales-Area')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <p class="form-check form-switch order_area">
            <input class="form-check-input ordrs" onclick="mySlFunction()" type="checkbox" id="orders_box2" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
            <label class="form-check-label" for="collapseExample2"><span class="smy">
                <span><span class=""></span><span class="of_switch2 marg color_showup" id="span2">off</span></span>
            </label>
        </p>
        <span class="ps-1 ms-5"><div class="loader_sales_part ms-5" id="loader_sales_part" hidden></div></span>
    </span>
</div>
<!-- =======SALES BODY PART======== -->
<div class="row collapse" id="collapseExample2">
    <div class="col-xl-12">
        <div class="row" id="dispaySales">
            @include('backend.layouts.dashboard-area-parts.sales-area-body-parts._sales-body-part')
        </div>
    </div>
    <div class="col-xl-12" id="dispaySalesChart">
        @include('backend.layouts.dashboard-area-parts.sales-area-body-parts._sales-chart')
    </div>
    <div class="col-xl-12">
        <div class="row" id="displaysalesSummary">
        @include('backend.layouts.dashboard-area-parts.sales-area-body-parts._sales-summary-body')
        </div>
    </div>
    <div class="col-xl-6 mb-1">
        <div class="col-md-12 flip-box">
            <div class="flip-box-inner">
                <div class="card-body flip-box-front">
                    <p>{{__('translate.Sales')}} <i class="fa-brands fa-instalod fa-beat-fade" style="color:darkcyan; font-size:small"></i></p>
                </div>
                <div class="card-body flip-box-back">
                    <p><button class="btn btn-btn-sm detls_btn" id="salesDetls_btn">{{__('translate.Click')}}</button></p>
                </div>
            </div>
        </div>
    </div>
</div>