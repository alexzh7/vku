(function () {

    //Workaround for correct element position calculations 
    // window.onbeforeunload = () => {
    //     window.scrollTo(0, 0);
    // }

    window.onload = () => {
        //GSAP & ScrollMagic only for 767+ screen sizes
        if (!window.matchMedia("(max-width: 767px)").matches) {
            animateHub();
        } else {
            document.getElementById('hub-devices').src = '/wp-content/themes/vkonnektu/img/new/devices_mob.png';
        }

        wifiZigbeeSwitch();
        toggleAppScreenes();
    }

    //Main page slider
    let swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        loop: true,
        effect: 'fade',
        speed: 1000,
        autoplay: {
            delay: 5000,
        },
    });

    // Tooltips (tippy.js)
    tippy.setDefaultProps({
        allowHTML: true,
        interactive: true,
        maxWidth: 325,
        placement: 'top',
        animation: 'shift-away',
        duration: 500,
        onShow(i) {
            i.reference.style.opacity = 1;
            i.reference.querySelectorAll('path').forEach((path) => {
                path.style.fill = '#FF8900';
            });
            i.reference.querySelector('rect').style.stroke = '#FF8900'
        },
        onHide(i) {
            i.reference.style.opacity = 0.8;
            i.reference.querySelectorAll('path').forEach((path) => {
                path.style.fill = '#0088CC';
            });
            i.reference.querySelector('rect').style.stroke = '#0088CC'
        },
    });

    tippy('#sl-cam', {
        appendTo: document.body,
    });
    tippy('#sl-garage');
    tippy('#sl-car', {
        appendTo: document.body,
    });
    tippy('#sl-lights');
    tippy('#sl-safety', {
        appendTo: document.body,
    });
    tippy('#sl-ir', {
        appendTo: document.body,
    });
    tippy('#sl-power', {
        appendTo: document.body,
    });
    tippy('#sl-fire', {
        appendTo: document.body,
    });
    tippy('#sl-temp', {
        appendTo: document.body,
    });
    tippy('#sl-lights2');
    tippy('#sl-cam2', {
        appendTo: document.body,
    });
    tippy('#sl-water');
    tippy('#sl-power2', {
        appendTo: document.body,
    });

    //Toggle screenshots on bullets click
    function toggleAppScreenes() {
        let bullets = document.getElementById('app-bullets');
        let screens = document.querySelectorAll('.app-screen');

        //On bullet click, hide all screens. If bullet index = screen index, show it
        [...bullets.children].forEach((bullet, i) => {
            bullet.onclick = () => {
                screens.forEach((screen, j) => {
                    if (!screen.classList.contains('uk-hidden')) {
                        screen.classList.add('uk-hidden')
                    }
                    if (i === j) {
                        screen.classList.remove('uk-hidden')
                    }
                })
            }
        })
    }

    //Wifi/Zigbee switch
    function wifiZigbeeSwitch() {
        let wifi = document.getElementById('zb-wifi');
        let zigbee = document.getElementById('zb-zigbee');
        let zbImg = document.getElementById('zb-img');
        let wifiImg = document.getElementById('zb-img2');

        wifi.onclick = () => {
            if (wifi.className === '') {
                wifi.className = 'zb-active';
                zigbee.className = '';
                wifiImg.classList.toggle('uk-hidden')
                zbImg.classList.toggle('uk-hidden')
            }
        }

        zigbee.onclick = () => {
            if (zigbee.className === '') {
                zigbee.className = 'zb-active';
                wifi.className = ''
                zbImg.classList.toggle('uk-hidden')
                wifiImg.classList.toggle('uk-hidden')
            }
        }

    }


    //Main page animations
    function animateHub() {
        //Move #eco-hub to the center of #hub-devices
        let hubCoords = document.getElementById('eco-hub').getBoundingClientRect();
        let newHubCoords = caclulateHubCoords();

        let animationDuration = "64%"
        if (window.innerHeight > 1190) {
            animationDuration = "30%"
        }

        let controller = new ScrollMagic.Controller();
        let tl = gsap.timeline();

        tl.to("#eco-hub", { ease: "none", y: newHubCoords.y - hubCoords.y, width: newHubCoords.width });

        let scene = new ScrollMagic.Scene({
            triggerElement: ".ecosystem",
            offset: 100,
            duration: animationDuration,
            triggerHook: 0.3
        })
            .setTween(tl)
            .addTo(controller);

        //Reveal devices & title
        scene.on('end', (event) => {
            if (event.scrollDirection === 'FORWARD') {
                gsap.timeline().to('#hub-devices', { opacity: 1 })
                    .to('.hub-description', { opacity: 1 });
            } else {
                gsap.timeline().to('#hub-devices', { opacity: 0 })
                    .to('.hub-description', { opacity: 0 }, '<');
            }
        });
    }

    //Calculate the position of #eco-hub in #hub-devices so #ecohub is centered
    function caclulateHubCoords() {
        let devices = getCenterCoords(document.getElementById('hub-devices'));
        let hub = document.getElementById('eco-hub').getBoundingClientRect();

        //#eco-hub is 28% of #hub-devices width
        let ratio = hub.height / hub.width;
        hub.width = 0.25 * devices.width;
        hub.height = hub.width * ratio;

        return {
            x: devices.left - hub.width / 2,
            y: devices.top - hub.height / 2,
            width: hub.width
        };
    }

    //Get center coordinates & width of an image
    function getCenterCoords(elem) {
        let box = elem.getBoundingClientRect();
        return {
            top: box.top + pageYOffset + box.height / 2,
            left: box.left + pageXOffset + box.width / 2,
            width: box.width
        };
    }
})();

