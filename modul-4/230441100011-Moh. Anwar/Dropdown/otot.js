document.addEventListener('DOMContentLoaded', function() {
  var dropdowns = document.querySelectorAll('.dropdown');

  dropdowns.forEach(function(dropdown) {
    var dropdownMenu = dropdown.querySelector('.dropdown-menu');

    dropdown.addEventListener('mouseenter', function() {
      dropdownMenu.classList.add('show');
    });

    dropdown.addEventListener('mouseleave', function() {
      dropdownMenu.classList.remove('show');
    });
  });

  document.addEventListener('click', function(event) {
    dropdowns.forEach(function(dropdown) {
      var isClickInside = dropdown.contains(event.target);
      if (!isClickInside) {
        dropdown.querySelector('.dropdown-menu').classList.remove('show');
      }
    });
  });
});
