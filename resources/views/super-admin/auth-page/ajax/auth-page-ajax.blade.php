<script type="text/javascript">
    $(document).ready(function(){
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
                    statusText = '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span> Authorize';
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

            if (page_id === '') {
                $('#edit_page_id').val('');
                $("#input-field-one").val('');
                $("#input-field-two").val('');
                $("#permissionCheck").prop('checked', false);
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
                            statusClass = 'text-danger';
                            statusText = '❌ Not Allowed';
                        } else if (response.data.status == 1) {
                            statusClass = 'text-dark';
                            statusText = '<span style="color:green;font-weight:600;font-size: 14px;">Authorize <i class="fa-solid fa-check"></i></span>';
                        }else {
                            statusClass = 'text-dark';
                            statusText = '<span></span>';
                        }

                        $('#statusValue').html(statusText).addClass(statusClass);
                    }
                }
            });
        });
        // check button
        $(document).on('click', '#permissionCheck', function () {
            var checkValue = $(this).is(':checked') ? 1 : 0;
            let statusClass, statusText;

            if (checkValue == 0) {
                statusClass = 'text-danger';
                statusText = 'Not Allowed ❌';
            } else if (checkValue == 1) {
                statusClass = 'text-dark';
                statusText = '<span style="color:green;font-weight:600;font-size: 14px;">Authorize <i class="fa-solid fa-check"></i></span>';
            } else {
                statusClass = 'text-dark';
                statusText = '<span></span>';
            }
            $('#statusValue').html(statusText).removeClass().addClass('form-check-label form-label ' + statusClass);
        });

    });
</script>