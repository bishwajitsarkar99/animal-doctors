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

        // Data View Table--------------
        const table_rows = (rows) => {
            // Define the "Add New" row
            const addNewRow = `
                <tr class="table-row user-table-row data-table-row clicked temp-highlight" id="row_id_new" value="" tabindex="0">
                    <td class="sn td_border_empty id-font" id="role_create_btn" value="" tabindex="0">
                        <span class="permission-plate pe-1 ms-1"><i class="fa-solid fa-database" style="color: forestgreen;"></i></span>
                    </td>
                    <td class="td_border_empty font padding role_name placeholder_text" colspan="3" contenteditable="true" tabindex="0" id="roleName"></td>
                </tr>
            `;
            if (!rows || rows.length === 0) {
                return `
                    <tr class="table-row">
                        <td class="error_data text-danger" align="center" colspan="7">
                            ${message || 'Role Currently Not Exists On Server! Please Search......'}
                        </td>
                    </tr>
                `;
            } 

            return addNewRow + rows.map((row, key) => {
                let statusText, statusSinge, statusClass, statusBg, textColor;
                if(row.status == 0){
                    statusText = 'non-promot';
                    statusSinge = '<i class="fa-solid fa-xmark"></i>';
                    statusClass = 'text-white';
                    textColor = 'text-danger';
                    statusBg = 'badge rounded-pill bg-danger';
                }else if(row.status == 1){
                    statusText = 'promoted';
                    statusSinge = '<i class="fa-solid fa-check"></i>';
                    statusClass = 'text-white';
                    textColor = 'text-dark';
                    statusBg = 'badge rounded-pill bg-success';
                }
                
                let idLink, disabledLabel;
                if(row.role_condition === 'non-static'){
                    idLink = row.id;
                    disabledLabel = '';
                }else if(row.role_condition === 'static'){
                    idLink = '';
                    disabledLabel = 'disabled';
                }
                return `
                    <tr class="table-row user-table-row data-table-row" id="row_id" value="${key}" tabindex="0">
                        <td class="sn td_border id-font" id="table_edit_btn" value="${idLink}" data-id="${row.id}" tabindex="0" ${disabledLabel}>${row.id}</td>
                        <td class="td_border font padding" contenteditable="true" tabindex="0">
                            <span class="role-name">${row.name}</span>
                        </td>
                        <td class="td_border font padding" tabindex="0">
                            <span class="condition">${row.role_condition}</span>
                        </td>
                        <td class="td_border font padding ${textColor}" tabindex="0">
                            <span class="promt">${statusText}</span>
                            <span class="permission-plate ps-1 pe-1 ms-1 ${statusBg} ${statusClass}">${statusSinge}</span>
                        </td>
                    </tr>
                `;
            }).join("");
        };

        // Fetch Users Data ------------------
        function fetch_roles(query = '') {
            const current_url = "{{ route('role_get.action') }}";
            const input_value = $("#RoleSearchBar").val();

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { query: query, name: input_value },
                success: function(response) {
                    const { status, data, total, current, message } = response;

                    // Handle the table rendering based on the status
                    if (status === 'success') {
                        $("#role_table").html(table_rows(data));
                        $("#module_catg_row_amount").text(`${total}.00`);
                        $("#module_catg_current_amount").text(` [ Current-Role : ${current}.00 ] `);
                        $("#module_catg_current_amount").removeAttr('hidden');
                    } else {
                        $("#role_table").html(`
                            <tr class="table-row">
                                <td class="error_data text-danger" align="center" colspan="7">
                                    ${message || 'Role Currently Not Exists On Server! Please Search......'}
                                </td>
                            </tr>
                        `);
                        $("#module_catg_row_amount").text('0.00');
                        $("#module_catg_current_amount").attr('hidden', true);
                    }

                    // Initialize tooltips
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Populate autocomplete suggestions
                    const suggestions = data.map(item => item.name);
                    $("#RoleSearchBar").autocomplete({
                        source: suggestions
                    });
                },
                error: function() {
                    $("#role_table").html(`
                        <tr class="table-row">
                            <td class="error_data text-danger" align="center" colspan="7">
                                Error Fetching Data!
                            </td>
                        </tr>
                    `);
                    $("#module_catg_row_amount").text('0.00');
                }
            });
        }

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
                                $("#savForm_error").fadeIn();
                                $('#savForm_error').html('<span class="ps-2" style="font-size:10px;font-weight:700;letter-spacing: 1px;">' + err_value + '</span>');
                                $("#select_user_branch").next('.select2-container').find('.select2-selection').addClass('is-invalid');
                                $("#savForm_error").addClass("alert_show_errors");
                                $('#select_user_branch').addClass('is-invalid');
                            }else if (key === 'login_email') {
                                $("#savForm_error2").fadeIn();
                                $('#savForm_error2').html('<span class="ps-2" style="font-size:10px;font-weight:700;letter-spacing: 1px;">' + err_value + '</span>');
                                $("#select_user_email").next('.select2-container').find('.select2-selection').addClass('is-invalid');
                                $("#savForm_error2").addClass("alert_show_errors");
                                $('#select_user_email').addClass('is-invalid');
                            } else if (key === 'role') {
                                $("#savForm_error3").fadeIn();
                                $('#savForm_error3').html('<span class="ps-2" style="font-size:10px;font-weight:700;letter-spacing: 1px;">' + err_value + '</span>');
                                $("#select_user_role").next('.select2-container').find('.select2-selection').addClass('is-invalid');
                                $("#savForm_error3").addClass("alert_show_errors");
                                $('#select_user_role').addClass('is-invalid');
                            } else if (key === 'status') {
                                $("#savForm_error4").fadeIn();
                                $('#savForm_error4').html('<span class="ps-2" style="font-size:10px;font-weight:700;letter-spacing: 1px;">' + err_value + '</span>');
                                $("#savForm_error4").addClass("alert_show_errors");
                                $('#rolePermission').addClass('is-invalid');
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
                            inputClear();
                            setTimeout(() => {
                                // $('#add_documents').attr('hidden', true);
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

        // input field clear
        function inputClear(){
            $("#select_user_branch").val("").trigger('change');
            $("#select_user_email").val("").trigger('change');
            $("#select_user_role").val("").trigger('change');
            $("input[name='status']:checked").val("");
        }
        // Cancel field
        $(document).on('click', '#roleCancelBtn', function(){
            $("#savForm_error").empty();
            $("#savForm_error").fadeOut();
            $("#select_user_branch").val("").trigger('change');
            $("#select_user_branch").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            $("#savForm_error2").empty();
            $("#savForm_error2").fadeOut();
            $("#select_user_email").val("").trigger('change');
            $("#select_user_email").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            $("#savForm_error3").empty();
            $("#savForm_error3").fadeOut();
            $("#select_user_role").val("").trigger('change');
            $("#select_user_role").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            $("#savForm_error4").empty();
            $("#savForm_error4").fadeOut();
            $("input[name='status']:checked").val("");
        });
    
        // On Change action for error remove
        $(document).on('change', '#select_user_branch, #select_user_email, #select_user_role', function(){
    
            var select_branch = $("#select_user_branch").val();
            var select_email = $("#select_user_email").val();
            var select_role = $("#select_user_role").val();
    
            if(select_branch !== ''){
                $("#savForm_error").fadeOut();
                $("#savForm_error").addClass('display-none');
                $("#select_user_branch").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#updateForm_error").fadeOut();
                $("#updateForm_error").addClass('display-none');
                $(".edit_select_user_branch").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            }
            if(select_email !== ''){
                $("#savForm_error2").fadeOut();
                $("#savForm_error2").addClass('display-none');
                $("#select_user_email").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#updateForm_error2").fadeOut();
                $("#updateForm_error2").addClass('display-none');
                $(".edit_select_user_email").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            }
            if(select_role !== ''){
                $("#savForm_error3").fadeOut();
                $("#savForm_error3").addClass('display-none');
                $("#select_user_role").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#updateForm_error3").fadeOut();
                $("#updateForm_error3").addClass('display-none');
                $(".edit_select_user_role").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            }
    
        });
        
    });
</script>