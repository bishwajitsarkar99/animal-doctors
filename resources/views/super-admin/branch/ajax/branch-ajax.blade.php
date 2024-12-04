<script>
    $(document).ready(function(){
        // Initialize Select2 for all elements with the 'select2' class
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if ($(this).attr('id') === 'branch_type') {
                $(this).select2({
                    placeholder: 'Select Branch Type',
                    allowClear: true
                });
            }
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#branch_type').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch type...');
        });

    });
</script>