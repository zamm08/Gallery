'use strict';

let settingButton = document.getElementById('settingTriggerBtn');
let settingCard = document.getElementById('settingCard');
let settingOverlay = document.getElementById('setting-popup-overlay');
let settingCardClose = document.getElementById('settingCardClose');

if (settingButton) {
    settingButton.addEventListener('click', function () {
        settingCard.classList.toggle('active');
        settingOverlay.classList.toggle('active');
    });
}

if (settingCardClose) {
    settingCardClose.addEventListener('click', function () {
        settingCard.classList.remove('active');
        settingOverlay.classList.remove('active');
    });
}


let passWord = document.getElementById('password-visibility');

if (passWord) {
    passWord.addEventListener('click', passwordFunction);
}

function passwordFunction() {
    let passInput = document.getElementById('psw-input');
    passWord.classList.toggle('active');

    if (passInput.type === 'password') {
        passInput.type = 'text';
    } else {
        passInput.type = 'password';
    }
}


let aisEmpty = document.querySelectorAll('a[href="#"]');
let aisEmptyLen = aisEmpty.length;

if (aisEmptyLen > 0) {
    for (let i = 0; i < aisEmptyLen; i++) {
        aisEmpty[i].addEventListener('click', function (event) {
            event.preventDefault();
        });
    }
}



let dropdownTarget = document.querySelectorAll('.sidenav-nav li ul');
let dropdownTargetLen = dropdownTarget.length;

if (dropdownTargetLen > 0) {
    for (let i = 0; i < dropdownTargetLen; i++) {
        let classTarget = dropdownTarget[i].previousElementSibling;
        classTarget.classList.add('nav-url');
    }

    let navUrl = document.querySelectorAll('.nav-url');
    let navUrlLen = navUrl.length;

    for (let i = 0; i < navUrlLen; i++) {
        navUrl[i].insertAdjacentHTML('beforeend', '<span class="dropdown-icon"><i class="bi bi-chevron-down"></i></span>');
        navUrl[i].addEventListener('click', function () {
            this.classList.toggle('dd-open');
        });
    }

    let sidenavNav = document.querySelector('.sidenav-nav');
    sidenavNav.addEventListener('click', function (e) {
        if (e.target.classList.contains('nav-url')) {
            let nextTarget = e.target.nextElementSibling;
            slideToggle(nextTarget, 400);
        }
    });
}


if (document.querySelectorAll('.tiny-slider-one-wrapper').length > 0) {
    tns({
        container: '.tiny-slider-one',
        items: 1,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 1000,
        mouseDrag: true,
        controlsText: [('<i class="bi bi-chevron-left"></i>'), ('<i class="bi bi-chevron-right"></i>')]
    });
}


if (document.querySelectorAll('.tiny-slider-two-wrapper').length > 0) {
    tns({
        container: '.tiny-slider-two',
        items: 1,
        slideBy: 'page',
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayButtonOutput: false,
        speed: 1000,
        mouseDrag: true,
        controls: false,
        nav: true
    });

    let tns3dots = document.querySelectorAll('.tiny-slider-two-wrapper .tns-nav > button');
    let dotLength = tns3dots.length;
    document.getElementById('totaltnsDotsCount').innerHTML = dotLength;

    for (let i = 0; i < dotLength; i++) {
        tns3dots[i].innerHTML = i + 1;
    }
}


if (document.querySelectorAll('.tiny-slider-three-wrapper').length > 0) {
    tns({
        container: '.tiny-slider-three',
        items: 1,
        gutter: 10,
        center: true,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 1000,
        mouseDrag: true,
        controls: false,
        nav: false,
        edgePadding: 40
    });
}


if (document.querySelectorAll('.testimonial-slide-one-wrapper').length > 0) {
    tns({
        container: '.testimonial-slide',
        items: 1,
        gutter: 10,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 800,
        mouseDrag: true,
        controls: false,
        nav: true
    });
}


