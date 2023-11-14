(function($){
    $(document).ready(()=> {
        //Filter
        $("#input1").on("keyup", ()=> {
            var value = $(this).val().toLowerCase();
            $("#user_data_table tr").filter(()=> {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        //refresh loader
        $("#btnRefresh").on('click', ()=>{
            $('.loading-icon').removeClass('hidden');
            $(this).attr('disabled', true);
            $('text-btn').text('Refresh...');

            setTimeout(() => {
                $('.loading-icon').addClass('hidden');
                $(this).attr('disabled', false);
                $('text-btn').text('Refresh');
            }, 3000);
        });
        // search-loader
        $("#btnFormSearch").on('click', ()=>{
            $('.search-loader').removeClass('search-hidden');
            $(this).attr('disabled', true);

            setTimeout(() => {
                $('.search-loader').addClass('search-hidden');
                $(this).attr('disabled', false);
            }, 3000);
        });
    });
    // tab-post
    $(document).ready(function(){
        $("#user_active").addClass('post-seeblue');
    }); 
})
(jQuery);
// Nav-bar Post =======
function opentabLink(evt, animName) {
    var i, x, tablinkpost;
    x = document.getElementsByClassName("med");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinkpost = document.getElementsByClassName("tablinkcreatepost");
    for (i = 0; i < x.length; i++) {
        tablinkpost[i].className = tablinkpost[i].className.replace(" post-seeblue", "");
    }
    document.getElementById(animName).style.display = "block";
    evt.currentTarget.className += " post-seeblue";
}
