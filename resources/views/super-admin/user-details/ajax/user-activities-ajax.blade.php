<script type="module">
    import { getTimeDifference } from "/module/module-min-js/helper-function-min.js";
    import { formatDate } from "/module/module-min-js/helper-function-min.js";
    $(document).ready(function(){
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
        // Data View Table--------------   <td class="txt_ ps-1 supp_vew3" id="supp_tab6">${row.roles.name}</td>
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
                let statusText, statusOffColor, currentLogText, activeTime, updateDate, lastActivity, tdPadding;
                if (row.payload == 'logout') {
                    statusText = '<span class="bg-danger badge rounded-pill" style="color:white;font-weight:800;font-size: 11px;letter-spacing: 1px;">logout</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                    updateDate = `<span>${formatDate(row.updated_at)}</span>`;
                    lastActivity = `<span>${row.last_activity}</span>`;
                    tdPadding = ` style="padding-top:2px;padding-bottom:2px;" `;
                    // Calculate active time based on logout time
                    activeTime = `<span style="color:#686868;font-size:10px;">${getTimeDifference(row.updated_at)} ago</span>`;
                } else if (row.payload == 'login') {
                    statusText = '<span class="bg-success badge rounded-pill" style="color:white;font-weight:800;font-size: 11px;letter-spacing: 1px;">login</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                    updateDate = `<span style="text-align:center;font-weight:800;padding-left:70px;"> - </span>`;
                    lastActivity = `<span class="animated" style="color:blue;">Running
                        <input id="light_focus" type="text" class="lightA-focus" readonly></input>
                        <input id="light_focus" type="text" class="lightB-focus" readonly></input>
                        <input id="light_focus" type="text" class="lightC-focus" readonly></input>
                    </span>`;
                    tdPadding = ` style="padding-top:2px;padding-bottom:2px;" `;
                    // Calculate active time based on login time
                    activeTime = `<span style="color:blue;font-size:10px;">${getTimeDifference(row.created_at)} <input id="light_focus" type="text" class="light2-focus ms-1" readonly></input></span>`;
                }
                return `
                    <tr class="table-row user-table-row supp-table-row" key="${key}" data-user-id="${row.last_activity}" id="supp_tab">
                        <td class="sn border_ord" id="supp_tab2" hidden>${row.id}</td>
                        <td class="txt_ user-details-links ps-1" id="supp_tab3">
                            <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-1" id="viewBtn" value="${row.last_activity}" style="font-size: 10px;height: 17px;" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="User Agent" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                <span hidden>${row.last_activity}</span>
                                ${row.user_id} 
                                <span class="toggle-icon">➤</span>
                            </button>
                        </td>
                        <td class="border_ord ps-1 supp_vew" id="supp_tab4" hidden>${row.name}</td>
                        <td class="txt_ ps-1 supp_vew2" id="supp_tab5">
                            <span style="color:gray"><i class="fa fa-envelope"></i></span>
                            ${row.email} ${activeTime ? activeTime : ''}
                        </td>
                        <td class="txt_ ps-1 supp_vew4 table-td-align" id="supp_tab7">${row.ip_address}</td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" hidden>${row.user_agent}</td>
                        <td class="txt_ ps-1 supp_vew6 table-td-align" ${tdPadding} id="supp_tab9">
                            <span class="permission edit_inventory_table" style="font-size:12px; ${statusOffColor}">
                                ${statusText}
                            </span>
                        </td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10" hidden>${row.last_activity}</td>
                        <td class="txt_ ps-1 supp_vew8" id="supp_tab11">${formatDate(row.created_at)}</td>
                        <td class="txt_ ps-1 supp_vew9" id="supp_tab12">${updateDate}</td>
                        <td class="txt_ ps-1 supp_vew7 table-td-align" id="supp_tab10">${lastActivity}</td>
                    </tr>
                    <tr class="table-row user-table-row supp-table-row hidden child-row" data-user-id="${row.last_activity}">
                        <td class="txt_ supp_vew9" id="supp_tab12">
                            <img class="user_img rounded-circle user_imgs ms-3" src="${row.image.includes('https://')?row.image: '/storage/image/user-image/'+ row.image}">
                        </td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" colspan="7" style="color:blue;"><span style="font-weight:600;">User-Agent :</span> ${row.user_agent}</td>
                    </tr>
                `;
            }).join("\n");
        }
        // Fetch User Activities Data ------------------
        function fetch_activities_users_data(query = '', url = null, perItem = null, sortField = 'id', sortDirection = 'desc') {
            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('user.get_activity')}}?per_item=${perItem}`;
            } else {
                current_url += `&per_item=${perItem}`;
            }

            var startDate = $('#date_start').val();
            var endDate = $('#date_end').val();
            var role = $('#select_role').val();

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query,
                    start_date: startDate,
                    end_date: endDate,
                    role: role,
                    sort_field: sortField,
                    sort_direction: sortDirection
                },
                success: function({ data, links, total }) {
                    $("#user_activites_data_table").html(table_rows([...data]));
                    $("#activities_users_data_table_paginate").html(paginate_html({ links, total }));
                    $("#total_activites_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Initialize autocomplete for search
                    var suggestions = data.map(function(item) {
                        return { label: `${item.email}`, value: item.email };
                    });

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
        // Event Listener for sorting columns
        $(document).on('click', '#th_sort', function () {
            var button = $(this);
            var column = button.data('coloumn');
            var order = button.data('order');

            // Toggle the order (asc/desc)
            order = order === 'desc' ? 'asc' : 'desc';
            button.data('order', order);

            fetch_activities_users_data(
                '', null, null,
                column === 'id' ? column : 'id',
                order
            );

            // Remove only the icon from the clicked column (Keep other column icons)
            button.find("svg").remove();

            // Define sorting icons 
            var iconHTML = order === 'desc'
                ?  `<svg width="12px" height="12px" fill="#333333a1" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>`// Down arrow
                : `<svg width="12px" height="12px" fill="#333333a1" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,122.88 0,59.207 39.403,59.207 39.403,0 83.033,0 83.033,59.207 122.433,59.207 61.216,122.88"/></g></svg>`; // Up arrow

            // Append sorting icon only for the clicked column
            button.append(iconHTML);
        });

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
        // Refresh Button
        $(document).on('click', '#refresh', function(e){
            e.preventDefault();
            var changeURL = '/super-admin/show-user-details';
            window.location.href = changeURL;
            
            $(".refresh-icon").removeClass('refrsh-hidden');
            var time = null;
            time = setTimeout(() => {
                $(".refresh-icon").addClass('refrsh-hidden');
            }, 1000);

            return()=>{
                clearTimeout(time);
            }
            fetch_activities_users_data();
        });
    });
</script>