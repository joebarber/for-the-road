//$(window).load(function(){
/* global $ */    
    $(".up1").hide(0);
    $(".up2").hide(0);
    setTimeout(function() {
        $('.up0').hide(0);
        $('.up1').show(0);    
    }, 5000);
    setTimeout(function() {
        $('.up1').hide(0);
        $('.up2').show(0);    
    }, 10000);
    //$(".feed0").delay(5000).show();    
    //$("#loading").delay(10000).hide(0);
  //  });