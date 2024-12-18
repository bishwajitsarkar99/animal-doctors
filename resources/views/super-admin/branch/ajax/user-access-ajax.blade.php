<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
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

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            
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
                    branchMenu.append('<li tabindex="0" value="" disabled>Error Loading Data</li>');
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
                    const roleMenu = $("#role_menu");
                    roleMenu.empty();
                    $.each(branch_roles, function(key, item) {
                        roleMenu.append(
                            `<li tabindex="0" value="${item.id}" id="role_select_list_item">
                                ${item.name}
                                <label class="role_enter_press enter-focus">Enter Press <i class="fa-solid fa-link"></i></label>
                                <span class="badge bg-dark-cornflowerblue rounded-pill bage_display_none" id="roleNum">
                                    12
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
                    roleMenu.append('<li tabindex="0" value="" disabled>Error Loading Data</li>');
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
        $(document).on('click', '#tabAccess', function(){
            searchBranchFetch();
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
    });
</script>
<script>
    function initializeMenuEvents(menuId, roleClass = false) {
        const menu = document.getElementById(menuId);
        const menuItems = menu.querySelectorAll('li');
        const menuSpans = menu.querySelectorAll('span');
        const menuPressEnter = menu.querySelectorAll(roleClass ? '.role_enter_press' : menuId === 'email_menu' ? '.email_enter_press' : '.enter_press');
        const menuRole = menu.querySelectorAll(roleClass ? '#role_select_list_item' : menuId === 'email_menu' ? '#email_select_list_item' : '#select_list_item');
        let currentIndex = -1;
        let menuVisible = true;

        // Clear previous keydown listener
        document.removeEventListener('keydown', handleKeydown);

        // Attach keydown listener
        document.addEventListener('keydown', handleKeydown);

        // Add click event listeners for menu items
        menuItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentIndex = index;
                updateHighlight();
            });
        });

        function handleKeydown(event) {
            if (!menuVisible) return;

            if (event.key === 'ArrowDown') {
                currentIndex = (currentIndex + 1) % menuItems.length; // Move down
            } else if (event.key === 'ArrowUp') {
                currentIndex = (currentIndex - 1 + menuItems.length) % menuItems.length; // Move up
            } else if (event.key === 'ArrowRight') {
                // Switch to the next menu
                if (menuId === 'branch_menu') {
                    document.removeEventListener('keydown', handleKeydown);
                    initializeMenuEvents('role_menu', true);
                    return;
                } else if (menuId === 'role_menu') {
                    document.removeEventListener('keydown', handleKeydown);
                    initializeMenuEvents('email_menu');
                    return;
                }
            } else if (event.key === 'ArrowLeft') {
                // Switch to the previous menu
                if (menuId === 'email_menu') {
                    document.removeEventListener('keydown', handleKeydown);
                    initializeMenuEvents('role_menu', true);
                    return;
                } else if (menuId === 'role_menu') {
                    document.removeEventListener('keydown', handleKeydown);
                    initializeMenuEvents('branch_menu');
                    return;
                }
            } else if (event.key === 'Escape') {
                // Toggle visibility
                menuVisible = !menuVisible;
                menu.style.display = menuVisible ? 'block' : 'none';
                if (!menuVisible) currentIndex = -1; // Reset index when hidden
                return;
            }

            updateHighlight();
        }

        function updateHighlight() {
            menuItems.forEach((item, index) => {
                const span = menuSpans[index];
                const enter = menuPressEnter[index];
                const role = menuRole[index];
                if (index === currentIndex) {
                    item.classList.add('highlight');
                    if (span) {
                        span.classList.add('bage_display');
                        span.classList.remove('bage_display_none');
                    }
                    if (enter) {
                        enter.classList.add('bage_display');
                        enter.classList.remove('bage_display_none');
                    }
                    if (role) {
                        role.setAttribute('data-val', '1');
                    }
                    item.blur();
                } else {
                    item.classList.remove('highlight');
                    if (span) {
                        span.classList.remove('bage_display');
                        span.classList.add('bage_display_none');
                    }
                    if (enter) {
                        enter.classList.remove('bage_display');
                        enter.classList.add('bage_display_none');
                    }
                    if (role) {
                        role.setAttribute('data-val', '0');
                    }
                }
            });
            // Ensure the focused item is properly set
            if (currentIndex >= 0) {
                const currentItem = menuItems[currentIndex];
                currentItem.classList.add('highlight');
                currentItem.focus();
            }
        }

        // Automatically highlight the first item when the menu is shown
        if (menuVisible && menuItems.length > 0) {
            currentIndex = 0;
            updateHighlight();
        }
    }
    
</script>