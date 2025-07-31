<script type="module">
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    $(document).ready(function(){
        $(document).on('click', '#profile_urllinks', function(e){

            e.preventDefault();
            $(".text-fade-animation").addClass('profl_heading');
            $("#pro_image").addClass('profl_imag');
            $(".first_box").addClass('first_content');
            $(".second_box").addClass('second_content');
            $(".third_box").addClass('third_content');
            $(".fourth_box").addClass('third_content');
            
            requestAnimationFrame(() => {
                addAttributeOrClass([
                    {selector: '#pro_com_name, #info, #info2, .btn-close, .head', type: 'class', name: 'image-skeleton'},
                    {selector: '#com_address', type: 'class', name: 'address-skeleton'},
                    {selector: '.image-box', type: 'class', name: 'profile-img-skeleton'},
                    {selector: '.admin_title', type: 'class', name: 'heding-skeleton'},
                    {selector: '#company_info, #personal_info, #branch_information, #role_info', type: 'class', name: 'profile-head-skeleton'},
                ]);
            });
            setTimeout(() => {
    
                var time = null;
                time = setTimeout(() => {
                    requestAnimationFrame(() => {
                        removeAttributeOrClass([
                            {selector: '#pro_com_name, #info, #info2, .btn-close, .head', type: 'class', name: 'image-skeleton'},
                            {selector: '#com_address', type: 'class', name: 'address-skeleton'},
                            {selector: '.image-box', type: 'class', name: 'profile-img-skeleton'},
                            {selector: '.admin_title', type: 'class', name: 'heding-skeleton'},
                            {selector: '#company_info, #personal_info, #branch_information, #role_info', type: 'class', name: 'profile-head-skeleton'},
                        ]);
                    });
                }, 1500);
    
                return ()=>{
                    clearTimeout(time);
                }
            }, 1000);
            
        });

        $(document).on('click', '.dropdown-toggle', ()=>{
            var time = null;
            $("#profileSkel").addClass('profile-skeletone');
            $("#emailSkel").addClass('profile-skeletone');
            $("#logoutSkel").addClass('log-skeletone');
            $("#settingSkel").addClass('log-skeletone');
            $(".show-profile").attr('hidden', true);
            $(".show-email").attr('hidden', true);
            $(".show-setting").attr('hidden', true);
            $(".show-prof").removeClass('display-skeletone');
            $(".show-logout").attr('hidden', true);
            $(".show-log").removeClass('display-skeletone');
            time = setTimeout(() => {
                requestAnimationFrame(() => {
                    $("#profileSkel").removeClass('profile-skeletone');
                    $("#emailSkel").removeClass('profile-skeletone');
                    $("#logoutSkel").removeClass('log-skeletone');
                    $("#settingSkel").removeClass('log-skeletone');
                    $(".show-profile").removeAttr('hidden');
                    $(".show-logout").removeAttr('hidden');
                    $(".show-email").removeAttr('hidden');
                    $(".show-setting").removeAttr('hidden');
                    $(".show-log").addClass('display-skeletone');
                    $(".show-prof").addClass('display-skeletone');
                });

            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        // Resize the Canvas
        
    });

</script>
