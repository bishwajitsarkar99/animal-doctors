<script>
    $(document).ready(() => {
        // Add-Button Loader
        $(".add_btn").on('click', () => {
            $('.add-icon').removeClass('add-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Add Permission...');
            setTimeout(() => {
                $('.add-icon').addClass('add-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Add Permission');
            }, 3000);
        });
        // Back-Button Loader
        
        $(".back_btn").on('click', () => {
            $('.back-icon').removeClass('back-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Back...');
            setTimeout(() => {
                $('.back-icon').addClass('back-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Back');
            }, 3000);
        });
        // Submit-Button Loader
        $(".subm_btn").on('click', () => {
            $('.submt-icon').removeClass('submt-hidden');
            $(this).attr('disabled', true);
            // $('.btn-text').text('Submit...');
            $("#update_message").fadeIn();
            setTimeout(() => {
                $('.submt-icon').addClass('submt-hidden');
                $(this).attr('disabled', false);
                // $('.btn-text').text('Submit');
                $("#update_message").fadeOut();
            }, 3000);
        });
        // Edit Back-Button Loader
        $(".edit_back").on('click', () => {
            $('.edit-back-icon').removeClass('edit-back-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Back...');
            setTimeout(() => {
                $('.edit-back-icon').addClass('edit-back-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Back');
            }, 3000);
        });
        // Edit Back-Button Loader
        $(".update_btn").on('click', () => {
            $('.update-icon').removeClass('update-hidden');
            $(this).attr('disabled', true);
            // $('.btn-text').text('Back...');
            setTimeout(() => {
                $('.update-icon').addClass('update-hidden');
                $(this).attr('disabled', false);
                $("#update_message").fadeOut();
            }, 3000);
        });
        
    });
</script>
<script>
    // skeleton
    function fetchData() {
        const allSkeleton = document.querySelectorAll('.skeleton')

        allSkeleton.forEach(item => {
            item.classList.remove('skeleton')
        });
    }

    setTimeout(() => {
        fetchData();
    }, 1000);
</script>