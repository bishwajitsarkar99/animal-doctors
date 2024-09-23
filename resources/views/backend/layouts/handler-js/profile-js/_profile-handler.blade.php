<script type="module">
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    $(document).ready(function(){
        $(document).on('click', '#profile_urllinks', function(e){

            e.preventDefault();
            $("#loader_profile_modal").modal('show').fadeIn(300).delay(300);
            $("#profile_form").modal('show').fadeIn(300).delay(300);

            addAttributeOrClass([
                {selector: '#pro_image, #pro_com_name, #info, #info2, .btn-close', type: 'class', name: 'image-skeleton'},
                {selector: '#com_address', type: 'class', name: 'address-skeleton'},
                {selector: '.admin_title', type: 'class', name: 'heding-skeleton'},
            ]);

            var time = null;
            time = setTimeout(() => {
                $("#loader_profile_modal").modal('hide');
                removeAttributeOrClass([
                    {selector: '#pro_image, #pro_com_name, #info, #info2, .btn-close', type: 'class', name: 'image-skeleton'},
                    {selector: '#com_address', type: 'class', name: 'address-skeleton'},
                    {selector: '.admin_title', type: 'class', name: 'heding-skeleton'},
                ]);
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.dropdown-toggle', ()=>{
            var time = null;
            $("#profileSkel").addClass('profile-skeletone');
            $("#emailSkel").addClass('profile-skeletone');
            $("#logoutSkel").addClass('log-skeletone');
            $(".show-profile").attr('hidden', true);
            $(".show-email").attr('hidden', true);
            $(".show-prof").removeClass('display-skeletone');
            $(".show-logout").attr('hidden', true);
            $(".show-log").removeClass('display-skeletone');
            time = setTimeout(() => {
                $("#profileSkel").removeClass('profile-skeletone');
                $("#emailSkel").removeClass('profile-skeletone');
                $("#logoutSkel").removeClass('log-skeletone');
                $(".show-profile").removeAttr('hidden');
                $(".show-logout").removeAttr('hidden');
                $(".show-email").removeAttr('hidden');
                $(".show-log").addClass('display-skeletone');
                $(".show-prof").addClass('display-skeletone');

            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
    });

</script>
