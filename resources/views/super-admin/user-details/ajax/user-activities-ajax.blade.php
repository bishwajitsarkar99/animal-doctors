<script>
    $(document).ready(function(){
        const formatDate = (dateString) => {
            const date = new Date(dateString);

            // Format date
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour12: true
            };

            return date.toLocaleString('en-US', options);
        };
        // ACtive table row background
        $(document).on('click', 'tr.table-row', function(){
            $(this).addClass("clicked").siblings().removeClass("clicked");
        });
        // ACtive table td user-id background
        $(document).on('click', 'td.user-details-links', function() {
            $('td.user-details-links').removeClass("background");
            $(this).addClass("background");
        });
        // User Activities Data Fetch
        fetch_activities_users_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            User Logged Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row supp-table-row" key="${key}" data-user-id="${row.user_id}" id="supp_tab">
                        <td class="sn border_ord" id="supp_tab2" hidden>${row.id}</td>
                        <td class="txt_ user-details-links ps-2" id="supp_tab3">
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-2" id="viewBtn" value="${row.user_id}" style="font-size: 10px;height: 17px;" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="User Agent" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                ${row.user_id}
                            </button>
                        </td>
                        <td class="txt_ ps-1 supp_vew3" id="supp_tab6">${row.roles.name}</td>
                        <td class="border_ord ps-1 supp_vew" id="supp_tab4" hidden>${row.name}</td>
                        <td class="txt_ ps-1 supp_vew2" id="supp_tab5">${row.email}</td>
                        <td class="txt_ ps-1 supp_vew4" id="supp_tab7">${row.ip_address}</td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" hidden>${row.user_agent}</td>
                        <td class="txt_ ps-1 supp_vew6" id="supp_tab9">${row.payload}</td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10" hidden>${row.last_activity}</td>
                        <td class="txt_ ps-1 supp_vew8" id="supp_tab11">${formatDate(row.created_at)}</td>
                        <td class="txt_ ps-1 supp_vew9" id="supp_tab12">${formatDate(row.updated_at)}</td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10">${row.last_activity}</td>
                    </tr>
                    <tr class="table-row user-table-row supp-table-row hidden child-row" data-user-id="${row.user_id}">
                        <td class="txt_ supp_vew9" id="supp_tab12">
                            <img class="user_img rounded-circle user_imgs ms-3" src="${row.image.includes('https://')?row.image: '/image/'+ row.image}">
                        </td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" colspan="7" style="color:blue;"><span style="font-weight:600;">User-Agent :</span> ${row.user_agent}</td>
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
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
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
        // User Details View
        $(document).on('click', '.view_btn', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('tr.child-row[data-user-id="' + user_id + '"]').toggleClass('hidden');
        });
    });
</script>