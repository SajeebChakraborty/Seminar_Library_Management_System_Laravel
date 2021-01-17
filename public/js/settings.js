(function($) {
  'use strict';
  $(function() {
    $(".navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-settings").on("click", function() {
      $(".settings-panel").toggleClass("open");
    });
    $("#close-button").on("click", function() {
      $(".settings-panel").toggleClass("open");
    });


    //Layout settings.
    var layout_classes = 'sidebar-mini sidebar-icon-only rtl boxed-layout sidebar-absolute sidebar-hidden'
    $("#boxed-layout-view").on("click", function() {
      $("body").removeClass(layout_classes);
      $("body").addClass("boxed-layout");
    });
    $("#compact-layout-view").on("click", function() {
      $("body").removeClass(layout_classes);
      $("body").addClass("sidebar-mini");
    });
    $("#icon-only-layout-view").on("click", function() {
      $("body").removeClass(layout_classes);
      $("body").addClass("sidebar-icon-only");
    });
    $("#rtl-layout-view").on("click", function() {
      $("body").removeClass(layout_classes);
      $("body").addClass("rtl");
    });
    $("#hidden-menu-1-layout-view").on("click", function() {
      $("body").removeClass(layout_classes);
      $("body").addClass("sidebar-absolute");
    });
    $("#hidden-menu-2-layout-view").on("click", function() {
      $("body").removeClass(layout_classes);
      $("body").addClass("sidebar-toggle-display");
    });


    //Navbar settings
    var navbar_classes = 'navbar-danger navbar-success navbar-warning navbar-dark navbar-light navbar-primary navbar-info navbar-pink';
    $('#primary-theme').on("click", function() { //Icheck's event for checkbox states
      $('.navbar').removeClass(navbar_classes);
      $('.navbar').addClass('navbar-primary');
    });
    $('#success-theme').on("click", function() { //Icheck's event for checkbox states
      $('.navbar').removeClass(navbar_classes);
      $('.navbar').addClass('navbar-success');
    });
    $('#warning-theme').on("click", function() { //Icheck's event for checkbox states
      $('.navbar').removeClass(navbar_classes);
      $('.navbar').addClass('navbar-warning');
    });
    $('#danger-theme').on("click", function() { //Icheck's event for checkbox states
      $('.navbar').removeClass(navbar_classes);
      $('.navbar').addClass('navbar-danger');
    });
    $('#pink-theme').on("click", function() { //Icheck's event for checkbox states
      $('.navbar').removeClass(navbar_classes);
      $('.navbar').addClass('navbar-pink');
    });
    $('#light-theme').on("click", function() { //Icheck's event for checkbox states
      $('.navbar').removeClass(navbar_classes);
      $('.navbar').addClass('navbar-light');
    });
    $('#info-theme').on("click", function() { //Icheck's event for checkbox states
      $('.navbar').removeClass(navbar_classes);
      $('.navbar').addClass('navbar-info');
    });
    $('#dark-theme').on("click", function() { //Icheck's event for checkbox states
      $('.navbar').removeClass(navbar_classes);
      $('.navbar').addClass('navbar-dark');
    });


    //Sidebar settings
    $('#side-theme-light').on("click", function() { //Icheck's event for checkbox states
      $('#sidebar').removeClass('sidebar-dark');
    });
    $('#side-theme-dark').on("click", function() { //Icheck's event for checkbox states
      $('#sidebar').addClass('sidebar-dark');
    });
  });
})(jQuery);