if (document.querySelectorAll('.testimonial-slide-two-wrapper').length > 0) {
    tns({
        container: '.testimonial-slide2',
        items: 2,
        center: true,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 800,
        mouseDrag: true,
        controls: true,
        nav: false,
        controlsText: [('<i class="bi bi-chevron-left"></i>'), ('<i class="bi bi-chevron-right"></i>')]
    });
}


if (document.querySelectorAll('.testimonial-slide-three-wrapper').length > 0) {
    tns({
        container: '.testimonial-slide3',
        items: 1,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 800,
        mouseDrag: true,
        controls: false,
        nav: true,
        navPosition: 'bottom'
    });
}


if (document.querySelectorAll('.partner-logo-slide-wrapper').length > 0) {
    tns({
        container: '.partner-slide',
        items: 3,
        gutter: 12,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 1000,
        mouseDrag: true,
        controls: false,
        nav: true,
        navPosition: 'bottom'
    });
}


if (document.querySelectorAll('.partner-logo-slide-wrapper-2').length > 0) {
    tns({
        container: '.partner-slide2',
        items: 3,
        gutter: 12,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 1000,
        mouseDrag: true,
        controls: false,
        nav: true,
        navPosition: 'bottom'
    });
}


if (document.querySelectorAll('.image-gallery-slides-wrapper').length > 0) {
    tns({
        container: '.image-gallery-carousel',
        center: true,
        items: 2,
        gutter: 16,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 750,
        mouseDrag: true,
        controls: false,
        nav: false
    });
}


if (document.querySelectorAll('.product-gallery-wrapper').length > 0) {
    tns({
        container: '.product-gallery',
        items: 1,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 750,
        mouseDrag: true,
        controls: false,
        nav: false
    });
}


if (document.querySelectorAll('.chat-user-status-slides-wrapper').length > 0) {
    tns({
        container: '.chat-user-status-slides',
        items: 5,
        gutter: 8,
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        autoplayTimeout: 5000,
        speed: 750,
        mouseDrag: true,
        controls: false,
        nav: false,
        responsive: {
            480: {
                items: 7
            },
            576: {
                items: 7
            },
            768: {
                items: 8
            },
            992: {
                items: 10
            },
            1200: {
                items: 10
            }
        }
    });
}


let masonryWrapper = document.querySelector('.masonry-content-wrapper');

if (masonryWrapper) {
    imagesLoaded(masonryWrapper, function () {
        let iso = new Isotope(masonryWrapper, {
            itemSelector: '.portfolio-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.portfolio-item'
            }
        });

        let filtersElem = document.querySelector('.filters-button-group');

        if (filtersElem) {
            filtersElem.addEventListener('click', function (event) {
                if (!matchesSelector(event.target, 'button')) {
                    return;
                }
                let filterValue = event.target.getAttribute('data-filter');
                iso.arrange({
                    filter: filterValue
                });
            });
        }

        let buttonGroups = document.querySelectorAll('.filters-button-group');
        let buttonGroupslen = buttonGroups.length;

        for (let i = 0; i < buttonGroupslen; i++) {
            let buttonGroup = buttonGroups[i];
            radioButtonGroup(buttonGroup);
        }

        function radioButtonGroup(buttonGroup) {
            buttonGroup.addEventListener('click', function (event) {
                if (!matchesSelector(event.target, 'button')) {
                    return;
                }
                buttonGroup.querySelector('.active').classList.remove('active');
                event.target.classList.add('active');
            });
        }
    });
}


if (document.querySelectorAll('.gallery-img').length > 0) {
    window.addEventListener('load', function () {
        baguetteBox.run('.gallery-img', {
            captions: false,
            fullScreen: false,
            animation: 'slideIn',
            overlayBackgroundColor: 'rgba(15,7,15,0.7)'
        });
    });
}


