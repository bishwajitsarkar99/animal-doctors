<script type="module">
    import { buttonLoader } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    $(document).ready(() => {
        // Initialize the button loader for the login button
        buttonLoader('#save', '.add-icon', '.category-btn-text', 'ADD...', 'ADD', 3000);
        buttonLoader('#update_btn', '.update-icon', '.update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#update_btn_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#yesButton', '.delete-yes-icon', '.delete-yes-btn-text', 'Yes...', 'Yes', 1000);
        buttonLoader('#deleteLoader', '.delete-icon', '.delete-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);
        buttonLoader('#showModel', '.product-icon', '.product-btn-text', 'Product...', 'Product', 1000);

        fetch_model_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Model Name Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                var statusClass, statusText, statusSignal, statusBg, statusTextColor, permissionSignal;
                if (row.status == 1) {
                    statusClass = 'text-white';
                    statusText = 'Active';
                    statusTextColor = 'text-primary';
                    statusSignal = '<i class="fa-solid fa-check"></i>';
                    statusBg = 'badge rounded-pill bg-success';
                    permissionSignal = 'light2-focus';
                } else if (row.status == 0) {
                    statusClass = 'text-white';
                    statusText = 'Deny';
                    statusTextColor = 'text-danger';
                    statusSignal = '<i class="fa-solid fa-xmark"></i>';
                    statusBg = 'badge rounded-pill bg-danger';
                    permissionSignal = 'danger-focus';
                }
                return `
                    <tr class="table-row user-table-row" key="${key}" id="model_tb">
                        <td class="sn border_ord" id="model_tb2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="model_tb3">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                                <span class="action-box-arrow mini"></span>
                            </ul>
                        </td>
                        <td class="ps-1 border_ord" id="model_tb7">${row.products ? row.products.product_name : ''}</td>
                        <td class="txt_ ps-1" id="model_tb4">
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" readonly></span>
                            ${row.model_name}
                        </td>
                        <td class="tot_complete_ pe-2" id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${statusBg} ${statusClass}">${statusSignal}</span>
                            <span class="${statusTextColor}">${statusText}</span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="model_tb5">
                            <input class="form-switch form-check-input check_permission" type="checkbox" model_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Model Data ------------------
        function fetch_model_data(
            query = '', 
            url = null, 
            perItem = null, 
            sortFieldID = 'id', 
            sortFieldModelName = 'model_name',
            sortFieldProductName = 'product_id',
            sortFieldStatus = 'status', 
            sortFieldDirection = 'desc',
        ) {

            if (perItem === null) {
                perItem = $("#perItemControls").val();
            }
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-model.action')}}?per_item=${perItem}`;
            }else {
                current_url += `&per_item=${perItem}`
            }

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query,
                    sort_field_id : sortFieldID,
                    sort_field_model_name : sortFieldModelName,
                    sort_field_product_id : sortFieldProductName,
                    sort_field_status : sortFieldStatus,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#model_data_table").html(table_rows([...data]));
                    $("#model_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_model_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return {
                            label: item.products.product_name + " - " + item.model_name,
                            value: item.model_name
                        };
                    });

                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions,
                        minLength: 1,
                    });
                }

            });
        }
        // peritem change
        $("#perItemControls").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_model_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_model_data(query);

        });

        // Search-loader
        $(document).on('keyup', '.searchform', function(){

            var time = null;
            $("#model_data_table").addClass('skeleton');
            $("#cat_td6").addClass('skeleton');
            $("#model_tb2").addClass('skeleton');
            $("#model_tb3").addClass('skeleton');
            $("#model_tb4").addClass('skeleton');
            $("#model_tb5").addClass('skeleton');
            $("#model_tb6").addClass('skeleton');
            $("#model_tb7").addClass('skeleton');

            time = setTimeout(() => {
                $("#model_data_table").removeClass('skeleton');
                $("#cat_td6").removeClass('skeleton');
                $("#model_tb2").removeClass('skeleton');
                $("#model_tb3").removeClass('skeleton');
                $("#model_tb4").removeClass('skeleton');
                $("#model_tb5").removeClass('skeleton');
                $("#model_tb6").removeClass('skeleton');
                $("#model_tb7").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // Paginate Page-------------------------------
        const paginate_html = ({
            links,
            total
        }) => {
            if (total == 0) {
                return "";
            }

            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination">
                        ${links.map((link, key) => {
                            return `
                                <li class="page-item${link.active? ' active': ''}" key=${key}>
                                    <a class="page-link btn_page" href="${link.url? link.url: '#'}">
                                        ${link.label}
                                    </a>
                                </li>
                            `;
                        }).join("\n")}
                    </ul>
                </nav>
            `;
        }
        // change paginate page------------------------
        $("#model_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_model_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#model_name").focus();
            $("#update_btn").attr('hidden',true);
            $("#model_name").removeClass('is-invalid');
            $("#product_id").removeClass('is-invalid');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');
            $('.edit_product_id_error').addClass('display-none');
        });

        // Model Name and Product Name Filed
        $(document).on('keyup', "#model_name, #product_id", function(){
            
            var modelName = $("#model_name").val();
            var productName = $("#product_id").val();

            if (modelName !== '') {
                $("#model_name").removeClass('is-invalid');
                $('#savForm_error').addClass('display-none');
                $('#updateForm_errorList').addClass('display-none');
            }
            if (productName !== '') {
                $("#product_id").removeClass('is-invalid');
                $('#savForm_error').addClass('display-none');
                $('.edit_product_id_error').empty();
                $('.edit_product_id_error').addClass('display-none');
                $('#updateForm_errorList').addClass('display-none');
            }
        });

        // Add Model
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            $('.edit_product_id_error').empty();
            var productName = $("#product_id").val();

            if(productName.trim() == ''){
                $("#product_id").addClass('is-invalid');
                $("#product_id").closest('.model_nme').append('<span class="edit_product_id_error alert_show_errors ps-2"> Product id is required.</span>');
            }

            var data = {
                'model_name': $('#model_name').val(),
                'product_id': $('#product_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_model.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').removeClass('display-none');
                            $('#product_id').removeClass('display-none');
                            $("#model_name").addClass('is-invalid');
                            $('#savForm_error').addClass('alert_show_errors');
                            $('#savForm_error').append('<span class="error_val">' + err_value + '</span>');
                            $('#savForm_error').fadeIn();
                        });
                    } else {
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            $('#savForm_error').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            $('#model_name').val("");
                            $('#product_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_model_data();
                        }, 1500);
                    }

                }
            });
        });

        // Edit Model
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            $("#update_btn").removeAttr('hidden');
            $('.edit_product_id_error').empty();
            $("#product_id").removeClass('is-invalid');
            $("#model_name").removeClass('is-invalid');
            $('.edit_product_id_error').addClass('display-none');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');

            var model_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-model/" + model_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#model_id').val(model_id);
                        $('.edit_model_name').val(response.messages.model_name);
                        $('#product_id').val(response.messages.product_id);
                    }
                }
            });
        });
        // Confirm Update Model Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmmodel").modal('show');
            $(".update_title").addClass('skeleton');
            $(".head_btn3").addClass('skeleton');
            $("#cate_confirm_update").addClass('skeleton');
            $(".update_confirm").addClass('skeleton');
            $(".delete_cancel").addClass('skeleton');
            var time = null;
            time = setTimeout(() => {
                $(".update_title").removeClass('skeleton');
                $(".head_btn3").removeClass('skeleton');
                $("#cate_confirm_update").removeClass('skeleton');
                $(".update_confirm").removeClass('skeleton');
                $(".delete_cancel").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });

        // Update Model
        $(document).on('click', '.update_confirm', function(e) {
            e.preventDefault();
            $('.edit_product_id_error').empty();
            var productName = $("#product_id").val();

            if(productName.trim() == ''){
                $("#product_id").addClass('is-invalid');
                $("#product_id").closest('.model_nme').append('<span class="edit_product_id_error alert_show_errors ps-2"> Product id is required.</span>');
                $("#updateconfirmmodel").modal('hide');
            }

            var model_id = $('#model_id').val();
            var data = {
                'model_name': $('.edit_model_name').val(),
                'product_id': $('#product_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-model/" + model_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').removeClass('display-none');
                            $('#product_id').removeClass('display-none');
                            $("#model_name").addClass('is-invalid');
                            $('#model_name').removeClass('display-none');
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-2');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateconfirmmodel").modal('hide');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $("#updateconfirmmodel").modal('hide');
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            $('#updateForm_errorList').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            $('.edit_model_name').val("");
                            $('#product_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_model_data();
                        }, 1500);
                    }
                }
            });

        });

        // Delete Model Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var brand_id = $(this).val();
            $('#delete_model_id').val(brand_id);
            $('#deletemodel').modal('show');

            var time = null;
            $(".head_title_delt").addClass('skeleton');
            $(".cols_can").addClass('skeleton');
            $("#model_delt").addClass('skeleton');
            $("#model_delt2").addClass('skeleton');
            $("#model_delt3").addClass('skeleton');
            $("#model_delt4").addClass('skeleton');
            $("#delete_model_id").addClass('skeleton');
            $("#yesButton").addClass('min-skeleton');
            $("#noButton").addClass('min-skeleton');

            time = setTimeout(() => {
                $(".head_title_delt").removeClass('skeleton');
                $(".cols_can").removeClass('skeleton');
                $("#model_delt").removeClass('skeleton');
                $("#model_delt2").removeClass('skeleton');
                $("#model_delt3").removeClass('skeleton');
                $("#model_delt4").removeClass('skeleton');
                $("#delete_model_id").removeClass('skeleton');
                $("#yesButton").removeClass('min-skeleton');
                $("#noButton").removeClass('min-skeleton'); 
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }


        });
        // Confirm Delete Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $("#deleteconfirmmodel").modal('show');
            $('.confirm_title').addClass('skeleton');
            $('.head_btn_confirm').addClass('skeleton');
            $('#cate_confirm').addClass('skeleton');
            $("#model_delt4").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $('.confirm_title').removeClass('skeleton');
                $('.head_btn_confirm').removeClass('skeleton');
                $('#cate_confirm').removeClass('skeleton');
                $("#model_delt4").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton'); 
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var model_id = $('#delete_model_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-model/" + model_id,
                success: function(response) {
                    $('#deletemodel').modal('hide');
                    $("#deleteconfirmmodel").modal('hide');
                    $("#accessconfirmbranch").modal('show');
                    $("#pageLoader").removeAttr('hidden');
                    $("#access_modal_box").addClass('loader_area');
                    $("#processModal_body").removeClass('loading_body_area');
                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#pageLoader").attr('hidden', true);
                        $("#access_modal_box").removeClass('loader_area');
                        $("#processModal_body").addClass('loading_body_area'); 
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_model_data();
                    }, 1500);
                }

            });
        });

        // Update-Status ------------------
        $("#model_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('model_status.action')}}";

            const pagination_url = $("#model_data_table_paginate .active").attr('href');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: current_url,
                dataType: 'json',
                data: {
                    id: $(this).attr('model_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    $("#accessconfirmbranch").modal('show');
                    $("#dataCheckingProgress").removeAttr('hidden');
                    $("#access_modal_box").addClass('progress_body');
                    $("#processModal_body").addClass('loading_body_area');
                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#dataCheckingProgress").attr('hidden', true);
                        $("#access_modal_box").removeClass('progress_body');
                        $("#processModal_body").removeClass('loading_body_area');
                        console.log('messages', messages);
                        $("#success_message").text(messages.messages);
                        fetch_model_data('', pagination_url);
                    }, 1500);
                }
            });
        });

        // Show-Product Modal---------------
        $("#showModel").on('click', function(){
            $("#accessconfirmbranch").modal('show');
            $("#pageLoader").removeAttr('hidden');
            $("#access_modal_box").addClass('loader_area');
            $("#processModal_body").removeClass('loading_body_area');
            setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#pageLoader").attr('hidden', true);
                $("#access_modal_box").removeClass('loader_area');
                $("#processModal_body").addClass('loading_body_area'); 
                $("#model").modal('show');
    
                var time = null;
                $(".head_title").addClass('skeleton');
                $(".cols_title").addClass('skeleton');
                $("#tb_orgin").addClass('skeleton');
                $("#search_area_").addClass('skeleton');
                $("#tb_orgin2").addClass('skeleton');
                $("#med_label2").addClass('skeleton');
                $("#orgin_nam").addClass('skeleton');
                $("#origin_nam2").addClass('skeleton');
                $("#origin_nam3").addClass('skeleton');
                $("#origin_nam4").addClass('skeleton');
                $("#origin_nam5").addClass('skeleton');
                $("#prod_table").addClass('skeleton');
                $("#iteam_label3").addClass('total-record-skeletone');
                $("#total_prod_records").addClass('skeleton');
                $("#iteam_label6").addClass('skeleton');
                $(".per_page").addClass('skeleton');
                $(".select_item").addClass('select-skeleton');
                $(".totProduct").addClass('pill-label-skeletone');
                $("#prod_get_table_paginate").addClass('paginate-skeleton');
    
                time = setTimeout(() => {
                    $(".head_title").removeClass('skeleton');
                    $(".cols_title").removeClass('skeleton');
                    $("#tb_orgin").removeClass('skeleton');
                    $("#search_area_").removeClass('skeleton');
                    $("#tb_orgin2").removeClass('skeleton');
                    $("#med_label2").removeClass('skeleton');
                    $("#orgin_nam").removeClass('skeleton');
                    $("#origin_nam2").removeClass('skeleton');
                    $("#origin_nam3").removeClass('skeleton');
                    $("#origin_nam4").removeClass('skeleton');
                    $("#origin_nam5").removeClass('skeleton');
                    $("#prod_table").removeClass('skeleton');
                    $("#iteam_label3").removeClass('total-record-skeletone');
                    $("#total_prod_records").removeClass('skeleton');
                    $("#iteam_label6").removeClass('skeleton');
                    $(".per_page").removeClass('skeleton');
                    $(".select_item").removeClass('select-skeleton');
                    $(".totProduct").removeClass('pill-label-skeletone');
                    $("#prod_get_table_paginate").removeClass('paginate-skeleton');
                }, 1000);
    
                return ()=>{
                    clearTimeout(time);
                }
            }, 1500);
        });

        $(document).load('click', function(){
            $("#active_loader").addClass('loader_chart');
        });

        // Event Listener for sorting columns
        $(document).on('click', '#th_sort', function(){
            var button = $(this);
            // Get the column and current order
            var column = button.data('column');
            var order = button.data('order');
            // Toggle the order (asc/desc)
            order = order === 'desc' ? 'asc' : 'desc';
            button.data('order', order);
            fetch_model_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'model_name' ? column : 'model_name',
                column === 'product_id' ? column : 'product_id',
                column === 'status' ? column : 'status',
                order
            );
            // Reset all icons in the table headers first - icon part
            $("#th_sort").find('.toggle-icon').html('<i class="fa-solid fa-arrow-down-long"></i>');
            var icon = button.find('.toggle-icon');
            if(order === 'desc'){
                icon.html('<i class="fa-solid fa-arrow-up-long"></i>');
                $(".toggle-icon").fadeIn(300);
            }else{
                icon.html('<i class="fa-solid fa-arrow-down-long"></i>');
                $(".toggle-icon").fadeIn(300);
            }

        });
    });
</script>