'use strict';


function to_position(divid){
    $('html, body').animate({scrollTop:$(divid).position().top }, 'slow');
}

$(".link").click(function()
{
    let id = $(this).attr("href").replace("#","");
    console.log("id = "+id);
    to_position('[section-id="'+id+'"]');
})