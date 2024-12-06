<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader } from "/module/module-min-js/design-helper-function-min.js";
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
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);
        buttonLoader('#deleteLoader', '.delete-icon', '.delete-btn-text', 'Delete...', 'Delete', 1000);

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
            }else if ($(this).attr('id') === 'select_action') {
                $(this).select2({
                    placeholder: 'Select Action',
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
        $('#select_action').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search action...');
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

        // Select Action Mode
        $(document).on('change', '#select_action', function(){
            // Button Show Or Hide
            var select_val = $(this).val();

            if(select_val == 'Update'){
                $("#save").hide();
                $("#update_btn").removeAttr('hidden');
                $("#update_btn").fadeIn();
                $("#access_btn").attr('hidden', true);
                $("#deleteLoader").attr('hidden', true);
            }
            if(select_val == 'Access'){
                $("#save").hide();
                $("#access_btn").removeAttr('hidden');
                $("#access_btn").fadeIn();
                $("#update_btn").attr('hidden', true);
                $("#deleteLoader").attr('hidden', true);
            }
            if(select_val == 'Delete'){
                $("#save").hide();
                $("#deleteLoader").removeAttr('hidden');
                $("#deleteLoader").fadeIn();
                $("#update_btn").attr('hidden', true);
                $("#access_btn").attr('hidden', true);
            }
            if(select_val == ''){
                $("#save").show();
                $("#save").fadeIn();
                $("#update_btn").attr('hidden', true);
                $("#access_btn").attr('hidden', true);
                $("#deleteLoader").attr('hidden', true);
            }
        });

        // Search Select Dropdown
        $(document).on('change', '#select_branch', function(e){
            e.preventDefault();
            fetch_division();
            var select = $(this).val();
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
                                $('#secondHead').removeAttr('hidden');
                            }else{
                                $("#secondUpdateAt").val('-');
                                $('#secondHead').removeAttr('hidden');
                            }
                        }else{
                            $("#secondContent").attr('hidden', true);
                            $('#secondHead').removeAttr('hidden', true);
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
                                $('#thirdHead').removeAttr('hidden');
                            }else if(messages.approver_date == null){
                                $("#thirdUpdateAt").val('-');
                                $('#thirdHead').removeAttr('hidden');
                            }
                        }else{
                            $("#thirdContent").attr('hidden', true);
                            $('#thirdHead').removeAttr('hidden', true);
                        }

                        $('#branches_id').val(id);
                        $('#edit_branch_id').val(response.messages.branch_id);
                        $('.edit_branch_name').val(response.messages.branch_name);
                        $('.edit_branch_type').val(response.messages.branch_type).trigger('change.select2');
                        $('.edit_division_id').val(response.messages.division_id).trigger('change.select2');
                        fetch_district(response.messages.division_id);
                        fetch_upazila(response.messages.district_id);
                        setTimeout(() => {
                            $('.edit_district_id').val(response.messages.district_id).trigger('change.select2');
                            $('.edit_upazila_id').val(response.messages.upazila_id).trigger('change.select2');
                        }, 500);
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

            var branc_type = $("#branch_type").val();
            var division = $("#select_division").val();
            var district = $("#select_district").val();
            var upazila = $("#select_upazila").val();
            var city = $("#townName").val();
            var loaction = $("#location").val();

            if(branc_type.trim() == ''){
                $("#branch_type").next('.select2-container').find('.select2-selection').addClass('is-invalid');
                $("#branch_type").closest('.branch').append('<span class="edit_branch_type_error alert_show_errors ps-2"> Branch type is required.</span>');
                $("#branch_type").fadeIn(300);
            }
            if(division.trim() == ''){
                $("#select_division").next('.select2-container').find('.select2-selection').addClass('is-invalid');
                $("#select_division").closest('.branch').append('<span class="edit_division_error alert_show_errors ps-2"> Division is required.</span>');
                $("#select_division").fadeIn(300);
            }
            if(district.trim() == ''){
                $("#select_district").next('.select2-container').find('.select2-selection').addClass('is-invalid');
                $("#select_district").closest('.branch').append('<span class="edit_district_error alert_show_errors ps-2"> District is required.</span>');
                $("#select_district").fadeIn(300);
            }
            if(upazila.trim() == ''){
                $("#select_upazila").next('.select2-container').find('.select2-selection').addClass('is-invalid');
                $("#select_upazila").closest('.branch').append('<span class="edit_upazila_error alert_show_errors ps-2"> Upazila is required.</span>');
                $("#select_upazila").fadeIn(300);
            }
            if(city.trim() == ''){
                $("#townName").addClass("is-invalid");
                $("#townName").closest('.branch').append('<span class="edit_city_error alert_show_errors ps-2"> City name is required.</span>');
                $("#townName").fadeIn(300);
            }
            if(loaction.trim() == ''){
                $("#location").addClass("is-invalid");
                $("#location").closest('.branch').append('<span class="edit_branch_loaction_error alert_show_errors ps-2"> Branch loaction is required.</span>');
                $("#location").fadeIn(300);
            }

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
                            $("#savForm_error").html("");
                            $("#savForm_error").removeClass('display-none');
                            $("#branchName").addClass("is-invalid");
                            $("#savForm_error").addClass("alert_show_errors");
                            $("#savForm_error").append('<span class="error_val">' + err_value + '</span>');
                            $("#savForm_error").fadeIn();
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
    });
</script>