<script>
    $(document).ready(function() {

        // Fetch all dropdown menu
        fetch_suppliers();
        fetch_roles();
        fetch_medicine_group();
        fetch_medicine_dosage();
        fetch_medicine_origin();
        fetch_medicine_names();
        // Function to fetch all
        function fetch_suppliers() {
            const currentUrl = "{{ route('inventory_details.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    const supplier = response.suppliers;
                    $("#select_supplier_id").empty();
                    $("#select_supplier_id").append('<option value="" style="color:darkgreen;font-weight:600;">Select Supplier</option>');
                    $.each(supplier, function(key, item) {
                        $("#select_supplier_id").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_supplier_id").empty();
                    $("#select_supplier_id").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_roles() {
            const currentUrl = "{{ route('inventory_details.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    const role = response.roles;
                    $("#select_user_id").empty();
                    $("#select_user_id").append('<option value="" style="color:darkgreen;font-weight:600;">Select Role</option>');
                    $.each(role, function(key, item) {
                        $("#select_user_id").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_user_id").empty();
                    $("#select_user_id").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_medicine_group() {
            const currentUrl = "{{ route('inventory_details.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    const group = response.medicine_groups;
                    $("#select_medicine_group").empty();
                    $("#select_medicine_group").append('<option value="" style="color:darkgreen;font-weight:600;">Select Group</option>');
                    $.each(group, function(key, item) {
                        $("#select_medicine_group").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.group_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_medicine_group").empty();
                    $("#select_medicine_group").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_medicine_dosage() {
            const currentUrl = "{{ route('inventory_details.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    const dosage = response.medicine_dosages;
                    $("#select_medicine_dosage").empty();
                    $("#select_medicine_dosage").append('<option value="" style="color:darkgreen;font-weight:600;">Select Dosage</option>');
                    $.each(dosage, function(key, item) {
                        $("#select_medicine_dosage").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.medicine_names ? item.medicine_names.medicine_name : ''} -${item.dosage}</option>`);
                    });
                },
                error: function() {
                    $("#select_medicine_dosage").empty();
                    $("#select_medicine_dosage").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_medicine_origin() {
            const currentUrl = "{{ route('inventory_details.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    const origin = response.medicine_origins;
                    $("#select_medicine_origin").empty();
                    $("#select_medicine_origin").append('<option value="" style="color:darkgreen;font-weight:600;">Select Origin</option>');
                    $.each(origin, function(key, item) {
                        $("#select_medicine_origin").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.origin_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_medicine_origin").empty();
                    $("#select_medicine_origin").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_medicine_names() {
            const currentUrl = "{{ route('inventory_details.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    const medicine = response.medicine_names;
                    $("#select_medicine_name").empty();
                    $("#select_medicine_name").append('<option value="" style="color:darkgreen;font-weight:600;">Select Medicine</option>');
                    $.each(medicine, function(key, item) {
                        $("#select_medicine_name").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.medicine_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_medicine_name").empty();
                    $("#select_medicine_name").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        // Refresh Button
        $(document).on('click', '#refresh', function(){
            $(".refresh-icon").removeClass('refrsh-hidden'); 
            $(".fa-solid").removeClass('refrsh-hidden'); 
            setTimeout(() => {
                $(".refresh-icon").addClass('refrsh-hidden'); 
                $(".fa-solid").addClass('refrsh-hidden'); 
            }, 800);
            fetch_suppliers();
            fetch_roles();
            fetch_medicine_group();
            fetch_medicine_dosage();
            fetch_medicine_origin();
            fetch_medicine_names();
            fetch_all_inventories_data(); 
        });

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
                    statusColor = 'color:gray;background-color: white;cursor: pointer;';
                    statusBg = 'badge rounded-pill bg-gray';
                } else if (row.status == 0) {
                    statusClass = 'text-danger';
                    statusText = '❌ Unauthorize';
                    statusColor = 'color:orangered;background-color: white;cursor: pointer;';
                    statusBg = 'badge rounded-pill bg-warn';
                } else if (row.status == 1) {
                    statusClass = 'text-dark';
                    statusText = '✅ Authorize';
                    statusColor = 'color:black;background-color: #ecfffd;cursor: pointer;';
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
                    <tr class="table-row user-table-row parent-row" data-parent="${row.inventory_id}" key="${key}" style="${statusColor}">
                        <td class="line-height-td child-td" style="text-align:center;text-decoration:underline blue;color:blue;" id="treeRow">${key+1}</td>
                        <td class="child-td1 ps-1">${row.inv_id}</td>
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
                    <tr class="child-row detail-row table-row user-table-row row-hidden" data-child="${row.inventory_id}">
                        <td colspan="14">
                            <div class="card detail-content mt-1 mb-1 me-1" style="background-color:white;">
                                <div class="row mt-1">
                                    <div class="col-xl-4" style="margin-bottom: 5px;">
                                        <label class="" for="" id="userPicture">
                                            <img class="user_img inv_usr_img user_imgs" src="${row.users.image.includes('https://')?row.users.image: '/image/'+ row.users.image}">
                                        </label>
                                        <label class="card-row-label" for="" id="">Role-Name : ${row.users ? row.users.name : ''}</label>
                                        <label class="card-row-label" for="" id="">User-Email : ${row.users ? row.users.email : ''}</label>
                                        <label class="card-row-label" for="" id="">Inventory-Date : ${formatDate(row.created_at)}</label>
                                        <label class="card-row-label" for="approved_by" id="approved_by">Approved_by :  ${statusTitle}</label>
                                        <label class="card-row-label" for="" id="">Created_by : ${row.users ? row.users.name : ''}</label>
                                        <label class="card-row-label" for="updated_by" id="updated_by">Updated_by : ${updatedDataby}</label>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="card me-1" style="border:none;background-color:white;">
                                            <div class="row">
                                                <div class="col-xl-1">
                                                    <label class="card-row-label" for="supplier_name" id="Supplier">Supplier : ${row.suppliers ? row.suppliers.name : ''}</label>
                                                </div>
                                                <div class="col-xl-1">
                                                    <label class="card-row-label" for="supplier_id" id="SupplierID">ID : ${row.suppliers ? row.suppliers.id_name : ''}</label>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label class="card-row-label" for="" id="">Manufacture-Date : ${formatDate(row.manufacture_date)}</label>
                                                    <label class="card-row-label" for="" id="">Expiry-Date : ${formatDate(row.expiry_date)}</label>
                                                    <label class="card-row-label" for="" id="">Inventory-ID : ${row.inv_id}</label>
                                                    <label class="card-row-label" for="" id="">Category : ${row.sub_categories.sub_category_name}</label>
                                                    <label class="card-row-label" for="" id="">Group : ${row.medicine_groups.group_name}</label>
                                                    <label class="card-row-label" for="" id="">Medicine-Name : ${row.medicine_names.medicine_name}</label>
                                                    <label class="card-row-label" for="" id="">Medicine-Dosage : ${row.medicine_dogs.dosage}</label>
                                                    <label class="card-row-label" for="" id="">Medicine-Units : ${row.units.units_name}</label>
                                                    <label class="card-row-label" for="" id="">Medicine-Origin : ${row.medicine_origins.origin_name}</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="amount-bg" style="border:1px solid 1px solid #97ffe8;border-radius:2px; ${statusColor}">
                                                        <label class="card-row-label" for="" id="">MRP : ${formatCurrency(row.price)} ৳</label>
                                                        <label class="card-row-label" for="" id="">Quantity : ${row.quantity} ${row.units.units_name}</label>
                                                        <label class="card-row-label" for="" id=""> 
                                                            <label>Amount : <span style="border-bottom:3px double #b5b5b5;">${formatCurrency(row.amount)} ৳</span></label>
                                                        </label>
                                                        <label class="card-row-label" for="" id="">VAT : ${row.vat_percentage}<i class="ps-1 fa-solid fa-percent" style="font-size: 0.7rem;font-family: math;font-weight: 500;"></i></label>
                                                        <label class="card-row-label" for="" id="">Tax : ${row.tax_percentage}<i class="ps-1 fa-solid fa-percent" style="font-size: 0.7rem;font-family: math;font-weight: 500;"></i></label>
                                                        <label class="card-row-label" for="" id="">Discount : ${row.discount_percentage}<i class="ps-1 fa-solid fa-percent" style="font-size: 0.7rem;font-family: math;font-weight: 500;"></i></label>
                                                        <label class="card-row-label" for="" id="" style="font-weight:600;"> 
                                                            <label>Sub Total : <span style="border-bottom:3px double #b5b5b5;">${formatCurrency(row.sub_total)} ৳</span></label>
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
            
            $("#loaderShow").removeClass('error-hidden');
            $(".inventory_permission_data_table").addClass('error-hidden'); 
            
            setTimeout(() => {
                $(".inventory_permission_data_table").removeClass('error-hidden'); 
                $("#loaderShow").addClass('error-hidden');
            }, 500);
            fetch_all_inventories_data(); 
        });
        $("#input_inventory_search").on('keyup', function(){
            var query = $(this).val();
            fetch_all_inventories_data(query); 
        });

        // Parent Row Click Handler
        $(document).on('click', '.parent-row', function(){
            var parentId = $(this).data('parent');
            $(`.child-row[data-child='${parentId}']`).toggleClass('row-hidden');
        });

        // Data Export Skeletone
        $(document).on('click', '.exportDropdown', function(){

            $(".export-signal").toggleClass('export-button-classic');

            var time = null;
            $("#pdfText").addClass('pdf-skeletone');
            $(".pdf").removeClass('pdf-title');
            $("#excelText").addClass('pdf-skeletone');
            $(".excel").removeClass('excel-title');
            $("#cvsText").addClass('cvs-skeletone');
            $(".cvs").removeClass('cvs-title');
            $("#printText").addClass('print-skeletone');
            $(".print").removeClass('print-title');

            time = setTimeout(() => {
                $("#pdfText").removeClass('pdf-skeletone');
                $(".pdf").addClass('pdf-title');
                $("#excelText").removeClass('pdf-skeletone');
                $(".excel").addClass('excel-title');
                $("#cvsText").removeClass('cvs-skeletone');
                $(".cvs").addClass('cvs-title');
                $("#printText").removeClass('print-skeletone');
                $(".print").addClass('print-title');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        $("#export").on('click',()=> {
            $('.search-export-icon').removeClass('search-export-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.search-export-icon').addClass('search-export-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });
        $(".printBtn").on('click', function(){
            $('.search-print-icon').removeClass('.search-print-hidden');
            $(this).attr('disabled', true);

            setTimeout(() => {
                $('.search-print-icon').addClass('.search-print-hidden');
                $(this).attr('disabled', false); 
            }, 3000);
        });
        // spinner: "fa fa-spinner fa-spin"
        function showLoadingIcon(iconId) {
            $("#" + iconId).addClass("fa-solid fa-feather-pointed");
        }
        // Function to hide the loading icon
        function hideLoadingIcon(iconId) {
            $("#" + iconId).removeClass("fa-solid fa-feather-pointed");
        }
        // AJAX request for PDF Download
        $(".exportPdf").hover(function() {
            showLoadingIcon("pdfIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    // Handle success response if needed
                    hideLoadingIcon("pdfIcon");
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    hideLoadingIcon("pdfIcon");
                }
            });
        });
        // AJAX request for Excel Download
        $("#exportExcel").hover(function() {
            showLoadingIcon("excelIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    // Handle success response if needed
                    hideLoadingIcon("excelIcon");
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    hideLoadingIcon("excelIcon");
                }
            });
        });
        // AJAX request for CSV Download
        $("#exportCsv").hover(function() {
            showLoadingIcon("csvIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    // Handle success response if needed
                    hideLoadingIcon("csvIcon");
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    hideLoadingIcon("csvIcon");
                }
            });
        });
        // AJAX request for Screen Print
        $("#printBtn").hover(function() {
            showLoadingIcon("printIcon");
            $.ajax({
                url: $(this).attr("href"),
                success: function(response) {
                    // Handle success response if needed
                    hideLoadingIcon("printIcon");
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    hideLoadingIcon("printIcon");
                }
            });
        });
    });

</script>