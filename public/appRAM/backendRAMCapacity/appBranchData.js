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
function updateAppRAMTable(obj = {}) {
    Object.entries(obj).forEach(([key, value]) => {
        AppBackendRAM[key] = value;
    });
    localStorage.setItem(getUserRAMKey(), JSON.stringify(AppBackendRAM));
}
// multi unique key
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
// Convert bytes to KB/MB readable format
function formatSize(bytes) {
    if (bytes < 1024) return `${bytes} B`;
    else if (bytes < 1024 * 1024) return `${(bytes / 1024).toFixed(2)} KB`;
    else return `${(bytes / (1024 * 1024)).toFixed(2)} MB`;
}

// Convert timestamp to "time ago" string
function formatFetchTimeMs(ms) {
  if (ms < 1000) return `${ms} ms`;
  if (ms < 1_000_000_000) return `${(ms / 1000).toFixed(1)} ms`;
  return `${(ms / 1_000_000_000_000).toFixed(1)} ms`;
}
// Generic: Get table size from RAM
function getTableSize(ramKey) {
    const data = AppBackendRAM[ramKey] || [];
    const sizeBytes = new Blob([JSON.stringify(data)]).size;

    return {
        ramKey,
        size: formatSize(sizeBytes)
    };
}

// Generic: Get last fetch time from RAM
function getLastFetchTime(ramKey) {
  const fetchTimeKey = `${ramKey}_lastFetchTime`;
  const timestamp = AppBackendRAM[fetchTimeKey] || 0;
  const diffMs = Date.now() - timestamp;

  return {
    ramKey,
    fetchTime: formatFetchTimeMs(diffMs)
  };
}

// ========================================
// Branch List Data and Branch Category
// ========================================
// Branch List Table Data Size
function getBranchListTableSize() {
    return getTableSize('branchListData');
}

// Last Branch List Fetch Time
function getBranchListLastFetchTime() {
    return getLastFetchTime('branchListData');
}

// Branch Category Table Data Size
function getBranchCategoryTableSize() {
    return getTableSize('branchCategories');
}

// Last Branch Category Fetch Time
function getBranchCategoryLastFetchTime() {
    return getLastFetchTime('branchCategories');
}

export {
    getAppRAM,
    updateAppRAM,
    updateAppRAMBulk,
    updateAppRAMTable,
    clearAppRAM,
    clearAllAppRAM,
    clearBranchListCache,
    getBranchListTableSize,
    getBranchCategoryTableSize,
    getBranchListLastFetchTime,
    getBranchCategoryLastFetchTime
};