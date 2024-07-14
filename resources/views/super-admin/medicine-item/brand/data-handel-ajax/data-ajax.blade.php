<script>
    $(document).ready(() => {
        fetch_brand_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Brand Name Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" key="${key}" id="brand_tab">
                        <td class="sn border_ord" id="brand_tab2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="brand_tab4">
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
                        <td class="ps-1 border_ord" id="brand_tab3">${row.medicine_origins ? row.medicine_origins.origin_name : ''}</td>
                        <td class="txt_ ps-1" id="brand_tab5">${row.brand_name}</td>
                        <td class="tot_complete_ pe-2 ${row.status ? 'bg-silver' : 'bg-danger'}" id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${row.status ? 'text-primary' : 'text-danger'}">${row.status ? '✅ Active' : '❌ Deny'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="brand_tab6">
                            <input class="form-switch form-check-input check_permission" type="checkbox" brand_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Brand Data ------------------
        function fetch_brand_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-brand.action')}}?per_item=${perItem}`;
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
                    $("#brand_data_table").html(table_rows([...data]));
                    $("#brand_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_brand_records").text(total);
                    // Initialze the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return {
                            label: item.medicine_origins.origin_name + " - " + item.brand_name,
                            value: item.origin_id
                        };
                    });
                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions,
                    });
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_brand_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_brand_data(query);

        });

        // Search-loader
        $(document).on('keyup', '.searchform', function(){

            var time = null;
            $("#brand_data_table").addClass('skeleton');
            $("#brand_tab").addClass('skeleton');
            $("#brand_tab2").addClass('skeleton');
            $("#brand_tab3").addClass('skeleton');
            $("#brand_tab4").addClass('skeleton');
            $("#brand_tab5").addClass('skeleton');
            $("#brand_tab6").addClass('skeleton');
            $("#brand_tab7").addClass('skeleton');

            time = setTimeout(() => {
                $("#brand_data_table").removeClass('skeleton');
                $("#brand_tab").removeClass('skeleton');
                $("#brand_tab2").removeClass('skeleton');
                $("#brand_tab3").removeClass('skeleton');
                $("#brand_tab4").removeClass('skeleton');
                $("#brand_tab5").removeClass('skeleton');
                $("#brand_tab6").removeClass('skeleton');
                $("#brand_tab7").removeClass('skeleton');
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
        $("#brand_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_brand_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#group_name").focus();
        });

        // Add Brand
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'brand_name': $('#brand_name').val(),
                'origin_id': $('#origin_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_brand.action')}}",
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
                        $('#brand_name').val("");
                        $('#origin_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_brand_data();
                    }

                }
            });
        });

        // Edit Brand
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            var brand_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-brand/" + brand_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#brand_id').val(brand_id);
                        $('.edit_brand_name').val(response.messages.brand_name);
                        $('.edit_origin_id').val(response.messages.origin_id);
                    }
                }
            });
        });

        // Update Brand
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();
            var brand_id = $('#brand_id').val();
            var data = {
                'brand_name': $('.edit_brand_name').val(),
                'origin_id': $('#origin_id').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-brand/" + brand_id,
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
                        $('.edit_brand_name').val("");
                        $('#origin_id').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_brand_data();
                    }
                }
            });

        });

        // Delete Brand
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var brand_id = $(this).val();
            $('#delete_brand_id').val(brand_id);
            $('#deletebrand').modal('show');

            var time = null;
            $("#brnad_delt").addClass('skeleton');
            $("#brnad_delt2").addClass('skeleton');
            $("#brnad_delt3").addClass('skeleton');
            $("#brnad_delt4").addClass('skeleton');
            $("#delete_brand_id").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            time = setTimeout(() => {
                $("#brnad_delt").removeClass('skeleton');
                $("#brnad_delt2").removeClass('skeleton');
                $("#brnad_delt3").removeClass('skeleton');
                $("#brnad_delt4").removeClass('skeleton');
                $("#delete_brand_id").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var brand_id = $('#delete_brand_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-brand/" + brand_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletebrand').modal('hide');

                    fetch_brand_data();
                }

            });
        });

        // Update-Status ------------------
        $("#brand_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('brand_status.action')}}";

            const pagination_url = $("#brand_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('brand_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_brand_data('', pagination_url);
                }
            });
        });

        // Show-Origin Modal---------------
        $("#showOrigin").on('click', function(){
            $("#origin").modal('show');
        });

        $(document).load('click', function(){
            $("#active_loader").addClass('loader_chart');
        });
    });
</script>