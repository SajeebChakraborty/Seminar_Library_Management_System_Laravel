(function($) {
  'use strict';
  $(function() {
    var labelClone = $('.label-clone');
    for (var i = 0; i < labelClone.length; i++) {
      var id = $(labelClone[i]).find(".checkbox-dib").attr('id');
      $(labelClone[i]).append('<label></label>');
      $(labelClone[i]).find("label").attr("for", id);
    }
  });
})(jQuery);