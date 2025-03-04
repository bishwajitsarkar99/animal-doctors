<script>
    $(document).ready(function(){
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if ($(this).attr('id') === 'select_user_email_search') {
                $(this).select2({
                    placeholder: 'Select User Email',
                    allowClear: true,
                    width: '100%'
                });
            }else if ($(this).attr('id') === 'select_user_branch') {
                $(this).select2({
                    placeholder: 'Select Branch',
                    allowClear: true,
                    width: '100%'
                });
            }else if ($(this).attr('id') === 'select_user_email') {
                $(this).select2({
                    placeholder: 'Select User Email Address',
                    allowClear: true,
                    width: '100%'
                });
            }else if ($(this).attr('id') === 'select_user_role') {
                $(this).select2({
                    placeholder: 'Select Role',
                    allowClear: true,
                    width: '100%'
                });
            }
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_user_email_search').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search user email...');
        });
        $('#select_user_branch').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role play...');
        });
        $('#select_user_email').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role...');
        });
        $('#select_user_role').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
        });

        branchFetch();
        fetch_branch_emails();
        fetch_user_role();
        // Fetch Branch
        function branchFetch(){
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
                    $("#select_user_branch").empty();
                    $("#select_user_branch").append('<option value="">Select Company Branch Name</option>');
                    $.each(all_branchs, function(key, item) {
                        $("#select_user_branch").append(`<option style="color:white;font-weight:600;" value="${item.branch_id}">${item.branch_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_user_branch").empty();
                    $("#select_user_branch").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Handle Select branch
        $(document).on('change', '#select_user_branch', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_user_email").empty();
                $("#select_user_email").empty();
                $("#select_user_email").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });

        // Event listener for only for branch
        $(document).on('change', '#select_user_branch', function() {
            const selectedBranch = $(this).val();
            fetch_branch_emails(selectedBranch);
        });

        // Function to fetch only user email
        function fetch_branch_emails (selectedBranch) {
            if (!selectedBranch) {
                return;
            }

            const currentUrl = "/super-admin/branch-data-get/"+ selectedBranch ;

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
                        $("#select_user_email").append(`<option style="color:white;font-weight:600;" value="${item.login_email}">${item.login_email}</option>`);
                    });
                },
                error: function() {
                    $("#select_user_email").empty();
                    $("#select_user_email").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select user email</option>');
                }
            });
        }

        // Function to fetch only user role
        function fetch_user_role () {

            const currentUrl = "{{ route('users_role_fetch.action')}}" ;

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
                    $("#select_user_role").append('<option value="">Select Company Branch Name</option>');
                    $.each(roles, function(key, item) {
                        $("#select_user_role").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_user_role").empty();
                    $("#select_user_role").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select user role</option>');
                }
            });
        }

        // Add Role Permission
        $(document).on('click', '#createBtn', function(e){
            e.preventDefault();

            var branch = $("#select_user_branch").val();
            var user_email = $("#select_user_email").val();
            var user_role = $("#select_user_role").val();
            var role_permission = $("input[name='status']:checked").val();

            const current_url = "{{ route('role_permission_create.action')}}";

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
                    branch_id: branch,
                    login_email: user_email,
                    role: user_role,
                    status: role_permission ? 1 : 0,
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
                            }else if (key === 'login_email') {
                                $("#savForm_branch_error2").fadeIn();
                                $('#savForm_branch_error2').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error2").addClass("alert_show_errors");
                                $('#add_branch_name').addClass('is-invalid');
                                $('#add_branch_name').html("");
                            } else if (key === 'role') {
                                $("#savForm_branch_error3").fadeIn();
                                $('#savForm_branch_error3').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error3").addClass("alert_show_errors");
                                $('#add_branch_type').addClass('is-invalid');
                                $('#add_branch_type').html("");
                            } else if (key === 'status') {
                                $("#savForm_branch_error4").fadeIn();
                                $('#savForm_branch_error4').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_branch_error4").addClass("alert_show_errors");
                                $('#add_division_id').addClass('is-invalid');
                                $('#add_division_id').html("");
                            }
                        });
                    }else if(response.status == 200){
                        $("#branchAdminAccessCreateModal").modal('hide');
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            $('#updateForm_error').html("");
                            $('#success_message').html("");
                            // Show Success Message Smoothly
                            requestAnimationFrame(() => {
                                $("#success_message").html(response.messages).fadeIn().addClass("alert_show ps-1 pe-1");
                            });
                            // inputClear();
                            setTimeout(() => {
                                $('#add_documents').attr('hidden', true);
                                requestAnimationFrame(() => {
                                    $("#success_message").fadeOut();
                                    // fetch_branch();
                                });
                            }, 3000);
                            // fetch_branch_user_email();
                        }, 1500);
                    }
                }
            });

        });

        
    });
</script>