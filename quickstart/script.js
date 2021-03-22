(function($) {
$(function() {
  
  $('ul.tabs__caption').on('click', 'li:not(.active)', function() {
    $(this)
      .addClass('active').siblings().removeClass('active')
      .closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
  });
  
});

$(".more-tabs").click(function() {
  $(this).text(function(i, text) {
    $(this).parents('.tabs-mobile__box').toggleClass('active');
    return text === "Подробнее" ? "Скрыть подробности" : "Подробнее";
  })
});

})(jQuery);