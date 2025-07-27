export function ChartScrollPlugin (){
    return {
        id: 'ChartScrollPlugin',
        afterInit(chart) {
            const canvas = chart.canvas;
            canvas.addEventListener('wheel', (event) => {
                event.preventDefault();
    
                const scale = chart.scales.x;
                const range = scale.max - scale.min;
                const scrollAmount = range * 0.1;
    
                if (event.deltaY < 0) {
                    // Scroll left
                    scale.options.min -= scrollAmount;
                    scale.options.max -= scrollAmount;
                } else {
                    // Scroll right
                    scale.options.min += scrollAmount;
                    scale.options.max += scrollAmount;
                }
    
                chart.update();
            });
        }
    };
}