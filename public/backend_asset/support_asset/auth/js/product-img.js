// Image Upload in form
var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
    var image_view = document.getElementById('image_view');
    image_view.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};