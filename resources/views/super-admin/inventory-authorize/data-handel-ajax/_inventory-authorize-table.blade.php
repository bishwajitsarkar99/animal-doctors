<script>
    $(document).ready(function () {
        $('#data_search').on('click', function () {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            $.ajax({
                url: '{{ route("search-inventory.action") }}',
                type: 'GET',
                data: { start_date: startDate, end_date: endDate },
                success: function (response) {
                    var results = response.results;
                    $('#inventory_authorize_data_table').html(JSON.stringify(results));
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
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

        // Store Inventory Permission Token or ID
        $(document).on('click', '#data_permission', function(e) {
            e.preventDefault();

            // Input Field Validation
            $('.error-message').remove();

            var roleName = $("#select_role").val();
            var userEmail = $("#select_user").val();
            var inventoryID = $("#inventoryID").val();
            var inventoryIDIssue = $("#inventoryIDIssue").val();

            if(roleName.trim() == ''){
                $("#select_role").closest('.role_nme').append('<span><span class="error-message alert_show_errors ms-5 ps-1">Select the role name.</span></span>');
            }
            if(userEmail.trim() == ''){
                $("#select_user").closest('.role_nme').append('<span><span class="error-message alert_show_errors ms-5 ps-1">Select the user email.</span></span>');
            }
            if(inventoryID.trim() == ''){
                $("#inventoryID").closest('.role_nme').append('<span><span class="error-message alert_show_errors">Inventory unique ID is required.</span></span>');
            }
            if(inventoryIDIssue.trim() == ''){
                $("#inventoryIDIssue").closest('.role_nme').append('<span><span class="error-message alert_show_errors">The Inventory ID issue is required.</span></span>');
            }

            // Check if there are any error messages
            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }

            var data = {
                'role_id': $('#select_role').val(),
                'mail_id': $('#select_user').val(),
                'inventory_id': $('#inventoryID').val(),
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
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                    }
                    fetch_inventory_id_permission();
                }
            });
        });
        // Date Formate
        const formatDate = (dateString) => {
            const date = new Date(dateString);
            const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            return date.toLocaleDateString('en-US', options);
        };
        // Get Inventory Permission Token or ID
        fetch_inventory_id_permission();

        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Inventory ID Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row supp-table-row" key="${key}" id="supp_tab">
                        <td class="sn border_ord font_weight" id="supp_tab2">${row.id}</td>
                        <td class="txt_ center" id="supp_tab3">
                            <button class="btn-sm edit_registration view_btn cgr_btn" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i>
                            </button>
                        </td>
                        <td class="txt_ font_weight ps-1 supp_vew6" id="supp_tab9">${formatDate(row.created_at)}</td>
                        <td class="txt_ font_weight ps-1 supp_vew3" id="supp_tab6">${row.inventory_id}</td>
                        <td class="tot_order_ center ps-1" id="user_set3">
                            <img class="user_img rounded-circle user_imgs" src="${row.users.image.includes('https://')?row.users.image: '/image/'+ row.users.image}">
                        </td>
                        <td class="border_ord font_weight ps-1 supp_vew" id="supp_tab4">${row.roles.name}</td>
                        <td class="txt_ font_weight ps-1 supp_vew2" id="supp_tab5">${row.users.email}</td>
                        <td class="tot_complete_ ps-1 pt- center" id="supp_tab14">
                            <input id="actOne" class="form-switch form-check-input permission_checking me-2" type="checkbox" permission_id="${row.id}" value="${row.permission_status}" ${row.permission_status ? 'checked' : ''}>
                        </td>
                        <td class="ms-1 ${row.permission_status ? 'bg-silver' : (row.permission_status === null ? 'bg-silver' : 'bg-silver')}" id="supp_tab15">
                            <span class="permission-plate permission ps-1 ms-3 ${row.permission_status ? 'text-dark' : (row.permission_status === null ? 'text-secondary' : 'text-danger')}">
                                ${row.permission_status ? 'Justify' : (row.permission_status === null ? 'Pending' : 'Deny')}
                            </span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                        </td>
                        <td class="tot_pending_ bold ps-1 ${row.approved_by? 'text-primary': ' text-warning'}" id="user_set8">${row.approved_by == 1 ? 'SuperAdmin' : (row.approved_by == 3 ? 'Admin' : 'Null')}</td>
                        <td class="txt_ font_weight ps-1 supp_vew6" id="supp_tab9">${row.issue_name}</td>
                        
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Supplier Contact Data ------------------
        function fetch_inventory_id_permission(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-inventory-permission.action')}}?per_item=${perItem}`;
            } else {
                current_url += `&per_item=${perItem}`
            }

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query
                },
                success: function({
                    data,
                    links,
                    total
                }) {
                    $("#inventory_permission_data_table").html(table_rows([...data]));
                    // Assuming paginate_html is defined elsewhere
                    $("#inventory_permission_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_inventory_permission_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // search autocomplete 
                    var suggestions = data.map(function(item) {
                        return {
                            label: `${item.inventory_id} - ${item.role_id} - ${item.mail_id}`,
                            value: item.inventory_id,
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

            fetch_inventory_id_permission('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_inventory_id_permission(query);

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
    });
    
</script>