<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module">
    import { currentDate, getTimeDifference, activeTableRow, formatDate } from "/module/module-min-js/helper-function-min.js";
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    const companyName = @json(setting('company_name'));
    const companyAddress = @json(setting('company_address'));
    const companyLogo = "{{ asset('backend_asset/main_asset/img/' . setting('update_company_logo')) }}";
    const pageLoader = "{{asset('image/loader/loading.gif')}}";
    
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
                                <input class="form-check-input selectBtn" type="checkbox" value="${row.id}" id="selectBtn" style="font-size:13px;margin-top: -1px;">
                            </button>
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-1" data-parent="${row.id}" id="viewBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
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

        // Attach File and Email Filter
        $("#start_date, #end_date, #select_attachment,#select_status").on('change', ()=>{
            
            // $("#loaderShow").removeClass('error-hidden');
            // $(".inventory_permission_data_table").addClass('error-hidden'); 
            
            // setTimeout(() => {
            //     $(".inventory_permission_data_table").removeClass('error-hidden'); 
            //     $("#loaderShow").addClass('error-hidden');
            // }, 500);
            fetch_all_user_email(); 
        });
        // Read Mail Filter
        // $(document).on('click', '#readButton', function(){
        //     var readMail = $(this).val();
        //     fetch_all_user_email(); 
        // });
        $("#email_search").on('keyup', function(){
            var query = $(this).val();
            fetch_all_user_email(query); 
        });

        // view button Click and Parent Row Handle
        $(document).on('click', '#viewBtn', function(){
            var parentId = $(this).data('parent');
            $(`.child-row[data-child='${parentId}']`).toggle('slow').delay(300);
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
<script type="module">
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    $(document).ready(function(){
        // Email Search modal
        $(document).on('click', '#email_search_page', function(e){
            e.preventDefault();
            $("#emailSearchModal").modal('show').fadeIn(300).delay(300);
            $("#loader_email_modal").modal('show').fadeIn(300).delay(300);

            addAttributeOrClass([
                {selector: '.selection,.clos_btn2 ,.group_btn,.current_month,.input1,.input2,.input3,.input4,.input5,.custom-select,#user_email_get_data_table_paginate', type: 'class', name: 'text-skeletone'},
                {selector: '.next_btn', type: 'class', name: 'skeletone'},
                {selector: '#email_data_table', type: 'class', name: 'tabskeletone'},
                {selector: '.tot_summ', type: 'class', name: 'email-skeletone'},
                {selector: '#cate_delete5', type: 'class', name: 'btn-skeletone'},
            ]);

            var time = null;
            time = setTimeout(() => {
                $("#loader_email_modal").modal('hide');
                removeAttributeOrClass([
                    {selector: '.selection,.clos_btn2 ,.group_btn,.current_month,.input1,.input2,.input3,.input4,.input5,.custom-select,#user_email_get_data_table_paginate', type: 'class', name: 'text-skeletone'},
                    {selector: '.next_btn', type: 'class', name: 'skeletone'},
                    {selector: '#email_data_table', type: 'class', name: 'tabskeletone'},
                    {selector: '.tot_summ', type: 'class', name: 'email-skeletone'},
                    {selector: '#cate_delete5', type: 'class', name: 'btn-skeletone'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // image modal skeletone
        $(document).on('click', '.attachment_file', function(){
            addAttributeOrClass([
                {selector: '.svg__doted', type: 'class', name: 'svg_skeletone'},
                {selector: '#showAttImage', type: 'class', name: 'hidden'},
                {selector: '.img_title, .img_close', type: 'class', name: 'text-skeletone'},
            ]);
            removeAttributeOrClass([
                {selector: '#imgSkeltone', type: 'class', name: 'hidden'},
            ]);
            var time = null;
            time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.svg__doted', type: 'class', name: 'svg_skeletone'},
                    {selector: '#showAttImage', type: 'class', name: 'hidden'},
                    {selector: '.img_title, .img_close', type: 'class', name: 'text-skeletone'},
                ]);
                addAttributeOrClass([
                    {selector: '#imgSkeltone', type: 'class', name: 'hidden'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });
        // file modal skeletone
        $(document).on('click', '#attfile_link_btn', function(){
            addAttributeOrClass([
                {selector: '.attach_header', type: 'class', name: 'text-skeletone'},
                {selector: '.atth_close, .attch_text,.atth_fl,.atth_fl2', type: 'class', name: 'text-skeletone'},
                {selector: '.logo_skeletone', type: 'class', name: 'logo-skeletone'},
                {selector: '.downloadBtn', type: 'class', name: 'link-btn-skeletone'},
            ]);
            var time = null;
            time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.attach_header', type: 'class', name: 'text-skeletone'},
                    {selector: '.atth_close, .attch_text,.atth_fl,.atth_fl2', type: 'class', name: 'text-skeletone'},
                    {selector: '.logo_skeletone', type: 'class', name: 'logo-skeletone'},
                    {selector: '.downloadBtn', type: 'class', name: 'link-btn-skeletone'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // Send Email List modal
        $(document).on('click', '#email_send_page', function(e){
            e.preventDefault();
            $("#emailSendModal").modal('show').fadeIn(300).delay(300);
        });
        // File Directory modal
        $(document).on('click', '#file_directory_page', function(e){
            e.preventDefault();
            $("#fileDirectoryModal").modal('show').fadeIn(300).delay(300);
        });
    });
</script>