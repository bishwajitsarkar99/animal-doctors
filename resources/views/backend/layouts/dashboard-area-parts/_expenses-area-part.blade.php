<!-- =============== Expenses-Area-Part ====================== -->
<div class="card form-control form-control-sm" id="totalexpenses">
    <span class="sb-sidenav-collapse-arrow" id="orders_part" data-bs-toggle="tooltip"  data-bs-placement="top" title="{{__('translate.Expenses-Area')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <p class="form-check form-switch order_area">
            <input class="form-check-input ordrs" onclick="myExFunction()" type="checkbox" id="orders_box3" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
            <label class="form-check-label" for="collapseExample3"><span class="smy">
                <span><span class=""></span><span class="of_switch3 marg color_showup" id="span3">off</span></span>
            </label>
        </p>
        <span class="ps-1 ms-5"><div class="loader_expenses_part ms-5" id="loader_expenses_part" hidden></div></span>
    </span>
</div>
<!-- =======EXPENSES BODY PART======== -->
<div class="row collapse" id="collapseExample3">
    <div class="col-xl-12">
        <div class="row" id="expensesDisplay">
            @include('backend.layouts.dashboard-area-parts.expenses-area-body-parts._expenses-body-part')
        </div>
    </div>
    <div class="col-xl-12" id="expensesChart">
        @include('backend.layouts.dashboard-area-parts.expenses-area-body-parts._expenses-chart')
    </div>
    <div class="col-xl-12" id="">
        <div class="row" id="displayExpensesSummary">
            @include('backend.layouts.dashboard-area-parts.expenses-area-body-parts._expenses-summary-body')
        </div>
    </div>
    <div class="col-xl-6 mb-1">
        <div class="col-md-12 flip-box">
            <div class="flip-box-inner">
                <div class="card-body flip-box-front">
                    <p>{{__('translate.Expenses')}} <i class="fa-brands fa-instalod fa-beat-fade" style="color:darkcyan; font-size:small"></i></p>
                </div>
                <div class="card-body flip-box-back">
                    <p><button class="btn btn-btn-sm detls_btn" id="expenses_btn">{{__('translate.Click')}}</button></p>
                </div>
            </div>
        </div>
    </div>
</div>