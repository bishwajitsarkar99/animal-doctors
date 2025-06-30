<script>
    $(document).ready(function(){
        // sidebar Action
        $(document).on('click', '.load-page', function(){
            // Product
            $('#flush-collapseOne').collapse('hide');
            // Stock
            $('#flush-collapse').collapse('hide');
            // Leger
            $('#flush-collapse1').collapse('hide');
            // Sales
            $('#flush-collapse2').collapse('hide');
            // Vaoucher
            $('#flush-collapse3').collapse('hide');
            // Asset
            $('#asset_documentioin').collapse('hide');
            // Report
            $('#flush-collapse4').collapse('hide');
            // HRM
            $('#flush-collapse5').collapse('hide');
            // Auth
            $('#Auth').collapse('hide');
            // Layouts
            $('#collapseLayouts').collapse('hide');
            // ForntEnd
            $('#components').collapse('hide');
            // Setting
            $('#addons').collapse('hide');
        });
        $(document).off("click", ".accordion-button").on("click", ".accordion-button", function () {
            let arrowIcon = $(this).find(".sb-sidenav-accordion-collapse-arrow");
            // Toggle the rotation class
            arrowIcon.toggleClass("accordion-rotate-icon");
        });
        // component
        $(document).off("click", ".compontent-btn").on("click", ".compontent-btn", function () {
            let arrowIcon = $(this).find(".sb-sidenav-collapse-arrow");
            // Toggle the rotation class
            arrowIcon.toggleClass("rotate-icon");
        });
        document.querySelectorAll('.side-bar-link').forEach(link => {
            link.addEventListener('click', function(e){
                e.preventDefault();
                const url = this.getAttribute('data-url');
                if(url){
                    window.location.href = url;
                }
            });
        });
    });
</script>