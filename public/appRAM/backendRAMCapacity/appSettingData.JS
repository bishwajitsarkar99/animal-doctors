// User Key
function getUserRAMKey() {
    const role = document.querySelector('meta[name="user-role"]')?.content || 'guest';
    const branch_id = document.querySelector('meta[name="branch-id"]')?.content || 'identifyer';
    const email = document.querySelector('meta[name="user-email"]')?.content || 'unknown';
    const safeEmail = email.replace(/[^a-zA-Z0-9]/g, '_');
    return `AppBackendRAM_${branch_id}_${role}_${safeEmail}`;
}

// Load RAM from localStorage or init new
let AppBackendRAM = localStorage.getItem(getUserRAMKey())
    ? JSON.parse(localStorage.getItem(getUserRAMKey()))
    : {
        // Branch Setting Data
        branchTypeFlags: false,
        branchCategoryFlags: false,
        branchSearchFlags: false,
        branchDetails: {},
        branchCategoryDetails: {},
        branchTypes: [],
        branchCategories: [],
        branchSearchResults: [],

        // Supplier Setting Data
        hasFetchedSuppliers: false,
        supplierList: [],
        supplierDetails: {},

        // Auth User Setting Data
        hasFetchedUsers: false,
        userList: [],
        userDetails: {},
        // Role
        roles: [],
        permissions: [],

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
function updateAppRAMBulk(obj = {}) {
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

export {
    getAppRAM,
    updateAppRAM,
    updateAppRAMBulk,
    clearAppRAM,
    clearAllAppRAM
};