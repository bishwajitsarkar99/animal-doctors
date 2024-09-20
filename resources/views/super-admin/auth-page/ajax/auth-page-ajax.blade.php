<script type="module">
    import { activeTableRow } from "/module/module-min-js/helper-function-min.js";
    $(document).ready(function(){
        // ACtive table row background
        $(document).on('click', 'tr.table-row', function(){
            activeTableRow(this);
        });
        // Fetch auth pages data
        fetch_auth_page_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Auth Page Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                let statusClass, statusColor, statusText, statusBg;
                if(row.status == 0){
                    statusClass = 'text-danger';
                    statusText = '❌ Not Allowed';
                    statusColor = 'color:darkgoldenrod;background-color: #ffedd8;';
                    statusBg = 'badge rounded-pill bg-warn';
                }
                else if(row.status == 1){
                    statusClass = 'text-dark';
                    statusText = '<span style="color:green;font-weight:800;font-size: 12px;"><i class="fa-solid fa-check"></i></span> Authorize';
                    statusColor = 'color:black;background-color: #ecfffd;';
                    statusBg = 'badge rounded-pill bg-azure';
                }
                return `
                    <tr class="table-row user-table-row user_setting" key="${key}" id="user_set">
                        <td class="sn border_ord" id="user_set2">${row.id}</td>
                        <td class="txt_ ps-1" id="user_set5">${row.page_name}</td>
                        <td class="tot_order_ ps-1" id="user_set6">${row.local_host_page_url}</td>
                        <td class="tot_pending_ ps-1" id="user_set7">${row.domain_page_url}</td>
                        <td class="tot_complete_ pill ps-1 ${statusClass}">
                            <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:12px;">
                                ${statusText}
                            </span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                        
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Users Data ------------------
        function fetch_auth_page_data() {
            $.ajax({
                type: "GET",
                url: '/super-admin/auth-page',
                dataType: 'json',
                success: function({
                    pages
                }) {
                    $("#auth_page_data_table").html(table_rows([...pages]));
                }
                
            });
        }
        // Page item filter
        $(document).on('change', '#pageSelect', function() {
            var page_id = $(this).val();
            $('#edit_page_id').val($(this).val());
            var statusText = '<span class="text-gray">Permission</span>';
            var statusClass = 'text-gray';
            if (page_id === '') {
                $('#edit_page_id').val('');
                $("#input-field-one").val('');
                $("#input-field-two").val('');
                $("#permissionCheck").prop('checked', false);
                $('#pageSelect').removeClass('show-success-border').addClass('show-current-border').removeClass('is-invalid');
                $('#input-field-one').removeClass('show-success-border').addClass('show-current-border').removeClass('is-invalid');
                $('#input-field-two').removeClass('show-success-border').addClass('show-current-border').removeClass('is-invalid');
                $('#permissionCheck').removeClass('show-success-border').addClass('show-current-border').removeClass('is-invalid');
                $('#statusValue').html(statusText).addClass(statusClass);
                return;
            }

            $.ajax({
                type: "GET",
                url: '/super-admin/auth-page-filter/'+page_id,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#edit_page_id').val(page_id);
                        $('#input-field-one').val(response.data.domain_name);
                        $('#input-field-two').val(response.data.ip_name);
                        $('#permissionCheck').prop('checked', response.data.status == 1);

                        // Update the status text and styling based on the status value
                        let statusClass, statusText;
                        if (response.data.status == 0) {
                            statusClass = ' text-danger';
                            statusText = ' Not Allowed ❌';
                            $('#pageSelect').removeClass('show-success-border').addClass('is-invalid');
                            $('#input-field-one').removeClass('show-success-border').addClass('is-invalid');
                            $('#input-field-two').removeClass('show-success-border').addClass('is-invalid');
                            $('#permissionCheck').removeClass('show-success-border').addClass('is-invalid');
                        } else if (response.data.status == 1) {
                            statusClass = 'text-dark';
                            statusText = '<span style="color:green;font-weight:600;font-size: 14px;">Authorize <i class="fa-solid fa-check"></i></span>';
                            $('#pageSelect').addClass('show-success-border').removeClass('is-invalid');
                            $('#input-field-one').addClass('show-success-border').removeClass('is-invalid');
                            $('#input-field-two').addClass('show-success-border').removeClass('is-invalid');
                            $('#permissionCheck').addClass('show-success-border').removeClass('is-invalid');
                        }else {
                            statusClass = 'text-dark';
                            statusText = 'Permission';
                        }

                        $('#statusValue').html(statusText).addClass(statusClass);
                    }
                }
            });
        });
        // check button
        $(document).on('click', '#permissionCheck', function () {
            var selectValue = $("#pageSelect").val();
            var checkValue = $(this).is(':checked') ? 1 : 0;
            let statusClass, statusText;

            // Check if selectValue is empty or not
            if (!selectValue) {
                // If no page item is selected, display an error or show required fields
                $("#pageSelect").addClass('is-invalid');
                $('#statusValue').html('Please select a page item.').addClass('text-danger').show();  // Show an error message
            } else {
                $("#pageSelect").removeClass('is-invalid');

                // Check the value of the checkbox and update styles accordingly
                if (checkValue === 0) {
                    statusClass = 'text-danger';
                    statusText = 'Not Allowed ❌';
                    
                    $('#pageSelect').removeClass('show-success-border').addClass('is-invalid');
                    $('#input-field-one').removeClass('show-success-border').addClass('is-invalid');
                    $('#input-field-two').removeClass('show-success-border').addClass('is-invalid');
                    $('#permissionCheck').removeClass('show-success-border').addClass('is-invalid');
                } else if (checkValue === 1) {
                    statusClass = 'text-dark';
                    statusText = '<span style="color:green;font-weight:600;font-size: 14px;">Authorize <i class="fa-solid fa-check"></i></span>';
                    
                    $('#pageSelect').removeClass('is-invalid').addClass('show-success-border');
                    $('#input-field-one').removeClass('is-invalid').addClass('show-success-border');
                    $('#input-field-two').removeClass('is-invalid').addClass('show-success-border');
                    $('#permissionCheck').removeClass('is-invalid').addClass('show-success-border');
                } else {
                    statusClass = 'text-dark';
                    statusText = 'Permission';
                    
                    $('#pageSelect').removeClass('show-success-border').removeClass('is-invalid').addClass('show-current-border');
                    $('#input-field-one').removeClass('show-success-border').removeClass('is-invalid').addClass('show-current-border');
                    $('#input-field-two').removeClass('show-success-border').removeClass('is-invalid').addClass('show-current-border');
                    $('#permissionCheck').removeClass('show-success-border').removeClass('is-invalid').addClass('show-current-border');
                }

                // Update the statusValue element with the appropriate text and class
                $('#statusValue').html(statusText).removeClass().addClass('form-check-label form-label ms-1 ' + statusClass).show();
            }
        });
        // update page item permission
        $(document).on('click', '.submt_button', function(e){
            e.preventDefault();
            var id = $('#edit_page_id').val();

            var data = {
                'domain_name': $('.update_domain').val(),
                'ip_name': $('.update_ip').val(),
                'status': $('#permissionCheck').is(':checked') ? 1 : 0,
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/super-admin/update-auth-page/" + id,
                data: data,
                dataType: "json",
                success: function(response) {
                    $('#updateForm_errorList').html("");
                    $('#success_message').html("");

                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                        });
                    } else if (response.status == 404) {
                        $('#success_message').text(response.messages);
                    } else if (response.status == 200) {
                        $('#success_message').addClass('background_error ps-1 pe-1').fadeIn().text(response.messages);
                        $('#pageSelect').val("");
                        $('.update_domain').val("");
                        $('.update_ip').val("");
                        $('#permissionCheck').prop('checked', false);

                        var statusText = '<span class="text-gray">Permission</span>';
                        var statusClass = 'text-gray';
                        $('#statusValue').html(statusText).addClass(statusClass);
                        
                        $('#success_message').fadeIn();
                        $('#pageSelect').removeClass('show-success-border').addClass('show-current-border').removeClass('is-invalid');
                        $('#input-field-one').removeClass('show-success-border').addClass('show-current-border').removeClass('is-invalid');
                        $('#input-field-two').removeClass('show-success-border').addClass('show-current-border').removeClass('is-invalid');
                        $('#permissionCheck').removeClass('show-success-border').addClass('show-current-border').removeClass('is-invalid');
                        setTimeout(() => {
                            $('#success_message').fadeOut(6000);
                            $('#success_message').delay(6000);
                        }, 3000);
                        fetch_auth_page_data();
                    }
                }
            });
        });
    });
</script>