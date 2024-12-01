<script>
    $(document).ready(() => {
        fetch_cate_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Category Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" id="category_td" key="${key}">
                        <td class="sn border_ord" id="category_td2">${row.id}</td>
                        <td class="txt_ cat_td ps-1" id="category_td3">${row.category_name}</td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Sub Category ------------------
        function fetch_cate_data(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControls").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('get-categories.action')}}?per_item=${perItem}`;
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
                    $("#cat_table").html(table_rows([...data]));
                    $("#cat_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_cat_records").text(total);

                    // Get suggestions for autocomplete
                    // var suggestion = data.map(function(item) {
                    //     return {
                    //         label: `${item.id} - ${item.category_name}`,
                    //         value: item.id
                    //     };
                    // });
                    // // Initialize autocomplete
                    // $(".categ_id").autocomplete({
                    //     source: suggestion
                    // });
                }

            });
        }
        // peritem change
        $("#perItemControls").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_cate_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#cat_search', function() {
            var query = $(this).val();
            fetch_cate_data(query);

        });

        // search-loader
        $(document).on('keyup', '.searchform2', function(){
            
            var time =null;

            $("#cat_table").addClass('skeleton');
            $("#category_td").addClass('skeleton');
            $("#category_td2").addClass('skeleton');
            $("#category_td3").addClass('skeleton');
            $(".cat-search-icon").removeClass('cat-search-hidden');

            time = setTimeout(() => {
                $("#cat_table").removeClass('skeleton');
                $("#category_td").removeClass('skeleton');
                $("#category_td2").removeClass('skeleton');
                $("#category_td3").removeClass('skeleton'); 
                $(".cat-search-icon").addClass('cat-search-hidden');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });

        // search-mode
        $("#search_off_").show();
        $("#search_on_").hide();
        $("#cat_search").hide();
        $("#search_area_").on('click', function(){
            $("#cat_search").toggle('slide');
            $("#cat_search").focus();
            $("#search_off_").toggle('slow');
            $("#search_on_").toggle('slow');
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
        $("#cat_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_cate_data('', url);
            }

        });
    });
</script>