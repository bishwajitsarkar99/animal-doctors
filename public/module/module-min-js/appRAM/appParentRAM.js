// Load from localStorage or initialize fresh
let AppRAM = localStorage.getItem("AppRAM")
    ? JSON.parse(localStorage.getItem("AppRAM"))
    : {
        // Branches Flag
        branchTypeFlags: false,
        branchCategoryFlags: false,
        branchSearchFlags: false,
        // Branches Data Array and Object
        branchDetails: {},
        branchCategoryDetails: {},
        branchTypes: [],
        branchCategories: [],
        branchSearchResults: [],

        // Suppliers Flag
        hasFetchedSuppliers: false,
        // Suppliers Data Array and Object
        supplierList: [],
        supplierDetails: {},

        // Users Flag
        hasFetchedUsers: false,
        // Users Data Array and Object
        userList: [],
        userDetails: {},

        // Roles & Permissions Data Array
        roles: [],
        permissions: [],

        // Misc Flag
        lastFetchTime: Date.now(),
        // Misc Data Object
        currentUser: {},
        tempFormData: {},
    };

// Get single key
function getAppRAM(key, fallback = null) {
    return AppRAM.hasOwnProperty(key) ? AppRAM[key] : fallback;
}

// Update single key
function updateAppRAM(key, value) {
    AppRAM[key] = value;
    localStorage.setItem("AppRAM", JSON.stringify(AppRAM));
}

// Update multiple keys
function updateAppRAMBulk(obj = {}) {
    Object.entries(obj).forEach(([key, value]) => {
        AppRAM[key] = value;
    });
    localStorage.setItem("AppRAM", JSON.stringify(AppRAM));
}

// Clear everything
function clearAppRAM() {
    localStorage.removeItem("AppRAM");
    AppRAM = {};
}

// Export
export {
    getAppRAM,
    updateAppRAM,
    updateAppRAMBulk,
    clearAppRAM
};