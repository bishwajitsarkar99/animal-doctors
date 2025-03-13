<script type="module">
    import { buttonLoader } from "/module/module-min-js/design-helper-function-min.js";
    import { activeTableRow } from "/module/module-min-js/helper-function-min.js";
    buttonLoader();
    $(document).ready(() => {
        // ACtive table row background
        $(document).on('click keydown', 'tr.table-row', function (event) {
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                activeTableRow(this);
                $(this).addClass("clicked").siblings().removeClass("clicked");
            }
        });
        // Initialize the button loader for the login button
        buttonLoader('#save', '.add-icon', '.category-btn-text', 'Add...', 'Add', 1000);
        buttonLoader('#update_btn', '.update-icon', '.update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#update_btn_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#deleteLoader', '.delete-icon', '.delete-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel', 'Cancel', 1000);

        fetch_category_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Search category data not exists on server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                var statusClass, statusText, statusSignal, permissionSignal;
                if (row.status == 1) {
                    statusClass = 'text-white';
                    statusText = 'Active';
                    statusSignal = '<svg width="15px" height="20px" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 122.88" enable-background="new 0 0 122.88 122.88" xml:space="preserve"><g><path fill="rgb(8, 160, 92)" d="M34.388,67.984c-0.286-0.308-0.542-0.638-0.762-0.981c-0.221-0.345-0.414-0.714-0.573-1.097 c-0.531-1.265-0.675-2.631-0.451-3.934c0.224-1.294,0.812-2.531,1.744-3.548l0.34-0.35c2.293-2.185,5.771-2.592,8.499-0.951 c0.39,0.233,0.762,0.51,1.109,0.827l0.034,0.031c1.931,1.852,5.198,4.881,7.343,6.79l1.841,1.651l22.532-23.635 c0.317-0.327,0.666-0.62,1.035-0.876c0.378-0.261,0.775-0.482,1.185-0.661c0.414-0.181,0.852-0.323,1.3-0.421 c0.447-0.099,0.903-0.155,1.356-0.165h0.026c0.451-0.005,0.893,0.027,1.341,0.103c0.437,0.074,0.876,0.193,1.333,0.369 c0.421,0.161,0.825,0.363,1.207,0.604c0.365,0.231,0.721,0.506,1.056,0.822l0.162,0.147c0.316,0.313,0.601,0.653,0.85,1.014 c0.256,0.369,0.475,0.766,0.652,1.178c0.183,0.414,0.325,0.852,0.424,1.299c0.1,0.439,0.154,0.895,0.165,1.36v0.23 c-0.004,0.399-0.042,0.804-0.114,1.204c-0.079,0.435-0.198,0.863-0.356,1.271c-0.16,0.418-0.365,0.825-0.607,1.21 c-0.238,0.377-0.518,0.739-0.832,1.07l-27.219,28.56c-0.32,0.342-0.663,0.642-1.022,0.898c-0.369,0.264-0.767,0.491-1.183,0.681 c-0.417,0.188-0.851,0.337-1.288,0.44c-0.435,0.104-0.889,0.166-1.35,0.187l-0.125,0.003c-0.423,0.009-0.84-0.016-1.241-0.078 l-0.102-0.02c-0.415-0.07-0.819-0.174-1.205-0.31c-0.421-0.15-0.833-0.343-1.226-0.575l-0.063-0.04 c-0.371-0.224-0.717-0.477-1.032-0.754l-0.063-0.06c-1.58-1.466-3.297-2.958-5.033-4.466c-3.007-2.613-7.178-6.382-9.678-9.02 L34.388,67.984L34.388,67.984z M61.44,0c16.96,0,32.328,6.883,43.453,17.987c11.104,11.125,17.986,26.493,17.986,43.453 c0,16.961-6.883,32.329-17.986,43.454C93.769,115.998,78.4,122.88,61.44,122.88c-16.961,0-32.329-6.882-43.454-17.986 C6.882,93.769,0,78.4,0,61.439C0,44.48,6.882,29.112,17.986,17.987C29.112,6.883,44.479,0,61.44,0L61.44,0z M96.899,25.981 C87.826,16.907,75.29,11.296,61.44,11.296c-13.851,0-26.387,5.611-35.46,14.685c-9.073,9.073-14.684,21.609-14.684,35.458 c0,13.851,5.611,26.387,14.684,35.46s21.609,14.685,35.46,14.685c13.85,0,26.386-5.611,35.459-14.685s14.684-21.609,14.684-35.46 C111.583,47.59,105.973,35.054,96.899,25.981L96.899,25.981z"/></g></svg>';
                    permissionSignal = 'light2-focus';
                } else if (row.status == 0) {
                    statusClass = 'text-white';
                    statusText = 'Deny';
                    statusSignal = '<svg width="15px" height="20px" version="1.1" id="Layer_1" x="0px" y="0px" width="122.88px" height="122.879px" viewBox="0 0 122.88 122.879" enable-background="new 0 0 122.88 122.879" xml:space="preserve"><g><path fill="#FF4141" d="M61.44,0c16.96,0,32.328,6.882,43.453,17.986c11.104,11.125,17.986,26.494,17.986,43.453 c0,16.961-6.883,32.328-17.986,43.453C93.769,115.998,78.4,122.879,61.44,122.879c-16.96,0-32.329-6.881-43.454-17.986 C6.882,93.768,0,78.4,0,61.439C0,44.48,6.882,29.111,17.986,17.986C29.112,6.882,44.48,0,61.44,0L61.44,0z M73.452,39.152 c2.75-2.792,7.221-2.805,9.986-0.026c2.764,2.776,2.775,7.292,0.027,10.083L71.4,61.445l12.077,12.25 c2.728,2.77,2.689,7.256-0.081,10.021c-2.772,2.766-7.229,2.758-9.954-0.012L61.445,71.541L49.428,83.729 c-2.75,2.793-7.22,2.805-9.985,0.025c-2.763-2.775-2.776-7.291-0.026-10.082L51.48,61.435l-12.078-12.25 c-2.726-2.769-2.689-7.256,0.082-10.022c2.772-2.765,7.229-2.758,9.954,0.013L61.435,51.34L73.452,39.152L73.452,39.152z M96.899,25.98C87.826,16.907,75.29,11.296,61.44,11.296c-13.851,0-26.387,5.611-35.46,14.685 c-9.073,9.073-14.684,21.609-14.684,35.459s5.611,26.387,14.684,35.459c9.073,9.074,21.609,14.686,35.46,14.686 c13.85,0,26.386-5.611,35.459-14.686c9.073-9.072,14.684-21.609,14.684-35.459S105.973,35.054,96.899,25.98L96.899,25.98z"/></g></svg>';
                    permissionSignal = 'danger-focus';
                }
                return `
                    <tr class="table-light table-row user-table-row data-table-row" id="cat_td" key="${key}">
                        <td class="sn border_ord" id="cat_td2">${row.id}</td>
                        <td class="txt_ ps-1 center line_height_one" id="cat_td3">
                            <div class="dropdown">
                                <a type="button" data-bs-toggle="dropdown" id="showActionBox">
                                    <i class="fa-solid fa-ellipsis" style="color:#686868;padding-top:7px;">‌</i>
                                </a>
                                <li class="upd cgy ps-1 dropdown-menu dropdown-menu-end action">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Eidt" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" 
                                    data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:#0056b3"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" 
                                    data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </div>
                        </td>
                        <td class="txt_ ps-1" id="cat_td4">
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" category_name readonly></span>
                            ${row.category_name}
                        </td>
                        <td class="tot_complete_ line_height_two" id="cat_td6">
                            <span class="ps-1 ${statusClass}">${statusSignal}</span>
                            <span>${statusText}</span>
                        </td>
                        <td class="tot_complete_ center line_height_three ps-1" id="cat_td5">
                            <input class="form-switch form-check-input check_permission" type="checkbox" category_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }
        // show table action box
        document.querySelectorAll("#showActionBox").forEach((button) => {
            button.addEventListener("click", function () {
                let dropdownMenu = this.nextElementSibling;
                let rect = dropdownMenu.getBoundingClientRect();
                let tableRect = this.closest("table").getBoundingClientRect();

                if (rect.right > tableRect.right) {
                    dropdownMenu.classList.add("dropdown-menu-end"); // Move left if overflowing
                } else {
                    dropdownMenu.classList.remove("dropdown-menu-end");
                }
            });
        });

        // Fetch Users Data ------------------
        function fetch_category_data(
            query = '', 
            url = null, 
            perItem = null,
            sortFieldID = 'id', 
            sortFieldCategoryName = 'category_name', 
            sortFieldStatus = 'status', 
            sortFieldDirection = 'desc',
        ) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-category.action')}}?per_item=${perItem}`;
            } else {
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
                    sort_field_status : sortFieldStatus,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total
                    
                }) {
                    $("#category_data_table").html(table_rows([...data]));
                    $("#category_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_category_records").text(total);
                    // Initialize tooltips after appending the elements
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return item.category_name;
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

            fetch_category_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_category_data(query);
        });

        // search-loader
        $(".category-all-search").on('keyup', function() {

            var time = null;
            $("#category_data_table").addClass('skeleton');
            $("#cat_td2").addClass('skeleton');
            $("#cat_td3").addClass('skeleton');
            $("#cat_td4").addClass('skeleton');
            $("#cat_td5").addClass('skeleton');
            $("#cat_td6").addClass('skeleton');

            time = setTimeout(() => {
                $("#category_data_table").removeClass('skeleton');
                $("#cat_td2").removeClass('skeleton');
                $("#cat_td3").removeClass('skeleton');
                $("#cat_td4").removeClass('skeleton');
                $("#cat_td5").removeClass('skeleton');
                $("#cat_td6").removeClass('skeleton');
            }, 1000);

            return () => {
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
        $("#category_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_category_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#update_btn").attr('hidden',true);
            $("#category_name").focus();
            $("#category_name").removeClass('is-invalid');
            $('#updateForm_errorList').addClass('display-none');
            $('#savForm_error').addClass('display-none');
        });

        // Category Name Filed
        $(document).on('keyup', "#category_name", function(){
            var categoryName = $(this).val();
            if (categoryName !== '') {
                $("#category_name").addClass('is-valid');
                $("#category_name").removeClass('is-invalid');
                $('#updateForm_errorList').addClass('display-none');
                $('#savForm_error').addClass('display-none');
            }else if(categoryName == ''){
                $("#category_name").removeClass('is-valid');
                $("#category_name").removeClass('is-invalid');
            }
        });

        // Add Category
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'category_name': $('#category_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').removeClass('display-none');
                            $("#category_name").addClass('is-invalid');
                            $('#savForm_error').addClass('alert_show_errors');
                            $("#savForm_error").append('<span><i class="fa-solid fa-triangle-exclamation me-2" style="color:red;font-size:14px;"></i></span>');
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
                            $('#category_name').val("");
                            $("#category_name").removeClass('is-valid');
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_category_data();
                            
                        }, 1500);
                    }

                }
            });
        });

        // Edit Category
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#categry_id").empty();
            $("#categry_name").empty();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            $("#update_btn").removeAttr('hidden');
            var cateogory_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-category/" + cateogory_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#category_id').val(cateogory_id);
                        $('.edit_category_name').val(response.messages.category_name);

                        const category_id = $("#categry_id");
                        const category_name = $("#categry_name");
                        category_id.append(`<label class="label_user_edit"> Category-ID : <span class="word_space">${response.messages.id}</span></label>`);
                        category_name.append(`<label class="label_user_edit"> Category-Name : <span class="word_space">${response.messages.category_name}</span></label>`);
                    }
                }
            });
        });

        // Update Show Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmcategory").modal('show');
            
            $("#update_btn_confirm").addClass('skeleton');
            $("#cate_delete5").addClass('skeleton');
            $("#cate_confirm_update").addClass('skeleton');
            $(".update_title").addClass('skeleton');
            $(".head_btn3").addClass('skeleton');
            $("#categry_id").addClass('skeleton');
            $("#categry_name").addClass('skeleton');
            var time = null;
            time = setTimeout(() => {
                $(".update_title").removeClass('skeleton');
                $(".head_btn3").removeClass('skeleton');
                $("#update_btn_confirm").removeClass('skeleton');
                $("#cate_delete5").removeClass('skeleton');
                $("#cate_confirm_update").removeClass('skeleton');
                $("#categry_id").removeClass('skeleton');
                $("#categry_name").removeClass('skeleton');
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        // Confirm Update Category
        $(document).on('click', '#update_btn_confirm', function(e) {
            e.preventDefault();
            var category_id = $('#category_id').val();
            var data = {
                'category_name': $('.edit_category_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-category/" + category_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $("#category_name").addClass('is-invalid');
                            $('#updateForm_errorList').removeClass('display-none');
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-2');
                            $("#updateForm_errorList").append('<span><i class="fa-solid fa-triangle-exclamation me-2" style="color:red;font-size:14px;"></i></span>');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateconfirmcategory").modal('hide');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $("#accessconfirmbranch").modal('show');
                        $("#updateconfirmcategory").modal('hide');
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
                            $('.edit_category_name').val("");
                            $("#save").show('slow');
                            $("#update_btn").attr('hidden', true);
                            $("#update_btn").hide('slow');
                            setTimeout(() => {
                                $('#success_message').fadeOut();
                            }, 5000);
                            fetch_category_data();
                            
                        }, 1500);
                    }
                }
            });

        });

        // Delete Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var category_id = $(this).val();
            $('#delete_category_id').val(category_id);
            $('#deletecategory').modal('show');
            $(".head_title").addClass('skeleton');
            $(".head_btn").addClass('skeleton');
            $("#cate_delete").addClass('skeleton');
            $("#cat_id").addClass('skeleton');
            $("#cate_delete2").addClass('skeleton');
            $("#yesButton").addClass('min-skeleton');
            $("#noButton").addClass('min-skeleton');
            $("#center_box").addClass('center-skeleton');

            var time = null;
            time = setTimeout(() => {
                $(".head_title").removeClass('skeleton');
                $(".head_btn").removeClass('skeleton');
                $("#cate_delete").removeClass('skeleton');
                $("#cat_id").removeClass('skeleton');
                $("#cate_delete2").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
                $("#cate_delete3").removeClass('skeleton');
                $("#yesButton").removeClass('min-skeleton');
                $("#noButton").removeClass('min-skeleton');
                $("#center_box").removeClass('center-skeleton');
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        // Delete Category confirm modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $('#deletecategory').modal('hide');
            $('#deleteconfirmcategory').modal('show');
            $("#deleteLoader").addClass('skeleton');
            $("#cate_delete3").addClass('skeleton');
            $("#cate_confirm").addClass('skeleton');
            $(".confirm_title").addClass('skeleton');
            $(".head_btn2").addClass('skeleton');
            $(".loading-yes-icon").removeAttr('hidden');
            var time = null;
            time = setTimeout(() => {
                $(".confirm_title").removeClass('skeleton');
                $(".head_btn2").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
                $("#cate_delete3").removeClass('skeleton');
                $("#cate_confirm").removeClass('skeleton');
                $(".loading-yes-icon").attr('hidden',true);
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        // Delete Category
        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var category_id = $('#delete_category_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-category/" + category_id,
                success: function(response) {
                    $("#accessconfirmbranch").modal('show');
                    $('#deletecategory').modal('hide');
                    $('#deleteconfirmcategory').modal('hide');
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
                        }, 5000);
    
                        fetch_category_data();
                        
                    }, 1500);
                }

            });
        });

        // Update-Status ------------------
        $("#category_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('category_status.action')}}";

            const pagination_url = $("#category_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('category_id'),
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
                        fetch_category_data('', pagination_url);
                    }, 1500);
                }
            });
        });

        // Loader
        $(document).load('click', function() {
            $("#active_loader").addClass('loader_chart');
        });

        // Event Listener for sorting columns
        $(document).on('click', '.th_sort', function(){
            var button = $(this);
            var column = button.data('coloumn');
            var order = button.data('order');

            // Toggle the order (asc/desc)
            order = order === 'desc' ? 'asc' : 'desc';
            button.data('order', order);

            fetch_category_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'category_name' ? column : 'category_name',
                column === 'status' ? column : 'status',
                order
            );

            // Remove only the icon from the clicked column (Keep other column icons)
            button.find("svg").remove();

            // Define sorting icons 
            var iconHTML = order === 'desc'
                ?  `<svg width="12px" height="12px" fill="#333" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>`// Down arrow
                : `<svg width="12px" height="12px" fill="#333" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,122.88 0,59.207 39.403,59.207 39.403,0 83.033,0 83.033,59.207 122.433,59.207 61.216,122.88"/></g></svg>`; // Up arrow

            // Append sorting icon only for the clicked column
            button.append(iconHTML);
        });

    });
