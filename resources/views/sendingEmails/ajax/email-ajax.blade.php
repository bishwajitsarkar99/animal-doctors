<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module">
    import { currentDate, getTimeDifference, activeTableRow } from "/module/module-min-js/helper-function-min.js";
    $(document).ready(function(){
        // Get Current Date start date field
        document.getElementById('start_date').value = currentDate();
        // Get Current Date end date field
        document.getElementById('end_date').value = currentDate();
        // Fetch data when the document is ready
        fetch_all_user_email(); 
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            User Email Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => {
                var statusClass, statusText, statusColor, statusBg;
                if (row.status == 0) {
                    statusClass = 'text-white';
                    statusText = 'New';
                    statusColor = '';
                    statusBg = 'badge rounded-pill bg-status';
                } else if (row.status == 1) {
                    statusClass = '';
                    statusText = '';
                    statusColor = '';
                    statusBg = '';
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
                    <tr class="table-row user-table-row parent-row" data-parent="${row.id}" key="${key}" style="${statusColor}">
                        <td class="line-height-td child-td" style="text-align:left;color:#000000;" id="treeRow">
                            <button class="btn-sm edit_registration view_btn cgr_btn ms-1" id="checkBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Select" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <input class="form-check-input" type="checkbox" value="" id="selectBtn" style="font-size:13px;margin-top: -1px;">
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-1" id="viewBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-regular fa-eye fa-beat" style="margin-top: 1px;"></i>
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn ms-1" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                                <i class="fa-solid fa-trash-can fa-beat"></i>
                            </button>
                            <span class="child-td1 ps-1">To : ${row.user_to}</span>
                            <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:12px;">
                                ${statusText}
                            </span>
                        </td>
                        <td class="child-td1 ps-1" id="lastTd" hidden>${row.user_to}</td>
                        <td class="child-td1 ps-1" id="lastTd">
                            <span style="font-weight:700;">Subject :</span> ${row.subject}
                            <span style="color:#007bff;font-size:10px;font-weight: 600;">${getTimeDifference(row.created_at)} ago</span>
                        </td>
                    </tr>
                    <tr class="child-row detail-row table-row user-table-row row-hidden" data-child="${row.id}">
                        <td colspan="14">
                            <div class="card detail-content mt-1 mb-1 me-1" style="background-color:white;">
                                <div class="row mt-1">
                                    <div class="col-xl-4" style="margin-bottom: 5px;">
                                        <label class="" for="" id="userPicture">

                                        </label>
                                        <label class="card-row-label" for="" id="">Role-Name : </label>
                                        <label class="card-row-label" for="" id="">User-Email : </label>
                                        <label class="card-row-label" for="" id="">Inventory-Date : </label>
                                        <label class="card-row-label" for="approved_by" id="approved_by">Approved_by :  </label>
                                        <label class="card-row-label" for="" id="">Created_by : </label>
                                        <label class="card-row-label" for="updated_by" id="updated_by">Updated_by : </label>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="card me-1" style="border:none;background-color:white;">
                                            <div class="row">
                                                <div class="col-xl-1">
                                                    <label class="card-row-label" for="supplier_name" id="Supplier">Supplier : </label>
                                                </div>
                                                <div class="col-xl-1">
                                                    <label class="card-row-label" for="supplier_id" id="SupplierID">ID : </label>
                                                </div>
                                                <div class="col-xl-6">
                                                    <label class="card-row-label" for="" id="">Manufacture-Date : </label>
                                                    <label class="card-row-label" for="" id="">Expiry-Date : </label>
                                                    <label class="card-row-label" for="" id="">Inventory-ID : </label>
                                                    <label class="card-row-label" for="" id="">Category : </label>
                                                    <label class="card-row-label" for="" id="">Group : </label>
                                                    <label class="card-row-label" for="" id="">Medicine-Name : </label>
                                                    <label class="card-row-label" for="" id="">Medicine-Dosage : </label>
                                                    <label class="card-row-label" for="" id="">Medicine-Units : </label>
                                                    <label class="card-row-label" for="" id="">Medicine-Origin : </label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="amount-bg" style="border:1px solid 1px solid #97ffe8;border-radius:2px; ">
                                                        <label class="card-row-label" for="" id="">MRP : </label>
                                                        <label class="card-row-label" for="" id="">Quantity : </label>
                                                        <label class="card-row-label" for="" id=""> 
                                                            <label>Amount : <span style="border-bottom:3px double #b5b5b5;"></span></label>
                                                        </label>
                                                        <label class="card-row-label" for="" id="">VAT : </label>
                                                        <label class="card-row-label" for="" id="">Tax : </label>
                                                        <label class="card-row-label" for="" id="">Discount : </label>
                                                        <label class="card-row-label" for="" id="" style="font-weight:600;"> 
                                                            <label>Sub Total : <span style="border-bottom:3px double #b5b5b5;"></span></label>
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
        // Function to fetch all user email
        function fetch_all_user_email(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            const start_date = $("#start_date").val();
            const end_date = $("#end_date").val();
            const attachment_type = $("#select_attachment").val();
            const status = $("#select_status").val();
            const user_to = $("#email_search").val();
            
            let current_url = url ? url : `{{ route('email.fetch') }}?per_item=${perItem}`;

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { 
                    query: query, 
                    start_date: start_date,
                    end_date: end_date,
                    attachment_type: attachment_type,
                    user_to : user_to,
                    status : status,
                },
                success: function(response) {
                    const {
                        data, 
                        links, 
                        total, 
                        months, 
                        years, 
                    } = response;

                    $("#email_data_table").html(table_rows(data));
                    // Handle pagination and other UI updates if necessary
                    $("#user_email_get_data_table_paginate").html(paginate_html({ 
                        links, 
                        total,
                        months, 
                        years, 
                    }));
                    $("#total_user_email").text(total);
                    // Update current month element with the new data
                    $("#email_month").text(months.length > 0 ? months.join(', ') : '');

                    $('[data-bs-toggle="tooltip"]').tooltip();

                    const userID = data.map(item => ({
                        label: `${item.user_to}`,
                        value: item.id,
                    }));
                    $("#email_search").autocomplete({ source: userID });
                },
                error: function(error) {
                    console.log('Error fetching data:', error);
                }
            });
        }

        // Per item change
        $("#perItemControl").on('change', (e) => {
            const { value } = e.target;
            fetch_all_user_email('', null, value);
        });

        // Paginate Page
        const paginate_html = ({ links = [], total = 0 }) => {
            if (total == 0 || !Array.isArray(links)) {
                return "";
            }
            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination">
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
        $("#user_email_get_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_all_user_email('', url);
            }

        });

        // Filter
        $("#start_date, #end_date, #select_attachment,#select_status").on('change', ()=>{
            
            $("#loaderShow").removeClass('error-hidden');
            $(".inventory_permission_data_table").addClass('error-hidden'); 
            
            setTimeout(() => {
                $(".inventory_permission_data_table").removeClass('error-hidden'); 
                $("#loaderShow").addClass('error-hidden');
            }, 500);
            fetch_all_user_email(); 
        });
        $("#email_search").on('keyup', function(){
            var query = $(this).val();
            fetch_all_user_email(query); 
        });

        // Parent Row Click Handler
        $(document).on('click', '.parent-row', function(){
            var parentId = $(this).data('parent');
            $(`.child-row[data-child='${parentId}']`).toggleClass('row-hidden');
        });
    });
</script>
<script>
    $(document).ready(function(){
        // Search modal
        $(document).on('click', '#email_search_page', function(e){
            e.preventDefault();
            $("#emailSearchModal").modal('show');
        });
        // Send modal
        $(document).on('click', '#email_send_page', function(e){
            e.preventDefault();
            $("#emailSendModal").modal('show');
        });
        // Directory modal
        $(document).on('click', '#file_directory_page', function(e){
            e.preventDefault();
            $("#fileDirectoryModal").modal('show');
        });
        // Manually initialize the tooltip for the dropdown button
        // var dropdownButton = document.getElementById('dropdownButton');
        // var dropdownTooltip = new bootstrap.Tooltip(dropdownButton, {
        //     title: "Select",
        //     placement: "top",
        //     delay: { show: 100, hide: 100 },
        //     html: true,
        //     boundary: "window",
        //     template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'
        // });
    });
</script>