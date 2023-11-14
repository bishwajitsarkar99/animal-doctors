<script type="text/javascript">
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
        // switch on/off----- users table search
        $("#search").hide();
        $(document).on('click', '#search_area', function() {
            $("#search_on").toggle('slow');
            $("#search").toggle('slid');
            $("#search").focus();
        });
        // Table header Action Mode
        $(document).on('click', '#action_mode', function() {

            if ($("#action_mode:checked").length > 0) {
                $(".check_permission").removeAttr('disabled');
                $(".dropdown-toggle-split").removeAttr('disabled');

            } else {
                $(".check_permission").attr('disabled', true);
                $(".dropdown-toggle-split").attr('disabled', true);
            }

            $('#locker').toggle().removeClass('checking_lock');
            $(this).attr('disabled', true);

            setTimeout(() => {
                $('#locker').toggle().addClass('checking_lock');
                $(this).attr('disabled', false);
            }, 1000);
        });

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
                return `
                    <tr class="table-row user-table-row user_setting" key="${key}" id="user_set">
                        <td class="sn border_ord" id="user_set2">${row.id}</td>
                        <td class="tot_order_ center ps-1" id="user_set3">
                            <img class="user_img rounded-circle user_imgs" src="${row.image.includes('https://')?row.image: '/image/'+ row.image}">
                        </td>
                        <td class="txt_ ps-1 center" id="user_set4">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown" disabled>
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration view_btn cgr_btn viewurs ms-4" id="viewBtn" value="${row.id}" style="font-size: 10px;" type="button">
                                    <i class="fa-regular fa-eye fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button">
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm delete_button ms-2 delt_button" value="${row.id}'" type="button" id="dltBtn" style="font-size: 10px;">
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="txt_ ps-1" id="user_set5">${row.name}</td>
                        <td class="tot_order_ ps-1" id="user_set6">${row.email}</td>
                        <td class="tot_pending_ ps-1" id="user_set7">${row.contract_number}</td>
                        <td class="tot_pending_ bold ps-1 ${row.role? ' text-primary': ' text-secondary'}" id="user_set8">${row.role ==0 ? 'User': 'Superadmin' && row.role ==2 ? 'SubAdmin': 'User' && row.role ==1 ? 'SuperAdmin': 'User' && row.role ==3 ? 'Admin': 'User'}</td>
                        <td class="tot_complete_ center ps-1" id="user_set9">
                            <input class="form-switch form-check-input check_permission" type="checkbox" user_id="${row.id}" value="${row.status}" ${row.status? " checked": ''} disabled>
                        </td>
                        <td class="tot_complete_ pill ps-1 ${row.status? ' bg-danger': ' bg-primary'}"><span class="user_setting_bg ps-1 pe-1" id="user_set10">${row.status ? 'Lock': 'Unlock'}</span>
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
            $('#edit_user_form').modal('show');


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
                        
                    }

                }

            });
        });

        // Edit Users Page Loader
        $(document).on('click', '.edit_btn', function(){

            var time = null;
            $("#edit_user_id").addClass('skeleton');
            $(".dvsecond").addClass('skeleton');
            $("#imgInput").addClass('skeleton');
            $("#userUpdate").addClass('skeleton');
            $("#editusr").addClass('skeleton');
            $("#editusr2").addClass('skeleton');
            $("#editusr3").addClass('skeleton');
            $("#editusr4").addClass('skeleton');
            $("#editusr5").addClass('skeleton');
            $("#editusr6").addClass('skeleton');
            $("#editusr7").addClass('skeleton');
            $("#editusr8").addClass('skeleton');
            $("#editusr9").addClass('skeleton');
            time = setTimeout(() => {
                $("#edit_user_id").removeClass('skeleton');
                $(".dvsecond").removeClass('skeleton');
                $("#imgInput").removeClass('skeleton');
                $("#userUpdate").removeClass('skeleton');
                $("#editusr").removeClass('skeleton');
                $("#editusr2").removeClass('skeleton');
                $("#editusr3").removeClass('skeleton');
                $("#editusr4").removeClass('skeleton');
                $("#editusr5").removeClass('skeleton');
                $("#editusr6").removeClass('skeleton');
                $("#editusr7").removeClass('skeleton');
                $("#editusr8").removeClass('skeleton');
                $("#editusr9").removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
        // View Users-------------------------
        $(document).on('click', '.view_btn', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('#view_user_form').modal('show');

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
                        $('#view_user_name').val(response.data.name);
                        $('#view_user_email').val(response.data.email);
                        $('#view_user_contract').val(response.data.contract_number);
                        $("#image_show").attr('src', `/image/${response.data.image}`);
                    }
                }

            });
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
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').text(response.messages);
                    } else if(response.status == 200){

                        console.log(response);
                        $('#updateForm_errorList').html("");
                        $('#success_message').html("");
                        $('#edit_user_form').modal('hide');
                        $('#success_message').fadeIn();
                        $('#success_message').addClass('account_Update_message');
                        $('#success_message').text(response.messages);
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        if(fetch_users_setting_data()){

                        }
                    }
                }
            });

        });
        // Delete Users-------------------------
        $(document).on('click', '.delete_button', function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('#user_id').val(user_id);
            $('#deletecategory').modal('show');

            var time = null;
            $("#usrdelt").addClass('skeleton');
            $("#usrdelt2").addClass('skeleton');
            $("#usrdelt3").addClass('skeleton');
            $("#usrdelt4").addClass('skeleton');
            $("#usrdelt5").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            time = setTimeout(() => {
                $("#usrdelt").removeClass('skeleton');
                $("#usrdelt2").removeClass('skeleton');
                $("#usrdelt3").removeClass('skeleton');
                $("#usrdelt4").removeClass('skeleton');
                $("#usrdelt4").removeClass('skeleton');
                $("#usrdelt5").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');

            }, 1000);
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
                    $('#deletecategory').modal('hide');

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

        // update avatar
        $("#image_view").on('click', function(e){
            e.preventDefault();
            $(".edit_image").click();
        });
        // put and upload avatar/image
        $(".edit_image").on('change', function(event){
            if (event.target.files && event.target.files[0]) {
                const tempurl = URL.createObjectURL(event.target.files[0]);

                $("#image_view").attr('src', tempurl);
            }
        });


        $(document).load('click', function(){
            $("#loader_userdelete").addClass('loader_chart');
        });

        
    });
</script>