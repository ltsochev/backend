(function (window) {
    'use strict'

    var instantRemove = false;

    // Preloader code
    function onPageLoaded() {
        if (!document.body.classList.contains('preloading')) {
            return;
        }

        var preloaderDOM = document.getElementById('lt-preloader');

        preloaderDOM.style.opacity = 0;

        if (instantRemove) {
            return removePreloader(preloaderDOM);
        } else {
            setTimeout(function () {
                removePreloader(preloaderDOM);
            }, 500);
        }
    }

    function removePreloader(domEl) {
        document.getElementsByTagName('body')[0].classList.remove('preloading');
        domEl.remove();
    }

    if (window.location.hash != "") {
        instantRemove = true;
    }

    window.onload = function (e) {
        onPageLoaded(e);
    }

})(window);
