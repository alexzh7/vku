(function () {

    // Variable for tracking slider autoplay
    let sliderInterval = null

    window.onload = function () {

        // Toggle mobile nav chevrons (arrows) (freaking uikit)
        let chevrons = document.querySelectorAll('.cat-chevron-left')

        let chevronObserver = new MutationObserver(function (mutationsList, observer) {
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

        // Resize slider container on page load
        // resizeSliderContainer()
        // Start slider
        sliderInterval = setInterval(nextSlide, 5000)
    }

    // Toggle mobile nav ham with close icon
    let hamNav = document.getElementById('ham-nav');
    let closeNav = document.getElementById('close-nav');

    hamNav.onclick = function () {
        closeNav.className = 'uk-visible'
        hamNav.className = 'uk-hidden'
    }

    closeNav.onclick = function () {
        hamNav.className = 'uk-visible'
        closeNav.className = 'uk-hidden'
    }


    // Main page slider
    let paginationDiv = document.querySelector('.slider-pagination')
    let slidesDiv = document.querySelector('.flex-active-slide')
    let bullets = document.querySelectorAll('.bullet')
    let slides = document.querySelectorAll('.slide')
    let currentImg = document.querySelector('.slide-active')

    let currentIndex = 0

    // paginationDiv.addEventListener('click', function (e) {
    //     const {target} = e
    //     if (target.tagName === 'SPAN') {
    //         // Find clicked element index and save it to currentIndex variable
    //         currentIndex = [...target.parentElement.children].indexOf(target)
    //         switchSlides()

    //         //Stop autoplay
    //         clearInterval(sliderInterval)
    //     }
    // })

    function switchSlides() {
        // Switch slides
        slides.forEach(function (slide, i) {
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
    // window.addEventListener('resize', function () {
    //     resizeSliderContainer()
    // })

    // function resizeSliderContainer () {
    //     slidesDiv.setAttribute('style','height:' + currentImg.offsetHeight + 'px')
    // }

    // Tooltips (tippy.js)
    // tippy.setDefaultProps({
    //     allowHTML: true,
    //     interactive: true,
    //     maxWidth: 300,
    // });

    // tippy('#door', {
    //     content: 'Дверной датчик SD800 обеспечивает сигнализацию об открытии/закрытии двери, окна или форточки с контролем повышенной вибрации (стук, попытка взлома)',
    //     placement: 'right-start'
    // });

    // tippy('#lights', {
    //     content: 'Управляйте освещением с помощью модулей SL800 или SR800',
    //     placement: 'right-start'
    // });

    // tippy('#relay', {
    //     content: 'Одноканальное реле SR800 отвечает за автоматичекое и дистанционное управление гаражными воротами',
    //     placement: 'left-start'
    // });

    // tippy('#webcam', {
    //     content: 'Уличная 2Мп IP видеокамера VKU-G14 обеспечит безопасность Вашего дома. Камера имеет датчик движения, который при срабатывании отправляет тревогу пользователю в приложение и фотоснимок события на e-mail',
    //     placement: 'left-start'
    // });

})();



jQuery(document).ready(function ($) {

    $('.product .thumbnail img').click(function () {
        var attrIndex = $(this).attr('attr_index');
        UIkit.slider('#single-product-slider').show(attrIndex);

    });

    // Initialize slideshow
    var slideshow = UIkit.slider('#single-product-slider');


    // Variable with element that fire event
    var $slideItem = $('#single-product-slider ul > li');

    $slideItem.on('beforeitemshow', function () {
        // UIkit.notification({ message: 'Fire Before Item Show', timeout:1000 });
        // console.log(slideshow.index);
        $('.product .thumbnail img').each(function (index, val) {
            if ($(this).attr('attr_index') == slideshow.index) {
                $(this).closest('li').addClass('active');
            } else {
                $(this).closest('li').removeClass('active');
            }
        });
    });


});