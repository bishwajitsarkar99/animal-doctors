<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();
    $(document).ready(() => {
        buttonLoader('#save', '.add-icon', '.add-btn-text', 'Add', 'Add', 1000);
        buttonLoader('#update_btn', '.update-icon', '.update-btn-text', 'Update', 'Update', 1000);
        buttonLoader('#delete_btn', '.delete-icon', '.delete-btn-text', 'Delete', 'Delete', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel', 'Cancel', 1000);
        buttonLoader('#search_btn', '.search-icon', '.search-btn-text', 'Search', 'Search', 1000);
        //fetch_supplier_data();
        fetch_branch();
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
                        </td>
                        <td class="tot_complete_ ps-1 pt-1 center" id="supp_tab14">
                            <input id="actOne" class="form-switch form-check-input supplier_check_permission me-2" type="checkbox" status_id="${row.id}" value="${row.supplier_status}" ${row.supplier_status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Handle Select only for branch
        $(document).on('change', ' #branch_type', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_branch").empty();
                $("#select_branch").empty();
                $("#select_branch").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });

        // Event listener for only for branch
        $(document).on('change', '#branch_type', function() {
            const id = $(this).val();
            fetch_branch(id);
        });

        // Function to fetch only branch 
        function fetch_branch (id) {
            if (!id) {
                return;
            }

            const currentUrl = "/branch-fetch/"+ id;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    const branch = response.messages;
                    
                    $("#select_branch").empty();
                    $.each(branch, function(key, item) {
                        $("#select_branch").append(`<option style="color:white;font-weight:600;" value="${item.branch_id}">${item.branch_id}</option>`);
                    });
                },
                error: function() {
                    $("#select_branch").empty();
                    $("#select_branch").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select district</option>');
                }
            });
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
            $("#branch_type").next('.select2-container').removeClass('is-select-invalid is-select-valid');
            $("#select_branch").next('.select2-container').removeClass('is-select-invalid is-select-valid');
            $("#type").removeClass('is-invalid is-valid');
            $("#bussiness_type").removeClass('is-invalid is-valid');
            $("#name").removeClass('is-invalid is-valid');
            $("#contact_number_one").removeClass('is-invalid is-valid');
            $("#office_address").removeClass('is-invalid is-valid');
            $("#current_address").removeClass('is-invalid is-valid');
            $(".error_group").empty();
            $("#savForm_error").attr('hidden', true);
            $("#savForm_error2").attr('hidden', true);
            $("#savForm_error3").attr('hidden', true);
            $("#savForm_error4").attr('hidden', true);
            $("#savForm_error5").attr('hidden', true);
            $("#savForm_error6").attr('hidden', true);
            $("#savForm_error7").attr('hidden', true);
            $("#savForm_error8").attr('hidden', true);
            $('#search_branch').val(null).trigger('change');
            $('#search_supplier').val(null).trigger('change');
            $('#branch_type').val(null).trigger('change');
            $('#select_branch').val(null).trigger('change');
            $('#type').val("");
            $('#bussiness_type').val("");
            $('#name').val("");
            $('#office_address').val("");
            $('#current_address').val("");
            $('#contact_number_one').val("");
            $('#contact_number_two').val("");
            $('#whatsapp_number').val("");
            $('#email').val("");
        });

        // Check Handel
        $(document).on('change', '#accessCheck', function(){
            if ($(this).prop('checked')) {
                $("#justifyLabel").removeAttr('hidden');
                $("#deny_label").attr('hidden', true);
            } else {
                $("#deny_label").removeAttr('hidden');
                $("#justifyLabel").attr('hidden', true);
            }
        });

        // Add Supplier
        $(document).on('click', '#save', function(e) {
            e.preventDefault();

            var data = {
                'branch_category': $('#branch_type').val(),
                'branch_id': $('#select_branch').val(),
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
                        $(".error_group").empty();
                        $("#savForm_error3").empty();
                        $("#savForm_error4").empty();
                        $("#savForm_error5").empty();
                        $("#savForm_error6").empty();
                        $("#savForm_error8").empty();
                        $.each(response.errors, function(key, err_value) {
                            if (key === 'branch_category') {
                                $("#savForm_error").removeAttr('hidden');
                                $("#savForm_error").fadeIn();
                                $("#branch_type").next('.select2-container').addClass('is-select-invalid');
                                $("#savForm_error").closest('.branch_type_nme').append('<span class="error_group error_icon_one"><svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> <span class="error_val select_error_one">' + err_value + '</span></span>');
                            } else if (key === 'branch_id') {
                                $("#savForm_error2").removeAttr('hidden');
                                $("#savForm_error2").fadeIn();
                                $("#select_branch").next('.select2-container').addClass('is-select-invalid');
                                $("#savForm_error2").closest('.branch_id_nme').append('<span class="error_group error_icon_two"><svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> <span class="error_val select_error_two">' + err_value + '</span></span>');
                            } else if (key === 'type') {
                                $("#savForm_error3").removeAttr('hidden');
                                $("#savForm_error3").fadeIn();
                                $("#type").addClass('is-invalid');
                                $("#savForm_error3").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error3').append('<span class="error_val">' + err_value + '</span>');
                            } else if (key === 'bussiness_type') {
                                $("#savForm_error4").removeAttr('hidden');
                                $("#savForm_error4").fadeIn();
                                $("#bussiness_type").addClass('is-invalid');
                                $("#savForm_error4").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error4').append('<span class="error_val">' + err_value + '</span>');
                            } else if (key === 'name') {
                                $("#savForm_error5").removeAttr('hidden');
                                $("#savForm_error5").fadeIn();
                                $("#name").addClass('is-invalid');
                                $("#savForm_error5").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error5').append('<span class="error_val">' + err_value + '</span>');
                            } else if (key === 'contact_number_one') {
                                $("#savForm_error6").removeAttr('hidden');
                                $("#savForm_error6").fadeIn();
                                $("#contact_number_one").addClass('is-invalid');
                                $("#savForm_error6").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error6').append('<span class="error_val">' + err_value + '</span>');
                            }else if (key === 'contact_number_two') {
                                $("#savForm_error7").removeAttr('hidden');
                                $("#savForm_error7").fadeIn();
                                $("#contact_number_two").addClass('is-invalid');
                                $("#savForm_error7").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error7').append('<span class="error_val">' + err_value + '</span>');
                            }else if (key === 'current_address') {
                                $("#savForm_error8").removeAttr('hidden');
                                $("#savForm_error8").fadeIn();
                                $("#current_address").addClass('is-invalid');
                                $("#savForm_error8").append('<span class="error_group"><svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error8').append('<span class="error_val">' + err_value + '</span>');
                            }
                        });
                    } else {
                        $('#savForm_error').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('#branch_type').val(null).trigger('change');
                        $('#select_branch').val(null).trigger('change');
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

        // Confirm Update Supplier Contact Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmsupplier").modal('show');
            
            $("#update_btn_confirm").addClass('skeleton');
            $("#cate_delete5").addClass('skeleton');
            $("#cate_confirm_update").addClass('skeleton');
            $(".update_title").addClass('skeleton');
            $(".head_btn3").addClass('skeleton');
            var time = null;
            time = setTimeout(() => {
                $(".update_title").removeClass('skeleton');
                $(".head_btn3").removeClass('skeleton');
                $("#update_btn_confirm").removeClass('skeleton');
                $("#cate_delete5").removeClass('skeleton');
                $("#cate_confirm_update").removeClass('skeleton');
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        }); 

        // Update Supplier Contact 
        $(document).on('click', '.update_confirm', function(e) {
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
                        $("#updateconfirmsupplier").modal('hide');
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

        // Delete Supplier Contact Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var supplier_id = $(this).val();
            $('#delete_supplier_id').val(supplier_id);
            $('#deletesupplier').modal('show');

            var time = null;
            $(".head_title").addClass('skeleton');
            $(".cols_title").addClass('skeleton');
            $("#supp_delt").addClass('skeleton');
            $("#supp_delt2").addClass('skeleton');
            $("#supp_delt3").addClass('skeleton');
            $("#delete_supplier_id").addClass('skeleton');
            $("#yesButton").addClass('sup-btn-skeleton');
            $("#noButton").addClass('sup-btn-skeleton-two');

            time = setTimeout(() => {
                $(".head_title").removeClass('skeleton');
                $(".cols_title").removeClass('skeleton');
                $("#supp_delt").removeClass('skeleton');
                $("#supp_delt2").removeClass('skeleton');
                $("#supp_delt3").removeClass('skeleton');
                $("#delete_supplier_id").removeClass('skeleton');
                $("#yesButton").removeClass('sup-btn-skeleton');
                $("#noButton").removeClass('sup-btn-skeleton-two');
            }, 1000);
            
            return ()=>{
                clearTimeout(time);
            }
        });
        // Confirm Delete Supplier Contact Modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $('#deleteconfirmsupplier').modal('show');
            $("#deleteLoader").addClass('skeleton');
            $("#cate_delete3").addClass('skeleton');
            $("#cate_confirm").addClass('skeleton');
            $(".confirm_title").addClass('skeleton');
            $(".head_btn2").addClass('skeleton');
            $("#supp_delt4").addClass('sup-btn-skeleton');
            $("#deleteLoader").addClass('sup-btn-skeleton-two');
            var time = null;
            time = setTimeout(() => {
                $(".confirm_title").removeClass('skeleton');
                $(".head_btn2").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
                $("#cate_delete3").removeClass('skeleton');
                $("#cate_confirm").removeClass('skeleton');
                $("#supp_delt4").removeClass('sup-btn-skeleton');
                $("#deleteLoader").removeClass('sup-btn-skeleton-two');
            }, 1000);

            return () => {
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
                    $('#deleteconfirmsupplier').modal('hide');
                    fetch_supplier_data();
                },
                error: function(xhr) {
                    if (xhr.status === 404) {
                        window.location.href = '/delete-supplier/{id}';
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
                        window.location.href = '/data-connection/{id}';
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
        // Select Branch Category && Branch ID Field Handel
        $(document).on('change', '#branch_type', function(){
            var $selectContainer = $(this).closest('.branch_type_nme').find('.select2-container');
            var $selectContainerSecond = $("#select_branch").closest('.branch_id_nme').find('.select2-container');
            var $errorElement = $('.select_error_one, .error_icon_one, .select_error_two, .error_icon_two');
            
            if ($selectContainer.hasClass('is-select-invalid')) {
                $selectContainer.removeClass('is-select-invalid').addClass('is-select-valid');
                $selectContainerSecond.removeClass('is-select-invalid').addClass('is-select-valid');
                $errorElement.empty().addClass('display-none');
            } else {
                $selectContainer.removeClass('is-select-valid is-select-invalid');
                $selectContainerSecond.removeClass('is-select-valid is-select-invalid');
            }
        });
        // input type field Handel
        $(document).on('keyup','#type', function() {
            if($(this).hasClass('is-invalid')){
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
                $('#updateForm_errorList3').empty();
                $('#savForm_error3').empty();
            }else{
                var value=$(this).val();
                if (value =='') {
                    $(this).removeClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            }
        });
        // input bussiness field Handel
        $(document).on('keyup','#bussiness_type', function() {
            if($(this).hasClass('is-invalid')){
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
                $('#updateForm_errorList4').empty();
                $('#savForm_error4').empty();
            }else{
                var value=$(this).val();
                if (value =='') {
                    $(this).removeClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            }
        });
        // input name field Handel
        $(document).on('keyup','#name', function() {
            if($(this).hasClass('is-invalid')){
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
                $('#updateForm_errorList5').empty();
                $('#savForm_error5').empty();
            }else{
                var value=$(this).val();
                if (value =='') {
                    $(this).removeClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            }
        });
        // input current address field Handel
        $(document).on('keyup','#current_address', function() {
            if($(this).hasClass('is-invalid')){
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
                $('#updateForm_errorList8').empty();
                $('#savForm_error8').empty();
            }else{
                var value=$(this).val();
                if (value =='') {
                    $(this).removeClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            }
        });
        // contact1 field Handel
        $(document).on('keyup','#contact_number_one', function() {
            if($(this).hasClass('is-invalid')){
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
                $('#updateForm_errorList6').empty();
                $('#savForm_error6').empty();
            }else{
                var value=$(this).val();
                if (value =='') {
                    $(this).removeClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            }
        });
        // contact2 field Handel
        $(document).on('keyup','#contact_number_two', function() {
            if($(this).hasClass('is-invalid')){
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
                $('#updateForm_errorList7').empty();
                $('#savForm_error7').empty();
            }else{
                var value=$(this).val();
                if (value =='') {
                    $(this).removeClass('is-invalid');
                    $(this).removeClass('is-valid');
                }
            }
        });
    });
</script>