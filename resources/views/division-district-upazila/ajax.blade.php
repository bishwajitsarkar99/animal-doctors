<script>
    $(document).ready(function(){
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if($(this).attr('id') === 'select_division'){
                $(this).select2({
                    placeholder: 'Select Division',
                    allowClear: true
                });
            }else if($(this).attr('id') === 'select_district'){
                $(this).select2({
                    placeholder: 'Select District',
                    allowClear: true
                });
            }else if($(this).attr('id') === 'select_upazila'){
                $(this).select2({
                    placeholder: 'Select Upazila',
                    allowClear: true
                });
            }
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_division').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search division...');
        });
        $('#select_district').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search district...');
        });
        $('#select_upazila').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search upazila...');
        });

        fetch_division();
        fetch_district();
        fetch_upazila();

        function fetch_division() {
            const currentUrl = "{{ route('division.get') }}";

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
                    const division = response.division_range;
                    $("#select_division").empty();
                    $("#select_division").append('<option value="" style="font-weight:600;">Select User Role</option>');
                    $.each(division, function(key, item) {
                        $("#select_division").append(`<option style="color:white;font-weight:600;" value="${item.division_name}">${item.division_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_division").empty();
                    $("#select_division").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Handle Select Division
        $(document).on('change', '#select_division', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_district").empty();
                $("#select_upazila").empty();
                $("#select_district").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });

        // Event listener for division dropdown
        $(document).on('change', '#select_division', function() {
            const selectedDivision = $(this).val();
            fetch_district(selectedDivision);
        });

        // Handle Select District
        $(document).on('change', '#select_district', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_upazila").empty();
                $("#select_upazila").append('<option style="color:white;font-weight:600;" value="" disabled>Select upazila</option>');
            }
        });

        // Event listener for district dropdown
        $(document).on('change', '#select_district', function() {
            const selectedDistrict = $(this).val();
            $("#select_upazila").empty();
            fetch_upazila(selectedDistrict);
        });

        // Function to fetch district based on district name
        function fetch_district(selectedDivision) {
            if (!selectedDivision) {
                return;
            }

            const currentUrl = "{{ route('district.get', ':selectedDivision') }}".replace(':selectedDivision', selectedDivision);

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
                    const districts = response.district_range;
                    $("#select_district").empty();
                    $.each(districts, function(key, item) {
                        $("#select_district").append(`<option style="color:white;font-weight:600;" value="${item.district_name}">${item.district_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_district").empty();
                    $("#select_district").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select district</option>');
                }
            });
        }

        // Function to fetch upazila based on upazila name
        function fetch_upazila(selectedDistrict) {
            if (!selectedDistrict) {
                return;
            }

            const currentUrl = "{{ route('upazila.get', ':selectedDistrict') }}".replace(':selectedDistrict', selectedDistrict);

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
                    const upazilas = response.upazila_range;
                    $("#select_upazila").empty();
                    $.each(upazilas, function(key, item) {
                        $("#select_upazila").append(`<option style="color:white;font-weight:600;" value="${item.district_name}">${item.thana_or_upazila_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_upazila").empty();
                    $("#select_upazila").append('<option style="color:red;font-weight:600;" value="" style="color:red;font-weight:600;" selected>Select upazila</option>');
                }
            });
        }

    });
</script>