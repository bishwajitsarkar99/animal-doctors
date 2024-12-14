<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    $(document).ready(function(){
        fetch_role();
        fetch_user_email();
        searchBranch();
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if ($(this).attr('id') === 'search_branch') {
                $(this).select2({
                    placeholder: 'Select Company Branch Name',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'role_id') {
                $(this).select2({
                    placeholder: 'Select User Role',
                    allowClear: true
                });
            }else if ($(this).attr('id') === 'email_id') {
                $(this).select2({
                    placeholder: 'Select User Email',
                    allowClear: true
                });
            }
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#search_branch').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch...');
        });
        $('#role_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search role...');
        });
        $('#email_id').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search email...');
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
                    $("#search_branch").empty();
                    $("#search_branch").append('<option value="">Select Company Branch Name</option>');
                    $.each(all_branchs, function(key, item) {
                        $("#search_branch").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.branch_name}</option>`);
                    });
                },
                error: function() {
                    $("#search_branch").empty();
                    $("#search_branch").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Search Select Dropdown
        $(document).on('change', '#search_branch', function(e){
            e.preventDefault();
            var select = $(this).val();

            // Button Show Or Hide
            if(select !== ''){
                $('.edit_branch_id').attr('disabled', true);
                $('.edit_branch_name').attr('disabled', true);
                $('.edit_branch_type').attr('disabled', true);
                $('.edit_division_id').attr('disabled', true);
                $('.edit_district_id').attr('disabled', true);
                $('.edit_upazila_id').attr('disabled', true);
                $('.edit_town_name').attr('disabled', true);
                $('.edit_location').attr('disabled', true);
                $("#add").removeAttr('disabled');
            }
            if(select == ''){
                $('.edit_branch_id').attr('disabled', true);
                $('.edit_branch_name').attr('disabled', true);
                $('.edit_branch_type').attr('disabled', true);
                $('.edit_division_id').attr('disabled', true);
                $('.edit_district_id').attr('disabled', true);
                $('.edit_upazila_id').attr('disabled', true);
                $('.edit_town_name').attr('disabled', true);
                $('.edit_location').attr('disabled', true);
                $("#add").attr('disabled', true);
                clearFields();
            }

            // Search ID
            var id = select;
            
            $.ajax({
                type: "GET",
                url: "/company/branch-get-data/" + id,
                success: function(response){
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    }else if(response.status == 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#dataPullingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            
                            const messages = response.messages;
    
                            $('#branches_id').val(id);
                            $('.edit_branch_id').val(response.messages.branch_id);
                            $('.edit_branch_name').val(response.messages.branch_name);
                            $('.edit_branch_type').val(response.messages.branch_type);
                            $('.edit_division_id').val(response.messages.divisions.division_name);
                            $('.edit_district_id').val(response.messages.districts.district_name);
                            $('.edit_upazila_id').val(response.messages.thana_or_upazilas.thana_or_upazila_name);
                            $('.edit_town_name').val(response.messages.town_name);
                            $('.edit_location').val(response.messages.location);

                        }, 1500);
                        
                    }
                    
                }
            });
        });

        // Clear input field
        function clearFields(){
            $('#brnch_id').val("");
            $('#branch_type').val("");
            $('#branch_name').val("");
            $('#division_id').val("");
            $('#district_id').val("");
            $('#upazila_id').val("");
            $('#town_name').val("");
            $('#location').val("");
        }

        // Add Role and Email Modal
        $(document).on('click', '#add', function(e){
            e.preventDefault();
            // fetch_role();
            // fetch_user_email();
            $("#roleemailbranch").modal('show');
        });
    });
</script>