<script type="module">
    import { addAttributeOrClass, removeAttributeOrClass } from "/module/backend-module/backend-module-min.js";
    import { initOffCanvasResize, initAllOffcanvasResizers,  initDragAndDrop } from "/module/backend-module/backend-moduleRAM-min.js";

    // Top Bar Menu : Profile Canvas and Setting Canvas Left Width Resize
    document.addEventListener('DOMContentLoaded', () => {
        // Resize OffCanvas
        window.addEventListener('resize', () => {
            const offcanvas = document.querySelector('.offcanvas.show');
            if (offcanvas && !offcanvas.classList.contains('showing')) {
                offcanvas.classList.add('show');
                offcanvas.style.visibility = 'visible';
                offcanvas.style.transform = 'none';
            }
        });

        initAllOffcanvasResizers('.offcanvas-card', '.offcanvas-setting-card', '.offcanvas-ram-card');

        const offCanvas = document.getElementById('SettingOffcanvas');

        if (offCanvas) {

            initOffCanvasResize(offCanvas, 'SettingOffcanvas');

            const bsOffcanvas = new bootstrap.Offcanvas(offCanvas, {
                backdrop: false,
                keyboard: false,
                scroll: true
            });
    
            // Optional: Reopen on resize (DevTools open triggers this)
            window.addEventListener('resize', () => {
                if (!offCanvas.classList.contains('show')) {
                    bsOffcanvas.show();
                }
            });
        }

        // Drag and Drop Setting Canvas
        const row = '.drag-canvas-row';
        const column = '.drag-canvas-column';
        const cardKey = '.group-canvas';
        //initDragAndDrop(column, cardKey, row, lineConnectionId)
        document.querySelectorAll(cardKey).forEach(card => {
            const canvasId = card.id; // e.g., 'card-1', 'card-2', etc.
            const lineConnectionId = `lineConnectorId_${canvasId}`;
            const DataTable = 'OffCanvasSettingDrag';
            // Call with dynamic IDs
            initDragAndDrop(column, cardKey, row, lineConnectionId, DataTable);
        });
    });
    
    $(document).ready(function(){
        // Profile Canvas
        $(document).on('click', '#profile_urllinks', function(e){

            e.preventDefault();
            $("#offcanvasRightProfile").removeClass('offcanvas-hidden');
            
            var time = null;
            time = setTimeout(() => {
                requestAnimationFrame(() => {
                    removeAttributeOrClass([
                        {selector: '#pro_com_name, #info, #info2, .profile-btn-close, .profile-head', type: 'class', name: 'image-skeleton'},
                        {selector: '#com_address', type: 'class', name: 'address-skeleton'},
                        {selector: '.image-box', type: 'class', name: 'profile-img-skeleton'},
                        {selector: '.admin_title', type: 'class', name: 'heding-skeleton'},
                        {selector: '#company_info, #personal_info, #branch_information, #role_info', type: 'class', name: 'profile-head-skeleton'},
                    ]);
                });
                requestAnimationFrame(()=>{
                    addAttributeOrClass([
                        {selector: '.child-box', type: 'class', name: 'child-box-horizontal-line'}
                    ]);
                });
            }, 1500);

            return ()=>{
                clearTimeout(time);
            }
            
        });

        $(document).on('click', '.offcanvas-btn-close', function(){
            $("#offcanvasRightProfile").addClass('offcanvas-hidden');
        });

        $(document).on('click', '.dropdown-toggle', ()=>{
            var time = null;
            $("#profileSkel").addClass('profile-skeletone');
            $("#emailSkel").addClass('profile-skeletone');
            $("#logoutSkel").addClass('log-skeletone');
            $("#settingSkel").addClass('log-skeletone');
            $(".show-profile").attr('hidden', true);
            $(".show-email").attr('hidden', true);
            $(".show-setting").attr('hidden', true);
            $(".show-prof").removeClass('display-skeletone');
            $(".show-logout").attr('hidden', true);
            $(".show-log").removeClass('display-skeletone');
            time = setTimeout(() => {
                requestAnimationFrame(() => {
                    $("#profileSkel").removeClass('profile-skeletone');
                    $("#emailSkel").removeClass('profile-skeletone');
                    $("#logoutSkel").removeClass('log-skeletone');
                    $("#settingSkel").removeClass('log-skeletone');
                    $(".show-profile").removeAttr('hidden');
                    $(".show-logout").removeAttr('hidden');
                    $(".show-email").removeAttr('hidden');
                    $(".show-setting").removeAttr('hidden');
                    $(".show-log").addClass('display-skeletone');
                    $(".show-prof").addClass('display-skeletone');
                });

            }, 1000);

            return ()=>{
                clearTimeout(time);
            }
        });

        // Setting Canvas
        $(document).on('click', '#setting_click', function(e){
            e.preventDefault();

            $("#offcanvasRightSettings").removeClass('offcanvas-hidden');

            // removeDataTableStorage('offCanvasSettingDrag')
            // location.reload();
            
            var time = null;
            time = setTimeout(() => {
                requestAnimationFrame(() => {
                    removeAttributeOrClass([
                        {selector: '.box-row, .lable-name, .card-lable-name, .canvas-link-btn, .setting-btn-close, .setting-head', type: 'class', name: 'image-skeleton'}
                    ]);
                });
            }, 1500);

            return ()=>{
                clearTimeout(time);
            }
        });

        $(document).on('click', '.setting-btn-close', function(){
            $("#offcanvasRightSettings").addClass('offcanvas-hidden');
        });

        // Logout URL Mange
        document.querySelectorAll('.logout').forEach(link => {
            link.addEventListener('click', function(e){
                e.preventDefault();
                const url = this.getAttribute('data-url');
                if(url){
                    window.location.href = url;
                }
            });
        });
        
    });

</script>
