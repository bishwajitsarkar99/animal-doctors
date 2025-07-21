// Helper function to calculate time difference
export const getTimeDifference = (startDate) => {
    const currentDate = new Date();
    const start = new Date(startDate);

    // Total difference in milliseconds
    const diffMs = currentDate - start;

    // Calculate the difference in months
    let months = currentDate.getMonth() - start.getMonth() +
    (12 * (currentDate.getFullYear() - start.getFullYear()));

    // Adjust for days when the start date is later in the month than the current date
    if (currentDate.getDate() < start.getDate()) {
        months -= 1;
    }

    // Calculate the difference in days
    let days = currentDate.getDate() - start.getDate();
    if (days < 0) {
        // Get the number of days in the previous month
        const previousMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0);
        days += previousMonth.getDate();
    }

    // Calculate the difference in hours and minutes
    const diffHrs = Math.floor((diffMs % 86400000) / 3600000);  // hours
    const diffMins = Math.floor(((diffMs % 86400000) % 3600000) / 60000);  // minutes

    // Construct the final output string
    let result = '';
    if (months > 0) result += `${months} months `;
    if (days > 0) result += `${days} days `;
    if (diffHrs > 0) result += `${diffHrs} hrs `;
    result += `${diffMins} mins`;

    return result.trim();  // Trim to remove any extra spaces
};
// Helper function for date formate with time
export const formatDate = (dateString) => {
    const date = new Date(dateString);
    // Format date
    const options = {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: true
    };
    return date.toLocaleString('en-US', options);
};
export const modernDateFormat = (dateString) => {
    const date = new Date(dateString);

    const day = String(date.getDate()).padStart(2, '0');
    const month = date.toLocaleString('en-US', { month: 'short' });
    const year = date.getFullYear();

    let hours = date.getHours();
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const seconds = String(date.getSeconds()).padStart(2, '0');
    const ampm = hours >= 12 ? 'PM' : 'AM';

    hours = hours % 12;
    hours = hours ? hours : 12; // Convert 0 to 12
    const formattedTime = `${hours}:${minutes}:${seconds} ${ampm}`;

    return `${day}-${month}-${year}, ${formattedTime}`;
};
// Helper Current Date
export function currentDate() {
    // Get current date
    var today = new Date();
    var day = String(today.getDate()).padStart(2, '0');
    var month = today.getMonth();
    var yyyy = today.getFullYear();
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var monthName = monthNames[month];

    return `${day}-${monthName}-${yyyy}`;
}
// Helper function for date formate(with month name) without time
export function newFormatDate(newDateString) {
    var date = new Date(newDateString);
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    day = day < 10 ? '0' + day : day;
    var monthName = monthNames[month];

    return day + '-' + monthName + '-' + year;
}
// Helper function for general number format
export function formatNumber(value) {
    return parseInt(value).toLocaleString('en-IN');
}
// Helper function for number counter
export function numberCounter(){
    let interval = 4000;
    let displayvalue = document.querySelectorAll(".num");

    displayvalue.forEach((valuedisplay)=>{
        let startvalue =0;
        let endvalue = parseInt(valuedisplay.getAttribute("data-val"))
        let duration = Math.floor(interval/endvalue)
        let counter = setInterval(function(){
            startvalue +=1
            valuedisplay.textContent= startvalue;
            if(startvalue==endvalue){
                clearInterval(counter);
            }
        },duration);
    });
}
// switch on/off----- off/on label show
export function mySrcFunction() {
    var x = document.getElementById("search_off");
    if (x.innerHTML === "OFF") {
        x.innerHTML = "<span style='color:darkcyan;'>ON</span>";
    } else {
        x.innerHTML = "OFF";
    }
}
// switch Lock/Unlock----- label show
export function myLockFunction() {
    var x = document.getElementById("lock_label");
    if (x.innerHTML === "Unlock") {
        x.innerHTML = "<span style='color:orangered;'>Lock</span>";
    } else {
        x.innerHTML = "Unlock";
    }
}
// ACtive table row background
export function activeTableRow(element){
    $(element).addClass("clicked").siblings().removeClass("clicked");
}
// ACtive table row background
export function editTableRowSinge(element){
    $(element).addClass("active-row").siblings().removeClass("active-row");
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