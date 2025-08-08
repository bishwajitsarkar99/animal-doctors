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

    // Apply saved or default values
    panel.style.width = savedWidth ? `${savedWidth}px` : '100%';
    panel.style.height = savedHeight ? `${savedHeight}px` : 'auto';
    if (savedLeft !== undefined) panel.style.left = `${savedLeft}px`;
    if (savedTop !== undefined) panel.style.top = `${savedTop}px`;
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
            const parent = panel.closest('');
            if (parent && panel.classList.contains('')) {
                const parentId = parent.id || 'unknown';
                panelId = `${parentId}-childPanel-${index}`;
            }
            initPanelResize(panel, panelId);
        });
    });
}

// ========================= Menu-Card Component Resize (Bottom Only) ===============================
export function initTableBoxResize(panel, panelId) {
    if (!panel || !panelId) return;

    const bottomResizer = panel.querySelector('.panel-height-resizer.bottom-resizer');
    const svgRect = panel.querySelector('.connectorPath');
    panel.style.position = 'relative'; // Required for top manipulation

    // Animate Border
    function animateBorder() {
        if (!svgRect) return;
        const rect = panel.getBoundingClientRect();
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

    // Setup only bottom resizer
    if (bottomResizer) {
        bottomResizer.addEventListener('mousedown', function (e) {
            e.preventDefault();

            const startY = e.pageY;
            const startHeight = panel.offsetHeight;
            const startTop = panel.offsetTop;

            document.body.style.cursor = 'ns-resize';
            animateBorder();

            function onMouseMove(ev) {
                const dy = ev.pageY - startY;
                panel.style.height = `${startHeight + dy}px`;
                animateBorder();
            }

            function onMouseUp() {
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
                document.body.style.cursor = '';
                stopBorderAnimation();

                setRAM(panelId, 'Height', panel.offsetHeight);
                setRAM(panelId, 'Top', panel.offsetTop);
            }

            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        });
    }

    // Restore Previous Size and Position
    const savedHeight = getRAM(panelId, 'Height');
    const savedTop = getRAM(panelId, 'Top');

    panel.style.height = savedHeight ? `${savedHeight}px` : 'auto';
    if (savedTop !== undefined) panel.style.top = `${savedTop}px`;

    // Observe for updates (for connectorPath animation)
    if (svgRect) {
        const updateConnector = () => {
            svgRect.setAttribute('width', panel.offsetWidth);
            svgRect.setAttribute('height', panel.offsetHeight);
        };
        new ResizeObserver(updateConnector).observe(panel);
    }
}

// ========================= Init Bottom Resizable Panels ==============================
export function initTableBoxResizers(...selectors) {
    selectors.forEach(selector => {
        document.querySelectorAll(selector).forEach((panel, index) => {
            const panelId = panel.id || `${selector.replace('.', '')}-${index}`;
            initTableBoxResize(panel, panelId);
        });
    });
}

// =============== Initialize Draggable Panel Movement =======================
export function initPanelMove(tabHeaderId, tabPanelContentId) {

    function makeDraggable(wrapperId) {
        const wrapper = document.getElementById(wrapperId);
        if (!wrapper) return;

        let offsetX = 0, offsetY = 0, isDragging = false;

        // Restore saved position
        const rawData = getRAM(wrapperId);
        try {
            const savedPosition = typeof rawData === 'string' ? JSON.parse(rawData) : rawData;
            if (savedPosition?.left && savedPosition?.top) {
                wrapper.style.position = 'absolute';
                wrapper.style.left = savedPosition.left;
                wrapper.style.top = savedPosition.top;
            }
        } catch (err) {
            console.warn('Invalid position data for:', wrapperId, err);
        }

        wrapper.addEventListener("mousedown", (e) => {
            isDragging = true;
            offsetX = e.clientX - wrapper.offsetLeft;
            offsetY = e.clientY - wrapper.offsetTop;

            wrapper.style.zIndex = 1;

            // ✅ Fix width & height to prevent resizing on drag
            wrapper.style.width = wrapper.offsetWidth + "px";
            wrapper.style.height = wrapper.offsetHeight + "px";
            wrapper.style.maxWidth = wrapper.offsetWidth + "px";
            wrapper.style.maxHeight = wrapper.offsetHeight + "px";
        });

        document.addEventListener("mousemove", (e) => {
            if (!isDragging) return;

            const left = e.clientX - offsetX;
            const top = e.clientY - offsetY;

            wrapper.style.position = 'absolute';
            wrapper.style.left = left + "px";
            wrapper.style.top = top + "px";

            setRAM(wrapperId, JSON.stringify({ left: wrapper.style.left, top: wrapper.style.top }));

            if (typeof drawConnection === 'function') {
                drawConnection();
            }
        });

        document.addEventListener("mouseup", () => {
            isDragging = false;
            wrapper.style.zIndex = 0;
        });
    }

    // Apply to both header and content
    makeDraggable(tabHeaderId);
    makeDraggable(tabPanelContentId);
}