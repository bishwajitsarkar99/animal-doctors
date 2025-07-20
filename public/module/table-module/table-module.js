// Helper to generate a unique localStorage key based on tableId, suffix, user role, and email
function getUserRAMKey(tableId) {
    const role = document.querySelector('meta[name="user-role"]')?.content || 'guest';
    const branch_id = document.querySelector('meta[name="branch-id"]')?.content || 'identifyer';
    const email = document.querySelector('meta[name="user-email"]')?.content || 'unknown';
    const safeEmail = email.replace(/[^a-zA-Z0-9]/g, '_');
    return `App_${tableId}_${branch_id}_${role}_${safeEmail}`;
}
// --- Global flags to prevent drag-resize conflicts ---
let isDraggingColumn = false;
let isResizingColumn = false;
// Main resize function
export function resize(tableId, colClass, rowClass) {
    const table = document.getElementById(tableId);
    if (!table) return;

    const key = getUserRAMKey(tableId);
    const saved = JSON.parse(localStorage.getItem(key) || '{}');
    const columnWidths = saved.columnWidths || {};
    const rowHeights = saved.rowHeights || {};

    const headers = table.querySelectorAll('thead th');
    const theadRow = table.querySelector('thead tr');
    const bodyRows = table.querySelectorAll('tbody tr');

    // === Apply saved column widths ===
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

    // === Apply saved row heights ===
    if (rowHeights['thead']) theadRow.style.height = rowHeights['thead'] + 'px';

    bodyRows.forEach((tr, rowIndex) => {
        const height = rowHeights[`tr_${rowIndex}`];
        if (height) tr.style.height = height + 'px';
    });

    // === Resize handler ===
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
            localStorage.setItem(key, JSON.stringify({ columnWidths, rowHeights, columnOrder: saved.columnOrder || [] }));
        }

        // === Column resizing (width by <th>) ===
        if (isColResize && cell.tagName === 'TH') {
            if (isDraggingColumn) return; // Prevent conflict
            isResizingColumn = true;
            cell.classList.add('col-resizing');

            function colMouseMove(ev) {
                const newWidth = startWidth + (ev.pageX - startX);
                cell.style.width = newWidth + 'px';

                bodyRows.forEach(row => {
                    
                    const td = row.children[colIndex];
                    if (td){
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
                    if (td) {
                        td.classList.remove('col-resizing');
                    }
                });
                document.removeEventListener('mousemove', colMouseMove);
                document.removeEventListener('mouseup', stopColResize);
            }

            document.addEventListener('mousemove', colMouseMove);
            document.addEventListener('mouseup', stopColResize);
        }

        // === Row resizing (height by <tr>) ===
        if (isRowResize) {
            rowElement.classList.add('row-resizing');

            // Apply class to each cell (td or th) in the row for visual effect
            [...rowElement.children].forEach(cell => {
                cell.classList.add('row-resizing');
            });

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
                rowElement.classList.remove('row-resizing');
                [...rowElement.children].forEach(cell => {
                    cell.classList.remove('row-resizing');
                });
                document.removeEventListener('mousemove', rowMouseMove);
                document.removeEventListener('mouseup', stopRowResize);
            }

            document.addEventListener('mousemove', rowMouseMove);
            document.addEventListener('mouseup', stopRowResize);
        }
    });
}
// Function to remove resize data
export function removeResizeStorage(tableId) {
    const key = getUserRAMKey(tableId);
    localStorage.removeItem(key);
}
export function enableColumnDragAndDrop(tableId,iconClass) {
    const table = document.getElementById(tableId);
    if (!table) return;

    const key = getUserRAMKey(tableId);
    const saved = JSON.parse(localStorage.getItem(key) || '{}');

    const thead = table.querySelector('thead');
    const tbody = table.querySelector('tbody');

    const getHeaderIndex = el => [...el.parentNode.children].indexOf(el);

    // === Load saved column order from localStorage ===
    function loadColumnOrder() {
        if (!saved.columnOrder) return;

        const headers = [...thead.rows[0].children];
        const headerMap = Object.fromEntries(headers.map((th, i) => [th.textContent.trim(), i]));

        const newOrder = saved.columnOrder.map(name => headers[headerMap[name]]).filter(Boolean);

        // Apply to THEAD
        newOrder.forEach(th => thead.rows[0].appendChild(th));

        // Apply to TBODY
        [...tbody.rows].forEach(row => {
            const cells = [...row.children];
            const newCells = saved.columnOrder.map(name => {
                const index = headerMap[name];
                return index !== undefined ? cells[index] : null;
            }).filter(Boolean);
            newCells.forEach(td => row.appendChild(td));
        });
    }

    // === Save column order to localStorage ===
    function saveColumnOrder() {
        const order = [...thead.rows[0].children].map(th => th.textContent.trim());
        saved.columnOrder = order;
        localStorage.setItem(key, JSON.stringify(saved));
    }

    // === Move column across all rows ===
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

    // === Set up drag listeners ===
    let dragSrcIndex = null;

    // Loop through each TH and target the drag handle (`#moveIconId`) within it
    thead.querySelectorAll('th').forEach(th => {
        const moveIcon = th.querySelector(iconClass);
        if (!moveIcon) return;

        th.setAttribute('draggable', true);

        // Make sure the icon handles the drag
        moveIcon.addEventListener('mousedown', e => {
            e.stopPropagation(); // Prevent TH dragging from interfering
            dragSrcIndex = getHeaderIndex(th);
        });

        th.addEventListener('dragstart', e => {
            if (isResizingColumn) {
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
// Column Drag and Drop Store
export function applySavedColumnOrder(tableId) {
    const savedOrder = JSON.parse(localStorage.getItem("columnOrder_" + tableId));
    if (!savedOrder) return;

    const table = document.getElementById(tableId);
    const theadRow = table.querySelector("thead tr");
    const ths = Array.from(theadRow.children);

    // Reorder <th> to match saved
    const newThOrder = savedOrder.map(label =>
        ths.find(th => th.textContent.trim() === label)
    ).filter(Boolean);
    newThOrder.forEach(th => theadRow.appendChild(th));

    // Reorder <td> in each <tr>
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


