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
// Array Store RAM Path
export function getRAM(DataTable, key = null) {
    const fullData = JSON.parse(localStorage.getItem(getUserRAMKey()) || '{}');
    const tableData = fullData[DataTable] || {};
    return key ? tableData[key] : tableData;
}
// Array Store Table Data
export function setRAM(DataTable, key, value) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(localStorage.getItem(storageKey) || '{}');
    fullData[DataTable] = fullData[DataTable] || {};
    fullData[DataTable][key] = value;
    localStorage.setItem(storageKey, JSON.stringify(fullData));
}
// Remove Array Table Data
export function removeRAM(DataTable) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(localStorage.getItem(storageKey) || '{}');
    delete fullData[DataTable];
    localStorage.setItem(storageKey, JSON.stringify(fullData));
}

// ========================= Menu-Card Component Resize =================================


// export function initMenuCardResize(DataTable) {
//     const card = document.getElementById(DataTable);
//     if (!card) return;

//     const widthResizer = card.querySelector('.card-width-resizer');
//     const heightResizer = card.querySelector('.card-height-resizer');
//     const svgRect = card.querySelector('.connectorPath');

//     // ========== Animate Border ==========
//     function animateBorder() {
//         const cardRect = card.getBoundingClientRect();
//         svgRect.setAttribute("width", cardRect.width);
//         svgRect.setAttribute("height", cardRect.height);
//         svgRect.setAttribute("x", 0);
//         svgRect.setAttribute("y", 0);
//         svgRect.setAttribute("rx", 3);
//         svgRect.setAttribute("ry", 3);
//         svgRect.style.display = 'block';
//         svgRect.style.stroke = "dodgerblue";
//         svgRect.style.strokeWidth = '3';
//         svgRect.style.strokeDasharray = "5,5";
//         svgRect.style.animation = "none";
//         // Restart animation
//         void svgRect.offsetWidth; // Trick to force reflow
//         svgRect.style.animation = "dashmove 1s linear infinite";
//     }

//     // ========== Stop Animation ==========
//     function stopBorderAnimation() {
//         svgRect.style.animation = "none";
//         svgRect.style.stroke = "transparent";
//         svgRect.style.display = 'none';
//     }

//     // ========== Width Resize ==========
//     widthResizer.addEventListener('mousedown', function (e) {
//         let startX = e.pageX;
//         let startWidth = card.offsetWidth;

//         document.body.style.cursor = 'ew-resize';
//         card.classList.add('card-width-resizing');
//         animateBorder();

//         function colMouseMove(ev) {
//             const newWidth = startWidth + (ev.pageX - startX);
//             card.style.width = newWidth + 'px';
//             animateBorder();
//         }

//         function stopColResize() {
//             card.classList.remove('card-width-resizing');
//             document.body.style.cursor = '';
//             stopBorderAnimation();

//             const finalWidth = card.offsetWidth;
//             setRAM(DataTable, 'dropDownMenuCardWidth', finalWidth);

//             document.removeEventListener('mousemove', colMouseMove);
//             document.removeEventListener('mouseup', stopColResize);
//         }

//         document.addEventListener('mousemove', colMouseMove);
//         document.addEventListener('mouseup', stopColResize);
//     });

//     // ========== Height Resize ==========
//     heightResizer.addEventListener('mousedown', function (e) {
//         let startY = e.pageY;
//         let startHeight = card.offsetHeight;

//         document.body.style.cursor = 'ns-resize';
//         card.classList.add('card-height-resizing');
//         animateBorder();

//         function rowMouseMove(ev) {
//             const newHeight = startHeight + (ev.pageY - startY);
//             card.style.height = newHeight + 'px';
//             animateBorder();
//         }

//         function stopRowResize() {
//             card.classList.remove('card-height-resizing');
//             document.body.style.cursor = '';
//             stopBorderAnimation();

//             const finalHeight = card.offsetHeight;
//             setRAM(DataTable, 'dropDownMenuCardHeight', finalHeight);

//             document.removeEventListener('mousemove', rowMouseMove);
//             document.removeEventListener('mouseup', stopRowResize);
//         }

//         document.addEventListener('mousemove', rowMouseMove);
//         document.addEventListener('mouseup', stopRowResize);
//     });

//     // ========== Load Saved Dimensions ==========
//     const savedWidth = getRAM(DataTable, 'dropDownMenuCardWidth');
//     const savedHeight = getRAM(DataTable, 'dropDownMenuCardHeight');

//     if (savedWidth) card.style.width = savedWidth + 'px';
//     if (savedHeight) card.style.height = savedHeight + 'px';
// }
// const dropDownMenuCardHeaderWidth = getRAM(DataTable, 'dropDownMenuCardHeaderWidth') || {};
// const dropDownMenuCardHeaderHeight = getRAM(DataTable, 'dropDownMenuCardHeaderHeight') || {};

