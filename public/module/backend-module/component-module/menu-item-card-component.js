// ========== Global RAM Storage System ==============================================
// ===================================================================================
function getUserRAMKey() {
    const role = document.querySelector('meta[name="user-role"]')?.content || 'guest';
    const branch_id = document.querySelector('meta[name="branch-id"]')?.content || 'identifyer';
    const email = document.querySelector('meta[name="user-email"]')?.content || 'unknown';
    const safeEmail = email.replace(/[^a-zA-Z0-9]/g, '_');
    const moduleName = 'BackendModule';
    return `ApplicationRAM_${moduleName}_${branch_id}_${role}_${safeEmail}`;
}
// Get RAM value
export function getRAM(DataTable, key = null) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(localStorage.getItem(storageKey) || '{}');
    const appSetting = fullData.AppSetting || {};
    const tableData = appSetting[DataTable] || {};
    return key ? tableData[key] : tableData;
}
// Set RAM value
export function setRAM(DataTable, key, value) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(localStorage.getItem(storageKey) || '{}');
    fullData.AppSetting = fullData.AppSetting || {};
    fullData.AppSetting[DataTable] = fullData.AppSetting[DataTable] || {};
    fullData.AppSetting[DataTable][key] = value;
    localStorage.setItem(storageKey, JSON.stringify(fullData));
}
// Remove specific table from RAM
export function removeRAM(DataTable) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(localStorage.getItem(storageKey) || '{}');
    if (fullData.AppSetting && fullData.AppSetting[DataTable]) {
        delete fullData.AppSetting[DataTable];
    }
    localStorage.setItem(storageKey, JSON.stringify(fullData));
}
// Remove AppSetting Data From RAM
export function clearAllRAM() {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(localStorage.getItem(storageKey) || '{}');
    delete fullData.AppSetting;
    localStorage.setItem(storageKey, JSON.stringify(fullData));
}

// ========================= Menu-Card Component Resize ===============================

export function initMenuCardResize(card, cardId) {
    if (!card || !cardId) return;

    const widthResizer = card.querySelector('.card-width-resizer');
    const heightResizer = card.querySelector('.card-height-resizer');
    const svgRect = card.querySelector('.connectorPath');

    if (!widthResizer || !heightResizer) return;

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

    // Width Resize
    widthResizer.addEventListener('mousedown', function (e) {
        e.preventDefault();
        const startX = e.pageX;
        const startWidth = card.offsetWidth;

        animateBorder();
        document.body.style.cursor = 'ew-resize';

        function onMouseMove(ev) {
            const newWidth = startWidth + (ev.pageX - startX);
            card.style.width = `${newWidth}px`;
            animateBorder();
        }

        function onMouseUp() {
            document.removeEventListener('mousemove', onMouseMove);
            document.removeEventListener('mouseup', onMouseUp);
            document.body.style.cursor = '';
            stopBorderAnimation();

            const finalWidth = card.offsetWidth;
            setRAM(cardId, 'Width', finalWidth);
        }

        document.addEventListener('mousemove', onMouseMove);
        document.addEventListener('mouseup', onMouseUp);
    });

    // Height Resize
    heightResizer.addEventListener('mousedown', function (e) {
        e.preventDefault();
        const startY = e.pageY;
        const startHeight = card.offsetHeight;

        animateBorder();
        document.body.style.cursor = 'ns-resize';

        function onMouseMove(ev) {
            const newHeight = startHeight + (ev.pageY - startY);
            card.style.height = `${newHeight}px`;
            animateBorder();
        }

        function onMouseUp() {
            document.removeEventListener('mousemove', onMouseMove);
            document.removeEventListener('mouseup', onMouseUp);
            document.body.style.cursor = '';
            stopBorderAnimation();

            const finalHeight = card.offsetHeight;
            setRAM(cardId, 'Height', finalHeight);
        }

        document.addEventListener('mousemove', onMouseMove);
        document.addEventListener('mouseup', onMouseUp);
    });

    // Load Previous Values
    const savedWidth = getRAM(cardId, 'Width');
    const savedHeight = getRAM(cardId, 'Height');
    if (savedWidth) card.style.width = `${savedWidth}px`;
    if (savedHeight) card.style.height = `${savedHeight}px`;

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
}