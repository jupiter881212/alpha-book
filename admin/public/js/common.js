
/* menu */
$(function () {
  $('.navbar-right li').hover(function () {
    $("ul:not(:animated)", this).slideDown();
  }, function () {
    $("ul.dropdown-menu", this).slideUp();
  });
});
$(function () {
  $('.dropdown>li').on('click', function () {
    $(this).toggleClass('dropdown_toggle').children('.submenu').slideToggle(200);
  });
});
