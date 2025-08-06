// User Key
function getUserRAMKey() {
    const role = document.querySelector('meta[name="user-role"]')?.content || 'guest';
    const branch_id = document.querySelector('meta[name="branch-id"]')?.content || 'identifyer';
    const email = document.querySelector('meta[name="user-email"]')?.content || 'unknown';
    const safeEmail = email.replace(/[^a-zA-Z0-9]/g, '_');
    const moduleName = '{Branch-Section}';
    return `AppBackendRAM_${moduleName}_${branch_id}_${role}_${safeEmail}`;
}

// Load RAM from localStorage or init new
let AppBackendRAM = localStorage.getItem(getUserRAMKey())
    ? JSON.parse(localStorage.getItem(getUserRAMKey()))
    : {
        // Branch Setting Data
        branchTypeFlags: false,
        branchTypes: [],
        branchCategoryFlags: false,
        branchCategories: [],
        branchSearchFlags: false,
        branchSearchResults: [],
        branchDetails: {},
        branchCategoryDetails: {},
        branchListData: {},

        // Last Update Fetch Data Time 
        lastFetchTime: Date.now(),
        currentUser: {},
        tempFormData: {},
    };
// data get
function getAppRAM(key, fallback = null) {
    return AppBackendRAM.hasOwnProperty(key) ? AppBackendRAM[key] : fallback;
}
// single data update
function updateAppRAM(key, value) {
    AppBackendRAM[key] = value;
    localStorage.setItem(getUserRAMKey(), JSON.stringify(AppBackendRAM));
}
// multi data update
// function updateAppRAMBulk(obj = {}) {
//     Object.entries(obj).forEach(([key, value]) => {
//         AppBackendRAM[key] = value;
//     });
//     localStorage.setItem(getUserRAMKey(), JSON.stringify(AppBackendRAM));
// }
function updateAppRAMBulk(obj = {}) {
    if (typeof obj !== 'object' || obj === null || Array.isArray(obj)) {
        console.error("updateAppRAMBulk expects a plain object. Received:", obj);
        return;
    }
    Object.entries(obj).forEach(([key, value]) => {
        AppBackendRAM[key] = value;
    });
    localStorage.setItem(getUserRAMKey(), JSON.stringify(AppBackendRAM));
}
// current user cache clear
function clearAppRAM() {
    localStorage.removeItem(getUserRAMKey());
    AppBackendRAM = {};
}
// all user cache clear
function clearAllAppRAM() {
    Object.keys(localStorage).forEach(key => {
        if (key.startsWith('AppBackendRAM_')) {
            localStorage.removeItem(key);
        }
    });
}
// Only Branch List Data Clear
function clearBranchListCache() {
    for (const key in AppBackendRAM) {
        if (key.startsWith('branchListData_')) {
            delete AppBackendRAM[key];
        }
    }
    localStorage.setItem(getUserRAMKey(), JSON.stringify(AppBackendRAM));
}

export {
    getAppRAM,
    updateAppRAM,
    updateAppRAMBulk,
    clearAppRAM,
    clearAllAppRAM,
    clearBranchListCache
};