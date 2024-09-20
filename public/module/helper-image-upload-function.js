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
// Function to handle the image upload progress bar simulation
export function handleImageUpload() {
    var imageValue = $("#imgInput").val();
    var bar = document.querySelector('.bar');
    var percent = document.querySelector('.percent');
    var simulatedProgress = parseInt(percent.innerHTML);

    // Check if progress is already 100% and show a message
    if (simulatedProgress === 100) {
        $("#uploadMess").html('<span class="upload-mesg">Select an image to upload.</span>');
        return; // Exit to prevent further actions
    }

    if (imageValue !== '') {
        // Check if progress bar is already in progress to avoid multiple intervals
        if ($('.bar').width() !== 0 && simulatedProgress < 100) {
            return; // Prevent starting a new progress simulation if one is already running
        }

        var simulatedProgress = 0; // Reset simulated progress to start from 0

        // Simulate progress bar
        var uploadInterval = setInterval(function () {
            simulatedProgress += 10;

            if (simulatedProgress <= 100) {
                bar.style.width = simulatedProgress + '%';
                percent.innerHTML = simulatedProgress + '%';
            } else {
                clearInterval(uploadInterval);
                $(".register_img").removeClass('img-hidden');
            }
        }, 200);

    } else {
        // Handle case when no image is selected
        $("#uploadMess").html('<span class="upload-mesg">Please select an image to upload.</span>'); // Show error message

        // Reset progress bar if no image is selected
        $('.bar').css('width', '0%');
        $('.percent').text('0%');
    }
}
