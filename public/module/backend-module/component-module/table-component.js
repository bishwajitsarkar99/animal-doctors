// =================== Table Component ===============================================
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

// ========== Table Component Resize ==========
let isDraggingColumn = false;
let isResizingColumn = false;
let isResizingRow = false;

function isRowResizeActive() {
    return isResizingRow;
}

// ========== Rsize Table Head th and tbody tr width and height ==========
export function resize(DataTable, colClass, rowClass) {
    const table = document.getElementById(DataTable);
    if (!table) return;

    const columnWidths = getRAM(DataTable, 'columnWidths') || {};
    const rowHeights = getRAM(DataTable, 'rowHeights') || {};

    const headers = table.querySelectorAll('thead th');
    const theadRow = table.querySelector('thead tr');
    const bodyRows = table.querySelectorAll('tbody tr');

    headers.forEach((th, colIndex) => {
        const width = columnWidths[colIndex];
        if (width) {
            th.style.width = width + 'px';
            bodyRows.forEach(row => {
                const td = row.children[colIndex];
                if (td) td.style.width = width + 'px';
            });
        }
    });

    if (rowHeights['thead']) theadRow.style.height = rowHeights['thead'] + 'px';

    bodyRows.forEach((tr, rowIndex) => {
        const height = rowHeights[`tr_${rowIndex}`];
        if (height) tr.style.height = height + 'px';
    });

    table.addEventListener('mousedown', function (e) {
        const isColResize = e.target.classList.contains(colClass);
        const isRowResize = e.target.classList.contains(rowClass);
        if (!isColResize && !isRowResize) return;

        const cell = e.target.closest('th, td');
        if (!cell) return;

        const colIndex = Array.from(cell.parentNode.children).indexOf(cell);
        const rowElement = cell.closest('tr');
        const rowIndex = Array.from(table.querySelectorAll('tbody tr')).indexOf(rowElement);
        const isThead = rowElement.parentElement.tagName === 'THEAD';

        let startX = e.pageX;
        let startY = e.pageY;
        let startWidth = cell.offsetWidth;
        let startHeight = rowElement.offsetHeight;

        function save() {
            setRAM(DataTable, 'columnWidths', columnWidths);
            setRAM(DataTable, 'rowHeights', rowHeights);
        }

        if (isColResize && cell.tagName === 'TH') {
            if (isDraggingColumn) return;
            isResizingColumn = true;
            cell.classList.add('col-resizing');

            function colMouseMove(ev) {
                const newWidth = startWidth + (ev.pageX - startX);
                cell.style.width = newWidth + 'px';

                bodyRows.forEach(row => {
                    const td = row.children[colIndex];
                    if (td) {
                        td.style.width = newWidth + 'px';
                        td.classList.add('col-resizing');
                    }
                });

                columnWidths[colIndex] = newWidth;
                save();
            }

            function stopColResize() {
                cell.classList.remove('col-resizing');
                isResizingColumn = false;
                bodyRows.forEach(row => {
                    const td = row.children[colIndex];
                    if (td) td.classList.remove('col-resizing');
                });
                document.removeEventListener('mousemove', colMouseMove);
                document.removeEventListener('mouseup', stopColResize);
            }

            document.addEventListener('mousemove', colMouseMove);
            document.addEventListener('mouseup', stopColResize);
        }

        if (isRowResize) {
            isResizingRow = true;
            rowElement.classList.add('row-resizing');
            [...rowElement.children].forEach(cell => cell.classList.add('row-resizing'));

            function rowMouseMove(ev) {
                const newHeight = startHeight + (ev.pageY - startY);
                rowElement.style.height = newHeight + 'px';

                if (isThead) {
                    rowHeights['thead'] = newHeight;
                } else {
                    rowHeights[`tr_${rowIndex}`] = newHeight;
                }
                save();
            }

            function stopRowResize() {
                isResizingRow = false;
                rowElement.classList.remove('row-resizing');
                [...rowElement.children].forEach(cell => cell.classList.remove('row-resizing'));
                document.removeEventListener('mousemove', rowMouseMove);
                document.removeEventListener('mouseup', stopRowResize);
            }

            document.addEventListener('mousemove', rowMouseMove);
            document.addEventListener('mouseup', stopRowResize);
        }
    });
}

// ========== Restore Saved Row Heights After Data Fetching ==========
export function restoreRowHeights(DataTable) {
    const rowHeights = getRAM(DataTable, 'rowHeights') || {};
    const table = document.getElementById(DataTable);

    if (!table) return;

    const bodyRows = table.querySelectorAll('tbody tr');
    bodyRows.forEach((row, index) => {
        const height = rowHeights[`tr_${index}`];
        if (height) {
            row.style.height = `${height}px`;
        }
    });

    if (rowHeights['thead']) {
        const theadRow = table.querySelector('thead tr');
        if (theadRow) theadRow.style.height = `${rowHeights['thead']}px`;
    }
}

