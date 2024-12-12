<script>
    $(document).ready(() => {
        // switch on/off----- users table search
        $("#search_off_").show();
        
        $(document).on('click', '#search_area_', function() {

            if ($(this).prop('checked')) {
                $("#name_search").removeAttr('hidden');
                $("#name_search").focus();
                $("#search_on_").removeAttr('hidden');
                $("#search_off_").hide();
            } else {
                $("#name_search").attr('hidden', true);
                $("#search_on_").attr('hidden', true);
                $("#search_off_").show();
            }
        });
    
        fetch_medicine_name();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Medicine Name Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row tab_row" id="medic_row" key="${key}">
                        <td class="sn border_ord" id="medic_row2">${row.id}</td>
                        <td class="txt_ ps-1" id="medic_row3" style="border-left:1px solid silver;" >${row.medicine_name}</td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Medicine Dogs Data ------------------
        function fetch_medicine_name(query = '', url = null, perItem = null, sortFieldID = 'id', sortFieldDirection = 'desc',) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('medicine_name.action')}}?per_item=${perItem}`;
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
                    $(".tbody").html(table_rows([...data]));
                    $("#medicine_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_medic_records").text(total);
                    // Get suggestions for autocomplete
                    var suggestion = data.map(function(item) {
                        return {
                            label: `${item.id} - ${item.medicine_name}`,
                            value: item.id
                        };
                    });

                    // Initialize autocomplete
                    $(".medicine_ID").autocomplete({
                        source: suggestion,
                    });
                }

            });
        }
        // peritem change
        $("#perItemControl2").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_medicine_name('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#name_search', function() {
            var query = $(this).val();

            fetch_medicine_name(query);

        });

        $(document).on('keyup', '.searchform', function(){
            $('.prd-search-icon').removeClass('prd-search-hidden');
            $("#medic_nam6").addClass('skeleton');
            $("#medic_row2").addClass('skeleton');
            $("#medic_row3").addClass('skeleton');

            var time = null;

            time = setTimeout(() => {
                $('.prd-search-icon').addClass('prd-search-hidden');
                $("#medic_nam6").removeClass('skeleton');
                $("#medic_row2").removeClass('skeleton');
                $("#medic_row3").removeClass('skeleton');
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
        $("#medicine_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_medicine_name('', url);
            }

        });
        // Event Listener for sorting columns
        $(document).on('click', '.sortable-header', function() {
            var button = $(this);
            var column = button.data('column');
            var order = button.data('order');

            order = (order === 'desc') ? 'asc' : 'desc';
            button.data('order', order);

            fetch_medicine_name('', null, null, column, order);

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