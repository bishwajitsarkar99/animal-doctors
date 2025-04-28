<script>
    $(document).ready(function(){
        // Get Roles For Fetch
        fetch_roles();
        // Get Users Email Fetch
        fetch_user_permission_email();

        // Function to fetch roles
        function fetch_roles() {
            const currentUrl = "{{ route('access-permission.index') }}";

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
                    $("#select_supplier_role").empty();
                    $("#select_supplier_role").append('<option value="" style="font-weight:600;">Select Role</option>');
                    $.each(roles, function(key, item) {
                        $("#select_supplier_role").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_supplier_role").empty();
                    $("#select_supplier_role").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // User email handle
        $(document).on('change', '#select_supplier_role', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_supplier_email").empty();
                $("#select_supplier_email").append('<option style="color:white;font-weight:600;" value="" disabled>Select the role</option>');
            }
        });

        // Event listener for role dropdown
        $(document).on('change', '#select_supplier_role', function() {
            const selectedUserRole = $(this).val();
            fetch_user_permission_email(selectedUserRole);
        });

        // Function to fetch users based on selected role
        function fetch_user_permission_email(selectedUserRole) {
            if (!selectedUserRole) {
                return;
            }

            const currentUrl = "{{ route('user-permission.email', ':selectedUserRole') }}".replace(':selectedUserRole', selectedUserRole);

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
                    $("#select_supplier_email").empty();
                    $.each(users, function(key, item) {
                        $("#select_supplier_email").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.email}</option>`);
                    });
                },
                error: function() {
                    $("#select_supplier_email").empty();
                    $("#select_supplier_email").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select the role</option>');
                }
            });
        }
        // Clear Fields
        function clearFields(){
            $('#select_role').val("");
            $('#select_email').val("");
            $("input[name='permission_status']").prop('checked', false);
            $("input[name='data_export_status']").prop('checked', false);
            $("input[name='data_table_status']").prop('checked', false);
            $("input[name='supplier_requisition_status']").prop('checked', false);
            $("input[name='supplier_payment_status']").prop('checked', false);
            $("input[name='supplier_setting_status']").prop('checked', false);
            $("input[name='supplier_summary_status']").prop('checked', false);
            $("input[name='supplier_searching_status']").prop('checked', false);
        }
        fetch_supplier_access_permission();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data text-danger" align="center" colspan="11">
                            Supplier Access Permission Data Not Exists On Server!
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => `
                <tr class="btn-hover table_body table-row user-table-row " key="${key}" id="supp_tab">
                    <td class="ps-1 font table_body">${row.id}</td>
                    <td class="ps-1 font table_body2 eml">${row.roles && row.roles.name ? row.roles.name : 'No Role'}</td>
                    <td class="ps-1 font table_body3 eml">${row.users && row.users.email ? row.users.email : 'No Email'}</td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.create_status ? 'text-dark' : 'text-danger'}">
                            ${row.create_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.update_status ? 'text-dark' : 'text-danger'}">
                            ${row.update_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.view_status ? 'text-dark' : 'text-danger'}">
                            ${row.view_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.delete_status ? 'text-dark' : 'text-danger'}">
                            ${row.delete_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.data_export_status ? 'text-dark' : 'text-danger'}">
                            ${row.data_export_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.data_table_status ? 'text-dark' : 'text-danger'}">
                            ${row.data_table_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.supplier_requisition_status ? 'text-dark' : 'text-danger'}">
                            ${row.supplier_requisition_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.supplier_setting_status ? 'text-dark' : 'text-danger'}">
                            ${row.supplier_setting_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.supplier_payment_status ? 'text-dark' : 'text-danger'}">
                            ${row.supplier_payment_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.supplier_summary_status ? 'text-dark' : 'text-danger'}">
                            ${row.supplier_summary_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body4" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.supplier_searching_status ? 'text-dark' : 'text-danger'}">
                            ${row.supplier_searching_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span>' : '❌'}
                        </span>
                    </td>
                    <td class="ps-1 font table_body5" id="supp_tab15">
                        <button type="button" class="editBtn" id="edtBtn" value="${row.id}" style="font-size: 10px; cursor: pointer; height:15px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                            <i class="fa-solid fa-pen-to-square" style="color: blue;"></i>
                        </button>
                        <button type="button" class="deleteBtn ms-1" id="permissionDeleteBtn" value="${row.id}" style="font-size: 10px;float: left; cursor: pointer; height:15px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                            <i class="fa-solid fa-trash-can" style="color: orangered;margin-left: -3px;"></i>
                        </button>
                    </td>
                </tr>
            `).join("");
        };

        // Get Inventory Permission Access Data
        function fetch_supplier_access_permission(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControls").val();
            }

            let current_url = url ? url : `{{ route('access-permission.index') }}?per_item=${perItem}`;

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query
                },
                success: function({
                    data,
                    links,
                    total
                    
                }) {
                    $("#access_permission_data_table").html(table_rows([...data]));
                    $("#access_permission_data_table_paginate").html(paginate_html({ links, total }));
                    $("#total_inventory_access_permission_records").text(total);
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    const permissionID = data.map(item => ({
                        label: `${item.id} - ${item.users.email}`,
                        value: item.id,
                    }));
                    $("#roleSearch").autocomplete({ source: permissionID });
                }

            });
        }
        // peritem change
        $("#perItemControls").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_supplier_access_permission('', null, value);
        });

        // Live-Search-----------------------------
        $(document).on('keyup', '#roleSearch', function() {
            var query = $(this).val();
            fetch_supplier_access_permission(query);
        });

        // Paginate Page-------------------------------
        const paginate_html = ({ links, total }) => {
            if (total === 0 || !Array.isArray(links)) {
                return "";
            }

            const paginationLinks = links.map(link => {
                return `
                    <li class="page-item ${link.active ? 'active' : ''}">
                        <a class="page-link" href="${link.url ? link.url : '#'}" ${link.url ? '' : 'tabindex="-1" aria-disabled="true"'}>${link.label}</a>
                    </li>
                `;
            }).join('');

            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination">
                        ${paginationLinks}
                    </ul>
                </nav>
            `;
        };

        // change paginate page------------------------
        $("#access_permission_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_supplier_access_permission('', url);
            }

        });

        // Supplier Access Permission Store
        $(document).on('click', '.permission_submit', function(e) {
            e.preventDefault();
            
            // Input Field Validation
            $('.error-message').remove();

            var roleName = $("#select_supplier_role").val();
            var userEmail = $("#select_supplier_email").val();
            var permissionStatus = $("input[name='view_status']:checked").val();
            var createStatus = $("input[name='create_status']:checked").val();
            var updateStatus = $("input[name='update_status']:checked").val();
            var deleteStatus = $("input[name='delete_status']:checked").val();
            var dataExportStatus = $("input[name='data_export_status']:checked").val();
            var dataTableStatus = $("input[name='data_table_status']:checked").val();
            var dataRequistionStatus = $("input[name='supplier_requisition_status']:checked").val();
            var dataPaymentStatus = $("input[name='supplier_payment_status']:checked").val();
            var dataSettingStatus = $("input[name='supplier_setting_status']:checked").val();
            var dataSummaryStatus = $("input[name='supplier_summary_status']:checked").val();
            var dataSearchingStatus = $("input[name='supplier_searching_status']:checked").val();
            
            if (!roleName) {
                $("#select_supplier_role").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the role name.</span>');
            }
            if (!userEmail) {
                $("#select_supplier_email").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the user email.</span>');
            }
            if (!permissionStatus) {
                $("#view_status").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">View is required.</span>');
            }

            // Check if there are any error messages
            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }

            var data = {
                'user_roles_id': $('#select_supplier_role').val(),
                'user_emails_id': $('#select_supplier_email').val(),
                'view_status': permissionStatus ? 1 : 0,
                'create_status': createStatus ? 1 : 0,
                'update_status': updateStatus ? 1 : 0,
                'delete_status': deleteStatus ? 1 : 0,
                'data_export_status': dataExportStatus ? 1 : 0,
                'data_table_status': dataTableStatus ? 1 : 0,
                'supplier_requisition_status': dataRequistionStatus ? 1 : 0,
                'supplier_payment_status': dataPaymentStatus ? 1 : 0,
                'supplier_setting_status': dataSettingStatus ? 1 : 0,
                'supplier_summary_status': dataSummaryStatus ? 1 : 0,
                'supplier_searching_status': dataSearchingStatus ? 1 : 0,
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('user-permission.store') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $('#savForm_error').html("");
                        $('#savForm_error').addClass('alert_show_errors');
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').append('<span class="error_val">' + err_value + '</span>');
                        });
                        $('#savForm_error').fadeIn();
                        setTimeout(() => {
                            $('#savForm_error').fadeOut();
                        }, 3000);
                    } else {
                        $('#savForm_error').html("");
                        $('#permission_success_message').html("");
                        $('#permission_success_message').addClass('permission_alert_show ps-1 pe-1');
                        $('#permission_success_message').fadeIn();
                        $('#permission_success_message').text(response.messages);
                        $('#select_supplier_role').val("");
                        $('#select_supplier_email').val("");
                        clearFields();
                        $("#statusJustify").attr('hidden', true);
                        $("#statusDeny").attr('hidden', true);
                        setTimeout(() => {
                            $('#permission_success_message').fadeOut();
                        }, 3000);
                    }
                    fetch_supplier_access_permission();
                }
            });
        });
        // Submit Button
        $(document).on('click', '#PermissionSubmit', function(){

            $(".submt-icon").removeClass('submt-hidden');
            var time = null;

            time = setTimeout(() => {
                $(".submt-icon").addClass('submt-hidden'); 
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // Refresh Button
        $(document).on('click', '#refresh', function(){

            $(".refresh-icon").removeClass('refrsh-hidden');
            var time = null;

            time = setTimeout(() => {
                $(".refresh-icon").addClass('refrsh-hidden'); 
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
            fetch_supplier_access_permission();
            fetch_roles();
            fetch_user_permission_email();


        });
        // Supplier Access Permission Edit
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#PermissionSubmit").hide('slow');
            $("#PermissionUpdate").removeAttr('hidden');
            $(".updt_btn").show('slow');
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/super-admin/edit-permission/" + id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#permission_success_message').html("");
                        $('#permission_success_message').addClass('alert alert-danger');
                        $('#permission_success_message').text(response.messages);
                    } else {
                        $('#permission_id').val(id);
                        $('.select_supplier_role').val(response.messages.user_roles_id);
                        fetch_user_permission_email(response.messages.user_roles_id);
                        setTimeout(() => {
                            $('.select_supplier_email').val(response.messages.user_emails_id);
                        }, 500);
                        $('#create_status').prop('checked', response.messages.create_status == 1);
                        $('#update_status').prop('checked', response.messages.update_status == 1);
                        $('#delete_status').prop('checked', response.messages.delete_status == 1);
                        $('#view_status').prop('checked', response.messages.view_status == 1);
                        $('#data_export_status').prop('checked', response.messages.data_export_status == 1);
                        $('#data_table_status').prop('checked', response.messages.data_table_status == 1);
                        $('#supplier_requisition_status').prop('checked', response.messages.supplier_requisition_status == 1);
                        $('#supplier_payment_status').prop('checked', response.messages.supplier_payment_status == 1);
                        $('#supplier_setting_status').prop('checked', response.messages.supplier_setting_status == 1);
                        $('#supplier_summary_status').prop('checked', response.messages.supplier_summary_status == 1);
                        $('#supplier_searching_status').prop('checked', response.messages.supplier_searching_status == 1);
                        
                        if ($('#create_status').is(':checked')) {
                            $("#statusJustify").removeAttr('hidden');
                            $("#statusDeny").attr('hidden', true);
                        } else {
                            $("#statusJustify").attr('hidden', true);
                            $("#statusDeny").removeAttr('hidden');
                        }
                    }
                }
            });
        });

        // Update Modal Show
        $(document).on('click', '#PermissionUpdate', function(e){
            e.preventDefault(); 
            $("#accessPermissionModal").modal('show');
            $('.updt-icon').removeClass('updt-hidden');

            setTimeout(() => {
                $('.updt-icon').addClass('updt-hidden');
            }, 1000);
        });

        // Update Access Permission
        $(document).on('click', '.permission_confirm_btn', function(e){
            e.preventDefault();

            // Input Field Validation
            $('.error-message').remove();

            var roleName = $("#select_supplier_role").val();
            var userEmail = $("#select_supplier_email").val();
            var permissionStatus = $("input[name='view_status']:checked").val();
            var createStatus = $("input[name='create_status']:checked").val();
            var updateStatus = $("input[name='update_status']:checked").val();
            var deleteStatus = $("input[name='delete_status']:checked").val();
            var dataExportStatus = $("input[name='data_export_status']:checked").val();
            var dataTableStatus = $("input[name='data_table_status']:checked").val();
            var dataRequistionStatus = $("input[name='supplier_requisition_status']:checked").val();
            var dataPaymentStatus = $("input[name='supplier_payment_status']:checked").val();
            var dataSettingStatus = $("input[name='supplier_setting_status']:checked").val();
            var dataSummaryStatus = $("input[name='supplier_summary_status']:checked").val();
            var dataSearchingStatus = $("input[name='supplier_searching_status']:checked").val();

            if (!roleName) {
                $("#select_supplier_role").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the role name.</span>');
            }
            if (!userEmail) {
                $("#select_supplier_email").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the user email.</span>');
            }
            if (!permissionStatus) {
                $("#permission_status").closest('.role_nme').append('<span class="error-message alert_show_errors">Permission status is required.</span>');
            }

            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }

            var id = $('#permission_id').val();
            var data = {
                'user_roles_id': $('#select_supplier_role').val(),
                'user_emails_id': $('#select_supplier_email').val(),
                'view_status': permissionStatus ? 1 : 0,
                'create_status': createStatus ? 1 : 0,
                'update_status': updateStatus ? 1 : 0,
                'delete_status': deleteStatus ? 1 : 0,
                'data_export_status': dataExportStatus ? 1 : 0,
                'data_table_status': dataTableStatus ? 1 : 0,
                'supplier_requisition_status': dataRequistionStatus ? 1 : 0,
                'supplier_payment_status': dataPaymentStatus ? 1 : 0,
                'supplier_setting_status': dataSettingStatus ? 1 : 0,
                'supplier_summary_status': dataSummaryStatus ? 1 : 0,
                'supplier_searching_status': dataSearchingStatus ? 1 : 0,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/super-admin/update-permission/" + id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').addClass('alert_show_errors skeleton ps-1 pe-1');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateForm_errorList").fadeOut(40000);

                            var time = null;
                            time = setTimeout(() => {
                                $("#updateForm_errorList").removeClass('skeleton');
                            }, 3000);
                            return ()=>{
                                clearTimeout(time);
                            }
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#permission_success_message').addClass('permission_alert_show ps-1 pe-1');
                        $('#permission_success_message').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#permission_success_message').html("");
                        $('#permission_success_message').addClass('permission_alert_show ps-1 pe-1');
                        $('#permission_success_message').fadeIn();
                        $('#permission_success_message').text(response.messages);
                        $('#permission_id').val("");
                        clearFields();
                        $("#accessPermissionModal").modal('hide');
                        $("#PermissionUpdate").hide();
                        $("#PermissionSubmit").show();
                        $("#statusJustify").attr('hidden', true);
                        $("#statusDeny").attr('hidden', true);
                        setTimeout(() => {
                            $('#permission_success_message').fadeOut(3000);
                        }, 3000);
                        fetch_supplier_access_permission();
                    }
                }
            });

        });

        // Delete Access Modal Show
        $(document).on('click', '#permissionDeleteBtn', function(e){
            e.preventDefault();
            var id = $(this).val();
            $('#delete_access_permission_id').val(id); 
            $("#accessPermissionDeleteModal").modal('show');

        });

        // Delete Access Permission
        $(document).on('click', '#confirm_delete_btn', function(e){
            e.preventDefault();
            $('.error-message').remove();
            var id = $('#delete_access_permission_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/super-admin/delete-permission/" + id,
                success: function(response) {
                    $('#permission_success_message').addClass('permission_alert_show ps-1 pe-1');
                    $('#permission_success_message').fadeIn();
                    $('#permission_success_message').text(response.messages);
                    setTimeout(() => {
                        $('#permission_success_message').fadeOut(3000);
                    }, 3000);
                    $('#accessPermissionDeleteModal').modal('hide');

                    fetch_supplier_access_permission();
                }

            });

        });

       // Checkbox checking
        $("#create_status, #update_status, #delete_status, #view_status, #data_export_status").on('change', () => {

            var create = $("#create_status").is(':checked');
            var update_status = $("#update_status").is(':checked');
            var delete_status = $("#delete_status").is(':checked');
            var view_status = $("#view_status").is(':checked');
            var data_export_status = $("#data_export_status").is(':checked');

            $("#statusJustify").attr('hidden', true);
            $("#statusDeny").attr('hidden', true);

            if (create || update_status || delete_status || view_status || data_export_status || dataTableStatus || dataRequistionStatus || dataPaymentStatus || dataSettingStatus || dataSummaryStatus || dataSearchingStatus) {
                $("#statusJustify").removeAttr('hidden');
            } else {
                $("#statusDeny").removeAttr('hidden');
            }

        });

        // Cancel Button
        $(document).on('click', '.permission_calncel', function(){
            
            $(".updt_btn").hide('slow');
            $(".subm_btn").show('slow');
            $(".cancel-icon").removeClass('cancel-hidden');
            $("#statusJustify").attr('hidden', true);
            $("#statusDeny").attr('hidden', true);

            clearFields();
            var time = null;

            time = setTimeout(() => {
                $(".cancel-icon").addClass('cancel-hidden'); 
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        // Clear Fields
        function clearFields(){
            $('#select_supplier_role').val("");
            $('#select_supplier_email').val("");
            $("input[name='create_status']").prop('checked', false);
            $("input[name='update_status']").prop('checked', false);
            $("input[name='delete_status']").prop('checked', false);
            $("input[name='view_status']").prop('checked', false);
            $("input[name='data_export_status']").prop('checked', false);
            $("input[name='data_table_status']").prop('checked', false);
            $("input[name='supplier_requisition_status']").prop('checked', false);
            $("input[name='supplier_payment_status']").prop('checked', false);
            $("input[name='supplier_setting_status']").prop('checked', false);
            $("input[name='supplier_summary_status']").prop('checked', false);
            $("input[name='supplier_searching_status']").prop('checked', false);
        }

    });
</script>