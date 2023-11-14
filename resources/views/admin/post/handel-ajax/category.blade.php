<script>
    $(document).ready(function(){
        $(document).load("click",".add_btn", ()=>{
            $("#success_message").fadeIn();
            setTimeout(() => {
                $("#success_message").fadeOut();
            }, 3000);
        });
    });
</script>