<script>
    $(document).ready(function(){
        // User Activities Data Fetch
        fetch_activities_users_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Conatat Information Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row supp-table-row" key="${key}" id="supp_tab">
                        <td class="sn border_ord" id="supp_tab2" hidden>${row.id}</td>
                        <td class="txt_ ps-1 center" id="supp_tab3">${row.user_id}</td>
                        <td class="border_ord ps-1 supp_vew" id="supp_tab4">${row.name}</td>
                        <td class="txt_ ps-1 supp_vew2" id="supp_tab5">${row.email}</td>
                        <td class="txt_ ps-1 supp_vew3" id="supp_tab6">${row.role}</td>
                        <td class="txt_ ps-1 supp_vew4" id="supp_tab7">${row.ip_address}</td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8">${row.user_agent}</td>
                        <td class="txt_ ps-1 supp_vew6" id="supp_tab9">${row.payload}</td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10">${row.last_activity}</td>
                        <td class="txt_ ps-1 supp_vew8" id="supp_tab11">${row.created_at}</td>
                        <td class="txt_ ps-1 supp_vew9" id="supp_tab12">${row.updated_at}</td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch User Activities Data ------------------
        function fetch_activities_users_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('user.get_activity')}}?per_item=${perItem}`;
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
                    $("#user_activites_data_table").html(table_rows([...data]));
                    $("#activities_users_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_activites_records").text(total);
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_activities_users_data('', null, value);
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
        $("#activities_users_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_activities_users_data('', url);
            }

        });
    });
</script>