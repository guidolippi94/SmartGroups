
$json = getJSON();

$(".postEvent").click(function(){
    $("#popup").show();
    $("#popup").css('border-radius','20px');
    $("#popup").css('display', 'inline-block');
    $("#popup").css('position','absolute');
    $("#popup").css('min-width','75%');
    $("#popup").css('min-height','83%');
    $("#popup").css('top','11%');
    $("#popup").css('left','11%');
    $("#popup").css('background','white');
    $("#popup").css('overflow-y','auto');
    $("#popup").append('<i class="fa fa-angle-right" style="float:right></i>');
    
});

$(document).mouseup(function(e) {
    var container = $("#popup");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $("#popup").empty();
        container.hide();
    }
});


