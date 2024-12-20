// menuEvents.js
export function initializeMenuEvents(menuId, roleClass = false) {
    const menu = document.getElementById(menuId);
    const menuItems = menu.querySelectorAll('li');
    const menuSpans = menu.querySelectorAll('span');
    const menuPressEnter = menu.querySelectorAll(
        roleClass ? '.role_enter_press' : menuId === 'email_menu' ? '.email_enter_press' : '.enter_press'
    );
    const menuRole = menu.querySelectorAll(
        roleClass ? '#role_select_list_item' : menuId === 'email_menu' ? '#email_select_list_item' : '#select_list_item'
    );
    let currentIndex = -1;
    let menuVisible = true;

    document.removeEventListener('keydown', handleKeydown);
    document.addEventListener('keydown', handleKeydown);

    menuItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentIndex = index;
            updateHighlight();
        });
    });

    function handleKeydown(event) {
        if (!menuVisible) return;

        if (event.key === 'ArrowDown') {
            currentIndex = (currentIndex + 1) % menuItems.length;
        } else if (event.key === 'ArrowUp') {
            currentIndex = (currentIndex - 1 + menuItems.length) % menuItems.length;
        } else if (event.key === 'ArrowRight') {
            if (menuId === 'branch_menu') {
                document.removeEventListener('keydown', handleKeydown);
                initializeMenuEvents('role_menu', true);
                return;
            } else if (menuId === 'role_menu') {
                document.removeEventListener('keydown', handleKeydown);
                initializeMenuEvents('email_menu');
                return;
            }
        } else if (event.key === 'ArrowLeft') {
            if (menuId === 'email_menu') {
                document.removeEventListener('keydown', handleKeydown);
                initializeMenuEvents('role_menu', true);
                return;
            } else if (menuId === 'role_menu') {
                document.removeEventListener('keydown', handleKeydown);
                initializeMenuEvents('branch_menu');
                return;
            }
        } else if (event.key === 'Escape') {
            const branchBox = document.getElementById('branchBox');
            const roleBox = document.getElementById('roleBox');
            const emailBox = document.getElementById('emailBox');

            if (menuId === 'branch_menu' && branchBox) {
                branchBox.setAttribute('hidden', true);
                document.removeEventListener('keydown', handleKeydown);
                $("#tabAccess").attr('hidden', true);
                $("#home").addClass('active show');
                $("#tabAccess").removeClass('active');
                $("#tabHome").addClass('active');
                $("#userBranchPermission").removeClass('active show');
                $("#branchBox").removeAttribute('hidden');
            } else if (menuId === 'role_menu' && roleBox) {
                roleBox.setAttribute('hidden', true);
                branchBox?.removeAttribute('hidden');
                document.removeEventListener('keydown', handleKeydown);
                initializeMenuEvents('branch_menu');
            } else if (menuId === 'email_menu' && emailBox) {
                emailBox.setAttribute('hidden', true);
                branchBox?.removeAttribute('hidden');
                roleBox?.removeAttribute('hidden');
                document.removeEventListener('keydown', handleKeydown);
                initializeMenuEvents('branch_menu');
                initializeMenuEvents('role_menu', true);
            }

            menuVisible = false;
            currentIndex = -1;
            updateHighlight();
            return;
        }

        updateHighlight();
    }

    function updateHighlight() {
        menuItems.forEach((item, index) => {
            const span = menuSpans[index];
            const enter = menuPressEnter[index];
            const role = menuRole[index];
            if (index === currentIndex) {
                item.classList.add('highlight');
                if (span) {
                    span.classList.add('bage_display');
                    span.classList.remove('bage_display_none');
                }
                if (enter) {
                    enter.classList.add('bage_display');
                    enter.classList.remove('bage_display_none');
                }
                if (role) {
                    role.setAttribute('data-val', '1');
                }
                item.blur();
            } else {
                item.classList.remove('highlight');
                if (span) {
                    span.classList.remove('bage_display');
                    span.classList.add('bage_display_none');
                }
                if (enter) {
                    enter.classList.remove('bage_display');
                    enter.classList.add('bage_display_none');
                }
                if (role) {
                    role.setAttribute('data-val', '0');
                }
            }
        });

        if (currentIndex >= 0) {
            const currentItem = menuItems[currentIndex];
            currentItem.classList.add('highlight');
            currentItem.focus();
        }
    }

    if (menuVisible && menuItems.length > 0) {
        currentIndex = 0;
        updateHighlight();
    }
}