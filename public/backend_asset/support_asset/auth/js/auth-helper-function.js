// Login Button Loader ---------
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
// name field icon show ---------
export function nameFieldIon(nameFieldIcon){
    var nameFieldIcon = $(".filed_src");
    $(nameFieldIcon).on('keyup', () =>{
        $('.search-icon').removeClass('search-hidden');
        $(this).attr('disabled', true);
        var timeout = null;
        timeout = setTimeout(() =>{
            $('.search-icon').addClass('search-hidden');
            $(this).attr('disabled', false);  
        },3000);

        return () => {
            clearTimeout(timeout);
        };
    });
}
// contract field icon show ---------
export function contractFieldIcon(contractFieldIcon){
    var contractFieldIcon = $(".contract");
    $(contractFieldIcon).on('keyup', () =>{
        $('.contract-icon').removeClass('contract-hidden');
        $(this).attr('disabled', true);
        var timeout = null;
        timeout = setTimeout(() =>{
            $('.contract-icon').addClass('contract-hidden');
            $(this).attr('disabled', false);  
        },3000);

        return () => {
            clearTimeout(timeout);
        };
    });
}
// email field icon show ---------
export function emailFieldIcon(emailFieldIcon){
    var emailFieldIcon = $(".reg_email");
    $(emailFieldIcon).on('keyup', () =>{
        $('.email-icon').removeClass('email-hidden');
        $(this).attr('disabled', true);
        var timeout = null;
        timeout = setTimeout(() =>{
            $('.email-icon').addClass('email-hidden');
            $(this).attr('disabled', false);  
        },3000);

        return () => {
            clearTimeout(timeout);
        };
    });
}
// password field icon show ---------
export function passwordFieldIcon(passwordFieldIcon){
    var passwordFieldIcon = $(".password");
    $(passwordFieldIcon).on('keyup', () =>{
        $('.password-icon').removeClass('password-hidden');
        $(this).attr('disabled', true);
        var timeout = null;
        timeout = setTimeout(() =>{
            $('.password-icon').addClass('password-hidden');
            $(this).attr('disabled', false);  
        },3000);

        return () => {
            clearTimeout(timeout);
        };
    });
}
// confirm password field icon show ---------
export function confirmPasswordFieldIcon(confirmPasswordFieldIcon){
    var confirmPasswordFieldIcon = $(".confirm");
    $(confirmPasswordFieldIcon).on('keyup', () =>{
        $('.confrim-password-icon').removeClass('confrim-password-hidden');
        $(this).attr('disabled', true);
        var timeout = null;
        timeout = setTimeout(() =>{
            $('.confrim-password-icon').addClass('confrim-password-hidden');
            $(this).attr('disabled', false);  
        },3000);

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
// Page loader helper function
export function pageLoader() {
    window.addEventListener('load', function() {
        const loader = document.querySelector(".loader-login");
        const loaderModalElement = document.getElementById('loaderModalForm');
        
        if (loader && loaderModalElement) {
            const loaderModal = new bootstrap.Modal(loaderModalElement);
    
            loaderModal.show();
            loader.classList.add("log_close");
            var timeout = null;
            timeout = setTimeout(function() {
                loaderModal.hide();
            }, 1000);

            return () => {
                clearTimeout(timeout);
            };
        }
    });
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
// Disable Right-Click Context Menu
export function browserInpect() {
    document.addEventListener("DOMContentLoaded", function() {
        // Disable right-click context menu
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        });
    
        // Disable specific keyboard shortcuts
        document.onkeydown = function(e) {
            if (e.keyCode == 123) { // F12 key
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode === 'I'.charCodeAt(0)) { // Ctrl+Shift+I
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode === 'J'.charCodeAt(0)) { // Ctrl+Shift+J
                return false;
            }
            if (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0)) { // Ctrl+U
                return false;
            }
        };
    });
}
// Helper function to handle the image preview in the form
export function loadFile(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
// Function to handle image upload with progress bar simulation
export function handleImageUpload(buttonID) {
    $(document).on('click', buttonID, function() {
        var bar = document.querySelector('.bar');
        var percent = document.querySelector('.percent');
        var simulatedProgress = 0;

        var uploadInterval = setInterval(function() {
            simulatedProgress += 10;

            if (simulatedProgress <= 100) {
                bar.style.width = simulatedProgress + '%';
                percent.innerHTML = simulatedProgress + '%';
            } else {
                clearInterval(uploadInterval);
                $(".register_img").removeClass('img-hidden');
            }
        }, 200);
    });
}
// side bar canvas skeletone
export function rightSideBar(buttonSelector, modalSelector, loaderSelector, elementsWithSkeleton, timeoutDuration = 2000) {
    $(document).on('click', buttonSelector, function(e) {
        e.preventDefault();
        
        $(modalSelector).modal('show');
        $(loaderSelector).removeAttr('hidden');

        elementsWithSkeleton.forEach(selector => {
            $(selector).addClass('auth-skeleton');
        });

        setTimeout(() => {
            $(modalSelector).modal('hide');
            $(loaderSelector).attr('hidden', true);

            elementsWithSkeleton.forEach(selector => {
                $(selector).removeClass('auth-skeleton');
            });
        }, timeoutDuration);
    });
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
// General function to remove any skeleton class
export function removeSkeletonClass(skeletonClasses) {
    skeletonClasses.forEach(className => {
        const allSkeleton = document.querySelectorAll(`.${className}`);
        
        allSkeleton.forEach(item => {
            item.classList.remove(className);
        });
    });
}