// ========== Table Column Drag and Drop ===============
export function enableColumnDragAndDrop(DataTable, iconClass) {
    const table = document.getElementById(DataTable);
    if (!table) return;

    const thead = table.querySelector('thead');
    const tbody = table.querySelector('tbody');

    const saved = getRAM(DataTable);
    const getHeaderIndex = el => [...el.parentNode.children].indexOf(el);

    function loadColumnOrder() {
        if (!saved.columnOrder) return;

        const headers = [...thead.rows[0].children];
        const headerMap = Object.fromEntries(headers.map((th, i) => [th.textContent.trim(), i]));

        const newOrder = saved.columnOrder.map(name => headers[headerMap[name]]).filter(Boolean);
        newOrder.forEach(th => thead.rows[0].appendChild(th));

        [...tbody.rows].forEach(row => {
            const cells = [...row.children];
            const newCells = saved.columnOrder.map(name => {
                const index = headerMap[name];
                return index !== undefined ? cells[index] : null;
            }).filter(Boolean);
            newCells.forEach(td => row.appendChild(td));
        });
    }

    function saveColumnOrder() {
        const order = [...thead.rows[0].children].map(th => th.textContent.trim());
        setRAM(DataTable, 'columnOrder', order);
    }

    function moveColumn(fromIndex, toIndex) {
        const rows = table.querySelectorAll('tr');
        rows.forEach(row => {
            const cells = [...row.children];
            if (fromIndex >= cells.length || toIndex >= cells.length) return;

            const cell = cells[fromIndex];
            const ref = cells[toIndex];
            if (fromIndex < toIndex) ref.after(cell);
            else ref.before(cell);
        });
        saveColumnOrder();
    }

    let dragSrcIndex = null;

    thead.querySelectorAll('th').forEach(th => {
        const moveIcon = th.querySelector(iconClass);
        if (!moveIcon) return;

        th.setAttribute('draggable', true);

        moveIcon.addEventListener('mousedown', e => {
            e.stopPropagation();
            dragSrcIndex = getHeaderIndex(th);
        });

        th.addEventListener('dragstart', e => {
            if (isResizingColumn || isRowResizeActive()) {
                e.preventDefault();
                return;
            }
            isDraggingColumn = true;
            e.dataTransfer.effectAllowed = 'move';
            dragSrcIndex = getHeaderIndex(th);
            th.classList.add('dragging');
        });

        th.addEventListener('dragover', e => e.preventDefault());

        th.addEventListener('drop', e => {
            e.preventDefault();
            const dropIndex = getHeaderIndex(th);
            if (dragSrcIndex !== null && dropIndex !== dragSrcIndex) {
                moveColumn(dragSrcIndex, dropIndex);
                dragSrcIndex = null;
            }
        });

        th.addEventListener('dragend', () => {
            isDraggingColumn = false;
            th.classList.remove('dragging');
        });
    });

    loadColumnOrder();
}
// ========== Table Column Drag and Drop Save ==========
export function applySavedColumnOrder(DataTable) {
    const savedOrder = getRAM(DataTable, 'columnOrder');
    if (!savedOrder) return;

    const table = document.getElementById(DataTable);
    const theadRow = table.querySelector("thead tr");
    const ths = Array.from(theadRow.children);

    const newThOrder = savedOrder.map(label =>
        ths.find(th => th.textContent.trim() === label)
    ).filter(Boolean);
    newThOrder.forEach(th => theadRow.appendChild(th));

    const tbodyRows = table.querySelectorAll("tbody tr");
    tbodyRows.forEach(row => {
        const tds = Array.from(row.children);
        const newTdOrder = savedOrder.map(label => {
            const index = ths.findIndex(th => th.textContent.trim() === label);
            return tds[index];
        }).filter(Boolean);
        newTdOrder.forEach(td => row.appendChild(td));
    });
}

// =========== Remove Data Table Store ============
export function removeDataTableStorage(DataTable) {
    removeRAM(DataTable);
}

// =========== Measurement RAM Usage Per User Key ==============
export function getLocalStorageUsageForRAM() {
    const keys = Object.keys(localStorage);
    const storageReport = [];

    keys.forEach(key => {
        if (key.startsWith("ApplicationRAM_")) {
            const value = localStorage.getItem(key);
            const bytes = new Blob([value]).size;
            storageReport.push({
                key,
                bytes,
                kb: (bytes / 1024).toFixed(2),
                mb: (bytes / (1024 * 1024)).toFixed(4)
            });
        }
    });

    const totalBytes = storageReport.reduce((sum, item) => sum + item.bytes, 0);

    return {
        storageReport,
        totalKB: (totalBytes / 1024).toFixed(2),
        totalMB: (totalBytes / (1024 * 1024)).toFixed(3)
    };
}

