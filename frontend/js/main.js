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

$(function() {
    $("#fecha").datepicker({
        //maxDate: new Date(2019, 10, 13), //un mes antes del que se quiera xd
        minDate: new Date(1900, 31, 1),
        maxDate: new Date(2018, 11, 14),
        defaultDate: new Date(2018, 11, 1),
        yearRange: 10,
    });
});