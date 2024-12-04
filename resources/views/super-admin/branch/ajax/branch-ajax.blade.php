<script type="module">
    import { buttonLoader } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    $(document).ready(function(){
        // Initialize the button loader for the login button
        buttonLoader('#save', '.add-icon', '.add-btn-text', 'ADD...', 'ADD', 3000);
        buttonLoader('#update_btn', '.update-icon', '.update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#update_btn_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm...', 'Confirm', 1000);
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

        //fetch_branch_search_data();

        // Create Branch
        $(document).on('click', '#save', function(e){
            e.preventDefault();

            var data = {
                'branch_id' : $("#branch_id").val(),
                'branch_name' : $("#branchName").val(),
                'branch_type' : $("#branch_type").val(),
                'division_name' : $("#select_division").val(),
                'district_name' : $("#select_district").val(),
                'upazila_name' : $("#select_upazila").val(),
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
                            $("#branch_type").addClass("is-invalid");
                            $("#select_division").addClass("is-invalid");
                            $("#select_district").addClass("is-invalid");
                            $("#select_upazila").addClass("is-invalid");
                            $("#townName").addClass("is-invalid");
                            $("#location").addClass("is-invalid");
                            $("#savForm_error").addClass("alert_show_errors");
                            $("#savForm_error").apend('<span class="error_val">' + err_value + '</span>');
                            $("#savForm_error").fadeIn();
                        });
                    }else{
                        $('#savForm_error').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        clearFields();
                        // setTimeout(() => {
                        //     $('#success_message').fadeOut(3000);
                        // }, 5000);
                        //fetch_branch_search_data();
                    }
                }
            })
        });

        // Input Field Clear
        function clearFields(){
            $("#branch_id").val("");
            $("#branchName").val("");
            $("#branch_type").empty();
            $("#select_division").empty();
            $("#select_district").empty();
            $("#select_upazila").empty();
            $("#townName").val("");
            $("#location").val("");
        }
    });
</script>