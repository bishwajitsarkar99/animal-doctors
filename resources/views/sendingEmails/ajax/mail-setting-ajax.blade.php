<script>
    $(document).ready(function(){
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
    });
</script>