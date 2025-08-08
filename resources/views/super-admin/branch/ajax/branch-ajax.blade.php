<script type="module">
    import { 
        // Helper Funtion
        modernDateFormat,
        removeAttributeOrClass,
        // Button Component
        buttonLoader,
        // Table Component
        resize, 
        removeDataTableStorage, 
        enableColumnDragAndDrop, 
        applySavedColumnOrder,
        restoreRowHeights,
        numberAnimation,
        // Border Component
        buttonBorderAnimation,
        // Menu Item Resizeer
        initAllMenuCardResizers,
        initMenuCardResize,
        // Branch Setting Card Drag and Drop
        initDragAndDrop,
        // Global RAM Storage System
        // renderGlobalRAMTable,
        // RAMAnalyzer 
    } from "/module/backend-module/backend-module-min.js";
    import { setRAM, getRAM } from "/module/backend-module/component-module/module-session-storeRAM.js";
    import { initTableBoxResize, initTableBoxResizers } from "/module/backend-module/component-module/panel-component.js";
    // Import RAM functions
    import { getAppRAM, updateAppRAM, updateAppRAMTable, updateAppRAMBulk, clearBranchListCache, clearAppRAM, renderRAMUsage } from "/appRAM/backendRAMCapacity/appBranchData.js";

    // =================================================================
    // --------- Branch List && Branch Score Table Resize --------------
    // =================================================================
    // Branch List Table Resize
    resize('BranchTableSetting', 'col-resizer', 'row-resizer');
    enableColumnDragAndDrop('BranchTableSetting', '.move-icon');
    applySavedColumnOrder('BranchTableSetting');
    // Branch Score Table Resize
    resize('branchScoreTable', 'score-col-resizer', 'score-row-resizer');
    applySavedColumnOrder('branchScoreTable');
    // RAM Table Resize
    resize('ramUsageTable', 'col-resizer', 'row-resizer');
    applySavedColumnOrder('ramUsageTable');
    // Branch Score Table Number Animation
    const numberClass = '.total-number';

    // =================================================================
    // --------------- Branch Settings DOM Loaded ----------------------
    // =================================================================
    document.addEventListener('DOMContentLoaded', () => {
        // Branch Table Menu Card Resizer
        initAllMenuCardResizers('.menu-card', '.submenu-card');

        const tableCard = document.getElementById('BranchTableMenuCard');
        if (tableCard) {
            initMenuCardResize(tableCard, 'BranchTableMenuCard');
        }

        // Branch Setting Card Drag and Drop
        const row = '.drag-row';
        const column = '.drag-column';
        const cardKey = '.group-card';

        document.querySelectorAll(cardKey).forEach(card => {
            const cardId = card.id; // e.g., 'card-1', 'card-2', etc.
            const lineConnectionId = `lineConnectorId_${cardId}`;
            const DataTable = 'BranchSettingDrag';
            // Call with dynamic IDs
            initDragAndDrop(column, cardKey, row, lineConnectionId, DataTable);
        });

        // Hover Branch Settings Menu
        const iconBar = document.querySelector('.icon-bar');
        const sidebarPlate = document.querySelector('.sidebar-plate');

        if (iconBar && sidebarPlate) {
            iconBar.addEventListener('mouseenter', () => {
            sidebarPlate.classList.add('hover-align-left');
            });
            iconBar.addEventListener('mouseleave', () => {
            sidebarPlate.classList.remove('hover-align-left');
            });
        }
        renderRAMUsage();
        // Table size Last Fetch Data Time
        // function updateBranchListSVG() {
        //     const sizeData = getBranchListTableSize();
        //     const timeData = getBranchListLastFetchTime();

        //     const sizeEl = document.getElementById('branchListSizeText');
        //     const timeEl = document.getElementById('branchListTimeText');

        //     if (sizeEl) sizeEl.textContent = sizeData.size;
        //     if (timeEl) timeEl.textContent = timeData.fetchTime;
        //     }

        //     function updateBranchCategorySVG() {
        //     const sizeData = getBranchCategoryTableSize();
        //     const timeData = getBranchCategoryLastFetchTime();

        //     const sizeEl = document.getElementById('branchCategorySizeText');
        //     const timeEl = document.getElementById('branchCategoryTimeText');

        //     if (sizeEl) sizeEl.textContent = sizeData.size;
        //     if (timeEl) timeEl.textContent = timeData.fetchTime;
        // }
        // updateBranchListSVG();
        // updateBranchCategorySVG();
    });

    // renderGlobalRAMTable("ram-report-container");
    // document.addEventListener("DOMContentLoaded", () => {
    //     RAMAnalyzer.initRAMAnalyzer();
    //     const perItemsSelect = document.getElementById("perItems");
    //     if (perItemsSelect) {
    //         perItemsSelect.addEventListener("change", function () {
    //             RAMAnalyzer.changePerPage(this.value);
    //         });
    //     }

    //     const searchInput = document.getElementById("searchInput");
    //     if (searchInput) {
    //         searchInput.addEventListener("input", function () {
    //             RAMAnalyzer.setSearchQuery(this.value);
    //         });
    //     }

    //     document.querySelectorAll(".sort-button").forEach(btn => {
    //         btn.addEventListener("click", () => {
    //             RAMAnalyzer.setSort(btn.dataset.sort);
    //         });
    //     });

    //     const tablePrefixFilter = document.getElementById("tablePrefixFilter");
    //     if (tablePrefixFilter) {
    //         tablePrefixFilter.addEventListener("change", e => {
    //             RAMAnalyzer.setTablePrefix(e.target.value);
    //         });
    //     }
    // });

    $(document).ready(function(){
        // =================================================================
        // ----------------- Data Processing in RAM ------------------------
        // =================================================================
        // Search Branch Details Data Get From RAM
        const branchDetailsCache = getAppRAM('branchDetails', {});
        const branchListCache = getAppRAM('branchListData', {});
        // Search Branch Types Data Get From RAM
        const branchCategoryDetailsCache = getAppRAM('branchCategoryDetails', {});

        // ============ RAM Table Box Resize ===============================
        // -----------------------------------------------------------------
        const panel = document.getElementById('tableBox');
        initTableBoxResize(panel,'tableBox');
        // Or apply to multiple panels using a selector:
        //initTableBoxResizers('.resizable-panel');

        // ===========---- RAM Table Btton Section -------==================
        // -----------------------------------------------------------------
        $(document).on('click', '.sortBtn', function () {
            const $btn = $(this);
            // Remove existing
            $('.sortBtn #Layer_1').remove();

            const hadDownArrow = $btn.data('sort') === 'desc';

            // Toggle sort icon based on previous state
            const iconHTML = hadDownArrow
                ? `<svg id="Layer_1" width="12px" height="12px" fill="#ffffffa1" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,122.88 0,59.207 39.403,59.207 39.403,0 83.033,0 83.033,59.207 122.433,59.207 61.216,122.88"/></g></svg>` // Up arrow
                : `<svg id="Layer_1" width="12px" height="12px" fill="#ffffffa1" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>`; // Down arrow

            // Toggle and store new state
            $btn.data('sort', hadDownArrow ? 'asc' : 'desc');

            // Append new icon to the button
            $btn.append(iconHTML);
        });


        // Define Fetch Function
        fetchTableBranch();
        let debounceTimer;

        // branch setting mini Side-bar Checking
        $(document).on('click', '.checkSideBar', function (e) {
            if ($(this).prop('checked')) {
                $('.custom-side-bar-panel').addClass('force-show');
                $('.sidebar-plate').addClass('force-show');
            } else {
                $('.custom-side-bar-panel').removeClass('force-show');
                $('.sidebar-plate').removeClass('force-show');
            }
        });
        // Table Menu Card :show Search Field
        $(document).on('click', '#showSearchField', function(){
            if($(this)){
                $(".search-column").removeClass("display_none");
            }else{
                $(".search-column").addClass("display_none");
            }
        });
        // Table Menu Card :show Search Field Cancel
        $(document).on('click', '#cancelSearchToast', function(){
            $(this).tooltip('hide');
            $(".search-column").addClass("display_none");
            fetchTableBranch();
            clearBranchListCache();
        });
        // Table Menu Card :show Filter Field
        $(document).on('click', '#showFilterField', function(){
            if($(this)){
                $(".filter-column").removeClass("display_none");
            }else{
                $(".filter-column").addClass("display_none");
            }
        });
        // Table Menu Card :show Filter Field Cancel
        $(document).on('click', '#cancelFilterToast', function(){
            $(".filter-column").addClass("display_none");
            clearBranchListCache();
        });
        // Reset Table Width and Height as well as Drag and Drop
        $(document).on('click', '#tableResize', function(){
            removeDataTableStorage('BranchTableSetting')
            location.reload();
        });
        // ACtive table row background
        $(document).on('click', 'tr.zebra-table-row', function(){
            $(this).addClass("clicked td").siblings().removeClass("clicked td");
        });

        // Ensure function exists before calling
        if (typeof fetch_division === "function") {
            fetch_division();
            fetch_district();
            fetch_upazila();
        } else {
            // console.error("fetch_division is not defined. Check script order.");
        }

        // Initialize the button loader for the login button
        buttonLoader('#save', '.add-icon', '.add-btn-text', 'Add...', 'Add', 1000);
        buttonLoader('#update_btn', '.update-icon', '.update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#update_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#access_btn', '.access-icon', '.access-btn-text', 'Access...', 'Access', 1000);
        buttonLoader('#access_btn_confirm', '.access-confirm-icon', '.access-confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);
        buttonLoader('#deleteBranch', '.delete-icon', '.delete-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('.yes_button', '.loading-yes-icon', '.yes-btn-text', 'Yes...', 'Yes', 1000);
        buttonLoader('#delete_branch', '.delete-confrm-icon', '.delete-confrm-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('#branchTypeRefresh', '.type-icon', '.type-btn-text', 'Refresh...', 'Refresh', 1000);
        buttonLoader('#branch_type_create', '.branch-type-icon', '.branch-type-btn-text', 'Create...', 'Create', 1000);
        buttonLoader('#branch_type_update', '.branch-type-update-icon', '.branch-type-update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#branch_type_delete', '.branch-type-delete-icon', '.branch-type-delete-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('#branch_type_cancel', '.branch-type-cancel-icon', '.branch-type-cancel-btn-text', 'Cancel...', 'Cancel', 1000);

        // Define Dropdown Select Menu
        initSelect2();
        if (typeof $.fn.select2 !== "undefined") {
            console.log("Select2 is loaded successfully.");
            initSelect2(); // Initialize Select2 on page load
        } else {
            console.error("Select2 is not loaded. Check script order.");
        }
        function initSelect2(parent = document) {
            $(parent).find('.select2').each(function() {
                const id = $(this).attr('id');
                let placeholderText = 'Select an option';
                let dropdownParent = null;

                // Set specific placeholder and dropdown parent for modals
                if (id === 'select_branch') {
                    placeholderText = 'Select Company Branch Name';
                } else if (id === 'branch_type') {
                    placeholderText = 'Select Branch Type';
                } else if (id === 'select_division') {
                    placeholderText = 'Select Division';
                }else if (id === 'select_district') {
                    placeholderText = 'Select District';
                }else if (id === 'select_upazila') {
                    placeholderText = 'Select Upazila/Thana';
                }else if (id === 'branch_category_name') {
                    placeholderText = 'Select Branch Category Name';
                }else if (id === 'selectBranchCategories') {
                    placeholderText = 'Select Branch Type';
                }else if (id === '...') {
                    placeholderText = '...';
                    dropdownParent = $('#');
                }

                // Destroy previous instance before reinitializing
                if ($(this).data('select2')) {
                    $(this).select2('destroy');
                }

                // Reinitialize Select2 only if not already initialized
                if (!$(this).data('select2')) {
                    $(this).select2({
                        placeholder: placeholderText,
                        allowClear: true,
                        width: '100%',
                        dropdownParent: dropdownParent 
                    });
                }
            });
        }
        $('#selectBranchCategories').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search Branch Type...');
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_branch').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch...');
        });
        $('#branch_type').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch type...');
        });
        $('#branch_category_name').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search branch type...');
        });

        // =================================================================
        // --------------------- Start Home Page Branch List ---------------
        // =================================================================

        // Branch unique id generator according to branch
        $("#branch_type").on('change', function() {
            var brancType = $(this).val();
            if(brancType === 'Main Branch'){
                $("#branch_id_field").val('M-BRN');
            }else if(brancType === 'Corporate Branch'){
                $("#branch_id_field").val('C-BRN');
            }else if(brancType === 'Local Branch'){
                $("#branch_id_field").val('L-BRN');
            }else if(brancType === 'Delivery Branch'){
                $("#branch_id_field").val('D-BRN');
            }

            var x = Math.random();
            x = x * (1000 - 1) + 1;
            var generate_id = Math.floor(x);
            $("#generate_id").val(generate_id);
            var branch_id_field = $("#branch_id_field").val();

            var currentDate = new Date();
            var year = currentDate.getFullYear();
            var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
            var day = ("0" + currentDate.getDate()).slice(-2);
            var formattedDate = year + '-' + month + '-' + day;

            var branch_id = branch_id_field + '-' + formattedDate;

            $("#branch_id").val(branch_id + '-' + generate_id);
        });

        // Search Select Dropdown
        $(document).on('change', '#select_branch', function(e){
            e.preventDefault();
            $("#branch_update_modal").empty();
            $("#branch_update_modal_heading").empty();
            $("#delete_branch_id").empty();
            $("#delete_branch").empty();
            $("#delete_branch_body").empty();
            $("#delete_confrm_branch_id").empty();
            fetch_division();

            var select = $(this).val();
            // Button Show Or Hide
            if(select !== ''){
                // Search ID
                var id = select;
            }

            if(select == ''){
                return select;
                $('.edit_branch_id').attr('hidden', true);
                $('#documents').attr('hidden', true);
                clearFields();
            }
            // Check if data is cached
            if (branchDetailsCache[select]) {
                $('#response_message').empty();
                $("#SettingDisplay").empty();
                $('#response_message').removeClass('alert alert-danger');
                handleBranchResponse(branchDetailsCache[select], select);
            }else{
                $.ajax({
                    type: "GET",
                    url: "/company/branch-edit/" + id,
                    success: function(response){
                        $('#response_message').empty();
                        $("#SettingDisplay").empty();
                        $('#response_message').removeClass('alert alert-danger');
                        if(response.status == 404){
                            $('#response_message').html("");
                            // $('#response_message').addClass('alert alert-danger');
                            // $('#response_message').text(response.messages);
                        }else if(response.status == 400){
                            $('#response_message').html("");
                            $('#response_message').addClass('alert alert-danger');
                            $('#response_message').text(response.messages);
                        }else if(response.status == 200){
                            // Save to Parent RAM
                            branchDetailsCache[select] = response;
                            updateAppRAM('branchDetails', branchDetailsCache);
                            handleBranchResponse(response, select);

                        }else{
                            $('#response_message').addClass('alert alert-danger').text(response.messages);
                        }
                    },
                    error: function() {
                        $('#response_message').addClass('alert alert-danger').text("Error fetching branch data.");
                    }
                });
            }
            
        });
        function handleBranchResponse(response, id){
            const messages = response.messages;

            $("#accessconfirmbranch").modal('show');
            $("#dataPullingProgress").removeAttr('hidden');
            $("#access_modal_box").addClass('progress_body');
            $("#processModal_body").addClass('loading_body_area');
            $('#documents').attr('hidden', true);
            $('.edit_branch_id').attr('hidden', true);

            let debounceTimer = setTimeout(() => {
                $("#accessconfirmbranch").modal('hide');
                $("#dataPullingProgress").attr('hidden', true);
                $("#access_modal_box").removeClass('progress_body');
                $("#processModal_body").removeClass('loading_body_area');
                $('#documents').removeAttr('hidden');
                $('.edit_branch_id').removeAttr('hidden');

                // open filed box
                
                $(".branch_type").removeClass('display_none');

                $("#inputBranchNameGroup").slideDown("slow", function () {
                    $(this).removeClass('display_none');
                });

                $("#inputCityNameGroup").slideDown("slow", function () {
                    $(this).removeClass('display_none');
                });

                $("#inputLocatioinNameGroup").slideDown("slow", function () {
                    $(this).removeClass('display_none');
                });

                $("#dropdwonDivisionNameGroup").slideDown("slow", function () {
                    $(this).removeClass('display_none');
                });

                $("#dropdwonDistrictNameGroup").slideDown("slow", function () {
                    $(this).removeClass('display_none');
                });

                $("#dropdwonUpazilaNameGroup").slideDown("slow", function () {
                    $(this).removeClass('display_none');
                });
                

                const messages = response.messages;
                
                if(messages.created_by !== ''){
                    const firstUserImage = messages.created_users.image.includes('https://') ? messages.created_users.image : `${window.location.origin}/storage/image/user-image/${messages.created_users.image}`;
                    let createdByRole;
                    switch (messages.created_by) {
                        case 1:
                            createdByRole = 'SuperAdmin';
                            break;
                        case 2:
                            createdByRole = 'Sub-Admin';
                            break;
                        case 3:
                            createdByRole = 'Admin';
                            break;
                        case 0:
                            createdByRole = 'User';
                            break;
                        case 5:
                            createdByRole = 'Accounts';
                            break;
                        case 6:
                            createdByRole = 'Marketing';
                            break;
                        case 7:
                            createdByRole = 'Delivery Team';
                            break;
                        default:
                            createdByRole = 'Unknown';
                    }
                    $("#firstUserImage").html(`<img class="user_img rounded-square users_image position" src="${firstUserImage}">`);

                    $("#firstUserEmail").val(messages.created_users.login_email);
                    $("#firstCreatedBy").val(createdByRole);
                    if(messages.created_at !== ''){
                        $("#firstCreatedAt").val(modernDateFormat(messages.created_at));
                    }else{
                        $("#firstCreatedAt").val('-');
                    }
                } 
                if(messages.updated_by !== null){
                    $("#secondContent").removeAttr('hidden');
                    $('#secondHead').removeAttr('hidden');
                    const secondUserImage = messages.updated_users.image.includes('https://') ? messages.updated_users.image : `${window.location.origin}/storage/image/user-image/${messages.updated_users.image}`;
                    let updatedByRole;
                    switch (messages.updated_by) {
                        case 1:
                            updatedByRole = 'SuperAdmin';
                            break;
                        case 2:
                            updatedByRole = 'Sub-Admin';
                            break;
                        case 3:
                            updatedByRole = 'Admin';
                            break;
                        case 0:
                            updatedByRole = 'User';
                            break;
                        case 5:
                            updatedByRole = 'Accounts';
                            break;
                        case 6:
                            updatedByRole = 'Marketing';
                            break;
                        case 7:
                            updatedByRole = 'Delivery Team';
                            break;
                        default:
                            updatedByRole = 'Unknown';
                    }
                    $("#secondUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);

                    $("#secondUserEmail").val((messages.updated_users.login_email));
                    $("#secondUpdateBy").val(updatedByRole);
                    if(messages.created_at !== messages.updated_at){
                        $("#secondUpdateAt").val(modernDateFormat(messages.updated_at));
                    }else{
                        $("#secondUpdateAt").val('-');
                    }
                }else{
                    $("#secondContent").attr('hidden', true);
                    $('#secondHead').attr('hidden', true);
                }

                $('#branches_id').val(id);
                $('#edit_branch_id').val(response.messages.branch_id);
                $('.edit_branch_name').val(response.messages.branch_name);
                // $('.edit_branch_type').val(response.messages.branch_type).trigger('change.select2');
                safelySetBranchType(response.messages.branch_type);
                $('.edit_division_id').val(response.messages.division_id).trigger('change.select2');
                fetch_district(response.messages.division_id, function(){
                    // Set the value once options are available
                    $('.edit_district_id').val(response.messages.district_id).trigger('change.select2');
                    // Add a small delay to ensure Select2 DOM is updated
                    setTimeout(function () {
                        const district = $("#select2-select_district-container").attr('title');

                        fetch_upazila(response.messages.district_id, function () {
                            $('.edit_upazila_id').val(response.messages.upazila_id).trigger('change.select2');

                            setTimeout(function () {
                                const upazila = $("#select2-select_upazila-container").attr('title');

                                // Now safely append setting display
                                const settingDisplay = $("#SettingDisplay");
                                settingDisplay.append(`
                                    <li id="clearDistrict">
                                        <label class="form-check-label line-label" for="district">
                                            District : ${district}
                                        </label>
                                    </li>
                                    <li id="clearUpazila">
                                        <label class="form-check-label line-label" for="upazila">
                                            Upazila/Thana : ${upazila}
                                        </label>
                                    </li>
                                `);
                            }, 200); // Allow Select2 to finish updating the DOM
                        });
                    }, 200);
                });
                fetch_upazila(response.messages.district_id, function (){
                    // Set the value once options are available
                    $('.edit_upazila_id').val(response.messages.upazila_id).trigger('change.select2');
                });
                $('.edit_town_name').val(response.messages.town_name);
                $('.edit_location').val(response.messages.location);

                // Modal delete, update and confirm data get
                const updateBranch = $("#branch_update_modal");
                const updateBranchHeading = $("#branch_update_modal_heading");
                const deleteBranch = $("#delete_branch_id");
                const deleteBranchHeading = $("#delete_branch");
                const deleteBranchBody = $("#delete_branch_body");
                const deleteBranchConfirm = $("#delete_confrm_branch_id");
                updateBranch.append(`<span class="">${response.messages.branch_name}</span>`);
                updateBranchHeading.append(`<span class="">${response.messages.branch_name}</span>`);
                deleteBranch.append(`<span class="">${response.messages.branch_id}</span>`);
                deleteBranchHeading.append(`<span class="">${response.messages.branch_name}</span>`);
                deleteBranchBody.append(`<span class="">${response.messages.branch_name}</span>`);
                deleteBranchConfirm.append(`<span class="">${response.messages.branch_id}</span>`);

                // setting component display
                $("#settingDisplayCard").removeAttr('hidden');
                const settingDisplay = $("#SettingDisplay"); 
                const division = $("#select2-select_division-container").attr('title');

                settingDisplay.append(`
                    <li id="clearBranchType">
                        <label class="form-check-label line-label" for="branch-type">
                            Branch-Type : ${response.messages.branch_type}
                        </label>
                    </li>
                    <li id="clearBranchID">
                        <label class="form-check-label line-label" for="branch-id">
                            Branch-ID : ${response.messages.branch_id}
                        </label>
                    </li>
                    <li id="clearBranchName">
                        <label class="form-check-label line-label" for="branch-name">
                            Branch-Name : ${response.messages.branch_name}
                        </label>
                    </li>
                    <li id="clearCity">
                        <label class="form-check-label line-label" for="city">
                            City/Town : ${response.messages.town_name}
                        </label>
                    </li>
                    <li id="clearLocation">
                        <label class="form-check-label line-label" for="location">
                            Location : ${response.messages.location}
                        </label>
                    </li>
                    <li id="clearDivision">
                        <label class="form-check-label line-label" for="division">
                            Division : ${division}
                        </label>
                    </li>
                `);

            }, 1000);
        }
        // call branch type
        function safelySetBranchType(branchTypeName) {
            if ($(`.edit_branch_type option[value="${branchTypeName}"]`).length === 0) {
                fetch_branch_types(); // Fetch if missing
                setTimeout(() => {
                    $('.edit_branch_type').val(branchTypeName).trigger('change.select2');
                }, 500);
            } else {
                $('.edit_branch_type').val(branchTypeName).trigger('change.select2');
            }
        }
        // single data cache clear
        function clearBranchCache(branchId) {
            const stringId = String(branchId); // Force it to match the cache key
            if (branchDetailsCache.hasOwnProperty(stringId)) {
                delete branchDetailsCache[stringId];
                console.log(`Cache cleared for branch ID: ${stringId}`);
            }else if (branchCategoryDetailsCache.hasOwnProperty(stringId)) {
                delete branchCategoryDetailsCache[stringId];
                console.log(`Cache cleared for branch ID: ${stringId}`);
            } else {
                console.warn(`No cache found for branch ID: ${stringId}`);
                console.log('Current keys:', Object.keys(branchCategoryDetailsCache));
            }
        }
        // all cache clear
        function clearAllBranchCache() {
            branchDetailsCache = {};
            console.log("All branch cache cleared.");
        }

        // fetch branch for dropdown
        function searchBranch(){

            if (getAppRAM('branchSearchFlags')) {
                // Use cached data
                populate_branch_searches(getAppRAM('branchSearchResults'));
                return;
            }

            const currentUrl = "{{ route('search-branch.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    // Save to Parent RAM
                    updateAppRAMBulk({
                        branchSearchFlags: true,
                        branchSearchResults: response
                    });
                    populate_branch_searches(response);
                },
                error: function() {
                    console.error('Failed to fetch branch search.');
                    $("#select_branch").empty();
                    $("#select_branch").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        // Populate dropdown from response
        function populate_branch_searches(response) {
            $('#select_branch').empty().removeClass('alert alert-danger');
            // Data get from backend
            const all_branchs = response.allBranch || [];

            $("#select_branch").empty().append(
                '<option value="">Select Company Branch Name</option>'
            );

            $.each(all_branchs, function(_, item) {
                $("#select_branch").append(`
                    <option style="color:white;font-weight:600;" value="${item.id}">
                        ${item.branch_name}
                    </option>
                `);
            });
        }
        
        // =======----------- Branch List Table Structure ===============-------------
        function table_rows(rows){
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="td-error-cell text-center" colspan="9">
                            <div class="table-svg-container pt-1">
                                <svg width="20" height="30" viewBox="0 0 61 81" fill="#fff" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round"><use xlink:href="#A" x=".5" y=".5"/><symbol id="A" overflow="visible"><g stroke="none"><path d="M0 10.929V69.07C0 75.106 13.432 80 30 80V10.929H0z" fill="#3999c6"/><path d="M29.589 79.999h.412c16.568 0 30-4.891 30-10.929v-58.14H29.589v69.07z" fill="#59b4d9"/><path d="M60 10.929c0 6.036-13.432 10.929-30 10.929S0 16.965 0 10.929 13.432 0 30 0s30 4.893 30 10.929"/><path d="M53.867 10.299c0 3.985-10.686 7.211-23.867 7.211S6.132 14.284 6.132 10.299 16.819 3.088 30 3.088s23.867 3.228 23.867 7.211" fill="#7fba00"/><path d="M48.867 14.707c3.124-1.219 5.002-2.745 5.002-4.403 0-3.985-10.686-7.213-23.868-7.213S6.134 6.318 6.134 10.303c0 1.658 1.877 3.185 5.002 4.403 4.363-1.703 11.182-2.803 18.865-2.803s14.5 1.1 18.866 2.803" fill="#b8d432"/><path d="M49.389 58.071c-1.605 1.346-3.78 2.022-6.607 2.022h-9.428V35.358h8.943c2.816 0 4.973.517 6.457 1.588 1.389 1.005 2.086 2.41 2.086 4.205 0 1.431-.507 2.648-1.543 3.719-.882.885-1.942 1.497-3.248 1.856v.058c1.753.217 3.184.889 4.25 2.017.997 1.071 1.511 2.384 1.511 3.903.007 2.262-.813 4.033-2.42 5.366m-22.977-1.457c-2.359 2.322-5.544 3.479-9.519 3.479H8.19V35.358h8.704c8.731 0 13.098 3.998 13.098 12.043 0 3.846-1.181 6.925-3.579 9.213"/><path d="M16.439 39.873h-2.727v15.704h2.759c2.425 0 4.304-.763 5.695-2.227 1.332-1.463 2.006-3.415 2.006-5.883 0-2.317-.674-4.143-1.975-5.495-1.365-1.397-3.275-2.099-5.757-2.099" fill="#3999c6"/><path d="M43.993 44.483c.666-.583.999-1.346.999-2.293 0-1.834-1.332-2.747-4.033-2.747h-2.084v5.86h2.454c1.122 0 2.031-.282 2.665-.821m.909 5.817c-.73-.546-1.722-.853-3.004-.853h-3.03v6.524h3.001c1.276 0 2.303-.304 3.062-.914.696-.612 1.058-1.399 1.058-2.439.006-.977-.357-1.769-1.087-2.317" fill="#59b4d9"/></g></symbol></svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="rgb(205, 247, 0)" stroke="#3999c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit"><circle cx="12" cy="12" r="4"/><line x1="1.05" y1="12" x2="7" y2="12"/><line x1="17.01" y1="12" x2="22.96" y2="12"/></svg>
                                <span><svg width="20" height="20" fill="#3999c6" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 445.38"><path d="M6.95 0h498.1c3.82 0 6.95 3.16 6.95 6.92v96.5l-.02.46v341.5H0V88.11h.01L0 6.92C0 3.11 3.12 0 6.95 0zm11.57 315.78h104.12V219.6H18.52v96.18zm122.64 0h105.8V219.6h-105.8v96.18zm124.32 0h105.35V219.6H265.48v96.18zm123.87 0h104.12V219.6H389.35v96.18zm104.12 18.52H389.35v92.56h104.12V334.3zm-122.64 0H265.48v92.56h105.35V334.3zm-123.87 0h-105.8v92.56h105.8V334.3zm-124.32 0H18.52v92.56h104.12V334.3zM18.52 201.09h104.12v-94.46H18.52v94.46zm122.64 0h105.8v-94.46h-105.8v94.46zm124.32 0h105.35v-94.46H265.48v94.46zm123.87 0h104.12v-94.46H389.35v94.46z"/></svg></span>
                                <span> Branch Data Not Exists On Server <span style="color:rgb(220, 53, 69)">!</span></span>
                            </div>
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="zebra-table-row" key="${key}" id="BranchRow">
                        <td id="cellId" class="td-cell-first" data-id="${row.id}" style="text-align:center;">
                            ${row.id}
                            <div class="row-resizer"></div>
                        </td>
                        <td id="cellId" class="td-cell-middle">
                            ${row.branch_type}
                            <div class="row-resizer"></div>
                        </td>
                        <td id="cellId" class="td-cell-middle">
                            ${row.branch_id}
                            <div class="row-resizer"></div>
                        </td>
                        <td id="cellId" class="td-cell-middle">
                            ${row.branch_name}
                            <div class="row-resizer"></div>
                        </td>
                        <td id="cellId" class="td-cell-middle">
                            ${row.divisions.division_name}
                            <div class="row-resizer"></div>
                        </td>
                        <td id="cellId" class="td-cell-middle">
                            ${row.districts.district_name}
                            <div class="row-resizer"></div>
                        </td>
                        <td class="td-cell-middle">
                            ${row.thana_or_upazilas.thana_or_upazila_name}
                            <div class="row-resizer"></div>
                        </td>
                        <td id="cellId" class="td-cell-middle">
                            ${row.town_name}
                            <div class="row-resizer"></div>
                        </td>
                        <td id="cellId" class="td-cell-last">
                            ${row.location}
                            <div class="row-resizer"></div>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }
        // Generate Cache Key For RAM Data
        function generateBranchCacheKey(query = '', url = null, perItem = null, sortField = 'id', sortDirection = 'desc', page = 1) {
            const branch_type = $("#selectBranchCategories").val();
            perItem = perItem ?? $("#perItemControl").val();

            if (url) {
                try {
                    const parsed = new URL(url, window.location.origin);
                    parsed.searchParams.delete('page');
                    url = parsed.pathname + parsed.search;
                } catch (e) {
                    url = url.replace(/([&?])page=\d+/, '').replace(/[&?]$/, '');
                }
            }

            return `branchListData_${btoa(`${query}|${branch_type}|${url}|${perItem}|${sortField}|${sortDirection}|${page}`)}`;
        }
        // fetch branch list table
        function fetchTableBranch(query = '', url = null, perItem = null, sortField = 'id', sortDirection = 'desc', forceRefresh = false) {
            const branch_type = $("#selectBranchCategories").val();
            perItem = perItem ?? $("#perItemControl").val();

            // 1 Generate a unique cache key for this combination
            const cacheKey = `branchListData_${btoa(`${query}|${branch_type}|${url}|${perItem}|${sortField}|${sortDirection}`)}`;

            // 2 If cache exists and not forceRefresh — use it
            if (!forceRefresh) {
                const cached = getAppRAM(cacheKey);
                if (cached && Array.isArray(cached.data)) {
                    populate_branch_list_table(cached);
                    tableSkeleton();
                    return;
                }
            }

            showTableLoader();

            let current_url = url ?? `{{ route('search-branch.action') }}`;
            current_url += current_url.includes('?') ? `&per_item=${perItem}` : `?per_item=${perItem}`;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query,
                    branch_type,
                    sort_field: sortField,
                    sort_direction: sortDirection
                },
                success: function(response) {
                    // Save to RAM with dynamic key
                    updateAppRAM(cacheKey, response); 
                    populate_branch_list_table(response); 
                },
                complete: function() {
                    hideTableLoader();
                    tableSkeleton();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const res = xhr.responseJSON;
                        if (res && res.message) {
                            showMessageInTable(res.message);
                        }
                        console.clear();
                    } else {
                        showMessageInTable('Server error. Please try again later');
                    }
                }
            });

            function showMessageInTable(message) {
                $('#BranchListTableBody').html(`
                    <tr>
                        <td class="td-error-cell text-center" colspan="9">
                            <div class="table-svg-container pt-1">
                                <!-- svg omitted for brevity -->
                                <span>${message} <span style="color:rgb(220, 53, 69)">!</span></span>
                            </div>
                        </td>
                    </tr>
                `);
            }
        }
        // fetch branch list table render
        function populate_branch_list_table(response) {
            const { data, links, total, per_page, per_item_num, totalBranch, totalBranchCategories, message } = response;

            if (message) {
                showMessageInTable(message);
                return;
            }

            $("#BranchListTableBody").html(table_rows([...data]));
            $("#branch_data_table_paginate").html(paginate_html({ links, total }));
            $("#total_branch").text(total);
            $("#total_branch_items").text(total);
            $("#total_per_branch_items").text(per_page);
            $("#per_branch_items_num").text(per_item_num);
            $("#totalBranch").text(parseFloat(totalBranch).toFixed(2));
            numberAnimation(document.getElementById("totalBranch"), parseFloat(totalBranch), 2000, 2);
            $("#totalBranchCategories").text(parseFloat(totalBranchCategories).toFixed(2));
            numberAnimation(document.getElementById("totalBranchCategories"), parseFloat(totalBranchCategories), 2000, 2);

            restoreRowHeights('BranchTableSetting');
            resize('BranchTableSetting', 'col-resizer', 'row-resizer');
            enableColumnDragAndDrop('BranchTableSetting', '.move-icon');

            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                new bootstrap.Tooltip(el);
            });
        }
        // build pagination link for RAM
        function buildPaginationLinks(currentPage, perPage, totalItems) {
            const totalPages = Math.ceil(totalItems / perPage);
            const links = [];

            // Previous link
            links.push({
                label: "Previous",
                url: currentPage > 1 ? `?page=${currentPage - 1}` : null,
                active: false
            });

            // Numbered links
            for (let i = 1; i <= totalPages; i++) {
                links.push({
                    label: i.toString(),
                    url: `?page=${i}`,
                    active: i === currentPage
                });
            }

            // Next link
            links.push({
                label: "Next",
                url: currentPage < totalPages ? `?page=${currentPage + 1}` : null,
                active: false
            });

            return links;
        }
        function showTableLoader() {
            $('#tableOverlayLoader').removeClass('display_none');
        }
        function hideTableLoader() {
            $('#tableOverlayLoader').addClass('display_none');
        }
        // Search For Branch List Table
        $(document).on('click', '.search-layer', function() {
            //const query = $(this).val();
            $(this).tooltip('hide');
            const query = $("#search").val().toLowerCase().trim();
            const cacheKey = generateBranchCacheKey(query);
            const cachedData = getAppRAM(cacheKey);


            if (cachedData && Array.isArray(cachedData.data)) {
                const filteredData = {
                    ...cachedData,
                    data: cachedData.data.filter(item =>
                        item.branch_name?.toLowerCase().includes(query) ||
                        item.branch_id?.toLowerCase().includes(query)
                    )
                };

                populate_branch_list_table(filteredData);
                showTableLoader();

                let debounceTimer = setTimeout(() => {
                    hideTableLoader();
                    tableSkeleton();
                }, 300);

                return;
            }

            fetchTableBranch(query);
        });
        // Filter Dropdown Start
        $(document).on('click', '#showFilterField', function(){
            fetch_branch_categories();
        });
        // Filter For Branch List Table Data
        $(document).on('change', '#selectBranchCategories', function() {
            const selectedCategory = $(this).val();
            const cacheKey = generateBranchCacheKey();
            const cachedData = getAppRAM(cacheKey);

            if (cachedData && Array.isArray(cachedData.data)) {
                const filteredData = {
                    ...cachedData,
                    data: cachedData.data.filter(item =>
                        selectedCategory === "" || item.branch_type === selectedCategory
                    )
                };

                populate_branch_list_table(filteredData);
                showTableLoader();

                let debounceTimer = setTimeout(() => {
                    hideTableLoader();
                    tableSkeleton();
                }, 300);

                return;
            }

            fetchTableBranch();
        });
        // Sort Data For Branch List Table Data
        $(document).on('click', '.label-svg', function() {
            var btnIcon = $(this);
            var button = $("#headId");
            var column = button.data('coloumn');
            var order = button.data('order');
            order = order === 'desc' ? 'asc' : 'desc';
            button.data('order', order);

            const cacheKey = generateBranchCacheKey('', null, null, column, order);
            const cachedData = getAppRAM(cacheKey);

            if (cachedData && Array.isArray(cachedData.data)) {
                const sortedData = [...cachedData.data].sort((a, b) => {
                    const valA = a[column] ?? '';
                    const valB = b[column] ?? '';
                    return order === 'asc' ? (valA > valB ? 1 : -1) : (valA < valB ? 1 : -1);
                });

                const sortedResponse = {
                    ...cachedData,
                    data: sortedData
                };

                populate_branch_list_table(sortedResponse);
                showTableLoader();

                let debounceTimer = setTimeout(() => {
                    hideTableLoader();
                    tableSkeleton();
                }, 300);
            } else {
                fetchTableBranch('', null, null, column, order);
            }

            btnIcon.find("#Layer_1").remove();
            // Define sorting icons 
            var iconHTML = order === 'desc'
                ?  `<svg id="Layer_1" width="12px" height="12px" fill="#333333a1" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,0 0,63.673 39.403,63.673 39.403,122.88 83.033,122.88 83.033,63.673 122.433,63.673 61.216,0"/></g></svg>`// Down arrow
                : `<svg id="Layer_1" width="12px" height="12px" fill="#333333a1" version="1.1" viewBox="0 0 122.433 122.88"><g><polygon fill-rule="evenodd" clip-rule="evenodd" points="61.216,122.88 0,59.207 39.403,59.207 39.403,0 83.033,0 83.033,59.207 122.433,59.207 61.216,122.88"/></g></svg>`; // Up arrow

            // Append sorting icon only for the clicked column
            btnIcon.append(iconHTML);
        });
        // tab button
        $(document).on('click', '.branch-tab-btn', function () {
            $('.branch-tab-btn').removeClass('active-button').addClass('deactive');
            $(this).removeClass('deactive').addClass('active-button');

            buttonBorderAnimation('.connectorPath', '.branch-tab-btn', 'active-button');
        });
        // skeleton
        function tableSkeleton() {
            const allSkeleton = document.querySelectorAll('.table-footer-lable-skeleton, .skeleton, .table-icon-skeleton')

            allSkeleton.forEach(item => {
                item.classList.remove('table-footer-lable-skeleton', 'skeleton', 'table-icon-skeleton')
            });
        }
        // Pagination html
        function paginate_html ({ links, total }) {
            if (total == 0) {
                return "";
            }

            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination skeleton">
                        ${links.map((link, key) => {
                            // Handle Previous and Next buttons separately
                            if (link.label.toLowerCase().includes("previous")) {
                                return `
                                    <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                        <a class="page-link btn_page" data-url="${link.url ? link.url : '#'}" data-bs-toggle="tooltip"  data-bs-placement="left" title="Previous" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                            <svg width="10px" height="9px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 121.66"><path d="M1.24,62.65,120.1,121.46a1.92,1.92,0,0,0,2.58-.88,1.89,1.89,0,0,0,0-1.76h0l-30.87-58,30.87-58h0a1.89,1.89,0,0,0,0-1.76A1.92,1.92,0,0,0,120.1.2L1.24,59a2,2,0,0,0,0,3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            } 
                            if (link.label.toLowerCase().includes("next")) {
                                return `
                                    <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                        <a class="page-link btn_page" data-url="${link.url ? link.url : '#'}" data-bs-toggle="tooltip"  data-bs-placement="right" title="Next" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                            <svg width="10px" height="9px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.86 121.64"><path d="M121.62,59,2.78.2A1.92,1.92,0,0,0,.2,1.08a1.89,1.89,0,0,0,0,1.76h0l30.87,58L.23,118.8h0a1.89,1.89,0,0,0,0,1.76,1.92,1.92,0,0,0,2.58.88l118.84-58.8a2,2,0,0,0,0-3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            }

                            // Regular page numbers
                            return `
                                <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                    <a class="page-link btn_page" data-url="${link.url ? link.url : '#'}">
                                        ${link.label}
                                    </a>
                                </li>
                            `;
                        }).join("\n")}
                    </ul>
                </nav>
            `;
        };
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const perItem = parseInt(e.target.value);
            const page = 1; // Always reset to page 1 on per item change

            const cacheKey = generateBranchCacheKey('', null, perItem, 'id', 'desc', page);
            const cachedData = getAppRAM(cacheKey);

            if (cachedData && Array.isArray(cachedData.data)) {
                const start = (page - 1) * perItem;
                const slicedData = cachedData.data.slice(start, start + perItem);

                const updatedData = {
                    ...cachedData,
                    data: slicedData,
                    current_page: page,
                    per_page: perItem,
                    total: cachedData.data.length,
                    links: buildPaginationLinks(page, perItem, cachedData.data.length)
                };

                populate_branch_list_table(updatedData);
                showTableLoader();
                setTimeout(() => {
                    hideTableLoader();
                    tableSkeleton();
                }, 300);
                return;
            }

            // Pass page 1 explicitly here
            const url = `{{ route('search-branch.action') }}?page=1&per_item=${perItem}`;
            fetchTableBranch('', url, perItem, 'id', 'desc', true);
        });
        // change paginate page------------------------
        $("#branch_data_table_paginate").delegate("a", "click", function(e) {
            e.preventDefault();
            $(this).tooltip('hide');
            const url = $(this).attr('data-url');
            if (!url || url === '#') return;

            const perItem = parseInt($("#perItemControl").val()) || 10;
            const cacheKey = generateBranchCacheKey('', url, perItem);
            const cachedData = getAppRAM(cacheKey);

            if (cachedData && Array.isArray(cachedData.data)) {
                let page = 1;
                try {
                    const parsed = new URL(url, window.location.origin);
                    page = parseInt(parsed.searchParams.get('page')) || 1;
                } catch (e) {
                    const match = url.match(/page=(\d+)/);
                    page = match ? parseInt(match[1]) : 1;
                }

                const start = (page - 1) * perItem;
                const slicedData = cachedData.data.slice(start, start + perItem);

                const updatedData = {
                    ...cachedData,
                    data: slicedData,
                    current_page: page,
                    per_page: perItem,
                    total: cachedData.data.length,
                    links: buildPaginationLinks(page, perItem, cachedData.data.length)
                };

                populate_branch_list_table(updatedData);
                showTableLoader();
                
                let debounceTimer = setTimeout(() => {
                    hideTableLoader();
                    tableSkeleton();
                }, 300);
                return;
            }

            fetchTableBranch('', url);
        });

        // =================================================================
        // ------------------ Start Second Page Branch Setting -------------
        // =================================================================

        // =============== Setting Optations ===============================
        // Select ID Radio Button form Setting Mode
        $(document).on('click', 'label.custom-label', function(){
            // Remove class from all other custom-labels
            $('#SettingMode label.custom-label').removeClass('label-highlight');
            // Add class to the clicked one
            $(this).addClass('label-highlight');
        });
        // setting mode optation radio button action
        $(document).on('click', '#flexRadioDefault1, #flexRadioDefault2, #flexRadioDefault3, #flexRadioDefault4', function(){
            // Hide all button initially
            $("#enableNewBranch").attr('hidden', true);
            $("#enableUpdateBranch").attr('hidden', true);
            $("#enableDeleteBranch").attr('hidden', true);
            $("#disabledNewBranch").attr('hidden', true);
            $("#disabledUpdatedBranch").attr('hidden', true);
            $("#disabledDeleteBranch").attr('hidden', true);
            $("#setting_card").attr('hidden', true);
            $("#settingImplementCard").attr('hidden', true);

            $(".disabledChecking").attr('hidden', true);
            $(".enableChecking").attr('hidden', true);
            // $("#loaderSpin").removeAttr('hidden');
            $("#loaderSpinner").removeAttr('hidden');

            // Show button step by step according to condition
            if($(this).attr('id') === 'flexRadioDefault1' ){
                setTimeout(() => {
                    $("#settingImplementCard").removeAttr('hidden');
                    $("#enableNewBranch").removeAttr('hidden');
                    $("#loaderSpin").attr('hidden', true);
                    $("#loaderSpinner").attr('hidden', true);
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                    $("#documents").attr('hidden', true);
                }, 10);
            }else if($(this).attr('id') === 'flexRadioDefault2'){
                setTimeout(() => {
                    $("#settingImplementCard").removeAttr('hidden');
                    $("#enableUpdateBranch").removeAttr('hidden');
                    $("#loaderSpin").attr('hidden', true);
                    $("#loaderSpinner").attr('hidden', true);
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                    $("#documents").attr('hidden', true);
                }, 10);
            }else if($(this).attr('id') === 'flexRadioDefault3'){
                setTimeout(() => {
                    $("#settingImplementCard").removeAttr('hidden');
                    $("#enableDeleteBranch").removeAttr('hidden');
                    $("#loaderSpin").attr('hidden', true);
                    $("#loaderSpinner").attr('hidden', true);
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                    $("#documents").attr('hidden', true);
                }, 10);
            }else if($(this).attr('id') === 'flexRadioDefault4'){
                $("#settingImplementCard").attr('hidden', true);
                $("#enableNewBranch").attr('hidden', true);
                $("#enableUpdateBranch").attr('hidden', true);
                $("#enableDeleteBranch").attr('hidden', true);
                $("#loaderSpin").attr('hidden', true);
                $("#loaderSpinner").attr('hidden', true);
                $("#disabledNewBranch").attr('hidden', true);
                $("#disabledUpdatedBranch").attr('hidden', true);
                $("#disabledDeleteBranch").attr('hidden', true);
                $(".disabledChecking").attr('hidden', true);
                $(".enableChecking").attr('hidden', true);
                $("#setting_card").attr('hidden', true);
                // Display Component Settings Empty
                $("#SettingDisplay").empty();
                $("#settingDisplayCard").attr('hidden', true);
                $("#documents").attr('hidden', true);
            }
        });
        // setting action enable button
        $(document).on('click', '#enableNewBranch, #enableUpdateBranch, #enableDeleteBranch', function(){
            // Hide all button initially
            $("#disabledNewBranch").attr('hidden', true);
            $("#disabledUpdatedBranch").attr('hidden', true);
            $("#disabledDeleteBranch").attr('hidden', true);
            $("#enableNewBranch").attr('hidden', true);
            $("#enableUpdateBranch").attr('hidden', true);
            $("#enableDeleteBranch").attr('hidden', true);
            $("#setting_card").attr('hidden', true);

            $("#loaderSpinner").removeAttr('hidden');
            $(".disabledChecking").attr('hidden', true);
            $(".enableChecking").attr('hidden', true);

            $("#formContent").removeClass('display_none');

            if($(this).attr('id') === 'enableNewBranch'){
                setTimeout(() => {
                    if (!getAppRAM('branchTypeFlags')) {
                        fetch_branch_types();
                    }else{
                        populate_branch_types(getAppRAM('branchTypes'));
                    }
                    $("#loaderSpinner").attr('hidden', true);
                    $("#enableNewBranch").removeAttr('hidden');
                    $("#disabledNewBranch").removeAttr('hidden');
                    $(".enableChecking").removeAttr('hidden');
                    $("#setting_card").removeAttr('hidden');
                    $(".branch_select").addClass('display_none');
                    $(".branch_type").removeClass('display_none');
                    
                    // button show
                    $("#save").addClass('display_none');
                    $("#cancel_btn").show();
                    $("#next").removeClass('display_none');
                    $("#deleteBranch").hide();
                    $("#update_btn").hide();
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                }, 1000);
            }else if($(this).attr('id') === 'enableUpdateBranch'){
                setTimeout(() => {
                    if (!getAppRAM('branchSearchFlags')) {
                        searchBranch();
                    }else{
                        populate_branch_searches(getAppRAM('branchSearchResults'));
                    }

                    $("#loaderSpinner").attr('hidden', true);
                    $("#enableUpdateBranch").removeAttr('hidden');
                    $("#disabledUpdatedBranch").removeAttr('hidden');
                    $(".enableChecking").removeAttr('hidden');
                    $("#setting_card").removeAttr('hidden');
                    $(".branch_select").removeClass('display_none');
                    $(".branch_type").addClass('display_none');
                    // button show
                    $("#save").addClass('display_none');
                    $("#deleteBranch").hide();
                    $("#next").addClass('display_none');
                    $("#cancel_btn").show();
                    $("#update_btn").show();
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                }, 1000);
            }else if($(this).attr('id') === 'enableDeleteBranch'){
                setTimeout(() => {
                    if (getAppRAM('branchSearchFlags')) {
                        searchBranch();
                    }else{
                        populate_branch_searches(getAppRAM('branchSearchResults'));
                    }

                    $("#loaderSpinner").attr('hidden', true);
                    $("#enableDeleteBranch").removeAttr('hidden');
                    $("#disabledDeleteBranch").removeAttr('hidden');
                    $(".enableChecking").removeAttr('hidden');
                    $("#setting_card").removeAttr('hidden');
                    $(".branch_select").removeClass('display_none');
                    $(".branch_type").addClass('display_none');
                    // button show
                    $("#save").addClass('display_none');
                    $("#update_btn").hide();
                    $("#next").addClass('display_none');
                    $("#cancel_btn").show();
                    $("#deleteBranch").show();
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                }, 1000);
            }
        });
        // setting action disabled button
        $(document).on('click', '#disabledNewBranch, #disabledUpdatedBranch, #disabledDeleteBranch', function(){

            // Hide all button initially
            $("#disabledNewBranch").attr('hidden', true);
            $("#disabledUpdatedBranch").attr('hidden', true);
            $("#disabledDeleteBranch").attr('hidden', true);
            $("#enableNewBranch").attr('hidden', true);
            $("#enableUpdateBranch").attr('hidden', true);
            $("#enableDeleteBranch").attr('hidden', true);
            $("#setting_card").attr('hidden', true);

            $("#loaderSpinner").removeAttr('hidden');
            $(".disabledChecking").attr('hidden', true);
            $(".enableChecking").attr('hidden', true);

            $("#formContent").addClass('display_none');

            if($(this).attr('id') === 'disabledNewBranch'){
                setTimeout(() => {
                    $("#loaderSpinner").attr('hidden', true);
                    $("#enableNewBranch").removeAttr('hidden');
                    $("#disabledNewBranch").removeAttr('hidden');
                    $(".enableChecking").attr('hidden', true);
                    $(".disabledChecking").removeAttr('hidden');
                    $("#setting_card").attr('hidden', true);
                    // button show
                    $("#save").addClass('display_none');
                    $("#cancel_btn").hide();
                    $("#next").addClass('display_none');
                    $("#deleteBranch").hide();
                    $("#update_btn").hide();
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                }, 1000);
            }else if($(this).attr('id') === 'disabledUpdatedBranch'){
                setTimeout(() => {
                    $("#loaderSpinner").attr('hidden', true);
                    $("#enableUpdateBranch").removeAttr('hidden');
                    $("#disabledUpdatedBranch").removeAttr('hidden');
                    $(".enableChecking").attr('hidden', true);
                    $(".disabledChecking").removeAttr('hidden');
                    $("#setting_card").attr('hidden', true);
                    // button show
                    $("#save").addClass('display_none');
                    $("#cancel_btn").hide();
                    $("#next").addClass('display_none');
                    $("#deleteBranch").hide();
                    $("#update_btn").hide();
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                }, 1000);
            }else if($(this).attr('id') === 'disabledDeleteBranch'){
                setTimeout(() => {
                    $("#loaderSpinner").attr('hidden', true);
                    $("#enableDeleteBranch").removeAttr('hidden');
                    $("#disabledDeleteBranch").removeAttr('hidden');
                    $(".enableChecking").attr('hidden', true);
                    $(".disabledChecking").removeAttr('hidden');
                    $("#setting_card").attr('hidden', true);
                    // button show
                    $("#save").addClass('display_none');
                    $("#cancel_btn").hide();
                    $("#next").addClass('display_none');
                    $("#deleteBranch").hide();
                    $("#update_btn").hide();
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                }, 1000);
            }
        });

        // =============== Branch Setting Part ===============================
        // next button action
        $(document).on('click', '#next', function () {
            $("#SelectBranchID").empty();
            $('.error_val').empty();
            var branchID = $("#branch_id").val();
            var branchIdShow = $("#SelectBranchID");
            var branchType = $("#branch_type").val();
            var branchName = $("#branchName").val();
            var townName = $("#townName").val();
            var location = $("#location").val();
            var division = $("#select_division").val();
            var district = $("#select_district").val();
            var upazila = $("#select_upazila").val();

            if (branchType === '') {
                showOverlayMessage('Please select branch type');
                return;
            }

            if ($("#inputBranchNameGroup").hasClass('display_none')) {
                $("#inputBranchNameGroup").removeClass('display_none').hide().slideDown("slow");
                return;
            }

            if (branchName === '') {
                showOverlayMessage('Please enter branch name');
                return;
            }

            if ($("#inputCityNameGroup").hasClass('display_none')) {
                $("#inputCityNameGroup").removeClass('display_none').hide().slideDown("slow");
                return;
            }

            if (townName === '') {
                showOverlayMessage('Please enter city/town name');
                return;
            }

            if ($("#inputLocatioinNameGroup").hasClass('display_none')) {
                $("#inputLocatioinNameGroup").removeClass('display_none').hide().slideDown("slow");
                return;
            }

            if (location === '') {
                showOverlayMessage('Please enter location');
                return;
            }

            if ($("#dropdwonDivisionNameGroup").hasClass('display_none')) {
                $("#dropdwonDivisionNameGroup").removeClass('display_none').hide().slideDown("slow");
                return;
            }

            if (division === '') {
                showOverlayMessage('Please select division');
                return;
            }

            if ($("#dropdwonDistrictNameGroup").hasClass('display_none')) {
                $("#dropdwonDistrictNameGroup").removeClass('display_none').hide().slideDown("slow");
                return;
            }

            if (district === '') {
                showOverlayMessage('Please select district');
                return;
            }

            if ($("#dropdwonUpazilaNameGroup").hasClass('display_none')) {
                $("#dropdwonUpazilaNameGroup").removeClass('display_none').hide().slideDown("slow");
                return;
            }

            if (upazila === '') {
                showOverlayMessage('Please select upazila');
                return;
            }
            // Select Dropdown Branch Id
            branchIdShow.append(`
                <option class="custom-optation" selected>Select Branch ID</option>
                <option class="custom-optation" id="optation_id" value="${branchID}">${branchID}</option>
            `);
            showOverlayMessage('All fields completed!');
        });
        // Select ID Button form Compnent Setting 
        $(document).on('click', '#optation_id', function(){
            const idValue = $(this).val();
            const settingDisplay = $("#SettingDisplay");
            // Clear Branch ID
            settingDisplay.find('#clearBranchID').remove();
            if(idValue !== ''){
                $("#save").removeAttr('disabled');
                $(this).addClass('active-height-light');
                // display component setting
                settingDisplay.append(`
                    <li id="clearBranchID">
                        <label class="form-check-label line-label" for="branch-type">
                            Branch-ID : ${idValue}
                        </label>
                    </li>
                `);
            }
        });
        // Setting components Display
        $(document).on('change', '#branch_type', function(){

            // setting dispaly
            let branchType = $(this).val();
            let settingDisplay = $("#SettingDisplay");

            // setting dispalay part
            $("#settingDisplayCard").attr('hidden', true);

            setTimeout(() => {
                $("#settingDisplayCard").removeAttr('hidden'); 
            }, 10);

            if(branchType !== ''){
                settingDisplay.find('#clearBranchType').remove();
                // Setting Display
                settingDisplay.append(`
                    <li id="clearBranchType">
                        <label class="form-check-label line-label" for="branch-type">
                            Branch-Type : ${branchType}
                        </label>
                    </li>
                `);
            }else if(branchType == ''){
                // Display Component Settings Empty
                settingDisplay.find('#clearBranchType').remove();
            }
        });
        // setting message show
        function showOverlayMessage(message, duration = 2000) {
            $("#messgText").text(message);
            $("#formContent").removeClass('display_none').fadeIn("fast");
            if(message == 'All fields completed!'){
                setTimeout(function () {
                    $("#formMessage").fadeOut("fast", function () {
                        $(this).addClass("display_none");
                        $("#messgText").text('');
                        $("#formContent").addClass('display_none');
                        $("#next").addClass('display_none');
                        $("#save").removeClass('display_none');
                        $("#ContentView").removeClass('display_none');
                    });
                }, duration);
            }

            $("#formMessage").removeClass("display_none").fadeIn("fast");

            setTimeout(function () {
                $("#formMessage").fadeOut("fast", function () {
                    $(this).addClass("display_none");
                    $("#messgText").text('');
                });
            }, duration);
        }
        // fetch branch type/category for dropdown
        function fetch_branch_types(){

            if (getAppRAM('branchTypeFlags')) {
                // Use cached data
                populate_branch_types(getAppRAM('branchTypes'));
                return;
            }

            const currentUrl = "{{ route('search-branch-type.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    // Save to Parent RAM
                    updateAppRAMBulk({
                        branchTypeFlags: true,
                        branchTypes: response
                    });
                    populate_branch_types(response);
                },
                error: function() {
                    console.error('Failed to fetch branch types.');
                    $("#branch_type").empty();
                    $("#branch_type").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        // Populate dropdown from response
        function populate_branch_types(response) {
            $('#permission_message').empty().removeClass('alert alert-danger');
            // Get data from backend
            const branch_categories = response.branch_categories || [];

            $("#branch_type").empty().append(
                '<option value="">Select Branch Category Name</option>'
            );

            $.each(branch_categories, function(_, item) {
                $("#branch_type").append(`
                    <option style="color:white;font-weight:600;" value="${item.branch_category_name}">
                        ${item.branch_category_name}
                    </option>
                `);
            });
        }

        // ADD New Branch
        $(document).on('click', '#save', function(e){
            e.preventDefault();
            $("#savForm_error").removeAttr('hidden');
            $("#savForm_error6").removeAttr('hidden');
            $("#savForm_error7").removeAttr('hidden');
            
            var data = {
                'branch_id' : $("#branch_id").val(),
                'branch_name' : $("#branchName").val(),
                'branch_type' : $("#branch_type").val(),
                'division_id' : $("#select_division").val(),
                'district_id' : $("#select_district").val(),
                'upazila_id' : $("#select_upazila").val(),
                'town_name' : $("#townName").val(),
                'location' : $("#location").val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[ name ="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('branch.store') }}",
                data: data,
                dataType: "json",
                success : function(response){
                    
                    if(response.status == 400){
                        // display form field
                        $("#formContent").removeClass('display_none');
                        $("#ContentView").addClass('display_none');
                        // change form button mode
                        $("#save").addClass('display_none');
                        $("#save").attr('disabled', true);
                        $("#next").removeClass('display_none');

                        $.each(response.errors, function(key, err_value){
                            if (key === 'branch_name') {
                                $("#savForm_error").fadeIn();
                                $('#savForm_error').html('<span class="error_val" style="font-size:10px;font-weight:700;color:#dc3545;">' + err_value + '</span>');
                                $("#savForm_error").addClass("alert_show_errors");
                                $('#branchName').html("");
                            } else if (key === 'branch_type') {
                                $("#savForm_error2").fadeIn();
                                $('#savForm_error2').closest('.role_nme').append('<span class="error_val" style="font-size:10px;font-weight:700;color:#dc3545;margin-left:-10px;">' + err_value + '</span>');
                                $("#savForm_error2").addClass("alert_show_errors");
                            } else if (key === 'division_id') {
                                $("#savForm_error3").fadeIn();
                                $('#savForm_error3').closest('.role_nme').append('<span class="error_val" style="font-size:10px;font-weight:700;color:#dc3545;margin-left:-10px;">' + err_value + '</span>');
                                $("#savForm_error3").addClass("alert_show_errors");
                            } else if (key === 'district_id') {
                                $("#savForm_error4").fadeIn();
                                $('#savForm_error4').closest('.role_nme').append('<span class="error_val" style="font-size:10px;font-weight:700;color:#dc3545;margin-left:-10px;">' + err_value + '</span>');
                                $("#savForm_error4").addClass("alert_show_errors");
                            } if (key === 'upazila_id') {
                                $("#savForm_error5").fadeIn();
                                $('#savForm_error5').closest('.role_nme').append('<span class="error_val" style="font-size:10px;font-weight:700;color:#dc3545;margin-left:-10px;">' + err_value + '</span>');
                                $("#savForm_error5").addClass("alert_show_errors");
                            } else if (key === 'town_name') {
                                $("#savForm_error6").fadeIn();
                                $('#savForm_error6').html('<span class="error_val" style="font-size:10px;font-weight:700;color:#dc3545;">' + err_value + '</span>');
                                $("#savForm_error6").addClass("alert_show_errors");
                                $('#townName').html("");
                            } else if (key === 'location') {
                                $("#savForm_error7").fadeIn();
                                $('#savForm_error7').html('<span class="error_val" style="font-size:10px;font-weight:700;color:#dc3545;">' + err_value + '</span>');
                                $("#savForm_error7").addClass("alert_show_errors");
                                $('#location').html("");
                            }
                        });
                    }else if(response.status == 403){
                        // display form field
                        $("#formContent").removeClass('display_none');
                        $("#ContentView").addClass('display_none');
                        // change form button mode
                        $("#save").addClass('display_none');
                        $("#save").attr('disabled', true);
                        $("#next").removeClass('display_none');

                        $('#permission_message').html("");
                        $('#permission_message').addClass('alert alert-danger');
                        $('#permission_message').text(response.messages);
                        
                    }else if(response.status == 200){
                        // save new cache in AppRAM
                        updateAppRAMBulk({
                            branchSearchFlags: false,
                            branchSearchResults: []
                        });

                        $("#loaderBox").removeClass('display_none');
                        $("#ContentView").removeClass('display_none');

                        setTimeout(() => {
                            $("#loaderBox").addClass('display_none');
                            $("#formContent").removeClass('display_none');
                            $("#ContentView").addClass('display_none');
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $('#documents').attr('hidden', true);
                            // button
                            $("#save").addClass('display_none');
                            $("#next").removeClass('display_none');
                            $("#select_branch").val("").trigger('change');
                            // form input
                            $("#inputBranchNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#inputCityNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#inputLocatioinNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#dropdwonDivisionNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#dropdwonDistrictNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#dropdwonUpazilaNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            // Display Component Settings Empty
                            $("#settingDisplayCard").attr('hidden', true);
                            let settingDisplay = $("#SettingDisplay");
                            settingDisplay.find('#clearBranchID').remove();
                            settingDisplay.find('#clearBranchName').remove();
                            settingDisplay.find('#clearCityName').remove();
                            settingDisplay.find('#clearLocation').remove();
                            settingDisplay.find('#clearDistrict').remove();
                            settingDisplay.find('#clearUpazila').remove();

                            setTimeout(() => {
                                showSuccessToast(response.messages)
                            }, 3000);
                            
                            clearFields();
                            removeField();
                            searchBranch();
                            fetchTableBranch();
                        }, 1500);
                    }
                }
            })
        });

        // Show Message Tostar
        function showSuccessToast(messages) {
            $('#toast-body-message').text(messages);
            const toast = new bootstrap.Toast(document.getElementById('liveToast'));
            toast.show();
        }

        // Input Field Clear
        function clearFields(){
            $("#branch_id").val("");
            $("#branchName").val("");
            $("#branch_type").val("").trigger('change');
            $("#select_division").empty();
            $("#select_district").empty();
            $("#select_upazila").empty();
            $("#townName").val("");
            $("#location").val("");
        }

        // Cancell Field
        function removeField(){
            $("#savForm_error").addClass('display-none');
            $("#savForm_error").empty();
            $("#savForm_error").attr('hidden', true);
            $("#savForm_error6").addClass('display-none');
            $("#savForm_error6").empty();
            $("#savForm_error6").attr('hidden', true);
            $("#savForm_error7").addClass('display-none');
            $("#savForm_error7").empty();
            $("#savForm_error7").attr('hidden', true);

            $("#updateForm_error").addClass('display-none');
            $("#updateForm_error").empty();
            $("#updateForm_error").attr('hidden', true);
            $("#updateForm_error6").addClass('display-none');
            $("#updateForm_error6").empty();
            $("#updateForm_error6").attr('hidden', true);
            $("#updateForm_error7").addClass('display-none');
            $("#updateForm_error7").empty();
            $("#updateForm_error7").attr('hidden', true);

            $("#branchName").val("");
            $("#branchName").removeClass('is-invalid is-valid');
            $(".error_val").addClass('display-none');
            $("#branch_type").val("").trigger('change');
            $("#branch_type").next('.select2-container').find('.select2-selection').removeClass('is-invalid is-valid');
            $(".edit_branch_type_error").addClass('display-none');
            $("#select_division").val("").trigger('change');
            $("#select_division").next('.select2-container').find('.select2-selection').removeClass('is-invalid is-valid');
            $(".edit_division_error").addClass('display-none');
            $("#select_district").val("").trigger('change');
            $("#select_district").next('.select2-container').find('.select2-selection').removeClass('is-invalid is-valid');
            $(".edit_district_error").addClass('display-none');
            $("#select_upazila").val("").trigger('change');
            $("#select_upazila").next('.select2-container').find('.select2-selection').removeClass('is-invalid is-valid');
            $(".edit_upazila_error").addClass('display-none');
            $("#townName").val("");
            $("#townName").removeClass('is-invalid is-valid');
            $(".edit_city_error").addClass('display-none');
            $("#location").val("");
            $("#location").removeClass('is-invalid is-valid');
            $(".edit_branch_loaction_error").addClass('display-none');
        }

        // Cancell Button
        $(document).on('click', '#cancel_btn', function(){
            // error field cancel
            removeField();
            $('#permission_message').empty();
            $('#response_message').empty();
            $('#permission_message').removeClass('alert alert-danger');
            $('#response_message').removeClass('alert alert-danger');

            if ($("#save").is(":visible")) {
                $("#next").removeClass('display_none');
                $("#formContent").removeClass('display_none');
                $("#ContentView").addClass('display_none');
                $("#save").addClass('display_none');
                $("#save").attr('disabled', true);
            }

            if ($("#update_btn").is(":visible") || $("#deleteBranch").is(":visible")) {
                $("#next").addClass('display_none');
                $("#select_branch").val("").trigger('change');
            }

            $(".branch_type").addClass('display_none');

            $("#inputBranchNameGroup").slideUp("slow", function () {
                $(this).addClass('display_none');
            });

            $("#inputCityNameGroup").slideUp("slow", function () {
                $(this).addClass('display_none');
            });

            $("#inputLocatioinNameGroup").slideUp("slow", function () {
                $(this).addClass('display_none');
            });

            $("#dropdwonDivisionNameGroup").slideUp("slow", function () {
                $(this).addClass('display_none');
            });

            $("#dropdwonDistrictNameGroup").slideUp("slow", function () {
                $(this).addClass('display_none');
            });

            $("#dropdwonUpazilaNameGroup").slideUp("slow", function () {
                $(this).addClass('display_none');
            });

            // Display Component Settings Empty
            let settingDisplay = $("#SettingDisplay");
            settingDisplay.find('#clearBranchID').remove();
            settingDisplay.find('#clearBranchName').remove();
            settingDisplay.find('#clearCityName').remove();
            settingDisplay.find('#clearLocation').remove();
            settingDisplay.find('#clearDistrict').remove();
            settingDisplay.find('#clearUpazila').remove();
            settingDisplay.find('#clearDivision').remove();
            settingDisplay.find('#clearCity').remove();
            $("#documents").attr('hidden', true);
        });

        // On keyup action for error remove
        $(document).on('keyup', '#branchName, #townName, #location', function(){

            let field = $(this);
            let fieldId = field.attr('id');
            let value = field.val().trim();

            // setting dispaly component
            let branch_name = $("#branchName").val();
            let city_name = $("#townName").val();
            let location = $("#location").val();
            let settingDisplay = $("#SettingDisplay");

            if (value !== '') {
                if (fieldId === 'branchName' && field.hasClass('is-invalid')) {
                    $("#savForm_error, #updateForm_error").empty().fadeOut().addClass("display-none");
                    field.removeClass("is-invalid").addClass("is-valid");
                    $(".edit_branch_name").removeClass("is-invalid");
                }

                if (fieldId === 'townName' && field.hasClass('is-invalid')) {
                    $("#savForm_error6, #updateForm_error6").empty().fadeOut().addClass("display-none");
                    field.removeClass("is-invalid").addClass("is-valid");
                    $(".edit_town_name").removeClass("is-invalid");
                }

                if (fieldId === 'location' && field.hasClass('is-invalid')) {
                    $("#savForm_error7, #updateForm_error7").empty().fadeOut().addClass("display-none");
                    field.removeClass("is-invalid").addClass("is-valid");
                    $(".edit_location").removeClass("is-invalid");
                }
            }

            if(branch_name !== ''){
                settingDisplay.find('#clearBranchName').remove();
                // Setting Display
                settingDisplay.append(`
                    <li id="clearBranchName">
                        <label class="form-check-label line-label" for="branch-type">
                            Branch-Name : ${branch_name}
                        </label>
                    </li>
                `);
            }else if(branch_name == ''){
                settingDisplay.find('#clearBranchName').remove();
            }

            if(city_name !== ''){
                settingDisplay.find('#clearCityName').remove();
                // Setting Display
                settingDisplay.append(`
                    <li id="clearCityName">
                        <label class="form-check-label line-label" for="branch-type">
                            City-Name : ${city_name}
                        </label>
                    </li>
                `);
            }else if(city_name == ''){
                settingDisplay.find('#clearCityName').remove();
            }

            if(location !== ''){
                settingDisplay.find('#clearLocation').remove();
                // Setting Display
                settingDisplay.append(`
                    <li id="clearLocation">
                        <label class="form-check-label line-label" for="branch-type">
                            Location : ${location}
                        </label>
                    </li>
                `);
            }else if(location == ''){
                settingDisplay.find('#clearLocation').remove();
            }

        });

        // On Change action for error remove
        $(document).on('change', '#branch_type, #select_division, #select_district, #select_upazila', function () {
            let field = $(this);
            let fieldId = field.attr('id');
            let value = field.val();

            if (value !== '') {
                if (fieldId === 'branch_type' && field.next('.select2-container').find('.select2-selection').hasClass('is-invalid')) {
                    $("#savForm_error2, #updateForm_error2").fadeOut().addClass('display-none');
                    field.next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                    $(".edit_branch_type").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                }

                if (fieldId === 'select_division' && field.next('.select2-container').find('.select2-selection').hasClass('is-invalid')) {
                    $("#savForm_error3, #updateForm_error3").fadeOut().addClass('display-none');
                    field.next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                    $(".edit_division_id").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                }

                if (fieldId === 'select_district' && field.next('.select2-container').find('.select2-selection').hasClass('is-invalid')) {
                    $("#savForm_error4, #updateForm_error4").fadeOut().addClass('display-none');
                    field.next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                    $(".edit_district_id").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                }

                if (fieldId === 'select_upazila' && field.next('.select2-container').find('.select2-selection').hasClass('is-invalid')) {
                    $("#savForm_error5, #updateForm_error5").fadeOut().addClass('display-none');
                    field.next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                    $(".edit_upazila_id").next('.select2-container').find('.select2-selection').removeClass('is-invalid');
                }
            }
        });
        // setting dispaly component division
        $(document).on('change', '#select_division', function () {
            let division = $("#select2-select_division-container").attr('title');
            let settingDisplay = $("#SettingDisplay");

            // Clear old data
            settingDisplay.find('#clearDivision').remove();
            settingDisplay.find('#clearDistrict').remove();
            settingDisplay.find('#clearUpazila').remove();

            // Show Division
            settingDisplay.append(`
                <li id="clearDivision">
                    <label class="form-check-label line-label" for="branch-type">
                        Division-Name : ${division && division !== 'Select Division' ? division : '<span style="color:red">Required</span>'}
                    </label>
                </li>
            `);

            // Show District (required by default after division)
            settingDisplay.append(`
                <li id="clearDistrict">
                    <label class="form-check-label line-label" for="branch-type">
                        District-Name : <span style="color:red">Required</span>
                    </label>
                </li>
            `);
        });
        // setting dispaly component district
        $(document).on('change', '#select_district', function () {
            let district = $("#select2-select_district-container").attr('title');
            let division = $("#select2-select_division-container").attr('title');
            let settingDisplay = $("#SettingDisplay");

            // Clear District & Upazila
            settingDisplay.find('#clearDistrict').remove();
            settingDisplay.find('#clearUpazila').remove();

            // Re-show Division if needed (optional, but good UX)
            if (!settingDisplay.find('#clearDivision').length) {
                settingDisplay.append(`
                    <li id="clearDivision">
                        <label class="form-check-label line-label" for="branch-type">
                            Division-Name : ${division && division !== 'Select Division' ? division : '<span style="color:red">Required</span>'}
                        </label>
                    </li>
                `);
            }

            // Show District
            settingDisplay.append(`
                <li id="clearDistrict">
                    <label class="form-check-label line-label" for="branch-type">
                        District-Name : ${district && district !== 'Select District' ? district : '<span style="color:red">Required</span>'}
                    </label>
                </li>
            `);

            // Show Upazila (required placeholder)
            settingDisplay.append(`
                <li id="clearUpazila">
                    <label class="form-check-label line-label" for="branch-type">
                        Upazila : <span style="color:red">Required</span>
                    </label>
                </li>
            `);
        });
        // setting dispaly component upazila
        $(document).on('change', '#select_upazila', function () {
            let division = $("#select2-select_division-container").attr('title');
            let district = $("#select2-select_district-container").attr('title');
            let upazila = $("#select2-select_upazila-container").attr('title');
            let settingDisplay = $("#SettingDisplay");

            // Clear all
            settingDisplay.find('#clearDivision').remove();
            settingDisplay.find('#clearDistrict').remove();
            settingDisplay.find('#clearUpazila').remove();

            // Show all with actual values
            settingDisplay.append(`
                <li id="clearDivision">
                    <label class="form-check-label line-label" for="branch-type">
                        Division-Name : ${division && division !== 'Select Division' ? division : '<span style="color:red">Required</span>'}
                    </label>
                </li>
            `);
            settingDisplay.append(`
                <li id="clearDistrict">
                    <label class="form-check-label line-label" for="branch-type">
                        District-Name : ${district && district !== 'Select District' ? district : '<span style="color:red">Required</span>'}
                    </label>
                </li>
            `);
            settingDisplay.append(`
                <li id="clearUpazila">
                    <label class="form-check-label line-label" for="branch-type">
                        Upazila : ${upazila && upazila !== 'Select Upazila' ? upazila : '<span style="color:red">Required</span>'}
                    </label>
                </li>
            `);
        });
        // Branch Update Modal Show
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmbranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.update_title, .head_btn3, #text_message', type: 'class', name: 'branch-skeleton' },
                    { selector: '#update_confirm, #cate_delete5', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });

        // Confirm Update Branch
        $(document).on('click', '#update_confirm', function(e){
            e.preventDefault();

            $("#updateForm_error").removeAttr('hidden');
            $("#updateForm_error6").removeAttr('hidden');
            $("#updateForm_error7").removeAttr('hidden');

            var id = $("#branches_id").val();
            var data = {
                'branch_id' : $(".update_branch_id").val(),
                'branch_name' : $(".edit_branch_name").val(),
                'branch_type' : $(".edit_branch_type").val(),
                'division_id' : $(".edit_division_id").val(),
                'district_id' : $(".edit_district_id").val(),
                'upazila_id' : $(".edit_upazila_id").val(),
                'town_name' : $(".edit_town_name").val(),
                'location' : $(".edit_location").val(),
            }

            // Check if cache exists
            const cachedData = branchDetailsCache[id]?.messages;

            let isChanged = false;

            if (cachedData) {
                // Compare each field
                for (const key in data) {
                    if (data[key] != cachedData[key]) {
                        isChanged = true;
                        break;
                    }
                }
            }else {
                isChanged = true; // No cached data, assume changed
            }

            // If not changed, don't send update
            if (!isChanged) {
                $("#updateconfirmbranch").modal('hide');
                setTimeout(() => {
                    showSuccessToast("No changes detected. Update skipped.")
                }, 1000);
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[ name ="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/company/branch-update/" + id,
                data: data,
                dataType: "json",
                success : function(response){
                    if(response.status == 400){
                        $("#updateconfirmbranch").modal('hide');
                        $.each(response.errors, function(key, err_value){
                            if (key === 'branch_name') {
                                $("#updateForm_error").fadeIn();
                                $('#updateForm_error').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error").addClass("alert_show_errors");
                                $('#branchName').addClass('is-invalid');
                                $('#branchName').html("");
                            } else if (key === 'branch_type') {
                                $("#updateForm_error2").fadeIn();
                                $('#updateForm_error2').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error2").addClass("alert_show_errors");
                                $('#branch_type').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'division_id') {
                                $("#updateForm_error3").fadeIn();
                                $('#updateForm_error3').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error3").addClass("alert_show_errors");
                                $('#select_division').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'district_id') {
                                $("#savForm_error4").fadeIn();
                                $('#savForm_error4').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#savForm_error4").addClass("alert_show_errors");
                                $('#select_district').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'upazila_id') {
                                $("#updateForm_error5").fadeIn();
                                $('#updateForm_error5').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error5").addClass("alert_show_errors");
                                $('#select_upazila').next('.select2-container').find('.select2-selection').addClass('is-invalid');
                            } else if (key === 'town_name') {
                                $("#updateForm_error6").fadeIn();
                                $('#updateForm_error6').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error6").addClass("alert_show_errors");
                                $('#townName').addClass('is-invalid');
                                $('#townName').html("");
                            } else if (key === 'location') {
                                $("#updateForm_error7").fadeIn();
                                $('#updateForm_error7').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                                $("#updateForm_error7").addClass("alert_show_errors");
                                $('#location').addClass('is-invalid');
                                $('#location').html("");
                            }
                            $("#updateconfirmbranch").modal('hide').fadeOut();
                        });
                    }else if(response.status == 403){
                        $("#updateconfirmbranch").modal('hide');
                        $('#response_message').html("");
                        $('#response_message').addClass('alert alert-danger');
                        $('#response_message').text(response.messages);
                    }else if(response.status == 200){
                        $("#updateconfirmbranch").modal('hide');
                        $("#loaderBox").removeClass('display_none');
                        clearBranchCache(id);

                        setTimeout(() => {
                            $("#loaderBox").addClass('display_none');
                            // clear fields
                            removeField();
                            $(".branch_type").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });
                            $("#inputBranchNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#inputCityNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#inputLocatioinNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#dropdwonDivisionNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#dropdwonDistrictNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#dropdwonUpazilaNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });
                            $("#documents").attr('hidden', true);
                            // Display Branch Settings Empty
                            let settingDisplay = $("#SettingDisplay");
                            settingDisplay.find('#clearBranchType').remove();
                            settingDisplay.find('#clearBranchID').remove();
                            settingDisplay.find('#clearBranchName').remove();
                            settingDisplay.find('#clearDivision').remove();
                            settingDisplay.find('#clearDistrict').remove();
                            settingDisplay.find('#clearUpazila').remove();
                            settingDisplay.find('#clearCity').remove();
                            settingDisplay.find('#clearLocation').remove();
                            
                            // Invalidate and re-fetch updated search list
                            updateAppRAMBulk({
                                branchSearchFlags: false,
                                branchSearchResults: []
                            });
                            searchBranch();
                            fetchTableBranch();

                            setTimeout(() => {
                                showSuccessToast(response.messages)
                            }, 1000);
                           
                        }, 1500);
                    }
                }
            })
        });

        // Branch Delete Modal Show
        $(document).on('click', '#deleteBranch', function(e){
            e.preventDefault();
            var branch_id = $("#branches_id").val();
            $('#delete_branch_id').val(branch_id);

            $("#deletebranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.head_title, .head_btn, .delete_content', type: 'class', name: 'branch-skeleton' },
                    { selector: '#yesButton, #noButton', type: 'class', name: 'branch-delete-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });

        // Branch Confirm Delete Modal Show
        $(document).on('click', '#yesButton', function(e){
            e.preventDefault();
            $("#deletebranch").modal('hide');
            $("#deleteconfirmbranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.confirm_title, .head_btn2, #delete_text_message', type: 'class', name: 'branch-skeleton' },
                    { selector: '.delete_branch, #cancel_delete', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });

        // Back delete modal
        $(document).on('click', '#cancel_delete, .delete_confrm_canl', function(e){
            e.preventDefault();
            $("#deletebranch").modal('show');
            $("#deleteconfirmbranch").modal('hide');
        });

        // Confirm Delete Branch
        $(document).on('click', '.delete_branch', function(e){
            e.preventDefault();

            var id = $("#delete_branch_id").val();

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name ="csrf_token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/company/branch-delete/" + id,
                success: function(response){
                    if(response.status == 403){
                        $("#accessconfirmbranch").modal('hide');
                        $("#deletebranch").modal('hide').fadeOut();
                        $("#deleteconfirmbranch").modal('hide').fadeOut();
                        $('#response_message').html("");
                        $('#response_message').addClass('alert alert-danger');
                        $('#response_message').text(response.messages);

                    }else if(response.status == 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#deletebranch").modal('hide').fadeOut();
                        $("#deleteconfirmbranch").modal('hide').fadeOut();
                        $("#loaderBox").removeClass('display_none');
                        // update branch details
                        clearBranchCache(id);

                        // Remove deleted branch from RAM
                        let branchSearchResults = getAppRAM('branchSearchResults');
                        if (branchSearchResults && branchSearchResults.allBranch) {
                            branchSearchResults.allBranch = branchSearchResults.allBranch.filter(
                                branch => branch.id != id
                            );
                            updateAppRAMBulk({
                                branchSearchResults: branchSearchResults
                            });
                        }
    
                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#loaderBox").addClass('display_none');
                            clearFields();

                            $(".branch_type").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#inputBranchNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#inputCityNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#inputLocatioinNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#dropdwonDivisionNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#dropdwonDistrictNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });

                            $("#dropdwonUpazilaNameGroup").slideUp("slow", function () {
                                $(this).addClass('display_none');
                            });
                            $("#documents").attr('hidden', true);
                            // Display Branch Settings Empty
                            let settingDisplay = $("#SettingDisplay");
                            settingDisplay.find('#clearBranchType').remove();
                            settingDisplay.find('#clearBranchID').remove();
                            settingDisplay.find('#clearBranchName').remove();
                            settingDisplay.find('#clearDivision').remove();
                            settingDisplay.find('#clearDistrict').remove();
                            settingDisplay.find('#clearUpazila').remove();
                            settingDisplay.find('#clearCity').remove();
                            settingDisplay.find('#clearLocation').remove();

                            setTimeout(() => {
                                showSuccessToast(response.messages)
                            }, 1000);

                            // Refresh dropdown from updated RAM (no need to call server again)
                            populate_branch_searches(branchSearchResults);
                            fetchTableBranch();

                        }, 1500);
                    }
                }
            });
        });

        // Refresh Button
        $(document).on('click', '#branchTypeRefresh', function(){
            fetch_division();
            fetch_district();
            fetch_upazila();
            searchBranch();
            fetch_branch_types();
            fetchTableBranch();
            fetch_branch_categories();
            clearBranchListCache();
            clearAppRAM();
        });

        // =============================================================================================
        // --------------------- Start Branch Category Setting Section ---------------------------------
        // =============================================================================================

        // =============================== Setting Optations ===========================================
        // Select ID Button form Setting Mode
        $(document).on('click', 'label.custom-label', function(){
            // Remove class from all other custom-labels
            $('#settingModeTwo label.custom-label').removeClass('label-highlight');
            // Add class to the clicked one
            $(this).addClass('label-highlight');
        });

        // setting mode optation radio button action
        $(document).on('click', '#flexRadioDefault5, #flexRadioDefault6, #flexRadioDefault7, #flexRadioDefault8', function(){
            // Hide all button initially
            $("#enableCategoryBranch").attr('hidden', true);
            $("#enableUpdateCategory").attr('hidden', true);
            $("#enableDeleteCategory").attr('hidden', true);
            $("#disabledCategoryBranch").attr('hidden', true);
            $("#disabledUpdatedCategory").attr('hidden', true);
            $("#disabledDeleteCategory").attr('hidden', true);
            $("#setting__card").attr('hidden', true);
            $("#settingCard").attr('hidden', true);

            $(".disabledChecking").attr('hidden', true);
            $(".enableChecking").attr('hidden', true);
            $("#loadingSpin").removeAttr('hidden');
            $("#loadingSpinner").attr('hidden', true);

            // setting dispalay part
            $("#continueousLoading").attr('hidden', true);
            $("#categorySettingDisplayCard").attr('hidden', true);

            // Show button step by step according to condition
            if($(this).attr('id') === 'flexRadioDefault5' ){
                setTimeout(() => {
                    $("#settingCard").removeAttr('hidden');
                    $("#enableCategoryBranch").removeAttr('hidden');
                    $("#loadingSpin").attr('hidden', true);
                    $("#loadingSpinner").attr('hidden', true);
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                }, 10);
            }else if($(this).attr('id') === 'flexRadioDefault6'){
                setTimeout(() => {
                    $("#settingCard").removeAttr('hidden');
                    $("#enableUpdateCategory").removeAttr('hidden');
                    $("#loadingSpin").attr('hidden', true);
                    $("#loadingSpinner").attr('hidden', true);
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                }, 10);
            }else if($(this).attr('id') === 'flexRadioDefault7'){
                setTimeout(() => {
                    $("#settingCard").removeAttr('hidden');
                    $("#enableDeleteCategory").removeAttr('hidden');
                    $("#loadingSpin").attr('hidden', true);
                    $("#loadingSpinner").attr('hidden', true);
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                }, 10);
            }else if($(this).attr('id') === 'flexRadioDefault8'){
                $("#settingCard").attr('hidden', true);
                $("#enableCategoryBranch").attr('hidden', true);
                $("#enableUpdateCategory").attr('hidden', true);
                $("#enableDeleteCategory").attr('hidden', true);
                $("#loadingSpin").attr('hidden', true);
                $("#loadingSpinner").attr('hidden', true);
                $("#disabledCategoryBranch").attr('hidden', true);
                $("#disabledUpdatedCategory").attr('hidden', true);
                $("#disabledDeleteCategory").attr('hidden', true);
                $(".disabledChecking").attr('hidden', true);
                $(".enableChecking").attr('hidden', true);
                $("#setting__card").attr('hidden', true);
                // Display Component Settings Empty
                $("#SettingDisplay").empty();
                $("#settingDisplayCard").attr('hidden', true);
                // setting dispalay part
                $("#continueousLoading").attr('hidden', true);
                $("#categorySettingDisplayCard").attr('hidden', true);
            }
        });
        // setting action enable button
        $(document).on('click', '#enableCategoryBranch, #enableUpdateCategory, #enableDeleteCategory', function(){
            // Hide all button initially
            $("#disabledCategoryBranch").attr('hidden', true);
            $("#disabledUpdatedCategory").attr('hidden', true);
            $("#disabledDeleteCategory").attr('hidden', true);
            $("#enableCategoryBranch").attr('hidden', true);
            $("#enableUpdateCategory").attr('hidden', true);
            $("#enableDeleteCategory").attr('hidden', true);
            $("#setting__card").attr('hidden', true);

            $("#loadingSpinner").removeAttr('hidden');
            $(".disabledChecking").attr('hidden', true);
            $(".enableChecking").attr('hidden', true);

            $("#formContent").removeClass('display_none');

            // setting dispalay part
            $("#startLoading").removeAttr('hidden');
            $("#continueousLoading").removeAttr('hidden');
            $("#categorySettingDisplayCard").attr('hidden', true);

            if($(this).attr('id') === 'enableCategoryBranch'){
                setTimeout(() => {
                    $("#loadingSpinner").attr('hidden', true);
                    $("#enableCategoryBranch").removeAttr('hidden');
                    $("#disabledCategoryBranch").removeAttr('hidden');
                    $(".enableChecking").removeAttr('hidden');
                    $("#setting__card").removeAttr('hidden');
                    $("#dropBox").addClass('display_none');
                    $("#branchTypeName").removeClass('display_none');
                    $("#inputBranchCategory").removeClass('display_none');
                    // button show
                    $("#branch_type_create").removeClass('display_none');
                    $("#branch_type_cancel").show();
                    $("#branch_type_delete").attr('hidden', true);
                    $("#branch_type_update").attr('hidden', true);
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                    // setting dispalay part
                    $("#startLoading").attr('hidden', true);
                    $("#continueousLoading").attr('hidden', true);
                    $("#categorySettingDisplayCard").removeAttr('hidden'); 
                }, 1000);
            }else if($(this).attr('id') === 'enableUpdateCategory'){
                setTimeout(() => {
                    if (!getAppRAM('branchCategoryFlags')) {
                        fetch_branch_categories();
                    } else {
                        populate_branch_categories(getAppRAM('branchCategories'));
                    }
                    
                    $("#loadingSpinner").attr('hidden', true);
                    $("#enableUpdateCategory").removeAttr('hidden');
                    $("#disabledUpdatedCategory").removeAttr('hidden');
                    $(".enableChecking").removeAttr('hidden');
                    $("#setting__card").removeAttr('hidden');
                    $("#dropBox").removeClass('display_none');
                    $("#branchTypeName").addClass('display_none');
                    $("#inputBranchCategory").addClass('display_none');
                    // button show
                    $("#branch_type_create").addClass('display_none');
                    $("#branch_type_delete").addClass('display_none');
                    $("#branch_type_cancel").show();
                    $("#branch_type_update").removeAttr('hidden');
                    $("#branch_type_update").removeClass('display_none');
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                    // setting dispalay part
                    $("#startLoading").attr('hidden', true);
                    $("#continueousLoading").attr('hidden', true);
                    $("#categorySettingDisplayCard").removeAttr('hidden'); 
                }, 1000);
            }else if($(this).attr('id') === 'enableDeleteCategory'){
                setTimeout(() => {
                    if (!getAppRAM('branchCategoryFlags')) {
                        fetch_branch_categories();
                    } else {
                        populate_branch_categories(getAppRAM('branchCategories'));
                    }
                    $("#loadingSpinner").attr('hidden', true);
                    $("#enableDeleteCategory").removeAttr('hidden');
                    $("#disabledDeleteCategory").removeAttr('hidden');
                    $(".enableChecking").removeAttr('hidden');
                    $("#setting__card").removeAttr('hidden');
                    $("#dropBox").removeClass('display_none');
                    $("#branchTypeName").addClass('display_none');
                    $("#inputBranchCategory").addClass('display_none');
                    // button show
                    $("#branch_type_create").addClass('display_none');
                    $("#branch_type_update").addClass('display_none');
                    $("#branch_type_cancel").show();
                    $("#branch_type_delete").removeAttr('hidden');
                    $("#branch_type_delete").removeClass('display_none');
                    // Display Component Settings Empty
                    $("#SettingDisplay").empty();
                    $("#settingDisplayCard").attr('hidden', true);
                    // setting dispalay part
                    $("#startLoading").attr('hidden', true);
                    $("#continueousLoading").attr('hidden', true);
                    $("#categorySettingDisplayCard").removeAttr('hidden'); 
                }, 1000);
            }
        });
        // setting action disabled button
        $(document).on('click', '#disabledCategoryBranch, #disabledUpdatedCategory, #disabledDeleteCategory', function(){

            // Hide all button initially
            $("#disabledCategoryBranch").attr('hidden', true);
            $("#disabledUpdatedCategory").attr('hidden', true);
            $("#disabledDeleteCategory").attr('hidden', true);
            $("#enableCategoryBranch").attr('hidden', true);
            $("#enableUpdateCategory").attr('hidden', true);
            $("#enableDeleteCategory").attr('hidden', true);
            $("#setting__card").attr('hidden', true);

            $("#loadingSpinner").removeAttr('hidden');
            $(".disabledChecking").attr('hidden', true);
            $(".enableChecking").attr('hidden', true);

            $("#formContent").addClass('display_none');

            if($(this).attr('id') === 'disabledCategoryBranch'){
                setTimeout(() => {
                    $("#loadingSpinner").attr('hidden', true);
                    $("#enableCategoryBranch").removeAttr('hidden');
                    $("#disabledCategoryBranch").removeAttr('hidden');
                    $(".enableChecking").attr('hidden', true);
                    $(".disabledChecking").removeAttr('hidden');
                    $("#setting__card").attr('hidden', true);
                    $("#branchTypeName").addClass('display_none');
                    $("#dropBox").addClass('display_none');
                    // input filed clear
                    $('#branchTypeName').val("");
                    // button show
                    $("#branch_type_create").addClass('display_none');
                    $("#branch_type_cancel").addClass('display_none');
                    $("#branch_type_delete").addClass('display_none');
                    $("#branch_type_update").addClass('display_none');
                    // Display Component Settings Empty
                    $("#categorySettingDisplay").empty();
                    $("#categorySettingDisplayCard").attr('hidden', true);
                }, 1000);
            }else if($(this).attr('id') === 'disabledUpdatedCategory'){
                setTimeout(() => {
                    $("#loadingSpinner").attr('hidden', true);
                    $("#enableUpdateCategory").removeAttr('hidden');
                    $("#disabledUpdatedCategory").removeAttr('hidden');
                    $(".enableChecking").attr('hidden', true);
                    $(".disabledChecking").removeAttr('hidden');
                    $("#setting__card").attr('hidden', true);
                    $("#branchTypeName").addClass('display_none');
                    $("#dropBox").addClass('display_none');
                    // input filed clear
                    $('#branchTypeName').val("");
                    // button show
                    $("#branch_type_create").addClass('display_none');
                    $("#branch_type_cancel").addClass('display_none');
                    $("#branch_type_delete").addClass('display_none');
                    $("#branch_type_update").addClass('display_none');
                    // Display Component Settings Empty
                    $("#categorySettingDisplay").empty();
                    $("#categorySettingDisplayCard").attr('hidden', true);
                }, 1000);
            }else if($(this).attr('id') === 'disabledDeleteCategory'){
                setTimeout(() => {
                    $("#loadingSpinner").attr('hidden', true);
                    $("#enableDeleteCategory").removeAttr('hidden');
                    $("#disabledDeleteCategory").removeAttr('hidden');
                    $(".enableChecking").attr('hidden', true);
                    $(".disabledChecking").removeAttr('hidden');
                    $("#setting__card").attr('hidden', true);
                    $("#branchTypeName").addClass('display_none');
                    $("#dropBox").addClass('display_none');
                    // input filed clear
                    $('#branchTypeName').val("");
                    // button show
                    $("#branch_type_create").addClass('display_none');
                    $("#branch_type_cancel").addClass('display_none');
                    $("#branch_type_delete").addClass('display_none');
                    $("#branch_type_update").addClass('display_none');
                    // Display Component Settings Empty
                    $("#categorySettingDisplay").empty();
                    $("#categorySettingDisplayCard").attr('hidden', true);
                }, 1000);
            }
        });

        // Create Branch Category Modal Show
        $(document).on('click', '#branchTypeModalView', function(e){
            e.preventDefault();
            $("#branchTypeCreateModal").modal('show');
            $("#branch_type_create").removeAttr('hidden');
            $("#branch_type_cancel").removeAttr('hidden');
            $("#branch_type_update").attr('hidden', true);
            $("#branch_type_delete").attr('hidden', true);
            fetch_branch_categories();
            const time = setTimeout(() => {
                requestAnimationFrame(() => {
                    removeAttributeOrClass([
                        {
                            selector: '.branch_type_head_title, .branch_type_head_btn, .branch_select_type, .branch_type_name, #branch_type_create, #branch_type_cancel',
                            type: 'class',
                            name: 'branch-skeleton'
                        }
                    ]);
                });
            }, 1000);
        });

        // Fetch Branch Category
        function fetch_branch_categories(){

            if (getAppRAM('branchCategoryFlags')) {
                // Use cached data instead
                populate_branch_categories(getAppRAM('branchCategories'));
                return;
            }

            const currentUrl = "{{ route('search-branch-type.action') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                success: function(response) {
                    // Save to Parent RAM
                    updateAppRAMBulk({
                        branchCategoryFlags: true,
                        branchCategories: response
                    });
                    populate_branch_categories(response);
                },
                error: function() {
                    console.error('Failed to fetch branch categories.');
                    $("#branch_category_name").empty();
                    $("#branch_category_name").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        // Populate dropdown from response
        function populate_branch_categories(response) {
            $('#permission_message').empty().removeClass('alert alert-danger');
            const branch_categories = response.branch_categories || [];

            const $branchType = $('#branch_type');
            const $branchCategory = $('#selectBranchCategories');

            $branchType.empty().append('<option value="">Select Branch Category Name</option>');
            $branchCategory.empty().append('<option value="">Select Branch Category Name</option>');

            $.each(branch_categories, function (_, item) {
                const option = `<option style="color:white;font-weight:600;" value="${item.branch_category_name}">
                                    ${item.branch_category_name}
                                </option>`;
                $branchType.append(option);
                $branchCategory.append(option);
            });

            // Refresh Select2 after updating options
            $branchCategory.trigger('change.select2');
        }

        // Validation Clear and display input text value
        $(document).on('keyup', '#branchTypeName', function(){
            let selectedVal = $(this).val();
            let settingDisplay = $("#categorySettingDisplay");

            $("#categorySettingDisplayCard").removeAttr('hidden');

            if(selectedVal !== ''){
                $("#savForm_error_branch").attr('hidden', true);
                $("#updateForm_error_branch").attr('hidden', true);
                $('#branchTypeName').removeClass('is-invalid');
                settingDisplay.find('#clearBranchCategory').remove();
                // Setting Display
                settingDisplay.append(`
                    <li id="clearBranchCategory">
                        <label class="form-check-label line-label" for="branch-type">
                            Branch-Category : ${selectedVal}
                        </label>
                    </li>
                `);
            }else{
                // Display Component Settings Empty
                settingDisplay.find('#clearBranchCategory').remove();
            }
        });
        // Branch category cancel
        $(document).on('click', '.branch_type_head_btn, #branch_type_cancel', function(){
            $("#savForm_error_branch").attr('hidden', true);
            $("#updateForm_error_branch").attr('hidden', true);
            $('#branchTypeName').removeClass('is-invalid');
            $('#branchTypeName').val("");
            $('#branch_category_name').val("").trigger('change');

            // setting dispalay part
            $("#startLoading").attr('hidden', true);
            $("#continueousLoading").attr('hidden', true);
            $("#categorySettingDisplayCard").attr('hidden', true);

            // check if update mode is active
            if ($("#enableUpdateCategory").is(":visible")) {
                $("#branch_type_create").addClass('display_none');
                $("#branch_type_delete").attr('hidden', true);
                $("#branch_type_delete").addClass('display_none');
                $("#branch_type_cancel").show();
                $("#branch_type_update").removeAttr('hidden');
                $("#branch_type_update").removeClass('display_none');
            }

            // check if delete mode is active
            if ($("#enableDeleteCategory").is(":visible")) {
                $("#branch_type_create").addClass('display_none');
                $("#branch_type_update").attr('hidden', true);
                $("#branch_type_update").addClass('display_none');
                $("#branch_type_cancel").show();
                $("#branch_type_delete").removeAttr('hidden');
                $("#branch_type_delete").removeClass('display_none');
            }

        });
        
        // Search Branch Category
        $(document).on('change', '#branch_category_name', function(e){
            e.preventDefault();
            $("#delete_label").empty();
            $("#categorySettingDisplay").empty();
            $("#Heading").empty();
            $("#confrmHead, #confrmUpdateName, #deleteLab").empty();
            var select = $(this).val();

            // Button Show Or Hide
            if(select == ''){
                $("#branch_type_create").removeAttr('hidden');
                $("#branch_type_cancel").removeAttr('hidden');
                $("#branch_type_update").attr('hidden', true);
                $("#branch_type_delete").attr('hidden', true);
                $('#branchTypeName').val("");
                $("#updateForm_error_branch").attr('hidden', true);
                $("#savForm_error_branch").attr('hidden', true);
                $('#branchTypeName').removeClass('is-invalid');

                return select;

            }else if(select !== ''){
                var id = select;
            }

            // Check if data is cached
            const branchCategoryCache = getAppRAM('branchCategoryDetails', {});

            if (branchCategoryCache[select]) {
                $('#response_message').empty();
                $('#response_message').removeClass('alert alert-danger');
                populateBranchCategoryFromCache(branchCategoryCache[select], select);
            }else{
                $.ajax({
                    type: "GET",
                    url: "/company/branch-type-edit/" + id,
                    success: function(response){
                        if(response.status == 404){
                            $('#response_message').removeClass('alert alert-danger');
                            //$('#success_message').html("");
                            // $('#success_message').addClass('alert alert-danger');
                            // $('#success_message').text(response.messages);
                        }else if(response.status == 200){
                            const branchCategoryCache = getAppRAM('branchCategoryDetails', {});
                            branchCategoryCache[select] = response;
                            updateAppRAM('branchCategoryDetails', branchCategoryCache);

                            populateBranchCategoryFromCache(response, select);
                        }
                        
                    }
                });
            }
        });
        function populateBranchCategoryFromCache(response, id){
            $("#branchTypeCreateModal").modal('hide');
            $("#accessconfirmbranch").modal('show');
            $("#dataPullingProgress").removeAttr('hidden');
            $("#access_modal_box").addClass('progress_body');
            $("#processModal_body").addClass('loading_body_area');
            $("#savForm_error_branch").attr('hidden', true);
            $('#branchTypeName').removeClass('is-invalid');

            setTimeout(() => {
                $("#branchTypeCreateModal").modal('show');
                $("#accessconfirmbranch").modal('hide');
                $("#dataPullingProgress").attr('hidden', true);
                $("#access_modal_box").removeClass('progress_body');
                $("#processModal_body").removeClass('loading_body_area');
                $("#categorySettingDisplayCard").removeAttr('hidden');
                // check if update mode is active
                if ($("#enableUpdateCategory").is(":visible")) {
                    $("#branch_type_create").addClass('display_none');
                    $("#branch_type_delete").attr('hidden', true);
                    $("#branch_type_delete").addClass('display_none');
                    $("#branch_type_cancel").show();
                    $("#branch_type_update").removeAttr('hidden');
                    $("#branch_type_update").removeClass('display_none');
                }

                // check if delete mode is active
                if ($("#enableDeleteCategory").is(":visible")) {
                    $("#branch_type_create").addClass('display_none');
                    $("#branch_type_update").attr('hidden', true);
                    $("#branch_type_update").addClass('display_none');
                    $("#branch_type_cancel").show();
                    $("#branch_type_delete").removeAttr('hidden');
                    $("#branch_type_delete").removeClass('display_none');
                }
                
                const messages = response.messages;

                $('#branch_category_id').val(id);
                $('#branch_delete_category_id').val(id);
                $('#inputBranchCategory').removeClass('display_none');
                $('.edit_branch_category_name').removeClass('display_none');
                $('.edit_branch_category_name').val(response.messages.branch_category_name);
                const branchCategory = $("#delete_label");
                const branchCategoryHeading = $("#Heading");
                const confirmUpdateHeading = $("#confrmHead, #confrmUpdateName, #deleteLab");
                branchCategory.append(`<span class="">${response.messages.branch_category_name}</span>`);
                branchCategoryHeading.append(`<span class="">${response.messages.branch_category_name}</span>`);
                confirmUpdateHeading.append(`<span class="">${response.messages.branch_category_name}</span>`);

                let inputValue = response.messages.branch_category_name;
                let settingDisplay = $("#categorySettingDisplay");

                if(inputValue !== ''){
                    $("#savForm_error_branch").attr('hidden', true);
                    $('#branchTypeName').removeClass('is-invalid');
                    settingDisplay.find('#clearBranchCategory').remove();
                    // Setting Display
                    settingDisplay.append(`
                        <li id="clearBranchCategory">
                            <label class="form-check-label line-label" for="branch-type">
                                Branch-Category : ${inputValue}
                            </label>
                        </li>
                    `);
                }else if(inputValue == ''){
                    // Display Component Settings Empty
                    settingDisplay.find('#clearBranchCategory').remove();
                }
            }, 1500);
        }
        // Create Branch Type
        $(document).on('click', '#branch_type_create', function(e){
            e.preventDefault();
            
            $("#savForm_error_branch").removeAttr('hidden');
            var data = {
                'branch_category_name' : $("#branchTypeName").val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[ name ="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('branch_type.store') }}",
                data: data,
                dataType: "json",
                success : function(response){
                    if(response.status == 400){
                        $.each(response.errors, function(key, err_value){
                            $("#savForm_error_branch").fadeIn();
                            $('#savForm_error_branch').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                            $("#savForm_error_branch").addClass("alert_show_errors");
                            $('#branchTypeName').addClass('is-invalid');
                            $('#branchTypeName').html("");
                        });
                    }else if(response.status == 200){
                        $("#branchTypeCreateModal").modal('hide');
                        $("#loadingBox").removeClass('display_none');

                        // save new cache in AppRAM
                        updateAppRAMBulk({
                            branchCategoryFlags: false,
                            branchCategories: [],
                            branchTypeFlags: false,
                            branchTypes: []
                        });

                        setTimeout(() => {
                            $("#loadingBox").addClass('display_none');
                            $('#savForm_error').html("");
                            $('#branchTypeName').val("");

                            let settingDisplay = $("#categorySettingDisplay");
                            // Display Component Settings Empty
                            settingDisplay.find('#clearBranchCategory').remove();

                            setTimeout(() => {
                                showSuccessToast(response.messages)
                            }, 1000);
                            
                            fetch_branch_categories();
                            fetch_branch_types();
                        }, 1500);
                    }
                }
            })
        });

        // show update branch type modal
        $(document).on('click', '#branch_type_update',function(e){
            e.preventDefault();
            $("#updatecategoryconfirmbranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.update_title, .head_btn3, #text_message', type: 'class', name: 'branch-skeleton' },
                    { selector: '#branch_type_delete_cancel, #category_update_confirm', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });

        // Confirm Update Branch Type
        $(document).on('click', '#category_update_confirm', function(e){
            e.preventDefault();
            $("#updateForm_error_branch").removeAttr('hidden');

            var id = $("#branch_category_id").val();
            var data = {
                'branch_category_name' : $(".edit_branch_category_name").val(),
            }

            // Check if cache exists
            const cachedData = branchCategoryDetailsCache[id]?.messages;

            let isChanged = false;

            if (cachedData) {
                // Compare each field
                for (const key in data) {
                    if (data[key] != cachedData[key]) {
                        isChanged = true;
                        break;
                    }
                }
            }else {
                isChanged = true; // No cached data, assume changed
            }

            // If not changed, don't send update
            if (!isChanged) {
                $("#updatecategoryconfirmbranch").modal('hide');
                setTimeout(() => {
                    showSuccessToast("No changes detected. Update skipped.")
                }, 1000);
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[ name ="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/company/branch-type-update/" + id,
                data: data,
                dataType: "json",
                success : function(response){
                    if(response.status == 400){
                        $("#updatecategoryconfirmbranch").modal('hide');
                        $.each(response.errors, function(key, err_value){
                            $("#updateForm_error_branch").fadeIn();
                            $('#updateForm_error_branch').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                            $("#updateForm_error_branch").addClass("alert_show_errors");
                            $('#branchTypeName').addClass('is-invalid');
                            $('#branchTypeName').html("");
                        });
                    }else if(response.status == 200){
                        $("#updatecategoryconfirmbranch").modal('hide');
                        $("#loadingBox").removeClass('display_none');

                        clearBranchCache(id);

                        setTimeout(() => {
                            $("#loadingBox").addClass('display_none');
                            $('#updateForm_error_branch').html("");
                            $(".edit_branch_category_name").val("");
                            $('#branch_category_name').val("").trigger('change');

                            // check if update mode is active
                            if ($("#enableUpdateCategory").is(":visible")) {
                                $("#branch_type_create").addClass('display_none');
                                $("#branch_type_delete").attr('hidden', true);
                                $("#branch_type_delete").addClass('display_none');
                                $("#branch_type_cancel").show();
                                $("#branch_type_update").removeAttr('hidden');
                                $("#branch_type_update").removeClass('display_none');
                            }
                            // Invalidate and re-fetch updated search list
                            updateAppRAMBulk({
                                branchCategoryFlags: false,
                                branchCategories: [],
                                branchTypeFlags: false,
                                branchTypes: []
                            });
                            fetch_branch_categories();
                            fetch_branch_types();

                            setTimeout(() => {
                                showSuccessToast(response.messages)
                            }, 1000);

                        }, 1500);
                    }
                }
            })

        });

        // Delete Branch Type Confirm Delete Modal Show
        $(document).on('click', '#branch_type_delete', function(e){
            e.preventDefault();
            $("#deletecategorybranch").modal('show');

            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    { selector: '.head_title, .head_btn, .branch_category_name', type: 'class', name: 'branch-skeleton' },
                    { selector: '#noButton, #yesBtn', type: 'class', name: 'branch-delete-skeleton' },
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            };

        });

        // Show Confirm Delete Modal
        $(document).on('click', '#yesBtn', function(e){
            e.preventDefault();
            $("#deletecategorybranch").modal('hide');
            $("#deletecategoryconfirmbranch").modal('show');

            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    { selector: '.confirm_title, .head_btn2, .branch_category_name, .branch__category_name', type: 'class', name: 'branch-skeleton' },
                    { selector: '#noButton, #yesBtn', type: 'class', name: 'branch-delete-skeleton' },
                    { selector: '#branch_type_delete_cancel, #branch_type_delete_confirm', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            };

        });

        // Back Branch Type Modal
        $(document).on('click', '#branch_type_delete_cancel', function(e){
            e.preventDefault();
            $("#deletecategoryconfirmbranch").modal('hide');
            $("#deletecategorybranch").modal('show');
            

        });

        // Confirm Delete Branch Category
        $(document).on('click', '#branch_type_delete_confirm', function(e){
            e.preventDefault();
            var id = $("#branch_delete_category_id").val();

            $.ajaxSetup({
                headrs:{
                    'X-CSRF-TOKEN': $('meta[name ="csrf_token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/company/branch-type-delete/" + id,
                success: function(response){
                    $("#deletecategoryconfirmbranch").modal('hide');
                    $("#deletecategorybranch").modal('hide');
                    $("#loadingBox").removeClass('display_none');

                    // update branch categories details
                    clearBranchCache(id);

                    // Get current categories from AppRAM
                    const branchCategories = getAppRAM('branchCategories');

                    const filteredCategories = branchCategories.branch_categories.filter(
                        branch => branch.id != id
                    );

                    updateAppRAMBulk({
                        branchCategoryFlags: false,
                        branchCategories: {
                            branch_categories: filteredCategories
                        },
                        branchTypeFlags: false,
                        branchTypes: []
                    });

                    setTimeout(() => {
                        $("#loadingBox").addClass('display_none');
                        $("#branch_category_name").val("").trigger('change');
                        $(".edit_branch_category_name").val("");

                        // check if delete mode is active
                        if ($("#enableDeleteCategory").is(":visible")) {
                            $("#branch_type_create").addClass('display_none');
                            $("#branch_type_update").attr('hidden', true);
                            $("#branch_type_update").addClass('display_none');
                            $("#branch_type_cancel").show();
                            $("#branch_type_delete").removeAttr('hidden');
                            $("#branch_type_delete").removeClass('display_none');
                        }

                        setTimeout(() => {
                            showSuccessToast(response.messages)
                        }, 1000);
                        
                        // Re-fetch fresh data
                        fetch_branch_categories();
                        fetch_branch_types();
                    }, 1500);
                }
            });
        });


    });
</script>