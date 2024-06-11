<script>
    $(document).ready(function(){
        $(document).on('click', '#profile_urllinks', function(){
            $("#profile_form").modal('show');
            $("#pro_image").addClass('image-skeleton');
            $("#pro_para").addClass('image-skeleton');
            $("#pro_com_name").addClass('image-skeleton');
            $("#com_address").addClass('image-skeleton');
            $("#info").addClass('image-skeleton');
            $("#info2").addClass('image-skeleton');
            $("#info3").addClass('image-skeleton');
            $("#info4").addClass('image-skeleton');

            var time = null;
            time = setTimeout(() => {
                $("#pro_image").removeClass('image-skeleton');
                $("#pro_para").removeClass('image-skeleton');
                $("#pro_com_name").removeClass('image-skeleton');
                $("#com_address").removeClass('image-skeleton');
                $("#info").removeClass('image-skeleton');
                $("#info2").removeClass('image-skeleton');
                $("#info3").removeClass('image-skeleton');
                $("#info4").removeClass('image-skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.dropdown-toggle', ()=>{
            var time = null;
            $("#profileSkel").addClass('profile-skeletone');
            $("#logoutSkel").addClass('log-skeletone');
            $(".show-profile").attr('hidden', true);
            $(".show-prof").removeClass('display-skeletone');
            $(".show-logout").attr('hidden', true);
            $(".show-log").removeClass('display-skeletone');
            time = setTimeout(() => {
                $("#profileSkel").removeClass('profile-skeletone');
                $("#logoutSkel").removeClass('log-skeletone');
                $(".show-profile").removeAttr('hidden');
                $(".show-logout").removeAttr('hidden');
                $(".show-log").addClass('display-skeletone');
                $(".show-prof").addClass('display-skeletone');

            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
    });

</script>