// =========== Report Show RAM Usage Per User Key ==============
export function renderGlobalRAMTable(containerId) {
    const { storageReport, totalKB, totalMB } = getLocalStorageUsageForRAM();

    let html = `
        <h5>Global RAM Usage Report</h5>
        <table class="table table-bordered table-sm">
            <thead>
                <tr><th>Key</th><th>Size (KB)</th><th>Size (MB)</th></tr>
            </thead>
            <tbody>
    `;

    storageReport.forEach(item => {
        html += `<tr>
            <td>${item.key}</td>
            <td>${item.kb}KB</td>
            <td>${item.mb}MB</td>
        </tr>`;
    });

    html += `
            </tbody>
        </table>
        <p><strong>Total:</strong> ${totalKB} KB (~${totalMB} MB)</p>
    `;

    document.getElementById(containerId).innerHTML = html;
}

// =========== Report Show RAM Usage Per Table =================

let fullRAMReport = [];
let currentPage = 1;
let perPage = 10;
let searchQuery = "";
let sortField = null;
let sortDirection = "asc";
let filterPrefix = "";

function initRAMAnalyzer() {
    const perPageSelect = document.getElementById("perItems");
    if (perPageSelect) {
        perPage = parseInt(perPageSelect.value, 10);
    }

    if (document.getElementById("ramTableBody")) {
        analyzeAllRAMKeys();
    }
}
// =============================== Analyze LocalStorage RAM ===============================
function analyzeAllRAMKeys() {
    const keys = Object.keys(localStorage);
    const ramKeys = keys.filter(key => key.startsWith("ApplicationRAM_"));
    const result = [];

    ramKeys.forEach(ramKey => {
        const rawData = localStorage.getItem(ramKey);
        let parsed;
        try {
            parsed = JSON.parse(rawData);
        } catch (e) {
            console.warn(`Failed to parse ${ramKey}`, e);
            return;
        }

        if (typeof parsed !== "object" || parsed === null) return;

        const appSetting = parsed.AppSetting || {};

        // Scan nested keys inside AppSetting
        for (const table in appSetting) {
            const sizeBytes = new Blob([JSON.stringify(appSetting[table])]).size;
            const sizeKB = (sizeBytes / 1024).toFixed(2);
            result.push({ ramKey, table, size: parseFloat(sizeKB) });
        }

        // Fallback: also check top-level keys not under AppSetting
        for (const topLevelKey in parsed) {
            if (topLevelKey !== "AppSetting" && typeof parsed[topLevelKey] === "object") {
                const sizeBytes = new Blob([JSON.stringify(parsed[topLevelKey])]).size;
                const sizeKB = (sizeBytes / 1024).toFixed(2);
                result.push({ ramKey, table: topLevelKey, size: parseFloat(sizeKB) });
            }
        }
    });

    fullRAMReport = result;
    currentPage = 1;
    renderRAMTable();
    renderPaginationControls();
}

function renderRAMTable() {
    const tableBody = document.querySelector("#ramTableBody");
    tableBody.innerHTML = "";

    let data = [...fullRAMReport];

    // Filter
    if (filterPrefix.trim() !== "") {
        data = data.filter(item => item.table.startsWith(filterPrefix));
    }

    // Search
    if (searchQuery.trim() !== "") {
        const lower = searchQuery.toLowerCase();
        data = data.filter(item =>
            item.ramKey.toLowerCase().includes(lower) || item.table.toLowerCase().includes(lower)
        );
    }

    // Sort
    if (sortField) {
        data.sort((a, b) => {
            const valA = a[sortField];
            const valB = b[sortField];
            if (typeof valA === "string") {
                return sortDirection === "asc"
                    ? valA.localeCompare(valB)
                    : valB.localeCompare(valA);
            } else {
                return sortDirection === "asc" ? valA - valB : valB - valA;
            }
        });
    }

    const start = (currentPage - 1) * perPage;
    const currentItems = data.slice(start, start + perPage);

    if (currentItems.length === 0) {
        tableBody.innerHTML = `<tr><td colspan="4" class="text-danger text-center">No RAM data found.</td></tr>`;
        return;
    }

    currentItems.forEach((item, index) => {
        const sl = start + index + 1;
        const row = `
            <tr>
                <td>${sl}</td>
                <td>${item.ramKey}</td>
                <td>${item.table}</td>
                <td>${item.size.toFixed(2)}KB</td>
            </tr>
        `;
        tableBody.insertAdjacentHTML("beforeend", row);
    });
}

