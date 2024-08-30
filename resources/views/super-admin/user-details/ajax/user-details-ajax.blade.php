<script>
    $(document).ready(function(){
        // Refresh Button
        $(document).on('click', '#refresh', function(){

            $(".refresh-icon").removeClass('refrsh-hidden');

            var time = null;
            time = setTimeout(() => {
                $(".refresh-icon").addClass('refrsh-hidden');
            }, 1000);

            return()=>{
                clearTimeout(time);
            }
        });
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
    
        // User Permission Tab
        // $(document).on('click', '#tabUserPermission', function(e) {
        //     e.preventDefault();
        //     var changeURL = '#';
        //     window.location.href = changeURL;
        //     $("#loaderShow").removeClass('loader-show');
        //     $("#createSupplier").attr('hidden', true);
        //         setTimeout(() => {
        //         $("#loaderShow").addClass('loader-show');
        //         $("#createSupplier").removeAttr('hidden');
        //     }, 800);
        // });  
    });
</script>