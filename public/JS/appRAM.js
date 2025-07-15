// Load from sessionStorage or initialize fresh
window.AppRAM = sessionStorage.getItem("AppRAM")
    ? JSON.parse(sessionStorage.getItem("AppRAM"))
    : {
        // Branches Flag
        hasFetchedBranchTypes: false,
        hasFetchedBranchCategories: false,
        hasFetchedBranchSearch: false,
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

// Get Data Safely
window.getAppRAM = function (key, fallback = null) {
    return window.AppRAM.hasOwnProperty(key) ? window.AppRAM[key] : fallback;
};
// Update AppRAM and sync to sessionStorage
window.updateAppRAM = function (key, value) {
    window.AppRAM[key] = value;
    sessionStorage.setItem("AppRAM", JSON.stringify(window.AppRAM));
};

// Optional helper: set multiple keys
window.updateAppRAMBulk = function (obj = {}) {
    Object.entries(obj).forEach(([key, value]) => {
        window.AppRAM[key] = value;
    });
    sessionStorage.setItem("AppRAM", JSON.stringify(window.AppRAM));
};

// Clear everything from memory + sessionStorage
window.clearAppRAM = function () {
    sessionStorage.removeItem("AppRAM");
    window.AppRAM = {};
};