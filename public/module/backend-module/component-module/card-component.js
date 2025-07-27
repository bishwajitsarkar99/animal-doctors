import { setRAM, getRAM } from "/module/backend-module/component-module/table-component.js";

// Drag and Drop Card With Border
export function initDragAndDrop(column, cardKey, row, lineConnectionId, DataTable) {
    let borderSvg = document.getElementById(lineConnectionId);
    if (!borderSvg) {
        borderSvg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        borderSvg.setAttribute("id", lineConnectionId);
        borderSvg.style.width = "100%";
        borderSvg.style.height = "100%";
        borderSvg.style.position = "absolute";
        borderSvg.style.top = 0;
        borderSvg.style.left = 0;
        borderSvg.style.pointerEvents = "none";
        document.body.appendChild(borderSvg);
    }

    const svgBorderRect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
    svgBorderRect.setAttribute("id", "drag-border-rect");
    svgBorderRect.setAttribute("fill", "none");
    svgBorderRect.style.display = "none";
    borderSvg.appendChild(svgBorderRect);

    function animateBorder(card, rectEl) {
        const cardRect = card.getBoundingClientRect();
        const svgRect = borderSvg.getBoundingClientRect();

        const left = cardRect.left - svgRect.left;
        const top = cardRect.top - svgRect.top;

        rectEl.setAttribute("x", left);
        rectEl.setAttribute("y", top);
        rectEl.setAttribute("width", cardRect.width);
        rectEl.setAttribute("height", cardRect.height);
        rectEl.setAttribute("rx", 6);
        rectEl.setAttribute("ry", 6);

        rectEl.style.stroke = "dodgerblue";
        rectEl.style.strokeWidth = "2";
        rectEl.style.strokeDasharray = "5,5";
        rectEl.style.animation = "none";
        void rectEl.offsetWidth;
        rectEl.style.animation = "dashmove 1s linear infinite";
        rectEl.style.display = "block";
    }

    function stopBorderAnimation(rectEl) {
        rectEl.style.animation = "none";
        rectEl.style.display = "none";
    }

    const dragRow = document.querySelector(row);
    const columns = Array.from(document.querySelectorAll(column));
    let draggedCard = null;

    function saveCardOrder() {
        const order = columns.map(column => {
            const card = column.querySelector(cardKey);
            return card ? card.id : null;
        });
        setRAM(DataTable, 'order', order);
    }

    function loadCardOrder() {
        const savedOrder = getRAM(DataTable, 'order') || [];
        if (savedOrder.length) {
            savedOrder.forEach((cardId, index) => {
                const card = document.getElementById(cardId);
                if (card && columns[index]) {
                    columns[index].appendChild(card);
                }
            });
        }
    }

    loadCardOrder();

    function drawConnections() {
        svgBorderRect.innerHTML = '';
        const cards = document.querySelectorAll(cardKey);
        const svgRect = svgBorderRect.getBoundingClientRect();
        const baseY = Math.max(...Array.from(cards).map(c => c.getBoundingClientRect().bottom)) - svgRect.top + 20;
        const centerXs = [];

        cards.forEach(card => {
            const cardRect = card.getBoundingClientRect();
            const top = cardRect.top - svgRect.top;
            const left = cardRect.left - svgRect.left;
            const width = cardRect.width;
            const height = cardRect.height;

            const cx = left + width / 2;
            const cy = top + height;
            centerXs.push(cx);

            const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
            line.setAttribute('x1', cx);
            line.setAttribute('y1', cy);
            line.setAttribute('x2', cx);
            line.setAttribute('y2', baseY);
            line.setAttribute('stroke', '#007BFF');
            line.setAttribute('stroke-width', '1');
        });
    }

    drawConnections();
    window.addEventListener('resize', drawConnections);

    const cards = document.querySelectorAll(cardKey);

    cards.forEach(card => {
        card.setAttribute('draggable', true);

        card.addEventListener('dragstart', () => {
            draggedCard = card;
            animateBorder(card, svgBorderRect);
            setTimeout(() => {
                card.style.visibility = 'hidden';
            }, 0);
        });

        card.addEventListener('drag', () => {
            if (draggedCard) {
                drawConnections();
                animateBorder(draggedCard, svgBorderRect);
            }
        });

        card.addEventListener('dragend', () => {
            card.style.visibility = 'visible';
            draggedCard = null;
            stopBorderAnimation(svgBorderRect);
            setTimeout(drawConnections, 0);
        });
    });

    columns.forEach(column => {
        column.addEventListener('dragover', (e) => e.preventDefault());

        column.addEventListener('drop', () => {
            if (!draggedCard) return;

            const fromColumn = draggedCard.parentElement;
            const existingCard = column.querySelector(cardKey);

            if (existingCard && existingCard !== draggedCard) {
                column.replaceChild(draggedCard, existingCard);
                fromColumn.appendChild(existingCard);
            } else {
                column.appendChild(draggedCard);
            }
            stopBorderAnimation(svgBorderRect);
            saveCardOrder();
            drawConnections();
        });
    });
}

