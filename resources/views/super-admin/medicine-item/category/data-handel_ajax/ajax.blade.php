<script type="module">
    import { buttonLoader } from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();
    $(document).ready(() => {
        // Initialize the button loader for the login button
        buttonLoader('#save', '.add-icon', '.category-btn-text', 'ADD...', 'ADD', 3000);
        buttonLoader('#update_btn', '.update-icon', '.update-btn-text', 'Update...', 'Update', 1000);
        buttonLoader('#update_btn_confirm', '.confirm-icon', '.confirm-btn-text', 'Confirm...', 'Confirm', 1000);
        buttonLoader('#deleteLoader', '.delete-icon', '.delete-btn-text', 'Delete...', 'Delete', 1000);
        buttonLoader('#cancel_btn', '.cancel-icon', '.cancel-btn-text', 'Cancel...', 'Cancel', 1000);

        fetch_category_data();
        // Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Category Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                var statusClass, statusText, statusSignal, statusBg, statusTextColor, permissionSignal;
                if (row.status == 1) {
                    statusClass = 'text-white';
                    statusText = 'Active';
                    statusTextColor = 'text-primary';
                    statusSignal = '<i class="fa-solid fa-check"></i>';
                    statusBg = 'badge rounded-pill bg-success';
                    permissionSignal = 'light2-focus';
                } else if (row.status == 0) {
                    statusClass = 'text-white';
                    statusText = 'Deny';
                    statusTextColor = 'text-danger';
                    statusSignal = '<i class="fa-solid fa-xmark"></i>';
                    statusBg = 'badge rounded-pill bg-danger';
                    permissionSignal = 'danger-focus';
                }
                return `
                    <tr class="table-row user-table-row" id="cat_td" key="${key}">
                        <td class="sn border_ord" id="cat_td2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="cat_td3">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration edit_button cgr_btn edit_btn ms-2" id="edtBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Eidt" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" 
                                    data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-pen-to-square fa-beat" style="color:darkcyan"></i></button>
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" 
                                    data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="txt_ ps-1" id="cat_td4">${row.category_name}</td>
                        <td class="tot_complete_ pe-2" id="cat_td6">
                            <span class="permission-plate ps-1 pe-1 ms-1 pt-1 ${statusBg} ${statusClass}">${statusSignal}</span>
                            <span class="${statusTextColor}">${statusText}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="${permissionSignal}" readonly></span>
                        </td>
                        <td class="tot_complete_ center ps-1 pt-1" id="cat_td5">
                            <input class="form-switch form-check-input check_permission" type="checkbox" category_id="${row.id}" value="${row.status}" ${row.status? " checked": ''}>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Users Data ------------------
        function fetch_category_data(
            query = '', 
            url = null, 
            perItem = null,
            sortFieldID = 'id', 
            sortFieldCategoryName = 'category_name', 
            sortFieldStatus = 'status', 
            sortFieldDirection = 'desc',
        ) {

            if (perItem === null) {
                perItem = $("#perItemControl").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search-category.action')}}?per_item=${perItem}`;
            } else {
                current_url += `&per_item=${perItem}`
            }

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query,
                    sort_field_id : sortFieldID,
                    sort_field_category_name : sortFieldCategoryName,
                    sort_field_status : sortFieldStatus,
                    sort_direction : sortFieldDirection,
                },
                success: function({
                    data,
                    links,
                    total
                    
                }) {
                    $("#category_data_table").html(table_rows([...data]));
                    $("#category_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_category_records").text(total);
                    // Initialize tooltips after appending the elements
                    $('[data-bs-toggle="tooltip"]').tooltip();

                    // Get suggestions for autocomplete
                    var suggestions = data.map(function(item) {
                        return item.category_name;
                    });
                    // Initialize autocomplete
                    $("#search").autocomplete({
                        source: suggestions
                    });
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {
                value
            } = e.target;

            fetch_category_data('', null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_category_data(query);
        });

        // search-loader
        $(".category-all-search").on('keyup', function() {

            var time = null;
            $("#category_data_table").addClass('skeleton');
            $("#cat_td").addClass('skeleton');
            $("#cat_td2").addClass('skeleton');
            $("#cat_td3").addClass('skeleton');
            $("#cat_td4").addClass('skeleton');
            $("#cat_td5").addClass('skeleton');
            $("#cat_td6").addClass('skeleton');

            time = setTimeout(() => {
                $("#category_data_table").removeClass('skeleton');
                $("#cat_td").removeClass('skeleton');
                $("#cat_td2").removeClass('skeleton');
                $("#cat_td3").removeClass('skeleton');
                $("#cat_td4").removeClass('skeleton');
                $("#cat_td5").removeClass('skeleton');
                $("#cat_td6").removeClass('skeleton');
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });

        // Paginate Page-------------------------------
        const paginate_html = ({
            links,
            total
        }) => {
            if (total == 0) {
                return "";
            }

            return `
                <nav class="paginate_link" aria-label="Page navigation example">
                    <ul class="pagination">
                        ${links.map((link, key) => {
                            return `
                                <li class="page-item${link.active? ' active': ''}" key=${key}>
                                    <a class="page-link btn_page" href="${link.url? link.url: '#'}">
                                        ${link.label}
                                    </a>
                                </li>
                            `;
                        }).join("\n")}
                    </ul>
                </nav>
            `;
        }
        // change paginate page------------------------
        $("#category_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_category_data('', url);
            }

        });

        // Cancel Button
        $(document).on('click', '#cancel_btn', () => {
            $("#save").show('slow');
            $("#update_btn").hide('slow');
            $("#update_btn").attr('hidden',true);
            $("#category_name").focus();
            $("#category_name").removeClass('is-invalid');
            $('#updateForm_errorList').addClass('display-none');
            $('#savForm_error').addClass('display-none');
        });

        // Category Name Filed
        $(document).on('keyup', "#category_name", function(){
            var categoryName = $(this).val();
            if (categoryName !== '') {
                $("#category_name").removeClass('is-invalid');
                $('#updateForm_errorList').addClass('display-none');
                $('#savForm_error').addClass('display-none');
            }
        });

        // Add Category
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var data = {
                'category_name': $('#category_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('add.action')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').removeClass('display-none');
                            $("#category_name").addClass('is-invalid');
                            $('#savForm_error').addClass('alert_show_errors');
                            $('#savForm_error').append('<span class="error_val">' + err_value + '</span>');
                            $('#savForm_error').fadeIn();
                        });
                    } else {
                        $('#savForm_error').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('#category_name').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut(3000);
                        }, 5000);
                        fetch_category_data();
                    }

                }
            });
        });

        // Edit Category
        $(document).on('click', '#edtBtn', function(e) {
            e.preventDefault();
            $("#save").hide('slow');
            $("#update_btn").show('slow');
            $("#update_btn").removeAttr('hidden');
            var cateogory_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/edit-category/" + cateogory_id,
                success: function(response) {
                    if (response.status == 404) {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#category_id').val(cateogory_id);
                        $('.edit_category_name').val(response.messages.category_name);
                    }
                }
            });
        });

        // Update Show Modal
        $(document).on('click', '#update_btn', function(e){
            e.preventDefault();
            $("#updateconfirmcategory").modal('show');
            
            $("#update_btn_confirm").addClass('skeleton');
            $("#cate_delete5").addClass('skeleton');
            $("#cate_confirm_update").addClass('skeleton');
            $(".update_title").addClass('skeleton');
            $(".head_btn3").addClass('skeleton');
            var time = null;
            time = setTimeout(() => {
                $(".update_title").removeClass('skeleton');
                $(".head_btn3").removeClass('skeleton');
                $("#update_btn_confirm").removeClass('skeleton');
                $("#cate_delete5").removeClass('skeleton');
                $("#cate_confirm_update").removeClass('skeleton');
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        // Confirm Update Category
        $(document).on('click', '#update_btn_confirm', function(e) {
            e.preventDefault();
            var category_id = $('#category_id').val();
            var data = {
                'category_name': $('.edit_category_name').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-category/" + category_id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $("#category_name").addClass('is-invalid');
                            $('#updateForm_errorList').removeClass('display-none');
                            $('#updateForm_errorList').addClass('alert_show_errors ps-1 pe-2');
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                            $("#updateconfirmcategory").modal('hide');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('.edit_category_name').val("");
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 5000);
                        $("#updateconfirmcategory").modal('hide');
                        fetch_category_data();
                    }
                }
            });

        });

        // Delete Modal
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var category_id = $(this).val();
            $('#delete_category_id').val(category_id);
            $('#deletecategory').modal('show');
            $(".head_title").addClass('skeleton');
            $(".head_btn").addClass('skeleton');
            $("#cate_delete").addClass('skeleton');
            $("#cat_id").addClass('skeleton');
            $("#cate_delete2").addClass('skeleton');
            $("#load_id").addClass('skeleton');
            $("#yesButton").addClass('min-skeleton');
            $("#noButton").addClass('min-skeleton');

            var time = null;
            time = setTimeout(() => {
                $(".head_title").removeClass('skeleton');
                $(".head_btn").removeClass('skeleton');
                $("#cate_delete").removeClass('skeleton');
                $("#cat_id").removeClass('skeleton');
                $("#cate_delete2").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
                $("#cate_delete3").removeClass('skeleton');
                $("#load_id").removeClass('skeleton');
                $("#yesButton").removeClass('min-skeleton');
                $("#noButton").removeClass('min-skeleton');
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        // Delete Category confirm modal
        $(document).on('click', '.yes_button', function(e){
            e.preventDefault();
            $('#deleteconfirmcategory').modal('show');
            $("#deleteLoader").addClass('skeleton');
            $("#cate_delete3").addClass('skeleton');
            $("#cate_confirm").addClass('skeleton');
            $(".confirm_title").addClass('skeleton');
            $(".head_btn2").addClass('skeleton');
            $(".loading-yes-icon").removeAttr('hidden');
            var time = null;
            time = setTimeout(() => {
                $(".confirm_title").removeClass('skeleton');
                $(".head_btn2").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
                $("#cate_delete3").removeClass('skeleton');
                $("#cate_confirm").removeClass('skeleton');
                $(".loading-yes-icon").attr('hidden',true);
            }, 1000);

            return () => {
                clearTimeout(time);
            }
        });
        // Delete Category
        $(document).on('click', '.delet_btn_user', function(e) {
            e.preventDefault();
            var category_id = $('#delete_category_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-category/" + category_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 5000);
                    $('#deletecategory').modal('hide');
                    $('#deleteconfirmcategory').modal('hide');

                    fetch_category_data();
                }

            });
        });

        // Update-Status ------------------
        $("#category_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('category_status.action')}}";

            const pagination_url = $("#category_data_table_paginate .active").attr('href');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: current_url,
                dataType: 'json',
                data: {
                    id: $(this).attr('category_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_category_data('', pagination_url);
                }
            });
        });

        // Loader
        $(document).load('click', function() {
            $("#active_loader").addClass('loader_chart');
        });

        // Event Listener for sorting columns
        $(document).on('click', '#th_sort', function(){
            var button = $(this);
            // Get the column and current order
            var column = button.data('column');
            var order = button.data('order');
            // Toggle the order (asc/desc)
            order = order === 'desc' ? 'asc' : 'desc';
            button.data('order', order);
            fetch_category_data(
                '', null, null,
                column === 'id' ? column : 'id',
                column === 'category_name' ? column : 'category_name',
                column === 'status' ? column : 'status',
                order
            );
            // Reset all icons in the table headers first - icon part
            $("#th_sort").find('.toggle-icon').html('<i class="fa-solid fa-arrow-down-long"></i>');
            var icon = button.find('.toggle-icon');
            if(order === 'desc'){
                icon.html('<i class="fa-solid fa-arrow-up-long"></i>');
                $(".toggle-icon").fadeIn(300);
            }else{
                icon.html('<i class="fa-solid fa-arrow-down-long"></i>');
                $(".toggle-icon").fadeIn(300);
            }

        });

    });
