<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module">
    import { currentDate, getTimeDifference, activeTableRow, formatDate, formatNumber } from "/module/module-min-js/helper-function-min.js";
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    const companyName = @json(setting('company_name'));
    const companyAddress = @json(setting('company_address'));
    const companyLogo = "{{ asset('backend_asset/main_asset/img/' . setting('update_company_logo')) }}";
    const pageLoader = "{{asset('image/loader/loading.gif')}}";
    // Send List
    $(document).ready(function(){
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Email Record
            if ($(this).attr('id') === 'select_attachment_draft') {
                $(this).select2({
                    placeholder: 'Select Category',
                    allowClear: true
                });
            }
        });
        $('#select_attachment_draft').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search...');
        });
        // Get Current Date and set it for start_date and end_date fields
        const startDateField = document.getElementById('draft_start_date');
        const endDateField = document.getElementById('draft_end_date');

        if (startDateField) {
            startDateField.value = currentDate();
        }
        if (endDateField) {
            endDateField.value = currentDate();
        }

        // Fetch data when the document is ready
        fetch_draft_email(); 
        // Data View Table--------------
        const table_rows = (rows, user_email_delete_permissions) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11" style="border: 2px solid #e9e9e9;">
                            User Draft Email Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => {

                // Handle user delete report or message email permissions
                let disableButton = '';
                let checboxkClass = '';
                let changeButtonDelete = '';

                if (Array.isArray(user_email_delete_permissions) && user_email_delete_permissions.length > 0) {
                    const rowItem = user_email_delete_permissions[0];

                    if (row.attachment_type === 'draft') {
                        if (rowItem?.darft_status === 0) {
                            disableButton = 'disabled';
                            changeButtonDelete = 'background-color: gainsboro;border-radius: 50%;';
                            checboxkClass = '';
                        } else {
                            disableButton = '';
                            changeButtonDelete = '';
                            checboxkClass = 'selectCheckBtn';
                        }
                    }else if (row.attachment_type === 'other') {
                        if (rowItem?.darft_status === 0) {
                            disableButton = 'disabled';
                            changeButtonDelete = 'background-color: gainsboro;border-radius: 50%;';
                            checboxkClass = '';
                        } else {
                            disableButton = '';
                            changeButtonDelete = '';
                            checboxkClass = 'selectCheckBtn';
                        }
                    }
                } else {
                    console.log('user_email_delete_permissions is empty or not an array');
                }
                
                const value = disableButton === '' ? row.id : '';

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
                if(row.attachment_type === 'draft'){
                    attachmentType = 'draft';
                    attachmentText = 'Draft Attachment File';
                }else if(row.attachment_type === 'message'){
                    attachmentType = 'message';
                    attachmentText = 'Message Attachment File';
                }else if(row.attachment_type === 'report'){
                    attachmentType = 'report';
                    attachmentText = 'Report Attachment File';
                }else{
                    attachmentText = 'N/A';
                }

                var fromEmail;
                if(row.sender_email === row.user_to){
                    fromEmail = 'me';
                }else if(row.user_to === null){
                    fromEmail = 'Draft';
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
                    <tr class="table-row user-table-row parent-row select-draft-row-background" key="${key}">
                        <td class="line-height-td child-td" style="text-align:left;color:#000000;" id="treeRow">
                            <button class="btn-sm edit_registration view_btn cgr_btn ms-1" id="checkBtn" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Select" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <input class="form-check-input ${checboxkClass}" type="checkbox" value="${value}" id="selectCheckBtn" ${disableButton} style="font-size:13px;margin-top: -2px;">
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn draft_view viewurs ms-1" data-parent="${row.id}" id="viewDraftBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-regular fa-eye fa-beat"></i>
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-1" data-parent="${row.id}" id="draftForwardBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-solid fa-share-nodes fa-beat"></i>
                            </button>
                            <button class="btn-sm edit_registration view_btn draft_delete_btn cgr_btn ms-1" id="draftBtn" email-id="${value}" value="${value}" style="font-size: 10px; ${changeButtonDelete}" ${disableButton} type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                                <i class="fa-solid fa-trash-can fa-beat"></i>
                            </button>
                            <span class="child-td1 ps-1" style="color:orangered;">${fromEmail ? fromEmail : row.user_to}</span>
                            <span class="child-td1 ps-1">${formatDate(row.created_at)}</span>
                        </td>
                        <td class="child-td1 ps-1" id="lastTd">
                            <span style="font-weight:700;">Subject :</span> ${row.subject}
                            <span style="color:#007bff;font-size:10px;font-weight: 600;">${getTimeDifference(row.created_at)} ago</span>
                        </td>
                        <td class="child-td1 ps-1" id="readMal" value="${row.read_mail}" hidden>${row.read_mail}</td>
                    </tr>
                    <tr class="child-draft-row detail-row table-row row-hidden" data-child="${row.id}">
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
        function fetch_draft_email(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemDraftEmail").val();
            }

            // Get filter values
            const draft_start_date = $("#draft_start_date").val();
            const draft_end_date = $("#draft_end_date").val();
            const attachment_type = $("#select_attachment_draft").val();
            const subject = $("#draft_email_search").val();

            // Set URL for AJAX request
            let current_url = url ? url : `{{ route('email.draft') }}?per_item=${perItem}`;

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { 
                    query: query,
                    draft_start_date: draft_start_date,
                    draft_end_date: draft_end_date,
                    attachment_type: attachment_type,
                    subject: subject,
                },
                success: function(response) {
                    const {
                        data, 
                        links, 
                        total, 
                        months, 
                        years, 
                        total_draft_emails,
                        user_email_delete_permissions,
                        total_draft,
                    } = response;

                    $("#draft_data_table").html(table_rows(data, user_email_delete_permissions));
                    // Handle pagination and other UI updates if necessary
                    $("#draft_email_data_table_paginate").html(paginate_html({ 
                        links, 
                        total,
                        months, 
                        years, 
                    }));
                    // Total Draft Emails
                    $("#total_draft_email").text(total);
                    // Draft Progress
                    $("#draft_emails_progress").text(formatNumber(total_draft_emails));
                    // Total Draft Emails
                    $("#emailDrafts").text(formatNumber(total_draft));
                    // Update current month element with the new data
                    $("#draft_email_month").text(months.length > 0 ? months.join(', ') : '');

                    $('[data-bs-toggle="tooltip"]').tooltip();

                    const userMail = data.map(item => ({
                        label: `${item.subject}`,
                        value: item.subject,
                    }));
                    $("#draft_email_search").autocomplete({ source: userMail });
                },
                error: function(error) {
                    console.log('Error fetching data:', error);
                }
            });
        }
        // Per item change
        $("#perItemDraftEmail").on('change', (e) => {
            const { value } = e.target;
            fetch_draft_email('', null, value);
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
        $("#draft_email_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_draft_email('', url);
            }

        });

        // Live Search
        $("#draft_email_search").on('keyup', function(){
            var query = $(this).val();
            fetch_draft_email(query); 
        });

        // Attach File and Email Filter
        $("#draft_start_date, #draft_end_date, #select_attachment_draft").on('change', ()=>{
            fetch_draft_email(); 
        });

        // Refresh Button
        $(document).on('click', '#refreshDraftBtn', function(){
            $(this).tooltip('hide');
            $("#select_attachment_draft").val("");
            $("#draft_email_search").val("");
            $("#allSelectionDraft").prop('checked', false);
            $('.show-delete-btn').addClass('delete-btn-display');
            fetch_draft_email();
            addAttributeOrClass([
               {selector: '.refresh_rotate_icon', type: 'class', name: 'fa-spin'} 
            ]);
            // Remove fa-spin
            let timeOut = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.refresh_rotate_icon', type: 'class', name: 'fa-spin'} 
                ]);
            }, 1000);

            return () => {
                clearTimeout(timeOut);
            };
        });

        // view button Click and Parent Row Handle
        $(document).on('click', '.draft_view', function(){
            var parentId = $(this).data('parent');
            $(this).tooltip('hide');
            $(`.child-draft-row[data-child='${parentId}']`).toggle('slow').delay(300);

        });

        // send email forward
        $(document).on('click', '#draftForwardBtn', function(e){
            e.preventDefault();
            $(this).tooltip('hide');
            var id = $(this).val();
            if(id){
                $("#moreBtn").removeAttr('disabled');
                $("#decrementBtn").removeAttr('disabled');
                $("#email_attachment").removeClass('hidden');
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
                                            <input type="hidden" class="form-control form-control-sm attachment email_attachment" name="email_attachments[]" value="${fileName}" id="email_attachment" />
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

        // email delete
        $(document).on('click', '.draft_delete_btn, .delete_drft_btn', function(e){
            e.preventDefault();
            $(this).tooltip('hide');
            // Check if any checkboxes are selected
            let selectedEmails = [];
            $("#selectCheckBtn:checked").each(function() {
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
                    fetch_draft_email();
                }
            });
        });

        // Update "Select All" checkbox based on individual selections
        $(document).on('click', '#selectCheckBtn', function() {
            const isChecked = $(this).is(':checked');
            $(this).tooltip('hide');
            
            // Toggle row background based on checkbox state
            if (isChecked) {
                $(this).closest('.table-row').addClass('table-row-select-bg');
                $('.show-delete-btn').closest('.delete_show_button').removeClass('delete-btn-display');
            } else {
                $(this).closest('.table-row').removeClass('table-row-select-bg');
            }
            // Update the "Select All" checkbox based on individual selections
            const allChecked = $('.form-check-input[id="selectCheckBtn"]').length === $('.form-check-input[id="selectCheckBtn"]:checked').length;
            $('#allSelectionDraft').prop('checked', allChecked);
        });

        // Select All Table Rows and Checkboxes
        $(document).on('click', '#allSelectionDraft', function() {
            $(this).tooltip('hide');
            const isChecked = $(this).is(':checked');
            $('.selectCheckBtn').prop('checked', isChecked);
            // Toggle background for all rows based on "Select All" checkbox state
            if (isChecked) {
                $('.select-draft-row-background').addClass('table-row-select-bg');
                // Show delete button
                $('.show-delete-btn').removeClass('delete-btn-display');
            } else {
                $('.select-draft-row-background').removeClass('table-row-select-bg');
                // Hide delete button
                $('.show-delete-btn').addClass('delete-btn-display');
            }
        });

        // From Dropdown Table All Rows Select selectButton 
        $(document).on('click', '#selectDraftButton', function(event){
            // Set all checkboxes to checked
            $('.selectCheckBtn').prop('checked', true);
            // Add background to all selected rows
            $('.select-draft-row-background').addClass('table-row-select-bg');
            // Show delete button
            $('.show-delete-btn').removeClass('delete-btn-display');
            // Prevent default link behavior
            event.preventDefault();

        });

        // From Dropdown Table All Rows Unselect noneButton 
        $(document).on('click', '#noneBtn', function(event){
             // Set all checkboxes to checked
            $('.selectCheckBtn').prop('checked', false);
            // Add background to all selected rows
            $('.select-draft-row-background').removeClass('table-row-select-bg');
            // Show delete button
            $('.show-delete-btn').addClass('delete-btn-display');
            // Prevent default link behavior
            event.preventDefault();

        });
        
    });
</script>