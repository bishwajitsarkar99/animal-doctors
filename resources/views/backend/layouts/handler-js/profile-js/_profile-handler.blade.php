<script type="module">
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    $(document).ready(function(){
        $(document).on('click', '#profile_urllinks', function(e){

            e.preventDefault();
            $("#accessconfirmbranch").modal('show');
            $("#pageLoader").removeAttr('hidden');
            $("#access_modal_box").addClass('loader_area');
            $("#processModal_body").removeClass('loading_body_area');
            $(".text-fade-animation").addClass('profl_heading');
            $("#pro_image").addClass('profl_imag');
            $(".first_box").addClass('first_content');
            $(".second_box").addClass('second_content');
            $(".third_box").addClass('third_content');
            $(".fourth_box").addClass('third_content');
            
            setTimeout(() => {
                requestAnimationFrame(() => {
                    $("#accessconfirmbranch").modal('hide');
                    $("#pageLoader").attr('hidden', true);
                    $("#access_modal_box").removeClass('loader_area');
                    $("#processModal_body").addClass('loading_body_area');
                    
                    $("#profile_form").modal('show').fadeIn(300).delay(300);
                    addAttributeOrClass([
                        {selector: '.image-box, #pro_com_name, #info, #info2, .btn-close', type: 'class', name: 'image-skeleton'},
                        {selector: '#com_address', type: 'class', name: 'address-skeleton'},
                        {selector: '.admin_title', type: 'class', name: 'heding-skeleton'},
                        {selector: '#company_info, #personal_info, #branch_information, #role_info', type: 'class', name: 'profile-head-skeleton'},
                    ]);
                });
    
                var time = null;
                time = setTimeout(() => {
                    requestAnimationFrame(() => {
                        removeAttributeOrClass([
                            {selector: '.image-box, #pro_com_name, #info, #info2, .btn-close', type: 'class', name: 'image-skeleton'},
                            {selector: '#com_address', type: 'class', name: 'address-skeleton'},
                            {selector: '.admin_title', type: 'class', name: 'heding-skeleton'},
                            {selector: '#company_info, #personal_info, #branch_information, #role_info', type: 'class', name: 'profile-head-skeleton'},
                        ]);
                    });
                }, 3000);
    
                return ()=>{
                    clearTimeout(time);
                }
            }, 1500);
            
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
    });

</script>
