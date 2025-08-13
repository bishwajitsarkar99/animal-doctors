// User Key
function getUserRAMKey() {
    const role = document.querySelector('meta[name="user-role"]')?.content || 'guest';
    const branch_id = document.querySelector('meta[name="branch-id"]')?.content || 'identifier';
    const email = document.querySelector('meta[name="user-email"]')?.content || 'unknown';
    const safeEmail = email.replace(/[^a-zA-Z0-9]/g, '_');
    const moduleName = 'Branch-Section'; // TODO: make dynamic if needed
    return `AppBackendRAM_${moduleName}_${branch_id}_${role}_${safeEmail}`;
}

// Measure RAM Usage Per User Key
export function getUsageRAMMeasurement() {
    const keys = Object.keys(localStorage);
    const storageReport = [];

    keys.forEach(key => {
        if (key.startsWith("AppBackendRAM_")) {
            const value = localStorage.getItem(key) || '';
            const bytes = new Blob([value]).size;
            storageReport.push({
                key,
                bytes,
                kb: (bytes / 1024).toFixed(2),
                mb: (bytes / (1024 * 1024)).toFixed(4)
            });
        }
    });

    const totalBytes = storageReport.reduce((sum, item) => sum + item.bytes, 0);

    return {
        storageReport,
        totalKB: (totalBytes / 1024).toFixed(2),
        totalMB: (totalBytes / (1024 * 1024)).toFixed(3)
    };
}

// Render RAM Usage Report
export function renderRAM(containerId) {
    const { totalKB, totalMB } = getUsageRAMMeasurement();
    const limitMB = 10; // 10 MB limit
    const usagePercent = Math.min((parseFloat(totalMB) / limitMB) * 100, 100);

    let html  = `
        <div>
            <div style="background:#e9ecef; border-radius:6px; height:5px; margin-top:0px; overflow:hidden;">
                <div style="
                    width:${usagePercent}%;
                    background:${usagePercent > 80 ? '#dc3545' : usagePercent > 50 ? '#ffc107' : '#28a745'};
                    height:100%;
                    transition: width 0.4s ease;
                "></div>
            </div>
            <span><strong>Use </strong> ${totalKB} KB (~${totalMB} MB) Out Of 10 MB</span>
        </div>
    `;
    const textContainer = document.getElementById(containerId);
    
    
    if (textContainer) textContainer.innerHTML = html;
}