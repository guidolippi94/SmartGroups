var d = new Date();
var today = new Date();
var tmp;
var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";


$(document).ready(function () {

    // Imposto mese e anno iniziali
    $('#month_name').text(month[d.getMonth()]).append("<br>");
    var txt2 = $("<span></span>").attr("id","year_number").text(d.getFullYear());
    $('#month_name').append(txt2);

    //Dispongo i giorni in tabella in modo corretto
    createTable();

});

$('#prev').click(function(){
    $( "#days li" ).remove();
    tmpD = prevMonth();
    var months = month[tmpD.getMonth()];
    $('#month_name').text(months).append("<br>");
    var year = d.getFullYear();
    var txt2 = $("<span></span>").attr("id","year_number").text(year);
    $('#month_name').append(txt2);
    createTable();
});

$('#next').click(function(){
    $( "#days li" ).remove();
    tmpD = nextMonth();
    var months = month[tmpD.getMonth()];
    $('#month_name').text(months).append("<br>");
    var anno = d.getFullYear();
    var txt2 = $("<span></span>").attr("id","year_number").text(anno);
    $('#month_name').append(txt2);

    createTable();
});

function prevMonth(){
    d.setMonth(d.getMonth()-1);
    return d;
}

function nextMonth(){
    d.setMonth(d.getMonth()+1);
    return d;
}

function daysInMonth(month,year) {
    return new Date(year, month+1, 0).getDate();
}

function createTable(){
    var day = $("<li></li>");
    tmp = (d.getDate()%7)-1;
    tmp = d.getDay()-tmp;
    if(tmp === -1){
        tmp = 6
    }

    if(tmp === 0){     // 1° Domenica
        for(i = 0 ; i < 6; i++) {
            day = $("<li></li>");
            $('#days').append(day);
        }
        numberOfDays();
    }
    else if(tmp === 1){     // 1° Lunedì
        numberOfDays();
    }

    else if(tmp === 2){     // 1° Martedì
        for(i = 0 ; i < 1; i++) {
            day = $("<li></li>");
            $('#days').append(day);
        }
        numberOfDays();
    }

    else if(tmp === 3){     //1° Mercoledì
        for(i = 0 ; i < 2; i++) {
            day = $("<li></li>");
            $('#days').append(day);
        }
        numberOfDays();
    }

    else if(tmp === 4){     //1° Giovedì
        for(i = 0 ; i < 3; i++) {
            day = $("<li></li>");
            $('#days').append(day);
        }
        numberOfDays();
    }

    else if(tmp === 5){     //1° Venerdì
        for(i = 0 ; i < 4; i++) {
            day = $("<li></li>");
            $('#days').append(day);
        }
        numberOfDays();
    }


    else if(tmp === 6){     //1° Sabato
        for(i = 0 ; i < 5; i++) {
            day = $("<li></li>");
            $('#days').append(day);
        }
        numberOfDays();
    }
}

function numberOfDays() {
    // Giorni in un mese
    if (daysInMonth(d.getMonth(), d.getFullYear()) === 31) {
        for (i = 1; i < 32; i++) {
            day = $("<li></li>").text(i)
            if ((d.getDate() === i) && (d.getMonth() === today.getMonth()) && (d.getFullYear() === today.getFullYear())) {
                day = day.css({background: "#1abc9c", padding: "5px", color: "white"});
            }
            $('#days').append(day);
        }
    }

    else if(daysInMonth(d.getMonth(),d.getFullYear()) === 30) {
        for (i = 1; i < 31; i++) {
            day = $("<li></li>").text(i);
            if ((d.getDate() === i) && (d.getMonth() === today.getMonth()) && (d.getFullYear() === today.getFullYear())) {
                day = day.addClass("active");
            }
            $('#days').append(day);
        }
    }

    else if(daysInMonth(d.getMonth(),d.getFullYear()) === 28) {
        for (i = 1; i < 29; i++) {
            day = $("<li></li>").text(i);
            if ((d.getDate() === i) && (d.getMonth() === today.getMonth()) && (d.getFullYear() === today.getFullYear())) {
                day = day.addClass("active");
            }
            $('#days').append(day);
        }
    }
    else if(daysInMonth(d.getMonth(),d.getFullYear()) === 29){
        for (i = 1; i < 30; i++) {
            day = $("<li></li>").text(i);
            if ((d.getDate() === i) && (d.getMonth() === today.getMonth()) && (d.getFullYear() === today.getFullYear())) {
                day = day.addClass("active");
            }
            $('#days').append(day);
        }
    }
}


function isEmpty( el ){
    return !$.trim(el.html())
}