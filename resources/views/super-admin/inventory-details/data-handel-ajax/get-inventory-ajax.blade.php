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
        fetch_all_inventories_data(); 

        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Inventory Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => {
                var statusClass, statusText, statusColor, statusBg;
                if (row.status == null) {
                    statusClass = 'text-dark';
                    statusText = 'Pending';
                    statusColor = 'color:gray;background-color: white;';
                    statusBg = 'badge rounded-pill bg-gray';
                } else if (row.status == 0) {
                    statusClass = 'text-danger';
                    statusText = '❌ Unauthorize';
                    statusColor = 'color:orangered;background-color: white;';
                    statusBg = 'badge rounded-pill bg-warn';
                } else if (row.status == 1) {
                    statusClass = 'text-dark';
                    statusText = '✅ Authorize';
                    statusColor = 'color:black;background-color: #ecfffd;';
                    statusBg = 'badge rounded-pill bg-azure';
                }

                var statusTitle, approveColor;
                if(row.approved_by == null){
                    statusTitle = 'No Approve';
                    approveColor = 'color:orangered;';
                } else if(row.approved_by == 1){
                    statusTitle = 'Super Admin'
                } else if(row.approved_by == 3){
                    statusTitle = 'Admin'
                } else if(row.approved_by == 2){
                    statusTitle = 'Sub Admin'
                }

                var updatedDataby = 'No Update';
                if (row.updated_by != null) {
                    switch (row.updated_by) {
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

                return `
                    <tr class="child-row table-row user-table-row" key="${key}" style="${statusColor}">
                        <td class="line-height-td child-td" style="text-align:center;">${key + 1}</td>
                        <td class="child-td1">${row.inv_id}</td>
                        <td class="child-td1" hidden>${row.user_id}</td>
                        <td class="child-td1" hidden>${row.supplier_id}</td>
                        <td class="child-td2">${formatDate(row.manufacture_date)}</td>
                        <td class="child-td3">${formatDate(row.expiry_date)}</td>
                        <td class="child-td4">${row.medicine_groups.group_name}</td>
                        <td class="child-td4">${row.medicine_names.medicine_name}</td>
                        <td class="child-td5">${row.medicine_dogs.dosage}</td>
                        <td class="child-td7">${formatCurrency(row.price)} ৳</td>
                        <td class="child-td8">${row.units.units_name}</td>
                        <td class="child-td9">${formatCurrency(row.quantity)}</td>
                        <td class="child-td10">${formatCurrency(row.sub_total)} ৳</td>
                        <td class="child-td11" hidden>${row.updated_by}</td>
                        <td class="child-td12" hidden>${row.status_inv}</td>
                        <td class="child-td13 ${statusClass}">
                            <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:12px;">
                                ${statusText}
                            </span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Function to fetch all inventories
        function fetch_all_inventories_data(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControlGet").val();
            }

            const start_date = $("#start_of_date").val();
            const end_date = $("#end_of_date").val();
            const supplier_id = $("#select_supplier_id").val();
            const user_id = $("#select_user_id").val();
            const status = $("#select_status").val();
            const medicine_group = $("#select_medicine_group").val();
            const medicine_dosage = $("#select_medicine_dosage").val();
            const medicine_origin = $("#select_medicine_origin").val();
            const medicine_name = $("#select_medicine_name").val();
            const inv_id = $("#input_inventory_search").val();

            let current_url = url ? url : `{{ route('get_inventory_details.action') }}?per_item=${perItem}`;

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
                    status: status,
                    supplier_id: supplier_id,
                    medicine_group: medicine_group,
                    medicine_dosage: medicine_dosage,
                    medicine_origin: medicine_origin,
                    medicine_name: medicine_name
                },
                success: function(response) {
                    const {
                        data, 
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

                    $("#inventory_get_data_table").html(table_rows(data));
                    // Handle pagination and other UI updates if necessary
                    $("#inventory_get_data_table_paginate").html(paginate_html({ 
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
                    }));
                    $("#total_inventory_quatity").text(total);
                    $("#total_inventory_records").text(formatCurrency(totalInv));
                    $("#total_qty_inventory_records").text(formatCurrency(totalInvQty));
                    $("#total_pending_inventory_records").text(formatCurrency(totalInvPending));
                    $("#total_deny_inventory_records").text(formatCurrency(totalInvDeny));
                    $("#total_justify_inventory_records").text(formatCurrency(totalInvJustify));

                    // Update current month element with the new data
                    $("#inventory_month").text(months.length > 0 ? months.join(', ') : 'No months found');

                    $('[data-bs-toggle="tooltip"]').tooltip();

                    const inventoryID = data.map(item => ({
                        label: `${item.inventory_id} - ${item.users.name} - ${item.inv_id}`,
                        value: item.inv_id,
                    }));
                    $("#input_inventory_search").autocomplete({ source: inventoryID });
                },
                error: function(error) {
                    console.log('Error fetching data:', error);
                }
            });
        }

        // Per item change
        $("#perItemControlGet").on('change', (e) => {
            const { value } = e.target;
            fetch_all_inventories_data('', null, value);
        });

        // Paginate Page
        const paginate_html = ({ links = [], total = 0 }) => {
            if (total == 0 || !Array.isArray(links)) {
                return "";
            }
            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination mt-2">
                        ${links.map((link, key) => `
                            <li class="page-item${link.active ? ' active' : ''}" key="${key}">
                                <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                    ${link.label}
                                </a>
                            </li>
                        `).join("\n")}
                    </ul>
                </nav>
            `;
        };

        // change paginate page------------------------
        $("#inventory_get_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_all_inventories_data('', url);
            }

        });

        // Filter
        $("#start_of_date, #end_of_date, #select_supplier_id, #select_user_id, #select_status, #select_medicine_group, #select_medicine_dosage, #select_medicine_origin, #select_medicine_name").on('change', ()=>{
            fetch_all_inventories_data(); 
        });
        $("#input_inventory_search").on('keyup', function(){
            var query = $(this).val();
            fetch_all_inventories_data(query); 
        });
    });

    // Total Inventory Quantity
    // const totalInventoryEntry = $("#total_inventory_quatity");
    // totalInventoryEntry.attr("data-val", total);
    // animateNumberCounter(totalInventoryEntry, total);
    // Total Inventory Quantity
    // const totalInventoryQty = $("#total_qty_inventory_records");
    // totalInventoryQty.attr("data-val", totalInvQty);
    // animateNumberCounter(totalInventoryQty, totalInvQty);
</script>