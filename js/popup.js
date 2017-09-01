




$(".postEvent").click(function(){
    $("#popup").show();
    $("#popup").css('border-radius','20px');
    $("#popup").css('display', 'inline-block');
    $("#popup").css('position','absolute');
    $("#popup").css('min-width','75%');
    $("#popup").css('min-height','83%');
    $("#popup").css('top','11%');
    $("#popup").css('left','11%');
    $("#popup").css('background','grey');
    $("#popup").css('overflow-y','auto');
    $("#popup").append('<div id="top"></div>');
    $("#top").append('<i class= "fa fa-angle-right" id="right"></i>');
    $("#top").append('<i class="fa fa-angle-left" id="left"></i>');
    $("#top").append('<img id="pic_icon">');
    $("#popup").append('<div id="middle"></div>');
    $("#middle").append('<p> </p>');    //nome
    $("#middle").append('<p> </p>');    //luogo
    $("#middle").append('<p> </p>');    //orario
    $("#middle").append('<p> </p>');    //descrizione
    $("#middle").append('<p> </p>');    //forse per qualcosaltro
});

$("#right").click(function () {
})

$(document).mouseup(function(e) {
    var container = $("#popup");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $("#popup").empty();
        container.hide();
    }
});


