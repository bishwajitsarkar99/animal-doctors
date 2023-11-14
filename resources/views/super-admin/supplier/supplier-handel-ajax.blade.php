<script>
    $(document).ready(() => {
        fetch_supplier_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Conatat Information Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" key="${key}" id="supp_tab">
                        <td class="sn border_ord" id="supp_tab2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="supp_tab3">
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
                        <td class="border_ord ps-1" id="supp_tab4">${row.supplier_id}</td>
                        <td class="txt_ ps-1" id="supp_tab5">${row.type}</td>
                        <td class="txt_ ps-1" id="supp_tab6">${row.bussiness_type}</td>
                        <td class="txt_ ps-1" id="supp_tab7">${row.name}</td>
                        <td class="txt_ ps-1" id="supp_tab8" hidden>${row.office_address}</td>
                        <td class="txt_ ps-1" id="supp_tab9" hidden>${row.current_address}</td>
                        <td class="txt_ ps-1" id="supp_tab10">${row.contact_number_one}</td>
                        <td class="txt_ ps-1" id="supp_tab11">${row.contact_number_two}</td>
                        <td class="txt_ ps-1" id="supp_tab12">${row.whatsapp_number}</td>
                        <td class="txt_ ps-1" id="supp_tab13">${row.email}</td>
                        <td class="tot_complete_ ps-1 pt-1 center" id="supp_tab14">
                            <input id="actOne" class="form-switch form-check-input supplier_check_permission me-2" type="checkbox" status_id="${row.id}" value="${row.supplier_status}" ${row.supplier_status? " checked": ''}>
                        </td>
                        <td class="tot_complete_ pill ${row.supplier_status? ' bg-primary': ' bg-danger'}" id="supp_tab15"><span class="text-light ps-1">${row.supplier_status ? 'Active': 'Inactive'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Supplier Contact Data ------------------
        function fetch_supplier_data(query = '', url = null, perItem = null) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }
            
            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-supplier.action')}}?per_item=${perItem}`;
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
                    $("#supplier_data_table").html(table_rows([...data]));
                    $("#supplier_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_supplier_records").text(total);
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_supplier_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_supplier_data(query);

        });

        // Search- loader
        $(document).on('keyup', '.searchform', function(){

            var time =null;

            $("#supplier_data_table").addClass('skeleton');
            $("#supp_tab2").addClass('skeleton');
            $("#supp_tab3").addClass('skeleton');
            $("#supp_tab4").addClass('skeleton');
            $("#supp_tab5").addClass('skeleton');
            $("#supp_tab6").addClass('skeleton');
            $("#supp_tab7").addClass('skeleton');
            $("#supp_tab8").addClass('skeleton');
            $("#supp_tab9").addClass('skeleton');
            $("#supp_tab10").addClass('skeleton');
            $("#supp_tab11").addClass('skeleton');
            $("#supp_tab12").addClass('skeleton');
            $("#supp_tab13").addClass('skeleton');
            $("#supp_tab14").addClass('skeleton');
            $("#supp_tab15").addClass('skeleton');

            time = setTimeout(() => {
                $("#supplier_data_table").removeClass('skeleton');
                $("#supp_tab2").removeClass('skeleton');
                $("#supp_tab3").removeClass('skeleton');
                $("#supp_tab4").removeClass('skeleton');
                $("#supp_tab5").removeClass('skeleton');
                $("#supp_tab6").removeClass('skeleton');
                $("#supp_tab7").removeClass('skeleton');
                $("#supp_tab8").removeClass('skeleton');
                $("#supp_tab9").removeClass('skeleton');
                $("#supp_tab10").removeClass('skeleton');
                $("#supp_tab11").removeClass('skeleton');
                $("#supp_tab12").removeClass('skeleton');
                $("#supp_tab13").removeClass('skeleton');
                $("#supp_tab14").removeClass('skeleton');
                $("#supp_tab15").removeClass('skeleton');
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
        $("#supplier_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_supplier_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#group_name").focus();
        });

        // Add Supplier
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'type': $('#type').val(),
                'bussiness_type': $('#bussiness_type').val(),
                'name': $('#name').val(),
                'office_address': $('#office_address').val(),
                'current_address': $('#current_address').val(),
                'contact_number_one': $('#contact_number_one').val(),
                'contact_number_two': $('#contact_number_two').val(),
                'whatsapp_number': $('#whatsapp_number').val(),
                'email': $('#email').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add_supplier.action')}}",
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
                        $('#type').val("");
                        $('#bussiness_type').val("");
                        $('#name').val("");
                        $('#office_address').val("");
                        $('#current_address').val("");
                        $('#contact_number_one').val("");
                        $('#contact_number_two').val("");
                        $('#whatsapp_number').val("");
                        $('#email').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_supplier_data();
                    }

                }
            });
        });

        // Edit Supplier Contact
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            var supp_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-supplier/" + supp_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#supp_id').val(supp_id);
                        $('.edit_type').val(response.messages.type);
                        $('.edit_bussiness_type').val(response.messages.bussiness_type);
                        $('.edit_name').val(response.messages.name);
                        $('.edit_office_address').val(response.messages.office_address);
                        $('.edit_current_address').val(response.messages.current_address);
                        $('.edit_contact_number_one').val(response.messages.contact_number_one);
                        $('.edit_contact_number_two').val(response.messages.contact_number_two);
                        $('.edit_whatsapp_number').val(response.messages.whatsapp_number);
                        $('.edit_email').val(response.messages.email);
                    }
                }
            });
        });

        // Update Supplier Contact 
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();
            var supp_id = $('#supp_id').val();
            var data = {
                'type': $('#type').val(),
                'bussiness_type': $('#bussiness_type').val(),
                'name': $('#name').val(),
                'office_address': $('#office_address').val(),
                'current_address': $('#current_address').val(),
                'contact_number_one': $('#contact_number_one').val(),
                'contact_number_two': $('#contact_number_two').val(),
                'whatsapp_number': $('#whatsapp_number').val(),
                'email': $('#email').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-supplier/" + supp_id,
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
                        $('#type').val("");
                        $('#bussiness_type').val("");
                        $('#name').val("");
                        $('#office_address').val("");
                        $('#current_address').val("");
                        $('#contact_number_one').val("");
                        $('#contact_number_two').val("");
                        $('#whatsapp_number').val("");
                        $('#email').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        fetch_supplier_data();
                    }
                }
            });

        });

        // Delete Supplier Contact
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var supplier_id = $(this).val();
            $('#delete_supplier_id').val(supplier_id);
            $('#deletesupplier').modal('show');

            var time = null;
            $("#supp_delt").addClass('skeleton');
            $("#supp_delt2").addClass('skeleton');
            $("#supp_delt3").addClass('skeleton');
            $("#supp_delt4").addClass('skeleton');
            $("#delete_supplier_id").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            time = setTimeout(() => {
                $("#supp_delt").removeClass('skeleton');
                $("#supp_delt2").removeClass('skeleton');
                $("#supp_delt3").removeClass('skeleton');
                $("#supp_delt4").removeClass('skeleton');
                $("#delete_supplier_id").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
            }, 3000);
            
            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var supplier_id = $('#delete_supplier_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-supplier/" + supplier_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletesupplier').modal('hide');

                    fetch_supplier_data();
                }

            });
        });

        // Update- Supplier Status ------------------
        $("#supplier_data_table").delegate(".supplier_check_permission", "click", function(e) {

            const current_url = "{{route('supplier_update_status.action')}}";

            const pagination_url = $("#supplier_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('status_id'),
                    supplier_status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_supplier_data('', pagination_url);
                }
            });
        });  

        // input type field loader
        $("#type").on('keyup',()=> {
            $('.type-icon').removeClass('type-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.type-icon').addClass('type-hidden');
                $(this).attr('disabled',false);
            }, 3000);


        });
        // input bussiness field loader
        $("#bussiness_type").on('keyup',()=> {
            $('.bussiness-icon').removeClass('bussiness-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.bussiness-icon').addClass('bussiness-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });
        // input name field loader
        $("#name").on('keyup',()=> {
            $('.name-icon').removeClass('name-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.name-icon').addClass('name-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });
        // input office field loader
        $("#office_address").on('keyup',()=> {
            $('.office-icon').removeClass('office-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.office-icon').addClass('office-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });
        // input current address field loader
        $("#current_address").on('keyup',()=> {
            $('.curradress-icon').removeClass('curradress-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.curradress-icon').addClass('curradress-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });
        // post contact1 field loader
        $("#contact_number_one").on('keyup',()=> {
            $('.contact1-icon').removeClass('contact1-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.contact1-icon').addClass('contact1-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });
        // post contact2 field loader
        $("#contact_number_two").on('keyup',()=> {
            $('.contact2-icon').removeClass('contact2-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.contact2-icon').addClass('contact2-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });
        // post whatsapp field loader
        $("#whatsapp_number").on('keyup',()=> {
            $('.whatsapp-icon').removeClass('whatsapp-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.whatsapp-icon').addClass('whatsapp-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });
        // post email field loader
        $("#email").on('keyup',()=> {
            $('.email-icon').removeClass('email-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.email-icon').addClass('email-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });

        $(document).load('click', function(){
            $("#active_loader").addClass('loader_chart');
        });
    });
</script>