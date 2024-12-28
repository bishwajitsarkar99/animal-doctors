<script>
    $(document).ready(function(){
        // show permission templete modal
        $(document).on('click', '#showPermission', function(e){
            e.preventDefault();
            $("#permissionModalTemplete").modal('show');
        });
    });
</script>