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
                            <svg width="20px" height="20px" fill="rgb(220, 53, 69)" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 120.54" style="enable-background:new 0 0 122.88 120.54" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M95.7,65.5c15.01,0,27.18,12.17,27.18,27.18c0,15.01-12.17,27.18-27.18,27.18 c-15.01,0-27.18-12.17-27.18-27.18C68.52,77.67,80.69,65.5,95.7,65.5L95.7,65.5z M96.74,77.05c1.18,0,2.12,0.34,2.79,1.02 c0.67,0.68,1.01,1.6,1.01,2.8c0,1.21-0.58,2.29-1.74,3.23c-1.17,0.94-2.53,1.42-4.07,1.42c-1.16,0-2.09-0.32-2.79-0.98 c-0.71-0.66-1.06-1.51-1.06-2.57c0-1.34,0.58-2.49,1.73-3.47C93.75,77.53,95.13,77.05,96.74,77.05L96.74,77.05z M90.94,107.09 V91.56h-2.87c0-3.91,7.19-1.37,12.48-2.71v18.24C110.54,107.09,80.68,107.09,90.94,107.09L90.94,107.09z M17.69,26.67 c8.1,2.71,19.38,4.38,31.91,4.38s23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06c0-2.81-4.4-5.69-11.51-8.06 c-8.1-2.7-19.38-4.38-31.91-4.38s-23.81,1.67-31.91,4.38C2.6,15.59,2.18,21.5,17.69,26.67L17.69,26.67z M6.24,47.86 c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.71,19.38,4.38,31.91,4.38s23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06h0.03 v-19.3c-2.53,1.73-5.78,3.26-9.59,4.53c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72 c-3.77-1.26-6.98-2.76-9.49-4.47V47.86L6.24,47.86z M63.3,92.54c-4.35,0.44-8.95,0.67-13.7,0.67c-13.16,0-25.13-1.8-33.86-4.72 c-3.77-1.26-6.98-2.76-9.49-4.47v18.49c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c7.52,0,14.58-0.6,20.78-1.67 c1.56,1.94,3.33,3.7,5.29,5.24c-7.53,1.65-16.49,2.6-26.07,2.6c-13.16,0-25.13-1.8-33.86-4.72c-4.6-1.54-15.67-6.58-15.67-12.62 c0-0.71,0-1.3,0-1.98C0.06,73.69,0,46.15,0,18.61c0-5.76,6.01-10.65,15.73-13.9C24.46,1.8,36.44,0,49.6,0 c13.16,0,25.13,1.8,33.86,4.72c8.85,2.95,14.62,7.27,15.59,12.37c0.12,0.32,0.18,0.67,0.18,1.04v42.37 c-1.2-0.14-2.42-0.21-3.66-0.21c-0.85,0-1.68,0.03-2.51,0.1v-3.74c-2.53,1.73-5.78,3.26-9.59,4.53 c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72c-3.77-1.26-6.98-2.76-9.49-4.47v18.49 c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c5.01,0,9.82-0.27,14.31-0.76C63.51,88.3,63.3,90.4,63.3,92.54 L63.3,92.54z"/></g></svg>
                            Search medicine dosage not exists on server <span style="color:rgb(220, 53, 69)">!</span>
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
                    <tr class="table-row user-table-row" id="medic_dosage" key="${key}">
                        <td class="sn border_ord" id="medic_dosage2">${row.id}</td>
                        <td class="txt_ center" id="medic_dosage4">
                            <div class="dropdown">
                                <a type="button" data-bs-toggle="dropdown" id="showActionBox">
                                    <i class="fa-solid fa-ellipsis" style="color:#686868;padding-top:7px;">‌</i>
                                </a>
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-4" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </div>
                        </td>
                        <td class="border_ord" id="medic_dosage3">${row.medicine_names ? row.medicine_names.medicine_name : ''}</td>
                        <td class="txt_" id="medic_dosage5">
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" readonly></span>
                            ${row.dosage}
                        </td>
                        <td class="tot_complete_" id="cat_td6">
                            <span class="${statusClass}">${statusSignal}</span>
                            <span class="">${statusText}</span>
                        </td>
                        <td class="tot_complete_ center line_height_three" id="medic_dosage6">
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
            $("#medic_dosage2").addClass('skeleton');
            $("#medic_dosage3").addClass('skeleton');
            $("#medic_dosage4").addClass('skeleton');
            $("#medic_dosage5").addClass('skeleton');
            $("#medic_dosage6").addClass('skeleton');
            $("#medic_dosage7").addClass('skeleton');
            $("#cat_td6").addClass('skeleton');

            var time = null;

            time = setTimeout(() => {
                $("#medicine_dogs_data_table").removeClass('skeleton');
                $("#medic_dosage2").removeClass('skeleton');
                $("#medic_dosage3").removeClass('skeleton');
                $("#medic_dosage4").removeClass('skeleton');
                $("#medic_dosage5").removeClass('skeleton');
                $("#medic_dosage6").removeClass('skeleton');
                $("#medic_dosage7").removeClass('skeleton');
                $("#cat_td6").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // Paginate Page-------------------------------
        const paginate_html = ({ links, total }) => {
            if (total == 0) {
                return "";
            }

            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination">
                        ${links.map((link, key) => {
                            // Handle Previous and Next buttons separately
                            if (link.label.toLowerCase().includes("previous")) {
                                return `
                                    <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                        <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                            <svg width="10px" height="10px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 121.66"><title>direction-left</title><path d="M1.24,62.65,120.1,121.46a1.92,1.92,0,0,0,2.58-.88,1.89,1.89,0,0,0,0-1.76h0l-30.87-58,30.87-58h0a1.89,1.89,0,0,0,0-1.76A1.92,1.92,0,0,0,120.1.2L1.24,59a2,2,0,0,0,0,3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            } 
                            if (link.label.toLowerCase().includes("next")) {
                                return `
                                    <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                        <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                            <svg width="10px" height="10px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.86 121.64"><title>direction-right</title><path d="M121.62,59,2.78.2A1.92,1.92,0,0,0,.2,1.08a1.89,1.89,0,0,0,0,1.76h0l30.87,58L.23,118.8h0a1.89,1.89,0,0,0,0,1.76,1.92,1.92,0,0,0,2.58.88l118.84-58.8a2,2,0,0,0,0-3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            }

                            // Regular page numbers
                            return `
                                <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                    <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                        ${link.label}
                                    </a>
                                </li>
                            `;
                        }).join("\n")}
                    </ul>
                </nav>
            `;
        };
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
                            $('#medicine_dogs').val("");
                            $('#medicine_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_medicineDogs_data();
                        }, 1500);
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
                        $("#updateconfirmmedicinedogs").modal('hide');
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
                            $('.edit_medicine_dogs').val("");
                            $('.edit_medicine_id').val("");
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 5000);
                            fetch_medicineDogs_data();
                        }, 1500);
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
                    $('#deletemedicinedogs').modal('hide');
                    $("#deleteconfirmmedicinedogs").modal('hide');
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
    
                        fetch_medicineDogs_data();
                    }, 1500);

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
                        fetch_medicineDogs_data('', pagination_url);
                    }, 1500);
                }
            });
        });

        // Event Listener for sorting columns
        $(document).on('click', '#th_sort', function(){
            var button = $(this);
            var column = button.data('coloumn');
            var order = button.data('order');

            // Toggle the order (asc/desc)
            order = order === 'desc' ? 'asc' : 'desc';
            button.data('order', order);

            fetch_medicineName_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'medicine_id' ? column : 'medicine_id',
                column === 'dosage' ? column : 'dosage',
                column === 'status' ? column : 'status',
                order
            );

            // Remove only the icon from the clicked column (Keep other column icons)
            button.find("svg").remove();

            // Define sorting icons 
            var iconHTML = order === 'desc'
                ?  `<svg width="12px" height="12px" fill="#333333a1" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>`// Down arrow
                : `<svg width="12px" height="12px" fill="#333333a1" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,122.88 0,59.207 39.403,59.207 39.403,0 83.033,0 83.033,59.207 122.433,59.207 61.216,122.88"/></g></svg>`; // Up arrow

            // Append sorting icon only for the clicked column
            button.append(iconHTML);

        });
    });
</script>