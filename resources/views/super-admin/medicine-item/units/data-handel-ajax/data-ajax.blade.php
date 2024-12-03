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
        buttonLoader('#showMedicine', '.get-medicine-icon', '.get-medicine-btn-text', 'Medicine...', 'Medicine', 1000);

        fetch_units_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Unit Data Not Exists On Server !
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
                    <tr class="table-row user-table-row" id="unit_tab" key="${key}">
                        <td class="sn border_ord" id="unit_tab2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="unit_tab3">
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
                        <td class="txt_ ps-1" id="unit_tab4">${row.units_name}</td>
                        <td class="tot_complete_ pe-2" id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${statusBg} ${statusClass}">${statusSignal}</span>
                            <span class="${statusTextColor}">${statusText}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" readonly></span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="unit_tab5">
                            <input class="form-switch form-check-input check_permission" type="checkbox" units_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Unit Data ------------------
        function fetch_units_data(
            query = '', 
            url = null, 
            perItem = null, 
            sortFieldID = 'id', 
            sortFieldUnitName = 'units_name',
            sortFieldStatus = 'status', 
            sortFieldDirection = 'desc',
        ) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-units.action')}}?per_item=${perItem}`;
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
                    sort_field_units_name : sortFieldUnitName,
                    sort_field_status : sortFieldStatus,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#units_data_table").html(table_rows([...data]));
                    $("#units_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_units_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return item.units_name;
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

            fetch_units_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_units_data(query);

        });

        // search-loader
        $(document).on('keyup', '.searchform', function(){

            var time = null;
            $("#units_data_table").addClass('skeleton');
            $("#unit_tab").addClass('skeleton');
            $("#unit_tab2").addClass('skeleton');
            $("#unit_tab3").addClass('skeleton');
            $("#unit_tab4").addClass('skeleton');
            $("#unit_tab5").addClass('skeleton');
            $("#unit_tab6").addClass('skeleton');

            time = setTimeout(() => {
                $("#units_data_table").removeClass('skeleton');
                $("#unit_tab").removeClass('skeleton');
                $("#unit_tab2").removeClass('skeleton');
                $("#unit_tab3").removeClass('skeleton');
                $("#unit_tab4").removeClass('skeleton');
                $("#unit_tab5").removeClass('skeleton');
                $("#unit_tab6").removeClass('skeleton');
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
        $("#units_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_units_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#units_name").focus();
            $("#update_btn").attr('hidden',true);
            $("#units_name").removeClass('is-invalid');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');
        });

        // Units Name Filed
        $(document).on('keyup', "#units_name", function(){
            
            var unitsName = $("#units_name").val();
            if (unitsName !== '') {
                $("#units_name").removeClass('is-invalid');
                $('#savForm_error').addClass('display-none');
                $('#updateForm_errorList').addClass('display-none');
            }
        });

        // Add Unit
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'units_name': $('#units_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_units.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').removeClass('display-none');
                            $('#units_name').removeClass('display-none');
                            $("#units_name").addClass('is-invalid');
                            $('#savForm_error').addClass('alert_show_errors');
                            $('#savForm_error').append('<span class="error_val">' + err_value + '</span>');
                            $('#savForm_error').fadeIn();
                        });
                    } else {
                        $('#savForm_error').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('#units_name').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut(3000);
                        }, 5000);
                        fetch_units_data();
                    }

                }
            });
        });

        // Edit Unit
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            $("#update_btn").removeAttr('hidden');
            $("#units_name").removeClass('is-invalid');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');
            var units_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-units/" + units_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#units_id').val(units_id);
                        $('.edit_units_name').val(response.messages.units_name);
                    }
                }
            });
        });
        // Confirm Update Unit Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmunits").modal('show');
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
        // Update Unit
        $(document).on('click', '.update_confirm', function(e) {
            e.preventDefault();
            var units_id = $('#units_id').val();
            var data = {
                'units_name': $('.edit_units_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-units/" + units_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').removeClass('display-none');
                            $('#units_name').removeClass('display-none');
                            $("#units_name").addClass('is-invalid');
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-2');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateconfirmunits").modal('hide');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('.edit_units_name').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut(3000);
                        }, 5000);
                        $("#updateconfirmunits").modal('hide');
                        fetch_units_data();
                    }
                }
            });

        });

        // Delete Unit Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var units_id = $(this).val();
            $('#delete_unit_id').val(units_id);
            $('#deleteunits').modal('show');

            var time = null;
            $(".head_title").addClass('skeleton');
            $(".cols_title").addClass('skeleton');
            $("#unit_delt").addClass('skeleton');
            $("#unit_delt2").addClass('skeleton');
            $("#unit_delt3").addClass('skeleton');
            $("#delete_unit_id").addClass('skeleton');
            $("#yesButton").addClass('min-skeleton');
            $("#noButton").addClass('min-skeleton');

            time = setTimeout(() => {
                $(".head_title").removeClass('skeleton');
                $(".cols_title").removeClass('skeleton');
                $("#unit_delt").removeClass('skeleton');
                $("#unit_delt2").removeClass('skeleton');
                $("#unit_delt3").removeClass('skeleton');
                $("#delete_unit_id").removeClass('skeleton');
                $("#yesButton").removeClass('min-skeleton');
                $("#noButton").removeClass('min-skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // Confirm Delete Unit Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $("#deleteconfirmunits").modal('show');
            $('.confirm_title').addClass('skeleton');
            $('.head_btn_confirm').addClass('skeleton');
            $('#cate_confirm').addClass('skeleton');
            $("#unit_delt4").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $('.confirm_title').removeClass('skeleton');
                $('.head_btn_confirm').removeClass('skeleton');
                $('#cate_confirm').removeClass('skeleton');
                $("#unit_delt4").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }

        });
        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var units_id = $('#delete_unit_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-units/" + units_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deleteunits').modal('hide');
                    $("#deleteconfirmunits").modal('hide');
                    fetch_units_data();
                }

            });
        });

        // Update-Status ------------------
        $("#units_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('units_status.action')}}";

            const pagination_url = $("#units_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('units_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_units_data('', pagination_url);
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
            fetch_units_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'units_name' ? column : 'units_name',
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