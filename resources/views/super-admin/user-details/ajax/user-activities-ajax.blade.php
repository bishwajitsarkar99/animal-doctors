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
                let current_date = new Date();
                let statusText, statusOffColor, currentLogText, activeTime;

                // Helper function to calculate time difference
                const getTimeDifference = (startDate) => {
                    const diffMs = current_date - new Date(startDate);
                    const diffHrs = Math.floor((diffMs % 86400000) / 3600000); // hours
                    const diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
                    return `${diffHrs} hrs ${diffMins} mins`;
                };

                if (row.payload == 'logout') {
                    statusText = '<span class="bg-danger badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;line-height: .8;letter-spacing: 1px;">logout</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                } else if (row.payload == 'login') {
                    statusText = '<span class="bg-success badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;line-height: .8;letter-spacing: 1px;">login</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                    
                    // Calculate active time based on login time
                    activeTime = `<span style="color:blue;font-size:12px;">${getTimeDifference(row.created_at)}<input id="light_focus" type="text" class="light2-focus" readonly></input></span>`;
                }
                return `
                    <tr class="table-row user-table-row supp-table-row" key="${key}" data-user-id="${row.user_id}" id="supp_tab">
                        <td class="sn border_ord" id="supp_tab2" hidden>${row.id}</td>
                        <td class="txt_ user-details-links ps-1" id="supp_tab3">
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-2" id="viewBtn" value="${row.user_id}" style="font-size: 10px;height: 17px;" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="User Agent" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                ${row.user_id} <span class="toggle-icon">➤</span>
                            </button>
                        </td>
                        <td class="txt_ ps-1 supp_vew3" id="supp_tab6">${row.roles.name}</td>
                        <td class="border_ord ps-1 supp_vew" id="supp_tab4" hidden>${row.name}</td>
                        <td class="txt_ ps-1 supp_vew2" id="supp_tab5">
                            <span style="color:gray"><i class="fa fa-envelope"></i></span>
                            ${row.email} ${activeTime ? activeTime : ''}
                        </td>
                        <td class="txt_ ps-1 supp_vew4" id="supp_tab7">${row.ip_address}</td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" hidden>${row.user_agent}</td>
                        <td class="txt_ ps-1 supp_vew6" id="supp_tab9">
                            <span class="permission edit_inventory_table" style="font-size:12px; ${statusOffColor}">
                                ${statusText}
                            </span>
                        </td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10" hidden>${row.last_activity}</td>
                        <td class="txt_ ps-1 supp_vew8" id="supp_tab11">${formatDate(row.created_at)}</td>
                        <td class="txt_ ps-1 supp_vew9" id="supp_tab12">${formatDate(row.updated_at)}</td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10">${row.last_activity}</td>
                    </tr>
                    <tr class="table-row user-table-row supp-table-row hidden child-row" data-user-id="${row.user_id}">
                        <td class="txt_ supp_vew9" id="supp_tab12">
                            <img class="user_img rounded-circle user_imgs ms-3" src="${row.image.includes('https://')?row.image: '/image/'+ row.image}">
                        </td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" colspan="7" style="color:darkgoldenrod;"><span style="font-weight:600;">User-Agent :</span> ${row.user_agent}</td>
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

            var startDate = $('#date_start').val();
            var endDate = $('#date_end').val();
            var role = $('#select_role').val();
            var email = $('#select_email').val();

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query,
                    start_date: startDate,
                    end_date: endDate,
                    role: role,
                    email: email
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
                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return {
                            label: `${item.email}`,
                            value: item.email
                        };
                    });

                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions,
                        classes: {
                            "ui-autocomplete": "custom-autocomplete",
                            "ui-menu-item": "custom-menu-item",
                            "ui-state-active": "custom-state-active"
                        }
                    });
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
        // Filter
        $(document).on('change', '#date_start, #date_end, #select_role, #select_email', function () {
            fetch_activities_users_data('');
        });
        $(document).on('keyup', '#search', function () {
            var query = $(this).val();
            fetch_activities_users_data(query);
        });
        // User Details View
        $(document).on('click', '.view_btn', function (e) {
            e.preventDefault();
            
            var button = $(this);
            var user_id = button.val();

            // Toggle the child row visibility
            var childRows = $('tr.child-row[data-user-id="' + user_id + '"]');
            childRows.toggleClass('hidden');

            // Change the icon based on visibility
            var icon = button.find('.toggle-icon');
            if (childRows.is(':visible')) {
                icon.html('▼');
            } else {
                icon.html('➤');
            }
        });
    });
</script>