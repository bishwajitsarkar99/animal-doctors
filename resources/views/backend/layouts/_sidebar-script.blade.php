<script>
    $(document).ready(function () {
        $(document).on('change', '.dynamic-dropdown', function () {
            if ($.fn.select2) {
                $(this).select2();
            } else {
                console.error("Select2 is not loaded.");
            }
        });
        // Prevent multiple event bindings
        $(document).off("click", ".load-page").on("click", ".load-page", function (e) {
            e.preventDefault();
            let url = $(this).data("url");

            if ($(this).data("loading")) {
                console.warn("Request already in progress...");
                return;
            }

            $(this).data("loading", true);
            loadPageContent(url, () => $(this).data("loading", false));
        });

    });

    // Function to load the page content via AJAX
    function loadPageContent(url) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            type: "GET",
            success: function (data) {
                $("#content-area").html(data);
                history.pushState(null, "", url);;
                setTimeout(() => {
                    reinitializeAccordion();
                    setupSidebarToggle();
                    setupDropdowns();
                }, 500);
                // Ensure script is loaded before running dependent functions
                loadScript("/backend_asset/main_asset/js/sidebar-script-min.js", function () {
                    if (typeof toggleLinkIcon === "function") {
                        toggleLinkIcon();
                    }else if(typeof toggleLockUnlock === "function"){
                        toggleLockUnlock();
                    }
                });
            },
            error: function () {
                alert("Error loading page.");
            }
        });
    }

    // Sidebar toggle functionality
    function setupSidebarToggle() {
        const sidebarToggle = document.querySelector("#sidebarToggle");
        if (sidebarToggle) {
            sidebarToggle.addEventListener("click", function (event) {
                event.preventDefault();
                document.body.classList.toggle("sb-sidenav-toggled");
                localStorage.setItem("sb|sidebar-toggle", document.body.classList.contains("sb-sidenav-toggled"));
            });
        }
    }
    // Dropdown functionality
    function setupDropdowns() {
        let dropdowns = document.querySelectorAll(".nav-item");

        dropdowns.forEach(function (dropdown) {
            let toggle = dropdown.querySelector(".dropdown-toggle");
            let menu = dropdown.querySelector(".dropdown-menu");

            if (toggle && menu) {
                let bsDropdown = new bootstrap.Dropdown(toggle);

                toggle.addEventListener("click", function (e) {
                    e.preventDefault();

                    // Close all other open dropdowns before opening this one
                    document.querySelectorAll(".dropdown-menu.show").forEach((openMenu) => {
                        if (openMenu !== menu) {
                            let openToggle = openMenu.previousElementSibling;
                            new bootstrap.Dropdown(openToggle).hide();
                        }
                    });

                    // Toggle dropdown
                    if (menu.classList.contains("show")) {
                        bsDropdown.hide();
                    } else {
                        bsDropdown.show();
                    }
                });

                // Close the dropdown when clicking outside
                document.addEventListener("click", function (event) {
                    if (!dropdown.contains(event.target)) {
                        bsDropdown.hide();
                    }
                });
            }
        });
    }
    function reinitializeAccordion() {
        $(document).off("click", ".accordion-button").on("click", ".accordion-button", function () {
            let target = $(this).attr("data-bs-target");
            
            if ($(target).hasClass("show")) {
                // If already open, close it
                $(target).collapse("hide");
                $(this).addClass("collapsed").attr("aria-expanded", "false");
            } else {
                // Close all other open accordions
                $(".accordion-collapse").collapse("hide");
                $(".accordion-button").addClass("collapsed").attr("aria-expanded", "false");

                // Open the clicked one
                $(target).collapse("show");
                $(this).removeClass("collapsed").attr("aria-expanded", "true");
            }
        });
    }
    function reintializeButtonMenu(){
        $(document).off("click", ".accordion-button").on("click", ".accordion-button", function () {
            let target = $(this).attr("data-bs-target");
            
            if ($(target).hasClass("show")) {
                // If already open, close it
                $(target).collapse("hide");
                $(this).addClass("collapsed").attr("aria-expanded", "false");
            } else {
                // Close all other open accordions
                $(".accordion-collapse").collapse("hide");
                $(".accordion-button").addClass("collapsed").attr("aria-expanded", "false");

                // Open the clicked one
                $(target).collapse("show");
                $(this).removeClass("collapsed").attr("aria-expanded", "true");
            }
        });
    }
    // Dynamically load an external script
    function loadScript(url, callback) {
        if (document.querySelector(`script[src="${url}"]`)) {
            if (callback) callback();
            return;
        }

        let script = document.createElement("script");
        script.type = "text/javascript";
        script.src = url + "?v=" + new Date().getTime(); // Prevent cache issues

        script.onload = function () {
            if (callback) callback();
        };

        script.onerror = function () {
            console.error("Failed to load script:", url);
        };

        document.head.appendChild(script);
    }
</script>