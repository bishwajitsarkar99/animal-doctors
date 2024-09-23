<script>
    $(document).ready(function(){
        // Home Tab
        $(document).on('click', '#tabHome', function() {
            $("#showCard").attr('hidden', true);
            $("#loaderShow").removeClass('loader-show');
            setTimeout(() => {
                $("#showCard").removeAttr('hidden');
                $("#loaderShow").addClass('loader-show');
            }, 800);
        });
        // User Details Tab
        $(document).on('click', '#tabDetails', function() {
            $("#userDetails").attr('hidden', true);
            $("#loaderShow").removeClass('loader-show');
            setTimeout(() => {
                $("#userDetails").removeAttr('hidden');
                $("#loaderShow").addClass('loader-show');
            }, 800);
    
        });
        // User Activity Tab
        $(document).on('click', '#tabActivity', function(){
            $("#userActivity").attr('hidden', true);
            $("#loaderShow").removeClass('loader-show');
            setTimeout(() => {
                $("#userActivity").removeAttr('hidden');
                $("#loaderShow").addClass('loader-show');
            }, 800);
            
        }); 
    });
</script>