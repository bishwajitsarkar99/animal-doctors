// Helper function image upload form
export function imageUpload(event) {
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image_view');
            if (output) {
                output.src = reader.result;
            }
        };
        
        // Ensure a file is selected
        if (event.target.files && event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    };
    loadFile(event); // Call loadFile with the event parameter
}