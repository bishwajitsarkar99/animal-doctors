<script type="module">
    $(document).ready(function(){
        // Module Name Data Table
        const table_rows = (rows) => {
            if (!rows || rows.length === 0) {
                return `
                    <tr class="table-row">
                        <td class="error_data text-danger" align="center" colspan="7">
                            ${message || 'Module name is not exits.'}
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
        // Module Name Data Table
        const table_category_rows = (rows) => {
            if (!rows || rows.length === 0) {
                return `
                    <tr class="table-row">
                        <td class="error_data text-danger" align="center" colspan="7">
                            ${message || 'Module name is not exits.'}
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => {
                return `
                    <tr class="table-row user-table-row data-table-row" id="row_id" value="${key}" tabindex="0">
                        <td class="sn border_ord first_td" id="table_edit_btn" value="${row.id}" tabindex="0">${row.id}</td>
                        <td class="txt_ second_td" colspan="5" tabindex="0">${row.module_category_name}</td>
                    </tr>
                `;
            }).join("");
        };

        fetchModuleNameGet();
        //Fetch Module Name
        function fetchModuleNameGet(){
            var current_url = "{{ route('module_name_get.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: "json",
                success: function(response) {
                    const { status, module_names, message } = response;

                    // Handle the table rendering based on the status
                    if (status === 'success') {
                        $("#moduleNameTable").html(table_rows(module_names));
                    } else {
                        $("#moduleNameTable").html(`
                            <tr class="table-row">
                                <td class="error_data text-danger" align="center" colspan="7">
                                    ${message || 'Module name is not exits.'}
                                </td>
                            </tr>
                        `);
                    }

                    // Initialize tooltips
                    $('[data-bs-toggle="tooltip"]').tooltip();
                },
                error: function() {
                    $("#moduleNameTable").html(`
                        <tr class="table-row">
                            <td class="error_data text-danger" align="center" colspan="7">
                                Error Fetching Data!
                            </td>
                        </tr>
                    `);
                }
            });
        }
        fetchModuleCategoriesGet();
        //Fetch Module Category
        function fetchModuleCategoriesGet(){
            var current_url = "{{ route('module_category_get.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: "json",
                success: function(response) {
                    const { status, module_categories, message } = response;

                    // Handle the table rendering based on the status
                    if (status === 'success') {
                        $("#moduleCategoryTable").html(table_category_rows(module_categories));
                    } else {
                        $("#moduleCategoryTable").html(`
                            <tr class="table-row">
                                <td class="error_data text-danger" align="center" colspan="7">
                                    ${message || 'Module name is not exits.'}
                                </td>
                            </tr>
                        `);
                    }

                    // Initialize tooltips
                    $('[data-bs-toggle="tooltip"]').tooltip();
                },
                error: function() {
                    $("#moduleCategoryTable").html(`
                        <tr class="table-row">
                            <td class="error_data text-danger" align="center" colspan="7">
                                Error Fetching Data!
                            </td>
                        </tr>
                    `);
                }
            });
        }
    });
</script>