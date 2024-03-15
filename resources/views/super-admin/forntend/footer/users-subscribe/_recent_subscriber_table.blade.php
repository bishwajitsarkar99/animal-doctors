<div class="row">
    <div class="accordion" id="accordionExample">
        <!-- News-Letter/Subscribe -->
        <div class="accordion-item post_category_setting">
            <h2 class="accordion-header skeleton" id="medicineHistory">
                <button class="accordion-button header_button post_cat_table collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#medicine_History" aria-expanded="false" aria-controls="collapseTwo">
                    Recent News-Letter <span class="ms-3"><i class="fa-solid fa-arrows-rotate fa-spin"></i></span>
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
                                    <div class="col-8">
                                        <span id="search_plate">
                                            <input id="search" type="search" name="search" list="datalistOptions" id="exampleDataList" class="newsletters-all-search searchform ps-1" placeholder="{{__('translate.Search.........')}}">
                                            <i class="catg_search-icon fa fa-spinner fa-spin catg_search-hidden"></i>
                                            <datalist id="datalistOptions">
                                            @foreach($subscribers as $item)
                                                <option value="{{$item->id}}">
                                                <option value="{{$item->email}}">
                                            @endforeach
                                            </datalist>
                                        </span>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped ord_table center border-1 mt-2" id="pos_cat_content6">
                                        <tr class="table-row order_body acc_setting_table bg-filter" id="pos_cat_content7">
                                            <th data-coloumn="id" data-order="desc" class="table_th_color txt col ps-1 pt-1">ID</th>
                                            <th class="table_th_color tot_pending_ col pt-1">Action</th>
                                            <th data-coloumn="id" data-order="desc" class="table_th_color txt ps-1 pt-1">Email</th>
                                        </tr>
                                        <tbody class="bg-transparent" id="newsletter_data_table">

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
                                            <label class="tot-search mt-3 pt-2" for="tot_cagt"> Total Subscriber :</label>
                                            <label for="total_medic_records" id="iteam_label4"><span class="total_users" style="font-weight: 600;color:darkcyan;font-size:12px;" id="total_news_letter_records">
                                                </span><span id="iteam_label6" style="font-weight: 600;color:darkcyan;font-size:12px;">.00</span>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-8">
                                        <div class="pagination" id="newsletter_data_table_paginate">

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