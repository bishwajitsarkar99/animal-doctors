<script>
    $(document).ready(() => {
        // switch on/off----- users table search
        $("#name_search").hide();
        $("#search_off_").show();
        $("#search_on_").hide();
        $('.medic-search-icon').hide();

        $("#search_area_").on('click', function(){
            $("#name_search").toggle('slide');
            $("#name_search").focus();
            $("#search_off_").toggle('slow');
            $("#search_on_").toggle('slow');
            $('.medic-search-icon').toggle().removeClass('medic-search-hidden');

        });
    
        fetch_group();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Medicine Group Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" id="group_row" key="${key}">
                        <td class="sn border_ord" id="group_row2">${row.id}</td>
                        <td class="txt_ ps-1" id="group_row3" style="border-left:1px solid silver;" >${row.group_name}</td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Medicine Dogs Data ------------------
        function fetch_group(query = '', url = null, perItem = null, sortFieldID = 'id', sortFieldDirection = 'desc',) {

            if (perItem === null) {
                perItem = $("#perItemControl3").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('group.action')}}?per_item=${perItem}`;
            } else {
                current_url += `&per_item=${perItem}`
            }

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query,
                    sort_field_id : sortFieldID,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#group_table").html(table_rows([...data]));
                    $("#groups_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_groups_records").text(total);
                    // Get suggestions for autocomplete
                    // var suggestion = data.map(function(item) {
                    //     return {
                    //         label: `${item.id} - ${item.group_name}`,
                    //         value: item.id
                    //     };
                    // });
                    // // Initialize autocomplete
                    // $(".group_id").autocomplete({
                    //     source: suggestion
                    // });
                }

            });
        }
        // peritem change
        $("#perItemControl3").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_group('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#group_search', function() {
            var query = $(this).val();

            fetch_group(query);

        });

        $(document).on('keyup', '.searchform', function(){
            $('.medic-search-icon').removeClass('medic-search-hidden');
            $("#group_table").addClass('skeleton');
            $("#group_row").addClass('skeleton');
            $("#group_row2").addClass('skeleton');
            $("#group_row3").addClass('skeleton');

            var time = null;

            time = setTimeout(() => {
                $('.medic-search-icon').addClass('medic-search-hidden');
                $("#group_table").removeClass('skeleton');
                $("#group_row").removeClass('skeleton');
                $("#group_row2").removeClass('skeleton');
                $("#group_row3").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        // Paginate Page-------------------------------
        const paginate_html = ({
            links,
            total
        }) => {
            if (total == 0) {
                return "";
            }

            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination">
                        ${links.map((link, key) => {
                            return `
                                <li class="page-item${link.active? ' active': ''}" key=${key}>
                                    <a class="page-link btn_page" href="${link.url? link.url: '#'}">
                                        ${link.label}
                                    </a>
                                </li>
                            `;
                        }).join("\n")}
                    </ul>
                </nav>
            `;
        }
        // change paginate page------------------------
        $("#groups_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_group('', url);
            }

        });

        // search-mode
        $("#group_search").hide();
        $("#search_area_").on('click', function(){
            $("#group_search").toggle('slide');
            $("#group_search").focus();
        });

        // Event Listener for sorting columns
        $(document).on('click', '.sortable-header', function() {
            var button = $(this);
            var column = button.data('column');
            var order = button.data('order');

            order = (order === 'desc') ? 'asc' : 'desc';
            button.data('order', order);

            fetch_group('', null, null, column, order);

            $('.sortable-header .toggle-icon').html('<i class="fa-solid fa-arrow-down-long"></i>');
            $('.sortable-header').not(button).data('order', 'desc');

            var icon = button.find('.toggle-icon');
            if (order === 'desc') {
                icon.html('<i class="fa-solid fa-arrow-up-long"></i>');
            } else {
                icon.html('<i class="fa-solid fa-arrow-down-long"></i>');
            }

            $(".toggle-icon").fadeIn(300);
        });
    });
</script>