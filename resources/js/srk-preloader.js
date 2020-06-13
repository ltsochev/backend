(function() {
    let appResolve;
    let timeoutTimer;
    let animationComplete = false;
    const PRELOADER_TIMEOUT = 30000;
    const PRELOADER_CLASS = 'preloading';
    const PRELOADER_DOM = document.querySelector('.preloader');
    const appReady = new Promise((resolve) => { appResolve = resolve });
    const preloadTimeout = ms => new Promise((resolve) => setTimeout(resolve, ms));
    const onAnimationEnd = () => {
        PRELOADER_DOM.classList.add('completed');

        preloadTimeout(1250)
            .then(() => {
                PRELOADER_DOM.classList.add('shown');
                animationComplete = true;
            })
    }

    const waitFor = checkFunc => {
        const poll = resolve => {
            if (checkFunc()) resolve();
            else setTimeout(_ => poll(resolve), 400);
        }

        return new Promise(poll);
    }

    const onDomReady = () => {
        document.body.classList.remove(PRELOADER_CLASS);

        PRELOADER_DOM.remove();

        const event = new Event('srk-loaded');

        document.dispatchEvent(event);

        if (timeoutTimer > 0) {
            clearTimeout(timeoutTimer);
        }
    }

    window.addEventListener('load', appResolve);

    document.getElementById('preloader-svg').querySelector('.srk-label').addEventListener('animationend', onAnimationEnd);

    appReady.then(() => {
        waitFor(() => animationComplete === true)
            .then(_ => {
                PRELOADER_DOM.classList.add('hidden');
                return preloadTimeout(500);
            })
            .then(_ => {
                onDomReady();
            });
    });

    timeoutTimer = setTimeout(() => {
        animationComplete = true;
        onDomReady();
    }, PRELOADER_TIMEOUT);

    // Set everything in motion & show the preloader
    PRELOADER_DOM.classList.add('shown');
})();
