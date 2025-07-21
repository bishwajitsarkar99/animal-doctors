// ============================ Application Loader Component ==========================
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
// Image Upload Button loader ---------
export function imageUploadBtnLoader(imageUploadBtn){
    var imageUploadBtn = $("#uploadButton");
    $(imageUploadBtn).on('click', () =>{
        $('.img-upload-icon').removeClass('register-hidden');
        $(this).attr('disabled', true);
        $('.upload-btn-text').text('Upload...');
        var timeout = null;
        timeout = setTimeout(() =>{
            $('.img-upload-icon').addClass('register-hidden');
            $(this).attr('disabled', false);
            $('.upload-btn-text').text('Upload');
        }, 2200);

        return () => {
            clearTimeout(timeout);
        };
    });
}