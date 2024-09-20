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