// Helper function to handle dynamic success message
export function handleSuccessMessage(selector, duration = 3000, fadeOutDuration = 4000, delayDuration= 4000) {
    var successMessage = $(selector).text().trim();
    
    if (successMessage) {
        $(selector).fadeIn(duration).delay(delayDuration).fadeOut(fadeOutDuration);

        return () => {
            clearTimeout(timeout);
        };
    }
}
// Button Loader Helper Function ---------
export function buttonLoader(buttonSelector, loaderIconSelector, buttonTextSelector, loadingText = '', defaultText = '', timeoutDuration = '') {

    $(buttonSelector).on('click', () => {
        $(loaderIconSelector).removeAttr('hidden');
        $(buttonTextSelector).text(loadingText);

        var timeout = setTimeout(() => {
            $(loaderIconSelector).attr('hidden', true);
            $(buttonTextSelector).text(defaultText);
        }, timeoutDuration);

        return () => {
            clearTimeout(timeout);
        };
    });
}
// Image Upload Button loader ---------
export function imageUploadBtnLoader(imageUploadBtn){
    var imageUploadBtn = $("#uploadButton");
    $(imageUploadBtn).on('click', () =>{
        $('.img-upload-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.upload-btn-text').text('Upload...');
        var timeout = null;
        timeout = setTimeout(() =>{
            $('.img-upload-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.upload-btn-text').text('Upload');
        }, 2200);

        return () => {
            clearTimeout(timeout);
        };
    });
}
// Helper function image upload form
export function imageUpload(event) {
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image_view');
            if (output) {
                output.src = reader.result;
            }
        };
        
        // Ensure a file is selected
        if (event.target.files && event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    };
    loadFile(event); // Call loadFile with the event parameter
}
// Function to handle the image upload progress bar simulation
export function handleImageUpload() {
    var imageValue = $("#imgInput").val();
    var bar = document.querySelector('.bar');
    var percent = document.querySelector('.percent');
    var simulatedProgress = parseInt(percent.innerHTML);

    // Check if progress is already 100% and show a message
    if (simulatedProgress === 100) {
        $("#uploadMess").html('<span class="upload-mesg">Select an image to upload.</span>');
        return; // Exit to prevent further actions
    }

    if (imageValue !== '') {
        // Check if progress bar is already in progress to avoid multiple intervals
        if ($('.bar').width() !== 0 && simulatedProgress < 100) {
            return; // Prevent starting a new progress simulation if one is already running
        }

        var simulatedProgress = 0; // Reset simulated progress to start from 0

        // Simulate progress bar
        var uploadInterval = setInterval(function () {
            simulatedProgress += 10;

            if (simulatedProgress <= 100) {
                bar.style.width = simulatedProgress + '%';
                percent.innerHTML = simulatedProgress + '%';
            } else {
                clearInterval(uploadInterval);
                $(".register_img").removeClass('img-hidden');
            }
        }, 200);

    } else {
        // Handle case when no image is selected
        $("#uploadMess").html('<span class="upload-mesg">Please select an image to upload.</span>'); // Show error message

        // Reset progress bar if no image is selected
        $('.bar').css('width', '0%');
        $('.percent').text('0%');
    }
}
// tooltip helper function
export function toolTip() {
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
}
// input validation
export function handleInputValidation(inputSelector, errorSelector, successClass, errorClass, currentBorderClass, successMessageSelector, fadeInDuration = 200, fadeOutDuration = 200) {
    // On page load, check if there's an error message and adjust the border styles accordingly
    var errorMessage = $(errorSelector).text().trim();
    $(errorSelector).attr("data-error", errorMessage);

    if (errorMessage !== '') {
        $(inputSelector).removeClass(currentBorderClass).addClass(errorClass);
    } else {
        var inputVal = $(inputSelector).val().trim();
        if (inputVal !== '') {
            $(inputSelector).removeClass(currentBorderClass).addClass(successClass);
            $(successMessageSelector).removeClass('hidden').fadeIn(fadeInDuration).delay(fadeInDuration);
        } else {
            $(inputSelector).addClass(currentBorderClass).removeClass(errorClass);
        }
    }

    // Handle input changes dynamically
    $(document).on('keyup', inputSelector, function() {
        var inputVal = $(this).val();
        $(errorSelector).text('');
        $(inputSelector).removeClass('show-error-border');

        if (inputVal !== '') {
            $(this).removeClass(currentBorderClass).addClass(successClass).removeClass(errorClass);
            $(successMessageSelector).removeClass('hidden').fadeIn(fadeInDuration).delay(fadeInDuration);
        } else {
            $(this).addClass(currentBorderClass).removeClass(successClass);
            $(successMessageSelector).addClass('hidden').fadeOut(fadeOutDuration).delay(fadeOutDuration);
        }
    });
}
// Input and Select validation function
export function handleInputOrSelectValidation(inputSelector, errorSelector, successClass, errorClass, currentBorderClass, successMessageSelector, fadeInDuration = 200, fadeOutDuration = 200) {
    // On page load, check if there's an error message and adjust the border styles accordingly
    var errorMessage = $(errorSelector).text().trim();
    $(errorSelector).attr("data-error", errorMessage);

    if (errorMessage !== '') {
        $(inputSelector).removeClass(currentBorderClass).addClass(errorClass);
    } else {
        var inputVal = $(inputSelector).val().trim();
        if (inputVal !== '' && inputVal !== null) {
            $(inputSelector).removeClass(currentBorderClass).addClass(successClass);
            $(successMessageSelector).removeClass('hidden').fadeIn(fadeInDuration).delay(fadeInDuration);
        } else {
            $(inputSelector).addClass(currentBorderClass).removeClass(errorClass);
        }
    }
    // Handle input/select changes dynamically
    $(document).on('change keyup', inputSelector, function() {
        var inputVal = $(this).val().trim();
        $(errorSelector).text(''); // Clear error message on valid input
        $(inputSelector).removeClass('show-error-border');

        if (inputVal !== '' && inputVal !== null) {
            $(this).removeClass(currentBorderClass).addClass(successClass).removeClass(errorClass);
            $(successMessageSelector).removeClass('hidden').fadeIn(fadeInDuration).delay(fadeInDuration);
        } else {
            $(this).addClass(currentBorderClass).removeClass(successClass);
            $(successMessageSelector).addClass('hidden').fadeOut(fadeOutDuration).delay(fadeOutDuration);
        }
    });
}
// General function to remove any skeleton class
export function removeSkeletonClass(skeletonClasses) {
    skeletonClasses.forEach(className => {
        const allSkeleton = document.querySelectorAll(`.${className}`);
        allSkeleton.forEach(item => {
            item.classList.remove(className);
        });
    });
}
// General function to add any attribute or class
export function addAttributeOrClass(items) {
    items.forEach(({ selector, type, name, value }) => {
        const elements = document.querySelectorAll(selector);

        elements.forEach(item => {
            if (type === 'attribute') {
                item.setAttribute(name, value);
            } else if (type === 'class') {
                item.classList.add(name);
            }
        });
    });
}
// General function to remove any attribute or class
export function removeAttributeOrClass(items) {
    items.forEach(({ selector, type, name }) => {
        const elements = document.querySelectorAll(selector);

        elements.forEach(item => {
            if (type === 'attribute') {
                item.removeAttribute(name);
            } else if (type === 'class') {
                item.classList.remove(name);
            }
        });
    });
}
// Cricle Number Plate and animation
export function cricleNumberPlate(numberClass, cricleBar, percentage){
    document.querySelectorAll(numberClass).forEach(el => {
        const target = +el.getAttribute('data-target') || 0;
        const parentLoader = el.closest(cricleBar);
        if (parentLoader) {
            parentLoader.style.setProperty(percentage, target);
        }

        let count = 0;
        const increment = target / 50;
        const updateCount = () => {
            count += increment;
            if (count < target) {
                el.innerText = Math.floor(count);
                if (parentLoader) {
                    parentLoader.style.setProperty(percentage, count);
                }
                requestAnimationFrame(updateCount);
            } else {
                el.innerText = target;
                if (parentLoader) {
                    parentLoader.style.setProperty(percentage, target);
                }
            }
        };
        updateCount();
    });
}
// Aniamte Number
const animatedElements = new WeakMap();
function animateNumber(el, target, duration = 2000) {
    const start = performance.now();
    function step(currentTime) {
        const elapsed = currentTime - start;
        const progress = Math.min(elapsed / duration, 1);
        const current = Math.floor(progress * target);
        el.textContent = current.toLocaleString();
        if (progress < 1) {
            requestAnimationFrame(step);
        }
    }
    requestAnimationFrame(step);
}
function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    const viewHeight = window.innerHeight || document.documentElement.clientHeight;
    const inView = rect.top < viewHeight && rect.bottom > 0;
    return inView;
}
// Trigger 
export function triggerIfInView(numberSelector, containerSelector) {
    const allNumberElements = document.querySelectorAll(numberSelector);
    allNumberElements.forEach(numEl => {
        const container = numEl.closest(containerSelector);
        if (!container) return;

        const isVisible = isInViewport(container);
        const isAnimated = animatedElements.has(container);

        if (isVisible && !isAnimated) {
            const target = parseFloat(numEl.dataset.target || '0');
            animateNumber(numEl, target);
            animatedElements.set(container, true);
        } else if (!isVisible && isAnimated) {
            animatedElements.delete(container);
        }
    });
}
// Number Rolling animate with scrol animate
export function numberRolling(numberSelector, containerSelector) {
    // Just set up the scroll/resize listeners here
    window.addEventListener('resize', () => triggerIfInView(numberSelector, containerSelector));
    document.addEventListener('fullscreenchange', () => triggerIfInView(numberSelector, containerSelector));
    let scrollTimeout;
    window.addEventListener('scroll', () => {
        if (!scrollTimeout) {
            scrollTimeout = setTimeout(() => {
                triggerIfInView(numberSelector, containerSelector);
                scrollTimeout = null;
            }, 100); // Adjust delay as needed
        }
    });
}
// Date Range Scroll chart
export function initializeCurveLineChart(dateRangeId){
    const svg = document.getElementById(dateRangeId);
    const width = svg.viewBox.baseVal.width || svg.clientWidth;
    const height = svg.viewBox.baseVal.height || svg.clientHeight;
    const padding = 10;
    const maxPoints = 120;
    const stepX = (width - padding * 2) / (maxPoints - 1);
    const baseY = height - padding;

    const pattern = [0, 0, 10, 25, 60, 100, 60, 25, 10, 0, 0, 0];
    let data = Array.from({ length: maxPoints }, () => 0);

    // ECG path (curve)
    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    path.setAttribute("stroke", "gray");
    path.setAttribute("stroke-width", "1");
    path.setAttribute("fill", "none");
    path.setAttribute("stroke-linejoin", "round");
    path.setAttribute("stroke-linecap", "round");
    svg.appendChild(path);

    // Fill path
    const fillPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
    fillPath.setAttribute("fill", "rgba(0, 31, 233, 0.16)");
    fillPath.setAttribute("stroke", "none");
    svg.appendChild(fillPath);

    function drawAxes() {
        const months = [
            { name: "Jan", days: 31 },
            { name: "Feb", days: 28 }, // you can make dynamic for leap years if needed
            { name: "Mar", days: 31 },
            { name: "Apr", days: 30 },
            { name: "May", days: 31 },
            { name: "Jun", days: 30 },
            { name: "Jul", days: 31 },
            { name: "Aug", days: 31 },
            { name: "Sep", days: 30 },
            { name: "Oct", days: 31 },
            { name: "Nov", days: 30 },
            { name: "Dec", days: 31 }
        ];

        // Total width for the axis minus padding
        const totalAxisWidth = width - 9.6 * padding;
        const stepLabel = totalAxisWidth / (months.length - 1);

        // X-axis line
        const xAxis = document.createElementNS("http://www.w3.org/2000/svg", "line");
        xAxis.setAttribute("x1", padding);
        xAxis.setAttribute("y1", baseY);
        xAxis.setAttribute("x2", width - padding);
        xAxis.setAttribute("y2", baseY);
        xAxis.setAttribute("stroke", "gray");
        xAxis.setAttribute("stroke-width", "1");
        svg.appendChild(xAxis);

        let currentX = padding;

        months.forEach((month, i) => {
            // Major tick
            const tick = document.createElementNS("http://www.w3.org/2000/svg", "line");
            tick.setAttribute("x1", currentX);
            tick.setAttribute("y1", baseY - 33); // longer tick
            tick.setAttribute("x2", currentX);
            tick.setAttribute("y2", baseY);
            tick.setAttribute("stroke", "#222");
            tick.setAttribute("stroke-width", "1.1");
            svg.appendChild(tick);

            // Label
            const text = document.createElementNS("http://www.w3.org/2000/svg", "text");
            text.setAttribute("x", currentX);
            text.setAttribute("y", baseY - 33);
            text.setAttribute("text-anchor", "middle");
            text.setAttribute("font-size", "10");
            text.setAttribute("font-weight", "900");
            text.setAttribute("fill", "#333");
            text.textContent = month.name;
            svg.appendChild(text);

            // Skip last month for minor tick spacing
            if (i < months.length - 1) {
                const nextX = currentX + stepLabel;
                const monthWidth = nextX - currentX;
                const stepDay = monthWidth / month.days;

                for (let d = 1; d < month.days; d++) {
                    const minorX = currentX + d * stepDay;

                    const minorTick = document.createElementNS("http://www.w3.org/2000/svg", "line");
                    minorTick.setAttribute("x1", minorX);
                    minorTick.setAttribute("y1", baseY - 15); // shorter tick
                    minorTick.setAttribute("x2", minorX);
                    minorTick.setAttribute("y2", baseY);
                    minorTick.setAttribute("stroke", "#666");
                    minorTick.setAttribute("stroke-width", "0.9");
                    svg.appendChild(minorTick);
                }
            }

            currentX += stepLabel;
        });
    }

    // Create smooth curve with quadratic Bézier path
    function getSmoothPath(points) {
        if (points.length < 2) return "";

        let d = `M ${points[0][0]},${points[0][1]}`;
        for (let i = 1; i < points.length - 1; i++) {
            const xc = (points[i][0] + points[i + 1][0]) / 2;
            const yc = (points[i][1] + points[i + 1][1]) / 2;
            d += ` Q ${points[i][0]},${points[i][1]} ${xc},${yc}`;
        }
        return d;
    }

    function updatePath() {
        const scaled = data.map((y, i) => {
            const x = padding + i * stepX;
            const yPos = baseY - (y * (height - 2 * padding) / 100);
            return [x, yPos];
        });

        const dLine = getSmoothPath(scaled);
        path.setAttribute("d", dLine);

        // Fill path (base down to axis)
        let dFill = `M ${scaled[0][0]},${baseY}`;
        scaled.forEach(([x, y]) => dFill += ` L ${x},${y}`);
        dFill += ` L ${scaled[scaled.length - 1][0]},${baseY} Z`;
        fillPath.setAttribute("d", dFill);
    }

    let axesDrawn = false; // prevent re-drawing on every frame

    function animate() {
        const next = pattern.shift();
        pattern.push(next);

        data.push(next);
        if (data.length > maxPoints) data.shift();

        if (!axesDrawn) {
            drawAxes();
            axesDrawn = true;
        }

        updatePath();
        setTimeout(() => requestAnimationFrame(animate), 200);
    }
    animate();
}
// Animated Group Bar Chart forEach() light color bar
export function initializeBarCharts(){
    function addGradient(svg) {
        const defs = document.createElementNS("http://www.w3.org/2000/svg", "defs");

        // Main gradient
        const linearGradient = document.createElementNS("http://www.w3.org/2000/svg", "linearGradient");
        linearGradient.setAttribute("id", "gradientActivity");
        linearGradient.setAttribute("x1", "0");
        linearGradient.setAttribute("y1", "0");
        linearGradient.setAttribute("x2", "0");
        linearGradient.setAttribute("y2", "1");

        const stops = [
            { offset: "0%", color: "#4e73ff" },     // Brighter indigo-blue
            { offset: "33%", color: "#ff4081" },    // Bright pink
            { offset: "66%", color: "#00bfa5" },    // Vibrant teal
            { offset: "100%", color: "rgba(34,139,34,0)" }
        ];

        stops.forEach(({ offset, color }) => {
            const stop = document.createElementNS("http://www.w3.org/2000/svg", "stop");
            stop.setAttribute("offset", offset);
            stop.setAttribute("stop-color", color);
            linearGradient.appendChild(stop);
        });

        defs.appendChild(linearGradient);

        // Glossy overlay gradient
        const glossy = document.createElementNS("http://www.w3.org/2000/svg", "linearGradient");
        glossy.setAttribute("id", "glossyLight");
        glossy.setAttribute("x1", "0");
        glossy.setAttribute("y1", "0");
        glossy.setAttribute("x2", "0");
        glossy.setAttribute("y2", "1");

        [
            { offset: "0%", color: "rgba(255,255,255,0.6)" },
            { offset: "10%", color: "rgba(255,255,255,0.2)" },
            { offset: "100%", color: "rgba(255,255,255,0)" }
        ].forEach(({ offset, color }) => {
            const stop = document.createElementNS("http://www.w3.org/2000/svg", "stop");
            stop.setAttribute("offset", offset);
            stop.setAttribute("stop-color", color);
            glossy.appendChild(stop);
        });

        defs.appendChild(glossy);

        // Glow filter
        const glowFilter = document.createElementNS("http://www.w3.org/2000/svg", "filter");
        glowFilter.setAttribute("id", "barGlow");
        glowFilter.setAttribute("x", "-50%");
        glowFilter.setAttribute("y", "-50%");
        glowFilter.setAttribute("width", "200%");
        glowFilter.setAttribute("height", "200%");

        const dropShadow = document.createElementNS("http://www.w3.org/2000/svg", "feDropShadow");
        dropShadow.setAttribute("dx", "0");
        dropShadow.setAttribute("dy", "0");
        dropShadow.setAttribute("stdDeviation", "4");
        dropShadow.setAttribute("flood-color", "#fff");
        dropShadow.setAttribute("flood-opacity", "0.3");

        glowFilter.appendChild(dropShadow);
        defs.appendChild(glowFilter);

        svg.appendChild(defs);
    }

    const maxY = 110;
    const barWidth = 10;
    const groupSpacing = 10;
    const barSpacing = 20;
    const padding = 40;
    const maxPoints = 20;
    const datasetCount = 4;

    document.querySelectorAll('svg[id^="chart_"]').forEach(svg => {
        addGradient(svg);
        const colors = Array.from({ length: datasetCount }, () => "url(#gradientActivity)");
        const width = svg.viewBox.baseVal.width || svg.clientWidth;
        const height = svg.viewBox.baseVal.height || svg.clientHeight;
        const stepX = ((width - 2 * padding) / maxPoints);

        const datasets = Array.from({ length: datasetCount }, () =>
            Array.from({ length: maxPoints }, () => Math.random() * 100 + 10)
        );

        function drawAxes() {
            const createLine = (x1, y1, x2, y2) => {
                const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
                line.setAttribute("x1", x1);
                line.setAttribute("y1", y1);
                line.setAttribute("x2", x2);
                line.setAttribute("y2", y2);
                line.setAttribute("stroke", "#ccc");
                line.setAttribute("stroke-width", "1");
                return line;
            };

            svg.appendChild(createLine(padding, height - padding, width - padding, height - padding)); // X-axis
            svg.appendChild(createLine(padding, padding, padding, height - padding)); // Y-axis
        }

        const barGroups = Array.from({ length: maxPoints }, () => {
            const group = document.createElementNS("http://www.w3.org/2000/svg", "g");
            svg.appendChild(group);
            return group;
        });

        function drawBars() {
            barGroups.forEach((group, index) => {
                group.innerHTML = "";
                datasets.forEach((dataSet, dIndex) => {
                    const val = dataSet[index];
                    const barHeight = (val / maxY) * (height - 2 * padding);
                    const x = padding + index * stepX + dIndex * (barWidth + 2);
                    const y = height - padding - barHeight;

                    const rect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
                    rect.setAttribute("x", x);
                    rect.setAttribute("y", y);
                    rect.setAttribute("width", barWidth);
                    rect.setAttribute("height", barHeight);
                    rect.setAttribute("fill", colors[dIndex]);
                    rect.setAttribute("filter", "url(#barGlow)");
                    group.appendChild(rect);

                    // Add glossy overlay
                    const gloss = document.createElementNS("http://www.w3.org/2000/svg", "rect");
                    gloss.setAttribute("x", x);
                    gloss.setAttribute("y", y);
                    gloss.setAttribute("width", barWidth);
                    gloss.setAttribute("height", barHeight);
                    gloss.setAttribute("fill", "url(#glossyLight)");
                    group.appendChild(gloss);
                });
            });
        }

        function updateData() {
            datasets.forEach(dataSet => {
                dataSet.push(Math.random() * 100 + 10);
                if (dataSet.length > maxPoints) dataSet.shift();
            });
            drawBars();
        }

        function animate() {
            updateData();
            setTimeout(() => requestAnimationFrame(animate), 800);
        }

        drawAxes();
        drawBars();
        animate();
    });
}
// Animated Group Bar Chart forEach() Deep color bar
export function initializeDeepColorBarChart(){
    function addGradient(svg) {
        const defs = document.createElementNS("http://www.w3.org/2000/svg", "defs");
        const linearGradient = document.createElementNS("http://www.w3.org/2000/svg", "linearGradient");
        linearGradient.setAttribute("id", "gradientActivity");
        linearGradient.setAttribute("x1", "0");
        linearGradient.setAttribute("y1", "0");
        linearGradient.setAttribute("x2", "0");
        linearGradient.setAttribute("y2", "1");

        // Add multiple color stops
        const stops = [
            { offset: "10%", color: "#4e73df", opacity: 1 },        // Indigo-blue
            { offset: "25%", color: "#e91e63", opacity: 1 },       // Pink
            { offset: "66%", color: "#008982" , opacity: 1 },       // Teal-green
            { offset: "100%", color: "rgba(34,139,34,0)", opacity: 0.9 } // Fade out
        ];

        stops.forEach(({ offset, color }) => {
            const stop = document.createElementNS("http://www.w3.org/2000/svg", "stop");
            stop.setAttribute("offset", offset);
            stop.setAttribute("stop-color", color);
            linearGradient.appendChild(stop);
        });

        defs.appendChild(linearGradient);
        svg.appendChild(defs);
    }
    
    const maxY = 110;
    const barWidth = 10;
    const groupSpacing = 10;
    const barSpacing = 20;
    const padding = 40;
    const maxPoints = 20;
    const datasetCount = 4;

    // Loop through all SVGs that match chart_*
    document.querySelectorAll('svg[id^="deepColorChart_"]').forEach(svg => {
        addGradient(svg);
        // const colors = ["#4e73df", "#e91e63", "#008982", "url(#gradientActivity)"];
        const colors = Array.from({ length: datasetCount }, () => "url(#gradientActivity)");
        const width = svg.viewBox.baseVal.width || svg.clientWidth;
        const height = svg.viewBox.baseVal.height || svg.clientHeight;
        const stepX = ((width - 2 * padding) / maxPoints);

        // Create random data
        const datasets = Array.from({ length: datasetCount }, () =>
            Array.from({ length: maxPoints }, () => Math.random() * 100 + 10)
        );

        // Draw axes
        function drawAxes() {
            const createLine = (x1, y1, x2, y2) => {
                const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
                line.setAttribute("x1", x1);
                line.setAttribute("y1", y1);
                line.setAttribute("x2", x2);
                line.setAttribute("y2", y2);
                line.setAttribute("stroke", "#ccc");
                line.setAttribute("stroke-width", "1");
                return line;
            };

            svg.appendChild(createLine(padding, height - padding, width - padding, height - padding)); // X-axis
            svg.appendChild(createLine(padding, padding, padding, height - padding)); // Y-axis
        }

        // Draw bars
        const barGroups = Array.from({ length: maxPoints }, () => {
            const group = document.createElementNS("http://www.w3.org/2000/svg", "g");
            svg.appendChild(group);
            return group;
        });

        function drawBars() {
            barGroups.forEach((group, index) => {
                group.innerHTML = "";
                datasets.forEach((dataSet, dIndex) => {
                    const val = dataSet[index];
                    const barHeight = (val / maxY) * (height - 2 * padding);
                    const x = padding + index * stepX + dIndex * (barWidth + 2);
                    const y = height - padding - barHeight;

                    const rect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
                    rect.setAttribute("x", x);
                    rect.setAttribute("y", y);
                    rect.setAttribute("width", barWidth);
                    rect.setAttribute("height", barHeight);
                    rect.setAttribute("fill", colors[dIndex]);
                    group.appendChild(rect);
                });
            });
        }

        // Update + Animate
        function updateData() {
            datasets.forEach(dataSet => {
                dataSet.push(Math.random() * 100 + 10);
                if (dataSet.length > maxPoints) dataSet.shift();
            });
            drawBars();
        }

        function animate() {
            updateData();
            setTimeout(() => requestAnimationFrame(animate), 800);
        }

        drawAxes();
        drawBars();
        animate();
    });
}
// Animated Group Bar Chart not forEach()
export function initializeCommonBarCharts(chartId){
    const svg = document.getElementById(chartId);
    const width = svg.viewBox.baseVal.width || svg.clientWidth;
    const height = svg.viewBox.baseVal.height || svg.clientHeight;
    const padding = 40;
    const maxPoints = 20;
    const datasetCount = 4;
    const colors = ["#2196f3", "#e91e63", "#4caf50", "#ff9800"];
    const maxY = 110;
    const barWidth = 10;
    const groupSpacing = 10;
    const barSpacing = 20;

    const stepX = ((width - 2 * padding) / maxPoints);

    // Initialize datasets
    const datasets = Array.from({ length: datasetCount }, () =>
    Array.from({ length: maxPoints }, () => Math.random() * 100 + 25)
    );

    // Axis drawing
    function drawAxes() {
        const xAxis = document.createElementNS("http://www.w3.org/2000/svg", "line");
        xAxis.setAttribute("x1", padding);
        xAxis.setAttribute("y1", height - padding);
        xAxis.setAttribute("x2", width - padding);
        xAxis.setAttribute("y2", height - padding);
        xAxis.setAttribute("class", "axis");
        svg.appendChild(xAxis);

        const yAxis = document.createElementNS("http://www.w3.org/2000/svg", "line");
        yAxis.setAttribute("x1", padding);
        yAxis.setAttribute("y1", padding);
        yAxis.setAttribute("x2", padding);
        yAxis.setAttribute("y2", height - padding);
        yAxis.setAttribute("class", "axis");
        svg.appendChild(yAxis);

        for (let i = 0; i <= 5; i++) {
            const yVal = i * (maxY / 5);
            const y = height - padding - (yVal / maxY) * (height - 2 * padding);

            const label = document.createElementNS("http://www.w3.org/2000/svg", "text");
            label.setAttribute("x", padding - 10);
            label.setAttribute("y", y + 4);
            label.setAttribute("text-anchor", "end");
            label.setAttribute("class", "label");
            //label.textContent = yVal.toFixed(0);
            svg.appendChild(label);
        }
    }

    // Create groups for bars
    const barGroups = Array.from({ length: maxPoints }, () => {
        const group = document.createElementNS("http://www.w3.org/2000/svg", "g");
        group.setAttribute("class", "bar-group");
        svg.appendChild(group);
        return group;
    });

    // Draw bars
    function drawBars() {
        barGroups.forEach((group, index) => {
            group.innerHTML = "";
            datasets.forEach((dataSet, dIndex) => {
            const val = dataSet[index];
            const barHeight = (val / maxY) * (height - 2 * padding);
            const x = padding + index * stepX + dIndex * (barWidth + barSpacing);
            const y = height - padding - barHeight;

            const rect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
            rect.setAttribute("x", x);
            rect.setAttribute("y", y);
            rect.setAttribute("width", barWidth);
            rect.setAttribute("height", barHeight);
            rect.setAttribute("fill", colors[dIndex]);
            group.appendChild(rect);
            });
        });
    }

    // Update data
    function updateData() {
        datasets.forEach(dataSet => {
            dataSet.push(Math.random() * 100 + 25);
            if (dataSet.length > maxPoints) dataSet.shift();
        });
        drawBars();
    }

    // Animate
    function animate() {
        updateData();
        setTimeout(() => requestAnimationFrame(animate), 600);
    }

    // Run
    drawAxes();
    drawBars();
    animate();
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
// Drag and Drop Card default move
export function initDragAndDrop(column, cardKey, row){
    const dragRow = document.querySelector(row);
    const columns = Array.from(document.querySelectorAll(column));
    let draggedCard = null;

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
            savedOrder.forEach((cardKey, index) => {
                const card = document.getElementById(cardKey);
                if (card && columns[index]) {
                columns[index].appendChild(card);
                }
            });
        }
    }

    // Load saved order on page load
    loadCardOrder();

    // Enable drag events
    const cards = document.querySelectorAll(cardKey);

    cards.forEach(card => {
        card.addEventListener('dragstart', () => {
            draggedCard = card;
            setTimeout(() => {
                card.style.display = 'none';
            }, 0);
        });

        card.addEventListener('dragend', () => {
            draggedCard.style.display = 'block';
            draggedCard = null;
        });
    });

    columns.forEach(column => {
        column.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        column.addEventListener('dragenter', (e) => {
            e.preventDefault();
            column.style.backgroundColor = '#fff';
        });

        column.addEventListener('dragleave', () => {
            column.style.backgroundColor = '#fff';
        });

        column.addEventListener('drop', () => {
            if (!draggedCard) return;

            const targetCard = column.querySelector(cardKey);
            const fromColumn = draggedCard.parentElement;

            if (targetCard && targetCard !== draggedCard) {
                column.replaceChild(draggedCard, targetCard);
                fromColumn.appendChild(targetCard);
            }

            column.style.backgroundColor = '#fff';
            saveCardOrder(); // Save after each drop
        });
    });
}