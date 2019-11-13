$('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
});

$('.dropdown-trigger').dropdown();

$(document).ready(function() {
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.parallax').parallax();
    $('select').formSelect();
    $('.datepicker').datepicker();
});