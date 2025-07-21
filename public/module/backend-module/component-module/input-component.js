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