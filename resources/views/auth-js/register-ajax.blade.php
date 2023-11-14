<script>
    //Register
    $(document).ready(function(){
        $(document).load("click","#reg_submit", ()=>{
            $("#success_message").fadeIn();
            setTimeout(() => {
                $("#success_message").fadeOut();
            }, 3000);
        });
    });
</script>