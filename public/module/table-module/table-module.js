export function resize(tableId, colClass, rowClass) {
    const table = document.getElementById(tableId);
    if (!table) return;

    let startX, startY, startWidth, startHeight;
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

    // Apply saved row heights (to both <th> and <td>)
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

    // Mousedown listener
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
            startX = e.pageX;
            startWidth = cell.offsetWidth;

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
                document.removeEventListener('mousemove', colMouseMove);
                document.removeEventListener('mouseup', stopColResize);
            }

            document.addEventListener('mousemove', colMouseMove);
            document.addEventListener('mouseup', stopColResize);
        }

        if (isRow) {
            startY = e.pageY;
            startHeight = cell.offsetHeight;

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
                document.removeEventListener('mousemove', rowMouseMove);
                document.removeEventListener('mouseup', stopRowResize);
            }

            document.addEventListener('mousemove', rowMouseMove);
            document.addEventListener('mouseup', stopRowResize);
        }
    });
}
