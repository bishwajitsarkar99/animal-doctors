<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    import { initializeMenuEvents } from '/module/module-min-js/menuEvents-min.js';
    buttonLoader();

    $(document).ready(function(){
        fetch_branch_roles();
        fetch_branch_emails();
        searchBranch();
        allSearchBranch();
        searchBranchFetch();
        searchRoleFetch();
        searchEmailFetch();
        // Initialize the button loader for the login button
        buttonLoader('#add', '.add-icon', '.add-btn-text', 'ADD Access...', 'ADD Access', 1000);
        buttonLoader('#save_btn_confirm', '.save-icon', '.save-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);
        buttonLoader('#refresh', '.refresh-icon', '.refresh-btn-text', 'Refresh...', 'Refresh', 1000);
        buttonLoader('#pagePermision', '.permission-page-icon', '.permission-page-btn-text', 'Permission...', 'Permission', 1000);
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if ($(this).attr('id') === 'search_branch') {
                $(this).select2({
                    placeholder: 'Select Company Branch Name',
                    allowClear: true,
                    width: '100%'
                });
            }else if($(this).attr('id') === 'search_branch_all'){
                $(this).select2({
                    placeholder: 'Select Company Branch Name',
                    allowClear: true,
                    width: '100%'
                });
            }
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#search_branch').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch...');
        });
        $('#search_branch_all').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch...');
        });
        $('#role_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role...');
        });
        $('#email_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
        });
        // Reinitialize Select2 for modals
        $('#roleemailbranch').on('shown.bs.modal', function() {
            $('.select2').each(function() {
                const id = $(this).attr('id');
                let placeholderText = 'Select an option';

                if (id === 'role_id') {
                    placeholderText = 'Select User Role';
                } else if (id === 'email_id') {
                    placeholderText = 'Select User Email';
                }
                // Initialize Select2 with specific placeholder and settings
                if (!$(this).data('select2')) {
                    $(this).select2({
                        placeholder: placeholderText,
                        allowClear: true,
                        width: '100%',
                        dropdownParent: $('#roleemailbranch')
                    });
                }
            });

        });

        // fetch branch for dropdown
        function allSearchBranch(){
            const currentUrl = "{{ route('search-branch.action') }}";

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
                    const allBranch = response.allBranch;
                    $("#search_branch_all").empty();
                    $("#search_branch_all").append('<option value="">Select Company Branch Name</option>');
                    $.each(allBranch, function(key, item) {
                        $("#search_branch_all").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.branch_name}</option>`);
                    });
                },
                error: function() {
                    $("#search_branch_all").empty();
                    $("#search_branch_all").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // fetch branch for dropdown
        function searchBranch(){
            const currentUrl = "{{ route('branch_specify_search.action') }}";

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
                    const specify_branch = response.specify_branch;
                    $("#search_branch").empty();
                    $("#search_branch").append('<option value="">Select Company Branch Name</option>');
                    $.each(specify_branch, function(key, item) {
                        $("#search_branch").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.branch_name}</option>`);
                    });
                },
                error: function() {
                    $("#search_branch").empty();
                    $("#search_branch").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Search Select Dropdown
        $(document).on('change', '#search_branch, #search_branch_all', function(e){
            e.preventDefault();
            var select = $(this).val();

            // Button Show Or Hide
            if(select !== ''){
                $('.edit_branch_id').attr('disabled', true);
                $('.edit_branch_name').attr('disabled', true);
                $('.edit_branch_type').attr('disabled', true);
                $('.edit_division_id').attr('disabled', true);
                $('.edit_district_id').attr('disabled', true);
                $('.edit_upazila_id').attr('disabled', true);
                $('.edit_town_name').attr('disabled', true);
                $('.edit_location').attr('disabled', true);
                $("#add").removeAttr('disabled');
            }
            if(select == ''){
                $('.edit_branch_id').attr('disabled', true);
                $('.edit_branch_name').attr('disabled', true);
                $('.edit_branch_type').attr('disabled', true);
                $('.edit_division_id').attr('disabled', true);
                $('.edit_district_id').attr('disabled', true);
                $('.edit_upazila_id').attr('disabled', true);
                $('.edit_town_name').attr('disabled', true);
                $('.edit_location').attr('disabled', true);
                $("#add").attr('disabled', true);
                $("#branchInfo").attr('hidden', true);
                $("#add_accss").attr('hidden', true);
                clearFields();
            }

            // Search ID
            var id = select;
            
            $.ajax({
                type: "GET",
                url: "/company/branch-get-data/" + id,
                success: function(response){
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    }else if(response.status == 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#dataPullingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        $("#branchInfo").attr('hidden', true);
                        $("#add_accss").attr('hidden', true);
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $("#branchInfo").removeAttr('hidden');
                            $("#branchInfo").addClass('table-animation');
                            $("#add_accss").removeAttr('hidden');

                            const messages = response.messages;
    
                            $('#branches_id').val(id);
                            $('.edit_branch_id').val(response.messages.branch_id);
                            $('.edit_branch_type').val(response.messages.branch_type);
                            $('.edit_branch_name').val(response.messages.branch_name);
                            $('.edit_division_id').val(response.messages.divisions.division_name);
                            $('.edit_district_id').val(response.messages.districts.district_name);
                            $('.edit_upazila_id').val(response.messages.thana_or_upazilas.thana_or_upazila_name);
                            $('.edit_town_name').val(response.messages.town_name);
                            $('.edit_location').val(response.messages.location);
                            // Modal Form
                            $('#add_branches_id').val(id); 
                            $('#add_branch_id').val(response.messages.branch_id);
                            $('#add_branch_type').val(response.messages.branch_type);
                            $('#add_branch_name').val(response.messages.branch_name);
                            $('#add_division_id').val(response.messages.division_id);
                            $('#add_district_id').val(response.messages.district_id);
                            $('#add_upazila_id').val(response.messages.upazila_id);
                            $('#add_town_name').val(response.messages.town_name);
                            $('#add_location').val(response.messages.location);

                        }, 1500);
                        
                    }
                    
                }
            });
        });

        // Clear input field
        function clearFields(){
            $('#brnch_id').val("");
            $('#branch_type').val("");
            $('#branch_name').val("");
            $('#division_id').val("");
            $('#district_id').val("");
            $('#upazila_id').val("");
            $('#town_name').val("");
            $('#location').val("");
            $('#role_id').val("");
            $('#email_id').val("");
        }

        // Remove Validation Errors
        $(document).on('change', '.email_id, .role_id', function(){
            var selected_val = $(this).val();

            if(selected_val !== ''){
                $("#savForm_error3").html("");
                $('#email_id').next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#savForm_error3").removeClass('alert_show_errors');
                $("#savForm_error2").html("");
                $('#role_id').next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#savForm_error2").removeClass('alert_show_errors');
            }
        });

        // Refresh
        $(document).on('click', '#refresh', function(){
            $('.select2').each(function () {
                const id = $(this).attr('id');
                let placeholderText = 'Select an option';

                if (id === 'search_branch') {
                    placeholderText = 'Select Company Branch Name';
                } else if (id === 'role_id') {
                    placeholderText = 'Select User Role';
                } else if (id === 'email_id') {
                    placeholderText = 'Select User Email';
                } else if (id === 'search_branch_all') {
                    placeholderText = 'Select Company Branch Name';
                }

                // Reinitialize Select2 with specific settings
                if (!$(this).data('select2')) {
                    $(this).select2({
                        placeholder: placeholderText,
                        allowClear: true,
                        width: '100%'
                    });
                }
            });
        });

        // Add Modal Show
        $(document).on('click', '#add', function(e){
            e.preventDefault();
            $("#roleemailbranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.head_title, .btn-close, .role_nme', type: 'class', name: 'branch-skeleton' },
                    { selector: '#save_btn_confirm, #cancel_btn', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            };
        });

        // Add Branch Access For User by Modal
        $(document).on('click', '#save_btn_confirm', function(e){
            e.preventDefault();

            var data = {
                'branch_id': $("#add_branch_id").val(),
                'branch_type': $("#add_branch_type").val(),
                'branch_name': $("#add_branch_name").val(),
                'division_id': $("#add_division_id").val(),
                'district_id': $("#add_district_id").val(),
                'upazila_id': $("#add_upazila_id").val(),
                'town_name': $("#add_town_name").val(),
                'location': $("#add_location").val(),
                'role_id': $("#role_id").val(),
                'email_id': $("#email_id").val(),
            };

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name ="csrf-token" ]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('permission_create.action') }}",
                dataType: "json",
                data:data,
                success: function (response) {
                    if (response.status == 400) {
                        $.each(response.errors, function (key, err_value) {
                            if (key === "branch_id") {
                                $("#savForm_error").fadeIn();
                                $('#savForm_error').html('<span class="error_val" style="font-size:12px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error").addClass("alert_show_errors");
                                $('#add_branch_id').addClass('is-invalid');
                                $('#add_branch_id').html("");
                            } else if (key === "email_id") {
                                $("#savForm_error3").fadeIn();
                                $('#savForm_error3').html('<span class="error_val" style="font-size:12px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error3").addClass("alert_show_errors");
                                $('#email_id').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === "role_id") {
                                $("#savForm_error2").fadeIn();
                                $('#savForm_error2').html('<span class="error_val" style="font-size:12px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error2").addClass("alert_show_errors");
                                $('#role_id').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            }
                        });
                    } else {
                        $("#roleemailbranch").modal('hide');
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');

                            $('#savForm_error').html("");
                            $('#savForm_error2').html("");
                            $('#savForm_error3').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);

                            clearFields();
                            searchBranch();
                        }, 1500);
                    }
                },
                error: function (xhr, status, error) {
                    // This handles 400 and other errors
                    let response = xhr.responseJSON;
                    console.log("Error Response:", response);

                    if (response && response.errors) {
                        // Render errors in modal
                        $.each(response.errors, function (key, errorMessage) {
                            if (key === "branch_id") {
                                $("#savForm_error").fadeIn();
                                $("#savForm_error").html('<span class="error_val" style="font-size:12px;font-weight:700;">' + errorMessage + '</span>');
                                $("#savForm_error").addClass("alert_show_errors");
                                $("#add_branch_id").addClass('is-invalid');
                            } else if (key === "email_id") {
                                $("#savForm_error3").fadeIn();
                                $("#savForm_error3").html('<span class="error_val" style="font-size:12px;font-weight:700;">' + errorMessage + '</span>');
                                $("#savForm_error3").addClass("alert_show_errors");
                                $('#email_id').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === "role_id") {
                                $("#savForm_error2").fadeIn();
                                $("#savForm_error2").html('<span class="error_val" style="font-size:12px;font-weight:700;">' + errorMessage + '</span>');
                                $("#savForm_error2").addClass("alert_show_errors");
                                $('#role_id').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            }
                        });
                    } else {
                        alert("An unexpected error occurred. Please try again.");
                    }
                }
            });
            
        });

        // Branch Fetch For User Permission
        function searchBranchFetch() {
            const currentUrl = "{{ route('search-branch.action') }}";

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
                    const allBranch = response.allBranch;
                    const userCounts = {};
                    $.each(response.user_counts, function(key, value) {
                        userCounts[key.toString()] = value;
                    });

                    const branchMenu = $("#branch_menu");
                    branchMenu.empty();
                    $.each(allBranch, function(key, item) {
                        const userCount = userCounts[item.branch_id.toString()] || 0; 
                        branchMenu.append(
                            `<li tabindex="0" value="${item.branch_id}" id="select_list_item">
                                ${item.branch_name}
                                <label class="enter_press enter-focus">Enter Press <i class="fa-solid fa-link"></i></label>
                                <span class="badge bg-dark-cornflowerblue rounded-pill bage_display_none" id="userNum">
                                    <label>User: ${userCount}</label>
                                </span>
                            </li>`
                        );
                    });

                    // Update menuItems and menuSpans after dynamic content is added
                    initializeMenuEvents('branch_menu');
                },
                error: function() {
                    const branchMenu = $("#branch_menu");
                    branchMenu.empty();
                    branchMenu.append('<li tabindex="0" value="" disabled>Branch Not Exits</li>');
                }
            });
        }
        // Role Fetch For User Permission permission_user_role  permission_user_email 
        function searchRoleFetch(branchID, callback) {
            if (!branchID) {
                return;
            }
            const currentUrl = "{{ route('permission_user_role.action', ':branchID') }}".replace(':branchID', branchID);

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
                    const branch_roles = response.branch_roles;
                    const userEmailCounts = {};
                    $.each(response.emails, function(key, value) {
                        userEmailCounts[key.toString()] = value;
                    });
                    const roleMenu = $("#role_menu");
                    roleMenu.empty();
                    $.each(branch_roles, function(key, item) {
                        const userEmailCount = userEmailCounts[item.id.toString()] || 0; 
                        roleMenu.append(
                            `<li tabindex="0" value="${item.id}" id="role_select_list_item">
                                ${item.name}
                                <label class="role_enter_press enter-focus">Enter Press <i class="fa-solid fa-link"></i></label>
                                <span class="badge bg-dark-cornflowerblue rounded-pill bage_display_none" id="roleNum">
                                    ${userEmailCount}
                                </span>
                            </li>`
                        );
                    });
                    if (typeof callback === 'function') {
                        callback();
                    }

                    // Update menuItems and menuSpans after dynamic content is added
                    initializeMenuEvents('role_menu', true);
                },
                error: function() {
                    const roleMenu = $("#role_menu");
                    roleMenu.empty();
                    roleMenu.append('<li tabindex="0" value="" disabled>Branch Role No Found</li>');
                }
            });
        }
        // Email Fetch For User Permission
        function searchEmailFetch(selectID, callback) {
            if (!selectID) {
                return;
            }
            const currentUrl = "{{ route('permission_user_email.action', ':selectID') }}".replace(':selectID', selectID);

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
                    const emailMenu = $("#email_menu");
                    emailMenu.empty();
                    $.each(users, function(key, item) {
                        emailMenu.append(
                            `<li tabindex="0" value="${item.id}" id="email_select_list_item">
                                ${item.email}
                                <label class="email_enter_press enter-focus">Enter Press <i class="fa-solid fa-link"></i></label>
                                <span class="bage_display_none" id="userImage">
                                    <img class="user_img rounded-circle user_imgs" src="${item.image.includes('https://') ? item.image : '/image/' + item.image}">
                                </span>
                            </li>`
                        );
                    });
                    if (typeof callback === 'function') {
                        callback();
                    }

                    // Update menuItems and menuSpans after dynamic content is added
                    initializeMenuEvents('email_menu');
                },
                error: function() {
                    const emailMenu = $("#email_menu");
                    emailMenu.empty();
                    emailMenu.append('<li tabindex="0" value="" disabled>Email does not exists for permission.</li>');
                }
            });
        }
        // tab access permission select document
        $(document).on('click Enter', '#pagePermision', function(){
            $("#tabAccess").removeAttr('hidden');
            $("#tabAccess").addClass('active');
            $("#tabHome").removeClass('active');
            $("#home").removeClass('active show');
            $("#userBranchPermission").addClass('active show');
            $("#branchBox").removeAttr('hidden');
            searchBranchFetch();
        });
        // Back Home page
        $(document).on('click Enter', '.branch_close, #tabHome', function(){
            $("#tabAccess").attr('hidden', true);
            $("#home").addClass('active show');
            $("#tabAccess").removeClass('active');
            $("#tabHome").addClass('active');
            $("#userBranchPermission").removeClass('active show');
            $("#branchBox").setAttribute('hidden', false);
        });
        // menu close event 
        $(document).on('click', '#branch_close, #role_close, #email_close', function () {
            // Get the IDs of the boxes
            const branchBox = document.getElementById('branchBox');
            const roleBox = document.getElementById('roleBox');
            const emailBox = document.getElementById('emailBox');

            // Check which close button was clicked
            if (this.id === 'branch_close' && branchBox) {
                branchBox.setAttribute('hidden', true);
            } else if (this.id === 'role_close' && roleBox) {
                roleBox.setAttribute('hidden', true);
            } else if (this.id === 'email_close' && emailBox) {
                emailBox.setAttribute('hidden', true);
            }
        });
        // show Role Box press enter / click event
        $(document).on('click keydown', '#select_list_item', function(){
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                const selectedVal = $(this).attr('data-val');
                const branchID = $(this).attr('value');
                if (selectedVal === '1' && branchID) {
                    $("#roleBox").removeAttr('hidden');
                    searchRoleFetch(branchID);
                } else if (selectedVal === '0') {
                    $("#roleBox").attr('hidden', true);
                }
            }
        });
        // show Role Box press enter / click event
        $(document).on('click keydown Enter', '#role_select_list_item', function(){
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                const selectedVal = $(this).attr('data-val');
                const selectID = $(this).attr('value');
                if (selectedVal === '1' && selectID) {
                    searchEmailFetch(selectID);
                    $("#emailBox").removeAttr('hidden');
                } else if (selectedVal === '0') {
                    $("#emailBox").attr('hidden', true);
                }
            }
        });

        // Get User Email Data 
        $(document).on('click keydown Enter', '#email_select_list_item', function(){
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')){
                const id = $(this).attr('value');
                const selectedVal = $(this).attr('data-val');
                const btnVal = $(this).attr('data-val');
                if(selectedVal === '1' && id){
                    $('#user_email_id').val(id);
                    $('#users_email_id').val(id);
                    $("#userAccessActionModal").modal('show');
                    const time = setTimeout(() => {
                        removeAttributeOrClass([
                            {
                                selector: '.head_title, .head_btn',
                                type: 'class',
                                name: 'branch-skeleton'
                            },
                            {
                                selector: '#access_branch_delete, #cancle_access',
                                type: 'class',
                                name: 'mn-branch-skeleton'
                            },
                            {
                                selector: '#permission_btn, #branch_change_btn, #access_update_btn, #access_branch_delete, #cancle_access',
                                type: 'class',
                                name: 'group-branch-skeleton'
                            },
                        ]);
                    }, 1000);      
                } else if (selectedVal === '0') {
                    $("#userAccessActionModal").modal('hide');
                }
                
                
            }
        });

        // Access Permission Modal
        $(document).on('click', '#permission_btn', function(e){
            e.preventDefault();
            $("#user_branch_menu").empty();
            $(".branch_name_head").empty();
            $("#usrRole").empty();
            $("#usrEmail").empty();
            $("#usrImage").empty();

            $("#userAccessActionModal").modal('hide');
            $("#accessconfirmbranch").modal('show');
            $("#loadingProgress").removeAttr('hidden');
            $("#access_modal_box").addClass('progress_body');
            $("#processModal_body").addClass('loading_body_area');
            setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#loadingProgress").attr('hidden', true);
                $("#access_modal_box").removeClass('progress_body');
                $("#processModal_body").removeClass('loading_body_area');
                $("#userAccessPermissionModal").modal('show');
            }, 1500);
            
            var id = $("#users_email_id").val();

            $.ajax({
                type: "GET",
                url: "/company/branch-user-permission-edit/" + id,
                dataType: "json",
                success: function(response){
                    //console.log(response.messages);
                    if(response.status === 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    }else if(response.status === 200){
                        const messages = response.messages;

                        let createdByRole;
                        const firstUserImage = messages.created_users.image.includes('https://') ? messages.created_users.image : `${window.location.origin}/image/${messages.created_users.image}`;
                        const secondUserImage = messages.user_emails.image.includes('https://') ? messages.user_emails.image : `${window.location.origin}/image/${messages.user_emails.image}`;
                        switch (messages.created_by) {
                            case 1:
                                createdByRole = 'SuperAdmin';
                                break;
                            case 2:
                                createdByRole = 'Sub-Admin';
                                break;
                            case 3:
                                createdByRole = 'Admin';
                                break;
                            case 0:
                                createdByRole = 'User';
                                break;
                            case 5:
                                createdByRole = 'Accounts';
                                break;
                            case 6:
                                createdByRole = 'Marketing';
                                break;
                            case 7:
                                createdByRole = 'Delivery Team';
                                break;
                            default:
                                createdByRole = 'Unknown';
                        }
                        const branchMenu = $("#user_branch_menu");
                        const branchName = $(".branch_name_head");
                        const usrRole = $("#usrRole");
                        const usrEmail = $("#usrEmail");
                        const usrImg = $("#usrImage");
                        branchName.append( `
                            <span class="word_space">${messages.branch_name}</span>
                        `);
                        usrRole.append( `
                            <span class="word_space">${messages.user_roles.name}</span>
                        `);
                        usrEmail.append( `
                            <span class="word_space">${messages.user_emails.email}</span>
                        `);
                        usrImg.append( `
                            <span class="word_space"><img class="user_img rounded-square users_image position" src="${secondUserImage}"></span>
                        `);
                        
                        branchMenu.append(
                            `<li value="${messages.id}" id="branch_ids">
                                <label class="enter_press text_label">Branch-ID : ${messages.branch_id}</label>
                            </li>
                            <li id="branch_types">
                                <label class="enter_press text_label">Branch-Type : ${messages.branch_type}</label>
                            </li>
                            <li id="branch_names">
                                <label class="enter_press text_label">Branch-Name : ${messages.branch_name}</label>
                            </li>
                            <li id="division_id">
                                <label class="enter_press text_label">Division-Name : ${messages.divisions.division_name}</label>
                            </li>
                            <li id="district_id">
                                <label class="enter_press text_label">District-Name : ${messages.districts.district_name}</label>
                            </li>
                            <li id="upazila_id">
                                <label class="enter_press text_label">Upazila-Name : ${messages.thana_or_upazilas.thana_or_upazila_name}</label>
                            </li>
                            <li id="town_name">
                                <label class="enter_press text_label">City-Name : ${messages.town_name}</label>
                            </li>
                            <li id="locations">
                                <label class="enter_press text_label">Branch-Location : ${messages.location}</label>
                            </li>
                            <li id="Creator">
                                <label class="enter_press text_label">Creator</label>
                            </li>
                            <li id="creatorCreatedAt">
                                <label class="enter_press text_label">Created-Date : ${currentDate(messages.created_at)}</label>
                            </li>
                            <li id="creatorCreatedBy">
                                <label class="enter_press text_label">Role-Name : ${createdByRole}</label>
                            </li>
                            <li id="creator_email">
                                <label class="enter_press text_label" id="creatorUserEmail">
                                    Email : ${messages.created_users.email} <img class="user_img rounded-square users_image position" src="${firstUserImage}">
                                </label>
                            </li>
                            <li id="updator">
                                <label class="enter_press text_label">Updator</label>
                            </li>
                            <li id="#">
                                <label class="text_label">Permission-Access :</label>
                                <input class="form-switch form-check-input check_permission" type="checkbox" value="1" id="checkingSuperAdminAccess">
                                <span class="badge rounded-pill bg-success" id="checkLabelSuperAdmin"></span>
                            </li>`
                        );
                        $('#users_email_id').val(id);
                        // if(messages.created_by !== ''){
                        //     const firstUserImage = messages.created_users.image.includes('https://') ? messages.created_users.image : `${window.location.origin}/image/${messages.created_users.image}`;
                        //     let createdByRole;
                        //     switch (messages.created_by) {
                        //         case 1:
                        //             createdByRole = 'SuperAdmin';
                        //             break;
                        //         case 2:
                        //             createdByRole = 'Sub-Admin';
                        //             break;
                        //         case 3:
                        //             createdByRole = 'Admin';
                        //             break;
                        //         case 0:
                        //             createdByRole = 'User';
                        //             break;
                        //         case 5:
                        //             createdByRole = 'Accounts';
                        //             break;
                        //         case 6:
                        //             createdByRole = 'Marketing';
                        //             break;
                        //         case 7:
                        //             createdByRole = 'Delivery Team';
                        //             break;
                        //         default:
                        //             createdByRole = 'Unknown';
                        //     }
                        //     $("#creatorUserImage").html(`<img class="user_img rounded-square users_image position" src="${firstUserImage}">`);

                        //     $("#creatorUserEmail").val(messages.created_users.email);
                        //     $("#creatorCreatedBy").val(createdByRole);
                        //     if(messages.created_at !== ''){
                        //         $("#creatorCreatedAt").val(currentDate(messages.created_at));
                        //     }else{
                        //         $("#creatorCreatedAt").val('-');
                        //     }
                        // }
                        // if(messages.updated_by !== null){
                        //     const secondUserImage = messages.updated_users.image.includes('https://') ? messages.updated_users.image : `${window.location.origin}/image/${messages.updated_users.image}`;
                        //     let updatedByRole;
                        //     switch (messages.updated_by) {
                        //         case 1:
                        //             updatedByRole = 'SuperAdmin';
                        //             break;
                        //         case 2:
                        //             updatedByRole = 'Sub-Admin';
                        //             break;
                        //         case 3:
                        //             updatedByRole = 'Admin';
                        //             break;
                        //         case 0:
                        //             updatedByRole = 'User';
                        //             break;
                        //         case 5:
                        //             updatedByRole = 'Accounts';
                        //             break;
                        //         case 6:
                        //             updatedByRole = 'Marketing';
                        //             break;
                        //         case 7:
                        //             updatedByRole = 'Delivery Team';
                        //             break;
                        //         default:
                        //             updatedByRole = 'Unknown';
                        //     }
                        //     $("#updatorUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);

                        //     $("#updatorUserEmail").val((messages.updated_users.email));
                        //     $("#updatorUpdateBy").val(updatedByRole);
                        //     if(messages.created_at !== messages.updated_at){
                        //         $("#updatorUpdateAt").val(currentDate(messages.updated_at));
                        //     }else{
                        //         $("#updatorUpdateAt").val('-');
                        //     }
                        // }
                        // if(messages.approver_by !== null){
                        //     const secondUserImage = messages.approver_users.image.includes('https://') ? messages.approver_users.image : `${window.location.origin}/image/${messages.approver_users.image}`;
                        //     let approverByRole;
                        //     switch (messages.approver_by) {
                        //         case 1:
                        //             approverByRole = 'SuperAdmin';
                        //             break;
                        //         case 2:
                        //             approverByRole = 'Sub-Admin';
                        //             break;
                        //         case 3:
                        //             approverByRole = 'Admin';
                        //             break;
                        //         case 0:
                        //             approverByRole = 'User';
                        //             break;
                        //         case 5:
                        //             approverByRole = 'Accounts';
                        //             break;
                        //         case 6:
                        //             approverByRole = 'Marketing';
                        //             break;
                        //         case 7:
                        //             approverByRole = 'Delivery Team';
                        //             break;
                        //         default:
                        //             approverByRole = 'Unknown';
                        //     }
                        //     $("#approverUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);

                        //     $("#approverUserEmail").val(messages.approver_users.email);
                        //     $("#approverApprover").val(approverByRole);
                        //     if(messages.approver_date !== null){
                        //         $("#approverUpdateAt").val(currentDate(messages.approver_date));
                        //     }else if(messages.approver_date == null){
                        //         $("#approverUpdateAt").val('-');
                        //     }
                        // }

                        
                        // Super Admin Status
                        if(response.messages.super_admin_approval_status == 1){
                            let permissionLabel;
                            switch (messages.super_admin_approval_status) {
                                case 1:
                                    permissionLabel = 'Access';
                                break;
                                case 0:
                                    permissionLabel = 'Deny';
                                break;
                            
                                default:
                                    permissionLabel = 'Unknown';
                                break;
                            }
                            $('#checkingSuperAdminAccess').val(permissionLabel);
                            $('#checkingAdminAccess').prop('checked', response.messages.super_admin_approval_status == 1);
                        }else{
                            $('#checkingSuperAdminAccess').val(permissionLabel);
                            $('#checkingAdminAccess').prop('checked', false);
                        }
                        // if(response.messages.admin_approval_status == 1){
                        //     $("#adminSt").removeAttr('hidden').slideDown();
                        //     $("#adminStTwo").attr('hidden', true);
                        //     $('#admin_approval_status').prop('checked', response.messages.admin_approval_status == 1);
                        // }
                        // else{
                        //     $("#adminSt").attr('hidden', true);
                        //     $("#adminStTwo").attr('hidden', true);
                        //     $('#admin_approval_status').prop('checked', false);
                        // }
                        // if(response.messages.sub_admin_approval_status == 1){
                        //     $("#subAdminSt").removeAttr('hidden').slideDown();
                        //     $("#subAdminStTwo").attr('hidden', true);
                        //     $('#sub_admin_approval_status').prop('checked', response.messages.sub_admin_approval_status == 1);
                        // }else{
                        //     $("#subAdminSt").attr('hidden', true);
                        //     $("#subAdminStTwo").attr('hidden', true);
                        //     $('#sub_admin_approval_status').prop('checked', false);
                        // }
                    }
                }
            });

        });
        // back Acce Permission Modal
        $(document).on('click', '.back_action_box, .cancel_action_box', function(e){
            e.preventDefault();
            $("#userAccessActionModal").modal('show');
            $("#userAccessPermissionModal").modal('hide');
        });
    });
</script>