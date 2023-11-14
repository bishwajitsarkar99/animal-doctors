<script>
    $(document).ready(function() {
        $("#postAdd").show();
        $("#postUpdate").hide();

        $("#show_medicine_form").on('click', () => {
            $("#medicine_post_form").modal('show');
        });
        // Cancel Button-----
        $("#cancel_btn").on('click', () => {
            $("#postAdd").toggle('slow');
            $("#postUpdate").toggle('slow');
        });
        
        // Sub-category data fetch for depenable dropdown-------
        $("#category").on('change', function(){
            let id = $(this).val();
            $("#subCategory").empty();
            $("#subCategory").append('<option value="0" disabled><span class="text_focus">Processing.......</span></option>');
            
            if (id) {
                $.ajax({
                    type: "GET",
                    url: "/request-data/" + id,
                    success: function(data) {
                        $("#subCategory").empty();
                        $("#subCategory").append('<option value="0" disabled><span class="text_focus">Processing.......</span></option>');
                        $.each(data, function(key, value) {
                            $("#subCategory").append("<option class='sub_name_text' value =" + value.id + ">" + value.sub_category_name +"</option>").fadeIn('slow');
                        });
                    }
                })
            } else {
                alert('danger');
            }
        });

        // Medicine Name data fetch for depenable dropdown-------
        $("#group").on('change', function(){
            let id = $(this).val();
            $("#medicine_name").empty();
            $("#medicine_name").append('<option value="0" disabled>Processing.......</option>');
            
            if (id) {
                $.ajax({
                    type: "GET",
                    url: "/request-medicine-name/" + id,
                    success: function(data) {
                        $("#medicine_name").empty();
                        $("#medicine_name").append('<option value="0" disabled>Processing.......</option>');
                        $.each(data, function(key, value) {
                            $("#medicine_name").append("<option class='sub_name_text' value =" + value.id + ">" + value.medicine_name + "</option>").fadeIn('slow');
                        });
                    }
                })
            } else {
                alert('danger');
            }
        });

        // Medicine Dogs data fetch for depenable dropdown-------
        $("#medicine_name").on('change', function(){
            let id = $(this).val();
            $("#medicine_dogs").empty();
            $("#medicine_dogs").append('<option value="0" disabled>Processing.......</option>');
            
            if (id) {
                $.ajax({
                    type: "GET",
                    url: "/request-medicine-dogs/" + id,
                    success: function(data) {
                        $("#medicine_dogs").empty();
                        $("#medicine_dogs").append('<option value="0" disabled>Processing.......</option>');
                        $.each(data, function(key, value) {
                            $("#medicine_dogs").append("<option class='sub_name_text' value =" + value.id + ">" + value.medicine_dogs + "</option>").fadeIn('slow');
                        });
                    }
                })
            } else {
                alert('danger');
            }
        });

    });
</script>