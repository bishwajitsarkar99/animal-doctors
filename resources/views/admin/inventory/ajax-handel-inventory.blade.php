<script>
    $(document).ready(function() {
        fetch_inventory_edit_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="13">
                            Inventory data not exists !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
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
                    <tr class="table-row user-table-row" key="${key}" style="${statusColor}">
                        <td class="sn border_ord edit_inventory_table">${key+1}</td>
                        <td class="txt_ ps-1 center">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.inventory_id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="deltBtn" value="${row.inventory_id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="txt_ ps-1 edit_inventory_table">${row.inv_id}</td>
                        <td class="tot_order_ ps-1 edit_inventory_table">${row.suppliers ? row.suppliers.id_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table">${row.sub_categories ? row.sub_categories.sub_category_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table">${row.medicine_groups ? row.medicine_groups.group_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table">${row.medicine_names ? row.medicine_names.medicine_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table">${row.medicine_dogs ? row.medicine_dogs.dosage : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${row.medicine_origins ? row.medicine_origins.origin_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${row.units ? row.units.units_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table"><span>${parseFloat(row.price).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</span> ৳</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table"><span>${parseFloat(row.quantity).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${parseFloat(row.amount).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1" hidden>${parseFloat(row.vat_percentage).toLocaleString('en-Us', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${parseFloat(row.tax_percentage).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${parseFloat(row.discount_percentage).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table"><span>${parseFloat(row.sub_total).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</span> ৳</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden><span class="status_bg_inv ps-1 pe-1">${row.status_inv ==1 ? 'Null': 'Updated'}</span></td>
                        <td class="edit_inventory_table ms-1 ${statusClass}" id="supp_tab15">
                            <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:11px;">
                                ${statusText}
                            </span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                        </td>
                        <td class="tot_pending_ bold ps-1 ${row.updated_by? ' text-primary': ' text-warning'}" id="user_set8" style="text-align:center;">${row.updated_by ==0 ? 'User': 'Null' && row.updated_by ==2 ? 'SubAdmin': 'Null' && row.updated_by ==1 ? 'SuperAdmin': 'Null' && row.updated_by ==3 ? 'Admin': 'Null'}</td>
                        
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Inventory Data ------------------
        function fetch_inventory_edit_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-inv.action')}}?per_item=${perItem}`;
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
                    $("#invedit_data_table").html(table_rows([...data]));
                    $("#invedit_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_invedit_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                }

            });
        }

        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_inventory_edit_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_inventory_edit_data(query);

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
        $("#invedit_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_inventory_edit_data('', url);
            }

        });

        // server submit
        $("#submit").on('click', function(e) {
            e.preventDefault();

            var data = [];

            var trs = $("#medicine_table_form tr");
            if (trs.length) {
                for (const tr of trs) {

                    var row = {};
                    if ($(tr).find('td').length) {
                        for (const td of $(tr).find('td')) {
                            var name = $(td).attr('name');
                            var value = $(td).attr('value');

                            row[name] = value;
                        }
                    }
                    data.push(row);
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/admin/inventories/",
                    data: {
                        data
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $.each(response.errors, function(key, err_value) {
                                $('#savForm_error').html("");
                                $('#savForm_error').addClass('alert_show_errors skeleton ps-1 pe-1');
                                $('#savForm_error').append('<span id="errors">' + err_value + '</span>');
                                $("#savForm_error").fadeOut(40000);

                                var time = null;
                                time = setTimeout(() => {
                                    $('#savForm_error').removeClass('skeleton');
                                    
                                }, 3000);

                                return ()=>{
                                    clearTimeout(time);
                                }
                            });
                        } else if (response.status == 404) {
                            $('#savForm_error').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').text(response.messages);
                        } else {
                            console.log('response', response);
                            $("#medicine_table_form").empty();
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            var time = null;
                            time = setTimeout(() => {
                                $('#success_message').fadeOut();
                            }, 3000);
                            return () => {
                                clearTimeout(time);
                            }

                            fetch_inventory_edit_data();
                        }
                    }
                })
            }
        });

        // Edit Inventory
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").removeAttr('style','true');
            var inventory_id = $(this).val();
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
                        // Date format
                        var manufactureDate = formatDate(response.messages.manufacture_date);
                        $('.manufacture_date').val(manufactureDate);
                        var expiryDate = formatDate(response.messages.expiry_date);
                        $('.expiry_date').val(expiryDate);

                        $('.supplier_id').val(response.messages.supplier_id);
                        $('.category_id').val(response.messages.category_id);
                        $('.group_name').val(response.messages.medicine_group);
                        $('.medicine_name').val(response.messages.medicine_name);
                        $('.medicine_dogs').val(response.messages.medicine_dosage);
                        $('.origin_name').val(response.messages.medicine_origin);
                        $('.medicine_size').val(response.messages.medicine_size);
                        $('.unit_price').val(response.messages.price);
                        $('.quantity').val(response.messages.quantity);
                        $('.amount').val(response.messages.amount);
                        $('.vat').val(response.messages.vat_percentage);
                        $('.tax').val(response.messages.tax_percentage);
                        $('.discount_percentage').val(response.messages.discount_percentage);
                        $('.sub_total').val(response.messages.sub_total);

                        setMedicineNameOptions(response.messages.medicine_group, response.messages.medicine_name);
                        setMedicineDogsOptions(response.messages.medicine_name, response.messages.medicine_dosage);
                    }
                }
            });
        });
        // Option Medicine Name
        var setMedicineNameOptions = function(group_id, value) {

            $("#medicine_name").empty();
            $("#medicine_name").append('<option value="0" disabled>Processing.......</option>');

            $.ajax({
                type: "GET",
                url: "/request-medicine-name/" + group_id,
                success: function(data) {
                    $("#medicine_name").empty();
                    $("#medicine_name").append('<option value="0" disabled>Processing.......</option>');
                    $.each(data, function(key, item) {
                        $("#medicine_name").append("<option class='sub_name_text' value =" + item.id + ">" + item.medicine_name + "</option>").fadeIn('slow');
                    });
                    $(`#category_page form select[name="medicine_name"] option[value="${value}"]`).prop('selected', true);
                }
            });
        }
        // Option Medcine Dosage
        var setMedicineDogsOptions = function(medicine_name, value) {

            $.ajax({
                type: "GET",
                url: "/request-medicine-dogs/" + medicine_name,
                success: function(data) {
                    $("#medicine_dogs").empty();
                    $("#medicine_dogs").append('<option value="0" disabled>Processing.......</option>');
                    $.each(data, function(key, item) {
                        $("#medicine_dogs").append("<option class='sub_name_text' value =" + item.id + ">" + item.dosage + "</option>").fadeIn('slow');
                    });
                    $(`#category_page form select[name="dosage"] option[value="${value}"]`).prop('selected', true);
                }
            });
        }
        // Update Inventory
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();

            var inventory_id = $('#inventory_id').val();
            var data = {
                'inv_id': $('.inv_id').val(),
                'manufacture_date': $('.manufacture_date').val(),
                'expiry_date': $('.expiry_date').val(),
                'supplier_id': $('.supplier_id').val(),
                'category_id': $('.category_id').val(),
                'medicine_group': $('.group_name').val(),
                'medicine_name': $('.medicine_name').val(),
                'medicine_dosage': $('.medicine_dogs').val(),
                'medicine_origin': $('.origin_name').val(),
                'medicine_size': $('.medicine_size').val(),
                'price': $('.unit_price').val(),
                'quantity': $('.quantity').val(),
                'amount': $('.amount').val(),
                'vat_percentage': $('.vat').val(),
                'tax_percentage': $('.tax').val(),
                'discount_percentage': $('.discount_percentage').val(),
                'sub_total': $('.sub_total').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/inventories-update/" + inventory_id,
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
                        $('.manufacture_date').val("");
                        $('.expiry_date').val("");
                        $('.supplier_id').val("");
                        $('.category_id').val("");
                        $('.group_name').val("");
                        $('.medicine_name').val("");
                        $('.medicine_dogs').val("");
                        $('.origin_name').val("");
                        $('.medicine_size').val("");
                        $('.unit_price').val("");
                        $('.quantity').val("");
                        $('.amount').val("");
                        $('.vat').val("");
                        $('.tax').val("");
                        $('.discount_percentage').val("");
                        $('.sub_total').val("");

                        setTimeout(() => {
                            $('#success_message').fadeOut(3000);
                        }, 3000);
                        fetch_inventory_edit_data();
                    }
                }
            });

        });

        // SVC id and cancel, confiram button Disable
        $(document).on('click', '#edtBtn', function() {

            var supplier_id = document.getElementById('supplier_id');
            var submit = document.getElementById('submit');

            supplier_id.setAttribute('disabled', 'true');
            submit.setAttribute('disabled', 'true');

        });
        // SVC id and cancel, confiram button Enable
        $(document).on('click', '#cancel_btn', function() {
            $("#update_btn").hide();
            $("#save").show();
            $("#supplier_id").removeAttr('disabled', 'true');
        });

        // SVC id and cancel, confiram button Enable
        $(document).on('click', '#cancel_btn', function() {
            
            $('#inventory_id').val("");
            $('.inv_id').val("");
            $('.manufacture_date').val("");
            $('.expiry_date').val("");
            $('.supplier_id').val("");
            $('.category_id').val("");
            $('.group_name').val("");
            $('.medicine_name').empty();
            // $('.medicine_name option:selected').prop('selected', false);
            $('.medicine_dogs').empty();
            // $('.medicine_dogs option:selected').prop('selected', false);
            $('.origin_name').val("");
            $('.medicine_size').val("");
            $('.unit_price').val("");
            $('.quantity').val("");
            $('.amount').val("");
            $('.vat').val("");
            $('.tax').val("");
            $('.discount_percentage').val("");
            $('.sub_total').val("");

        });
        // Add Button
        $(document).on('click', '#save', function() {
            $("#save").hide('slow');
            $("#cancel_btn").hide('slow');
            $("#submit").removeAttr('disabled', 'true');
            $("#back_btn").removeAttr('style', 'true');
            
        });

        // Back Button
        $(document).on('click', '#back_btn', function() {
            $("#save").show('slow');
            $("#cancel_btn").show('slow');
            $("#back_btn").hide('slow');
            var submit = document.getElementById('submit');
            submit.setAttribute('disabled', 'true');

        });

        // Current Edit Button
        $(document).on('click', '.edit-btn ', function(){
            $("#save").show('slow');
            $("#save").fadeIn(2000);
            var submit = document.getElementById('submit');
            submit.setAttribute('style');
        });
    });
    // Function to format date as dd-mm-yyyy
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
</script>

