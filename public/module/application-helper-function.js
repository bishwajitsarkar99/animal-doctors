// Page loader helper function
export function pageLoader() {
    window.addEventListener('load', function() {
        const loader = document.querySelector(".loader-login");
        const loaderModalElement = document.getElementById('loaderModalForm');
        
        if (loader && loaderModalElement) {
            const loaderModal = new bootstrap.Modal(loaderModalElement);
    
            loaderModal.show();
            loader.classList.add("log_close");
            setTimeout(function() {
                loaderModal.hide();
            }, 1000);
        }
    });
}
// Disable Right-Click Context Menu
export function browserInpect() {
    document.addEventListener("DOMContentLoaded", function() {
        // Disable right-click context menu
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        });
    
        // Disable specific keyboard shortcuts
        document.onkeydown = function(e) {
            if (e.keyCode == 123) { // F12 key
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode === 'I'.charCodeAt(0)) { // Ctrl+Shift+I
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode === 'J'.charCodeAt(0)) { // Ctrl+Shift+J
                return false;
            }
            if (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0)) { // Ctrl+U
                return false;
            }
        };
    });
}
// tooltip helper function
export function toolTip() {
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
}