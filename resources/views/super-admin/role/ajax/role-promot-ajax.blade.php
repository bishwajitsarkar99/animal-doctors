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
        buttonLoader('#promotBtn', '.promotion-icon', '.promotion-btn-text', 'Promot', 'Promot', 1000);
        buttonLoader('#nonPromotBtn', '.non-promotion-icon', '.non-promotion-btn-text', 'Non-Promot', 'Non-Promot', 1000);
        buttonLoader('#roleDeleteBtn', '.delete-icon', '.delete-btn-text', 'Delete', 'Delete', 1000);
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
                        <td class="sn td_border id-font" id="table_edit_btn" value="${idLink}" tabindex="0" ${disabledLabel}>${row.id}</td>
                        <td class="td_border font padding" contenteditable="true" tabindex="0">
                            <span class="role-name">${row.name}</span>
                        </td>
                        <td class="td_border font padding" tabindex="0">${row.role_condition}</td>
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

                // When modal is closed
                $("#action_box").on('hidden.bs.modal', function () {
                    // Restore focus to the previously active row
                    const tempRow = $(".data-table-row.temp-highlight");
                    tempRow.removeClass("temp-highlight").focus().addClass("hightlight-row");
                    $("#createBtn").attr('hidden', true);
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
                const cellDataId = currentCell.data('id');
                const currentRow = currentCell.closest('tr');
                const promotionText = currentRow.find('.promt').text().trim().toLowerCase();
                // Show the modal
                $("#action_box").modal('show');
                // Store the currently highlighted row for later use
                const activeRow = $(".data-table-row.hightlight-row");
                activeRow.addClass("temp-highlight"); // Temporarily mark the active row
                $("#updateBtn").removeAttr('hidden');
                $("#roleDeleteBtn").removeAttr('hidden');
                
                 // Update buttons based on promotion text
                if (promotionText === 'promoted') {
                    $("#nonPromotBtn").removeAttr('hidden');
                    $("#promotBtn").attr('hidden', true);
                } else if (promotionText === 'non-promot') {
                    $("#nonPromotBtn").attr('hidden', true);
                    $("#promotBtn").removeAttr('hidden');
                }
                // When modal is closed
                $("#action_box").on('hidden.bs.modal', function () {
                    // Restore focus to the previously active row
                    const tempRow = $(".data-table-row.temp-highlight");
                    tempRow.removeClass("temp-highlight").focus().addClass("hightlight-row");
                    $("#updateBtn").attr('hidden', true);
                    $("#roleDeleteBtn").attr('hidden', true);
                    $("#promotBtn").attr('hidden', true);
                    $("#nonPromotBtn").attr('hidden', true);
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
        $(document).on('click', '#updateBtn', function(e){
            e.preventDefault();
            $("#action_box").modal('hide');
            $("#updateconfirmrolemodal").modal('show');
            $('#updateForm_error').html("");
            const currentCell = $("#table_edit_btn");
            const cellDataId = currentCell.data('id');
            const currentRow = currentCell.closest('tr');
            const input_val = currentRow.find('.role-name').text().trim().toLowerCase();
            console.log(input_val);
            
            if(input_val !== ''){
                const role_input_val = input_val;
                $("#update_role_name_modal_heading").append(`<span>${role_input_val}</span>`); 
                $("#role_name_update_modal").append(`<span>${role_input_val}</span>`); 
            }else if(input_val == ''){
                const role_input_val = input_val;
                $("#update_role_name_modal_heading").append(`<span class="text-danger">{...}</span>`); 
                $("#role_name_update_modal").append(`<span class="text-danger">...</span>`); 
            }
            var time = null;
            addAttributeOrClass([
                { selector: '.modal_header_title, .modal_header_cancel, .modal_paragraph', type: 'class', name: 'branch-skeleton' },
                { selector: '#update_btn_confirm, #cate_delete5', type: 'class', name: 'branch-skeleton' },
            ]);
            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.modal_header_title, .modal_header_cancel, .modal_paragraph', type: 'class', name: 'branch-skeleton' },
                    { selector: '#update_btn_confirm, #cate_delete5', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            };
        });

        // update modal cancel
        $(document).on('click keydown', '#cate_delete5, .modal_header_cancel', function(e){
            e.preventDefault();
            $("#action_box").modal('show');
            $("#updateconfirmrolemodal").modal('hide');
            $("#updateBtn").removeAttr('hidden');
            $("#promotBtn").removeAttr('hidden');
            $("#nonPromotBtn").removeAttr('hidden');
            $("#roleDeleteBtn").removeAttr('hidden');
        });

        // Confirm Update Module Category
        $(document).on('click', '#update_btn_confirm', function(e){
            e.preventDefault();
            var id = $("#moduleCategoryId").val();
            var moduleCategoryName = $(".edit-module-category-input").val();
            
            var data = {
                id : id,
                module_category_name : moduleCategoryName,
                _token: $('meta[name="csrf-token"]').attr('content')
            }

            $.ajax({
                type: "PUT",
                url: "/application/module-category-update/" +id,
                data: data,
                dataType: "json",
                success: function(response){
                    if(response.status === 400){
                        $.each(response.errors, function(key, err_value){
                            if (key === 'module_category_name') {
                                $("#updateForm_error").fadeIn();
                                $('#updateForm_error').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error").addClass("alert_show_errors");
                                $('#moduleCategoryName').addClass('is-invalid');
                                $('#moduleCategoryName').html("");
                            }
                        });
                    }else if(response.status === 200){

                        $("#accessconfirmbranch").modal('show');
                        $("#updateconfirmmodule").modal('hide');
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
                            
                            $('.edit-module-category-input').val("");
                            $("#thAction").attr('hidden', true);
                            $("#catgCreateBtn").attr('hidden', true);
                            $("#catgCancelBtn").attr('hidden', true);
                            $("#catgUpdateBtn").attr('hidden', true);
                            $("#catgDeleteBtn").attr('hidden', true);
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_category_module();
                        }, 1500);
                    }
                }
            });
            
            
        });

        // Delete Module Category Modal Show
        $(document).on('click', '#catgDeleteBtn', function(e){
            e.preventDefault();
            $("#module_delete_modal_heading").html("");
            $("#module_catg_delete_modal").html("");
            $("#deleteconfirmmodulecategory").modal('show');
            var time = null;
            const input_val = $("#moduleCategoryName").val();
            if(input_val !== ''){
                const category_input_val = input_val;
                $("#module_delete_modal_heading").append(`<span>${category_input_val}</span>`); 
                $("#module_catg_delete_modal").append(`<span>${category_input_val}</span>`); 
            }else if(input_val == ''){
                const category_input_val = input_val;
                $("#module_delete_modal_heading").append(`<span class="text-danger">{id missing}</span>`); 
                $("#module_catg_delete_modal").append(`<span class="text-danger">...you change category name</span>`); 
            }
            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.module_category_delete_title, .modal_delete_header_cancel, .module_category_delete_paragraph', type: 'class', name: 'branch-skeleton' },
                    { selector: '#delete_module_category, #cate_delete3', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            };
        });

        // Confirm Delete Module Category
        $(document).on('click', '#delete_module_category', function(e){
            e.preventDefault();
            var id = $("#moduleCategoryId").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/application/module-category-delete/" +id,
                dataType: "json",
                success: function(response){
                    if(response.status === 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#deleteconfirmmodulecategory").modal('hide');
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
                            $("#moduleCategoryName").val("");
                            $("#thAction").attr('hidden', true);
                            $("#catgCreateBtn").attr('hidden', true);
                            $("#catgCancelBtn").attr('hidden', true);
                            $("#catgUpdateBtn").attr('hidden', true);
                            $("#catgDeleteBtn").attr('hidden', true);
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_category_module();
                        }, 1500);
                    }
                }
            });
        });

    });
</script>