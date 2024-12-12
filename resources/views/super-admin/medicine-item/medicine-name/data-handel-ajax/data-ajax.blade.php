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
        buttonLoader('#showGroup', '.get-group-icon', '.get-group-btn-text', 'Group...', 'Group', 1000);

        fetch_medicineName_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Medicine Name Data Not Exists On Server !
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
                    <tr class="table-row user-table-row" id="medic_name" key="${key}">
                        <td class="sn border_ord" id="medic_name2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="medic_name4">
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
                        <td class="ps-1 border_ord" id="medic_name3">${row.medicine_groups ? row.medicine_groups.group_name : ''}</td>
                        <td class="txt_ ps-1" id="medic_name5">
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" readonly></span>
                            ${row.medicine_name}
                        </td>
                        <td class="tot_complete_ pe-2" id="medic_name7">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${statusBg} ${statusClass}">${statusSignal}</span>
                            <span class="${statusTextColor}">${statusText}</span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="medic_name6">
                            <input class="form-switch form-check-input check_permission" type="checkbox" medicine_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Medicine Name Data ------------------
        function fetch_medicineName_data(
            query = '', 
            url = null, 
            perItem = null, 
            sortFieldID = 'id', 
            sortFieldProductGroup = 'group_id',
            sortFieldProductName = 'medicine_name', 
            sortFieldStatus = 'status', 
            sortFieldDirection = 'desc',
        ) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-medicinename.action')}}?per_item=${perItem}`;
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
                    sort_field_group_id : sortFieldProductGroup,
                    sort_field_medicine_name : sortFieldProductName,
                    sort_field_status : sortFieldStatus,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#medicine_data_table").html(table_rows([...data]));
                    $("#medicine_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_medicine_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return {
                            label: `${item.medicine_groups.group_name} - ${item.medicine_name}`,
                            value: item.medicine_name
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

            fetch_medicineName_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_medicineName_data(query);

        });

        $(document).on('keyup', '.search', function(){
            $("#medicine_data_table").addClass('skeleton');
            $("#medic_name2").addClass('skeleton');
            $("#medic_name3").addClass('skeleton');
            $("#medic_name4").addClass('skeleton');
            $("#medic_name5").addClass('skeleton');
            $("#medic_name6").addClass('skeleton');
            $("#medic_name7").addClass('skeleton');

            var time = null;

            time = setTimeout(() => {
                $("#medicine_data_table").removeClass('skeleton');
                $("#medic_name2").removeClass('skeleton');
                $("#medic_name3").removeClass('skeleton');
                $("#medic_name4").removeClass('skeleton');
                $("#medic_name5").removeClass('skeleton');
                $("#medic_name6").removeClass('skeleton');
                $("#medic_name7").removeClass('skeleton');
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
        $("#medicine_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_medicineName_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#group_name").focus();
            $("#update_btn").attr('hidden',true);
            $("#group_id").removeClass('is-invalid');
            $("#medicine_name").removeClass('is-invalid');
            $('.edit_group_id_error').addClass('display-none');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');
        });

        // Medicine Name Filed
        $(document).on('keyup', "#group_id, #medicine_name", function(){
            
            var groupName = $("#group_id").val();
            var medicineName = $("#medicine_name").val();
            if (groupName !== '') {
                $("#group_id").removeClass('is-invalid');
                $('.edit_group_id_error').empty();
                $('.edit_group_id_error').addClass('display-none');
                $('#savForm_error').addClass('display-none');
            }
            if(medicineName !== ''){
                $("#medicine_name").removeClass('is-invalid');
                $('#savForm_error').addClass('display-none');
                $('#updateForm_errorList').addClass('display-none');
            }
        });

        // Add Medicine Name
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            $('.edit_group_id_error').empty();
            var groupName = $("#group_id").val();

            if(groupName.trim() == ''){
                $("#group_id").addClass('is-invalid');
                $("#group_id").closest('.group_nme').append('<span class="edit_group_id_error alert_show_errors ps-2"> Group id is required.</span>');
            }

            var data = {
                'medicine_name': $('#medicine_name').val(),
                'group_id': $('#group_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_medicinename.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').removeClass('display-none');
                            $('#group_id').removeClass('display-none');
                            $("#medicine_name").addClass('is-invalid');
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
                            $('#medicine_name').val("");
                            $('#group_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_medicineName_data();
                        }, 1500);
                    }

                }
            });
        });

        // Edit Medicine Name
        $(document).on('click', '.edit_button', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            $("#update_btn").removeAttr('hidden');
            $('.edit_group_id_error').empty();
            $("#group_id").removeClass('is-invalid');
            $("#medicine_name").removeClass('is-invalid');
            $('.edit_group_id_error').addClass('display-none');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');

            var medicine_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-medicine-name/" + medicine_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#medicine_id').val(medicine_id);
                        $('.edit_medicine_name').val(response.messages.medicine_name);
                        $('.edit_group_id').val(response.messages.group_id);
                    }
                }
            });
        });
        // Confirm Update Medicine Name Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmmedicine").modal('show');
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
        // Update Medicine Name
        $(document).on('click', '.update_confirm', function(e) {
            e.preventDefault();
            $('.edit_group_id_error').empty();
            var groupName = $("#group_id").val();

            if(groupName.trim() == ''){
                $("#group_id").addClass('is-invalid');
                $("#group_id").closest('.group_nme').append('<span class="edit_group_id_error alert_show_errors ps-2"> Group id is required.</span>');
                $("#updateconfirmmedicine").modal('hide');
            }

            var medicine_id = $('#medicine_id').val();
            var data = {
                'medicine_name': $('.edit_medicine_name').val(),
                'group_id': $('#group_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-medicine-name/" + medicine_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').removeClass('display-none');
                            $('#group_id').removeClass('display-none');
                            $("#medicine_name").addClass('is-invalid');
                            $('#medicine_name').removeClass('display-none');
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-1');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateconfirmmedicine").modal('hide');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $("#updateconfirmmedicine").modal('hide');
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
                            $('.edit_medicine_name').val("");
                            $('.edit_group_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut();
                            }, 3000);
                            fetch_medicineName_data();
                        }, 1500);
                    }
                }
            });

        });

        // Delete Medicine Name Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var medicine_id = $(this).val();
            $('#delete_medicine_id').val(medicine_id);
            $('#deletemedicine').modal('show');
            $(".head_title").addClass('skeleton');
            $(".cols_title").addClass('skeleton');
            $("#medi_delt").addClass('skeleton');
            $("#medi_delt2").addClass('skeleton');
            $("#medi_delt3").addClass('skeleton');
            $("#yesButton").addClass('min-skeleton');
            $("#noButton").addClass('min-skeleton');
            $("#delete_medicine_id").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $(".head_title").removeClass('skeleton');
                $(".cols_title").removeClass('skeleton');
                $("#medi_delt").removeClass('skeleton');
                $("#medi_delt2").removeClass('skeleton');
                $("#medi_delt3").removeClass('skeleton');
                $("#yesButton").removeClass('min-skeleton');
                $("#noButton").removeClass('min-skeleton');
                $("#delete_medicine_id").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // Confirm Delete Medicine Name Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $("#deleteconfirmmedicine").modal('show');
            $('.confirm_title').addClass('skeleton');
            $('.head_btn_confirm').addClass('skeleton');
            $('#cate_confirm').addClass('skeleton');
            $("#medi_delt4").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $('.confirm_title').removeClass('skeleton');
                $('.head_btn_confirm').removeClass('skeleton');
                $('#cate_confirm').removeClass('skeleton');
                $('#medi_delt4').removeClass('skeleton');
                $('#deleteLoader').removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var medicine_id = $('#delete_medicine_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-medicine-name/" + medicine_id,
                success: function(response) {
                    $('#deletemedicine').modal('hide');
                    $("#deleteconfirmmedicine").modal('hide');
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
                        fetch_medicineName_data();
                    }, 1500);
                }

            });
        });

        // Update-Status ------------------
        $("#medicine_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('medicinename_status.action')}}";

            const pagination_url = $("#medicine_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('medicine_id'),
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
                        fetch_medicineName_data('', pagination_url);
                    }, 1500);
                }
            });
        });

        // Show-Group Modal---------------
        $("#showGroup").on('click', function(){
            $("#accessconfirmbranch").modal('show');
            $("#pageLoader").removeAttr('hidden');
            $("#access_modal_box").addClass('loader_area');
            $("#processModal_body").removeClass('loading_body_area');
            setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#pageLoader").attr('hidden', true);
                $("#access_modal_box").removeClass('loader_area');
                $("#processModal_body").addClass('loading_body_area');

                $("#group").modal('show');
                $(".head_title").addClass('skeleton');
                $(".clos_title").addClass('skeleton');
                $(".per_page").addClass('skeleton');
                $(".item_select").addClass('peritem-skeletone');
                $("#tb_group").addClass('skeleton');
                $("#search_area_").addClass('skeleton');
                $("#tb_group2").addClass('skeleton');
                $("#med_label2").addClass('skeleton');
                $("#group_nam2").addClass('skeleton');
                $("#group_nam3").addClass('skeleton');
                $("#group_nam4").addClass('skeleton');
                $("#group_nam5").addClass('skeleton');
                $("#group_table").addClass('skeleton');
                $("#iteam_label").addClass('skeleton');
                $("#iteam_label3").addClass('total-record-skeletone');
                $("#iteam_label4").addClass('pill-label-skeletone');
                $("#groups_table_paginate").addClass('paginate-skeleton');
                var time = null;
                time = setTimeout(() => {
                    $(".head_title").removeClass('skeleton');
                    $(".clos_title").removeClass('skeleton');
                    $(".per_page").removeClass('skeleton');
                    $(".item_select").removeClass('peritem-skeletone');
                    $("#groups_table_paginate").removeClass('paginate-skeleton');
                    $("#tb_group").removeClass('skeleton');
                    $("#search_area_").removeClass('skeleton');
                    $("#tb_group2").removeClass('skeleton');
                    $("#med_label2").removeClass('skeleton');
                    $("#group_nam2").removeClass('skeleton');
                    $("#group_nam3").removeClass('skeleton');
                    $("#group_nam4").removeClass('skeleton');
                    $("#group_nam5").removeClass('skeleton');
                    $("#group_table").removeClass('skeleton');
                    $("#iteam_label").removeClass('skeleton');
                    $("#iteam_label3").removeClass('total-record-skeletone');
                    $("#iteam_label4").removeClass('pill-label-skeletone');
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
            fetch_medicineName_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'group_id' ? column : 'group_id',
                column === 'medicine_name' ? column : 'medicine_name',
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