<script>
    $(document).ready(function () {
        $(document).on('change', '.dynamic-dropdown', function () {
            if ($.fn.select2) {
                $(this).select2();
            } else {
                console.error("Select2 is not loaded.");
            }
        });
        // Event listener to load content on click
        $(document).on("click", ".load-page", function (e) {
            e.preventDefault();
            let url = $(this).data("url");
            loadPageContent(url);
        });
        
    });
    // Function to load the page content via AJAX
    function loadPageContent(url) {
        $.ajax({
            url: url,
            type: "GET",
            success: function (data) {
                $("body").html(data);
                history.pushState(null, "", url); // Update the browser history
                reinitializeBootstrap(); // Reinitialize Bootstrap components
                reinitializeSidebar(); // Reinitialize sidebar after content load
                reinitializeAccordion(); // Reinitialize the accordion collapse buttons
                

                const sidebarToggle = document.body.querySelector('#sidebarToggle');
                if (sidebarToggle) {
                    sidebarToggle.addEventListener('click', event => {
                        event.preventDefault();
                        document.body.classList.toggle('sb-sidenav-toggled');
                        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                    });
                }
            },
            error: function () {
                alert("Error loading page.");
            }
        });
    }

    function reinitializeBootstrap() {
        // Bootstrap JS
        var script = document.createElement("script");
        script.src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js";
        script.crossOrigin = "anonymous";

        // Append elements to the document head/body
        document.body.appendChild(script);
    }

    function reinitializeSidebar() {
        if (typeof initSidebarScripts === "function") {
            initSidebarScripts();
        }
    }

    function reinitializeAccordion() {
        $('.accordion-button').each(function () {
            $(this).off('click').on('click', function () {
                let target = $(this).attr("data-bs-target");
                $(target).collapse('toggle');
            });
        });
    }

</script>