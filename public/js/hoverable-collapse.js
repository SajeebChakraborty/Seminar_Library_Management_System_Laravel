(function($) {
  'use strict';
  $(document).on('mouseenter mouseleave', '.sidebar .nav-item', function(ev) {
    var body = $('body');
    var sidebarIconOnly = body.hasClass("sidebar-icon-only");
    var sidebarFixed = body.hasClass("sidebar-fixed");
    if (!('ontouchstart' in document.documentElement)) {
      if (sidebarIconOnly) {
        if (sidebarFixed) {
          if (ev.type === 'mouseenter') {
            body.addClass('sidebar-expanded');
          } else {
            body.removeClass('sidebar-expanded');
          }
        } else {
          var $menuItem = $(this);
          if (ev.type === 'mouseenter') {
            $menuItem.addClass('hover-open')
          } else {
            $menuItem.removeClass('hover-open')
          }
        }
      }
    }

  });

  //We are handling submenu in horizontal menu layout in a different way
  $('[data-toggle="showMegaMenu"]').on("click", function() {
    $(this).toggleClass('expanded');
  }).on("mouseenter", function() {
    if (!('ontouchstart' in document.documentElement)) {
      $(this).addClass('expanded');
    }
  }).on("mouseleave", function() {
    if (!('ontouchstart' in document.documentElement)) {
      $(this).removeClass('expanded');
    }
  });
})(jQuery);