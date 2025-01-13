<script type="module">
    import { getTimeDifference, formatDate , mySrcFunction, activeTableRow} from "/module/module-min-js/helper-function-min.js";
    import { handleImageUpload, addAttributeOrClass, removeAttributeOrClass, handleSuccessMessage } from "/module/module-min-js/design-helper-function-min.js";
    $(document).ready(function() {
        // ACtive table row background
        $(document).on('click', 'tr.table-row', function(){
            activeTableRow(this);
        });
        // show or hide users table search bar
        $("#search").hide();
        $(document).on('click', '#search_area', function() {
            $("#search_on").toggle('slow');
            $("#search").toggle('slid');
            $("#search").focus();
            // switch on/off----- off/on label show
            mySrcFunction();
        });

        fetch_users_setting_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            User Account Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                let statusClass, statusColor, statusText, statusBg, verifyText, statusSignal, statusTextColor, statusSinge;
                if(row.status == 1){
                    statusClass = 'text-white';
                    statusTextColor = 'text-danger';
                    statusText = '<span style="font-weight:700;font-size: 12px;">Unauthorize</span>';
                    statusSinge = '<i class="fa-solid fa-xmark"></i>';
                    statusColor = 'color:black;background-color: #fff;';
                    statusBg = 'badge rounded-pill bg-danger';
                    statusSignal = `<span class="fbox"><input id="light_focus" type="text" class="light5-focus" readonly></input></span>`;
                }
                else if(row.status == 0){
                    statusClass = 'text-white';
                    statusTextColor = 'text-primary';
                    statusText = '<span style="font-weight:700;font-size: 12px;">Authorize</span>';
                    statusSinge = '<i class="fa-solid fa-check"></i>';
                    statusColor = 'color:black;background-color: #fff;';
                    statusBg = 'badge rounded-pill bg-success';
                    statusSignal = `<span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>`;
                }
                return `
                    <tr class="table-row user-table-row user_setting" key="${key}">
                        <td class="sn border_ord bold">${row.id}</td>
                        <td class="tot_order_ center ps-1">
                            <img class="user_img rounded-circle user_imgs" src="${row.image.includes('https://')?row.image: '/storage/image/user-image/'+ row.image}">
                        </td>
                        <td class="txt_ ps-1 center">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-2" id="viewBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-regular fa-eye fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm delete_button ms-2 delt_button" value="${row.id}'" type="button" id="dltBtn" style="font-size: 10px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                                <span class="action-box-arrow mini"></span>
                            </ul>
                        </td>
                        <td class="txt_ bold ps-1">${row.name}</td>
                        <td class="tot_order_ bold ps-1">
                            ${statusSignal}
                            <span style="color:gray"><i class="fa fa-envelope"></i></span>
                            ${row.email}
                        </td>
                        <td class="tot_pending_ bold ps-1">${row.contract_number}</td>
                        <td class="tot_pending_ bold ps-1 ${row.role? ' text-dark': ' text-dark'}">${row.role ==0 ? 'User': 'Superadmin' && row.role ==2 ? 'SubAdmin': 'User' && row.role ==1 ? 'SuperAdmin': 'User' && row.role ==3 ? 'Admin': 'User' && row.role ==5 ? 'Accounts': 'User' && row.role ==6 ? 'Marketing': 'User' && row.role ==7 ? 'Delivery Team': 'User'}</td>
                        <td class="tot_complete_ center ps-1">
                            <input class="form-switch form-check-input check_permission" type="checkbox" user_id="${row.id}" value="${row.status}" ${row.status? " checked": ''} ${row.email_verified_at === null ? 'disabled' : ''}>
                        </td>
                        <td class="tot_complete_ pill ps-1">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${statusBg} ${statusClass}">${statusSinge}</span>
                            <span class=" ${statusTextColor}">${statusText}</span>
                        </td>
                        
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Users Data ------------------
        function fetch_users_setting_data(
            query = '', 
            url = null, 
            perItem = null,
            sortFieldID = 'id',
            sortFieldImage = 'image',
            sortFieldName = 'name',
            sortFieldEmail = 'email',
            sortFieldContractNumber = 'contract_number',
            sortFieldRole = 'role',
            sortFieldStatus = 'status',
            sortFieldDirection = 'desc',

        ){

            if(perItem === null){
                perItem = $("#perItemControl").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search_users.action')}}?per_item=${perItem}`;
            }else{
                current_url += `&per_item=${perItem}`
            }

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query,
                    sort_field_id : sortFieldID,
                    sort_field_image : sortFieldImage,
                    sort_field_name : sortFieldName,
                    sort_field_email : sortFieldEmail,
                    sort_field_contract_number : sortFieldContractNumber,
                    sort_field_role : sortFieldRole,
                    sort_field_status : sortFieldStatus,
                    sort_field_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total
                    
                }) {
                    $("#user_data_table").html(table_rows([...data]));
                    $("#user_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_user_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                   // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        var userImage = `<img class="user_img rounded-circle user_imgs" src="${item.image.includes('https://') ? item.image : '/image/' + item.image}">`;
                        return {
                            label: `ID : ${item.id} - ${userImage} - ${item.roles.name} - ${item.email}`,
                            value: item.email
                        };
                    });

                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions,
                        open: function(event, ui) {
                            $(".ui-menu-item-wrapper").each(function(index, element) {
                                var html = $(element).html();
                                $(element).html(html.replace(/&lt;img/g, '<img').replace(/&gt;/g, '>'));
                            });
                        }
                    });
                }
                
            });
        }

        // Event Listener for sorting columns
        $(document).on('click', '#th_sort', function(){
            var button = $(this);
            // Get the column and current order
            var column = button.data('column');
            var order = button.data('order');
            // Toggle the order (asc/desc)
            order = order === 'desc' ? 'asc' : 'desc';
            button.data('order', order);
            fetch_users_setting_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'image' ? column : 'image',
                column === 'name' ? column : 'name',
                column === 'email' ? column : 'email',
                column === 'contract_number' ? column : 'contract_number',
                column === 'role' ? column : 'role',
                column === 'status' ? column : 'status',
                order
            );
            // Reset all icons in the table headers first - icon part
            $("#th_sort").find('.toggle-icon').html('<i class="fa-solid fa-arrow-down-long"></i>');
            var icon = button.find('.toggle-icon');
            if(order === 'desc'){
                icon.html('<i class="fa-solid fa-arrow-up-long"></i>');
                $(".toggle-icon").fadeIn(300);
            }else{
                icon.html('<i class="fa-solid fa-arrow-down-long"></i>');
                $(".toggle-icon").fadeIn(300);
            }

        });

        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {value} = e.target;

            fetch_users_setting_data( '',  null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_users_setting_data(query); 

        });
        // Search-loader
        $(document).on('keyup', '.searchform', function(){
            var time = null;
            addAttributeOrClass([
               {selector: '#user_data_table', type: 'class', name: 'skeleton'} 
            ]);
            // Remove skeleton
            var timeOut = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '#user_data_table', type: 'class', name: 'skeleton'} 
                ]);
            }, 1000);

            return () => {
                clearTimeout(timeOut);
            };
        });
        
        // Paginate Page-------------------------------
        const paginate_html = ({
            links,
            total
        }) => {
            if (total == 0) {
                return "";
            }

            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination">
                        ${links.map((link, key) => {
                            return `
                                <li class="page-item${link.active? ' active': ''}" key=${key}>
                                    <a class="page-link btn_page" href="${link.url? link.url: '#'}">
                                        ${link.label}
                                    </a>
                                </li>
                            `;
                        }).join("\n")}
                    </ul>
                </nav>
            `;
        }
        // change paginate page------------------------
        $("#user_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_users_setting_data('', url);
            }

        });
        
        // Edit Users-------------------------
        $(document).on('click', '.edit_btn', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // Reset progress bar and image
            $(".register_img").removeClass('img-hidden');
            $('.bar').css('width', '0%');
            $('.percent').text('0%');

            $.ajax({
                type: "GET",
                url: "/edit-users/" + user_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            $('#edit_user_form').modal('show').fadeIn(300).delay(300);
                            $('#edit_user_id').val(user_id);
                            $('#edit_user_name').val(response.data.name);
                            $('#edit_user_email').val(response.data.email);
                            $('#edit_user_contract').val(response.data.contract_number);
                            $("#image_view").attr('src', `/storage/image/user-image/${response.data.image}` );
    
                            // Remove Error
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList2').html("");
                            $('#updateForm_errorList3').html("");
    
                            if(response.data.name !== '' && response.data.email !== '' && response.data.contract_number !== '' && response.data.image !== ''){
                                // Handle name validation
                                $('.update_user').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                                $('.update_email').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                                $('.update_contract').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                                $('#usrName').html('<i class="fa-solid fa-check"></i>');
                                $('#usrEmail').html('<i class="fa-solid fa-check"></i>');
                                $('#usrContract').html('<i class="fa-solid fa-check"></i>');
                                $('#usrImage').html('<i class="fa-solid fa-check"></i>');
                            }else{
                                // Handle name validation
                                $('.update_user').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                                $('.update_email').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                                $('.update_contract').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                                $('#usrName').html("");
                                $('#usrEmail').html("");
                                $('#usrContract').html("");
                                $('#usrImage').html("");
                            }
                        }, 1500);
                        
                    }

                }

            });
        });

        // Edit Users Page skeleton
        $(document).on('click', '.edit_btn', function(){
            var time = null;
            addAttributeOrClass([
                {selector: '.head_title, .cols_btn, #edit_user_id, .dvsecond, #imgInput', type: 'class', name: 'skeleton'},
                {selector: '#userUpdate, #editusr9, #uploadButton', type: 'class', name: 'edit-skeleton'},
                {selector: '#editusr, #editusr6, #editusr7, #editusr8, #editusr10', type: 'class', name: 'capsule-skeletone'}
            ]);
            time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.head_title, .cols_btn, #edit_user_id, .dvsecond, #imgInput', type: 'class', name: 'skeleton'},
                    {selector: '#userUpdate, #editusr9, #uploadButton', type: 'class', name: 'edit-skeleton'},
                    {selector: '#editusr, #editusr6, #editusr7, #editusr8, #editusr10', type: 'class', name: 'capsule-skeletone'}
                ]);
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
        // Function to get role name
        function getRoleName(role) {
            switch (role) {
                case 0:
                    return 'User';
                case 1:
                    return 'SuperAdmin';
                case 2:
                    return 'SubAdmin';
                case 3:
                    return 'Admin';
                case 5:
                    return 'Accounts';
                case 6:
                    return 'Marketing';
                case 7:
                    return 'Delivery Team';
                default:
                    return 'User';
            }
        }
        // View Users-------------------------
        $(document).on('click', '.view_btn', function(e) {
            e.preventDefault();
            var user_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "/show-users/" + user_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $("#accessconfirmbranch").modal('show');
                        $("#loadingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#loadingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $('#view_user_form').modal('show').fadeIn(300).delay(300);
                            $('#view_user_id').val(user_id);
                            $('#view_user_role').val(getRoleName(response.data.role)); 
                            $('#view_user_name').val(response.data.name);
                            $('#view_user_email').val(response.data.email);
                            // email verification result
                            if (response.data.email_verified_at === null) {
                                $('#view_user_email_verified').html('<span class="bg-danger badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;">No verified</span>');
                                $('#user_email_verified_session').html('<span style="color:orangered;font-size:14px;font-weight:700;"> - </span>');
                            } else {
                                $('#view_user_email_verified').html('<span class="bg-success badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;">Verified</span>');
                                // Displaying the calculated time difference
                                const emailVerifiedSession = getTimeDifference(response.data.email_verified_at);
                                $('#user_email_verified_session').html('<span style="color:blue;font-size:10px;font-weight:700;">'+ emailVerifiedSession +'</span>');
                            }
                            $('#view_user_contract').val(response.data.contract_number);
                            // email verification date if it exists
                            if (response.data.email_verified_at) {
                                $('#view_user_email_verified_at').text(formatDate(response.data.email_verified_at));
                            } else {
                                $('#view_user_email_verified_at').text(' Null - - - - -');
                            }
                            $('#view_user_created_at').text(formatDate(response.data.created_at));
                            $('#view_user_updated_at').text(formatDate(response.data.updated_at));
                            $("#image_show").attr('src', `/storage/image/user-image/${response.data.image}`);
    
                            // Determine status properties
                            let statusClass, statusColor, statusText, statusBg;
                            if (response.data.status == 1) {
                                statusClass = 'text-white';
                                statusText = '<span class="badge rounded-pill bg-danger"><i class="fa-solid fa-xmark"></i> Unauthorize</span>';
                                statusColor = 'font-weight:600;font-size:14px;letter-spacing: 1px;';
                                statusBg = 'badge rounded-pill';
                            } else if (response.data.status == 0) {
                                statusClass = 'text-white';
                                statusText = '<span class="badge rounded-pill bg-success"><i class="fa-solid fa-check"></i> Authorize</span>';
                                statusColor = 'font-weight:600;font-size:14px;letter-spacing: 1px;';
                                statusBg = 'badge rounded-pill';
                            }
                            $('#view_user_status')
                                .attr('class', statusClass)
                                .attr('style', statusColor)
                                .html(statusText);
                        }, 1500);
                    }
                }

            });
        });
        $(document).on('click', '#viewBtn', function(e){
            e.preventDefault();
            var time = null;
            addAttributeOrClass([
                {selector: '.head_modal, .cols_btn', type: 'class', name: 'skeletone'},
                {selector: '.field_skeletone_one, .field_skeletone_two, .field_skeletone_three, .field_skeletone_four', type: 'class', name: 'capsule-skeletone'},
                {selector: '.field_skeletone_five', type: 'class', name: 'sub-skeletone'},
                {selector: '.email__verification', type: 'class', name: 'small-capsule-skeletone'},
                {selector: '.image_skeletone', type: 'class', name: 'image-skeletone'},
                {selector: '#user_email_verified_session', type: 'attribute', name: 'hidden', value: true}
            ]);

            time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.head_modal, .cols_btn', type: 'class', name: 'skeletone'},
                    {selector: '.field_skeletone_one, .field_skeletone_two, .field_skeletone_three, .field_skeletone_four', type: 'class', name: 'capsule-skeletone'},
                    {selector: '.field_skeletone_five', type: 'class', name: 'sub-skeletone'},
                    {selector: '.email__verification', type: 'class', name: 'small-capsule-skeletone'},
                    {selector: '.image_skeletone', type: 'class', name: 'image-skeletone'},
                    {selector: '#user_email_verified_session', type: 'attribute', name: 'hidden'}
                ]);
            }, 1000);
            
            return ()=>{
                clearTimeout(time);
            }
        });
        // Update Users Confirm Modal-------------------------
        $(document).on('click', '.update_btn_confrm', function(e){
            e.preventDefault();
            $('#updateconfirmuser').modal('show').fadeIn(300).delay(300);

            var time = null;
            addAttributeOrClass([
                {selector: '.update_title, .head_btn3, #cate_confirm_update', type: 'class', name: 'skeleton'},
                {selector: '#update_btn_confirm, #cate_delete5, #cate_confirm_updat', type: 'class', name: 'edit-skeleton'}
            ]);
            time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '.update_title, .head_btn3, #cate_confirm_update', type: 'class', name: 'skeleton'},
                    {selector: '#update_btn_confirm, #cate_delete5, #cate_confirm_updat', type: 'class', name: 'edit-skeleton'}
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        // Update Users-------------------------
        $('.update_btn').on('click', function(e) {
            e.preventDefault();
            var id = $('#edit_user_id').val();

            var formData = new FormData();
            formData.append('image', $('.edit_image')[0].files[0]);
            formData.append('name', $('.update_user').val());
            formData.append('email',  $('.update_email').val());
            formData.append('contract_number', $('.update_contract').val());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/update-users/" + id,
                data: formData,
                processData: false, 
                contentType: false, 
                success: function(response) {
                    if (response.status == 400) {
                        $('#updateForm_errorList').html("");
                        $('#updateForm_errorList2').html("");
                        $('#updateForm_errorList3').html("");

                        $.each(response.errors, function(key, err_value) {
                            if (key === 'name') {
                                $('#updateForm_errorList').html('<span class="text-danger" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $('.update_user').removeClass('show-success-border show-current-light-blue-border').addClass('is-invalid');
                                $('#usrName').html("");
                            } else if (key === 'email') {
                                $('#updateForm_errorList2').html('<span class="text-danger" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $('.update_email').removeClass('show-success-border show-current-light-blue-border').addClass('is-invalid');
                                $('#usrEmail').html("");
                            } else if (key === 'contract_number') {
                                $('#updateForm_errorList3').html('<span class="text-danger" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $('.update_contract').removeClass('show-success-border show-current-light-blue-border').addClass('is-invalid');
                                $('#usrContract').html("");
                            }
                        });
                        
                        $('#updateconfirmuser').modal('hide').fadeOut(300).delay(300);
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').text(response.messages);
                        handleSuccessMessage('#success_message');
                        $('#updateconfirmuser').modal('hide');
                    } else if(response.status == 200){
                        $('#edit_user_form').modal('hide').fadeOut(300).delay(300);
                        $('#updateconfirmuser').modal('hide').fadeOut(300).delay(300);
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList2').html("");
                            $('#updateForm_errorList3').html("");
                            $('#success_message').addClass('background_error');
                            $('#success_message').text(response.messages);
                            handleSuccessMessage('#success_message');
                            fetch_users_setting_data();
                        }, 1500);
                    }
                }
            });

        });
        // Delete Users Modal-------------------------
        $(document).on('click', '.delete_button', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('#user_id').val(user_id);
            $("#accessconfirmbranch").modal('show');
            $("#pageLoader").removeAttr('hidden');
            $("#access_modal_box").addClass('loader_area');
            $("#processModal_body").removeClass('loading_body_area');
            setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#pageLoader").attr('hidden', true);
                $("#access_modal_box").removeClass('loader_area');
                $("#processModal_body").addClass('loading_body_area');
                $('#deletecategory').modal('show').fadeIn(300).delay(300);
                var time = null;
                addAttributeOrClass([
                    {selector: '.head_title, .clos_btn,#usrdelt, #usrdelt2, #usrdelt3, #usrdelt5', type: 'class', name: 'skeleton'},
                    {selector: '#yesButton, #noButton', type: 'class', name: 'delete-skeletone'}
                ]);
                time = setTimeout(() => {
                    removeAttributeOrClass([
                        {selector: '.head_title, .clos_btn,#usrdelt, #usrdelt2, #usrdelt3, #usrdelt5', type: 'class', name: 'skeleton'},
                        {selector: '#yesButton, #noButton', type: 'class', name: 'delete-skeletone'}
                    ]);
    
                }, 1000);
            }, 1500);

        });
        // Confirm Delete Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $('#deleteuser').modal('show').fadeIn(300).delay(300);
            addAttributeOrClass([
                {selector: '#supp_delt3, #cate_confirm, .clos_btn2, .head_btn2', type: 'class', name: 'skeleton'},
                {selector: '#usrdelt4, #deleteLoader', type: 'class', name: 'edit-skeleton'}
            ]);
            var time = null;
            time = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '#supp_delt3, #cate_confirm, .clos_btn2, .head_btn2', type: 'class', name: 'skeleton'},
                    {selector: '#usrdelt4, #deleteLoader', type: 'class', name: 'edit-skeleton'}
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var user_id = $('#user_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-users/" + user_id,
                success: function(response) {
                    $("#accessconfirmbranch").modal('show');
                    $("#pageLoader").removeAttr('hidden');
                    $("#access_modal_box").addClass('loader_area');
                    $("#processModal_body").removeClass('loading_body_area');
                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#pageLoader").attr('hidden', true);
                        $("#access_modal_box").removeClass('loader_area');
                        $("#processModal_body").addClass('loading_body_area');
                        //$('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#deletecategory').modal('hide').fadeOut(300).delay(300);
                        $('#deleteuser').modal('hide').fadeOut(300).delay(300);
                        $('#success_message').addClass('background_error');
                        $('#success_message').text(response.messages);
                        handleSuccessMessage('#success_message');
                        fetch_users_setting_data();
                    }, 1500);
                }

            });
        });
        // Update-Status ------------------
        $("#user_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('update_status.action')}}";

            const pagination_url = $("#user_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('user_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    $("#accessconfirmbranch").modal('show');
                    $("#processingProgress").removeAttr('hidden');
                    $("#access_modal_box").addClass('progress_body');
                    $("#processModal_body").addClass('loading_body_area');
                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#processingProgress").attr('hidden', true);
                        $("#access_modal_box").removeClass('progress_body');
                        $("#processModal_body").removeClass('loading_body_area');
                        //console.log('messages', messages);
                        $("#success_message").text(messages);
                        $('#success_message').addClass('background_error');
                        handleSuccessMessage('#success_message');
                        fetch_users_setting_data('', pagination_url);
                    }, 1500);
                }
            });
        });

        // User name input field handle
        $(document).on('keyup', '#edit_user_name', function(){
            var nameField = $(this).val();
            $('#updateForm_errorList').html("");
            // $('#updateForm_errorList2').html("");
            // $('#updateForm_errorList3').html("");
            if(nameField !== ''){
                $('.update_user').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                $('#usrName').html('<i class="fa-solid fa-check"></i>').fadeIn(300).delay(300);
            }else{
                $('.update_user').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                $('#usrName').html("").fadeOut(300).delay(300);
            }
            
        });
        // User email input field handle
        $(document).on('keyup', '#edit_user_email', function(){
            var emailField = $(this).val();
            $('#updateForm_errorList2').html("");
            if(emailField !== ''){
                $('.update_email').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                $('#usrEmail').html('<i class="fa-solid fa-check"></i>').fadeIn(300).delay(300);
            }else{
                $('.update_email').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                $('#usrEmail').html("").fadeOut(300).delay(300);
            }
            
        });
        // User contract input field handle
        $(document).on('keyup', '#edit_user_contract', function(){
            var contractField = $(this).val();
            $('#updateForm_errorList3').html("");
            if(contractField !== ''){
                $('.update_contract').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                $('#usrContract').html('<i class="fa-solid fa-check"></i>').fadeIn(300).delay(300);
            }else{
                $('.update_contract').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                $('#usrContract').html("").fadeOut(300).delay(300);
            }
            
        });

        // update avatar
        $("#image_view").on('click', function(e){
            e.preventDefault();
            //$(".edit_image").click();
            //$("#fileModal").modal('show').fadeIn(600).delay(600);
        });
        // put and upload avatar/image
        $(".edit_image").on('change', function(event){
            //$("#fileModal").modal('show').fadeIn(300).delay(300);
            if (event.target.files && event.target.files[0]) {
                const tempurl = URL.createObjectURL(event.target.files[0]);

                $("#image_view").attr('src', tempurl);
                // Reset progress bar
                $('.bar').css('width', '0%');
                $('.percent').text('0%');
                $(".register_img").addClass('img-hidden');
                // Remove alert mesg
                $("#uploadMess").html("");
            }
        });
        // Handle file upload click and progress bar display
        $(document).on('click', '#uploadButton', function () {
            handleImageUpload();
        });
        $(document).load('click', function(){
            $("#loader_userdelete").addClass('loader_chart');
        });
    });
</script>