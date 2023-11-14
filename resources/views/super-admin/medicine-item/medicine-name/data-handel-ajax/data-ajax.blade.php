<script>
    $(document).ready(() => {
        fetch_medicineName_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Medicine Name Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" id="medic_name" key="${key}">
                        <td class="sn border_ord" id="medic_name2">${row.id}</td>
                        <td class="sn border_ord" id="medic_name3">${row.group_id}</td>
                        <td class="txt_ ps-1 center" id="medic_name4">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button">
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button">
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="txt_ ps-1" id="medic_name5">${row.medicine_name}</td>
                        <td class="tot_complete_ center ps-1 pt-1" id="medic_name6">
                            <input class="form-switch form-check-input check_permission" type="checkbox" medicine_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                        <td class="tot_complete_ pill pe-2 ${row.status? ' bg-primary': ' bg-danger'}"><span class="text-light ps-1 pe-1" id="medic_name7">${row.status ? 'Active': 'Inactive'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Medicine Name Data ------------------
        function fetch_medicineName_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-medicinename.action')}}?per_item=${perItem}`;
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
                    $("#medicine_data_table").html(table_rows([...data]));
                    $("#medicine_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_medicine_records").text(total);
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_medicineName_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_medicineName_data(query);

        });

        $(document).on('keyup', '.search', function(){
            $("#medicine_data_table").addClass('skeleton');
            $("#medic_name").addClass('skeleton');
            $("#medic_name2").addClass('skeleton');
            $("#medic_name3").addClass('skeleton');
            $("#medic_name4").addClass('skeleton');
            $("#medic_name5").addClass('skeleton');
            $("#medic_name6").addClass('skeleton');
            $("#medic_name7").addClass('skeleton');

            var time = null;

            time = setTimeout(() => {
                $("#medicine_data_table").removeClass('skeleton');
                $("#medic_name").removeClass('skeleton');
                $("#medic_name2").removeClass('skeleton');
                $("#medic_name3").removeClass('skeleton');
                $("#medic_name4").removeClass('skeleton');
                $("#medic_name5").removeClass('skeleton');
                $("#medic_name6").removeClass('skeleton');
                $("#medic_name7").removeClass('skeleton');
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
        $("#medicine_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_medicineName_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#group_name").focus();
        });

        // Add Medicine Name
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'medicine_name': $('#medicine_name').val(),
                'group_id': $('#group_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_medicinename.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').addClass('alert_show_errors');
                            $('#savForm_error').append('<span class="error_val">' + err_value + '</span>');
                            $('#savForm_error').fadeIn();
                            setTimeout(() => {
                                $('#savForm_error').fadeOut();
                            }, 2500);
                        });
                    } else {
                        $('#savForm_error').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('#medicine_name').val("");
                        $('#group_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_medicineName_data();
                    }

                }
            });
        });

        // Edit Medicine Name
        $(document).on('click', '.edit_button', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            var medicine_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-medicine-name/" + medicine_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#medicine_id').val(medicine_id);
                        $('.edit_medicine_name').val(response.messages.medicine_name);
                        $('.edit_group_id').val(response.messages.group_id);
                    }
                }
            });
        });

        // Update Medicine Name
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();
            var medicine_id = $('#medicine_id').val();
            var data = {
                'medicine_name': $('.edit_medicine_name').val(),
                'group_id': $('#group_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-medicine-name/" + medicine_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-1');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('.edit_medicine_name').val("");
                        $('.edit_group_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_medicineName_data();
                    }
                }
            });

        });

        // Delete Medicine Name
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var medicine_id = $(this).val();
            $('#delete_medicine_id').val(medicine_id);
            $('#deletemedicine').modal('show');
            $("#medi_delt").addClass('skeleton');
            $("#medi_delt2").addClass('skeleton');
            $("#medi_delt3").addClass('skeleton');
            $("#medi_delt4").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');
            $("#delete_medicine_id").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $("#medi_delt").removeClass('skeleton');
                $("#medi_delt2").removeClass('skeleton');
                $("#medi_delt3").removeClass('skeleton');
                $("#medi_delt4").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
                $("#delete_medicine_id").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var medicine_id = $('#delete_medicine_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-medicine-name/" + medicine_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletemedicine').modal('hide');

                    fetch_medicineName_data();
                }

            });
        });

        // Update-Status ------------------
        $("#medicine_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('medicinename_status.action')}}";

            const pagination_url = $("#medicine_data_table_paginate .active").attr('href');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: current_url,
                dataType: 'json',
                data: {
                    id: $(this).attr('medicine_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_medicineName_data('', pagination_url);
                }
            });
        });

        // Show-Group Modal---------------
        $("#showGroup").on('click', function(){
            $("#group").modal('show');
            $("#tb_group").addClass('skeleton');
            $("#search_area_").addClass('skeleton');
            $("#tb_group2").addClass('skeleton');
            $("#med_label2").addClass('skeleton');
            $("#group_nam2").addClass('skeleton');
            $("#group_nam3").addClass('skeleton');
            $("#group_nam4").addClass('skeleton');
            $("#group_nam5").addClass('skeleton');
            $("#group_table").addClass('skeleton');
            $("#iteam_label").addClass('skeleton');
            $("#iteam_label3").addClass('skeleton');
            $("#iteam_label4").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $("#tb_group").removeClass('skeleton');
                $("#search_area_").removeClass('skeleton');
                $("#tb_group2").removeClass('skeleton');
                $("#med_label2").removeClass('skeleton');
                $("#group_nam2").removeClass('skeleton');
                $("#group_nam3").removeClass('skeleton');
                $("#group_nam4").removeClass('skeleton');
                $("#group_nam5").removeClass('skeleton');
                $("#group_table").removeClass('skeleton');
                $("#iteam_label").removeClass('skeleton');
                $("#iteam_label3").removeClass('skeleton');
                $("#iteam_label4").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).load('click', function(){
            $("#active_loader").addClass('loader_chart');
        });
    });
</script>