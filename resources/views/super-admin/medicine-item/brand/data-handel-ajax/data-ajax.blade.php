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
        buttonLoader('#showOrigin', '.origin-icon', '.origin-btn-text', 'Origin...', 'Origin', 1000);

        fetch_brand_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Brand Name Data Not Exists On Server !
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
                    <tr class="table-row user-table-row" key="${key}" id="brand_tab">
                        <td class="sn border_ord" id="brand_tab2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="brand_tab4">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="ps-1 border_ord" id="brand_tab3">${row.medicine_origins ? row.medicine_origins.origin_name : ''}</td>
                        <td class="txt_ ps-1" id="brand_tab5">${row.brand_name}</td>
                        <td class="tot_complete_ pe-2" id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${statusBg} ${statusClass}">${statusSignal}</span>
                            <span class="${statusTextColor}">${statusText}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" readonly></span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="brand_tab6">
                            <input class="form-switch form-check-input check_permission" type="checkbox" brand_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Brand Data ------------------
        function fetch_brand_data(
            query = '', 
            url = null, 
            perItem = null, 
            sortFieldID = 'id', 
            sortFieldOriginName = 'origin_id',
            sortFieldBrandName = 'brand_name',
            sortFieldStatus = 'status', 
            sortFieldDirection = 'desc',
        ) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-brand.action')}}?per_item=${perItem}`;
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
                    sort_field_origin_id : sortFieldOriginName,
                    sort_field_brand_name : sortFieldBrandName,
                    sort_field_status : sortFieldStatus,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#brand_data_table").html(table_rows([...data]));
                    $("#brand_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_brand_records").text(total);
                    // Initialze the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return {
                            label: item.medicine_origins.origin_name + " - " + item.brand_name,
                            value: item.origin_id
                        };
                    });
                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions,
                    });
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_brand_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_brand_data(query);

        });

        // Search-loader
        $(document).on('keyup', '.searchform', function(){

            var time = null;
            $("#brand_data_table").addClass('skeleton');
            $("#cat_td6").addClass('skeleton');
            $("#brand_tab2").addClass('skeleton');
            $("#brand_tab3").addClass('skeleton');
            $("#brand_tab4").addClass('skeleton');
            $("#brand_tab5").addClass('skeleton');
            $("#brand_tab6").addClass('skeleton');
            $("#brand_tab7").addClass('skeleton');

            time = setTimeout(() => {
                $("#brand_data_table").removeClass('skeleton');
                $("#cat_td6").removeClass('skeleton');
                $("#brand_tab2").removeClass('skeleton');
                $("#brand_tab3").removeClass('skeleton');
                $("#brand_tab4").removeClass('skeleton');
                $("#brand_tab5").removeClass('skeleton');
                $("#brand_tab6").removeClass('skeleton');
                $("#brand_tab7").removeClass('skeleton');
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
        $("#brand_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_brand_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#brand_name").focus();
            $("#update_btn").attr('hidden',true);
            $("#brand_name").removeClass('is-invalid');
            $("#origin_id").removeClass('is-invalid');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');
            $('.edit_origin_id_error').addClass('display-none');
        });

        // Brand and Origin Name Filed
        $(document).on('keyup', "#brand_name, #origin_id", function(){
            
            var brandName = $("#brand_name").val();
            var originName = $("#origin_id").val();

            if (brandName !== '') {
                $("#brand_name").removeClass('is-invalid');
                $('#savForm_error').addClass('display-none');
                $('#updateForm_errorList').addClass('display-none');
            }
            if (originName !== '') {
                $("#origin_id").removeClass('is-invalid');
                $('#savForm_error').addClass('display-none');
                $('.edit_origin_id_error').empty();
                $('.edit_origin_id_error').addClass('display-none');
                $('#updateForm_errorList').addClass('display-none');
            }
        });

        // Add Brand
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            $('.edit_origin_id_error').empty();
            var originName = $("#origin_id").val();

            if(originName.trim() == ''){
                $("#origin_id").addClass('is-invalid');
                $("#origin_id").closest('.brand_nme').append('<span class="edit_origin_id_error alert_show_errors ps-2"> Origin id is required.</span>');
            }

            var data = {
                'brand_name': $('#brand_name').val(),
                'origin_id': $('#origin_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_brand.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').removeClass('display-none');
                            $('#origin_id').removeClass('display-none');
                            $("#brand_name").addClass('is-invalid');
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
                            $('#brand_name').val("");
                            $('#origin_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_brand_data();
                            
                        }, 1500);
                    }

                }
            });
        });

        // Edit Brand
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            $("#update_btn").removeAttr('hidden');
            $('.edit_origin_id_error').empty();
            $("#origin_id").removeClass('is-invalid');
            $("#brand_name").removeClass('is-invalid');
            $('.edit_origin_id_error').addClass('display-none');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');

            var brand_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-brand/" + brand_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#brand_id').val(brand_id);
                        $('.edit_brand_name').val(response.messages.brand_name);
                        $('.edit_origin_id').val(response.messages.origin_id);
                    }
                }
            });
        });
        // Confirm Update Brand Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmbrand").modal('show');
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
        // Update Brand
        $(document).on('click', '.update_confirm', function(e) {
            e.preventDefault();
            $('.edit_origin_id_error').empty();
            var originName = $("#origin_id").val();

            if(originName.trim() == ''){
                $("#origin_id").addClass('is-invalid');
                $("#origin_id").closest('.brand_nme').append('<span class="edit_origin_id_error alert_show_errors ps-2"> Origin id is required.</span>');
                $("#updateconfirmbrand").modal('hide');
            }

            var brand_id = $('#brand_id').val();
            var data = {
                'brand_name': $('.edit_brand_name').val(),
                'origin_id': $('#origin_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-brand/" + brand_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').removeClass('display-none');
                            $('#origin_id').removeClass('display-none');
                            $("#brand_name").addClass('is-invalid');
                            $('#brand_name').removeClass('display-none');
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-2');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateconfirmbrand").modal('hide');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $("#accessconfirmbranch").modal('show');
                        $("#updateconfirmbrand").modal('hide');
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
                            $('.edit_brand_name').val("");
                            $('#origin_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_brand_data();
                        }, 1500);
                    }
                }
            });

        });

        // Delete Brand Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var brand_id = $(this).val();
            $('#delete_brand_id').val(brand_id);
            $('#deletebrand').modal('show');

            var time = null;
            $(".head_title").addClass('skeleton');
            $(".cols_title").addClass('skeleton');
            $("#brnad_delt").addClass('skeleton');
            $("#brnad_delt2").addClass('skeleton');
            $("#brnad_delt3").addClass('skeleton');
            $("#delete_brand_id").addClass('skeleton');
            $("#yesButton").addClass('min-skeleton');
            $("#noButton").addClass('min-skeleton');

            time = setTimeout(() => {
                $(".head_title").removeClass('skeleton');
                $(".cols_title").removeClass('skeleton');
                $("#brnad_delt").removeClass('skeleton');
                $("#brnad_delt2").removeClass('skeleton');
                $("#brnad_delt3").removeClass('skeleton');
                $("#delete_brand_id").removeClass('skeleton');
                $("#yesButton").removeClass('min-skeleton');
                $("#noButton").removeClass('min-skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // Confirm Delete Brand Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $("#deleteconfirmbrand").modal('show');
            $('.confirm_title').addClass('skeleton');
            $('.head_btn_confirm').addClass('skeleton');
            $('#cate_confirm').addClass('skeleton');
            $("#brnad_delt4").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $('.confirm_title').removeClass('skeleton');
                $('.head_btn_confirm').removeClass('skeleton');
                $('#cate_confirm').removeClass('skeleton');
                $("#brnad_delt4").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var brand_id = $('#delete_brand_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-brand/" + brand_id,
                success: function(response) {
                    $("#accessconfirmbranch").modal('show');
                    $('#deletebrand').modal('hide');
                    $("#deleteconfirmbrand").modal('hide');
                    $("#pageLoader").removeAttr('hidden');
                    $("#access_modal_box").addClass('loader_area');
                    $("#processModal_body").removeClass('loading_body_area');
                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#pageLoader").attr('hidden', true);
                        $("#access_modal_box").removeClass('loader_area');
                        $("#processModal_body").addClass('loading_body_area');
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_brand_data();
                    }, 1500);
                }

            });
        });

        // Update-Status ------------------
        $("#brand_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('brand_status.action')}}";

            const pagination_url = $("#brand_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('brand_id'),
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
                        fetch_brand_data('', pagination_url);
                    }, 1500);
                }
            });
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
            fetch_brand_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'origin_id' ? column : 'origin_id',
                column === 'brand_name' ? column : 'brand_name',
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