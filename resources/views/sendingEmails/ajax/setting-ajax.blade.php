<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader } from "/module/module-min-js/design-helper-function-min.js";


    $(document).ready(function(){
        // Get Current Date and set it for start_date and end_date fields
        const startDateField = document.getElementById('start_setting_date');
        const endDateField = document.getElementById('end_setting_date');

        if (startDateField) {
            startDateField.value = currentDate();
        }
        if (endDateField) {
            endDateField.value = currentDate();
        }
        // Initialize the button loader for the login button
        buttonLoader('#PermissionSubmit', '.submt-icon', '.submt-btn-text', 'Submit...', 'Submit', 1000);
        buttonLoader('#PermissionUpdate', '.updt-icon', '.setting-update-btn-text', 'Setting Update...', 'Setting Update', 1000);
        buttonLoader('#PermissionCancel', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);
        buttonLoader('#update_btn_confirm', '.update-confirm-icon', '.update-confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#confirm_delete_btn', '.elete-confirm-icon', '.delete-confirm-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('#DataGet', '.data-get-icon', '.data-get-btn-text', 'Data...', 'Data Get', 1000);
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if ($(this).attr('id') === 'select_user_role') {
                $(this).select2({
                    placeholder: 'Select User Role',
                    allowClear: true
                });
            } else if ($(this).attr('id') === 'select_user_email') {
                $(this).select2({
                    placeholder: 'Select User Email',
                    allowClear: true
                });
            }

            if ($(this).attr('id') === 'select_roles') {
                $(this).select2({
                    placeholder: 'Select User Role',
                    allowClear: true
                });
            } else if ($(this).attr('id') === 'select_emails') {
                $(this).select2({
                    placeholder: 'Select User Email',
                    allowClear: true
                });
            }
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_user_role').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search roles...');
        });
        $('#select_user_email').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search emails...');
        });
        $('#select_roles').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search roles...');
        });
        $('#select_emails').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search emails...');
        });
        

        // Fetch User Role
        fetch_roles();
        fetch_role();
        fetch_user_permission_email();
        fetch_permission_email();
        
        function fetch_roles() {
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
                    $("#select_user_role").empty();
                    $("#select_user_role").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(roles, function(key, item) {
                        $("#select_user_role").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_user_role").empty();
                    $("#select_user_role").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

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
                    $("#select_roles").empty();
                    $("#select_roles").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(roles, function(key, item) {
                        $("#select_roles").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_roles").empty();
                    $("#select_roles").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // User email handle
        $(document).on('change', '#select_user_role', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_user_email").empty();
                $("#select_user_email").append('<option style="color:white;font-weight:600;" value="" disabled>Select the role</option>');
            }
        });
        // User email handle for search email---Setting Data
        $(document).on('change', '#select_roles', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_emails").empty();
                $("#select_emails").append('<option style="color:white;font-weight:600;" value="" disabled>Select the role</option>');
            }
        });

        // Event listener for role dropdown
        $(document).on('change', '#select_user_role', function() {
            const selectedRole = $(this).val();
            fetch_user_permission_email(selectedRole);
        });
        // Event listener for role dropdown for search email---Setting Data
        $(document).on('change', '#select_roles', function() {
            const selectedRole = $(this).val();
            fetch_permission_email(selectedRole);
        });

        // Function to fetch users based on selected role
        function fetch_user_permission_email(selectedRole) {
            if (!selectedRole) {
                return;
            }

            const currentUrl = "{{ route('user.email', ':selectedRole') }}".replace(':selectedRole', selectedRole);

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
                    const users = response.users;
                    $("#select_user_email").empty();
                    $.each(users, function(key, item) {
                        $("#select_user_email").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.email}</option>`);
                    });
                },
                error: function() {
                    $("#select_user_email").empty();
                    $("#select_user_email").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select the role</option>');
                }
            });
        }
        // Function to fetch users based on selected role for search email---Setting Data
        function fetch_permission_email(selectedRole) {
            if (!selectedRole) {
                return;
            }

            const currentUrl = "{{ route('user.email', ':selectedRole') }}".replace(':selectedRole', selectedRole);

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
                    const users = response.users;
                    $("#select_emails").empty();
                    $.each(users, function(key, item) {
                        $("#select_emails").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.email}</option>`);
                    });
                },
                error: function() {
                    $("#select_emails").empty();
                    $("#select_emails").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select the role</option>');
                }
            });
        }

        // Checkbox checking
        $("#report_status, #message_status, #darft_status, #report_email_forward_sendbox, #report_status_sendbox,#report_email_forward, #message_email_forward, #email_service").on('change', () => {
            var email_service = $("#email_service").is(':checked');
            var report_status = $("#report_status").is(':checked');
            var message_status = $("#message_status").is(':checked');
            var darft_status = $("#darft_status").is(':checked');
            var report_email_forward_sendbox = $("#report_email_forward_sendbox").is(':checked');
            var report_status_sendbox = $("#report_status_sendbox").is(':checked');
            var report_email_forward = $("#report_email_forward").is(':checked');
            var message_email_forward = $("#message_email_forward").is(':checked');

            $("#statusJustify").attr('hidden', true);
            $("#statusDeny").attr('hidden', true);

            if (report_status || message_status || darft_status || report_email_forward || message_email_forward || email_service || report_email_forward_sendbox || report_status_sendbox) {
                $("#statusJustify").removeAttr('hidden');
            } else {
                $("#statusDeny").removeAttr('hidden');
            }

        });

        // Cancel Button
        $(document).on('click', '.permission_calncel', function(){
            
            $(".updt_btn").hide('slow');
            $(".subm_btn").show('slow');
            $("#statusJustify").attr('hidden', true);
            $("#statusDeny").attr('hidden', true);
            $("#savForm_error").empty();
            $("#updateForm_errorList").empty();
            $("#other_status").empty();
            $('.error-message').remove();

            clearFields();
        });
        // Clear Fields
        function clearFields(){
            fetch_roles("");
            $("#select_user_email").empty();
            $("input[name='report_status']").prop('checked', false);
            $("input[name='message_status']").prop('checked', false);
            $("input[name='darft_status']").prop('checked', false);
            $("input[name='other_status']").prop('checked', false);
            $("input[name='email_service']").prop('checked', false);
            $("input[name='report_email_forward']").prop('checked', false);
            $("input[name='message_email_forward']").prop('checked', false);
            $("input[name='report_email_forward_sendbox']").prop('checked', false);
            $("input[name='report_status_sendbox']").prop('checked', false);
        }

        fetch_user_email_delete_permission();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data text-danger" align="center" colspan="12">
                            User Email Setting Permission Not Exists On Server!
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => `
                <tr class="btn-hover table_body table-row user-table-row " key="${key}" id="supp_tab">
                    <td class="ps-1 font table_body">${row.id}</td>
                    <td class="ps-1 font table_body2 eml">${row.roles && row.roles.name ? row.roles.name : 'No Role'}</td>
                    <td class="ps-1 font table_body3 eml">${row.users && row.users.email ? row.users.email : 'No Email'}</td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.email_service ? 'text-dark' : 'text-danger'}">
                            ${row.email_service ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.report_status ? 'text-dark' : 'text-danger'}">
                            ${row.report_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.report_email_forward ? 'text-dark' : 'text-danger'}">
                            ${row.report_email_forward ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.message_status ? 'text-dark' : 'text-danger'}">
                            ${row.message_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.message_email_forward ? 'text-dark' : 'text-danger'}">
                            ${row.message_email_forward ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.report_status_sendbox ? 'text-dark' : 'text-danger'}">
                            ${row.report_status_sendbox ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.report_email_forward_sendbox ? 'text-dark' : 'text-danger'}">
                            ${row.report_email_forward_sendbox ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.darft_status ? 'text-dark' : 'text-danger'}">
                            ${row.darft_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body5" id="supp_tab15">
                        <button type="button" class="editBtn" id="edtBtn" value="${row.id}" style="font-size: 10px; cursor: pointer; height:15px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                            <i class="fa-solid fa-pen-to-square" style="color: blue;"></i>
                        </button>
                        <button type="button" class="deleteBtn ms-1" id="permissionDeleteBtn" value="${row.id}" style="font-size: 10px;float: left; cursor: pointer; height:15px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                            <i class="fa-solid fa-trash-can" style="color: orangered;margin-left: -3px;"></i>
                        </button>
                    </td>
                </tr>
            `).join("");
        };

        // Get Setting Permission Access Data
        function fetch_user_email_delete_permission(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControls").val();
            }

            const user_roles_id = $(".select_roles").val();
            const user_emails_id = $(".select_emails").val();
            const start_setting_date = $("#start_setting_date").val();
            const end_setting_date = $("#end_setting_date").val();

            let current_url = url ? url : `{{ route('email.index') }}?per_item=${perItem}`;

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query,
                    user_roles_id: user_roles_id,
                    user_emails_id: user_emails_id,
                    start_setting_date: start_setting_date,
                    end_setting_date: end_setting_date,
                },
                success: function({
                    data,
                    links,
                    total,
                    user_email_delete_permissions
                    
                }) {
                    $("#delete_permission_data_table").html(table_rows([...data]));
                    $("#delete_email_data_table_paginate").html(paginate_html({ links, total }));
                    $("#total_user_permission_records").text(total);
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Handle user email send access
                    let disableButton = '';
                    let changeButtonDelete = '';

                    // Check if permissions array is valid
                    if (Array.isArray(user_email_delete_permissions) && user_email_delete_permissions.length > 0) {
                        const rowItem = user_email_delete_permissions[0];

                        // Update button state based on email_service value
                        if (rowItem?.email_service === 0) {
                            disableButton = 'disabled';
                            changeButtonDelete = '';
                        } else {
                            disableButton = '';
                            changeButtonDelete = '';
                        }
                    } else {
                        console.log('No permissions available or invalid permissions data.');
                    }

                    $("#forwardSubmit").attr('disabled', disableButton === 'disabled');

                    $("#submit").attr('disabled', disableButton === 'disabled');

                    // Optionally, apply styles if needed
                    $("#forwardSubmit, #submit").attr('style', changeButtonDelete);
                }

            });
        }
        // peritem change
        $("#perItemControls").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_user_email_delete_permission('', null, value);
        });
        // Filter Role
        $(".select_roles").on("change", function(){
            fetch_user_email_delete_permission();
        });
        // Filter Email
        $(".select_emails").on("change", function(){
            fetch_user_email_delete_permission();
        });
        // Setting Data get according to date range
        $("#start_setting_date, #end_setting_date").on('change', ()=>{
            fetch_user_email_delete_permission(); 
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
        $("#delete_email_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_user_email_delete_permission('', url);
            }

        });

        // Email Delete Access Permission Store
        $(document).on('click', '.permission_submit', function(e) {
            e.preventDefault();
            
            // Input Field Validation
            $('.error-message').remove();

            var roleName = $("#select_user_role").val();
            var userEmail = $("#select_user_email").val();
            var reportStatus = $("input[name='report_status']:checked").val();
            var messageStatus = $("input[name='message_status']:checked").val();
            var darftStatus = $("input[name='darft_status']:checked").val();
            var reportEmailForwardSendbox = $("input[name='report_email_forward_sendbox']:checked").val();
            var reportStatusSendbox = $("input[name='report_status_sendbox']:checked").val();
            var emailService = $("input[name='email_service']:checked").val();
            var reportEmailForward = $("input[name='report_email_forward']:checked").val();
            var messageEmailForward = $("input[name='message_email_forward']:checked").val();
            
            if (!roleName) {
                $("#select_user_role").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the role name.</span>');
            }
            if (!userEmail) {
                $("#select_user_email").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the user email.</span>');
            }

            // Check if there are any error messages
            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }

            var data = {
                'user_roles_id': $('#select_user_role').val(),
                'user_emails_id': $('#select_user_email').val(),
                'report_status': reportStatus ? 1 : 0,
                'message_status': messageStatus ? 1 : 0,
                'darft_status': darftStatus ? 0 : 1,
                'email_service': emailService ? 0 : 1,
                'report_email_forward': reportEmailForward ? 1 : 0,
                'message_email_forward': messageEmailForward ? 0 : 1,
                'report_email_forward_sendbox': reportEmailForwardSendbox ? 1 : 0,
                'report_status_sendbox': reportStatusSendbox ? 0 : 1,
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('email.store') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $('#savForm_error').html("");
                        $('#savForm_error').addClass('alert_show_errors');
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').append('<span class="error_val">' + err_value + '</span>');
                        });
                        $('#savForm_error').fadeIn();
                        setTimeout(() => {
                            $('#savForm_error').fadeOut();
                        }, 3000);
                    } else {
                        $('#savForm_error').html("");
                        $('#permission_success_message').html("");
                        $('#permission_success_message').addClass('permission_alert_show ps-1 pe-1');
                        $('#permission_success_message').fadeIn();
                        $('#permission_success_message').text(response.messages);
                        $('#select_user_role').val("");
                        $('#select_user_email').val("");
                        clearFields();
                        $("#statusJustify").attr('hidden', true);
                        $("#statusDeny").attr('hidden', true);
                        $("#permission_success_message").addClass('background_success_sm');
                        setTimeout(() => {
                            $('#permission_success_message').fadeOut();
                        }, 3000);
                    }
                    fetch_user_email_delete_permission();
                }
            });
        });

        // Email Delete Access Permission Edit
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#PermissionSubmit").hide('slow');
            $("#PermissionUpdate").removeAttr('hidden');
            $(".updt_btn").show('slow');
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/email-delete-permission/edit/" + id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#permission_success_message').html("");
                        $('#permission_success_message').addClass('alert alert-danger');
                        $('#permission_success_message').text(response.messages);
                    } else {
                        $('#permission_id').val(id);
                        $('.select_user_role').val(response.messages.user_roles_id).trigger('change.select2');
                        fetch_user_permission_email(response.messages.user_roles_id);
                        setTimeout(() => {
                            $('.select_user_email').val(response.messages.user_emails_id).trigger('change.select2');
                        }, 500);
                        $('#report_status').prop('checked', response.messages.report_status == 1);
                        $('#message_status').prop('checked', response.messages.message_status == 1);
                        $('#darft_status').prop('checked', response.messages.darft_status == 1);
                        $('#email_service').prop('checked', response.messages.email_service == 1);
                        $('#report_email_forward').prop('checked', response.messages.report_email_forward == 1);
                        $('#message_email_forward').prop('checked', response.messages.message_email_forward == 1);
                        $('#report_email_forward_sendbox').prop('checked', response.messages.report_email_forward_sendbox == 1);
                        $('#report_status_sendbox').prop('checked', response.messages.report_status_sendbox == 1);
                        
                        if ($('#email_service').is(':checked')) {
                            $("#statusJustify").removeAttr('hidden');
                            $("#statusDeny").attr('hidden', true);
                        } else {
                            $("#statusJustify").attr('hidden', true);
                            $("#statusDeny").removeAttr('hidden');
                        }
                    }
                }
            });
        });

        // Update Modal Show
        $(document).on('click', '#PermissionUpdate', function(e){
            e.preventDefault(); 
            $("#updateconfirmpermission").modal('show');
            $("#permission_success_message").empty();
        });

        // Confirm Update Email Delete Permission
        $(document).on('click', '#update_btn_confirm', function(e){
            e.preventDefault();

            // Input Field Validation
            $('.error-message').remove();

            var roleName = $("#select_user_role").val();
            var userEmail = $("#select_user_email").val();
            var reportStatus = $("input[name='report_status']:checked").val();
            var messageStatus = $("input[name='message_status']:checked").val();
            var darftStatus = $("input[name='darft_status']:checked").val();
            var emailService = $("input[name='email_service']:checked").val();
            var reportEmailForward = $("input[name='report_email_forward']:checked").val();
            var messageEmailForward = $("input[name='message_email_forward']:checked").val();
            var reportEmailForwardSendbox = $("input[name='report_email_forward_sendbox']:checked").val();
            var reportStatusSendbox = $("input[name='report_status_sendbox']:checked").val();

            if (!roleName) {
                $("#select_user_role").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the role name.</span>');
            }
            if (!userEmail) {
                $("#select_user_email").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the user email.</span>');
            }

            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }

            var id = $('#permission_id').val();
            var data = {
                'user_roles_id': $('#select_user_role').val(),
                'user_emails_id': $('#select_user_email').val(),
                'report_status': reportStatus ? 1 : 0,
                'message_status': messageStatus ? 1 : 0,
                'darft_status': darftStatus ? 1 : 0,

                'email_service': emailService ? 1 : 0,
                'report_email_forward': reportEmailForward ? 1 : 0,
                'message_email_forward': messageEmailForward ? 1 : 0,
                'report_email_forward_sendbox': reportEmailForwardSendbox ? 1 : 0,
                'report_status_sendbox': reportStatusSendbox ? 1 : 0,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/email-delete-permission/update/" + id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').addClass('alert_show_errors skeleton ps-1 pe-1');
                            $('#updateForm_errorList').append('<span id="error_mess">' + err_value + '</span>');
                            $("#updateForm_errorList").fadeIn();

                            var time = null;
                            time = setTimeout(() => {
                                $("#updateForm_errorList").removeClass('skeleton');
                                $("#updateForm_errorList").fadeOut(9000);
                            }, 1000);
                            return ()=>{
                                clearTimeout(time);
                            }
                        });
                        $("#updateconfirmpermission").modal('hide');
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#permission_success_message').addClass('permission_alert_show ps-1 pe-1');
                        $('#permission_success_message').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#permission_success_message').html("");
                        $('#permission_success_message').addClass('permission_alert_show ps-1 pe-1');
                        $('#permission_success_message').fadeIn();
                        $('#permission_success_message').text(response.messages);
                        $('#permission_id').val("");
                        clearFields();
                        $("#updateconfirmpermission").modal('hide');
                        $("#PermissionUpdate").hide();
                        $("#PermissionSubmit").show();
                        $("#statusJustify").attr('hidden', true);
                        $("#statusDeny").attr('hidden', true);
                        $("#permission_success_message").addClass('background_success_sm');
                        setTimeout(() => {
                            $('#permission_success_message').fadeOut(3000);
                        }, 3000);
                        fetch_user_email_delete_permission();
                    }
                }
            });

        });

        // Delete Email Modal Show
        $(document).on('click', '#permissionDeleteBtn', function(e){
            e.preventDefault();
            var id = $(this).val();
            $('#delete_access_permission_id').val(id); 
            $("#deleteconfirmpermission").modal('show');
            $("#permission_success_message").empty();

        });

        // Delete Email Permission
        $(document).on('click', '#confirm_delete_btn', function(e){
            e.preventDefault();
            $('.error-message').remove();
            var id = $('#delete_access_permission_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/email-delete-permission/delete/" + id,
                success: function(response) {
                    $('#permission_success_message').addClass('permission_alert_show ps-1 pe-1');
                    $('#permission_success_message').fadeIn();
                    $('#permission_success_message').text(response.messages);
                    $("#permission_success_message").addClass('background_success_sm');
                    setTimeout(() => {
                        $('#permission_success_message').fadeOut(3000);
                    }, 3000);
                    $('#deleteconfirmpermission').modal('hide');

                    fetch_user_email_delete_permission();
                }

            });

        });

    });
</script>