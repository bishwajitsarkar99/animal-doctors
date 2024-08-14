<script>
    $(document).ready(function() {

        $(document).on('click', '#logout_click', function(e) {
            e.preventDefault();
            $("#loader_modal").modal('show');
            $("#logout_form").modal('show');
            $("#admin_filip").addClass('fa-thin fa-square fa-flip');
            $(".pro_image").addClass('logout-img-skeleton');
            $("#text_message").addClass('skeleton');
            $('.scan').addClass('skeleton');
            $("#canl").addClass('skeleton');
            $('#btn_group').addClass('skeleton');
            $('#btn_group2').addClass('skeleton');
            $(".loader-login").removeClass('close_loader_modal');

            var time = null;
            time = setTimeout(() => {
                $("#loader_modal").modal('hide');
                $(".pro_image").removeClass('logout-img-skeleton');
                $("#text_message").removeClass('skeleton');
                $('.scan').removeClass('skeleton');
                $("#canl").removeClass('skeleton');
                $('#btn_group').removeClass('skeleton');
                $('#btn_group2').removeClass('skeleton');
                $(".loader-login").addClass('close_loader_modal');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
    });
</script>
