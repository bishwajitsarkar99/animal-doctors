<script type="module">
    import { buttonLoader, addAttributeOrClass, removeAttributeOrClass } from "/module/module-min-js/design-helper-function-min.js";

    buttonLoader();

    $(document).ready(function(){
        // Button Loader
        buttonLoader('#mailSettingUpdate', '.loading-icon-setting', '.email-setting-btn-text', 'Update...', 'Update', 1000);

        // Setting Data Fetch
        fetch_mail_setting_data();
        function fetch_mail_setting_data(){

            $.ajax({
                type: "GET",
                url: "{{ route('email.setting') }}",
                dataType: 'json',
                success: function(response) {
                    const mailSettings = response.mail_settings;
                    
                    if (mailSettings) {
                        $("#emailSettingID").val(mailSettings.id);
                        $("#emailTransport").val(mailSettings.mail_transport);
                        $("#emailHost").val(mailSettings.mail_host);
                        $("#emailPort").val(mailSettings.mail_port);
                        $("#emailUserName").val(mailSettings.mail_username);
                        $("#emailPassword").val(mailSettings.mail_password);
                        $("#emailEncryption").val(mailSettings.mail_encryption);
                        $("#fromEmail").val(mailSettings.mail_from);
                    }
                },
                error: function(error) {
                    console.log('Error fetching data:', error);
                }
            });
        }

        // Setting Update
        $(document).on('click', '#mailSettingUpdate', function(e){
            e.preventDefault();

            // Input Field Validation
            $('.error-message').remove();

            var mailTransport = $("#emailTransport").val();
            var mailHost = $("#emailHost").val();
            var mailPort = $("#emailPort").val();
            var mailUsername = $("#emailUserName").val();
            var mailPassword = $("#emailPassword").val();
            var mailEncryption = $("#emailEncryption").val();
            var mailFrom = $("#fromEmail").val();

            if (!mailTransport) {
                $("#emailTransport").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Required Mail Transport.</span>');
            }
            if (!mailHost) {
                $("#emailHost").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Required Mail Host.</span>');
            }
            if (!mailPort) {
                $("#emailPort").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Required Mail Port.</span>');
            }
            if (!mailUsername) {
                $("#emailUserName").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Required User Name.</span>');
            }
            if (!mailPassword) {
                $("#emailPassword").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Required Password.</span>');
            }
            if (!mailEncryption) {
                $("#emailEncryption").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Required Mail Encryption.</span>');
            }
            if (!mailFrom) {
                $("#fromEmail").closest('.role_nme').append('<span class="error-message alert_show_errors ps-2">Required From Mail.</span>');
            }

            if ($('.error-message').length > 0) {
                // If there are error messages, stop further execution
                return;
            }

            var id = $("#emailSettingID").val();
            var data = {
                'mail_transport': mailTransport,
                'mail_host': mailHost,
                'mail_port': mailPort,
                'mail_username': mailUsername,
                'mail_password': mailPassword,
                'mail_encryption': mailEncryption,
                'mail_from': mailFrom,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/email-setting/update/" + id,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').addClass('alert_show_errors skeleton ps-1 pe-1');
                            $('#updateForm_errorList').append('<span id="error_mess">' + err_value + '</span>');
                            $("#updateForm_errorList").fadeIn();

                            var time = null;
                            time = setTimeout(() => {
                                $("#updateForm_errorList").removeClass('skeleton');
                                $("#updateForm_errorList").fadeOut(9000);
                            }, 1000);
                            return ()=>{
                                clearTimeout(time);
                            }
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#mail_setting_success_messages').addClass('permission_alert_show ps-1 pe-1');
                        $('#mail_setting_success_messages').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#mail_setting_success_messages').html("");
                        $('#mail_setting_success_messages').addClass('permission_alert_show ps-1 pe-1');
                        $('#mail_setting_success_messages').fadeIn();
                        $('#mail_setting_success_messages').text(response.messages);
                        $("#mail_setting_success_messages").addClass('background_success_sm');
                        setTimeout(() => {
                            $('#mail_setting_success_messages').fadeOut(3000);
                        }, 3000);
                        fetch_mail_setting_data();
                    }
                }
            });
            
        });
    });
</script>