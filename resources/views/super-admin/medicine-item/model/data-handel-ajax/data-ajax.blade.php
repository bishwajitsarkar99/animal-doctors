<script>
    $(document).ready(() => {
        fetch_model_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Model Name Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" key="${key}" id="model_tb">
                        <td class="sn border_ord" id="model_tb2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="model_tb3">
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
                        <td class="ps-1 border_ord" id="model_tb3">${row.products ? row.products.product_name : ''}</td>
                        <td class="txt_ ps-1" id="model_tb4">${row.model_name}</td>
                        <td class="tot_complete_ center ps-1 pt-1" id="model_tb5">
                            <input class="form-switch form-check-input check_permission" type="checkbox" model_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                        <td class="tot_complete_ pill pe-2 ${row.status? ' bg-primary': ' bg-danger'}" id="model_tb6"><span class="text-light ps-1 pe-1">${row.status ? 'Active': 'Inactive'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Model Data ------------------
        function fetch_model_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControls").val();
            }
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-model.action')}}?per_item=${perItem}`;
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
                    $("#model_data_table").html(table_rows([...data]));
                    $("#model_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_model_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return {
                            label: item.products.product_name + " - " + item.model_name,
                            value: item.product_id
                        };
                    });

                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions,
                        minLength: 1,
                    });
                }

            });
        }
        // peritem change
        $("#perItemControls").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_model_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_model_data(query);

        });

        // Search-loader
        $(document).on('keyup', '.searchform', function(){

            var time = null;
            $("#model_data_table").addClass('skeleton');
            $("#model_tb").addClass('skeleton');
            $("#model_tb2").addClass('skeleton');
            $("#model_tb3").addClass('skeleton');
            $("#model_tb4").addClass('skeleton');
            $("#model_tb5").addClass('skeleton');
            $("#model_tb6").addClass('skeleton');

            time = setTimeout(() => {
                $("#model_data_table").removeClass('skeleton');
                $("#model_tb").removeClass('skeleton');
                $("#model_tb2").removeClass('skeleton');
                $("#model_tb3").removeClass('skeleton');
                $("#model_tb4").removeClass('skeleton');
                $("#model_tb5").removeClass('skeleton');
                $("#model_tb6").removeClass('skeleton');
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
        $("#model_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_model_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#group_name").focus();
        });

        // Add Model
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'model_name': $('#model_name').val(),
                'product_id': $('#product_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_model.action')}}",
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
                        $('#model_name').val("");
                        $('#product_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_model_data();
                    }

                }
            });
        });

        // Edit Model
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            var model_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-model/" + model_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#model_id').val(model_id);
                        $('.edit_model_name').val(response.messages.model_name);
                        $('#product_id').val(response.messages.product_id);
                    }
                }
            });
        });

        // Update Model
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();
            var model_id = $('#model_id').val();
            var data = {
                'model_name': $('.edit_model_name').val(),
                'product_id': $('#product_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-model/" + model_id,
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
                        $('.edit_model_name').val("");
                        $('#product_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_model_data();
                    }
                }
            });

        });

        // Delete Model
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var brand_id = $(this).val();
            $('#delete_model_id').val(brand_id);
            $('#deletemodel').modal('show');

            var time = null;
            $("#model_delt").addClass('skeleton');
            $("#model_delt2").addClass('skeleton');
            $("#model_delt3").addClass('skeleton');
            $("#model_delt4").addClass('skeleton');
            $("#model_delt5").addClass('skeleton');
            $("#delete_model_id").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            time = setTimeout(() => {
                $("#model_delt").removeClass('skeleton');
                $("#model_delt2").removeClass('skeleton');
                $("#model_delt3").removeClass('skeleton');
                $("#model_delt4").removeClass('skeleton');
                $("#model_delt5").removeClass('skeleton');
                $("#delete_model_id").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton'); 
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }


        });

        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var model_id = $('#delete_model_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-model/" + model_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletemodel').modal('hide');

                    fetch_model_data();
                }

            });
        });

        // Update-Status ------------------
        $("#model_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('model_status.action')}}";

            const pagination_url = $("#model_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('model_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_model_data('', pagination_url);
                }
            });
        });

        // Show-Model Modal---------------
        $("#showModel").on('click', function(){
            $("#model").modal('show');

            var time = null;
            $("#tb_orgin").addClass('skeleton');
            $("#search_area_").addClass('skeleton');
            $("#tb_orgin2").addClass('skeleton');
            $("#med_label2").addClass('skeleton');
            $("#orgin_nam").addClass('skeleton');
            $("#origin_nam2").addClass('skeleton');
            $("#origin_nam3").addClass('skeleton');
            $("#origin_nam4").addClass('skeleton');
            $("#origin_nam5").addClass('skeleton');
            $("#prod_table").addClass('skeleton');
            $("#num_plate").addClass('skeleton');
            $("#iteam_label3").addClass('skeleton');
            $("#total_prod_records").addClass('skeleton');
            $("#iteam_label6").addClass('skeleton');

            time = setTimeout(() => {
                $("#tb_orgin").removeClass('skeleton');
                $("#search_area_").removeClass('skeleton');
                $("#tb_orgin2").removeClass('skeleton');
                $("#med_label2").removeClass('skeleton');
                $("#orgin_nam").removeClass('skeleton');
                $("#origin_nam2").removeClass('skeleton');
                $("#origin_nam3").removeClass('skeleton');
                $("#origin_nam4").removeClass('skeleton');
                $("#origin_nam5").removeClass('skeleton');
                $("#prod_table").removeClass('skeleton');
                $("#num_plate").removeClass('skeleton');
                $("#iteam_label3").removeClass('skeleton');
                $("#total_prod_records").removeClass('skeleton');
                $("#iteam_label6").removeClass('skeleton');
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