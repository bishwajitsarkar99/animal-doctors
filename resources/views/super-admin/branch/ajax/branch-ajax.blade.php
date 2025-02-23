<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    $(document).ready(function(){
        // Ensure function exists before calling
        if (typeof fetch_division === "function") {
            fetch_division();
            fetch_district();
            fetch_upazila();
        } else {
            // console.error("fetch_division is not defined. Check script order.");
        }
        fetch_branch_types();
        searchBranch();
        fetch_branch_categories();
        initSelect2();
        // Initialize the button loader for the login button
        buttonLoader('#save', '.add-icon', '.add-btn-text', 'Add...', 'Add', 3000);
        buttonLoader('#update_btn', '.update-icon', '.update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#update_btn_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#access_btn', '.access-icon', '.access-btn-text', 'Access...', 'Access', 1000);
        buttonLoader('#access_btn_confirm', '.access-confirm-icon', '.access-confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);
        buttonLoader('#deleteLoader', '.delete-icon', '.delete-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('.yes_button', '.loading-yes-icon', '.yes-btn-text', 'Yes...', 'Yes', 1000);
        buttonLoader('#delete_branch', '.delete-confrm-icon', '.delete-confrm-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('#branchTypeRefresh', '.type-icon', '.type-btn-text', 'Refresh...', 'Refresh', 1000);
        buttonLoader('#branch_type_create', '.branch-type-icon', '.branch-type-btn-text', 'Create...', 'Create', 1000);
        buttonLoader('#branch_type_update', '.branch-type-update-icon', '.branch-type-update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#branch_type_delete', '.branch-type-delete-icon', '.branch-type-delete-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('#branch_type_cancel', '.branch-type-cancel-icon', '.branch-type-cancel-btn-text', 'Cancel...', 'Cancel', 1000);

        if (typeof $.fn.select2 !== "undefined") {
            console.log("Select2 is loaded successfully.");
            initSelect2(); // Initialize Select2 on page load
        } else {
            console.error("Select2 is not loaded. Check script order.");
        }
        // Initialize Select2 for all elements with the 'select2' class
        function initSelect2(parent = document) {
            $(parent).find('.select2').each(function() {
                const id = $(this).attr('id');
                let placeholderText = 'Select an option';
                let dropdownParent = null;

                // Set specific placeholder and dropdown parent for modals
                if (id === 'select_branch') {
                    placeholderText = 'Select Company Branch Name';
                } else if (id === 'branch_type') {
                    placeholderText = 'Select Branch Type';
                } else if (id === 'branch_category_name') {
                    placeholderText = 'Select Branch Category Name';
                    dropdownParent = $('#branchTypeCreateModal');
                }

                // Destroy previous instance before reinitializing
                if ($(this).data('select2')) {
                    $(this).select2('destroy');
                }

                // Reinitialize Select2 only if not already initialized
                if (!$(this).data('select2')) {
                    $(this).select2({
                        placeholder: placeholderText,
                        allowClear: true,
                        width: '100%',
                        dropdownParent: dropdownParent 
                    });
                }
            });
        }
        // Reinitialize Select2 for modals
        $('#branchTypeCreateModal').on('shown.bs.modal', function() {
            initSelect2('#branchTypeCreateModal');

        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_branch').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch...');
        });
        $('#branch_type').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch type...');
        });
        $('#branch_category_name').on('select2:open', function() {
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
            }else if(brancType === 'Delivery Branch'){
                $("#branch_id_field").val('D-BRN');
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
            $("#branch_update_modal").empty();
            $("#branch_update_modal_heading").empty();
            $("#delete_branch_id").empty();
            $("#delete_branch").empty();
            $("#delete_branch_body").empty();
            $("#delete_confrm_branch_id").empty();
            fetch_division();

            var select = $(this).val();
            // Button Show Or Hide
            if(select !== ''){
                // Search ID
                var id = select;
                $("#save").hide();
                $("#save").fadeOut();
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
                        // $('#success_message').addClass('alert alert-danger');
                        // $('#success_message').text(response.messages);
                    }else if(response.status == 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#dataPullingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        $('#documents').attr('hidden', true);
                        $('.edit_branch_id').attr('hidden', true);

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $('#documents').removeAttr('hidden');
                            $('.edit_branch_id').removeAttr('hidden');
                            $("#update_btn").removeAttr('hidden');
                            $("#update_btn").fadeIn();
                            $("#deleteLoader").removeAttr('hidden');
                            $("#deleteLoader").fadeIn();
                            const messages = response.messages;
                            
                            if(messages.created_by !== ''){
                                const firstUserImage = messages.created_users.image.includes('https://') ? messages.created_users.image : `${window.location.origin}/storage/image/user-image/${messages.created_users.image}`;
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
                                const secondUserImage = messages.updated_users.image.includes('https://') ? messages.updated_users.image : `${window.location.origin}/storage/image/user-image/${messages.updated_users.image}`;
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
                            // if(messages.approver_by !== null){
                            //     $("#thirdContent").removeAttr('hidden');
                            //     $('#thirdHead').removeAttr('hidden');
                            //     const secondUserImage = messages.approver_users.image.includes('https://') ? messages.approver_users.image : `${window.location.origin}/image/${messages.approver_users.image}`;
                            //     let approverByRole;
                            //     switch (messages.approver_by) {
                            //         case 1:
                            //             approverByRole = 'SuperAdmin';
                            //             break;
                            //         case 2:
                            //             approverByRole = 'Sub-Admin';
                            //             break;
                            //         case 3:
                            //             approverByRole = 'Admin';
                            //             break;
                            //         case 0:
                            //             approverByRole = 'User';
                            //             break;
                            //         case 5:
                            //             approverByRole = 'Accounts';
                            //             break;
                            //         case 6:
                            //             approverByRole = 'Marketing';
                            //             break;
                            //         case 7:
                            //             approverByRole = 'Delivery Team';
                            //             break;
                            //         default:
                            //             approverByRole = 'Unknown';
                            //     }
                            //     $("#thirdUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);
    
                            //     $("#thirdUserEmail").val(messages.approver_users.email);
                            //     $("#thirdApprover").val(approverByRole);
                            //     if(messages.approver_date !== null){
                            //         $("#thirdUpdateAt").val(currentDate(messages.approver_date));
                            //     }else if(messages.approver_date == null){
                            //         $("#thirdUpdateAt").val('-');
                            //     }
                            // }else{
                            //     $("#thirdContent").attr('hidden', true);
                            //     $('#thirdHead').attr('hidden', true);
                            // }
    
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

                            // Modal delete, update and confirm data get
                            const updateBranch = $("#branch_update_modal");
                            const updateBranchHeading = $("#branch_update_modal_heading");
                            const deleteBranch = $("#delete_branch_id");
                            const deleteBranchHeading = $("#delete_branch");
                            const deleteBranchBody = $("#delete_branch_body");
                            const deleteBranchConfirm = $("#delete_confrm_branch_id");
                            updateBranch.append(`<span class="">${response.messages.branch_name}</span>`);
                            updateBranchHeading.append(`<span class="">${response.messages.branch_name}</span>`);
                            deleteBranch.append(`<span class="">${response.messages.branch_id}</span>`);
                            deleteBranchHeading.append(`<span class="">${response.messages.branch_name}</span>`);
                            deleteBranchBody.append(`<span class="">${response.messages.branch_name}</span>`);
                            deleteBranchConfirm.append(`<span class="">${response.messages.branch_id}</span>`);

                        }, 1500);
                        
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

        // fetch branch type/category for dropdown
        function fetch_branch_types(){

            const currentUrl = "{{ route('search-branch-type.action') }}";

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
                    const branch_categories = response.branch_categories;
                    $("#branch_type").empty();
                    $("#branch_type").append('<option value="">Select Branch Category Name</option>');
                    $.each(branch_categories, function(key, item) {
                        $("#branch_type").append(`<option style="color:white;font-weight:600;" value="${item.branch_category_name}">${item.branch_category_name}</option>`);
                    });
                },
                error: function() {
                    $("#branch_type").empty();
                    $("#branch_type").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
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
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');

                            $('#savForm_error').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            
                            clearFields();
                            fetch_division();
                            fetch_district();
                            fetch_upazila();
                            searchBranch();
                        }, 1500);
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
                        $("#accessconfirmbranch").modal('show');
                        $("#updateconfirmbranch").modal('hide');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            
                            $('#updateForm_error').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            searchBranch();
                        }, 1500);
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
            $("#deletebranch").modal('hide');
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

        // Back delete modal
        $(document).on('click', '#cate_delete3, .delete_confrm_canl', function(e){
            e.preventDefault();
            $("#deletebranch").modal('show');
            $("#deleteconfirmbranch").modal('hide');
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
                    $("#accessconfirmbranch").modal('show');
                    $("#updateconfirmbranch").modal('hide');
                    $("#deletebranch").modal('hide').fadeOut();
                    $("#deleteconfirmbranch").modal('hide').fadeOut();
                    $("#pageLoader").removeAttr('hidden');
                    $("#access_modal_box").addClass('loader_area');
                    $("#processModal_body").removeClass('loading_body_area');

                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#pageLoader").attr('hidden', true);
                        $("#access_modal_box").removeClass('loader_area');
                        $("#processModal_body").addClass('loading_body_area');

                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                        $("#select_branch").val("").trigger('change');
                        $('#success_message').fadeIn();
                        clearFields();
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        
                        searchBranch();
                        
                    }, 1500);
                }
            });
        });

        // Create Branch Modal Show
        $(document).on('click', '#branchTypeModalView', function(e){
            e.preventDefault();
            $("#branchTypeCreateModal").modal('show');
            $("#branch_type_create").removeAttr('hidden');
            $("#branch_type_cancel").removeAttr('hidden');
            $("#branch_type_update").attr('hidden', true);
            $("#branch_type_delete").attr('hidden', true);
            fetch_branch_categories();
            const time = setTimeout(() => {
                requestAnimationFrame(() => {
                    removeAttributeOrClass([
                        {
                            selector: '.branch_type_head_title, .branch_type_head_btn, .branch_select_type, .branch_type_name, #branch_type_create, #branch_type_cancel',
                            type: 'class',
                            name: 'branch-skeleton'
                        }
                    ]);
                });
            }, 1000);
        });

        // Fetch Branch Category
        function fetch_branch_categories(){

            const currentUrl = "{{ route('search-branch-type.action') }}";

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
                    const branch_categories = response.branch_categories;
                    $("#branch_category_name").empty();
                    $("#branch_category_name").append('<option value="">Select Branch Category Name</option>');
                    $.each(branch_categories, function(key, item) {
                        $("#branch_category_name").append(`<option style="color:white;font-weight:600;" value="${item.branch_category_name}">${item.branch_category_name}</option>`);
                    });
                },
                error: function() {
                    $("#branch_category_name").empty();
                    $("#branch_category_name").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Validation Clear
        $(document).on('keyup', '#branchTypeName', function(){
            var selectedVal = $(this).val();
            if(selectedVal !== ''){
                $("#savForm_error_branch").attr('hidden', true);
                $('#branchTypeName').removeClass('is-invalid');
            }
        });
        $(document).on('click', '.branch_type_head_btn, #branch_type_cancel', function(){
            $("#savForm_error_branch").attr('hidden', true);
            $("#updateForm_error_branch").attr('hidden', true);
            $('#branchTypeName').removeClass('is-invalid');
            $('#branchTypeName').val("");
        });
        
        // Refresh Button
        $(document).on('keyup', '#branchTypeRefresh', function(){
            fetch_division();
            fetch_district();
            fetch_upazila();
            searchBranch();
            fetch_branch_types();
        });

        // Search Branch Category
        $(document).on('change', '#branch_category_name', function(e){
            e.preventDefault();
            $("#delete_label").empty();
            $("#Heading").empty();
            var selectID = $(this).val();

            // Button Show Or Hide
            if(selectID == ''){
                $("#branch_type_create").removeAttr('hidden');
                $("#branch_type_cancel").removeAttr('hidden');
                $("#branch_type_update").attr('hidden', true);
                $("#branch_type_delete").attr('hidden', true);
                $('#branchTypeName').val("");
                $("#updateForm_error_branch").attr('hidden', true);
                $("#savForm_error_branch").attr('hidden', true);
                $('#branchTypeName').removeClass('is-invalid');
            }else if(selectID !== ''){
                var id = selectID;
            }
            $.ajax({
                type: "GET",
                url: "/company/branch-type-edit/" + id,
                success: function(response){
                    if(response.status == 404){
                        $('#success_message').html("");
                        // $('#success_message').addClass('alert alert-danger');
                        // $('#success_message').text(response.messages);
                    }else if(response.status == 200){
                        $("#branchTypeCreateModal").modal('hide');
                        $("#accessconfirmbranch").modal('show');
                        $("#dataPullingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        $("#savForm_error_branch").attr('hidden', true);
                        $('#branchTypeName').removeClass('is-invalid');

                        setTimeout(() => {
                            $("#branchTypeCreateModal").modal('show');
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $("#branch_type_update").removeAttr('hidden');
                            $("#branch_type_delete").removeAttr('hidden');
                            $("#branch_type_create").attr('hidden', true);
                            $("#branch_type_cancel").attr('hidden', true);
                            $("#branch_type_update").fadeIn();
                            $("#branch_type_delete").fadeIn();
                            const messages = response.messages;
    
                            $('#branch_category_id').val(id);
                            $('#branch_delete_category_id').val(id);
                            $('.edit_branch_category_name').val(response.messages.branch_category_name);
                            const branchCategory = $("#delete_label");
                            const branchCategoryHeading = $("#Heading");
                            branchCategory.append(`<span class="">${response.messages.branch_category_name}</span>`);
                            branchCategoryHeading.append(`<span class="">${response.messages.branch_category_name}</span>`);
                        }, 1500);
                        
                    }
                    
                }
            });
        });

        // Create Branch Type
        $(document).on('click', '#branch_type_create', function(e){
            e.preventDefault();
            
            $("#savForm_error_branch").removeAttr('hidden');
            var data = {
                'branch_category_name' : $("#branchTypeName").val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[ name ="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('branch_type.store') }}",
                data: data,
                dataType: "json",
                success : function(response){
                    if(response.status == 400){
                        $.each(response.errors, function(key, err_value){
                            $("#savForm_error_branch").fadeIn();
                            $('#savForm_error_branch').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                            $("#savForm_error_branch").addClass("alert_show_errors");
                            $('#branchTypeName').addClass('is-invalid');
                            $('#branchTypeName').html("");
                        });
                    }else{
                        $("#branchTypeCreateModal").modal('hide');
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');

                            $('#savForm_error').html("");
                            $('#success_message').html("");
                            $('#branchTypeName').val("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            
                            fetch_branch_categories();
                            fetch_branch_types();
                        }, 1500);
                    }
                }
            })
        });

        // Update Branch Type
        $(document).on('click', '#branch_type_update', function(e){
            e.preventDefault();
            $("#updateForm_error_branch").removeAttr('hidden');

            var id = $("#branch_category_id").val();
            var data = {
                'branch_category_name' : $(".edit_branch_category_name").val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[ name ="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/company/branch-type-update/" + id,
                data: data,
                dataType: "json",
                success : function(response){
                    if(response.status == 400){
                        $.each(response.errors, function(key, err_value){
                            $("#updateForm_error_branch").fadeIn();
                            $('#updateForm_error_branch').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                            $("#updateForm_error_branch").addClass("alert_show_errors");
                            $('#branchTypeName').addClass('is-invalid');
                            $('#branchTypeName').html("");
                        });
                    }else{
                        $("#accessconfirmbranch").modal('show');
                        $("#branchTypeCreateModal").modal('hide');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            
                            $('#updateForm_error_branch').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            $(".edit_branch_category_name").val("");
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_branch_categories();
                            fetch_branch_types();
                        }, 1500);
                    }
                }
            })

        });

        // Delete Branch Type Confirm Delete Modal Show
        $(document).on('click', '#branch_type_delete', function(e){
            e.preventDefault();
            $("#branchTypeDeleteModal").modal('show');
            $("#branchTypeCreateModal").modal('hide');

            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    { selector: '.branch_type_head_delete_btn, .branch_type_head_delete, .branch_category_name', type: 'class', name: 'branch-skeleton' },
                    { selector: '#branch_type_delete_cancel, #branch_type_delete_confirm', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            };

        });

        // Back Branch Type Modal
        $(document).on('click', '#branch_type_delete_cancel, .branch_type_head_delete_btn', function(e){
            e.preventDefault();
            $("#branchTypeDeleteModal").modal('hide');
            $("#branchTypeCreateModal").modal('show');

        });

        // Confirm Delete Branch Category
        $(document).on('click', '#branch_type_delete_confirm', function(e){
            e.preventDefault();
            var id = $("#branch_delete_category_id").val();

            $.ajaxSetup({
                headrs:{
                    'X-CSRF-TOKEN': $('meta[name ="csrf_token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/company/branch-type-delete/" + id,
                success: function(response){
                    $("#accessconfirmbranch").modal('show');
                    $("#branchTypeDeleteModal").modal('hide');
                    $("#branchTypeCreateModal").modal('hide');
                    $("#pageLoader").removeAttr('hidden');
                    $("#access_modal_box").addClass('loader_area');
                    $("#processModal_body").removeClass('loading_body_area');

                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#pageLoader").attr('hidden', true);
                        $("#access_modal_box").removeClass('loader_area');
                        $("#processModal_body").addClass('loading_body_area');

                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $("#branch_category_name").val("").trigger('change');
                        $(".edit_branch_category_name").val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        
                        fetch_branch_categories();
                        fetch_branch_types();
                    }, 1500);
                }
            });
        });

    });
</script>