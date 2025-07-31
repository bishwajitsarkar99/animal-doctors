import { setRAM, getRAM } from "/module/backend-module/component-module/module-session-storeRAM.js";

// ========================= OffCanvas Left Resize Only ===============================
export function initOffCanvasResize(panel, panelId) {
    if (!panel || !panelId) return;

    const leftResizer = panel.querySelector('.panel-width-resizer.left-resizer');
    const svgRect = panel.querySelector('.connectorPath');
    panel.style.position = 'absolute';

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

    function setupLeftResizer(resizer) {
        if (!resizer) return;

        resizer.addEventListener('mousedown', function (e) {
            e.preventDefault();

            const startX = e.pageX;
            const startWidth = panel.offsetWidth;
            const startLeft = panel.offsetLeft;

            animateBorder();
            document.body.style.cursor = 'ew-resize';

            function onMouseMove(ev) {
                const dx = ev.pageX - startX;
                panel.style.width = `${startWidth - dx}px`;
                panel.style.left = `${startLeft + dx}px`;
                animateBorder();
            }

            function onMouseUp() {
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
                document.body.style.cursor = '';
                stopBorderAnimation();
                setRAM(panelId, 'Left', panel.offsetLeft);
            }

            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        });
    }

    setupLeftResizer(leftResizer);

    const savedLeft = getRAM(panelId, 'Left');
    if (savedLeft !== undefined) panel.style.left = `${savedLeft}px`;

    if (svgRect) {
        const updateConnector = () => {
            svgRect.setAttribute('width', panel.offsetWidth);
        };
        new ResizeObserver(updateConnector).observe(panel);
    }
}

// ========================= Init All Targeted OffCanvas Panels ===============================
export function initAllOffcanvasResizers(...selectors) {
    selectors.forEach(selector => {
        document.querySelectorAll(selector).forEach((panel, index) => {
            let panelId = panel.id || `${selector.replace('.', '')}-${index}`;
            initOffCanvasResize(panel, panelId);
        });
    });
}