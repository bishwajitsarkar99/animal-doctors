<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    $(document).ready(function(){
        // Initialize role fetch
        fetch_role_one();
        fetch_role_two();
        fetch_user_email_one();
        fetch_user_email_two();
        // Initialize the button loader for the login button
        buttonLoader('#access_btn', '.access-icon', '.access-btn-text', 'Access...', 'Access', 1000);
        buttonLoader('#access_btn_confirm', '.access-confirm-icon', '.access-confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);

        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if ($(this).attr('id') === 'select_branch_search') {
                $(this).select2({
                    placeholder: 'Select Company Branch Name',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'role_type') {
                $(this).select2({
                    placeholder: 'Select Role Play',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'select_role_one') {
                $(this).select2({
                    placeholder: 'Select Admin Role Name...................................',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'select_role_two') {
                $(this).select2({
                    placeholder: 'Select Sub Role Name........................................',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'select_email_one') {
                $(this).select2({
                    placeholder: 'Select Admin Email Address.............................',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'select_email_two') {
                $(this).select2({
                    placeholder: 'Select Sub Admin Email Address....................',
                    allowClear: true
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
        $('#select_role_two').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role...');
        });
        $('#select_email_one').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
        });
        $('#select_email_two').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
        });

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

        // Search Select Dropdown
        $(document).on('change', '#select_branch_search', function(e){
            e.preventDefault();

            var select = $(this).val();

            // Search ID
            var id = select;
            
            if(select == ''){
                $('#documents').attr('hidden', true);
                $('#branches_id').val("");
            }
            
            $.ajax({
                type: "GET",
                url: "/company/branch-name-query/" + id,
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
                        $('#documents').attr('hidden', true);

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $('#documents').removeAttr('hidden');

                            const messages = response.messages;
                            
                            if(messages.created_by !== ''){
                                const firstUserImage = messages.created_users.image.includes('https://') ? messages.created_users.image : `${window.location.origin}/image/${messages.created_users.image}`;
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
    
                                $("#creatorUserEmail").val(messages.created_users.email);
                                $("#creatorCreatedBy").val(createdByRole);
                                if(messages.created_at !== ''){
                                    $("#creatorCreatedAt").val(currentDate(messages.created_at));
                                }else{
                                    $("#creatorCreatedAt").val('-');
                                }
                            }
                            if(messages.updated_by !== null){
                                $("#updatorContent").removeAttr('hidden');
                                $('#updatorHead').removeAttr('hidden');
                                const secondUserImage = messages.updated_users.image.includes('https://') ? messages.updated_users.image : `${window.location.origin}/image/${messages.updated_users.image}`;
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
    
                                $("#updatorUserEmail").val((messages.updated_users.email));
                                $("#updatorUpdateBy").val(updatedByRole);
                                if(messages.created_at !== messages.updated_at){
                                    $("#updatorUpdateAt").val(currentDate(messages.updated_at));
                                }else{
                                    $("#updatorUpdateAt").val('-');
                                }
                            }else{
                                $("#updatorContent").attr('hidden', true);
                                $('#updatorHead').attr('hidden', true);
                            }
                            if(messages.approver_by !== null){
                                $("#approverContent").removeAttr('hidden');
                                $('#approverHead').removeAttr('hidden');
                                const secondUserImage = messages.approver_users.image.includes('https://') ? messages.approver_users.image : `${window.location.origin}/image/${messages.approver_users.image}`;
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
    
                                $("#approverUserEmail").val(messages.approver_users.email);
                                $("#approverApprover").val(approverByRole);
                                if(messages.approver_date !== null){
                                    $("#approverUpdateAt").val(currentDate(messages.approver_date));
                                }else if(messages.approver_date == null){
                                    $("#approverUpdateAt").val('-');
                                }
                            }else{
                                $("#approverContent").attr('hidden', true);
                                $('#approverHead').attr('hidden', true);
                            }
    
                            $('#branches_id').val(id);
                            $('#get_branch_id').val(response.messages.branch_id);
                            $('#brnch_id').val(response.messages.branch_id);
                            $('#branch_name').val(response.messages.branch_name);
                            $('#branch_type').val(response.messages.branch_type);
                            $('#division_id').val(response.messages.divisions.division_name);
                            $('#district_id').val(response.messages.districts.district_name);
                            $('#upazila_id').val(response.messages.thana_or_upazilas.thana_or_upazila_name);
                            $('#town_name').val(response.messages.town_name);
                            $('#location').val(response.messages.location);
    
                            $('.admin_role_id').val(response.messages.admin_role_id).trigger('change.select2');
                            $('.sub_admin_role_id').val(response.messages.sub_admin_role_id).trigger('change.select2');
                            fetch_user_email_one(response.messages.admin_role_id);
                            fetch_user_email_two(response.messages.sub_admin_role_id);
                            setTimeout(() => {
                                $('.admin_email_id').val(response.messages.admin_email_id).trigger('change.select2');
                                $('.sub_admin_email_id').val(response.messages.sub_admin_email_id).trigger('change.select2');
                            }, 500);
                            if(response.messages.admin_approval_status == 1){
                                $("#adminSt").removeAttr('hidden').slideDown();
                                $("#adminStTwo").attr('hidden', true);
                                $('#admin_approval_status').prop('checked', response.messages.admin_approval_status == 1);
                            }
                            else{
                                $("#adminSt").attr('hidden', true);
                                $("#adminStTwo").attr('hidden', true);
                                $('#admin_approval_status').prop('checked', false);
                            }
                            if(response.messages.sub_admin_approval_status == 1){
                                $("#subAdminSt").removeAttr('hidden').slideDown();
                                $("#subAdminStTwo").attr('hidden', true);
                                $('#sub_admin_approval_status').prop('checked', response.messages.sub_admin_approval_status == 1);
                            }else{
                                $("#subAdminSt").attr('hidden', true);
                                $("#subAdminStTwo").attr('hidden', true);
                                $('#sub_admin_approval_status').prop('checked', false);
                            }
                            
                        }, 1500);

                        
                    }
                    
                }
            });
        });

        // Admin Branch Access
        $(document).on('click', '#access_btn', function(e){
            e.preventDefault();

            var id = $("#branches_id").val();

            var branchID = $("#get_branch_id").val();
            var adminRole = $("#select_role_one").val();
            var subAdminRole = $("#select_role_two").val();
            var adminEmail = $("#select_email_one").val();
            var subAdminEmail = $("#select_email_two").val();
            var adminApprovalStatus = $("input[name='admin_approval_status']:checked").val();
            var subAdminApprovalStatus = $("input[name='sub_admin_approval_status']:checked").val();

            const current_url = "{{route('access_status.action')}}";

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
                    branch_id: branchID,
                    admin_role_id: adminRole,
                    sub_admin_role_id: subAdminRole,
                    admin_email_id: adminEmail,
                    sub_admin_email_id: subAdminEmail,
                    admin_approval_status: adminApprovalStatus ? 1 : 0,
                    sub_admin_approval_status: subAdminApprovalStatus ? 1 : 0,
                },
                success: function(response) {
                    $("#accessconfirmbranch").modal('show');
                    $("#processingProgress").removeAttr('hidden');
                    $("#access_modal_box").addClass('progress_body');
                    $("#processModal_body").addClass('loading_body_area');
                    
                    if (response.status === 202) {
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#processingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $('#updateForm_error').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $("#success_message").text(response.messages).show();
                            $("#select_branch_search").val("").trigger('change');
                            $("#role_type").val("").trigger('change');
                            $("#select_role_one").val("").trigger('change');
                            $("#select_role_two").val("").trigger('change');
                            $("#select_email_one").val("").trigger('change');
                            $("#select_email_two").val("").trigger('change');

                            $("#admin_approval_status").prop("checked", false);
                            $("#sub_admin_approval_status").prop("checked", false);
                            $("#adminSt").attr('hidden', true);
                            $("#adminStTwo").attr('hidden', true);
                            $("#subAdminSt").attr('hidden', true);
                            $("#subAdminStTwo").attr('hidden', true);

                            setTimeout(() => {
                                $("#success_message").fadeOut();
                                fetch_branch();
                            }, 3000);
                        }, 3000);
                    } 
                },
                error: function(xhr) {
                    $("#updateForm_error").removeClass('display-none');
                    $("#select_branch_search").next('.select2-container').find('.select2-selection').addClass('is-invalid');
                    if (xhr.status === 400) {
                        const errors = xhr.responseJSON.errors;
                        console.error(errors);
                        $.each(errors, function(key, err_value) {
                            if (key === 'branch_id') {
                                $("#updateForm_error").fadeIn();
                                $('#updateForm_error').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error").addClass("alert_show_errors");
                                $('#select_branch_search').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            }
                        });
                    } else {
                        console.error('Error:', xhr.responseText);
                        //alert('An unexpected error occurred.');
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
    });
</script>