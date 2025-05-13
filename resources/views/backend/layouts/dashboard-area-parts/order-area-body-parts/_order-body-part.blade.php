<div class="col-md-3">
    <div class="card to_orders mb-2 mt-2 pb-1 total_ords capsule-skeleton">
        <div class="card-body focus-color cd">
            <div class="order">
                <span class="totord">Users</span>
            </div>
            <div class="order_amount capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600">{{$usersCount['users']}}</div>
            <div class="detail de">
                <p class="form-check form-switch-position ord_detl">

                </p>
            </div>
        </div>
        <div class="progress ms-1" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-order ps-5" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card to_orders mb-2 mt-2 pb-1">
        <div class="card-body focus-color  cd">
            <div class="order">
                <span class="totord">super admin</span>
            </div>
            <div class="month_orders capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600">{{$usersCount['super_admin']}}</div>
            <div class="detail de">
                <p class="form-check form-switch-position ord_detl">
                    <span>
                        <a type="button" class="form-check-label mt-1 pt-1" for="collapseExample" id="flexSwitchCheckDefault2" data-bs-toggle="tooltip"  data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><span class="ords ps-2 pe-2">{{__('translate.Details')}}</span></a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress ms-1" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-order ps-5" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card to_orders mb-2 mt-2 pb-1 mon_ordr">
        <div class="card-body focus-color  cd">
            <div class="order">
                <span class="totord">sub admin</span>
            </div>
            <div class="pend_orders capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600">{{$usersCount['sub_admin']}}</div>
            <div class="detail de">
                <p class="form-check form-switch-position ord_detl">
                    <span>
                        <a type="button" class="form-check-label mt-1 pt-1" for="collapseExample" id="flexSwitchCheckDefault3" data-bs-toggle="tooltip"  data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><span class="ords ps-2 pe-2">{{__('translate.Details')}}</span></a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress ms-1" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-order ps-5" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card to_orders mb-2 mt-2 pb-1 yrordr">
        <div class="card-body focus-color ">
            <div class="order cd">
                <span class="totord">admin</span>
            </div>
            <div class="order_year capsule-skeleton" style="border-radius: 5px;color:black;font-weight:600">{{$usersCount['admin']}}</div>
            <div class="detail de">
                <p class="form-check form-switch-position ord_detl">
                    <span>
                        <a type="button" class="form-check-label mt-1 pt-1" for="collapseExample" id="flexSwitchCheckDefault4" data-bs-toggle="tooltip"  data-bs-placement="right" title="Click" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'><span class="ords ps-2 pe-2">{{__('translate.Details')}}</span></a>
                    </span>
                </p>
            </div>
        </div>
        <div class="progress ms-1" style="height:0.8rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-order ps-5" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
</div>
@include('backend.layouts.dashboard-area-parts.order-area-body-parts._monthly-order-details')
@include('backend.layouts.dashboard-area-parts.order-area-body-parts._monthly-pending-order')
@include('backend.layouts.dashboard-area-parts.order-area-body-parts._today-order')