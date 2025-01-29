<script>
    $(document).ready(function(){
        // Role Promot Index
        $(document).on('click', '#role_promot_index', function(e){
            e.preventDefault();
            // $("#accessconfirmbranch").modal('show');
            // $("#pageLoader").removeAttr('hidden');
            // $("#access_modal_box").addClass('loader_area');
            // $("#processModal_body").removeClass('loading_body_area');

            // setTimeout(() => {
            //     $("#accessconfirmbranch").modal('hide');
            //     $("#pageLoader").attr('hidden', true);
            //     $("#access_modal_box").removeClass('loader_area');
            //     $("#processModal_body").addClass('loading_body_area');
            
            // }, 1500);

            const prefix = 'super-admin';
            const domain = config('app.url');
            const serverIP = $_SERVER['SERVER_ADDR'] ?? '127.0.0.1:8000';
            const RouteURL = "/role-index";

            const currentURL = domain ?? serverIP.prefix.RouteURL;
            
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // $.ajax({
            //     type: "GET",
            //     url: currentURL,
            //     success: function (response) {
            //         $("#main_content").html(response);
            //         console.log("Page Loaded Successfully");
            //     },
            //     error: function (xhr) {
            //         console.error("Error loading role index:", xhr.responseText);
            //     }
            // });

        });
    });
</script>