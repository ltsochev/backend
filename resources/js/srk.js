try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

const resizeVideos = () => {
    const bodySpacing = window.getComputedStyle(document.body).getPropertyValue('padding-top');

    document.querySelectorAll('.video-section').forEach((el, index) => {
        el.style.maxHeight = index === 0
            ? `calc(100vh + ${bodySpacing})`
            : '100vh';
    });
}

window.addEventListener('resize', resizeVideos)
document.addEventListener('srk-loaded', resizeVideos);
