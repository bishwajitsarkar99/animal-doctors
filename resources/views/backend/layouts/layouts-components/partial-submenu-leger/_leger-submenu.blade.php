<!-- ================= Daybook ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('day_book_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('day_book_title_display')}}">{{__('translate.Day Book')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="leger_id" aria-labelledby="headingTwo" data-bs-parent="#leger_id">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('day_book_entry_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Day-Book Entry')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('day_book_entry_visual')}}">{{__('translate.Entry Day-Book')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('day_book_view_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Day-Book Details')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('day_book_view_visual')}}">{{__('translate.Entry View-Book')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('day_book_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Day-Book Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('day_book_setting_visual')}}">{{__('translate.Setting Day-Book')}}</span>
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Expenses/Payable ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('expenses_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('expenses_title_display')}}">{{__('translate.Expenses Book')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="leger_id" aria-labelledby="headingTwo" data-bs-parent="#leger_id">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('type_of_expenses_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Payment Type')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('type_of_expenses_visual')}}">{{__('translate.Type Of Expenses')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('add_expenses_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Payment Add')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('add_expenses_visual')}}">{{__('translate.ADD Expenses')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('list_expenses_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Payment Details')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('list_expenses_visual')}}">{{__('translate.List Of Expenses')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('setting_expenses_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Payment Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('setting_expenses_visual')}}">{{__('translate.Expenses Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>

<!-- ================= Customer ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('customer_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('customer_title_display')}}">{{__('translate.Customer')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="leger_id" aria-labelledby="headingTwo" data-bs-parent="#leger_id">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('add_customer_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Customer Add')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('customer_visual')}}">{{__('translate.ADD Customer')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('customer_due_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Customer Due List')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('customer_due_visual')}}">{{__('translate.Customer Due List')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('customer_details_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Customer Payable Record')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('customer_details_visual')}}">{{__('translate.Customer Details Record')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('customer_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Customer Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('customer_setting_visual')}}">{{__('translate.Customer Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>

<!-- ================= Petty-Cash ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('petty_cash_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('petty_cash_title_display')}}">{{__('translate.Petty Cash')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="leger_id" aria-labelledby="headingTwo" data-bs-parent="#leger_id">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('add_petty_cash_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Petty Cash Entry Book')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('petty_cash_visual')}}">{{__('translate.Petty Cash Entry')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('all_transaction_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Petty Cash Record')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('all_transaction_visual')}}">{{__('translate.All Transaction')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('petty_cash_details_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Petty Cash Details')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('petty_cash_details_visual')}}">{{__('translate.Petty Cash Details')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('petty_cash_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Petty Cash Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('petty_cash_setting_visual')}}">{{__('translate.Petty Cash Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>

<!-- ================= Bank-Transaction ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('bank_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('bank_title_display')}}">{{__('translate.Bank')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="leger_id" aria-labelledby="headingTwo" data-bs-parent="#leger_id">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('add_list_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Bank List')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('list_visual')}}">{{__('translate.ADD List')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('bank_transaction_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Banking Transaction')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('bank_transaction_visual')}}">{{__('translate.Bank Transaction')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('details_record_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Bank Details')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('details_record_visual')}}">{{__('translate.Details Record')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('bank_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Transaction Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('bank_setting_visual')}}">{{__('translate.Setting')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>

<!-- ================= Tax/VAT ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty {{setting('tax_vat_title_display')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        <span class="{{setting('tax_vat_title_display')}}">{{__('translate.TAX/VAT')}}</span>
    </span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="leger_id" aria-labelledby="headingTwo" data-bs-parent="#leger_id">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{setting('add_tax_vat_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Tax Or VAT Add')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('tax_vat_visual')}}">{{__('translate.ADD Tax/Vat')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('list_vat_tax_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Tax Or VAT List')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('list_vat_tax_visual')}}">{{__('translate.List Of Tax/Vat')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('details_records_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Tax Or VAT Detals Record')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('details_records_visual')}}">{{__('translate.Details Record')}}</span>
                </a>
                <a class="nav-link underline" href="{{setting('vat_tax_setting_link')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Tax Or VAT Setting')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>
                    <span class="{{setting('vat_tax_setting_visual')}}">{{__('translate.Setting Tax/Vat')}}</span>
                </a>
            </nav>
        </div>
    </li>
</ul>