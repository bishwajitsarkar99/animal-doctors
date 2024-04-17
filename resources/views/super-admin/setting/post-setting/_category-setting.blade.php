<div class="row">
    <div class="accordion" id="accordionExample">
        <!-- Post-Category -->
        <div class="accordion-item post_category_setting">
            <h2 class="accordion-header skeleton" id="medicineHistory">
                <button class="accordion-button header_button post_cat_table collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#medicine_History" aria-expanded="false" aria-controls="collapseTwo">
                    {{__('translate.Category Setting')}} <span class="ms-3"><i class="fa-solid fa-arrows-rotate fa-spin"></i></span>
                </button>
            </h2>
            <div id="medicine_History" class="accordion-collapse collapse" aria-labelledby="medicineHistory" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-body focus-color cd cat_form" id="pos_cat_content">
                                <div class="row">
                                    <div class="col-4">
                                        <span class="form-check form-switch search_ me-2" id="pos_cat_content2">
                                            <input class="form-check-input" onclick="mySrcFunction()" type="checkbox" id="search_area" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <label class="search post_ser_label ps-1 pt-1" for="search pe-2" id="pos_cat_content3">{{__('translate.Search Mode')}} :</label>
                                            <label class="form-check-label" for="collapseExample"><span class="search_on" id="search_off">OFF</span></label>
                                        </span>
                                    </div>
                                    <div class="col-5">
                                        <span id="search_plate">
                                            <input id="search" type="search" name="search" list="datalistOptions" id="exampleDataList" class="category-all-search searchform ps-1" placeholder="{{__('translate.Search.........')}}">
                                            <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden"></i>
                                            <datalist id="datalistOptions">
                                                @foreach($post_categories as $item)
                                                    <option value="{{$item->post_title}}">
                                                    <option value="{{$item->category_name}}">
                                                    <option value="{{$item->sub_category_name}}">
                                                @endforeach
                                            </datalist>
                                        </span>
                                    </div>
                                    <div class="col-1">
                                        <span class="me-1" id="pos_cat_content4">
                                            <img id="locker" class="checking_lock mt-1" src="{{ asset('image/lock/lock.png')}}" alt="lock">
                                        </span>
                                    </div>
                                    <div class="small_menu col-2">
                                        <span class="action_button pe-1" id="pos_cat_content5">
                                            <input type="checkbox" id="action_mode" class="form-check-input search_all_data" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('translate.Click')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                            <label id="post_lock_label" class="search_action post_lock_ser_label" for="action_mode"><span class="text-success">{{__('translate.Check locker')}}</span></label>
                                        </span>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped ord_table center border-1 mt-2" id="pos_cat_content6">
                                        <tr class="table-row order_body acc_setting_table" id="pos_cat_content7">
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt col ps-1 pt-1">{{__('translate.ID')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ col pt-1">{{__('translate.Action')}}</th>
                                            <th id="th_sort" data-coloumn="id" data-order="desc" class="table_th_color txt ps-1 pt-1">{{__('translate.Post-Title')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ ps-1 pt-1">{{__('translate.Category-Name')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ col ps-1 pt-1" style="text-align: left;">{{__('translate.Sub-Category-Name')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ pt-1">{{__('translate.Created_By')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ pt-1">{{__('translate.Permission')}}</th>
                                            <th id="th_sort" class="table_th_color tot_pending_ col pt-1">{{__('translate.Checking')}}</th>
                                        </tr>
                                        <tbody class="bg-transparent" id="post_category_data_table">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row table_last_row">
                                    <div class="col-1">
                                        <label class="item_class skeleton">Peritem</label>
                                        <div class="custom-select" id="pos_cat_content8">
                                            <select class="ps-1" id="perItemControl2">
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
                                        <span class="tot_summ cats_res" id="num_plate">
                                            <label class="tot-search mt-3 pt-2" for="tot_cagt"> {{__('translate.Total Post-Categories')}} :</label>
                                            <label for="total_medic_records" id="iteam_label4"><span class="total_users" style="font-size:12px;" id="total_post_category_records">
                                                </span><span id="iteam_label6" style="font-weight: 600;color:darkcyan;font-size:12px;">.00</span>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-8">
                                        <div class="pagination" id="post_category_data_table_paginate">

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