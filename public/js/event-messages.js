//$(window).load(function(){
/* global $ */    
    $(".feed1").hide(0);
    $(".feed2").hide(0);
    $(".feed3").hide(0);
    $(".feed4").hide(0);
    setTimeout(function() {
        $('.feed0').hide(0);
        $('.feed1').show(0);    
    }, 5000);
    setTimeout(function() {
        $('.feed1').hide(0);
        $('.feed2').show(0);    
    }, 10000);
    setTimeout(function() {
        $('.feed2').hide(0);
        $('.feed3').show(0);    
    }, 15000);
    setTimeout(function() {
        $('.feed3').hide(0);
        $('.feed4').show(0);    
    }, 20000);
    //$(".feed0").delay(5000).show();    
    //$("#loading").delay(10000).hide(0);
  //  });