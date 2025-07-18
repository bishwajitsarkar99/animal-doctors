<script type="module">
    import { getTimeDifference } from "/module/module-min-js/helper-function-min.js";
    import { modernDateFormat } from "/module/module-min-js/helper-function-min.js";
    const companyName = @json(setting('company_name'));
    const companyAddress = @json(setting('company_address'));
    // const companyLogo = "{{ asset('backend_asset/main_asset/img/' . setting('update_company_logo')) }}";
    const companyLogo = "{{ asset('image/log/print-page-logo.svg') }}";
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
                let statusText, statusOffColor, currentLogText, activeTime, lastLogged, updateDate, lastActivity, tdPadding, tdBorder;
                const tableBorder = `style="border-top:1px ridge #dfdfdf;border-bottom:none;"`;
                if (row.payload == 'logout') {
                    statusText = '<span class="bg-light-alert badge rounded-pill" style="color:white;font-weight:800;font-size: 11px;letter-spacing: 1px;">logout</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                    updateDate = `<span>${modernDateFormat(row.updated_at)}</span>`;
                    lastActivity = `<span>${row.last_activity}</span>`;
                    tdPadding = ` style="padding-top:2px;padding-bottom:2px;text-align:center;border-top:1px ridge #dfdfdf;border-bottom:none;" `;
                    // Calculate active time based on logout time
                    activeTime = `<span style="color:#4c4c4c;font-size:10px;">${getTimeDifference(row.updated_at)} ago</span>`;
                    lastLogged = `<span>${getTimeDifference(row.updated_at)} ago</span>`;
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
                    tdPadding = ` style="padding-top:2px;padding-bottom:2px;text-align:center;border-top:1px ridge #dfdfdf;border-bottom:none;" `;
                    // Calculate active time based on login time
                    activeTime = `<span style="color:blue;font-size:10px;">${getTimeDifference(row.created_at)} <input id="light_focus" type="text" class="light2-focus ms-1" readonly></input></span>`;
                    lastLogged = `<span>${getTimeDifference(row.created_at)} <input id="light_focus" type="text" class="light2-focus ms-1 mt-2" readonly></input></span>`;
                }
                return `
                    <tr class="table-row-light table-row user-table-row supp-table-row table-light" key="${key}" data-user-id="${row.last_activity}" id="supp_tab">
                        <td class="sn border_ord" ${tableBorder} id="supp_tab2" hidden>${row.id}</td>
                        <td class="user-details-links ps-1" ${tableBorder} id="supp_tab3">
                            <button class="btn-sm edit_registration user-details-btn view_btn cgr_btn viewurs ms-1" id="viewBtn" value="${row.last_activity}" style="font-size: 10px;height: 18px;">
                                <span hidden>${row.last_activity}</span>
                                ${row.user_id} 
                            </button>
                        </td>
                        <td class="border_ord ps-1 supp_vew" ${tableBorder} id="supp_tab4" hidden>${row.name}</td>
                        <td class="ps-1 supp_vew2" ${tableBorder} id="supp_tab5">
                            <span style="color:gray"><i class="fa fa-envelope"></i></span>
                            ${row.email} ${activeTime ? activeTime : ''}
                        </td>
                        <td class="supp_vew4" ${tableBorder} id="supp_tab7">${row.ip_address}</td>
                        <td class="ps-1 supp_vew5" ${tableBorder} id="supp_tab8" hidden>${row.user_agent}</td>
                        <td class="supp_vew6" ${tdPadding} id="supp_tab9">
                            <span class="permission edit_inventory_table" style="font-size:12px; ${statusOffColor}">
                                ${statusText}
                            </span>
                        </td>
                        <td class="ps-1 supp_vew8" ${tdPadding} id="supp_tab11">${modernDateFormat(row.created_at)}</td>
                        <td class="ps-1 supp_vew9" ${tdPadding} id="supp_tab12">${updateDate}</td>
                        <td class="pe-2 supp_vew7" ${tdPadding} id="supp_tab10">${lastActivity}</td>
                    </tr>
                    <tr class="table-log-details-row supp-table-row child-row" data-user-id="${row.last_activity}"  style="display: none;">
                        <td colspan="14">
                            <div class="card log-content-card" style="background-color:white;">
                                <div class="log_card_header view-card-section" id="logCardHeader">
                                    <div class="row">
                                        <div class="col-xl-2 logo_box">
                                            <span class="l-icon ps-1">
                                                <svg width="40" height="65" viewBox="0 0 20 35">
                                                    <path d="M5 0 V22.5 H20" stroke="#4c4c4cd6" stroke-width="1" fill="none"/>
                                                </svg>
                                            </span>
                                            <label class="logo_area mt-4" for="logo_area" id="logo_area">
                                                <img class="company_logo" src="${companyLogo}">
                                            </label>
                                        </div>
                                        <div class="col-xl-8">
                                            <p class="company_name_area mt-4">
                                                <label class="company_name" for="company_name" id="companyName">${companyName}</label><br>
                                                <label class="company_address" for="company_address" id="companyAddress">${companyAddress}</label>
                                            </p>
                                        </div>
                                        <div class="col-xl-2">
                                            <div class="card_close_btn card_btn_group mt-4">
                                                <a class="download-link-btn" id="pdf" data-value="${row.last_activity}"
                                                    data-bs-toggle="tooltip"  data-bs-placement="top" title="PDF Download" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    <svg width="30" height="30" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 421 511.605">
                                                    <path fill="#6DBF39" d="M95.705.014h199.094L421 136.548v317.555c0 31.54-25.961 57.502-57.502 57.502H95.705c-31.55 0-57.502-25.873-57.502-57.502V57.515C38.203 25.886 64.076.014 95.705.014z"/>
                                                    <path fill="#589B2E" d="M341.028 133.408h-.019L421 188.771v-52.066h-54.357c-9.458-.15-17.998-1.274-25.615-3.297z"/>
                                                    <path fill="#DFFACD" d="M294.8 0L421 136.533v.172h-54.357c-45.068-.718-69.33-23.397-71.843-61.384V0z"/>
                                                    <path fill="#4F8C29" fill-rule="nonzero" d="M0 431.901V253.404l.028-1.261c.668-16.446 14.333-29.706 30.936-29.706h7.238v50.589h342.975c12.862 0 23.373 10.51 23.373 23.371v135.504c0 12.83-10.543 23.373-23.373 23.373H23.373C10.541 455.274 0 444.75 0 431.901z"/>
                                                    <path fill="#4F8C29" fill-rule="nonzero" d="M143.448 240.364a8.496 8.496 0 01-8.496-8.497 8.496 8.496 0 018.496-8.497h163.176a8.496 8.496 0 018.496 8.497 8.496 8.496 0 01-8.496 8.497H143.448zm0-59.176a8.496 8.496 0 010-16.993h172.304a8.496 8.496 0 110 16.993H143.448z"/>
                                                    <path fill="#fff" fill-rule="nonzero" d="M11.329 276.171v154.728c0 7.793 6.38 14.178 14.179 14.178H380.175c7.799 0 14.178-6.379 14.178-14.178V297.405c0-7.798-6.388-14.178-14.178-14.178H37.892c-12.618-.096-19.586-1.638-26.563-7.056z"/>
                                                    <path fill="#1A1A1A" fill-rule="nonzero" d="M136.343 381.786h-17.035v19.785H93.103v-81.894h41.274c18.782 0 28.171 10.09 28.171 30.269 0 11.093-2.445 19.306-7.336 24.634-1.835 2.008-4.367 3.712-7.6 5.11-3.233 1.396-6.988 2.096-11.269 2.096zm-17.035-41.144v20.179h6.029c3.145 0 5.438-.327 6.878-.982 1.443-.656 2.162-2.163 2.162-4.522v-9.171c0-2.359-.719-3.866-2.162-4.521-1.44-.656-3.733-.983-6.878-.983h-6.029zm53.069 60.929v-81.894h36.689c14.762 0 24.895 3.145 30.399 9.435 5.502 6.289 8.255 16.794 8.255 31.512 0 14.72-2.753 25.223-8.255 31.513-5.504 6.289-15.637 9.434-30.399 9.434h-36.689zm37.083-60.929h-10.878v39.964h10.878c3.581 0 6.178-.415 7.794-1.244 1.616-.83 2.426-2.731 2.426-5.7v-26.075c0-2.969-.81-4.87-2.426-5.699-1.616-.831-4.213-1.246-7.794-1.246zm97.879 30.53h-22.277v30.399h-26.206v-81.894h53.724l-3.276 20.965h-24.242v11.008h22.277v19.522z"/>
                                                    </svg>
                                                </a>
                                                <a class="download-link-btn" id="print" data-value="${row.last_activity}"
                                                    data-bs-toggle="tooltip"  data-bs-placement="top" title="Print" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                                    <svg width="30" height="30" viewBox="0 0 64 64">
                                                    <!-- Printer body -->
                                                    <rect x="12" y="20" width="40" height="26" rx="4" ry="4" fill="#555"/>
                                                    
                                                    <!-- Paper output -->
                                                    <rect x="18" y="34" width="28" height="18" rx="2" ry="2" fill="#fff" stroke="#ccc" stroke-width="2"/>
                                                    
                                                    <!-- Paper lines -->
                                                    <line x1="22" y1="40" x2="42" y2="40" stroke="#aaa" stroke-width="2"/>
                                                    <line x1="22" y1="45" x2="42" y2="45" stroke="#aaa" stroke-width="2"/>
                                                    
                                                    <!-- Top panel -->
                                                    <rect x="16" y="10" width="32" height="14" rx="2" ry="2" fill="#777"/>
                                                    
                                                    <!-- Status light -->
                                                    <circle cx="46" cy="28" r="3" fill="#38b2ac"/>
                                                    </svg>
                                                </a>
                                                <button type="button" class="btn-close btn-btn-sm clos_btn2 close_send_view" data-parent="${row.last_activity}" id="viewBtnClose" value="${row.last_activity}"
                                                    data-bs-toggle="tooltip"  data-bs-placement="top" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'>
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
                                            <label class="card_row_first_part mt-1" for="user_to" id="user_to">Login-Email : ${row.email}</label><br>
                                            <label class="card_row_first_part mt-1" for="user_to" id="user_to">Reference-Email : ${row.users.reference_email}</label><br>
                                            <label class="card_row_first_part mt-1" for="user_to" id="user_to">Mailing-Email : ${row.users.mailing_email}</label><br>
                                            <label class="card_row_first_part mt-1" for="user_to" id="user_to">Credential-Email : ${row.users.email}</label><br>
                                            <label class="card_row_first_part mt-1" for="user_cc" id="user_cc">Contract-Number : ${row.contract_number}</label><br>
                                            <label class="card_row_first_part mt-1" for="user_bcc" id="user_bcc">Account-Created : ${modernDateFormat(row.account_create)}</label><br>
                                            <label class="card_row_first_part mt-1" for="user_bcc" id="user_bcc">Account Last Updated : ${modernDateFormat(row.account_last_update)}</label><br>
                                            <label class="card_row_first_part subject mt-1" for="subject" id="subject">Email-Verified : ${modernDateFormat(row.email_verified_at)}</label><br>
                                        </div>
                                        <div class="col-xl-5 branch_info view-card-section">
                                            <label class="card_row_first_part mt-2" for="info_label" id="info_label">Branch Information</label><br>
                                            <label class="card_row_first_part mt-2" for="branch_id" id="branch_id">Branch-ID : ${row.branch_id}</label><br>
                                            <label class="card_row_first_part mt-1" for="branch_type" id="branch_type">Branch Type : ${row.users.branch_type}</label><br>
                                            <label class="card_row_first_part mt-1" for="branch_name" id="branch_name">Branch Name : ${row.users.branch_name}</label><br>
                                            <label class="card_row_first_part mt-1" for="division_name" id="division_name">Division Name : ${row.users.division_name}</label><br>
                                            <label class="card_row_first_part mt-1" for="district_name" id="district_name">District Name : ${row.users.district_name}</label><br>
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
                                            <div class="user-agent-tree">
                                                <span class="user_agent_label">User-Agent : <span style="display:inline-block;width:22px;height:2px;background:lightgray;vertical-align:middle;margin-top:0px;"></span></span></span>
                                                <ul id="userAgentParentTree">
                                                    <li style="padding-top:8px;">
                                                        <span class="user_agent_label">
                                                            <span style="display:inline-block;width:37px;height:2px;background:lightgray;vertical-align:middle;margin-top:0px;"></span>
                                                            Browser-Name : ${row.user_agent?.browser ?? ''}
                                                        </span>
                                                        <ul>
                                                            <li style="padding-top:8px;"><span class="user_agent_label">Browser Engine :</span> ${row.user_agent?.layout ?? ''}</li>
                                                            <li style="padding-top:8px;"><span class="user_agent_label">Operating-System :</span> ${row.user_agent?.os ?? ''}</li>
                                                            <li style="padding-top:8px;"><span class="user_agent_label">Device :</span> ${row.user_agent?.device ?? ''}</li>
                                                            <li style="padding-top:8px;"><span class="user_agent_label">Device-Brand :</span>
                                                                ${row.user_agent?.brand && row.user_agent.brand.trim() !== '' ? row.user_agent.brand : 'Unknown (that will be shown only about mobile or tablet)'}
                                                            </li>
                                                            <li style="padding-top:8px;"><span class="user_agent_label">Device-Model :</span>
                                                                ${row.user_agent?.model && row.user_agent.model.trim() !== '' ? row.user_agent.model : 'Unknown (that will be shown only about mobile or tablet)'}
                                                            </li>
                                                            <li style="padding-top:8px;"><span class="user_agent_label">Device-Manufacturer :</span>
                                                                ${row.user_agent?.manufacturer && row.user_agent.manufacturer.trim() !== '' ? row.user_agent.manufacturer : 'Unknown (that will be shown only about mobile or tablet)'}
                                                            </li>
                                                            <li style="padding-top:8px;"><span class="user_agent_label">Public-IP :</span> ${row.user_agent?.network_ip ?? 'Unknown'}</li>
                                                            <li style="padding-top:8px;"><span class="user_agent_label">IP-Address :</span> ${row.ip_address}</li>
                                                        </ul>
                                                    </li>
                                                    <li style="padding-top:8px;"><span class="user_agent_label">
                                                        <span style="display:inline-block;width:36px;height:2px;background:lightgray;vertical-align:middle;margin-top:0px;"></span>
                                                        Description :</span> ${row.user_agent?.description ?? ''}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="mt-2">
                                                <span class="user_location"><span class="user_agent_label">Login-Date :</span> ${modernDateFormat(row.created_at)}</span> <br>
                                                <span class="user_location"><span class="user_agent_label">Logout-Date :</span> ${updateDate}</span> <br>
                                                <span class="user_location"><span class="user_agent_label">Last Logged Duration :</span> ${lastLogged ? lastLogged : ''}</span> <br>
                                                <span class="user_location"><span class="user_agent_label">Last-Activity :</span> ${lastActivity}</span>
                                            </div>
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

            showTableLoader();

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
                complete: function() {
                    hideTableLoader();
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
        function showTableLoader() {
            $('#tableOverlayLoader').removeClass('display_none');
        }
        function hideTableLoader() {
            $('#tableOverlayLoader').addClass('display_none');
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
                                        <a class="page-link btn_page" data-url="${link.url ? link.url : '#'}" data-bs-toggle="tooltip"  data-bs-placement="left" title="Previous" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                            <svg width="10px" height="9px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 121.66"><path d="M1.24,62.65,120.1,121.46a1.92,1.92,0,0,0,2.58-.88,1.89,1.89,0,0,0,0-1.76h0l-30.87-58,30.87-58h0a1.89,1.89,0,0,0,0-1.76A1.92,1.92,0,0,0,120.1.2L1.24,59a2,2,0,0,0,0,3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            } 
                            if (link.label.toLowerCase().includes("next")) {
                                return `
                                    <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                        <a class="page-link btn_page" data-url="${link.url ? link.url : '#'}" data-bs-toggle="tooltip"  data-bs-placement="right" title="Next" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                            <svg width="10px" height="9px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.86 121.64"><path d="M121.62,59,2.78.2A1.92,1.92,0,0,0,.2,1.08a1.89,1.89,0,0,0,0,1.76h0l30.87,58L.23,118.8h0a1.89,1.89,0,0,0,0,1.76,1.92,1.92,0,0,0,2.58.88l118.84-58.8a2,2,0,0,0,0-3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            }

                            // Regular page numbers
                            return `
                                <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                    <a class="page-link btn_page" data-url="${link.url ? link.url : '#'}">
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

            const url = $(this).attr('data-url');
            $(this).tooltip('hide'); // Hide tooltip if you are using Bootstrap tooltips

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
        // PDF Download
        $(document).on('click', '#pdf', function(e){
            e.preventDefault();

            const last_activity = $(this).data('value');

            const url = '{{ route("details-session-record.pdf") }}?' +
                `last_activity=${last_activity}`;
    
            window.location.href = url;
        });
        // Print
        $(document).on('click', '#print', function (e) {
            e.preventDefault();
            
            const iframe = document.getElementById('printFrame');
            if (!iframe) {
                console.error("Iframe with ID 'printFrame' not found.");
                return;
            }

            const last_activity = $(this).data('value');

            const url = '{{ route("details-session-record.print") }}?' +
                `last_activity=${last_activity}`;

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    const companyName = @json(setting('company_name'));
                    const companyAddress = @json(setting('company_address'));
                    const companyLogo = "{{ asset('image/log/print-page-logo.svg') }}";
                    
                    const doc = iframe.contentDocument || iframe.contentWindow.document;

                    // Dynamically inject logo image
                    let logoHTML = '';
                    if (companyLogo) {
                        logoHTML = `
                            <span style="float:inline-start;">
                                <img id="company-logo" src="${companyLogo}" 
                                    style="width:70px;height:55px;padding:0px;" 
                                    alt="company-logo">
                            </span>
                        `;
                    }

                    // Inject logo before full HTML write
                    const updatedData = data.replace('<div class="header">', `<div class="header">${logoHTML}`);

                    const html = `
                        <!DOCTYPE html>
                        <html>
                            <head>
                                <title>Print Preview</title>
                                <style>
                                    body {
                                        padding: 20px;
                                        font-family: Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif;
                                    }
                                    p, span {
                                        font-family: inherit;
                                        font-size: 13px;
                                    }
                                    .header {
                                        text-align: center;
                                        margin-bottom: 0;
                                    }
                                    .content {
                                        margin: 0;
                                    }
                                    .footer {
                                        text-align: center;
                                        width: 100%;
                                    }
                                    .user_agent_label {
                                        font-size: 13px;
                                        font-weight: 500;
                                    }
                                    /* Tree Styles */
                                    ul, li {
                                        position: relative;
                                    }
                                    li::before {
                                        content: '';
                                        position: absolute;
                                        top: -6px;
                                        left: -10px;
                                        border-left: 1px solid #000;
                                        height: 100%;
                                    }
                                    li::after {
                                        content: '';
                                        position: absolute;
                                        top: 8px;
                                        left: -10px;
                                        width: 12px;
                                        border-top: 1px solid #000;
                                    }
                                    ul#userAgentParentTree,
                                    ul#userAgentParentTree ul {
                                        list-style-type: none;
                                        padding-left: 15px;
                                        position: relative;
                                        font-size: 13px;
                                        margin: 0;
                                    }
                                    #userAgentParentTree > li {
                                        margin-left: 10px;
                                        padding-left: 40px;
                                        position: relative;
                                    }
                                    #userAgentParentTree > li::before {
                                        content: '';
                                        position: absolute;
                                        left: 0;
                                        top: 8px;
                                        width: 38px;
                                        height: 1px;
                                        background: #000;
                                    }
                                    #userAgentParentTree > li::after {
                                        content: '';
                                        position: absolute;
                                        left: 0;
                                        top: 0;
                                        width: 1px;
                                        height: 42px; /* Changed from % to px */
                                        background: #000;
                                    }
                                    #userAgentParentTree > li:last-child::after {
                                        height: 8px;
                                    }
                                    #userAgentChildTree li {
                                        list-style-type: none;
                                        margin-left: -25px;
                                        padding-left: 10px;
                                        position: relative;
                                    }
                                    #userAgentChildTree li::before {
                                        content: '';
                                        position: absolute;
                                        left: -4px;
                                        top: 8px;
                                        width: 12px;
                                        height: 1px;
                                        background: #000;
                                    }
                                    #userAgentChildTree li::after {
                                        content: '';
                                        position: absolute;
                                        left: -5px;
                                        top: -7px;
                                        width: 1px;
                                        height: 10px; /* Changed from % to px */
                                        background: #000;
                                    }
                                    ul#userAgentParentTree {
                                        margin-left: 75px;
                                        margin-top: -7px;
                                    }
                                    /* Print Optimizations */
                                    @media print {
                                        .print-watermark-text {
                                            display: block;
                                            position: fixed;
                                            top: 50%;
                                            left: 40%;
                                            transform: translate(-50%, -40%) rotate(-45deg);
                                            font-size: 100px;
                                            color: rgba(0, 0, 0, 0.08);
                                            font-weight: bold;
                                            z-index: 0;
                                            white-space: nowrap;
                                            pointer-events: none;
                                            width: 100%;
                                            text-align: center;
                                            text-shadow:
                                                2px 2px 0 rgba(0, 0, 0, 0.04),
                                                4px 4px 0 rgba(0, 0, 0, 0.03),
                                                6px 6px 0 rgba(0, 0, 0, 0.02);
                                            filter: blur(0.2px);
                                        }
                                        body {
                                            -webkit-print-color-adjust: exact !important;
                                            print-color-adjust: exact !important;
                                            font-family: sans-serif;
                                            padding: 20px;
                                        }
                                        #userAgentParentTree li::after,
                                        #userAgentChildTree li::after {
                                            height: auto; /* fallback if px values don't render well */
                                        }
                                        
                                    }
                                </style>
                            </head>
                            <body>
                                <div class="print-watermark-text">${companyName}</div>
                                ${updatedData}
                            </body>
                        </html>
                    `;

                    doc.open();
                    doc.write(html);
                    doc.close();

                    // Wait for image load inside iframe before printing
                    const logoImage = doc.getElementById('company-logo');

                    if (logoImage) {
                        // Attach load event listener
                        logoImage.addEventListener('load', () => {
                            iframe.contentWindow.focus();
                            iframe.contentWindow.print();
                        });
                    }
                })
                .catch(error => console.error('Error loading print content:', error));
        });
    });
</script>
