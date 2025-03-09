<script type="module">
    import { currentDate, formatDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass, addAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    import { initializeMenuEvents } from '/module/module-min-js/menuEvents-min.js';
    buttonLoader();

    $(document).ready(function(){
        fetch_branch_roles();
        fetch_initial_role();
        fetch_branch_emails();
        fetch_branch_change_email();
        fetch_branch_change();
        searchBranch();
        allSearchBranch();
        searchBranchFetch();
        searchRoleFetch();
        searchEmailFetch();
        selectBranchFetch();
        // Initialize the button loader for the login button
        buttonLoader('#save_btn_confirm', '.save-icon', '.save-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);
        buttonLoader('#cancel_of_btn', '.cancel-of-icon', '.cancel-of-btn-text', 'Cancel...', 'Cancel', 1000);
        buttonLoader('#pagePermision', '.permission-page-icon', '.permission-page-btn-text', 'Permission...', 'Permission', 1000);
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function () {
            let placeholderText = '';

            switch ($(this).attr('id')) {
                case 'search_branch':
                case 'search_branch_all':
                case 'select_branch_name':
                    placeholderText = 'Select Company Branch Name';
                    break;
                case 'change_role_id':
                    placeholderText = 'Select Role';
                    break;
                case 'change_email_id':
                    placeholderText = 'Select Email';
                    break;
            }

            if (placeholderText) {
                $(this).select2({
                    placeholder: placeholderText,
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
        $('#branch_name_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch...');
        });
        $('#branch_role_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role...');
        });
        $('#branch_email_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
        });
        // Reinitialize Select2 for first modals
        function initializeSelect2(modalSelector) {
            $(modalSelector).on('shown.bs.modal', function () {
                $(this).find('.select2').each(function () {
                    const id = $(this).attr('id');
                    let placeholderText = 'Select an option';

                    const placeholders = {
                        'role_id': 'Select User Role',
                        'email_id': 'Select User Email',
                        'branch_name_id': 'Select Branch Name',
                        'branch_role_id': 'Select User Role',
                        'branch_email_id': 'Select User Email'
                    };

                    if (placeholders[id]) {
                        placeholderText = placeholders[id];
                    }

                    // Check if Select2 is already initialized before destroying
                    if ($(this).hasClass("select2-hidden-accessible")) {
                        $(this).select2('destroy');
                    }

                    // Initialize Select2 with specific placeholder and settings
                    $(this).select2({
                        placeholder: placeholderText,
                        allowClear: true,
                        width: '100%',
                        dropdownParent: $(modalSelector)
                    });
                });
            });
        }

        // Initialize Select2 for both modals
        initializeSelect2('#roleemailbranch');
        initializeSelect2('#branchChange');
        initializeSelect2('#userBranchChangeModal');

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

        // fetch branch for select (change branch)
        function selectBranchFetch(){
            const currentUrl = "{{ route('user_branch_fetch.action') }}";

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
                    const user_access_branches = response.user_access_branches;
                    
                    $("#branch_name_id").empty();
                    $("#branch_name_id").append('<option value="">Select Company Branch Name</option>');

                    $.each(user_access_branches, function(index, item) {
                        $("#branch_name_id").append(`<option value="${item.id}" data-branch_id="${item.branch_id}" 
                        data-branch_type="${item.branch_type}" 
                        data-branch_name="${item.branch_name}" 
                        data-division_id="${item.division_id}" 
                        data-district_id="${item.district_id}" 
                        data-upazila_id="${item.upazila_id}" 
                        data-town_name="${item.town_name}" 
                        data-location="${item.location}">${item.branch_name}</option>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    $("#search_branch_name").empty().append('<option value="" disabled>Error loading data</option>');
                }
            });
        }

        // fetch created user login email
        function fetch_initial_role(){
            const currentUrl = "{{ route('fetch_email_three.action') }}";

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
                    const user_emails = response.user_emails;
                    $("#email_id").empty();
                    $("#email_id").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(user_emails, function(key, item) {
                        $("#email_id").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.login_email}</option>`);
                    });
                },
                error: function() {
                    $("#email_id").empty();
                    $("#email_id").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
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
                // Search ID
                var id = select;
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
            
            $.ajax({
                type: "GET",
                url: "/company/branch-get-data/" + id,
                success: function(response){
                    if(response.status == 404){
                        // $('#success_message').html("");
                        // $('#success_message').addClass('alert alert-danger');
                        // $('#success_message').text(response.messages);
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
                            $('#branch_head_name').val(response.messages.branch_name);
                            $('#confirm_branch_name').val(response.messages.branch_name);
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
            // Clear Select2 fields reliably with delay
            setTimeout(function() {
                $('#role_id').val(null).trigger('change');
                $('#email_id').val(null).trigger('change');
            }, 100);
        }

        // Cancel Access
        $(document).on('click', '#cancel_of_btn', function(){
            $("#branchInfo").attr('hidden', true);
            $("#add_accss").attr('hidden', true);
            $("#branchInfo").attr('hidden', true);
            // Clear Select2 fields reliably with delay
            setTimeout(function() {
                $('#search_branch_all').val(null).trigger('change');
                $('#search_branch').val(null).trigger('change');
            }, 100);
        });

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
                    { selector: '.btn-close, .branch-nmT, .branch-rest, .role_nme', type: 'class', name: 'branch-skeleton' },
                    { selector: '.head_title', type: 'class', name: 'modal-head-skeleton' },
                    { selector: '#cancle_access', type: 'class', name: 'branch-skeleton' },
                    { selector: '#save_btn_confirm', type: 'class', name: 'mn-btn-branch-skeleton' },
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
                            $("#branchInfo").attr('hidden', true);
                            // Clear Select2 fields reliably with delay
                            setTimeout(function() {
                                $('#search_branch_all').val(null).trigger('change');
                                $('#search_branch').val(null).trigger('change');
                                $('#role_id').val(null).trigger('change');
                                $('#email_id').val(null).trigger('change');
                            }, 100);

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

        // Add Branch Access For User by Modal --- Cancel or Close
        $(document).on('click', '#cancle_access, .access_cancel', function(){
            // Clear Select2 fields reliably with delay
            setTimeout(function() {
                $('#role_id').val(null).trigger('change');
                $('#email_id').val(null).trigger('change');
            }, 100);
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
                                ${item.login_email}
                                <label class="email_enter_press enter-focus">${item.branch_name} <i class="fa-solid fa-link"></i></label>
                                <span class="bage_display_none" id="userImage">
                                    <img class="user_img rounded-circle user_imgs" src="${item.image.includes('https://') ? item.image : '/storage/image/user-image/' + item.image}">
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
            // $("#branchBox").setAttribute('hidden', false);
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

        // Handel Checkbox
        $("#checkLabelSuperAdmin").show();
        $("#checkLabelSuperAdmin2").hide();
        $("#checkBlogLabelSuperAdmin").show();
        $("#checkBlogLabelSuperAdmin2").hide();
        $("#checkLabelAdmin").show();
        $("#checkLabelAdmin2").hide();
        $(document).on('click', '#checkingSuperAdminAccess', function() {
            var isChecked = $(this).prop('checked');
            if (isChecked) {
                $("#checkLabelSuperAdmin").show();
                $("#checkLabelSuperAdmin2").hide();
            } else {
                $("#checkLabelSuperAdmin").hide();
                $("#checkLabelSuperAdmin2").show();
            }
        });
        $(document).on('click', '#checkingSuperAdminBlog', function() {
            var isChecked = $(this).prop('checked');
            if (isChecked) {
                $("#checkBlogLabelSuperAdmin").show();
                $("#checkBlogLabelSuperAdmin2").hide();
            } else {
                $("#checkBlogLabelSuperAdmin").hide();
                $("#checkBlogLabelSuperAdmin2").show();
            }
        });
        $(document).on('click', '#checkingAdminAccess', function() {
            var isChecked = $(this).prop('checked');
            if (isChecked) {
                $("#checkLabelAdmin").show();
                $("#checkLabelAdmin2").hide();
            } else {
                $("#checkLabelAdmin").hide();
                $("#checkLabelAdmin2").show();
            }
        });
        // back Acce Permission Modal
        $(document).on('click', '.back_action_box, .cancel_action_box', function(e){
            e.preventDefault();
            $("#userAccessActionModal").modal('show');
            $("#userAccessPermissionModal").modal('hide');
        });
        // back Acce Permission Confirm Modal
        $(document).on('click', '#cancel_btn, .access_confirm_back', function(e){
            e.preventDefault();
            $("#userAccessPermissionConfirmModal").modal('hide');
            $("#userAccessPermissionModal").modal('show');
        });

        // Access Permission Modal with user email search
        $(document).on('click', '#permission_btn', function(e){
            e.preventDefault();
            $("#user_branch_menu").empty();
            $(".branch_name_head").empty();
            $("#usrRole").empty();
            $("#usrEmail").empty();
            $("#usrImage").empty();
            $("#usrConfrmImage").empty();
            $("#usrConfrmRole").empty();
            $("#usrConfrmEmail").empty();

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
                        var userRole = {{ auth()->user()->role }};
                        const messages = response.messages;
                        const created_by = messages.created_by;
                        const updated_by = messages.updated_by;
                        const approver_by = messages.approver_by;
                        const creatorUserEmail = messages.creator_emails.login_email;
                        const adminApprovalStatus = messages.admin_approval_status;
                        const superAdminApprovalStatus = messages.super_admin_approval_status;
                        const superAdminApprovalBlogStatus = messages.status;
                        
                        let createdByRole;
                        let updatedByRole;
                        let aprrovedByRole;
                        let approverDate;

                        const firstUserImage = messages.created_users.image.includes('https://') 
                            ? messages.created_users.image 
                            : `${window.location.origin}/storage/image/user-image/${messages.created_users.image}`;
                        const secondUserImage = messages.user_emails.image.includes('https://') 
                            ? messages.user_emails.image 
                            : `${window.location.origin}/storage/image/user-image/${messages.user_emails.image}`;
                        const thirdUserImage = 
                            messages.updated_users && messages.updated_users.image 
                            ? (messages.updated_users.image.includes('https://') 
                                ? messages.updated_users.image 
                                : `${window.location.origin}/storage/image/user-image/${messages.updated_users.image}`)
                            : `${window.location.origin}/image/default.png`;

                        const fourUserImage = 
                            messages.approver_users && messages.approver_users.image 
                            ? (messages.approver_users.image.includes('https://') 
                                ? messages.approver_users.image 
                                : `${window.location.origin}/storage/image/user-image/${messages.approver_users.image}`)
                            : `${window.location.origin}/image/default.png`;

                        const roles = {
                            1: 'SuperAdmin',
                            2: 'Sub-Admin',
                            3: 'Admin',
                            0: 'User',
                            5: 'Accounts',
                            6: 'Marketing',
                            7: 'Delivery Team',
                        };

                        createdByRole = roles[created_by] || 'Unknown';
                        updatedByRole = roles[updated_by] || '--';
                        aprrovedByRole = roles[approver_by] || '--';
                        if(approver_by === 1){
                            approverDate = messages.super_admin_approver_date;
                        }else if(approver_by === 3){
                            approverDate = messages.admin_approver_date;
                        }

                        const branchMenu = $("#user_branch_menu");
                        const branchName = $(".branch_name_head");
                        const usrRole = $("#usrRole, #usrConfrmRole");
                        const usrEmail = $("#usrEmail, #usrConfrmEmail");
                        const usrImg = $("#usrImage, #usrConfrmImage");

                        // Append user details
                        branchName.append(`<span class="word_space">${messages.branch_name}</span>`);
                        usrRole.append(`<span class="word_space">${messages.user_roles.name}</span>`);
                        usrEmail.append(`<span class="word_space">${messages.user_emails.login_email}</span>`);
                        usrImg.append(`<span class="word_space"><img class="user_img rounded-square users_image position" src="${secondUserImage}"></span>`);

                        branchMenu.append(
                            `<li value="" id="branch_info">
                                <label class="branch_head_label">Branch information</label>
                            </li>
                            <li value="${messages.id}" id="branch_ids" data-branch-id="${messages.branch_id}">
                                <label class="enter_press text_label">Branch-ID : ${messages.branch_id}</label>
                            </li>
                            <li id="branch_types" data-branch-id="${messages.branch_type}">
                                <label class="enter_press text_label">Branch-Type : ${messages.branch_type}</label>
                            </li>
                            <li id="branch_names" data-branch-id="${messages.branch_name}">
                                <label class="enter_press text_label">Branch-Name : ${messages.branch_name}</label>
                            </li>
                            <li id="division_names" data-branch-id="${messages.divisions.division_name}">
                                <label class="enter_press text_label">Division-Name : ${messages.divisions.division_name}</label>
                            </li>
                            <li id="district_names" data-branch-id="${messages.districts.district_name}">
                                <label class="enter_press text_label">District-Name : ${messages.districts.district_name}</label>
                            </li>
                            <li id="upazila_names" data-branch-id="${messages.thana_or_upazilas.thana_or_upazila_name}">
                                <label class="enter_press text_label">Upazila-Name : ${messages.thana_or_upazilas.thana_or_upazila_name}</label>
                            </li>
                            <li id="town_names" data-branch-id="${messages.town_name}">
                                <label class="enter_press text_label">City-Name : ${messages.town_name}</label>
                            </li>
                            <li id="locations" data-branch-id="${messages.location}">
                                <label class="enter_press text_label">Branch-Location : ${messages.location}</label>
                            </li>
                            <li id="Creator">
                                <label class="branch_head_label">Creator</label>
                            </li>
                            <li id="creatorCreatedAt">
                                <label class="enter_press text_label">Created-Date : ${formatDate(messages.created_at)}</label>
                            </li>
                            <li id="creatorCreatedBy">
                                <label class="enter_press text_label">Role-Name : ${createdByRole}</label>
                            </li>
                            <li id="creator_email">
                                <label class="enter_press text_label" id="creatorUserEmail">
                                    Email : ${creatorUserEmail} <img class="user_img rounded-square users_image position" src="${firstUserImage}">
                                </label>
                            </li>`
                        );
                        // Conditionally append updater details
                        if (updated_by !== null) {
                            branchMenu.append(`
                                <li id="updator">
                                    <label class="branch_head_label">Updator</label>
                                </li>
                                <li id="timeSet">
                                    <label class="enter_press text_label" id="updatordAt">Update-Date : ${formatDate(messages.created_at)}</label>
                                </li>
                                <li id="updatordBy">
                                    <label class="enter_press text_label">Role-Name : ${updatedByRole}</label>
                                </li>
                                <li id="updator_email">
                                    <label class="enter_press text_label" id="creatorUserEmail">
                                        Email : ${messages.updator_emails.login_email} 
                                        <img class="user_img rounded-square users_image position" src="${thirdUserImage}">
                                    </label>
                                </li>
                            `);
                        }else if(updated_by === null) {
                            branchMenu.append(`
                                <li>
                                    <label class="no_data_label" hidden>No updater details available.</label>
                                </li>
                            `);
                            console.log("No updater details available as updated_by is null");
                        }
                        if (approver_by !== null) {
                            branchMenu.append(`
                                <li id="updator">
                                    <label class="branch_head_label">Approver</label>
                                </li>
                                <li id="timeSet">
                                    <label class="enter_press text_label" id="updatordAt">Approver-Date : ${formatDate(approverDate)}</label>
                                </li>
                                <li id="updatordBy">
                                    <label class="enter_press text_label">Role-Name : ${aprrovedByRole}</label>
                                </li>
                                <li id="updator_email">
                                    <label class="enter_press text_label" id="creatorUserEmail">
                                        Email : ${messages.approver_emails.login_email} 
                                        <img class="user_img rounded-square users_image position" src="${fourUserImage}">
                                    </label>
                                </li>
                            `);
                        }else if(approver_by === null) {
                            branchMenu.append(`
                                <li>
                                    <label class="no_data_label" hidden>No updater details available.</label>
                                </li>
                            `);
                            console.log("No updater details available as updated_by is null");
                        }
                        if(created_by === 1 && userRole === 1){
                            branchMenu.append(
                                `<li id="#">
                                    <label class="text_label">Permission-Access :</label>
                                    <input class="form-switch form-check-input check_permission me-2" type="checkbox" name="super_admin_approval_status" value="1" id="checkingSuperAdminAccess" ${superAdminApprovalStatus == 1 ? 'checked' : ''}>
                                    <span class="badge rounded-pill bg-success ${superAdminApprovalStatus == 1 ? '' : 'display_none'}" id="checkLabelSuperAdmin">Justify</span>
                                    <span class="badge rounded-pill bg-danger ${superAdminApprovalStatus == 0 ? '' : 'display_none'}" id="checkLabelSuperAdmin2">Refuse</span>
                                </li>
                                <li id="#">
                                    <label class="text_label">Permission- Blog :</label>
                                    <input class="form-switch form-check-input check_permission" type="checkbox" name="status" value="1" id="checkingSuperAdminBlog" ${superAdminApprovalBlogStatus ? 'checked' : ''}>
                                    <span class="badge rounded-pill bg-success ${superAdminApprovalBlogStatus == 1 ? '' : 'display_none'}" id="checkBlogLabelSuperAdmin">Justify</span>
                                    <span class="badge rounded-pill bg-danger ${superAdminApprovalBlogStatus == 0 ? '' : 'display_none'}" id="checkBlogLabelSuperAdmin2">Refuse</span>
                                </li>`
                            );
                        }else if(created_by === 3 || userRole === 3){
                            branchMenu.append(
                                `<li id="#">
                                    <label class="text_label">Permission-Access :</label>
                                    <input class="form-switch form-check-input check_permission" type="checkbox" name="admin_approval_status" value="1" id="checkingAdminAccess" ${adminApprovalStatus ? 'checked' : ''}>
                                    <span class="badge rounded-pill bg-success ${adminApprovalStatus == 1 ? '' : 'display_none'}" id="checkLabelAdmin">Justify</span>
                                    <span class="badge rounded-pill bg-danger ${adminApprovalStatus == 0 ? '' : 'display_none'}" id="checkLabelAdmin2">Refuse</span>
                                </li>`
                            );
                        }
                        $('#users_email_id').val(id);
                        // $('#change_branch_email_id').val(id);
                    }
                }
            });

        });

        // Access Permission Confirm Modal Show
        $(document).on('click', '#permission_accss_btn', function(e){
            e.preventDefault();
            $("#userAccessPermissionConfirmModal").modal('show');
            $("#userAccessPermissionModal").modal('hide');
            const time = setTimeout(() => {
                removeAttributeOrClass([
                    {
                        selector: '#access_confirm_button, #cancel_btn, .access_confirm_back, .confirm-label, #usrConfrmRole, #usrConfrmEmail',
                        type: 'class',
                        name: 'branch-skeleton'
                    },
                    {
                        selector: '#usrConfrmImage',
                        type: 'class',
                        name: 'img-branch-skeleton'
                    },
                    {
                        selector: '.access_confirm_head_title',
                        type: 'class',
                        name: 'head-branch-skeleton'
                    },

                ]);
            }, 1000);
        });

        // User Access Permission
        $(document).on('click', '#access_confirm_button', function(e){
            e.preventDefault();
            var id = $("#users_email_id").val();
            
            var superAdminApprovalStatus = $("input[name='super_admin_approval_status']:checked").val();
            var adminApprovalStatus = $("input[name='admin_approval_status']:checked").val();
            var userBlogStatus = $("input[name='status']:checked").val();
            var branchID = $("#branch_ids").attr("data-branch-id");
            var branchType = $("#branch_types").attr("data-branch-id");
            var branchName = $("#branch_names").attr("data-branch-id");
            var divisionName = $("#division_names").attr("data-branch-id");
            var districtName = $("#district_names").attr("data-branch-id");
            var upazilaName = $("#upazila_names").attr("data-branch-id");
            var townName = $("#town_names").attr("data-branch-id");
            var location = $("#locations").attr("data-branch-id");

            const current_url = "{{route('permission_status.action')}}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: current_url,
                dataType: 'json',
                data: {
                    id: id,
                    super_admin_approval_status: superAdminApprovalStatus ? 1 : 0,
                    admin_approval_status: adminApprovalStatus ? 1 : 0,
                    status: userBlogStatus ? 1 : 0,
                    branch_id: branchID,
                    branch_type: branchType,
                    branch_name: branchName,
                    division_name: divisionName,
                    district_name: districtName,
                    upazila_name: upazilaName,
                    town_name: townName,
                    location: location,
                },
                success: function(response) {
                    $("#userAccessActionModal").modal('hide');
                    $("#userAccessPermissionConfirmModal").modal('hide');
                    $("#userAccessPermissionModal").modal('hide');
                    if (response.status === 202) {
                        $("#accessconfirmbranch").modal('show');
                        $("#processingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#processingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            //$('#updateForm_error').html("");
                            $('#success_messages').html("");
                            $('#success_messages').addClass('alert_show ps-1 pe-1');
                            $('#success_messages').fadeIn();
                            $("#success_messages").text(response.messages);

                            $("#checkingSuperAdminAccess").prop("checked", false);
                            $("#checkingSuperAdminBlog").prop("checked", false);
                            $("#checkingAdminAccess").prop("checked", false);

                            setTimeout(() => {
                                $("#success_messages").fadeOut();
                            }, 3000);
                        }, 3000);
                        searchBranchFetch();
                        searchRoleFetch();
                        searchEmailFetch();
                    } 
                }
            });
        });

        // Branch Change Modal
        $(document).on('click', '#branch_change_btn', function(e){
            e.preventDefault();
            // Clear Select2 fields reliably with delay
            setTimeout(function() {
                $('#branch_role_id').val(null).trigger('change');
                $('#branch_email_id').val(null).trigger('change');
            }, 100);
            $("#branchChange").modal('show');
            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.btn-close, .branch-nmT, .branch-rest, .role_nme', type: 'class', name: 'branch-skeleton' },
                    { selector: '.change_title', type: 'class', name: 'branch-skeleton' },
                    { selector: '#cancel_change', type: 'class', name: 'branch-skeleton' },
                    { selector: '#branch_id_btn', type: 'class', name: 'chn-btn-branch-skeleton' },
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            };
        });

        // Branch Change Modal
        $(document).on('click', '.branch_id_btn', function(e){
            e.preventDefault();
            addAttributeOrClass([
                { selector: '.first_part', type: 'class', name: 'branch-skeleton' },
                { selector: '.cancel_change_box', type: 'class', name: 'branch-skeleton' },
                { selector: '.branch_name_heading', type: 'class', name: 'hd-branch-skeleton' },
                { selector: '.second_part', type: 'class', name : 'branch-content-skeleton'},
                { selector: '.third_part', type: 'class', name : 'branch-content-footer-skeleton'},
                { selector: '#cancle_change', type: 'class', name: 'branch-skeleton' },
                { selector: '.change_btn_confirm, #cancle_change', type: 'class', name: 'mn-branch-skeleton' },
            ]);
            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.first_part', type: 'class', name: 'branch-skeleton' },
                    { selector: '.cancel_change_box', type: 'class', name: 'branch-skeleton' },
                    { selector: '#cancle_change', type: 'class', name: 'branch-skeleton' },
                    { selector: '.branch_name_heading', type: 'class', name: 'hd-branch-skeleton' },
                    { selector: '.second_part', type: 'class', name : 'branch-content-skeleton'},
                    { selector: '.third_part', type: 'class', name : 'branch-content-footer-skeleton'},
                    { selector: '.change_btn_confirm, #cancle_change', type: 'class', name: 'mn-branch-skeleton' },
                ]);
            }, 3000);

            return () => {
                clearTimeout(time);
            };
        });

        // Cancel or close Branch Modal
        $(document).on('click', '.modal_close , #cancel_change', function(){
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

        // Back Branch Modal
        $(document).on('click', '.cancel_change_box, #cancle_change', function(e){
            $("#userBranchChangeModal").modal('hide');
            $("#branchChange").modal('show');
        });

        // Branch Change
        $(document).on('click', '#branch_id_btn', function(e){
            e.preventDefault();
            var id = $("#branch_email_id").val();
            var role_id = $("#branch_role_id").val();

            $("#users_branch_email_id").empty();
            $("#user_branch_menu_change").empty();
            $(".branch_name_hd").empty();
            $("#usrImage3").empty();
            $("#usrRole3").empty();
            $("#usrEmail3").empty();
            $("#usrConfrmImage").empty();
            $("#usrConfrmRole").empty();
            $("#usrConfrmEmail").empty();
            
            const current_url = "/company/branch-user-change/" + id;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function(response) {
                    //console.log(response.messages);
                    if(response.status === 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    }else if(response.status === 200){
                        $("#branchChange").modal('hide');
                        $("#accessconfirmbranch").modal('show');
                        $("#dataPullingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        setTimeout(() => {
                            $("#userBranchChangeModal").modal('show');
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                        }, 1500);
                        var userRole = {{ auth()->user()->role }};
                        const messages = response.messages;
                        const created_by = messages.created_by;
                        const updated_by = messages.updated_by;
                        const approver_by = messages.approver_by;
                        const creatorUserEmail = messages.creator_emails.login_email;
                        const adminApprovalStatus = messages.admin_approval_status;
                        const superAdminApprovalStatus = messages.super_admin_approval_status;
                        const superAdminApprovalBlogStatus = messages.status;
                        
                        let createdByRole;
                        let updatedByRole;
                        let aprrovedByRole;
                        let approverDate;

                        const firstUserImage = messages.created_users.image.includes('https://') 
                            ? messages.created_users.image 
                            : `${window.location.origin}/storage/image/user-image/${messages.created_users.image}`;
                        const secondUserImage = messages.user_emails.image.includes('https://') 
                            ? messages.user_emails.image 
                            : `${window.location.origin}/storage/image/user-image/${messages.user_emails.image}`;
                        const thirdUserImage = 
                            messages.updated_users && messages.updated_users.image 
                            ? (messages.updated_users.image.includes('https://') 
                                ? messages.updated_users.image 
                                : `${window.location.origin}/storage/image/user-image/${messages.updated_users.image}`)
                            : `${window.location.origin}/image/default.png`;

                        const fourUserImage = 
                            messages.approver_users && messages.approver_users.image 
                            ? (messages.approver_users.image.includes('https://') 
                                ? messages.approver_users.image 
                                : `${window.location.origin}/storage/image/user-image/${messages.approver_users.image}`)
                            : `${window.location.origin}/image/default.png`;

                        const roles = {
                            1: 'SuperAdmin',
                            2: 'Sub-Admin',
                            3: 'Admin',
                            0: 'User',
                            5: 'Accounts',
                            6: 'Marketing',
                            7: 'Delivery Team',
                        };

                        createdByRole = roles[created_by] || 'Unknown';
                        updatedByRole = roles[updated_by] || '--';
                        aprrovedByRole = roles[approver_by] || '--';
                        if(approver_by === 1){
                            approverDate = messages.super_admin_approver_date;
                        }else if(approver_by === 3){
                            approverDate = messages.admin_approver_date;
                        }

                        const branchMenu = $("#user_branch_menu_change");
                        const branchName = $(".branch_name_hd");
                        const usrImg = $("#usrImage3, #usrConfrmImage");
                        const usrRole = $("#usrRole3, #usrConfrmRole");
                        const usrEmail = $("#usrEmail3, #usrConfrmEmail");

                        // Append user details
                        branchName.append(`<span class="word_space">${messages.branch_name}</span>`);
                        usrRole.append(`<span class="word_space">${messages.user_roles.name}</span>`);
                        usrEmail.append(`<span class="word_space">${messages.user_emails.login_email}</span>`);
                        usrImg.append(`<span class="word_space"><img class="user_img rounded-square users_image position" src="${secondUserImage}"></span>`);

                        branchMenu.append(
                            `<li value="" id="branch_info">
                                <label class="branch_head_label">Branch information</label>
                            </li>
                            <li value="${messages.id}" id="branch_ids" data-branch-id="${messages.branch_id}">
                                <label class="enter_press text_label">Branch-ID : ${messages.branch_id}</label>
                            </li>
                            <li id="branch_types" data-branch-id="${messages.branch_type}">
                                <label class="enter_press text_label">Branch-Type : ${messages.branch_type}</label>
                            </li>
                            <li id="branch_names" data-branch-id="${messages.branch_name}">
                                <label class="enter_press text_label">Branch-Name : ${messages.branch_name}</label>
                            </li>
                            <li id="division_names" data-branch-id="${messages.divisions.division_name}">
                                <label class="enter_press text_label">Division-Name : ${messages.divisions.division_name}</label>
                            </li>
                            <li id="district_names" data-branch-id="${messages.districts.district_name}">
                                <label class="enter_press text_label">District-Name : ${messages.districts.district_name}</label>
                            </li>
                            <li id="upazila_names" data-branch-id="${messages.thana_or_upazilas.thana_or_upazila_name}">
                                <label class="enter_press text_label">Upazila-Name : ${messages.thana_or_upazilas.thana_or_upazila_name}</label>
                            </li>
                            <li id="town_names" data-branch-id="${messages.town_name}">
                                <label class="enter_press text_label">City-Name : ${messages.town_name}</label>
                            </li>
                            <li id="locations" data-branch-id="${messages.location}">
                                <label class="enter_press text_label">Branch-Location : ${messages.location}</label>
                            </li>
                            <li id="Creator">
                                <label class="branch_head_label">Creator</label>
                            </li>
                            <li id="creatorCreatedAt">
                                <label class="enter_press text_label">Created-Date : ${formatDate(messages.created_at)}</label>
                            </li>
                            <li id="creatorCreatedBy">
                                <label class="enter_press text_label">Role-Name : ${createdByRole}</label>
                            </li>
                            <li id="creator_email">
                                <label class="enter_press text_label" id="creatorUserEmail">
                                    Email : ${creatorUserEmail} <img class="user_img rounded-square users_image position" src="${firstUserImage}">
                                </label>
                            </li>`
                        );
                        // Conditionally append updater details
                        if (updated_by !== null) {
                            branchMenu.append(`
                                <li id="updator">
                                    <label class="branch_head_label">Updator</label>
                                </li>
                                <li id="timeSet">
                                    <label class="enter_press text_label" id="updatordAt">Update-Date : ${formatDate(messages.updated_at)}</label>
                                </li>
                                <li id="updatordBy">
                                    <label class="enter_press text_label">Role-Name : ${updatedByRole}</label>
                                </li>
                                <li id="updator_email">
                                    <label class="enter_press text_label" id="creatorUserEmail">
                                        Email : ${messages.updator_emails.login_email} 
                                        <img class="user_img rounded-square users_image position" src="${thirdUserImage}">
                                    </label>
                                </li>
                            `);
                        }else if(updated_by === null) {
                            branchMenu.append(`
                                <li>
                                    <label class="no_data_label" hidden>No updater details available.</label>
                                </li>
                            `);
                            console.log("No updater details available as updated_by is null");
                        }
                        if (approver_by !== null) {
                            branchMenu.append(`
                                <li id="updator">
                                    <label class="branch_head_label">Approver</label>
                                </li>
                                <li id="timeSet">
                                    <label class="enter_press text_label" id="updatordAt">Approver-Date : ${formatDate(approverDate)}</label>
                                </li>
                                <li id="updatordBy">
                                    <label class="enter_press text_label">Role-Name : ${aprrovedByRole}</label>
                                </li>
                                <li id="updator_email">
                                    <label class="enter_press text_label" id="creatorUserEmail">
                                        Email : ${messages.approver_emails.login_email} 
                                        <img class="user_img rounded-square users_image position" src="${fourUserImage}">
                                    </label>
                                </li>
                            `);
                        }else if(approver_by === null) {
                            branchMenu.append(`
                                <li>
                                    <label class="no_data_label" hidden>No updater details available.</label>
                                </li>
                            `);
                            console.log("No updater details available as updated_by is null");
                        }
                        if(created_by === 1 && userRole === 1){
                            branchMenu.append(
                                `<li id="#">
                                    <label class="text_label">Permission-Access :
                                        <span class="badge rounded-pill bg-success ${superAdminApprovalStatus == 1 ? '' : 'display_none'}" id="checkLabelSuperAdmin">Justify</span>
                                        <span class="badge rounded-pill bg-danger ${superAdminApprovalStatus == 0 ? '' : 'display_none'}" id="checkLabelSuperAdmin2">Refuse</span>
                                    </label>
                                </li>
                                <li id="#">
                                    <label class="text_label">Permission- Blog :
                                        <span class="badge rounded-pill bg-success ${superAdminApprovalBlogStatus == 1 ? '' : 'display_none'}" id="checkBlogLabelSuperAdmin">Justify</span>
                                        <span class="badge rounded-pill bg-danger ${superAdminApprovalBlogStatus == 0 ? '' : 'display_none'}" id="checkBlogLabelSuperAdmin2">Refuse</span>
                                    </label>
                                </li>`
                            );
                        }else if(created_by === 3 || userRole === 3){
                            branchMenu.append(
                                `<li id="#">
                                    <label class="text_label">Permission-Access :</label>
                                    <span class="badge rounded-pill bg-success ${adminApprovalStatus == 1 ? '' : 'display_none'}" id="checkLabelAdmin">Justify</span>
                                    <span class="badge rounded-pill bg-danger ${adminApprovalStatus == 0 ? '' : 'display_none'}" id="checkLabelAdmin2">Refuse</span>
                                </li>`
                            );
                        }
                        $('#users_branch_change_id').val(id);
                        $('#users_branch_email_id').val(id);
                        $("#branch_change_role_id").val(role_id);
                    }
                }
            });
        });

        // Branch Change Handle
        $(document).on('change', '#branch_name_id', function(){
            var selectedOption = $(this).find('option:selected');
            // Update hidden inputs with selected option's data attributes
            $("#change_branch_id").val(selectedOption.data("branch_id"));
            $("#change_branch_type").val(selectedOption.data("branch_type"));
            $("#change_branch_name").val(selectedOption.data("branch_name"));
            $("#change_division_id").val(selectedOption.data("division_id"));
            $("#change_district_id").val(selectedOption.data("district_id"));
            $("#change_upazila_id").val(selectedOption.data("upazila_id"));
            $("#change_town_name").val(selectedOption.data("town_name"));
            $("#change_location").val(selectedOption.data("location"));

        });

        // Confirm Branch Change
        $(document).on('click', '#change_btn_confirm', function(e){
            
            // for user_branch_access_permissions table 
            var id = $("#users_branch_email_id").val();
            var branch_id = $("#change_branch_id").val();
            var change_branch_type = $("#change_branch_type").val();
            var change_branch_name = $("#change_branch_name").val();
            var change_division_id = $("#change_division_id").val();
            var change_district_id = $("#change_district_id").val();
            var change_upazila_id = $("#change_upazila_id").val();
            var change_town_name = $("#change_town_name").val();
            var change_location = $("#change_location").val();
            
            const current_url = "/company/branch-user-permission-update/" + id;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: current_url,
                dataType: 'json',
                data: {
                    branch_id : branch_id,
                    branch_type : change_branch_type,
                    branch_name : change_branch_name,
                    division_id : change_division_id,
                    district_id : change_district_id,
                    upazila_id : change_upazila_id,
                    town_name : change_town_name,
                    location : change_location,
                },
                success: function(response) {
                    $("#branchChange").modal('hide');
                    $("#userBranchChangeModal").modal('hide');
                    if(response.status === 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    }else if(response.status === 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#processingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#processingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $("#success_message").text(response.messages);
                            // Clear Select2 fields reliably with delay
                            setTimeout(function() {
                                $('#branch_role_id').val(null).trigger('change');
                                $('#branch_email_id').val(null).trigger('change');
                                $('#branch_name_id').val(null).trigger('change');
                            }, 100);

                            setTimeout(() => {
                                $("#success_message").fadeOut();
                            }, 3000);
                        }, 3000);
                        searchBranchFetch();
                        searchRoleFetch();
                        searchEmailFetch();
                    }
                }
            });
        });

        // User Branch Delete .... Search Data
        $(document).on('click', '#access_branch_delete', function(e){
            e.preventDefault();
            $("#user_branch_menu").empty();
            $(".branch_name_head").empty();
            $("#delete_branch_id").empty();
            $("#branch__id").empty();
            $("#usrImage4, #usrConfrmImage").empty();
            $("#usrRole4, #usrConfrmRole").empty();
            $("#usrEmail4, #usrConfrmEmail").empty();

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
                            $("#deletebranch").modal('show');
                        }, 1500);
                        var userRole = {{ auth()->user()->role }};
                        const messages = response.messages;
                        const created_by = messages.created_by;
                        const updated_by = messages.updated_by;
                        const approver_by = messages.approver_by;
                        const creatorUserEmail = messages.creator_emails.login_email;
                        const adminApprovalStatus = messages.admin_approval_status;
                        const superAdminApprovalStatus = messages.super_admin_approval_status;
                        const superAdminApprovalBlogStatus = messages.status;
                        
                        let createdByRole;
                        let updatedByRole;
                        let aprrovedByRole;
                        let approverDate;

                        const firstUserImage = messages.created_users.image.includes('https://') 
                            ? messages.created_users.image 
                            : `${window.location.origin}/storage/image/user-image/${messages.created_users.image}`;
                        const secondUserImage = messages.user_emails.image.includes('https://') 
                            ? messages.user_emails.image 
                            : `${window.location.origin}/storage/image/user-image/${messages.user_emails.image}`;
                        const thirdUserImage = 
                            messages.updated_users && messages.updated_users.image 
                            ? (messages.updated_users.image.includes('https://') 
                                ? messages.updated_users.image 
                                : `${window.location.origin}/storage/image/user-image/${messages.updated_users.image}`)
                            : `${window.location.origin}/image/default.png`;

                        const fourUserImage = 
                            messages.approver_users && messages.approver_users.image 
                            ? (messages.approver_users.image.includes('https://') 
                                ? messages.approver_users.image 
                                : `${window.location.origin}/storage/image/user-image/${messages.approver_users.image}`)
                            : `${window.location.origin}/image/default.png`;

                        const roles = {
                            1: 'SuperAdmin',
                            2: 'Sub-Admin',
                            3: 'Admin',
                            0: 'User',
                            5: 'Accounts',
                            6: 'Marketing',
                            7: 'Delivery Team',
                        };

                        createdByRole = roles[created_by] || 'Unknown';
                        updatedByRole = roles[updated_by] || '--';
                        aprrovedByRole = roles[approver_by] || '--';
                        if(approver_by === 1){
                            approverDate = messages.super_admin_approver_date;
                        }else if(approver_by === 3){
                            approverDate = messages.admin_approver_date;
                        }

                        const branchMenu = $("#user_branch_menu");
                        const branchName = $(".branch_name_head");
                        const branchId = $("#delete_branch_id, #branch__id");
                        const usrRole = $("#usrRole4, #usrConfrmRole");
                        const usrEmail = $("#usrEmail4, #usrConfrmEmail");
                        const usrImg = $("#usrImage4, #usrConfrmImage");

                        // Append user details
                        branchId.append(`<span class="">${messages.branch_id}</span>`);
                        branchName.append(`<span class="word_space">${messages.branch_name}</span>`);
                        usrRole.append(`<span class="usrConfrmRole word_space">${messages.user_roles.name}</span>`);
                        usrEmail.append(`<span class="usrConfrmEmail word_space">${messages.user_emails.login_email}</span>`);
                        usrImg.append(`<span class="usrConfrmImage word_space"><img class="user_img rounded-square users_image position" src="${secondUserImage}"></span>`);

                        branchMenu.append(
                            `<li value="" id="branch_info">
                                <label class="branch_head_label">Branch information</label>
                            </li>
                            <li value="${messages.id}" id="branch_ids" data-branch-id="${messages.branch_id}">
                                <label class="enter_press text_label">Branch-ID : ${messages.branch_id}</label>
                            </li>
                            <li id="branch_types" data-branch-id="${messages.branch_type}">
                                <label class="enter_press text_label">Branch-Type : ${messages.branch_type}</label>
                            </li>
                            <li id="branch_names" data-branch-id="${messages.branch_name}">
                                <label class="enter_press text_label">Branch-Name : ${messages.branch_name}</label>
                            </li>
                            <li id="division_names" data-branch-id="${messages.divisions.division_name}">
                                <label class="enter_press text_label">Division-Name : ${messages.divisions.division_name}</label>
                            </li>
                            <li id="district_names" data-branch-id="${messages.districts.district_name}">
                                <label class="enter_press text_label">District-Name : ${messages.districts.district_name}</label>
                            </li>
                            <li id="upazila_names" data-branch-id="${messages.thana_or_upazilas.thana_or_upazila_name}">
                                <label class="enter_press text_label">Upazila-Name : ${messages.thana_or_upazilas.thana_or_upazila_name}</label>
                            </li>
                            <li id="town_names" data-branch-id="${messages.town_name}">
                                <label class="enter_press text_label">City-Name : ${messages.town_name}</label>
                            </li>
                            <li id="locations" data-branch-id="${messages.location}">
                                <label class="enter_press text_label">Branch-Location : ${messages.location}</label>
                            </li>
                            <li id="Creator">
                                <label class="branch_head_label">Creator</label>
                            </li>
                            <li id="creatorCreatedAt">
                                <label class="enter_press text_label">Created-Date : ${formatDate(messages.created_at)}</label>
                            </li>
                            <li id="creatorCreatedBy">
                                <label class="enter_press text_label">Role-Name : ${createdByRole}</label>
                            </li>
                            <li id="creator_email">
                                <label class="enter_press text_label" id="creatorUserEmail">
                                    Email : ${creatorUserEmail} <img class="user_img rounded-square users_image position" src="${firstUserImage}">
                                </label>
                            </li>`
                        );
                        // Conditionally append updater details
                        if (updated_by !== null) {
                            branchMenu.append(`
                                <li id="updator">
                                    <label class="branch_head_label">Updator</label>
                                </li>
                                <li id="timeSet">
                                    <label class="enter_press text_label" id="updatordAt">Update-Date : ${formatDate(messages.created_at)}</label>
                                </li>
                                <li id="updatordBy">
                                    <label class="enter_press text_label">Role-Name : ${updatedByRole}</label>
                                </li>
                                <li id="updator_email">
                                    <label class="enter_press text_label" id="creatorUserEmail">
                                        Email : ${messages.updator_emails.login_email} 
                                        <img class="user_img rounded-square users_image position" src="${thirdUserImage}">
                                    </label>
                                </li>
                            `);
                        }else if(updated_by === null) {
                            branchMenu.append(`
                                <li>
                                    <label class="no_data_label" hidden>No updater details available.</label>
                                </li>
                            `);
                            console.log("No updater details available as updated_by is null");
                        }
                        if (approver_by !== null) {
                            branchMenu.append(`
                                <li id="updator">
                                    <label class="branch_head_label">Approver</label>
                                </li>
                                <li id="timeSet">
                                    <label class="enter_press text_label" id="updatordAt">Approver-Date : ${formatDate(approverDate)}</label>
                                </li>
                                <li id="updatordBy">
                                    <label class="enter_press text_label">Role-Name : ${aprrovedByRole}</label>
                                </li>
                                <li id="updator_email">
                                    <label class="enter_press text_label" id="creatorUserEmail">
                                        Email : ${messages.approver_emails.login_email} 
                                        <img class="user_img rounded-square users_image position" src="${fourUserImage}">
                                    </label>
                                </li>
                            `);
                        }else if(approver_by === null) {
                            branchMenu.append(`
                                <li>
                                    <label class="no_data_label" hidden>No updater details available.</label>
                                </li>
                            `);
                            console.log("No updater details available as updated_by is null");
                        }
                        if(created_by === 1 && userRole === 1){
                            branchMenu.append(
                                `<li id="#">
                                    <label class="text_label">Permission-Access :</label>
                                    <input class="form-switch form-check-input check_permission me-2" type="checkbox" name="super_admin_approval_status" value="1" id="checkingSuperAdminAccess" ${superAdminApprovalStatus == 1 ? 'checked' : ''}>
                                    <span class="badge rounded-pill bg-success ${superAdminApprovalStatus == 1 ? '' : 'display_none'}" id="checkLabelSuperAdmin">Justify</span>
                                    <span class="badge rounded-pill bg-danger ${superAdminApprovalStatus == 0 ? '' : 'display_none'}" id="checkLabelSuperAdmin2">Refuse</span>
                                </li>
                                <li id="#">
                                    <label class="text_label">Permission- Blog :</label>
                                    <input class="form-switch form-check-input check_permission" type="checkbox" name="status" value="1" id="checkingSuperAdminBlog" ${superAdminApprovalBlogStatus ? 'checked' : ''}>
                                    <span class="badge rounded-pill bg-success ${superAdminApprovalBlogStatus == 1 ? '' : 'display_none'}" id="checkBlogLabelSuperAdmin">Justify</span>
                                    <span class="badge rounded-pill bg-danger ${superAdminApprovalBlogStatus == 0 ? '' : 'display_none'}" id="checkBlogLabelSuperAdmin2">Refuse</span>
                                </li>`
                            );
                        }else if(created_by === 3 || userRole === 3){
                            branchMenu.append(
                                `<li id="#">
                                    <label class="text_label">Permission-Access :</label>
                                    <input class="form-switch form-check-input check_permission" type="checkbox" name="admin_approval_status" value="1" id="checkingAdminAccess" ${adminApprovalStatus ? 'checked' : ''}>
                                    <span class="badge rounded-pill bg-success ${adminApprovalStatus == 1 ? '' : 'display_none'}" id="checkLabelAdmin">Justify</span>
                                    <span class="badge rounded-pill bg-danger ${adminApprovalStatus == 0 ? '' : 'display_none'}" id="checkLabelAdmin2">Refuse</span>
                                </li>`
                            );
                        }
                        $('#user_email_id').val(id);
                        $('#branch_delete_id').val(id);
                    }
                }
            });

        });

        // User Branch Delete Modal Show
        $(document).on('click', '#access_branch_delete', function(e){
            e.preventDefault();
            addAttributeOrClass([
                {
                    selector: '.hedng, .hedng_btn, #load_id, .confirm-label, #usrConfrmRole, #usrConfrmEmail, .first_part',
                    type: 'class',
                    name: 'branch-skeleton'
                },
                {
                    selector: '#usrConfrmImage',
                    type: 'class',
                    name: 'img-branch-skeleton'
                },
                {
                    selector: '.access_confirm_head_title',
                    type: 'class',
                    name: 'head-branch-skeleton'
                },
                {
                    selector: '#yesButton, #noButton',
                    type: 'class',
                    name: 'branch-delete-skeleton'
                },
                {
                    selector: '.hedng',
                    type: 'class',
                    name: 'hd-branch-skeleton'
                },

            ]);
            const time = setTimeout(() => {
                removeAttributeOrClass([
                    {
                        selector: '.hedng, .hedng_btn, #load_id, .confirm-label, #usrConfrmRole, #usrConfrmEmail, .first_part',
                        type: 'class',
                        name: 'branch-skeleton'
                    },
                    {
                        selector: '#usrConfrmImage',
                        type: 'class',
                        name: 'img-branch-skeleton'
                    },
                    {
                        selector: '.access_confirm_head_title',
                        type: 'class',
                        name: 'head-branch-skeleton'
                    },
                    {
                        selector: '#yesButton, #noButton',
                        type: 'class',
                        name: 'branch-delete-skeleton'
                    },
                    {
                        selector: '.hedng',
                        type: 'class',
                        name: 'hd-branch-skeleton'
                    },

                ]);
            }, 4000);
        });

        // User Branch Delete Modal Back
        $(document).on('click', '.hedng_btn, #noButton', function(e){
            e.preventDefault();
            $("#deletebranch").modal('hide');
            $("#userAccessActionModal").modal('show');
        });

        // User Branch Confirm Delete Modal Back
        $(document).on('click', '.head_btn2, #cate_delete3', function(e){
            e.preventDefault();
            $("#deleteconfirmbranch").modal('hide');
            $("#deletebranch").modal('show');
        });

        // User Branch Confirm Delete Modal
        $(document).on('click', '#yesButton', function(e){
            e.preventDefault();
            var id = $("#branch_delete_id").val();
            $("#usrConfrmImage").empty();
            $("#usrConfrmRole").empty();
            $("#usrConfrmEmail").empty();
            $(".usrConfrmRole").removeClass('word_space').addClass('word_title');
            $(".usrConfrmEmail").removeClass('word_space').addClass('word_title');
            $(".usrConfrmImage").removeClass('word_space').addClass('word_title');
            $("#deletebranch").modal('hide');
            $("#accessconfirmbranch").modal('show');
            $("#loadingProgress").removeAttr('hidden');
            $("#access_modal_box").addClass('progress_body');
            $("#processModal_body").addClass('loading_body_area');
            setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#loadingProgress").attr('hidden', true);
                $("#access_modal_box").removeClass('progress_body');
                $("#processModal_body").removeClass('loading_body_area');
                $("#deleteconfirmbranch").modal('show');
            }, 1500);

            addAttributeOrClass([
                {
                    selector: '.confirm_title, .head_btn2, .admin_paragraph, #delete_branch, #cate_delete3',
                    type: 'class',
                    name: 'branch-skeleton'
                },

            ]);
            const time = setTimeout(() => {
                removeAttributeOrClass([
                    {
                        selector: '.confirm_title, .head_btn2, .admin_paragraph, #delete_branch, #cate_delete3',
                        type: 'class',
                        name: 'branch-skeleton'
                    },

                ]);
            }, 3000);
        });

        // User Branch Confirm Delete
        $(document).on('click', '#delete_branch', function(e){
            e.preventDefault();
            var id = $("#branch_delete_id").val();
            var branchID = "null";
            var branchType = "null";
            var branchName = "null";
            var divisionName = "null";
            var districtName = "null";
            var upazilaName = "null";
            var townName = "null";
            var location = "null";

            const current_url = "/company/branch-user-permission-delete/" + id;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: current_url,
                dataType: 'json',
                data: {
                    id: id,
                    branch_id: branchID,
                    branch_type: branchType,
                    branch_name: branchName,
                    division_name: divisionName,
                    district_name: districtName,
                    upazila_name: upazilaName,
                    town_name: townName,
                    location: location,
                },
                success: function(response) {
                    $("#deleteconfirmbranch").modal('hide');
                    $("#deletebranch").modal('hide');
                    $("#userAccessPermissionModal").modal('hide');
                    if (response.status === 200) {
                        $("#accessconfirmbranch").modal('show');
                        $("#processingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#processingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $('#success_messages').html("");
                            $('#success_messages').addClass('alert_show ps-1 pe-1');
                            $('#success_messages').fadeIn();
                            $("#success_messages").text(response.messages);

                            setTimeout(() => {
                                $("#success_messages").fadeOut();
                            }, 3000);
                        }, 3000);
                        searchBranchFetch();
                        searchRoleFetch();
                        searchEmailFetch();
                    } 
                }
            });
        });
       
    });
</script>