<script>
    $(document).ready(function(){
        // Get Roles For Fetch
        fetch_roles();

        // Function to fetch roles
        function fetch_roles() {
            const currentUrl = "{{ route('inventory-auth') }}";

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
                    const roles = response.roles;
                    $("#select_roles").empty();
                    $("#select_roles").append('<option value="" style="color:darkgreen;font-weight:600;">Select Role</option>');
                    $.each(roles, function(key, item) {
                        $("#select_roles").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_roles").empty();
                    $("#select_roles").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Event listener for role dropdown
        $(document).on('change', '#select_roles', function() {
            const selectedRole = $(this).val();
            if(selectedRole !=''){
                $("#select_user").addClass('select-box-animation');
                $(".search_display").addClass('select-box-animation');
                $(".email_box").removeAttr('hidden');
                $(".search_display").removeAttr('hidden');
                $("#skeletoneID").addClass('select-user-skeletone');
                $("#srchSkeletone").addClass('skeleton');

                setTimeout(() => {
                    $('#skeletoneID').fadeIn();
                    $("#skeletoneID").removeClass('select-user-skeletone');
                    $("#srchSkeletone").removeClass('skeleton');
                }, 500);
            }
            else{
                $("#select_user").removeClass('select-box-animation');
                $(".search_display").removeClass('select-box-animation');
                $(".email_box").attr('hidden', true);
                $(".search_display").attr('hidden', true);
                $(".issue_box").attr('hidden', true);
                $(".button_box").attr('hidden', true);
                $("#pageData").attr('hidden', true);
                $("#pageData2").attr('hidden', true);
                $("#pageData3").attr('hidden', true);
                $("#pageData4").attr('hidden', true);
                $("#pageData5").attr('hidden', true);
                $("#pageData6").attr('hidden', true);
                $("#pageData7").attr('hidden', true);
                $("#inventoryID").val("");
                $('.error-message').remove();
                
            }
            fetch_user_email(selectedRole);
        });

        // Function to fetch users based on selected role
        function fetch_user_email(selectedRole) {
            const currentUrl = "{{ route('auth-role.action', ':selectedRole') }}".replace(':selectedRole', selectedRole);

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
                    const users = response.users;
                    $("#select_users").empty();
                    $.each(users, function(key, item) {
                        $("#select_users").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.email}</option>`);
                    });
                },
                error: function() {
                    $("#select_users").empty();
                    $("#select_users").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select the role</option>');
                }
            });
        }
        // Permission Table Role Filter
        $(document).on('change', '#filter_select_role', function() {

            var roleValue = $(this).val();
            // Set the values for the options
            $("#option_value3").val('null');
            $("#option_value4").val(1);
            $("#option_value6").val(0);

            // Get the values for the condition check
            var pendingValue = $("#option_value3").val();
            var authorizeValue = $("#option_value4").val();
            var denyValue = $("#option_value6").val();

            if (roleValue != '' && pendingValue != '' && authorizeValue != '' && denyValue != '') {
                $("#strDate").removeAttr('hidden');
                $("#enDate").removeAttr('hidden');
                $("#option_value3").removeAttr('hidden');
                $("#option_value4").removeAttr('hidden');
                $("#option_value6").removeAttr('hidden');
                $(".filter_select_role").addClass('select-box-animation');
                $("#select_permission_status").addClass('select-box-animation2');
                
            } else {
                $("#strDate").attr('hidden', true);
                $("#enDate").attr('hidden', true);
                $("#option_value3").attr('hidden', true);
                $("#option_value4").attr('hidden', true);
                $("#option_value6").attr('hidden', true);
                $("#option_value3").val('');
                $("#option_value4").val('');
                $("#option_value6").val('');
                $(".filter_select_role").removeClass('select-box-animation');
                $("#select_permission_status").removeClass('select-box-animation2');
            }
            
        });

    });
</script>