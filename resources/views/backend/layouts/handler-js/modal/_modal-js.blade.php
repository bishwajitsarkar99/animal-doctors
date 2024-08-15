<script>
    $(document).ready(function() {

        $(document).on('click', '#logout_click', function(e) {
            e.preventDefault();
            $("#loader_modal").modal('show');
            $("#logout_form").modal('show');
            $("#admin_filip").addClass('fa-thin fa-square fa-flip');
            $(".pro_image").addClass('logout-img-skeleton');
            $("#logout_text_message").addClass('logout-msg-skeleton');
            $('.logout-modal-title').addClass('logout-title-skeleton');
            $("#logoutCancel").addClass('logout-cancel-skeleton');
            $('#logout_btn_group').addClass('logout-btn-skeleton');
            $('#logout_btn_group2').addClass('logout-btn-skeleton');
            $(".loader-login").removeClass('close_loader_modal');

            var time = null;
            time = setTimeout(() => {
                $("#loader_modal").modal('hide');
                $(".pro_image").removeClass('logout-img-skeleton');
                $("#logout_text_message").removeClass('logout-msg-skeleton');
                $('.logout-modal-title').removeClass('logout-title-skeleton');
                $("#logoutCancel").removeClass('logout-cancel-skeleton');
                $('#logout_btn_group').removeClass('logout-btn-skeleton');
                $('#logout_btn_group2').removeClass('logout-btn-skeleton');
                $(".loader-login").addClass('close_loader_modal');
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
    });
</script>
