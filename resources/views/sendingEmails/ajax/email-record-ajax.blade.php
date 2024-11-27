<script type="module">
    import { currentDate, getTimeDifference, activeTableRow, formatDate, formatNumber } from "/module/module-min-js/helper-function-min.js";
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";

    const companyName = @json(setting('company_name'));
    const companyAddress = @json(setting('company_address'));
    const companyLogo = "{{ asset('backend_asset/main_asset/img/' . setting('update_company_logo')) }}";
    const pageLoader = "{{asset('image/loader/loading.gif')}}";
    
    $(document).ready(function(){
        // Get Current Date and set it for start_date and end_date fields
        const startDateField = document.getElementById('record_start_date');
        const endDateField = document.getElementById('record_end_date');

        if (startDateField) {
            startDateField.value = currentDate();
        }
        if (endDateField) {
            endDateField.value = currentDate();
        }

        fetch_role();
        fetch_search_email();
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Email Record
            if ($(this).attr('id') === 'user_roles') {
                $(this).select2({
                    placeholder: 'Select User Role',
                    allowClear: true
                });
            } else if ($(this).attr('id') === 'user_emails') {
                $(this).select2({
                    placeholder: 'Select User Email',
                    allowClear: true
                });
            }
            if ($(this).attr('id') === 'selectAttachment') {
                $(this).select2({
                    placeholder: 'Select Email Category',
                    allowClear: true
                });
            }
        });
        $('#user_roles').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search roles...');
        });
        $('#user_emails').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search emails...');
        });
        $('#selectAttachment').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search Category...');
        });

        function fetch_role() {
            const currentUrl = "{{ route('email.index') }}";

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
                    const roles = response.roles;
                    $("#user_roles").empty();
                    $("#user_roles").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(roles, function(key, item) {
                        $("#user_roles").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#user_roles").empty();
                    $("#user_roles").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        // User Email Record for search 
        $(document).on('change', '#user_roles', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#user_emails").empty();
                $("#user_emails").append('<option style="color:white;font-weight:600;" value="" disabled>Select the role</option>');
            }
        });
        // Event listener for role dropdown for search email record
        $(document).on('change', '#user_roles', function() {
            fetch_search_email();
        });
        // Function to fetch users based on selected role for search email record
        function fetch_search_email() {

            const currentUrl = "{{ route('email.index') }}";

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
                    const senders_email = response.usersEmail;
                    $("#user_emails").empty();
                    $("#user_emails").append('<option value="" style="font-weight:600;">Select User Email</option>');
                    $.each(senders_email, function(key, item) {
                        $("#user_emails").append(`<option style="color:white;font-weight:600;" value="${item.sender_email}">${item.sender_email}</option>`);
                    });
                },
                error: function() {
                    $("#user_emails").empty();
                    $("#user_emails").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select the role</option>');
                }
            });
        }

        // Table Email Record
        fetch_emal_records();
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11" style="border: 2px solid #e9e9e9;">
                            User Email Record Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => {
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

                var fromEmail, toEmail;
                if(row.sender_email === row.user_to || row.user_to === null || row.user_cc === null || row.user_bcc === null){
                    fromEmail = 'me';
                    toEmail = '';
                }else if(row.sender_email !== row.user_to){
                    toEmail = 'To :';
                }

                var emailType, emailTypeBg, emailTypClass;
                if(row.attachment_type === 'draft'){
                    emailType = 'Draft';
                    emailTypeBg = 'badge rounded-pill bg-draft';
                    emailTypClass = 'text-white';
                }else if(row.attachment_type === 'other'){
                    emailType = 'Other';
                    emailTypeBg = 'badge rounded-pill bg-other';
                    emailTypClass = 'text-white';
                }else if(row.sender_email === row.user_to || row.sender_email === row.user_cc || row.sender_email === row.user_bcc){
                    emailType = 'Inbox';
                    emailTypeBg = 'badge rounded-pill bg-inbox';
                    emailTypClass = 'text-white';
                }else if(row.sender_email && row.user_to !== row.sender_email && row.user_cc !== row.sender_email && row.user_bcc !== row.sender_email){
                    emailType = 'Send';
                    emailTypeBg = 'badge rounded-pill bg-send';
                    emailTypClass = 'text-white';
                } else {
                    emailType = 'Unknown';
                    emailTypeBg = '';
                    emailTypClass = '';
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
                    <tr class="table-row user-table-row parent-row" key="${key}">
                        <td class="line-height-td child-td" style="text-align:left;color:#000000;" id="treeRow">
                            <button class="btn-sm edit_registration view_record_btn cgr_btn viewurs ms-1" data-parent="${row.id}" id="viewRecordBtn" email_id="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-regular fa-eye fa-beat"></i>
                            </button>
                            <span class="child-td1 ps-1">${toEmail} ${fromEmail ? fromEmail : (row.user_to)}</span>
                            <span class="${emailTypeBg} permission edit_inventory_table ps-1 ${emailTypClass}" style="font-size:12px;">
                                ${emailType}
                            </span>
                            <span class="child-td1 ps-1">${formatDate(row.created_at)}</span>
                        </td>
                        <td class="child-td1 ps-1" id="lastTd">
                            <span style="font-weight:700;">Subject :</span> ${row.subject}
                            <span style="color:#007bff;font-size:10px;font-weight: 600;">${getTimeDifference(row.created_at)} ago</span>
                        </td>
                        <td class="child-td1 ps-1" id="readMal" hidden>${row.attachment_type}</td>
                    </tr>
                    <tr class="child-record-row detail-row table-row row-hidden" data-child="${row.id}">
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
        // Fetch Email Record
        function fetch_emal_records(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            const record_start_date = $("#record_start_date").val();
            const record_end_date = $("#record_end_date").val();
            const attachment_type = $("#selectAttachment").val();
            const sender_user = $("#user_roles").val();
            const sender_email = $("#user_emails").val();

            let current_url = url ? url : `{{ route('email.record') }}?per_item=${perItem}`;

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { 
                    query: query, 
                    record_start_date: record_start_date,
                    record_end_date: record_end_date,
                    attachment_type: attachment_type,
                    sender_email : sender_email,
                    sender_user : sender_user,
                },
                success: function(response) {
                    const {
                        data, 
                        links, 
                        total, 
                        months, 
                        years, 
                        total_emails,
                    } = response;
                    
                    $("#email_record_table").html(table_rows(data));
                    // Handle pagination and other UI updates if necessary
                    $("#user_email_record_table_paginate").html(paginate_html({ 
                        links, 
                        total,
                        months, 
                        years, 
                    }));
                    $("#total_emails_record").text(total);
                    // Total Emails
                    $("#total_emails_progress").text(formatNumber(total_emails));
                    // Total Send Emails
                    $("#emailRecord").text(formatNumber(total_emails));
                    // Update current month element with the new data
                    $("#email_record_month").text(months.length > 0 ? months.join(', ') : '');

                    $('[data-bs-toggle="tooltip"]').tooltip();

                },
                error: function(error) {
                    console.log('Error fetching data:', error);
                }
            });
        }
        // Per item change
        $("#perItemEmailControl").on('change', (e) => {
            const { value } = e.target;
            fetch_emal_records('', null, value);
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
        $("#user_email_record_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_emal_records('', url);
            }

        });

        // Attach File and Email Filter
        $("#record_start_date, #record_end_date, #selectAttachment, #user_roles, #user_emails").on('change', ()=>{
            fetch_emal_records(); 
        });

        // Refresh Button
        $(document).on('click', '#refreshIconBtn', function(){
            $(this).tooltip('hide');
            $("#selectAttachment").val("");
            $("#user_roles").val("");
            $("#user_emails").val("");
            fetch_emal_records();
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

        // view button Click and Parent Row Handle
        $(document).on('click', '.view_record_btn', function(){
            var parentId = $(this).data('parent');
            $(this).tooltip('hide');
            $(`.child-record-row[data-child='${parentId}']`).toggle('slow').delay(300);

        });

    });
</script>