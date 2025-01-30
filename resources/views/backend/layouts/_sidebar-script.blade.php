<script>
    $(document).ready(function(){
        $(document).on('click', '#', function(e){
            e.preventDefault();
            
            let prefix = 'super-admin';
            let newUrl = window.location.protocol + "//" + window.location.host + "/" + prefix + "/role-index";
            
            // Update the browser URL without refreshing the page
            history.pushState(null, '', newUrl);

            // Fetch the view using AJAX and load it into a container
            $.ajax({
                url: newUrl,
                type: "GET",
                success: function(response) {
                    $('#myscreen').html(response); // Load the view inside a container
                },
                error: function(xhr) {
                    console.error("Error loading the page:", xhr);
                }
            });
        });

        // Handle browser back/forward button navigation
        window.addEventListener("popstate", function (event) {
            let currentUrl = window.location.href;
            $.ajax({
                url: currentUrl,
                type: "GET",
                success: function(response) {
                    $('#main_content').html(response);
                },
                error: function(xhr) {
                    console.error("Error loading the page:", xhr);
                }
            });
        });
    });

    // $(document).ready(function () {
    //     $(document).on("click", "#role_promot_index", function (e) {
    //         e.preventDefault();

    //         let prefix = "super-admin";
    //         let newUrl = window.location.protocol + "//" + window.location.host + "/" + prefix + "/role-index";

    //         // Update URL
    //         history.pushState(null, "", newUrl);

    //         // Fetch the new content and load it into a div
    //         $.ajax({
    //             url: newUrl,
    //             type: "GET",
    //             success: function (data) {
    //                 $("#main_content").html(data); // Load response into a container
    //             },
    //             error: function (xhr) {
    //                 console.error("Failed to load content:", xhr);
    //             }
    //         });
    //     });

    //     // Handle browser back/forward navigation
    //     window.addEventListener("popstate", function () {
    //         location.reload(); // Reload page when back button is clicked
    //     });
    // });
</script>