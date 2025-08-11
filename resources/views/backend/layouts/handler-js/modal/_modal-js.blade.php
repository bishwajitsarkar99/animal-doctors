<script type="module">
    // Import RAM functions
    import { clearAppRAMBranchSection } from "/appRAM/backendRAMCapacity/appBranchData.js";
    $(document).ready(function() {

        $(document).on('click', '#logout_click', function (e) {
            e.preventDefault();
            
            $("#accessconfirmbranch").modal('show');
            $("#pageLoader").removeAttr('hidden');
            $("#access_modal_box").addClass('loader_area');
            $("#processModal_body").removeClass('loading_body_area');

            setTimeout(() => {
                requestAnimationFrame(() => {
                    $("#accessconfirmbranch").modal('hide');
                    $("#pageLoader").attr('hidden', true);
                    $("#access_modal_box").removeClass('loader_area');
                    $("#processModal_body").addClass('loading_body_area');

                    $("#logout_form").modal('show');
                    $("#admin_filip").addClass('fa-thin fa-square fa-flip');
                    $(".pro_image").addClass('logout-img-skeleton');
                    $("#logout_text_message").addClass('logout-msg-skeleton');
                    $('.logout-modal-title').addClass('logout-title-skeleton');
                    $("#logoutCancel").addClass('logout-cancel-skeleton');
                    $('#logout_btn_group').addClass('logout-btn-skeleton');
                    $('#logout_btn_group2').addClass('logout-btn-skeleton');
                    $(".loader-login").removeClass('close_loader_modal');
                    $('.yes-icon').removeClass('yes-hidden');
                });

                let time = setTimeout(() => {
                    requestAnimationFrame(() => {
                        $(".pro_image").removeClass('logout-img-skeleton');
                        $("#logout_text_message").removeClass('logout-msg-skeleton');
                        $('.logout-modal-title').removeClass('logout-title-skeleton');
                        $("#logoutCancel").removeClass('logout-cancel-skeleton');
                        $('#logout_btn_group').removeClass('logout-btn-skeleton');
                        $('#logout_btn_group2').removeClass('logout-btn-skeleton');
                        $(".loader-login").addClass('close_loader_modal');
                        $('.yes-icon').addClass('yes-hidden');
                    });
                }, 1000);

                return () => {
                    clearTimeout(time);
                };
            }, 1500);
        });
        $(document).on('click', '.logout', function(e) {
            // Clear AppRAM Array Key
            clearAppRAMBranchSection();

            $('.yes-icon').removeClass('yes-hidden');

            var time = null;
            time = setTimeout(() => {
                requestAnimationFrame(() => {
                    $('.yes-icon').addClass('yes-hidden');
                });
            }, 1000);
            return ()=>{
                clearTimeout(time);
            }
        });
    });
</script>
