<script>
    // $(document).ready(function () {
    //     $('#role_promot_index').on('click', function (e) {
    //         e.preventDefault();

    //         let url = $(this).attr('href'); // Get the link URL

    //         $.ajax({
    //             url: url,
    //             type: 'GET',
    //             dataType: 'json',
    //             beforeSend: function () {
    //                 $('#main_content').html('<div class="text-center py-5"><img src="/image/loader/load-30.gif" alt="Loading..."></div>');
    //             },
    //             success: function (response) {
    //                 if (response.view) {
    //                     $('#main_content').html(response.view); // Load content inside main_content div
    //                 }
    //             },
    //             error: function () {
    //                 $('#main_content').html('<p class="text-danger text-center">Failed to load content.</p>');
    //             }
    //         });
    //     });
    // });
    // $(document).ready(function () {
    //     $(document).on("click", "#", function (e) {
    //         e.preventDefault();

    //         let prefix = "super-admin";
    //         let newUrl = `${window.location.protocol}//${window.location.host}/${prefix}/role-index`;

    //         // Update browser history without refreshing
    //         history.pushState(null, "", newUrl);

    //         loadPageContent(newUrl);
    //     });

    //     // Handle back/forward button navigation
    //     window.addEventListener("popstate", function (event) {
    //         let currentUrl = window.location.href;
    //         loadPageContent(currentUrl);
    //     });

    //     function loadPageContent(url) {
    //         $.ajax({
    //             url: url,
    //             type: "GET",
    //             success: function (response) {
    //                 $("#myscreen").html(response.view);
    //                 // Reinitialize scripts and plugins
    //                 reinitializeScripts();
    //             },
    //             error: function (xhr) {
    //                 console.error("Error loading the page:", xhr);
    //             },
    //         });
    //     }

    //     function reinitializeScripts() {
    //         // Reinitialize sidebar script
    //         $.getScript("/backend_asset/main_asset/js/sidebar-script.js", function () {
    //             if (typeof initSidebarScripts === "function") {
    //                 initSidebarScripts();
    //             } else {
    //                 console.error("initSidebarScripts is not defined.");
    //             }
    //         });

    //         // Reinitialize helper functions
    //         import("/module/module-min-js/application-helper-function-min.js")
    //             .then((module) => {
    //                 module.pageLoader();
    //                 module.toolTip();
    //             })
    //             .catch((error) => {
    //                 console.error("Error loading module:", error);
    //             });

    //         // Reinitialize Summernote (if present)
    //         if ($(".summernote").length) {
    //             $(".summernote").summernote();
    //         }
    //     }
    // });
</script>