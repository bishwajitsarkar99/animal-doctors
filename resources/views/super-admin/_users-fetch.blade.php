<script type="text/javascript">
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
    // switch on/off----- users table search
    function mySrcFunction() {
        var x = document.getElementById("search_off");
        if (x.innerHTML === "OFF") {
            x.innerHTML = "ON";
        } else {
            x.innerHTML = "OFF";
        }
    }
    // switch Lock/Unlock----- users table action
    function myLockFunction() {
        var x = document.getElementById("lock_label");
        if (x.innerHTML === "Unlock") {
            x.innerHTML = "Lock";
        } else {
            x.innerHTML = "Unlock";
        }
    }
    $(document).ready(function() {
        // ACtive table row background
        $(document).on('click', 'tr.table-row', function(){
            $(this).addClass("clicked").siblings().removeClass("clicked");
        });
        // switch on/off----- users table search
        $("#search").hide();
        $(document).on('click', '#search_area', function() {
            $("#search_on").toggle('slow');
            $("#search").toggle('slid');
            $("#search").focus();
        });
        // Table header Action Mode
        // $(document).on('click', '#action_mode', function() {

        //     if ($("#action_mode:checked").length > 0) {
        //         $(".check_permission").removeAttr('disabled');
        //         $(".dropdown-toggle-split").removeAttr('disabled');

        //     } else {
        //         $(".check_permission").attr('disabled', true);
        //         $(".dropdown-toggle-split").attr('disabled', true);
        //     }

        //     $('#locker').toggle().removeClass('checking_lock');
        //     $(this).attr('disabled', true);

        //     setTimeout(() => {
        //         $('#locker').toggle().addClass('checking_lock');
        //         $(this).attr('disabled', false);
        //     }, 1000);
        // });

        fetch_users_setting_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            User Account Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                let statusClass, statusColor, statusText, statusBg, verifyText;
                if(row.status == 1){
                    statusClass = 'text-dark';
                    statusText = '❌ Unauthorize';
                    statusColor = 'color:black;background-color: #fff;';
                    statusBg = 'badge rounded-pill bg-warn';
                }
                else if(row.status == 0){
                    statusClass = 'text-dark';
                    statusText = '<span style="color:black;font-weight:800;font-size: 12px;"><i class="fa-solid fa-check"></i></span> Authorize';
                    statusColor = 'color:black;background-color: #fff;';
                    statusBg = 'badge rounded-pill bg-azure';
                }

                if(row.email_verified_at == null){
                    verifyText = '<span class="bg-danger badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;">No verified</span>';
                }else{
                    verifyText = '<span class="bg-success badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;">Verified</span>';
                }
                return `
                    <tr class="table-row user-table-row user_setting" key="${key}" id="user_set">
                        <td class="sn border_ord bold" id="user_set2">${row.id}</td>
                        <td class="tot_order_ center ps-1" id="user_set3">
                            <img class="user_img rounded-circle user_imgs" src="${row.image.includes('https://')?row.image: '/image/'+ row.image}">
                        </td>
                        <td class="txt_ ps-1 center" id="user_set4">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-4" id="viewBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-regular fa-eye fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm delete_button ms-2 delt_button" value="${row.id}'" type="button" id="dltBtn" style="font-size: 10px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="txt_ bold ps-1" id="user_set5">${row.name}</td>
                        <td class="tot_order_ bold ps-1" id="user_set6">${row.email}</td>
                        <td class="tot_pending_ bold ps-1" id="user_set7">${row.contract_number}</td>
                        <td class="tot_pending_ bold ps-1 ${row.role? ' text-primary': ' text-cyan'}" id="user_set8">${row.role ==0 ? 'User': 'Superadmin' && row.role ==2 ? 'SubAdmin': 'User' && row.role ==1 ? 'SuperAdmin': 'User' && row.role ==3 ? 'Admin': 'User' && row.role ==5 ? 'Accounts': 'User' && row.role ==6 ? 'Marketing': 'User' && row.role ==7 ? 'Delivery Team': 'User'}</td>
                        <td class="tot_complete_ pill ps-1">
                            <span class="permission edit_inventory_table" style="font-size:12px;">
                                ${verifyText}
                            </span>
                        </td>
                        <td class="tot_complete_ center ps-1" id="user_set9">
                            <input class="form-switch form-check-input check_permission" type="checkbox" user_id="${row.id}" value="${row.status}" ${row.status? " checked": ''} ${row.email_verified_at === null ? 'disabled' : ''}>
                        </td>
                        <td class="tot_complete_ pill ps-1 ${statusClass}">
                            <span class="${statusBg} permission edit_inventory_table ps-1 ${statusClass}" style="font-size:12px;">
                                ${statusText}
                            </span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                        
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Users Data ------------------
        function fetch_users_setting_data(query = '', url = null, perItem = null) {

            if(perItem === null){
                perItem = $("#perItemControl").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search_users.action')}}?per_item=${perItem}`;
            }else{
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
                    $("#user_data_table").html(table_rows([...data]));
                    $("#user_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_user_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                   // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        var userImage = `<img class="user_img rounded-circle user_imgs" src="${item.image.includes('https://') ? item.image : '/image/' + item.image}">`;
                        return {
                            label: `ID : ${item.id} - ${userImage} - ${item.roles.name} - ${item.email}`,
                            value: item.email
                        };
                    });

                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions,
                        open: function(event, ui) {
                            $(".ui-menu-item-wrapper").each(function(index, element) {
                                var html = $(element).html();
                                $(element).html(html.replace(/&lt;img/g, '<img').replace(/&gt;/g, '>'));
                            });
                        }
                    });
                }
                
            });
        }

        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {value} = e.target;

            fetch_users_setting_data( '',  null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_users_setting_data(query); 

        });

        // Search-loader
        $(document).on('keyup', '.searchform', function(){

            var time = null;
            $("#user_data_table").addClass('skeleton');
            $("#user_set").addClass('skeleton');
            $("#user_set2").addClass('skeleton');
            $("#user_set3").addClass('skeleton');
            $("#user_set4").addClass('skeleton');
            $("#user_set5").addClass('skeleton');
            $("#user_set6").addClass('skeleton');
            $("#user_set7").addClass('skeleton');
            $("#user_set8").addClass('skeleton');
            $("#user_set9").addClass('skeleton');
            $("#user_set10").addClass('skeleton');

            time = setTimeout(() => {
                $("#user_data_table").removeClass('skeleton');
                $("#user_set").removeClass('skeleton');
                $("#user_set2").removeClass('skeleton');
                $("#user_set3").removeClass('skeleton');
                $("#user_set4").removeClass('skeleton');
                $("#user_set5").removeClass('skeleton');
                $("#user_set6").removeClass('skeleton');
                $("#user_set7").removeClass('skeleton');
                $("#user_set8").removeClass('skeleton');
                $("#user_set9").removeClass('skeleton');
                $("#user_set10").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
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
        $("#user_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_users_setting_data('', url);
            }

        });
        
        // Edit Users-------------------------
        $(document).on('click', '.edit_btn', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('#edit_user_form').modal('show').fadeIn(300).delay(300);
            // Reset progress bar and image
            $(".register_img").removeClass('img-hidden');
            $('.bar').css('width', '0%');
            $('.percent').text('0%');

            $.ajax({
                type: "GET",
                url: "/edit-users/" + user_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#edit_user_id').val(user_id);
                        $('#edit_user_name').val(response.data.name);
                        $('#edit_user_email').val(response.data.email);
                        $('#edit_user_contract').val(response.data.contract_number);
                        $("#image_view").attr('src', `/image/${response.data.image}` );

                        // Remove Error
                        $('#updateForm_errorList').html("");
                        $('#updateForm_errorList2').html("");
                        $('#updateForm_errorList3').html("");

                        if(response.data.name !== '' && response.data.email !== '' && response.data.contract_number !== '' && response.data.image !== ''){
                            // add input border
                            $('.update_user').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                            $('.update_email').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                            $('.update_contract').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                            $('#usrName').html('<i class="fa-solid fa-check"></i>');
                            $('#usrEmail').html('<i class="fa-solid fa-check"></i>');
                            $('#usrContract').html('<i class="fa-solid fa-check"></i>');
                            $('#usrImage').html('<i class="fa-solid fa-check"></i>');
                        }else{
                            // add input border
                            $('.update_user').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                            $('.update_email').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                            $('.update_contract').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                            $('#usrName').html("");
                            $('#usrEmail').html("");
                            $('#usrContract').html("");
                            $('#usrImage').html("");
                        }
                        
                    }

                }

            });
        });

        // Edit Users Page Loader
        $(document).on('click', '.edit_btn', function(){
            var time = null;
            $(".head_title").addClass('skeleton');
            $(".cols_btn").addClass('skeleton');
            $("#edit_user_id").addClass('skeleton');
            $(".dvsecond").addClass('skeleton');
            $("#imgInput").addClass('skeleton');
            $("#userUpdate").addClass('edit-skeleton');
            $("#editusr").addClass('capsule-skeletone');
            $("#editusr6").addClass('capsule-skeletone');
            $("#editusr7").addClass('capsule-skeletone');
            $("#editusr8").addClass('capsule-skeletone');
            $("#editusr9").addClass('edit-skeleton');
            $("#editusr10").addClass('capsule-skeletone');
            $("#uploadButton").addClass('edit-skeleton');
            time = setTimeout(() => {
                $(".head_title").removeClass('skeleton');
                $(".cols_btn").removeClass('skeleton');
                $("#edit_user_id").removeClass('skeleton');
                $(".dvsecond").removeClass('skeleton');
                $("#imgInput").removeClass('skeleton');
                $("#userUpdate").removeClass('edit-skeleton');
                $("#editusr").removeClass('capsule-skeletone');
                $("#editusr6").removeClass('capsule-skeletone');
                $("#editusr7").removeClass('capsule-skeletone');
                $("#editusr8").removeClass('capsule-skeletone');
                $("#editusr9").removeClass('edit-skeleton');
                $("#editusr10").removeClass('capsule-skeletone');
                $("#uploadButton").removeClass('edit-skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
        // Function to get role name
        function getRoleName(role) {
            switch (role) {
                case 0:
                    return 'User';
                case 1:
                    return 'SuperAdmin';
                case 2:
                    return 'SubAdmin';
                case 3:
                    return 'Admin';
                case 5:
                    return 'Accounts';
                case 6:
                    return 'Marketing';
                case 7:
                    return 'Delivery Team';
                default:
                    return 'User';
            }
        }
        // View Users-------------------------
        $(document).on('click', '.view_btn', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('#view_user_form').modal('show').fadeIn(300).delay(300);

            $.ajax({
                type: "GET",
                url: "/show-users/" + user_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#view_user_id').val(user_id);
                        $('#view_user_role').val(getRoleName(response.data.role)); 
                        $('#view_user_name').val(response.data.name);
                        $('#view_user_email').val(response.data.email);
                        // email verification result
                        if (response.data.email_verified_at === null) {
                            $('#view_user_email_verified').html('<span class="bg-danger badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;">No verified</span>');
                        } else {
                            $('#view_user_email_verified').html('<span class="bg-success badge rounded-pill" style="color:white;font-weight:800;font-size: 10px;">Verified</span>');
                        }
                        $('#view_user_contract').val(response.data.contract_number);
                        // email verification date if it exists
                        if (response.data.email_verified_at) {
                            $('#view_user_email_verified_at').text(formatDate(response.data.email_verified_at));
                        } else {
                            $('#view_user_email_verified_at').text('No Verification Date');
                        }
                        $('#view_user_created_at').text(formatDate(response.data.created_at));
                        $('#view_user_updated_at').text(formatDate(response.data.updated_at));
                        $("#image_show").attr('src', `/image/${response.data.image}`);

                        // Determine status properties
                        let statusClass, statusColor, statusText, statusBg;
                        if (response.data.status == 1) {
                            statusClass = 'text-danger';
                            statusText = '❌ Unauthorize';
                            statusColor = 'color:darkgoldenrod;font-weight:600;';
                            statusBg = 'badge rounded-pill';
                        } else if (response.data.status == 0) {
                            statusClass = 'text-cyan';
                            statusText = '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span> Authorize';
                            statusColor = 'color:black;font-weight:600;';
                            statusBg = 'badge rounded-pill';
                        }
                        $('#view_user_status')
                            .attr('class', statusClass)
                            .attr('style', statusColor)
                            .html(statusText);
                    }
                }

            });
        });
        $(document).on('click', '#viewBtn', function(e){
            e.preventDefault();
            var time = null;
            $(".head_modal").addClass('skeletone'); 
            $(".cols_btn").addClass('skeletone');
            $(".field_skeletone_one").addClass('capsule-skeletone');
            $(".field_skeletone_two").addClass('capsule-skeletone');
            $(".field_skeletone_three").addClass('capsule-skeletone');
            $(".field_skeletone_four").addClass('capsule-skeletone');
            $(".field_skeletone_five").addClass('sub-skeletone');
            $(".image_skeletone").addClass('image-skeletone');

            time = setTimeout(() => {
                $(".head_modal").removeClass('skeletone'); 
                $(".cols_btn").removeClass('skeletone');
                $(".field_skeletone_one").removeClass('capsule-skeletone');
                $(".field_skeletone_two").removeClass('capsule-skeletone');
                $(".field_skeletone_three").removeClass('capsule-skeletone');
                $(".field_skeletone_four").removeClass('capsule-skeletone');
                $(".image_skeletone").removeClass('image-skeletone');
                $(".field_skeletone_five").removeClass('sub-skeletone');
            }, 1000);
            
            return ()=>{
                clearTimeout(time);
            }
        });
        // Update Users Confirm Modal-------------------------
        $(document).on('click', '.update_btn_confrm', function(e){
            e.preventDefault();
            $('#updateconfirmuser').modal('show').fadeIn(300).delay(300);

            $("#update_btn_confirm").addClass('edit-skeleton');
            $("#cate_delete5").addClass('edit-skeleton');
            $("#cate_confirm_update").addClass('edit-skeleton');
            $(".update_title").addClass('skeleton');
            $(".head_btn3").addClass('skeleton');
            var time = null;
            time = setTimeout(() => {
                $(".update_title").removeClass('skeleton');
                $(".head_btn3").removeClass('skeleton');
                $("#update_btn_confirm").removeClass('edit-skeleton');
                $("#cate_delete5").removeClass('edit-skeleton');
                $("#cate_confirm_update").removeClass('edit-skeleton');
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        // Update Users-------------------------
        $('.update_btn').on('click', function(e) {
            e.preventDefault();
            var id = $('#edit_user_id').val();

            var formData = new FormData();
            formData.append('image', $('.edit_image')[0].files[0]);
            formData.append('name', $('.update_user').val());
            formData.append('email',  $('.update_email').val());
            formData.append('contract_number', $('.update_contract').val());

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/update-users/" + id,
                data: formData,
                processData: false, 
                contentType: false, 
                success: function(response) {
                    if (response.status == 400) {
                        $('#updateForm_errorList').html("");
                        $('#updateForm_errorList2').html("");
                        $('#updateForm_errorList3').html("");

                        $.each(response.errors, function(key, err_value) {
                            if (key === 'name') {
                                $('#updateForm_errorList').html('<span class="text-danger" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $('.update_user').removeClass('show-success-border show-current-light-blue-border').addClass('is-invalid');
                                $('#usrName').html("");
                            } else if (key === 'email') {
                                $('#updateForm_errorList2').html('<span class="text-danger" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $('.update_email').removeClass('show-success-border show-current-light-blue-border').addClass('is-invalid');
                                $('#usrEmail').html("");
                            } else if (key === 'contract_number') {
                                $('#updateForm_errorList3').html('<span class="text-danger" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $('.update_contract').removeClass('show-success-border show-current-light-blue-border').addClass('is-invalid');
                                $('#usrContract').html("");
                            }
                        });
                        
                        $('#updateconfirmuser').modal('hide').fadeOut(300).delay(300);
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').text(response.messages);
                        $('#updateconfirmuser').modal('hide');
                    } else if(response.status == 200){
                        $('#updateForm_errorList').html("");
                        $('#updateForm_errorList2').html("");
                        $('#updateForm_errorList3').html("");
                        $('#success_message').html("");
                        $('#success_message').fadeIn();
                        $('#success_message').addClass('background_error');
                        $('#success_message').text(response.messages);
                        setTimeout(() => {
                            $('#success_message').fadeOut(6000);
                            $('#success_message').delay(6000);
                        }, 3000);
                        fetch_users_setting_data();
                        $('#edit_user_form').modal('hide').fadeOut(300).delay(300);
                        $('#updateconfirmuser').modal('hide').fadeOut(300).delay(300);
                    }
                }
            });

        });
        // Delete Users Modal-------------------------
        $(document).on('click', '.delete_button', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('#user_id').val(user_id);
            $('#deletecategory').modal('show').fadeIn(300).delay(300);

            var time = null;
            $(".head_title").addClass('skeleton');
            $(".clos_btn").addClass('skeleton');
            $("#usrdelt").addClass('skeleton');
            $("#usrdelt2").addClass('skeleton');
            $("#usrdelt3").addClass('skeleton');
            $("#usrdelt5").addClass('skeleton');
            $("#yesButton").addClass('delete-skeletone');
            $("#noButton").addClass('delete-skeletone');

            time = setTimeout(() => {
                $(".head_title").removeClass('skeleton');
                $(".clos_btn").removeClass('skeleton');
                $("#usrdelt").removeClass('skeleton');
                $("#usrdelt2").removeClass('skeleton');
                $("#usrdelt3").removeClass('skeleton');
                $("#usrdelt4").removeClass('skeleton');
                $("#usrdelt5").removeClass('skeleton');
                $("#yesButton").removeClass('delete-skeletone');
                $("#noButton").removeClass('delete-skeletone');

            }, 1000);
        });
        // Confirm Delete Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $('#deleteuser').modal('show').fadeIn(300).delay(300);
            $("#supp_delt3").addClass('skeleton');
            $("#cate_confirm").addClass('skeleton');
            $(".clos_btn2").addClass('skeleton');
            $(".head_btn2").addClass('skeleton');
            $("#usrdelt4").addClass('edit-skeleton');
            $("#deleteLoader").addClass('edit-skeleton');
            var time = null;
            time = setTimeout(() => {
                $(".clos_btn2").removeClass('skeleton');
                $(".head_btn2").removeClass('skeleton');
                $("#supp_delt3").removeClass('skeleton');
                $("#cate_confirm").removeClass('skeleton');
                $("#usrdelt4").removeClass('edit-skeleton');
                $("#deleteLoader").removeClass('edit-skeleton');
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var user_id = $('#user_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-users/" + user_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletecategory').modal('hide').fadeOut(300).delay(300);
                    $('#deleteuser').modal('hide').fadeOut(300).delay(300);
                    fetch_users_setting_data();
                }

            });
        });
        // Update-Status ------------------
        $("#user_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('update_status.action')}}";

            const pagination_url = $("#user_data_table_paginate .active").attr('href');

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
                    fetch_users_setting_data('', pagination_url);
                }
            });
        });

        // User name input field handle
        $(document).on('keyup', '#edit_user_name', function(){
            var nameField = $(this).val();
            $('#updateForm_errorList').html("");
            // $('#updateForm_errorList2').html("");
            // $('#updateForm_errorList3').html("");
            if(nameField !== ''){
                $('.update_user').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                $('#usrName').html('<i class="fa-solid fa-check"></i>').fadeIn(300).delay(300);
            }else{
                $('.update_user').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                $('#usrName').html("").fadeOut(300).delay(300);
            }
            
        });
        // User email input field handle
        $(document).on('keyup', '#edit_user_email', function(){
            var emailField = $(this).val();
            $('#updateForm_errorList2').html("");
            if(emailField !== ''){
                $('.update_email').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                $('#usrEmail').html('<i class="fa-solid fa-check"></i>').fadeIn(300).delay(300);
            }else{
                $('.update_email').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                $('#usrEmail').html("").fadeOut(300).delay(300);
            }
            
        });
        // User contract input field handle
        $(document).on('keyup', '#edit_user_contract', function(){
            var contractField = $(this).val();
            $('#updateForm_errorList3').html("");
            if(contractField !== ''){
                $('.update_contract').addClass('show-success-border').removeClass('show-current-light-blue-border is-invalid');
                $('#usrContract').html('<i class="fa-solid fa-check"></i>').fadeIn(300).delay(300);
            }else{
                $('.update_contract').addClass('show-current-light-blue-border').removeClass('show-success-border is-invalid');
                $('#usrContract').html("").fadeOut(300).delay(300);
            }
            
        });

        // update avatar
        $("#image_view").on('click', function(e){
            e.preventDefault();
            //$(".edit_image").click();
            //$("#fileModal").modal('show').fadeIn(600).delay(600);
        });
        // put and upload avatar/image
        $(".edit_image").on('change', function(event){
            //$("#fileModal").modal('show').fadeIn(300).delay(300);
            if (event.target.files && event.target.files[0]) {
                const tempurl = URL.createObjectURL(event.target.files[0]);

                $("#image_view").attr('src', tempurl);
                // Reset progress bar
                $('.bar').css('width', '0%');
                $('.percent').text('0%');
                $(".register_img").addClass('img-hidden');
                // Remove alert mesg
                $("#uploadMess").html("");
            }
        });
        // Handle file upload click and progress bar display
        $(document).on('click', '#uploadButton', function () {
            var imageValue = $("#imgInput").val();
            var bar = document.querySelector('.bar');
            var percent = document.querySelector('.percent');
            var simulatedProgress = parseInt(percent.innerHTML);

            // Check if progress is already 100% and show a message
            if (simulatedProgress === 100) {
                $("#uploadMess").html('<span class="upload-mesg">Select an image to upload.</span>');
                return; // Exit to prevent further actions
            }

            if (imageValue !== '') {
                // Check if progress bar is already in progress to avoid multiple intervals
                if ($('.bar').width() !== 0 && simulatedProgress < 100) {
                    return; // Prevent starting a new progress simulation if one is already running
                }

                var simulatedProgress = 0; // Reset simulated progress to start from 0

                // Simulate progress bar
                var uploadInterval = setInterval(function () {
                    simulatedProgress += 10;

                    if (simulatedProgress <= 100) {
                        bar.style.width = simulatedProgress + '%';
                        percent.innerHTML = simulatedProgress + '%';
                    } else {
                        clearInterval(uploadInterval);
                        $(".register_img").removeClass('img-hidden');
                    }
                }, 200);

            } else {
                // Handle case when no image is selected
                $("#uploadMess").html('<span class="upload-mesg">Please select an image to upload.</span>'); // Show error message

                // Reset progress bar if no image is selected
                $('.bar').css('width', '0%');
                $('.percent').text('0%');
            }
        });
        $(document).load('click', function(){
            $("#loader_userdelete").addClass('loader_chart');
        });
    });
</script>