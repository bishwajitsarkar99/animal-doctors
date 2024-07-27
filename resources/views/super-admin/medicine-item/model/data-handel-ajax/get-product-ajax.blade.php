<script>
    $(document).ready(() => {
        fetch_product_get_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Product Name Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" id="prod_tabl" key="${key}">
                        <td class="sn border_ord" id="prod_tabl2">${row.id}</td>
                        <td class="txt_ prod_td ps-1" id="prod_tabl3">${row.product_name}</td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Model Data ------------------
        function fetch_product_get_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControlProd").val();
            }
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('get_product.action')}}?per_item=${perItem}`;
            }else {
                current_url += `&per_item=${perItem}`
            }

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#prod_table").html(table_rows([...data]));
                    $("#prod_get_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_prod_records").text(total);
                    // Get suggestions for autocomplete
                    var suggestion = data.map(function(item) {
                        return {
                            label: `${item.id} - ${item.product_name}`,
                            value: item.id
                        };
                    });
                    // Initialize autocomplete
                    $(".prod_id").autocomplete({
                        source: suggestion,
                    });
                }

            });
        }
        // peritem change
        $("#perItemControlProd").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_product_get_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#prod_search', function() {
            var query = $(this).val();
            fetch_product_get_data(query);

        });

        // search-loader
        $(document).on('keyup', '.produSearch', function(){

            var time = null;
            $(".produ-search-icon").removeClass("produ-search-hidden");
            $("#prod_table").addClass('skeleton');
            $("#prod_tabl").addClass('skeleton');
            $("#prod_tabl2").addClass('skeleton');
            $("#prod_tabl3").addClass('skeleton');

            time = setTimeout(() => {
                $(".produ-search-icon").addClass("produ-search-hidden");
                $("#prod_table").removeClass('skeleton');
                $("#prod_tabl").removeClass('skeleton');
                $("#prod_tabl2").removeClass('skeleton');
                $("#prod_tabl3").removeClass('skeleton');
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
        $("#prod_get_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_product_get_data('', url);
            }

        });

        // Search-mdoe-btn
        $("#search_off_").show();
        $("#search_on_").hide();
        $("#prod_search").hide();

        $("#search_area_").on('click', function(){
            $("#search_off_").toggle('slow');
            $("#search_on_").toggle('slow');
            $("#prod_search").toggle('slide');
            $("#prod_search").focus();
        });
    });
</script>