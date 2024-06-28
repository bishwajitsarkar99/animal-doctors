<script>
    $(document).ready(function() {
        // Get current date
        var today = new Date();
        var day = String(today.getDate()).padStart(2, '0');
        var month = today.getMonth();
        var yyyy = today.getFullYear();
        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var monthName = monthNames[month];
        var currentDate = day + '-' + monthName + '-' + yyyy;

        // Populate start date field
        document.getElementById('start_of_date').value = currentDate;
        // Populate end date field
        document.getElementById('end_of_date').value = currentDate;

        // Initialize datepickers
        $('#start_of_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });
        $('#end_of_date').datepicker({
            dateFormat: "dd-M-yy",
            changeMonth: true,
            changeYear: true,
        });

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
        // Fetch data when the document is ready
        fetch_all_inventories_authorize(); 

       // Function to fetch all inventories for authorization
        function fetch_all_inventories_authorize(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControls").val();
            }

            const start_date = $("#start_of_date").val();
            const end_date = $("#end_of_date").val();
            const user_id = $("#filter_select_role_id").val();
            const inv_id = $(".input_inventory_id").val();
            const status = $(".role_status").val();

            let current_url = url ? url : `{{ route('search-inventory.action') }}?per_item=${perItem}`;

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { 
                    query: query, 
                    start_date: start_date,
                    end_date: end_date,
                    user_id: user_id,
                    inv_id: inv_id,
                    status: status
                },
                success: function(response) {
                    const {
                        data, 
                        //grouped_inventories,
                        links, 
                        total, 
                        totalQty,
                        months, 
                        years, 
                        medicine_groups,
                        totalInv,
                        totalInvQty,
                        totalInvPending,
                        totalInvDeny,
                        totalInvJustify,
                        role_permissions
                    } = response;
                    var $container = $('#inventory_authorize_data_table');
                    $container.empty();

                    if (data.length === 0) {
                        $container.append(`
                            <tr>
                                <td class="error_data text-danger" align="center" colspan="11">
                                    Inventory Data Not Exists On Server!
                                </td>
                            </tr>
                        `);
                        return;
                    }
                    // {{-- Start Authorize Table --}}
                    medicine_groups.forEach(function(group, key) {
                        var groupRow = `
                        <tr class="tree parent-row table-row" data-parent="${group.id}">
                            <summary><td class=" ps-1" style="cursor: pointer;"><span>${group.id}</span> ➤</td></summary>
                            <summary><td class=" ps-1" style="cursor: pointer;">${group.group_name}</td></summary>
                            <summary><td style="cursor: pointer;"></td></summary>
                            <summary><td style="cursor: pointer;"></td></summary>
                            <summary><td style="cursor: pointer;"></td></summary>
                            <summary><td style="cursor: pointer;"><img class="server-loader-sm error-hidden loader-show mini-loader" id="miniLoaderShow" src="{{asset('/image/loader/loading.gif')}}" alt="Loading...." /></td></summary>
                            <summary><td style="cursor: pointer;" colspan="3"></td></summary>
                            <summary><td style="cursor: pointer;" class="">
                                ${group.totalGroup > 0 ? `<span>${formatCurrency(group.totalGroup)}</span>` : `<span></span>`}
                            </td></summary>
                            <summary><td style="cursor: pointer;" class="" colspan="">
                                ${group.sub_total > 0 ? `<span>${formatCurrency(group.sub_total)} ৳</span>` : `<span></span>`}
                            </td></summary>
                            <summary><td style="cursor: pointer;"></td></summary>
                            <summary><td style="cursor: pointer;"></td></summary>
                        </tr>`;

                        $container.append(groupRow);

                        data.filter(inventory => inventory.medicine_group === group.id).forEach(function(inventory) {
                            var statusClass, statusText, statusColor, statusBg;
                            if (inventory.status == null) {
                                statusClass = 'text-dark';
                                statusText = 'Pending';
                                statusColor = 'color:gray;background-color: white;';
                                statusBg = 'badge rounded-pill bg-gray';
                            } else if (inventory.status == 0) {
                                statusClass = 'text-danger';
                                statusText = '❌ Unauthorize';
                                statusColor = 'color:orangered;background-color: white;';
                                statusBg = 'badge rounded-pill bg-warn';
                            } else if (inventory.status == 1) {
                                statusClass = 'text-dark';
                                statusText = '✅ Authorize';
                                statusColor = 'color:black;background-color: #ecfffd;';
                                statusBg = 'badge rounded-pill bg-azure';
                            }

                            var statusTitle, approveColor;
                            if(inventory.approved_by == null){
                                statusTitle = 'No Approve';
                                approveColor = 'color:orangered;';
                            }else if(inventory.approved_by == 1){
                                statusTitle = 'Super Admin'
                            }else if(inventory.approved_by == 3){
                                statusTitle = 'Admin'
                            }
                            else if(inventory.approved_by == 2){
                                statusTitle = 'Sub Admin'
                            }

                            var updatedDataby = 'No Update';
                            if (inventory.updated_by != null) {
                                switch (inventory.updated_by) {
                                    case 1:
                                        updatedDataby = 'SuperAdmin';
                                        break;
                                    case 2:
                                        updatedDataby = 'Sub-Admin';
                                        break;
                                    case 3:
                                        updatedDataby = 'Admin';
                                        break;
                                    case 0:
                                        updatedDataby = 'User';
                                        break;
                                    case 5:
                                        updatedDataby = 'Accounts';
                                        break;
                                    case 6:
                                        updatedDataby = 'Marketing';
                                        break;
                                    case 7:
                                        updatedDataby = 'Delivery Team';
                                        break;
                                    default:
                                    updatedDataby = 'Unknown';
                                }
                            }

                            var inventoryRow = `
                                <tr class="child-row table-row user-table-row row-hidden row-fade-in" data-parent="${group.id}" data-inventory="${inventory.inventory_id}" style="${statusColor}">
                                    <td class="child-td0">
                                        <button class="btn-sm edit_registration edit_button cgr_btn edit_btn" id="treeVewBtn" data-id="${inventory.inventory_id}" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Details" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                            <span class="tree-line plus" style="color:rgb(99 102 241 / 1);"><i class="fa-solid fa-circle-plus">‌</i></span>
                                            <span class="tree-line minus tree-display" style="color:rgb(99 102 241 / 1);"><i class="fa-solid fa-circle-minus">‌</i><i class="fa-solid fa-arrow-turn-down">‌</i></span>
                                        </button>
                                    </td>
                                    <td class="line-height-td child-td">
                                        <input class="form-check-input check_permission check_authorize ms-2 mt-1" inventory_id="${inventory.inventory_id}" value="${inventory.status}" ${inventory.status ? 'checked' : ''} type="checkbox" >
                                    </td>
                                    <td class="child-td1">${inventory.inv_id}</td>
                                    <td class=" child-td2">${formatDate(inventory.manufacture_date)}</td>
                                    <td class=" child-td3">${formatDate(inventory.expiry_date)}</td>
                                    <td class=" child-td4">${inventory.medicine_names.medicine_name}</td>
                                    <td class=" child-td5">${inventory.medicine_dogs.dosage}</td>
                                    <td class=" child-td6" hidden></td>
                                    <td class=" child-td7">${formatCurrency(inventory.price)} ৳</td>
                                    <td class=" child-td8">${inventory.units.units_name}</td>
                                    <td class=" child-td9">${formatCurrency(inventory.quantity)}</td>
                                    <td class=" child-td10">${formatCurrency(inventory.sub_total)} ৳</td>
                                    <td class=" child-td11" hidden>${inventory.updated_by}</td>
                                    <td class=" child-td12" hidden>${inventory.status_inv}</td>
                                    <td class=" child-td13 ${statusClass}">
                                        <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:12px;">
                                            ${statusText}
                                        </span>
                                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                    </td>
                                </tr>
                                <tr class="last-child-row detail-row table-row user-table-row row-hidden" data-child="${inventory.inventory_id}">
                                    <td colspan="14">
                                        <div class="card detail-content mt-1 mb-1 me-1">
                                            <p hidden>ID: ${inventory.inventory_id}</p>
                                            <div class="row mt-1">
                                                <div class="col-xl-1">
                                                    <label class="" for="" id="userPicture">
                                                        <img class="user_img inv_usr_img user_imgs" src="${inventory.users.image.includes('https://')?inventory.users.image: '/image/'+ inventory.users.image}">
                                                    </label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <label class="card-row-label" for="" id="">Role-Name : ${inventory.users ? inventory.users.name : ''}</label>
                                                    <label class="card-row-label" for="" id="">User-Email : ${inventory.users ? inventory.users.email : ''}</label>
                                                    <label class="card-row-label" for="" id="">Inventory-Date : ${formatDate(inventory.created_at)}</label>
                                                </div>
                                                <div class="col-xl-7">
                                                    <div class="me-1">
                                                        <label class="card-row-label" for="" id="" ${statusClass}>Status : 
                                                        <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:12px;">
                                                            ${statusText}
                                                        </span> 
                                                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                                                        </label>
                                                        <label class="card-row-label" for="approved_by" id="approved_by">Approved_by :  ${statusTitle}</label>
                                                        <label class="card-row-label" for="" id="">Created_by : ${inventory.users ? inventory.users.name : ''}</label>
                                                        <label class="card-row-label" for="updated_by" id="updated_by">Updated_by : ${updatedDataby}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <div class="heading">
                                                        <div class="heading-child">Supplier Information</div>
                                                    </div>
                                                    <div class="card card-form-controll-sm ms-1 mb-1">
                                                        <label class="card-row-label" for="" id="" >Supplier-ID : ${inventory.suppliers.id_name}</label>
                                                        <label class="card-row-label" for="" id="">Type : ${inventory.suppliers.type}</label>
                                                        <label class="card-row-label" for="" id="">Bussiness Type : ${inventory.suppliers.bussiness_type}</label>
                                                        <label class="card-row-label" for="" id="">Name : ${inventory.suppliers.name}</label>
                                                        <label class="card-row-label" for="" id="">Office Address : ${inventory.suppliers.office_address}</label>
                                                        <label class="card-row-label" for="" id="">Current Address : ${inventory.suppliers.current_address}</label>
                                                        <label class="card-row-label" for="" id="">Contract-One : ${inventory.suppliers.contact_number_one}</label>
                                                        <label class="card-row-label" for="" id="">Contract-Two : ${inventory.suppliers.contact_number_two}</label>
                                                        <label class="card-row-label" for="" id="">What's App : ${inventory.suppliers.whatsapp_number}</label>
                                                        <label class="card-row-label" for="" id="">Email : ${inventory.suppliers.email}</label>
                                                    </div>
                                                </div>
                                                <div class="col-xl-7">
                                                    <div class="heading2">
                                                        <div class="heading2-child">Inventory Details</div>
                                                    </div>
                                                    <div class="card card-form-controll-sm inven me-1 mb-1">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <label class="card-row-label" for="" id="">Manufacture-Date : ${formatDate(inventory.manufacture_date)}</label>
                                                                <label class="card-row-label" for="" id="">Expiry-Date : ${formatDate(inventory.expiry_date)}</label>
                                                                <label class="card-row-label" for="" id="">Inventory-ID : ${inventory.inv_id}</label>
                                                                <label class="card-row-label" for="" id="">Category : ${inventory.sub_categories.sub_category_name}</label>
                                                                <label class="card-row-label" for="" id="">Group : ${inventory.medicine_groups.group_name}</label>
                                                                <label class="card-row-label" for="" id="">Medicine-Name : ${inventory.medicine_names.medicine_name}</label>
                                                                <label class="card-row-label" for="" id="">Medicine-Origin : ${inventory.medicine_origins.origin_name}</label>
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <label class="card-row-label" for="" id="">MRP :</label>
                                                                <label class="card-row-label" for="" id="">Quantity :</label>
                                                                <label class="card-row-label" for="" id="">Amount :</label>
                                                                <label class="card-row-label" for="" id="">VAT :</label>
                                                                <label class="card-row-label" for="" id="">Tax :</label>
                                                                <label class="card-row-label" for="" id="">Discount :</label>
                                                                <label class="card-row-label mt-1" for="" id="" style="font-weight:600;">Sub Total :</label>
                                                            </div>
                                                            <div class="col-xl-3">
                                                                <div class="amount-bg" style="border:1px solid 1px solid #97ffe8;border-radius:2px;">
                                                                    <label class="card-row-label" for="" id=""> ${formatCurrency(inventory.price)} ৳</label>
                                                                    <label class="card-row-label" for="" id=""> ${inventory.quantity} ${inventory.units.units_name}</label>
                                                                    <label class="card-row-label" for="" id=""> 
                                                                        <label style="border-bottom:3px double #b5b5b5;">${formatCurrency(inventory.amount)} ৳</label>
                                                                    </label>
                                                                    <label class="card-row-label" for="" id=""> ${inventory.vat_percentage}<i class="ps-1 fa-solid fa-percent" style="font-size: 0.7rem;font-family: math;font-weight: 500;"></i></label>
                                                                    <label class="card-row-label" for="" id=""> ${inventory.tax_percentage}<i class="ps-1 fa-solid fa-percent" style="font-size: 0.7rem;font-family: math;font-weight: 500;"></i></label>
                                                                    <label class="card-row-label" for="" id=""> ${inventory.discount_percentage}<i class="ps-1 fa-solid fa-percent" style="font-size: 0.7rem;font-family: math;font-weight: 500;"></i></label>
                                                                    <label class="card-row-label" for="" id="" style="font-weight:600;"> 
                                                                        <label style="border-bottom:3px double #b5b5b5;">${formatCurrency(inventory.sub_total)} ৳</label>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                `;
                            $container.append(inventoryRow);
                        });
                    });
                    // {{-- End Authorize Table --}}

                    // Handle pagination and other UI updates if necessary
                    $("#inventory_authorize_data_table_paginate").html(paginate_html({ 
                        data, 
                        links, 
                        total,
                        months, 
                        years, 
                        medicine_groups,
                        totalInv,
                        totalInvQty,
                        totalInvPending,
                        totalInvDeny,
                        totalInvJustify,
                        role_permissions 
                    }));
                    $("#total_inventory_quatity").text(total);
                    $("#total_inventory_records").text(totalInv);
                    $("#total_qty_inventory_records").text(formatCurrency(totalInvQty));
                    $("#total_pending_inventory_records").text(formatCurrency(totalInvPending));
                    $("#total_deny_inventory_records").text(formatCurrency(totalInvDeny));
                    $("#total_justify_inventory_records").text(formatCurrency(totalInvJustify));

                    // Total Inventory Quantity
                    const totalInventoryEntry = $("#total_inventory_quatity");
                    totalInventoryEntry.attr("data-val", total);
                    animateNumberCounter(totalInventoryEntry, total);
                    // Total Inventory Quantity
                    const totalInventoryQty = $("#total_qty_inventory_records");
                    totalInventoryQty.attr("data-val", totalInvQty);
                    animateNumberCounter(totalInventoryQty, totalInvQty);

                    // Update current month element with the new data
                    $("#inventory_month").text(months.length > 0 ? months.join(', ') : 'No months found');

                    $('[data-bs-toggle="tooltip"]').tooltip();

                    const inventoryID = data.map(item => ({
                        label: `${item.inventory_id} - ${item.users.name} - ${item.inv_id}`,
                        value: item.inventory_id,
                    }));
                    $("#input_permission_inventory_id").autocomplete({ source: inventoryID });
                },
                error: function(error) {
                    console.log('Error fetching data:', error);
                }
            });
        }
        // Parent Row click
        $(document).on('click', '.parent-row', function(){
            var parentId = $(this).data('parent');
            $(`.child-row[data-parent='${parentId}']`).toggleClass('row-hidden');
            $("#miniLoaderShow").removeClass('error-hidden');
            // Child Row
            $(".child-td").addClass('skeleton').fadeIn(200);
            $(".child-td0").addClass('skeleton').fadeIn(200);
            $(".child-td1").addClass('skeleton').fadeIn(200);
            $(".child-td2").addClass('skeleton').fadeIn(200);
            $(".child-td3").addClass('skeleton').fadeIn(200);
            $(".child-td4").addClass('skeleton').fadeIn(200);
            $(".child-td5").addClass('skeleton').fadeIn(200);
            $(".child-td6").addClass('skeleton').fadeIn(200);
            $(".child-td7").addClass('skeleton').fadeIn(200);
            $(".child-td8").addClass('skeleton').fadeIn(200);
            $(".child-td9").addClass('skeleton').fadeIn(200);
            $(".child-td10").addClass('skeleton').fadeIn(200);
            $(".child-td12").addClass('skeleton').fadeIn(200);
            $(".child-td13").addClass('skeleton').fadeIn(200);
            $(".child-td14").addClass('skeleton').fadeIn(200);
            $(".child-td15").addClass('skeleton').fadeIn(200);
            
            
            setTimeout(() => {
                $("#miniLoaderShow").addClass('error-hidden');
                // Child Row
                $(".child-td").removeClass('skeleton');
                $(".child-td0").removeClass('skeleton');
                $(".child-td1").removeClass('skeleton');
                $(".child-td2").removeClass('skeleton');
                $(".child-td3").removeClass('skeleton');
                $(".child-td4").removeClass('skeleton');
                $(".child-td5").removeClass('skeleton');
                $(".child-td6").removeClass('skeleton');
                $(".child-td7").removeClass('skeleton');
                $(".child-td8").removeClass('skeleton');
                $(".child-td9").removeClass('skeleton');
                $(".child-td10").removeClass('skeleton');
                $(".child-td12").removeClass('skeleton');
                $(".child-td13").removeClass('skeleton');
                $(".child-td14").removeClass('skeleton');
                $(".child-td15").removeClass('skeleton');

            }, 500);

        });
        // peritem change
        $("#perItemControlAuthorization").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_all_inventories_authorize('', null, value);
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
        $("#inventory_authorize_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_all_inventories_authorize('', url);
            }

        });
        // Refresh
        $(document).on('click', '#refresh', function(){
            $(".error-message").remove();
            $('.role-select').addClass('select-display');
            $('.select_status').addClass('select-display');
            $(".refresh-icon").removeClass('perm-hidden');
            $('.background').removeClass('badge rounded-pill bg-primary text-white');
            $('.background-status').removeClass('badge rounded-pill bg-primary text-white');
            $("#strDateOf").attr('hidden', true);
            $("#enDateOf").attr('hidden', true);
            $("#create_token").show();
            $("#token_send").attr('hidden', true);
            $("#input_inventory_id").val("");
            $("#input_token").val("");

            $(".remove_hidden").attr('hidden', true);
            $(".add_hidden").attr('hidden', true);
            $(".replace_hidden").removeAttr('hidden');
            
            setTimeout(() => {
                $(".refresh-icon").addClass('perm-hidden');
            }, 800);

            fetch_all_inventories_authorize();
        });
        // Tree View
        $(document).on('click', '#treeVewBtn', function(){
            var $childRow = $(this).closest('.child-row');
            
            if($childRow.length) {
                var inventoryId = $childRow.attr('data-inventory');
                var $detailRow = $(`tr.detail-row[data-child="${inventoryId}"]`);
                $detailRow.toggleClass('row-hidden');

                $(this).find('.plus').toggleClass('tree-display');
                $(this).find('.minus').toggleClass('tree-display');
                $(this).show('slow');
            }
        });
        // Small Menu List Select Filter
        $(document).on('click', '#multiSelectDropdown', function(){
            var time = null;
            $("#role_Filter_init").removeClass('role-init');
            $("#toggleRole").addClass('role-skeletone');
            $("#toggleStatus").addClass('role-skeletone');
            $("#toggleElement").attr('hidden', true);
            $("#toggleColumn").attr('hidden', true);
            $("#roleText").removeClass('role-title');  
            $("#statusText").removeClass('status-title'); 
            $('.background').removeClass('badge rounded-pill bg-green text-white');
            $('.background-status').removeClass('badge rounded-pill bg-green text-white');
            time = setTimeout(() => {
                $("#toggleRole").removeClass('role-skeletone');
                $("#toggleStatus").removeClass('role-skeletone');
                $("#roleText").addClass('role-title');  
                $("#statusText").addClass('status-title');  
                $("#toggleElement").removeAttr('hidden');
                $("#toggleColumn").removeAttr('hidden');
                $('.background').addClass('badge rounded-pill bg-green text-white');
                $('.background-status').addClass('badge rounded-pill bg-green text-white');

            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // role
        $(document).on('click', '.toggle_value', function(){
            var time = null;
            $('.background').addClass('badge rounded-pill bg-primary text-white');
            $('.role-select').removeClass('select-display');
            $('#role_Filter').addClass('filter_select_role_id');
            $('.role-select').attr('hidden', true);
            
            time = setTimeout(() => {
                $('#role_Filter').removeClass('filter_select_role_id');
                $('.role-select').removeAttr('hidden');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // status
        $(document).on('click', '.toggle_value_status', function(){
            var time = null;
            $('.background-status').addClass('badge rounded-pill bg-primary text-white');
            $('.select_status').removeClass('select-display');
            $('#status_Filter').addClass('filter_select_role_istatus');
            $('.select_status').attr('hidden', true);

            time = setTimeout(() => {
                $('#status_Filter').removeClass('filter_select_role_istatus');
                $('.select_status').removeAttr('hidden');

            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        // AJAX request for Role
        function showLoadingIcon(iconId) {
            $("#" + iconId).addClass("fa-solid fa-feather-pointed");
        }
        // Function to hide the loading icon
        function hideLoadingIcon(iconId) {
            $("#" + iconId).removeClass("fa-solid fa-feather-pointed");
        }
        $("#toggleRole").hover(function() {
            showLoadingIcon("roleIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    hideLoadingIcon("roleIcon");
                },
                error: function(xhr, status, error) {
                    hideLoadingIcon("roleIcon");
                }
            });
        });
        $("#toggleStatus").hover(function() {
            showLoadingIcon("statusIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    hideLoadingIcon("statusIcon");
                },
                error: function(xhr, status, error) {
                    hideLoadingIcon("statusIcon");
                }
            });
        });
    
        // Authorize Role Select Action for Status Filter
        $(document).on('change', '#filter_select_role_id', function(){
            
            var selectedValue = $(this).val();
            $("#option_value_pending").val('null');
            $("#option_value_deny").val('0');
            $("#option_value_jsustify").val('1');
            var pending = $("#option_value_pending").val();
            var deny = $("#option_value_deny").val();
            var jsutify = $("#option_value_jsustify").val();

            if(selectedValue != '' && pending != '' && deny != '' && jsutify != ''){
                $("#option_value_pending").removeAttr('hidden');
                $("#option_value_deny").removeAttr('hidden');
                $("#option_value_jsustify").removeAttr('hidden');
                $("#option_value_select_status").removeAttr('hidden');
                $("#strDateOf").removeAttr('hidden');
                $("#enDateOf").removeAttr('hidden');
            }else{
                $("#option_value_pending").attr('hidden', true);
                $("#option_value_deny").attr('hidden', true);
                $("#option_value_jsustify").attr('hidden', true);
                $("#strDateOf").attr('hidden', true);
                $("#enDateOf").attr('hidden', true);
                $("#option_value_pending").val('');
                $("#option_value_deny").val('');
                $("#option_value_jsustify").val('');
                $("#option_value_select_status").attr('hidden', true);
            }

            fetch_all_inventories_authorize(); 
        });
        // Status Filter
        $("#role_permission_status, #start_of_date, #end_of_date").on('change', () =>{
            
            fetch_all_inventories_authorize(); 
        });
        // Search INV
        $(document).on('keyup', '.input_inventory_id', function(){
            var query = $(this).val();
            fetch_all_inventories_authorize(query); 
        });

        // Authorize Check Permission
        $("#inventory_authorize_data_table").delegate(".check_authorize", "click", function(e) {
            const current_url = "{{route('inventory-authorize.action')}}";
            const pagination_url = $("#inventory_authorize_data_table_paginate .active").attr('href');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: current_url,
                dataType: 'json',
                data: {
                    inventory_id: $(this).attr('inventory_id'),
                    status: $(this).val(),
                },
                success: function(response) {
                    console.log('response', response);
                    $("#success_message").text(response.messages);
                    fetch_all_inventories_authorize('', pagination_url);
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    $("#success_message").text('An error occurred.');
                }
            });
        });
        
    });
        
</script>