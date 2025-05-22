<script type="module">
    import { currentDate, formatDate } from "/module/module-min-js/helper-function-min.js";
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
        fetch_branch_name();

        // Handle Select only for branch
        $(document).on('change', ' #branch_type', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_branch").empty();
                $("#select_branch").empty();
                $("#select_branch").append('<option style="color:white;font-weight:600;" value="" disabled>Select branch type</option>');
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

            const currentUrl = "/company-supplier/branch-fetch/"+ id;

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

        // Handle Select only for Branch Name
        $(document).on('change', ' #search_branch', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#search_supplier").empty();
                $("#search_supplier").append('<option style="color:white;font-weight:600;" value="" disabled>Select branch name</option>');
            }
        });

        // Event listener for only for Branch Name
        $(document).on('change', '#search_branch', function() {
            const branch_id = $(this).val();
            fetch_branch_name(branch_id);
        });

        // Function to fetch only branch 
        function fetch_branch_name (branch_id) {
            if (!branch_id) {
                return;
            }

            const currentUrl = "/company-supplier/get-supplier/"+ branch_id;

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
                    const suppliers = response.messages;
                    
                    $("#search_supplier").empty();
                    $.each(suppliers, function(key, item) {
                        $("#search_supplier").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#search_supplier").empty();
                    $("#search_supplier").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select supplier name</option>');
                }
            });
        }

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
            $("#accessCard").attr('hidden', true);
            $("#delete_btn").attr('hidden', true);
            $("#save").removeAttr('hidden');
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
                                $("#savForm_error").closest('.branch_type_nme').append('<span class="error_group error_icon_one"><svg width="15px" hieght="8px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> <span class="error_val select_error_one">' + err_value + '</span></span>');
                            } else if (key === 'branch_id') {
                                $("#savForm_error2").removeAttr('hidden');
                                $("#savForm_error2").fadeIn();
                                $("#select_branch").next('.select2-container').addClass('is-select-invalid');
                                $("#savForm_error2").closest('.branch_id_nme').append('<span class="error_group error_icon_two"><svg width="15px" hieght="8px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> <span class="error_val select_error_two">' + err_value + '</span></span>');
                            } else if (key === 'type') {
                                $("#savForm_error3").removeAttr('hidden');
                                $("#savForm_error3").fadeIn();
                                $("#type").addClass('is-invalid');
                                $("#savForm_error3").append('<svg width="15px" hieght="8px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error3').append('<span class="error_val">' + err_value + '</span>');
                            } else if (key === 'bussiness_type') {
                                $("#savForm_error4").removeAttr('hidden');
                                $("#savForm_error4").fadeIn();
                                $("#bussiness_type").addClass('is-invalid');
                                $("#savForm_error4").append('<svg width="15px" hieght="8px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error4').append('<span class="error_val">' + err_value + '</span>');
                            } else if (key === 'name') {
                                $("#savForm_error5").removeAttr('hidden');
                                $("#savForm_error5").fadeIn();
                                $("#name").addClass('is-invalid');
                                $("#savForm_error5").append('<svg width="15px" hieght="8px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error5').append('<span class="error_val">' + err_value + '</span>');
                            } else if (key === 'contact_number_one') {
                                $("#savForm_error6").removeAttr('hidden');
                                $("#savForm_error6").fadeIn();
                                $("#contact_number_one").addClass('is-invalid');
                                $("#savForm_error6").append('<svg width="15px" hieght="8px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error6').append('<span class="error_val">' + err_value + '</span>');
                            }else if (key === 'contact_number_two') {
                                $("#savForm_error7").removeAttr('hidden');
                                $("#savForm_error7").fadeIn();
                                $("#contact_number_two").addClass('is-invalid');
                                $("#savForm_error7").append('<svg width="15px" hieght="8px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#savForm_error7').append('<span class="error_val">' + err_value + '</span>');
                            }else if (key === 'current_address') {
                                $("#savForm_error8").removeAttr('hidden');
                                $("#savForm_error8").fadeIn();
                                $("#current_address").addClass('is-invalid');
                                $("#savForm_error8").append('<svg width="15px" hieght="8px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
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
                        //fetch_supplier_data();
                    }

                }
            });
        });

        // Edit Supplier Contact
        $(document).on('click', '#search_btn', function(e) {
            e.preventDefault();
            $("#headName").empty();
            $("#bodyName").empty();
            $("#suppType").empty();
            $("#suppName").empty();
            var selectValue = $("#search_supplier").val();
            
            if(selectValue !== "") {
                var supp_id = selectValue;
            } else {
                $("#search_supplier").next('.select2-container').addClass('is-select-invalid');
                return;
            }

            $.ajax({
                type: "GET",
                url: "/edit-supplier/" + supp_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').fadeIn();
                        $('#success_message').addClass('altert_danger ps-1 pe-1');
                        $('#success_message').text(response.messages);
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 5000);
                    } else {
                        $('#supp_id').val(supp_id);
                        $('#delete_btn').val(supp_id);
                        $('#view_btn').val(supp_id);
                        $('.edit_branch_type').val(response.messages.branch_category).trigger('change.select2');
                        fetch_branch(response.messages.branch_category);
                        setTimeout(() => {
                            $('.edit_select_branch').val(response.messages.branch_id).trigger('change.select2');
                        }, 500);
                        $('.edit_type').val(response.messages.type);
                        $('.edit_bussiness_type').val(response.messages.bussiness_type);
                        $('.edit_name').val(response.messages.name);
                        $('.edit_office_address').val(response.messages.office_address);
                        $('.edit_current_address').val(response.messages.current_address);
                        $('.edit_contact_number_one').val(response.messages.contact_number_one);
                        $('.edit_contact_number_two').val(response.messages.contact_number_two);
                        $('.edit_whatsapp_number').val(response.messages.whatsapp_number);
                        $('.edit_email').val(response.messages.email);
                        $("#accessCard").removeAttr('hidden');
                        // Supplier Access Check
                        if(response.messages.supplier_status == 1){
                            $("#accessCheck").prop('checked', response.messages.supplier_status == 1);
                            $("#justifyLabel").removeAttr('hidden');
                            $("#deny_label").attr('hidden', true);
                        }else if(response.messages.supplier_status == 0){
                            $("#deny_label").removeAttr('hidden');
                            $("#justifyLabel").attr('hidden', true);
                        }else{
                            $("#deny_label").attr('hidden', true);
                            $("#justifyLabel").attr('hidden', true);
                        }

                        // Update Modal
                        const messages = response.messages;
                        const headName = $("#headName, #suppType");
                        const bodyName = $("#bodyName");
                        const supName = $("#suppName");
                        headName.append(`<span>${messages.type}</span>`);
                        bodyName.append(`<span>${messages.type} Name : ${messages.name}</span>`);
                        supName.append(`<span>${messages.name}</span>`);
                        // Button
                        $("#save").hide('slow');
                        $("#save").attr('hidden', true);
                        $("#update_btn").show('slow');
                        $("#update_btn").removeAttr('hidden');
                        $("#delete_btn").show('slow');
                        $("#delete_btn").removeAttr('hidden');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 417) {
                        window.location.href = '/edit-supplier/{id}';
                    }
                }
            });
        });

        // Select Supplier Or Vendor Name Search Menu
        // $(document).on('change', '#search_branch', function(){
        //     var selectValue = $(this).val();
        //     if(selectValue !== "") {
        //         $("#search_supplier").next('.select2-container').removeClass('is-select-invalid').addClass('is-select-valid');
        //     }else{
        //         $("#search_supplier").next('.select2-container').removeClass('is-select-invalid is-select-valid');
        //     }
        // });

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

            var supp_id = $('#supp_id').val();
            var permissionStatus = $("input[name='supplier_status']:checked").val();
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
                'supplier_status': permissionStatus ? 1 : 0,
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
                        $("#updateForm_errorList3").empty();
                        $("#updateForm_errorList4").empty();
                        $("#updateForm_errorList5").empty();
                        $("#updateForm_errorList6").empty();
                        $("#updateForm_errorList8").empty();
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').addClass('altert_danger ps-1 pe-1');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            if (key === 'branch_category') {
                                $("#updateForm_errorList").removeAttr('hidden');
                                $("#updateForm_errorList").fadeIn();
                                $("#branch_type").next('.select2-container').addClass('is-select-invalid');
                                $("#updateForm_errorList").closest('.branch_type_nme').append('<span class="error_group error_icon_one"><svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> <span class="error_val select_error_one">' + err_value + '</span></span>');
                            } else if (key === 'branch_id') {
                                $("#updateForm_errorList2").removeAttr('hidden');
                                $("#updateForm_errorList2").fadeIn();
                                $("#select_branch").next('.select2-container').addClass('is-select-invalid');
                                $("#updateForm_errorList2").closest('.branch_id_nme').append('<span class="error_group error_icon_two"><svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> <span class="error_val select_error_two">' + err_value + '</span></span>');
                            } else if (key === 'type') {
                                $("#updateForm_errorList3").removeAttr('hidden');
                                $("#updateForm_errorList3").fadeIn();
                                $("#type").addClass('is-invalid');
                                $("#updateForm_errorList3").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#updateForm_errorList3').append('<span class="error_val">' + err_value + '</span>');
                            } else if (key === 'bussiness_type') {
                                $("#updateForm_errorList4").removeAttr('hidden');
                                $("#updateForm_errorList4").fadeIn();
                                $("#bussiness_type").addClass('is-invalid');
                                $("#updateForm_errorList4").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#updateForm_errorList4').append('<span class="error_val">' + err_value + '</span>');
                            } else if (key === 'name') {
                                $("#updateForm_errorList5").removeAttr('hidden');
                                $("#updateForm_errorList5").fadeIn();
                                $("#name").addClass('is-invalid');
                                $("#updateForm_errorList5").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#updateForm_errorList5').append('<span class="error_val">' + err_value + '</span>');
                            } else if (key === 'contact_number_one') {
                                $("#updateForm_errorList6").removeAttr('hidden');
                                $("#updateForm_errorList6").fadeIn();
                                $("#contact_number_one").addClass('is-invalid');
                                $("#updateForm_errorList6").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#updateForm_errorList6').append('<span class="error_val">' + err_value + '</span>');
                            }else if (key === 'contact_number_two') {
                                $("#updateForm_errorList7").removeAttr('hidden');
                                $("#updateForm_errorList7").fadeIn();
                                $("#contact_number_two").addClass('is-invalid');
                                $("#updateForm_errorList7").append('<svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#updateForm_errorList7').append('<span class="error_val">' + err_value + '</span>');
                            }else if (key === 'current_address') {
                                $("#updateForm_errorList8").removeAttr('hidden');
                                $("#updateForm_errorList8").fadeIn();
                                $("#current_address").addClass('is-invalid');
                                $("#updateForm_errorList8").append('<span class="error_group"><svg width="18px" hieght="10px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg>');
                                $('#updateForm_errorList8').append('<span class="error_val">' + err_value + '</span>');
                            }
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('altert_danger ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
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
                        $('#search_branch').val(null).trigger('change');
                        $('#search_supplier').val(null).trigger('change');
                        $("#accessCard").attr('hidden', true);
                        $("#update_btn").attr('hidden', true);
                        $("#delete_btn").attr('hidden', true);
                        $("#save").show('slow');
                        $("#save").removeAttr('hidden');
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        $("#updateconfirmsupplier").modal('hide');
                        //fetch_supplier_data();
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
        $(document).on('click', '#delete_btn', function(e) {
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
            $('#deletesupplier').modal('hide');
            $('#deleteconfirmsupplier').modal('show');
            $("#deleteConfirm").addClass('skeleton');
            $("#cate_delete3").addClass('skeleton');
            $("#cate_confirm").addClass('skeleton');
            $(".confirm_title").addClass('skeleton');
            $(".head_btn2").addClass('skeleton');
            $("#supp_delt4").addClass('sup-btn-skeleton');
            $("#deleteConfirm").addClass('sup-btn-skeleton-two');
            var time = null;
            time = setTimeout(() => {
                $(".confirm_title").removeClass('skeleton');
                $(".head_btn2").removeClass('skeleton');
                $("#deleteConfirm").removeClass('skeleton');
                $("#cate_delete3").removeClass('skeleton');
                $("#cate_confirm").removeClass('skeleton');
                $("#supp_delt4").removeClass('sup-btn-skeleton');
                $("#deleteConfirm").removeClass('sup-btn-skeleton-two');
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

        // delete Cancel
        $(document).on('click', '.delt_cancel', function(){
            $('#deletesupplier').modal('show');
            $('#deleteconfirmsupplier').modal('hide');
        });
        
        // Supplier Info View
        $(document).on('click', '#view_btn', function(e) {
            e.preventDefault();
            var supplier_id = $(this).val();
            $('#view_supplier_id').val(supplier_id);
            $('#supplierInfoView').modal('show');

            $.ajax({
                type: "GET",
                url: "/view-supplier/" + supplier_id,
                success: function(response) {
                    // search-loader
                    $("#view_name").addClass('form-head-skeletone');
                    $(".btn-close").addClass('form-head-skeletone');
                    $("#searchLoader").removeAttr('hidden');
                    $("#supplier_menu_head").attr('hidden', true);
                    $("#branch_supp").attr('hidden', true);
                    $("#supplier_menu_head2").attr('hidden', true);
                    $("#supplier_menu").attr('hidden', true);
                    $("#supplier_menu_head3").attr('hidden', true);
                    $("#status_row").attr('hidden', true);
                    $("#supplier_menu_head4").attr('hidden', true);
                    $("#supplier_menu_head5").attr('hidden', true);
                    $("#creatorORupdator").attr('hidden', true);
                    $("#creatorORupdator2").attr('hidden', true);
                    requestAnimationFrame(()=>{
                        setTimeout(() => {
                            $("#view_name").removeClass('form-head-skeletone');
                            $(".btn-close").removeClass('form-head-skeletone');
                            $("#searchLoader").attr('hidden', true);
                            $("#supplier_menu_head").removeAttr('hidden');
                            $("#branch_supp").removeAttr('hidden');
                            $("#supplier_menu_head2").removeAttr('hidden');
                            $("#supplier_menu").removeAttr('hidden');
                            $("#supplier_menu_head3").removeAttr('hidden');
                            $("#status_row").removeAttr('hidden');
                            $("#supplier_menu_head4").removeAttr('hidden');
                            $("#supplier_menu_head5").removeAttr('hidden');
                            $("#creatorORupdator").removeAttr('hidden');
                            $("#creatorORupdator2").removeAttr('hidden');
                        }, 1500);
                    });

                    $("#view_name").empty();
                    $("#supp_vew").empty();
                    $("#view_type").empty();
                    $("#view_bussiness_type").empty();
                    $("#supplier_name").empty();
                    $("#view_office_address").empty();
                    $("#view_current_address").empty();
                    $("#view_contact_number_one").empty();
                    $("#view_contact_number_two").empty();
                    $("#view_whatsapp_number").empty();
                    $("#view_email").empty();
                    $("#status").empty();
                    $("#access_date").empty();
                    $("#create_date").empty();
                    $("#update_date").empty();
                    $("#create_by").empty();
                    $("#update_by").empty();
                    $("#branch_id").empty();
                    $("#user_creator_email").empty();
                    $("#user_updator_email").empty();
                    $("#user_names").empty();
                    $("#user_update_names").empty();
                    $("#branch_types").empty();
                    $("#branch_names").empty();
                    $("#branch_locations").empty();
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#view_supplier_id').val(supplier_id);
                        var userRole = {{ auth()->user()->role }};
                        const messages = response.messages;
                        
                        const created_by = messages.created_by;
                        const updated_by = messages.updated_by;
                        const user_email = messages.users.login_email;
                        const supp_Name = $("#view_name");
                        const supp_ID = $("#supp_vew");
                        const type = $("#view_type");
                        const view_bussiness_type = $("#view_bussiness_type");
                        const supplier_name = $("#supplier_name");
                        const view_office_address = $("#view_office_address");
                        const view_current_address = $("#view_current_address");
                        const view_contact_number_one = $("#view_contact_number_one");
                        const view_contact_number_two = $("#view_contact_number_two");
                        const view_whatsapp_number = $("#view_whatsapp_number");
                        const view_email = $("#view_email");
                        const branchID = $("#branch_id");
                        const branchType = messages.users.branch_type;
                        const branchName = messages.users.branch_name;
                        const branchLocation = messages.users.location;
                        const user_name = messages.users.name;
                        const creatorUserImage = messages.users.image.includes('https://') ? messages.users.image : `${window.location.origin}/storage/image/user-image/${messages.users.image}`;
                        const updatorUserImage = messages.users.image.includes('https://') ? messages.users.image : `${window.location.origin}/storage/image/user-image/${messages.users.image}`;
                        
                        const supplierStatus = messages.supplier_status;
                        const status = $("#status");
                        const access_date = $("#access_date");
                        const create_date = $("#create_date");
                        const update_date = $("#update_date");

                        let createdByRole;
                        let updatedByRole;
                        let createdByEmail;
                        let updatedByEmail;
                        let branchTypes;
                        let branchNames;
                        let branchLocations;
                        let userNames;
                        let userUpdateNames;

                        const roles = {
                            1: 'SuperAdmin',
                            2: 'Sub-Admin',
                            3: 'Admin',
                            0: 'User',
                            5: 'Accounts',
                            6: 'Marketing',
                            7: 'Delivery Team',
                        };

                        createdByRole = $("#create_by");
                        updatedByRole = $("#update_by");
                        createdByEmail = $("#user_creator_email");
                        updatedByEmail = $("#user_updator_email");
                        branchTypes = $("#branch_types");
                        branchNames = $("#branch_names");
                        branchLocations = $("#branch_locations");
                        userNames = $("#user_names");
                        userUpdateNames = $("#user_update_names");

                        supp_Name.append(`<span>${messages.name}</span>`);
                        branchID.append(`<span>Branch-ID : ${messages.branch_id}</span>`);
                        branchTypes.append(`<span>Branch-Type : ${branchType}</span>`);
                        branchNames.append(`<span>Branch-Name : ${branchName}</span>`);
                        branchLocations.append(`<span>Branch-Location : ${branchLocation}</span>`);
                        supp_ID.append(`<span>Supplier-ID : ${messages.id_name}</span>`);
                        type.append(`<span>Type : ${messages.type}</span>`);
                        view_bussiness_type.append(`<span>Bussiness : ${messages.bussiness_type}</span>`);
                        supplier_name.append(`<span>Name : ${messages.name}</span>`);
                        view_office_address.append(`<span>Office Address : ${messages.office_address}</span>`);
                        view_current_address.append(`<span>Current Address : ${messages.current_address}</span>`);
                        view_contact_number_one.append(`<span>Contract-1 : ${messages.contact_number_one}</span>`);
                        view_contact_number_two.append(`<span>Contract-2 : ${messages.contact_number_two}</span>`);
                        view_whatsapp_number.append(`<span>What's app : ${messages.whatsapp_number}</span>`);
                        view_email.append(`<span>Email : ${messages.email}</span>`);

                        if(supplierStatus == 1){
                            status.append(`<span>Status : <span class="pill-success-rounded ms-1">Justify</span></span>`);
                            access_date.append(`<span>Access-Date : ${formatDate(messages.updated_at)}</span>`);
                        }else if(supplierStatus == 0){
                            status.append(`<span>Status : <span class="pill-danger-rounded ms-1">Deny</span></span>`);
                            access_date.append(`<span>Deny-Date : ${formatDate(messages.supplier_deny_date)}</span>`);
                        }

                        if(created_by !== null){
                            userNames.append(`<span>Name : ${user_name}</span> <img class="rounded-square ms-2" src="${creatorUserImage}">`);
                            createdByRole.append(`<span>Role : ${roles[created_by] || 'Unknown'}</span>`);
                            create_date.append(`<span>Date : ${formatDate(messages.created_at)}</span>`);
                            createdByEmail.append(`<span>Email : ${user_email || 'null'}</span>`);
                            $("#create_by").removeClass('display_none');
                            $("#user_creator_email").removeClass('display_none');
                        }else if(created_by == null){
                            userNames.append(`<span> The data has not created yet. </span>`);
                            $("#create_by").addClass('display_none');
                            $("#user_creator_email").addClass('display_none');
                        }

                        if(updated_by !== null){
                            userUpdateNames.append(`<span>Name : ${user_name} <img class="rounded-square ms-2" src="${updatorUserImage}"></span>`);
                            update_date.append(`<span>Date : ${formatDate(messages.updated_at)}</span>`);
                            updatedByRole.append(`<span>Role : ${roles[updated_by] || '--'}</span>`);
                            updatedByEmail.append(`<span>Email : ${user_email || 'null'}</span>`);
                            $("#user_update_names").removeClass('display_none');
                            $("#update_by").removeClass('display_none');
                            $("#user_updator_email").removeClass('display_none');
                        }else if(updated_by == null){
                            update_date.append(`<span> The data has not updated yet. </span>`);
                            $("#user_update_names").addClass('display_none');
                            $("#update_by").addClass('display_none');
                            $("#user_updator_email").addClass('display_none');
                        }

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