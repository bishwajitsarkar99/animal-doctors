<script>
    $(document).ready(function(){
        $(document).load("click",".update_btn", function(){
            $("#success_message").fadeIn();
            setTimeout(() => {
                $("#success_message").fadeOut();
            }, 3000);
        });
    });

    
</script>