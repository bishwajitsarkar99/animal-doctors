<script>
    $(document).ready(function() {
        fetch_main_post_data();
        // Main Post Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            Post Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" key="${key}" id="post_tab">
                        <td class="sn border_ord" id="post_tab2">${row.id}</td>
                        <td class="sn border_ord" id="post_tab3">${row.category_id}</td>
                        <td class="txt_ ps-1 center" id="post_tab4">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split ef_brnd mainPs pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown" disabled>
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtnPost" value="${row.id}" style="font-size: 10px;" type="button">
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="border_ord ps-1" id="post_tab5">${row.post_title}</td>
                        <td class="txt_ ps-1" id="post_tab6">${row.category_name}</td>
                        <td class="txt_ ps-1" id="post_tab7">${row.sub_category_name}</td>
                        <td class="tot_pending_ ps-1" id="post_tab8">${row.created_by ==0 ? 'User': 'Superadmin' && row.created_by ==2 ? 'SubAdmin': 'User' && row.created_by ==1 ? 'SuperAdmin': 'User' && row.created_by ==3 ? 'Admin': 'User'}</td>
                        <td class="tot_complete_ right-pill pe-2 ${row.navbar_status? ' bg-danger': ' bg-primary'}" id="post_tab9"><span class="text-light ps-1 pe-1">${row.navbar_status ? 'Unauthorize': 'Authorize'}</span>
                            <span class="fbox"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                        </td>
                        <td class="tot_complete_ ps-1 center" id="post_tab10">
                            <input class="form-switch form-check-input post_check_permission" type="checkbox" main_post_id="${row.id}" value="${row.navbar_status}" ${row.navbar_status? " checked": ''} disabled>
                        </td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch Main Post Data ------------------
        function fetch_main_post_data(query = '', url = null, perItem = null ) {

            if(perItem === null){
                perItem = $("#perItemControl").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('search_main_post.action')}}?per_item=${perItem}`;
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
                    $("#main_post_data_table").html(table_rows([...data]));
                    $("#main_post_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_main_post_records").text(total);
                }

            });
        }
        // peritem change
        $("#perItemControl").on('change', (e) => {
            const {value} = e.target;

            fetch_main_post_data( '',  null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#post_search', function() {
            var query = $(this).val();
            fetch_main_post_data(query);

        });

        // Search contnet loader
        $(document).on('keyup', '.searchform', function(){

            var time = null;
            $("#main_post_data_table").addClass('skeleton');
            $("#post_tab").addClass('skeleton');
            $("#post_tab2").addClass('skeleton');
            $("#post_tab3").addClass('skeleton');
            $("#post_tab4").addClass('skeleton');
            $("#post_tab5").addClass('skeleton');
            $("#post_tab6").addClass('skeleton');
            $("#post_tab7").addClass('skeleton');
            $("#post_tab8").addClass('skeleton');
            $("#post_tab9").addClass('skeleton');
            $("#post_tab10").addClass('skeleton');

            time = setTimeout(() => {
                $("#main_post_data_table").removeClass('skeleton');
                $("#post_tab").removeClass('skeleton');
                $("#post_tab2").removeClass('skeleton');
                $("#post_tab3").removeClass('skeleton');
                $("#post_tab4").removeClass('skeleton');
                $("#post_tab5").removeClass('skeleton');
                $("#post_tab6").removeClass('skeleton');
                $("#post_tab7").removeClass('skeleton');
                $("#post_tab8").removeClass('skeleton');
                $("#post_tab9").removeClass('skeleton');
                $("#post_tab10").removeClass('skeleton');
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
        $("#main_post_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_main_post_data('', url);
            }

        });

        // Delete Main Post
        $(document).on('click', '#deleteBtnPost', function(e) {
            e.preventDefault();
            var brand_id = $(this).val();
            $('#delete_main_post_id').val(brand_id);
            $('#deletemainpost').modal('show');

            var time = null;
            $("#postDelt").addClass('skeleton');
            $("#postDelt2").addClass('skeleton');
            $("#postDelt3").addClass('skeleton');
            $("#postDelt4").addClass('skeleton');
            $("#delete_main_post_id").addClass('skeleton');
            $(".delet_btn_postCategory").addClass('skeleton');

            time = setTimeout(() => {
                $("#postDelt").removeClass('skeleton');
                $("#postDelt2").removeClass('skeleton');
                $("#postDelt3").removeClass('skeleton');
                $("#postDelt4").removeClass('skeleton');
                $("#delete_main_post_id").removeClass('skeleton');
                $(".delet_btn_postCategory").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }

        });

        $(document).on('click', '.delet_btn_postCategory', function(e) {
            e.preventDefault();
            var post_category_id = $('#delete_main_post_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/super-admin/delete-main-post/" + post_category_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletemainpost').modal('hide');

                    fetch_main_post_data();
                }

            });
        });

        // Main Post Update-Status ------------------
        $("#main_post_data_table").delegate(".post_check_permission", "click", function(e) {

            const current_url = "{{route('main_post_status.action')}}";

            const pagination_url = $("#main_post_data_table_paginate .active").attr('href');

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
                    id: $(this).attr('main_post_id'),
                    navbar_status: $(this).val(),
                },
                success: function({
                    messages
                }) {
                    console.log('messages', messages);
                    $("#success_message").text(messages.messages);
                    fetch_main_post_data('', pagination_url);
                }
            });
        });

        $(document).load('click', function(){
            $("#loader_postdelete").addClass('loader_chart');
        });
    });
</script>
<script>
    // switch on/off----- users table search
    function myPostSrcFunction() {
        var x = document.getElementById("post_search_off");
        if (x.innerHTML === "OFF") {
            x.innerHTML = "ON";
        } else {
            x.innerHTML = "OFF";
        }
    }
    $(document).ready(function(){
        $("#post_search").hide();
        $(document).on('click', "#post_search_area", function(){
            $("#post_search").toggle('slide');
            $("#post_search").focus();
        });
        // Table header Action Mode
        $(document).on('click', '#post_locker_mode', function() {

            if ($("#post_locker_mode:checked").length > 0) {
                $(".post_check_permission").removeAttr('disabled');
                $(".mainPs").removeAttr('disabled');

            } else {
                $(".post_check_permission").attr('disabled', true);
                $(".mainPs").attr('disabled', true);
            }

            $('#post_locker').toggle().removeClass('post_checking_lock');
            $(this).attr('disabled', true);

            setTimeout(() => {
                $('#post_locker').toggle().addClass('post_checking_lock');
                $(this).attr('disabled', false);
            }, 1000);
        });
        // post search field loader
        $("#post_search").on('keyup',()=> {
            $('.post-search-icon').removeClass('post-search-hidden');
            $(this).attr('disabled',true);

            setTimeout(() => {
                $('.post-search-icon').addClass('post-search-hidden');
                $(this).attr('disabled',false);
            }, 3000);
        });

        // post table content loader
        $(document).on('click', '.post_cat', function(){

            var time = null;
            $("#post_locker_table").addClass('skeleton');
            $("#post_locker_table2").addClass('skeleton');
            $("#post_search_off").addClass('skeleton');
            $("#post_locker_table3").addClass('skeleton');
            $("#post_locker_table4").addClass('skeleton');
            $("#post_locker_table5").addClass('skeleton');
            $("#post_locker_table6").addClass('skeleton');
            $("#post_locker_table7").addClass('skeleton');
            $("#post_locker_table8").addClass('skeleton');
            $("#post_locker_table9").addClass('skeleton');
            $("#post_locker_table10").addClass('skeleton');
            $("#post_locker_table11").addClass('skeleton');
            $("#post_locker_table12").addClass('skeleton');
            $("#post_locker_table13").addClass('skeleton');
            $("#post_locker_table14").addClass('skeleton');
            $("#post_locker_table15").addClass('skeleton');
            $("#post_locker_table16").addClass('skeleton');
            $("#main_post_data_table").addClass('skeleton');
            $(".post_res").addClass('skeleton');
            $("#main_post_data_table_paginate").addClass('skeleton');
            time = setTimeout(() => {
                $("#post_locker_table").removeClass('skeleton');
                $("#post_locker_table2").removeClass('skeleton');
                $("#post_search_off").removeClass('skeleton');
                $("#post_locker_table3").removeClass('skeleton');
                $("#post_locker_table4").removeClass('skeleton');
                $("#post_locker_table5").removeClass('skeleton');
                $("#post_locker_table6").removeClass('skeleton');
                $("#post_locker_table7").removeClass('skeleton');
                $("#post_locker_table8").removeClass('skeleton');
                $("#post_locker_table9").removeClass('skeleton');
                $("#post_locker_table10").removeClass('skeleton');
                $("#post_locker_table11").removeClass('skeleton');
                $("#post_locker_table12").removeClass('skeleton');
                $("#post_locker_table13").removeClass('skeleton');
                $("#post_locker_table14").removeClass('skeleton');
                $("#post_locker_table15").removeClass('skeleton');
                $("#post_locker_table16").removeClass('skeleton');
                $("#main_post_data_table").removeClass('skeleton');
                $(".post_res").removeClass('skeleton');
                $("#main_post_data_table_paginate").removeClass('skeleton');
            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });
    });
</script>