<script>
    $(document).ready(function () {
        $('#data_search').on('click', function () {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            $.ajax({
                url: '{{ route("search-inventory.action") }}',
                type: 'GET',
                data: { start_date: startDate, end_date: endDate },
                success: function (response) {
                    var results = response.results;
                    $('#inventory_authorize_data_table').html(JSON.stringify(results));
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>