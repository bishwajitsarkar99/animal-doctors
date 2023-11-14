<script type="text/javascript">
    $(document).ready(function(){
        // Update Doctor Account Fetch-Data-------------------------
        fetchUsers();
        
        function fetchUsers(url = "/get-users"){
            $.ajax({
                type: "GET",
                url: url,
                dataType:"json",
                success: function(response){
                    $('#myUserTable').html("");
                    $.each(response.data, function(key, item){
                        $('#myUserTable').append(
                            '<tr class="table-row">\
                                <td class="tot_order_ doctors_sl">\
                                    <a type="button" class="edit_doctors_btn ms-3" href="'+item.id+'">'+((key++)+1)+'</a>\
                                </td>\
                                <td class="tot_order_ doctors_sl ">\
                                    <img class="user_img rounded-circle user_imgs ms-3" src="/image/'+item.image+'">\
                                </td>\
                                <td class="txt_ doctors_sl ps-1">Dr. '+item.name+'</td>\
                                <td class="tot_pending_ doctors_sl style="border-right: 1px solid lightblue;" ps-1">'+item.contract_number+'</td>\
                            </tr>'
                        );
                    });
                }
            });
        }

        // Edit Doctor Account -------------------------
        $(document).on('click', '.edit_doctors_btn', function(e) {
            e.preventDefault();
            var edit_doctors_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "/edit-users/"+ edit_doctors_id,
                success: function(response) {
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.messages);
                    }
                    else{
                        $('#edit_doctors_id').val(edit_doctors_id);
                        $('.edit_doctors_name').val(response.messages.name);
                        $('.edit_doctors_contract_number').val(response.messages.contract_number);
                        $('#imgInput').val(response.messages.image);
                    }
                }

            });
        });
    });

</script>
