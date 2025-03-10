<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item {{setting('report_title_display')}}">
        <button class="accordion-button collapsed rept_button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
            <!-- <i class="fa-solid fa-plus" style="color:white;" id="plus_report"></i>
            <i class="fa-solid fa-minus" style="color:white;" id="minus_report" hidden></i> -->
            <a class="nav-link collapsed sals_menu report_btn" id="navbarDropdown" data-bs-toggle="collapse" data-bs-target="#report_" aria-expanded="false" aria-controls="collapsePages">
                <span class="prod_label" id="Report_id" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="{{setting('report_title_display')}}">{{__('translate.Report')}}</span>
                    <span class="lock" id="report_lock">{{__('translate.Lock')}}</span>
                    <span class="unlock" id="report_unlock" hidden>{{__('translate.Unlock')}}</span>
                </span>
            </a>
            <div class="sb-sidenav-collapse-arrow ms-auto icon-size">▼</div>
        </button>
        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
            <div class="tree">
                <div class="accordion-body sub_box">
                    <!-- ================== Daily-Report ======================= -->
                    @include('backend.layouts.layouts-components.partial-submenu-report._report-submenu')
                </div>
            </div>
        </div>
    </div>
</div>