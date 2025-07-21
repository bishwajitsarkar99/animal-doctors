// User Key
function getUserRAMKey() {
    const role = document.querySelector('meta[name="user-role"]')?.content || 'guest';
    const branch_id = document.querySelector('meta[name="branch-id"]')?.content || 'identifyer';
    const email = document.querySelector('meta[name="user-email"]')?.content || 'unknown';
    const safeEmail = email.replace(/[^a-zA-Z0-9]/g, '_');
    return `AppRAM_${branch_id}_${role}_${safeEmail}`;
}

// Load RAM from localStorage or init new
let AppRAM = localStorage.getItem(getUserRAMKey())
    ? JSON.parse(localStorage.getItem(getUserRAMKey()))
    : {
        // Store Branch List Data
        branchListData: {},

        // Current Fetch Time
        lastFetchTime: Date.now(),
        currentUser: {},
    };

// data get
function getAppRAM(key, fallback = null) {
    return AppRAM.hasOwnProperty(key) ? AppRAM[key] : fallback;
}
// single data update
function updateAppRAM(key, value) {
    AppRAM[key] = value;
    localStorage.setItem(getUserRAMKey(), JSON.stringify(AppRAM));
}
// multi data update
function updateAppRAMBulk(obj = {}) {
    Object.entries(obj).forEach(([key, value]) => {
        AppRAM[key] = value;
    });
    localStorage.setItem(getUserRAMKey(), JSON.stringify(AppRAM));
}
// current user cache clear
function clearAppRAM() {
    localStorage.removeItem(getUserRAMKey());
    AppRAM = {};
}
// all user cache clear
function clearAllAppRAM() {
    Object.keys(localStorage).forEach(key => {
        if (key.startsWith('AppRAM_')) {
            localStorage.removeItem(key);
        }
    });
}

export {
    getAppRAM,
    updateAppRAM,
    updateAppRAMBulk,
    clearAppRAM,
    clearAllAppRAM
};