</script>
<!-- <script>
    var dragCol = null;

    function handelDragStart(e) {
        dragCol = this;
        e.dataTransfer.effectAllowed = "move";
        e.dataTransfer.setData('text/html', this.outerHTML);
    }

    function handelDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.dataTransfer.effectAllowed = "move";
        return false;
    }

    function handelDrop(e) {
        if (e.stopPropagation) {
            e.stopPropagation();
        }
        if (dragCol !== this) {
            var sourceIndex = Array.from(dragCol.parentNode.children).indexOf(dragCol);
            var targetIndex = Array.from(this.parentNode.children).indexOf(this);
            var table = document.getElementById("myTable");
            var rows = table.rows;

            for (var i = 0; i < rows.length; i++) {
                var sourceCell = rows[i].cells[sourceIndex];
                var targetCell = rows[i].cells[targetIndex];

                var tempHTML = sourceCell.innerHTML;
                sourceCell.innerHTML = targetCell.innerHTML;
                targetCell.innerHTML = tempHTML;
            }
        }
        return false;
    }

    var cols = document.querySelectorAll("th");
    [].forEach.call(cols, function(col) {
        col.addEventListener('dragstart', handelDragStart, false);
        col.addEventListener('dragover', handelDragOver, false);
        col.addEventListener('drop', handelDrop, false);
    });
</script> -->