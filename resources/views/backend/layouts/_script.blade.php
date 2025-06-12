<!-- App Cached Js -->
<script src="{{ asset('cache/app.js') }}?v={{ filemtime(public_path('cache/app.js')) }}"></script>
<!--========== Module - Helper Function Links ==========-->
<script type="module" src="/module/module-min-js/application-helper-function-min.js"></script>
<script type="module">
    import { browserInpect, pageLoader, toolTip } from "/module/module-min-js/application-helper-function-min.js";
    pageLoader();
    toolTip();
    //browserInpect();
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