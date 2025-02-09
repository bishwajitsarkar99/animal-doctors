<script type="module">
    document.addEventListener("DOMContentLoaded", function () {
        // Account History
        Livewire.on("navigateToAccountHistoryIndex", async function (url) {
            history.pushState(null, '', url);
            window.location.href = url;
            try {
                // Load Sidebar Script After Component Render
                const module = await import("/backend_asset/main_asset/js/sidebar-script.js");
                if (module.initSidebarScripts) {
                    module.initSidebarScripts();
                } else {
                    console.error("initSidebarScripts is not defined.");
                }
            } catch (error) {
                console.error("Error loading sidebar script:", error);
            }
        });
        // Email Verification
        Livewire.on("navigateToEmailVerificationIndex", async function (url) {
            history.pushState(null, '', url);
            window.location.href = url;
            try {
                // Load Sidebar Script After Component Render
                const module = await import("/backend_asset/main_asset/js/sidebar-script.js");
                if (module.initSidebarScripts) {
                    module.initSidebarScripts();
                } else {
                    console.error("initSidebarScripts is not defined.");
                }
            } catch (error) {
                console.error("Error loading sidebar script:", error);
            }
        });
        // Role Promot
        Livewire.on("navigateToRoleIndex", async function (url) {
            history.pushState(null, '', url);
            window.location.href = url;
            try {
                // Load Sidebar Script After Component Render
                const module = await import("/backend_asset/main_asset/js/sidebar-script.js");
                if (module.initSidebarScripts) {
                    module.initSidebarScripts();
                } else {
                    console.error("initSidebarScripts is not defined.");
                }
            } catch (error) {
                console.error("Error loading sidebar script:", error);
            }
        });
        // Role Permission
        Livewire.on("navigateToRolePermissionIndex", async function (url) {
            history.pushState(null, '', url);
            window.location.href = url;
            try {
                // Load Sidebar Script After Component Render
                const module = await import("/backend_asset/main_asset/js/sidebar-script.js");
                if (module.initSidebarScripts) {
                    module.initSidebarScripts();
                } else {
                    console.error("initSidebarScripts is not defined.");
                }
            } catch (error) {
                console.error("Error loading sidebar script:", error);
            }
        });
        // Role Manage
        Livewire.on("navigateToRoleManageIndex", async function (url) {
            history.pushState(null, '', url);
            window.location.href = url;
            try {
                // Load Sidebar Script After Component Render
                const module = await import("/backend_asset/main_asset/js/sidebar-script.js");
                if (module.initSidebarScripts) {
                    module.initSidebarScripts();
                } else {
                    console.error("initSidebarScripts is not defined.");
                }
            } catch (error) {
                console.error("Error loading sidebar script:", error);
            }
        });
        // User Access
        Livewire.on("navigateToUserAccessIndex", async function (url) {
            history.pushState(null, '', url);
            window.location.href = url;
            try {
                // Load Sidebar Script After Component Render
                const module = await import("/backend_asset/main_asset/js/sidebar-script.js");
                if (module.initSidebarScripts) {
                    module.initSidebarScripts();
                } else {
                    console.error("initSidebarScripts is not defined.");
                }
            } catch (error) {
                console.error("Error loading sidebar script:", error);
            }
        });
    });
</script>