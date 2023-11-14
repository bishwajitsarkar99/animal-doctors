<script>
    $(document).ready(function(){
        $("#animalAdd").show();
        $("#animalUpdate").hide();

        $("#show_animal_form").on('click', ()=>{
            $("#animal_post_modal").modal('show');
        });
        // Cancel Button-----
        $("#cancel_animalBtn").on('click', ()=>{
            $("#animalAdd").toggle('slow');
            $("#animalUpdate").toggle('slow');
        });
    }); 
</script>