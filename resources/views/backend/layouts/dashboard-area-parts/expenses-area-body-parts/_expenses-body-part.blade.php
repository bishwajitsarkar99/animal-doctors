<div class="col-md-6">
    <div class="card mb-2 pb-1 to_orders total_expenses mt-2 total_ords">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">{{__('translate.Total Expenses')}}</span>
            </div>
            <div class="tot_exp capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600">90000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch ord_detl sl">

                </p>
            </div>
        </div>
        <div class="progress_login_header">
            <div id="loader" class="progress-bar progress-bar-striped progress-bar-animated bg-primary ps-5 ms-3" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card to_orders mb-2 pb-1 total_expenses mt-2 today_exr total_ords">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">{{__('translate.This Month Expenses')}}</span>
            </div>
            <div class="tot_exp capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600">50000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch ord_detl sl">
                    <span>
                        <a type="button" class="form-check-label mt-1 pt-1" for="collapseExample" id="flexSwitchCheckDefault10" data-bs-toggle="tooltip"  data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                            <span class=" plantform ords ps-2 pe-2">{{__('translate.Details')}}</span>
                        </a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress_login_header">
            <div id="loader" class="progress-bar progress-bar-striped progress-bar-animated bg-primary ps-5 ms-3" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card to_orders mb-2 mt-1 pb-1 total_expense mon_ordr">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">{{__('translate.Total Payable Expenses')}}</span>
            </div>
            <div class="pend_exp capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600">15000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch ord_detl sl">
                    <span>
                        <a type="button" class="form-check-label mt-1 pt-1" for="collapseExample" id="flexSwitchCheckDefault11" data-bs-toggle="tooltip"  data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                            <span class=" plantform ords ps-2 pe-2">{{__('translate.Details')}}</span>
                        </a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress_login_header">
            <div id="loader" class="progress-bar progress-bar-striped progress-bar-animated bg-primary ps-5 ms-3" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card to_orders mb-2 pb-1 mt-1 total_expense yrordr">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">{{__('translate.Today Expenses')}}</span>
            </div>
            <div class="tot_todayexpen capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600">20000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch ord_detl sl">
                    <span>
                        <a type="button" class="form-check-label mt-1 pt-1" for="collapseExample" id="flexSwitchCheckDefault12" data-bs-toggle="tooltip"  data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                            <span class=" plantform ords ps-2 pe-2">{{__('translate.Details')}}</span>
                        </a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress_login_header">
            <div id="loader" class="progress-bar progress-bar-striped progress-bar-animated bg-primary ps-5 ms-3" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
@include('backend.layouts.dashboard-area-parts.expenses-area-body-parts._monthly-expenses-details')
@include('backend.layouts.dashboard-area-parts.expenses-area-body-parts._payable-expenses-details')
@include('backend.layouts.dashboard-area-parts.expenses-area-body-parts._today-expenses-details')