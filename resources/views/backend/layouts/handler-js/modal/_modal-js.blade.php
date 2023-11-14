<script>
    $(document).ready(function() {

        $(document).on('click', '#logout_click', function() {
            //console.log('hellow');
            $("#logout_form").modal('show');
            $("#admin_filip").addClass('fa-thin fa-square fa-flip');
            $(".pro_image").addClass('skeleton');
            $("#text_message").addClass('skeleton');
            $('.scan').addClass('skeleton');
            $("#canl").addClass('skeleton');
            $('#btn_group').addClass('skeleton');
            $('#btn_group2').addClass('skeleton');

            var time = null;
            time = setTimeout(() => {
                $(".pro_image").removeClass('skeleton');
                $("#text_message").removeClass('skeleton');
                $('.scan').removeClass('skeleton');
                $("#canl").removeClass('skeleton');
                $('#btn_group').removeClass('skeleton');
                $('#btn_group2').removeClass('skeleton');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
    });
</script>
