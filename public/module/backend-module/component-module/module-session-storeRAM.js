// =================== Table Component ===============================================
// ========== Global RAM Sessopm Storage System ======================================
// ===================================================================================
function getUserRAMKey() {
    const role = document.querySelector('meta[name="user-role"]')?.content || 'guest';
    const branch_id = document.querySelector('meta[name="branch-id"]')?.content || 'identifyer';
    const email = document.querySelector('meta[name="user-email"]')?.content || 'unknown';
    const safeEmail = email.replace(/[^a-zA-Z0-9]/g, '_');
    const moduleName = 'BackendModule';
    return `Application_Session_RAM_${moduleName}_${branch_id}_${role}_${safeEmail}`;
}
// Get RAM value
export function getRAM(DataTable, key = null) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(sessionStorage.getItem(storageKey) || '{}');
    const appSetting = fullData.AppSetting || {};
    const tableData = appSetting[DataTable] || {};
    return key ? tableData[key] : tableData;
}
// Set RAM value
export function setRAM(DataTable, key, value) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(sessionStorage.getItem(storageKey) || '{}');
    fullData.AppSetting = fullData.AppSetting || {};
    fullData.AppSetting[DataTable] = fullData.AppSetting[DataTable] || {};
    fullData.AppSetting[DataTable][key] = value;
    sessionStorage.setItem(storageKey, JSON.stringify(fullData));
}
// Remove specific table from RAM
export function removeRAM(DataTable) {
    const storageKey = getUserRAMKey();
    const fullData = JSON.parse(sessionStorage.getItem(storageKey) || '{}');
    if (fullData.AppSetting && fullData.AppSetting[DataTable]) {
        delete fullData.AppSetting[DataTable];
    }
    sessionStorage.setItem(storageKey, JSON.stringify(fullData));
}
window.addEventListener('beforeunload', () => {
  removeRAM('UserListTable'); // or any other specific table name
});
// clear all session
window.addEventListener('beforeunload', () => {
  sessionStorage.removeItem(getUserRAMKey());
});