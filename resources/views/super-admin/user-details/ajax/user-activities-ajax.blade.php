<script type="module">
    import { getTimeDifference } from "/module/module-min-js/helper-function-min.js";
    import { formatDate } from "/module/module-min-js/helper-function-min.js";
    const companyName = @json(setting('company_name'));
    const companyAddress = @json(setting('company_address'));
    const companyLogo = "{{ asset('backend_asset/main_asset/img/' . setting('update_company_logo')) }}";
    const pageLoader = "{{asset('image/loader/loading.gif')}}";
    $(document).ready(function(){
        // ACtive table row background
        $(document).on('click', 'tr.table-row', function(){
            $(this).addClass("clicked").siblings().removeClass("clicked");
        });
        // ACtive table td user-id background
        $(document).on('click', 'button.user-details-btn', function() {
            $('button.user-details-btn').removeClass("btn-background");
            $(this).addClass("btn-background");
        });
        // User Activities Data Fetch
        fetch_activities_users_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            <svg width="20px" height="20px" fill="rgb(220, 53, 69)" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 120.54" style="enable-background:new 0 0 122.88 120.54" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M95.7,65.5c15.01,0,27.18,12.17,27.18,27.18c0,15.01-12.17,27.18-27.18,27.18 c-15.01,0-27.18-12.17-27.18-27.18C68.52,77.67,80.69,65.5,95.7,65.5L95.7,65.5z M96.74,77.05c1.18,0,2.12,0.34,2.79,1.02 c0.67,0.68,1.01,1.6,1.01,2.8c0,1.21-0.58,2.29-1.74,3.23c-1.17,0.94-2.53,1.42-4.07,1.42c-1.16,0-2.09-0.32-2.79-0.98 c-0.71-0.66-1.06-1.51-1.06-2.57c0-1.34,0.58-2.49,1.73-3.47C93.75,77.53,95.13,77.05,96.74,77.05L96.74,77.05z M90.94,107.09 V91.56h-2.87c0-3.91,7.19-1.37,12.48-2.71v18.24C110.54,107.09,80.68,107.09,90.94,107.09L90.94,107.09z M17.69,26.67 c8.1,2.71,19.38,4.38,31.91,4.38s23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06c0-2.81-4.4-5.69-11.51-8.06 c-8.1-2.7-19.38-4.38-31.91-4.38s-23.81,1.67-31.91,4.38C2.6,15.59,2.18,21.5,17.69,26.67L17.69,26.67z M6.24,47.86 c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.71,19.38,4.38,31.91,4.38s23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06h0.03 v-19.3c-2.53,1.73-5.78,3.26-9.59,4.53c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72 c-3.77-1.26-6.98-2.76-9.49-4.47V47.86L6.24,47.86z M63.3,92.54c-4.35,0.44-8.95,0.67-13.7,0.67c-13.16,0-25.13-1.8-33.86-4.72 c-3.77-1.26-6.98-2.76-9.49-4.47v18.49c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c7.52,0,14.58-0.6,20.78-1.67 c1.56,1.94,3.33,3.7,5.29,5.24c-7.53,1.65-16.49,2.6-26.07,2.6c-13.16,0-25.13-1.8-33.86-4.72c-4.6-1.54-15.67-6.58-15.67-12.62 c0-0.71,0-1.3,0-1.98C0.06,73.69,0,46.15,0,18.61c0-5.76,6.01-10.65,15.73-13.9C24.46,1.8,36.44,0,49.6,0 c13.16,0,25.13,1.8,33.86,4.72c8.85,2.95,14.62,7.27,15.59,12.37c0.12,0.32,0.18,0.67,0.18,1.04v42.37 c-1.2-0.14-2.42-0.21-3.66-0.21c-0.85,0-1.68,0.03-2.51,0.1v-3.74c-2.53,1.73-5.78,3.26-9.59,4.53 c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72c-3.77-1.26-6.98-2.76-9.49-4.47v18.49 c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c5.01,0,9.82-0.27,14.31-0.76C63.51,88.3,63.3,90.4,63.3,92.54 L63.3,92.54z"/></g></svg>
                            User Logged Data Not Exists On Server <span style="color:rgb(220, 53, 69)">!</span>
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                let statusText, statusOffColor, currentLogText, activeTime, updateDate, lastActivity, tdPadding;
                if (row.payload == 'logout') {
                    statusText = '<span class="bg-light-alert badge rounded-pill" style="color:white;font-weight:800;font-size: 11px;letter-spacing: 1px;">logout</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                    updateDate = `<span>${formatDate(row.updated_at)}</span>`;
                    lastActivity = `<span>${row.last_activity}</span>`;
                    tdPadding = ` style="padding-top:2px;padding-bottom:2px;" `;
                    // Calculate active time based on logout time
                    activeTime = `<span style="color:#4c4c4c;font-size:10px;">${getTimeDifference(row.updated_at)} ago</span>`;
                } else if (row.payload == 'login') {
                    statusText = '<span class="bg-success badge rounded-pill" style="color:white;font-weight:800;font-size: 11px;letter-spacing: 1px;">login</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                    updateDate = `<span style="text-align:center;font-weight:800;"> 
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="#333" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </span>`;
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
                    <tr class="table-row user-table-row supp-table-row table-light" key="${key}" data-user-id="${row.last_activity}" id="supp_tab">
                        <td class="sn border_ord" id="supp_tab2" hidden>${row.id}</td>
                        <td class="txt_ user-details-links ps-1" id="supp_tab3">
                            <button class="btn-sm edit_registration user-details-btn view_btn cgr_btn viewurs ms-1" id="viewBtn" value="${row.last_activity}" style="font-size: 10px;height: 18px;">
                                <span hidden>${row.last_activity}</span>
                                ${row.user_id} 
                            </button>
                        </td>
                        <td class="border_ord ps-1 supp_vew" id="supp_tab4" hidden>${row.name}</td>
                        <td class="txt_ ps-1 supp_vew2" id="supp_tab5">
                            <span style="color:gray"><i class="fa fa-envelope"></i></span>
                            ${row.email} ${activeTime ? activeTime : ''}
                        </td>
                        <td class="txt_ supp_vew4 table-td-align" id="supp_tab7">${row.ip_address}</td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" hidden>${row.user_agent}</td>
                        <td class="txt_ supp_vew6 table-td-align" ${tdPadding} id="supp_tab9">
                            <span class="permission edit_inventory_table" style="font-size:12px; ${statusOffColor}">
                                ${statusText}
                            </span>
                        </td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10" hidden>${row.last_activity}</td>
                        <td class="txt_ ps-1 supp_vew8" id="supp_tab11">${formatDate(row.created_at)}</td>
                        <td class="txt_ ps-1 supp_vew9" id="supp_tab12">${updateDate}</td>
                        <td class="txt_ pe-2 supp_vew7 table-td-align" id="supp_tab10">${lastActivity}</td>
                    </tr>
                    <tr class="table-log-details-row supp-table-row child-row" data-user-id="${row.last_activity}"  style="display: none;">
                        <td colspan="14">
                            <div class="card log-content-card" style="background-color:white;">
                                <div class="log_card_header view-card-section" id="logCardHeader">
                                    <div class="row">
                                        <div class="col-xl-2 logo_box">
                                            <span class="l-icon ps-2">
                                                <svg width="40" height="40" viewBox="0 0 20 20">
                                                    <path d="M5 0 V15 H20" stroke="#4c4c4cd6" stroke-width="1" fill="none"/>
                                                </svg>
                                            </span>
                                            <label class="logo_area mt-3" for="logo_area" id="logo_area">
                                                <img class="company_logo" src="${companyLogo}">
                                            </label>
                                        </div>
                                        <div class="col-xl-9">
                                            <p class="company_name_area mt-3">
                                                <label class="company_name" for="company_name" id="companyName">${companyName}</label><br>
                                                <label class="company_address" for="company_address" id="companyAddress">${companyAddress}</label>
                                            </p>
                                        </div>
                                        <div class="col-xl-1">
                                            <div class="card_close_btn mt-4">
                                                <button type="button" class="btn-close btn-btn-sm clos_btn2 close_send_view" data-parent="${row.last_activity}" id="viewBtn" value="${row.last_activity}"
                                                    data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="details-content-body info_part_one">
                                    <div class="row">
                                        <div class="col-xl-2 img_box view-card-section">
                                            <img class="user_image_log" src="${row.image.includes('https://')?row.image: '/storage/image/user-image/'+ row.image}"><br>
                                            <label class="card_row_first_part" for="user_id" id="user_id">User-ID : ${row.user_id}</label><br>
                                            <label class="card_row_first_part" for="role_id" id="role_id">Role : ${row.roles.name}</label><br>
                                        </div>
                                        <div class="col-xl-5 user_detls view-card-section">
                                            <label class="card_row_first_part mt-2" for="info_label" id="info_label">User Information</label><br>
                                            <label class="card_row_first_part mt-2" for="user_to" id="user_to">Name : ${row.name}</label><br>
                                            <label class="card_row_first_part" for="user_to" id="user_to">Login-Email : ${row.email}</label><br>
                                            <label class="card_row_first_part" for="user_to" id="user_to">Reference-Email : ${row.users.reference_email}</label><br>
                                            <label class="card_row_first_part" for="user_cc" id="user_cc">Contract-Number : ${row.contract_number}</label><br>
                                            <label class="card_row_first_part" for="user_bcc" id="user_bcc">Account-Create : ${formatDate(row.account_create)}</label><br>
                                            <label class="card_row_first_part" for="user_bcc" id="user_bcc">Account Last Update : ${formatDate(row.account_last_update)}</label><br>
                                            <label class="card_row_first_part subject" for="subject" id="subject">Email-Verified : ${formatDate(row.email_verified_at)}</label><br>
                                        </div>
                                        <div class="col-xl-5 branch_info view-card-section">
                                            <label class="card_row_first_part mt-2" for="info_label" id="info_label">Branch Information</label><br>
                                            <label class="card_row_first_part mt-2" for="branch_id" id="branch_id">Branch-ID : ${row.branch_id}</label><br>
                                            <label class="card_row_first_part" for="branch_type" id="branch_type">Branch Type : ${row.users.branch_type}</label><br>
                                            <label class="card_row_first_part mt-1" for="branch_name" id="branch_name">Branch Name : ${row.users.branch_name}</label><br>
                                            <label class="card_row_first_part" for="division_name" id="division_name">Division Name : ${row.users.division_name}</label><br>
                                            <label class="card_row_first_part" for="district_name" id="district_name">District Name : ${row.users.district_name}</label><br>
                                            <label class="card_row_first_part mt-1" for="upazila_name" id="upazila_name">Upazila Name : ${row.users.upazila_name}</label><br>
                                            <label class="card_row_first_part mt-1" for="town_name" id="town_name">Town Name : ${row.users.town_name}</label><br>
                                            <label class="card_row_first_part mt-1" for="location" id="location">Location : ${row.users.location}</label><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-track-mesg">
                                    <div class="row view-card-section">
                                        <div class="col-xl-12 pb-3 pt-3">
                                            <span class="session_id" data-id="${row.id}"><span class="user_agent_label">Session-ID :</span> ${row.id}</span>
                                            <p class="user_agent"><span class="user_agent_label">User-Agent :</span> ${row.user_agent} <br>
                                                <span class="user_location"><span class="user_agent_label">IP-Address :</span> ${row.ip_address}</span> <br>
                                                <span class="user_location"><span class="user_agent_label">Login-Date :</span> ${formatDate(row.created_at)}</span> <br>
                                                <span class="user_location"><span class="user_agent_label">Logout-Date :</span> ${updateDate}</span> <br>
                                                <span class="user_location"><span class="user_agent_label">Last-Activity :</span> ${lastActivity}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
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
                success: function({ data, links, total ,total_users, per_page, per_item_num}) {
                    $("#user_activites_data_table").html(table_rows([...data]));
                    $("#activities_users_data_table_paginate").html(paginate_html({ links, total }));
                    $("#total_activites_records").text(total);
                    $("#total_items").text(total_users);
                    $("#total_per_items").text(per_page);
                    $("#per_items_num").text(per_item_num);
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
        // const paginate_html = ({
        //     links,
        //     total
        // }) => {
        //     if (total == 0) {
        //         return "";
        //     }

        //     return `
        //         <nav class="paginate_link" aria-label="Page navigation example">
        //             <ul class="pagination">
        //                 ${links.map((link, key) => {
        //                     return `
        //                         <li class="page-item${link.active? ' active': ''}" key=${key}>
        //                             <a class="page-link btn_page" href="${link.url? link.url: '#'}">
        //                                 ${link.label}
        //                             </a>
        //                         </li>
        //                     `;
        //                 }).join("\n")}
        //             </ul>
        //         </nav>
        //     `;
        // }
        const paginate_html = ({ links, total }) => {
            if (total == 0) {
                return "";
            }

            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination">
                        ${links.map((link, key) => {
                            // Handle Previous and Next buttons separately
                            if (link.label.toLowerCase().includes("previous")) {
                                return `
                                    <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                        <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                            <svg width="10px" height="9px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 121.66"><title>direction-left</title><path d="M1.24,62.65,120.1,121.46a1.92,1.92,0,0,0,2.58-.88,1.89,1.89,0,0,0,0-1.76h0l-30.87-58,30.87-58h0a1.89,1.89,0,0,0,0-1.76A1.92,1.92,0,0,0,120.1.2L1.24,59a2,2,0,0,0,0,3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            } 
                            if (link.label.toLowerCase().includes("next")) {
                                return `
                                    <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                        <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                            <svg width="10px" height="9px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.86 121.64"><title>direction-right</title><path d="M121.62,59,2.78.2A1.92,1.92,0,0,0,.2,1.08a1.89,1.89,0,0,0,0,1.76h0l30.87,58L.23,118.8h0a1.89,1.89,0,0,0,0,1.76,1.92,1.92,0,0,0,2.58.88l118.84-58.8a2,2,0,0,0,0-3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            }

                            // Regular page numbers
                            return `
                                <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                    <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                        ${link.label}
                                    </a>
                                </li>
                            `;
                        }).join("\n")}
                    </ul>
                </nav>
            `;
        };
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
            var userId = $(this).val();
            
            var $childRow = $('tr.child-row[data-user-id="' + userId + '"]');
            $childRow.stop(true, true).slideToggle('slow');

            // Add/remove skeleton class to all relevant sections
            requestAnimationFrame(() => {
                const $sections = $childRow.find('.view-card-section');
                $sections.addClass('view-card-skeletone');
                setTimeout(() => {
                    $sections.removeClass('view-card-skeletone');
                }, 1000);
            });

        });
        // Close View Card
        $(document).on('click', '.close_send_view', function (e) {
            e.preventDefault();
            var parentId = $(this).data('parent');
            $(this).tooltip('hide'); // Hide tooltip if you are using Bootstrap tooltips
            // Slide up to close the view card
            // $('tr.child-row[data-user-id="' + parentId + '"]').stop(true, true).slideUp('slow');
            var $childRow = $('tr.child-row[data-user-id="' + parentId + '"]');
            $childRow.stop(true, true).slideToggle('slow');

            // Add/remove skeleton class to all relevant sections
            requestAnimationFrame(() => {
                const $sections = $childRow.find('.view-card-section');
                $sections.addClass('view-card-skeletone');
                setTimeout(() => {
                    $sections.removeClass('view-card-skeletone');
                }, 1000);
            });
        });
        // Refresh Button
        $(document).on('click', '#refresh', function(e){
            e.preventDefault();
            var changeURL = '/application/user-log/user-log-activity/log-dashboard';
            window.location.href = changeURL;
            
            $(".refresh-icon").removeClass('refrsh-hidden');
            var time = null;
            time = setTimeout(() => {
                $(".refresh-icon").addClass('refrsh-hidden');
            }, 2500);

            return()=>{
                clearTimeout(time);
            }
            fetch_activities_users_data();
        });
    });
</script>