<!-- <script>

    $(document).ready(function() {

        $(document).on('click', '#themsetting_click', function() {

            $("#themsetting_form").modal('show');
            $("#thmsetting_filip").addClass('fa-thin fa-square fa-flip');
        });
    });

    $(document).ready(function() {
        $('.darkcyan_switch_on_sidebar_resize').hide();
        $('.darkcyan_switch_of_sidebar_resize').show();
        $(document).on('click', '#sidebar_resize', function() {
            $('.darkcyan_switch_on_sidebar_resize').toggle();
            $('.darkcyan_switch_of_sidebar_resize').toggle();

            $("#sidenavAccordion").toggleClass('sb-sidenav');
            $("#sidenavAccordion").toggleClass('sb-sidenav:hover');
            $("#menu_background").toggleClass('side_nav_background');
        });
    });

    $(document).ready(function() {
        $('.darkcyan_switch_of_topbar_demo').hide();
        $('.darkcyan_switch_on_topbar_demo').show();
        $(document).on('click', '#topbar_demo', function() {
            $('.darkcyan_switch_of_topbar_demo').toggle();
            $('.darkcyan_switch_on_topbar_demo').toggle();

            $("#topBar_tigger").toggleClass('sb-topnav');

        });
    });



    $(document).ready(function() {
        $('.darkcyan_switch_of_footer_demo').show();
        $('.darkcyan_switch_on_footer_demo').hide();
        $(document).on('click', '#footer_demo', function() {
            $('.darkcyan_switch_of_footer_demo').toggle();
            $('.darkcyan_switch_on_footer_demo').toggle();

            $("#admin_footer").toggleClass('footer_silver');
        });
    });



    $(document).ready(function() {
        $('.darkcyan_switch_of_dashboard_demo').show();
        $('.darkcyan_switch_on_dashboard_demo').hide();
        $(document).on('click', '#dashboard_demo', function() {
            $('.darkcyan_switch_of_dashboard_demo').toggle();
            $('.darkcyan_switch_on_dashboard_demo').toggle();

            $("#totalOrder_box").toggleClass('order_box');
            $("#ordericon").toggleClass('svg-inline--fa fa-calendar-plus fa-2x fa-beat');
            $("#order_counter").toggleClass('num number');
            $("#order_counter2").toggleClass('number');


        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".of_switch_theme_resize").show();
        $(".on_switch_theme_resize").hide();
        $(".theme_resize_loader").hide();
        $(".resize_switch_of").show();
        $(".resize_switch_on").hide();

        $(document).on('click', '#themeResize', function() {

            $("#themSetting1").toggleClass('themSetting1');
            $("#theme_resize_loader").toggle();
            $(".of_switch_theme_resize").toggle();
            $(".on_switch_theme_resize").toggle();
            $("#themSetting1").toggleClass('themSetting');
            $('#theme_sidebar_demo').addClass('setting_box_focus');
            $('#theme_topbar_demo').addClass('setting_box_focus');
            $('#theme_footer_demo').addClass('setting_box_focus');
            $('#theme_dashboard_demo').addClass('setting_box_focus');
        });

        $(document).on('click', '#sidebar_resize', function() {
            $(".resize_switch_of").toggle();
            $(".resize_switch_on").toggle();
            $("#sidenavAccordion").toggleClass('sb-sidenav:hover');
        });
    });
</script>

<script>

    $(document).ready(function() {

        $("#theme_bg_loader").hide();
        $(".of_switch_theme").show();
        $(".on_switch_theme").hide();

        $(document).on('click', '#themeColor', function() {

            $("#themSetting").toggleClass('themSetting');

            $("#sid_focus").addClass('setting_box_focus');


            $("#top_focus").addClass('setting_box_focus');


            $("#footer_focus").addClass('setting_box_focus');


            $("#footer2_focus").addClass('setting_box_focus');


            $("#themeSetting_color").addClass('sidebar_focus');


            $("#themeMenuList_color").addClass('sidebar_focus');


            $("#logoutModalSelect").addClass('sidebar_focus');


            $("#dashboardSelect").addClass('sidebar_focus');


            $("#themeSelect").addClass('setting_box_focus');
            $("#topbarSelect").addClass('setting_box_focus');
            $("#footerMenuSelect").addClass('setting_box_focus');
            $("#footerSelect").addClass('setting_box_focus');
            $("#themeSetting_color").addClass('setting_box_focus');
            $("#themeMenuList_color").addClass('setting_box_focus');
            $("#themeLogout_color").addClass('setting_box_focus');
            $("#themeDashboard_color").addClass('setting_box_focus');
            $("#themeTrapezoid_color").addClass('setting_box_focus');

            $("#themePivotTable_color").addClass('setting_box_focus');

            $("#theme_bg_loader").toggle();
            $(".of_switch_theme").toggle();
            $(".on_switch_theme").toggle();


            $("#themeTrapezoid_color").addClass('sidebar_focus');

            $("#").addClass('');
        });

        $(".darkcyan_switch_of_footermenu_them").show();
        $(".darkcyan_switch_on_footermenu_them").hide();

        $(document).on('change', '#themeSelect', function() {
            $(".darkcyan_switch_of_footermenu_them").toggle();
            $(".darkcyan_switch_on_footermenu_them").toggle();
        });

        $(document).on('click', '#navbarDropdown', function() {
            $("#themeMenuListBackground").addClass('admin_profile');
        });

        $(document).on('click', '#logout_click', function() {
            $("#logoutModal_header").addClass('admin_modal_header');
            $("#logoutModal_body").addClass('admin_modal_body');
            $("#logoutModal_footer").addClass('admin_modal_footer');
        });


    });
</script> -->
<!-- =============== Background-Color Setting js =====================  -->
<!-- <script>
    function initThemeSelctor() {
        const themeSelect = document.getElementById('themeSelect');
        const themeSilverlink = document.getElementById('themeSilverlink');
        const currentTheme = localStorage.getItem('sidebar-css');

        function activeTheme(themeName) {
            themeSilverlink.setAttribute("href", `backend_asset/main_asset/custom-css/themes-css/sidebar-css/${themeName}.css`);
        }

        themeSelect.addEventListener("change", () => {
            activeTheme(themeSelect.value);
            localStorage.setItem('sidebar-css', themeSelect.value);
        });

        activeTheme(currentTheme);

    }

    initThemeSelctor();
</script>

<script>
    $(document).ready(function() {

        $(".switch_of_topbar").show();
        $(".switch_on_topbar").hide();

        $(document).on('change', '#topbarSelect', function() {
            $(".switch_of_topbar").toggle();
            $(".switch_on_topbar").toggle();
        });
    });

    function initTopbarSector() {

        const topbarSelect = document.getElementById('topbarSelect');
        const topbarGreenlink = document.getElementById('topbarGreenlink');
        const currentTheme = localStorage.getItem('topbar-css');

        function activeTheme(topbarName) {
            topbarGreenlink.setAttribute("href", `backend_asset/main_asset/css/topbar-css/${topbarName}.css`);
        }

        topbarSelect.addEventListener("change", () => {
            activeTheme(topbarSelect.value);
            localStorage.setItem('topbar-css', topbarSelect.value);
        });

        activeTheme(currentTheme);
    }
    initTopbarSector();
</script>

<script>
    $(document).ready(function() {

        $(".darkcyan_switch_of_footermenu").show();
        $(".darkcyan_switch_on_footermenu").hide();

        $(document).on('change', '#footerMenuSelect', function() {
            $(".darkcyan_switch_of_footermenu").toggle();
            $(".darkcyan_switch_on_footermenu").toggle();
        });

        function initMenuSector() {

            const footerMenuSelect = document.getElementById('footerMenuSelect');
            const footerMenuGreenlink = document.getElementById('footerMenuGreenlink');
            const currentTheme = localStorage.getItem('menu-css');

            function activeTheme(themeName) {
                footerMenuGreenlink.setAttribute("href", `backend_asset/main_asset/custom-css/themes-css/menu-css/${themeName}.css`);
            }

            footerMenuSelect.addEventListener("change", () => {
                activeTheme(footerMenuSelect.value);
                localStorage.setItem('menu-css', footerMenuSelect.value);
            });

            activeTheme(currentTheme);
        }
        initMenuSector();
    });
</script>

<script>
    $(document).ready(function() {

        $(".darkcyan_switch_of_footer").show();
        $(".darkcyan_switch_on_footer").hide();

        $(document).on('change', '#footerSelect', function() {
            $(".darkcyan_switch_of_footer").toggle();
            $(".darkcyan_switch_on_footer").toggle();
        });
    });

    function initThemeSector() {

        const footerSelect = document.getElementById('footerSelect');
        const footerGreenlink = document.getElementById('footerGreenlink');
        const currentTheme = localStorage.getItem('footer-css');

        function activeTheme(topbarName) {
            footerGreenlink.setAttribute("href", `backend_asset/main_asset/custom-css/themes-css/footer-css/${topbarName}.css`);
        }

        footerSelect.addEventListener("change", () => {
            activeTheme(footerSelect.value);
            localStorage.setItem('footer-css', footerSelect.value);
        });

        activeTheme(currentTheme);
    }
    initThemeSector();
</script>

<script>
    $(document).ready(function() {

        $(".darkcyan_switch_of_setting").show();
        $(".darkcyan_switch_on_setting").hide();

        $(document).on('change', '#settingSelect', function() {
            $(".darkcyan_switch_of_setting").toggle();
            $(".darkcyan_switch_on_setting").toggle();
        });

        function initThemeSector() {

            const settingSelect = document.getElementById('settingSelect');
            const settingGreenlink = document.getElementById('settingGreenlink');
            const currentTheme = localStorage.getItem('themes-setting-css');

            function activeTheme(topbarName) {
                settingGreenlink.setAttribute("href", `backend_asset/main_asset/custom-css/themes-css/themes-setting-css/${topbarName}.css`);
            }

            settingSelect.addEventListener("change", () => {
                activeTheme(settingSelect.value);
                localStorage.setItem('themes-setting-css', settingSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });
</script>

<script>
    $(document).ready(function() {
        $(".darkcyan_switch_of_logout").show();
        $(".darkcyan_switch_on_logout").hide();

        $(document).on('change', '#logoutModalSelect', function() {
            $(".darkcyan_switch_of_logout").toggle();
            $(".darkcyan_switch_on_logout").toggle();
        });


        function initThemeSector() {

            const logoutModalSelect = document.getElementById('logoutModalSelect');
            const smallModalGreenlink = document.getElementById('smallModalGreenlink');
            const currentTheme = localStorage.getItem('small-modal-css');

            function activeTheme(menuName) {
                smallModalGreenlink.setAttribute("href", `backend_asset/main_asset/custom-css/components-css/modal-css/${menuName}.css`);
            }

            logoutModalSelect.addEventListener("change", () => {
                activeTheme(logoutModalSelect.value);
                localStorage.setItem('small-modal-css', logoutModalSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });
</script>

<script>
    $(document).ready(function() {
        $(".darkcyan_switch_of_minimenu").show();
        $(".darkcyan_switch_on_minimenu").hide();

        $(document).on('change', '#miniMenuSelect', function() {
            $(".darkcyan_switch_of_minimenu").toggle();
            $(".darkcyan_switch_on_minimenu").toggle();
        });

    });
</script>

<script>
    $(document).ready(function() {
        $(".darkcyan_switch_of_tarpezoid").show();
        $(".darkcyan_switch_on_tarpezoid").hide();

        $(document).on('change', '#trapezoidSelect', function() {
            $(".darkcyan_switch_of_tarpezoid").toggle();
            $(".darkcyan_switch_on_tarpezoid").toggle();
        });


        function initThemeSector() {

            const trapezoidSelect = document.getElementById('trapezoidSelect');
            const sidebarTrapezoidlink = document.getElementById('sidebarTrapezoidlink');
            const currentTheme = localStorage.getItem('trapezoid-css');

            function activeTheme(trapezoidName) {
                sidebarTrapezoidlink.setAttribute("href", `backend_asset/main_asset/custom-css/themes-css/trapezoid-css/${trapezoidName}.css`);
            }

            trapezoidSelect.addEventListener("change", () => {
                activeTheme(trapezoidSelect.value);
                localStorage.setItem('trapezoid-css', trapezoidSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });
</script>

<script>
    $(document).ready(function() {
        $(".darkcyan_switch_of_dashboard").show();
        $(".darkcyan_switch_on_dashboard").hide();

        $(document).on('change', '#dashboardSelect', function() {
            $(".darkcyan_switch_of_dashboard").toggle();
            $(".darkcyan_switch_on_dashboard").toggle();
        });


        function initThemeSector() {

            const dashboardSelect = document.getElementById('dashboardSelect');
            const dashboardResultGreenlink = document.getElementById('dashboardResultGreenlink');
            const currentTheme = localStorage.getItem('dashboard-result-css');

            function activeTheme(resultName) {
                dashboardResultGreenlink.setAttribute("href", `backend_asset/main_asset/custom-css/dashboard-css/dashboard-result-css/${resultName}.css`);
            }

            dashboardSelect.addEventListener("change", () => {
                activeTheme(dashboardSelect.value);
                localStorage.setItem('dashboard-result-css', dashboardSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });

    $(document).ready(function() {
        $(".darkcyan_switch_of_dashboard").show();
        $(".darkcyan_switch_on_dash_nav").hide();

        $(document).on('change', '#dashboardnavbarSelect', function() {
            $(".darkcyan_switch_of_dash_nav").toggle();
            $(".darkcyan_switch_on_dash_nav").toggle();
        });


        function initThemeSector() {

            const dashboardnavbarSelect = document.getElementById('dashboardnavbarSelect');
            const dashboardNavbarGreenlink = document.getElementById('dashboardNavbarGreenlink');
            const currentTheme = localStorage.getItem('nav-bar-css');

            function activeTheme(resultName) {
                dashboardNavbarGreenlink.setAttribute("href", `backend_asset/main_asset/custom-css/dashboard-css/nav-bar-css/${resultName}.css`);
            }

            dashboardnavbarSelect.addEventListener("change", () => {
                activeTheme(dashboardnavbarSelect.value);
                localStorage.setItem('nav-bar-css', dashboardnavbarSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });

    $(document).ready(function() {
        $(".darkcyan_switch_of_dashboard_part").show();
        $(".darkcyan_switch_on_dashboard_part").hide();

        $(document).on('change', '#dashboardnavbarSelect', function() {
            $(".darkcyan_switch_of_dashboard_part").toggle();
            $(".darkcyan_switch_on_dashboard_part").toggle();
        });


        function initThemeSector() {

            const dashboardPartSelect = document.getElementById('dashboardPartSelect');
            const dashboardPartGreenlink = document.getElementById('dashboardPartGreenlink');
            const currentTheme = localStorage.getItem('dashboard-part-css');

            function activeTheme(resultName) {
                dashboardPartGreenlink.setAttribute("href", `backend_asset/main_asset/custom-css/dashboard-css/dashboard-part-css/${resultName}.css`);
            }

            dashboardPartSelect.addEventListener("change", () => {
                activeTheme(dashboardPartSelect.value);
                localStorage.setItem('dashboard-part-css', dashboardPartSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });

    $(document).ready(function() {
        $(".darkcyan_switch_of_dashboard_part_details").show();
        $(".darkcyan_switch_on_dashboard_part_details").hide();

        $(document).on('change', '#dashboardPartDeltailsSelect', function() {
            $(".darkcyan_switch_of_dashboard_part_details").toggle();
            $(".darkcyan_switch_on_dashboard_part_details").toggle();
        });


        function initThemeSector() {

            const dashboardPartDeltailsSelect = document.getElementById('dashboardPartDeltailsSelect');
            const dashboarddetailsGreenlink = document.getElementById('dashboarddetailsGreenlink');
            const currentTheme = localStorage.getItem('dashboard-details-css');

            function activeTheme(resultName) {
                dashboarddetailsGreenlink.setAttribute("href", `backend_asset/main_asset/custom-css/dashboard-css/dashboard-details-css/${resultName}.css`);
            }

            dashboardPartDeltailsSelect.addEventListener("change", () => {
                activeTheme(dashboardPartDeltailsSelect.value);
                localStorage.setItem('dashboard-details-css', dashboardPartDeltailsSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });

    $(document).ready(function() {
        $(".darkcyan_switch_of_dashboard_chart").show();
        $(".darkcyan_switch_on_dashboard_chart").hide();

        $(document).on('change', '#dashboardChartSelect', function() {
            $(".darkcyan_switch_of_dashboard_chart").toggle();
            $(".darkcyan_switch_on_dashboard_chart").toggle();
        });


        function initThemeSector() {

            const dashboardChartSelect = document.getElementById('dashboardChartSelect');
            const dashboardAreaChartSelect = document.getElementById('dashboardAreaChartSelect');
            const currentTheme = localStorage.getItem('chart-css');

            function activeTheme(resultName) {
                dashboardAreaChartSelect.setAttribute("href", `backend_asset/main_asset/custom-css/dashboard-css/chart-css/${resultName}.css`);
            }

            dashboardChartSelect.addEventListener("change", () => {
                activeTheme(dashboardChartSelect.value);
                localStorage.setItem('chart-css', dashboardChartSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });

    $(document).ready(function() {
        $(".darkcyan_switch_of_dashboard_product_box").show();
        $(".darkcyan_switch_on_dashboard_product_box").hide();

        $(document).on('change', '#dashboardProductBoxSelect', function() {
            $(".darkcyan_switch_of_dashboard_product_box").toggle();
            $(".darkcyan_switch_on_dashboard_product_box").toggle();
        });


        function initThemeSector() {

            const dashboardProductBoxSelect = document.getElementById('dashboardProductBoxSelect');
            const dashboardProdSelect = document.getElementById('dashboardProdSelect');
            const currentTheme = localStorage.getItem('product-score-css');

            function activeTheme(resultName) {
                dashboardProdSelect.setAttribute("href", `backend_asset/main_asset/custom-css/dashboard-css/product-score-css/${resultName}.css`);
            }

            dashboardProductBoxSelect.addEventListener("change", () => {
                activeTheme(dashboardProductBoxSelect.value);
                localStorage.setItem('product-score-css', dashboardProductBoxSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });
</script>

<script>
    $(document).ready(function() {
        $(".darkcyan_switch_of_dash_sales_pivot").show();
        $(".darkcyan_switch_on_dash_sales_pivot").hide();

        $(document).on('change', '#dashboardSalesPivotSelect', function() {
            $(".darkcyan_switch_of_dash_sales_pivot").toggle();
            $(".darkcyan_switch_on_dash_sales_pivot").toggle();
        });


        function initThemeSector() {

            const dashboardSalesPivotSelect = document.getElementById('dashboardSalesPivotSelect');
            const dashboardSalesPivotUrl = document.getElementById('dashboardSalesPivotUrl');
            const currentTheme = localStorage.getItem('sales-page-focus-css');

            function activeTheme(resultName) {
                dashboardSalesPivotUrl.setAttribute("href", `backend_asset/main_asset/custom-css/dashboard-css/pivot-table-css/sales-page-focus-css/${resultName}.css`);
            }

            dashboardSalesPivotSelect.addEventListener("change", () => {
                activeTheme(dashboardSalesPivotSelect.value);
                localStorage.setItem('sales-page-focus-css', dashboardSalesPivotSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });
</script>

<script>
    $(document).ready(function() {
        $(".darkcyan_switch_of_dashboard_expenses_pivot").show();
        $(".darkcyan_switch_on_dashboard_expenses_pivot").hide();

        $(document).on('change', '#dashboardExpensePivotSelect', function() {
            $(".darkcyan_switch_of_dashboard_expenses_pivot").toggle();
            $(".darkcyan_switch_on_dashboard_expenses_pivot").toggle();
        });


        function initThemeSector() {

            const dashboardExpensePivotSelect = document.getElementById('dashboardExpensePivotSelect');
            const dashboardExpensesPivotURL = document.getElementById('dashboardExpensesPivotURL');
            const currentTheme = localStorage.getItem('expenses-page-focus-css');

            function activeTheme(resultName) {
                dashboardExpensesPivotURL.setAttribute("href", `backend_asset/main_asset/custom-css/dashboard-css/pivot-table-css/expenses-page-focus-css/${resultName}.css`);
            }

            dashboardExpensePivotSelect.addEventListener("change", () => {
                activeTheme(dashboardExpensePivotSelect.value);
                localStorage.setItem('expenses-page-focus-css', dashboardExpensePivotSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });
</script>

<script>
    $(document).ready(function() {
        $(".darkcyan_switch_of_dash_order_pivot").show();
        $(".darkcyan_switch_on_dash_order_pivot").hide();

        $(document).on('change', '#dashboardOrderPivotSelect', function() {
            $(".darkcyan_switch_of_dash_order_pivot").toggle();
            $(".darkcyan_switch_on_dash_order_pivot").toggle();
        });


        function initThemeSector() {

            const dashboardOrderPivotSelect = document.getElementById('dashboardOrderPivotSelect');
            const dashboardOrderURL = document.getElementById('dashboardOrderURL');
            const currentTheme = localStorage.getItem('order-page-focus-css');

            function activeTheme(resultName) {
                dashboardOrderURL.setAttribute("href", `backend_asset/main_asset/custom-css/dashboard-css/pivot-table-css/order-page-focus-css/${resultName}.css`);
            }

            dashboardOrderPivotSelect.addEventListener("change", () => {
                activeTheme(dashboardOrderPivotSelect.value);
                localStorage.setItem('order-page-focus-css', dashboardOrderPivotSelect.value);
            });

            activeTheme(currentTheme);
        }
        initThemeSector();
    });
</script>

<script>
    $(document).ready(function(){

        $(".theme_form_loader").hide();
        $('.of_switch_theme_form').show();
        $('.on_switch_theme_form').hide();

        $(document).on("click","#formSettings", function(){
            $("#themSetting").toggleClass('themSetting');
            $('.of_switch_theme_form').toggle();
            $('.on_switch_theme_form').toggle();
            $(".theme_form_loader").toggle();
            $("#themeFormSetting_color").addClass('setting_box_focus');
        });
    });
</script>

<script>
    $(document).ready(function(){

        $(".theme_table_loader").hide();
        $('.of_switch_theme_table').show();
        $('.on_switch_theme_table').hide();

        $(document).on("click","#tableSettings", function(){
            $("#themSetting").toggleClass('themSetting');
            $('.of_switch_theme_table').toggle();
            $('.on_switch_theme_table').toggle();
            $(".theme_table_loader").toggle();
            $("#themeTableSetting_color").addClass('setting_box_focus');
        });
    });
</script> -->