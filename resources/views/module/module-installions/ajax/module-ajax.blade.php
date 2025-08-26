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
        function showFourthMenuLoader(){
            $('#loaderFourthMenu').removeClass('display_none');
        }
        function hideFourthMenuLoader(){
            $('#loaderFourthMenu').addClass('display_none');
        }
        showMenuLoader();
        setTimeout(() => {
            hideMenuLoader();
        }, 1000);

        // ========================================
        // Module Next Button
        // ========================================
        $("#module").removeAttr('hidden');
        $(document).on('click', '#moduleNext', function(){
            if($(".category-module").is(":checked")){
                // buttons
                $("#module").attr('hidden', true);
                const subModuleBtnGroups = $("#sub_module");
                subModuleBtnGroups.removeAttr('hidden');
            }else{
                return;
            }
        });

        // ========================================
        // Module Checked
        // ========================================
        $(".category-module").removeAttr('disabled');
        $(document).on('click', '#moduleCheck', function(){

            if ($(this).is(":checked")) {
                // Disable others
                $(".category-module").not(this).prop("checked", false).attr('disabled', true).addClass("disableColor");
                $(".label-text").removeClass("highlight disableColor");
                $(this).siblings(".label-text").addClass("highlight");
                $(".category-module").not(this).siblings(".label-text").addClass("disableColor");
            } else {
                // Enable all back
                $(".category-module").removeAttr('disabled').removeClass("disableColor");
                $(".label-text").removeClass("highlight disableColor");
            }
        });

        // ========================================
        // Module Next Button Click Event
        // ========================================
        $(document).on('click', '#moduleNext', function(){

            var id = $(".category-module:checked").data('id');;
            
            fetchSubModule(id);
        });

        // ========================================
        // Sub Module Back Button
        // ========================================
        $(document).on('click', '#back', function(){
            // buttons
            $("#sub_module").attr('hidden', true);
            $("#module").removeAttr('hidden');
            const categoryModuleBtnGroups = $("#module");
            categoryModuleBtnGroups.removeAttr('hidden');
            $("#subModule").empty();
            $(".category-module").prop("checked", false);
            $(".category-module").removeAttr('disabled').removeClass("disableColor");
            $(".label-text").removeClass("highlight disableColor");
        });

        // ========================================
        // Sub Module Next Button
        // ========================================
        $(document).on('click', '#next', function(){
            if($(".sub-module").is(":checked")){
                // buttons
                $("#sub_module").attr('hidden', true);
                const nameModuleBtnGroups = $("#module_parts");
                nameModuleBtnGroups.removeAttr('hidden');

            }else{
                return;
            }
        });

        // ========================================
        // Sub Module Checked
        // ========================================
        $(document).on('click', '#subModuleCheck', function(){

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
        // Sub Module Next Button Click Event
        // ========================================
        $(document).on('click', '#next', function(){

            var id = $(".sub-module:checked").data('id');;
            fetchModuleParts(id);
        });

        // ========================================
        // Sub Module Fetch
        // ========================================
        function fetchSubModule(id){

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
                    const subModuleMenu = $("#subModule");
                    subModuleMenu.empty();

                    $.each(subModules, function(key, item){
                        subModuleMenu.append(
                            `<li>
                                <input class="module-checkbox sub-module" 
                                    type="checkbox" 
                                    data-id="${item.id}" 
                                    data-value="${item.sub_module_name}" id="subModuleCheck">
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
        // Module Parts Back Button
        // ========================================
        $(document).on('click', '#modulePartsBack', function(){
            // buttons
            $("#module_parts").attr('hidden', true);
            const nameModuleBtnGroups = $("#sub_module");
            nameModuleBtnGroups.removeAttr('hidden');

            $("#moduleParts").empty();
            $(".module-name").prop("checked", false);
            $(".module-name").removeAttr('disabled').removeClass("disableColor");
            $(".name-label-text").removeClass("highlight disableColor");
        });

        // ========================================
        // Module Parts Next Button
        // ========================================
        $(document).on('click', '#modulePartsNext', function(){
            if($(".module-parts").is(":checked")){
                // buttons
                $("#sub_module").attr('hidden', true);
                $("#module_parts").attr('hidden', true);
                const installionsModuleBtnGroups = $("#module_link_url");
                installionsModuleBtnGroups.removeAttr('hidden');
            }else{
                return;
            }
        });

        // ========================================
        // Module Parts Next Button Click Event
        // ========================================
        $(document).on('click', '#modulePartsNext', function(){

            var ids = [];

            $(".module-parts:checked").each(function () {
                ids.push($(this).data('id'));
            });

            fetchModuleUrl(ids); 
        });

        // ========================================
        // Module Parts Fetch
        // ========================================
        function fetchModuleParts(id){
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
                    const moduleMenu = $("#moduleParts");
                    moduleMenu.empty();

                    $.each(modules, function(key, item){
                        moduleMenu.append(
                            `<li>
                                <input class="module-checkbox module-parts" 
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

        // ========================================
        // Module Link URL Back Button
        // ========================================
        $(document).on('click', '#backLinkUrl', function(){
            // buttons
            $("#module_link_url").attr('hidden', true);
            const installionsModuleBtnGroups = $("#module_parts");
            installionsModuleBtnGroups.removeAttr('hidden');

            $("#moduleUrlMenu").empty();
            $(".module-link-url").prop("checked", false);
            $(".module-link-url").removeAttr('disabled').removeClass("disableColor");
            $(".module-url-label-text").removeClass("highlight disableColor");
        });

        // ========================================
        // Module Parts Fetch
        // ========================================
        function fetchModuleUrl(ids){
            if(!ids) return;

            const currentURL = "/application/module/module-link-url-fetch/";

            showFourthMenuLoader();

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentURL,
                dataType: "json",
                data:{ids:ids},
                success: function(response){
                    const moduleUrl = response.messages;

                    const moduleUrLMenu = $("#moduleUrlMenu");
                    moduleUrLMenu.empty();

                    $.each(moduleUrl, function(catKey, category){
                        // Category title
                        moduleUrLMenu.append(`<li><strong><em>Module : ${category.module}</strong></em></li>`);

                        $.each(category.sub_modules, function(subKey, subModule){
                            // Sub Category
                            moduleUrLMenu.append(`<li style="margin-left:15px;"><em>Sub Module : ${subModule.sub_module}</em></li>`);

                            $.each(subModule.module_parts, function(modKey, modulePart){
                                // Module Parts
                                moduleUrLMenu.append(`<li style="margin-left:30px;"><em>Module Part : ${modulePart.module_name}</em></li>`);

                                // Module URLs
                                $.each(modulePart.module_urls, function(urlKey, urlItem){
                                    let checkedAttr = urlItem.id ? 'checked' : '';
                                    moduleUrLMenu.append(`
                                        <li style="margin-left:45px;">
                                            <input class="module-checkbox module-link-url" 
                                                type="checkbox" 
                                                data-id="${urlItem.id}" 
                                                data-value="${urlItem.module_url}" 
                                                ${checkedAttr}>
                                            <span class="module-url-label-text">Module URL : ${urlItem.module_url}</span>
                                        </li>
                                    `);
                                });
                            });
                        });
                    });
                },
                complete: function(){
                    hideFourthMenuLoader();
                }
            });


        }
        
    }); 

</script>