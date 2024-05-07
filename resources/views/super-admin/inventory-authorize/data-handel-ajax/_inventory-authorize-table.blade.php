<script>
    $(document).ready(function () {
        $('#data_search').on('click', function () {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            $.ajax({
                url: '{{ route("search-inventory.action") }}',
                type: 'GET',
                data: { start_date: startDate, end_date: endDate },
                success: function (response) {
                    var results = response.results;
                    $('#inventory_authorize_data_table').html(JSON.stringify(results));
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
        $("#show_jst").hide();
        $("#show_deny").show();
        $('#permissionChecking').on('click', function() {
            $("#show_jst").toggle();
            $("#show_deny").toggle();
            if ($(this).val() === "1") {
                $(this).val("0");
            } else {
                $(this).val("1");
            }
        });


        // Inventory Permission
        $(document).on('click', '#data_permission', function(e) {
            e.preventDefault();
            var data = {
                'role_id': $('#select_role').val(),
                'user_id': $('#select_user').val(),
                'permission': $('#permissionChecking').prop('checked') ? 1 : 0,
                'start_date': $('#start_get_date').val(),
                'end_date': $('#end_get_date').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('action.inventory-permission')}}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#savForm_error').html("");
                            $('#savForm_error').addClass('alert_show_errors');
                            $('#savForm_error').append('<span class="error_val">' + err_value + '</span>');
                            $('#savForm_error').fadeIn();
                            setTimeout(() => {
                                $('#savForm_error').fadeOut();
                            }, 2500);
                        });
                    } else {
                        $('#savForm_error').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('#select_role').val(""),
                        $('#select_user').val(""),
                        $('#permissionChecking').val(""),
                        $('#start_get_date').val(""),
                        $('#end_get_date').val(""),
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                    }

                }
            });
        });
    });
</script>