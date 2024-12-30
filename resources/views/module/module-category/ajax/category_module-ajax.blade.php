<script>
    $(document).ready(function(){
        fetch_category_module();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (!rows || rows.length === 0) {
                return `
                    <tr class="table-row">
                        <td class="error_data text-danger" align="center" colspan="7">
                            Module Category Currently Not Exists On Server! Please Search......
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

        // Fetch Users Data ------------------
        function fetch_category_module(query = '') {
            var current_url = "{{ route('module_category_search.action') }}";
            const input_value = $("#CategorySearchBar").val();
            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: { query: query, module_category_name: input_value },
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

        // Event delegation for row key events
        $("#module_category_table").on("keydown", ".data-table-row", function (event) {
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
        // Add focus styles for rows
        $(document).on("focus", ".data-table-row", function () {
            $(this).addClass("highlight");
        });
        $(document).on("blur", ".data-table-row", function () {
            $(this).removeClass("highlight");
        });

        // Handle key events on table cells
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
                // Add your logic for Enter key (e.g., editing or selecting the cell)
                event.preventDefault();
            }
        });
        // Add focus styles for cells
        $(document).on("focus", "td", function () {
            $(this).addClass("focused-td");
        });
        $(document).on("blur", "td", function () {
            $(this).removeClass("focused-td");
        });

        // Live-Search-----------------------------
        $(document).on('click keyup', '#CategorySearchBar', function(event) {
            const query = $(this).val();
            fetch_category_module(query);
            // Handle Enter key or click event for highlighting
            // if (event.type === 'click' || (event.type === 'keyup' && event.key === 'Enter')) {
            //     const addRow = $(".data-table-row").attr("data-val");
            //     if (addRow.length) {
            //         // Add highlight to all rows and set focus on the first row
            //         $(".data-table-row")
            //             .addClass("highlight")
            //             .attr("data-val", 1)
            //             .first()
            //             .focus();
            //     }
            // }
            
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

        // Autofocus and add class to input field on focus
        $(document).on('focus', '#moduleCategoryName', function () {
            $(this).addClass('focused-input'); // Use a valid class name
        });
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

        // Table Td select edit button
        $(document).on('click keydown Enter', '#table_edit_btn', function(){
            if (event.type === 'click' || (event.type === 'keydown' && event.key === 'Enter')) {
                const edit_id = $(this).val();
                $("#thAction").removeAttr('hidden');
                $("#catgUpdateBtn").removeAttr('hidden');
                $("#catgDeleteBtn").removeAttr('hidden');
            }
        });


    });
</script>