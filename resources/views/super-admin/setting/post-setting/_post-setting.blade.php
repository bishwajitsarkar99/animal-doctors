<div class="row mt-3">
    <div class="accordion" id="accordionExample2">
        <!-- Main-Post -->
        <div class="accordion-item post_category_setting">
            <h2 class="accordion-header skeleton" id="medicineHistory">
                <button class="accordion-button header_button post_cat collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#main_post" aria-expanded="false" aria-controls="collapseTwo">
                    {{__('translate.Post Setting')}} <span class="ms-3"><i class="fa-solid fa-arrows-rotate fa-spin"></i></span>
                </button>
            </h2>
            <div id="main_post" class="accordion-collapse collapse" aria-labelledby="medicineHistory" data-bs-parent="#accordionExample2">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-body focus-color cd cat_form" id="post_locker_table">
                                <div class="row">
                                    <div class="col-4">
                                        <span class="form-check form-switch search_ me-2">
                                            <input class="form-check-input post_search" onclick="myPostSrcFunction()" type="checkbox" id="post_search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <label class="search post_ser_label ps-1 pt-1" for="search pe-2" id="post_locker_table2">{{__('translate.Search Mode')}} :</label>
                                            <label class="form-check-label" for="collapseExample"><span class="search_on" id="post_search_off">OFF</span></label>
                                        </span>
                                    </div>
                                    <div class="col-5">
                                        <span id="search_plate">
                                            <input id="post_search" type="search" name="search" list="datalistOptions" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="{{__('translate.Search.........')}}">
                                            <i class="post-search-icon fa fa-spinner fa-spin post-search-hidden"></i>
                                            <datalist id="datalistOptions">
                                                @foreach($post_tables as $item)
                                                <option value="{{$item->category_id}}">
                                                <option value="{{$item->post_title}}">
                                                <option value="{{$item->category_name}}">
                                                <option value="{{$item->sub_category_name}}">
                                                @endforeach
                                            </datalist>
                                        </span>
                                    </div>
                                    <div class="col-1">
                                        <span class="me-1" id="post_locker_table3">
                                            <img id="post_locker" class="post_checking_lock" src="{{ asset('image/lock/lock.png')}}" alt="lock">
                                        </span>
                                    </div>
                                    <div class="small_menu col-2">
                                        <span class="action_button pe-1" id="post_locker_table4">
                                            <input type="checkbox" id="post_locker_mode" class="form-check-input search_all_data">
                                            <label id="post_lock_label" class="search_action post_lock_ser_label" for="action_mode"><span class="text-success">{{__('translate.Post locker')}}</span></label>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <table class="ord_table center border-1 mt-2" id="post_locker_table5">
                                        <tr class="table-row order_body acc_setting_table" id="post_locker_table6">
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col ps-1 pt-1" id="post_locker_table7">{{__('translate.ID')}}</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col ps-1 pt-1" id="post_locker_table8">{{__('translate.Category-ID')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ col pt-1" id="post_locker_table9">{{__('translate.Action')}}</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1 pt-1" id="post_locker_table10">{{__('translate.Post-Title')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1 pt-1" id="post_locker_table11">{{__('translate.Category-Name')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ col ps-1 pt-1" style="text-align: left;" id="post_locker_table12">{{__('translate.Sub-Category-Name')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ pt-1" id="post_locker_table13">{{__('translate.Created_By')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ pt-1" id="post_locker_table14">{{__('translate.Permission')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ col pt-1" id="post_locker_table15">{{__('translate.Checking')}}</th>
                                        </tr>
                                        <tbody class="bg-transparent" id="main_post_data_table">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row table_last_row">
                                    <div class="col-1">
                                        <label class="item_class skeleton">Peritem</label>
                                        <div class="custom-select" id="post_locker_table16">
                                            <select class="ps-1" id="perItemControl">
                                                <option selected>10</option>
                                                <option>20</option>
                                                <option>50</option>
                                                <option>100</option>
                                                <option>200</option>
                                            </select>
                                            <span class="custom-post-setting-arrow me-2"></span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <span class="tot_summ post_res" id="num_plate">
                                            <label class="tot-search mt-3 pt-2" for="tot_cagt"> {{__('translate.Total Post')}} :</label>
                                            <label for="total_medic_records" id="iteam_label4"><span class="total_users" style="font-size:12px;" id="total_main_post_records">
                                                </span><span id="iteam_label6" style="font-weight: 600;color:darkcyan;font-size:12px;">.00</span>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-8">
                                        <div class="pagination" id="main_post_data_table_paginate">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>