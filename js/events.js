$(document).ready(function(){
    $("#all-events").hide();
});


$(".show-events").click(function(){
    $("#all-events").show();
});

// se clicco fuori dalla lista degli eventi questa mi si nasconde
$(document).mouseup(function(e) {
    var container = $("#all-events");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});

var bool = false;