function renderPaginationControls() {
    const paginationContainer = document.querySelector("#paginationControls");
    paginationContainer.innerHTML = "";

    const filteredData = getFilteredAndSortedData();
    const totalPages = Math.ceil(filteredData.length / perPage);
    if (totalPages <= 1) return;

    for (let page = 1; page <= totalPages; page++) {
        const btn = document.createElement("button");
        btn.textContent = page;
        btn.className = `btn btn-sm mx-1 ${page === currentPage ? 'btn-primary' : 'btn-outline-primary'}`;
        btn.addEventListener("click", () => {
            currentPage = page;
            renderRAMTable();
            renderPaginationControls();
        });
        paginationContainer.appendChild(btn);
    }
}

function getFilteredAndSortedData() {
    let data = [...fullRAMReport];

    if (filterPrefix.trim() !== "") {
        data = data.filter(item => item.table.startsWith(filterPrefix));
    }

    if (searchQuery.trim() !== "") {
        const lower = searchQuery.toLowerCase();
        data = data.filter(item =>
            item.ramKey.toLowerCase().includes(lower) || item.table.toLowerCase().includes(lower)
        );
    }

    if (sortField) {
        data.sort((a, b) => {
            const valA = a[sortField];
            const valB = b[sortField];
            if (typeof valA === "string") {
                return sortDirection === "asc"
                    ? valA.localeCompare(valB)
                    : valB.localeCompare(valA);
            } else {
                return sortDirection === "asc" ? valA - valB : valB - valA;
            }
        });
    }

    return data;
}

function changePerPage(newPerPage) {
    perPage = parseInt(newPerPage, 10);
    currentPage = 1;
    renderRAMTable();
    renderPaginationControls();
}

function setCurrentPage(page) {
    currentPage = page;
    renderRAMTable();
    renderPaginationControls();
}

function setSearchQuery(query) {
    searchQuery = query;
    currentPage = 1;
    renderRAMTable();
    renderPaginationControls();
}

function setSort(field) {
    if (sortField === field) {
        sortDirection = sortDirection === "asc" ? "desc" : "asc";
    } else {
        sortField = field;
        sortDirection = "asc";
    }
    renderRAMTable();
    renderPaginationControls();
}

function setTablePrefix(prefix) {
    filterPrefix = prefix;
    currentPage = 1;
    renderRAMTable();
    renderPaginationControls();
}

function localStorageHasRAM() {
    return Object.keys(localStorage).some(k => k.startsWith("ApplicationRAM_"));
}

// ========== Exported Module ==========
export const RAMAnalyzer = {
    initRAMAnalyzer,
    analyzeAllRAMKeys,
    changePerPage,
    setCurrentPage,
    setSearchQuery,
    setSort,
    setTablePrefix,
    localStorageHasRAM
};

// =========== Border Animation ===================
export function borderRotated(connectionPath, selector, activeClass) {
    document.querySelectorAll('.button-container').forEach(container => {
        const border = container.querySelector(selector);
        const path = container.querySelector(connectionPath);

        if (!path || !border) return;

        const rect = border.getBoundingClientRect();
        path.setAttribute("width", rect.width);
        path.setAttribute("height", rect.height);
        path.setAttribute("x", 0);
        path.setAttribute("y", 0);
        path.setAttribute("rx", 3);
        path.setAttribute("ry", 3);

        if (border.classList.contains(activeClass)) {
            path.style.stroke = "dodgerblue";
            path.style.strokeDasharray = "5,5";
            path.style.animation = "none";
            void path.offsetWidth; // force reflow
            path.style.animation = "dashmove 1s linear infinite";
        } else {
            path.style.stroke = "lightgray";
            path.style.strokeDasharray = "5,5";
            path.style.animation = "none"; // stop animation
        }
    });
}

// =========== Button Border Animation White Color ===================
export function buttonBorderAnimation(connectionPath, selector, activeClass) {
    document.querySelectorAll('.button-container').forEach(container => {
        const border = container.querySelector(selector);
        const path = container.querySelector(connectionPath);

        if (!path || !border) return;

        const rect = border.getBoundingClientRect();
        path.setAttribute("width", rect.width);
        path.setAttribute("height", rect.height);
        path.setAttribute("x", 0);
        path.setAttribute("y", 0);
        path.setAttribute("rx", 3);
        path.setAttribute("ry", 3);

        if (border.classList.contains(activeClass)) {
            path.style.stroke = "white";
            path.style.strokeDasharray = "5,5";
            path.style.animation = "none";
            void path.offsetWidth; // force reflow
            path.style.animation = "dashmove 1s linear infinite";
        } else {
            path.style.stroke = "none";
            path.style.strokeDasharray = "none";
            path.style.animation = "none"; // stop animation
        }
    });
}

