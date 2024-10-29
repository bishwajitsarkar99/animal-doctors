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

