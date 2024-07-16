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
                    <tr class="table-row user-table-row supp-table-row" key="${key}" id="supp_tab">
                        <td class="sn border_ord" id="supp_tab2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="supp_tab3">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="viewBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-eye fa-beat" style="color:royalblue"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="border_ord ps-1 supp_vew" id="supp_tab4">${row.id_name}</td>
                        <td class="txt_ ps-1 supp_vew2" id="supp_tab5">${row.type}</td>
                        <td class="txt_ ps-1 supp_vew3" id="supp_tab6">${row.bussiness_type}</td>
                        <td class="txt_ ps-1 supp_vew4" id="supp_tab7">${row.name}</td>
                        <td class="txt_ ps-1 supp_vew5" id="supp_tab8" hidden>${row.office_address}</td>
                        <td class="txt_ ps-1 supp_vew6" id="supp_tab9" hidden>${row.current_address}</td>
                        <td class="txt_ ps-1 supp_vew7" id="supp_tab10">${row.contact_number_one}</td>
                        <td class="txt_ ps-1 supp_vew8" id="supp_tab11">${row.contact_number_two}</td>
                        <td class="txt_ ps-1 supp_vew9" id="supp_tab12">${row.whatsapp_number}</td>
                        <td class="txt_ ps-1 supp_vew10" id="supp_tab13">${row.email}</td>
                        <td class="tot_complete_ pe-2 ${row.supplier_status ? 'bg-silver' : 'bg-danger'}" id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${row.supplier_status ? 'text-primary' : 'text-danger'}">${row.supplier_status ? '<span style="color:green;font-weight:800;font-size: 15px;"><i class="fa-solid fa-check"></i></span> Active' : '❌ Deny'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></span>
                        </td>
                        <td class="tot_complete_ ps-1 pt-1 center" id="supp_tab14">
                            <input id="actOne" class="form-switch form-check-input supplier_check_permission me-2" type="checkbox" status_id="${row.id}" value="${row.supplier_status}" ${row.supplier_status? " checked": ''}>
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
                    $("#total_supplier_records_progressbar").text(total);
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();
                    // search autocomplete 
                    var suggestions = data.map(function(item) {
                        return {
                            label: `${item.id_name} - ${item.name} - ${item.contact_number_one}`,
                            value: item.name,
                        };
                    });
                    // Initialize autocomplete
                    $("#supplier_search").autocomplete({
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

            fetch_supplier_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#supplier_search', function() {
            var query = $(this).val();
            fetch_supplier_data(query);

            $('.supp_search-icon').removeClass('supp_search-hidden');
            setTimeout(() => {
                $('.supp_search-icon').addClass('supp_search-hidden');
            }, 1000);

        });
        $(document).on('click', '#search_area', function() {
            $("#search_plate").toggleClass('display-block', 'slow');
            $("#search_plate").toggleClass('display-hidden', 'slow');
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
            // Remove any existing error messages
            $('.error-message').remove();
            
            // Validate form fields
            var type = $('#type').val();
            var bussinessType = $('#bussiness_type').val();
            var name = $('#name').val();
            var currentAddress = $('#current_address').val();
            var contactNumberOne = $('#contact_number_one').val();
            
            if (type.trim() == '') {
                $('#type').closest('.row').append('<span><span class="error-message alert_show_errors">The type(supplier or vendor or common) field is required.</span></span>');
            }
            if (bussinessType.trim() == '') {
                $('#bussiness_type').closest('.row').append('<span><span class="error-message alert_show_errors bussiness_erorr">The bussiness type(bussiness name) field is required.</span></span>');
            }
            if (name.trim() == '') {
                $('#name').closest('.row').append('<span><span class="error-message alert_show_errors name_erorr">The supplier name field is required.</span></span>');
            }
            if (currentAddress.trim() == '') {
                $('#current_address').closest('.row').append('<span><span class="error-message alert_show_errors address_erorr">The current address field is required.</span></span>');
            }
            if (contactNumberOne.trim() == '') {
                $('#contact_number_one').closest('.row').append('<span><span class="error-message alert_show_errors address_erorr">The contact number field is required.</span></span>');
            }
            
            // Check if there are any error messages
            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }
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
                },
                error: function(xhr) {
                    if (xhr.status === 417) {
                        window.location.href = '/edit-supplier/{id}';
                    }
                }
            });
        });

        // Update Supplier Contact 
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();

            // Remove any existing error messages
            $('.error-message').remove();
            
            // Validate form fields
            var type = $('#type').val();
            var bussinessType = $('#bussiness_type').val();
            var name = $('#name').val();
            var currentAddress = $('#current_address').val();
            var contactNumberOne = $('#contact_number_one').val();
            
            if (type.trim() == '') {
                $('#type').closest('.row').append('<span><span class="error-message alert_show_errors">The type(supplier or vendor or common) field is required.</span></span>');
            }
            if (bussinessType.trim() == '') {
                $('#bussiness_type').closest('.row').append('<span><span class="error-message alert_show_errors bussiness_erorr">The bussiness type(bussiness name) field is required.</span></span>');
            }
            if (name.trim() == '') {
                $('#name').closest('.row').append('<span><span class="error-message alert_show_errors name_erorr">The supplier name field is required.</span></span>');
            }
            if (currentAddress.trim() == '') {
                $('#current_address').closest('.row').append('<span><span class="error-message alert_show_errors address_erorr">The current address field is required.</span></span>');
            }
            if (contactNumberOne.trim() == '') {
                $('#contact_number_one').closest('.row').append('<span><span class="error-message alert_show_errors address_erorr">The contact number field is required.</span></span>');
            }
            
            // Check if there are any error messages
            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }

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
                },
                error: function(xhr) {
                    if (xhr.status === 417) {
                        window.location.href = '/update-supplier/{id}';
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
            }, 1000);
            
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
                },
                error: function(xhr) {
                    if (xhr.status === 404) {
                        window.location.href = '/errors/404';
                    }
                }

            });
        }); 

        // Update- Supplier Status ------------------
        $("#supplier_data_table").delegate(".supplier_check_permission", "click", function(e) {
            e.preventDefault();

            const current_url = "{{route('supplier_update_status.action')}}";
            const pagination_url = $("#supplier_data_table_paginate .active").attr('href');
            const status_id = $(this).attr('status_id');

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
                    id: status_id,
                    supplier_status: $(this).val(),
                },
                success: function(response) {
                    console.log('messages', response.messages);
                    fetch_supplier_data('', pagination_url);
                    $('#success_message').text(response.messages);
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                },
                error: function(xhr) {
                    if (xhr.status === 405) {
                        window.location.href = '/errors/405';
                    }
                }
            });
        });
        
        // Supplier Info View
        $(document).on('click', '#viewBtn', function(e) {
            e.preventDefault();
            var supplier_id = $(this).val();
            $('#view_supplier_id').val(supplier_id);
            $('#supplierInfoView').modal('show');

            $.ajax({
                type: "GET",
                url: "/view-supplier/" + supplier_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#view_supplier_id').val(supplier_id);
                        $('.supp_vew').val(response.messages.id_name);
                        $('.view_type').val(response.messages.type);
                        $('.view_bussiness_type').val(response.messages.bussiness_type);
                        $('.view_name').val(response.messages.name);
                        $('.view_office_address').val(response.messages.office_address);
                        $('.view_current_address').val(response.messages.current_address);
                        $('.view_contact_number_one').val(response.messages.contact_number_one);
                        $('.view_contact_number_two').val(response.messages.contact_number_two);
                        $('.view_whatsapp_number').val(response.messages.whatsapp_number);
                        $('.view_email').val(response.messages.email);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 418) {
                        window.location.href = '/view-supplier/{supplier_id}';
                    }
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

        // Assume you have a variable totalSupplierRecords that holds the total number of supplier records
        var totalSupplierRecords = $("#total_supplier_records_progressbar").text(total);
        updateProgressBarWithErrorHandling(totalSupplierRecords);
        function updateProgressBarWithErrorHandling(totalSupplierRecords) {
            var progressBar = $('.progress-bar');
            var percentage = (totalSupplierRecords / 100) * 100; 
            if (!isNaN(percentage) && percentage >= 0 && percentage <= 100) {
                progressBar.css('width', percentage + '%');
                progressBar.attr('aria-valuenow', percentage);
                progressBar.text(percentage.toFixed(2) + '%'); 
            } else {
                progressBar.css('width', '0%');
                progressBar.attr('aria-valuenow', '0');
                progressBar.text('Error');
            }
        }
    });
</script>