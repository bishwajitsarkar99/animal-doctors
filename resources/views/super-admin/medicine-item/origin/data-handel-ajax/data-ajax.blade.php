<script>
    $(document).ready(() => {
        fetch_origin_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Origin Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" id="origin_tab" key="${key}">
                        <td class="sn border_ord" id="origin_tab2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="origin_tab3">
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
                        <td class="txt_ ps-1" id="origin_tab4">${row.origin_name}</td>
                        <td class="tot_complete_ center ps-1 pt-1" id="origin_tab5">
                            <input class="form-switch form-check-input check_permission" type="checkbox" origin_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                        <td class="tot_complete_ pill pe-2 ${row.status? ' bg-primary': ' bg-danger'}" id="origin_tab6"><span class="text-light ps-1 pe-1">${row.status ? 'Active': 'Inactive'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Origin Data ------------------
        function fetch_origin_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-origin.action')}}?per_item=${perItem}`;
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
                    $("#origin_data_table").html(table_rows([...data]));
                    $("#origin_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_origin_records").text(total);
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_origin_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_origin_data(query);

        });

        // Search-loader
        $(document).on('keyup', '.searchform', function(){

            var time = null;
            $("#origin_data_table").addClass('skeleton');
            $("#origin_tab").addClass('skeleton');
            $("#origin_tab2").addClass('skeleton');
            $("#origin_tab3").addClass('skeleton');
            $("#origin_tab4").addClass('skeleton');
            $("#origin_tab5").addClass('skeleton');
            $("#origin_tab6").addClass('skeleton');

            time = setTimeout(() => {
                $("#origin_data_table").removeClass('skeleton');
                $("#origin_tab").removeClass('skeleton');
                $("#origin_tab2").removeClass('skeleton');
                $("#origin_tab3").removeClass('skeleton');
                $("#origin_tab4").removeClass('skeleton');
                $("#origin_tab5").removeClass('skeleton');
                $("#origin_tab6").removeClass('skeleton'); 
            }, 1000);

            return () =>{
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
        $("#origin_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_origin_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#category_name").focus();
        });

        // Add Origin
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'origin_name': $('#origin_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_origin.action')}}",
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
                        $('#origin_name').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_origin_data();
                    }

                }
            });
        });

        // Edit Origin
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            var origin_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-origin/" + origin_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#origin_id').val(origin_id);
                        $('.edit_origin_name').val(response.messages.origin_name);
                    }
                }
            });
        });

        // Update Origin
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();
            var origin_id = $('#origin_id').val();
            var data = {
                'origin_name': $('.edit_origin_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-origin/" + origin_id,
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
                        $('.edit_origin_name').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_origin_data();
                    }
                }
            });

        });

        // Delete Origin
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var origin_id = $(this).val();
            $('#delete_origin_id').val(origin_id);
            $('#deleteorigin').modal('show');

            var time = null;
            $("#origin_delt").addClass('skeleton');
            $("#origin_delt2").addClass('skeleton');
            $("#origin_delt3").addClass('skeleton');
            $("#origin_delt4").addClass('skeleton');
            $("#delete_origin_id").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            time = setTimeout(() => {
                $("#origin_delt").removeClass('skeleton');
                $("#origin_delt2").removeClass('skeleton');
                $("#origin_delt3").removeClass('skeleton');
                $("#origin_delt4").removeClass('skeleton');
                $("#delete_origin_id").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var origin_id = $('#delete_origin_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-origin/" + origin_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deleteorigin').modal('hide');

                    fetch_origin_data();
                }

            });
        });

        // Update-Status ------------------
        $("#origin_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('origin_status.action')}}";

            const pagination_url = $("#origin_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('origin_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_origin_data('', pagination_url);
                }
            });
        });

        $(document).load('click', function(){
            $("#active_loader").addClass('loader_chart');
        });
    });
</script>