</script>
<!-- <script>
    var dragCol = null;

    function handelDragStart(e) {
        dragCol = this;
        e.dataTransfer.effectAllowed = "move";
        e.dataTransfer.setData('text/html', this.outerHTML);
    }

    function handelDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.dataTransfer.effectAllowed = "move";
        return false;
    }

    function handelDrop(e) {
        if (e.stopPropagation) {
            e.stopPropagation();
        }
        if (dragCol !== this) {
            var sourceIndex = Array.from(dragCol.parentNode.children).indexOf(dragCol);
            var targetIndex = Array.from(this.parentNode.children).indexOf(this);
            var table = document.getElementById("myTable");
            var rows = table.rows;

            for (var i = 0; i < rows.length; i++) {
                var sourceCell = rows[i].cells[sourceIndex];
                var targetCell = rows[i].cells[targetIndex];

                var tempHTML = sourceCell.innerHTML;
                sourceCell.innerHTML = targetCell.innerHTML;
                targetCell.innerHTML = tempHTML;
            }
        }
        return false;
    }

    var cols = document.querySelectorAll("th");
    [].forEach.call(cols, function(col) {
        col.addEventListener('dragstart', handelDragStart, false);
        col.addEventListener('dragover', handelDragOver, false);
        col.addEventListener('drop', handelDrop, false);
    });
</script> -->