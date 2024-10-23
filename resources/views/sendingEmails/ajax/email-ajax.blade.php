<script>
    $(document).ready(function(){
        // Search modal
        $(document).on('click', '#email_search_page', function(e){
            e.preventDefault();
            $("#emailSearchModal").modal('show');
        });
        // Send modal
        $(document).on('click', '#email_send_page', function(e){
            e.preventDefault();
            $("#emailSendModal").modal('show');
        });
        // Directory modal
        $(document).on('click', '#file_directory_page', function(e){
            e.preventDefault();
            $("#fileDirectoryModal").modal('show');
        });
    });
</script>