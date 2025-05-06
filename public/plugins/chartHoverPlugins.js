// hover grid
export function hoverGridPlugin() {
    return {
        id: 'hoverGrid',
        beforeInit(chart) {
            chart._prevHoverYIndex = -1;
            chart._prevHoverXIndex = -1;
            chart._hoverYTick = null;
            chart._hoverXTick = null;
        },
        afterEvent(chart, args) {
            const { event } = args;
            const yAxis = chart.scales.y;
            const xAxis = chart.scales.x;

            if (!event || (!event.x && !event.y) || !yAxis || !xAxis) return;

            let hoverYIndex = -1;
            let hoverXIndex = -1;

            const hoverY = event.y;
            const hoverX = event.x;

            // Check Y axis ticks
            yAxis.ticks.forEach((_, index) => {
                const pixel = yAxis.getPixelForTick(index);
                if (Math.abs(pixel - hoverY) < 10) {
                    hoverYIndex = index;
                }
            });

            // Check X axis ticks
            xAxis.ticks.forEach((_, index) => {
                const pixel = xAxis.getPixelForTick(index);
                if (Math.abs(pixel - hoverX) < 10) {
                    hoverXIndex = index;
                }
            });

            if (
                hoverYIndex === chart._prevHoverYIndex &&
                hoverXIndex === chart._prevHoverXIndex
            ) return;

            chart._prevHoverYIndex = hoverYIndex;
            chart._prevHoverXIndex = hoverXIndex;

            const yTicks = yAxis.getTicks?.() ?? [];
            const xTicks = xAxis.getTicks?.() ?? [];

            chart._hoverYTick = yTicks[hoverYIndex]?.value ?? null;
            chart._hoverXTick = xTicks[hoverXIndex]?.value ?? null;

            // Safely handle grid color logic
            chart.options.scales.y.grid.color = (context) =>
                context?.tick?.value !== undefined && chart._hoverYTick !== null && context.tick.value === chart._hoverYTick
                    ? 'rgba(0,0,0,0)'
                    : 'silver';

            chart.options.scales.x.grid.color = (context) =>
                context?.tick?.value !== undefined && chart._hoverXTick !== null && context.tick.value === chart._hoverXTick
                    ? 'rgba(0,0,0,0)'
                    : 'silver';

            chart.update();
        }
    };
}
// hover dotted
export function dottedGridPlugin(){
    return {
        id: 'dottedGrid',
        afterDraw(chart) {
            const yAxis = chart.scales.y;
            const xAxis = chart.scales.x;
            const ctx = chart.ctx;
            const chartArea = chart.chartArea;

            const hoverYTick = chart._hoverYTick;
            const hoverXTick = chart._hoverXTick;

            ctx.save();
            ctx.fillStyle = '#000000';

            // Draw dotted horizontal line (Y axis hover)
            if (hoverYTick !== undefined) {
                const tickIndex = yAxis.getTicks().findIndex(t => t.value === hoverYTick);
                if (tickIndex !== -1) {
                    const y = yAxis.getPixelForTick(tickIndex);
                    for (let x = chartArea.left; x <= chartArea.right; x += 6) {
                        ctx.beginPath();
                        ctx.arc(x, y, 0.7, 0, 2 * Math.PI);
                        ctx.fill();
                    }
                }
            }

            // Draw dotted vertical line (X axis hover)
            if (hoverXTick !== undefined) {
                const tickIndex = xAxis.getTicks().findIndex(t => t.value === hoverXTick);
                if (tickIndex !== -1) {
                    const x = xAxis.getPixelForTick(tickIndex);
                    for (let y = chartArea.top; y <= chartArea.bottom; y += 6) {
                        ctx.beginPath();
                        ctx.arc(x, y, 0.7, 0, 2 * Math.PI);
                        ctx.fill();
                    }
                }
            }

            ctx.restore();
        }
    };
}
// hover tooltip with text
export function axisTooltipTextPlugin() {
    return {
        id: 'axisTooltipText',

        afterEvent(chart, args) {
            const event = args.event;
            const { x, y } = event;
            const chartArea = chart.chartArea;
            const xAxis = chart.scales.x;
            const yAxis = chart.scales.y;

            const inside = x >= chartArea.left &&
                           x <= chartArea.right &&
                           y >= chartArea.top &&
                           y <= chartArea.bottom;

            if (!inside) {
                chart._hoverXIndex = undefined;
                chart._hoverYValue = undefined;
                return;
            }

            // Detect closest X tick (index)
            let minXDist = Infinity;
            let closestXIndex = undefined;
            xAxis.getTicks().forEach((tick, i) => {
                const px = xAxis.getPixelForTick(i);
                const dist = Math.abs(px - x);
                if (dist < minXDist) {
                    minXDist = dist;
                    closestXIndex = i;
                }
            });
            chart._hoverXIndex = closestXIndex;

            // Detect closest Y tick (value)
            let minYDist = Infinity;
            let closestYValue = undefined;
            yAxis.getTicks().forEach((tick) => {
                const py = yAxis.getPixelForValue(tick.value);
                const dist = Math.abs(py - y);
                if (dist < minYDist) {
                    minYDist = dist;
                    closestYValue = tick.value;
                }
            });
            chart._hoverYValue = closestYValue;
        },

        afterDraw(chart) {
            const ctx = chart.ctx;
            const xAxis = chart.scales.x;
            const yAxis = chart.scales.y;
            const chartArea = chart.chartArea;

            const hoverXIndex = chart._hoverXIndex;
            const hoverYValue = chart._hoverYValue;

            ctx.save();
            ctx.font = "11px Arial";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            // Y-axis Tooltip
            if (hoverYValue !== undefined) {
                const y = yAxis.getPixelForValue(hoverYValue);
                const text = hoverYValue.toString();
                const padding = 5;
                const boxWidth = ctx.measureText(text).width + padding * 2;
                const boxHeight = 18;

                ctx.fillStyle = "#000";
                ctx.strokeStyle = "#888";
                ctx.lineWidth = 1;
                ctx.beginPath();
                ctx.rect(chartArea.left - boxWidth - 8, y - boxHeight / 2, boxWidth, boxHeight);
                ctx.fill();
                ctx.stroke();

                ctx.fillStyle = "#fff";
                ctx.fillText(text, chartArea.left - boxWidth / 2 - 8, y);
            }

            // X-axis Tooltip
            if (hoverXIndex !== undefined) {
                const x = xAxis.getPixelForTick(hoverXIndex);
                const label = chart.data.labels[hoverXIndex] || '';
                const text = label.toString();
                const padding = 5;
                const boxWidth = ctx.measureText(text).width + padding * 2;
                const boxHeight = 18;

                ctx.fillStyle = "#000";
                ctx.strokeStyle = "#888";
                ctx.lineWidth = 1;
                ctx.beginPath();
                ctx.rect(x - boxWidth / 2, chartArea.bottom + 8, boxWidth, boxHeight);
                ctx.fill();
                ctx.stroke();

                ctx.fillStyle = "#fff";
                ctx.fillText(text, x, chartArea.bottom + boxHeight / 2 + 8);
            }

            ctx.restore();
        }
    };
}
// hover tooltip with day name formate
export function axisTooltipDayFormatePlugin() {
    return {
        id: 'axisTooltipDay',

        afterEvent(chart, args) {
            const event = args.event;
            const { x, y } = event;
            const chartArea = chart.chartArea;

            // Check if cursor is inside the chart area
            const inside = x >= chartArea.left &&
                           x <= chartArea.right &&
                           y >= chartArea.top &&
                           y <= chartArea.bottom;

            if (!inside) {
                chart._hoverXTick = undefined;
                chart._hoverYTick = undefined;
            }
        },

        afterDraw(chart) {
            const ctx = chart.ctx;
            const xAxis = chart.scales.x;
            const yAxis = chart.scales.y;
            const chartArea = chart.chartArea;

            const hoverXTick = chart._hoverXTick;
            const hoverYTick = chart._hoverYTick;

            ctx.save();
            ctx.font = "11px Arial";
            ctx.fillStyle = "#fff";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            // Y-axis tooltip
            if (hoverYTick !== undefined) {
                const yIndex = yAxis.getTicks().findIndex(t => t.value === hoverYTick);
                if (yIndex !== -1) {
                    const y = yAxis.getPixelForTick(yIndex);
                    const text = hoverYTick.toString();
                    const boxWidth = ctx.measureText(text).width + 10;
                    const boxHeight = 18;

                    ctx.fillStyle = "black";
                    ctx.strokeStyle = "#888";
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.roundRect(chartArea.left - boxWidth - 8, y - boxHeight / 2, boxWidth, boxHeight, 1);
                    ctx.fill();
                    ctx.stroke();

                    ctx.fillStyle = "#fff";
                    ctx.fillText(text, chartArea.left - boxWidth / 2 - 8, y);
                }
            }

            // X-axis tooltip
            if (hoverXTick !== undefined) {
                const xIndex = xAxis.getTicks().findIndex(t => t.value === hoverXTick);
                if (xIndex !== -1) {
                    const x = xAxis.getPixelForTick(xIndex);

                    let label = chart.data.labels[hoverXTick];
                    let text = label;

                    if (label) {
                        const date = new Date(label);
                        if (!isNaN(date)) {
                            text = date.toLocaleDateString('en-US', { weekday: 'short' });
                        }
                    }

                    const boxWidth = ctx.measureText(text).width + 10;
                    const boxHeight = 18;

                    ctx.fillStyle = "black";
                    ctx.strokeStyle = "#888";
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.roundRect(x - boxWidth / 2, chartArea.bottom + 8, boxWidth, boxHeight, 1);
                    ctx.fill();
                    ctx.stroke();

                    ctx.fillStyle = "#fff";
                    ctx.fillText(text, x, chartArea.bottom + boxHeight / 2 + 8);
                }
            }

            ctx.restore();
        }
    };
}
// hover tooltip with date formate
export function axisTooltipDateFormatePlugin(){
    return {
        id: 'axisTooltipDate',
        afterEvent(chart, args) {
            const event = args.event;
            const { x, y } = event;
            const chartArea = chart.chartArea;

            // Check if cursor is inside the chart area
            const inside = x >= chartArea.left &&
                           x <= chartArea.right &&
                           y >= chartArea.top &&
                           y <= chartArea.bottom;

            if (!inside) {
                chart._hoverXTick = undefined;
                chart._hoverYTick = undefined;
            }
        },

        afterDraw(chart) {
            const ctx = chart.ctx;
            const xAxis = chart.scales.x;
            const yAxis = chart.scales.y;
            const chartArea = chart.chartArea;

            const hoverXTick = chart._hoverXTick;
            const hoverYTick = chart._hoverYTick;

            ctx.save();
            ctx.font = "11px Arial";
            ctx.fillStyle = "#fff";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            // Y-axis tooltip
            if (hoverYTick !== undefined) {
                const yIndex = yAxis.getTicks().findIndex(t => t.value === hoverYTick);
                if (yIndex !== -1) {
                    const y = yAxis.getPixelForTick(yIndex);
                    const text = hoverYTick.toString();
                    const boxWidth = ctx.measureText(text).width + 10;
                    const boxHeight = 18;

                    ctx.fillStyle = "black";
                    ctx.strokeStyle = "#888";
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.roundRect(chartArea.left - boxWidth - 8, y - boxHeight / 2, boxWidth, boxHeight, 1);
                    ctx.fill();
                    ctx.stroke();

                    ctx.fillStyle = "#fff";
                    ctx.fillText(text, chartArea.left - boxWidth / 2 - 8, y);
                }
            }

            // X-axis tooltip
            if (hoverXTick !== undefined) {
                const xIndex = xAxis.getTicks().findIndex(t => t.value === hoverXTick);
                if (xIndex !== -1) {
                    const x = xAxis.getPixelForTick(xIndex);

                    let label = chart.data.labels[hoverXTick];
                    let text = label;

                    if (label) {
                        const date = new Date(label);
                        if (!isNaN(date)) {
                            // date formate
                            text = `${String(date.getDate()).padStart(2, '0')}-${date.toLocaleString('default', { month: 'short' })}-${date.getFullYear()}`;
                        }
                    }

                    const boxWidth = ctx.measureText(text).width + 10;
                    const boxHeight = 18;

                    ctx.fillStyle = "black";
                    ctx.strokeStyle = "#888";
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.roundRect(x - boxWidth / 2, chartArea.bottom + 8, boxWidth, boxHeight, 1);
                    ctx.fill();
                    ctx.stroke();

                    ctx.fillStyle = "#fff";
                    ctx.fillText(text, x, chartArea.bottom + boxHeight / 2 + 8);
                }
            }

            ctx.restore();
        }
    };
}
// hover tooltip with month formate
export function axisTooltipMonthFormatePlugin(){
    return {
        id: 'axisTooltipMonth',
        afterEvent(chart, args) {
            const event = args.event;
            const { x, y } = event;
            const chartArea = chart.chartArea;

            // Check if cursor is inside the chart area
            const inside = x >= chartArea.left &&
                           x <= chartArea.right &&
                           y >= chartArea.top &&
                           y <= chartArea.bottom;

            if (!inside) {
                chart._hoverXTick = undefined;
                chart._hoverYTick = undefined;
            }
        },

        afterDraw(chart) {
            const ctx = chart.ctx;
            const xAxis = chart.scales.x;
            const yAxis = chart.scales.y;
            const chartArea = chart.chartArea;

            const hoverXTick = chart._hoverXTick;
            const hoverYTick = chart._hoverYTick;

            ctx.save();
            ctx.font = "11px Arial";
            ctx.fillStyle = "#fff";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            // Y-axis tooltip
            if (hoverYTick !== undefined) {
                const yIndex = yAxis.getTicks().findIndex(t => t.value === hoverYTick);
                if (yIndex !== -1) {
                    const y = yAxis.getPixelForTick(yIndex);
                    const text = hoverYTick.toString();
                    const boxWidth = ctx.measureText(text).width + 10;
                    const boxHeight = 18;

                    ctx.fillStyle = "black";
                    ctx.strokeStyle = "#888";
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.roundRect(chartArea.left - boxWidth - 8, y - boxHeight / 2, boxWidth, boxHeight, 1);
                    ctx.fill();
                    ctx.stroke();

                    ctx.fillStyle = "#fff";
                    ctx.fillText(text, chartArea.left - boxWidth / 2 - 8, y);
                }
            }

            // X-axis tooltip
            if (hoverXTick !== undefined) {
                const xIndex = xAxis.getTicks().findIndex(t => t.value === hoverXTick);
                if (xIndex !== -1) {
                    const x = xAxis.getPixelForTick(xIndex);

                    let label = chart.data.labels[hoverXTick];
                    let text = label;

                    if (label) {
                        const date = new Date(label);
                        if (!isNaN(date)) {
                            // date format changed to "Jan"
                            text = `${date.toLocaleString('default', { month: 'short' })}`;
                        }
                    }

                    const boxWidth = ctx.measureText(text).width + 10;
                    const boxHeight = 18;

                    ctx.fillStyle = "black";
                    ctx.strokeStyle = "#888";
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.roundRect(x - boxWidth / 2, chartArea.bottom + 8, boxWidth, boxHeight, 1);
                    ctx.fill();
                    ctx.stroke();

                    ctx.fillStyle = "#fff";
                    ctx.fillText(text, x, chartArea.bottom + boxHeight / 2 + 8);
                }
            }

            ctx.restore();
        }
    };
}
// hover tooltip with year formate
export function axisTooltipYearFormatePlugin(){
    return {
        id: 'axisTooltipYear',
        afterEvent(chart, args) {
            const event = args.event;
            const { x, y } = event;
            const chartArea = chart.chartArea;

            // Check if cursor is inside the chart area
            const inside = x >= chartArea.left &&
                           x <= chartArea.right &&
                           y >= chartArea.top &&
                           y <= chartArea.bottom;

            if (!inside) {
                chart._hoverXTick = undefined;
                chart._hoverYTick = undefined;
            }
        },

        afterDraw(chart) {
            const ctx = chart.ctx;
            const xAxis = chart.scales.x;
            const yAxis = chart.scales.y;
            const chartArea = chart.chartArea;

            const hoverXTick = chart._hoverXTick;
            const hoverYTick = chart._hoverYTick;

            ctx.save();
            ctx.font = "11px Arial";
            ctx.fillStyle = "#fff";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            // Y-axis tooltip
            if (hoverYTick !== undefined) {
                const yIndex = yAxis.getTicks().findIndex(t => t.value === hoverYTick);
                if (yIndex !== -1) {
                    const y = yAxis.getPixelForTick(yIndex);
                    const text = hoverYTick.toString();
                    const boxWidth = ctx.measureText(text).width + 10;
                    const boxHeight = 18;

                    ctx.fillStyle = "black";
                    ctx.strokeStyle = "#888";
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.roundRect(chartArea.left - boxWidth - 8, y - boxHeight / 2, boxWidth, boxHeight, 1);
                    ctx.fill();
                    ctx.stroke();

                    ctx.fillStyle = "#fff";
                    ctx.fillText(text, chartArea.left - boxWidth / 2 - 8, y);
                }
            }

            // X-axis tooltip
            if (hoverXTick !== undefined) {
                const xIndex = xAxis.getTicks().findIndex(t => t.value === hoverXTick);
                if (xIndex !== -1) {
                    const x = xAxis.getPixelForTick(xIndex);

                    let label = chart.data.labels[hoverXTick];
                    let text = label;

                    if (label) {
                        const date = new Date(label);
                        if (!isNaN(date)) {
                            // date format changed to "Jan 2025"
                            text = `${date.toLocaleString('default', { month: 'short' })} ${date.getFullYear()}`;
                        }
                    }

                    const boxWidth = ctx.measureText(text).width + 10;
                    const boxHeight = 18;

                    ctx.fillStyle = "black";
                    ctx.strokeStyle = "#888";
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.roundRect(x - boxWidth / 2, chartArea.bottom + 8, boxWidth, boxHeight, 1);
                    ctx.fill();
                    ctx.stroke();

                    ctx.fillStyle = "#fff";
                    ctx.fillText(text, x, chartArea.bottom + boxHeight / 2 + 8);
                }
            }

            ctx.restore();
        }
    };
}
// hover axisCursor move
export function axisCursorPlugin(){
    return {
        id: 'axisCursor',
        afterEvent(chart, args) {
            const {event} = args;
            const xAxis = chart.scales.x;
            const yAxis = chart.scales.y;
            const chartArea = chart.chartArea;
            const mouseX = event.x;
            const mouseY = event.y;
            let isOnX = false;
            let isOnY = false;

            // Check X-axis hover
            xAxis.ticks.forEach((tick, index) => {
                const x = xAxis.getPixelForTick(index);
                if (Math.abs(mouseX - x) < 6 && mouseY >= chartArea.top && mouseY <= chartArea.bottom) {
                    isOnX = true;
                }
            });

            // Check Y-axis hover
            yAxis.ticks.forEach((tick, index) => {
                const y = yAxis.getPixelForTick(index);
                if (Math.abs(mouseY - y) < 6 && mouseX >= chartArea.left && mouseX <= chartArea.right) {
                    isOnY = true;
                }
            });

            // Change cursor
            if (isOnX || isOnY) {
                chart.canvas.style.cursor = 'move';
            } else {
                chart.canvas.style.cursor = 'default';
            }
        }
    };
}
// legendCursor
export function legendCursorPlugin(){
    return {
        id: 'legendCursor',
        afterEvent(chart, args) {
            const event = args.event;
            const canvas = chart.canvas;
            const legend = chart.legend;

            if (!event || !legend || !legend._hitBoxes || !legend.legendItems) return;

            const mouseX = event.x;
            const mouseY = event.y;
            let isOverLegend = false;

            for (let i = 0; i < legend._hitBoxes.length; i++) {
                const box = legend._hitBoxes[i];
                if (
                    mouseX >= box.left &&
                    mouseX <= box.left + box.width &&
                    mouseY >= box.top &&
                    mouseY <= box.top + box.height
                ) {
                    isOverLegend = true;
                    break;
                }
            }

            canvas.style.cursor = isOverLegend ? 'pointer' : 'default';
        }
    };
}