jQuery(document).ready(function ($) {

    //Arrange icons on main page slider so they keep
    //their position static when window is resized
    let image = { width: 1440, height: 839 };

    let target = new Array();
    //First slide
    target[0] = { x: 697, y: 317 };
    target[1] = { x: 576, y: 561 };
    target[2] = { x: 700, y: 480 };
    target[3] = { x: 906, y: 391 };
    target[4] = { x: 1085, y: 245 };

    //Second slide
    target[5] = { x: 897, y: 346 };
    target[6] = { x: 1129, y: 529 };
    target[7] = { x: 763, y: 514 };
    target[8] = { x: 700, y: 263 };

    let pointer = new Array();
    //First slide
    pointer[0] = $('#sl-cam');
    pointer[1] = $('#sl-car');
    pointer[2] = $('#sl-garage');
    pointer[3] = $('#sl-safety');
    pointer[4] = $('#sl-lights');

    //Second slide
    pointer[5] = $('#sl-fire');
    pointer[6] = $('#sl-ir');
    pointer[7] = $('#sl-power');
    pointer[8] = $('#sl-temp');

    $(document).ready(updatePointer);
    $(window).resize(updatePointer);

    function updatePointer() {
        let windowWidth = $('.first-section').width();
        let windowHeight = $('.first-section').height();

        // Get largest dimension increase
        let xScale = windowWidth / image.width;
        let yScale = windowHeight / image.height;
        let scale;
        let yOffset = 0;
        let xOffset = 0;

        if (xScale > yScale) {
            // The image fits perfectly in x axis, stretched in y
            scale = xScale;
            yOffset = (windowHeight - (image.height * scale)) / 2;
        } else {
            // The image fits perfectly in y axis, stretched in x
            scale = yScale;
            xOffset = (windowWidth - (image.width * scale)) * 0.71;
        }

        let arrayLength = target.length;

        for (let i = 0; i < arrayLength; i++) {
            pointer[i].css('top', (target[i].y) * scale + yOffset);
            pointer[i].css('left', (target[i].x) * scale + xOffset);
        }

    }

});