// Helper function to handle dynamic success message
export function handleSuccessMessage(selector, duration = 3000, fadeOutDuration = 4000, delayDuration= 4000) {
    var successMessage = $(selector).text().trim();
    
    if (successMessage) {
        $(selector).fadeIn(duration).delay(delayDuration).fadeOut(fadeOutDuration);

        return () => {
            clearTimeout(timeout);
        };
    }
}
// Button Loader Helper Function ---------
export function buttonLoader(buttonSelector, loaderIconSelector, buttonTextSelector, loadingText = '', defaultText = '', timeoutDuration = '') {

    $(buttonSelector).on('click', () => {
        $(loaderIconSelector).removeAttr('hidden');
        $(buttonTextSelector).text(loadingText);

        var timeout = setTimeout(() => {
            $(loaderIconSelector).attr('hidden', true);
            $(buttonTextSelector).text(defaultText);
        }, timeoutDuration);

        return () => {
            clearTimeout(timeout);
        };
    });
}
// Image Upload Button loader ---------
export function imageUploadBtnLoader(imageUploadBtn){
    var imageUploadBtn = $("#uploadButton");
    $(imageUploadBtn).on('click', () =>{
        $('.img-upload-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.upload-btn-text').text('Upload...');
        var timeout = null;
        timeout = setTimeout(() =>{
            $('.img-upload-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.upload-btn-text').text('Upload');
        }, 2200);

        return () => {
            clearTimeout(timeout);
        };
    });
}
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
// tooltip helper function
export function toolTip() {
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
}
// input validation
export function handleInputValidation(inputSelector, errorSelector, successClass, errorClass, currentBorderClass, successMessageSelector, fadeInDuration = 200, fadeOutDuration = 200) {
    // On page load, check if there's an error message and adjust the border styles accordingly
    var errorMessage = $(errorSelector).text().trim();
    $(errorSelector).attr("data-error", errorMessage);

    if (errorMessage !== '') {
        $(inputSelector).removeClass(currentBorderClass).addClass(errorClass);
    } else {
        var inputVal = $(inputSelector).val().trim();
        if (inputVal !== '') {
            $(inputSelector).removeClass(currentBorderClass).addClass(successClass);
            $(successMessageSelector).removeClass('hidden').fadeIn(fadeInDuration).delay(fadeInDuration);
        } else {
            $(inputSelector).addClass(currentBorderClass).removeClass(errorClass);
        }
    }

    // Handle input changes dynamically
    $(document).on('keyup', inputSelector, function() {
        var inputVal = $(this).val();
        $(errorSelector).text('');
        $(inputSelector).removeClass('show-error-border');

        if (inputVal !== '') {
            $(this).removeClass(currentBorderClass).addClass(successClass).removeClass(errorClass);
            $(successMessageSelector).removeClass('hidden').fadeIn(fadeInDuration).delay(fadeInDuration);
        } else {
            $(this).addClass(currentBorderClass).removeClass(successClass);
            $(successMessageSelector).addClass('hidden').fadeOut(fadeOutDuration).delay(fadeOutDuration);
        }
    });
}
// Input and Select validation function
export function handleInputOrSelectValidation(inputSelector, errorSelector, successClass, errorClass, currentBorderClass, successMessageSelector, fadeInDuration = 200, fadeOutDuration = 200) {
    // On page load, check if there's an error message and adjust the border styles accordingly
    var errorMessage = $(errorSelector).text().trim();
    $(errorSelector).attr("data-error", errorMessage);

    if (errorMessage !== '') {
        $(inputSelector).removeClass(currentBorderClass).addClass(errorClass);
    } else {
        var inputVal = $(inputSelector).val().trim();
        if (inputVal !== '' && inputVal !== null) {
            $(inputSelector).removeClass(currentBorderClass).addClass(successClass);
            $(successMessageSelector).removeClass('hidden').fadeIn(fadeInDuration).delay(fadeInDuration);
        } else {
            $(inputSelector).addClass(currentBorderClass).removeClass(errorClass);
        }
    }
    // Handle input/select changes dynamically
    $(document).on('change keyup', inputSelector, function() {
        var inputVal = $(this).val().trim();
        $(errorSelector).text(''); // Clear error message on valid input
        $(inputSelector).removeClass('show-error-border');

        if (inputVal !== '' && inputVal !== null) {
            $(this).removeClass(currentBorderClass).addClass(successClass).removeClass(errorClass);
            $(successMessageSelector).removeClass('hidden').fadeIn(fadeInDuration).delay(fadeInDuration);
        } else {
            $(this).addClass(currentBorderClass).removeClass(successClass);
            $(successMessageSelector).addClass('hidden').fadeOut(fadeOutDuration).delay(fadeOutDuration);
        }
    });
}
// General function to remove any skeleton class
export function removeSkeletonClass(skeletonClasses) {
    skeletonClasses.forEach(className => {
        const allSkeleton = document.querySelectorAll(`.${className}`);
        allSkeleton.forEach(item => {
            item.classList.remove(className);
        });
    });
}
// General function to add any attribute or class
export function addAttributeOrClass(items) {
    items.forEach(({ selector, type, name, value }) => {
        const elements = document.querySelectorAll(selector);

        elements.forEach(item => {
            if (type === 'attribute') {
                item.setAttribute(name, value);
            } else if (type === 'class') {
                item.classList.add(name);
            }
        });
    });
}
// General function to remove any attribute or class
export function removeAttributeOrClass(items) {
    items.forEach(({ selector, type, name }) => {
        const elements = document.querySelectorAll(selector);

        elements.forEach(item => {
            if (type === 'attribute') {
                item.removeAttribute(name);
            } else if (type === 'class') {
                item.classList.remove(name);
            }
        });
    });
}