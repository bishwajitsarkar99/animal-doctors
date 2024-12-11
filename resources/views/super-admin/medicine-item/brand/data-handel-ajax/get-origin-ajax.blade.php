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
        function fetch_origin_get_data(query = '', url = null, perItem = null, sortFieldID = 'id', sortFieldDirection = 'desc',) {

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
                    query: query,
                    sort_field_id : sortFieldID,
                    sort_direction : sortFieldDirection,
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
                    // var suggestion = data.map(function(item) {
                    //     return {
                    //         label: `${item.id} - ${item.origin_name}`,
                    //         value: item.id
                    //     };
                    // });
                    // // Initialize autocomplete
                    // $(".orgn_id").autocomplete({
                    //     source: suggestion,
                    // });
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

        $(document).on('click', '#search_area_', function() {

            if ($(this).prop('checked')) {
                $("#orgin_search").removeAttr('hidden').focus();
                $("#search_on_").removeAttr('hidden');
                $("#search_off_").hide();
            } else {
                $("#orgin_search").attr('hidden', true);
                $("#search_on_").attr('hidden', true);
                $("#search_off_").show();
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
            $("#accessconfirmbranch").modal('show');
            $("#pageLoader").removeAttr('hidden');
            $("#access_modal_box").addClass('loader_area');
            $("#processModal_body").removeClass('loading_body_area');
            
            setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#pageLoader").attr('hidden', true);
                $("#access_modal_box").removeClass('loader_area');
                $("#processModal_body").addClass('loading_body_area');
                $("#origin").modal('show');
                
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
                $("#iteam_label3").addClass('result-skeleton');
                $("#total_org_records").addClass('skeleton');
                $("#iteam_label6").addClass('skeleton');
                $("#iteam_label").addClass('skeleton');
                $("#iteam_label2").addClass('peritm-skeleton');
                $("#med_label").addClass('skeleton');
                $("#origin_get_table_paginate").addClass('paginate-skeleton');
                $(".head_title2").addClass('skeleton');
                $(".cols_title2").addClass('skeleton');
    
                setTimeout(() => {
                    $(".head_title2").removeClass('skeleton');
                    $(".cols_title2").removeClass('skeleton');
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
                    $("#iteam_label3").removeClass('result-skeleton');
                    $("#total_org_records").removeClass('skeleton');
                    $("#iteam_label6").removeClass('skeleton');
                    $("#iteam_label").removeClass('skeleton');
                    $("#med_label").removeClass('skeleton');
                    $("#iteam_label2").removeClass('peritm-skeleton');
                    $("#origin_get_table_paginate").removeClass('paginate-skeleton');
                }, 1000);
    

            }, 1500);
        });

        // Event Listener for sorting columns
        $(document).on('click', '.sortable-header', function() {
            var button = $(this);
            var column = button.data('column');
            var order = button.data('order');

            order = (order === 'desc') ? 'asc' : 'desc';
            button.data('order', order);

            fetch_origin_get_data('', null, null, column, order);

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