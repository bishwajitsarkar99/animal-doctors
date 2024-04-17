<script>
    $(document).ready(() => {
        fetch_subcategory_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Sub Category Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" id="sub_td" key="${key}">
                        <td class="sn border_ord" id="sub_td2">${row.id}</td>
                        <td class="sn border_ord" id="sub_td3">${row.category_id}</td>
                        <td class="txt_ ps-1 center" id="sub_td4">
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
                        <td class="txt_ ps-1" id="sub_td5">${row.sub_category_name}</td>
                        <td class="tot_complete_ center ps-1 pt-1" id="sub_td6">
                            <input class="form-switch form-check-input check_permission" type="checkbox" subcategory_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                        <td class="tot_complete_ pill pe-2 ${row.status? ' bg-primary': ' bg-danger'}" id="sub_td7"><span class="text-light ps-1 pe-1">${row.status ? 'Active': 'Inactive'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Sub Category ------------------
        function fetch_subcategory_data(query = '', url = null, perItem = null) {
            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-subcategory.action')}}?per_item=${perItem}`;
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
                    $("#subcategory_data_table").html(table_rows([...data]));
                    $("#subcategory_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_subcategory_records").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_subcategory_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_subcategory_data(query);

        });

        // search-loader
        $(document).on('keyup', '.searchform', function(){
            var time = null;

            $("#subcategory_data_table").addClass('skeleton');
            $("#sub_td").addClass('skeleton');
            $("#sub_td2").addClass('skeleton');
            $("#sub_td3").addClass('skeleton');
            $("#sub_td4").addClass('skeleton');
            $("#sub_td5").addClass('skeleton');
            $("#sub_td6").addClass('skeleton');
            $("#sub_td7").addClass('skeleton');

            time = setTimeout(() => {
                $("#subcategory_data_table").removeClass('skeleton');
                $("#sub_td").removeClass('skeleton');
                $("#sub_td2").removeClass('skeleton');
                $("#sub_td3").removeClass('skeleton');
                $("#sub_td4").removeClass('skeleton');
                $("#sub_td5").removeClass('skeleton');
                $("#sub_td6").removeClass('skeleton');
                $("#sub_td7").removeClass('skeleton');
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
        $("#subcategory_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_subcategory_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#category_name").focus();
        });

        // Add Sub Category
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'sub_category_name': $('#sub_category_name').val(),
                'category_id': $('#category_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_subcategory.action')}}",
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
                        $('#sub_category_name').val("");
                        $('#category_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_subcategory_data();
                    }

                }
            });
        });

        // Edit Sub Category
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            var sub_category_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-sub-category/" + sub_category_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#sub_category_id').val(sub_category_id);
                        $('.edit_sub_category_name').val(response.messages.sub_category_name);
                        $('#category_id').val(response.messages.category_id);
                    }
                }
            });
        });

        // Update Sub Category
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();
            var sub_category_id = $('#sub_category_id').val();
            var data = {
                'sub_category_name': $('.edit_sub_category_name').val(),
                'category_id': $('.edit_category_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-sub-category/" + sub_category_id,
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
                        $('.edit_sub_category_name').val("");
                        $('#category_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_subcategory_data();
                    }
                }
            });

        });

        // Delete Sub Category
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var sub_category_id = $(this).val();
            $('#delete_sub_category_id').val(sub_category_id);
            $('#deletesubcategory').modal('show');
            $("#delt_content").addClass('skeleton');
            $("#sub_id").addClass('skeleton');
            $("#sub_id2").addClass('skeleton');
            $("#sub_id3").addClass('skeleton');
            $("#sub_id4").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $("#delt_content").removeClass('skeleton');
                $("#sub_id").removeClass('skeleton');
                $("#sub_id2").removeClass('skeleton');
                $("#sub_id3").removeClass('skeleton');
                $("#sub_id4").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var sub_category_id = $('#delete_sub_category_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-sub-category/" + sub_category_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletesubcategory').modal('hide');

                    fetch_subcategory_data();
                }

            });
        });

        // Update-Status ------------------
        $("#subcategory_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('subcategory_status.action')}}";

            const pagination_url = $("#subcategory_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('subcategory_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_subcategory_data('', pagination_url);
                }
            });
        });

        // Show Category Data----------
        $("#showCategory").on('click', function(){
            $("#category").modal('show');
            $("#cat_table").addClass('skeleton');
            $("#medic_nam").addClass('skeleton');
            $("#iteam_label").addClass('skeleton');
            $("#tb_group").addClass('skeleton');
            $("#search_area_").addClass('skeleton');
            $("#tb_group2").addClass('skeleton');
            $("#search_off_").addClass('skeleton');
            $("#group_nam2").addClass('skeleton');
            $("#group_nam3").addClass('skeleton');
            $("#group_nam4").addClass('skeleton');
            $("#group_nam5").addClass('skeleton');
            $("#per_item").addClass('skeleton');
            $("#num_plate").addClass('skeleton');
            $("#iteam_label3").addClass('skeleton');
            $("#total_cat_records").addClass('skeleton');
            $("#iteam_label6").addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $("#cat_table").removeClass('skeleton');
                $("#medic_nam").removeClass('skeleton');
                $("#iteam_label").removeClass('skeleton');
                $("#tb_group").removeClass('skeleton');
                $("#search_area_").removeClass('skeleton');
                $("#tb_group2").removeClass('skeleton');
                $("#search_off_").removeClass('skeleton');
                $("#group_nam2").removeClass('skeleton');
                $("#group_nam3").removeClass('skeleton');
                $("#group_nam4").removeClass('skeleton');
                $("#group_nam5").removeClass('skeleton');
                $("#per_item").removeClass('skeleton');
                $("#num_plate").removeClass('skeleton');
                $("#iteam_label3").removeClass('skeleton');
                $("#total_cat_records").removeClass('skeleton');
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