<!-- ================= Report ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('acc_report_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="acc_rep ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('acc_report_title_display')}}">{{__('translate.Accounts Report')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="report_" aria-labelledby="headingTwo" data-bs-parent="#report_">
            <span class="{{setting('acc_report_title_display')}} report_head ms-2"><i class="fa-solid fa-folder-open fa-beat"></i> 
                <span class="{{setting('acc_report_title_display')}}">{{__('translate.Accounting Report')}}</span>
            </span>
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('blance_sheet_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Blance-Sheet')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('blance_sheet_visual')}}">{{__('translate.Blance Sheet')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('trial_blance_sheet_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Trial-Balance-Sheet')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('trial_blance_sheet_visual')}}">{{__('translate.Trial Balance Sheet')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('financial_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Financial-Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('financial_statement_visual')}}">{{__('translate.Financial Statement')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('income_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Income-Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('income_statement_visual')}}">{{__('translate.Income Statement')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('cash_flow_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Cash Flow-Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('cash_flow_statement_visual')}}">{{__('translate.Cash Flow Statement')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('petty_cash_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Petty Cash-Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('petty_cash_statement_visual')}}">{{__('translate.Petty Cash Statement')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('p_l_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Profit or Loss Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('p_l_statement_visual')}}">{{__('translate.P/L Statement')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('tabular_analycis_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Accounting Report Table Analycis')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('tabular_analycis_visual')}}">{{__('translate.Tabular Analycis')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('table_blance_sheet_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Table of Blance-Sheet')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('table_blance_sheet_visual')}}">{{__('translate.Table of Blance Sheet')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('report_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Report Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('report_setting_visual')}}">{{__('translate.Report Setting')}}</span>
                </a>
            </nav>
            <span class="report_head ms-2"><i class="fa-solid fa-folder-open fa-beat"></i> 
                <span class="{{setting('acc_monthly_report_title_display')}}">{{__('translate.Monthly Report')}}</span>
            </span>
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('monthly_report_view_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Monthly Report')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('monthly_report_view_visual')}}">{{__('translate.Monthly Report View')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('monthly_report_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('monthly_report_setting_visual')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
            <span class="report_head ms-2"><i class="fa-solid fa-folder-open fa-beat"></i> 
                <span class="{{setting('daily_report_title_display')}}">{{__('translate.Daily Report')}}</span>
            </span>
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('daily_report_view_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Daily Report')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('daily_report_view_visual')}}">{{__('translate.Daily Report View')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('daily_report_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('daily_report_setting_visual')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Monthly-Report ================= -->
<!-- <a class="nav-link_cgrMenu dropdown-toggle ty " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="click">Monthly-Report</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="report_" aria-labelledby="headingTwo" data-bs-parent="#report_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Monthly Report">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>Monthly-Report View
                </a>
                <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Setting">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>Setting
                </a>
            </nav>
        </div>
    </li>
</ul> -->
<!-- ================= Daily-Report ================= -->
<!-- <a class="nav-link_cgrMenu dropdown-toggle ty" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="click">Daily-Report </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="report_" aria-labelledby="headingTwo" data-bs-parent="#report_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Daily Report">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>Daily-Report View
                </a>
                <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Setting">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>Setting
                </a>
            </nav>
        </div>
    </li>
</ul> -->

