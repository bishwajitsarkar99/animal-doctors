<script type="module">
    import { getTimeDifference, formatDate, activeTableRow } from "/module/module-min-js/helper-function-min.js";
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    $(document).ready(function(){
        // ACtive table row background
        $(document).on('click', 'tr.table-row', function(){
            activeTableRow(this);
        });
        // User Activities Data Fetch
        fetch_users_email_verification_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Current User Email Verification Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                let statusColor, statusBg, verifyText, statusText, statusOnColor, statusOffColor, activeTime, emailVerifiedDate, emailVerifiedUpdateDate;
                if(row.status == 0){
                    verifyText = '<span class="bg-danger badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;line-height: .7;">No verified</span>';
                    statusColor = 'color:black;background-color: #fff;';
                    statusBg = 'badge rounded-pill bg-warn';
                    emailVerifiedDate = `<span style="color:#646464;font-size:15px;font-weight:800;padding-left:60px;"> - </span>`;
                    activeTime = `<span style="color:#646464;font-size:15px;font-weight:800;padding-left:30px;"> - </span>`;
                }
                else if(row.status == 1){
                    verifyText = '<span class="bg-success badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;line-height: .7;">verified</span>';
                    statusColor = 'color:black;background-color: #fff;';
                    statusBg = 'badge rounded-pill bg-azure';
                    emailVerifiedDate = `<span>${formatDate(row.email_verified_session)}</span>`;
                    activeTime = `<span style="color:blue;font-size:10px;">${getTimeDifference(row.email_verified_session)} ago</span>`;
                }
                // status on/off
                if(row.status == 0){
                    statusText = '<span class="bg-danger badge rounded-pill" style="color:white;font-weight:800;font-size: 8px;">OFF</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                }
                else if(row.status == 1){
                    statusText = '<span class="bg-success badge rounded-pill" style="color:white;font-weight:800;font-size: 8px;">ON</span>';
                    statusOffColor = 'color:black;background-color: #fff;';
                }
                // email verified update date
                if(row.status == 0 || row.created_at == null){
                    emailVerifiedUpdateDate = `<span style="color:#646464;font-size:15px;font-weight:800;padding-left:70px;"> - </span>`;
                }
                else if(row.status == 1){
                    emailVerifiedUpdateDate = `<span>${formatDate(row.created_at)}</span>`;
                }

                return `
                    <tr class="table-row user-table-row supp-table-row" key="${key}" id="supp_tab">
                        <td class="sn border_ord" id="supp_tab2" hidden>${row.id}</td>
                        <td class="txt_ user_id ps-2" id="supp_tab3">
                            ${row.user_id}
                        </td>
                        <td class="txt_ ps-1 supp_vew3" id="supp_tab6">${row.roles.name}</td>
                        <td class="txt_ ps-1 supp_vew2" id="supp_tab5">
                            <span style="color:gray"><i class="fa fa-envelope"></i></span>
                            ${row.email}
                            <span class="${statusBg} permission edit_inventory_table" style="font-size:12px; ${statusColor}">
                                ${verifyText}
                            </span>
                            ${activeTime ? activeTime : ''}
                        </td>
                        <td class="txt_ ps-1 supp_vew8" id="supp_tab11">${emailVerifiedDate}</td>
                        <td class="txt_ ps-1 supp_vew9" id="supp_tab12">${formatDate(row.account_create_session)}</td>
                        <td class="tot_complete_ center ps-1" id="user_set9">
                            <span class="form-check form-switch pt-1">
                                <input class="form-check-input form-label check_permission" type="checkbox" user_id="${row.id}" value="${row.status}" ${row.status? " checked": ''} id="checkStatus">
                                <span class="permission edit_inventory_table" style="font-size:12px; ${statusOffColor}">
                                    ${statusText}
                                </span>
                            </span>
                        </td>
                        <td class="txt_ ps-1 supp_vew4" id="supp_tab7">${emailVerifiedUpdateDate}</td>
                    </tr>
                `;
            }).join("\n");
        }
        // Fetch User Activities Data ------------------
        function fetch_users_email_verification_data(
            query = '', 
            url = null, 
            perItem = null, 
            sortFieldId = 'id', 
            sortFieldRole = 'role', 
            sortFieldEmail = 'email', 
            sortFieldEmailVerified = 'email_verified_session', 
            sortFieldAccountCreate = 'account_create_session', 
            sortFieldStatus = 'status', 
            sortFieldUpdateEmailVerified = 'created_at', 
            sortDirection = 'desc'
        ){

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            var current_url = url;
            if (current_url === null) {
                current_url = `{{ route('emailVerification') }}?per_item=${perItem}`;
            } else {
                current_url += `&per_item=${perItem}`;
            }

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query,
                    per_item: perItem,
                    sort_field_id: sortFieldId,
                    sort_field_role: sortFieldRole,
                    sort_field_email: sortFieldEmail,
                    sort_field_email_verified: sortFieldEmailVerified,
                    sort_field_account_create: sortFieldAccountCreate,
                    sort_field_status: sortFieldStatus,
                    sort_field_update_email_verified: sortFieldUpdateEmailVerified,
                    sort_direction: sortDirection
                },
                success: function({ email_verifications, links, total }) {
                    $("#user_email_verification_data_table").html(table_rows(email_verifications));
                    
                    $("#email_verification_users_data_table_paginate").html(paginate_html({ links, total, email_verifications }));

                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Get suggestions for autocomplete
                    var suggestions = email_verifications.map(function(item) {
                        return {
                            label: `ID : ${item.user_id} - Role : ${item.roles.name} - Email : ${item.email}`,
                            value: item.email,
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
        // Event Listener for sorting columns
        $(document).on('click', '#th_sort', function () {
            var button = $(this);
            // Get the column and current order
            var column = button.data('column');
            var order = button.data('order');
            // Toggle the order (asc/desc)
            order = order === 'desc' ? 'asc' : 'desc';
            button.data('order', order);
            fetch_users_email_verification_data(
                '', null, null, 
                column === 'id' ? column : 'id', 
                column === 'role' ? column : 'role', 
                column === 'email' ? column : 'email', 
                column === 'email_verified_session' ? column : 'email_verified_session', 
                column === 'account_create_session' ? column : 'account_create_session', 
                column === 'status' ? column : 'status', 
                column === 'created_at' ? column : 'created_at', 
                order
            );
            // Reset all icons in the table headers first - icon part
            $('#th_sort').find('.toggle-icon').html('<i class="fa-solid fa-arrow-down-long"></i>');
            var icon = button.find('.toggle-icon');
            if (order === 'desc') {
                icon.html('<i class="fa-solid fa-arrow-up-long"></i>');
                $(".toggle-icon").fadeIn(300);
            } else {
                icon.html('<i class="fa-solid fa-arrow-down-long"></i>');
                $(".toggle-icon").fadeIn(300);
            }
        });
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_users_email_verification_data('', null, value);
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
        $("#email_verification_users_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_users_email_verification_data('', url);
            }

        });
        // Role Filter
        $(document).on('change', '#verification_select_role', function(){
            var query = $(this).val();
            fetch_users_email_verification_data(query); 
        });
        // live search
        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_users_email_verification_data(query); 

            addAttributeOrClass([
               {selector: '#user_email_verification_data_table', type: 'class', name: 'skeleton'} 
            ]);
            // Remove skeleton
            var timeOut = setTimeout(() => {
                removeAttributeOrClass([
                    {selector: '#user_email_verification_data_table', type: 'class', name: 'skeleton'} 
                ]);
            }, 1000);

            return () => {
                clearTimeout(timeOut);
            };
        });
        // Status Update
        $("#user_email_verification_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('email_update_status.action')}}";

            const pagination_url = $("#email_verification_users_data_table_paginate .active").attr('href');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: current_url,
                dataType: 'json',
                data: {
                    id: $(this).attr('user_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    //console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_users_email_verification_data('', pagination_url);
                }
            });
        });
        // Refresh
        $(document).on('click', '#refresh', function(){
            fetch_users_email_verification_data(); 
        });
    });
</script>