( function() {

    //Workaround for correct element position calculations 
    // window.onbeforeunload = () => {
    //     window.scrollTo(0, 0);
    // }

    toggleNavChevrons();
    toggleMobileNav();
    
    //GLOBAL
    
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
    function toggleMobileNav () {
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
    }
     
} )();



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