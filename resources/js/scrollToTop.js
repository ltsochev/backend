import _ from 'lodash';

const DEFAULT_ACTIVE_CLASS = 'active';
const DEFAULT_DEBOUNCE_DURATION = 120;
const DEFAULT_SCROLL_OFFSET = 75;

class ScrollToTop {
    constructor(DOMElem, offset, activeClass, debounceDuration) {
        this.el = DOMElem;
        this.offset = offset || DEFAULT_SCROLL_OFFSET;
        this.activeClass = activeClass || DEFAULT_ACTIVE_CLASS;
        this.debounceDuration = debounceDuration || DEFAULT_DEBOUNCE_DURATION;
        this.debounceFn = () => {},
        this.visible = false;

        this.init();
    }

    init() {
        if (!this.el) return;

        this.debounceFn = _.debounce(this.onWindowScroll, this.debounceDuration);

        this.bind();
    }

    bind() {
        this.unbind();

        window.addEventListener('scroll', this.debounceFn.bind(this));
    }

    unbind() {
        window.removeEventListener('scroll', this.debounceFn.bind(this));
    }

    onWindowScroll() {
        if (window.scrollY >= this.offset) {
            this.enableContainer();
        } else {
            this.disableContainer();
        }
    }

    enableContainer() {
        this.visible = true;
        if (!this.el.classList.contains(this.activeClass)) {
            this.el.classList.add(this.activeClass);
        }
    }

    disableContainer() {
        this.visible = false;
        this.el.classList.remove(this.activeClass);
    }
}

export default ScrollToTop;
