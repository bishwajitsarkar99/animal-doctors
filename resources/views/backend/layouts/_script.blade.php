<!-- Bootstrap5 Sb-template CDN link -->
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<!--============= SideBar Script Js =============-->

<!--============ Jquery Min Js ============-->
<!-- JQUERY CDN LINK -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- =============== Jquery Autocomplete Link ============================= -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!--========== Ajax-Chart-Js 2.8.0 CDN Link ==========-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<!--========== Side-bar Script ==========-->
<script src="{{asset('backend_asset')}}/main_asset/js/sidebar-script-min.js"></script>
<!--========== Module - Helper Function Links ==========-->
<script type="module" src="/module/module-min-js/application-helper-function-min.js"></script>
<script type="module">
    import { browserInpect, pageLoader, toolTip } from "/module/module-min-js/application-helper-function-min.js";
    pageLoader();
    toolTip();
    // browserInpect();
</script>
<!--============= Chart-Pie Js 3D CDN Link =============-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Bootstrap5 Sb-template asset -->
<script src="{{asset('backend_asset')}}/main_asset/js/all-min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{asset('backend_asset')}}/main_asset/demo/expenses-chart-line.js"></script>
<script src="{{asset('backend_asset')}}/main_asset/demo/chart-bar-demo.js"></script>
<script src="{{asset('backend_asset')}}/main_asset/demo/table-chart-demo.js"></script>
<!-- Summar-Note -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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