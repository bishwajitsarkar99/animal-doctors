// Disable Right-Click Context Menu
export function browserInspect() {
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