<script>
    $(document).ready(function(){
        // Supplier ID
        fetch_suppliers();
        fetch_roles();
        fetch_medicine_group();
        fetch_medicine_dosage();
        fetch_medicine_origin();
        fetch_medicine_names();
        // Function to fetch roles
        function fetch_suppliers() {
            const currentUrl = "{{ route('inventory_details.action') }}";

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
                    const supplier = response.suppliers;
                    $("#select_supplier_id").empty();
                    $("#select_supplier_id").append('<option value="" style="color:darkgreen;font-weight:600;">Select Supplier</option>');
                    $.each(supplier, function(key, item) {
                        $("#select_supplier_id").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_supplier_id").empty();
                    $("#select_supplier_id").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_roles() {
            const currentUrl = "{{ route('inventory_details.action') }}";

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
                    const role = response.roles;
                    $("#select_user_id").empty();
                    $("#select_user_id").append('<option value="" style="color:darkgreen;font-weight:600;">Select Role</option>');
                    $.each(role, function(key, item) {
                        $("#select_user_id").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.name}</option>`);
                    });
                },
                error: function() {
                    $("#select_user_id").empty();
                    $("#select_user_id").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_medicine_group() {
            const currentUrl = "{{ route('inventory_details.action') }}";

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
                    const group = response.medicine_groups;
                    $("#select_medicine_group").empty();
                    $("#select_medicine_group").append('<option value="" style="color:darkgreen;font-weight:600;">Select Group</option>');
                    $.each(group, function(key, item) {
                        $("#select_medicine_group").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.group_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_medicine_group").empty();
                    $("#select_medicine_group").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_medicine_dosage() {
            const currentUrl = "{{ route('inventory_details.action') }}";

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
                    const dosage = response.medicine_dosages;
                    $("#select_medicine_dosage").empty();
                    $("#select_medicine_dosage").append('<option value="" style="color:darkgreen;font-weight:600;">Select Dosage</option>');
                    $.each(dosage, function(key, item) {
                        $("#select_medicine_dosage").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.medicine_names ? item.medicine_names.medicine_name : ''} -${item.dosage}</option>`);
                    });
                },
                error: function() {
                    $("#select_medicine_dosage").empty();
                    $("#select_medicine_dosage").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_medicine_origin() {
            const currentUrl = "{{ route('inventory_details.action') }}";

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
                    const origin = response.medicine_origins;
                    $("#select_medicine_origin").empty();
                    $("#select_medicine_origin").append('<option value="" style="color:darkgreen;font-weight:600;">Select Origin</option>');
                    $.each(origin, function(key, item) {
                        $("#select_medicine_origin").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.origin_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_medicine_origin").empty();
                    $("#select_medicine_origin").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        function fetch_medicine_names() {
            const currentUrl = "{{ route('inventory_details.action') }}";

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
                    const medicine = response.medicine_names;
                    $("#select_medicine_name").empty();
                    $("#select_medicine_name").append('<option value="" style="color:darkgreen;font-weight:600;">Select Medicine</option>');
                    $.each(medicine, function(key, item) {
                        $("#select_medicine_name").append(`<option style="color:black;font-weight:600;" value="${item.id}">${item.medicine_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_medicine_name").empty();
                    $("#select_medicine_name").append('<option style="color:black;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
    });
</script>