<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    $(document).ready(function(){
        // the fetch function call from the "division-district-upazila" script for Initialize...
        fetch_division();
        fetch_district();
        fetch_upazila();

        searchBranch();

        // Initialize the button loader for the login button
        buttonLoader('#save', '.add-icon', '.add-btn-text', 'ADD...', 'ADD', 3000);
        buttonLoader('#update_btn', '.update-icon', '.update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#update_btn_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#access_btn', '.access-icon', '.access-btn-text', 'Access...', 'Access', 1000);
        buttonLoader('#access_btn_confirm', '.access-confirm-icon', '.access-confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);
        buttonLoader('#deleteLoader', '.delete-icon', '.delete-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('.yes_button', '.loading-yes-icon', '.btn-text', 'Yes...', 'Yes', 1000);
        buttonLoader('#delete_branch', '.delete-confrm-icon', '.delete-confrm-btn-text', 'Delete...', 'Delete', 1000);

        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if ($(this).attr('id') === 'select_branch') {
                $(this).select2({
                    placeholder: 'Select Company Branch Name',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'branch_type') {
                $(this).select2({
                    placeholder: 'Select Branch Type',
                    allowClear: true
                });
            }
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_branch').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch...');
        });
        $('#branch_type').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch type...');
        });

        // Branch unique id generator according to branch
        $("#branch_type").on('change', function() {
            var brancType = $(this).val();
            if(brancType === 'Main Branch'){
                $("#branch_id_field").val('M-BRN');
            }else if(brancType === 'Corporate Branch'){
                $("#branch_id_field").val('C-BRN');
            }else if(brancType === 'Local Branch'){
                $("#branch_id_field").val('L-BRN');
            }

            var x = Math.random();
            x = x * (1000 - 1) + 1;
            var generate_id = Math.floor(x);
            $("#generate_id").val(generate_id);
            var branch_id_field = $("#branch_id_field").val();

            var currentDate = new Date();
            var year = currentDate.getFullYear();
            var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
            var day = ("0" + currentDate.getDate()).slice(-2);
            var formattedDate = year + '-' + month + '-' + day;

            var branch_id = branch_id_field + '-' + formattedDate;

            $("#branch_id").val(branch_id + '-' + generate_id);
        });

        // Search Select Dropdown
        $(document).on('change', '#select_branch', function(e){
            e.preventDefault();

            fetch_division();
            var select = $(this).val();

            // Button Show Or Hide
            if(select !== ''){
                $("#save").hide();
                $("#save").fadeOut();
                $("#update_btn").removeAttr('hidden');
                $("#update_btn").fadeIn();
                $("#deleteLoader").removeAttr('hidden');
                $("#deleteLoader").fadeIn();
                $("#cancel_btn").hide();
                $("#cancel_btn").fadeOut();
            }else if(select == ''){
                $("#save").show();
                $("#save").fadeIn();
                $("#update_btn").attr('hidden', true);
                $("#update_btn").fadeOut();
                $("#deleteLoader").attr('hidden', true);
                $("#deleteLoader").fadeOut();
                $("#cancel_btn").show();
                $("#cancel_btn").fadeIn();
            }

            // Search ID
            var id = select;

            if(select !== ''){
                $('.edit_branch_id').removeAttr('hidden');
                $('#documents').removeAttr('hidden');
                
            }
            if(select == ''){
                $('.edit_branch_id').attr('hidden', true);
                $('#documents').attr('hidden', true);
                clearFields();
            }
            
            $.ajax({
                type: "GET",
                url: "/company/branch-edit/" + id,
                success: function(response){
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    }else if(response.status == 200){

                        const messages = response.messages;
                        
                        if(messages.created_by !== ''){
                            const firstUserImage = messages.created_users.image.includes('https://') ? messages.created_users.image : `${window.location.origin}/image/${messages.created_users.image}`;
                            let createdByRole;
                            switch (messages.created_by) {
                                case 1:
                                    createdByRole = 'SuperAdmin';
                                    break;
                                case 2:
                                    createdByRole = 'Sub-Admin';
                                    break;
                                case 3:
                                    createdByRole = 'Admin';
                                    break;
                                case 0:
                                    createdByRole = 'User';
                                    break;
                                case 5:
                                    createdByRole = 'Accounts';
                                    break;
                                case 6:
                                    createdByRole = 'Marketing';
                                    break;
                                case 7:
                                    createdByRole = 'Delivery Team';
                                    break;
                                default:
                                    createdByRole = 'Unknown';
                            }
                            $("#firstUserImage").html(`<img class="user_img rounded-square users_image position" src="${firstUserImage}">`);

                            $("#firstUserEmail").val(messages.created_users.email);
                            $("#firstCreatedBy").val(createdByRole);
                            if(messages.created_at !== ''){
                                $("#firstCreatedAt").val(currentDate(messages.created_at));
                            }else{
                                $("#firstCreatedAt").val('-');
                            }
                        } 
                        if(messages.updated_by !== null){
                            $("#secondContent").removeAttr('hidden');
                            $('#secondHead').removeAttr('hidden');
                            const secondUserImage = messages.updated_users.image.includes('https://') ? messages.updated_users.image : `${window.location.origin}/image/${messages.updated_users.image}`;
                            let updatedByRole;
                            switch (messages.updated_by) {
                                case 1:
                                    updatedByRole = 'SuperAdmin';
                                    break;
                                case 2:
                                    updatedByRole = 'Sub-Admin';
                                    break;
                                case 3:
                                    updatedByRole = 'Admin';
                                    break;
                                case 0:
                                    updatedByRole = 'User';
                                    break;
                                case 5:
                                    updatedByRole = 'Accounts';
                                    break;
                                case 6:
                                    updatedByRole = 'Marketing';
                                    break;
                                case 7:
                                    updatedByRole = 'Delivery Team';
                                    break;
                                default:
                                    updatedByRole = 'Unknown';
                            }
                            $("#secondUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);

                            $("#secondUserEmail").val((messages.updated_users.email));
                            $("#secondUpdateBy").val(updatedByRole);
                            if(messages.created_at !== messages.updated_at){
                                $("#secondUpdateAt").val(currentDate(messages.updated_at));
                            }else{
                                $("#secondUpdateAt").val('-');
                            }
                        }else{
                            $("#secondContent").attr('hidden', true);
                            $('#secondHead').attr('hidden', true);
                        }
                        if(messages.approver_by !== null){
                            $("#thirdContent").removeAttr('hidden');
                            $('#thirdHead').removeAttr('hidden');
                            const secondUserImage = messages.approver_users.image.includes('https://') ? messages.approver_users.image : `${window.location.origin}/image/${messages.approver_users.image}`;
                            let approverByRole;
                            switch (messages.approver_by) {
                                case 1:
                                    approverByRole = 'SuperAdmin';
                                    break;
                                case 2:
                                    approverByRole = 'Sub-Admin';
                                    break;
                                case 3:
                                    approverByRole = 'Admin';
                                    break;
                                case 0:
                                    approverByRole = 'User';
                                    break;
                                case 5:
                                    approverByRole = 'Accounts';
                                    break;
                                case 6:
                                    approverByRole = 'Marketing';
                                    break;
                                case 7:
                                    approverByRole = 'Delivery Team';
                                    break;
                                default:
                                    approverByRole = 'Unknown';
                            }
                            $("#thirdUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);

                            $("#thirdUserEmail").val(messages.approver_users.email);
                            $("#thirdApprover").val(approverByRole);
                            if(messages.approver_date !== null){
                                $("#thirdUpdateAt").val(currentDate(messages.approver_date));
                            }else if(messages.approver_date == null){
                                $("#thirdUpdateAt").val('-');
                            }
                        }else{
                            $("#thirdContent").attr('hidden', true);
                            $('#thirdHead').attr('hidden', true);
                        }

                        $('#branches_id').val(id);
                        $('#edit_branch_id').val(response.messages.branch_id);
                        $('.edit_branch_name').val(response.messages.branch_name);
                        $('.edit_branch_type').val(response.messages.branch_type).trigger('change.select2');
                        $('.edit_division_id').val(response.messages.division_id).trigger('change.select2');
                        fetch_district(response.messages.division_id, function(){
                            // Set the value once options are available
                            $('.edit_district_id').val(response.messages.district_id).trigger('change.select2');
                        });
                        fetch_upazila(response.messages.district_id, function (){
                            // Set the value once options are available
                            $('.edit_upazila_id').val(response.messages.upazila_id).trigger('change.select2');
                        });
                        $('.edit_town_name').val(response.messages.town_name);
                        $('.edit_location').val(response.messages.location);
                        
                    }
                    
                }
            });
        });

        // fetch branch for dropdown
        function searchBranch(){
            const currentUrl = "{{ route('search-branch.action') }}";

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
                    const all_branchs = response.allBranch;
                    $("#select_branch").empty();
                    $("#select_branch").append('<option value="">Select Company Branch Name</option>');
                    $.each(all_branchs, function(key, item) {
                        $("#select_branch").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.branch_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_branch").empty();
                    $("#select_branch").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Create Branch
        $(document).on('click', '#save', function(e){
            e.preventDefault();
            $("#savForm_error").removeAttr('hidden');
            $("#savForm_error6").removeAttr('hidden');
            $("#savForm_error7").removeAttr('hidden');
            var data = {
                'branch_id' : $("#branch_id").val(),
                'branch_name' : $("#branchName").val(),
                'branch_type' : $("#branch_type").val(),
                'division_id' : $("#select_division").val(),
                'district_id' : $("#select_district").val(),
                'upazila_id' : $("#select_upazila").val(),
                'town_name' : $("#townName").val(),
                'location' : $("#location").val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[ name ="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('branch.store') }}",
                data: data,
                dataType: "json",
                success : function(response){
                    if(response.status == 400){
                        $.each(response.errors, function(key, err_value){
                            if (key === 'branch_name') {
                                $("#savForm_error").fadeIn();
                                $('#savForm_error').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error").addClass("alert_show_errors");
                                $('#branchName').addClass('is-invalid');
                                $('#branchName').html("");
                            } else if (key === 'branch_type') {
                                $("#savForm_error2").fadeIn();
                                $('#savForm_error2').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error2").addClass("alert_show_errors");
                                $('#branch_type').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'division_id') {
                                $("#savForm_error3").fadeIn();
                                $('#savForm_error3').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error3").addClass("alert_show_errors");
                                $('#select_division').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'district_id') {
                                $("#savForm_error4").fadeIn();
                                $('#savForm_error4').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error4").addClass("alert_show_errors");
                                $('#select_district').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'upazila_id') {
                                $("#savForm_error5").fadeIn();
                                $('#savForm_error5').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error5").addClass("alert_show_errors");
                                $('#select_upazila').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'town_name') {
                                $("#savForm_error6").fadeIn();
                                $('#savForm_error6').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error6").addClass("alert_show_errors");
                                $('#townName').addClass('is-invalid');
                                $('#townName').html("");
                            } else if (key === 'location') {
                                $("#savForm_error7").fadeIn();
                                $('#savForm_error7').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error7").addClass("alert_show_errors");
                                $('#location').addClass('is-invalid');
                                $('#location').html("");
                            }
                        });
                    }else{
                        $('#savForm_error').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        setTimeout(() => {
                            $('#success_message').fadeOut(3000);
                        }, 5000);
                        
                        clearFields();
                        fetch_division();
                        fetch_district();
                        fetch_upazila();
                        searchBranch();
                    }
                }
            })
        });

        // Input Field Clear
        function clearFields(){
            $("#branch_id").val("");
            $("#branchName").val("");
            $("#branch_type").val("").trigger('change');
            $("#select_division").empty();
            $("#select_district").empty();
            $("#select_upazila").empty();
            $("#townName").val("");
            $("#location").val("");
        }

        // Cancell Field
        function removeField(){
            $("#savForm_error").addClass('display-none');
            $("#savForm_error").empty();
            $("#savForm_error").attr('hidden', true);
            $("#savForm_error6").addClass('display-none');
            $("#savForm_error6").empty();
            $("#savForm_error6").attr('hidden', true);
            $("#savForm_error7").addClass('display-none');
            $("#savForm_error7").empty();
            $("#savForm_error7").attr('hidden', true);

            $("#updateForm_error").addClass('display-none');
            $("#updateForm_error").empty();
            $("#updateForm_error").attr('hidden', true);
            $("#updateForm_error6").addClass('display-none');
            $("#updateForm_error6").empty();
            $("#updateForm_error6").attr('hidden', true);
            $("#updateForm_error7").addClass('display-none');
            $("#updateForm_error7").empty();
            $("#updateForm_error7").attr('hidden', true);

            $("#branchName").val("");
            $("#branchName").removeClass('is-invalid');
            $(".error_val").addClass('display-none');
            $("#branch_type").val("").trigger('change');
            $("#branch_type").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            $(".edit_branch_type_error").addClass('display-none');
            $("#select_division").val("").trigger('change');
            $("#select_division").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            $(".edit_division_error").addClass('display-none');
            $("#select_district").val("").trigger('change');
            $("#select_district").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            $(".edit_district_error").addClass('display-none');
            $("#select_upazila").val("").trigger('change');
            $("#select_upazila").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            $(".edit_upazila_error").addClass('display-none');
            $("#townName").val("");
            $("#townName").removeClass('is-invalid');
            $(".edit_city_error").addClass('display-none');
            $("#location").val("");
            $("#location").removeClass('is-invalid');
            $(".edit_branch_loaction_error").addClass('display-none');
        }

        // Cancell Button
        $(document).on('click', '#cancel_btn', function(){
            removeField();
        });

        // On keyup action for error remove
        $(document).on('keyup', '#branchName, #townName, #location', function(){

            var branch_name = $("#branchName").val();
            var town_name = $("#townName").val();
            var loaction_name = $("#location").val();

            if(branch_name !== ''){
                $("#savForm_error").empty();
                $("#savForm_error").fadeOut();
                $("#savForm_error").addClass('display-none');
                $("#branchName").removeClass("is-invalid");
                $("#updateForm_error").empty();
                $("#updateForm_error").fadeOut();
                $("#updateForm_error").addClass('display-none');
                $(".edit_branch_name").removeClass("is-invalid");
            }
            if(town_name !== ''){
                $("#savForm_error6").empty();
                $("#savForm_error6").fadeOut();
                $("#savForm_error6").addClass("display-none");
                $("#townName").removeClass("is-invalid");
                $("#updateForm_error6").empty();
                $("#updateForm_error6").fadeOut();
                $("#updateForm_error6").addClass("display-none");
                $(".edit_town_name").removeClass("is-invalid");
            }
            if(loaction_name !== ''){
                $("#savForm_error7").empty();
                $("#savForm_error7").fadeOut();
                $("#savForm_error7").addClass("display-none");
                $("#location").removeClass("is-invalid");
                $("#updateForm_error7").empty();
                $("#updateForm_error7").fadeOut();
                $("#updateForm_error7").addClass("display-none");
                $(".edit_location").removeClass("is-invalid");
            }

        });

        // On Change action for error remove
        $(document).on('change', '#branch_type, #select_division, #select_district, #select_upazila', function(){

            var branch_type = $("#branch_type").val();
            var select_division = $("#select_division").val();
            var select_district = $("#select_district").val();
            var select_upazila = $("#select_upazila").val();

            if(branch_type !== ''){
                $("#savForm_error2").fadeOut();
                $("#savForm_error2").addClass('display-none');
                $("#branch_type").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#updateForm_error2").fadeOut();
                $("#updateForm_error2").addClass('display-none');
                $(".edit_branch_type").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            }
            if(select_division !== ''){
                $("#savForm_error3").fadeOut();
                $("#savForm_error3").addClass('display-none');
                $("#select_division").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#updateForm_error3").fadeOut();
                $("#updateForm_error3").addClass('display-none');
                $(".edit_division_id").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            }
            if(select_district !== ''){
                $("#savForm_error4").fadeOut();
                $("#savForm_error4").addClass('display-none');
                $("#select_district").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#updateForm_error4").fadeOut();
                $("#updateForm_error4").addClass('display-none');
                $(".edit_district_id").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            }
            if(select_upazila !== ''){
                $("#savForm_error5").fadeOut();
                $("#savForm_error5").addClass('display-none');
                $("#select_upazila").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                $("#updateForm_error5").fadeOut();
                $("#updateForm_error5").addClass('display-none');
                $(".edit_upazila_id").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            }

        });

        // Branch Update Modal Show
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmbranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.update_title, .head_btn3, #text_message', type: 'class', name: 'branch-skeleton' },
                    { selector: '#update_btn_confirm, #cate_delete5', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });

        // Confirm Update Branch
        $(document).on('click', '#update_btn_confirm', function(e){
            e.preventDefault();

            $("#updateForm_error").removeAttr('hidden');
            $("#updateForm_error6").removeAttr('hidden');
            $("#updateForm_error7").removeAttr('hidden');

            var id = $("#branches_id").val();
            var data = {
                'branch_id' : $(".update_branch_id").val(),
                'branch_name' : $(".edit_branch_name").val(),
                'branch_type' : $(".edit_branch_type").val(),
                'division_id' : $(".edit_division_id").val(),
                'district_id' : $(".edit_district_id").val(),
                'upazila_id' : $(".edit_upazila_id").val(),
                'town_name' : $(".edit_town_name").val(),
                'location' : $(".edit_location").val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[ name ="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/company/branch-update/" + id,
                data: data,
                dataType: "json",
                success : function(response){
                    if(response.status == 400){
                        $.each(response.errors, function(key, err_value){
                            if (key === 'branch_name') {
                                $("#updateForm_error").fadeIn();
                                $('#updateForm_error').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error").addClass("alert_show_errors");
                                $('#branchName').addClass('is-invalid');
                                $('#branchName').html("");
                            } else if (key === 'branch_type') {
                                $("#updateForm_error2").fadeIn();
                                $('#updateForm_error2').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error2").addClass("alert_show_errors");
                                $('#branch_type').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'division_id') {
                                $("#updateForm_error3").fadeIn();
                                $('#updateForm_error3').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error3").addClass("alert_show_errors");
                                $('#select_division').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'district_id') {
                                $("#savForm_error4").fadeIn();
                                $('#savForm_error4').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error4").addClass("alert_show_errors");
                                $('#select_district').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'upazila_id') {
                                $("#updateForm_error5").fadeIn();
                                $('#updateForm_error5').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error5").addClass("alert_show_errors");
                                $('#select_upazila').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'town_name') {
                                $("#updateForm_error6").fadeIn();
                                $('#updateForm_error6').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error6").addClass("alert_show_errors");
                                $('#townName').addClass('is-invalid');
                                $('#townName').html("");
                            } else if (key === 'location') {
                                $("#updateForm_error7").fadeIn();
                                $('#updateForm_error7').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error7").addClass("alert_show_errors");
                                $('#location').addClass('is-invalid');
                                $('#location').html("");
                            }
                            $("#updateconfirmbranch").modal('hide').fadeOut();
                        });
                    }else{
                        $('#updateForm_error').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $("#updateconfirmbranch").modal('hide').fadeOut();
                        setTimeout(() => {
                            $('#success_message').fadeOut(3000);
                        }, 5000);
                        searchBranch();
                    }
                }
            })
        });

        // Branch Delete Modal Show
        $(document).on('click', '#deleteLoader', function(e){
            e.preventDefault();
            var branch_id = $("#branches_id").val();
            $('#delete_branch_id').val(branch_id);

            $("#deletebranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.head_title, .head_btn, .delete_content', type: 'class', name: 'branch-skeleton' },
                    { selector: '#yesButton, #noButton', type: 'class', name: 'branch-delete-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });

        // Branch Confirm Delete Modal Show
        $(document).on('click', '#yesButton', function(e){
            e.preventDefault();
            $("#deleteconfirmbranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.confirm_title, .head_btn2, #delete_text_message', type: 'class', name: 'branch-skeleton' },
                    { selector: '.delete_branch, #cate_delete3', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });

        // Confirm Delete Branch
        $(document).on('click', '.delete_branch', function(e){
            e.preventDefault();

            var id = $("#delete_branch_id").val();

            $.ajaxSetup({
                headrs:{
                    'X-CSRF-TOKEN': $('meta[name ="csrf_token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/company/branch-delete/" + id,
                success: function(response){
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    $("#select_branch").val("").trigger('change');
                    clearFields();
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 5000);
                    $("#deletebranch").modal('hide').fadeOut();
                    $("#deleteconfirmbranch").modal('hide').fadeOut();
                    searchBranch();
                }
            });
        });

        // Branch Access Modal Show
        $(document).on('click', '#access_btn', function(e){
            e.preventDefault();
            $("#accessconfirmbranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.access_title, .head_btn_access_close, #access_text_message', type: 'class', name: 'branch-skeleton' },
                    { selector: '#access_btn_confirm, #acces_delete', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });
    });
</script>