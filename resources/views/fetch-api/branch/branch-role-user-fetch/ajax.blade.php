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
                    $("#select_role").empty();
                    $("#select_role").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(roles, function(key, item) {
                        $("#select_role").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_role").empty();
                    $("#select_role").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Fetch Only Role for user branch access
        window.fetch_branch_roles = function() {
            const currentUrl = "{{ route('fetch_branch_role.action') }}";

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
                    const branch_roles = response.branch_roles;
                    $("#role_id").empty();
                    $("#role_id").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(branch_roles, function(key, item) {
                        $("#role_id").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#role_id").empty();
                    $("#role_id").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Fetch Only Role for user branch change
        window.fetch_branch_change = function() {
            const currentUrl = "{{ route('fetch_branch_role.action') }}";

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
                    const branch_roles = response.branch_roles;
                    $("#branch_role_id").empty();
                    $("#branch_role_id").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(branch_roles, function(key, item) {
                        $("#branch_role_id").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#branch_role_id").empty();
                    $("#branch_role_id").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Handle Select only role
        $(document).on('change', '#select_role', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_email").empty();
                $("#select_email").empty();
                $("#select_email").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });

        // Event listener for only role dropdown
        $(document).on('change', '#select_role', function() {
            const selectedRole = $("#select_role").val();
            fetch_user_email(selectedRole);
        });

        // Handle Select only role for branch
        // $(document).on('change', '#role_id', function() {
        //     var changeValue = $(this).val();
        //     if (changeValue === '') {
        //         $("#email_id").empty();
        //         $("#email_id").empty();
        //         $("#email_id").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
        //     }
        // });

        // Event listener for only for branch
        // $(document).on('change', '#role_id', function() {
        //     const selectedRole = $(this).val();
        //     fetch_branch_emails(selectedRole);
        // });

        // Handle Select only role for branch
        $(document).on('change', ' #branch_role_id', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#branch_email_id").empty();
                $("#branch_email_id").empty();
                $("#branch_email_id").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });

        // Event listener for only for branch
        $(document).on('change', '#branch_role_id', function() {
            const selectedRole = $(this).val();
            fetch_branch_change_email(selectedRole);
        });

        // Function to fetch only user email === #email_id, 
        window.fetch_branch_emails = function(selectedRole, callback) {
            if (!selectedRole) {
                return;
            }

            const currentUrl = "{{ route('fetch_branch_email.action', ':selectedRole') }}".replace(':selectedRole', selectedRole);

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
                    $("#branch_email_id").empty();
                    $.each(users, function(key, item) {
                        $("#branch_email_id").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.login_email}</option>`);
                    });
                    if (typeof callback === 'function') {
                        callback();
                    }
                },
                error: function() {
                    $("#branch_email_id").empty();
                    $("#branch_email_id").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select district</option>');
                }
            });
        }

        // Function to fetch only user email
        window.fetch_branch_change_email = function(selectedRole, callback) {
            if (!selectedRole) {
                return;
            }

            const currentUrl = "{{ route('fetch_branch_email.action', ':selectedRole') }}".replace(':selectedRole', selectedRole);

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
                    $("#branch_email_id").empty();
                    $.each(users, function(key, item) {
                        $("#branch_email_id").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.login_email}</option>`);
                    });
                    if (typeof callback === 'function') {
                        callback();
                    }
                },
                error: function() {
                    $("#branch_email_id").empty();
                    $("#branch_email_id").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select district</option>');
                }
            });
        }

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
                    const users = response.users;
                    $("#select_email").empty();
                    $.each(users, function(key, item) {
                        $("#select_email").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.email}</option>`);
                    });
                    if (typeof callback === 'function') {
                        callback();
                    }
                },
                error: function() {
                    $("#select_email").empty();
                    $("#select_email").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select district</option>');
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

        // Fetch Role One Part
        window.fetch_admin_access_role = function() {
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
                    $("#admin_roleID").empty();
                    $("#admin_roleID").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(roles, function(key, item) {
                        $("#admin_roleID").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#admin_roleID").empty();
                    $("#admin_roleID").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
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

        // Handle Select Admin Role Access Part role
        $(document).on('change', '#admin_roleID', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#admin_emailID").empty();
                $("#admin_emailID").empty();
                $("#admin_emailID").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });

        // Event listener for One Part role dropdown
        $(document).on('change', '#select_role_one', function() {
            const selectedRoleOne = $(this).val();
            fetch_user_email_one(selectedRoleOne);
        });

        // Event listener for One Part role dropdown
        $(document).on('change', '#admin_roleID', function() {
            const selectedRoleAdmin = $(this).val();
            fetch_admin_email_access(selectedRoleAdmin);
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
                        $("#select_email_one").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.login_email}</option>`);
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

        // Function to fetch user email_one
        window.fetch_admin_email_access = function(selectedRoleAdmin, callback) {
            if (!selectedRoleAdmin) {
                return;
            }

            const currentUrl = "{{ route('fetch_email_one.action', ':selectedRoleAdmin') }}".replace(':selectedRoleAdmin', selectedRoleAdmin);

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
                    $("#admin_emailID").empty();
                    $.each(users, function(key, item) {
                        $("#admin_emailID").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.login_email}</option>`);
                    });
                    if (typeof callback === 'function') {
                        callback();
                    }
                },
                error: function() {
                    $("#admin_emailID").empty();
                    $("#admin_emailID").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select district</option>');
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

        fetch_branch_roles();
        fetch_branch_emails();
        fetch_role();
        fetch_role_one();
        fetch_role_two();
        fetch_user_email();
        fetch_user_email_one();
        fetch_user_email_two();
        fetch_branch_change_email();
        fetch_branch_change();
        fetch_admin_access_role();
        fetch_admin_email_access();

    });
</script>