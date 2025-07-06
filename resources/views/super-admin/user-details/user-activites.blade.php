<?php
    $tableHeads = [
        ['label'=>'ID', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;width:30px;', 'dataColumn'=>'id', 'dataOrder'=>'desc', 'thClass'=>'table_th_color txt ps-2 pe-1 label-svg', 'thAttribute'=>'', 'svgLable'=>'label-svg'], 
        ['label'=>'Name', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;', 'dataColumn'=>'name', 'dataOrder'=>'desc', 'thClass'=>'table_th_color txt ps-1 label-svg', 'thAttribute'=>'hidden', 'svgLable'=>'label-svg'], 
        ['label'=>'Email', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;width:450px;', 'dataColumn'=>'email', 'dataOrder'=>'desc', 'thClass'=>'table_th_color txt ps-1 label-svg', 'thAttribute'=>'', 'svgLable'=>'label-svg'], 
        ['label'=>'IP', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;text-align: left;width:40px;', 'dataColumn'=>'ip_address', 'dataOrder'=>'desc', 'thClass'=>'table_th_color tot_pending_ ps-1 label-svg', 'thAttribute'=>'', 'svgLable'=>'label-svg'], 
        ['label'=>'User Agent', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;text-align: left;', 'dataColumn'=>'user_agent', 'dataOrder'=>'desc', 'thClass'=>'table_th_color tot_pending_ ps-1 label-svg', 'thAttribute'=>'hidden', 'svgLable'=>'label-svg'], 
        ['label'=>'Payload', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;text-align: center;width:40px;', 'dataColumn'=>'payload', 'dataOrder'=>'desc', 'thClass'=>'table_th_color tot_pending_ ps-1 label-svg', 'thAttribute'=>'', 'svgLable'=>'label-svg'], 
        ['label'=>'Last_activity', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;text-align: left;', 'dataColumn'=>'last_activity', 'dataOrder'=>'desc', 'thClass'=>'table_th_color tot_pending_ ps-1 label-svg', 'thAttribute'=>'hidden', 'svgLable'=>'label-svg'], 
        ['label'=>'Login', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;text-align: left;width:120px;', 'dataColumn'=>'login', 'dataOrder'=>'desc', 'thClass'=>'table_th_color tot_pending_ ps-1 label-svg', 'thAttribute'=>'', 'svgLable'=>'label-svg'], 
        ['label'=>'Logout', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;width:120px;', 'dataColumn'=>'logout', 'dataOrder'=>'desc', 'thClass'=>'table_th_color tot_pending_ ps-1 label-svg', 'thAttribute'=>'', 'svgLable'=>'label-svg'], 
        ['label'=>'Activity', 'headId'=>'th_sort', 'headStyle'=>'background-color: white;cursor: pointer;padding: 2px;width:80px;', 'dataColumn'=>'last_activity', 'dataOrder'=>'desc', 'thClass'=>'table_th_color tot_pending_ ps-1 label-svg', 'thAttribute'=>'', 'svgLable'=>'label-svg'],
    ];
    $dateInputs = [
        'boxClass'=>'input-search-box', 'iconClass'=>'icon-box', 'svgWidth'=>'18', 'svgHeight'=>'18', 'svgStroke'=>'white', 'svgStrokeWidth'=>'2', 'svgFill'=>'rgb(170, 170, 170)',
        'category'=>'text', 'classification'=>'date form-control form-control-sm', 'startLabelName'=>'start_date', 'endLabelName'=>'end_date', 'startLabelPlaceHolder'=>'From:DD-MM-YYYY', 'endLabelPlaceHolder'=>'To:DD-MM-YYYY', 'startNameId'=>'date_start', 'endNameId'=>'date_end', 'labelAutocomplete'=>'off',
    ];
?>
@if($user_activity_authorize == 1)
    @if($user_log_data_table_permission == 1)
        <div class="container table-container-card">
            <div class="row">
                <div class="col-xl-2">
                    <x-Inputs.DateInput.DateInputField inputBoxClass="{{ $dateInputs['boxClass'] }}" iconBoxClass="{{ $dateInputs['iconClass'] }}" dateSvgWidth="{{ $dateInputs['svgWidth'] }}" dateSvgHeight="{{ $dateInputs['svgHeight'] }}" dateSvgStroke="{{ $dateInputs['svgStroke'] }}" dateSvgStrokeWidth="{{ $dateInputs['svgStrokeWidth'] }}" dateSvgFillColor="{{ $dateInputs['svgFill'] }}" 
                        inputType="{{ $dateInputs['category'] }}" inputClass="{{ $dateInputs['classification'] }}" inputName="{{ $dateInputs['startLabelName'] }}" inputPlaceHolder="{{ $dateInputs['startLabelPlaceHolder'] }}" inputId="{{ $dateInputs['startNameId'] }}" inputAutocomplete="{{ $dateInputs['labelAutocomplete'] }}"
                    />
                </div>
                <div class="col-xl-2">
                    <x-Inputs.DateInput.DateInputField inputBoxClass="{{ $dateInputs['boxClass'] }}" iconBoxClass="{{ $dateInputs['iconClass'] }}" dateSvgWidth="{{ $dateInputs['svgWidth'] }}" dateSvgHeight="{{ $dateInputs['svgHeight'] }}" dateSvgStroke="{{ $dateInputs['svgStroke'] }}" dateSvgStrokeWidth="{{ $dateInputs['svgStrokeWidth'] }}" dateSvgFillColor="{{ $dateInputs['svgFill'] }}" 
                        inputType="{{ $dateInputs['category'] }}" inputClass="{{ $dateInputs['classification'] }}" inputName="{{ $dateInputs['endLabelName'] }}" inputPlaceHolder="{{ $dateInputs['endLabelPlaceHolder'] }}" inputId="{{ $dateInputs['endNameId'] }}" inputAutocomplete="{{ $dateInputs['labelAutocomplete'] }}"
                    />
                </div>
                <div class="col-xl-3" style="justify-content:start;display:flex;padding-top:2px;">
                    <x-Dropdown.FilterBox filterBox="filter-box" filterWidth="24" filterHeight="18" filterStroke="rgb(170, 170, 170)" filterStrokeWidth="2" filterFill="white" />
                    <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm select2" menuName="role" menuId="select_role" menuSelectLabel="Select Role">
                        @foreach($roles as $item)
                            <option value="{{$item->id}}">{{ $item->name}}</option>
                        @endforeach
                    </x-Dropdown.DropdownMenu>
                </div>
                <div class="col-xl-5">
                    <x-Inputs.SearchInput.Search parentClass="input-search-box" childClass="icon-box" searchSvgWidth="20" searchSvgHeight="20" searchSvgFill="white" searchSvgStroke="rgb(170, 170, 170)" searchSvgStrokeWidth="2" 
                        searchClass="form-control form-control-sm font-weight" searchType="search" searchName="search" searchPlaceHolder="User Search" searchId="search" searchValue=""
                    />
                </div>
            </div>
            <div class="table-loader-wrapper position-relative">
                <x-Tables.TableComponent tableResponsiveClass="table-light activity-table-responsive">
                    <x-Tables.Table tableParentClass="bg-white table-light ord_table center border-1 mt-2 table-custom">
                        <x-Tables.TableHead>
                            <x-Tables.HeadRow tableHeadRowClass="table-light table-row order_body acc_setting_table" />
                            @foreach($tableHeads as $data)
                                <th id="{{ $data['headId'] }}" style="{{ $data['headStyle'] }}"
                                    data-coloumn="{{ $data['dataColumn'] }}" data-order="{{ $data['dataOrder'] }}"
                                    class="{{ $data['thClass'] }}" {!! $data['thAttribute'] ?: '' !!}>
                                    <span class="{{ $data['svgLable'] }}">
                                        {{$data['label']}}
                                        <x-Tables.TableHeadSvg svgWidth="12px" svgHeight="12px" svgFillColor="#333333a1" />
                                    </span>
                                </th>
                            @endforeach
                        </x-Tables.TableHead>
                        <x-Tables.TableBody tableClass="bg-white table-light" tableId="user_activites_data_table" />
                        <!-- Loader Overlay -->
                        <x-Tables.Icon.LoaderOverlay 
                            tableOverlayClass="table-loader-overlay display_none" 
                            loaderId="tableOverlayLoader" 
                            loaderClass="data-table-loader" 
                            loaderWidth="24" 
                            loaderHeight="24" 
                            loaderStroke="currentColor" 
                            loaderStrokeWidth="2" 
                            loaderText="Loading...." 
                            loaderTextClass="loader-text ms-1" 
                            loaderFill="none"
                        />
                    </x-Tables.Table>
                </x-Tables.TableComponent>
            </div>
            <x-Tables.TableFooter footerClass="row table_last_row mb-1">
                <div class="col-1">
                    <x-Tables.TableFooterSelectDropdown 
                        labelClass="item_class"
                        labelName="Peritem"
                        dropdownBox="custom-select"
                        selectClass="ps-1"
                        selectId="perItemControl"
                        selectStyle="background: linear-gradient(5deg, gray, transparent 3%, lightgray, silver);border:1px ridge rgba(135, 206, 250, 0.74);"
                        selectedValue="10"
                    />
                </div>
                <div class="col-3">
                    <x-Tables.TableEntries
                        labelClass="per_item_class"
                        entryId="total_per_items"
                        showId="per_items_num"
                        totalIems="total_items" 
                    />
                </div>
                <div class="col-8">
                    <x-Tables.TablePagination
                        paginationClass="pagination mt-1"
                        paginationId="activities_users_data_table_paginate" 
                        paginationStyle="float: right;padding-top:0px;"
                    />
                </div>
            </x-Tables.TableFooter>
        </div>

        <!-- <table id="resizableTable">
            <tr>
                <th id="headId">S.L<div class="col-resizer"></div><div class="row-resizer"></div></th>
                <th id="headId">Account Title<div class="col-resizer"></sdivpdivan><div class="row-resizer"></div></th>
                <th id="headId">Post Ref<div class="col-resizer"></div><div class="row-resizer"></div></th>
                <th id="headId">Debit<div class="col-resizer"></div><div class="row-resizer"></div></th>
                <th id="headId">Credit<div class="col-resizer"></div><div class="row-resizer"></div></th>
                <th id="headId">Blance<div class="col-resizer"></div><div class="row-resizer"></div></th>
            </tr>
            <tr>
                <td id="cellId">Cell 1<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 2<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 1<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 2<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 1<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 2<div class="col-resizer"></div><div class="row-resizer"></div></td>
            </tr>
            <tr>
                <td id="cellId">Cell 1<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 2<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 1<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 2<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 1<div class="col-resizer"></div><div class="row-resizer"></div></td>
                <td id="cellId">Cell 2<div class="col-resizer"></div><div class="row-resizer"></div></td>
            </tr>
        </table> -->
    @else
        @include('super-admin.user-details.error.data-table-permission')
    @endif
@else
    @include('super-admin.user-details.error.unauthorize')
@endif