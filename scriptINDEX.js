/**
 * Created by aless on 27/04/2017.
 */

function isEmpty( el ){
    return !$.trim(el.html())
}
if (isEmpty($('#today'))) {
    $('#today').text('Oggi non hai eventi');// do something
}