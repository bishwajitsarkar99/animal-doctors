<div class="col-md-3">
    <div class="card to_orders mb-2 total_sales mt-1 pb-1 tot_order">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">{{__('translate.This Year Sales')}}</span>
            </div>
            <div class="year_sales capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600;font-family:sans-serif;">7000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch-position ord_detl"></p>
            </div>
        </div>
        <div class="progress ms-1" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-light-primary ps-5" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card to_orders mb-2 total_sales mt-1 pb-1 tod_sal">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">{{__('translate.This Month Sales')}}</span>
            </div>
            <div class="month_sales capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600;font-family:sans-serif;">50000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch-position ord_detl sl">
                    <span>
                        <a type="button" class="form-check-label mt-1 pt-1" for="collapseExample" id="flexSwitchCheckDefault6" data-bs-toggle="tooltip"  data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                            <span class="ords ps-2 pe-2">{{__('translate.Details')}}</span>
                        </a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress ms-1" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-light-primary ps-5" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card to_orders mb-2 mt-1 pb-1 total_sale month_ordr">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">{{__('translate.Total Receiveable Sales')}}</span>
            </div>
            <div class="debit_sales capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600;font-family:sans-serif;">30000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch-position ord_detl sl">
                    <span>
                        <a type="button" class="form-check-label mt-1 pt-1" for="collapseExample" id="flexSwitchCheckDefault7" data-bs-toggle="tooltip"  data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                            <span class="ords ps-2 pe-2">{{__('translate.Details')}}</span>
                        </a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress ms-1" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-light-primary ps-5" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card to_orders mb-2 mt-1 pb-1 total_sale exp_ordr">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">{{__('translate.Today Sales')}}</span>
            </div>
            <div class="today_sales capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600;font-family:sans-serif;">5000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch-position ord_detl sl">
                    <span>
                        <a type="button" class="form-check-label mt-1 pt-1" for="collapseExample" id="flexSwitchCheckDefault8" data-bs-toggle="tooltip"  data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                            <span class="ords ps-2 pe-2">{{__('translate.Details')}}</span>
                        </a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress ms-1" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-light-primary ps-5" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
@include('backend.layouts.dashboard-area-parts.sales-area-body-parts._monthly-sales-details')
@include('backend.layouts.dashboard-area-parts.sales-area-body-parts._due-sales-details')
@include('backend.layouts.dashboard-area-parts.sales-area-body-parts._today-sales-details')