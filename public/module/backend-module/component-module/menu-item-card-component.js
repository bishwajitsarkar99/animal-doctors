import { getUserRAMKey, getRAM, setRAM, removeRAM } from "/module/backend-module/component-module/component-storeRAM.js";
// Initialize the RAM Data Store
getUserRAMKey();
getRAM(DataTable, key = null);
setRAM(DataTable, key, value);
removeRAM(DataTable);

// ========================= Menu-Card Component Resize =================================

let isResizingColumn = false;
let isResizingHeight = false;
export function initMenuCardResize(DataTable, MenuCardWidth, MenuCardHeight, menuHeader, menuFooter, buttonClass, inputClass){
    // ============= Card Initialize ====================
    const card = document.getElementById(DataTable);
    if(!card) return;

    // Drop Down Menu Card Data Store
    const dropDownMenuCardWidth = getRAM(DataTable, 'dropDownMenuCardWidth') || {};
    const dropDownMenuCardHeight = getRAM(DataTable, 'dropDownMenuCardHeight') || {};

    const dropDownMenuCardHeaderWidth = getRAM(DataTable, 'dropDownMenuCardHeaderWidth') || {};
    const dropDownMenuCardHeaderHeight = getRAM(DataTable, 'dropDownMenuCardHeaderHeight') || {};

    const dropDownMenuCardBodyWidth = getRAM(DataTable, 'dropDownMenuCardBodyWidth') || {};
    const dropDownMenuCardBodyHeight = getRAM(DataTable, 'dropDownMenuCardBodyHeight') || {};

    const dropDownMenuCardFooterWidth = getRAM(DataTable, 'dropDownMenuCardFooterWidth') || {};
    const dropDownMenuCardFooterHeight = getRAM(DataTable, 'dropDownMenuCardFooterHeight') || {};

    const dropDownMenuLineWidth = getRAM(DataTable, 'dropDownMenuLineWidth') || {};
    const dropDownMenuLineHeight = getRAM(DataTable, 'dropDownMenuLineHeight') || {};

    const dropDownMenuButtonWidth = getRAM(DataTable, 'dropDownMenuButtonWidth') || {};
    const dropDownMenuButtonHeight = getRAM(DataTable, 'dropDownMenuButtonHeight') || {};

    const dropDownMenuInputWidth = getRAM(DataTable, 'dropDownMenuInputWidth') || {};
    const dropDownMenuInputHeight = getRAM(DataTable, 'dropDownMenuInputHeight') || {};
    
    
    // DropDown Menu Card Selector
    const dropDownMenuCard = card.querySelector('.dropdown');
    const dropDownMenuCardHeader = card.querySelector(menuHeader);
    const dropDownMenuCardBody = card.querySelector('ul');
    const dropDownMenuCardFooter = card.querySelector(menuFooter);
    // DropDown Menu Line Selector
    const dropDownMenuLine = card.querySelectorAll('ul li');
    // DropDown Menu Button Selector
    const dropDownMenuButton = card.querySelector(buttonClass);
    // DropDown Menu Input Selector
    const dropDownMenuInput = card.querySelector(inputClass);


    // DropDown Menu Card
    const width = dropDownMenuCardWidth[dropDownMenuCard];
    const height = dropDownMenuCardHeight[dropDownMenuCard];
    if(width){
        dropDownMenuCard.style.width = width + 'px';
    }
    if(height){
        dropDownMenuCard.style.height = height + 'px';
    }

    card.addEventListener('mousedown', function(e){

        const isCardWidhth = e.target.classList.contains(MenuCardWidth);
        const isCardHeight = e.target.classList.contains(MenuCardHeight);

        if(!isCardWidhth || !isCardHeight) return;

        const menuCard = e.target.closest(dropDownMenuCard);

        let startY = e.pageY;
        let startX = e.pageX;
        let startWidth = menuCard.offsetWidth;
        let startHeight = menuCard.offsetHeight;

        function save(){
            setRAM(DataTable, 'dropDownMenuCardWidth', startWidth);
            setRAM(DataTable, 'dropDownMenuCardHeight', startHeight);
        }

        if(isCardWidhth){
            isResizingColumn = true;
            menuCard.classList.add('card-width-resizing');

            function colMouseMove(ev){
                const newWidth = startX + (ev.pageX - startX);
                menuCard.style.width = newWidth + 'px';

                save();
            }

            function stopColResize(){
                menuCard.classList.remove('card-width-resizing');
                isResizingColumn = false;

                document.addEventListener('mousemove', colMouseMove);
                document.addEventListener('mouseup', stopColResize);
            }

            document.addEventListener('mousemove', colMouseMove);
            document.addEventListener('mouseup', stopColResize);
        }

        if(isCardHeight){
            isResizingHeight = true;
            menuCard.classList.add('card-height-resizing');

            function rowMouseMove(ev){
                newHeight = startY + (ev.pageY - startY);
                menuCard.style.height = newHeight + 'px';

                save();
            }

            function stopRowResize(){
                isResizingHeight = false;
                menuCard.classList.remove('card-height-resizing');

                document.removeEventListener('mousemove', rowMouseMove);
                document.removeEventListener('mouseup', stopRowResize);
            }

            document.removeEventListener('mousemove', rowMouseMove);
            document.removeEventListener('mouseup', stopRowResize);
        }
    });

}