if (document.querySelectorAll('.product-gallery').length > 0) {
    window.addEventListener('load', function () {
        baguetteBox.run('.product-gallery', {
            captions: false,
            fullScreen: false,
            animation: 'slideIn',
            overlayBackgroundColor: 'rgba(15,7,15,0.7)'
        });
    });
}


var countdown1 = document.getElementById('countdown1');

if (countdown1) {
    new countdown({
        target: '#countdown1',
        dayWord: ' Days',
        hourWord: ' Hours',
        minWord: ' Mins',
        secWord: ' Secs'
    });
}


var countdown2 = document.getElementById('countdown2');

if (countdown2) {
    new countdown({
        target: '#countdown2',
        dayWord: ' Days',
        hourWord: ' Hours',
        minWord: ' Mins',
        secWord: ' Secs'
    });
}


var countdown3 = document.getElementById('countdown3');

if (countdown3) {
    new countdown({
        target: '#countdown3',
        dayWord: ' Days',
        hourWord: ' Hours',
        minWord: ' Mins',
        secWord: ' Secs'
    });
}


if (document.querySelectorAll('.counter').length > 0) {
    let counterUp = window.counterUp.default;

    let callback = entries => {
        entries.forEach(entry => {
            let counterElement = entry.target
            if (entry.isIntersecting && !counterElement.classList.contains('is-visible')) {
                counterUp(counterElement, {
                    duration: 2000,
                    delay: 20
                });
                counterElement.classList.add('is-visible');
            }
        });
    }

    let IO = new IntersectionObserver(callback, {
        threshold: 1
    });

    let counterUpClass = document.querySelectorAll('.counter');
    let counterUpClassLen = counterUpClass.length;

    for (let i = 0; i < counterUpClassLen; i++) {
        IO.observe(counterUpClass[i]);
    }
}


let ionRangeSlider1 = document.getElementById('ionRangeSlider1');

if (ionRangeSlider1) {
    ionRangeSlider(ionRangeSlider1);
}


let ionRangeSlider2 = document.getElementById('ionRangeSlider2');

if (ionRangeSlider2) {
    ionRangeSlider(ionRangeSlider2);
}


let dataTable1 = document.getElementById('dataTable');

if (dataTable1) {
    new DataTable(dataTable1, {
        perPage: 10,
        perPageSelect: [10, 20, 30, 40, 50],
        searchable: true,
        sortable: true,
        fixedHeight: false,
        prevText: '<i class="bi bi-arrow-left-short"></i>',
        nextText: '<i class="bi bi-arrow-right-short"></i>',
        labels: {
            placeholder: 'Search',
            perPage: '{select}',
            noRows: 'No data!',
            info: '{start} to {end} entries'
        }
    });
}


let passwordInputId = document.getElementById('psw-input');
let pswmeter = document.getElementById('pswmeter');

if (passwordInputId && pswmeter) {
    pswmeter.style.display = 'none';

    passwordInputId.addEventListener('keyup', function () {
        pswmeter.style.display = 'block';
    });

    passwordStrengthMeter({
        containerElement: '#pswmeter',
        passwordInput: '#psw-input',
        height: 4,
        borderRadius: 4,
        pswMinLength: 10
    });
}



let anakstanTooltip = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
let tooltipList = anakstanTooltip.map(function (tooltip) {
    return new bootstrap.Tooltip(tooltip);
});


let anakstanToast = [].slice.call(document.querySelectorAll('.toast'));
let toastList = anakstanToast.map(function (toast) {
    return new bootstrap.Toast(toast);
});
toastList.forEach(toast => toast.show());



let toastBtn = document.getElementById('toast-showing-btn');

if (toastBtn) {
    toastBtn.addEventListener('click', function () {
        let anakstanToast = [].slice.call(document.querySelectorAll('.toast'));
        let toastList = anakstanToast.map(function (toast) {
            return new bootstrap.Toast(toast);
        });
        toastList.forEach(toast => toast.show());
    });
}


