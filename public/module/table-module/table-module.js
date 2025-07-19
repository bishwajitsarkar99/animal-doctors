export function resize(tableId, colClass, rowClass) {
    const table = document.getElementById(tableId);
    if (!table) return;

    let startX, startY, startWidth, startHeight;
    let isResizingCol = false;
    let isResizingRow = false;

    const columnWidths = JSON.parse(localStorage.getItem(`${tableId}_columnWidths`) || '{}');
    const rowHeights = JSON.parse(localStorage.getItem(`${tableId}_rowHeights`) || '{}');

    const headers = table.querySelectorAll('thead th');
    const bodyRows = table.querySelectorAll('tbody tr');

    // Apply saved column widths
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

    // Apply saved row heights
    headers.forEach((th, index) => {
        const height = rowHeights[`th_${index}`];
        if (height) th.style.height = height + 'px';
    });
    bodyRows.forEach((tr, rowIndex) => {
        Array.from(tr.children).forEach((td, colIndex) => {
            const key = `td_${rowIndex}_${colIndex}`;
            const height = rowHeights[key];
            if (height) td.style.height = height + 'px';
        });
    });

    // Helper: Add visual border
    function showResizeBorder(el, direction) {
        if (!el) return;
        el.classList.add(direction === 'col' ? 'col-resizing' : 'row-resizing');
    }

    // Helper: Remove visual border
    function removeResizeBorders() {
        document.querySelectorAll('.col-resizing, .row-resizing')
            .forEach(el => el.classList.remove('col-resizing', 'row-resizing'));
    }

    // MouseDown event
    table.addEventListener('mousedown', function (e) {
        const isCol = e.target.classList.contains(colClass);
        const isRow = e.target.classList.contains(rowClass);

        if (!isCol && !isRow) return;

        const cell = e.target.closest('th, td');
        if (!cell) return;

        const colIndex = Array.from(cell.parentNode.children).indexOf(cell);
        const row = cell.parentElement;
        const rowIndex = Array.from(table.querySelectorAll('tbody tr')).indexOf(row);
        const isTH = cell.tagName === 'TH';

        if (isCol) {
            isResizingCol = true;
            startX = e.pageX;
            startWidth = cell.offsetWidth;

            showResizeBorder(cell, 'col');

            function colMouseMove(ev) {
                const newWidth = startWidth + (ev.pageX - startX);
                cell.style.width = newWidth + 'px';

                // Resize all corresponding <td>
                table.querySelectorAll('tbody tr').forEach(tr => {
                    const td = tr.children[colIndex];
                    if (td) td.style.width = newWidth + 'px';
                });

                columnWidths[colIndex] = newWidth;
                localStorage.setItem(`${tableId}_columnWidths`, JSON.stringify(columnWidths));
            }

            function stopColResize() {
                isResizingCol = false;
                removeResizeBorders();
                document.removeEventListener('mousemove', colMouseMove);
                document.removeEventListener('mouseup', stopColResize);
            }

            document.addEventListener('mousemove', colMouseMove);
            document.addEventListener('mouseup', stopColResize);
        }

        if (isRow) {
            isResizingRow = true;
            startY = e.pageY;
            startHeight = cell.offsetHeight;

            showResizeBorder(cell, 'row');

            function rowMouseMove(ev) {
                const newHeight = startHeight + (ev.pageY - startY);
                cell.style.height = newHeight + 'px';

                if (isTH) {
                    rowHeights[`th_${colIndex}`] = newHeight;
                } else {
                    rowHeights[`td_${rowIndex}_${colIndex}`] = newHeight;
                }

                localStorage.setItem(`${tableId}_rowHeights`, JSON.stringify(rowHeights));
            }

            function stopRowResize() {
                isResizingRow = false;
                removeResizeBorders();
                document.removeEventListener('mousemove', rowMouseMove);
                document.removeEventListener('mouseup', stopRowResize);
            }

            document.addEventListener('mousemove', rowMouseMove);
            document.addEventListener('mouseup', stopRowResize);
        }
    });
}

export function enableColumnDragAndDrop(tableId, storageKey = 'columnOrder_' + tableId) {
    const table = document.getElementById(tableId);
    if (!table) return;

    const thead = table.querySelector("thead");
    const tbody = table.querySelector("tbody");
    let dragSrcIndex = null;

    const getIndex = (el) => Array.from(el.parentNode.children).indexOf(el);

    // 1. Load saved column order
    function loadSavedColumnOrder() {
        const savedOrder = JSON.parse(localStorage.getItem(storageKey));
        if (!savedOrder) return;

        const currentHeaders = Array.from(thead.rows[0].children);
        const newHeaderOrder = [];
        savedOrder.forEach((name) => {
            const match = currentHeaders.find((th) => th.textContent.trim() === name);
            if (match) newHeaderOrder.push(match);
        });

        newHeaderOrder.forEach((th) => thead.rows[0].appendChild(th));

        // Reorder each row's <td>
        Array.from(tbody.rows).forEach((row) => {
            const currentCells = Array.from(row.children);
            const newRowOrder = [];
            savedOrder.forEach((name, i) => {
                const headerIndex = currentHeaders.findIndex((th) => th.textContent.trim() === name);
                if (headerIndex > -1) newRowOrder.push(currentCells[headerIndex]);
            });
            newRowOrder.forEach((td) => row.appendChild(td));
        });
    }

    // 2. Save current column order
    function saveColumnOrder() {
        const currentOrder = Array.from(thead.rows[0].children).map((th) => th.textContent.trim());
        localStorage.setItem(storageKey, JSON.stringify(currentOrder));
    }

    // 3. Move <th> and all matching <td>
    function moveColumn(fromIndex, toIndex) {
        const allRows = table.querySelectorAll("tr");

        allRows.forEach((row) => {
            const cells = Array.from(row.children);
            const cellToMove = cells[fromIndex];
            const referenceCell = cells[toIndex];

            if (!cellToMove || !referenceCell) return;

            if (fromIndex < toIndex) {
                referenceCell.after(cellToMove);
            } else {
                referenceCell.before(cellToMove);
            }
        });

        saveColumnOrder();
    }

    // 4. Attach drag events
    thead.querySelectorAll("th").forEach((th) => {
        th.setAttribute("draggable", true);

        th.addEventListener("dragstart", (e) => {
            dragSrcIndex = getIndex(th);
            e.dataTransfer.setData("text/plain", "");
            th.classList.add("dragging");
        });

        th.addEventListener("dragover", (e) => {
            e.preventDefault();
        });

        th.addEventListener("drop", (e) => {
            e.preventDefault();
            const dropIndex = getIndex(th);
            if (dragSrcIndex !== null && dragSrcIndex !== dropIndex) {
                moveColumn(dragSrcIndex, dropIndex);
                dragSrcIndex = null;
            }
        });

        th.addEventListener("dragend", () => {
            th.classList.remove("dragging");
        });
    });

    loadSavedColumnOrder();
}
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


