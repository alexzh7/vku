( function() {

    //Workaround for correct element position calculations 
    window.onbeforeunload = () => {
        window.scrollTo(0, 0);
    } 

    window.onload = () => {
        //GSAP & ScrollMagic only for 767+ screen sizes
        if(!window.matchMedia("(max-width: 767px)").matches) {
            animateHub();
        } else {
            document.getElementById('hub-devices').src = '/wp-content/themes/vkonnektu/img/new/hub1.png';
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
        // autoplay: {
        //     delay: 5000,
        //   },
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
        },
        onHide(i) {
            i.reference.style.opacity = 0.7;
        },
    });
    
    tippy('#sl-cam', {
        appendTo: document.body,
    });
    tippy('#sl-garage');
    tippy('#sl-lights');
    tippy('#sl-safety', {
        appendTo: document.body,
    });
    tippy('#sl-hub', {
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

    //Toggle screenshots on bullets click
    function toggleAppScreenes () {
        let bullets = document.getElementById('app-bullets');
        let screens = document.querySelectorAll('.app-screen');
    
        //On bullet click, hide all screens. If bullet index = screen index, show it
        [...bullets.children].forEach((bullet, i) => {
            bullet.onclick = () => {
                screens.forEach((screen, j) => {
                    if (!screen.classList.contains('uk-hidden')) {
                        screen.classList.add('uk-hidden')
                    }
                    if (i===j) {
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
    
        wifi.onclick = () => {
            wifi.className = 'zb-active';
            zigbee.className = '';
            zbImg.src = '/wp-content/themes/vkonnektu/img/wifi-range.jpg';
        }
    
        zigbee.onclick = () => {
            zigbee.className = 'zb-active';
            wifi.className = ''
            zbImg.src = '/wp-content/themes/vkonnektu/img/zigbee-range.jpg';
        }
    
    }
    
    
    //Main page animations
    function animateHub() {
        //Move #eco-hub to the center of #hub-devices
        let hubCoords = document.getElementById('eco-hub').getBoundingClientRect();
        let newHubCoords = caclulateHubCoords();
    
        let controller = new ScrollMagic.Controller();
        let tl = gsap.timeline();
    
        tl.to("#eco-hub", {ease: "none", y: newHubCoords.y - hubCoords.y, width: newHubCoords.width});
    
        let scene = new ScrollMagic.Scene({
            triggerElement: ".ecosystem",
            offset: 100,
            duration: "65%",
            triggerHook: 0.3
        })
        .setTween(tl)
        .addTo(controller);
    
        //Reveal devices & title
        scene.on('end', (event) => {
            if (event.scrollDirection === 'FORWARD') {
                gsap.timeline().to('#hub-devices', {opacity: 1})
                               .to('.hub-description', {opacity: 1});
            } else {
                gsap.timeline().to('#hub-devices', {opacity: 0})
                               .to('.hub-description', {opacity: 0}, '<');
            }
        });
    }
    
    //Calculate the position of #eco-hub in #hub-devices so #ecohub is centered
    function caclulateHubCoords () {
        let devices = getCenterCoords(document.getElementById('hub-devices'));
        let hub = document.getElementById('eco-hub').getBoundingClientRect();
    
        //#eco-hub is 28% of #hub-devices width
        let ratio = hub.height / hub.width;
        hub.width = 0.28 * devices.width;
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
} )();