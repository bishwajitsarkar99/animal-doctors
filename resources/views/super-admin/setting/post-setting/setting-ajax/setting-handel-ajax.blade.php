<script>
    $(document).ready(() => {
        // switch on/off----- users table search
        function mySrcFunction() {
            var x = document.getElementById("search_off");
            if (x.innerHTML === "OFF") {
                x.innerHTML = "ON";
            } else {
                x.innerHTML = "OFF";
            }
        }
        // switch Lock/Unlock----- users table action
        function myFunction() {
            var x = document.getElementById("post_lock_label");
            if (x.innerHTML === "Unlock") {
                x.innerHTML = "Lock";
            } else {
                x.innerHTML = "Unlock";
            }
        }
        // Table header Action Mode
        $(document).on('click', '#action_mode', function() {

            if ($("#action_mode:checked").length > 0) {
                $(".check_permission").removeAttr('disabled');
                $(".setting").removeAttr('disabled');

            } else {
                $(".check_permission").attr('disabled', true);
                $(".setting").attr('disabled', true);
            }

            $('#locker').toggle().removeClass('checking_lock');
            $(this).attr('disabled', true);

            setTimeout(() => {
                $('#locker').toggle().addClass('checking_lock');
                $(this).attr('disabled', false);
            }, 1000);
        });

        // Table content loader
        $(document).on('click', '.post_cat_table', function(){

            var time = null;
            $("#pos_cat_content").addClass('skeleton');
            $("#pos_cat_content2").addClass('skeleton');
            $("#pos_cat_content3").addClass('skeleton');
            $("#pos_cat_content").addClass('skeleton');
            $("#search_off").addClass('skeleton');
            $("#pos_cat_content4").addClass('skeleton');
            $("#pos_cat_content5").addClass('skeleton');
            $("#pos_cat_content6").addClass('skeleton');
            $("#post_category_data_table").addClass('skeleton');
            $("#pos_cat_content7").addClass('skeleton');
            $("#pos_cat_content8").addClass('skeleton');
            $(".cats_res").addClass('skeleton');
            $("#post_category_data_table_paginate").addClass('skeleton');

            time = setTimeout(() => {
                $("#pos_cat_content").removeClass('skeleton');
                $("#pos_cat_content2").removeClass('skeleton');
                $("#pos_cat_content3").removeClass('skeleton');
                $("#pos_cat_content").removeClass('skeleton');
                $("#search_off").removeClass('skeleton');
                $("#pos_cat_content4").removeClass('skeleton');
                $("#pos_cat_content5").removeClass('skeleton');
                $("#pos_cat_content6").removeClass('skeleton');
                $("#post_category_data_table").removeClass('skeleton');
                $("#pos_cat_content7").removeClass('skeleton');
                $("#pos_cat_content8").removeClass('skeleton');
                $(".cats_res").removeClass('skeleton');
                $("#post_category_data_table_paginate").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
        fetch_post_category_data();
        // Post Category Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Post Category Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" key="${key}" id="poscat_tab">
                        <td class="sn border_ord" id="poscat_tab2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="poscat_tab3">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split setting ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown" disabled>
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div></div>'>
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="border_ord ps-1" id="poscat_tab4">${row.post_title}</td>
                        <td class="txt_ ps-1" id="poscat_tab5">${row.category_name}</td>
                        <td class="txt_ ps-1" id="poscat_tab6">${row.sub_category_name}</td>
                        <td class="tot_pending_ ps-1" id="poscat_tab7">${row.created_by ==0 ? 'User': 'Superadmin' && row.created_by ==2 ? 'SubAdmin': 'User' && row.created_by ==1 ? 'SuperAdmin': 'User' && row.created_by ==3 ? 'Admin': 'User'}</td>
                        <td class="tot_complete_ right-pill pe-2 ${row.status? ' bg-danger': ' bg-primary'}" id="poscat_tab8"><span class="text-light ps-1 pe-1">${row.status ? 'Unauthorize': 'Authorize'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                        <td class="tot_complete_ ps-1 center" id="poscat_tab9">
                            <input class="form-switch form-check-input check_permission" type="checkbox" post_category_id="${row.id}" value="${row.status}" ${row.status? " checked": ''} disabled>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Post Category Data ------------------
        function fetch_post_category_data(query = '', url = null, perItem = null) {

            if(perItem === null){
                perItem = $("#perItemControl2").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search_category_post.action')}}?per_item=${perItem}`;
            }else{
                current_url += `&per_item=${perItem}`
            }

            $.ajax({
                type: "GET",
                url: current_url,
                dataType: 'json',
                data: {
                    query: query
                },
                success: function({
                    data,
                    links,
                    total

                }) {
                    $("#post_category_data_table").html(table_rows([...data]));
                    $("#post_category_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_post_category_records").text(total);
                }

            });
        }
        // peritem change
        $("#perItemControl2").on('change', (e) => {
            const {value} = e.target;

            fetch_post_category_data( '',  null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_post_category_data(query);

        });

        // Search Loader 
        $(document).on('keyup', '.category-all-search', function(){

            var time = null;
            $("#post_category_data_table").addClass('skeleton');
            $("#poscat_tab").addClass('skeleton');
            $("#poscat_tab2").addClass('skeleton');
            $("#poscat_tab3").addClass('skeleton');
            $("#poscat_tab4").addClass('skeleton');
            $("#poscat_tab5").addClass('skeleton');
            $("#poscat_tab6").addClass('skeleton');
            $("#poscat_tab7").addClass('skeleton');
            $("#poscat_tab8").addClass('skeleton');
            $("#poscat_tab9").addClass('skeleton');
            
            time = setTimeout(() => {
                $("#post_category_data_table").removeClass('skeleton');
                $("#poscat_tab").removeClass('skeleton');
                $("#poscat_tab2").removeClass('skeleton');
                $("#poscat_tab3").removeClass('skeleton');
                $("#poscat_tab4").removeClass('skeleton');
                $("#poscat_tab5").removeClass('skeleton');
                $("#poscat_tab6").removeClass('skeleton');
                $("#poscat_tab7").removeClass('skeleton');
                $("#poscat_tab8").removeClass('skeleton');
                $("#poscat_tab9").removeClass('skeleton');
            }, 1000);

            return ()=>{
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
        $("#post_category_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_post_category_data('', url);
            }

        });

        // Delete Post Category
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var brand_id = $(this).val();
            $('#delete_post_category_id').val(brand_id);
            $('#deletepostcategory').modal('show');

            var time = null;
            $("#postcatDelt").addClass('skeleton');
            $("#postcatDelt2").addClass('skeleton');
            $("#postcatDelt3").addClass('skeleton');
            $("#postcatDelt4").addClass('skeleton');
            $("#postcatDelt5").addClass('skeleton');
            $("#delete_post_category_id").addClass('skeleton');
            $("#deleteLoader").addClass('skeleton');

            time = setTimeout(() => {
                $("#postcatDelt").removeClass('skeleton');
                $("#postcatDelt2").removeClass('skeleton');
                $("#postcatDelt3").removeClass('skeleton');
                $("#postcatDelt4").removeClass('skeleton');
                $("#postcatDelt5").removeClass('skeleton');
                $("#delete_post_category_id").removeClass('skeleton');
                $("#deleteLoader").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.delet_btn_postCategory', function(e) {
            e.preventDefault();
            var post_category_id = $('#delete_post_category_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/super-admin/delete-post-category/" + post_category_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletepostcategory').modal('hide');

                    fetch_post_category_data();
                }

            });
        });

        // Psot Category Update-Status ------------------
        $("#post_category_data_table").delegate(".check_permission", "click", function(e) {

            const current_url = "{{route('post_category_status.action')}}";

            const pagination_url = $("#post_category_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('post_category_id'),
                    status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_post_category_data('', pagination_url);
                }
            });
        });

        $(document).load('click', function(){
            $("#loader_userdelete").addClass('loader_chart');
        });
    });
</script>