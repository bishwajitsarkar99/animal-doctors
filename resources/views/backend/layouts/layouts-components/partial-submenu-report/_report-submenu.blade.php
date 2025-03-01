<!-- ================= Report ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_report {{setting('acc_report_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_report_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_report_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="acc_rep ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('acc_report_title_display')}}">{{__('translate.Accounts Report')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="report_" aria-labelledby="headingTwo" data-bs-parent="#report_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('blance_sheet_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Blance-Sheet')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('blance_sheet_visual')}}">{{__('translate.Blance Sheet')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('trial_blance_sheet_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Trial-Balance-Sheet')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('trial_blance_sheet_visual')}}">{{__('translate.Trial Balance Sheet')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('financial_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Financial-Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('financial_statement_visual')}}">{{__('translate.Financial Statement')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('income_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Income-Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('income_statement_visual')}}">{{__('translate.Income Statement')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('cash_flow_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Cash Flow-Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('cash_flow_statement_visual')}}">{{__('translate.Cash Flow Statement')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('petty_cash_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Petty Cash-Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('petty_cash_statement_visual')}}">{{__('translate.Petty Cash Statement')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('p_l_statement_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Profit or Loss Statement')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('p_l_statement_visual')}}">{{__('translate.P/L Statement')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('tabular_analycis_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Accounting Report Table Analycis')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('tabular_analycis_visual')}}">{{__('translate.Tabular Analycis')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('table_blance_sheet_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Table of Blance-Sheet')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('table_blance_sheet_visual')}}">{{__('translate.Blance Sheet Table')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('report_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Report Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('report_setting_visual')}}">{{__('translate.Report Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Monthly-Report ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_monthly_report {{setting('acc_monthly_report_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_monthly_report_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_monthly_report_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="acc_rep ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('acc_monthly_report_title_display')}}">{{__('translate.Monthly Report')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="report_" aria-labelledby="headingTwo" data-bs-parent="#report_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('monthly_report_view_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Monthly Report')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('monthly_report_view_visual')}}">{{__('translate.Monthly Report View')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('monthly_report_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('monthly_report_setting_visual')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- ================= Daily-Report ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty child_daily_report {{setting('daily_report_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="collapsed">
        <i class="fa-solid fa-plus" style="color:white;" id="plus_daily_report_link"></i>
        <i class="fa-solid fa-minus" style="color:white;" id="minus_daily_report_link" hidden></i>
    </span>
    <i class="fa-solid fa-folder-open fa-beat"></i> 
    <span class="acc_rep ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('daily_report_title_display')}}">{{__('translate.Daily Report')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="report_" aria-labelledby="headingTwo" data-bs-parent="#report_">
            <nav class="sb-sidenav-menu-nested nav child-tree">
                <a class="nav-link underline nav_space" href="{{setting('daily_report_view_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Daily Report')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('daily_report_view_visual')}}">{{__('translate.Daily Report View')}}</span>
                </a>
                <a class="nav-link underline nav_space" href="{{setting('daily_report_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-solid fa-minus" style="color:#007effc4;"></i>
                    <span class="{{setting('daily_report_setting_visual')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>

