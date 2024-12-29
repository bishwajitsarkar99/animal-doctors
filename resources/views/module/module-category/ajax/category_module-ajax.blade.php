<script>
    $(document).ready(function(){
        fetch_category_module();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (!rows || rows.length === 0) {
                return `
                    <tr class="table-row">
                        <td class="error_data text-danger" align="center" colspan="7">
                            Module Category Data Not Exists On Server!
                        </td>
                    </tr>
                `;
            }

            return rows.map((row, key) => {
                return `
                    <tr class="table-row user-table-row" id="cat_td_${key}">
                        <td class="sn border_ord first_td">${row.id}</td>
                        <td class="txt_ second_td" colspan="5">${row.module_category_name}</td>
                    </tr>
                `;
            }).join("");
        };

        // Fetch Users Data ------------------
        function fetch_category_module(query = '') {
            var current_url = "{{ route('module_category_search.action') }}";
            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { query: query },
                success: function(response) {
                    // Response now contains data and total
                    const { data, total } = response;

                    // Populate the table
                    $("#module_category_table").html(table_rows(data));
                    
                    // Display total count (if applicable)
                    $("#module_catg_row_amount").text(`${total}.00`);
                    
                    // Initialize tooltips
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Populate autocomplete suggestions
                    const suggestions = data.map(item => item.module_category_name);
                    $("#CategorySearchBar").autocomplete({
                        source: suggestions
                    });
                },
                error: function() {
                    $("#module_category_table").html(`
                        <tr class="table-row">
                            <td class="error_data text-danger" align="center" colspan="7">
                                Error Fetching Data!
                            </td>
                        </tr>
                    `);
                }
            });
        }

        // Live-Search-----------------------------
        $(document).on('keyup', '#CategorySearchBar', function() {
            const query = $(this).val();
            fetch_category_module(query);
        });

        // Module Category Field
        $(document).on('keyup', '#moduleCategoryName', function(){
            var value = $(this).val();
            if(value !== ''){
                $("#thAction").removeAttr('hidden');
                $("#catgCreateBtn").removeAttr('hidden');
                $("#catgCancelBtn").removeAttr('hidden');
            }else if(value == ''){
                $("#thAction").attr('hidden', true);
                $("#catgCreateBtn").attr('hidden', true);
                $("#catgCancelBtn").attr('hidden', true);
            }
        });
    });
</script>