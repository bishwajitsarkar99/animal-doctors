@if(auth()->user()->role ==1)
<div class="col-xl-2 col-md-6">
    <!-- =========== Total Order ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus" id="totalOrder_box">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left skeleton">
            <span class="text-order"><i class="fa-solid fa-layer-group"></i></span>
                Total-Orders
            </span>
            <div class="ring-div skeleton">
                <div class="total-order-loader skeleton">
                    <span class="total-number">70% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title skeleton">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress skeleton" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-order progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Pending Order ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus" id="totalPending_box">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left skeleton">
                <span class="text-pending"><i class="fa-solid fa-layer-group"></i></span>
                Pending
            </span>
            <div class="ring-div skeleton">
                <div class="total-pending-loader skeleton">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title skeleton">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress skeleton" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-pending progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Complete Order ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus" id="completeOrder">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left skeleton">
                <span class="text-success"><i class="fa-solid fa-layer-group"></i></span>
                Complete
            </span>
            <div class="ring-div skeleton">
                <div class="total-complete-loader skeleton">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title skeleton">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress skeleton" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Reject Order ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus" id="rejectOrder">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left skeleton">
                <span class="text-danger"><i class="fa-solid fa-layer-group"></i></span>
                Reject
            </span>
            <div class="ring-div skeleton">
                <div class="total-reject-loader skeleton">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title skeleton">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress skeleton" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Total Sales ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus" id="totalSales">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left skeleton">
                <span class="text-primary"><i class="fa-solid fa-layer-group"></i></span>
                Total Sales
            </span>
            <div class="ring-div skeleton">
                <div class="total-sales-loader skeleton">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title skeleton">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress skeleton" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Total Expenses ============== -->
    <div class="card card-body border-left-primary mb-1 card_focus" id="totalExpenses">
        <div class="card card-head-title align-items-center justify-content-center">
            <span class="align-items-left justify-content-left skeleton">
                <span class="text-expenses"><i class="fa-solid fa-layer-group"></i></span>
                Expenses
            </span>
            <div class="ring-div skeleton">
                <div class="total-expenses-loader skeleton">
                    <span class="total-number">50% </span>
                </div>
            </div>
        </div>
        <span class="card-head-title skeleton">2,20,500 <span class="number symbl pe-1" id="order_counter2">৳</span></span>
        <div class="progress skeleton" style="height:0.3rem;">
            <div class="progress-bar progress-bar-striped bg-expenses progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                
            </div>
        </div>
    </div>
</div>
@endif

@if(auth()->user()->role ==2)
<div class="row">
    <div class="col-xl-2 col-md-6">
        <!-- =========== Total Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="totalOrder_box">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order font-effect-shadow-multiple skeleton">
                            {{__('translate._Orders (Monthly)')}}
                        </div>
                        <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" id="order_counter" data-val="200">0000</span><span class="number symbl pe-1" id="order_counter2">৳</span></div>
                    </div>
                    <div class="col-auto skeleton">
                        <i class="fa-solid fa-calendar-plus fa-2x fa-beat" id="ordericon" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Pending Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="totalPending_box">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order skeleton ps-1">
                            {{__('translate._Pending (Orders)')}}
                        </div>
                        <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto skeleton">
                        <i class="fa-solid fa-calendar-day fa-2x fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Complete Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="completeOrder">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order skeleton">
                            {{__('translate.Complete (Orders)')}}
                        </div>
                        <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto skeleton">
                        <i class="fa-solid fa-calendar-check fa-2x fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Reject Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="rejectOrder">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order skeleton ps-1">
                            {{__('translate._Rejected (Orders)')}}
                        </div>
                        <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto skeleton">
                        <i class="fa-solid fa-calendar-xmark fa-2x text-gray-300 fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(auth()->user()->role ==3)
<div class="row">
    <div class="col-xl-2 col-md-6">
        <!-- =========== Total Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="totalOrder_box">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order font-effect-shadow-multiple skeleton">
                            {{__('translate._Orders (Monthly)')}}
                        </div>
                        <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" id="order_counter" data-val="200">0000</span><span class="number symbl pe-1" id="order_counter2">৳</span></div>
                    </div>
                    <div class="col-auto skeleton">
                        <i class="fa-solid fa-calendar-plus fa-2x fa-beat" id="ordericon" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Pending Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="totalPending_box">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order skeleton ps-1">
                            {{__('translate._Pending (Orders)')}}
                        </div>
                        <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto skeleton">
                        <i class="fa-solid fa-calendar-day fa-2x fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Complete Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="completeOrder">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order skeleton">
                            {{__('translate.Complete (Orders)')}}
                        </div>
                        <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto skeleton">
                        <i class="fa-solid fa-calendar-check fa-2x fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-6">
        <!-- =========== Reject Order ============== -->
        <div class="card border-left-primary mb-4 card_focus skeleton" id="rejectOrder">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase order skeleton ps-1">
                            {{__('translate._Rejected (Orders)')}}
                        </div>
                        <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                    </div>
                    <div class="col-auto skeleton">
                        <i class="fa-solid fa-calendar-xmark fa-2x text-gray-300 fa-beat" style="color: #ddd;font-size:20px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif