( function() {

//Workaround for correct element position calculations 
// window.onbeforeunload = () => {
//     window.scrollTo(0, 0);
// }

// Variable for tracking slider autoplay
let sliderInterval = null

window.onload = () => {
    toggleNavChevrons();
    // Resize slider container on page load
    resizeSliderContainer();
    // Start slider
    sliderInterval = setInterval(nextSlide, 5000);

    animateHub();

    wifiZigbeeSwitch();
    toggleAppScreenes();
}

//Toggle screensots on bullets click
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
        duration: "75%",
        triggerHook: 0.3
    })
    .addIndicators()
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


// Toggle mobile nav chevrons (arrows) (freaking uikit)
function toggleNavChevrons () {
    let chevrons = document.querySelectorAll('.cat-chevron-left')

    let chevronObserver = new MutationObserver( function(mutationsList, observer) {
        mutationsList.forEach(mutation => {
            if (mutation.attributeName === 'class') {
                if (mutation.target.classList.contains('uk-open')) {
                    mutation.target.querySelector('img').src = '/wp-content/themes/vkonnektu/img/chevron-down.svg'
                } else {
                    mutation.target.querySelector('img').src = '/wp-content/themes/vkonnektu/img/chevron-left.svg'
                }
            }
        });
    });

    for (let chevron of chevrons) {
        let listItem = chevron.parentElement.parentElement
        chevronObserver.observe(listItem, { attributes: true })
    }
}

// Toggle mobile nav ham with close icon
let hamNav = document.getElementById('ham-nav');
let closeNav = document.getElementById('close-nav');

hamNav.onclick = function() {
    closeNav.className = 'uk-visible'
    hamNav.className = 'uk-hidden'
}

closeNav.onclick = function() {
    hamNav.className = 'uk-visible'
    closeNav.className = 'uk-hidden'
}


// Main page slider
let paginationDiv = document.querySelector('.slider-pagination')
let slidesDiv = document.querySelector('.slides')
let bullets = document.querySelectorAll('.bullet')
let slides = document.querySelectorAll('.slide')
let currentImg = document.querySelector('.slide-active')

let currentIndex = 0

paginationDiv.addEventListener('click', function (e) {
    const {target} = e
    if (target.tagName === 'SPAN') {
        // Find clicked element index and save it to currentIndex variable
        currentIndex = [...target.parentElement.children].indexOf(target)
        switchSlides()

        //Stop autoplay
        clearInterval(sliderInterval)
    }
})

function switchSlides () {
    // Switch slides
    slides.forEach(function(slide, i) {
        slide.className = 'slide'
        if (i == currentIndex) {
            slide.className = 'slide slide-active'
        }
    })

    // Switch pagination bullets
    bullets.forEach(function (bullet, i) {
        bullet.className = 'bullet'
        if (i == currentIndex) {
            bullet.className = 'bullet bullet-active'
        }
    })
}

function nextSlide() {
    currentIndex++
     if (currentIndex > slides.length - 1) {
         currentIndex = 0
     }
    switchSlides()
}

// Resize parent container height based on child image height on window resize
// needed because of position: absolute of images
window.addEventListener('resize', function() {
    resizeSliderContainer()
})

function resizeSliderContainer () {
    slidesDiv.setAttribute('style','height:' + currentImg.offsetHeight + 'px')
}

// Tooltips (tippy.js)
tippy.setDefaultProps({
    allowHTML: true,
    interactive: true,
    maxWidth: 300,
    placement: 'right-start',
});

tippy('#door');
tippy('#lights');
tippy('#relay');
tippy('#webcam');
tippy('#smoke');
tippy('#plug');
tippy('#hub');
tippy('#multisensor');
tippy('#water');
tippy('#webcam-2');
tippy('#lights-2');

} )();