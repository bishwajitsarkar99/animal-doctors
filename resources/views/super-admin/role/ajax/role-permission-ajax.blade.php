<script type="module">
    import {activeTableRow} from "/module/module-min-js/helper-function-min.js";
    $(document).ready(function(){
        // ACtive table row background
        $(document).on('click keydown', 'tr.table-row', function (event) {
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                activeTableRow(this);
            }
        });
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
            if (!rows || rows.length === 0) {
                return `
                    <tr class="table-row">
                        <td class="error_data text-danger" align="center" colspan="7">
                            ${message || 'Role Currently Not Exists On Server! Please Search......'}
                        </td>
                    </tr>
                `;
            } 

            return rows.map((row, key) => {
                let statusText, statusSinge, statusClass, statusBg, textColor;
                if(row.status == 0){
                    statusText = 'deny';
                    statusSinge = '<i class="fa-solid fa-xmark"></i>';
                    statusClass = 'text-white';
                    textColor = 'text-danger';
                    statusBg = 'badge rounded-pill bg-danger';
                }else if(row.status == 1){
                    statusText = 'justify';
                    statusSinge = '<i class="fa-solid fa-check"></i>';
                    statusClass = 'text-white';
                    textColor = 'text-dark';
                    statusBg = 'badge rounded-pill bg-success';
                }
                
                return `
                    <tr class="table-row data-table-row user-table-row temp-highlight" id="row_id" value="${key}" tabindex="0">
                        <td class="sn td_border id-font" id="table_id_btn" data-id="${row.id}" tabindex="0" style="color: #3b71ca;">
                            ${row.id}
                        </td>
                        <td class="td_border font padding" tabindex="0">
                            <span class="role-name">${row.branch_id}</span>
                        </td>
                        <td class="td_border font padding" tabindex="0">
                            <span class="condition">${row.role ? row.role.name : 'N/A'}</span>
                        </td>
                        <td class="td_border font padding" tabindex="0">
                            <span class="condition">${row.login_email}</span>
                        </td>
                        <td class="td_border font padding ${textColor}" tabindex="0">
                            <span class="promt">${statusText}</span>
                            <span class="permission-plate ps-1 pe-1 ms-1 ${statusBg} ${statusClass}">${statusSinge}</span>
                        </td>
                        <td class="td_border font padding" tabindex="0">
                            <span class="condition">${row.created_user ? row.created_user.name : '<i class="fa-solid fa-minus" style="padding-left:25px;color:#00000087;">‌</i>'}</span>
                        </td>
                        <td class="td_border font padding" tabindex="0">
                            <span class="condition">${row.updated_user ? row.updated_user.name : '<i class="fa-solid fa-minus" style="padding-left:25px;color:#00000087;">‌</i>'}</span>
                        </td>
                    </tr>
                `;
            }).join("");
        };

        // Event delegation for row key events
        $("#role_permission_table").on("keydown", ".data-table-row", function (event) {
            const keyCode = event.which || event.keyCode;

            // Arrow Down key: Move focus to the next row or loop back to the first row
            if (keyCode === 40) {
                const nextRow = $(this).next(".data-table-row");
                if (nextRow.length) {
                    $(this).attr("data-val", 0).removeClass("highlight-row");
                    nextRow.attr("data-val", 1).addClass("highlight-row").focus();
                    nextRow.addClass("active-row").siblings().removeClass("active-row");
                } else {
                    const firstRow = $(".data-table-row").first();
                    if (firstRow.length) {
                        $(this).attr("data-val", 0).removeClass("highlight-row");
                        firstRow.attr("data-val", 1).addClass("highlight-row").focus();
                        firstRow.addClass("active-row").siblings().removeClass("active-row");
                    }
                }
                event.preventDefault();
            }

            // Arrow Up key: Move focus to the previous row or loop back to the last row
            if (keyCode === 38) {
                const prevRow = $(this).prev(".data-table-row");
                if (prevRow.length) {
                    $(this).attr("data-val", 0).removeClass("highlight-row");
                    prevRow.attr("data-val", 1).addClass("highlight-row").focus();
                    prevRow.addClass("active-row").siblings().removeClass("active-row");
                } else {
                    const lastRow = $(".data-table-row").last();
                    $(this).attr("data-val", 0).removeClass("highlight-row");
                    lastRow.attr("data-val", 1).addClass("highlight-row").attr("tabindex", "0").focus();
                    lastRow.addClass("active-row").siblings().removeClass("active-row");
                }
                event.preventDefault(); // Prevent default scrolling behavior
            }

            // Enter key: Perform action on the selected row
            if (keyCode === 13) {
                const firstCell = $(this).find("td").first();
                if (firstCell.length) {
                    firstCell.focus();
                }
                $(this).removeClass("highlight-row");
                event.preventDefault(); 
            }
        });
        // Add focus styles for rows addClass tr
        $(document).on("focus", ".data-table-row", function () {
            $(this).addClass("highlight-row");
        });
        // removeClass tr
        $(document).on("blur", ".data-table-row", function () {
            $(this).removeClass("highlight-row");
        });

        // Handle key events on table cells / td
        $("#role_permission_table").on("keydown", "td", function (event) {
            const keyCode = event.which || event.keyCode;
            // Arrow navigation keys
            if (keyCode === 40 || keyCode === 38 || keyCode === 39 || keyCode === 37) {
                handleArrowKeys($(this), keyCode);
                event.preventDefault();
            }

            // Enter key: Perform action on the selected cell
            if (keyCode === 13) {
                const currentCell = $(this); // Current focused cell
                if (currentCell.attr("id") === "table_id_btn") {
                    //displayDropdownContent(currentCell);
                }
                event.preventDefault();
            }
        });
        // Function to handle arrow navigation keys
        function handleArrowKeys(cell, keyCode) {
            let targetCell;
            if (keyCode === 40) { // Down arrow
                targetCell = cell.closest("tr").next(".data-table-row").find("td").first();
            } else if (keyCode === 38) { // Up arrow
                targetCell = cell.closest("tr").prev(".data-table-row").find("td").first();
            } else if (keyCode === 39) { // Right arrow
                targetCell = cell.next("td");
            } else if (keyCode === 37) { // Left arrow
                targetCell = cell.prev("td");
            }
            if (targetCell && targetCell.length) {
                targetCell.focus();
            }
        }
        
        // Add focus styles for cells/ addClass for td
        $(document).on("focus", "td", function () {
            $(this).addClass("focusing-td");
        });
        // removeClass for td
        $(document).on("blur", "td", function () {
            $(this).removeClass("focusing-td");
        });

        // Fetch Users Data ------------------
        function fetch_role_permissions(email_id = '') {
            const current_url = "{{ route('role_permission_fetch.action') }}";
            const select_value = email_id || $("#select_user_email_search").val();

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {login_email: select_value },
                success: function(response) {

                    const { status, data, total, message } = response;

                    // Handle the table rendering based on the status
                    if (status === 'success') {
                        $("#role_permission_table").html(table_rows(data));
                        $("#role_permission_row_amount").text(`${total}.00`);
                    } else {
                        $("#role_permission_table").html(`
                            <tr class="table-row">
                                <td class="error_data text-danger" align="center" colspan="7">
                                    ${message || 'Role Currently Not Exists On Server! Please Search......'}
                                </td>
                            </tr>
                        `);
                        $("#role_permission_row_amount").text('0.00');
                    }

                    // Initialize tooltips
                    $('[data-bs-toggle="tooltip"]').tooltip();
                },
                error: function() {
                    $("#role_table").html(`
                        <tr class="table-row">
                            <td class="error_data text-danger" align="center" colspan="7">
                                Error Fetching Data!
                            </td>
                        </tr>
                    `);
                    $("#role_permission_row_amount").text('0.00');
                }
            });
        }

        // Search Role Permission
        $(document).on('change', '#select_user_email_search', function(e){
            var email_id = $(this).val();
            if(email_id !== ''){
                $("#accessconfirmbranch").modal('show');
                $("#dataPullingProgress").removeAttr('hidden');
                $("#access_modal_box").addClass('progress_body');
                $("#processModal_body").addClass('loading_body_area');

                setTimeout(() => {
                    $("#accessconfirmbranch").modal('hide');
                    $("#dataPullingProgress").attr('hidden', true);
                    $("#access_modal_box").removeClass('progress_body');
                    $("#processModal_body").removeClass('loading_body_area');
                    fetch_role_permissions(email_id);
                }, 1500);
            }else{
                fetch_role_permissions(email_id);
            }
        });

        branchFetch();
        fetch_branch_emails();
        fetch_user_role();
        fetch_role_permissions();
        fetchRolePermission();
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
        // Fetch Role Permission For Search Data
        function fetchRolePermission(){
            const currentUrl = "{{ route('role_permission_get.action')}}";
    
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
                    const role_permissions = response.role_permissions;
                    $("#select_user_email_search").empty();
                    $("#select_user_email_search").append('<option value="">Select Company Branch Name</option>');
                    $.each(role_permissions, function(key, item) {
                        $("#select_user_email_search").append(`<option style="color:white;font-weight:600;" value="${item.login_email}">${item.login_email}</option>`);
                    });
                },
                error: function() {
                    $("#select_user_email_search").empty();
                    $("#select_user_email_search").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        // Handle Select branch
        $(document).on('change', '#select_user_branch', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_user_email").empty();
                $("#select_user_email").append('<option style="color:white;font-weight:600;" value="" disabled>Select branch</option>');
            }
        });

        // Event listener for only for branch
        $(document).on('change', '#select_user_branch', function() {
            const selectedBranch = $(this).val();
            fetch_branch_emails(selectedBranch);
        });

        // Function to fetch only user email
        function fetch_branch_emails (selectedBranch, callback) {
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

                    if (typeof callback === 'function') {
                        callback();
                    }
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
        $("#createBtn").removeAttr('disabled');
        $(document).on('click', '#createBtn', function(e){
            e.preventDefault();

            var branch = $("#select_user_branch").val();
            var user_email = $("#select_user_email").val();
            var user_role = $("#select_user_role").val();
            var role_id = $("#user_role").val();
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
                    role_id: role_id,
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
                                requestAnimationFrame(() => {
                                    $("#success_message").fadeOut();
                                });
                            }, 3000);
                            fetch_role_permissions();
                            fetchRolePermission();
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
            $("input[name='status']").prop('checked', false);
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
            // Button Enable or Disable
            $("#updateBtn").attr('disabled', true);
            $("#roleDeleteBtn").attr('disabled', true);
            $("#createBtn").removeAttr('disabled');
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

        // on change role for user data pass
        $(document).on('change', '#select_user_role', function(){
            var role = $(this).val();
            $("#user_role").val(role);
        });

        // Edit Role Permission
        $(document).on('click keydown', '#table_id_btn', function (event) {
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                const currentCell = $(this);
                const id = currentCell.data('id');

                const current_url = "/super-admin/role-permission-edit/"+ id;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "GET",
                    url: current_url,
                    success: function(response) {
                        if(response.status == 404){
                            //$('#success_message').html("");
                        }else if(response.status == 200){
                            const messages = response.messages;
                            
                            $('#role_permission_id').val(id);
                            $('.edit_select_user_branch').val(response.messages.branch_id).trigger('change.select2');
                            fetch_branch_emails(response.messages.branch_id, function(){
                                $('.edit_select_user_email').val(response.messages.login_email).trigger('change.select2');
                                // Set the value once options are available
                            });
                            $('.edit_select_user_role').val(response.messages.role_id).trigger('change.select2');
                            $('.check_permission').val(response.messages.status).prop('checked', true);


                            // Button Enable or Disable
                            $("#updateBtn").removeAttr('disabled');
                            $("#roleDeleteBtn").removeAttr('disabled');
                            $("#createBtn").attr('disabled', true);

                            // Modal delete, update and confirm data get
                            // const updateBranch = $("#branch_update_modal");
                            // const updateBranchHeading = $("#branch_update_modal_heading");
                            // const deleteBranch = $("#delete_branch_id");
                            // const deleteBranchHeading = $("#delete_branch");
                            // const deleteBranchBody = $("#delete_branch_body");
                            // const deleteBranchConfirm = $("#delete_confrm_branch_id");
                            // updateBranch.append(`<span class="">${response.messages.branch_name}</span>`);
                            // updateBranchHeading.append(`<span class="">${response.messages.branch_name}</span>`);
                            // deleteBranch.append(`<span class="">${response.messages.branch_id}</span>`);
                            // deleteBranchHeading.append(`<span class="">${response.messages.branch_name}</span>`);
                            // deleteBranchBody.append(`<span class="">${response.messages.branch_name}</span>`);
                            // deleteBranchConfirm.append(`<span class="">${response.messages.branch_id}</span>`);
                            
                        }
                    }
                });
                // Store the currently highlighted row for later use
                const activeRow = $(".data-table-row.hightlight-row");
                activeRow.addClass("temp-highlight"); // Temporarily mark the active row
            }
        });

        // Update Role Permission
        $(document).on('click', '#updateBtn', function(e){
            e.preventDefault();
            var id = $("#role_permission_id").val();

            var brach = $('.edit_select_user_branch').val();
            var email = $('.edit_select_user_email').val();
            var role = $('.edit_select_user_role').val();
            var permission = $("input[name='status']:checked").val();

            
        });
        
    });
</script>