// const dropDownMenuCardBodyWidth = getRAM(DataTable, 'dropDownMenuCardBodyWidth') || {};
// const dropDownMenuCardBodyHeight = getRAM(DataTable, 'dropDownMenuCardBodyHeight') || {};

// const dropDownMenuCardFooterWidth = getRAM(DataTable, 'dropDownMenuCardFooterWidth') || {};
// const dropDownMenuCardFooterHeight = getRAM(DataTable, 'dropDownMenuCardFooterHeight') || {};

// const dropDownMenuLineWidth = getRAM(DataTable, 'dropDownMenuLineWidth') || {};
// const dropDownMenuLineHeight = getRAM(DataTable, 'dropDownMenuLineHeight') || {};

// const dropDownMenuButtonWidth = getRAM(DataTable, 'dropDownMenuButtonWidth') || {};
// const dropDownMenuButtonHeight = getRAM(DataTable, 'dropDownMenuButtonHeight') || {};

// const dropDownMenuInputWidth = getRAM(DataTable, 'dropDownMenuInputWidth') || {};
// const dropDownMenuInputHeight = getRAM(DataTable, 'dropDownMenuInputHeight') || {};


// ========================= Menu-Card Component Resize ===============================
// ===================================================================================
export function initMenuCardResize(card, DataTable) {
    if (!card) return;

    const widthResizer = card.querySelector('.card-width-resizer');
    const heightResizer = card.querySelector('.card-height-resizer');
    const svgRect = card.querySelector('.connectorPath');

    if (!widthResizer || !heightResizer) return;

    // ===== Animate Border =====
    function animateBorder() {
        const cardRect = card.getBoundingClientRect();
        if (!svgRect) return;
        svgRect.setAttribute("width", cardRect.width);
        svgRect.setAttribute("height", cardRect.height);
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

    // ===== Stop Border Animation =====
    function stopBorderAnimation() {
        if (!svgRect) return;
        svgRect.style.animation = "none";
        svgRect.style.stroke = "transparent";
        svgRect.style.display = 'none';
    }

    // ===== Width Resize Logic =====
    widthResizer.addEventListener('mousedown', function (e) {
        let startX = e.pageX;
        let startWidth = card.offsetWidth;

        document.body.style.cursor = 'ew-resize';
        card.classList.add('card-width-resizing');
        animateBorder();

        function colMouseMove(ev) {
            const newWidth = startWidth + (ev.pageX - startX);
            card.style.width = newWidth + 'px';
            animateBorder();
        }

        function stopColResize() {
            card.classList.remove('card-width-resizing');
            document.body.style.cursor = '';
            stopBorderAnimation();
            const finalWidth = card.offsetWidth;
            setRAM(DataTable, 'dropDownMenuCardWidth', finalWidth);
            document.removeEventListener('mousemove', colMouseMove);
            document.removeEventListener('mouseup', stopColResize);
        }

        document.addEventListener('mousemove', colMouseMove);
        document.addEventListener('mouseup', stopColResize);
    });

    // ===== Height Resize Logic =====
    heightResizer.addEventListener('mousedown', function (e) {
        let startY = e.pageY;
        let startHeight = card.offsetHeight;

        document.body.style.cursor = 'ns-resize';
        card.classList.add('card-height-resizing');
        animateBorder();

        function rowMouseMove(ev) {
            const newHeight = startHeight + (ev.pageY - startY);
            card.style.height = newHeight + 'px';
            animateBorder();
        }

        function stopRowResize() {
            card.classList.remove('card-height-resizing');
            document.body.style.cursor = '';
            stopBorderAnimation();
            const finalHeight = card.offsetHeight;
            setRAM(DataTable, 'dropDownMenuCardHeight', finalHeight);
            document.removeEventListener('mousemove', rowMouseMove);
            document.removeEventListener('mouseup', stopRowResize);
        }

        document.addEventListener('mousemove', rowMouseMove);
        document.addEventListener('mouseup', stopRowResize);
    });

    // ===== Load Saved Dimensions =====
    const savedWidth = getRAM(DataTable, 'dropDownMenuCardWidth');
    const savedHeight = getRAM(DataTable, 'dropDownMenuCardHeight');

    if (savedWidth) card.style.width = savedWidth + 'px';
    if (savedHeight) card.style.height = savedHeight + 'px';
}

// ========================= Init All Menu Cards on Page ==============================
// ===================================================================================
export function initAllMenuCardResizers(menuCard) {
    document.querySelectorAll(menuCard).forEach(card => {
        const DataTable = card.id;
        if (DataTable) {
            initMenuCardResize(card, DataTable);
        }
    });
}