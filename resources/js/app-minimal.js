try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    window._ = require('lodash');

    require('bootstrap');

    const {CustomControlManager} = require('./custom-controls.js');
    const {MacSlider} = require('./mac-slider');

    let cm = new CustomControlManager();

    cm.init();

    let headerDOM = document.querySelector('.navbar');
    let lastPos = 0;

    window.onscroll = _.debounce((e) => {
        if (window.scrollY > 110) {
            headerDOM.classList.add('fixed-top');
        } else {
            if (headerDOM.classList.contains('fixed-top')) {
                headerDOM.classList.remove('fixed-top');
            }
        }

        lastPos = window.scrollY;
    }, 120);

    let nodeList = document.querySelectorAll('.slider-gallery .image');
    if (nodeList.length > 1) {
        let macSlider = new MacSlider(nodeList, 3000);

        macSlider.start();
    }

} catch(e) {}
