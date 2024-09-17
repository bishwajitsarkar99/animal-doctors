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
                let statusText, statusOffColor, currentLogText, activeTime, updateDate, lastActivity, tdPadding;

                // Helper function to calculate time difference
                const getTimeDifference = (startDate) => {
                    const diffMs = current_date - new Date(startDate);
                    const diffHrs = Math.floor((diffMs % 86400000) / 3600000); // hours
                    const diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
                    return `${diffHrs} hrs ${diffMins} mins`;
                };

                if (row.payload == 'logout') {
                    statusText = '<span class="bg-danger badge rounded-pill" style="color:white;font-weight:800;font-size: 11px;letter-spacing: 1px;">logout</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                    updateDate = `<span>${formatDate(row.updated_at)}</span>`;
                    lastActivity = `<span>${row.last_activity}</span>`;
                    tdPadding = ` style="padding-top:2px;padding-bottom:2px;" `;
                } else if (row.payload == 'login') {
                    statusText = '<span class="bg-success badge rounded-pill" style="color:white;font-weight:800;font-size: 11px;letter-spacing: 1px;">login</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                    updateDate = `<span style="text-align:center;font-weight:800;padding-left:30px;"> - </span>`;
                    lastActivity = `<span style="text-align:center;font-weight:800;padding-left:30px;"> - </span>`;
                    tdPadding = ` style="padding-top:2px;padding-bottom:2px;" `;
                    // Calculate active time based on login time
                    activeTime = `<span style="color:blue;font-size:12px;">${getTimeDifference(row.created_at)}<input id="light_focus" type="text" class="light2-focus ms-1" readonly></input></span>`;
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
                        <td class="txt_ ps-1 supp_vew3" id="supp_tab6">${row.roles.name}</td>
                        <td class="border_ord ps-1 supp_vew" id="supp_tab4" hidden>${row.name}</td>
                        <td class="txt_ ps-1 supp_vew2" id="supp_tab5">
                            <span style="color:gray"><i class="fa fa-envelope"></i></span>
                            ${row.email} ${activeTime ? activeTime : ''}
                        </td>
                        <td class="txt_ ps-1 supp_vew4" id="supp_tab7">${row.ip_address}</td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" hidden>${row.user_agent}</td>
                        <td class="txt_ ps-1 supp_vew6" ${tdPadding} id="supp_tab9">
                            <span class="permission edit_inventory_table" style="font-size:12px; ${statusOffColor}">
                                ${statusText}
                            </span>
                        </td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10" hidden>${row.last_activity}</td>
                        <td class="txt_ ps-1 supp_vew8" id="supp_tab11">${formatDate(row.created_at)}</td>
                        <td class="txt_ ps-1 supp_vew9" id="supp_tab12">${updateDate}</td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10">${lastActivity}</td>
                    </tr>
                    <tr class="table-row user-table-row supp-table-row hidden child-row" data-user-id="${row.last_activity}">
                        <td class="txt_ supp_vew9" id="supp_tab12">
                            <img class="user_img rounded-circle user_imgs ms-3" src="${row.image.includes('https://')?row.image: '/image/'+ row.image}">
                        </td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" colspan="7" style="color:blue;"><span style="font-weight:600;">User-Agent :</span> ${row.user_agent}</td>
                    </tr>
                `;
            }).join("\n");
        }
        // Fetch User Activities Data ------------------
        function fetch_activities_users_data(query = '', url = null, perItem = null, sortField = 'id', sortDirection = 'asc') {
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

        fetch_current_users_activities_data();
        // Fetch Current User Activities Data ------------------
        function fetch_current_users_activities_data() {

            $.ajax({
                type: "GET",
                url: "{{ route('user.activity')}}",
                dataType: 'json',
                success: function(response){
                    
                    const {
                        current_users, 
                        current_login_users, 
                        current_logout_users, 
                        total_current_users_activities_percentage,
                        login_current_users_activities_percentage,
                        logout_current_users_activities_percentage,
                        current_user_count_per_day,
                        labels,
                        data,
                        monthly_user_count_per_day,
                    } = response;

                    $("#total_current_activites_records").text(current_users);
                    $("#current_login_activites_records").text(current_login_users);
                    $("#current_logout_activites_records").text(current_logout_users);
                    
                    // Get the percentage value total current activities users
                    var percentage = total_current_users_activities_percentage.toFixed(2);
                    $("#current_total_activites_percentage_records").attr("aria-valuenow", percentage).text(percentage + "%"); 
                    // Get the percentage value total current login activities users
                    var percentage = login_current_users_activities_percentage.toFixed(2);
                    $("#current_login_activites_percentage_records").attr("aria-valuenow", percentage).text(percentage + "%");
                    // Get the percentage value total current logout activities users
                    var percentage = logout_current_users_activities_percentage.toFixed(2);
                    $("#current_logout_activites_percentage_records").attr("aria-valuenow", percentage).text(percentage + "%");
                    // chart with dynamic dat from server
                    userDayLogChart.data.labels = response.labels; // Set the labels dynamically from the server response
                    userDayLogChart.data.datasets[0].data = response.data; // Set the data dynamically
                    // Check if current_user_count_per_day exists and is an object
                    if (userDayLogChart) {
                        
                        userDayLogChart.data.datasets[0].data = current_user_count_per_day.login_counts || [];
                        userDayLogChart.data.datasets[1].data = current_user_count_per_day.logout_counts || [];
                        userDayLogChart.data.datasets[2].data = current_user_count_per_day.current_user_counts || [];

                        userDayLogChart.update();
                    }
                    // Check if current_user_count_per_day exists and is an object
                    if (userMonthLogChart) {
                        
                        userMonthLogChart.data.datasets[0].data = monthly_user_count_per_day.login_counts || [];
                        userMonthLogChart.data.datasets[1].data = monthly_user_count_per_day.logout_counts || [];
                        userMonthLogChart.data.datasets[2].data = monthly_user_count_per_day.current_user_counts || [];

                        userMonthLogChart.update();
                    }
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                }
            });
        }
        // Event Listener for sorting columns
        $(document).on('click', '#th_sort', function () {

            var button = $(this);
            // Get the column and current order
            var column = button.data('column');
            var order = button.data('order');
            // Toggle the order (asc/desc)
            order = order === 'asc' ? 'desc' : 'asc';
            button.data('order', order);
            fetch_activities_users_data('', null, null, column, order);

            // Reset all icons in the table headers first - icon part
            $('#th_sort').find('.toggle-icon').html('<i class="fa-solid fa-arrow-up-long"></i>');
            var icon = button.find('.toggle-icon');
            if (order === 'asc') {
                icon.html('<i class="fa-solid fa-arrow-down-long"></i>');
                $(".toggle-icon").fadeIn(300);
            } else {
                icon.html('<i class="fa-solid fa-arrow-up-long"></i>');
                $(".toggle-icon").fadeIn(300);
            }
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
        $(document).on('click', '#refresh', function(){

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