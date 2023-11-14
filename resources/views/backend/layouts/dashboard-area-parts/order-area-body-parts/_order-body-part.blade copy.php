<div class="col-md-6">
    <div class="card to_orders mb-2 mt-2 pb-1 total_ords">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">This Year Orders</span>
            </div>
            <div class="order_amount">1500.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch ord_detl"></p>
            </div>
        </div>
        <div class="progress_login_header">
            <div id="loader" class="progress-bar progress-bar-striped progress-bar-animated bg-primary ps-5 ms-3" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card to_orders mb-2 mt-2 pb-1">
        <div class="card-body focus-color  cd">
            <div class="order">
                <span class="totord">This Month Orders</span>
            </div>
            <div class="month_orders plantform">1,96,000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch ord_detl">
                    <span class="details_btn">
                        <a type="button" class="form-check-label" for="collapseExample" id="flexSwitchCheckDefault2"><span class=" plantform ords pe-2">Details</span></a>
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
    <div class="card to_orders mb-2 mt-1 pb-1 mon_ordr">
        <div class="card-body focus-color  cd">
            <div class="order">
                <span class="totord">Monthly Pending Orders</span>
            </div>
            <div class="pend_orders plantform">26,000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch ord_detl">
                    <span>
                        <a type="button" class="form-check-label" for="collapseExample" id="flexSwitchCheckDefault3"><span class=" plantform ords pe-2">Details</span></a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress_login_header">
            <div id="loader" class="progress-bar progress-bar-striped progress-bar-animated bg-primary ps-5 ms-3 pb-1 pt-2" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card to_orders mb-2 mt-1 pb-1 yrordr">
        <div class="card-body focus-color ">
            <div class="order cd">
                <span class="totord">Today Orders</span>
            </div>
            <div class="order_year plantform">4000.00 ৳</div>
            <div class="detail de">
                <p class="form-check form-switch ord_detl">
                    <span>
                        <a type="button" class="form-check-label" for="collapseExample" id="flexSwitchCheckDefault4"><span class=" plantform ords pe-2">Details</span></a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress_login_header pb-2">
            <div id="loader" class="progress-bar progress-bar-striped progress-bar-animated bg-primary ps-5 ms-3 pb-2 pt-2" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
@include('backend.layouts.dashboard-area-parts.order-area-body-parts._monthly-order-details')
@include('backend.layouts.dashboard-area-parts.order-area-body-parts._monthly-pending-order')
@include('backend.layouts.dashboard-area-parts.order-area-body-parts._today-order')