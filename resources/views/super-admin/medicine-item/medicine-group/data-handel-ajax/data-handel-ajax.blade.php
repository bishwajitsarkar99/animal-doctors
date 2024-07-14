<script>
    $(document).ready(() => {
        fetch_group_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Medicine Group Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" id="group_td" key="${key}">
                        <td class="sn border_ord" id="group_td2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="group_td3">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="txt_ ps-1" id="group_td4">${row.group_name}</td>
                        <td class="tot_complete_ pe-2 ${row.status ? 'bg-silver' : 'bg-danger'}" id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${row.status ? 'text-primary' : 'text-danger'}">${row.status ? '✅ Active' : '❌ Deny'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="group_td5">
                            <input class="form-switch form-check-input check_permission" type="checkbox" group_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Medicine Group Data ------------------
        function fetch_group_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-medicinegroup.action')}}?per_item=${perItem}`;
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
                    $("#group_data_table").html(table_rows([...data]));
                    $("#group_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_group_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return item.group_name;
                    });
                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions
                    });
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_group_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_group_data(query);

        });

        // Live-search loader
        $(document).on('keyup', '.searchform', function(){
            var time = null;

            $("#group_data_table").addClass('skeleton');
            $("#group_td").addClass('skeleton');
            $("#group_td2").addClass('skeleton');
            $("#group_td3").addClass('skeleton');
            $("#group_td4").addClass('skeleton');
            $("#group_td5").addClass('skeleton');
            $("#group_td6").addClass('skeleton');

            time = setTimeout(() => {
                $("#group_data_table").removeClass('skeleton');
                $("#group_td").removeClass('skeleton');
                $("#group_td2").removeClass('skeleton');
                $("#group_td3").removeClass('skeleton');
                $("#group_td4").removeClass('skeleton');
                $("#group_td5").removeClass('skeleton');
                $("#group_td6").removeClass('skeleton');
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
        $("#group_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_group_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#group_name").focus();
        });

        // Add Medicine Group
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'group_name': $('#group_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_medicinegroup.action')}}",
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
                        $('#group_name').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_group_data();
                    }

                }
            });
        });

        // Edit Medicine Group
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            var group_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-medicine-group/" + group_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#group_id').val(group_id);
                        $('.edit_group_name').val(response.messages.group_name);
                    }
                }
            });
        });

        // Update Medicine Group
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();
            var group_id = $('#group_id').val();
            var data = {
                'group_name': $('.edit_group_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-medicine-group/" + group_id,
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
                        $('.edit_group_name').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_group_data();
                    }
                }
            });

        });

        // Delete Medicine Group
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var group_id = $(this).val();
            $('#delete_group_id').val(group_id);
            $('#deletegroup').modal('show');
            $('#group_delete_modal').addClass('skeleton');
            $('#delete_group').addClass('skeleton');
            $('#delete_group2').addClass('skeleton');
            $('#delete_group3').addClass('skeleton');
            $('#delete_group4').addClass('skeleton');
            $('#deleteLoader').addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $('#group_delete_modal').removeClass('skeleton');
                $('#delete_group').removeClass('skeleton');
                $('#delete_group2').removeClass('skeleton');
                $('#delete_group3').removeClass('skeleton');
                $('#delete_group4').removeClass('skeleton');
                $('#deleteLoader').removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var group_id = $('#delete_group_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-medicine-group/" + group_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletegroup').modal('hide');

                    fetch_group_data();
                }

            });
        });

        // Update-Status ------------------
        $("#group_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('medicinegroup_status.action')}}";

            const pagination_url = $("#group_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('group_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_group_data('', pagination_url);
                }
            });
        });

        $(document).load('click', function(){
            $("#active_loader").addClass('loader_chart');
        });
        
    });
</script>