// ========== Global RAM Storage System ==============================================
// ===================================================================================
function getUserRAMKey() {
    const role = document.querySelector('meta[name="user-role"]')?.content || 'guest';
    const branch_id = document.querySelector('meta[name="branch-id"]')?.content || 'identifyer';
    const email = document.querySelector('meta[name="user-email"]')?.content || 'unknown';
    const safeEmail = email.replace(/[^a-zA-Z0-9]/g, '_');
    const moduleName = 'BackendModule';
    return `ApplicationRAM_${moduleName}_${branch_id}_${role}_${safeEmail}`;
}
// Array Store RAM Path
export function getRAM(DataTable, key = null) {
    const fullData = JSON.parse(localStorage.getItem(getUserRAMKey()) || '{}');
    const tableData = fullData[DataTable] || {};
    return key ? tableData[key] : tableData;
}
// Array Store Table Data
export function setRAM(DataTable, key, value) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(localStorage.getItem(storageKey) || '{}');
    fullData[DataTable] = fullData[DataTable] || {};
    fullData[DataTable][key] = value;
    localStorage.setItem(storageKey, JSON.stringify(fullData));
}
// Remove Array Table Data
export function removeRAM(DataTable) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(localStorage.getItem(storageKey) || '{}');
    delete fullData[DataTable];
    localStorage.setItem(storageKey, JSON.stringify(fullData));
}