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
        // Get Current Date and set it for start_date and end_date fields
        const startDateField = document.getElementById('send_start_date');
        const endDateField = document.getElementById('send_end_date');

        if (startDateField) {
            startDateField.value = currentDate();
        }
        if (endDateField) {
            endDateField.value = currentDate();
        }

        // Fetch data when the document is ready
        fetch_send_email(); 
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
                    <tr class="table-row user-table-row parent-row select-row-background" key="${key}">
                        <td class="line-height-td child-td" style="text-align:left;color:#000000;" id="treeRow">
                            <button class="btn-sm edit_registration view_btn cgr_btn ms-1" id="checkBtn" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Select" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <input class="form-check-input selectBtn" type="checkbox" value="${row.id}" id="selectBtn" style="font-size:13px;margin-top: -1px;">
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-1" data-parent="${row.id}" id="viewBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-regular fa-eye fa-beat" style="margin-top: 1px;"></i>
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-1" data-parent="${row.id}" id="sendForwardBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <i class="fa-solid fa-share-nodes fa-beat" style="margin-top: 1px;"></i>
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn ms-1" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                                <i class="fa-solid fa-trash-can fa-beat"></i>
                            </button>
                            <span class="child-td1 ps-1">To : ${fromEmail ? fromEmail : row.user_to}</span>
                            <span class="child-td1 ps-1">${formatDate(row.created_at)}</span>
                        </td>
                        <td class="child-td1 ps-1" id="lastTd">
                            <span style="font-weight:700;">Subject :</span> ${row.subject}
                            <span style="color:#007bff;font-size:10px;font-weight: 600;">${getTimeDifference(row.created_at)} ago</span>
                        </td>
                        <td class="child-td1 ps-1" id="readMal" value="${row.read_mail}" hidden>${row.read_mail}</td>
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
        function fetch_send_email(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemSendEmail").val();
            }

            // Get filter values
            const send_start_date = $("#send_start_date").val();
            const send_end_date = $("#send_end_date").val();
            const attachment_type = $("#select_attachment_email").val();
            const status = $("#select_status_email").val();
            const user_to = $("#send_email_search").val();

            // Set URL for AJAX request
            let current_url = url ? url : `{{ route('email.send_list') }}?per_item=${perItem}`;

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { 
                    query: query,
                    send_start_date: send_start_date,
                    send_end_date: send_end_date,
                    attachment_type: attachment_type,
                    user_to: user_to,
                    status: status,
                },
                success: function(response) {
                    const {
                        data, 
                        links, 
                        total, 
                        months, 
                        years, 
                        total_send_emails,
                    } = response;

                    $("#send_data_table").html(table_rows(data));
                    // Handle pagination and other UI updates if necessary
                    $("#send_email_data_table_paginate").html(paginate_html({ 
                        links, 
                        total,
                        months, 
                        years, 
                    }));
                    // Total Send Emails
                    $("#total_user_send_email").text(total);
                    // Modal Header Send
                    $("#send_emails").text(formatNumber(total_send_emails));
                    $("#send_emails_progress").text(formatNumber(total_send_emails));
                    // Update current month element with the new data
                    $("#send_email_month").text(months.length > 0 ? months.join(', ') : '');

                    $('[data-bs-toggle="tooltip"]').tooltip();

                    const userMail = data.map(item => ({
                        label: `${item.user_to}`,
                        value: item.user_to,
                    }));
                    $("#send_email_search").autocomplete({ source: userMail });
                },
                error: function(error) {
                    console.log('Error fetching data:', error);
                }
            });
        }
        // Per item change
        $("#perItemSendEmail").on('change', (e) => {
            const { value } = e.target;
            fetch_send_email('', null, value);
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
        $("#send_email_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_send_email('', url);
            }

        });

        // Live Search
        $("#send_email_search").on('keyup', function(){
            var query = $(this).val();
            fetch_send_email(query); 
        });

        // Attach File and Email Filter
        $("#send_start_date, #send_end_date, #select_attachment_email,#select_status_email").on('change', ()=>{
            fetch_send_email(); 
        });

        // Refresh Button
        $(document).on('click', '#refreshDataBtn', function(){
            $(this).tooltip('hide');
            $("#select_attachment_email").val("");
            $("#select_status_email").val("");
            $("#send_email_search").val("");
            $("#allSelection").prop('checked', false);
            $('.show-btn').addClass('delete-btn-display');
            fetch_send_email();
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

        // send email forward
        $(document).on('click', '#sendForwardBtn', function(e){
            e.preventDefault();
            $(this).tooltip('hide');
            var id = $(this).val();
            if(id){
                $("#moreBtn").removeAttr('disabled');
                $("#decrementBtn").removeAttr('disabled');
                $("#email_attachment").removeClass('hidden');
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
                        $("#selectAttachFile").val(response.messages.attachment_type);

                        // Display attachment names in a separate div
                        let attachmentPreview = $("#attachmentPreview");
                        attachmentPreview.empty();

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
        
    });
</script>