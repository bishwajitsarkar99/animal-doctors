<script>
    $(document).ready(function(){
        // Accounts-icon
        $(document).on('click', '.accBtn', function(){
            var $icon = $(this).find('.menu__icon');
            $icon.toggleClass('rotated');

        });
        // Report-icon
        $(document).on('click', '.reporBtn', function(){
            var $icon = $(this).find('.menu__icon');
            $icon.toggleClass('rotated');

        });
        // Stock-icon
        $(document).on('click', '.stckBtn', function(){
            var $icon = $(this).find('.menu__icon');
            $icon.toggleClass('rotated');

        });
        // Product-icon
        $(document).on('click', '.prodBtn', function(){
            var $icon = $(this).find('.menu__icon');
            $icon.toggleClass('rotated');

        });

    });
</script>