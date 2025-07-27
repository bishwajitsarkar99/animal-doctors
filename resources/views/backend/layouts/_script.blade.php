<!-- App Cached Js -->
<script src="{{ asset('cache/app.js') }}?v={{ filemtime(public_path('cache/app.js')) }}"></script>
<!--========== Module - Helper Function Links ==========-->
<script type="module">
    import { browserInspect, pageLoader, toolTip, initAllMenuCardResizers, initMenuCardResize } from "/module/backend-module/backend-module-min.js";
    document.addEventListener('DOMContentLoaded', () => {
        initAllMenuCardResizers('.menu-card', '.submenu-card');

        const tableCard = document.getElementById('NavBarStockMenuCard', 'NavBarSupplierMenuCard', 'NavBarPivotTableMenuCard', 'NavBarItemsMenuCard', 'NavBarOrderMenuCard', 'NavBarLanguageMenuCard');
        if (tableCard) {
            initMenuCardResize(tableCard, 'NavBarStockMenuCard', 'NavBarSupplierMenuCard', 'NavBarPivotTableMenuCard', 'NavBarItemsMenuCard', 'NavBarOrderMenuCard', 'NavBarLanguageMenuCard');
        }
    });
    pageLoader();
    toolTip();
    //browserInspect();
</script>

<!-- Language -->
<script>
    $("body").on("change", ".language_switcher", function(event) {
        event.preventDefault();
        var lang = $(this).val();
        var url = "{{ route('lang.switch', ':lang') }}",
            url = url.replace(':lang', lang)
        $.ajax({
            type: "GET",
            url: url,
            data: {
                lang: lang,
            },
            success: function() {
                window.location.reload();
            },
            error: function() {
                window.location.reload();
            }
        });
    });
</script>