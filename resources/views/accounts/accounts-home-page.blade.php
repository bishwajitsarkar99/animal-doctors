@extends('backend.layouts.home-page')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<!-- =========== ACCOUNTS MENU PAGE ============= -->
<section>
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col-xl-10">
            <div class="accounts__menu pb-4">
                <p class="smy tp text-shadow" style="text-align:center;text-decoration: underline cornflowerblue;">Accounts Menu</p>
                <div class="row">
                    <!-- Accounting -->
                    <div class="col-xl-3 accounts__list">
                        <div class="accordion accordion-flush" id="accordionFlushExample1">
                            <div class="accordion-item ms-3">
                                <h2 class="accordion-header" id="flush-heading-accounts">
                                    <button class="accordion-button collapsed accounts__template__name accBtn" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-accounts-menu" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <span class="sb-sidenav-collapse-arrow menu__icon ps-1">▼</span><span class="ps-1">Accounts</span>
                                    </button>
                                </h2>
                                <div id="flush-collapse-accounts-menu" class="accordion-collapse collapse" aria-labelledby="flush-heading-accounts" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body sub__box">
                                        <span class="parent_group_three"><i class="fa-regular fa-folder-open"></i> Accounting</span>
                                        <ul style="margin-top: -6px;margin-bottom: 0.2rem;">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Report -->
                    <div class="col-xl-3 accounts__list">
                        <div class="accordion accordion-flush" id="accordionFlushExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-report">
                                <button class="accordion-button collapsed accounts__template__name reporBtn" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-report-menu" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <span class="sb-sidenav-collapse-arrow menu__icon ps-1">▼</span><span class="ps-1">Report</span>
                                </button>
                                </h2>
                                <div id="flush-collapse-report-menu" class="accordion-collapse collapse" aria-labelledby="flush-heading-report" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body sub__box">
                                        <span class="parent_group_three"><i class="fa-regular fa-folder-open"></i> Accounting Report</span>
                                        <ul style="margin-top: -6px;margin-bottom: 0.2rem;">
                                            <li><a class="title__label" type="button" href="#">Financial Statement</a></li>
                                            <li><a class="title__label" type="button" href="#">Income Statement</a></li>
                                            <li><a class="title__label" type="button" href="#">P/L Statement</a></li>
                                            <li><a class="title__label" type="button" href="#">Balance Sheet</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Stock -->
                    <div class="col-xl-3 accounts__list">
                        <div class="accordion accordion-flush" id="accordionFlushExample3">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-stock">
                                <button class="accordion-button collapsed accounts__template__name stckBtn" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-stock-menu" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <span class="sb-sidenav-collapse-arrow menu__icon ps-1">▼</span><span class="ps-1">Stock</span>
                                </button>
                                </h2>
                                <div id="flush-collapse-stock-menu" class="accordion-collapse collapse" aria-labelledby="flush-heading-stock" data-bs-parent="#accordionFlushExample3">
                                    <div class="accordion-body sub__box">
                                        <span class="parent_group_three"><i class="fa-regular fa-folder-open"></i> Supplier</span>
                                        <ul style="margin-top: -6px;margin-bottom: 0.2rem;">
                                            <li>
                                                <a class="title__label" type="button" href="{{ route('supplier.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    Create
                                                </a>
                                            </li>
                                            <li>
                                                <a class="title__label" type="button" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'> 
                                                    Details
                                                </a>
                                            </li>
                                            <li>
                                                <a class="title__label" type="button" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'> 
                                                    Requisition
                                                </a>
                                            </li>
                                        </ul>
                                        <span class="parent_group_three"><i class="fa-regular fa-folder-open"></i> Inventory</span>
                                        <ul style="margin-top: -6px;margin-bottom: 0.2rem;">
                                            <li>
                                                <a class="title__label" type="button" href="{{ route('medicine-inventory.index') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    Create
                                                </a>
                                            </li>
                                            <li>
                                                <a class="title__label" type="button" href="{{ route('inventory_details.action') }}" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    Download
                                                </a>
                                            </li>
                                        </ul>
                                        <span class="parent_group_three"><i class="fa-regular fa-folder-open"></i> Stock</span>
                                        <ul style="margin-top: -6px;margin-bottom: 0.2rem;">
                                            <li>
                                                <a class="title__label" type="button" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    Stock-Book
                                                </a>
                                            </li>
                                            <li>
                                                <a class="title__label" type="button" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    Stock-Adjustment
                                                </a>
                                            </li>
                                            <li>
                                                <a class="title__label" type="button" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    Damage-Stock
                                                </a>
                                            </li>
                                            <li>
                                                <a class="title__label" type="button" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    Stock-Summary
                                                </a>
                                            </li>
                                            <li>
                                                <a class="title__label" type="button" href="#" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    Stock-Report
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product -->
                    <div class="col-xl-3 accounts__list">
                        <div class="accordion accordion-flush me-3" id="accordionFlushExample4">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed accounts__template__name prodBtn" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <span class="sb-sidenav-collapse-arrow menu__icon ps-1">▼</span><span class="ps-1">Product</span>
                                </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample4">
                                    <div class="accordion-body sub__box">
                                        <ul>
                                            <li><a class="title__label" type="button" href="#">Delivery</a></li>
                                            <li><a class="title__label" type="button" href="#">Employee</a></li>
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1"></div>
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
@include('accounts.home-page-ajax.ajax')
@endsection

