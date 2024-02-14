@if(auth()->user()->role ==1)
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
                    <i class="fa-solid fa-calendar-plus fa-2x fa-beat" id="ordericon" style="color: #bfbfbff2; font-size:20px;"></i>
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
                    <div class="text-xs font-weight-bold text-uppercase order skeleton">
                        {{__('translate._Pending (Orders)')}}
                    </div>
                    <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                </div>
                <div class="col-auto skeleton">
                    <i class="fa-solid fa-calendar-day fa-2x fa-beat" style="color: #ddd; font-size:20px;"></i>
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
                    <i class="fa-solid fa-calendar-check fa-2x fa-beat" style="color: #bfbdbd;font-size:20px;"></i>
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
<div class="col-xl-2 col-md-6">
    <!-- =========== Total Sales ============== -->
    <div class="card border-left-primary mb-4 card_focus skeleton" id="totalSales">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase sales skeleton">
                        {{__('translate.All-Sales (Monthly)')}}
                    </div>
                    <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                </div>
                <div class="col-auto skeleton">
                    <i class="fa-solid fa-cart-arrow-down fa-2x fa-beat" style="color: darkgray;font-size:20px;"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-2 col-md-6">
    <!-- =========== Total Expenses ============== -->
    <div class="card border-left-primary mb-4 card_focus skeleton" id="totalExpenses">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase expenses skeleton ps-1">
                        {{__('translate.Expenses (Monthly)')}}
                    </div>
                    <div class="cu_amu tg skeleton capsule-skeleton"><span class="num ps-1 number skeleton" data-val="200">0000</span><span class="number symbl pe-1">৳</span></div>
                </div>
                <div class="col-auto skeleton">
                    <i class="fa-brands fa-buromobelexperte fa-2x fa-beat" style="color: purple;font-size:20px;"></i>
                </div>
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