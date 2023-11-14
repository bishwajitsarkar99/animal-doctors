(function($){
    //Medicine-Post
    var loadFile=function(e){
        var a=new FileReader;a.onload=function(){
            document.getElementById("image_view").src=a.result
        },a.readAsDataURL(e.target.files[0])
    };
})
(jQuery);
