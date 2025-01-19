<script type="module">
    import {activeTableRow} from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();
    $(document).ready(function(){
        // ACtive table row background
        $(document).on('click keydown', 'tr.table-row', function (event) {
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                activeTableRow(this);
            }
        });
        // Initialize the button loader for the login button
        buttonLoader('#update_btn_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm', 'Confirm', 1000);
        buttonLoader('#delete_module_category', '.delete-confrm-icon', '.delete-confrm-btn-text', 'Delete', 'Delete', 1000);
        buttonLoader('#create_btn_confirm', '.create-confirm-icon', '.create-confirm-btn-text', 'Confirm', 'Confirm', 1000);
        fetch_roles();
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
                return `
                    <tr class="table-row user-table-row data-table-row" id="row_id" value="${key}" tabindex="0">
                        <td class="sn border_ord" id="table_edit_btn" value="${row.id}" tabindex="0">${row.id}</td>
                        <td class="txt_" tabindex="0">${row.name}</td>
                        <td class="txt_" tabindex="0">${row.role_condition}</td>
                        <td class="txt_" tabindex="0">${row.status}</td>
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
                    $(this).attr("data-val", 0).removeClass("highlight");
                    nextRow.attr("data-val", 1).addClass("highlight").focus();
                    // remove update and delete button
                    $("#thAction").attr('hidden', true);
                    $("#catgUpdateBtn").attr('hidden', true);
                    $("#catgDeleteBtn").attr('hidden', true);
                } else {
                    const firstRow = $(".data-table-row").first();
                    if (firstRow.length) {
                        $(this).attr("data-val", 0).removeClass("highlight");
                        firstRow.attr("data-val", 1).addClass("highlight").focus();
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
                    $(this).attr("data-val", 0).removeClass("highlight");
                    prevRow.attr("data-val", 1).addClass("highlight").focus();
                    // remove update and delete button
                    $("#thAction").attr('hidden', true);
                    $("#catgUpdateBtn").attr('hidden', true);
                    $("#catgDeleteBtn").attr('hidden', true);
                } else {
                    const lastRow = $(".data-table-row").last();
                    $(this).attr("data-val", 0).removeClass("highlight");
                    lastRow.attr("data-val", 1).addClass("highlight").attr("tabindex", "0").focus();
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
                $(this).removeClass("highlight");
                event.preventDefault(); 
            }
        });
        // Add focus styles for rows addClass tr
        $(document).on("focus", ".data-table-row", function () {
            $(this).addClass("highlight");
        });
        // removeClass tr
        $(document).on("blur", ".data-table-row", function () {
            $(this).removeClass("highlight");
        });

        // Handle key events on table cells / td
        $("#module_category_table").on("keydown", "td", function (event) {
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
            $(this).addClass("focused-td");
        });
        // removeClass for td
        $(document).on("blur", "td", function () {
            $(this).removeClass("focused-td");
        });

        // Live-Search-----------------------------
        $(document).on('click keyup', '#CategorySearchBar', function(event) {
            const query = $(this).val();
            fetch_category_module(query);
        });

        // Module Category input handle Field
        $(document).on('keyup', '#moduleCategoryName', function(){
            $("#module_create_modal_heading").html("");
            $("#module_catg_create_modal").html("");
            $(this).removeClass('is-invalid');
            $("#savForm_error").html("");
            $("#updateForm_error").html("");

            var value = $(this).val();
            var edit_id = $("#moduleCategoryId").val();
            if(value !== ''){
                if(edit_id !== ''){
                    $("#thAction").removeAttr('hidden');
                    $("#catgUpdateBtn").removeAttr('hidden');
                    $("#catgDeleteBtn").removeAttr('hidden');
                    $("#catgCancelBtn").removeAttr('hidden');
                }else{
                    $("#thAction").removeAttr('hidden');
                    $("#catgCreateBtn").removeAttr('hidden');
                    $("#catgCancelBtn").removeAttr('hidden');
                }
                $("#catgDeleteBtn").attr('hidden', true);
            }else if(value == ''){
                $("#thAction").attr('hidden', true);
                $("#catgCreateBtn").attr('hidden', true);
                $("#catgCancelBtn").attr('hidden', true);
                $("#catgUpdateBtn").attr('hidden', true);
                $("#catgDeleteBtn").attr('hidden', true);
            }
        });

        // Cancel Button
        $(document).on('click', '#catgCancelBtn', function(){
            $("#moduleCategoryId").val("");
            $("#moduleCategoryName").val("");
            $("#catgCreateBtn").removeAttr('hidden');
            $("#catgCancelBtn").removeAttr('hidden');
            $("#thAction").attr('hidden', true);
            $("#catgUpdateBtn").attr('hidden', true);
            $("#catgDeleteBtn").attr('hidden', true);
            $("#moduleCategoryName").removeClass('is-invalid');
            $("#savForm_error").html("");
            $("#updateForm_error").html("");
        });

        // Create Module Category Modal Show
        $(document).on('click', '#catgCreateBtn', function(e){
            e.preventDefault();
            $("#module_create_modal_heading").html("");
            $("#module_catg_create_modal").html("");
            $("#createconfirmmodulecategory").modal('show');
            const input_val = $("#moduleCategoryName").val();
            if(input_val !== ''){
                const category_input_val = input_val;
                $("#module_create_modal_heading").append(`<span>${category_input_val}</span>`); 
                $("#module_catg_create_modal").append(`<span>${category_input_val}</span>`); 
            }else if(input_val == ''){
                const category_input_val = input_val;
                $("#module_create_modal_heading").append(`<span class="text-danger">{...}</span>`); 
                $("#module_catg_create_modal").append(`<span class="text-danger">...</span>`); 
            }
            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.create_title, .head_btn_create_close, .module_category_create_paragraph', type: 'class', name: 'branch-skeleton' },
                    { selector: '#create_btn_confirm, #create_cancel', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            };
        });

        // Confirm Create Category Module
        $(document).on('click', '#create_btn_confirm', function(e){
            e.preventDefault();

            var moduleCategoryName = $("#moduleCategoryName").val();
            var data ={
                module_category_name : moduleCategoryName,
                _token : $('meta[name="csrf-token"]').attr('content'),
            }

            $.ajax({
                type: "POST",
                url: "{{ route('module_category_store.action') }}",
                dataType: "json",
                data: data,
                success: function(response){
                    if(response.status === 400){
                        $.each(response.errors, function(key, err_value){
                            if (key === 'module_category_name') {
                                $("#savForm_error").fadeIn();
                                $('#savForm_error').html('<span class="error_val" style="font-size:10px;font-weight:700;">'+ 'Error-Message : ' + err_value + '</span>');
                                $("#savForm_error").addClass("alert_show_errors");
                                $('#moduleCategoryName').addClass('is-invalid');
                                $('#moduleCategoryName').html("");
                            }
                        });
                    }else if(response.status === 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#createconfirmmodulecategory").modal('hide');
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

        // Edit Module Category (Table Td select edit button)
        $(document).on('click keydown Enter', '#table_edit_btn', function(){
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                $("#module_update_modal_heading").html("");
                $("#module_catg_update_modal").html("");
                $("#module_delete_modal_heading").html("");
                $("#module_catg_delete_modal").html("");
                $("#updateForm_error").html("");
                const edit_id = $(this).closest('td').attr('value');
                if(edit_id !== ''){
                    const nextRow = $(this).next(".data-table-row");
                    if (nextRow.length) {
                        $(this).attr("data-val", 0).removeClass("highlight");
                        nextRow.attr("data-val", 1).addClass("highlight").focus();
                    } else {
                        const firstRow = $(".data-table-row").first();
                        if (firstRow.length) {
                            $(this).attr("data-val", 0).removeClass("highlight");
                            firstRow.attr("data-val", 1).addClass("highlight").focus();
                        }
                    }
                    $("#thAction").removeAttr('hidden');
                    $("#catgUpdateBtn").removeAttr('hidden');
                    $("#catgDeleteBtn").removeAttr('hidden');
                    $("#catgCancelBtn").removeAttr('hidden');
                    $("#catgCreateBtn").attr('hidden', true);

                }else if(edit_id == ''){
                    $("#thAction").attr('hidden', true);
                    $("#catgCreateBtn").attr('hidden', true);
                    $("#catgCancelBtn").attr('hidden', true);
                }

                var id = edit_id;

                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "GET",
                    url: "/application/module-category-edit/" +id,
                    dataType: "json",
                    success: function(response){
                        if(response.status == 404){
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.messages);
                        }else if(response.status == 200){
                            $('#moduleCategoryId').val(id);
                            const updateModuleHeading = $("#module_update_modal_heading");
                            const updateModuleBody = $("#module_catg_update_modal");
                            const deleteModuleHeading = $("#module_delete_modal_heading");
                            const deleteModuleBody = $("#module_catg_delete_modal");
                            updateModuleHeading.append(`<span class="">${response.messages.module_category_name}</span>`);
                            deleteModuleHeading.append(`<span class="">${response.messages.module_category_name}</span>`);
                            deleteModuleBody.append(`<span class="">${response.messages.module_category_name}</span>`);
                            updateModuleBody.append(`<span class="">${response.messages.module_category_name}</span>`);
                            $('.edit-module-category-input').val(response.messages.module_category_name);
                        }
                    }
                });
            }
        });

        // Update Module Category Modal Show
        $(document).on('click', '#catgUpdateBtn', function(e){
            e.preventDefault();
            $("#module_update_modal_heading").html("");
            $("#module_catg_update_modal").html("");
            $("#updateconfirmmodule").modal('show');
            const input_val = $("#moduleCategoryName").val();
            if(input_val !== ''){
                const category_input_val = input_val;
                $("#module_update_modal_heading").append(`<span>${category_input_val}</span>`); 
                $("#module_catg_update_modal").append(`<span>${category_input_val}</span>`); 
            }else if(input_val == ''){
                const category_input_val = input_val;
                $("#module_update_modal_heading").append(`<span class="text-danger">{...}</span>`); 
                $("#module_catg_update_modal").append(`<span class="text-danger">...</span>`); 
            }
            var time = null;

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
<!-- <script>
    // key down and up for input field
    $(document).ready(function(){
        // Handle keydown events on inputs and buttons inside #module_catg_first
        $("#module_catg_first").on("keydown", "input, button", function (event) {
            const keyCode = event.which || event.keyCode;

            // Arrow Down key: Move focus to the next input field
            if (keyCode === 40) {
                const nextInput = $(this).closest("th").next().find("input");
                if (nextInput.length) {
                    $(this).removeClass("inputlight");
                    nextInput.addClass("inputlight").focus();
                } else {
                    const firstInput = $("#module_catg_first").find(".input-field").first();
                    if (firstInput.length) {
                        $(this).removeClass("inputlight");
                        firstInput.addClass("inputlight").focus();
                    }
                }
                event.preventDefault();
                return;
            }

            // Arrow Up key: Move focus to the previous input field
            if (keyCode === 38) {
                const prevInput = $(this).closest("th").prev().find("input");
                if (prevInput.length) {
                    $(this).removeClass("inputlight");
                    prevInput.addClass("inputlight").focus();
                } else {
                    const lastInput = $("#module_catg_first").find(".input-field").last();
                    if (lastInput.length) {
                        $(this).removeClass("inputlight");
                        lastInput.addClass("inputlight").focus();
                    }
                }
                event.preventDefault();
                return;
            }

            // Arrow Left key: Move focus to the previous button
            // if (keyCode === 37) {
            //     const currentTh = $(this).closest("th");
            //     const prevButton = currentTh.prev().find("button:not([hidden])").last();

            //     if (prevButton.length) {
            //         prevButton.removeAttr("hidden").focus();
            //         $(this).removeClass("highlight");
            //         prevButton.addClass("highlight").focus();
            //     }
            //     event.preventDefault();
            //     return;
            // }

            // // Arrow Right key: Move focus to the next button
            // if (keyCode === 39) {
            //     const currentTh = $(this).closest("th");
            //     const nextButton = currentTh.next().find("button:not([hidden])").first();

            //     if (nextButton.length) {
            //         nextButton.removeAttr("hidden").focus();
            //         $(this).removeClass("highlight");
            //         nextButton.addClass("highlight").focus();
            //     }
            //     event.preventDefault();
            //     return;
            // }
        });
    });
</script> -->