<script type="module">
    import { 
        resize, 
        removeDataTableStorage, 
        enableColumnDragAndDrop, 
        applySavedColumnOrder, 
    } from "/module/backend-module/backend-module-min.js";

    // ================================
    // Module Table Resize
    // ================================
    resize('moduleInfosTable', 'col-resizer', 'row-resizer');
    enableColumnDragAndDrop('moduleInfosTable', '.move-icon');
    applySavedColumnOrder('moduleInfosTable');


    $(document).ready(function(){
        // ========================================
        // Loader
        // ========================================
        function showMenuLoader() {
            $('#loaderPage').removeClass('display_none');
        }
        function hideMenuLoader() {
            $('#loaderPage').addClass('display_none');
        }
        function showSecondMenuLoader(){
            $('#loaderSecondMenu').removeClass('display_none');
        }
        function hideSecondMenuLoader(){
            $('#loaderSecondMenu').addClass('display_none');
        }
        function showThirdMenuLoader(){
            $('#loaderThirdMenu').removeClass('display_none');
        }
        function hideThirdMenuLoader(){
            $('#loaderThirdMenu').addClass('display_none');
        }
        showMenuLoader();
        setTimeout(() => {
            hideMenuLoader();
        }, 1000);

        $("#category_module").removeAttr('hidden');
        // ========================================
        // Module Category Next Button
        // ========================================
        $(document).on('click', '#categoryNext', function(){
            // buttons
            $("#category_module").attr('hidden', true);
            const subModuleBtnGroups = $("#sub_module");
            subModuleBtnGroups.removeAttr('hidden');
        });

        // ========================================
        // Sub Module Category Back Button
        // ========================================
        $(document).on('click', '#back', function(){
            // buttons
            $("#sub_module").attr('hidden', true);
            $("#category_module").removeAttr('hidden');
            const categoryModuleBtnGroups = $("#category_module");
            categoryModuleBtnGroups.removeAttr('hidden');
        });

        // ========================================
        // Module Name Next Button
        // ========================================
        $(document).on('click', '#next', function(){
            // buttons
            $("#sub_module").attr('hidden', true);
            // $("#category_module").attr('hidden', true);
            const nameModuleBtnGroups = $("#module_name");
            nameModuleBtnGroups.removeAttr('hidden');
        });

        // ========================================
        // Module Name Back Button
        // ========================================
        $(document).on('click', '#nameModuleBack', function(){
            // buttons
            $("#module_name").attr('hidden', true);
            const nameModuleBtnGroups = $("#sub_module");
            nameModuleBtnGroups.removeAttr('hidden');
        });

        // ========================================
        // Module Installions Button
        // ========================================
        $(document).on('click', '#nameModuleNext', function(){
            // buttons
            $("#sub_module").attr('hidden', true);
            $("#module_name").attr('hidden', true);
            const installionsModuleBtnGroups = $("#module_installions");
            installionsModuleBtnGroups.removeAttr('hidden');
        });

        // ========================================
        // Module Installions Back Button
        // ========================================
        $(document).on('click', '#backSubModule', function(){
            // buttons
            $("#module_installions").attr('hidden', true);
            // $("#category_module").attr('hidden', true);
            const installionsModuleBtnGroups = $("#module_name");
            installionsModuleBtnGroups.removeAttr('hidden');
        });

        // ========================================
        // Category Module Checked
        // ========================================
        $(".category-module").removeAttr('disabled');

        $(document).on('click', '#categoryCheck', function(){

            if ($(this).is(":checked")) {
                // Disable others
                $(".category-module").not(this).prop("checked", false).attr('disabled', true).addClass("disableColor");
                $(".label-text").removeClass("highlight disableColor");
                $(this).siblings(".label-text").addClass("highlight");
                $(".category-module").not(this).siblings(".label-text").addClass("disableColor");
                $("#categoryNext").removeClass('display_none');
            } else {
                // Enable all back
                $(".category-module").removeAttr('disabled').removeClass("disableColor");
                $(".label-text").removeClass("highlight disableColor");
                $("#categoryNext").addClass('display_none');
            }
        });

        // ========================================
        // Category Module Next Button Click Event
        // ========================================
        $(document).on('click', '#categoryNext', function(){

            var id = $(".category-module:checked").data('id');;
            
            fetchSubCategoryModule(id);
        });

        // ========================================
        // Sub Category Module Fetch
        // ========================================
        function fetchSubCategoryModule(id){

            if (!id) return;

            showSecondMenuLoader();

            const currentURL = "/application/module/sub-module-search/" +id;

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentURL,
                dataType: "json",
                success: function(response){
                    const subModules = response.messages;
                    const subModuleMenu = $("#subCategoryModule");
                    subModuleMenu.empty();

                    $.each(subModules, function(key, item){
                        subModuleMenu.append(
                            `<li>
                                <input class="module-checkbox sub-module" 
                                    type="checkbox" 
                                    data-id="${item.id}" 
                                    data-value="${item.sub_module_name}" id="subCategoryCheck">
                                <span class="menu-label-text">${item.sub_module_name}</span>
                            </li>`
                        );
                    });
                    
                },
                complete: function(){
                    hideSecondMenuLoader();
                }
            });

        }

        // ========================================
        // Sub Category Module Checked
        // ========================================
        $(document).on('click', '#subCategoryCheck', function(){

            if ($(this).is(":checked")) {
                // Disable others
                $(".sub-module").not(this).prop("checked", false).attr('disabled', true).addClass("disableColor");
                $(".menu-label-text").removeClass("highlight disableColor");
                $(this).siblings(".menu-label-text").addClass("highlight");
                $(".sub-module").not(this).siblings(".menu-label-text").addClass("disableColor");
                $("#next").removeClass('display_none');
            } else {
                // Enable all back
                $(".sub-module").removeAttr('disabled').removeClass("disableColor");
                $(".menu-label-text").removeClass("highlight disableColor");
                $("#next").addClass('display_none');
            }
        });

        // ========================================
        // Sub Category Module Next Button Click Event
        // ========================================
        $(document).on('click', '#next', function(){

            var id = $(".sub-module:checked").data('id');;
            fetchModuleName(id);
        });

        // ========================================
        // Module Name Fetch
        // ========================================
        function fetchModuleName(id){
            if(!id) return;

            showThirdMenuLoader();

            const currentURL = "/application/module/module-fetch/" +id;

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentURL,
                dataType: "json",
                success: function(response){
                    const modules = response.messages;
                    const moduleMenu = $("#moduleName");
                    moduleMenu.empty();

                    $.each(modules, function(key, item){
                        moduleMenu.append(
                            `<li>
                                <input class="module-checkbox module-name" 
                                    type="checkbox" 
                                    data-id="${item.id}" 
                                    data-value="${item.module_name}" id="moduleNameCheck">
                                <span class="name-label-text">${item.module_name}</span>
                            </li>`
                        );
                    });
                    
                },
                complete: function(){
                    hideThirdMenuLoader();
                }
            });
        }
        
    }); 

</script>