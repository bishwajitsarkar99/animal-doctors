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
        buttonLoader('#showCategory', '.get-cat-icon', '.get-cat-btn-text', 'Category...', 'Category', 1000);

        fetch_subcategory_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            <svg width="20px" height="20px" fill="rgb(220, 53, 69)" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 120.54" style="enable-background:new 0 0 122.88 120.54" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M95.7,65.5c15.01,0,27.18,12.17,27.18,27.18c0,15.01-12.17,27.18-27.18,27.18 c-15.01,0-27.18-12.17-27.18-27.18C68.52,77.67,80.69,65.5,95.7,65.5L95.7,65.5z M96.74,77.05c1.18,0,2.12,0.34,2.79,1.02 c0.67,0.68,1.01,1.6,1.01,2.8c0,1.21-0.58,2.29-1.74,3.23c-1.17,0.94-2.53,1.42-4.07,1.42c-1.16,0-2.09-0.32-2.79-0.98 c-0.71-0.66-1.06-1.51-1.06-2.57c0-1.34,0.58-2.49,1.73-3.47C93.75,77.53,95.13,77.05,96.74,77.05L96.74,77.05z M90.94,107.09 V91.56h-2.87c0-3.91,7.19-1.37,12.48-2.71v18.24C110.54,107.09,80.68,107.09,90.94,107.09L90.94,107.09z M17.69,26.67 c8.1,2.71,19.38,4.38,31.91,4.38s23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06c0-2.81-4.4-5.69-11.51-8.06 c-8.1-2.7-19.38-4.38-31.91-4.38s-23.81,1.67-31.91,4.38C2.6,15.59,2.18,21.5,17.69,26.67L17.69,26.67z M6.24,47.86 c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.71,19.38,4.38,31.91,4.38s23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06h0.03 v-19.3c-2.53,1.73-5.78,3.26-9.59,4.53c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72 c-3.77-1.26-6.98-2.76-9.49-4.47V47.86L6.24,47.86z M63.3,92.54c-4.35,0.44-8.95,0.67-13.7,0.67c-13.16,0-25.13-1.8-33.86-4.72 c-3.77-1.26-6.98-2.76-9.49-4.47v18.49c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c7.52,0,14.58-0.6,20.78-1.67 c1.56,1.94,3.33,3.7,5.29,5.24c-7.53,1.65-16.49,2.6-26.07,2.6c-13.16,0-25.13-1.8-33.86-4.72c-4.6-1.54-15.67-6.58-15.67-12.62 c0-0.71,0-1.3,0-1.98C0.06,73.69,0,46.15,0,18.61c0-5.76,6.01-10.65,15.73-13.9C24.46,1.8,36.44,0,49.6,0 c13.16,0,25.13,1.8,33.86,4.72c8.85,2.95,14.62,7.27,15.59,12.37c0.12,0.32,0.18,0.67,0.18,1.04v42.37 c-1.2-0.14-2.42-0.21-3.66-0.21c-0.85,0-1.68,0.03-2.51,0.1v-3.74c-2.53,1.73-5.78,3.26-9.59,4.53 c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72c-3.77-1.26-6.98-2.76-9.49-4.47v18.49 c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c5.01,0,9.82-0.27,14.31-0.76C63.51,88.3,63.3,90.4,63.3,92.54 L63.3,92.54z"/></g></svg>
                            Search sub category data not exists on server <span style="color:rgb(220, 53, 69)">!</span>
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
                    <tr class="table-row user-table-row" id="sub_td" key="${key}">
                        <td class="sn border_ord" id="sub_td2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="sub_td4">
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
                        <td class="border_ord ps-1" id="sub_td3">${row.categories ? row.categories.category_name : ''}</td>
                        <td class="txt_ ps-1" id="sub_td5">
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" readonly></span>
                            ${row.sub_category_name}
                        </td>
                        <td class="tot_complete_ pe-2 id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${statusBg} ${statusClass}">${statusSignal}</span>
                            <span class="${statusTextColor}">${statusText}</span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="sub_td6">
                            <input class="form-switch form-check-input check_permission" type="checkbox" subcategory_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Sub Category ------------------
        function fetch_subcategory_data(
            query = '', 
            url = null, 
            perItem = null,
            sortFieldID = 'id', 
            sortFieldCategoryName = 'category_id',
            sortFieldSubCategoryName = 'sub_category_name', 
            sortFieldStatus = 'status', 
            sortFieldDirection = 'desc',
        ) {
            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-subcategory.action')}}?per_item=${perItem}`;
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
                    sort_field_category_name : sortFieldCategoryName,
                    sort_field_sub_category_name : sortFieldSubCategoryName,
                    sort_field_status : sortFieldStatus,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#subcategory_data_table").html(table_rows([...data]));
                    $("#subcategory_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_subcategory_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return {
                            label: `${item.categories.category_name} - ${item.sub_category_name}`,
                            value: item.sub_category_name
                        };
                    });
                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions
                    });
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_subcategory_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_subcategory_data(query);

        });

        // search-loader
        $(document).on('keyup', '.searchform', function(){
            var time = null;

            $("#subcategory_data_table").addClass('skeleton');
            $("#sub_td2").addClass('skeleton');
            $("#sub_td3").addClass('skeleton');
            $("#sub_td4").addClass('skeleton');
            $("#sub_td5").addClass('skeleton');
            $("#sub_td6").addClass('skeleton');
            $("#sub_td7").addClass('skeleton');

            time = setTimeout(() => {
                $("#subcategory_data_table").removeClass('skeleton');
                $("#sub_td2").removeClass('skeleton');
                $("#sub_td3").removeClass('skeleton');
                $("#sub_td4").removeClass('skeleton');
                $("#sub_td5").removeClass('skeleton');
                $("#sub_td6").removeClass('skeleton');
                $("#sub_td7").removeClass('skeleton');
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
        $("#subcategory_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_subcategory_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#update_btn").attr('hidden',true);
            $("#sub_category_name").focus();
            $("#category_id").removeClass('is-invalid');
            $("#sub_category_name").removeClass('is-invalid');
            $('.edit_category_id_error').addClass('display-none');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');
        });

        // Category Name Filed
        $(document).on('keyup', "#category_id, #sub_category_name", function(){
            
            var categoryName = $("#category_id").val();
            var subCategoryName = $("#sub_category_name").val();
            if (categoryName !== '') {
                $("#category_id").removeClass('is-invalid');
                $('.edit_category_id_error').empty();
                $('.edit_category_id_error').addClass('display-none');
                $('#savForm_error').addClass('display-none');
            }
            if(subCategoryName !== ''){
                $("#sub_category_name").removeClass('is-invalid');
                $('#savForm_error').addClass('display-none');
                $('#updateForm_errorList').addClass('display-none');
            }
        });

        // Add Sub Category
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            $('.edit_category_id_error').empty();
            var categoryName = $("#category_id").val();

            if(categoryName.trim() == ''){
                $("#category_id").addClass('is-invalid');
                $("#category_id").closest('.cat_nme').append('<span class="edit_category_id_error alert_show_errors ps-2"> Category id is required.</span>');
            }

            var data = {
                'sub_category_name': $('#sub_category_name').val(),
                'category_id': $('#category_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_subcategory.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').removeClass('display-none');
                            $('#category_id').removeClass('display-none');
                            $("#sub_category_name").addClass('is-invalid');
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
                            $('#sub_category_name').val("");
                            $('#category_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_subcategory_data();
                        }, 1500);
                    }

                }
            });
        });

        // Edit Sub Category
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            $("#update_btn").removeAttr('hidden');
            $('.edit_category_id_error').empty();
            $("#category_id").removeClass('is-invalid');
            $("#sub_category_name").removeClass('is-invalid');
            $('.edit_category_id_error').addClass('display-none');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');

            var sub_category_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-sub-category/" + sub_category_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#sub_category_id').val(sub_category_id);
                        $('.edit_sub_category_name').val(response.messages.sub_category_name);
                        $('#category_id').val(response.messages.category_id);
                    }
                }
            });
        });
        // Show Update Sub Category Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmsubcategory").modal('show');
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
        // Update Sub Category
        $(document).on('click', '.update_confirm', function(e) {
            e.preventDefault();
            $('.edit_category_id_error').empty();

            var categoryName = $("#category_id").val();

            if(categoryName.trim() == ''){
                $("#category_id").addClass('is-invalid');
                $("#category_id").closest('.role_nme').append('<span class="edit_category_id_error alert_show_errors ps-2"> Category id is required.</span>');
                $("#updateconfirmsubcategory").modal('hide');
            }

            var sub_category_id = $('#sub_category_id').val();
            var data = {
                'sub_category_name': $('.edit_sub_category_name').val(),
                'category_id': $('.edit_category_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-sub-category/" + sub_category_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').removeClass('display-none');
                            $('#category_id').removeClass('display-none');
                            $("#sub_category_name").addClass('is-invalid');
                            $('#sub_category_name').removeClass('display-none');
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-2');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateconfirmsubcategory").modal('hide');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $("#updateconfirmsubcategory").modal('hide');
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
                            $('.edit_sub_category_name').val("");
                            $('.edit_sub_category_name').val("");
                            $('#category_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_subcategory_data();
                        }, 1500);
                    }
                }
            });

        });

        // Delete Sub Category Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var sub_category_id = $(this).val();
            $('#delete_sub_category_id').val(sub_category_id);
            $('#deletesubcategory').modal('show');
            $("#delt_content").addClass('skeleton');
            $(".head_title").addClass('skeleton');
            $(".cols_btn").addClass('skeleton');
            $("#sub_id").addClass('skeleton');
            $("#sub_id2").addClass('skeleton');
            $("#sub_id3").addClass('skeleton');
            $("#yesButton").addClass('min-skeleton');
            $("#noButton").addClass('min-skeleton');

            var time = null;
            time = setTimeout(() => {
                $("#delt_content").removeClass('skeleton');
                $(".head_title").removeClass('skeleton');
                $(".cols_btn").removeClass('skeleton');
                $("#sub_id").removeClass('skeleton');
                $("#sub_id2").removeClass('skeleton');
                $("#sub_id3").removeClass('skeleton');
                $("#yesButton").removeClass('min-skeleton');
                $("#noButton").removeClass('min-skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
        // Delete Sub Category Confirm Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $('#deleteconfirmsubcategory').modal('show');
            $("#deleteLoader").addClass('skeleton');
            $("#sub_id4").addClass('skeleton');
            $("#cate_confirm").addClass('skeleton');
            $(".confirm_title").addClass('skeleton');
            $(".head_btn_confirm").addClass('skeleton');
            var time = null;
            time = setTimeout(() => {
                $("#deleteLoader").removeClass('skeleton');
                $("#sub_id4").removeClass('skeleton');
                $("#cate_confirm").removeClass('skeleton');
                $(".confirm_title").removeClass('skeleton');
                $(".head_btn_confirm").removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delete_confirm', function(e) {
            e.preventDefault();
            var sub_category_id = $('#delete_sub_category_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-sub-category/" + sub_category_id,
                success: function(response) {
                    $('#deletesubcategory').modal('hide');
                    $('#deleteconfirmsubcategory').modal('hide');
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
                        fetch_subcategory_data();
                    }, 1500);
                }

            });
        });

        // Update-Status ------------------
        $("#subcategory_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('subcategory_status.action')}}";

            const pagination_url = $("#subcategory_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('subcategory_id'),
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
                        fetch_subcategory_data('', pagination_url);
                    }, 1500);
                }
            });
        });

        // Show Category Data----------
        $("#showCategory").on('click', function(){
            $("#accessconfirmbranch").modal('show');
            $("#pageLoader").removeAttr('hidden');
            $("#access_modal_box").addClass('loader_area');
            $("#processModal_body").removeClass('loading_body_area');
            setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#pageLoader").attr('hidden', true);
                $("#access_modal_box").removeClass('loader_area');
                $("#processModal_body").addClass('loading_body_area');
                
                $("#category").modal('show');
                $(".head_title").addClass('skeleton');
                $("#search_area_").addClass('skeleton');
                $("#tb_group2").addClass('skeleton');
                $("#search_off_").addClass('skeleton');
                $("#total_cat_records").addClass('pill-skeletone');
                $("#iteam_label6").addClass('skeleton');
                $("#group_nam2").addClass('skeleton');
                $("#group_nam3").addClass('skeleton');
                $("#group_nam4").addClass('skeleton');
                $("#group_nam5").addClass('skeleton');
                $("#cat_table").addClass('skeleton');
                $("#perPage").addClass('skeleton');
                $("#pagesBox").addClass('peritem-skeletone');
                $("#cat_table_paginate").addClass('paginate-skeleton');
                $(".tot_record").addClass('total-record-skeletone');
                $(".badge_label").addClass('pill-label-skeletone');
                $(".head_btn").addClass('skeleton');
                $("#src_box").addClass('skeleton');
    
                var time = null;
                time = setTimeout(() => {
                    $(".head_title").removeClass('skeleton');
                    $(".head_btn").removeClass('skeleton');
                    $("#search_area_").removeClass('skeleton');
                    $("#tb_group2").removeClass('skeleton');
                    $("#search_off_").removeClass('skeleton');
                    $("#total_cat_records").removeClass('pill-skeletone');
                    $("#iteam_label6").removeClass('skeleton');
                    $("#group_nam2").removeClass('skeleton');
                    $("#group_nam3").removeClass('skeleton');
                    $("#group_nam4").removeClass('skeleton');
                    $("#group_nam5").removeClass('skeleton');
                    $("#cat_table").removeClass('skeleton');
    
                    $(".badge_label").removeClass('pill-label-skeletone');
                    $("#perPage").removeClass('skeleton');
                    $("#pagesBox").removeClass('peritem-skeletone');
                    $("#cat_table_paginate").removeClass('paginate-skeleton');
                    $(".tot_record").removeClass('total-record-skeletone');
                    $("#src_box").removeClass('skeleton');
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
            fetch_subcategory_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'category_id' ? column : 'category_id',
                column === 'sub_category_name' ? column : 'sub_category_name',
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