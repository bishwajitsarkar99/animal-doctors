<script type="module">
    import { currentDate } from "/module/module-min-js/helper-function-min.js";
    import { buttonLoader , removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();

    $(document).ready(function(){
        // Ensure function exists before calling
        if (typeof fetch_division === "function") {
            fetch_division();
            fetch_district();
            fetch_upazila();
        } else {
            // console.error("fetch_division is not defined. Check script order.");
        }
        fetch_branch_types();
        searchBranch();
        fetch_branch_categories();
        initSelect2();
        // Initialize the button loader for the login button
        buttonLoader('#save', '.add-icon', '.add-btn-text', 'Add...', 'Add', 1000);
        buttonLoader('#update_btn', '.update-icon', '.update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#update_btn_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm...', 'Confirm', 1000);
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
                    dropdownParent = $('#branchTypeCreateModal');
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
        // Reinitialize Select2 for modals
        $('#branchTypeCreateModal').on('shown.bs.modal', function() {
            initSelect2('#branchTypeCreateModal');

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


        // =================== Start Branch Setting Section ===================================
        // =============== Home Page Branch List =====================
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
                $("#save").hide();
                $("#save").fadeOut();
                $("#cancel_btn").hide();
                $("#cancel_btn").fadeOut();
            }else if(select == ''){
                $("#save").show();
                $("#save").fadeIn();
                $("#update_btn").attr('hidden', true);
                $("#update_btn").fadeOut();
                $("#deleteBranch").attr('hidden', true);
                $("#deleteBranch").fadeOut();
                $("#cancel_btn").show();
                $("#cancel_btn").fadeIn();
            }

            if(select == ''){
                $('.edit_branch_id').attr('hidden', true);
                $('#documents').attr('hidden', true);
                clearFields();
            }
            
            $.ajax({
                type: "GET",
                url: "/company/branch-edit/" + id,
                success: function(response){
                    if(response.status == 404){
                        $('#success_message').html("");
                        // $('#success_message').addClass('alert alert-danger');
                        // $('#success_message').text(response.messages);
                    }else if(response.status == 200){
                        $("#accessconfirmbranch").modal('show');
                        $("#dataPullingProgress").removeAttr('hidden');
                        $("#access_modal_box").addClass('progress_body');
                        $("#processModal_body").addClass('loading_body_area');
                        $('#documents').attr('hidden', true);
                        $('.edit_branch_id').attr('hidden', true);

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#dataPullingProgress").attr('hidden', true);
                            $("#access_modal_box").removeClass('progress_body');
                            $("#processModal_body").removeClass('loading_body_area');
                            $('#documents').removeAttr('hidden');
                            $('.edit_branch_id').removeAttr('hidden');
                            $("#update_btn").removeAttr('hidden');
                            $("#update_btn").fadeIn();
                            $("#deleteBranch").removeAttr('hidden');
                            $("#deleteBranch").fadeIn();
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
    
                                $("#firstUserEmail").val(messages.created_users.email);
                                $("#firstCreatedBy").val(createdByRole);
                                if(messages.created_at !== ''){
                                    $("#firstCreatedAt").val(currentDate(messages.created_at));
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
    
                                $("#secondUserEmail").val((messages.updated_users.email));
                                $("#secondUpdateBy").val(updatedByRole);
                                if(messages.created_at !== messages.updated_at){
                                    $("#secondUpdateAt").val(currentDate(messages.updated_at));
                                }else{
                                    $("#secondUpdateAt").val('-');
                                }
                            }else{
                                $("#secondContent").attr('hidden', true);
                                $('#secondHead').attr('hidden', true);
                            }
                            // if(messages.approver_by !== null){
                            //     $("#thirdContent").removeAttr('hidden');
                            //     $('#thirdHead').removeAttr('hidden');
                            //     const secondUserImage = messages.approver_users.image.includes('https://') ? messages.approver_users.image : `${window.location.origin}/image/${messages.approver_users.image}`;
                            //     let approverByRole;
                            //     switch (messages.approver_by) {
                            //         case 1:
                            //             approverByRole = 'SuperAdmin';
                            //             break;
                            //         case 2:
                            //             approverByRole = 'Sub-Admin';
                            //             break;
                            //         case 3:
                            //             approverByRole = 'Admin';
                            //             break;
                            //         case 0:
                            //             approverByRole = 'User';
                            //             break;
                            //         case 5:
                            //             approverByRole = 'Accounts';
                            //             break;
                            //         case 6:
                            //             approverByRole = 'Marketing';
                            //             break;
                            //         case 7:
                            //             approverByRole = 'Delivery Team';
                            //             break;
                            //         default:
                            //             approverByRole = 'Unknown';
                            //     }
                            //     $("#thirdUserImage").html(`<img class="user_img rounded-square users_image position" src="${secondUserImage}">`);
    
                            //     $("#thirdUserEmail").val(messages.approver_users.email);
                            //     $("#thirdApprover").val(approverByRole);
                            //     if(messages.approver_date !== null){
                            //         $("#thirdUpdateAt").val(currentDate(messages.approver_date));
                            //     }else if(messages.approver_date == null){
                            //         $("#thirdUpdateAt").val('-');
                            //     }
                            // }else{
                            //     $("#thirdContent").attr('hidden', true);
                            //     $('#thirdHead').attr('hidden', true);
                            // }
    
                            $('#branches_id').val(id);
                            $('#edit_branch_id').val(response.messages.branch_id);
                            $('.edit_branch_name').val(response.messages.branch_name);
                            $('.edit_branch_type').val(response.messages.branch_type).trigger('change.select2');
                            $('.edit_division_id').val(response.messages.division_id).trigger('change.select2');
                            fetch_district(response.messages.division_id, function(){
                                // Set the value once options are available
                                $('.edit_district_id').val(response.messages.district_id).trigger('change.select2');
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

                        }, 1500);
                        
                    }
                    
                }
            });
        });

        // fetch branch for dropdown
        function searchBranch(){
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
                    const all_branchs = response.allBranch;
                    // Branch Table Data =======================
                    $("#select_branch").empty();
                    $("#select_branch").append('<option value="">Select Company Branch Name</option>');
                    $.each(all_branchs, function(key, item) {
                        $("#select_branch").append(`<option style="color:white;font-weight:600;" value="${item.id}">${item.branch_name}</option>`);
                    });
                },
                error: function() {
                    $("#select_branch").empty();
                    $("#select_branch").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }
        fetchTableBranch();
        // Branch List Table
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            <div class="table-svg-container pt-1">
                                <svg width="20" height="30" viewBox="0 0 61 81" fill="#fff" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round"><use xlink:href="#A" x=".5" y=".5"/><symbol id="A" overflow="visible"><g stroke="none"><path d="M0 10.929V69.07C0 75.106 13.432 80 30 80V10.929H0z" fill="#3999c6"/><path d="M29.589 79.999h.412c16.568 0 30-4.891 30-10.929v-58.14H29.589v69.07z" fill="#59b4d9"/><path d="M60 10.929c0 6.036-13.432 10.929-30 10.929S0 16.965 0 10.929 13.432 0 30 0s30 4.893 30 10.929"/><path d="M53.867 10.299c0 3.985-10.686 7.211-23.867 7.211S6.132 14.284 6.132 10.299 16.819 3.088 30 3.088s23.867 3.228 23.867 7.211" fill="#7fba00"/><path d="M48.867 14.707c3.124-1.219 5.002-2.745 5.002-4.403 0-3.985-10.686-7.213-23.868-7.213S6.134 6.318 6.134 10.303c0 1.658 1.877 3.185 5.002 4.403 4.363-1.703 11.182-2.803 18.865-2.803s14.5 1.1 18.866 2.803" fill="#b8d432"/><path d="M49.389 58.071c-1.605 1.346-3.78 2.022-6.607 2.022h-9.428V35.358h8.943c2.816 0 4.973.517 6.457 1.588 1.389 1.005 2.086 2.41 2.086 4.205 0 1.431-.507 2.648-1.543 3.719-.882.885-1.942 1.497-3.248 1.856v.058c1.753.217 3.184.889 4.25 2.017.997 1.071 1.511 2.384 1.511 3.903.007 2.262-.813 4.033-2.42 5.366m-22.977-1.457c-2.359 2.322-5.544 3.479-9.519 3.479H8.19V35.358h8.704c8.731 0 13.098 3.998 13.098 12.043 0 3.846-1.181 6.925-3.579 9.213"/><path d="M16.439 39.873h-2.727v15.704h2.759c2.425 0 4.304-.763 5.695-2.227 1.332-1.463 2.006-3.415 2.006-5.883 0-2.317-.674-4.143-1.975-5.495-1.365-1.397-3.275-2.099-5.757-2.099" fill="#3999c6"/><path d="M43.993 44.483c.666-.583.999-1.346.999-2.293 0-1.834-1.332-2.747-4.033-2.747h-2.084v5.86h2.454c1.122 0 2.031-.282 2.665-.821m.909 5.817c-.73-.546-1.722-.853-3.004-.853h-3.03v6.524h3.001c1.276 0 2.303-.304 3.062-.914.696-.612 1.058-1.399 1.058-2.439.006-.977-.357-1.769-1.087-2.317" fill="#59b4d9"/></g></symbol></svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="rgb(205, 247, 0)" stroke="#3999c6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-commit"><circle cx="12" cy="12" r="4"/><line x1="1.05" y1="12" x2="7" y2="12"/><line x1="17.01" y1="12" x2="22.96" y2="12"/></svg>
                                <span><svg width="20" height="20" fill="#3999c6" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 445.38"><path d="M6.95 0h498.1c3.82 0 6.95 3.16 6.95 6.92v96.5l-.02.46v341.5H0V88.11h.01L0 6.92C0 3.11 3.12 0 6.95 0zm11.57 315.78h104.12V219.6H18.52v96.18zm122.64 0h105.8V219.6h-105.8v96.18zm124.32 0h105.35V219.6H265.48v96.18zm123.87 0h104.12V219.6H389.35v96.18zm104.12 18.52H389.35v92.56h104.12V334.3zm-122.64 0H265.48v92.56h105.35V334.3zm-123.87 0h-105.8v92.56h105.8V334.3zm-124.32 0H18.52v92.56h104.12V334.3zM18.52 201.09h104.12v-94.46H18.52v94.46zm122.64 0h105.8v-94.46h-105.8v94.46zm124.32 0h105.35v-94.46H265.48v94.46zm123.87 0h104.12v-94.46H389.35v94.46z"/></svg></span>
                                <span> User Log Data Not Exists On Server <span style="color:rgb(220, 53, 69)">!</span></span>
                            </div>
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="branch-table-row" key="${key}" id="BranchRow">
                        <td class="td-cell" style="text-align:center;">${row.id}</td>
                        <td class="td-cell-second">${row.branch_type}</td>
                        <td class="td-cell-second">${row.branch_id}</td>
                        <td class="td-cell-second">${row.branch_name}</td>
                        <td class="td-cell-second">${row.divisions.division_name}</td>
                        <td class="td-cell-second">${row.districts.district_name}</td>
                        <td class="td-cell-second">${row.thana_or_upazilas.thana_or_upazila_name}</td>
                        <td class="td-cell-second">${row.town_name}</td>
                        <td class="td-cell-second">${row.location}</td>
                    </tr>
                `;
            }).join("\n");
        }
        // fetch branch for table
        function fetchTableBranch(url = null, perItem = null){
            perItem = perItem ?? $("#perItemControl").val();

            let current_url = url ?? `{{ route('search-branch.action') }}`;
            current_url += current_url.includes('?') ? `&per_item=${perItem}` : `?per_item=${perItem}`;

            showTableLoader();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                success: function(response) {
                    const { data, links, total, per_page, per_item_num } = response;
                    
                    // Branch Table Data =======================
                    $("#BranchListTableBody").html(table_rows([...data]));
                    $("#branch_data_table_paginate").html(paginate_html({ links, total }));
                    $("#total_branch").text(total);
                    $("#total_branch_items").text(total);
                    $("#total_per_branch_items").text(per_page);
                    $("#per_branch_items_num").text(per_item_num);
                },
                complete: function() {
                    hideTableLoader();
                    fetchData();
                    focuButton();
                    focuTableFooterLabel();
                },
            });
        }
        function showTableLoader() {
            $('#tableOverlayLoader').removeClass('display_none');
        }
        function hideTableLoader() {
            $('#tableOverlayLoader').addClass('display_none');
        }
        // tab button
        $(document).on('click', '.branch-tab-btn', function () {
            $('.branch-tab-btn').removeClass('active-button').addClass('deactive');
            $(this).removeClass('deactive').addClass('active-button');
        });
        // skeleton
        function fetchData() {
            const allSkeleton = document.querySelectorAll('.skeleton')

            allSkeleton.forEach(item => {
                item.classList.remove('skeleton')
            });
        }
        function focuButton() {
            const allSkeleton = document.querySelectorAll('.skeleton-button')

            allSkeleton.forEach(item => {
            item.classList.remove('skeleton-button')
            });
        }
        function focuTableFooterLabel() {
            const allSkeleton = document.querySelectorAll('.table-footer-label')

            allSkeleton.forEach(item => {
            item.classList.remove('table-footer-label')
            });
        }
        const paginate_html = ({ links, total }) => {
            if (total == 0) {
                return "";
            }

            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination">
                        ${links.map((link, key) => {
                            // Handle Previous and Next buttons separately
                            if (link.label.toLowerCase().includes("previous")) {
                                return `
                                    <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                        <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                            <svg width="10px" height="9px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 121.66"><title>direction-left</title><path d="M1.24,62.65,120.1,121.46a1.92,1.92,0,0,0,2.58-.88,1.89,1.89,0,0,0,0-1.76h0l-30.87-58,30.87-58h0a1.89,1.89,0,0,0,0-1.76A1.92,1.92,0,0,0,120.1.2L1.24,59a2,2,0,0,0,0,3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            } 
                            if (link.label.toLowerCase().includes("next")) {
                                return `
                                    <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                        <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                            <svg width="10px" height="9px" fill="#111" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.86 121.64"><title>direction-right</title><path d="M121.62,59,2.78.2A1.92,1.92,0,0,0,.2,1.08a1.89,1.89,0,0,0,0,1.76h0l30.87,58L.23,118.8h0a1.89,1.89,0,0,0,0,1.76,1.92,1.92,0,0,0,2.58.88l118.84-58.8a2,2,0,0,0,0-3.64Z"/></svg>
                                        </a>
                                    </li>
                                `;
                            }

                            // Regular page numbers
                            return `
                                <li class="page-item${link.active ? ' active' : ''}" key=${key}>
                                    <a class="page-link btn_page" href="${link.url ? link.url : '#'}">
                                        ${link.label}
                                    </a>
                                </li>
                            `;
                        }).join("\n")}
                    </ul>
                </nav>
            `;
        };

        // =============== Second Page Setting Box =====================

        // =============== Setting Optation Mode Part
        // Select ID Button form Setting Mode
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
            $("#boxLoading").removeAttr('hidden');
            $("#loaderSpin").removeAttr('hidden');
            $("#loaderSpinner").removeAttr('hidden');

            // Show button step by step according to condition
            if($(this).attr('id') === 'flexRadioDefault1' ){
                setTimeout(() => {
                    $("#settingImplementCard").removeAttr('hidden');
                    $("#enableNewBranch").removeAttr('hidden');
                    $("#boxLoading").attr('hidden', true);
                    $("#loaderSpin").attr('hidden', true);
                    $("#loaderSpinner").attr('hidden', true);
                }, 1000);
            }else if($(this).attr('id') === 'flexRadioDefault2'){
                setTimeout(() => {
                    $("#settingImplementCard").removeAttr('hidden');
                    $("#enableUpdateBranch").removeAttr('hidden');
                    $("#boxLoading").attr('hidden', true);
                    $("#loaderSpin").attr('hidden', true);
                    $("#loaderSpinner").attr('hidden', true);
                }, 1000);
            }else if($(this).attr('id') === 'flexRadioDefault3'){
                setTimeout(() => {
                    $("#settingImplementCard").removeAttr('hidden');
                    $("#enableDeleteBranch").removeAttr('hidden');
                    $("#boxLoading").attr('hidden', true);
                    $("#loaderSpin").attr('hidden', true);
                    $("#loaderSpinner").attr('hidden', true);
                }, 1000);
            }else if($(this).attr('id') === 'flexRadioDefault4'){
                $("#settingImplementCard").attr('hidden', true);
                $("#enableNewBranch").attr('hidden', true);
                $("#enableUpdateBranch").attr('hidden', true);
                $("#enableDeleteBranch").attr('hidden', true);
                $("#boxLoading").attr('hidden', true);
                $("#loaderSpin").attr('hidden', true);
                $("#loaderSpinner").attr('hidden', true);
                $("#disabledNewBranch").attr('hidden', true);
                $("#disabledUpdatedBranch").attr('hidden', true);
                $("#disabledDeleteBranch").attr('hidden', true);
                $(".disabledChecking").attr('hidden', true);
                $(".enableChecking").attr('hidden', true);
                $("#setting_card").attr('hidden', true);
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

            if($(this).attr('id') === 'enableNewBranch'){
                setTimeout(() => {
                    $("#loaderSpinner").attr('hidden', true);
                    $("#enableNewBranch").removeAttr('hidden');
                    $("#disabledNewBranch").removeAttr('hidden');
                    $(".enableChecking").removeAttr('hidden');
                    $("#setting_card").removeAttr('hidden');
                }, 1000);
            }else if($(this).attr('id') === 'enableUpdateBranch'){
                setTimeout(() => {
                    $("#loaderSpinner").attr('hidden', true);
                    $("#enableUpdateBranch").removeAttr('hidden');
                    $("#disabledUpdatedBranch").removeAttr('hidden');
                    $(".enableChecking").removeAttr('hidden');
                    $("#setting_card").removeAttr('hidden');
                }, 1000);
            }else if($(this).attr('id') === 'enableDeleteBranch'){
                setTimeout(() => {
                    $("#loaderSpinner").attr('hidden', true);
                    $("#enableDeleteBranch").removeAttr('hidden');
                    $("#disabledDeleteBranch").removeAttr('hidden');
                    $(".enableChecking").removeAttr('hidden');
                    $("#setting_card").removeAttr('hidden');
                }, 1000);
            }
        });

        // =============== Setting Action Part
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
        // Select ID Button form Setting Box
        $(document).on('click', '#optation_id', function(){
            const idValue = $(this).val();
            if(idValue !== ''){
                $("#save").removeAttr('disabled');
                $(this).addClass('active-height-light');
            }
        });
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetchTableBranch('', null, value);
        });
        // change paginate page------------------------
        $("#branch_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetchTableBranch('', url);
            }

        });
        // fetch branch type/category for dropdown
        function fetch_branch_types(){

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
                    const branch_categories = response.branch_categories;
                    $("#branch_type").empty();
                    $("#branch_type").append('<option value="">Select Branch Category Name</option>');
                    $.each(branch_categories, function(key, item) {
                        $("#branch_type").append(`<option style="color:white;font-weight:600;" value="${item.branch_category_name}">${item.branch_category_name}</option>`);
                    });
                },
                error: function() {
                    $("#branch_type").empty();
                    $("#branch_type").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
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
                    }else{
                        $("#loaderBox").removeClass('display_none');
                        $("#ContentView").removeClass('display_none');

                        setTimeout(() => {
                            $("#loaderBox").addClass('display_none');
                            $("#ContentView").addClass('display_none');

                            // $('#savForm_error').html("");
                            // $('#success_message_show').html("");
                            // $('#success_message_show').addClass('alert_show ps-1 pe-1');
                            // $('#success_message_show').fadeIn();
                            // $('#success_message_show').text(response.messages);
                            // $('#success_message_show').fadeOut(3000);
                            setTimeout(() => {
                                showSuccessToast(response.messages)
                            }, 3000);
                            
                            clearFields();
                            removeField();
                            fetch_division();
                            fetch_district();
                            fetch_upazila();
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
            $("#next").removeClass('display_none');
            $("#formContent").removeClass('display_none');
            $("#ContentView").addClass('display_none');
            $("#save").addClass('display_none');
            $("#save").attr('disabled', true);

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
        });

        // On keyup action for error remove
        $(document).on('keyup', '#branchName, #townName, #location', function(){

            var field = $(this);
            var fieldId = field.attr('id');
            var value = field.val().trim();

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

        });

        // On Change action for error remove
        $(document).on('change', '#branch_type, #select_division, #select_district, #select_upazila', function () {
            var field = $(this);
            var fieldId = field.attr('id');
            var value = field.val();

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

        // Branch Update Modal Show
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmbranch").modal('show');

            var time = null;

            var time = setTimeout(() => {
                // Remove skeleton classes
                removeAttributeOrClass([
                    { selector: '.update_title, .head_btn3, #text_message', type: 'class', name: 'branch-skeleton' },
                    { selector: '#update_btn_confirm, #cate_delete5', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });

        // Confirm Update Branch
        $(document).on('click', '#update_btn_confirm', function(e){
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
                    }else{
                        $("#accessconfirmbranch").modal('show');
                        $("#updateconfirmbranch").modal('hide');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            
                            $('#updateForm_error').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            searchBranch();
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
                    { selector: '.delete_branch, #cate_delete3', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            // Optional cleanup if this code runs in a specific context
            return () => {
                clearTimeout(time);
            };

        });

        // Back delete modal
        $(document).on('click', '#cate_delete3, .delete_confrm_canl', function(e){
            e.preventDefault();
            $("#deletebranch").modal('show');
            $("#deleteconfirmbranch").modal('hide');
        });

        // Confirm Delete Branch
        $(document).on('click', '.delete_branch', function(e){
            e.preventDefault();

            var id = $("#delete_branch_id").val();

            $.ajaxSetup({
                headrs:{
                    'X-CSRF-TOKEN': $('meta[name ="csrf_token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/company/branch-delete/" + id,
                success: function(response){
                    $("#accessconfirmbranch").modal('show');
                    $("#updateconfirmbranch").modal('hide');
                    $("#deletebranch").modal('hide').fadeOut();
                    $("#deleteconfirmbranch").modal('hide').fadeOut();
                    $("#pageLoader").removeAttr('hidden');
                    $("#access_modal_box").addClass('loader_area');
                    $("#processModal_body").removeClass('loading_body_area');

                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#pageLoader").attr('hidden', true);
                        $("#access_modal_box").removeClass('loader_area');
                        $("#processModal_body").addClass('loading_body_area');

                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                        $("#select_branch").val("").trigger('change');
                        $('#success_message').fadeIn();
                        clearFields();
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        
                        searchBranch();
                        
                    }, 1500);
                }
            });
        });

        // Refresh Button
        $(document).on('keyup', '#branchTypeRefresh', function(){
            fetch_division();
            fetch_district();
            fetch_upazila();
            searchBranch();
            fetch_branch_types();
        });

        // =================== End Branch Setting Section ===================================


        // =================== Start Branch Category Setting Section ===================================

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
                    const branch_categories = response.branch_categories;
                    $("#branch_category_name").empty();
                    $("#branch_category_name").append('<option value="">Select Branch Category Name</option>');
                    $.each(branch_categories, function(key, item) {
                        $("#branch_category_name").append(`<option style="color:white;font-weight:600;" value="${item.branch_category_name}">${item.branch_category_name}</option>`);
                    });
                },
                error: function() {
                    $("#branch_category_name").empty();
                    $("#branch_category_name").append('<option style="color:white;font-weight:600;" value="" disabled>Error loading data</option>');
                }
            });
        }

        // Validation Clear
        $(document).on('keyup', '#branchTypeName', function(){
            var selectedVal = $(this).val();
            if(selectedVal !== ''){
                $("#savForm_error_branch").attr('hidden', true);
                $('#branchTypeName').removeClass('is-invalid');
            }
        });
        $(document).on('click', '.branch_type_head_btn, #branch_type_cancel', function(){
            $("#savForm_error_branch").attr('hidden', true);
            $("#updateForm_error_branch").attr('hidden', true);
            $('#branchTypeName').removeClass('is-invalid');
            $('#branchTypeName').val("");
        });
        
        // Search Branch Category
        $(document).on('change', '#branch_category_name', function(e){
            e.preventDefault();
            $("#delete_label").empty();
            $("#Heading").empty();
            var selectID = $(this).val();

            // Button Show Or Hide
            if(selectID == ''){
                $("#branch_type_create").removeAttr('hidden');
                $("#branch_type_cancel").removeAttr('hidden');
                $("#branch_type_update").attr('hidden', true);
                $("#branch_type_delete").attr('hidden', true);
                $('#branchTypeName').val("");
                $("#updateForm_error_branch").attr('hidden', true);
                $("#savForm_error_branch").attr('hidden', true);
                $('#branchTypeName').removeClass('is-invalid');
            }else if(selectID !== ''){
                var id = selectID;
            }
            $.ajax({
                type: "GET",
                url: "/company/branch-type-edit/" + id,
                success: function(response){
                    if(response.status == 404){
                        $('#success_message').html("");
                        // $('#success_message').addClass('alert alert-danger');
                        // $('#success_message').text(response.messages);
                    }else if(response.status == 200){
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
                            $("#branch_type_update").removeAttr('hidden');
                            $("#branch_type_delete").removeAttr('hidden');
                            $("#branch_type_create").attr('hidden', true);
                            $("#branch_type_cancel").attr('hidden', true);
                            $("#branch_type_update").fadeIn();
                            $("#branch_type_delete").fadeIn();
                            const messages = response.messages;
    
                            $('#branch_category_id').val(id);
                            $('#branch_delete_category_id').val(id);
                            $('.edit_branch_category_name').val(response.messages.branch_category_name);
                            const branchCategory = $("#delete_label");
                            const branchCategoryHeading = $("#Heading");
                            branchCategory.append(`<span class="">${response.messages.branch_category_name}</span>`);
                            branchCategoryHeading.append(`<span class="">${response.messages.branch_category_name}</span>`);
                        }, 1500);
                        
                    }
                    
                }
            });
        });

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
                    }else{
                        $("#branchTypeCreateModal").modal('hide');
                        $("#accessconfirmbranch").modal('show');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');

                            $('#savForm_error').html("");
                            $('#success_message').html("");
                            $('#branchTypeName').val("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            
                            fetch_branch_categories();
                            fetch_branch_types();
                        }, 1500);
                    }
                }
            })
        });

        // Update Branch Type
        $(document).on('click', '#branch_type_update', function(e){
            e.preventDefault();
            $("#updateForm_error_branch").removeAttr('hidden');

            var id = $("#branch_category_id").val();
            var data = {
                'branch_category_name' : $(".edit_branch_category_name").val(),
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
                        $.each(response.errors, function(key, err_value){
                            $("#updateForm_error_branch").fadeIn();
                            $('#updateForm_error_branch').html('<span class="error_val" style="font-size:10px;font-weight:700;">' + err_value + '</span>');
                            $("#updateForm_error_branch").addClass("alert_show_errors");
                            $('#branchTypeName').addClass('is-invalid');
                            $('#branchTypeName').html("");
                        });
                    }else{
                        $("#accessconfirmbranch").modal('show');
                        $("#branchTypeCreateModal").modal('hide');
                        $("#pageLoader").removeAttr('hidden');
                        $("#access_modal_box").addClass('loader_area');
                        $("#processModal_body").removeClass('loading_body_area');

                        setTimeout(() => {
                            $("#accessconfirmbranch").modal('hide');
                            $("#pageLoader").attr('hidden', true);
                            $("#access_modal_box").removeClass('loader_area');
                            $("#processModal_body").addClass('loading_body_area');
                            
                            $('#updateForm_error_branch').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert_show ps-1 pe-1');
                            $('#success_message').fadeIn();
                            $('#success_message').text(response.messages);
                            $(".edit_branch_category_name").val("");
                            
                            setTimeout(() => {
                                $('#success_message').fadeOut(3000);
                            }, 3000);
                            fetch_branch_categories();
                            fetch_branch_types();
                        }, 1500);
                    }
                }
            })

        });

        // Delete Branch Type Confirm Delete Modal Show
        $(document).on('click', '#branch_type_delete', function(e){
            e.preventDefault();
            $("#branchTypeDeleteModal").modal('show');
            $("#branchTypeCreateModal").modal('hide');

            var time = null;
            var time = setTimeout(() => {
                removeAttributeOrClass([
                    { selector: '.branch_type_head_delete_btn, .branch_type_head_delete, .branch_category_name', type: 'class', name: 'branch-skeleton' },
                    { selector: '#branch_type_delete_cancel, #branch_type_delete_confirm', type: 'class', name: 'branch-skeleton' },
                ]);
            }, 1000);

            return () => {
                clearTimeout(time);
            };

        });

        // Back Branch Type Modal
        $(document).on('click', '#branch_type_delete_cancel, .branch_type_head_delete_btn', function(e){
            e.preventDefault();
            $("#branchTypeDeleteModal").modal('hide');
            $("#branchTypeCreateModal").modal('show');

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
                    $("#accessconfirmbranch").modal('show');
                    $("#branchTypeDeleteModal").modal('hide');
                    $("#branchTypeCreateModal").modal('hide');
                    $("#pageLoader").removeAttr('hidden');
                    $("#access_modal_box").addClass('loader_area');
                    $("#processModal_body").removeClass('loading_body_area');

                    setTimeout(() => {
                        $("#accessconfirmbranch").modal('hide');
                        $("#pageLoader").attr('hidden', true);
                        $("#access_modal_box").removeClass('loader_area');
                        $("#processModal_body").addClass('loading_body_area');

                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $("#branch_category_name").val("").trigger('change');
                        $(".edit_branch_category_name").val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                        
                        fetch_branch_categories();
                        fetch_branch_types();
                    }, 1500);
                }
            });
        });

        // =================== End Branch Category Setting Section ===================================

    });
</script>