// General function to remove any skeleton class
export function removeSkeletonClass(skeletonClasses) {
    skeletonClasses.forEach(className => {
        const allSkeleton = document.querySelectorAll(`.${className}`);
        allSkeleton.forEach(item => {
            item.classList.remove(className);
        });
    });
}