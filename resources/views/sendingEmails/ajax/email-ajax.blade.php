<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module">
    import { currentDate, getTimeDifference, activeTableRow, formatDate } from "/module/module-min-js/helper-function-min.js";
    const companyName = @json(setting('company_name'));
    const companyLogo = "{{ asset('backend_asset/main_asset/img/' . setting('update_company_logo')) }}";
    
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
                var created_by = 'Unknown';
                if (row.sender_user != null) {
                    switch (row.sender_user) {
                        case 1:
                            created_by = 'SuperAdmin';
                            break;
                        case 2:
                            created_by = 'Sub-Admin';
                            break;
                        case 3:
                            created_by = 'Admin';
                            break;
                        case 0:
                            created_by = 'User';
                            break;
                        case 5:
                            created_by = 'Accounts';
                            break;
                        case 6:
                            created_by = 'Marketing';
                            break;
                        case 7:
                            created_by = 'Delivery Team';
                            break;
                        default:
                            created_by = 'Unknown';
                    }
                }
                var attachmentType, attachmentText;
                if(row.attachment_type === 'attachments'){
                    attachmentType = 'attachments';
                    attachmentText = 'Report File';
                }else if(row.attachment_type === 'user_message'){
                    attachmentType = 'user_message';
                    attachmentText = 'User Message File';
                }
                
                const attachments = JSON.parse(row.email_attachments || '[]');
                const attachmentElements = attachments.map(att => {
                    const fileName = att.file;
                    const fileType = fileName.split('.').pop().toLowerCase();
                    const relativePath = fileName.includes('https://') ? fileName : `storage/${attachmentType}/${fileName.split('/').pop()}`;

                    if (['png', 'jpg', 'jpeg'].includes(fileType)) {
                        // Display image files
                        return `<span data-bs-toggle="tooltip"  data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                            <img class="attachment_file" src="${relativePath}" onclick="openImageModal('${relativePath}')" alt="Attachment Image" />
                        </span>`;
                    } else if (['pdf', 'xls', 'csv', 'docx'].includes(fileType)) {
                        // Display links for PDF, XLS, and CSV files   target="_blank"
                        return `<span><a href="javascript:void(0);" onclick="openFileModal('${relativePath}')" class="attachment_file_link"
                            data-bs-toggle="tooltip"  data-bs-placement="top" title="Download" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                            <i class="fa-solid fa-file-export" style="font-size:15px;"></i> ${fileName.split('/').pop()}
                            </a></span> `;
                    } else {
                        // Display other file types as a download link
                        return `<a href="${relativePath}" download class="attachment_file_link"
                        data-bs-toggle="tooltip"  data-bs-placement="top" title="Download" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>${fileName.split('/').pop()}</a>`;
                    }
                }).join('');

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
                            <span class="child-td1 ps-1">${formatDate(row.created_at)}</span>
                        </td>
                        <td class="child-td1 ps-1" id="lastTd" hidden>${row.user_to}</td>
                        <td class="child-td1 ps-1" id="lastTd">
                            <span style="font-weight:700;">Subject :</span> ${row.subject}
                            <span style="color:#007bff;font-size:10px;font-weight: 600;">${getTimeDifference(row.created_at)} ago</span>
                        </td>
                    </tr>
                    <tr class="child-row detail-row table-row user-table-row row-hidden" data-child="${row.id}">
                        <td colspan="14">
                            <div class="card detail-content" style="background-color:white;">
                                <div class="row mt-1">
                                    <div class="email_header" id="emailHeader">
                                        <div class="row">
                                            <div class="col-xl-2">
                                                <label class="logo_area" for="logo_area" id="logo_area">
                                                    <img class="company_logo" src="${companyLogo}">
                                                </label>
                                            </div>
                                            <div class="col-xl-10">
                                                <p class="company_name_area">
                                                    <label class="company_name" for="company_name" id="companyName">${companyName}</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-xl-12">
                                        <label class="card_row_first_part mt-2" for="user_to" id="user_to">Date : ${formatDate(row.created_at)}</label><br>
                                        <label class="card_row_first_part" for="user_to" id="user_to">From : ${row.sender_email}</label><br>
                                        <label class="card_row_first_part mt-1" for="user_to" id="user_to">To : ${row.user_to}</label><br>
                                        <label class="card_row_first_part" for="user_cc" id="user_cc">Cc : ${row.user_cc}</label><br>
                                        <label class="card_row_first_part" for="user_bcc" id="user_bcc">Bcc : ${row.user_bcc}</label><br>
                                        <label class="card_row_first_part subject mt-2 ps-1" for="subject" id="subject">Subject :  ${row.subject}</label><br>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-xl-12" style="margin-bottom: 2px;">
                                        <p>${row.main_content}</p><br>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <span class="attachment_files">Attachment-Type : ${attachmentText}</span>
                                    <div class="col-xl-12">
                                        ${attachmentElements}
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-xl-12">
                                        <p class="email_footer">Thanks with best regard,</p>
                                        <p class="email_footer">${created_by}</p><br>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }
        // Function to open image modal and set image source
        window.openImageModal = function(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            imageModal.show();
        };
        window.openFileModal = function(fileSrc) {
            // Attempt to locate the modal content element
            const modalContent = document.getElementById('modalContent');

            // Verify that modalContent exists
            if (!modalContent) {
                console.error("Modal content element with ID 'modalContent' was not found.");
                return;
            }
            
            // Set iframe for documents or image for images
            if (['pdf', 'xls', 'csv', 'docx'].some(ext => fileSrc.toLowerCase().endsWith(ext))) {
                modalContent.innerHTML = `<iframe src="${fileSrc}" style="width:100%; height:80vh;" frameborder="0"></iframe>`;
            } else {
                modalContent.innerHTML = `<img src="${fileSrc}" alt="Attachment" style="width:100%; height:auto;">`;
            }

            // Show the modal
            const fileModal = new bootstrap.Modal(document.getElementById('fileModal'));
            fileModal.show();
        };
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