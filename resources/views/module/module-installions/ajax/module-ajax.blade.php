<script type="module">

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

        showMenuLoader();
        setTimeout(() => {
            hideMenuLoader();
        }, 1000);


        let timer;
        $("#category_module").removeAttr('hidden');
        // ========================================
        // Module Category Next Button
        // ========================================
        $(document).on('click', '#categoryNext', function(){
            // buttons
            $("#category_module").attr('hidden', true);
            const subModuleBtnGroups = $("#sub_module");
            subModuleBtnGroups.removeAttr('hidden');
            // table columns
            $(".sub-module").removeAttr('hidden');
            $(".sub-module-td-cell").removeAttr('hidden');
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
            // table columns
            $(".sub-module").attr('hidden', true);
            $(".sub-module-td-cell").attr('hidden', true);
        });

        // ========================================
        // Module Name Next Button
        // ========================================
        $(document).on('click', '#next', function(){
            // buttons
            $("#sub_module").attr('hidden', true);
            $("#category_module").attr('hidden', true);
            const nameModuleBtnGroups = $("#module_name");
            nameModuleBtnGroups.removeAttr('hidden');
            // table columns
            $(".module-name").removeAttr('hidden');
            $(".module-name-td-cell").removeAttr('hidden');
        });

        // ========================================
        // Module Name Back Button
        // ========================================
        $(document).on('click', '#nameModuleBack', function(){
            // buttons
            $("#module_name").attr('hidden', true);
            const nameModuleBtnGroups = $("#sub_module");
            nameModuleBtnGroups.removeAttr('hidden');
            // table columns
            $(".module-name").attr('hidden', true);
            $(".module-name-td-cell").attr('hidden', true);
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
            // table columns
            $(".module-installions").removeAttr('hidden');
            $(".installions-module-td-cell").removeAttr('hidden');
        });

        // ========================================
        // Module Installions Back Button
        // ========================================
        $(document).on('click', '#backSubModule', function(){
            // buttons
            $("#module_installions").attr('hidden', true);
            $("#category_module").attr('hidden', true);
            const installionsModuleBtnGroups = $("#module_name");
            installionsModuleBtnGroups.removeAttr('hidden');
            // table columns
            $(".module-installions").attr('hidden', true);
            $(".installions-module-td-cell").attr('hidden', true);
            $(".module-name").removeAttr('hidden');
            $(".module-name-td-cell").removeAttr('hidden');
        });

        // ========================================
        // Module Checked
        // ========================================
        $(".category-module").removeAttr('disabled');

        $(document).on('click', '#categoryCheck', function(){

            if($(this).is(":checked")){
                $(".category-module").not(this).prop("checked", false).attr('checked', true);
                $(".label-text").removeClass("highlight");
                $(this).siblings(".label-text").addClass("highlight");
                $("#categoryNext").removeClass('display_none');
            }else{
                $(".category-module").removeAttr('disabled');
                $(".label-text").removeClass("highlight");
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
        // ========================================  category_modules.module_category_name
        //fetchSubCategoryModule();
        function fetchSubCategoryModule(id){

            if (!id) return;

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
                                    data-value="${item.sub_module_name}">
                                <span class="label-text">${item.sub_module_name}</span>
                            </li>`
                        );
                    });
                    
                }
            });

        }
        
    }); 

</script>