<script>
    $(document).ready(() => {
        fetch_role_names();
        // Function to fetch roles
        function fetch_role_names() {
            const currentUrl = "{{ route('permission.show') }}";

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
                    $("#select_role").empty();
                    $("#select_role").append('<option value="" style="color:darkgreen;font-weight:600;">Select Role</option>');
                    $.each(roles, function(key, item) {
                        $("#select_role").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_role").empty();
                    $("#select_role").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        // Event listener for role dropdown
        $(document).on('change', '#select_role', function() {
            const selectedRole = $(this).val();
            fetch_users_email(selectedRole);
        });
        // Get Email in Dropdown
        function fetch_users_email(selectedRole) {
            const currentUrl = "{{ route('permission.email', ':selectedRole') }}".replace(':selectedRole', selectedRole);

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
                    $("#select_email").empty();
                    $.each(users, function(key, item) {
                        $("#select_email").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.email}</option>`);
                    });
                },
                error: function() {
                    $("#select_email").empty();
                    $("#select_email").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select the role</option>');
                }
            });
        }
        // Check Permission
        $(document).on('change', '#statusChecking', function() {
            if (this.checked) {
                $("#statusJustify").removeAttr('hidden');
                $("#statusDeny").attr('hidden', true);
            } else {
                $("#statusJustify").attr('hidden', true);
                $("#statusDeny").removeAttr('hidden');
            }
        });
        // Update Button Loader
        $(document).on('click', '.updt_btn', function(){
            $(".updt-icon").removeClass('updt-hidden');
            var time = null;

            time = setTimeout(() => {
                $(".updt-icon").addClass('updt-hidden'); 
            }, 500);

            return ()=>{
                clearTimeout(time);
            }
        });
        // Cancel Button Loader
        $(document).on('click', '#PermissionCancel', function(){
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
            $('#select_role').val("");
            $('#select_email').val("");
            $("input[name='permission_status']").prop('checked', false);
            $("input[name='data_export_status']").prop('checked', false);
        }
        fetch_inventory_access_permission();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data text-danger" align="center" colspan="11">
                            Inventory Access Permission Not Exists On Server!
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => `
                <tr class="btn-hover table_body" key="${key}" id="supp_tab">
                    <td class="ps-1 font table_body">${row.id}</td>
                    <td class="ps-1 font table_body2">${row.roles && row.roles.name ? row.roles.name : 'No Role'}</td>
                    <td class="ps-1 font table_body3">${row.users && row.users.email ? row.users.email : 'No Email'}</td>
                    <td class="ps-1 font table_body4 ${row.permission_status}" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.permission_status ? 'text-dark' : 'text-danger'}">
                            ${row.permission_status ? '✅ Justify' : '❌ Deny'}
                        </span>
                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                    </td>
                    <td class="ps-1 font table_body4 ${row.data_export_status}" id="supp_tab15">
                        <span class="permission-plates permission ps-1 ${row.data_export_status ? 'text-dark' : 'text-danger'}">
                            ${row.data_export_status ? '✅ Data Export' : '❌ Deny'}
                        </span>
                        <span class="fbox"><input id="light_focus" type="text" class="light2-focus"></span>
                    </td>
                    <td class="ps-1 font table_body5">
                        <button type="button" class="" id="edtBtn" value="${row.id}" style="font-size: 10px;cursor: pointer;height:15px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                            <i class="fa-solid fa-pen-to-square" style="color: blue;"></i>
                        </button>
                        <button type="button" class="deleteBtn ms-1" id="permissionDeleteBtn" value="${row.id}" style="font-size: 10px;cursor: pointer;height:15px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                            <i class="fa-solid fa-trash-can" style="color: orangered;"></i>
                        </button>
                    </td>
                </tr>
            `).join("");
        }
        // Get Inventory Permission Access Data
        function fetch_inventory_access_permission(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControls").val();
            }

            let current_url = url ? url : `{{ route('permission.show') }}?per_item=${perItem}`;

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
                    $("#searchID").autocomplete({ source: permissionID });
                }

            });
        }
        // peritem change
        $("#perItemControls").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_inventory_access_permission('', null, value);
        });

        // Live-Search-----------------------------
        $(document).on('keyup', '#searchID', function() {
            var query = $(this).val();
            fetch_inventory_access_permission(query);
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
                fetch_inventory_access_permission('', url);
            }

        });

        // Store Access Permission
        $(document).on('click', '#PermissionSubmit', function(e) {
            e.preventDefault();
            // Input Field Validation
            $('.error-message').remove();

            var roleName = $("#select_role").val();
            var userEmail = $("#select_email").val();
            var permissionStatus = $("input[name='permission_status']:checked").val();

            if (!roleName) {
                $("#select_role").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the role name.</span>');
            }
            if (!userEmail) {
                $("#select_email").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the user email.</span>');
            }
            if (!permissionStatus) {
                $("#permission_status").closest('.role_nme').append('<span class="error-message alert_show_errors">Permission status is required.</span>');
            }

            // Check if there are any error messages
            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }

            var data = {
                'roles_id': $('#select_role').val(),
                'emails_id': $('#select_email').val(),
                'permission_status': permissionStatus ? 1 : 0,
                'data_export_status': permissionStatus ? 0 : 1,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('permission.store') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').addClass('alert_show_errors');
                            $('#savForm_error').append('<span class="error_val">' + err_value + '</span>');
                            $('#savForm_error').fadeIn();
                            setTimeout(() => {
                                $('#savForm_error').fadeOut();
                            }, 3000);
                        });
                    } else {
                        $('#savForm_error').html("");
                        $('#success_messages_permission').html("");
                        $('#success_messages_permission').addClass('alert_show ps-1 pe-1');
                        $('#success_messages_permission').fadeIn();
                        $('#success_messages_permission').text(response.messages);
                        $('#select_role').val("");
                        $('#select_email').val("");
                        $("input[name='permission_status']").prop('checked', false);
                        $("input[name='data_export_status']").prop('checked', false);
                        $("#statusJustify").attr('hidden', true);
                        $("#statusDeny").attr('hidden', true);
                        setTimeout(() => {
                            $('#success_messages_permission').fadeOut();
                        }, 3000);
                    }
                    fetch_inventory_access_permission();
                }
            });
        });

        // Edit Access Permission
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#PermissionSubmit").hide('slow');
            $("#PermissionUpdate").removeAttr('hidden');
            $(".updt_btn").show('slow');
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-permission/" + id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#permission_id').val(id);
                        $('.select_role').val(response.messages.roles_id);
                        fetch_users_email(response.messages.roles_id);
                        setTimeout(() => {
                            $('.select_email').val(response.messages.emails_id);
                        }, 500);
                        $('#statusChecking').prop('checked', response.messages.permission_status == 1);
                        $('#dataStatusChecking').prop('checked', response.messages.data_export_status == 1);
                        
                        if ($('#statusChecking').is(':checked')) {
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
        });

        // Update Access Permission
        $(document).on('click', '.permission_confirm_btn', function(e){
            e.preventDefault();

            // Input Field Validation
            $('.error-message').remove();

            var roleName = $("#select_role").val();
            var userEmail = $("#select_email").val();
            var permissionStatus = $("input[name='permission_status']:checked").val();
            var dataExportStatus = $("input[name='data_export_status']:checked").val();

            if (!roleName) {
                $("#select_role").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the role name.</span>');
            }
            if (!userEmail) {
                $("#select_email").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Select the user email.</span>');
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
                'roles_id': $('.select_role').val(),
                'emails_id': $('.select_email').val(),
                'permission_status': permissionStatus ? 1 : 0,
                'data_export_status': dataExportStatus ? 1 : 0,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-permission/" + id,
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
                        $('#success_messages_permission').addClass('alert_show ps-1 pe-1');
                        $('#success_messages_permission').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#success_messages_permission').html("");
                        $('#success_messages_permission').addClass('alert_show ps-1 pe-1');
                        $('#success_messages_permission').fadeIn();
                        $('#success_messages_permission').text(response.messages);
                        $('#permission_id').val("");
                        clearFields();
                        $("#accessPermissionModal").modal('hide');
                        $("#PermissionUpdate").hide();
                        $("#PermissionSubmit").show();
                        $("#statusJustify").attr('hidden', true);
                        $("#statusDeny").attr('hidden', true);
                        setTimeout(() => {
                            $('#success_messages_permission').fadeOut(3000);
                        }, 3000);
                        fetch_inventory_access_permission();
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
                url: "/delete-permission/" + id,
                success: function(response) {
                    $('#success_messages_permission').addClass('alert_show ps-1 pe-1');
                    $('#success_messages_permission').fadeIn();
                    $('#success_messages_permission').text(response.messages);
                    setTimeout(() => {
                        $('#success_messages_permission').fadeOut(3000);
                    }, 3000);
                    $('#accessPermissionDeleteModal').modal('hide');

                    fetch_inventory_access_permission();
                }

            });

        });

    });
</script>
<script>
    $(document).ready(() => {
        // Add-Button Loader
        $(".add_btn").on('click', () => {
            $('.add-icon').removeClass('add-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Add Permission...');
            setTimeout(() => {
                $('.add-icon').addClass('add-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Add Permission');
            }, 3000);
        });
        // Back-Button Loader
        $(".back_btn").on('click', () => {
            $('.back-icon').removeClass('back-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Back...');
            setTimeout(() => {
                $('.back-icon').addClass('back-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Back');
            }, 3000);
        });
        // Submit-Button Loader
        $(".subm_btn").on('click', () => {
            $('.submt-icon').removeClass('submt-hidden');
            $(this).attr('disabled', true);
            setTimeout(() => {
                $('.submt-icon').addClass('submt-hidden');
                $(this).attr('disabled', false);
            }, 2000);
        });
        // Edit Back-Button Loader
        $(".edit_back").on('click', () => {
            $('.edit-back-icon').removeClass('edit-back-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Back...');
            setTimeout(() => {
                $('.edit-back-icon').addClass('edit-back-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Back');
            }, 3000);
        });
        // Edit Back-Button Loader
        $(".update_btn").on('click', () => {
            $('.update-icon').removeClass('update-hidden');
            $(this).attr('disabled', true);
            // $('.btn-text').text('Back...');
            setTimeout(() => {
                $('.update-icon').addClass('update-hidden');
                $(this).attr('disabled', false);
                $("#update_message").fadeOut();
            }, 3000);
        });
        
    });
</script>
<script>
    // skeleton
    function fetchData() {
        const allSkeleton = document.querySelectorAll('.skeleton')

        allSkeleton.forEach(item => {
            item.classList.remove('skeleton')
        });
    }

    function searchData(){
        const allSkeleton = document.querySelectorAll('.search-skeletone')
        $("#searchID").removeAttr('hidden', true);
        allSkeleton.forEach(item => {
            item.classList.remove('search-skeletone')
        }); 
    }

    setTimeout(() => {
        fetchData();
        searchData();
        $("#searchID").removeAttr('hidden');
    }, 1000);
</script>