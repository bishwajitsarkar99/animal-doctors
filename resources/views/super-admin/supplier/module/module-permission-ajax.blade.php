<script>
    // Update Supplier Setting
    $(document).ready(function() {
        // Update
        $(document).on('click', '#supplierModule', function(e) {
            e.preventDefault();
            var company_id = $('#company_id').val();
            var data = {
                'supplier_title': $('#labelID').val(),
                'supplier_title_visual': $('#urlDisplayID').val(),
                'supplier_setup_link': $('#urlID').val(),
                'supplier_setup_display': $('#urlmouleDisplayID').val(),
            }

            //<----Ajax Form Header Setup for csrf token----------->
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/super-admin/supplier-module-permission/",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#success_message').html("");
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.messages);
                        $('#success_message').addClass('alert_show ps-1 pe-1');
                        $('#success_message').fadeIn();
                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                    }
                }
            });

        });
        // Update Button Loader
        $(document).on('click', '.module_btn', function() {
            $(".module-icon").removeClass('module-hidden'); 
            setTimeout(() => {
                $(".module-icon").addClass('module-hidden'); 
            }, 1000);
        });
        // Module Checking Checkbox
        $(document).on('click', '#moduleURLChecking', function() {

            if ($("#moduleURLChecking:checked").length > 0) {
                $("#urlID").removeAttr('disabled');
            } else {
                $("#urlID").attr('disabled', true);
            }
        });
        $(document).on('click', '#moduleNameChecking', function() {

            if ($("#moduleNameChecking:checked").length > 0) {
                $("#labelID").removeAttr('disabled');
            } else {
                $("#labelID").attr('disabled', true);
            }
        });
    });
</script>