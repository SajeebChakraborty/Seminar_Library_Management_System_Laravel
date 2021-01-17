(function($) {
  showSwal = function(type) {
    'use strict';
    if (type === 'basic') {
      swal('Any fool can use a computer')

    } else if (type === 'title-and-text') {
      swal(
        'The Internet?',
        'That thing is still around?',
        'question'
      )

    } else if (type === 'success-message') {
      swal(
        'Good job!',
        'You clicked the button!',
        'success'
      )

    } else if (type === 'auto-close') {
      swal({
        title: 'Auto close alert!',
        text: 'I will close in 2 seconds.',
        timer: 2000
      }).then(
        function() {},
        // handling the promise rejection
        function(dismiss) {
          if (dismiss === 'timer') {
            console.log('I was closed by the timer')
          }
        }
      )
    } else if (type === 'warning-message-and-cancel') {
      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(function() {
        swal(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      })

    } else if (type === 'custom-html') {
      swal({
        title: '<i>HTML</i> <u>example</u>',
        type: 'info',
        html: 'You can use <b>bold text</b>, ' +
          '<a href="//github.com">links</a> ' +
          'and other HTML tags',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
        cancelButtonText: '<i class="fa fa-thumbs-down"></i>Cancel'
      })
    }
  }

})(jQuery);