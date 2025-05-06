// chart scrolling plugin
// Only works if your x-axis is numeric or time (not category)
// You'll need to set min and max on the x-axis in options to allow scrolling
// const myChart = new Chart(ctx, {
//     type: 'line',
//     data: {...},
//     options: {
//         scales: {
//             x: {
//                 type: 'linear', // or 'time'
//                 min: 0,
//                 max: 10
//             }
//         }
//     },
//     plugins: [ChartScrollPlugin]
// });
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