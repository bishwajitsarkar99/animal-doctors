// Function to animate number counter
function formatCurrency(number) {
    return number.toLocaleString('en-US');
}

function animateNumberCounter(element, endValue, interval = 3000) {
    let startValue = 0;
    let duration = Math.floor(interval / endValue);

    if (duration < 1) {
        duration = 1;
    }

    let counter = setInterval(function() {
        startValue += 1;
        element.text(startValue);

        if (startValue >= endValue) {
            clearInterval(counter);
        }
    }, duration);
}

