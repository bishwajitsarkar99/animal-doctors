<script>
    $(document).ready(function(){
        $("#productAdd").show();
        $("#productUpdate").hide();

        $("#show_product_form").on('click', ()=>{
            $("#product_post_modal").modal('show');
        });
        // Cancel Button-----
        $("#cancel_productBtn").on('click', ()=>{
            $("#productAdd").toggle('slow');
            $("#productUpdate").toggle('slow');
        });
    }); 
</script>