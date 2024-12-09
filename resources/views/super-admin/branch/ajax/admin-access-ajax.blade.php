<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    $(document).ready(function(){
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
            }else if ($(this).attr('id') === 'admin_role_id') {
                $(this).select2({
                    placeholder: 'Select Admin Role Name...................................',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'sub_admin_role_id') {
                $(this).select2({
                    placeholder: 'Select Sub Role Name........................................',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'admin_email_id') {
                $(this).select2({
                    placeholder: 'Select Admin Email Address.............................',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'sub_admin_email_id') {
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
        $('#admin_role_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role...');
        });
        $('#sub_admin_role_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role...');
        });
        $('#admin_email_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
        });
        $('#sub_admin_email_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
        });

        // Role Type
        $(document).on('change', '#role_type', function(){

            var roleValue = $(this).val();

            if(roleValue == 'Admin Role'){
                $("#adminRole").removeAttr('hidden');
                $("#adminEmail").removeAttr('hidden');
                $("#adminstatus").removeAttr('hidden');
            }else{
                $("#adminRole").attr('hidden', true);
                $("#adminEmail").attr('hidden', true);
                $("#adminstatus").attr('hidden', true);
            }
            if(roleValue == 'Sub Admin Role'){
                $("#subAdminRole").removeAttr('hidden');
                $("#subAdminEmail").removeAttr('hidden');
                $("#subAdminstatus").removeAttr('hidden');
            }else{
                $("#subAdminRole").attr('hidden', true);
                $("#subAdminEmail").attr('hidden', true);
                $("#subAdminstatus").attr('hidden', true);
            }
        });

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

            if(select !== ''){
                $('#documents').removeAttr('hidden');
            }
            if(select == ''){
                $('#documents').attr('hidden', true);
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
                        $('#brnch_id').val(response.messages.branch_id);
                        $('#branch_name').val(response.messages.branch_name);
                        $('#branch_type').val(response.messages.branch_type);
                        $('#division_id').val(response.messages.divisions.division_name);
                        $('#district_id').val(response.messages.districts.district_name);
                        $('#upazila_id').val(response.messages.thana_or_upazilas.thana_or_upazila_name);
                        $('#town_name').val(response.messages.town_name);
                        $('#location').val(response.messages.location);
                        
                    }
                    
                }
            });
        });


    });
</script>