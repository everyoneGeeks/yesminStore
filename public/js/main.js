$(document).ready(function(){
    'use strict';
    
    $('#payment').on("click", function(){
        $('#bar-content').slideToggle(300);
    });
    $('#payment2').on("click", function(){
        $('#bar-content2').slideToggle(300);
    });
    $('#payment3').on("click", function(){
        $('#bar-content3').slideToggle(300);
    });


    $('.popup-address').on('click', function(){
        $('#address').modal('show')
    });

    $('.finished').children('.step-logo').children('.fa-check-circle').css('display','inline-block');
    
    $(window).resize(function(){
        $('.top-slider').height($(window).height()-$('.menus').height());    
    })
    $('.top-slider').height($(window).height()-$('.menus').height());
    
});