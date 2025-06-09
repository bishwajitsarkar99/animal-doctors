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
            $(this).addClass("clicked td").siblings().removeClass("clicked td");
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
                            <div class="table-svg-container pt-1">
                                <svg width="20" height="30" viewBox="0 0 61 81" fill="#fff" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round"><use xlink:href="#A" x=".5" y=".5"/><symbol id="A" overflow="visible"><g stroke="none"><path d="M0 10.929V69.07C0 75.106 13.432 80 30 80V10.929H0z" fill="#3999c6"/><path d="M29.589 79.999h.412c16.568 0 30-4.891 30-10.929v-58.14H29.589v69.07z" fill="#59b4d9"/><path d="M60 10.929c0 6.036-13.432 10.929-30 10.929S0 16.965 0 10.929 13.432 0 30 0s30 4.893 30 10.929"/><path d="M53.867 10.299c0 3.985-10.686 7.211-23.867 7.211S6.132 14.284 6.132 10.299 16.819 3.088 30 3.088s23.867 3.228 23.867 7.211" fill="#7fba00"/><path d="M48.867 14.707c3.124-1.219 5.002-2.745 5.002-4.403 0-3.985-10.686-7.213-23.868-7.213S6.134 6.318 6.134 10.303c0 1.658 1.877 3.185 5.002 4.403 4.363-1.703 11.182-2.803 18.865-2.803s14.5 1.1 18.866 2.803" fill="#b8d432"/><path d="M49.389 58.071c-1.605 1.346-3.78 2.022-6.607 2.022h-9.428V35.358h8.943c2.816 0 4.973.517 6.457 1.588 1.389 1.005 2.086 2.41 2.086 4.205 0 1.431-.507 2.648-1.543 3.719-.882.885-1.942 1.497-3.248 1.856v.058c1.753.217 3.184.889 4.25 2.017.997 1.071 1.511 2.384 1.511 3.903.007 2.262-.813 4.033-2.42 5.366m-22.977-1.457c-2.359 2.322-5.544 3.479-9.519 3.479H8.19V35.358h8.704c8.731 0 13.098 3.998 13.098 12.043 0 3.846-1.181 6.925-3.579 9.213"/><path d="M16.439 39.873h-2.727v15.704h2.759c2.425 0 4.304-.763 5.695-2.227 1.332-1.463 2.006-3.415 2.006-5.883 0-2.317-.674-4.143-1.975-5.495-1.365-1.397-3.275-2.099-5.757-2.099" fill="#3999c6"/><path d="M43.993 44.483c.666-.583.999-1.346.999-2.293 0-1.834-1.332-2.747-4.033-2.747h-2.084v5.86h2.454c1.122 0 2.031-.282 2.665-.821m.909 5.817c-.73-.546-1.722-.853-3.004-.853h-3.03v6.524h3.001c1.276 0 2.303-.304 3.062-.914.696-.612 1.058-1.399 1.058-2.439.006-.977-.357-1.769-1.087-2.317" fill="#59b4d9"/></g></symbol></svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="rgb(205, 247, 0)" stroke="#3999c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit"><circle cx="12" cy="12" r="4"/><line x1="1.05" y1="12" x2="7" y2="12"/><line x1="17.01" y1="12" x2="22.96" y2="12"/></svg>
                                <span><svg width="20" height="20" fill="#3999c6" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 445.38"><path d="M6.95 0h498.1c3.82 0 6.95 3.16 6.95 6.92v96.5l-.02.46v341.5H0V88.11h.01L0 6.92C0 3.11 3.12 0 6.95 0zm11.57 315.78h104.12V219.6H18.52v96.18zm122.64 0h105.8V219.6h-105.8v96.18zm124.32 0h105.35V219.6H265.48v96.18zm123.87 0h104.12V219.6H389.35v96.18zm104.12 18.52H389.35v92.56h104.12V334.3zm-122.64 0H265.48v92.56h105.35V334.3zm-123.87 0h-105.8v92.56h105.8V334.3zm-124.32 0H18.52v92.56h104.12V334.3zM18.52 201.09h104.12v-94.46H18.52v94.46zm122.64 0h105.8v-94.46h-105.8v94.46zm124.32 0h105.35v-94.46H265.48v94.46zm123.87 0h104.12v-94.46H389.35v94.46z"/></svg></span>
                                <span> User Log Data Not Exists On Server <span style="color:rgb(220, 53, 69)">!</span></span>
                            </div>
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

            perItem = perItem ?? $("#perItemControl").val();

            let current_url = url ?? `{{ route('user.get_activity') }}`;
            current_url += current_url.includes('?') ? `&per_item=${perItem}` : `?per_item=${perItem}`;

            let startDate = $('#date_start').val();
            let endDate = $('#date_end').val();
            let role = $('#select_role').val();
            

            // Http Request Handle option -2
            if (!startDate || !endDate) {
                showMessageInTable("Please select both the start and end dates ");
                return;
            }

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query,
                    start_date: startDate,
                    end_date: endDate,
                    role,
                    sort_field: sortField,
                    sort_direction: sortDirection
                },
                success: function({ data, links, total, total_users, per_page, per_item_num, message }) {
                    if (message) {
                        showMessageInTable(message);
                        return;
                    }

                    $('#user_activites_data_table .error_data').remove(); // clear any old error
                    $("#user_activites_data_table").html(table_rows([...data]));
                    $("#activities_users_data_table_paginate").html(paginate_html({ links, total }));
                    $("#total_activites_records").text(total);
                    $("#total_items").text(total_users);
                    $("#total_per_items").text(per_page);
                    $("#per_items_num").text(per_item_num);

                    // Tooltip (Bootstrap 5)
                    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                        new bootstrap.Tooltip(el);
                    });

                    // Autocomplete
                    let seenEmails = new Set();
                    let suggestions = [];

                    data.forEach(item => {
                        if (item.email && !seenEmails.has(item.email)) {
                            seenEmails.add(item.email);
                            suggestions.push({ label: item.email, value: item.email });
                        }
                    });
                    
                    if (!$("#search").data("ui-autocomplete")) {
                        $("#search").autocomplete({
                            source: suggestions,
                            classes: {
                                "ui-autocomplete": "custom-autocomplete",
                                "ui-menu-item": "custom-menu-item",
                                "ui-state-active": "custom-state-active"
                            }
                        });
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let res = xhr.responseJSON;
                        if (res && res.message) {
                            showMessageInTable(res.message);
                        }
                        console.clear(); // Clears the console (optional)
                    } else {
                        showMessageInTable('Server error. Please try again later');
                    }
                }
            });

            function showMessageInTable(message) {
                $('#user_activites_data_table').html(`
                    <tr>
                        <td class="error_data text-center" colspan="11">
                            <div class="table-svg-container pt-1">
                                <svg width="20" height="30" viewBox="0 0 61 81" fill="#fff" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round"><use xlink:href="#A" x=".5" y=".5"/><symbol id="A" overflow="visible"><g stroke="none"><path d="M0 10.929V69.07C0 75.106 13.432 80 30 80V10.929H0z" fill="#3999c6"/><path d="M29.589 79.999h.412c16.568 0 30-4.891 30-10.929v-58.14H29.589v69.07z" fill="#59b4d9"/><path d="M60 10.929c0 6.036-13.432 10.929-30 10.929S0 16.965 0 10.929 13.432 0 30 0s30 4.893 30 10.929"/><path d="M53.867 10.299c0 3.985-10.686 7.211-23.867 7.211S6.132 14.284 6.132 10.299 16.819 3.088 30 3.088s23.867 3.228 23.867 7.211" fill="#7fba00"/><path d="M48.867 14.707c3.124-1.219 5.002-2.745 5.002-4.403 0-3.985-10.686-7.213-23.868-7.213S6.134 6.318 6.134 10.303c0 1.658 1.877 3.185 5.002 4.403 4.363-1.703 11.182-2.803 18.865-2.803s14.5 1.1 18.866 2.803" fill="#b8d432"/><path d="M49.389 58.071c-1.605 1.346-3.78 2.022-6.607 2.022h-9.428V35.358h8.943c2.816 0 4.973.517 6.457 1.588 1.389 1.005 2.086 2.41 2.086 4.205 0 1.431-.507 2.648-1.543 3.719-.882.885-1.942 1.497-3.248 1.856v.058c1.753.217 3.184.889 4.25 2.017.997 1.071 1.511 2.384 1.511 3.903.007 2.262-.813 4.033-2.42 5.366m-22.977-1.457c-2.359 2.322-5.544 3.479-9.519 3.479H8.19V35.358h8.704c8.731 0 13.098 3.998 13.098 12.043 0 3.846-1.181 6.925-3.579 9.213"/><path d="M16.439 39.873h-2.727v15.704h2.759c2.425 0 4.304-.763 5.695-2.227 1.332-1.463 2.006-3.415 2.006-5.883 0-2.317-.674-4.143-1.975-5.495-1.365-1.397-3.275-2.099-5.757-2.099" fill="#3999c6"/><path d="M43.993 44.483c.666-.583.999-1.346.999-2.293 0-1.834-1.332-2.747-4.033-2.747h-2.084v5.86h2.454c1.122 0 2.031-.282 2.665-.821m.909 5.817c-.73-.546-1.722-.853-3.004-.853h-3.03v6.524h3.001c1.276 0 2.303-.304 3.062-.914.696-.612 1.058-1.399 1.058-2.439.006-.977-.357-1.769-1.087-2.317" fill="#59b4d9"/></g></symbol></svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="rgb(205, 247, 0)" stroke="#3999c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit"><circle cx="12" cy="12" r="4"/><line x1="1.05" y1="12" x2="7" y2="12"/><line x1="17.01" y1="12" x2="22.96" y2="12"/></svg>
                                <span><svg width="20" height="20" fill="#3999c6" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 445.38"><path d="M6.95 0h498.1c3.82 0 6.95 3.16 6.95 6.92v96.5l-.02.46v341.5H0V88.11h.01L0 6.92C0 3.11 3.12 0 6.95 0zm11.57 315.78h104.12V219.6H18.52v96.18zm122.64 0h105.8V219.6h-105.8v96.18zm124.32 0h105.35V219.6H265.48v96.18zm123.87 0h104.12V219.6H389.35v96.18zm104.12 18.52H389.35v92.56h104.12V334.3zm-122.64 0H265.48v92.56h105.35V334.3zm-123.87 0h-105.8v92.56h105.8V334.3zm-124.32 0H18.52v92.56h104.12V334.3zM18.52 201.09h104.12v-94.46H18.52v94.46zm122.64 0h105.8v-94.46h-105.8v94.46zm124.32 0h105.35v-94.46H265.48v94.46zm123.87 0h104.12v-94.46H389.35v94.46z"/></svg></span>
                                <span>${message} <span style="color:rgb(220, 53, 69)">!</span></span>
                            </div>
                        </td>
                    </tr>
                `);
            }
        }
        // function fetch_activities_users_data(query = '', url = null, perItem = null, sortField = 'id', sortDirection = 'desc') {
        //     if (perItem === null) {
        //         perItem = $("#perItemControl").val();
        //     }

        //     var current_url = url;
        //     if (url === null) {
        //         current_url = `{{ route('user.get_activity')}}?per_item=${perItem}`;
        //     } else {
        //         current_url += `&per_item=${perItem}`;
        //     }

        //     var startDate = $('#date_start').val();
        //     var endDate = $('#date_end').val();
        //     var role = $('#select_role').val();

        //     $.ajax({
        //         type: "GET",
        //         url: current_url,
        //         dataType: 'json',
        //         data: {
        //             query: query,
        //             start_date: startDate,
        //             end_date: endDate,
        //             role: role,
        //             sort_field: sortField,
        //             sort_direction: sortDirection
        //         },
        //         success: function({ data, links, total ,total_users, per_page, per_item_num, message}) {
        //             if(message){
        //                $("#user_activites_data_table").text(message); 
        //             }else{
        //                 $("#user_activites_data_table").html(table_rows([...data]));
        //                 $("#activities_users_data_table_paginate").html(paginate_html({ links, total }));
        //                 $("#total_activites_records").text(total);
        //                 $("#total_items").text(total_users);
        //                 $("#total_per_items").text(per_page);
        //                 $("#per_items_num").text(per_item_num);
        //                 // Initialize the tooltip elements
        //                 $('[data-bs-toggle="tooltip"]').tooltip();
    
        //                 // Initialize autocomplete for search
        //                 var seenEmails = new Set();
        //                 var suggestions = [];

        //                 data.forEach(function(item){
        //                     if(item.email && !seenEmails.has(item.email)){
        //                         seenEmails.add(item.email);
        //                         suggestions.push({ label: item.email, value: item.email });
        //                     }
        //                 });

        //                 $("#search").autocomplete({
        //                     source: suggestions,
        //                     classes: {
        //                         "ui-autocomplete": "custom-autocomplete",
        //                         "ui-menu-item": "custom-menu-item",
        //                         "ui-state-active": "custom-state-active"
        //                     }
        //                 });
        //             }
        //         },
        //         error: function(xhr) {
        //             // This triggers on 422, 500, etc.
        //             if (xhr.status === 422) {
        //                 // Validation error, extract the JSON message
        //                 let res = xhr.responseJSON;
        //                 if (res && res.message) {
        //                     showMessageInTable(res.message);
        //                 }
        //             } else {
        //                 // Handle other errors
        //                 showMessageInTable('Server error. Please try again later.');
        //             }
        //         }
        //     });
        //     function showMessageInTable(message) {
        //         // Example: You can set your table body to show this message <tr><td colspan="5" class="text-center">${message}</td></tr>
        //         $('#user_activites_data_table').html(`
        //             <tr>
        //                 <td class="error_data" align="center" text-danger colspan="11">
        //                     <svg width="20px" height="20px" fill="rgb(220, 53, 69)" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 120.54" style="enable-background:new 0 0 122.88 120.54" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M95.7,65.5c15.01,0,27.18,12.17,27.18,27.18c0,15.01-12.17,27.18-27.18,27.18 c-15.01,0-27.18-12.17-27.18-27.18C68.52,77.67,80.69,65.5,95.7,65.5L95.7,65.5z M96.74,77.05c1.18,0,2.12,0.34,2.79,1.02 c0.67,0.68,1.01,1.6,1.01,2.8c0,1.21-0.58,2.29-1.74,3.23c-1.17,0.94-2.53,1.42-4.07,1.42c-1.16,0-2.09-0.32-2.79-0.98 c-0.71-0.66-1.06-1.51-1.06-2.57c0-1.34,0.58-2.49,1.73-3.47C93.75,77.53,95.13,77.05,96.74,77.05L96.74,77.05z M90.94,107.09 V91.56h-2.87c0-3.91,7.19-1.37,12.48-2.71v18.24C110.54,107.09,80.68,107.09,90.94,107.09L90.94,107.09z M17.69,26.67 c8.1,2.71,19.38,4.38,31.91,4.38s23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06c0-2.81-4.4-5.69-11.51-8.06 c-8.1-2.7-19.38-4.38-31.91-4.38s-23.81,1.67-31.91,4.38C2.6,15.59,2.18,21.5,17.69,26.67L17.69,26.67z M6.24,47.86 c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.71,19.38,4.38,31.91,4.38s23.81-1.67,31.91-4.38c7.11-2.37,11.51-5.25,11.51-8.06h0.03 v-19.3c-2.53,1.73-5.78,3.26-9.59,4.53c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72 c-3.77-1.26-6.98-2.76-9.49-4.47V47.86L6.24,47.86z M63.3,92.54c-4.35,0.44-8.95,0.67-13.7,0.67c-13.16,0-25.13-1.8-33.86-4.72 c-3.77-1.26-6.98-2.76-9.49-4.47v18.49c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c7.52,0,14.58-0.6,20.78-1.67 c1.56,1.94,3.33,3.7,5.29,5.24c-7.53,1.65-16.49,2.6-26.07,2.6c-13.16,0-25.13-1.8-33.86-4.72c-4.6-1.54-15.67-6.58-15.67-12.62 c0-0.71,0-1.3,0-1.98C0.06,73.69,0,46.15,0,18.61c0-5.76,6.01-10.65,15.73-13.9C24.46,1.8,36.44,0,49.6,0 c13.16,0,25.13,1.8,33.86,4.72c8.85,2.95,14.62,7.27,15.59,12.37c0.12,0.32,0.18,0.67,0.18,1.04v42.37 c-1.2-0.14-2.42-0.21-3.66-0.21c-0.85,0-1.68,0.03-2.51,0.1v-3.74c-2.53,1.73-5.78,3.26-9.59,4.53 c-8.73,2.91-20.71,4.72-33.86,4.72c-13.16,0-25.13-1.8-33.86-4.72c-3.77-1.26-6.98-2.76-9.49-4.47v18.49 c0.56,2.62,4.83,5.26,11.45,7.47c8.1,2.7,19.38,4.38,31.91,4.38c5.01,0,9.82-0.27,14.31-0.76C63.51,88.3,63.3,90.4,63.3,92.54 L63.3,92.54z"/></g></svg>
        //                     ${message} <span style="color:rgb(220, 53, 69)">!</span>
        //                 </td>
        //             </tr>
        //         `);
        //     }
        // }
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
            let query = $(this).val();
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
            }, 3000);

            return()=>{
                clearTimeout(time);
            }
            fetch_activities_users_data();
        });
    });
