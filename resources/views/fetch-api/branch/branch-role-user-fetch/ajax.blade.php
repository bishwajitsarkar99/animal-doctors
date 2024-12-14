<script>
    $(document).ready(function(){

        // Fetch Only Role
        window.fetch_role = function() {
            const currentUrl = "{{ route('fetch_role.action') }}";

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
                    $("#select_role, #role_id").empty();
                    $("#select_role, #role_id").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(roles, function(key, item) {
                        $("#select_role, #role_id").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_role, #role_id").empty();
                    $("#select_role, #role_id").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Handle Select only role
        $(document).on('change', '#select_role, #role_id', function() {
            var changeValue = $(this).val();
            var changeValue2 = $("#role_id").val();
            if (changeValue === '') {
                $("#select_email").empty();
                $("#select_email").empty();
                $("#select_email").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
            if (changeValue2 === '') {
                $("#email_id").empty();
                $("#email_id").empty();
                $("#email_id").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });

        // Event listener for only role dropdown
        $(document).on('change', '#select_role, #role_id', function() {
            const selectedRole = $("#select_role, #role_id").val();
            fetch_user_email(selectedRole);
        });

        // Function to fetch only user email
        window.fetch_user_email = function(selectedRole, callback) {
            if (!selectedRole) {
                return;
            }

            const currentUrl = "{{ route('fetch_email.action', ':selectedRole') }}".replace(':selectedRole', selectedRole);

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
                    const districts = response.users;
                    $("#select_email, #email_id").empty();
                    $.each(users, function(key, item) {
                        $("#select_email, #email_id").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.email}</option>`);
                    });
                    if (typeof callback === 'function') {
                        callback();
                    }
                },
                error: function() {
                    $("#select_email, #email_id").empty();
                    $("#select_email, #email_id").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select district</option>');
                }
            });
        }

        // Fetch Role One Part
        window.fetch_role_one = function() {
            const currentUrl = "{{ route('fetch_role.action') }}";

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
                    $("#select_role_one").empty();
                    $("#select_role_one").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(roles, function(key, item) {
                        $("#select_role_one").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_role_one").empty();
                    $("#select_role_one").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Handle Select One Part role
        $(document).on('change', '#select_role_one', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_email_one").empty();
                $("#select_email_one").empty();
                $("#select_email_one").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });

        // Event listener for One Part role dropdown
        $(document).on('change', '#select_role_one', function() {
            const selectedRoleOne = $(this).val();
            fetch_user_email_one(selectedRoleOne);
        });

        // Function to fetch user email_one
        window.fetch_user_email_one = function(selectedRoleOne, callback) {
            if (!selectedRoleOne) {
                return;
            }

            const currentUrl = "{{ route('fetch_email_one.action', ':selectedRoleOne') }}".replace(':selectedRoleOne', selectedRoleOne);

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
                    $("#select_email_one").empty();
                    $.each(users, function(key, item) {
                        $("#select_email_one").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.email}</option>`);
                    });
                    if (typeof callback === 'function') {
                        callback();
                    }
                },
                error: function() {
                    $("#select_email_one").empty();
                    $("#select_email_one").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select district</option>');
                }
            });
        }

        // Fetch Role Two Part
        window.fetch_role_two = function() {
            const currentUrl = "{{ route('fetch_role.action') }}";

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
                    $("#select_role_two").empty();
                    $("#select_role_two").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(roles, function(key, item) {
                        $("#select_role_two").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_role_two").empty();
                    $("#select_role_two").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Handle Select Two Part role
        $(document).on('change', '#select_role_two', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_email_two").empty();
                $("#select_email_two").empty();
                $("#select_email_two").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });

        // Event listener for Two Part role dropdown
        $(document).on('change', '#select_role_two', function() {
            const selectedRoleTwo = $(this).val();
            fetch_user_email_two(selectedRoleTwo);
        });

        // Function to fetch user email_two
        window.fetch_user_email_two = function(selectedRoleTwo, callback) {
            if (!selectedRoleTwo) {
                return;
            }

            const currentUrl = "{{ route('fetch_email_two.action', ':selectedRoleTwo') }}".replace(':selectedRoleTwo', selectedRoleTwo);

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
                    $("#select_email_two").empty();
                    $.each(users, function(key, item) {
                        $("#select_email_two").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.email}</option>`);
                    });
                    if (typeof callback === 'function') {
                        callback();
                    }
                },
                error: function() {
                    $("#select_email_two").empty();
                    $("#select_email_two").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select district</option>');
                }
            });
        }

        fetch_role();
        fetch_role_one();
        fetch_role_two();
        fetch_user_email();
        fetch_user_email_one();
        fetch_user_email_two();

    });
</script>