// User Key
function getUserRAMKey() {
    const role = document.querySelector('meta[name="user-role"]')?.content || 'guest';
    const email = document.querySelector('meta[name="user-email"]')?.content || 'unknown';
    const safeEmail = email.replace(/[^a-zA-Z0-9]/g, '_');
    return `AppRAM_${role}_${safeEmail}`;
}

// Load RAM from localStorage or init new
let AppRAM = localStorage.getItem(getUserRAMKey())
    ? JSON.parse(localStorage.getItem(getUserRAMKey()))
    : {
        branchTypeFlags: false,
        branchCategoryFlags: false,
        branchSearchFlags: false,
        branchDetails: {},
        branchCategoryDetails: {},
        branchTypes: [],
        branchCategories: [],
        branchSearchResults: [],

        hasFetchedSuppliers: false,
        supplierList: [],
        supplierDetails: {},

        hasFetchedUsers: false,
        userList: [],
        userDetails: {},

        roles: [],
        permissions: [],
        lastFetchTime: Date.now(),
        currentUser: {},
        tempFormData: {},
    };

function getAppRAM(key, fallback = null) {
    return AppRAM.hasOwnProperty(key) ? AppRAM[key] : fallback;
}

function updateAppRAM(key, value) {
    AppRAM[key] = value;
    localStorage.setItem(getUserRAMKey(), JSON.stringify(AppRAM));
}

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