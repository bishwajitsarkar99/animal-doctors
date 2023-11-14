<script>
    $(document).ready(function(){
        $(".ser_btn").on('click', () => {
            $('.search-icon').removeClass('search-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Search...');
            setTimeout(() => {
                $('.search-icon').addClass('search-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Search');
            }, 3000);
        });
    });
</script>