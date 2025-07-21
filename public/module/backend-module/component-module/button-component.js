// Button Loader Helper Function ---------
export function buttonLoader(buttonSelector, loaderIconSelector, buttonTextSelector, loadingText = '', defaultText = '', timeoutDuration = '') {

    $(buttonSelector).on('click', () => {
        $(loaderIconSelector).removeAttr('hidden');
        $(buttonTextSelector).text(loadingText);

        var timeout = setTimeout(() => {
            $(loaderIconSelector).attr('hidden', true);
            $(buttonTextSelector).text(defaultText);
        }, timeoutDuration);

        return () => {
            clearTimeout(timeout);
        };
    });
}