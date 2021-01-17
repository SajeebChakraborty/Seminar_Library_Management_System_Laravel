(function($) {
  'use strict';
  $(function() {
    $('#example1').multiselectsplitter();

    $('#example2').multiselectsplitter({
      selectSize: 7,
      clearOnFirstChange: true,
      groupCounter: true
    });

    $('#example3').multiselectsplitter({
      groupCounter: true,
      maximumSelected: 2
    });

    $('#example4').multiselectsplitter({
      groupCounter: true,
      maximumSelected: 3,
      onlySameGroup: true
    });

    $('#example5').multiselectsplitter({
      size: 6,
      groupCounter: true,
      maximumSelected: 2,
      maximumAlert: function(maximumSelected) {
        alert('You choose ' + (maximumSelected + 1) + ' options. Are you crazy ?');
      },
      createFirstSelect: function(label, $originalSelect) {
        return '<option class="text-success">prefix - ' + label + '</option>';
      },
      createSecondSelect: function(label, $firstSelect) {
        return '<option class="text-danger"> ??? </option>';
      }
    });
  });
})(jQuery);