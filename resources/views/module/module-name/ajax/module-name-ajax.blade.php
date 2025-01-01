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

        fetch_module_names();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (!rows || rows.length === 0) {
                return `
                    <tr class="table-row">
                        <td class="error_data text-danger" align="center" colspan="7">
                            ${message || 'Module Name Currently Not Exists On Server! Please Search......'}
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => {
                return `
                    <tr class="table-row user-table-row data-table-row" id="row_id" value="${key}" tabindex="0">
                        <td class="sn border_ord first_td" id="table_edit_btn" value="${row.id}" tabindex="0">${row.id}</td>
                        <td class="txt_ second_td" colspan="5" tabindex="0">${row.module_name}</td>
                    </tr>
                `;
            }).join("");
        };

        // Fetch Users Data ------------------
        function fetch_module_names(query = '') {
            const current_url = "{{ route('module_name_search.action') }}";
            const input_value = $("#ModuleSearchBar").val();

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { query: query, module_name: input_value },
                success: function(response) {
                    const { status, data, total, current, message } = response;

                    // Handle the table rendering based on the status
                    if (status === 'success') {
                        $("#module_name_table").html(table_rows(data));
                        $("#module_nam_row_amount").text(`${total}.00`);
                        $("#module_name_current_amount").text(` [ Current-Module : ${current}.00 ] `);
                        $("#module_name_current_amount").removeAttr('hidden');
                    } else {
                        $("#module_name_table").html(`
                            <tr class="table-row">
                                <td class="error_data text-danger" align="center" colspan="7">
                                    ${message || 'Module Name Currently Not Exists On Server! Please Search......'}
                                </td>
                            </tr>
                        `);
                        $("#module_nam_row_amount").text('0.00');
                        $("#module_name_current_amount").attr('hidden', true);
                    }

                    // Initialize tooltips
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Populate autocomplete suggestions
                    const suggestions = data.map(item => item.module_name);
                    $("#ModuleSearchBar").autocomplete({
                        source: suggestions
                    });
                },
                error: function() {
                    $("#module_name_table").html(`
                        <tr class="table-row">
                            <td class="error_data text-danger" align="center" colspan="7">
                                Error Fetching Data!
                            </td>
                        </tr>
                    `);
                    $("#module_nam_row_amount").text('0.00');
                }
            });
        }
        
        // Event delegation for row key events
        $("#module_name_table").on("keydown", ".data-table-row", function (event) {
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
        $("#module_name_table").on("keydown", "td", function (event) {
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
        $(document).on('click keyup', '#ModuleSearchBar', function(event) {
            const query = $(this).val();
            fetch_module_names(query);
        });

        // Module Name input handle Field
        $(document).on('keyup', '#moduleName', function(){
            $("#module_create_modal_heading").html("");
            $("#module_catg_create_modal").html("");
            $(this).removeClass('is-invalid');
            $("#savForm_error").html("");
            $("#updateForm_error").html("");

            var value = $(this).val();
            var edit_id = $("#moduleNameId").val();
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
            $("#moduleNameId").val("");
            $("#moduleName").val("");
            $("#catgCreateBtn").removeAttr('hidden');
            $("#catgCancelBtn").removeAttr('hidden');
            $("#thAction").attr('hidden', true);
            $("#catgUpdateBtn").attr('hidden', true);
            $("#catgDeleteBtn").attr('hidden', true);
            $("#moduleName").removeClass('is-invalid');
            $("#savForm_error").html("");
            $("#updateForm_error").html("");
        });

        // Create Module Name Modal Show
        $(document).on('click', '#catgCreateBtn', function(e){
            e.preventDefault();
            $("#module_create_modal_heading").html("");
            $("#module_catg_create_modal").html("");
            $("#createconfirmmodulecategory").modal('show');
            const input_val = $("#moduleName").val();
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

        // Confirm Create Name Module
        $(document).on('click', '#create_btn_confirm', function(e){
            e.preventDefault();

            var moduleName = $("#moduleName").val();
            var data ={
                module_name : moduleName,
                _token : $('meta[name="csrf-token"]').attr('content'),
            }

            $.ajax({
                type: "POST",
                url: "{{ route('module_name_store.action') }}",
                dataType: "json",
                data: data,
                success: function(response){
                    if(response.status === 400){
                        $.each(response.errors, function(key, err_value){
                            if (key === 'module_name') {
                                $("#savForm_error").fadeIn();
                                $('#savForm_error').html('<span class="error_val" style="font-size:10px;font-weight:700;">'+ 'Error-Message : ' + err_value + '</span>');
                                $("#savForm_error").addClass("alert_show_errors");
                                $('#moduleName').addClass('is-invalid');
                                $('#moduleName').html("");
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
                            
                            $("#moduleName").val("");
                            $("#thAction").attr('hidden', true);
                            $("#catgCreateBtn").attr('hidden', true);
                            $("#catgCancelBtn").attr('hidden', true);
                            $("#catgUpdateBtn").attr('hidden', true);
                            $("#catgDeleteBtn").attr('hidden', true);
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_module_names();
                        }, 1500);
                    }
                }
            });
        });

        // Edit Module Name (Table Td select edit button)
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
                    url: "/application/module-name-edit/" +id,
                    dataType: "json",
                    success: function(response){
                        if(response.status == 404){
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.messages);
                        }else if(response.status == 200){
                            $('#moduleNameId').val(id);
                            const updateModuleHeading = $("#module_update_modal_heading");
                            const updateModuleBody = $("#module_catg_update_modal");
                            const deleteModuleHeading = $("#module_delete_modal_heading");
                            const deleteModuleBody = $("#module_catg_delete_modal");
                            updateModuleHeading.append(`<span class="">${response.messages.module_name}</span>`);
                            deleteModuleHeading.append(`<span class="">${response.messages.module_name}</span>`);
                            deleteModuleBody.append(`<span class="">${response.messages.module_name}</span>`);
                            updateModuleBody.append(`<span class="">${response.messages.module_name}</span>`);
                            $('.edit_module_name').val(response.messages.module_name);
                        }
                    }
                });
            }
        });

        // Update Module Name Modal Show
        $(document).on('click', '#catgUpdateBtn', function(e){
            e.preventDefault();
            $("#module_update_modal_heading").html("");
            $("#module_catg_update_modal").html("");
            $("#updateconfirmmodule").modal('show');
            const input_val = $("#moduleName").val();
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

        // Confirm Update Module Name
        $(document).on('click', '#update_btn_confirm', function(e){
            e.preventDefault();
            var id = $("#moduleNameId").val();
            var moduleName = $(".edit_module_name").val();
            
            var data = {
                id : id,
                module_name : moduleName,
                _token: $('meta[name="csrf-token"]').attr('content')
            }

            $.ajax({
                type: "PUT",
                url: "/application/module-name-update/" +id,
                data: data,
                dataType: "json",
                success: function(response){
                    if(response.status === 400){
                        $.each(response.errors, function(key, err_value){
                            if (key === 'module_name') {
                                $("#updateForm_error").fadeIn();
                                $('#updateForm_error').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error").addClass("alert_show_errors");
                                $('#moduleName').addClass('is-invalid');
                                $('#moduleName').html("");
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
                            
                            $('.edit_module_name').val("");
                            $("#thAction").attr('hidden', true);
                            $("#catgCreateBtn").attr('hidden', true);
                            $("#catgCancelBtn").attr('hidden', true);
                            $("#catgUpdateBtn").attr('hidden', true);
                            $("#catgDeleteBtn").attr('hidden', true);
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_module_names();
                        }, 1500);
                    }
                }
            });
            
            
        });

        // Delete Module Name Modal Show
        $(document).on('click', '#catgDeleteBtn', function(e){
            e.preventDefault();
            $("#module_delete_modal_heading").html("");
            $("#module_catg_delete_modal").html("");
            $("#deleteconfirmmodulecategory").modal('show');
            var time = null;
            const input_val = $("#moduleName").val();
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

        // Confirm Delete Module Name
        $(document).on('click', '#delete_module_category', function(e){
            e.preventDefault();
            var id = $("#moduleNameId").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/application/module-name-delete/" +id,
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
                            $("#moduleName").val("");
                            $("#thAction").attr('hidden', true);
                            $("#catgCreateBtn").attr('hidden', true);
                            $("#catgCancelBtn").attr('hidden', true);
                            $("#catgUpdateBtn").attr('hidden', true);
                            $("#catgDeleteBtn").attr('hidden', true);
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_module_names();
                        }, 1500);
                    }
                }
            });
        });
        
    });
</script>