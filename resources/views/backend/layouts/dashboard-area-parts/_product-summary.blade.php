<div class="col-xl-12 mt-2">

    <div class="row mb-2">
        <div class="col-xl-8">
            <div class="card form-control form-control-sm mt-1 ps-2 pb-2 pe-2 pt-2 prod_reslt">
                <!-- =============== Number of total product ============== -->
                <div class="row">
                    <div class="col-xl-4">
                        <span class="plantform produ ps-1">
                            <svg version="1.1" id="Layer_1" width="15px" height="15px" fill="#333333c9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="122.433px" viewBox="0 0 122.88 122.433" enable-background="new 0 0 122.88 122.433" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="122.88,61.217 59.207,122.433 59.207,83.029 0,83.029 0,39.399 59.207,39.399 59.207,0 122.88,61.217"/></g></svg>
                            {{__('translate.Total Products')}} <span class="pro_"></span>
                        </span>
                    </div>
                    <div class="col-xl-5">
                        <div class="progress_header loadheight skeleton-children" style="height:0.6em;">
                            <div id="loader" class="progress-bar progress-bar-striped progress-bar-summary-animated bg-silver-light skeleton" role="progressbar" aria-valuenow="100" aria-valuemin="25" aria-valuemax="100" style="width: 75%;"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 amount-pill">
                        <span class='counter_first badge rounded-pill bg-light-silver ms-2  iu pe-1' data-val='$row.00'>{{$product_counts}}.00</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <span class="plantform produ ps-1">
                            <svg version="1.1" id="Layer_1" width="15px" height="15px" fill="#333333c9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="122.433px" viewBox="0 0 122.88 122.433" enable-background="new 0 0 122.88 122.433" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="122.88,61.217 59.207,122.433 59.207,83.029 0,83.029 0,39.399 59.207,39.399 59.207,0 122.88,61.217"/></g></svg>
                            {{__('translate.Total Category')}} <span class="pro_"></span>
                        </span>
                    </div>
                    <div class="col-xl-5">
                        <div class="progress_header loadheight skeleton-children" style="height:0.6em;">
                            <div id="loader" class="progress-bar progress-bar-striped progress-bar-summary-animated bg-silver-light skeleton" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:50%;"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 amount-pill">
                        <span class='counter_first badge rounded-pill bg-light-silver ms-2  iu pe-1' data-val='$row.00'>{{$category_counts}}.00</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <span class="plantform produ ps-1">
                            <svg version="1.1" id="Layer_1" width="15px" height="15px" fill="#333333c9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="122.433px" viewBox="0 0 122.88 122.433" enable-background="new 0 0 122.88 122.433" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="122.88,61.217 59.207,122.433 59.207,83.029 0,83.029 0,39.399 59.207,39.399 59.207,0 122.88,61.217"/></g></svg>
                            {{__('translate.Total Sub-Cateogry')}} <span class="pro_"></span>
                        </span>
                    </div>
                    <div class="col-xl-5">
                        <div class="progress_header loadheight skeleton-children" style="height:0.6em;">
                            <div id="loader" class="progress-bar progress-bar-striped progress-bar-summary-animated bg-silver-light skeleton" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:30%;"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 amount-pill">
                        <span class='counter_first badge rounded-pill bg-light-silver ms-2  iu pe-1' data-val='$row.00'>{{$subCategory_counts}}.00</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <span class="plantform produ ps-1">
                            <svg version="1.1" id="Layer_1" width="15px" height="15px" fill="#333333c9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="122.433px" viewBox="0 0 122.88 122.433" enable-background="new 0 0 122.88 122.433" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="122.88,61.217 59.207,122.433 59.207,83.029 0,83.029 0,39.399 59.207,39.399 59.207,0 122.88,61.217"/></g></svg>
                            {{__('translate.Total Brand')}} <span class="pro_"></span>
                        </span>
                    </div>
                    <div class="col-xl-5">
                        <div class="progress_header loadheight skeleton-children" style="height:0.6em;">
                            <div id="loader" class="progress-bar progress-bar-striped progress-bar-summary-animated bg-silver-light skeleton" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:60%;"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 amount-pill">
                        <span class='counter_first badge rounded-pill bg-light-silver ms-2  iu pe-1' data-val='$row.00'>{{$brand_counts}}.00</span>
                    </div>
                </div>
            </div>
            <div class="card form-control form-control-sm mt-3 ps-2 pb-2 pe-2 mb-3 prod_reslt">
                <div class="row">
                    <div class="col-xl-4">
                        <span class="plantform produ ps-1">
                            <svg version="1.1" id="Layer_1" width="15px" height="15px" fill="#333333c9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="122.433px" viewBox="0 0 122.88 122.433" enable-background="new 0 0 122.88 122.433" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="122.88,61.217 59.207,122.433 59.207,83.029 0,83.029 0,39.399 59.207,39.399 59.207,0 122.88,61.217"/></g></svg>
                            {{__('translate.Total Supplier')}} <span class="pro_"></span>
                        </span>
                    </div>
                    <div class="col-xl-5">
                        <div class="progress_header loadheight skeleton-children" style="height:0.6em;">
                            <div id="loader" class="progress-bar progress-bar-striped progress-bar-summary-animated bg-silver-light skeleton" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:20%;"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 amount-pill">
                        <span class='counter_first badge rounded-pill bg-light-silver ms-2  iu pe-1' data-val='$row.00'>{{$supplier_counts}}.00</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <span class="plantform produ ps-1">
                            <svg version="1.1" id="Layer_1" width="15px" height="15px" fill="#333333c9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="122.433px" viewBox="0 0 122.88 122.433" enable-background="new 0 0 122.88 122.433" xml:space="preserve"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="122.88,61.217 59.207,122.433 59.207,83.029 0,83.029 0,39.399 59.207,39.399 59.207,0 122.88,61.217"/></g></svg>
                            {{__('translate.Total Vendor')}} <span class="pro_"></span>
                        </span>
                    </div>
                    <div class="col-xl-5">
                        <div class="progress_header loadheight skeleton-children" style="height:0.6em;">
                            <div id="loader" class="progress-bar progress-bar-striped progress-bar-summary-animated bg-silver-light skeleton" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:10%;"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 amount-pill">
                        <span class='counter_first badge rounded-pill bg-light-silver ms-2  iu pe-1' data-val='$row.00'>{{$vendor_counts}}.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card order_line_chart skeleton mt-1">
                <div class="res_chart_pie skeleton ms-1" id="piechart_3d" width="100%" height="17"></div>
            </div>
        </div>
    </div>

</div>