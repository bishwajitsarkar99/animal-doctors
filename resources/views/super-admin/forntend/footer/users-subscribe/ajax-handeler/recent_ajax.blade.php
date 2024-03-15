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
        fetch_newsletter_data();
        // News Letter Data View Table--------------
        const table_rows = (rows) => {
            if (rows.length === 0) {
                return `
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="11">
                            News Letter Data Not Exists On Server !
                        </td>
                    </tr>
                `;
            }

            return [...rows].map((row, key) => {
                return `
                    <tr class="table-row user-table-row" key="${key}" id="poscat_tab">
                        <td class="in border_ord" id="poscat_tab2">${row.id}</td>
                        <td class="txt_ ps-1 center" id="poscat_tab3">
                            <input class="btn btn-info dropdown-toggle dropdown-toggle-split setting ef_brnd pb-1" type="checkbox" id="flexSwitchCheckDefault" data-bs-toggle="dropdown">
                            <ul class="dropdown-menu action ms-4 pe-3">
                                <li class="upd cgy ps-1">
                                    <button class="btn-sm edit_registration view_btn cgr_btn ms-4" id="deleteBtn" value="${row.id}" style="font-size: 10px;" type="button">
                                    <i class="fa-solid fa-trash-can fa-beat" style="color:orangered"></i></button>
                                </li>
                            </ul>
                        </td>
                        <td class="border_ord ps-1" id="poscat_tab4">${row.email}</td>
                    </tr>
                `;
            }).join("\n");
        }

        // Fetch News Letter Data ------------------
        function fetch_newsletter_data(query = '', url = null, perItem = null) {

            if(perItem === null){
                perItem = $("#perItemControl2").val();
            }

            var current_url = url;
            if (url === null) {
                current_url = `{{ route('forntend_footer_get_newsletter.action')}}?per_item=${perItem}`;
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
                    $("#newsletter_data_table").html(table_rows([...data]));
                    $("#newsletter_data_table_paginate").html(paginate_html({
                        links,
                        total
                    }));
                    $("#total_news_letter_records").text(total);
                }

            });
        }
        // peritem change
        $("#perItemControl2").on('change', (e) => {
            const {value} = e.target;

            fetch_newsletter_data( '',  null, value);
        });
        // Live-Search-----------------------------
        $(document).on('keyup', '#search', function() {
            var query = $(this).val();
            fetch_newsletter_data(query);

        });

        // Search Loader 
        $(document).on('keyup', '.newsletters-all-search', function(){

            var time = null;
            $("#newsletter_data_table").addClass('skeleton');
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
                $("#newsletter_data_table").removeClass('skeleton');
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
        $("#newsletter_data_table_paginate").delegate("a", "click", function(e) {
            e.stopImmediatePropagation();
            e.preventDefault();

            const url = $(this).attr('href');

            if (url !== '#') {
                fetch_newsletter_data('', url);
            }

        });

        // Delete Post Category
        $(document).on('click', '#deleteBtn', function(e) {
            e.preventDefault();
            var brand_id = $(this).val();
            $('#delete_post_category_id').val(brand_id);
            $('#deletemainpost').modal('show');

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
            var news_letter_id = $('#delete_post_category_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/super-admin/forntend-footer-newletter/" + news_letter_id,
                success: function(response) {
                    $('#success_message').addClass('alert_show ps-1 pe-1');
                    $('#success_message').fadeIn();
                    $('#success_message').text(response.messages);
                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                    $('#deletemainpost').modal('hide');

                    fetch_newsletter_data();
                }

            });
        });

        $(document).load('click', function(){
            $("#loader_userdelete").addClass('loader_chart');
        });
    });
</script>
