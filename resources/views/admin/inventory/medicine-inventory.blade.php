@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
    <div class="card-body" id="table_card_body">
        <div class="row">
            <div class="accordion accordion-flush" id="seach_type_edit">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-searchType">
                        <button class="accordion-button collapsed supplier_data_box" type="button" data-bs-toggle="collapse" data-bs-target="#flush-searchEdit" aria-expanded="false" aria-controls="flush-collapseOne">
                            <i class="fa-solid fa-database fa-bounce me-2"></i> {{__('translate.Medicine Inventory Data Table')}} <span class="ms-3" id="loadHead"><i class="fa-regular fa-thumbs-down fa-fade"></i></span>
                        </button>
                    </h2>
                    <div id="flush-searchEdit" class="accordion-collapse collapse" aria-labelledby="flush-searchType" data-bs-parent="#seach_type_edit">
                        <div class="accordion-body inventory_form">
                            <div class="card-body focus-color cd cat_form inventory_form">
                                {{-- start Inventory Edit Table --}}
                                <p class="catg inventory_one_head table-heading"><span>{{__('translate.Inventory')}}</span></p>
                                <div class="table_scroll">
                                    <table class="ord_table center border-1 mt-2">
                                        <tr class="table-row order_body acc_setting_table">
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col ps-1">{{__('translate.SN.')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ col ps-1">Act</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">{{__('translate.INV-ID')}}</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">{{__('translate.SVC-ID')}}</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">{{__('translate.Category')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Group')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Name')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Dosage')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Unit-Price')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Qty')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1">{{__('translate.Amount')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1">{{__('translate.Status')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_">{{__('translate.Updated By')}}</th>
                                        </tr>
                                        <tbody class="table-heading bg-transparent" id="invedit_data_table">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row table_last_row">
                                    <div class="col-1">
                                        <label class="peritem mt-">Peritem</label>
                                        <div class="custom-select">
                                            <select class="ps-1" id="perItemControl">
                                                <option selected>10</option>
                                                <option>20</option>
                                                <option>50</option>
                                                <option>100</option>
                                                <option>200</option>
                                            </select>
                                            <span class="custom-drop-item-arrow me-2"></span>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        <div class="pagination item" id="invedit_data_table_paginate">

                                        </div>
                                    </div>
                                </div>
                                {{-- end Inventory Edit Table --}}

                                {{-- start Inventory Unauthorized Table --}}
                                <p class="catg inventory_second_head table-heading mt-3">{{__('translate.Inventory Authorization')}}</span></p>
                                <div class="table_scroll">
                                    <table class="ord_table center border-1 mt-2">
                                        <tr class="table-row order_body acc_setting_table">
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col ps-1">{{__('translate.SN.')}}</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">{{__('translate.INV-ID')}}</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">{{__('translate.SVC-ID')}}</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">{{__('translate.Category')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Group')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Name')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Dosage')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Unit-Price')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">{{__('translate.Qty')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1">{{__('translate.Amount')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1">{{__('translate.Status')}}</th>
                                        </tr>
                                        <tbody class="table-heading bg-transparent" id="inventory_unauthorized_data_table">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row table_last_row">
                                    <div class="col-1">
                                        <label class="peritem">Peritem</label>
                                        <div class="custom-select">
                                            <select class="ps-1" id="perItemControlOne">
                                                <option selected>10</option>
                                                <option>20</option>
                                                <option>50</option>
                                                <option>100</option>
                                                <option>200</option>
                                            </select>
                                            <span class="custom-drop-item-arrow me-2"></span>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        <div class="pagination" id="inventory_unauthorized_data_table_paginate">

                                        </div>
                                    </div>
                                </div>
                                {{-- end Inventory Unauthorized Table --}}

                                <!-- {{-- start Stock data pase by role permission --}}
                                <p class="catg inventory_second_head table-heading mt-3">Stock Data Permission Table</span></p>
                                <div>
                                    <table class="ord_table center border-1 mt-2">
                                        <tr class="table-row order_body acc_setting_table">
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col ps-1">SL</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ col ps-1">Action</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">INV-ID</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">SVC-ID</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1">Category</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">Group</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">Name</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">Dosage</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">Unit-Price</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1" style="text-align: left;">Qty</th>
                                            <th id="th_sort" class="table_th_color tot_pending_">Amount</th>
                                            <th id="th_sort" class="table_th_color tot_pending_">Status</th>
                                        </tr>
                                        <tbody class="table-heading bg-transparent" id="stock_permission_data_table">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row table_last_row">
                                    <div class="col-4">
                                        <label class="peritem mt-2">Peritem</label>
                                        <select id="perItemControlTwo">
                                            <option selected>10</option>
                                            <option>20</option>
                                            <option>50</option>
                                            <option>100</option>
                                            <option>200</option>
                                        </select>
                                    </div>
                                    <div class="col-8">
                                        <div class="pagination" id="stock_permission_data_table_paginate">

                                        </div>
                                    </div>
                                </div>
                                {{-- end Stock data pase by role permission --}} -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="category-form">
                        <div class="card form-control cat_form inventory_form">
                            <div class="col-xl-6">
                                <input id="inv_field" type="text" name="inv_field" value="INV" hidden />
                                <input id="generate_id" type="text" name="generate_id" placeholder="generate_id" hidden />
                            </div>
                            <form autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="row">
                                            <input type="hidden" id="inventory_id">
                                            <div class="col-3">
                                                <label class="inv_name_label brand mt-1 skeleton" for="svc">{{__('translate.INV - ID')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="svc-icon fa fa-spinner fa-spin svc-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <input id="inv_id" type="text" name="inv_id" class="inv_field inv_id mobile ps-2" placeholder="{{__('translate.INV-SVC')}}-0-00000" readonly />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3">
                                                <label class="date_name_label brand mt-1 skeleton" for="date">{{__('translate.Manufacture Date')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="manufacture-icon fa fa-spinner fa-spin manufacture-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <input name="manufacture_date" type="text" class="date_field manufacture_date ps-2" id="date_id" placeholder="{{__('translate.DD-MM-YYYY')}}" />
                                                <span style="color:darkcyan"><i class="fa-solid fa-calendar-week"></i></span>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-3">
                                                <label class="date_name_label brand mt-1 skeleton" for="date">{{__('translate.Expiry Date')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="expiry-icon fa fa-spinner fa-spin expiry-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <input name="expiry_date" type="text" class="date_field expiry_date ps-2" id="date_exid" placeholder="{{__('translate.DD-MM-YYYY')}}" />
                                                <span style="color:darkcyan"><i class="fa-solid fa-calendar-week"></i></span>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-3">
                                                <label class="inv_name_label brand mt-1 skeleton" for="svc">{{__('translate.SVC - ID')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="svc-icon fa fa-spinner fa-spin svc-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <select id="supplier_id" class="ps-1 pe-1 update_user firstcategory supplier_id" name="supplier_id" placeholder="Select-Category">
                                                    <option value="0" selected><span> ▼</span> {{__('translate.Select SVC ID')}}</option>
                                                    @foreach($suppliers as $item)
                                                    <option class="sub_name_text" value="{{$item->id}}">{{$item->id_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="inv_name_label brand mt-1 skeleton" for="svc">{{__('translate.Category')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="category-icon fa fa-spinner fa-spin category-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <select id="category_id" class="mt-1 ps-1 update_user firstcategory category_id" name="category_id" placeholder="Select-Category">
                                                    <option value="0" selected><span> ▼</span> {{__('translate.Select Category')}}</option>
                                                    @foreach($cateogries as $row)
                                                    <option class="sub_name_text" value="{{$row->id}}">{{$row->sub_category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="inv_name_label brand mt-1 skeleton" for="group_name">{{__('translate.Medicine-Group')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="group-icon fa fa-spinner fa-spin group-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <select id="group" class="mt-1 ps-1 update_user group group_name" name="group_name" placeholder="Select-Group">
                                                    <option value="0" selected><span> ▼</span> {{__('translate.Select-Group')}}</option>
                                                    @foreach($medicine_groups as $row)
                                                    <option class="sub_name_text" value="{{$row->id}}">{{$row->group_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="inv_name_label brand mt-1 skeleton" for="medicine_name">{{__('translate.Medicine-Name')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="medicine-name-icon fa fa-spinner fa-spin medicine-name-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <select id="medicine_name" class="mt-1 ps-1 update_user subcategory medicine_name" name="medicine_name" placeholder="Select-Medicine Name">
                                                    <option value="0" selected><span> ▼</span> {{__('translate.Select Medicine-Name')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="inv_name_label brand mt-1 skeleton" for="medicine_dogs">{{__('translate.Medicine-Dosage')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="dogs-icon fa fa-spinner fa-spin dogs-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <select id="medicine_dogs" class="mt-1 ps-1 update_user dogs medicine_dogs" name="medicine_dosage" placeholder="Select-Medicine-Dosage">
                                                    <option value="0" selected><span> ▼</span> {{__('translate.Select Medicine-Dosage')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="inv_name_label brand mt-1 skeleton" for="current_address">{{__('translate.Medicine-Origin')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="origin-icon fa fa-spinner fa-spin origin-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <select id="origin_name" class="mt-1 ps-1 update_user category origin_name" name="origin_name" placeholder="Select-Origin">
                                                    <option value="0" selected><span> ▼</span> {{__('translate.Select Origin')}}</option>
                                                    @foreach($medicine_origins as $row)
                                                        <option class="sub_name_text" value="{{$row->id}}">{{$row->origin_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="inv_name_label brand mt-1 skeleton" for="contact_number_one">{{__('translate.Medicine-Size')}} :</label>
                                            </div>
                                            <div class="col-1">
                                                <i class="size-icon fa fa-spinner fa-spin size-hidden mt-1"></i>
                                            </div>
                                            <div class="col-7 skeleton" style="text-align: left;">
                                                <select id="product_size" class="mt-1 ps-1 update_user size medicine_size" name="medicine_size" placeholder="Select-Size">
                                                    <option value="0" selected><span> ▼</span> {{__('translate.Select Medicine Size')}}</option>
                                                    @foreach($units as $row)
                                                    <option class="sub_name_text" value="{{$row->id}}">{{$row->units_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 skeleton">
                                        <div class="row mt-1 me-1 skeleton">
                                            <div class="col-4">
                                                <label class="inv_name_label brand mt-1 skeleton" for="unit_price">{{__('translate.Unit-Price')}} :</label>
                                            </div>
                                            <div class="symbole_tk col-2 skeleton">
                                                <i class="fa-solid fa-bangladeshi-taka-sign mt-2" style="color: black;font-size:12px;float:right"></i>
                                            </div>
                                            <div class="col-6 skeleton">
                                                <input class="inv_number edit_unit_price unit_price numberformat ps-2" type="text" name="unit_price" id="unit_price" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="row mt-1 me-1">
                                            <div class="col-4">
                                                <label class="inv_name_label brand mt-1 skeleton" for="quantity">{{__('translate.Quantity')}} :</label>
                                            </div>
                                            <div class="symbole_tk col-2">
                                            </div>
                                            <div class="col-6 skeleton">
                                                <input class="inv_number edit_quantity quantity numberformat ps-2" type="number" name="quantity" id="quantity" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="row mt-1 me-1">
                                            <div class="col-4">
                                                <label class="inv_name_label brand mt-1 skeleton" for="amount">{{__('translate.Amount')}} :</label>
                                            </div>
                                            <div class="symbole_tk col-2">
                                                <i class="fa-solid fa-bangladeshi-taka-sign mt-2" style="color: black;font-size:12px;float:right"></i>
                                            </div>
                                            <div class="col-6 skeleton">
                                                <input class="inv_field edit_amount amount numberformat ps-2" type="text" name="amount" id="amount" placeholder="0.00" readonly>
                                            </div>
                                        </div>

                                        <div class="row mt-1 me-1">
                                            <div class="col-4">
                                                <label class="inv_name_label brand mt-1 skeleton" for="vat">{{__('translate.VAT(%)')}} :</label>
                                            </div>
                                            <div class="symbole_tk col-2">

                                            </div>
                                            <div class="col-6 skeleton">
                                                <input class="inv_number edit_vat vat ps-2" style="color: orangered;" type="number" name="vat" id="vat" placeholder="0.00 %">
                                            </div>
                                        </div>
                                        <div class="row mt-1 me-1">
                                            <div class="col-4">
                                                <label class="inv_name_label brand mt-1 skeleton" for="tax">{{__('translate.TAX(%)')}} :</label>
                                            </div>
                                            <div class="symbole_tk col-2">

                                            </div>
                                            <div class="col-6 skeleton">
                                                <input class="inv_number edit_tax tax numberformat ps-2" style="color: orangered;" type="number" name="tax" id="tax" placeholder="0.00 %">
                                            </div>
                                        </div>
                                        <div class="row mt-1 me-1">
                                            <div class="col-4">
                                                <label class="inv_name_label brand mt-1 skeleton" for="tax">{{__('translate.Discount(%)')}}:</label>
                                            </div>
                                            <div class="symbole_tk col-2">

                                            </div>
                                            <div class="col-6 skeleton">
                                                <input class="inv_number edit_discount_percentage discount_percentage numberformat ps-2" style="color:primary;" type="number" name="discount_percentage" id="discount_percentage" placeholder="0.00 %">
                                            </div>
                                        </div>
                                        <div class="row mt-1 me-1">
                                            <div class="col-4">
                                                <label class="inv_name_label brand mt-1 skeleton" for="sub_total">{{__('translate.Net Amount')}} :</label>
                                            </div>
                                            <div class="symbole_tk col-2">
                                                <i class="fa-solid fa-bangladeshi-taka-sign mt-2" style="color: black;font-size:12px;float:right"></i>
                                            </div>
                                            <div class="col-6 skeleton">
                                                <input class="inv_field edit_sub_total sub_total numberformat ps-2" type="text" name="sub_total" id="sub_total" placeholder="0.00" readonly>
                                            </div>
                                            <input class="status_inv" type="number" name="status_inv" hidden>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <span id="savForm_error"></span><span id="updateForm_errorList"></span>
                                    </div>

                                    <div class="col-6">
                                        <p class="btn_group" style="text-align: end;">
                                            <button type="submit" class="btn btn-sm cgt_btn btn_focus add_button mt-2 skeleton" id="save">
                                                <i class="add-inv-icon fa fa-spinner fa-spin add-inv-hidden"></i>
                                                <span class="btn-text">Save</span>
                                            </button>
                                            <button id="update_btn" class="btn btn-sm cgt_btn btn_focus update_button mt-2 skeleton"style="display: none;">
                                                <i class="update-icon fa fa-spinner fa-spin update-hidden"></i>
                                                <span class="btn-text">Update</span>
                                            </button>
                                            <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus cancel_button mt-2 skeleton">Cancel</button>
                                            <button id="back_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus cancel_button mt-2" style="display: none;">Cancel</button>
                                            <button type="submit" class="btn btn-sm cgt_btn btn_focus confirm mt-2 skeleton" id="submit" disabled>
                                                <i class="submit-icon fa fa-spinner fa-spin submit-hidden"></i>
                                                <span class="btn-text">Confirm</span>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="category-form">
                        <div class="card-body focus-color cd cat_form current_data inventory_form mt-3">
                            <div class="row">
                                <span id="savForm_error"></span><span id="updateForm_errorList2"></span>
                                <div class="col-5 offset-7">
                                    <span class="form-check form-switch search_ skeleton" style="float: right;">
                                        <label class="search ser_label" for="search">{{__('translate.Total Inventory')}} :</label>
                                        <input type="text" class="inv_number ps-" value="" id="tot_inventory" placeholder="0.00 ৳" readonly>
                                    </span>
                                </div>
                            </div>
                            <div style="overflow-x:auto;">
                                <table class="ord_table center border-1 skeleton mt-1">
                                    <tr class="table-row order_body acc_setting_table skeleton">
                                        <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color border_right txt col skeleton">{{__('translate.SN.')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right col txt skeleton"></th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right col txt skeleton">{{__('translate.INV-ID')}}</th>
                                        <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color border_right txt ps-1 skeleton">{{__('translate.Mgf.Date')}}</th>
                                        <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color border_right txt ps-1 skeleton">{{__('translate.Exp.Date')}}</th>
                                        <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color border_right txt ps-1 skeleton" style="text-align: center;">{{__('translate.SVC-ID')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.Category')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.Medicine Group')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.Medicine Name')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: center;">{{__('translate.Dosage')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: center;">{{__('translate.Orgin')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: center;">{{__('translate.Size')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.Price')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.Qty')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.Amount')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.VAT(%)')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.Tax(%)')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.Discount(%)')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ border_right ps-1 skeleton" style="text-align: left;">{{__('translate.Sub Total')}}</th>
                                        <th id="th_sort" class="table_th_color tot_pending_ skeleton" style="text-align: center;">{{__('translate.Action')}}</th>

                                    </tr>
                                    <tbody class="bg-tranparent skeleton" id="medicine_table_form">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- show-message -->
    <div class="col-xl-12 mb-5 action_message">
        <p class="ms-3"><span id="success_message"></span></p>
    </div>
</div>

{{-- start Update Modal --}}
<div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content small_modal" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
            <span class="pro_image"><img class="img-profile rounded-circle" id="output" src="/image/{{auth()->user()->image}}"></span>
            <h6 class="modal-title admin_title scan ms-3 pt-1" id="staticBackdropLabel">
                @if(auth()->user()->role ==1)
                    Super Admin
                @endif
                @if(auth()->user()->role ==2)
                    Sub Admin
                @endif
                @if(auth()->user()->role ==3)
                    Admin
                @endif
                @if(auth()->user()->role ==0)
                    Doctors
                @endif
            </h6>
            <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" 
                data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
            </div>
            <div class="modal-body" id="logoutModal_body">
                <p class="admin_paragraph" id="text_message" style="font-weight:600;font-size:13px;">
                    Do you want to update the inventory ?
                </p> 
                <p class="admin_paragraph" id="text_message" style="text-align:center;"> 
                    <button id="update_btn" class="btn btn-sm cgt_btn btn_focus update_button update_btn">
                        <span class="btn-text">Yes</span>
                    </button>

                    <span style="font-weight:600;font-size:13px;">Or</span>

                    <a type="button" class="btn btn-danger modal_button logout_button" data-bs-dismiss="modal">no</a>
                </p>
            </div>
            <div class="modal-footer" id="logoutModal_footer"></div>    
        </div>
    </div>
  </div>
</div>
{{-- end Update Modal --}}
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/brand/brand.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/inventory/medicine-inventory.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
@endsection

@section('script')
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
@include('admin.inventory.ajax-handel-inventory')
@include('admin.post.handel-ajax.medicine-data')
@endsection

@push('scripts')
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
<script>
    //date-picker
    $(document).ready(function() {
        $('#date_id').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            onSelect: function(dateText) {
                $(this).attr('data-manufacture-date', dateText);
                updateTableDate(this, 'data-manufacture-date');
            }
        });
        $('#date_exid').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            onSelect: function(dateText) {
                $(this).attr('data-expiry-date', dateText);
                updateTableDate(this, 'data-expiry-date');
            }
        });
        updateTableDate($('#date_id'), 'data-manufacture-date');
        updateTableDate($('#date_exid'), 'data-expiry-date');
        function formatDate(dateString) {
            var date = new Date(dateString.split('-').reverse().join('-'));
            var day = date.getDate();
            var month = date.getMonth();
            var year = date.getFullYear();

            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            day = day < 10 ? '0' + day : day;

            var monthName = monthNames[month];

            return day + '-' + monthName + '-' + year;
        }
        function updateTableDate(element, dataAttribute) {
            var dateStr = $(element).attr(dataAttribute);
            var formattedDate = formatDate(dateStr);
            $(element).val(formattedDate);
        }
    });
</script>
<script>
    // current submit
    $(".cat_form form select, .cat_form form").on('submit', function(e) {
        e.preventDefault();
        var formData = function(itemEls) {

            var sl = $("#medicine_table_form tr").length;

            var data = `<td class="common_td" style="text-align:center;border-left:1px solid lightblue;"  name="sl"  value="${sl+1}">${sl+1}</td>`;
            for (const el of itemEls) {

                if (el.name === '_token') {
                    continue;
                }

                const {
                    tagName,
                    name,
                    value,
                } = el;

                if (tagName === 'SELECT') {
                    var option = $(el).find(`option[value="${value}"]`);

                    if (option && option.length && option[0].innerHTML) {
                        var label = option[0].innerHTML
                        data += `<td class="common_td" style="text-align:center" name="${name}" value="${value}">${label}</td>`;
                    } else {
                        data += `<td class="common_td" style="text-align:center" name="${name}" value="${value}">${value}</td>`;
                    }
                } else {
                    data += `<td class="common_td" style="text-align:center" name="${name}" value="${value}"> ${value}</td>`;
                }
            }

            data += `<td class="button_box" style="text-align:center;">
                <button class="btn btn-sm btn-light text-primary edit-btn common_btn">Edit</button>
                <button class="btn btn-sm btn-light text-danger common_btn">Delete</button>
            </td>`;

            $("#medicine_table_form").append(`<tr>\n${data}\n</tr>`);
        }


        formData($(this).find('input, select'));
        $("#cancel_btn").click();
    });
</script>
<script>
    // current delete tr
    // Using .delegate() (deprecated in jQuery 3.0, but still works)
    $('#medicine_table_form').delegate('tr .btn-light', 'click', function(e) {
        e.preventDefault();
        var trElement = e.target.parentElement.parentElement;
        var tbodyElement = trElement.parentElement; // Get its parent element
        tbodyElement.removeChild(trElement); // Remove the paragraph from its parent
    });
    // current edit tr
    $('#medicine_table_form').delegate('tr .edit-btn', 'click', function(e) {
        e.preventDefault();

        const setEditForm = function(name, value) {

            $(`#category_page form [name="${name}"]`).val(value);

            if (['supplier_id', 'category_id', 'group_name', 'origin_name', 'units_name'].includes(name)) {
                $(`#category_page form [name="${name}"] option`).prop('selected', false); // Unselect all options
                $(`#category_page form select[name="${name}"] option[value="${value}"]`).prop('selected', true);
            }
        }

        const removeItems = () => {
            var trElement = e.target.parentElement.parentElement;
            var tbodyElement = trElement.parentElement; // Get its parent element
            tbodyElement.removeChild(trElement); // Remove the paragraph from its parent
        }

        var trElement = e.target.parentElement.parentElement;
        var columns = trElement.childNodes;

        var setMedicineNameOptions = function(group_id, value) {
            // $('#category_page form [name="group_id"]').val(group_id);

            $("#medicine_name").empty();
            $("#medicine_name").append('<option value="0" disabled>Processing.......</option>');

            $.ajax({
                type: "GET",
                url: "/request-medicine-name/" + group_id,
                success: function(data) {
                    $("#medicine_name").empty();
                    $("#medicine_name").append('<option value="0" disabled>Processing.......</option>');
                    $.each(data, function(key, item) {
                        $("#medicine_name").append("<option class='sub_name_text' value =" + item.id + ">" + item.medicine_name + "</option>").fadeIn('slow');
                    });
                    $(`#category_page form select[name="medicine_name"] option[value="${value}"]`).prop('selected', true);
                }
            });
        }

        var setMedicineDogsOptions = function(medicine_name, value) {

            $.ajax({
                type: "GET",
                url: "/request-medicine-dogs/" + medicine_name,
                success: function(data) {
                    $("#medicine_dogs").empty();
                    $("#medicine_dogs").append('<option value="0" disabled>Processing.......</option>');
                    $.each(data, function(key, item) {
                        $("#medicine_dogs").append("<option class='sub_name_text' value =" + item.id + ">" + item.dosage + "</option>").fadeIn('slow');
                    });
                    $(`#category_page form select[name="dosage"] option[value="${value}"]`).prop('selected', true);
                }
            });
        }

        var data = {};
        for (const td of columns) {

            if (td.nodeName !== 'TD') continue;

            var name = td.getAttribute('name');
            var value = td.getAttribute('value');

            if (name === null) continue;

            data[name] = value;
            setEditForm(name, value);
        }

        setMedicineNameOptions(data['group_name'], data['medicine_name']);
        setMedicineDogsOptions(data['medicine_name'], data['dosage']);

        removeItems();
    });
</script>
<script>
    // inventory unique id generator
    $("#supplier_id, #generate_id, #inv_field").on('change', function() {
        var x = Math.random();
        x = x * (10000 - 1) + 1;
        var generate_id = Math.floor(x);
        $("#generate_id").val(generate_id);
        var inv_field = $("#inv_field").val();
        //var supplier_id = $("#supplier_id").val();

        var currentDate = new Date();
        var year = currentDate.getFullYear();
        var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
        var day = ("0" + currentDate.getDate()).slice(-2);
        var formattedDate = year + '-' + month + '-' + day;

        var inv_id = inv_field + '-' + formattedDate;

        $("#inv_id").val(inv_id + '-' + generate_id);
    });



    // inventory calculation
    $("#unit_price, #quantity").on('change', function() {
        var amount = 0;
        var net_total_amount = 0;

        // Get price value
        var priceInput = $("#unit_price").val();
        var price = parseFloat(priceInput);

        // Check if price is a valid number
        if (!isNaN(price)) {
            // Format price
            var formattedPrice = price.toFixed(2);
            $("#unit_price").val(formattedPrice);

            // Get quantity value
            var quantityInput = $("#quantity").val();
            var quantity = parseFloat(quantityInput);

            // Check if quantity is a valid number
            if (!isNaN(quantity)) {
                // Format quantity
                var formattedQuantity = quantity.toFixed(2);
                $("#quantity").val(formattedQuantity);

                // Calculate amounts
                amount = price * quantity;
                $("#amount").val(amount.toFixed(2));
                
                // Set default value for VAT
                $("#vat").val("0.00");

                // Set default value for tax
                $("#tax").val("0.00");

                // Set default value for discount percentage
                $("#discount_percentage").val("0.00");

                // Calculation
                var vat = parseFloat($("#vat").val());
                var tax = parseFloat($("#tax").val());
                var discount_percentage = parseFloat($("#discount_percentage").val());

                var total_vat = (amount * vat) / 100;
                var total_tax = (amount * tax) / 100;
                var total_discount = (amount * discount_percentage) / 100;
                net_total_amount = amount + total_vat + total_tax - total_discount;
            }
        }

        // Update sub_total field
        $("#sub_total").val(net_total_amount.toFixed(2));
    });
    // Listen for change event on VAT, tax, and discount_percentage fields
    $("#vat, #tax, #discount_percentage").on('change', function() {
        var vatInput = $("#vat").val();
        var formattedVat = parseFloat(vatInput).toFixed(2);
        $("#vat").val(formattedVat);

        var taxInput = $("#tax").val();
        var formattedTax = parseFloat(taxInput).toFixed(2);
        $("#tax").val(formattedTax);

        var discountPercentageInput = $("#discount_percentage").val();
        var formattedDiscountPercentage = parseFloat(discountPercentageInput).toFixed(2);
        $("#discount_percentage").val(formattedDiscountPercentage);

        // Calculate net total amount
        var price = parseFloat($("#unit_price").val());
        var quantity = parseFloat($("#quantity").val());
        var amount = price * quantity;
        var vat = parseFloat($("#vat").val());
        var tax = parseFloat($("#tax").val());
        var discount_percentage = parseFloat($("#discount_percentage").val());

        var total_vat = (amount * vat) / 100;
        var total_tax = (amount * tax) / 100;
        var total_discount = (amount * discount_percentage) / 100;
        var net_total_amount = amount + total_vat + total_tax - total_discount;

        // Update sub_total field
        $("#sub_total").val(net_total_amount.toFixed(2));
    });

    // Total Inventory
    $(document).ready(function() {
        var sum = 0;

        $('#medicine_table_form tr').each(function() {
            var tdText = $(this).find('td[name="sub_total"]').text();
            var tdValue = parseFloat(tdText.replace(/[^\d.-]/g, ''));
            if (!isNaN(tdValue)) {
                sum += tdValue;
            }
        });
        $('#tot_inventory').val(sum.toFixed(2) + ' ৳');
    });

</script>
@endpush