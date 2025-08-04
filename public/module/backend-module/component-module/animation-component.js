// Cricle Number Plate and animation
export function cricleNumberPlate(numberClass, cricleBar, percentage){
    document.querySelectorAll(numberClass).forEach(el => {
        const target = +el.getAttribute('data-target') || 0;
        const parentLoader = el.closest(cricleBar);
        if (parentLoader) {
            parentLoader.style.setProperty(percentage, target);
        }

        let count = 0;
        const increment = target / 50;
        const updateCount = () => {
            count += increment;
            if (count < target) {
                el.innerText = Math.floor(count);
                if (parentLoader) {
                    parentLoader.style.setProperty(percentage, count);
                }
                requestAnimationFrame(updateCount);
            } else {
                el.innerText = target;
                if (parentLoader) {
                    parentLoader.style.setProperty(percentage, target);
                }
            }
        };
        updateCount();
    });
}
// Aniamte Number
const animatedElements = new WeakMap();
function animateNumber(el, target, duration = 2000) {
    const start = performance.now();
    function step(currentTime) {
        const elapsed = currentTime - start;
        const progress = Math.min(elapsed / duration, 1);
        const current = Math.floor(progress * target);
        el.textContent = current.toLocaleString();
        if (progress < 1) {
            requestAnimationFrame(step);
        }
    }
    requestAnimationFrame(step);
}
function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    const viewHeight = window.innerHeight || document.documentElement.clientHeight;
    const inView = rect.top < viewHeight && rect.bottom > 0;
    return inView;
}
// Trigger 
export function triggerIfInView(numberSelector, containerSelector) {
    const allNumberElements = document.querySelectorAll(numberSelector);
    allNumberElements.forEach(numEl => {
        const container = numEl.closest(containerSelector);
        if (!container) return;

        const isVisible = isInViewport(container);
        const isAnimated = animatedElements.has(container);

        if (isVisible && !isAnimated) {
            const target = parseFloat(numEl.dataset.target || '0');
            animateNumber(numEl, target);
            animatedElements.set(container, true);
        } else if (!isVisible && isAnimated) {
            animatedElements.delete(container);
        }
    });
}
// Number Rolling animate with scrol animate
export function numberRolling(numberSelector, containerSelector) {
    // Just set up the scroll/resize listeners here
    window.addEventListener('resize', () => triggerIfInView(numberSelector, containerSelector));
    document.addEventListener('fullscreenchange', () => triggerIfInView(numberSelector, containerSelector));
    let scrollTimeout;
    window.addEventListener('scroll', () => {
        if (!scrollTimeout) {
            scrollTimeout = setTimeout(() => {
                triggerIfInView(numberSelector, containerSelector);
                scrollTimeout = null;
            }, 100); // Adjust delay as needed
        }
    });
}
// Scroll Progress Bar animation
export function initScrollProgressBar(scrollKey, progressClass) {
    const $element = $(scrollKey);

    if ($element.length === 0) return;

    $(window).on('scroll', function () {
        const scroll = $(window).scrollTop();
        const offsetTop = $element.offset().top - window.innerHeight;

        if (scroll > offsetTop && !$element.hasClass(progressClass)) {
            $element.addClass(progressClass);
            setTimeout(() => {
                $element.removeClass(progressClass);
            }, 1500);
        }
    });
}

// Table Number Animation
/**
 * Animate a number inside an HTML element
 * @param {HTMLElement} element - DOM element to update
 * @param {number} target - Final number to animate to
 * @param {number} duration - Animation duration in ms (default: 2000)
 * @param {number} decimals - Number of decimal places (default: 0)
 */
export function numberAnimation(element, target, duration = 2000, decimals = 0) {
    const startTime = performance.now();
    const startValue = 0;

    function step(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const currentValue = startValue + (target - startValue) * progress;

        // Format with commas and decimals
        element.textContent = currentValue.toLocaleString(undefined, {
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals
        });

        if (progress < 1) {
            requestAnimationFrame(step);
        }
    }

    requestAnimationFrame(step);
}