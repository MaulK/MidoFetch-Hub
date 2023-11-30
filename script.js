document.addEventListener("DOMContentLoaded", function() {
    const header = document.querySelector('header');
    const nav = document.querySelector('nav');
    const mainContent = document.querySelector('.main-content');
    const features = document.querySelector('.features');


    header.style.opacity = 0;
    nav.style.opacity = 0;
    mainContent.style.opacity = 0;
    features.style.opacity = 0;

    setTimeout(() => {
        header.style.transition = 'opacity 1s ease-in-out';
        nav.style.transition = 'opacity 1s ease-in-out';
        mainContent.style.transition = 'opacity 1s ease-in-out';
        features.style.transition = 'opacity 1s ease-in-out';

        header.style.opacity = 1;
        nav.style.opacity = 1;
        mainContent.style.opacity = 1;
        features.style.opacity = 1;
    }, 500);
});

function downloadService(service) {
    alert(`Downloading from ${service}`);
    // Add your download logic here (e.g., redirect to a download page)
}
