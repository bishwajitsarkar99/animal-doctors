import { setRAM, getRAM } from "/module/backend-module/component-module/table-component.js";

// ========================= Menu-Card Component Resize ===============================

export function initMenuCardResize(card, cardId) {
    if (!card || !cardId) return;

    const resizers = {
        left: card.querySelector('.card-width-resizer.left-resizer'),
        right: card.querySelector('.card-width-resizer.right-resizer'),
        top: card.querySelector('.card-height-resizer.top-resizer'),
        bottom: card.querySelector('.card-height-resizer.bottom-resizer')
    };

    const svgRect = card.querySelector('.connectorPath');
    card.style.position = 'absolute'; // Required for left/top manipulation

    // Animate Border
    function animateBorder() {
        const rect = card.getBoundingClientRect();
        if (!svgRect) return;
        svgRect.setAttribute("width", rect.width);
        svgRect.setAttribute("height", rect.height);
        svgRect.setAttribute("x", 0);
        svgRect.setAttribute("y", 0);
        svgRect.setAttribute("rx", 3);
        svgRect.setAttribute("ry", 3);
        svgRect.style.display = 'block';
        svgRect.style.stroke = "dodgerblue";
        svgRect.style.strokeWidth = '3';
        svgRect.style.strokeDasharray = "5,5";
        svgRect.style.animation = "none";
        void svgRect.offsetWidth;
        svgRect.style.animation = "dashmove 1s linear infinite";
    }

    function stopBorderAnimation() {
        if (!svgRect) return;
        svgRect.style.animation = "none";
        svgRect.style.stroke = "transparent";
        svgRect.style.display = 'none';
    }

    // ========== Directional Resizing ==========
    function setupResizer(resizer, direction) {
        if (!resizer) return;

        resizer.addEventListener('mousedown', function (e) {
            e.preventDefault();

            const startX = e.pageX;
            const startY = e.pageY;
            const startWidth = card.offsetWidth;
            const startHeight = card.offsetHeight;
            const startLeft = card.offsetLeft;
            const startTop = card.offsetTop;

            animateBorder();

            switch (direction) {
                case 'left':
                    document.body.style.cursor = 'ew-resize';
                    break;
                case 'right':
                    document.body.style.cursor = 'ew-resize';
                    break;
                case 'top':
                    document.body.style.cursor = 'ns-resize';
                    break;
                case 'bottom':
                    document.body.style.cursor = 'ns-resize';
                    break;
            }

            function onMouseMove(ev) {
                let dx = ev.pageX - startX;
                let dy = ev.pageY - startY;

                if (direction === 'right') {
                    card.style.width = `${startWidth + dx}px`;
                } else if (direction === 'left') {
                    card.style.width = `${startWidth - dx}px`;
                    card.style.left = `${startLeft + dx}px`;
                } else if (direction === 'bottom') {
                    card.style.height = `${startHeight + dy}px`;
                } else if (direction === 'top') {
                    card.style.height = `${startHeight - dy}px`;
                    card.style.top = `${startTop + dy}px`;
                }

                animateBorder();
            }

            function onMouseUp() {
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
                document.body.style.cursor = '';
                stopBorderAnimation();

                setRAM(cardId, 'Width', card.offsetWidth);
                setRAM(cardId, 'Height', card.offsetHeight);
                setRAM(cardId, 'Left', card.offsetLeft);
                setRAM(cardId, 'Top', card.offsetTop);
            }

            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        });
    }

    // Apply to all sides
    setupResizer(resizers.left, 'left');
    setupResizer(resizers.right, 'right');
    setupResizer(resizers.top, 'top');
    setupResizer(resizers.bottom, 'bottom');

    // Restore Previous Size and Position
    const savedWidth = getRAM(cardId, 'Width');
    const savedHeight = getRAM(cardId, 'Height');
    const savedLeft = getRAM(cardId, 'Left');
    const savedTop = getRAM(cardId, 'Top');

    if (savedWidth) card.style.width = `${savedWidth}px`;
    if (savedHeight) card.style.height = `${savedHeight}px`;
    if (savedLeft) card.style.left = `${savedLeft}px`;
    if (savedTop) card.style.top = `${savedTop}px`;

    // Ensure border updates on resize
    if (svgRect) {
        const updateConnector = () => {
            const { offsetWidth: w, offsetHeight: h } = card;
            svgRect.setAttribute('width', w);
            svgRect.setAttribute('height', h);
        };
        new ResizeObserver(updateConnector).observe(card);
    }
}

// ========================= Init All Menu Cards on Page ==============================
export function initAllMenuCardResizers(...selectors) {
    selectors.forEach(selector => {
        document.querySelectorAll(selector).forEach((card, index) => {
            let cardId = card.id || `${selector.replace('.', '')}-${index}`;
            const parent = card.closest('.menu-card');
            if (parent && card.classList.contains('submenu-card')) {
                const parentId = parent.id || 'unknown';
                cardId = `${parentId}-submenu-${index}`;
            }
            initMenuCardResize(card, cardId);
        });
    });
    ///disableResizeOnSmallScreens(card);
}


// function isTouchDevice() {
//     return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
// }

// function disableResizeOnSmallScreens(card) {
//     if (window.innerWidth < 1024 || isTouchDevice()) {
//         const resizers = card.querySelectorAll('.card-width-resizer, .card-height-resizer');
//         resizers.forEach(resizer => resizer.style.display = 'none');
//         card.classList.add('card-fixed-size'); // optional class to lock size
//     }
// }

// @media screen and (max-width: 1024px) {
//     .resizable-card {
//         width: 100% !important;
//         height: auto !important;
//     }

//     .card-width-resizer,
//     .card-height-resizer {
//         display: none;
//     }
// }
// .resizable-card {
//     min-width: 250px;
//     max-width: 100%;
//     min-height: 200px;
//     max-height: 90vh;
//     width: 100%;
// }

//  4. Optional: Use Resizable Only on Hover with Mouse
// Prevent accidental resizes on touch devices.

// function allowResizeOnlyWithMouse(card) {
//     const isMouse = matchMedia('(pointer: fine)').matches;
//     if (!isMouse) {
//         // hide resizer elements
//         card.querySelectorAll('.card-width-resizer, .card-height-resizer')
//             .forEach(resizer => resizer.style.display = 'none');
//     }
// }