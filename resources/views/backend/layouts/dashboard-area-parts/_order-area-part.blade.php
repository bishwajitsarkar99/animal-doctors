<!-- =============== Order-Area-Part ====================== -->
<div class="card form-control form-control-sm" id="totalOrder">
    <span class="sb-sidenav-collapse-arrow" id="orders_part" data-bs-toggle="tooltip"  data-bs-placement="top" title="{{__('translate.Orders-Area')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="form-check form-switch order_area">
            <input class="form-check-input ordrs" onclick="myOrderFunction()" type="checkbox" id="orders_box" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <label class="form-check-label" for="collapseExample"><span class="smy">
                <span><span class=""><span class="of_switch marg color_showup" id="span1">off</span></span>
            </label>
        </span>
        <span class="ps-1 ms-5">
            <div class="loader_order_part ms-5" id="order_part_loader" hidden></div>
        </span>
    </span>
</div>
<!-- =======ORDER BODY PART======== -->
<div class="row collapse" id="collapseExample">
    <div class="col-xl-12">
        <div class="row" id="displayOrder">
            @include('backend.layouts.dashboard-area-parts.order-area-body-parts._order-body-part')

        </div>
    </div>
    <div class="col-xl-12" id="orderChart">
        @include('backend.layouts.dashboard-area-parts.order-area-body-parts._order-chart')
    </div>
    <div class="col-xl-12">
        <div class="row" id="displaySummary">
            @include('backend.layouts.dashboard-area-parts.order-area-body-parts._order-summary-body')
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="col-md-12 flip-box">
                <div class="flip-box-inner">
                    <div class="card-body flip-box-front">
                        <p>{{__('translate.Order')}} <i class="fa-brands fa-instalod fa-beat-fade" style="color:darkcyan; font-size:small"></i></p>
                    </div>
                    <div class="card-body flip-box-back">
                        <p><button class="btn btn-btn-sm detls_btn" id="onclick">{{__('translate.Click')}}</button></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>