window.onload = function toastAnimation() {
    let x = document.querySelectorAll('.toast-autohide');
    let toastLen = x.length;

    for (let i = 0; i < toastLen; i++) {
        x[i].insertAdjacentHTML('beforeend', '<span class="toast-autohide-animation"></span>');
        let toastDuration = x[i].getAttribute('data-bs-delay');
        var toastAnimDuration = toastDuration + 'ms';
    }

    let y = document.querySelectorAll('.toast-autohide-animation');
    let autohideLen = y.length;

    for (let z = 0; z < autohideLen; z++) {
        y[z].style.animationDuration = toastAnimDuration;
    }
}


let formcontrolInput = document.querySelectorAll('.form-control, .form-select');

for (let i = 0; i < formcontrolInput.length; i++) {
    formcontrolInput[i].addEventListener('click', function () {
        this.classList.add('form-control-clicked');
    });
}


let activeEffect = document.querySelectorAll('.active-effect');
let activeEffectLen = activeEffect.length;

for (let i = 0; i < activeEffectLen; i++) {
    activeEffect[i].addEventListener('click', function () {
        let element = activeEffect[0];
        while (element) {
            if (element.tagName === 'DIV') {
                element.classList.remove('active');
            }
            element = element.nextSibling;
        }
        this.classList.add('active');
    });
}


let favIcon = document.querySelectorAll('.single-gallery-item .fav-icon');
let favIconLen = favIcon.length;

for (let i = 0; i < favIconLen; i++) {
    favIcon[i].addEventListener('click', function () {
        this.classList.toggle('active');
    });
}


let chatWrapper = document.getElementById('chat-wrapper');

let videoButton = document.getElementById('videoCallingButton');
let videoPopup = document.getElementById('videoCallingPopup');
let videoDecline = document.getElementById('videoCallDecline');

let callingButton = document.getElementById('callingButton');
let callingPopup = document.getElementById('callingPopup');
let callDecline = document.getElementById('callDecline');

function callingScreenAdd() {
    chatWrapper.classList.add('calling-screen-active');
}

function callingScreenRemove() {
    chatWrapper.classList.remove('calling-screen-active');
}

if (videoButton && videoDecline) {
    videoButton.addEventListener('click', function () {
        videoPopup.classList.add('screen-active');
        callingScreenAdd();
    });

    videoDecline.addEventListener('click', function () {
        videoPopup.classList.remove('screen-active');
        callingScreenRemove();
    });
}

if (callingButton && callDecline) {
    callingButton.addEventListener('click', function () {
        callingPopup.classList.add('screen-active');
        callingScreenAdd();
    });

    callDecline.addEventListener('click', function () {
        callingPopup.classList.remove('screen-active');
        callingScreenRemove();
    });
}


let offlineBtn = document.querySelector('.offline-detection');
let onlineBtn = document.querySelector('.online-detection');

if (offlineBtn || onlineBtn) {
    let alertShowingId = document.getElementById('internetStatus');

    offlineBtn.addEventListener('click', function () {
        alertShowingId.style.display = 'block';
        alertShowingId.style.backgroundColor = '#ea4c62';
        alertShowingId.innerText = 'Oops! No internet connection.';

        setTimeout(function () {
            alertShowingId.style.display = 'none';
        }, 5000);
    });

    onlineBtn.addEventListener('click', function () {
        alertShowingId.style.display = 'block';
        alertShowingId.style.backgroundColor = '#00b894';
        alertShowingId.innerText = 'Your internet connection is back.';

        setTimeout(function () {
            alertShowingId.style.display = 'none';
        }, 5000);
    });
}


let preloader = document.getElementById('preloader');

if (preloader) {
    window.addEventListener('load', function () {
        let fadeOut = setInterval(function () {
            if (!preloader.style.opacity) {
                preloader.style.opacity = 1;
            }
            if (preloader.style.opacity > 0) {
                preloader.style.opacity -= 0.1;
            } else {
                clearInterval(fadeOut);
                preloader.remove();
            }
        }, 20);
    });
}