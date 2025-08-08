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
    };
// data get
function getAppRAM(key, fallback = null) {
    return AppBackendRAM.hasOwnProperty(key) ? AppBackendRAM[key] : fallback;
}
// single data update
function updateAppRAM(key, value) {
    AppBackendRAM[key] = value;
    AppBackendRAM[`${key}_lastFetchTime`] = Date.now();
    localStorage.setItem(getUserRAMKey(), JSON.stringify(AppBackendRAM));
}
// multi data update
function updateAppRAMTable(obj = {}) {
    Object.entries(obj).forEach(([key, value]) => {
        AppBackendRAM[key] = value;
        AppBackendRAM[`${key}_lastFetchTime`] = Date.now();
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
        AppBackendRAM[`${key}_lastFetchTime`] = Date.now();
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
// RAM DATA GET
function getAllRAMUsageStats(sortBy = null) {
    const results = [];

    for (const RAM_key in AppBackendRAM) {
        if (RAM_key.endsWith('_lastFetchTime')) continue;

        const data = AppBackendRAM[RAM_key];
        const sizeBytes = new Blob([JSON.stringify(data)]).size;
        const Size = formatSize(sizeBytes);

        const fetchTimeKey = `${RAM_key}_lastFetchTime`;
        const timestamp = AppBackendRAM[fetchTimeKey] || 0;
        const diffMs = Date.now() - timestamp;
        const Time = timestamp ? formatFetchTimeMs(diffMs) : 'N/A';

        results.push({
            RAM_key,
            Size,
            Time,
            _rawSize: sizeBytes,
            _timestamp: timestamp
        });
    }

    // Optional sorting
    if (sortBy === 'size') {
        results.sort((a, b) => b._rawSize - a._rawSize);
    } else if (sortBy === 'time') {
        results.sort((a, b) => b._timestamp - a._timestamp);
    }

    // Clean internal fields before returning
    return results.map(({ RAM_key, Size, Time }) => ({ RAM_key, Size, Time }));
}
// RAM DATA SORT
function renderRAMUsage(sortBy = null) {
    const data = getAllRAMUsageStats(sortBy);
    const tableBody = document.querySelector("#ramUsageTable tbody");

    if (!tableBody) return;

    // Clear existing rows
    tableBody.innerHTML = "";

    // Inject rows
    data.forEach(({ RAM_key, Size, Time }) => {
        const row = document.createElement("tr");

        row.innerHTML = `
            <td class="semi-small-td" <div class="score-row-resizer"></div></td>
            <td class="semi-small-td" style="word-break: break-all;">${RAM_key}<div class="score-row-resizer"></div></td>
            <td class="semi-small-td">
                <div class="progress-line-wrapper">
                    <svg viewBox="0 0 100 20" width="100%" height="20" preserveAspectRatio="none">
                        <!-- Overlay path -->
                        <path d="M 0 10 H 100" stroke="blue" stroke-width="1" opacity="0.5" />

                        <!-- Dashed progress line with animation -->
                        <line x1="0" y1="10" x2="100" y2="10"
                        stroke="#0026fc2d"
                        stroke-width="20"
                        stroke-dasharray="10,5"
                        marker-end="url(#arrow1)">
                        <animate attributeName="stroke-dashoffset"
                            from="0" to="-30"
                            dur="2s"
                            repeatCount="indefinite" />
                        </line>
                        <!-- KB Text background box -->
                        <rect x="8" y="3" rx="3" ry="3" width="30" height="15" fill="springgreen" filter="url(#shadow)" opacity="0.8" />

                        <!-- KB Text -->
                        <text x="23" y="13" text-anchor="middle" fill="#000" font-size="7" font-weight="600" id="branchCategorySizeText"></text>

                        <!-- Mili Second Text background box -->
                        <rect x="50" y="3" rx="3" ry="3" width="35" height="15" fill="blue" filter="url(#shadow)" opacity="0.5" />

                        <!-- Mili Second Text -->
                        <text x="67" y="13" text-anchor="middle" fill="#fff" font-size="8" font-weight="300" id="branchCategoryTimeText"></text>

                        <!-- Arrow marker definition -->
                        <defs>
                        <marker id="arrow1" viewBox="0 0 10 10" refX="10" refY="5"
                            markerWidth="10" markerHeight="20" orient="auto">
                            <path d="M 0 0 L 10 5 L 0 10 z" fill="rgba(9, 0, 128, 0.3)" opacity="0.5" />
                        </marker>
                        </defs>
                    </svg>
                </div>
                <div class="score-row-resizer"></div>
            </td>
            <td class="semi-small-td">${Size}<div class="score-row-resizer"></div></td>
            <td class="semi-small-td">${Time}<div class="score-row-resizer"></div></td>
        `;

        tableBody.appendChild(row);
    });
}
// Expose to global scope
window.renderRAMUsage = renderRAMUsage;
export {
    getAppRAM,
    updateAppRAM,
    updateAppRAMBulk,
    updateAppRAMTable,
    clearAppRAM,
    clearAllAppRAM,
    clearBranchListCache,
    renderRAMUsage
};