import { setRAM, getRAM } from "/module/backend-module/component-module/module-session-storeRAM.js";

// ========================= Menu-Card Component Resize ===============================

export function initPanelResize(panel, panelId) {
    if (!panel || !panelId) return;

    const resizers = {
        left: panel.querySelector('.panel-width-resizer.left-resizer'),
        right: panel.querySelector('.panel-width-resizer.right-resizer'),
        top: panel.querySelector('.panel-height-resizer.top-resizer'),
        bottom: panel.querySelector('.panel-height-resizer.bottom-resizer')
    };

    const svgRect = panel.querySelector('.connectorPath');
    panel.style.position = 'absolute'; // Required for left/top manipulation

    // Animate Border
    function animateBorder() {
        const rect = panel.getBoundingClientRect();
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
            const startWidth = panel.offsetWidth;
            const startHeight = panel.offsetHeight;
            const startLeft = panel.offsetLeft;
            const startTop = panel.offsetTop;

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
                    panel.style.width = `${startWidth + dx}px`;
                } else if (direction === 'left') {
                    panel.style.width = `${startWidth - dx}px`;
                    panel.style.left = `${startLeft + dx}px`;
                } else if (direction === 'bottom') {
                    panel.style.height = `${startHeight + dy}px`;
                } else if (direction === 'top') {
                    panel.style.height = `${startHeight - dy}px`;
                    panel.style.top = `${startTop + dy}px`;
                }

                animateBorder();
            }

            function onMouseUp() {
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
                document.body.style.cursor = '';
                stopBorderAnimation();

                setRAM(panelId, 'Width', panel.offsetWidth);
                setRAM(panelId, 'Height', panel.offsetHeight);
                setRAM(panelId, 'Left', panel.offsetLeft);
                setRAM(panelId, 'Top', panel.offsetTop);
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
    const savedWidth = getRAM(panelId, 'Width');
    const savedHeight = getRAM(panelId, 'Height');
    const savedLeft = getRAM(panelId, 'Left');
    const savedTop = getRAM(panelId, 'Top');

    if (savedWidth) panel.style.width = `${savedWidth}px`;
    if (savedHeight) panel.style.height = `${savedHeight}px`;
    if (savedLeft) panel.style.left = `${savedLeft}px`;
    if (savedTop) panel.style.top = `${savedTop}px`;

    // Ensure border updates on resize
    if (svgRect) {
        const updateConnector = () => {
            const { offsetWidth: w, offsetHeight: h } = panel;
            svgRect.setAttribute('width', w);
            svgRect.setAttribute('height', h);
        };
        new ResizeObserver(updateConnector).observe(panel);
    }
}

// ========================= Init All Menu Cards on Page ==============================
export function initAllPanelResizers(...selectors) {
    selectors.forEach(selector => {
        document.querySelectorAll(selector).forEach((panel, index) => {
            let panelId = panel.id || `${selector.replace('.', '')}-${index}`;
            const parent = panel.closest('.parent');
            if (parent && panel.classList.contains('child')) {
                const parentId = parent.id || 'unknown';
                panelId = `${parentId}-childPanel-${index}`;
            }
            initPanelResize(panel, panelId);
        });
    });
}