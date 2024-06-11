<script>
    $(document).ready(function () {
        // Get current date
        var today = new Date();
        var day = String(today.getDate()).padStart(2, '0');
        var month = today.getMonth();
        var yyyy = today.getFullYear();
        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var monthName = monthNames[month];
        var currentDate = day + '-' + monthName + '-' + yyyy;
        
        // Populate start date field
        document.getElementById('start_get_date').value = currentDate;
        // Populate end date field
        document.getElementById('end_get_date').value = currentDate;

        // Initialize datepickers
        $('#start_get_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_get_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });

        function formatDate(dateString) {
            var date = new Date(dateString.split('-').reverse().join('-'));
            var day = date.getDate();
            var month = date.getMonth();
            var year = date.getFullYear();

            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            day = day < 10 ? '0' + day : day;

            var monthName = monthNames[month];

            return day + '-' + monthName + '-' + year;
        }
        function updateTableDate(element, dataAttribute) {
            var dateStr = $(element).attr(dataAttribute);
            var formattedDate = formatDate(dateStr);
            $(element).val(formattedDate);
        }
        // Number Formate
        const formatCurrency = (value) => {
            const parts = parseFloat(value).toFixed(2).split('.');
            let integerPart = parts[0];
            const decimalPart = parts[1];
            
            // Slice the last three digits
            const lastThreeDigits = integerPart.slice(-3);
            // Slice the remaining digits
            const otherDigits = integerPart.slice(0, -3);
            // Format the digits using the Indian numbering system
            const formattedValue = otherDigits.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + (otherDigits ? ',' : '') + lastThreeDigits;
            
            return formattedValue + '.' + decimalPart;
        };

        document.querySelectorAll('td[data-price]').forEach(td => {
            const rawValue = td.getAttribute('data-price');
            td.textContent = `${formatCurrency(rawValue)} ৳`;
        });

        document.querySelectorAll('td[data-quantity]').forEach(td => {
            const rawValue = td.getAttribute('data-quantity');
            td.textContent = formatCurrency(rawValue);
        });

        document.querySelectorAll('td[data-sub-total]').forEach(td => {
            const rawValue = td.getAttribute('data-sub-total');
            td.textContent = `${formatCurrency(rawValue)} ৳`;
        });
        // Date Formate
        var manufactureDateElements = document.querySelectorAll('td[data-manufacture-date]');
        var expiryDateElements = document.querySelectorAll('td[data-expiry-date]');

        manufactureDateElements.forEach(function(element) {
            var dateStr = element.getAttribute('data-manufacture-date');
            element.textContent = formatDate(dateStr);
        });

        expiryDateElements.forEach(function(element) {
            var dateStr = element.getAttribute('data-expiry-date');
            element.textContent = formatDate(dateStr);
        });
        function formatDate(dateString) {
            var date = new Date(dateString);
            var day = date.getDate();
            var month = date.getMonth();
            var year = date.getFullYear();
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            day = day < 10 ? '0' + day : day;
            var monthName = monthNames[month];

            return day + '-' + monthName + '-' + year;
        }
        // function formatPermissionDate() {
        //     var date = new Date();
        //     var day = date.getDate();
        //     var month = date.getMonth();
        //     var year = date.getFullYear();
        //     var hours = date.getHours();
        //     var minutes = date.getMinutes();
        //     var seconds = date.getSeconds();

        //     var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        //     day = day < 10 ? '0' + day : day;
        //     minutes = minutes < 10 ? '0' + minutes : minutes;
        //     seconds = seconds < 10 ? '0' + seconds : seconds;

        //     var monthName = monthNames[month];

        //     var ampm = hours >= 12 ? 'PM' : 'AM';
        //     hours = hours % 12;
        //     hours = hours ? hours : 12;
        //     hours = hours < 10 ? '0' + hours : hours;

        //     return day + '-' + monthName + '-' + year + ' ; ' + hours + ':' + minutes + ':' + seconds + ' ' + ampm;
        // }
        function formatPermissionDate() {
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var year = date.getFullYear();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            // Pad single-digit day, minutes, and seconds with leading zeros
            day = day < 10 ? '0' + day : day;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            var monthName = monthNames[month];

            // Determine AM/PM and adjust hours
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            hours = hours < 10 ? '0' + hours : hours;

            return day + '-' + monthName + '-' + year + ' ; ' + hours + ':' + minutes + ':' + seconds + ' ' + ampm;
        }

        // Initial badge display based on checkbox state
        if ($('#permissionChecking').prop('checked')) {
            $("#show_jst").show();
            $("#show_deny").hide();
        } else {
            $("#show_jst").hide();
            $("#show_deny").show();
        }
        // Event handler for checkbox click
        $('#permissionChecking').on('click', function() {
            if ($(this).prop('checked')) {
                $("#show_jst").show();
                $("#show_deny").hide();
                $(this).val("1");
            } else {
                $("#show_jst").hide();
                $("#show_deny").show();
                $(this).val("0");
            }
        });

        // Store Inventory Permission
        $(document).on('click', '#data_permission', function(e) {
            e.preventDefault();
            // Input Field Validation
            $('.error-message').remove();

            var roleName = $("#select_role").val();
            var userEmail = $("#select_user").val();
            var inventoryID = $("#inventoryID").val();
            var inventoryIDIssue = $("#inventoryIDIssue").val();

            if(roleName.trim() == ''){
                $("#select_role").closest('.role_nme').append('<span class="error-message alert_show_errors ms-2 ps-2">Select the role name.</span>');
            }
            if(userEmail.trim() == ''){
                $("#select_user").closest('.role_nme').append('<span class="error-message alert_show_errors ms-3 ps-2">Select the user email.</span>');
            }
            if(inventoryID.trim() == ''){
                $("#inventoryID").closest('.role_nme').append('<span class="error-message alert_show_errors ms-1">Inventory Table ID is required.</span>');
            }
            if(inventoryIDIssue.trim() == ''){
                $("#inventoryIDIssue").closest('.role_nme').append('<span class="error-message alert_show_errors ms-1">The Inventory ID issue is required.</span>');
            }

            // Check if there are any error messages
            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }

            var data = {
                'role_id': $('#select_role').val(),
                'mail_id': $('#select_user').val(),
                'inv_permission_id': $('#inventoryID').val(),
                'issue_name': $('#inventoryIDIssue').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('action.inventory-permission')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').addClass('alert_show_errors');
                            $('#savForm_error').append('<span class="error_val">' + err_value + '</span>');
                            $('#savForm_error').fadeIn();
                            setTimeout(() => {
                                $('#savForm_error').fadeOut();
                            }, 2500);
                        });
                    } else {
                        $('#savForm_error').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('#select_role').val("");
                        $('#select_user').val("");
                        $('#inventoryID').val("");
                        $('#inventoryIDIssue').val("");
                        $("#show_jst").hide();
                        $("#show_deny").show();

                        $("#pageData").attr('hidden', true);
                        $("#pageData2").attr('hidden', true);
                        $("#pageData3").attr('hidden', true);
                        $("#pageData4").attr('hidden', true);
                        $("#pageData5").attr('hidden', true);
                        $("#pageData6").attr('hidden', true);
                        $("#pageData7").attr('hidden', true);
                        // FadeIn
                        $(".pageData").fadeOut(200);
                        $(".pageData2").fadeOut(200);
                        $(".pageData3").fadeOut(200);
                        $(".pageData4").fadeOut(200);
                        $(".pageData5").fadeOut(200);
                        $(".pageData6").fadeOut(200);
                        $(".pageData7").fadeOut(200);
                        $('.error-message').remove();
                        $(".perm-icon").removeClass('perm-hidden');
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                            $(".perm-icon").addClass('perm-hidden');
                        }, 3000);
                    }
                    
                    fetch_inventory_id_permission();
                }
            });
        });
        // Get Inventory Permission
        fetch_inventory_id_permission();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Inventory Permission Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row supp-table-row" key="${key}" id="supp_tab">
                        <td class="sn border_ord font_weight" id="supp_tab2">${row.id}</td>
                        <td class="txt_ center delete_enable" id="supp_tab3">
                            <button class="btn-sm edit_registration view_btn cgr_btn" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i>
                            </button>
                        </td>
                        <td class="txt_ font_weight ps-1 supp_vew6" id="supp_tab9">${formatDate(row.created_at)}</td>
                        <td class="txt_ font_weight ps-1 supp_vew3" id="supp_tab6">${row.inventories ? row.inventories.inv_id : ''}</td>
                        <td class="tot_order_ center ps-1" id="user_set3">
                            <img class="user_img rounded-circle user_imgs" src="${row.users.image.includes('https://')?row.users.image: '/image/'+ row.users.image}">
                        </td>
                        <td class="border_ord font_weight ps-1 supp_vew" id="supp_tab4">${row.roles.name}</td>
                        <td class="txt_ font_weight ps-1 supp_vew2" id="supp_tab5">${row.users.email}</td>
                        <td class="tot_complete_ ps-1 pt- center" id="supp_tab14">
                            <input id="actOne" class="form-switch form-check-input permission_checking me-2 permission_delt" type="checkbox" permission_id="${row.id}" value="${row.permission_status}" ${row.permission_status ? 'checked' : ''}>
                        </td>
                        <td class="ms-1 ${row.permission_status ? 'bg-silver' : (row.permission_status === null ? 'bg-silver' : 'bg-silver')}" id="supp_tab15">
                            <span class="permission-plate permission ps-1 ms-3 ${row.permission_status ? 'text-dark' : (row.permission_status === null ? 'text-secondary' : 'text-danger')}">
                                ${row.permission_status ? '✅ Justify' : (row.permission_status === null ? 'Pending' : '❌ Deny')}
                            </span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                        </td>
                        <td class="tot_pending_ bold ps-1 ${row.approved_by? 'text-primary': ' text-warning'}" id="user_set8">${row.approved_by == 1 ? 'SuperAdmin' : (row.approved_by == 3 ? 'Admin' : 'Null')}</td>
                        <td class="txt_ font_weight ps-1 supp_vew6" id="supp_tab9">${row.issue_name}</td>
                        
                    </tr>
                `;
            }).join("\n");
        }
        
        // Fetch Inventory Permission ------------------
        function fetch_inventory_id_permission(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControls").val();
            }

            const start_date = $("#start_get_date").val();
            const end_date = $("#end_get_date").val();
            const role_id = $("#filter_select_role").val();
            const permission_status = $("#select_permission_status").val();
            const inv_permission_id = $("#input_permission_inventory_id").val();

            let current_url = url ? url : `{{ route('search-inventory-permission.action') }}?per_item=${perItem}`;

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { 
                    query: query, 
                    start_date: start_date,
                    end_date: end_date,
                    role_id: role_id,
                    permission_status: permission_status,
                    inv_permission_id: inv_permission_id
                },
                success: function(response) {
                    const { 
                        data, 
                        links, 
                        total, 
                        total_pending, 
                        total_deny, 
                        total_justify, 
                        total_items,
                        months,
                        years
                    } = response;
                    
                    $("#inventory_permission_data_table").html(table_rows(data));
                    $("#inventory_permission_data_table_paginate").html(paginate_html({
                        links, 
                        total,
                        total_pending, 
                        total_deny, 
                        total_justify, 
                        total_items,
                    }));
                    $("#total_inventory_permission_records").text(total);
                    $("#total_permission_records").text(total_items);
                    $("#total_pending_permission_records").text(total_pending);
                    $("#total_justify_permission_records").text(total_justify);
                    $("#total_deny_permission_records").text(total_deny);

                    // Animate the number counter
                    // Total Permission
                    const totalPermissionElement = $("#total_permission_records");
                    totalPermissionElement.attr("data-val", total_items);
                    animateNumberCounter(totalPermissionElement, total_items);
                    // Total Entry
                    const totalEntryPermission = $("#total_inventory_permission_records");
                    totalEntryPermission.attr("data-val", total);
                    animateNumberCounter(totalEntryPermission, total);
                    // Total Pending
                    const totalPendingPermission = $("#total_pending_permission_records");
                    totalPendingPermission.attr("data-val", total_pending);
                    animateNumberCounter(totalPendingPermission, total_pending);
                    // Toatl Jstify
                    const totalJustifyPermission = $("#total_justify_permission_records");
                    totalJustifyPermission.attr("data-val", total_justify);
                    animateNumberCounter(totalJustifyPermission, total_justify);
                    // Toatl Deny
                    const totalDenyPermission = $("#total_deny_permission_records");
                    totalDenyPermission.attr("data-val", total_deny);
                    animateNumberCounter(totalDenyPermission, total_deny);

                    // Update current month element with the new data
                    $("#permission_month").text(months.length > 0 ? months.join(', ') : 'No months found');

                    $('[data-bs-toggle="tooltip"]').tooltip();

                    const suggestions = data.map(item => ({
                        label: `${item.inventory_id} - ${item.role_id} - ${item.mail_id}`,
                        value: item.inventory_id,
                    }));

                    $("#search").autocomplete({ source: suggestions });


                    const inventoryID = data.map(item => ({
                        label: `${item.inv_permission_id} - ${item.inventories.inv_id}`,
                        value: item.inv_permission_id,
                    }));

                    $("#input_permission_inventory_id").autocomplete({ source: inventoryID });
                }
            });
        }

        // peritem change
        $("#perItemControls").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_inventory_id_permission('', null, value);
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
        $("#inventory_permission_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_inventory_id_permission('', url);
            }

        });

        // Filter change
        $("#start_get_date, #end_get_date, #filter_select_role, #select_permission_status").on('change', () => {
            
            $("#loaderShow").removeClass('error-hidden');
            $(".inventory_permission_data_table").addClass('error-hidden'); 
            
            setTimeout(() => {
                $(".inventory_permission_data_table").removeClass('error-hidden'); 
                $("#loaderShow").addClass('error-hidden');
            }, 500);

            fetch_inventory_id_permission();
        });

        // Search Inventory Permission ID
        $("#input_permission_inventory_id").on('keyup', () => {

            var query = $(this).val();

            $(".loader-show").removeClass('error-hidden');
            $(".src-data-table").addClass('error-hidden'); 
            
            setTimeout(() => {
                $(".src-data-table").removeClass('error-hidden'); 
                $(".loader-show").addClass('error-hidden');
            }, 500);

            fetch_inventory_id_permission(query);
        });

        // Permission Status Filter
        $(document).on('change', '.select_permission_status', function() {

            var selectedPermissionStatus = $(this).val();

            $("#pendingAmount").addClass('error-hidden');
            $("#denyAmount").addClass('error-hidden');
            $("#justifyAmount").addClass('error-hidden');

            if(selectedPermissionStatus === 'null') {
                $("#pendingAmount").removeClass('error-hidden');
            } else if(selectedPermissionStatus == 1) {
                $("#justifyAmount").removeClass('error-hidden');
            } else if(selectedPermissionStatus == 0) {
                $("#denyAmount").removeClass('error-hidden');
            } else {
                $("#pendingAmount").removeClass('error-hidden');
                $("#denyAmount").removeClass('error-hidden');
                $("#justifyAmount").removeClass('error-hidden');
            }
            if(selectedPermissionStatus === ''){
                $("#pendingAmount").removeClass('error-hidden');
                $("#denyAmount").removeClass('error-hidden');
                $("#justifyAmount").removeClass('error-hidden');
            }
        });

        // Fetch Inventory Inv_ID
        fetch_inventory_inv_id();
        // Fetch Inventory Inv_ID
        function fetch_inventory_inv_id(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            var current_url = url ? `${url}&per_item=${perItem}` : `{{ route('inventory-search.action') }}?per_item=${perItem}`;
            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { query: query },
                success: function(response) {
                    var data = response.inventories;

                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return {
                            label: `${item.users.name} - ${item.inv_id} - [ ${formatDate(item.created_at)} ]`,
                            value: item.inventory_id
                        };
                    });

                    // Initialize autocomplete
                    $("#inventoryID").autocomplete({
                        source: suggestions
                    });

                    if (data.length > 0 && query !== '') {
                        var inventoryItem = data[0];
                        const userImage = inventoryItem.users.image.includes('https://') ? inventoryItem.users.image : `/image/${inventoryItem.users.image}`;
                        
                        $("#usrImage").html(`<img class="user_img rounded-square users_image position" src="${userImage}">`);
                        $("#invent_id").val(inventoryItem.inv_id);
                        $("#created_date").val(formatDate(inventoryItem.created_at));
                        $("#updated_date").val(formatDate(inventoryItem.updated_at));
                        $("#created_by").val(inventoryItem.users.name);
                        $("#usr_email").val(inventoryItem.users.email);

                        if (inventoryItem.updated_by != null) {
                            let updatedByRole;
                            switch (inventoryItem.updated_by) {
                                case 1:
                                    updatedByRole = 'SuperAdmin';
                                    break;
                                case 2:
                                    updatedByRole = 'Sub-Admin';
                                    break;
                                case 3:
                                    updatedByRole = 'Admin';
                                    break;
                                case 0:
                                    updatedByRole = 'User';
                                    break;
                                case 5:
                                    updatedByRole = 'Accounts';
                                    break;
                                case 6:
                                    updatedByRole = 'Marketing';
                                    break;
                                case 7:
                                    updatedByRole = 'Delivery Team';
                                    break;
                                default:
                                    updatedByRole = 'Unknown';
                            }
                            $("#updated_by").val(updatedByRole);
                        } else {
                            $("#updated_by").val('Null');
                        }
                    } else {
                        clearFields();
                    }
                }
            });
        }
        // Clear Filed
        function clearFields() {
            $("#usrImage").html('');
            $("#invent_id").val('');
            $("#created_date").val('');
            $("#updated_date").val('');
            $("#created_by").val('');
            $("#usr_email").val('');
            $("#updated_by").val('');
        }
        // Live-Search
        $(document).on('click', '#inventoryID', function() {
            var query = $(this).val().trim();
            $('.error-message').remove();
            if (query !== '') {
                $(".pageData, .pageData2, .pageData3, .pageData4, .pageData5, .pageData6, .pageData7, .issue_box, .button_box").removeAttr('hidden').fadeIn(200);
                $("#recordSide").attr('hidden', true);

                $("#txtArea, #data_permission").addClass('skeleton');
                $("#user_image").addClass('mg_display');
                
                $("#loadCard").addClass('loarder-card');
                $("#loadCard").removeAttr('hidden');
                $("#viewCard").removeClass('display_none');
                
                setTimeout(() => {
                    $("#txtArea, #data_permission").removeClass('skeleton');
                    $("#user_image").removeClass('mg_display');

                    $("#loadCard").removeClass('loarder-card');
                    $("#loadCard").attr('hidden', true);
                    $(".icon_update").removeClass('error-hidden');
                    
                }, 800);
                fetch_inventory_inv_id(query);
            }
            else {
                $(".pageData, .pageData2, .pageData3, .pageData4, .pageData5, .pageData6, .pageData7, .issue_box, .button_box").attr('hidden', true).fadeOut(200);
                $("#recordSide").removeAttr('hidden');
                $("#viewCard").addClass('display_none');
                clearFields();
                return;
            }
            if(query === '0' || query < '0'){
                $("#lable1").addClass('label_hidden');
                $("#lable2").addClass('label_hidden');
                $("#lable3").addClass('label_hidden');
                $("#lable4").addClass('label_hidden');
                $("#lable5").addClass('label_hidden');
                $("#lable6").addClass('label_hidden');
                $("#serErorr").append('<span class="error-message alert_show_errors">The id is no matching on server !</span>');
            }else{
                $("#lable1").removeClass('label_hidden');
                $("#lable2").removeClass('label_hidden');
                $("#lable3").removeClass('label_hidden');
                $("#lable4").removeClass('label_hidden');
                $("#lable5").removeClass('label_hidden');
                $("#lable6").removeClass('label_hidden');
            }
        });
        // Fetch Inventory Permission Data
        function fetchInventoryPermissions() {
            var start_date = $('#start_get_date').val();
            var end_date = $('#end_get_date').val();
            var role_id = $('#select_role').val();
            var permission_status = $('#select_permission_status').val();

            $.ajax({
                type: "GET",
                url: "{{ route('search-inventory-permission.action') }}",
                dataType: 'json',
                data: {
                    start_date: start_date,
                    end_date: end_date,
                    role_id: role_id,
                    permission_status: permission_status
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        // Search Click Event
        $('#search_permission').on('click', function() {
            fetchInventoryPermissions();
        });
        // Search- loader
        $(document).on('keyup', '.searchform', function(){

            var time =null;

            $("#supplier_data_table").addClass('skeleton');
            $("#supp_tab2").addClass('skeleton');
            $("#supp_tab3").addClass('skeleton');
            $("#supp_tab4").addClass('skeleton');
            $("#supp_tab5").addClass('skeleton');
            $("#supp_tab6").addClass('skeleton');
            $("#supp_tab7").addClass('skeleton');
            $("#supp_tab8").addClass('skeleton');
            $("#supp_tab9").addClass('skeleton');
            $("#supp_tab10").addClass('skeleton');
            $("#supp_tab11").addClass('skeleton');
            $("#supp_tab12").addClass('skeleton');
            $("#supp_tab13").addClass('skeleton');
            $("#supp_tab14").addClass('skeleton');
            $("#supp_tab15").addClass('skeleton');

            time = setTimeout(() => {
                $("#supplier_data_table").removeClass('skeleton');
                $("#supp_tab2").removeClass('skeleton');
                $("#supp_tab3").removeClass('skeleton');
                $("#supp_tab4").removeClass('skeleton');
                $("#supp_tab5").removeClass('skeleton');
                $("#supp_tab6").removeClass('skeleton');
                $("#supp_tab7").removeClass('skeleton');
                $("#supp_tab8").removeClass('skeleton');
                $("#supp_tab9").removeClass('skeleton');
                $("#supp_tab10").removeClass('skeleton');
                $("#supp_tab11").removeClass('skeleton');
                $("#supp_tab12").removeClass('skeleton');
                $("#supp_tab13").removeClass('skeleton');
                $("#supp_tab14").removeClass('skeleton');
                $("#supp_tab15").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        

        // Permission Access
        $("#inventory_permission_data_table").delegate(".permission_checking", "click", function(e) {

            const current_url = "{{route('inventory_permission_status.action')}}";

            const pagination_url = $("#inventory_permission_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('permission_id'),
                    permission_status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_inventory_id_permission('', pagination_url);
                }
            });
        });
        
        // Function to handle select dropdown change event
        $('#criteriaSelectDropdown').change(function() {
            var selectedCriteria = $(this).val();
            var selectedValue = '';
            // Get the selected value based on the selected criteria
            switch(selectedCriteria) {
                case 'role_id':
                    selectedValue = $('#roleIdSelectDropdown').val();
                    break;
                case 'inventory_id':
                    selectedValue = $('#inventoryIdSelectDropdown').val();
                    break;
                case 'permission_status':
                    selectedValue = $('#permissionStatusSelectDropdown').val();
                    break;
            }
            fetch_inventory_id_permission(selectedValue);
        });
        // Delete Inventory Permission
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var permission_id = $(this).val();
            $('#delete_permission_id').val(permission_id);
            $('#deletepermission').modal('show');

            var time = null;
            $("#supp_delt").addClass('skeleton');
            $("#supp_delt2").addClass('skeleton');
            $("#supp_delt3").addClass('skeleton');
            $("#supp_delt4").addClass('inv-delt-skeletone');
            $("#delete_permission_id").addClass('skeleton');
            $("#deleteLoader").addClass('inv-delt-skeletone');

            time = setTimeout(() => {
                $("#supp_delt").removeClass('skeleton');
                $("#supp_delt2").removeClass('skeleton');
                $("#supp_delt3").removeClass('skeleton');
                $("#supp_delt4").removeClass('inv-delt-skeletone');
                $("#delete_permission_id").removeClass('skeleton');
                $("#deleteLoader").removeClass('inv-delt-skeletone');
            }, 1000);
            
            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delet_btn_permission', function(e) {
            e.preventDefault();
            var permission_id = $('#delete_permission_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/super-admin/delete-inventory-permission/" + permission_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletepermission').modal('hide');
                    fetch_inventory_id_permission();
                },
                error: function(xhr, status, error) {
                    var errorMessage = JSON.parse(xhr.responseText).error;

                    $('#Form_error').html("");
                    $('#Form_error').addClass('alert_show_errors');
                    $('#Form_error').append('<span class="error_val">' + errorMessage + '</span>');
                    $('#Form_error').fadeIn();
                    setTimeout(() => {
                        $('#Form_error').fadeOut();
                    }, 2500);
                }
            });
        });

        $(document).load('click', function(){
            $("#active_loader").addClass('loader_chart');
        });
        // select table id
        $(document).on('click', '#invtr_id', function(e){
            e.preventDefault();
            var searchField = $(".inventory-id").val();
            if (searchField !== null && searchField !== "") {
                $("#create_token").removeAttr('style');
                $(".error-message").remove();
            } else {
                $(".inventory-id").closest('.select-group').find('.error-message').remove();
                $(".inventory-id").closest('.select-group').append('<span class="error-message alert_show_errors ps-1">Select the inventory id.</span>');
            }
            $("#input_inventory_id").removeAttr('hidden');
            $("#input_token").removeAttr('hidden');
            $("#create_token").removeAttr('disabled');

            $(this).find('#permissionLink').toggleClass('link-display');
            $(this).find('#showLink').toggleClass('link-display');
            
            var inventory_id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "/inventories-edit/" + inventory_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#inventory_id').val(inventory_id);
                        $('.inv_id').val(response.messages.inv_id);
                    }
                }
            });

        });
        // create token button
        $(document).on('click', '#create_token', function(){
            $("#token_confirm").removeAttr('hidden');
            $("#create_token").css('display', 'none');

            var x = Math.random();
            x = x * (1000000000000000 - 1) + 1;
            var generate_id = Math.floor(x);
            var token_field = $("#token_field").val();
            $("#generate_id").val(generate_id);
            $("#input_token").val(token_field + '-' + generate_id);
        });
        // Token Send
        $(document).on('click', '#token_confirm', function(e) {
            e.preventDefault();

            var inventory_id = $('#inventory_id').val();
            var data = {
                'inv_id': $('.inv_id').val(),
                'permission_token': $('.permission_token').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/super-admin/token-inventory-permission/" + inventory_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').addClass('alert_show_errors skeleton ps-1 pe-1');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateForm_errorList").fadeOut(40000);

                            var time = null;
                            time = setTimeout(() => {
                                $("#updateForm_errorList").removeClass('skeleton');
                            }, 3000);
                            return ()=>{
                                clearTimeout(time);
                            }
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
                        $('#inventory_id').val("");
                        $('.inv_id').val("");
                        $('.permission_token').val("");

                        setTimeout(() => {
                            $('#success_message').fadeOut(3000);
                        }, 3000);
                        //fetch_inventory_edit_data();
                    }
                }
            });

        });
        // Filter Inventory Table
        const tableRows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="13">
                            No Inventory Found!
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => {
                let statusClass, statusColor, statusText, statusBg;
                if(row.status == null){
                    statusClass = 'text-dark';
                    statusText = 'Pending';
                    statusColor = 'color:gray;background-color: white;';
                    statusBg = 'badge rounded-pill bg-gray';
                }
                else if(row.status == 0){
                    statusClass = 'text-danger';
                    statusText = '❌ Unauthorize';
                    statusColor = 'color:darkgoldenrod;background-color: #ffedd8;';
                    statusBg = 'badge rounded-pill bg-warn';
                }
                else if(row.status == 1){
                    statusClass = 'text-dark';
                    statusText = '✅ Authorize';
                    statusColor = 'color:black;background-color: #ecfffd;';
                    statusBg = 'badge rounded-pill bg-azure';
                }

                return `
                    <tr class="table-row user-table-row" style="${statusColor}" key="${key}">
                        <td class="sn border_ord edit_inventory_table">${key + 1}</td>
                        <td class="line-height-td">
                            <a type="button" class="ps-1" data-id="${row.inventory_id}" id="invtr_id" style="color: blue;font-weight:600;">${row.inventory_id}</a>
                            <input class="form-check-input check_permission ms-2 mt-1" type="checkbox" style="font-size: 10px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Authorize" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                        </td>
                        <td class="txt_ ps-1 edit_inventory_table">${row.inv_id}</td>
                        <td class="edit_inventory_table">${formatDate(row.manufacture_date)}</td>
                        <td class="edit_inventory_table">${formatDate(row.expiry_date)}</td>
                        <td class="tot_pending_ edit_inventory_table">${row.medicine_groups ? row.medicine_groups.group_name : ''}</td>
                        <td class="tot_pending_ edit_inventory_table">${row.medicine_names ? row.medicine_names.medicine_name : ''}</td>
                        <td class="tot_pending_ edit_inventory_table">${row.medicine_dogs ? row.medicine_dogs.dosage : ''}</td>
                        <td class="" hidden></td>
                        <td class="edit_inventory_table">${parseFloat(row.price).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })} ৳</td>
                        <td class="tot_pending_ edit_inventory_table">${row.units ? row.units.units_name : ''}</td>
                        <td class="edit_inventory_table">${parseFloat(row.quantity).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="edit_inventory_table">${parseFloat(row.sub_total).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})} ৳</td>
                        <td class="edit_inventory_table" hidden>${row.updated_by}</td>
                        <td class="edit_inventory_table" hidden>${row.status_inv}</td>
                        <td class="edit_inventory_table ms-1 ${statusClass}" id="supp_tab15">
                            <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:12px;">
                                ${statusText}
                            </span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                        </td>
                    </tr>
                `;
            }).join("");
        };
        // Filter Inventory ID
        $(document).on('change', '#select_inventory_id', function() {

            var selectValue = $(this).val();
            if(selectValue !== null && selectValue !== ''){
                $("#user_permissions").removeAttr('hidden');
                $(".user_info").fadeIn(200);
                $("#supplier_info").removeAttr('hidden');
                $(".supp_info").fadeIn(200);
            }
            else{
                $("#user_permissions").attr('hidden', true);
                $(".user_info").fadeOut(200);
                $("#supplier_info").attr('hidden', true);
                $(".supp_info").fadeOut(200);
            }

            $(".remove_hidden").removeAttr('hidden');
            $(".add_hidden").removeAttr('hidden');
            $(".replace_hidden").attr('hidden', true);
            // Ajax Request
            var inventoriesID = $(this).val();
            $.ajax({
                url: "{{ route('inventory-auth') }}",
                type: "GET",
                data: {
                    'inventoriesID': inventoriesID
                },
                success: function(data) {
                    var inventories = data.inventories || [];
                    var permissions = data.Inventory_id_permissions || [];
                    $("#inventory_authorize_data_table").html(tableRows(inventories));
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    if (inventories.length > 0 && inventories[0].users) {
                        var userImage = inventories[0].users.image;
                        var userEmail = inventories[0].users.email;
                        var userImageUrl = userImage.includes('https://') ? userImage : '/image/' + userImage;
                        var userImageHtml = `<img class="user_img rounded-circle users_image" src="${userImageUrl}">`;
                        $("#user_image").html(userImageHtml);
                        $("#user_email").val(userEmail);
                    }
                    if (permissions.length > 0 && permissions[0].roles) {
                        var roleName = permissions[0].roles.name;
                        var permissionDate = permissions[0].created_at;
                        var inventoryID = permissions[0].inventories.inv_id;
                        var issueName = permissions[0].issue_name;
                        var permission = permissions[0].permission_status;
                        var approvedBy = permissions[0].approved_by;
                        $("#role_name").val(roleName);
                        $("#permission_date").val(formatPermissionDate(permissionDate));
                        $("#inven_id").val(inventoryID);
                        $("#permission").val(permission ? '✅ Justify' : (row.permission === null ? 'Pending' : '❌ Deny'));
                        $("#issue").val(issueName);
                        $("#approv_by").val(approvedBy == 1 ? 'SuperAdmin' : (approvedBy == 3 ? 'Admin' : 'Null'));
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

    });

    
</script>