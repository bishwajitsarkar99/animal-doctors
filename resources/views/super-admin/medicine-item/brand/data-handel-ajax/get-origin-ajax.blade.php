<script>
    $(document).ready(() => {
        fetch_origin_get_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Origin Name Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" key="${key}" id="origin_tab">
                        <td class="sn border_ord" id="origin_tab2">${row.id}</td>
                        <td class="txt_ origin_name ps-1" id="origin_tab3" style="border-left:1px solid silver;">${row.origin_name}</td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Brand Data ------------------
        function fetch_origin_get_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControls").val();
            }
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('get_origin.action')}}?per_item=${perItem}`;
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
                    $("#orgin_table").html(table_rows([...data]));
                    $("#origin_get_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_org_records").text(total);
                    // Get suggestions for autocomplete
                    var suggestion = data.map(function(item) {
                        return {
                            label: `${item.id} - ${item.origin_name}`,
                            value: item.id
                        };
                    });
                    // Initialize autocomplete
                    $(".orgn_id").autocomplete({
                        source: suggestion,
                    });
                }

            });
        }
        // peritem change
        $("#perItemControls").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_origin_get_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#orgin_search', function() {
            var query = $(this).val();
            fetch_origin_get_data(query);

        });

        // Search-loader
        $(document).on('keyup', '.orgnSearch', function(){

            var time = null;
            $(".orgn-search-icon").removeClass('orgn-search-hidden');
            $("#orgin_table").addClass('skeleton');
            $("#origin_tab").addClass('skeleton');
            $("#origin_tab2").addClass('skeleton');
            $("#origin_tab3").addClass('skeleton');

            time = setTimeout(() => {
                $(".orgn-search-icon").addClass('orgn-search-hidden');
                $("#orgin_table").removeClass('skeleton');
                $("#origin_tab").removeClass('skeleton');
                $("#origin_tab2").removeClass('skeleton');
                $("#origin_tab3").removeClass('skeleton'); 
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });

        // search-mode-btn
        $("#search_off_").show();
        $("#search_on_").hide();
        $("#orgin_search").hide();

        $("#search_area_").on('click', function(){
            $("#orgin_search").toggle('slide');
            $("#orgin_search").focus();
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
        $("#origin_get_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_origin_get_data('', url);
            }

        });

        // Show-Origin Modal---------------
        $("#showOrigin").on('click', function(){
            $("#origin").modal('show');

            var time = null;
            $("#tb_orgin").addClass('skeleton');
            $("#search_area_").addClass('skeleton');
            $("#tb_orgin2").addClass('skeleton');
            $("#search_off_").addClass('skeleton');
            $("#orgin_nam").addClass('skeleton');
            $("#origin_nam2").addClass('skeleton');
            $("#origin_nam3").addClass('skeleton');
            $("#origin_nam4").addClass('skeleton');
            $("#origin_nam5").addClass('skeleton');
            $("#orgin_table").addClass('skeleton');
            $("#iteam_label3").addClass('skeleton');
            $("#total_org_records").addClass('skeleton');
            $("#iteam_label6").addClass('skeleton');

            time = setTimeout(() => {
                $("#tb_orgin").removeClass('skeleton');
                $("#search_area_").removeClass('skeleton');
                $("#tb_orgin2").removeClass('skeleton');
                $("#search_off_").removeClass('skeleton');
                $("#orgin_nam").removeClass('skeleton');
                $("#origin_nam2").removeClass('skeleton');
                $("#origin_nam3").removeClass('skeleton');
                $("#origin_nam4").removeClass('skeleton');
                $("#origin_nam5").removeClass('skeleton');
                $("#orgin_table").removeClass('skeleton');
                $("#iteam_label3").removeClass('skeleton');
                $("#total_org_records").removeClass('skeleton');
                $("#iteam_label6").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
    });
</script>