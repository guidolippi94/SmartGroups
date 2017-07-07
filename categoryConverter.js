/**
 * Created by guidolippi on 17/06/2017.
 */



function convertCategoriesFromUserLikes(Jarray) {

    console.log("-------" + Jarray.paging.previous + "---------");

        for (i = 0; i < Jarray.data.length; i++) {
            var likeCategory = Jarray.data[i].category.toLowerCase();
            selectCategory(likeCategory);
            //console.log(likeCategory);
        }

        if(Jarray.paging.next != undefined) {
            var nextLikesPage = Jarray.paging.next;
            getJSON(nextLikesPage).then(function (data) {
                console.log(data);
                convertCategoriesFromUserLikes(data)
            });
        }

}


function selectCategory(realFBCategory){
    if(realFBCategory.includes("music")){
        music++;
    }
    else if (realFBCategory.includes("sport")){
        sport++;
    }
    else if(realFBCategory.includes("food") || realFBCategory.includes("restaurant") || realFBCategory.includes("bar") || realFBCategory.includes("pub") || realFBCategory.includes("wine") || realFBCategory.includes("beer") || realFBCategory.includes("pizza")){
        food++;
    }
    //TODO finire selezione categorie
}