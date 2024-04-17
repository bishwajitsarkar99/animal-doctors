<div class="row mt-3">
    <div class="accordion-body">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-body focus-color cd cat_form">
                    <div class="row">
                        <div class="col-6">
                            <!-- Search Form -->
                            <form method="GET" action="{{ route('newsletter_filter.action') }}" id="searchForm">
                                <span class="tol_ord mt-1">
                                    @error('start_date')
                                        <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    @enderror
                                    <label for="expenses" class="text-success skeleton" style="font-weight: 700;">{{__('translate.Start Date')}} :</label>
                                    <input id="start_date" type="text" name="start_date" class="select_dateOne bg-filter" style="font-weight: 700;" placeholder="DD-MM-YYYY" />
                                </span>
                                <span class="tol_ord mt-1 date-media">
                                    @error('end_date')
                                        <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    @enderror
                                    <label for="expenses" class="text-success skeleton" style="font-weight: 700;">{{__('translate.End Date')}} :</label>
                                    <input id="end_date" type="text" name="end_date" class="select_dateOne bg-filter" style="font-weight: 700;" placeholder="DD-MM-YYYY" />
                                </span>
                                <button type="submit" class="btn btn-sm btn-success ord_btn ms-" style="line-height: 0.1;" id="filter">
                                    <i class="search-order-icon fa fa-spinner fa-spin search-order-hidden"></i>
                                    <span class="btn-text">Search</span>
                                    <span class="search-signal"></span>
                                </button>
                            </form>
                        </div>
                        <div class="col-6 history_box mobile-responsive">
                            <!-- History Buttons -->
                            <a type="button" class="btn btn-sm btn-success ord_btn histoy" id="history">
                                <span class="history-signal"></span>
                                <span class="btn-text">History</span>
                            </a> 
                            <div class="ms-3">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-success dropdown-toggle ord_btn exportDropdown" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="export-signal history-signal-classic-hidden"></span>
                                        Export
                                        <i class="fa-solid fa-cloud-arrow-down"></i>
                                    </button>
                                    <ul class="dropdown-menu export-dropdown-menu" aria-labelledby="exportDropdown">
                                        <li>
                                            <a class="dropdown-item btn btn-sm btn-success ord_btn exportPdf" href="{{ route('forntend_footer_newletter_pdf.action', request()->input()) }}" id="export">
                                                <span class="pdf" id="pdfText"></span>
                                                <span class="icon" id="pdfIcon"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item btn btn-sm btn-success ord_btn" href="{{ route('forntend_footer_newletter_excel.action', request()->input()) }}" id="exportExcel">
                                                <span class="excel" id="excelText"></span>
                                                <span class="icon" id="excelIcon"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item btn btn-sm btn-success ord_btn printBtn" href="{{ route('forntend_footer_newletter_cvs_file.action', request()->input()) }}" id="exportCsv">
                                                <span class="cvs" id="cvsText"></span>
                                                <span class="icon" id="csvIcon"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a type="button" class="dropdown-item btn btn-sm btn-success ord_btn printBtn" id="printBtn" name="print">
                                                <span class="print" id="printText"></span>
                                                <span class="icon" id="printIcon"></span>
                                            </a> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Refresh Buttons -->
                            <a href="" type="button" class="btn btn-sm btn-success ord_btn" id="refresh" name="refresh">
                                <i class="search-refresh-icon fa fa-spinner fa-spin search-refresh-hidden"></i>
                                <span class="btn-text">Refresh</span>
                                <span class="refresh-signal"></span>
                            </a> 
                        </div>
                    </div>
                    <div class="row mt-2 result_box">
                        
                        <div class="col-6">
                            <table>
                                <tbody>
                                    <tr class="current_filter bg-filter table-row-display">
                                        <td class="table-cell">
                                            <label class="total-newsletter-search ms-2" for="data_filter"> Current Data Filtering :</label>
                                        </td>
                                        <td class="table-cell">
                                            <span class="total_num ms-1">{{$allnewsletters->count()}} .00</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <table>
                                <tbody>
                                    <tr class="total_newsletter_records bg-filter table-row-display">
                                        <td class="table-cell">
                                            <label class="total-newsletter-search ms-2" for="tot_subscriber"> Total Subscriber :</label>
                                        </td>
                                        <td class="table-cell">
                                            <span class="total_num ms-1"> {{$allnewsletter_counts_number}} .00</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Newsletter Table -->
                    <div class="table-responsive">
                        <table class="table table-striped ord_table center border-1 mt-2 bg-filter">
                            <tr class="table-row order_body acc_setting_table">
                                <th class="table_th_color txt col ps-1 pt-1">ID</th>
                                <th class="table_th_color txt ps-1 pt-1" style="text-align: center;">Subscription Date</th>
                                <th class="table_th_color tot_pending_ ps-1 pt-1">Email</th>
                            </tr>
                            <tbody class="bg-transparent">
                                @if(count($allnewsletters) > 0)
                                    @foreach($allnewsletters as $item)
                                        <tr class="table-row user-table-row">
                                            <td class="in border_ord">{{ $item->id }}</td>
                                            <td class="sn border_ord" style="text-align: center;">
                                                {{ $item->created_at->format('d l M Y h:i:sA') }}
                                            </td>
                                            <td class="txt_ ps-1">{{ $item->email }}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr class="bg-filter">
                                        <td class="error_data" align="center" text-danger colspan="3">
                                            Today, the collection Of subscriber email is not exists on server !
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row table_last_row">
                        <div class="col-12" style="text-align: end;">
                            @if(count($allnewsletters) > 0)
                                <span class="tot_summ post_res">
                                    <label class="total-newsletter-search  mt-3 pt-2" for="tot_cagt" style="font-size: 12px; color:black;"> Data Filtering time : 
                                        <?php
                                            $timezone = date_default_timezone_get();
                                            ?>
                                            <?php
                                            date_default_timezone_set('Asia/Dhaka');
                                            echo date('d l M Y') . " - ";
                                            echo date("h:i:sA");
                                        ?>
                                    </label>
                                </span>
                                @else
                                <span class="text-danger">
                                    There is no data filtering.
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
