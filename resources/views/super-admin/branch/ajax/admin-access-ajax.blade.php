<script type="module">
    import { currentDate, formatDate, buttonLoader , removeAttributeOrClass, addAttributeOrClass,
        resize, 
        applySavedColumnOrder,
    } from "/module/backend-module/backend-module-min.js";
    buttonLoader();

    // ========================================================
    // Branch Access Creator, Updator and Approver Table Resize
    // ========================================================
    resize('branchCreatorTable', 'col-resizer', 'row-resizer');
    applySavedColumnOrder('branchCreatorTable');
    // ========================================================
    // Branch Info Table Resize
    // ========================================================
    resize('branchInfosTable', 'col-resizer', 'row-resizer');
    applySavedColumnOrder('branchInfosTable');

    $(document).ready(function(){
        // Initialize role fetch
        fetch_role_one();
        fetch_role_two();
        fetch_user_email_one();
        fetch_admin_access_role();
        fetch_admin_email_access();
        fetch_user_email_two();
        // Initialize the button loader for the login button
        // buttonLoader('#access_btn', '.access-icon', '.access-btn-text', 'Access Promot...', 'Access Promot', 1000);
        buttonLoader('#access_btn_confirm', '.access-confirm-icon', '.access-confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#cnl_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);
        let debounceTimer;
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if ($(this).attr('id') === 'select_branch_search') {
                $(this).select2({
                    placeholder: 'Select Company Branch Name',
                    allowClear: true,
                    width: '100%'
                });
            }else if ($(this).attr('id') === 'select_role_one') {
                $(this).select2({
                    placeholder: 'Select Role',
                    allowClear: true,
                    width: '100%'
                });
            }else if ($(this).attr('id') === 'select_email_one') {
                $(this).select2({
                    placeholder: 'Select User Email Address',
                    allowClear: true,
                    width: '100%'
                });
            }else if ($(this).attr('id') === 'select_user_email') {
                $(this).select2({
                    placeholder: 'Select User Email',
                    allowClear: true,
                    width: '100%'
                });
            }
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_branch_search').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch...');
        });
        $('#role_type').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role play...');
        });
        $('#select_role_one').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role...');
        });
        $('#select_email_one').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
        });
        $('#select_user_email').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
        });

        // Reinitialize Select2 for first modals
        function initializeSelect2(modalSelector) {
            $(modalSelector).on('shown.bs.modal', function () {
                $(this).find('.select2').each(function () {
                    const id = $(this).attr('id');
                    let placeholderText = 'Select an option';

                    const placeholders = {
                        'admin_branch_name': 'Select Branch Name',
                        'admin_roleID': 'Select Admin Role',
                        'admin_emailID': 'Select Admin Email',
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
        initializeSelect2('#adminBranchChangeModal');

        // Role Type
        $(document).on('change', '#role_type', function(){

            var roleValue = $(this).val();

            if(roleValue == 'Admin Role'){
                $("#adminRole").removeAttr('hidden');
                $("#adminEmail").removeAttr('hidden');
                $("#adminstatus").removeAttr('hidden');
                $("#adminStTwo").attr('hidden', true);  
            }else{
                $("#adminRole").attr('hidden', true);
                $("#adminEmail").attr('hidden', true);
                $("#adminstatus").attr('hidden', true);
            }
            if(roleValue == 'Sub Admin Role'){
                $("#subAdminRole").removeAttr('hidden');
                $("#subAdminEmail").removeAttr('hidden');
                $("#subAdminstatus").removeAttr('hidden');
                $("#subAdminStTwo").attr('hidden', true);
            }else{
                $("#subAdminRole").attr('hidden', true);
                $("#subAdminEmail").attr('hidden', true);
                $("#subAdminstatus").attr('hidden', true);
            }
            // if value empty
            if(roleValue == ''){
                $("#adminSt").attr('hidden', true); 
                $("#subAdminSt").attr('hidden', true);
                $("#admin_approval_status").prop('checked', false);
                $("#sub_admin_approval_status").prop('checked', false);
            }
        });

        // Checkbox for Admin
        $(document).on('click', '#admin_approval_status', function() {
            var isChecked = $(this).prop('checked'); 

            if (isChecked) {
                $("#adminSt").removeAttr('hidden').slideDown();
                $("#adminStTwo").attr('hidden', true);
            } else {
                $("#adminSt").attr('hidden', true);
                $("#adminStTwo").removeAttr('hidden').slideDown();
            }
        });

        // Checkbox for Sub Admin
        $(document).on('click', '#sub_admin_approval_status', function() {
            var isChecked = $(this).prop('checked'); 

            if (isChecked) {
                $("#subAdminSt").removeAttr('hidden').slideDown();
                $("#subAdminStTwo").attr('hidden', true);
            } else {
                $("#subAdminSt").attr('hidden', true);
                $("#subAdminStTwo").removeAttr('hidden').slideDown();
            }
        });

        // Fetch Branch
        fetch_branch();

        function fetch_branch(){
            const currentUrl = "{{ route('branch_fetch.action') }}";

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
                    const branch_name = response.branch_names;
                    $("#select_branch_search").empty();
                    $("#select_branch_search").append('<option value="" style="font-weight:600;">Select Company Branch Name</option>');
                    $.each(branch_name, function(key, item) {
                        $("#select_branch_search").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.branch_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_branch_search").empty();
                    $("#select_branch_search").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        // Fetch Branch User Email
        fetch_branch_user_email();

        function fetch_branch_user_email(){
            const currentUrl = "{{ route('branch_user_email_fetch.action') }}";

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
                    if (response.branch_admin_users && response.branch_admin_users.length > 0) {
                        $('#get_branch_id').val(response.branch_admin_users[0].branch_id); // Set branch ID from the first record
                        
                        const selectElement = $("#select_user_email");
                        selectElement.empty();
                        selectElement.append('<option value="" style="font-weight:600;">Select User Email</option>');

                        response.branch_admin_users.forEach(user => {
                            if (user.id && user.user_email_id) {
                                selectElement.append(`
                                    <option style="color:white;font-weight:600;" value="${user.id}">
                                        ${user.user_email_id}
                                    </option>
                                `);
                            }
                        });
                    } else {
                        $("#select_user_email").empty();
                        $("#select_user_email").append('<option style="color:white;font-weight:600;" value="" disabled>No emails found</option>');
                    }
                },
                error: function() {
                    $("#select_user_email").empty();
                    $("#select_user_email").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Sarch branch name for add access
        $('#adminEmail').removeAttr('hidden');
        $("#amin_banch_change_btn").removeClass('display_none');
        $(document).on('change', '#select_branch_search', function(e){
            e.preventDefault();
            $('#warning_message').html("");
            $('#warning_message').removeClass('warning-message');
            var selectID = $(this).val();
            
            if(selectID == ''){
                $('#add_documents').attr('hidden', true);
                $('#branch_admin_access_store').attr('hidden', true);
                $('#select_user_email').val("").trigger('change.select2');
                $('.user_role_id').val("").trigger('change.select2');
                $('.user_email_id').val("").trigger('change.select2');
                $('#cnl_btn').attr('hidden', true);
                $("#adminSt").attr('hidden', true);
                $("#adminStTwo").attr('hidden', true);
                $("#admin_role").attr('hidden', true);
                $("#admin_email").attr('hidden', true);
                $("#amin_banch_change_btn").removeClass('display_none');
                $('#adminEmail').removeAttr('hidden');
                $('#admin_approval_status').prop('checked', false);
                $('.grp_action').addClass('group_action').removeClass('right-side-btn');
            }else if(selectID !== ''){
                var id = selectID;
                $('#admin_role').removeAttr('hidden');
                $('#admin_email').removeAttr('hidden');
                $("#adminEmail").attr('hidden', true);
                $("#adminEmail").attr('hidden', true);
                $("#access_btn").attr('hidden', true);
                $('#access_delete_btn').attr('hidden', true);
                $('.grp_action').removeClass('group_action').addClass('right-side-btn');
                $("#amin_banch_change_btn").addClass('display_none');
            }
            $.ajax({
                type: "GET",
                url: "/company/branch-edit/" + id,
                success: function(response){
                    if(response.status == 404){
                        $("#select_warning_message").removeAttr('hidden');
                        $('#warning_message').html("");
                        // $('#warning_message').addClass('warning-message');
                        // $('#warning_message').text(response.messages);
                    }else if(response.status == 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#dataPullingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        $('#branch_admin_access_store').attr('hidden', true);
                        $('#cnl_btn').attr('hidden', true);
                        $("#select_warning_message").attr('hidden', true);
                        let debounceTimer = setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $('#add_documents').removeAttr('hidden');
                            $('#branch_admin_access_store').removeAttr('hidden');
                            $("#access_btn").attr('hidden', true);
                            $('#cnl_btn').removeAttr('hidden');
                            $('#access_delete_btn').attr('hidden', true);

                            $('#branches_id').val(id);
                            $('.add_branch_id').val(response.messages.branch_id);
                            $('.add_branch_name').val(response.messages.branch_name);
                            $('.add_branch_type').val(response.messages.branch_type);
                            $('.add_division_id').val(response.messages.divisions.division_name);
                            $('.add_district_id').val(response.messages.districts.district_name);
                            $('.add_upazila_id').val(response.messages.thana_or_upazilas.thana_or_upazila_name);
                            $('.add_town_name').val(response.messages.town_name);
                            $('.add_location').val(response.messages.location);
                        }, 1500);

                        return ()=>{
                            clearTimeout(debounceTimer);
                        }

                    }
                }
            });
        });

        // ===============================================
        // Admin Access Promot (Search Select User Email)
        // ===============================================
        $('#accessSearch').removeAttr('hidden');
        $(document).on('change', '#select_user_email', function(e){
            e.preventDefault();
            $('#warning_message').html("");
            $('#warning_message').removeClass('warning-message');
            // empty field for admin delete branch
            $("#usrImage, #usrConfrmImage").empty();
            $("#creatorUserImage").empty();
            $("#creatorUserEmail").empty();
            $("#creatorCreatedBy").empty();
            $("#creatorCreatedAt").empty();
            $("#updatorUserImage").empty();
            $("#updatorUserEmail").empty();
            $("#updatorUpdateBy").empty();
            $("#updatorUpdateAt").empty();
            $("#approverUserImage").empty();
            $("#approverUserEmail").empty();
            $("#approverApprover").empty();
            $("#approverUpdateAt").empty();
            $('#brnch_id').empty();
            $('#branch_name').empty();
            $('#branch_type').empty();
            $('#division_id').empty();
            $('#district_id').empty();
            $('#upazila_id').empty();
            $('#town_name').empty();
            $('#location').empty();
            $("#usrRole, #usrConfrmRole").empty();
            $("#usrEmail, #usrConfrmEmail").empty();
            $("#admin_branch_id").empty();
            $("#admin_delete_id").empty();
            $("#branch_delete_id").empty();
            $("#admin_delete_branch_id").empty();
            $(".branch_name_head").empty();

            var selectID = $(this).val();
            
            if(selectID == ''){
                $('#documents').attr('hidden', true);
                $('#branches_id').val("");
                $('#select_branch_search').val("").trigger('change.select2');
                $('.user_role_id').val("").trigger('change.select2');
                $('.user_email_id').val("").trigger('change.select2');
                $('#access_btn').attr('hidden', true);
                $("#branch_admin_access_store").attr('hidden', true);
                $('#cnl_btn').attr('hidden', true);
                $('#access_delete_btn').attr('hidden', true);
                $('#admin_role').attr('hidden', true);
                $('#admin_email').attr('hidden', true);
                $('#accessSearch').removeAttr('hidden');
                $('#adminstatus').attr('hidden', true);
                $("#amin_banch_change_btn").removeClass('display_none');

                $("#adminSt").attr('hidden', true);
                $("#adminStTwo").attr('hidden', true);
                $('#admin_approval_status').prop('checked', false);
            }else if(selectID !== ''){
                // Search ID
                var id = selectID;
                $('#admin_role').removeAttr('hidden');
                $('#admin_email').removeAttr('hidden');
                $('#adminstatus').removeAttr('hidden');
                $('#admin_role').removeAttr('hidden');
                $('#accessSearch').attr('hidden', true);
                $("#branch_admin_access_store").attr('hidden', true);
                $("#amin_banch_change_btn").addClass('display_none');
            }
            
            $.ajax({
                type: "GET",
                url: "/company/branch-name-query/" + id,
                success: function(response){
                    if(response.status == 404){
                        $("#select_warning_message").removeAttr('hidden');
                        $('#warning_message').html("");
                        $('#warning_message').addClass('warning-message');
                        // $('#warning_message').text(response.messages);
                    }else if(response.status == 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#dataPullingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        $('#documents').attr('hidden', true);
                        $('#cnl_btn').attr('hidden', true);
                        $('#access_btn').attr('hidden', true);
                        $('#access_delete_btn').attr('hidden', true);
                        $("#select_warning_message").attr('hidden', true);

                        let debounceTimer = setTimeout(() => {
                            requestAnimationFrame(() => {
                                $("#accessconfirmbranch").modal('hide');
                                $("#dataPullingProgress").attr('hidden', true);
                                $("#access_modal_box").removeClass('progress_body');
                                $("#processModal_body").removeClass('loading_body_area');
                                $('#documents').removeAttr('hidden');
                                $('#access_btn').removeAttr('hidden');
                                $('#cnl_btn').removeAttr('hidden');
                                $('#access_delete_btn').removeAttr('hidden');
    
                                const messages = response.messages;

                                const branchName = $(".branch_name_head");
                                const branchId = $("#admin_branch_id, #admin_delete_branch_id, #branch_delete_id");
                                const usrRole = $("#usrRole, #usrConfrmRole");
                                const usrEmail = $("#usrEmail, #usrConfrmEmail");
                                const usrImg = $("#usrImage, #usrConfrmImage");

                                const secondUserImage = messages.user_emails.image.includes('https://') 
                                ? messages.user_emails.image 
                                : `${window.location.origin}/storage/image/user-image/${messages.user_emails.image}`;

                                // Append user details
                                branchId.append(`<span class="">${messages.branch_id}</span>`);
                                branchName.append(`<span>${messages.branch_name}</span>`);
                                usrRole.append(`<span class="usrConfrmRole">${messages.user_roles.name}</span>`);
                                usrEmail.append(`<span class="usrConfrmEmail">${messages.user_emails.login_email}</span>`);
                                usrImg.append(`<span class="usrConfrmImage"><img class="user_img rounded-square users_image position" src="${secondUserImage}"></span>`);
                                
                                if(messages.created_by !== ''){
                                    const firstUserImage = messages.created_users.image.includes('https://') ? messages.created_users.image : `${window.location.origin}/storage/image/user-image/${messages.created_users.image}`;
                                    let createdByRole;
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
                                    $("#creatorUserImage").html(`<img class="user_img rounded-square users_image position" src="${firstUserImage}">`);
        
                                    $("#creatorUserEmail").append(`<span>${messages.created_users.login_email}</span>`);
                                    $("#creatorCreatedBy").append(`<span>${createdByRole}</span>`);
                                    if(messages.created_at !== ''){
                                        $("#creatorCreatedAt").append(`<span>${formatDate(messages.created_at)}</span>`);
                                    }else{
                                        $("#creatorCreatedAt").append(`<span>${'-'}</span>`);
                                    }
                                }
                                if(messages.updated_by !== null){
                                    $("#updatorContent").removeAttr('hidden');
                                    $('#updatorHead').removeAttr('hidden');
                                    const secondUserImage = messages.updated_users.image.includes('https://') ? messages.updated_users.image : `${window.location.origin}/storage/image/user-image/${messages.updated_users.image}`;
                                    let updatedByRole;
                                    switch (messages.updated_by) {
                                        case 1:
                                            updatedByRole = 'SuperAdmin';
                                            break;
                                        case 2:
                                            updatedByRole = 'Sub-Admin';
                                            break;
                                        case 3:
                                            updatedByRole = 'Admin';
                                            break;
                                        case 0:
                                            updatedByRole = 'User';
                                            break;
                                        case 5:
                                            updatedByRole = 'Accounts';
                                            break;
                                        case 6:
                                            updatedByRole = 'Marketing';
                                            break;
                                        case 7:
                                            updatedByRole = 'Delivery Team';
                                            break;
                                        default:
                                            updatedByRole = 'Unknown';
                                    }
                                    $("#updatorUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);
        
                                    $("#updatorUserEmail").append(`<span>${messages.updated_users.login_email}</span>`);
                                    $("#updatorUpdateBy").append(`<span>${updatedByRole}</span>`);
                                    if(messages.created_at !== messages.updated_at){
                                        $("#updatorUpdateAt").append(`<span>${formatDate(messages.updated_at)}</span>`);
                                    }else{
                                        $("#updatorUpdateAt").append(`<span>${'-'}</span>`);
                                    }
                                }else{
                                    $("#updatorContent").attr('hidden', true);
                                    $('#updatorHead').attr('hidden', true);
                                }
                                if(messages.approver_by !== null){
                                    $("#approverContent").removeAttr('hidden');
                                    $('#approverHead').removeAttr('hidden');
                                    const secondUserImage = messages.approver_users.image.includes('https://') ? messages.approver_users.image : `${window.location.origin}/storage/image/user-image/${messages.approver_users.image}`;
                                    let approverByRole;
                                    switch (messages.approver_by) {
                                        case 1:
                                            approverByRole = 'SuperAdmin';
                                            break;
                                        case 2:
                                            approverByRole = 'Sub-Admin';
                                            break;
                                        case 3:
                                            approverByRole = 'Admin';
                                            break;
                                        case 0:
                                            approverByRole = 'User';
                                            break;
                                        case 5:
                                            approverByRole = 'Accounts';
                                            break;
                                        case 6:
                                            approverByRole = 'Marketing';
                                            break;
                                        case 7:
                                            approverByRole = 'Delivery Team';
                                            break;
                                        default:
                                            approverByRole = 'Unknown';
                                    }
                                    $("#approverUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);
        
                                    $("#approverUserEmail").append(`<span>${messages.approver_users.login_email}</span>`);
                                    $("#approverApprover").append(`<span>${approverByRole}</span>`);
                                    if(messages.approver_date !== null){
                                        $("#approverUpdateAt").append(`<span>${formatDate(messages.approver_date)}</span>`);
                                    }else if(messages.approver_date == null){
                                        $("#approverUpdateAt").append(`<span>${'-'}</span>`);
                                    }
                                }else{
                                    $("#approverContent").attr('hidden', true);
                                    $('#approverHead').attr('hidden', true);
                                }
        
                                $('#branches_id, #admin_delete_id').val(id);
                                $('#get_branch_id').val(response.messages.branch_id);
                                $('#brnch_id').append(`<span>Branch-ID : ${response.messages.branch_id}</span>`);
                                $('#branch_name').append(`<span>Branch-Name : ${response.messages.branch_name}</span>`);
                                $('#branch_type').append(`<span>Branch-Type : ${response.messages.branch_type}</span>`);
                                $('#division_id').append(`<span>Division : ${response.messages.division_name}</span>`);
                                $('#district_id').append(`<span>District : ${response.messages.district_name}</span>`);
                                $('#upazila_id').append(`<span>Upazila : ${response.messages.upazila_name}</span>`);
                                $('#town_name').append(`<span>City : ${response.messages.town_name}</span>`);
                                $('#location').append(`<span>Location : ${response.messages.location}</span>`);
        
                                $('.user_role_id').val(response.messages.user_role_id).trigger('change.select2');
                                fetch_user_email_one(response.messages.user_role_id);
                                setTimeout(() => {
                                    $('.user_email_id').val(response.messages.user_email_id).trigger('change.select2');
                                }, 500);
                                if(response.messages.status == 1){
                                    $("#adminSt").removeAttr('hidden').slideDown();
                                    $("#adminStTwo").attr('hidden', true);
                                    $('#admin_approval_status').prop('checked', response.messages.status == 1);
                                }
                                else{
                                    $("#adminSt").attr('hidden', true);
                                    $("#adminStTwo").attr('hidden', true);
                                    $('#admin_approval_status').prop('checked', false);
                                }
                            });
                            
                        }, 1500);

                        return ()=>{
                            clearTimeout(debounceTimer);
                        }

                    }
                    
                }
            });
            // fetch_branch_user_email();
        });

        // ===============================================
        // Add Admin Access
        // ===============================================
        $(document).on('click', '#branch_admin_access_store', function(e){
            e.preventDefault();

            var id = $(".select_email_one").val();
            var branchID = $("#add_branch_id").val();
            var branchName = $("#add_branch_name").val();
            var branchType = $("#add_branch_type").val();
            var branchDivision = $("#add_division_id").val();
            var branchDistrict = $("#add_district_id").val();
            var branchUpazila = $("#add_upazila_id").val();
            var branchCity = $("#add_town_name").val();
            var branchLocation = $("#add_location").val();
            var userRoleID = $("#select_role_one").val();
            var userEmaiID = $("#select_email_one").val();

            const current_url = "{{route('branch_access_store.action')}}";

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
                    id:id,
                    branch_id: branchID,
                    branch_name: branchName,
                    branch_type: branchType,
                    division_name: branchDivision,
                    district_name: branchDistrict,
                    upazila_name: branchUpazila,
                    town_name: branchCity,
                    location: branchLocation,
                    user_role_id: userRoleID,
                    user_email_id: userEmaiID,
                },
                success: function(response) {
                    if(response.status == 400){
                        $.each(response.errors, function(key, err_value){
                            if (key === 'branch_id') {
                                $("#savForm_branch_error").fadeIn();
                                $('#savForm_branch_error').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error").addClass("alert_show_errors");
                                $('#add_branch_id').addClass('is-invalid');
                                $('#add_branch_id').html("");
                            }else if (key === 'branch_name') {
                                $("#savForm_branch_error2").fadeIn();
                                $('#savForm_branch_error2').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error2").addClass("alert_show_errors");
                                $('#add_branch_name').addClass('is-invalid');
                                $('#add_branch_name').html("");
                            } else if (key === 'branch_type') {
                                $("#savForm_branch_error3").fadeIn();
                                $('#savForm_branch_error3').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error3").addClass("alert_show_errors");
                                $('#add_branch_type').addClass('is-invalid');
                                $('#add_branch_type').html("");
                            } else if (key === 'division_name') {
                                $("#savForm_branch_error4").fadeIn();
                                $('#savForm_branch_error4').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error4").addClass("alert_show_errors");
                                $('#add_division_id').addClass('is-invalid');
                                $('#add_division_id').html("");
                            } else if (key === 'district_name') {
                                $("#savForm_branch_error5").fadeIn();
                                $('#savForm_branch_error5').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error5").addClass("alert_show_errors");
                                $('#add_district_id').addClass('is-invalid');
                                $('#add_district_id').html("");
                            } else if (key === 'upazila_name') {
                                $("#savForm_branch_error6").fadeIn();
                                $('#savForm_branch_error6').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error6").addClass("alert_show_errors");
                                $('#add_upazila_id').addClass('is-invalid');
                                $('#add_upazila_id').html("");
                            } else if (key === 'town_name') {
                                $("#savForm_branch_error7").fadeIn();
                                $('#savForm_branch_error7').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error7").addClass("alert_show_errors");
                                $('#add_town_name').addClass('is-invalid');
                                $('#add_town_name').html("");
                            } else if (key === 'location') {
                                $("#savForm_branch_error8").fadeIn();
                                $('#savForm_branch_error8').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error8").addClass("alert_show_errors");
                                $('#add_location').addClass('is-invalid');
                                $('#add_location').html("");
                            }else if (key === 'user_role_id') {
                                $("#savForm_branch_error9").fadeIn();
                                $('#savForm_branch_error9').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error9").addClass("alert_show_errors");
                                $('#select_role_one').addClass('is-invalid');
                                $("#savForm_branch_error9").removeAttr('hidden');
                            }else if (key === 'user_email_id') {
                                $("#savForm_branch_error10").fadeIn();
                                $('#savForm_branch_error10').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error10").addClass("alert_show_errors");
                                $('#select_email_one').addClass('is-invalid');
                                $("#savForm_branch_error10").removeAttr('hidden');
                            }
                        });
                    }else if(response.status == 200){
                        $("#branchAdminAccessCreateModal").modal('hide');
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        let debounceTimer = setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            $('#updateForm_error').html("");
                            $('#success_message').html("");

                            inputClear();
                            let debounceTimer = setTimeout(() => {
                                $('#add_documents').attr('hidden', true);
                                requestAnimationFrame(() => {
                                    showSuccessToast(response.messages);
                                    fetch_branch();
                                });
                            }, 3000);

                            return ()=>{
                                clearTimeout(debounceTimer);
                            }

                            fetch_branch_user_email();
                        }, 1500);

                        return ()=>{
                            clearTimeout(debounceTimer);
                        }

                    }
                }
            });
        });

        // Clear input field
        function inputClear(){
            $('#branches_id').val("");
            $('#add_branch_id').val("");
            $('#add_branch_name').val("");
            $('#add_branch_type').val("");
            $('#add_division_id').val("");
            $('#add_district_id').val("");
            $('#add_upazila_id').val("");
            $('#add_town_name').val("");
            $('#add_location').val("");
            $('#select_user_email').val(null).trigger('change');
            $('#select_branch_search').val(null).trigger('change');
            $('#select_role_one').val(null).trigger('change');
            $('#select_email_one').val(null).trigger('change');
        }

        // ===============================================
        // Admin Branch Access
        // ===============================================
        $(document).on('click', '#access_btn', function(e){
            e.preventDefault();
            $("#savForm_branch_error9").empty();
            $("#savForm_branch_error10").empty();
            var id = $("#branches_id").val();
            var branchID = $("#get_branch_id").val();
            var branchType = $("#branch_type").val();
            var branchName = $("#branch_name").val();
            var divisionName = $("#division_id").val();
            var districtName = $("#district_id").val();
            var upazilaName = $("#upazila_id").val();
            var townName = $("#town_name").val();
            var location = $("#location").val();
            var userRole = $("#select_role_one").val();
            var userEmail = $("#select_email_one").val();
            var approvalStatus = $("input[name='status']:checked").val();
            approvalStatus = approvalStatus ? 1 : 0;

            const current_url = "{{ route('access_status.action') }}";

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
                    id: id,
                    branch_id: branchID,
                    branch_type: branchType,
                    branch_name: branchName,
                    division_name: divisionName,
                    district_name: districtName,
                    upazila_name: upazilaName,
                    town_name: townName,
                    location: location,
                    user_role_id: userRole,
                    user_email_id: userEmail,
                    status: approvalStatus
                },
                success: function (response) {
                    $("#accessconfirmbranch").modal('show');
                    $("#processingProgress").removeAttr('hidden');
                    $("#access_modal_box").addClass('progress_body');
                    $("#processModal_body").addClass('loading_body_area');

                    if (response.status === 202) {
                        let debounceTimer = setTimeout(() => {
                            $("#accessconfirmbranch").modal("hide");
                            $("#processingProgress").attr("hidden", true);
                            $("#access_modal_box").removeClass("progress_body");
                            $("#processModal_body").removeClass("loading_body_area");

                            // Reset Form Fields
                            $("#select_branch_search, #role_type, #select_role_one, #select_email_one").val("").trigger("change");
                            $("#admin_approval_status").prop("checked", false);
                            $("#adminSt, #adminStTwo, #subAdminSt, #subAdminStTwo").attr("hidden", true);
                            inputClear();

                            // Hide Message & Fetch Branch Data After 3s
                            let debounceTimer = setTimeout(() => {
                                requestAnimationFrame(() => {
                                    showSuccessToast(response.messages);
                                    fetch_branch();
                                    fetch_branch_user_email();
                                    selectAdminBranchFetch();
                                });
                            }, 1000);

                            return ()=>{
                                clearTimeout(debounceTimer);
                            }

                        }, 1500);

                        return ()=>{
                            clearTimeout(debounceTimer);
                        }

                    }
                },
                error: function (xhr) {
                    $("#updateForm_error").removeClass('display-none');

                    if (xhr.status === 400) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, err_value) {
                            $("#updateForm_error").fadeIn().html(`<span class="error_val">${err_value}</span>`).addClass("alert_show_errors");

                            if (key === 'status') {
                                $('#admin_approval_status').addClass('is-invalid');
                            } else if (key === 'user_role_id') {
                                $('.user_role_id').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'user_email_id') {
                                $('.user_email_id').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            }
                        });
                    } else {
                        console.error('Error:', xhr.responseText);
                    }
                }
            });

        });

        // Validation Error Handle
        $(document).on('change', '#select_branch_search', function(){

            var selectedValue = $(this).val();

            if(selectedValue !== '' ){
                $("#select_branch_search").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#role_type").removeAttr('disabled');
                $("#updateForm_error").addClass('display-none');
            }
            if(selectedValue == ''){
                $("#role_type").attr('disabled', true);
            }

        });

        // Closing Branch Info Card
        $(document).on('click', '.cols_btn', function(){
            $('#documents').attr('hidden', true);
        });

        // Cancel Access
        $(document).on('click', '#cnl_btn', function(){
            $("#documents").attr('hidden', true);
            $("#add_documents").attr('hidden', true);
            $("#access_btn").attr('hidden', true);
            $("#branch_admin_access_store").attr('hidden', true);
            $("#admin_role").attr('hidden', true);
            $("#admin_email").attr('hidden', true);
            $("#adminstatus").attr('hidden', true);
            $("#adminEmail").removeAttr('hidden');
            $("#accessSearch").removeAttr('hidden');
            $("#savForm_branch_error9").attr('hidden', true);
            $("#savForm_branch_error10").attr('hidden', true);
            $(this).attr('hidden', true);
            // Clear Select2 fields reliably with delay
            $('#select_user_email').val(null).trigger('change');
            $('#select_branch_search').val(null).trigger('change');
            $('#select_role_one').val(null).trigger('change');
            $('#select_email_one').val(null).trigger('change');
        });

        // Select Role Type
        $(document).on('change', '#role_type', function(){
            var select_val = $(this).val();
            if(select_val == ''){
                $("#access_btn").attr('disabled', true);
            }else if(select_val !== ''){
                $("#access_btn").removeAttr('disabled');
            }
        });

        // Show Message Tostar
        function showSuccessToast(messages) {
            $('#toast-body-message').text(messages);
            const toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.show();
        }

        // =========================================
        // Admin Branch Change Modal
        // =========================================
        $(document).on('click', '#amin_banch_change_btn', function(e){
            e.preventDefault();
            $("#adminBranchChangeModal").modal('hide');
            $("#accessconfirmbranch").modal('show');
            $("#loadingProgress").removeAttr('hidden');
            $("#access_modal_box").addClass('progress_body');
            $("#processModal_body").addClass('loading_body_area');

            let debounceTimer = setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#loadingProgress").attr('hidden', true);
                $("#access_modal_box").removeClass('progress_body');
                $("#processModal_body").removeClass('loading_body_area');
                $("#adminBranchChangeModal").modal('show');
                
                let debounceTimer = setTimeout(() => {
                    requestAnimationFrame(() => {
                        removeAttributeOrClass([
                            { selector: '.change_title', type: 'class', name: 'branch-skeleton' },
                            { selector: '.branch_change_access', type: 'class', name: 'branch-content-skeleton' }
                        ]);
                    });
                }, 2000);

                return ()=>{
                    clearTimeout(debounceTimer);
                }

            }, 1500);

            return ()=>{
                clearTimeout(debounceTimer);
            }

        });

        // fetch branch for select (change branch)
        selectAdminBranchFetch();
        function selectAdminBranchFetch(){
            const currentUrl = "{{ route('admin_branch_fetch.action') }}";

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
                    const admin_branch_changes = response.admin_branch_changes;
                    
                    $("#admin_branch_name").empty();
                    $("#admin_branch_name").append('<option value="">Select Company Branch Name</option>');

                    $.each(admin_branch_changes, function(index, item) {
                        $("#admin_branch_name").append(`<option value="${item.id}" data-branch_id="${item.branch_id}" 
                        data-branch_type="${item.branch_type}" 
                        data-branch_name="${item.branch_name}" 
                        data-division_name="${item.division_name}" 
                        data-district_name="${item.district_name}" 
                        data-upazila_name="${item.upazila_name}" 
                        data-town_name="${item.town_name}" 
                        data-location="${item.location}">${item.branch_name}</option>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    $("#admin_branch_name").empty().append('<option value="" disabled>Error loading data</option>');
                }
            });
        }

        // =========================================
        // Branch Change Handle
        // =========================================
        $(document).on('change', '#admin_branch_name', function(){
            var selectedOption = $(this).find('option:selected');
            // Update hidden inputs with selected option's data attributes
            $("#admin_change_branch_id").val(selectedOption.data("branch_id"));
            $("#admin_change_branch_type").val(selectedOption.data("branch_type"));
            $("#admin_change_branch_name").val(selectedOption.data("branch_name"));
            $("#admin_change_division_id").val(selectedOption.data("division_name"));
            $("#admin_change_district_id").val(selectedOption.data("district_name"));
            $("#admin_change_upazila_id").val(selectedOption.data("upazila_name"));
            $("#admin_change_town_name").val(selectedOption.data("town_name"));
            $("#admin_change_location").val(selectedOption.data("location"));

        });

        // =========================================
        // Confirm Admin Branch Change
        // =========================================
        $(document).on('click', '#admin_change_btn_confirm', function(e){
            e.preventDefault();

            var id = $("#admin_emailID").val();
            var branch_id = $("#admin_change_branch_id").val();
            var branch_type = $("#admin_change_branch_type").val();
            var branch_name = $("#admin_change_branch_name").val();
            var division_name = $("#admin_change_division_id").val();
            var district_name = $("#admin_change_district_id").val();
            var upazila_name = $("#admin_change_upazila_id").val();
            var town_name = $("#admin_change_town_name").val();
            var loaction = $("#admin_change_location").val();
            var admin_role_id = $("#admin_roleID").val();
            var admin_email_id = $("#admin_emailID").val();
            
            const current_url = "/company/branch-admin-change/" + id;

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
                    branch_type : branch_type,
                    branch_name : branch_name,
                    division_name : division_name,
                    district_name : district_name,
                    upazila_name : upazila_name,
                    town_name : town_name,
                    location : loaction,
                    user_role_id : admin_role_id,
                    user_email_id : admin_email_id,
                },
                success: function(response) {
                    $("#adminBranchChangeModal").modal('hide');
                    if(response.status === 404){
                        showSuccessToast(response.messages);
                    }else if(response.status === 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#processingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        let debounceTimer = setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#processingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');

                            // Clear Select2 fields reliably with delay
                            setTimeout(function() {
                                $('#admin_roleID').val(null).trigger('change');
                                $('#admin_emailID').val(null).trigger('change');
                                $('#admin_branch_name').val(null).trigger('change');
                                $('#select_user_email').val(null).trigger('change');
                                $('#select_role_one').val(null).trigger('change');
                                $('#select_email_one').val(null).trigger('change');
                                $('#adminstatus').attr('hidden', true);
                                $('#documents').attr('hidden', true);
                                $('#access_btn').attr('hidden', true);
                                $('#access_delete_btn').attr('hidden', true);
                                $('#cnl_btn').attr('hidden', true);
                            }, 100);

                            let debounceTimer = setTimeout(() => {
                                showSuccessToast(response.messages);
                            }, 1000);

                            return ()=>{
                                clearTimeout(debounceTimer);
                            }

                        }, 1500);
                        
                        return ()=>{
                            clearTimeout(debounceTimer);
                        }

                        selectAdminBranchFetch();
                        fetch_branch_user_email();
                    }
                }
            });

        });

        // Cancel Change
        $(document).on('click', '#cancle_change, .cancel_change_box', function(e){
            e.preventDefault();
            $('#admin_roleID').val(null).trigger('change');
            $('#admin_emailID').val(null).trigger('change');
            $('#admin_branch_name').val(null).trigger('change');

        });

        // =========================================
        // Admin Branch Delete Modal
        // =========================================
        $(document).on('click', '#access_delete_btn', function(e){
            e.preventDefault();
            $("#accessconfirmbranch").modal('show');
            $("#dataPullingProgress").removeAttr('hidden');
            $("#access_modal_box").addClass('progress_body');
            $("#processModal_body").addClass('loading_body_area');
            $("#delete_admin_branch").modal('hide');

            let debounceTimer = setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#dataPullingProgress").attr('hidden', true);
                $("#access_modal_box").addClass('progress_body');
                $("#processModal_body").addClass('loading_body_area');
                $("#delete_admin_branch").modal('show');
                let debounceTimer = setTimeout(() => {
                    removeAttributeOrClass([
                        {
                            selector: '.usrImage',
                            type: 'class',
                            name: 'mini_cricle_skeletone'
                        },
                        {
                            selector: '.head_title',
                            type: 'class',
                            name: 'branch-skeleton'
                        }
                        ,
                        {
                            selector: '.text-field',
                            type: 'class',
                            name: 'branch-line-content-skeleton'
                        }

                    ]);
                }, 2000);

                return ()=>{
                    clearTimeout(debounceTimer);
                }
            }, 1500);
            return ()=>{
                clearTimeout(debounceTimer);
            }
        });

        // Admin Branch Delete Confirm Modal
        $(document).on('click', '#yesButton', function(e){
            e.preventDefault();
            // var id = $("#branch_delete_id").val();
            $(".usrConfrmRole").removeClass('word_space');
            $(".usrConfrmEmail").removeClass('word_space');
            $(".usrConfrmImage").removeClass('word_space');
            $("#delete_admin_branch").modal('hide');
            $("#accessconfirmbranch").modal('show');
            $("#loadingProgress").removeAttr('hidden');
            $("#access_modal_box").addClass('progress_body');
            $("#processModal_body").addClass('loading_body_area');

            let debounceTimer = setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#loadingProgress").attr('hidden', true);
                $("#access_modal_box").removeClass('progress_body');
                $("#processModal_body").removeClass('loading_body_area');
                $("#delete_admin_confirm_branch").modal('show');
                let debounceTimer = setTimeout(() => {
                    removeAttributeOrClass([
                        {
                            selector: '.usrConfrmImage',
                            type: 'class',
                            name: 'cricle_skeletone'
                        },
                        {
                            selector: '.confrim__head, .admin_paragraph',
                            type: 'class',
                            name: 'branch-skeleton'
                        }
                        ,
                        {
                            selector: '.block_title',
                            type: 'class',
                            name: 'branch-line-content-skeleton'
                        }
    
                    ]);
                }, 2000);

                return ()=>{
                    clearTimeout(debounceTimer);
                }

            }, 1500);

            return ()=>{
                clearTimeout(debounceTimer);
            }

        });

        // back Branch Delete Confirm Modal
        $(document).on('click', '.back_btn, #cancle_delete', function(){
            $("#delete_admin_confirm_branch").modal('hide');
            $("#delete_admin_branch").modal('show');
        });

        // Admin Branch Delete Confirm
        $(document).on('click', '#delete_branch', function(e){
            e.preventDefault();

            var id = $("#admin_delete_id").val();

            var branchId = "null";
            var branchType = "null";
            var branchName = "null";
            var divisionId = "null";
            var districtId = "null";
            var upazilaId = "null";
            var townName = "null";
            var loaction = "null";
            
            const current_url = "/company/branch-admin-change-delete/" + id;

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
                    branch_id: branchId,
                    branch_type: branchType,
                    branch_name: branchName,
                    division_name: divisionId,
                    district_name: districtId,
                    upazila_name: upazilaId,
                    town_name: townName,
                    location: loaction,
                },
                success: function(response) {
                    $("#delete_admin_confirm_branch").modal('hide');
                    $("#delete_admin_branch").modal('hide');
                    if (response.status === 200) {
                        $("#accessconfirmbranch").modal('show');
                        $("#processingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        let debounceTimer = setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#processingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            // Clear Select2 fields reliably with delay
                            setTimeout(function() {
                                $('#admin_roleID').val(null).trigger('change');
                                $('#admin_emailID').val(null).trigger('change');
                                $('#admin_branch_name').val(null).trigger('change');
                                $('#select_user_email').val(null).trigger('change');
                                $('#select_role_one').val(null).trigger('change');
                                $('#select_email_one').val(null).trigger('change');
                                $('#adminstatus').attr('hidden', true);
                                $('#documents').attr('hidden', true);
                                $('#access_btn').attr('hidden', true);
                                $('#amin_banch_change_btn').attr('hidden', true);
                                $('#access_delete_btn').attr('hidden', true);
                                $('#cnl_btn').attr('hidden', true);
                            }, 100);
                            

                            let debounceTimer = setTimeout(() => {
                                showSuccessToast(response.messages);
                            }, 1000);
                            
                            return ()=>{
                                clearTimeout(debounceTimer);
                            }

                        }, 1500);

                        return ()=>{
                            clearTimeout(debounceTimer);
                        }

                        selectAdminBranchFetch();
                        fetch_branch_user_email();
                        selectAdminBranchFetch();
                    } 
                }
            });
            

        });
    });
</script>