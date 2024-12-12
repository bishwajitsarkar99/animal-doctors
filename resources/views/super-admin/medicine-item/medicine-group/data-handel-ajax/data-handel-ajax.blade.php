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

        fetch_group_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Medicine Group Data Not Exists On Server !
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
                    <tr class="table-row user-table-row" id="group_td" key="${key}">
                        <td class="sn border_ord" id="group_td2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="group_td3">
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
                        <td class="txt_ ps-1" id="group_td4">${row.group_name}</td>
                        <td class="tot_complete_ pe-2" id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${statusBg} ${statusClass}">${statusSignal}</span>
                            <span class="${statusTextColor}">${statusText}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" readonly></span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="group_td5">
                            <input class="form-switch form-check-input check_permission" type="checkbox" group_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Medicine Group Data ------------------
        function fetch_group_data(
            query = '', 
            url = null, 
            perItem = null, 
            sortFieldID = 'id', 
            sortFieldGroupName = 'group_name', 
            sortFieldStatus = 'status', 
            sortFieldDirection = 'desc',
        ) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-medicinegroup.action')}}?per_item=${perItem}`;
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
                    sort_field_group_name : sortFieldGroupName,
                    sort_field_status : sortFieldStatus,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#group_data_table").html(table_rows([...data]));
                    $("#group_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_group_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return item.group_name;
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

            fetch_group_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_group_data(query);

        });

        // Live-search loader
        $(document).on('keyup', '.searchform', function(){
            var time = null;

            $("#group_data_table").addClass('skeleton');
            $("#group_td").addClass('skeleton');
            $("#group_td2").addClass('skeleton');
            $("#group_td3").addClass('skeleton');
            $("#group_td4").addClass('skeleton');
            $("#group_td5").addClass('skeleton');
            $("#group_td6").addClass('skeleton');

            time = setTimeout(() => {
                $("#group_data_table").removeClass('skeleton');
                $("#group_td").removeClass('skeleton');
                $("#group_td2").removeClass('skeleton');
                $("#group_td3").removeClass('skeleton');
                $("#group_td4").removeClass('skeleton');
                $("#group_td5").removeClass('skeleton');
                $("#group_td6").removeClass('skeleton');
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
        $("#group_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_group_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#group_name").focus();
            $("#update_btn").attr('hidden',true);
            $("#group_name").removeClass('is-invalid');
            $('#updateForm_errorList').addClass('display-none');
            $('#savForm_error').addClass('display-none');
        });

        // Group Name Filed
        $(document).on('keyup', "#group_name", function(){
            var groupName = $(this).val();
            if (groupName !== '') {
                $("#group_name").removeClass('is-invalid');
                $('#updateForm_errorList').addClass('display-none');
                $('#savForm_error').addClass('display-none');
            }
        });

        // Add Medicine Group
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'group_name': $('#group_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_medicinegroup.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').removeClass('display-none');
                            $("#group_name").addClass('is-invalid');
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
                            $('#group_name').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_group_data();

                        }, 1500);
                    }

                }
            });
        });

        // Edit Medicine Group
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            $("#update_btn").removeAttr('hidden');
            var group_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-medicine-group/" + group_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#group_id').val(group_id);
                        $('.edit_group_name').val(response.messages.group_name);
                    }
                }
            });
        });

        // Update Medicine Group Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmsubgroup").modal('show');
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
        // Update Medicine Group
        $(document).on('click', '.update_confirm', function(e) {
            e.preventDefault();
            var group_id = $('#group_id').val();
            var data = {
                'group_name': $('.edit_group_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-medicine-group/" + group_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $("#group_name").addClass('is-invalid');
                            $('#updateForm_errorList').removeClass('display-none');
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-1');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateconfirmsubgroup").modal('hide');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $("#updateconfirmsubgroup").modal('hide');
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
                            $('.edit_group_name').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_group_data();
                        }, 1500);
                    }
                }
            });

        });

        // Delete Medicine Group Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var group_id = $(this).val();
            $('#delete_group_id').val(group_id);
            $('#deletegroup').modal('show');
            $('#group_delete_modal').addClass('skeleton');
            $('.head_title').addClass('skeleton');
            $('.clos_title').addClass('skeleton');
            $('#delete_group').addClass('skeleton');
            $('#delete_group2').addClass('skeleton');
            $('#delete_group3').addClass('skeleton');
            $('#delete_group4').addClass('skeleton');
            $('#deleteLoader').addClass('skeleton');
            $('#yesButton').addClass('min-skeleton');
            $('#noButton').addClass('min-skeleton');

            var time = null;
            time = setTimeout(() => {
                $('.head_title').removeClass('skeleton');
                $('.clos_title').removeClass('skeleton');
                $('#group_delete_modal').removeClass('skeleton');
                $('#delete_group').removeClass('skeleton');
                $('#delete_group2').removeClass('skeleton');
                $('#delete_group3').removeClass('skeleton');
                $('#delete_group4').removeClass('skeleton');
                $('#deleteLoader').removeClass('skeleton');
                $('#yesButton').removeClass('min-skeleton');
                $('#noButton').removeClass('min-skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
        // Delete Medicine Group Confirm Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $("#deleteconfirmgroup").modal('show');
            $('.confirm_title').addClass('skeleton');
            $('.head_btn_confirm').addClass('skeleton');
            $('#cate_confirm').addClass('skeleton');
            $('#sub_id4').addClass('skeleton');
            $('#deleteLoader').addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $('.confirm_title').removeClass('skeleton');
                $('.head_btn_confirm').removeClass('skeleton');
                $('#cate_confirm').removeClass('skeleton');
                $('#sub_id4').removeClass('skeleton');
                $('#deleteLoader').removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }

        });

        $(document).on('click', '.delete_confirm', function(e) {
            e.preventDefault();
            var group_id = $('#delete_group_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-medicine-group/" + group_id,
                success: function(response) {
                    $('#deletegroup').modal('hide');
                    $("#deleteconfirmgroup").modal('hide');
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
                        fetch_group_data();
                    }, 1500);

                }

            });
        });

        // Update-Status ------------------
        $("#group_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('medicinegroup_status.action')}}";

            const pagination_url = $("#group_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('group_id'),
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
                        fetch_group_data('', pagination_url);
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
            fetch_group_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'group_name' ? column : 'group_name',
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