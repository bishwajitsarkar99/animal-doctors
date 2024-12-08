<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    $(document).ready(function(){
        // the fetch function call from the "division-district-upazila" script for Initialize...
        fetch_division();

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
                    placeholder: 'Select Role Type',
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
            $('.select2-search__field').attr('placeholder', 'Search role...');
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
            }else{
                $("#adminRole").attr('hidden', true);
                $("#adminEmail").attr('hidden', true);
            }
            if(roleValue == 'Sub Admin Role'){
                $("#subAdminRole").removeAttr('hidden');
                $("#subAdminEmail").removeAttr('hidden');
            }else{
                $("#subAdminRole").attr('hidden', true);
                $("#subAdminEmail").attr('hidden', true);
            }
        });

        // Search Select Dropdown
        $(document).on('change', '#select_branch_search', function(e){
            e.preventDefault();

            fetch_division();
            var select = $(this).val();

            // Button Show Or Hide
            if(select !== ''){
                $("#save").hide();
                $("#save").fadeOut();
                $("#update_btn").removeAttr('hidden');
                $("#update_btn").fadeIn();
                $("#deleteLoader").removeAttr('hidden');
                $("#deleteLoader").fadeIn();
                $("#cancel_btn").hide();
                $("#cancel_btn").fadeOut();
            }else if(select == ''){
                $("#save").show();
                $("#save").fadeIn();
                $("#update_btn").attr('hidden', true);
                $("#update_btn").fadeOut();
                $("#deleteLoader").attr('hidden', true);
                $("#deleteLoader").fadeOut();
                $("#cancel_btn").show();
                $("#cancel_btn").fadeIn();
            }

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
                url: "/company/branch-edit/" + id,
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
                            $("#firstUserImage").html(`<img class="user_img rounded-square users_image position" src="${firstUserImage}">`);

                            $("#firstUserEmail").val(messages.created_users.email);
                            $("#firstCreatedBy").val(createdByRole);
                            if(messages.created_at !== ''){
                                $("#firstCreatedAt").val(currentDate(messages.created_at));
                            }else{
                                $("#firstCreatedAt").val('-');
                            }
                        } 
                        if(messages.updated_by !== null){
                            $("#secondContent").removeAttr('hidden');
                            $('#secondHead').removeAttr('hidden');
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
                            $("#secondUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);

                            $("#secondUserEmail").val((messages.updated_users.email));
                            $("#secondUpdateBy").val(updatedByRole);
                            if(messages.created_at !== messages.updated_at){
                                $("#secondUpdateAt").val(currentDate(messages.updated_at));
                            }else{
                                $("#secondUpdateAt").val('-');
                            }
                        }else{
                            $("#secondContent").attr('hidden', true);
                            $('#secondHead').attr('hidden', true);
                        }
                        if(messages.approver_by !== null){
                            $("#thirdContent").removeAttr('hidden');
                            $('#thirdHead').removeAttr('hidden');
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
                            $("#thirdUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);

                            $("#thirdUserEmail").val(messages.approver_users.email);
                            $("#thirdApprover").val(approverByRole);
                            if(messages.approver_date !== null){
                                $("#thirdUpdateAt").val(currentDate(messages.approver_date));
                            }else if(messages.approver_date == null){
                                $("#thirdUpdateAt").val('-');
                            }
                        }else{
                            $("#thirdContent").attr('hidden', true);
                            $('#thirdHead').attr('hidden', true);
                        }

                        $('#branches_id').val(id);
                        $('#edit_branch_id').val(response.messages.branch_id);
                        $('.edit_branch_name').val(response.messages.branch_name);
                        $('.edit_branch_type').val(response.messages.branch_type);
                        $('.edit_division_id').val(response.messages.division_id);
                        $('.edit_district_id').val(response.messages.district_id);
                        $('.edit_upazila_id').val(response.messages.upazila_id);
                        $('.edit_town_name').val(response.messages.town_name);
                        $('.edit_location').val(response.messages.location);
                        
                    }
                    
                }
            });
        });

        // fetch branch for dropdown
        function searchBranch(){
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
                    const all_branchs = response.allBranch;
                    $("#select_branch").empty();
                    $("#select_branch").append('<option value="">Select Company Branch Name</option>');
                    $.each(all_branchs, function(key, item) {
                        $("#select_branch").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.branch_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_branch").empty();
                    $("#select_branch").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

    });
</script>