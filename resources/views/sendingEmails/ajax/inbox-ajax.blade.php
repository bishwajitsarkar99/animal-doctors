<script type="module">
    import { currentDate, getTimeDifference, activeTableRow, formatDate, formatNumber } from "/module/module-min-js/helper-function-min.js";
    import { handleSuccessMessage, buttonLoader, addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();
    const companyName = @json(setting('company_name'));
    const companyAddress = @json(setting('company_address'));
    const companyLogo = "{{ asset('backend_asset/main_asset/img/' . setting('update_company_logo')) }}";
    const pageLoader = "{{asset('image/loader/loading.gif')}}";
    
    // Inbox
    $(document).ready(function(){
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Email Record
            if ($(this).attr('id') === 'selectAttachFile') {
                $(this).select2({
                    placeholder: 'Select Attachment Type',
                    allowClear: true
                });
            }else if($(this).attr('id') === 'select_attachment'){
                $(this).select2({
                    placeholder: 'Select Category',
                    allowClear: true
                });
            }else if($(this).attr('id') === 'select_status'){
                $(this).select2({
                    placeholder: 'Select Email',
                    allowClear: true
                });
            }else if($(this).attr('id') === 'select_read_email'){
                $(this).select2({
                    placeholder: 'Email Filter',
                    allowClear: true
                });
            }
        });
        $('#selectAttachFile').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search attachment...');
        });
        $('#select_attachment').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search...');
        });
        $('#select_status').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search...');
        });
        $('#select_read_email').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search...');
        });
        // Initialize the button loader for the login button
        buttonLoader('#submit', '.loading-icon', '.btn-text', 'Send...', 'Send', 6000);
        buttonLoader('#forwardSubmit', '.loading-icon-two', '.forward-btn-text', 'Send...', 'Send', 6000);
        // Initialize the message
        handleSuccessMessage('#success_message, #error_message');
        // Get Current Date and set it for start_date and end_date fields
        const startDateField = document.getElementById('start_date');
        const endDateField = document.getElementById('end_date');

        if (startDateField) {
            startDateField.value = currentDate();
        }
        if (endDateField) {
            endDateField.value = currentDate();
        }
        
        // Fetch data when the document is ready
        fetch_all_user_email(); 
        // Data View Table--------------
        const table_rows = (rows, user_email_delete_permissions) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11" style="border: 2px solid #e9e9e9;">
                            User Email Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => {
                // Handle user delete report or message email permissions
                let disableButton = '';
                let changeButtonDelete = '';
                let checboxkClass = '';
                let disableForwardButton = '';
                let changeButton = '';

                if (Array.isArray(user_email_delete_permissions) && user_email_delete_permissions.length > 0) {
                    const rowItem = user_email_delete_permissions[0];

                    if (row.attachment_type === 'report') {
                        if (rowItem?.report_status === 0) {
                            disableButton = 'disabled';
                            changeButtonDelete = '';
                            checboxkClass = '';
                        } else {
                            disableButton = '';
                            changeButtonDelete = 'background-color: gainsboro;border-radius: 50%;';
                            checboxkClass = 'selectBtn';
                        }
                    } else if (row.attachment_type === 'message') {
                        if (rowItem?.message_status === 0) {
                            disableButton = 'disabled';
                            changeButtonDelete = '';
                            checboxkClass = '';
                        } else {
                            disableButton = '';
                            changeButtonDelete = 'background-color: gainsboro;border-radius: 50%;';
                            checboxkClass = 'selectBtn';
                        }
                    }
                } else {
                    console.log('user_email_delete_permissions is empty or not an array');
                }
                // Handle user report or message forward email permissions
                if (Array.isArray(user_email_delete_permissions) && user_email_delete_permissions.length > 0) {
                    const rowItem = user_email_delete_permissions[0];

                    if (row.attachment_type === 'report') {
                        if (rowItem?.report_email_forward === 0) {
                            disableForwardButton = 'disabled';
                            changeButton = '';
                        } else {
                            disableForwardButton = '';
                            changeButton = 'background-color: gainsboro;border-radius: 50%;';
                        }
                    } else if (row.attachment_type === 'message') {
                        if (rowItem?.message_email_forward === 0) {
                            disableForwardButton = 'disabled';
                            changeButton = '';
                        } else {
                            disableForwardButton = '';
                            changeButton = 'background-color: gainsboro;border-radius: 50%;';
                        }
                    }
                } else {
                    console.log('user_email_delete_permissions is empty or not an array');
                }
                // Set value dynamically based on button state
                const value = disableButton === '' ? row.id : '';
                const forwardValue = disableForwardButton === '' ? row.id : '';
                

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
                if(row.attachment_type === 'report'){
                    attachmentType = 'report';
                    attachmentText = 'Report Attachment File';
                }else if(row.attachment_type === 'message'){
                    attachmentType = 'message';
                    attachmentText = 'Message Attachment File';
                }else if(row.attachment_type === 'draft'){
                    attachmentType = 'draft';
                    attachmentText = 'Draft Attachment File';
                }else{
                    attachmentText = 'N/A';
                }

                var fromEmail;
                if(row.sender_email === row.user_to){
                    fromEmail = 'me';
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
                        return `<span><a href="javascript:void(0);" onclick="openAttachmentModal('${relativePath}')" class="attachment_file_link_btn" id="attfile_link_btn" data-file-src="${relativePath}"
                            data-bs-toggle="tooltip"  data-bs-placement="top" title="Export" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                            <i class="fa-solid fa-file-export" style="font-size:15px;"></i> ${fileName.split('/').pop()}
                            </a></span> `;
                    } else {
                        // Display other file types as a download link
                        return `<a href="${relativePath}" download class="attachment_file_link_btn"
                        data-bs-toggle="tooltip"  data-bs-placement="top" title="Download" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>${fileName.split('/').pop()}</a>`;
                    }
                }).join('');

                return `
                    <tr class="table-row user-table-row parent-row select-row-background" key="${key}" style="${statusColor}">
                        <td class="line-height-td child-td" style="text-align:left;color:#000000;" id="treeRow">
                            <button class="btn-sm edit_registration view_btn cgr_btn ms-1" id="checkBtn" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Select" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <input class="form-check-input ${checboxkClass}" type="checkbox" value="${value}" id="selectBtn" ${disableButton} style="font-size:13px;margin-top: -2px;">
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-1" data-parent="${row.id}" id="viewBtn" email_id="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-regular fa-eye fa-beat"></i>
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-1" data-parent="${forwardValue}" id="forwardBtn" value="${forwardValue}" style="font-size: 10px;margin-top: 2px; ${changeButton}" ${disableForwardButton} type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-solid fa-share-nodes fa-beat"></i>
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn ms-1" id="deleteBtn" value="${value}" email-id="${value}" style="font-size: 10px; ${changeButtonDelete}" ${disableButton} type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                                <i class="fa-solid fa-trash-can fa-beat"></i>
                            </button>
                            <span class="child-td1 ps-1">${fromEmail ? fromEmail : row.sender_email}</span>
                            <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:12px;">
                                ${statusText}
                            </span>
                            <span class="child-td1 ps-1">${formatDate(row.created_at)}</span>
                        </td>
                        <td class="child-td1 ps-1" id="lastTd">
                            <span style="font-weight:700;">Subject :</span> ${row.subject}
                            <span style="color:#007bff;font-size:10px;font-weight: 600;">${getTimeDifference(row.created_at)} ago</span>
                        </td>
                        <td class="child-td1 ps-1" id="readMal" value="${row.read_mail}" hidden>${row.read_mail}</td>
                        <td class="child-td1 ps-1" id="readMal" hidden>${row.attachment_type}</td>
                    </tr>
                    <tr class="child-row detail-row table-row row-hidden" data-child="${row.id}">
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
                                            <div class="col-xl-9">
                                                <p class="company_name_area">
                                                    <label class="company_name" for="company_name" id="companyName">${companyName}</label><br>
                                                    <label class="company_address" for="company_address" id="companyAddress">${companyAddress}</label>
                                                </p>
                                            </div>
                                            <div class="col-xl-1">
                                                <div class="div_close_btn">
                                                    <button type="button" class="btn-close btn-btn-sm clos_btn2" data-parent="${row.id}" id="viewBtn" value="${row.id}"
                                                        data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                                                    </button>
                                                </div>
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
        
        // Function to fetch all user email
        function fetch_all_user_email(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            const start_date = $("#start_date").val();
            const end_date = $("#end_date").val();
            const attachment_type = $("#select_attachment").val();
            const status = $("#select_status").val();
            const read_mail = $("#select_read_email").val();
            const sender_email = $("#email_search").val();

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
                    sender_email : sender_email,
                    status : status,
                    read_mail : read_mail,
                },
                success: function(response) {
                    const {
                        data, 
                        links, 
                        total, 
                        months, 
                        years, 
                        total_emails,
                        total_draft_emails,
                        total_send_emails,
                        total_new_emails,
                        user_email_delete_permissions,
                    } = response;

                    $("#email_data_table").html(table_rows(data, user_email_delete_permissions));
                    // Handle pagination and other UI updates if necessary
                    $("#user_email_get_data_table_paginate").html(paginate_html({ 
                        links, 
                        total,
                        months, 
                        years, 
                    }));
                    $("#total_user_email").text(total);
                    // Total Emails
                    $("#total_emails").text(formatNumber(total_emails));
                    // Total New Emails
                    $("#total_new_emails").text(formatNumber(total_new_emails));
                    // Email Table Progress bar
                    $("#inbox_emails_progress").text(formatNumber(total_emails));
                    // Header Send
                    $("#send_emails").text(formatNumber(total_send_emails));
                    // Update current month element with the new data
                    $("#email_month").text(months.length > 0 ? months.join(', ') : '');

                    $('[data-bs-toggle="tooltip"]').tooltip();

                    const userID = data.map(item => ({
                        label: `${item.sender_email}`,
                        value: item.sender_email,
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

        // Email Data Get According to Date
        $("#start_date, #end_date").on('change', ()=>{
            $("#accessconfirmbranch").modal('show');
            $("#dataPullingProgress").removeAttr('hidden');
            $("#processModal_body").addClass('loading_body_area');
            $("#access_modal_box").addClass('progress_body');
            setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#dataPullingProgress").attr('hidden', true);
                $("#access_modal_box").removeClass('progress_body');
                $("#processModal_body").removeClass('loading_body_area');
                fetch_all_user_email();  
            }, 1500);
        });

        // Attach File and Email Filter
        $("#select_attachment,#select_status").on('change', ()=>{
            fetch_all_user_email(); 
        });
        // Next or Previous Mail Filter
        $(document).on("change", "#select_read_email", function() {
            const read_mail = $(this).val();
            fetch_all_user_email(read_mail);
            
            if (read_mail) {
                $('.table-row').each(function() {
                    $(this).addClass('table-row-select-bg');
                });
            } else {
                $('.table-row').each(function() {
                    $(this).removeClass('table-row-select-bg');
                });
            }
        });
        // Read Mail Filter
        $(document).on("click", "#readButton", function() {
            var read_mail = $(this).data('status');

            $('.table-row').each(function() {
                var readMailValue = $(this).find('#readMal').text();

                if (read_mail && readMailValue === '0') {
                    $(this).addClass('table-row-select-bg');
                } else {
                    $(this).removeClass('table-row-select-bg');
                }
            });
        });
        // Un Read Mail Filter
        $(document).on("click", "#unReadButton", function() {
            var read_mail = $(this).data('status');

            $('.table-row').each(function() {
                var readMailValue = $(this).find('#readMal').text();

                if (read_mail && readMailValue === '1') {
                    $(this).addClass('table-row-select-bg');
                } else {
                    $(this).removeClass('table-row-select-bg');
                }
            });
        });
        // Live Search
        $("#email_search").on('keyup', function(){
            var query = $(this).val();
            fetch_all_user_email(query); 
        });

        // view button Click and Parent Row Handle
        $(document).on('click', '#viewBtn', function(){
            var parentId = $(this).data('parent');
            $(this).tooltip('hide');
            $(`.child-row[data-child='${parentId}']`).toggle('slow').delay(300);

            const current_url = "{{route('email.view_draft')}}";

            const pagination_url = $("#user_email_get_data_table_paginate .active").attr('href');

            const email_id = $(this).data('email_id');

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
                    id: $(this).attr('email_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                }
            });
        });

        // clear email form
        $(document).on('click', '#clearBtn', function(){
            $(this).tooltip('hide');
            $("#inputTo").tagsinput('removeAll');
            $("#inputCC").tagsinput('removeAll');
            $("#inputBCC").tagsinput('removeAll');
            $("#inputSubject").val("");
            $("#email_summernote").summernote('code', '');
            $("#selectAttachFile").empty();
            $("#email_attachment").val("");
            $(".email_attachment").val("");
            $(".attach_group").addClass("hidden");
            $("#attachmentText").addClass("hidden");
            $("#forwardSubmit").addClass('hidden');
            $("#submit").removeClass('hidden');
        });

        // email forward input[type="file"] row remove
        $(document).on('click', '#rowDeleteBtn', function(e){
            e.preventDefault();
            $(this).tooltip('hide');
            $(this).closest('.attach_group').remove();
            $(".email_attachment").val("");
        });

        // Table row increment
        document.getElementById('moreBtn').addEventListener('click', function() {
            $(this).tooltip('hide');
            
            var tableBody = document.querySelector('#fileTable');
            
            var firstRow = document.querySelector('#fileTable tr:first-child');
            // Clone the last row
            var newRow = firstRow.cloneNode(true);

            newRow.querySelector('.attachment').value = '';

            tableBody.appendChild(newRow);
        }, { passive: true });
        // Table row decrement
        document.getElementById('decrementBtn').addEventListener('click', function() {
            $(this).tooltip('hide');
            $("#email_attachment").val("");
            var tableBody = document.querySelector('#fileTable');

            if (tableBody.rows.length > 1) {
                tableBody.deleteRow(-1);
            }
        }, { passive: true });

        // email forward
        $(document).on('click', '#forwardBtn', function(e){
            e.preventDefault();
            $(this).tooltip('hide');
            var id = $(this).val();
            if(id){
                $("#moreBtn").removeAttr('disabled');
                $("#decrementBtn").removeAttr('disabled');
                $("#email_attachment").removeClass('hidden');
                $("#forwardSubmit").removeClass('hidden');
                $("#submit").addClass('hidden');
                $("#attachmentText").removeClass("hidden");
            }

            $.ajax({
                type: 'GET',
                url: "/email/forward/" + id,
                success: function(response){
                    $('#success_message').html("").removeClass('alert alert-danger');
                    if(response.status == 404){
                        $('#success_message').addClass('alert alert-danger').text(response.messages);
                    }else{
                        $("#emailForwardID").text(id);
                        // Set value for To field and refresh tagsinput
                        $("#inputTo").tagsinput('removeAll');
                        $("#inputTo").tagsinput('add', response.messages.user_to);

                        // Set value for CC field and refresh tagsinput
                        $("#inputCC").tagsinput('removeAll');
                        $("#inputCC").tagsinput('add', response.messages.user_cc);

                        // Set value for BCC field and refresh tagsinput
                        $("#inputBCC").tagsinput('removeAll');
                        $("#inputBCC").tagsinput('add', response.messages.user_bcc);

                        // Set other fields
                        $("#inputSubject").val(response.messages.subject);
                        $("#email_summernote").summernote('code', response.messages.main_content);
                        $("#selectAttachFile").val(response.messages.attachment_type).trigger('change.select2');

                        // Display attachment names in a separate div
                        let attachmentPreview = $("#attachmentPreview");
                        attachmentPreview.empty();
                        let attachmentText = $("#attachmentText");
                        attachmentText.empty();

                        try {
                            let attachments = JSON.parse(response.messages.email_attachments);
                            let file_image = response.messages.attachment_type;

                            if (attachments && attachments.length > 0) {
                                attachments.forEach(function(attachment) {
                                    let fileName = attachment.file.split('/').pop();
                                    let fileExtension = fileName.split('.').pop().toLowerCase();
                                    // Define logos for various file types
                                    let pdfLogo = "{{ asset('backend_asset/main_asset/attachment-logo/pdf_logo.png') }}";
                                    let xlsLogo = "{{ asset('backend_asset/main_asset/attachment-logo/excel-logo.png') }}";
                                    let csvLogo = "{{ asset('backend_asset/main_asset/attachment-logo/csv_logo.jpg') }}";
                                    let docxLogo = "{{ asset('backend_asset/main_asset/attachment-logo/docx_logo.png') }}";
                                    // Base paths for attachments and user messages
                                    let attachImagePath = `{{ asset('storage/report') }}/${fileName}`;
                                    let userMessageImagePath = `{{ asset('storage/message') }}/${fileName}`;
                                    let draftImagePath = `{{ asset('storage/draft') }}/${fileName}`;

                                    // Determine file path based on `attachment_type`
                                    let filePath = "";

                                    if (file_image === 'report') {
                                        if (fileExtension === 'pdf') {
                                            filePath = pdfLogo;
                                        } else if (['xls', 'xlsx'].includes(fileExtension)) {
                                            filePath = xlsLogo;
                                        } else if (fileExtension === 'csv') {
                                            filePath = csvLogo;
                                        } else if (fileExtension === 'docx') {
                                            filePath = docxLogo;
                                        } else if (['png', 'jpg', 'jpeg'].includes(fileExtension)) {
                                            filePath = attachImagePath;
                                        }
                                    } else if(file_image === 'message') {
                                        if (fileExtension === 'pdf') {
                                            filePath = pdfLogo;
                                        } else if (['xls', 'xlsx'].includes(fileExtension)) {
                                            filePath = xlsLogo;
                                        } else if (fileExtension === 'csv') {
                                            filePath = csvLogo;
                                        } else if (fileExtension === 'docx') {
                                            filePath = docxLogo;
                                        } else if (['png', 'jpg', 'jpeg'].includes(fileExtension)) {
                                            filePath = userMessageImagePath;
                                        }
                                    }else if(file_image === 'draft') {
                                        if (fileExtension === 'pdf') {
                                            filePath = pdfLogo;
                                        } else if (['xls', 'xlsx'].includes(fileExtension)) {
                                            filePath = xlsLogo;
                                        } else if (fileExtension === 'csv') {
                                            filePath = csvLogo;
                                        } else if (fileExtension === 'docx') {
                                            filePath = docxLogo;
                                        } else if (['png', 'jpg', 'jpeg'].includes(fileExtension)) {
                                            filePath = draftImagePath;
                                        }
                                    }

                                    // Append file name and display image for each attachment
                                    attachmentPreview.append(`
                                        <div class="attach_group mb-1">
                                            <span class="file_name">${fileName}</span>
                                            <img class="file_logo" src="${filePath}" alt="Attachment Image" />
                                            <button type="button" class="btn-close btn-btn-sm" id="rowDeleteBtn" data-bs-dismiss="modal" aria-label="Close"
                                                data-bs-toggle="tooltip"  data-bs-placement="right" title="Remove" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                                            </button>
                                            <input type="file" class="form-control form-control-sm attachment email_attachment" name="email_attachments[]" data-filename="${fileName}" id="email_attachment" hidden />
                                        </div>
                                    `);
                                    attachmentText.append(`
                                        <div class="select_message attachment-file-animation mb-1">
                                            <span class="file_messg"><input class="uplod_focus"></input> Again File Choose, (otherwise attachment files will be not send.) <span class="uplod_button"><i class="fa-solid fa-upload"></i> ${fileName}</span></span>
                                        </div>
                                    `);
                                    $('[data-bs-toggle="tooltip"]').tooltip();
                                });
                            } else {
                                attachmentPreview.append(`<div class="col-xl-4">No attachments added.</div>`);
                            }
                        } catch (error) {
                            console.error("Failed to parse attachments:", error);
                            attachmentPreview.append(`<div class="col-xl-4">Error loading attachments.</div>`);
                        }
                        $('#v-pills-email-tab').tab('show');
                    }
                }
            });
        });

        // forward email sending
        $(document).on('click', '#forwardSubmit', function(e) {
            e.preventDefault();

            // Get form data
            let formData = new FormData($('#emailForm')[0]);
            formData.append('email_id', $('#emailForwardID').val());
            
            let filesInput = $('input[type="file"].email_attachment');

            filesInput.each(function() {
                let files = $(this)[0].files;
                for (let i = 0; i < files.length; i++) {
                    formData.append('email_attachments[]', files[i]);
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('email.forward.send') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Optionally, reset the form if needed
                    $('#emailForm')[0].reset();
                    $("#inputTo").tagsinput('removeAll');
                    $("#inputCC").tagsinput('removeAll');
                    $("#inputBCC").tagsinput('removeAll');
                    $("#email_summernote").summernote('code', '');
                    $("#attachmentPreview").empty();

                    var tableBody = document.querySelector('#fileTable');
                    if (tableBody.rows.length > 1) {
                        tableBody.deleteRow(-1);
                    }
                    $("#email_attachment").val("");

                    $('#success_messages').addClass('background_success').text(response.messages).fadeIn();
                    setTimeout(function() {
                        $('#success_messages').fadeOut().removeClass('background_success').text('');
                    }, 6000);
                },
                error: function(error) {
                    if (error.status === 422) {
                        let errors = error.responseJSON.errors;
                        let errorMessage = "Failed to forward email. \n";
                        $.each(errors, function(field, messages) {
                            errorMessage += messages.join(", ") + "\n";
                        });
                        $('#success_message').addClass('background_error').text(errorMessage);
                    } else {
                        console.log('Error:', error);
                        $('#success_message').addClass('background_error').text("An error occurred. Please try again.");
                    }
                }
            });
        });
        
        // email delete
        $(document).on('click', '#deleteBtn, .delete_inbox_btn', function(e){
            e.preventDefault();

            // Check if any checkboxes are selected
            let selectedEmails = [];
            $("#selectBtn:checked").each(function() {
                selectedEmails.push($(this).val());
            });

            if (selectedEmails.length === 0) {
                let emailId = $(this).data('email-id');

                if (!emailId) {
                    $("#errorEmailDelete").modal('show');
                    setTimeout(() => {
                        removeAttributeOrClass([
                            {selector: '.error-messg_title, .err_close, .error_messg', type: 'class', name: 'text-skeletone'},
                            {selector: '.err_cancel_button', type: 'class', name: 'setting-cancel-btn-skeletone'},
                        ]);
                    }, 1000);
                }
                selectedEmails.push(emailId);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'DELETE',
                url:'/email/delete',
                data: { ids: selectedEmails },
                success:function(response){
                    $('#success_message').text(response.messages);
                    $("#success_message").addClass('background_success_sm');
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    fetch_all_user_email();
                }
            });
        });
        // Show Pdf,Excle,Csv logo in modal
        $(document).on('click', '.attachment_file_link_btn', function(e) {
            e.preventDefault();

            // Get the file source from a data attribute or an actual source
            const fileSrc = $(this).data('file-src'); // Ensure this attribute is set on the element

            if (!fileSrc) {
                console.error("File source is undefined. Make sure 'data-file-src' attribute is set on the element.");
                return; // Exit if fileSrc is undefined to avoid errors
            }

            const logoID = document.getElementById('logoFile');
            const fileNameElement = document.getElementById('fileNam'); // Ensure this element exists in your HTML

            // Check file extension and handle accordingly
            const fileExtension = fileSrc.split('.').pop().toLowerCase();

            // Set logo and file name based on file type
            let logoPath = '';
            let fileName = '';
            if (fileExtension === 'pdf') {
                logoPath = "{{ asset('backend_asset/main_asset/attachment-logo/pdf_logo.png') }}";
                fileName = "PDF";
            } else if (['xls', 'xlsx'].includes(fileExtension)) {
                logoPath = "{{ asset('backend_asset/main_asset/attachment-logo/excel_logo.png') }}";
                fileName = "Excel";
            } else if (fileExtension === 'csv') {
                logoPath = "{{ asset('backend_asset/main_asset/attachment-logo/csv_logo.jpg') }}";
                fileName = "CSV";
            } else if (fileExtension === 'docx') {
                logoPath = "{{ asset('backend_asset/main_asset/attachment-logo/docx_logo.png') }}";
                fileName = "Docx";
            }

            // Set logo source and file name if they are defined
            if (logoPath && fileName) {
                logoID.src = logoPath;
                logoID.style.display = 'block';
                
                // Set file name if element exists
                if (fileNameElement) {
                    fileNameElement.innerText = fileName;
                }
            } else {
                logoID.style.display = 'none';
            }

            // Show the modal
            $('#attachmentFileModal').modal('show');
        });
        // Refresh Button
        $(document).on('click', '#refreshIconBtn', function(){
            $(this).tooltip('hide');
            $("#select_attachment").val("");
            $("#select_status").val("");
            $("#email_search").val("");
            $("#allSelectBtn").prop('checked', false);
            $('.show-btn').addClass('delete-btn-display');
            fetch_all_user_email();
            var time = null;
            addAttributeOrClass([
               {selector: '.refresh_rotate_icon', type: 'class', name: 'fa-spin'} 
            ]);
            // Remove fa-spin
            var timeOut = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.refresh_rotate_icon', type: 'class', name: 'fa-spin'} 
                ]);
            }, 1000);

            return () => {
                clearTimeout(timeOut);
            };
        });
        // Select All Table Rows and Checkboxes
        $(document).on('click', '#allSelectBtn', function() {
            $(this).tooltip('hide');
            const isChecked = $(this).is(':checked');
            $('.selectBtn').prop('checked', isChecked);
            // Toggle background for all rows based on "Select All" checkbox state
            if (isChecked) {
                $('.select-row-background').addClass('table-row-select-bg');
                // Show delete button
                $('.show-btn').removeClass('delete-btn-display');
            } else {
                $('.select-row-background').removeClass('table-row-select-bg');
                // Hide delete button
                $('.show-btn').addClass('delete-btn-display');
            }
        });
        // From Dropdown Table All Rows Select selectButton 
        $(document).on('click', '#selectButton', function(event){
             // Set all checkboxes to checked
            $('.selectBtn').prop('checked', true);
            // Add background to all selected rows
            $('.select-row-background').addClass('table-row-select-bg');
            // Show delete button
            $('.show-btn').removeClass('delete-btn-display');
            // Prevent default link behavior
            event.preventDefault();

        });
        // From Dropdown Table All Rows Unselect noneButton 
        $(document).on('click', '#noneButton', function(event){
             // Set all checkboxes to checked
            $('.selectBtn').prop('checked', false);
            // Add background to all selected rows
            $('.select-row-background').removeClass('table-row-select-bg');
            // Show delete button
            $('.show-btn').addClass('delete-btn-display');
            // Prevent default link behavior
            event.preventDefault();

        });
        // Update "Select All" checkbox based on individual selections
        $(document).on('click', '#selectBtn', function() {
            const isChecked = $(this).is(':checked');
            $(this).tooltip('hide');
            
            // Toggle row background based on checkbox state
            if (isChecked) {
                $(this).closest('.table-row').addClass('table-row-select-bg');
                $('.delete_show_btn').closest('.show-btn').removeClass('delete-btn-display');
            } else {
                $(this).closest('.table-row').removeClass('table-row-select-bg');
            }
            // Update the "Select All" checkbox based on individual selections
            const allChecked = $('.form-check-input[id="selectBtn"]').length === $('.form-check-input[id="selectBtn"]:checked').length;
            $('#allSelectBtn').prop('checked', allChecked);
        });

    });
</script>
