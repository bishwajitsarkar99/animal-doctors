// Load from sessionStorage or initialize fresh
let AppRAM = sessionStorage.getItem("AppRAM")
    ? JSON.parse(sessionStorage.getItem("AppRAM"))
    : {
        // Branches Flag
        branchTypeFlags: false,
        branchCategoryFlags: false,
        branchSearchFlags: false,
        // Branches Data Array and Object
        branchDetails: {},
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
        lastFetchTime: null,
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
    sessionStorage.setItem("AppRAM", JSON.stringify(AppRAM));
}

// Update multiple keys
function updateAppRAMBulk(obj = {}) {
    Object.entries(obj).forEach(([key, value]) => {
        AppRAM[key] = value;
    });
    sessionStorage.setItem("AppRAM", JSON.stringify(AppRAM));
}

// Clear everything
function clearAppRAM() {
    sessionStorage.removeItem("AppRAM");
    AppRAM = {};
}

// ✅ Export
export {
    getAppRAM,
    updateAppRAM,
    updateAppRAMBulk,
    clearAppRAM
};