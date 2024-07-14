@extends('backend.layouts.home-page')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<!-- =========== ACCOUNTS MENU PAGE ============= -->
<section>
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="accounts__menu">
                <p class="smy tp text-shadow" style="text-align:center;text-decoration: underline cornflowerblue;">Accounts Menu</p>
                <div class="row">
                    <div class="col-xl-4 accounts__list">
                        <ul>
                            <li><a class="title__label" type="button" href="#">Accounting Leger</a></li>
                            <li><a class="title__label" type="button" href="#">Customer Book</a></li>
                            <li><a class="title__label" type="button" href="#">Sales</a></li>
                            <li><a class="title__label" type="button" href="#">Day Book</a></li>
                            <li><a class="title__label" type="button" href="#">Expenses Book</a></li>
                            <li><a class="title__label" type="button" href="#">Bank Book</a></li>
                            <li><a class="title__label" type="button" href="#">Petty Cash</a></li>
                            <li><a class="title__label" type="button" href="#">Vaoucher</a></li>
                            <li><a class="title__label" type="button" href="#">Asset</a></li>
                            <li><a class="title__label" type="button" href="#">Report</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-4 accounts__list">
                        <ul>
                            <li><a class="title__label" type="button" href="#">Financial Statement</a></li>
                            <li><a class="title__label" type="button" href="#">Income Statement</a></li>
                            <li><a class="title__label" type="button" href="#">P/L Statement</a></li>
                            <li><a class="title__label" type="button" href="#">Balance Sheet</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-4 accounts__list">
                        <ul>
                            <li><a class="title__label" type="button" href="{{ route('supplier.index') }}">Supplier</a></li>
                            <li><a class="title__label" type="button" href="{{ route('medicine-inventory.index') }}">Inventory - Create</a></li>
                            <li><a class="title__label" type="button" href="{{ route('inventory_details.action') }}">Inventory - Download</a></li>
                            <li><a class="title__label" type="button" href="#">Stock</a></li>
                            <li><a class="title__label" type="button" href="#">Delivery</a></li>
                            <li><a class="title__label" type="button" href="#">Employee</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</section>
<div class="row">
    <div class="col-xl-12">
        
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/accounts-department/accounts-ui.css">
@endsection
@section('script')
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
</script>
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
@endsection

