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