<script>
    $(document).ready(function(){
        // Fetch data when the document is ready
        fetch_all_user_email(); 
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
                    <tr class="table-row user-table-row parent-row" data-parent="${row.user_id}" key="${key}" style="${statusColor}">
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
                        </td>
                        <td class="child-td1 ps-1" id="lastTd"><span style="font-weight:700;">Subject :</span> ${row.subject}</td>
                    </tr>
                `;
            }).join("\n");
        }
        // Function to fetch all inventories
        function fetch_all_user_email(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            const start_date = $("#start_date").val();
            const end_date = $("#end_date").val();
            const attachment_type = $("#select_attachment").val();

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
                    $("#email_month").text(months.length > 0 ? months.join(', ') : 'No months found');

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
        $("#start_date, #end_date, #select_attachment").on('change', ()=>{
            
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
        // $(document).on('click', '.parent-row', function(){
        //     var parentId = $(this).data('parent');
        //     $(`.child-row[data-child='${parentId}']`).toggleClass('row-hidden');
        // });
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