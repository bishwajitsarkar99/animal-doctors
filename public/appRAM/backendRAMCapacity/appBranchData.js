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
  if (ms < 1000000) return `${ms} ms`;
  if (ms < 1_000_000_000_000) return `${(ms / 1000000).toFixed(1)} ms`;
  return `${(ms / 1_000_000_000_000_000).toFixed(1)} ms`;
}
// RAM DATA GET
function getAllRAMUsageStats(sortBy = null) {
    const results = [];
    let totalSizeBytes = 0;

    for (const RAM_key in AppBackendRAM) {
        if (RAM_key.endsWith('_lastFetchTime')) continue;

        const data = AppBackendRAM[RAM_key];
        const sizeBytes = new Blob([JSON.stringify(data)]).size;
        totalSizeBytes += sizeBytes;

        const Size = formatSize(sizeBytes);

        const fetchTimeKey = `${RAM_key}_lastFetchTime`;
        const timestamp = AppBackendRAM[fetchTimeKey] || 0;
        const diffMs = Date.now() - timestamp;
        const Time = timestamp ? formatFetchTimeMs(diffMs) : 'Null';

        results.push({
            RAM_key,
            Size,
            Time,
            _rawSize: sizeBytes,
            _timestamp: timestamp
        });
    }

    if (sortBy === 'size') {
        results.sort((a, b) => b._rawSize - a._rawSize);
    } else if (sortBy === 'time') {
        results.sort((a, b) => b._timestamp - a._timestamp);
    }

    return {
        data: results.map(({ RAM_key, Size, Time }) => ({ RAM_key, Size, Time })),
        totalSize: formatSize(totalSizeBytes)
    };
}
// RAM DATA SORT && Table Render
function renderRAMUsage(sortBy = null) {
    const { data, totalSize } = getAllRAMUsageStats(sortBy);
    const tableBody = document.querySelector("#ramUsageTable tbody");
    const totalSizeElement = document.getElementById("totalRAMSize");

    if (!tableBody) return;
    tableBody.innerHTML = "";

    data.forEach(({ RAM_key, Size, Time }) => {
        const timeMatch = Time.match(/([\d.]+)\s*ms/);
        const timeValue = timeMatch ? parseFloat(timeMatch[1]) : null;

        let speedColor = '';
        let ramColor = '';
        let performanceMode = '';
        let speedMarkupColor = '';
        if (timeValue !== null) {
            if (timeValue >= 10000) {
                speedColor = 'purple';
                performanceMode = 'Slower';
                ramColor = 'rgba(0, 110, 228, 1)';
                speedMarkupColor = 'violet';
            } else if (timeValue >= 5000) {
                speedColor = 'darkblue';
                performanceMode = 'Medium';
                ramColor = 'rgba(0, 110, 228, 1)';
                speedMarkupColor = 'violet';
            } else {
                speedColor = 'green';
                performanceMode = 'Faster';
                ramColor = 'rgba(0, 110, 228, 1)';
                speedMarkupColor = 'violet';
            }
        } else {
            speedColor = 'gray';
            speedMarkupColor = 'violet';
            ramColor = 'rgba(0, 110, 228, 1)';
        }

        const row = document.createElement("tr");
        row.innerHTML = `
            <td class="semi-small-first-cell" style="word-break: break-all;">${RAM_key}<div class="row-resizer"></div></td>
            <td class="semi-small-middle-cell">
                <svg viewBox="0 0 100 20" width="100%" height="20" preserveAspectRatio="none">
                    <path d="M 0 10 H 100" stroke="blue" stroke-width="1" opacity="0.5" />
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

                    <!-- Rect + Text elements -->
                    <rect x="20" y="3" rx="0" ry="0" width="50" height="15" fill="${ramColor}" opacity="0.8" />
                    <text x="22" y="13" text-anchor="left" fill="#fff" font-size="7" font-weight="500"
                        vector-effect="non-scaling-stroke">
                        ${Size}
                    </text>

                    <defs>
                        <marker id="arrow1" viewBox="0 0 10 10" refX="10" refY="5"
                            markerWidth="10" markerHeight="20" orient="auto">
                            <path d="M 0 0 L 10 5 L 0 10 z" fill="rgba(9, 0, 128, 0.3)" opacity="0.5" />
                        </marker>
                    </defs>
                </svg>
                <div class="row-resizer"></div>
            </td>
            <td class="semi-small-middle-cell">
                <svg viewBox="0 0 100 20" width="100%" height="20" preserveAspectRatio="none">
                    <path d="M 0 10 H 100" stroke="blue" stroke-width="1" opacity="0.4" />
                    <line x1="0" y1="10" x2="100" y2="10"
                        stroke="rgba(0, 110, 228, 1)"
                        stroke-width="3"
                        stroke-dasharray="50,5"
                        marker-end="url(#arrow2)">
                        <animate attributeName="stroke-dashoffset"
                        from="0" to="-50"
                        dur="5s"
                        repeatCount="indefinite" />
                    </line>
                    <rect x="20" y="3" rx="0" ry="0" width="50" height="15" fill="${speedColor}" opacity="0.8" />
                    <text x="22" y="13" text-anchor="left" fill="#fff" font-size="7" font-weight="500"
                        vector-effect="non-scaling-stroke">
                        ${performanceMode ? performanceMode : 'Null'}
                    </text>
                    <defs>
                        <marker id="arrow2" viewBox="0 0 10 10" refX="10" refY="5"
                            markerWidth="10" markerHeight="20" orient="auto">
                            <path d="M 0 0 L 10 5 L 0 10 z" fill="orange" opacity="0.5" />
                        </marker>
                    </defs>
                </svg>
                <div class="row-resizer"></div>
            </td>
            <td class="semi-small-last-cell">
                <svg viewBox="0 0 100 20" width="100%" height="20" preserveAspectRatio="none">
                    <path d="M 0 10 H 100" stroke="blue" stroke-width="1" opacity="0.5" />
                    <path d="M 0 10 
                        L 10 10 
                        L 15 5 
                        L 20 15 
                        L 25 10 
                        L 40 10
                        L 45 3 
                        L 50 17
                        L 55 10
                        L 100 10"
                        stroke="rgba(0, 110, 228, 1)"
                        stroke-width="2"
                        fill="none"
                        stroke-dasharray="100, 200"
                        stroke-dashoffset="0" marker-end="url(#arrow3)">
                        <animate attributeName="stroke-dashoffset"
                        from="0" to="-100"
                        dur="5s"
                        repeatCount="indefinite" />
                    </path>
                    <rect x="0" y="3" rx="0" ry="0" width="70" height="15" fill="${speedMarkupColor}" opacity="0.5" />
                    <text x="2" y="13" text-anchor="left" fill="#000" font-size="7" font-weight="500" vector-effect="non-scaling-stroke">
                        ${Time}
                    </text>
                    <defs>
                        <marker id="arrow3" viewBox="0 0 10 10" refX="10" refY="5"
                            markerWidth="15" markerHeight="20" orient="auto">
                            <path d="M 0 0 L 10 5 L 0 10 z" fill="violet" opacity="0.5" />
                        </marker>
                    </defs>
                </svg>
                <div class="row-resizer"></div>
            </td>
        `;
        tableBody.appendChild(row);
    });

    // Show total size outside the table
    if (totalSizeElement) {
        totalSizeElement.textContent = `Branch Module (RAM Size) : ${totalSize}`;
    }
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