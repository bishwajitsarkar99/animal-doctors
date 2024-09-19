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

// Helper function for date formate to full date
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

