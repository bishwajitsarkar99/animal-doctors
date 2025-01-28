<script type="module">
    import {activeTableRow, editTableRowSinge} from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass, addAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();
    $(document).ready(function(){
        // ACtive table row background
        $(document).on('click keydown', 'tr.table-row', function (event) {
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                activeTableRow(this);
                editTableRowSinge(this);
            }
        });
        // Initialize the button loader for the login button
        buttonLoader('#createBtn', '.create-icon', '.create-btn-text', 'Save', 'Save', 1000);
        buttonLoader('#updateBtn', '.update-icon', '.update-btn-text', 'Update', 'Update', 1000);
        buttonLoader('#roleDeleteBtn', '.delete-icon', '.delete-btn-text', 'Delete', 'Delete', 1000);
        buttonLoader('#update_btn_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm', 'Confirm', 1000);
        fetch_roles();
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

        // Event delegation for row key events
        $("#role_table").on("keydown", ".data-table-row", function (event) {
            const keyCode = event.which || event.keyCode;

            // Arrow Down key: Move focus to the next row or loop back to the first row
            if (keyCode === 40) {
                const nextRow = $(this).next(".data-table-row");
                if (nextRow.length) {
                    $(this).attr("data-val", 0).removeClass("highlight-row");
                    nextRow.attr("data-val", 1).addClass("highlight-row").focus();
                    nextRow.addClass("active-row").siblings().removeClass("active-row");
                    // remove update and delete button
                    $("#thAction").attr('hidden', true);
                    $("#catgUpdateBtn").attr('hidden', true);
                    $("#catgDeleteBtn").attr('hidden', true);
                } else {
                    const firstRow = $(".data-table-row").first();
                    if (firstRow.length) {
                        $(this).attr("data-val", 0).removeClass("highlight-row");
                        firstRow.attr("data-val", 1).addClass("highlight-row").focus();
                        // remove update and delete button
                        $("#thAction").attr('hidden', true);
                        $("#catgUpdateBtn").attr('hidden', true);
                        $("#catgDeleteBtn").attr('hidden', true);
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
                    // remove update and delete button
                    $("#thAction").attr('hidden', true);
                    $("#catgUpdateBtn").attr('hidden', true);
                    $("#catgDeleteBtn").attr('hidden', true);
                } else {
                    const lastRow = $(".data-table-row").last();
                    $(this).attr("data-val", 0).removeClass("highlight-row");
                    lastRow.attr("data-val", 1).addClass("highlight-row").attr("tabindex", "0").focus();
                    // remove update and delete button
                    $("#thAction").attr('hidden', true);
                    $("#catgUpdateBtn").attr('hidden', true);
                    $("#catgDeleteBtn").attr('hidden', true);
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
        // Handle click events on table cells ==== Role Name Save Action Box
        $(document).on('click keydown', '#role_create_btn', function (event) {
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                $('#savForm_error').html("");
                const currentCell = $(this);
                const cellDataId = currentCell.data('id');

                // Show the modal
                $("#action_box").modal('show');
                // Store the currently highlighted row for later use
                const activeRow = $(".data-table-row.hightlight-row");
                activeRow.addClass("temp-highlight"); // Temporarily mark the active row
                $("#createBtn").removeAttr('hidden');
                $("#promotPermission").attr('hidden', true);

                // When modal is closed
                $("#action_box").on('hidden.bs.modal', function () {
                    // Restore focus to the previously active row
                    const tempRow = $(".data-table-row.temp-highlight");
                    tempRow.removeClass("temp-highlight").focus().addClass("hightlight-row");
                    $("#createBtn").attr('hidden', true);
                    $("#promotPermission").removeAttr('hidden');
                });
                addAttributeOrClass([
                    { selector: '#access_modal_box', type: 'class', name: 'action-box-skeleton' },
                ]);
                setTimeout(() => {
                    // Remove skeleton classes
                    removeAttributeOrClass([
                        { selector: '#access_modal_box', type: 'class', name: 'action-box-skeleton' },
                    ]);
                }, 1000);
            }
        });
        // action box cancel btn
        $("#actionCancel").on('click', function (e) {
            e.preventDefault();
            $("#action_box").modal('hide');
            const activeRow = $(".data-table-row.hightlight-row");
            activeRow.addClass("temp-highlight");
        });
        // Handle key events on table cells / td
        $("#role_table").on("keydown", "td", function (event) {
            const keyCode = event.which || event.keyCode;

            // Arrow Down key: Move focus to the first <td> of the next row
            if (keyCode === 40) {
                const nextRow = $(this).closest("tr").next(".data-table-row");
                if (nextRow.length) {
                    nextRow.find("td").first().focus();
                }
                event.preventDefault();
            }

            // Arrow Up key: Move focus to the first <td> of the previous row
            if (keyCode === 38) {
                const prevRow = $(this).closest("tr").prev(".data-table-row");
                if (prevRow.length) {
                    prevRow.find("td").first().focus();
                }
                event.preventDefault();
            }

            // Arrow Right key: Move focus to the next <td> in the same row
            if (keyCode === 39) {
                $(this).next("td").focus();
                event.preventDefault();
            }

            // Arrow Left key: Move focus to the previous <td> in the same row
            if (keyCode === 37) {
                $(this).prev("td").focus();
                event.preventDefault();
            }

            // Enter key: Perform action on the selected cell
            if (keyCode === 13) {
                console.log("Enter key pressed on cell:", $(this).attr("id"));
                event.preventDefault(); 
            }
        });
        // Add focus styles for cells/ addClass for td
        $(document).on("focus", "td", function () {
            $(this).addClass("focusing-td");
        });
        // removeClass for td
        $(document).on("blur", "td", function () {
            $(this).removeClass("focusing-td");
        });

        // Live-Search-----------------------------
        $(document).on('click keyup', '#RoleSearchBar', function(event) {
            const query = $(this).val();
            fetch_roles(query);
        });

        // Role Name handle 
        $(document).on('keyup', '.role_name', function(){
            var value = $(this).text().trim();
            if(value !== ''){
                $(this).removeClass('placeholder_text');
                $(this).addClass('is-valid');
                $(this).removeClass('is-invalid');
                $(this).removeClass('td_border_empty');
            }else{
                $(this).addClass('placeholder_text');
                $(this).removeClass('is-valid');
                $(this).addClass('td_border_empty');
                $(this).removeClass('is-invalid');
            }
        });

        // Create Role Name
        $(document).on('click', '#createBtn', function(e){
            e.preventDefault();

            var roleName = $("#roleName").text().trim();
            if (!roleName) {
                $("#savForm_error").fadeIn();
                $('#savForm_error').html('<span class="error_val">Error-Message: Role name is required.</span>');
                $("#savForm_error").addClass("alert_show_errors");
                $('#roleName').addClass('is-invalid');
                return;
            }
            var data ={
                name : roleName,
                _token : $('meta[name="csrf-token"]').attr('content'),
            }

            $.ajax({
                type: "POST",
                url: "{{ route('role_create.action') }}",
                dataType: "json",
                data: data,
                success: function(response){
                    if(response.status === 400){
                        $.each(response.errors, function(key, err_value){
                            if (key === 'name') {
                                $("#savForm_error").fadeIn();
                                $('#savForm_error').html('<span class="error_val">'+ 'Error-Message : ' + err_value + '</span>');
                                $("#savForm_error").addClass("alert_show_errors");
                                $('#roleName').addClass('is-invalid');
                                $('#roleName').removeClass('is-valid');
                                $('#roleName').html("");
                            }
                        });
                    }else if(response.status === 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#action_box").modal('hide');
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
                            $('#success_message').addClass('alert_show font_size ps-1 pe-1 ms-5');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            
                            $("#roleName").val("");
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_roles();
                        }, 1500);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    $('#savForm_error').fadeIn().html('<span class="error_val" style="font-size:10px;font-weight:700;">Error-Message: Something went wrong!</span>');
                }
            });
        });

        // Update Action Box Role Name
        $(document).on('click keydown', '#table_edit_btn', function (event) {
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                $('#savForm_error').html("");
                const currentCell = $(this);
                const cellDataId = currentCell.attr('data-id');
                const currentRow = currentCell.closest('tr');
                const promotionText = currentRow.find('.promt').text().trim().toLowerCase();
                const conditionText = currentRow.find('.condition').text().trim().toLowerCase();
                // Set the hidden input field value
                $("#table_row_id").val(cellDataId);
                // Show the modal
                $("#action_box").modal('show');
                // Store the currently highlighted row for later use
                const activeRow = $(".data-table-row.hightlight-row");
                activeRow.addClass("temp-highlight"); // Temporarily mark the active row
                $("#updateBtn").removeAttr('hidden');
                $("#roleDeleteBtn").removeAttr('hidden');
                $("#promotPermission").removeAttr('hidden');
                // button disabled based on condition
                if(conditionText === 'static'){
                    $("#updateBtn").attr('disabled', true);
                    $("#roleDeleteBtn").attr('disabled', true);
                    $("#promotPermission").attr('disabled', true);
                }else if(conditionText === 'non-static'){
                    $("#updateBtn").removeAttr('disabled');
                    $("#roleDeleteBtn").removeAttr('disabled');
                    $("#promotPermission").removeAttr('disabled');
                }
                // Update buttons based on promotion text
                if (promotionText === 'promoted') {
                    $("#none_promoted_label").attr('hidden', true);
                    $("#promoted_label").removeAttr('hidden');
                    $("#promotLabel").removeAttr('hidden');
                } else if (promotionText === 'non-promot') {
                    $("#none_promoted_label").removeAttr('hidden');
                    $("#promoted_label").attr('hidden', true);
                    $("#promotLabel").removeAttr('hidden');
                }
                // When modal is closed
                $("#action_box").on('hidden.bs.modal', function () {
                    // Restore focus to the previously active row
                    const tempRow = $(".data-table-row.temp-highlight");
                    tempRow.removeClass("temp-highlight").focus().addClass("hightlight-row");
                    $("#updateBtn").attr('hidden', true);
                    $("#roleDeleteBtn").attr('hidden', true);
                    $("#promoted_label").attr('hidden', true);
                    $("#none_promoted_label").attr('hidden', true);
                });
                addAttributeOrClass([
                    { selector: '#access_modal_box', type: 'class', name: 'action-box-skeleton' },
                ]);
                setTimeout(() => {
                    // Remove skeleton classes
                    removeAttributeOrClass([
                        { selector: '#access_modal_box', type: 'class', name: 'action-box-skeleton' },
                    ]);
                }, 1000);
            }
        });

        // Update Role Name Modal Show
        $(document).on('click keydown', '#updateBtn', function (event) {
            event.preventDefault();
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                $('#updateForm_error').html("");
                $("#update_role_name_modal_heading").html("");
                $("#role_name_update_modal").html("");
                const id = $("#table_row_id").val();
                $("#action_box").modal('hide');
                $("#updateconfirmrolemodal").modal('show');
                const currentCell = $(`#table_edit_btn[data-id="${id}"]`);
                const currentRow = currentCell.closest('tr');
                const roleName = currentRow.find('.role-name').text().trim();

                if (roleName !== '') {
                    $("#update_role_name_modal_heading").text(roleName);
                    $("#role_name_update_modal").text(roleName);
                } else {
                    $("#update_role_name_modal_heading").html('<span class="text-danger">No role name found</span>');
                    $("#role_name_update_modal").html('<span class="text-danger">No role name found</span>');
                }

                // Skeleton loader logic
                addAttributeOrClass([
                    { selector: '.modal_header_title, .modal_header_cancel, .modal_paragraph', type: 'class', name: 'branch-skeleton' },
                    { selector: '#update_btn_confirm, #cate_delete5', type: 'class', name: 'branch-skeleton' },
                ]);

                setTimeout(() => {
                    removeAttributeOrClass([
                        { selector: '.modal_header_title, .modal_header_cancel, .modal_paragraph', type: 'class', name: 'branch-skeleton' },
                        { selector: '#update_btn_confirm, #cate_delete5', type: 'class', name: 'branch-skeleton' },
                    ]);
                }, 1000);
            }
        });

        // Array of button IDs in navigation order
        const buttonIds = ['createBtn', 'updateBtn', 'roleDeleteBtn', 'actionCancel'];
        let focusedButtonIndex = -1;

        // Add keydown event for modal action box
        $(document).on('keydown', function (e) {
            // Check if modal is visible
            if (!$("#action_box").is(':visible')) return;
            
            switch (e.key) {
                case 'ArrowLeft': // Navigate left
                    focusedButtonIndex = (focusedButtonIndex <= 0) ? buttonIds.length - 1 : focusedButtonIndex - 1;
                    focusButton(focusedButtonIndex);
                    break;

                case 'ArrowRight': // Navigate right
                    focusedButtonIndex = (focusedButtonIndex >= buttonIds.length - 1) ? 0 : focusedButtonIndex + 1;
                    focusButton(focusedButtonIndex);
                    break;

                case 'Enter': // Trigger the currently focused button
                    if (focusedButtonIndex >= 0) {
                        $(`#${buttonIds[focusedButtonIndex]}`).trigger('click');
                    }
                    break;

                case 'Escape': // Close modal
                    $("#action_box").modal('hide');
                    break;

                default:
                    break;
            }
        });

        // Add keyup event for logging or additional logic
        $(document).on('keyup', function (e) {
            if ($("#action_box").is(':visible')) {
                console.log(`Key released: ${e.key}`);
            }
        });

        // Focus management function
        function focusButton(index) {
            // Remove focus from all buttons
            $(".btn_key, .cancel_button").removeClass("focused-button").attr('tabindex', -1).prop('disabled', false);

            // Add focus to the selected button
            const buttonId = buttonIds[index];
            const $button = $(`#${buttonId}`);

            // Get data from the table's current cell
            const currentCell = $(`#table_edit_btn[data-id="${$("#table_row_id").val()}"]`);
            const currentRow = currentCell.closest('tr');
            const cellDataId = currentCell.attr('data-id');
            const promotionText = currentRow.find('.promt').text().trim().toLowerCase();
            const conditionText = currentRow.find('.condition').text().trim().toLowerCase();

            // Update the hidden input field value
            $("#table_row_id").val(cellDataId);

            // Update modal preview data
            const roleName = currentRow.find('.role-name').text().trim();
            $("#update_role_name_modal_heading").text(roleName || 'N/A');
            $("#role_name_update_modal").text(roleName || 'N/A');

            // Determine if the button should be enabled or disabled
            if (conditionText === 'static') {
                // Disable the button if the condition is "static"
                $button.addClass("focused-button disabled").attr('tabindex', 0).focus();
                $button.prop('disabled', true);
            } else if (conditionText === 'non-static') {
                // Enable the button if condition is "non-static"
                $button.addClass("focused-button").removeClass('disabled').removeAttr('disabled').attr('tabindex', 0).focus();
                $button.prop('disabled', false);
            } else {
                // Disable the button for any other case
                $button.removeClass("focused-button").addClass('disabled').attr('tabindex', -1).prop('disabled', true);
            }
        }

        // update modal cancel
        $(document).on('click keydown', '#cate_delete5, .modal_header_cancel', function(e){
            e.preventDefault();
            $("#action_box").modal('show');
            $("#updateconfirmrolemodal").modal('hide');

            const id = $("#table_row_id").val();
            const currentRow = $(`#table_edit_btn[value="${id}"]`).closest('tr');
            const promotionText = currentRow.find('.promt').text().trim().toLowerCase();
            
            $("#updateBtn").removeAttr('hidden');
            $("#roleDeleteBtn").removeAttr('hidden');
            if (promotionText === 'promoted') {
                $("#promoted_label").removeAttr('hidden');
                $("#none_promoted_label").attr('hidden', true);
            } else if (promotionText === 'non-promot') {
                $("#none_promoted_label").removeAttr('hidden');
                $("#promoted_label").attr('hidden', true);
            }
        });

        // Confirm Update Modal keydown event
        const buttonConfirmIds = ['update_btn_confirm', 'cate_delete5']; // Array of button IDs
        let focusingButtonIndex = -1;

        // Keydown event for navigating and triggering buttons in the modal
        $(document).on('keydown', function (e) {
            // Check if modal is visible
            if (!$("#updateconfirmrolemodal").is(':visible')) return;

            switch (e.key) {
                case 'ArrowLeft': // Navigate left
                    focusingButtonIndex = (focusingButtonIndex <= 0) ? buttonConfirmIds.length - 1 : focusingButtonIndex - 1;
                    focusingButton(focusingButtonIndex);
                    break;

                case 'ArrowRight': // Navigate right
                    focusingButtonIndex = (focusingButtonIndex >= buttonConfirmIds.length - 1) ? 0 : focusingButtonIndex + 1;
                    focusingButton(focusingButtonIndex);
                    break;

                case 'Enter': // Trigger the currently focused button
                    if (focusingButtonIndex >= 0) {
                        $(`#${buttonConfirmIds[focusingButtonIndex]}`).trigger('click');
                    }
                    break;

                case 'Escape': // Close modal
                    $("#updateconfirmrolemodal").modal('hide');
                    break;

                default:
                    break;
            }
        });

        // Add keyup event for logging or additional logic
        $(document).on('keyup', function (e) {
            if ($("#updateconfirmrolemodal").is(':visible')) {
                console.log(`Key released: ${e.key}`);
            }
        });

        // Focus management function
        function focusingButton(index) {
            // Remove focus from all buttons
            $(".btn_key, .delete_cancel").removeClass("focused-button").attr('tabindex', -1).prop('disabled', false);

            // Get the button ID based on the index
            const buttonId = buttonConfirmIds[index];
            const $button = $(`#${buttonId}`);

            // Add focus and check conditions
            if ($button.length) {
                const roleName = $("#update_role_name_modal_heading").text().trim();
                const conditionText = $button.data('condition') || 'non-static'; // Example condition (modify as needed)

                if (conditionText === 'static') {
                    // Disable the button if the condition is "static"
                    $button.addClass("focused-button disabled").attr('tabindex', 0).focus().prop('disabled', true);
                } else {
                    // Enable the button for any other condition
                    $button.addClass("focused-button").removeClass('disabled').attr('tabindex', 0).focus().prop('disabled', false);
                }
            }
        }

        // Confirm Update Role Name
        $(document).on('click', '#update_btn_confirm', function(e){
            e.preventDefault();
            let id = $("#table_row_id").val();
            let roleName = $("#update_role_name_modal_heading").text().trim();

            let data = {
                id: id,
                name: roleName,
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $.ajax({
                type: "PUT",
                url: "/super-admin/role-update/" +id,
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status === 400) {
                        // Handle validation errors
                        $("#updateForm_error").fadeIn().html('');
                        $.each(response.errors, function (key, err_value) {
                            $("#updateForm_error").append(
                                `<span class="errors_val">Error : ${err_value}</span><br>`
                            );
                            // if (key === 'name') {
                            //     $('.role-name').addClass('is-invalid');
                            // }
                        });
                    } else if (response.status === 200) {
                        // Successful update
                        $("#accessconfirmbranch").modal('show');
                        $("#updateconfirmrolemodal").modal('hide');
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
                            $('#success_message').addClass('alert_show font_size ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_roles();
                        }, 1500);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    $("#updateForm_error")
                        .fadeIn()
                        .html('<span class="error_val" style="font-size:10px;font-weight:700;">Error-Message: Something went wrong!</span>');
                }
            });
            
            
        });

        // Delete Modal Show
        $(document).on('click keydown', '#roleDeleteBtn', function(event){
            event.preventDefault();
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                $('#updateForm_error').html("");
                $("#delete_role_name_modal_heading").html("");
                $("#role_name_delete_modal").html("");
                const id = $("#table_row_id").val();
                $("#action_box").modal('hide');
                $("#deleteconfirmrole").modal('show');
                const currentCell = $(`#table_edit_btn[data-id="${id}"]`);
                const currentRow = currentCell.closest('tr');
                const roleName = currentRow.find('.role-name').text().trim();

                if (roleName !== '') {
                    $("#delete_role_name_modal_heading").text(roleName);
                    $("#role_name_delete_modal").text(roleName);
                } else {
                    $("#delete_role_name_modal_heading").html('<span class="text-danger">No role name found</span>');
                    $("#role_name_delete_modal").html('<span class="text-danger">No role name found</span>');
                }

                // Skeleton loader logic
                addAttributeOrClass([
                    { selector: '.role_delete_title, .delete_confrm_canl, .role_delete_paragraph', type: 'class', name: 'branch-skeleton' },
                    { selector: '#delete_role_name, #cate_delete3', type: 'class', name: 'branch-skeleton' },
                ]);

                setTimeout(() => {
                    removeAttributeOrClass([
                        { selector: '.role_delete_title, .delete_confrm_canl, .role_delete_paragraph', type: 'class', name: 'branch-skeleton' },
                        { selector: '#delete_role_name, #cate_delete3', type: 'class', name: 'branch-skeleton' },
                    ]);
                }, 1000);
            }
        });

        // Confirm Update Modal keydown event
        const buttonDeleteIds = ['delete_role_name', 'cate_delete3']; // Array of button IDs
        let focuDeleteButtonIndex = -1;

        // Keydown event for navigating and triggering buttons in the modal
        $(document).on('keydown', function (e) {
            // Check if modal is visible
            if (!$("#deleteconfirmrole").is(':visible')) return;

            switch (e.key) {
                case 'ArrowLeft': // Navigate left
                    focuDeleteButtonIndex = (focuDeleteButtonIndex <= 0) ? buttonDeleteIds.length - 1 : focuDeleteButtonIndex - 1;
                    focusDeleteButton(focuDeleteButtonIndex);
                    break;

                case 'ArrowRight': // Navigate right
                    focuDeleteButtonIndex = (focuDeleteButtonIndex >= buttonDeleteIds.length - 1) ? 0 : focuDeleteButtonIndex + 1;
                    focusDeleteButton(focuDeleteButtonIndex);
                    break;

                case 'Enter': // Trigger the currently focused button
                    if (focuDeleteButtonIndex >= 0) {
                        $(`#${buttonDeleteIds[focuDeleteButtonIndex]}`).trigger('click');
                    }
                    break;

                case 'Escape': // Close modal
                    $("#deleteconfirmrole").modal('hide');
                    break;

                default:
                    break;
            }
        });

        // Add keyup event for logging or additional logic
        $(document).on('keyup', function (e) {
            if ($("#deleteconfirmrole").is(':visible')) {
                console.log(`Key released: ${e.key}`);
            }
        });

        // Focus management function
        function focusDeleteButton(index) {
            // Remove focus from all buttons
            $(".btn_delt, .btn_cancel").removeClass("focused-button").attr('tabindex', -1).prop('disabled', false);

            // Get the button ID based on the index
            const buttonId = buttonDeleteIds[index];
            const $button = $(`#${buttonId}`);

            // Add focus and check conditions
            if ($button.length) {
                const roleName = $("#delete_role_name_modal_heading").text().trim();
                const conditionText = $button.data('condition') || 'non-static'; // Example condition (modify as needed)

                if (conditionText === 'static') {
                    // Disable the button if the condition is "static"
                    $button.addClass("focused-button disabled").attr('tabindex', 0).focus().prop('disabled', true);
                } else {
                    // Enable the button for any other condition
                    $button.addClass("focused-button").removeClass('disabled').attr('tabindex', 0).focus().prop('disabled', false);
                }
            }
        }

        // Delete Modal Cancel
        $(document).on('click keydown', '#cate_delete3, .delete_confrm_canl', function(e){
            e.preventDefault();
            $("#action_box").modal('show');
            $("#deleteconfirmrole").modal('hide');

            const id = $("#table_row_id").val();
            const currentRow = $(`#table_edit_btn[value="${id}"]`).closest('tr');
            const promotionText = currentRow.find('.promt').text().trim().toLowerCase();
            
            $("#updateBtn").removeAttr('hidden');
            $("#roleDeleteBtn").removeAttr('hidden');
            if (promotionText === 'promoted') {
                $("#promoted_label").removeAttr('hidden');
                $("#none_promoted_label").attr('hidden', true);
            } else if (promotionText === 'non-promot') {
                $("#none_promoted_label").removeAttr('hidden');
                $("#promoted_label").attr('hidden', true);
            }
        });

        // Confirm Delete Role Name
        $(document).on('click', '#delete_role_name', function(e){
            e.preventDefault();
            var id = $("#table_row_id").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/super-admin/role-delete/" +id,
                dataType: "json",
                success: function(response){
                    if(response.status === 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#deleteconfirmrole").modal('hide');
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
                            $('#success_message').addClass('alert_show font_size ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_roles();
                        }, 1500);
                    }else if(response.status === 422){
                        // Handle validation errors
                        $("#deleteForm_error").fadeIn().html('');
                        $.each(response.errors, function (key, err_value) {
                            $("#deleteForm_error").append(
                                `<span class="errors_val">Error : ${err_value}</span><br>`
                            );
                        });
                    }
                }
            });
        });

        // Role Promot Permission
        $(document).on('click', '#promotPermission', function(e){
            const current_url = "{{route('role_promot.action')}}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: current_url,
                dataType: 'json',
                data: {
                    id: $(this).attr('user_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    $("#accessconfirmbranch").modal('show');
                    $("#processingProgress").removeAttr('hidden');
                    $("#access_modal_box").addClass('progress_body');
                    $("#processModal_body").addClass('loading_body_area');
                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#processingProgress").attr('hidden', true);
                        $("#access_modal_box").removeClass('progress_body');
                        $("#processModal_body").removeClass('loading_body_area');
                        $("#success_message").text(messages);
                        $('#success_message').addClass('background_error');
                        
                    }, 1500);
                }
            });
        });

    });
</script>