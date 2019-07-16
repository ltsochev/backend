class MacSlider {
    constructor(nodeList, durationMs) {
        this.items = nodeList;
        this.duration = durationMs || 250;
        this.intervalId = 0;
        this.currentActiveIndex = 0;
    }

    start() {
        if (this.intervalId > 0 || this.items.length == 0) { return; }

        this.intervalId = setInterval(this.step.bind(this), this.duration);
    }

    end() {
        if (this.intervalId > 0) {
            clearInterval(this.intervalId);
        }
    }

    step() {
        this.findActiveIndex();

        let nextIndex = this.currentActiveIndex + 1;

        if (nextIndex >= this.items.length) {
            nextIndex = 0;
        }

        this.stripActivity();

        this.activateElement(nextIndex);
    }

    findActiveIndex() {
        this.currentActiveIndex = 0;

        for(let i = 0; i < this.items.length; i++) {
            let item = this.items[i];
            if (item.classList.contains('active')) {
                this.currentActiveIndex = i;
                break;
            }
        }
    }

    stripActivity() {
        for(let i = 0; i < this.items.length; i++) {
            let item = this.items[i];
            if (item.classList.contains('active')) {
                this.deactvateElement(i);
            }
        }
    }

    activateElement(index) {
        this.items[index].classList.add('active');

        setTimeout(() => { this.items[index].style.opacity = 1; }, 0);

        this.currentActiveIndex = index;
    }

    deactvateElement(index) {
        let item = this.items[index];

        item.classList.remove('active');

        item.style.opacity = 0;
    }
}

module.exports = { MacSlider };
