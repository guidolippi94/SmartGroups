var lung = document.getElementById('lunghezza').textContent;


for (j = 1; j < 12; j++) {
    $('#post' + j).click(function (w) {
        console.log(w['handleObj']['guid']);
        l = w['handleObj']['guid'];
        $('#sug_event' + l + ' div:nth-child(2)').css('display', 'inline-block');
    });
}

$('.right_').click(function(){
   $(this).parent().parent().next().css('display', 'inline-block');
});

$('.left_').click(function () {
   $(this).parent().parent().css('display','none');
});



$(document).mouseup(function (e) {
    var container = $(".popup");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});

function update_my_interest(num1, num2, z){
    var x =document.getElementById('button'+ z).textContent;
    if( x === "Mi interessa"){
        document.getElementById('button'+ z).innerHTML = "Non mi interessa più";
    }
    else{
        document.getElementById('button'+ z).innerHTML = "Mi interessa";
    }

    $.ajax({
        type: "POST",
        url: "my_interest.php",
        data: {
            'm_event': num1,
            's_event': num2
        },
        success: function (result) {
            console.log(result);
            result = JSON.parse(result);
            var len =result['length'];
            var maxL = Math.max(lung,len);
            console.log(result['length']);
            //console.log(result[0][0]);
            var j = 1;
            var bools = false;
            for(i=0;i<maxL; i++) {
                console.log(maxL);
                if ((result[i] !== undefined)) {
                    if(lung > i) {
                        console.log("ok");
                        if(bools === false){
                            $('.all-events').nextAll('div').remove();   //rimuove tutto (almeno spero)
                            $('.all-events').remove();
                            bools = true;
                        }
                        $('#all-events').append('<div id="all'+i+'" class="all-events"></div>');
                        $('#all'+i).append('<div><span>'+result[i][2]+'</span></div>');
                        $('#all'+i).append('<div><span>'+result[i][4]+'</span></div>');
                        $('#all'+i).append('<div><span>'+result[i][5]+'</span></div>');
                        $('#all'+i).append('<div><span>'+result[i][3]+'</span></div>');
                    }

                }
            }
        },
        error: function(){
            alert("Non c'è connessione. Riprovare tra poco.")
        }
    })
}
































/*

function reqListener () {
    console.log(this.responseText);
}

var oReq = new XMLHttpRequest(); //New request object
oReq.onload = function() {
    //This is where you handle what to do with the response.
    //The actual data is found on this.responseText

    json = JSON.parse(oReq.responseText);


};
oReq.open("get", "../cazzo.php", true);
//                               ^ Don't block the rest of the execution.
//Don't wait until the request finishes to
//continue.

oReq.send();

console.log(json);

    $(".postEvent").click(function(){

        i=0;
        $(".popup").show();
        $(".popup").css('border-radius','20px');
        $(".popup").css('display', 'inline-block');
        $(".popup").css('position','absolute');
        $(".popup").css('min-width','75%');
        $(".popup").css('max-width','75%');
        $(".popup").css('min-height','83%');
        $(".popup").css('top','11%');
        $(".popup").css('left','11%');
        $(".popup").css('background','grey');
        $(".popup").css('overflow-y','auto');
        //$(".popup").append('<div class="top"></div>');
        //$(".top").append('<i class= "fa fa-angle-right right_" id="right_"></i>');
        $(".top").append('<i class="fa fa-angle-left left_"></i>');
        $(".top").append('<img class="pic_icon">');
        $(".top").append('<button class="interest">Mi interessa</button>');
        $(".popup").append('<div class="middle"></div>');
        $(".middle").append('<p>'+ json[0][i]['item']['titolo_ita']+'</p>');    //nome
        $(".middle").append('<p>'+ json[0][i]['item']['indirizzi'] +'</p>');    //luogo
        $(".middle").append('<p>'+ json[0][i]['item']['orario']+'</p>');    //orario
        $(".middle").append('<p>'+ json[0][i]['item']['testo_ita']+' </p>');    //descrizione
        $(".middle").append('<p>'+ json[0][i]['liking']+' </p>');    //forse per qualcosaltro
    });


//if(json[0][i] !== undefined) {

$(".right_").click(function () {
    i = i +1;
    $(".popup").empty();
    //$(".popup").show();
    $(".popup").css('border-radius', '20px');
    $(".popup").css('display', 'inline-block');
    $(".popup").css('position', 'absolute');
    $(".popup").css('min-width', '75%');
    $(".popup").css('max-width', '75%');
    $(".popup").css('min-height', '83%');
    $(".popup").css('top', '11%');
    $(".popup").css('left', '11%');
    $(".popup").css('background', 'grey');
    $(".popup").css('overflow-y', 'auto');
    $(".popup").append('<div class="top"></div>');
    $(".top").append('<i class= "fa fa-angle-right right_"></i>');
    $(".top").append('<i class="fa fa-angle-left left_"></i>');
    $(".top").append('<img class="pic_icon">');
    $(".popup").append('<div class="middle"></div>');
    $(".middle").append('<p>' + json[0][1]['item']['titolo_ita'] + '</p>');    //nome
    $(".middle").append('<p>' + json[0][1]['item']['indirizzi'] + '</p>');    //luogo
    $(".middle").append('<p>' + json[0][1]['item']['orario'] + '</p>');    //orario
    $(".middle").append('<p>' + json[0][1]['item']['testo_ita'] + ' </p>');    //descrizione
    $(".middle").append('<p>' + json[0][1]['liking'] + '</p>');    //forse per qualcosaltro
});

$(".left_").click(function(){
    i--;
    $(".popup").empty();
    $(".popup").show();
    $(".popup").css('border-radius','20px');
    $(".popup").css('display', 'inline-block');
    $(".popup").css('position','absolute');
    $(".popup").css('min-width','75%');
    $(".popup").css('max-width','75%');
    $(".popup").css('min-height','83%');
    $(".popup").css('top','11%');
    $(".popup").css('left','11%');
    $(".popup").css('background','grey');
    $(".popup").css('overflow-y','auto');
    $(".popup").append('<div class="top"></div>');
    $(".top").append('<i class= "fa fa-angle-right right_"></i>');
    $(".top").append('<i class="fa fa-angle-left left_"></i>');
    $(".top").append('<img class="pic_icon">');
    $(".popup").append('<div class="middle"></div>');
    $(".middle").append('<p>'+ json[0][i]['item']['titolo_ita']+'</p>');    //nome
    $(".middle").append('<p>'+ json[0][i]['item']['indirizzi'] +'</p>');    //luogo
    $(".middle").append('<p>'+ json[0][i]['item']['orario']+'</p>');    //orario
    $(".middle").append('<p>'+ json[0][i]['item']['testo_ita']+'</p>');    //descrizione
    $(".middle").append('<p>'+ json[0][i]['liking']+'</p>');    //forse per qualcosaltro
});




$(document).mouseup(function(e) {
    var container = $(".popup");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $(".popup").empty();
        container.hide();
    }
});*/