<script>
    $(document).ready(function() {
        fetch_inventory_unauthorized_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Inventory unauthorized data not exists !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
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
                    <tr class="table-row user-table-row" key="${key}" style="${statusColor}">
                        <td class="sn border_ord edit_inventory_table">${key+1}</td>
                        <td class="txt_ ps-1 edit_inventory_table">${row.inv_id}</td>
                        <td class="tot_order_ ps-1 edit_inventory_table">${row.suppliers ? row.suppliers.id_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table">${row.sub_categories ? row.sub_categories.sub_category_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table">${row.medicine_groups ? row.medicine_groups.group_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table">${row.medicine_names ? row.medicine_names.medicine_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table">${row.medicine_dogs ? row.medicine_dogs.dosage : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${row.medicine_origins ? row.medicine_origins.origin_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${row.units ? row.units.units_name : ''}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table"><span>${parseFloat(row.price).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</span> ৳</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table"><span>${parseFloat(row.quantity).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${parseFloat(row.amount).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${parseFloat(row.vat_percentage).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${parseFloat(row.tax_percentage).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table" hidden>${parseFloat(row.discount_percentage).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                        <td class="tot_pending_ ps-1 edit_inventory_table"><span>${parseFloat(row.sub_total).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2})}</span> ৳</td>
                        <td class="edit_inventory_table ms-1 ${statusClass}" id="supp_tab15">
                            <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:11px;">
                                ${statusText}
                            </span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                        </td>
                        
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Inventory Unauthorize Data ------------------
        function fetch_inventory_unauthorized_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControlOne").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-unauthorized.action')}}?per_item=${perItem}`;
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
                    $("#inventory_unauthorized_data_table").html(table_rows([...data]));
                    $("#inventory_unauthorized_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_unauthorized_records").text(total);
                }

            });
        }

        // peritem change
        $("#perItemControlOne").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_inventory_unauthorized_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_inventory_unauthorized_data(query);

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
        $("#inventory_unauthorized_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_inventory_unauthorized_data('', url);
            }

        });
    });
</script>

<script>
    $(document).ready(function() {
        // select supplier id loader
        $("#supplier_id").on('click', () => {
            $('.svc-icon').removeClass('svc-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.svc-icon').addClass('svc-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }
        });
        // select manufacture loader
        $("#date_id").on('click', () => {
            $('.manufacture-icon').removeClass('manufacture-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.manufacture-icon').addClass('manufacture-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }
        });
        // select expiry loader
        $(".expiry_date").on('click', () => {
            $('.expiry-icon').removeClass('expiry-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.expiry-icon').addClass('expiry-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }
        });
        // select category field loader
        $("#category_id").on('click', () => {
            $('.category-icon').removeClass('category-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.category-icon').addClass('category-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }
        });
        // select group field loader
        $("#group").on('click', () => {
            $('.group-icon').removeClass('group-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.group-icon').addClass('group-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }
        });
        // select medicine name field loader
        $("#medicine_name").on('click', () => {
            $('.medicine-name-icon').removeClass('medicine-name-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.medicine-name-icon').addClass('medicine-name-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }
        });
        // select medicine dogs field loader
        $("#medicine_dogs").on('click', () => {
            $('.dogs-icon').removeClass('dogs-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.dogs-icon').addClass('dogs-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }

        });
        // select medicine origin field loader
        $("#origin_name").on('click', () => {
            $('.origin-icon').removeClass('origin-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.origin-icon').addClass('origin-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }
        });
        // select medicine size field loader
        $("#product_size").on('click', () => {
            $('.size-icon').removeClass('size-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.size-icon').addClass('size-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }
        });

        // add button
        $("#save").on('click', () => {
            $('.add-inv-icon').removeClass('add-inv-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.add-inv-icon').addClass('add-inv-hidden');
                $(this).attr('disabled', false);
            }, 1500);
            return () => {
                clearTimeout(time);
            }
        });
        // confirm button
        $("#submit").on('click', () => {
            $('.submit-icon').removeClass('submit-hidden');
            $(this).attr('disabled', true);

            var time = null;
            time = setTimeout(() => {
                $('.submit-icon').addClass('submit-hidden');
                $(this).attr('disabled', false);
            }, 3000);
            return () => {
                clearTimeout(time);
            }
        });
    });
</script>
