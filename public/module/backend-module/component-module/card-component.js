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
export function initDragAndDrop(column, cardKey, row, lineConnectionId) {
    const dragRow = document.querySelector(row);
    const columns = Array.from(document.querySelectorAll(column));
    let draggedCard = null;

    const svg = document.getElementById(lineConnectionId);

    function saveCardOrder() {
        const order = columns.map(column => {
            const card = column.querySelector(cardKey);
            return card ? card.id : null;
        });
        localStorage.setItem('cardOrder', JSON.stringify(order));
    }

    function loadCardOrder() {
        const savedOrder = JSON.parse(localStorage.getItem('cardOrder') || '[]');
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
        svg.innerHTML = '';

        const cards = document.querySelectorAll(cardKey);
        const svgRect = svg.getBoundingClientRect();

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

            centerXs.push(cx); // collect all center x-coordinates

            // Draw rectangle around card
            // const rect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
            // rect.setAttribute('x', left);
            // rect.setAttribute('y', top);
            // rect.setAttribute('width', width);
            // rect.setAttribute('height', height);
            // rect.setAttribute('fill', 'none');
            // rect.setAttribute('stroke', '#007BFF');
            // rect.setAttribute('stroke-width', '1');
            // svg.appendChild(rect);

            // Draw vertical line from card to baseY
            const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
            line.setAttribute('x1', cx);
            line.setAttribute('y1', cy);
            line.setAttribute('x2', cx);
            line.setAttribute('y2', baseY);
            line.setAttribute('stroke', '#007BFF');
            line.setAttribute('stroke-width', '1');
        });
        
    }

    
    // function drawConnections() {
    //     svg.innerHTML = '';

    //     const cards = document.querySelectorAll(cardKey);
    //     const svgRect = svg.getBoundingClientRect();
    //     if (cards.length < 2) return;

    //     const getHeaderPoints = (el) => {
    //         const rect = el.getBoundingClientRect();
    //         const top = rect.top - svgRect.top;
    //         const left = rect.left - svgRect.left;
    //         const width = rect.width;
    //         const headerHeight = 40;

    //         return {
    //             headerLeft: { x: left, y: top + headerHeight / 2 },
    //             headerRight: { x: left + width, y: top + headerHeight / 2 }
    //         };
    //     };

    //     cards.forEach((card, index) => {
    //         const points = getHeaderPoints(card);

    //         // ✅ Draw pinpoints based on position
    //         if (index === 0) {
    //             drawPin(points.headerRight); // ✅ Only right pin
    //         } else if (index === cards.length - 1) {
    //             drawPin(points.headerLeft);  // ✅ Only left pin
    //         } else {
    //             drawPin(points.headerLeft);  // ✅ Both pins
    //             drawPin(points.headerRight);
    //         }

    //         // ✅ Draw curved line from previous card’s right pin to this card’s left pin
    //         if (index > 0) {
    //             const prevPoints = getHeaderPoints(cards[index - 1]);
    //             drawCurvedPath(prevPoints.headerRight, points.headerLeft); // ✅ Start from inside previous
    //         }
    //     });
    // }

    // function drawPin({ x, y }) {
    //     const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
    //     circle.setAttribute('cx', x);
    //     circle.setAttribute('cy', y);
    //     circle.setAttribute('r', 4);
    //     circle.setAttribute('fill', '#007BFF');
    //     svg.appendChild(circle);
    // }

    // function drawCurvedPath(start, end) {
    //     const path = document.createElementNS("http://www.w3.org/2000/svg", "path");

    //     const midX = (start.x + end.x) / 2;
    //     const d = `M ${start.x} ${end.y} ${midX} ${start.y}, ${end.x} ${end.y} C ${midX} ${end.y}, ${end.x} ${end.y}`;

    //     path.setAttribute('d', d);
    //     path.setAttribute('stroke', '#007BFF');
    //     path.setAttribute('stroke-width', '2');
    //     path.setAttribute('fill', 'none');

    //     // Optional animation
    //     const length = path.getTotalLength();
    //     path.style.strokeDasharray = length;
    //     path.style.strokeDashoffset = length;
    //     path.style.animation = 'dash 0.8s ease forwards';

    //     svg.appendChild(path);
    // }

    drawConnections();

    // Recalculate lines on window resize
    window.addEventListener('resize', drawConnections);

    const cards = document.querySelectorAll(cardKey);

    cards.forEach(card => {
        card.setAttribute('draggable', true);

        card.addEventListener('dragstart', () => {
            draggedCard = card;
            setTimeout(() => {
                card.style.visibility = 'hidden';
            }, 0);
        });

        card.addEventListener('drag', () => {
            if (draggedCard) {
                drawConnections(); // live redraw while dragging
            }
        });

        card.addEventListener('dragend', () => {
            card.style.visibility = 'visible';
            draggedCard = null;
            setTimeout(drawConnections, 0); // ensure reflow
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

            saveCardOrder();
            drawConnections();
        });
    });
}