</script>
<!-- <script>
  const table = document.getElementById('resizableTable');
  let startX, startY, startWidth, startHeight;

  table.addEventListener('mousedown', function (e) {
    const colResizer = e.target.classList.contains('col-resizer');
    const rowResizer = e.target.classList.contains('row-resizer');
    
    if (colResizer) {
      const cell = e.target.parentElement;
      startX = e.pageX;
      startWidth = cell.offsetWidth;

      function onMouseMove(e) {
        const newWidth = startWidth + (e.pageX - startX);
        cell.style.width = newWidth + 'px';
      }

      function onMouseUp() {
        document.removeEventListener('mousemove', onMouseMove);
        document.removeEventListener('mouseup', onMouseUp);
      }

      document.addEventListener('mousemove', onMouseMove);
      document.addEventListener('mouseup', onMouseUp);
    }

    if (rowResizer) {
      const cell = e.target.parentElement;
      startY = e.pageY;
      startHeight = cell.offsetHeight;

      function onMouseMove(e) {
        const newHeight = startHeight + (e.pageY - startY);
        cell.style.height = newHeight + 'px';
      }

      function onMouseUp() {
        document.removeEventListener('mousemove', onMouseMove);
        document.removeEventListener('mouseup', onMouseUp);
      }

      document.addEventListener('mousemove', onMouseMove);
      document.addEventListener('mouseup', onMouseUp);
    }
  });
</script> -->
