<script>
    $(document).ready(() => {
        // Table header Action Mode
        $(document).on('click', '#switch_on', function() {

            if ($("#switch_on:checked").length > 0) {
                $("#deleteBtn").removeAttr(' disabled');
                $("#edtBtn").removeAttr('disabled');

            } else {
                $("#deleteBtn").attr('disabled', true);
                $("#edtBtn").attr('disabled', true);
            }
        });
        fetch_medicineDogs_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Medicine Dosage Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" id="medic_dosage" key="${key}">
                        <td class="sn border_ord" id="medic_dosage2">${row.id}</td>
                        <td class="sn border_ord" id="medic_dosage3">${row.medicine_id}</td>
                        <td class="txt_ ps-1 center" id="medic_dosage4">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-4" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button">
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button">
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="txt_ ps-1" id="medic_dosage5">${row.medicine_dogs}</td>
                        <td class="tot_complete_ center ps-1 pt-1" id="medic_dosage6">
                            <input class="form-switch form-check-input check_permission" type="checkbox" medicinedogs_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                        <td class="tot_complete_ pill pe-2 ${row.status? ' bg-primary': ' bg-danger'}" id="medic_dosage7"><span class="text-light ps-1 pe-1">${row.status ? 'Active': 'Inactive'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Medicine Dogs Data ------------------
        function fetch_medicineDogs_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-medicinedogs.action')}}?per_item=${perItem}`;
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
                    $("#medicine_dogs_data_table").html(table_rows([...data]));
                    $("#medicine_dogs_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_medicinedogs_records").text(total);
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_medicineDogs_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_medicineDogs_data(query);

        });

        $(document).on('keyup', '.search', function(){
            $("#medicine_dogs_data_table").addClass('skeleton');
            $("#medic_dosage").addClass('skeleton');
            $("#medic_dosage2").addClass('skeleton');
            $("#medic_dosage3").addClass('skeleton');
            $("#medic_dosage4").addClass('skeleton');
            $("#medic_dosage5").addClass('skeleton');
            $("#medic_dosage6").addClass('skeleton');
            $("#medic_dosage7").addClass('skeleton');

            var time = null;

            time = setTimeout(() => {
                $("#medicine_dogs_data_table").removeClass('skeleton');
                $("#medic_dosage").removeClass('skeleton');
                $("#medic_dosage2").removeClass('skeleton');
                $("#medic_dosage3").removeClass('skeleton');
                $("#medic_dosage4").removeClass('skeleton');
                $("#medic_dosage5").removeClass('skeleton');
                $("#medic_dosage6").removeClass('skeleton');
                $("#medic_dosage7").removeClass('skeleton');
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
        $("#medicine_dogs_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_medicineDogs_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#group_name").focus();
        });

        // Add Medicine Dogs
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'medicine_dogs': $('#medicine_dogs').val(),
                'medicine_id': $('#medicine_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_medicinedogs.action')}}",
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
                        $('#medicine_dogs').val("");
                        $('#medicine_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_medicineDogs_data();
                    }

                }
            });
        });

        // Edit Medicine Dogs
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            var medicinedogs_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-medicine-dosage/" + medicinedogs_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#medicinedogs_id').val(medicinedogs_id);
                        $('.edit_medicine_dogs').val(response.messages.medicine_dogs);
                        $('.edit_medicine_id').val(response.messages.medicine_id);
                    }
                }
            });
        });

        // Update Medicine Dogs
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();
            var medicinedogs_id = $('#medicinedogs_id').val();
            var data = {
                'medicine_dogs': $('.edit_medicine_dogs').val(),
                'medicine_id': $('.edit_medicine_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-medicine-dosage/" + medicinedogs_id,
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
                        $('.edit_medicine_dogs').val("");
                        $('.edit_medicine_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_medicineDogs_data();
                    }
                }
            });

        });

        // Delete Medicine Dogs
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var medicine_id = $(this).val();
            $('#delete_medicine_dogs_id').val(medicine_id);
            $('#deletemedicinedogs').modal('show');
            $("#dosage").addClass('skeleton');
            $("#dosage2").addClass('skeleton');
            $("#dosage3").addClass('skeleton');
            $("#dosage4").addClass('skeleton');
            $("#delete_medicine_dogs_id").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $("#dosage").removeClass('skeleton');
                $("#dosage2").removeClass('skeleton');
                $("#dosage3").removeClass('skeleton');
                $("#dosage4").removeClass('skeleton');
                $("#delete_medicine_dogs_id").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });

        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var medicinedogs_id = $('#delete_medicine_dogs_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-medicine-dosage/" + medicinedogs_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletemedicinedogs').modal('hide');

                    fetch_medicineDogs_data();
                }

            });
        });

        // Update-Status ------------------
        $("#medicine_dogs_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('medicinedogs_status.action')}}";

            const pagination_url = $("#medicine_dogs_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('medicinedogs_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_medicineDogs_data('', pagination_url);
                }
            });
        });

        // Show-Medicine Modal---------------
        $("#showMedicine").on('click', function() {
            $("#MedicineName").modal('show');
            $("#medic_nam").addClass('skeleton');
            $("#medic_nam2").addClass('skeleton');
            $("#medic_nam3").addClass('skeleton');
            $("#medic_nam4").addClass('skeleton');
            $("#medic_nam5").addClass('skeleton');
            $("#medic_nam6").addClass('skeleton');
            $("#medic_nam7").addClass('skeleton');
            $("#medic_nam8").addClass('skeleton');
            $("#medic_nam9").addClass('skeleton');
            $("#search_area_").addClass('skeleton');
            $("#med_label").addClass('skeleton');
            $("#med_label2").addClass('skeleton');
            $("#search_on_").addClass('skeleton');
            $("#iteam_label").addClass('skeleton');
            $("#iteam_label2").addClass('skeleton');
            $("#iteam_label3").addClass('skeleton');
            $("#iteam_label4").addClass('skeleton');
            $("#iteam_label5").addClass('skeleton');
            $("#total_medic_records").addClass('skeleton');
            $("#med").addClass('skeleton');
            $(".tot_summ").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $("#medic_nam").removeClass('skeleton');
                $("#medic_nam2").removeClass('skeleton');
                $("#medic_nam3").removeClass('skeleton');
                $("#medic_nam4").removeClass('skeleton');
                $("#medic_nam5").removeClass('skeleton');
                $("#medic_nam6").removeClass('skeleton');
                $("#medic_nam7").removeClass('skeleton');
                $("#medic_nam8").removeClass('skeleton');
                $("#medic_nam9").removeClass('skeleton');
                $("#search_area_").removeClass('skeleton');
                $("#med_label").removeClass('skeleton');
                $("#med_label2").removeClass('skeleton');
                $("#search_on_").removeClass('skeleton');
                $("#iteam_label").removeClass('skeleton');
                $("#iteam_label2").removeClass('skeleton');
                $("#iteam_label3").removeClass('skeleton');
                $("#iteam_label4").removeClass('skeleton');
                $("#iteam_label5").removeClass('skeleton');
                $("#total_medic_records").removeClass('skeleton');
                $("#med").removeClass('skeleton');
                $(".tot_summ").removeClass('skeleton');
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