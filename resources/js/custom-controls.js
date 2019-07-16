const CUSTOMCONTROL_RADIO = 'radio';
const CUSTOMCONTROL_CHECKBOX = 'checkbox';
const CUSTOMCONTROL_NOTIMPLEMENTED = 'unknown';

class CustomControlManager {
    constructor() {
        this.items = {};
    }

    init() {
        document.querySelectorAll('.lt-custom-control').forEach((el) => {
            let control = new CustomControl(el);
            if (!control.isMounted()) { return; }

            this.add(control);
        });

        this.refreshUI();

        this.registerEvents();
    }

    add(control) {
        let type = control.getType(),
            name = control.getName();

        if (!this.items.hasOwnProperty(type)) {
            this.items[type] = {};
        }

        if (!this.items[type].hasOwnProperty(name)) {
            this.items[type][name] = [control];
        } else {
            this.items[type][name].push(control);
        }
    }

    refreshUI() {
        if (this.length() == 0) { return; }

        for (let type in this.items) {
            switch(type) {
                case CUSTOMCONTROL_RADIO:
                case CUSTOMCONTROL_CHECKBOX:
                    this.refreshCheckedControls(type);
                    break;
                default:
                    console.error("Unknown element type %s", type);
                    break;
            }
        }
    }

    refreshCheckedControls(type) {
        let controls = this.items[type];
        if (this.length(controls) == 0) { return; }

        for(let group in controls) {
            controls[group].forEach((control) => {
                if (!control.isMounted()) { return; }
                control.refreshUI();
            });
        }
    }

    registerEvents() {
        for(let type in this.items) {
            for(let group in this.items[type]) {
                let controlList = this.items[type][group];
                controlList.forEach((control) => {
                    control.onEvent('change', this.onChangeHandler.bind(this));
                    control.onEvent('click', this.onClickHandler.bind(this));
                })
            }
        }
    }

    onChangeHandler(e) {
        this.refreshUI();
    }

    onClickHandler(e, controlObj) {
        if (e.target.tagName != 'input' && e.target.tagName != 'label') {
            e.stopPropagation();

            let evt = new MouseEvent("click", {
                bubbles: false,
                cancelable: true,
                view: window
            });

            controlObj.getControlDOM().dispatchEvent(evt);
        }
    }

    length(ob) {
        let size = 0, key,
            obj = ob || this;

        if (typeof obj !== 'object') {
            return obj.length;
        }

        for (key in obj) {
            if (obj.hasOwnProperty(key)) {
                size++;
            }
        }

        return size;
    }
}

class CustomControl {
    constructor(rootEl) {
        this.rootEl = rootEl;
        this.input = null
        this.type = null;
        this.name = null;
        this.mounted = false;

        this.findType();
    }

    isMounted() {
        return this.mounted;
    }

    getType() {
        return this.type;
    }

    getName() {
        if (!this.name) {
            this.name = this.input.getAttribute('name');
        }

        return this.name;
    }

    getControlDOM() {
        return this.input;
    }

    check() {
        this.input.checked = true;
        this.rootEl.classList.add('active');
    }

    uncheck() {
        this.input.checked = false;
        if (this.rootEl.classList.contains('active')) {
            this.rootEl.classList.remove('active');
        }
    }

    isChecked() {
        return this.input.checked;
    }

    refreshUI() {
        if (this.isChecked()) {
            this.check();
        } else {
            this.uncheck();
        }
    }

    onEvent(eventType, callbackFn) {
        if (eventType != 'change') {
            this.rootEl.addEventListener(eventType, (e) => { return callbackFn(e, this); }, false);
        } else {
            this.input.addEventListener(eventType, (e) => { return callbackFn(e); }, false);
        }
    }

    findType() {
        this.input = this.rootEl.querySelector('input');

        if (!this.input) {
            this.mounted = false;
            return;
        }

        switch(this.input.getAttribute('type'))
        {
            case 'radio':
                this.type = CUSTOMCONTROL_RADIO;
                break;
            case 'checkbox':
                this.type = CUSTOMCONTROL_CHECKBOX;
                break;
            default:
                this.type = CUSTOMCONTROL_NOTIMPLEMENTED;
                break;
        }

        this.mounted = true;
    }
}

module.exports = { CustomControlManager, CustomControl };