// Drag and Drop Card custom move
export function initializeDrag(dragColumn, cardBg, cardId){
    let draggedCard = null;
    let originalColumn = null;
    const columns = Array.from(document.querySelectorAll(dragColumn));

    function handleDragStart(e, card) {
        draggedCard = card;
        originalColumn = card.closest(dragColumn);

        const rect = card.getBoundingClientRect();
        card.classList.add(cardBg);
        card.style.position = 'fixed';
        card.style.zIndex = '1000';
        card.style.width = `${rect.width}px`;
        card.style.height = `${rect.height}px`;
        card.style.cursor = 'move';
        card.style.left = `${rect.left}px`;
        card.style.top = `${rect.top}px`;

        document.body.appendChild(card);

        const offsetX = (e.touches ? e.touches[0].clientX : e.clientX) - rect.left;
        const offsetY = (e.touches ? e.touches[0].clientY : e.clientY) - rect.top;

        function moveCard(ev) {
            const pageX = ev.touches ? ev.touches[0].pageX : ev.pageX;
            const pageY = ev.touches ? ev.touches[0].pageY : ev.pageY;
            card.style.left = `${pageX - offsetX}px`;
            card.style.top = `${pageY - offsetY}px`;
        }

        function dropCard(ev) {
            document.removeEventListener('mousemove', moveCard);
            document.removeEventListener('mouseup', dropCard);
            document.removeEventListener('touchmove', moveCard);
            document.removeEventListener('touchend', dropCard);

            const dropTargetColumn = columns.find(col => {
                const rect = col.getBoundingClientRect();
                const x = ev.touches ? ev.touches[0].clientX : ev.clientX;
                const y = ev.touches ? ev.touches[0].clientY : ev.clientY;
                return x >= rect.left && x <= rect.right && y >= rect.top && y <= rect.bottom;
            });

            if (dropTargetColumn && dropTargetColumn !== originalColumn) {
                const targetCard = dropTargetColumn.querySelector(cardId);

                if (targetCard) {
                    // Swap cards
                    originalColumn.appendChild(targetCard);
                }

                dropTargetColumn.innerHTML = ''; // Clean up
                dropTargetColumn.appendChild(card);
            } else {
                // Return to original place if not dropped in valid column
                originalColumn.appendChild(card);
            }

            // Reset styles
            card.style.position = '';
            card.style.left = '';
            card.style.top = '';
            card.style.zIndex = '';
            card.style.width = '';
            card.style.height = '';
            card.style.cursor = '';
            card.classList.add(cardBg);

            saveCardOrder();
        }

        if (e.type === 'mousedown') {
            document.addEventListener('mousemove', moveCard);
            document.addEventListener('mouseup', dropCard, { once: true });
        } else if (e.type === 'touchstart') {
            document.addEventListener('touchmove', moveCard, { passive: false });
            document.addEventListener('touchend', dropCard, { once: true });
        }
    }

    function addCardListeners(card) {
        card.addEventListener('mousedown', (e) => handleDragStart(e, card));
        card.addEventListener('touchstart', (e) => handleDragStart(e, card));
        card.ondragstart = () => false;
    }

    function saveCardOrder() {
        const order = columns.map(col => {
            const card = col.querySelector(cardId);
            return card ? card.id : null;
        });
        localStorage.setItem('cardOrder', JSON.stringify(order));
    }

    function loadCardOrder() {
        const savedOrder = JSON.parse(localStorage.getItem('cardOrder') || '[]');
        if (!savedOrder.length) return;

        // Get all cards first
        const allCards = Array.from(document.querySelectorAll(cardId));
        const cardMap = {};
        allCards.forEach(card => {
            cardMap[card.id] = card;
        });

        savedOrder.forEach((cardId, index) => {
            const card = document.getElementById(cardId);
            const col = columns[index];
            if (card && col) {
                //col.innerHTML = '';
                col.appendChild(card);
            }
        });
    }

    // Init
    loadCardOrder();
    document.querySelectorAll(cardId).forEach(addCardListeners);
}