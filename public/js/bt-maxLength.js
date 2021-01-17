(function($) {
  'use strict';
  $('#defaultconfig').maxlength();

  $('#defaultconfig-2').maxlength({
    alwaysShow: true,
    threshold: 20,
    warningClass: "badge mt-1 badge-success",
    limitReachedClass: "badge mt-1 badge-danger"
  });

  $('#defaultconfig-3').maxlength({
    alwaysShow: true,
    threshold: 10,
    warningClass: "badge mt-1 badge-success",
    limitReachedClass: "badge mt-1 badge-danger",
    separator: ' of ',
    preText: 'You have ',
    postText: ' chars remaining.',
    validate: true
  });

  $('#maxlength-textarea').maxlength({
    alwaysShow: true
  });
})(jQuery);