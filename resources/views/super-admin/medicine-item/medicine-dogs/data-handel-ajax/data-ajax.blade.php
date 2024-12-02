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


        // Table header Action Mode
        $(document).on('click', '#switch_on', function() {

            if ($("#switch_on:checked").length > 0) {
                $("#deleteBtn").removeAttr(' disabled');
                $("#edtBtn").removeAttr('disabled');

            } else {
                $("#deleteBtn").attr('disabled', true);
                $("#edtBtn").attr('disabled', true);
            }
        });
        fetch_medicineDogs_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Medicine Dosage Data Not Exists On Server !
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
                    <tr class="table-row user-table-row" id="medic_dosage" key="${key}">
                        <td class="sn border_ord" id="medic_dosage2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="medic_dosage4">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-4" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="ps-1 border_ord" id="medic_dosage3">${row.medicine_names ? row.medicine_names.medicine_name : ''}</td>
                        <td class="txt_ ps-1" id="medic_dosage5">${row.dosage}</td>
                        <td class="tot_complete_ pe-2" id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${statusBg} ${statusClass}">${statusSignal}</span>
                            <span class="${statusTextColor}">${statusText}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" readonly></span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="medic_dosage6">
                            <input class="form-switch form-check-input check_permission" type="checkbox" medicinedogs_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Medicine Dogs Data ------------------
        function fetch_medicineDogs_data(
            query = '', 
            url = null, 
            perItem = null, 
            sortFieldID = 'id', 
            sortFieldMedicine = 'medicine_id',
            sortFieldMedicineDosage = 'dosage', 
            sortFieldStatus = 'status', 
            sortFieldDirection = 'desc',
        ) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-medicinedogs.action')}}?per_item=${perItem}`;
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
                    sort_field_medicine_id : sortFieldMedicine,
                    sort_field_medicine_dosage : sortFieldMedicineDosage,
                    sort_field_status : sortFieldStatus,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#medicine_dogs_data_table").html(table_rows([...data]));
                    $("#medicine_dogs_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_medicinedogs_records").text(total);
                    // Initalise the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return {
                            label: `${item.id} - ${item.medicine_names.medicine_name} - ${item.dosage}`,
                            value: item.id
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

            fetch_medicineDogs_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_medicineDogs_data(query);

        });

        $(document).on('keyup', '.search', function(){
            $("#medicine_dogs_data_table").addClass('skeleton');
            $("#medic_dosage").addClass('skeleton');
            $("#medic_dosage2").addClass('skeleton');
            $("#medic_dosage3").addClass('skeleton');
            $("#medic_dosage4").addClass('skeleton');
            $("#medic_dosage5").addClass('skeleton');
            $("#medic_dosage6").addClass('skeleton');
            $("#medic_dosage7").addClass('skeleton');

            var time = null;

            time = setTimeout(() => {
                $("#medicine_dogs_data_table").removeClass('skeleton');
                $("#medic_dosage").removeClass('skeleton');
                $("#medic_dosage2").removeClass('skeleton');
                $("#medic_dosage3").removeClass('skeleton');
                $("#medic_dosage4").removeClass('skeleton');
                $("#medic_dosage5").removeClass('skeleton');
                $("#medic_dosage6").removeClass('skeleton');
                $("#medic_dosage7").removeClass('skeleton');
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
        $("#medicine_dogs_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_medicineDogs_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#medicine_dogs").focus();
            $("#update_btn").attr('hidden',true);
            $("#medicine_id").removeClass('is-invalid');
            $("#medicine_dogs").removeClass('is-invalid');
            $('.edit_medicine_id_error').addClass('display-none');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');
        });

        // Medicine Name Filed
        $(document).on('keyup', "#medicine_id, #medicine_dogs", function(){
            
            var medicineName = $("#medicine_id").val();
            var medicineDosage = $("#medicine_dogs").val();
            if (medicineName !== '') {
                $("#medicine_id").removeClass('is-invalid');
                $('.edit_medicine_id_error').empty();
                $('.edit_medicine_id_error').addClass('display-none');
                $('#savForm_error').addClass('display-none');
            }
            if(medicineDosage !== ''){
                $("#medicine_dogs").removeClass('is-invalid');
                $('#savForm_error').addClass('display-none');
                $('#updateForm_errorList').addClass('display-none');
            }
        });

        // Add Medicine Dogs
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            $('.edit_medicine_id_error').empty();
            var groupName = $("#medicine_id").val();

            if(groupName.trim() == ''){
                $("#medicine_id").addClass('is-invalid');
                $("#medicine_id").closest('.medicine_nme').append('<span class="edit_medicine_id_error alert_show_errors ps-2"> Medicine id is required.</span>');
            }

            var data = {
                'dosage': $('#medicine_dogs').val(),
                'medicine_id': $('#medicine_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_medicinedogs.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').removeClass('display-none');
                            $('#medicine_id').removeClass('display-none');
                            $("#medicine_id").addClass('is-invalid');
                            $('#medicine_dogs').removeClass('display-none');
                            $("#medicine_dogs").addClass('is-invalid');
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
                        $('#medicine_dogs').val("");
                        $('#medicine_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut(3000);
                        }, 5000);
                        fetch_medicineDogs_data();
                    }

                }
            });
        });

        // Edit Medicine Dogs
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            $("#update_btn").removeAttr('hidden');
            $('.edit_medicine_id_error').empty();
            $("#medicine_id").removeClass('is-invalid');
            $("#medicine_dogs").removeClass('is-invalid');
            $('.edit_medicine_id_error').addClass('display-none');
            $('#savForm_error').addClass('display-none');
            $('#updateForm_errorList').addClass('display-none');

            var medicinedogs_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-medicine-dosage/" + medicinedogs_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#medicinedogs_id').val(medicinedogs_id);
                        $('.edit_medicine_dogs').val(response.messages.dosage);
                        $('.edit_medicine_id').val(response.messages.medicine_id);
                    }
                }
            });
        });
        // Confirm Update Medicine Dogs Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmmedicinedogs").modal('show');
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
        // Update Medicine Dogs
        $(document).on('click', '.update_confirm', function(e) {
            e.preventDefault();
            $('.edit_medicine_id_error').empty();
            var groupName = $("#medicine_id").val();

            if(groupName.trim() == ''){
                $("#medicine_id").addClass('is-invalid');
                $("#medicine_id").closest('.medicine_nme').append('<span class="edit_medicine_id_error alert_show_errors ps-2"> Medicine id is required.</span>');
                $("#updateconfirmmedicinedogs").modal('hide');
            }

            var medicinedogs_id = $('#medicinedogs_id').val();
            var data = {
                'dosage': $('.edit_medicine_dogs').val(),
                'medicine_id': $('.edit_medicine_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-medicine-dosage/" + medicinedogs_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').removeClass('display-none');
                            $('#medicine_id').removeClass('display-none');
                            $("#medicine_dogs").addClass('is-invalid');
                            $('#medicine_dogs').removeClass('display-none');
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-2');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateconfirmmedicinedogs").modal('hide');
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
                        $('.edit_medicine_dogs').val("");
                        $('.edit_medicine_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut(3000);
                        }, 5000);
                        $("#updateconfirmmedicinedogs").modal('hide');
                        fetch_medicineDogs_data();
                    }
                }
            });

        });

        // Delete Medicine Dogs Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var medicine_id = $(this).val();
            $('#delete_medicine_dogs_id').val(medicine_id);
            $('#deletemedicinedogs').modal('show');
            $(".dogs_title").addClass('skeleton');
            $(".cols_dogs").addClass('skeleton');
            $("#dosage").addClass('skeleton');
            $("#dosage2").addClass('skeleton');
            $("#dosage3").addClass('skeleton');
            $("#delete_medicine_dogs_id").addClass('skeleton');
            $("#yesButton").addClass('min-skeleton');
            $("#noButton").addClass('min-skeleton');

            var time = null;
            time = setTimeout(() => {
                $(".dogs_title").removeClass('skeleton');
                $(".cols_dogs").removeClass('skeleton');
                $("#dosage").removeClass('skeleton');
                $("#dosage2").removeClass('skeleton');
                $("#dosage3").removeClass('skeleton');
                $("#delete_medicine_dogs_id").removeClass('skeleton');
                $("#yesButton").removeClass('min-skeleton');
                $("#noButton").removeClass('min-skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });
        // Confirm Delete Medicine Dogs Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $("#deleteconfirmmedicinedogs").modal('show');
            $('.confirm_title').addClass('skeleton');
            $('.head_btn_confirm').addClass('skeleton');
            $('#cate_confirm').addClass('skeleton');
            $("#dosage4").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $('.confirm_title').removeClass('skeleton');
                $('.head_btn_confirm').removeClass('skeleton');
                $('#cate_confirm').removeClass('skeleton');
                $('#dosage4').removeClass('skeleton');
                $('#deleteLoader').removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var medicinedogs_id = $('#delete_medicine_dogs_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-medicine-dosage/" + medicinedogs_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletemedicinedogs').modal('hide');
                    $("#deleteconfirmmedicinedogs").modal('hide');

                    fetch_medicineDogs_data();
                }

            });
        });

        // Update-Status ------------------
        $("#medicine_dogs_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('medicinedogs_status.action')}}";

            const pagination_url = $("#medicine_dogs_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('medicinedogs_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_medicineDogs_data('', pagination_url);
                }
            });
        });

        // Show-Medicine Modal---------------
        $("#showMedicine").on('click', function() {
            $("#MedicineName").modal('show');
            $(".head_title").addClass('skeleton');
            $(".clos_title").addClass('skeleton');
            $(".per_page").addClass('skeleton');
            $(".selec_item").addClass('select-skeleton');
            $("#medic_nam").addClass('skeleton');
            $("#medic_nam2").addClass('skeleton');
            $("#medic_nam3").addClass('skeleton');
            $("#medic_nam4").addClass('skeleton');
            $("#medic_nam5").addClass('skeleton');
            $("#medic_nam6").addClass('skeleton');
            $("#medic_nam7").addClass('skeleton');
            $("#medic_nam8").addClass('skeleton');
            $("#medic_nam9").addClass('skeleton');
            $("#search_area_").addClass('skeleton');
            $("#med_label").addClass('skeleton');
            $("#med_label2").addClass('skeleton');
            $("#search_on_").addClass('skeleton');
            $("#iteam_label").addClass('skeleton');
            $("#iteam_label2").addClass('skeleton');
            $("#iteam_label3").addClass('skeleton');
            $("#iteam_label5").addClass('skeleton');
            $("#total_medic_records").addClass('skeleton');
            $("#med").addClass('skeleton');
            $("#medicine_table_paginate").addClass('paginate-skeleton');
            $(".iteam_label4").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $(".head_title").removeClass('skeleton');
                $(".clos_title").removeClass('skeleton');
                $(".per_page").removeClass('skeleton');
                $(".selec_item").removeClass('select-skeleton');
                $("#medic_nam").removeClass('skeleton');
                $("#medic_nam2").removeClass('skeleton');
                $("#medic_nam3").removeClass('skeleton');
                $("#medic_nam4").removeClass('skeleton');
                $("#medic_nam5").removeClass('skeleton');
                $("#medic_nam6").removeClass('skeleton');
                $("#medic_nam7").removeClass('skeleton');
                $("#medic_nam8").removeClass('skeleton');
                $("#medic_nam9").removeClass('skeleton');
                $("#search_area_").removeClass('skeleton');
                $("#med_label").removeClass('skeleton');
                $("#med_label2").removeClass('skeleton');
                $("#search_on_").removeClass('skeleton');
                $("#iteam_label").removeClass('skeleton');
                $("#iteam_label2").removeClass('skeleton');
                $("#iteam_label3").removeClass('skeleton');
                $("#iteam_label5").removeClass('skeleton');
                $("#total_medic_records").removeClass('skeleton');
                $("#med").removeClass('skeleton');
                $("#medicine_table_paginate").removeClass('paginate-skeleton');
                $(".iteam_label4").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
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
            fetch_medicineDogs_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'medicine_id' ? column : 'medicine_id',
                column === 'dosage' ? column : 'dosage',
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